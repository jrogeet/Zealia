<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['school_id'];

if (isset($_POST['invite'])) {
    if(isset($_POST['accept'])) {

        $db->query('INSERT INTO room_list(school_id, room_id) VALUES (:school_id, :room_id)', [
            'school_id' => $currentUserId, 
            'room_id' => $_POST['invite'],
        ]);

        $db->query('DELETE FROM notifications where id = :id and school_id = :school_id', [
            ':id' => $_POST['notif_id'],
            ':school_id' => $currentUserId
        ]);

    } elseif (isset ($_POST['decline'])) {
        $db->query('DELETE FROM notifications where id = :id and school_id = :school_id', [
            ':id' => $_POST['notif_id'],
            ':school_id' => $currentUserId
        ]);
    }

    header("Location: /dashboard");
    exit();
}