<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

if ($_SESSION['user']['account_type'] === "admin") {    
    $school_id = $_GET['id'];
    
    // Get user details
    $user = $db->query("SELECT f_name, l_name FROM accounts WHERE school_id = :school_id", [
        'school_id' => $school_id
    ])->find();
    
    // Get only logs where target_id matches the school_id
    $logs = $db->query("SELECT * FROM logs WHERE target_id = :school_id ORDER BY created_at DESC", [
        'school_id' => $school_id
    ])->findAll();

    view('admin/logs/admin-view-log.view.php', [
        'logs' => $logs,
        'school_id' => $school_id,
        'user' => $user
    ]);
} else {
    abort(403);
}