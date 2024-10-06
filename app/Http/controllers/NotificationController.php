<?php

namespace App\Http\Controllers;

use Model\App;
use Model\Database;
use Core\SocketEmitter;

class NotificationController
{
    private $db;
    private $socketEmitter;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
        $this->socketEmitter = new SocketEmitter();
    }

    // Create new notification
    public function create($currentUser, $message, $link = null)
    {
        $notification = [
            'school_id' => $currentUser,
            'message' => $message,
            'link' => $link,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Save to database
        $this->db->query("INSERT INTO notifications (school_id, message, link, created_at) 
                         VALUES (:user_id, :message, :link, :timestamp)", $notification);

        // Emit to Socket.IO
        $this->socketEmitter->emit('new_notification', $notification);

        return $notification;
    }

    // Sync endpoint for when client comes back online
    public function sync()
    {
        if (!isset($_SESSION['user'])) {
            return json_encode([
                'notifications' => [],
                'unreadCount' => 0
            ]);
        }

        $currentUser = $_SESSION['user']['school_id'];

        $notifications = $this->db->query("
            SELECT * FROM notifications 
            WHERE school_id = :school_id 
            ORDER BY created_at DESC 
            LIMIT 50
        ", ['school_id' => $currentUser])->get();

        $unreadCount = $this->db->query("
            SELECT COUNT(*) as count 
            FROM notifications 
            WHERE school_id = :school_id 
            AND read_at IS NULL
        ", ['school_id' => $currentUser])->first()['count'];

        return json_encode([
            'notifications' => $notifications,
            'unreadCount' => $unreadCount
        ]);
    }

    // Mark notifications as read
    public function markAsRead()
    {
        if (!isset($_SESSION['user'])) {
            return;
        }

        $currentUser = $_SESSION['user']['school_id'];

        $this->db->query("
            UPDATE notifications 
            SET read_at = NOW() 
            WHERE school_id = :school_id 
            AND read_at IS NULL
        ", ['school_id' => $currentUser]);

        return json_encode(['success' => true]);
    }
}