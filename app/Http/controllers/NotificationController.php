<?php

namespace App\Http\Controllers;

use Model\App;
use Model\Database;

class NotificationController {
    private $last_check_time;
    private const MAX_EXECUTION_TIME = 300; // 5 minutes
    private const SLEEP_TIME = 1000000; // 1 seconds in microseconds
    
    public function stream() {
        // session_start();
        if (!isset($_SESSION['user']['school_id'])) {
            http_response_code(401);
            exit('Unauthorized');
        }
        session_write_close();
        // Generate a unique connection ID
        $connectionId = uniqid('sse_');
        
        // Clear buffers and set headers
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');
        header('X-Accel-Buffering: no');
        
        if (function_exists('apache_setenv')) {
            apache_setenv('no-gzip', '1');
        }
        ini_set('output_buffering', '0');
        ini_set('zlib.output_compression', '0');
        
        $db = App::resolve(Database::class);
        $this->last_check_time = date('Y-m-d H:i:s');
        
        // Set start time for max execution time tracking
        $startTime = time();
        
        echo "retry: 5000\n\n";
        
        while (true) {
            // Check if connection is still alive
            if (connection_aborted()) {
                exit();
            }
            
            // Check if we've exceeded max execution time
            if (time() - $startTime >= self::MAX_EXECUTION_TIME) {
                echo "event: timeout\n";
                echo "data: " . json_encode(['message' => 'Connection timeout, please reconnect']) . "\n\n";
                exit();
            }
            
            try {
                // Only fetch new unread notifications
                $notifications = $db->query(
                    'SELECT id, school_id, type, read_status, created_at 
                     FROM notifications 
                     WHERE school_id = :id 
                     AND read_status = 0 
                     AND created_at > :last_check_time 
                     ORDER BY created_at DESC',
                    [
                        'id' => $_SESSION['user']['school_id'],
                        'last_check_time' => $this->last_check_time
                    ]
                )->findAll();
                
                if (!empty($notifications)) {
                    // Process each notification's type
                    foreach ($notifications as &$notification) {
                        if (isset($notification['type'])) {
                            $notification['type'] = json_encode(json_decode($notification['type'], true));
                        }
                    }
                    
                    $data = [
                        'notRead' => $notifications,
                        'hadRead' => [],
                        'timestamp' => date('Y-m-d H:i:s'),
                        'connectionId' => $connectionId
                    ];
                    
                    echo "id: " . time() . "\n";
                    echo "event: notifications\n";
                    echo "data: " . json_encode($data) . "\n\n";
                    
                    $this->last_check_time = date('Y-m-d H:i:s');
                } else {
                    // Send keepalive ping every 3 seconds
                    echo "event: ping\n";
                    echo "data: " . json_encode(['timestamp' => time(), 'connectionId' => $connectionId]) . "\n\n";
                }
                
                if (ob_get_level() > 0) {
                    ob_flush();
                }
                flush();
                
                // Increase sleep time to reduce server load
                usleep(self::SLEEP_TIME);
                
            } catch (\Exception $e) {
                error_log("SSE Error: " . $e->getMessage());
                echo "event: error\n";
                echo "data: " . json_encode(['error' => 'Internal server error']) . "\n\n";
                exit();
            }
        }
    }

    public function getInitialNotifications() {
        if (!isset($_SESSION['user']['school_id'])) {
            http_response_code(401);
            exit('Unauthorized');
        }
        
        $db = App::resolve(Database::class);
        $notifications = $db->query(
            'SELECT id, school_id, type, read_status, created_at 
             FROM notifications 
             WHERE school_id = :id 
             ORDER BY created_at DESC 
             LIMIT 50',
            ['id' => $_SESSION['user']['school_id']]
        )->findAll();
        
        // Process notifications
        foreach ($notifications as &$notification) {
            if (isset($notification['type'])) {
                $notification['type'] = json_encode(json_decode($notification['type'], true));
            }
        }
        
        $notRead = array_filter($notifications, fn($n) => $n['read_status'] == 0);
        $hadRead = array_filter($notifications, fn($n) => $n['read_status'] == 1);
        
        header('Content-Type: application/json');
        echo json_encode([
            'notRead' => array_values($notRead),
            'hadRead' => array_values($hadRead),
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }
}