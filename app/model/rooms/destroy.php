<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$room = $db->query('select * from rooms where room_id = :id', [
    ':id' => $_POST['room_id']
])->findOrFail();

authorize($room['school_id'] === $currentUser);

// TO DO: SEND NOTIFICATIONS TO EACH STUDENT IN THE ROOM

// $prof_info = $db->query('select l_name, f_name from accounts where school_id = :id', [
//     'id' => $room['school_id']
// ])->find();

// $roomExistence['prof_name'] = $prof_info['f_name'] . ' ' . $prof_info['l_name'];

// $type = json_encode([
//     "type" => "room_delete",
//     "room_name" => $room['room_name'],
//     "prof_name" => $room['prof_name'],
//     "prof_id" => $currentUser,
//     "room_id" => $room['room_id'],
// ]);

// // NOTIFICATIONS
// $db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
//     'school_id' => $roomExistence['school_id'], 
//     'type' => $type,
// ]);

$db->query('delete from rooms where room_id = :id', [
    ':id' => $_POST['room_id']
]);

header('location: /dashboard');
exit();