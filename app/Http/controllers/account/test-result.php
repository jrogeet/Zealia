<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

$rCount = $_GET['R'];
$iCount = $_GET['I'];
$aCount = $_GET['A'];
$sCount = $_GET['S'];
$eCount = $_GET['E'];
$cCount = $_GET['C'];
$finalRes = $_GET['finalRes'];

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


view("account/test-result.view.php", [
    'heading' =>'My Account',
    'notifications' => $notifications,
    'currentUser' => $currentUser,
    'rCount' => $rCount,
    'iCount' => $iCount,
    'aCount' => $aCount,
    'sCount' => $sCount,
    'eCount' => $eCount,
    'cCount' => $cCount,
    'finalRes' => $finalRes
]);

