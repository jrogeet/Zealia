<?php

use Model\Database;
use Model\App;
use Core\Validator;

$db = App::resolve(Database::class);

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
    
} //elseif (isset($_POST['grouped'])) {

//     $decodedGroups = json_decode($_POST['genGroups'], true);

//     $genGroups = json_encode($decodedGroups);

//     $db->query('INSERT INTO room_groups(room_id, groups_json) VALUES (:id, :groups)', [
//         ':id'=> $room_id,
//         ':groups'=> $genGroups
//     ]);
// }

// redirect the user
header("Location: /room?room_id={$room_id}");
exit();