<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {    
    $id = $_POST['ticket_id'];
    if (isset($_POST['solved'])) {
        $db->query('update ticket set status = "solved" where ticket_id = :id', [
            'id' => $id,
        ]);
    } elseif (isset($_POST['unresolved'])) {
        $db->query('update ticket set status = "unresolved" where ticket_id = :id', [
            'id' => $id,
        ]);
    } elseif (isset($_POST['pending'])) {
        $db->query('update ticket set status = "pending" where ticket_id = :id', [
            'id' => $id,
        ]);
    }

    header("location: /admin-view-ticket?id={$id}");
    exit();
} else {
    abort(403);
}

