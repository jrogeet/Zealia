<?php

use Model\Database;
use Model\App;
use Model\Logger;
use Core\Validator;

$db = App::resolve(Database::class);
$logger = new Logger($db);

$currentUser = $_SESSION['user']['school_id'];

// dd($room);
// dd($_POST);

$room = json_decode($_POST['room'], true);
$room_id = $room['room_id'];

if (isset($_POST['edit'])) {
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
        'room_id' => $room_id
    ]);
    
    $logger->log(
        'EDIT ROOM NAME',
        'success',
        'room',
        $currentUser,
        [
            'room_id' => $room_id,
            'old_name' => $room['room_name'],
            'new_name' => $_POST['room_name'],
        ]
    );
}
// redirect the user
header("Location: /room?room_id={$room_id}");
exit();