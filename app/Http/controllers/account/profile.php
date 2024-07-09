<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$school_id = $_GET['id'];



$stu_info[] = $db->query('select * from accounts where school_id = :stu_id', [
    ':stu_id'=> $school_id,
])->find();


$notifications = $db->query('SELECT * FROM notifications WHERE receiver_id = :user ORDER BY notif_time DESC', [
    ':user'=>$currentUser
])->findAll();

foreach($notifications as &$notification) {
    $sender_name = $db->query('SELECT l_name, f_name from accounts where school_id = :id', [
        ':id' => $notification['sender_id'] 
    ])->find();

    $room_name = $db->query('SELECT room_name from rooms where room_id = :room_id',[
        'room_id' => $notification['room_id']
    ])->find();

    $notification['sender_name'] = "{$sender_name['f_name']} {$sender_name['l_name']}";
    $notification['room_name'] = $room_name['room_name'];
}


view('account/profile.view.php', [
    'stu_info' => $stu_info,
    'notifications' => $notifications
]);
