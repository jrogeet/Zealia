<?php

namespace App\Controllers;

use App\Model\Notification;

class NotificationController
{
    private $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new Notification();
    }

    public function stream()
    {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');
        header('X-Accel-Buffering: no');

        if (!isset($_SESSION['user'])) {
            echo "data: " . json_encode(['error' => 'Unauthorized']) . "\n\n";
            exit();
        }

        while (true) {
            $notifications = $this->notificationModel->getUnreadNotifications();

            echo "data: " . json_encode([
                'notifications' => $notifications,
                'count' => count($notifications)
            ]) . "\n\n";

            if (ob_get_level() > 0) {
                ob_end_flush();
            }
            flush();

            if (connection_aborted()) {
                exit();
            }

            sleep(5);
        }
    }

    public function markAsRead()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $notificationId = $data['notification_id'] ?? null;

        if ($notificationId) {
            $success = $this->notificationModel->markAsRead($notificationId);
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
        }
    }
}