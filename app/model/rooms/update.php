<?php

// 

use Model\Database;
use Model\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];

// find the corresponding room
$room = $db->query('select * from rooms where room_id = :room_id', [
    ':room_id'=>$_POST['room_id']
])->findOrFail();

// dd($room);
// dd($_POST);

// authorize that the current user can edit the room
authorize($room['school_id'] === $currentUser);

// validate the form
$errors = [];

if (! Validator::string($_POST['room_name'], 1, 100)) {
    $errors['room_name'] = 'A room name of no more than 100 characters is required.';
}

// if no validation errors, update the record in the rooms database table
if (count($errors)) {
    return view('rooms/show.view.php', [
        'errors' => $errors,
        'room' => $room
    ]);
}

$db->query('update rooms set room_name = :new_name where room_id = :room_id', [
    'new_name' => $_POST['room_name'],
    'room_id' => $_POST['room_id']
]);


// redirect the user

header('location: /dashboard');
die();