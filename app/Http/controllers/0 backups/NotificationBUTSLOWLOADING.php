<?php
// namespace App\Http\Controllers;

// use Model\App;
// use Model\Database;

// class NotificationController {
//     private $last_check_time;
//     private $initialFetchDone = false;
    
//     public function stream() {
//         if (!isset($_SESSION['user']['school_id'])) {
//             http_response_code(401);
//             exit('Unauthorized');
//         }

//         // Clear all output buffers and set proper headers
//         while (ob_get_level() > 0) {
//             ob_end_clean();
//         }
        
//         header('Content-Type: text/event-stream');
//         header('Cache-Control: no-cache');
//         header('Connection: keep-alive');
//         header('X-Accel-Buffering: no'); // Disable nginx buffering
        
//         // Disable compression and buffering
//         if (function_exists('apache_setenv')) {
//             apache_setenv('no-gzip', '1');
//         }
//         ini_set('output_buffering', '0');
//         ini_set('zlib.output_compression', '0');

//         $db = App::resolve(Database::class);
//         $this->last_check_time = date('Y-m-d H:i:s');

//         // Send initial retry interval
//         echo "retry: 3000\n\n";

//         while (true) {
//             if (connection_aborted()) {
//                 exit();
//             }

//             try {
//                 $notifications = $db->query(
//                     'SELECT * FROM notifications WHERE school_id = :id ORDER BY created_at DESC',
//                     ['id' => $_SESSION['user']['school_id']]
//                 )->findAll();

//                 $notRead = array_filter($notifications, fn($n) => $n['read_status'] == 0);
//                 $hadRead = array_filter($notifications, fn($n) => $n['read_status'] == 1);

//                 $data = [
//                     'notifications' => $notifications,
//                     'notRead' => array_values($notRead),
//                     'hadRead' => array_values($hadRead),
//                     'timestamp' => date('Y-m-d H:i:s')
//                 ];

//                 // Send data if it's initial fetch or if there are new notifications
//                 if (!$this->initialFetchDone || 
//                     (!empty($notifications) && $notifications[0]['created_at'] > $this->last_check_time)) {
                    
//                     echo "id: " . time() . "\n";
//                     echo "event: notifications\n";
//                     echo "data: " . json_encode($data) . "\n\n";
                    
//                     $this->last_check_time = date('Y-m-d H:i:s');
//                     $this->initialFetchDone = true;
//                 } else {
//                     // Send keepalive comment
//                     echo ": keepalive " . time() . "\n\n";
//                 }

//                 if (ob_get_level() > 0) {
//                     ob_flush();
//                 }
//                 flush();

//                 usleep(2000000); // 2 seconds
//             } catch (\Exception $e) {
//                 // Log error and send error event
//                 error_log("SSE Error: " . $e->getMessage());
//                 echo "event: error\n";
//                 echo "data: " . json_encode(['error' => 'Internal server error']) . "\n\n";
//                 exit();
//             }
//         }
//     }
// }