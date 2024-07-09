<?php

// CREATE ROOM
use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['school_id'];


if (isset($_POST['accept'])) {
    $values_array = explode(",", $_POST['accept']);

    $db->query('INSERT INTO room_list(school_id, room_id) VALUES (:student, :room) ', [
        ':student'=>$values_array[0],
        ':room'=>$values_array[1]
    ]);

    $db->query('delete from join_room_requests where room_id = :room_id and school_id = :school_id', [
        ':room_id' => $values_array[1],
        ':school_id' => $values_array[0]
    ]);

    $db->query('INSERT INTO notifications(sender_id, receiver_id, room_id, notif_type) VALUES (:prof, :student, :room, :type)', [
        ':prof'=>$currentUser,
        ':student'=>$values_array[0],
        ':room'=>$values_array[1],
        ':type'=>'room_accept'
    ]);

    $db->query('delete from notifications where sender_id = :sender_id and receiver_id = :receiver_id and room_id = :room_id and notif_type = :notif_type', [
        ':sender_id' => $values_array[0],
        ':receiver_id' => $values_array[0],
        ':room_id' => $values_array[1],
        ':notif_type' => 'prejoin',
    ]);

    $db->query('delete from notifications where sender_id = :sender_id and receiver_id = :receiver_id and room_id = :room_id and notif_type = :notif_type', [
        ':sender_id' => $values_array[0],
        ':receiver_id' => $currentUser,
        ':room_id' => $values_array[1],
        ':notif_type' => 'join_room',
    ]);

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
    $db->query('delete from join_room_requests where room_id = :room_id and school_id = :school_id', [
        ':room_id' => $values_array[1],
        ':school_id' => $values_array[0]
    ]);

    $db->query('INSERT INTO notifications(sender_id, receiver_id, room_id, notif_type) VALUES (:prof, :student, :room, :type)', [
        ':prof'=>$currentUser,
        ':student'=>$values_array[0],
        ':room'=>$values_array[1],
        ':type'=>'room_decline'
    ]);

    $db->query('delete from notifications where sender_id = :sender_id and receiver_id = :receiver_id and room_id = :room_id and notif_type = :notif_type', [
        ':sender_id' => $values_array[0],
        ':receiver_id' => $values_array[0],
        ':room_id' => $values_array[1],
        ':notif_type' => 'prejoin',
    ]);

    $db->query('delete from notifications where sender_id = :sender_id and receiver_id = :receiver_id and room_id = :room_id and notif_type = :notif_type', [
        ':sender_id' => $values_array[0],
        ':receiver_id' => $currentUser,
        ':room_id' => $values_array[1],
        ':notif_type' => 'join_room',
    ]);

    header("Location: /room?room_id={$values_array[1]}");
    exit();
} elseif (isset($_POST['delete'])) {
    $values_array = explode(",", $_POST['delete']);
    $db->query('delete from room_list where room_id = :room_id and school_id = :school_id', [
        ':room_id' => $values_array[1],
        ':school_id' => $values_array[0]
    ]);

    header("Location: /room?room_id={$values_array[1]}");
    exit();
}




