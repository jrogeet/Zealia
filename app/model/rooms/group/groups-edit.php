<?php

// CREATE ROOM
use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$room_id = $_POST['room_id'];

$room_info = $db->query('select * from rooms where room_id = :room_id', [
    ':room_id'=> $room_id,
])->find();

if ($room_info['school_id'] == $currentUser) {
    $decoded_modGroups = json_decode($_POST['modGroups'], true);
    $encoded_modGroups = json_encode($decoded_modGroups);

    $db->query('update room_groups set groups_json = :json where room_id = :id', [
        ':json' => $encoded_modGroups,
        ':id' => $room_id
    ]);

    header("Location: /room?room_id={$room_id}");
    exit();
} else {
    abort(403);
}

