<?php
// CONTROLLER FILE

// PROFESSOR'S DASHBOARD

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);
// $db = App::container()->resolve('Model\Database');

$currentUser = $_SESSION['user']['school_id'];


// getting all the columns
$profRooms = $db->query('select * from rooms where school_id = :id', [
    ':id' => $currentUser
])->findAll();

$stuRooms = $db->query('select * from room_list where school_id = :id', [
    ':id' => $currentUser
])->findAll();

// dd($_SESSION['user']);


// storing the room infos 
$room_info = [];

if ($_SESSION['user']['account_type'] === 'professor') {
    foreach ($profRooms as $room) {
        $room_info[] = $db->query('select * from rooms where room_id = :room_id', [
            ':room_id'=>$room['room_id'],
        ])->find();
    }
} elseif ($_SESSION['user']['account_type'] === 'student') {
    foreach ($stuRooms as $room) {
        $room_info[] = $db->query('select * from rooms where room_id = :room_id', [
            ':room_id'=>$room['room_id'],
        ])->find();
    }
}

foreach($room_info as &$room) {
    $prof_name = $db->query('select l_name, f_name from accounts where school_id = :id', [
        ':id' => $room['school_id']
    ])->find();
    
    $room['prof_name'] = "{$prof_name['f_name']} {$prof_name['l_name']}";
}

unset($room);

$encoded_room_info = json_encode($room_info);

    // Sort ascending
    $ascending_rooms = $room_info;
    usort($ascending_rooms, function($a, $b) {
        return strtotime($a['created_date']) - strtotime($b['created_date']);
    });

    // Sort descending
    $descending_rooms = $room_info;
    usort($descending_rooms, function($a, $b) {
        return strtotime($b['created_date']) - strtotime($a['created_date']);
    });

    $encoded_ascending_rooms = json_encode($ascending_rooms);
    $encoded_descending_rooms = json_encode($descending_rooms);

    // $notifications = $db->query('SELECT * FROM notifications WHERE receiver_id = :user ORDER BY notif_time DESC', [
    //     ':user'=>$currentUser
    // ])->findAll();

    // foreach($notifications as &$notification) {
    //     $sender_name = $db->query('SELECT l_name, f_name from accounts where school_id = :id', [
    //         ':id' => $notification['sender_id'] 
    //     ])->find();

    //     $room_name = $db->query('SELECT room_name from rooms where room_id = :room_id',[
    //         'room_id' => $notification['room_id']
    //     ])->find();

    //     $notification['sender_name'] = "{$sender_name['f_name']} {$sender_name['l_name']}";
    //     $notification['room_name'] = $room_name['room_name'];
    // }



view('rooms/dashboard.view.php', [
    'encoded_room_info' => $encoded_room_info,
    'ascending_rooms' => $ascending_rooms,
    'descending_rooms' => $descending_rooms,
    'encoded_ascending_rooms' => $encoded_ascending_rooms,
    'encoded_descending_rooms' => $encoded_descending_rooms,
    'currentUser' => $currentUser
]);





