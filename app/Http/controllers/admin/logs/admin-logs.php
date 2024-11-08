<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    

    $logs = $db->query("SELECT * FROM logs", [

    ])->findAll();

    view('admin/logs/admin-logs.view.php', [
        'logs' => $logs
    ]);

} else {
    abort(403);
}