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

    $decoded_reasons = json_decode($_POST['reasons'], true);
    $encoded_reasons = json_encode($decoded_reasons);

    $db->query('update room_groups set groups_json = :json where room_id = :id', [
        ':json' => $encoded_modGroups,
        ':id' => $room_id
    ]);

    foreach ($decoded_reasons as $reasons) {
        $db->query('INSERT INTO group_edit_history (room_id, from_group, to_group, school_id, reason, groups_json) VALUES (:room_id, :from_group, :to_group, :school_id, :reason, :groups_json);', [
            ':room_id' => $reasons['room_id'],
            ':from_group' => $reasons['from_group'],
            ':to_group' => $reasons['to_group'],
            ':school_id' => $reasons['school_id'],
            ':reason' => $reasons['reason'],
            ':groups_json' => $reasons['groups_json'],
        ]);
    }

    header("Location: /room?room_id={$room_id}");
    exit();
} else {
    abort(403);
}

