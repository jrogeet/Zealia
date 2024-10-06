<?php

// namespace App\Model;

// use Model\Database;
// use Model\App;

// class Notification {
//     private $db;
//     public $currentUser;

//     public function __construct() {
//         $this->db = App::resolve(Database::class);
//         $this->currentUser = $_SESSION['user']['school_id'] ?? null;
//     }

//     public function getUnreadNotifications() {
//         if (!$this->currentUser) {
//             return [];
//         }

//         $notifications = $this->db->query('SELECT * FROM notifications 
//             WHERE school_id = :school_id 
//             AND read_status = 0 
//             ORDER BY created_at DESC', [
//             'school_id' => $this->currentUser,
//         ])->findAll();

//         return $notifications ?: [];
//     }

//     public function markAsRead($notificationId) {
//         if (!$this->currentUser) {
//             return false;
//         }

//         return $this->db->query('UPDATE notifications 
//             SET read_status = 1 
//             WHERE id = :id 
//             AND school_id = :school_id', [
//             'id' => $notificationId,
//             'school_id' => $this->currentUser
//         ]);
//     }

//     public function createNotification($message) {
//         return $this->db->query('INSERT INTO notifications 
//             (school_id, message, created_at) 
//             VALUES (:school_id, :message, NOW())', [
//             'school_id' => $this->currentUser,
//             'message' => $message
//         ]);
//     }
// }