<?php

namespace Model;

use Model\Database;
use Model\App;

class Logger {
    private $db;
    private $currentUser;
    
    public function __construct(Database $db) {
        // $this->db = App::resolve(Database::class);
        $this->db = $db;
        $this->currentUser = $_SESSION['user']['school_id'] ?? null;
    }
    
    public function log($action, $status, $targetType = null, $targetId = null, $details = null) {
        try {
            $userRole = $_SESSION['user']['account_type'] ?? 'guest';
            
            $logData = [
                ':school_id' => $this->currentUser,
                ':user_role' => $userRole,
                ':action' => $action,
                ':status' => $status,
                ':target_type' => $targetType,
                ':target_id' => $targetId,
                ':details' => $details ? json_encode($details) : null,
                ':ip_address' => $this->getClientIP(),
                ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null
            ];

            $sql = "INSERT INTO logs (
                school_id, user_role, action, status, 
                target_type, target_id, details, 
                ip_address, user_agent
            ) VALUES (
                :school_id, :user_role, :action, :status,
                :target_type, :target_id, :details,
                :ip_address, :user_agent
            )";

            $this->db->query($sql, $logData);
            
            return true;
        } catch (\Exception $e) {
            // Log the error somewhere
            error_log("Logging failed: " . $e->getMessage());
            return false;
        }
    }
    
    private function getClientIP() {
        $ipAddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipAddress = 'UNKNOWN';
        }
        return $ipAddress;
    }
}