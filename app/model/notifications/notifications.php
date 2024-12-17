<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

if (isset($_POST['invite'])) {
    if(isset($_POST['accept'])) {

        $db->query('INSERT INTO room_list(school_id, room_id) VALUES (:school_id, :room_id)', [
            'school_id' => $currentUser, 
            'room_id' => $_POST['invite'],
        ]);

        $db->query('DELETE FROM notifications where id = :id and school_id = :school_id', [
            ':id' => $_POST['notif_id'],
            ':school_id' => $currentUser
        ]);

    } elseif (isset ($_POST['decline'])) {
        $db->query('DELETE FROM notifications where id = :id and school_id = :school_id', [
            ':id' => $_POST['notif_id'],
            ':school_id' => $currentUser
        ]);
    }

    header("Location: /dashboard");
    exit();
} elseif (isset($_POST['clear'])) {
    $uri = $_POST['uri'];

    $db->query('DELETE FROM notifications where school_id = :id', [
        ':id' => $currentUser,
    ]);

    header("Location: {$uri}");
    exit();
}