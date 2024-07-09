<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$hasTypeAlr = $db->query('select personality_type from accounts where school_id = :school_id', [
    ':school_id' => $currentUser,
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



if (! is_null($hasTypeAlr['personality_type'])) {
    // var_dump($hasTypeAlr['personality_type']);

    $typeNperc = $db->query('select type_percentage from accounts where school_id = :school_id', [
        ':school_id' => $currentUser,
    ])->find();

    $jsonData = $typeNperc['type_percentage'];
    $decodedData = json_decode($jsonData, true);

    // dd($typeNperc);
    // var_dump($decodedData);

    view("account/account.view.php", [
        'heading' =>'My Account',
        'decodedData' => $decodedData,
        'notifications' => $notifications
    ]);
    
} else if (is_null($hasTypeAlr['personality_type'])) {
    view("account/account.view.php", [
        'heading' =>'My Account',
        'notifications' => $notifications
    ]);
}