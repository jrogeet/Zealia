<?php

// CREATE ROOM
use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];


if (isset($_POST['invite'])) {

    // NOTIFICATIONS
    $type = json_encode([
        "type" => "room_invite",
        "room_name" => $_POST['room_name'],
        "prof_name" => $_POST['prof_name'],
        "prof_id" => $_POST['prof_id'],
        "room_id" => $_POST['room_id'],
        "student_id" => $_POST['school_id'],
    ]);

    $db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
        'school_id' => $_POST['school_id'], 
        'type' => $type,
    ]);

    header("Location: /room?room_id={$_POST['room_id']}");
    exit();

} elseif (isset($_POST['accept'])) {

    $values_array = explode(",", $_POST['accept']);

    $roomExistence = $db->query('select * from rooms where room_id = :id', [
        'id' => $values_array[1]
    ])->find();

    $prof_info = $db->query('select * from accounts where school_id = :id', [
        'id' => $roomExistence['school_id']
    ])->find();

    $roomExistence['prof_name'] = $prof_info['f_name'] . ' ' . $prof_info['l_name'];

    // NOTIFICATIONS
    $type = json_encode([
        "type" => "room_accept",
        "room_name" => $roomExistence['room_name'],
        "prof_name" => $roomExistence['prof_name'],
        "prof_id" => $currentUser,
        "room_id" => $roomExistence['room_id'],
        "student_id" => $values_array[0],
    ]);

    $db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
        'school_id' => $values_array[0], 
        'type' => $type,
    ]);

    // DELETE the room_join notification of the student
    $db->query('INSERT INTO room_list(school_id, room_id) VALUES (:student, :room) ', [
        'student'=>$values_array[0],
        'room'=>$values_array[1]
    ]);

    $db->query('delete from join_room_requests where room_id = :room_id and school_id = :school_id', [
        'room_id' => $values_array[1],
        'school_id' => $values_array[0]
    ]);

    // $db->query('delete from notifications where sender_id = :sender_id and receiver_id = :receiver_id and room_id = :room_id and notif_type = :notif_type', [
    //     'sender_id' => $values_array[0],
    //     'receiver_id' => $values_array[0],
    //     'room_id' => $values_array[1],
    //     'notif_type' => 'prejoin',
    // ]);

    // $db->query('delete from notifications where sender_id = :sender_id and receiver_id = :receiver_id and room_id = :room_id and notif_type = :notif_type', [
    //     'sender_id' => $values_array[0],
    //     'receiver_id' => $currentUser,
    //     'room_id' => $values_array[1],
    //     'notif_type' => 'join_room',
    // ]);

    // $db->query('INSERT INTO notifications(sender_id, receiver_id, room_id, notif_type) VALUES (:student, :prof, :room, :type)', [
    //     ':student'=> $currentUser,
    //     ':prof'=> $values_array[0],
    //     ':room'=> $values_array[1],
    //     ':type'=> 'room_accept'
    // ]);

    header("Location: /room?room_id={$values_array[1]}");
    exit();

} elseif (isset($_POST['decline'])) {
    $values_array = explode(",", $_POST['decline']);

    $roomExistence = $db->query('select * from rooms where room_id = :id', [
        'id' => $values_array[1]
    ])->find();

    $prof_info = $db->query('select l_name, f_name from accounts where school_id = :id', [
        'id' => $roomExistence['school_id']
    ])->find();

    $roomExistence['prof_name'] = $prof_info['f_name'] . ' ' . $prof_info['l_name'];

    // NOTIFICATIONS
    $type = json_encode([
        "type" => "room_decline",
        "room_name" => $roomExistence['room_name'],
        "prof_name" => $roomExistence['prof_name'],
        "prof_id" => $currentUser,
        "room_id" => $roomExistence['room_id'],
        "student_id" => $values_array[0],
    ]);

    $db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
        'school_id' => $values_array[0], 
        'type' => $type,
    ]);

    $db->query('delete from join_room_requests where room_id = :room_id and school_id = :school_id', [
        ':room_id' => $values_array[1],
        ':school_id' => $values_array[0]
    ]);

    header("Location: /room?room_id={$values_array[1]}");
    exit();
} elseif (isset($_POST['delete'])) {
    $values_array = explode(",", $_POST['delete']);

    $roomExistence = $db->query('select * from rooms where room_id = :id', [
        'id' => $values_array[1]
    ])->find();

    $prof_info = $db->query('select l_name, f_name from accounts where school_id = :id', [
        'id' => $roomExistence['school_id']
    ])->find();
    
    $roomExistence['prof_name'] = $prof_info['f_name'] . ' ' . $prof_info['l_name'];

    $db->query('delete from room_list where room_id = :room_id and school_id = :school_id', [
        ':room_id' => $values_array[1],
        ':school_id' => $values_array[0]
    ]);

    // NOTIFICATIONS
    $type = json_encode([
        "type" => "student_remove",
        "room_name" => $roomExistence['room_name'],
        "prof_name" => $roomExistence['prof_name'],
        "prof_id" => $currentUser,
        "room_id" => $roomExistence['room_id'],
        "student_id" => $values_array[0],
    ]);

    $db->query('INSERT INTO notifications(school_id, type) VALUES (:school_id, :type)', [
        'school_id' => $values_array[0], 
        'type' => $type,
    ]);

    header("Location: /room?room_id={$values_array[1]}");
    exit();
}




