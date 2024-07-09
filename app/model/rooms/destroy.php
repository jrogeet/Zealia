<?php

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['school_id'];


$room = $db->query('select * from rooms where room_id = :id', [
    ':id' => $_POST['room_id']
])->findOrFail();

dd($room);

authorize($room['school_id'] === $currentUserId);

$db->query('delete from rooms where room_id = :id', [
    ':id' => $_POST['room_id']
]);


header('location: /dashboard');
exit();