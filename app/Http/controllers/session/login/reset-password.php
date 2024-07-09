<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);
// $db = App::container()->resolve('Model\Database');

$currentUser = $_SESSION['user']['school_id'];


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

$token = $_GET["token"];


$token_hash = hash("sha256", $token);

$account = $db->query("SELECT * FROM accounts
            WHERE reset_token_hash = :reset_hash", [
                ":reset_hash" => $token_hash,
            ])->find();


if (!$account) {
    die("Invalid or expired token");
}

if (strtotime($account["reset_token_expires_at"]) <= time()) {
    die("Token expired");
}

view('session/login/reset-password.view.php', [
    'token' => $token,
    'notifications' => $notification
]);

