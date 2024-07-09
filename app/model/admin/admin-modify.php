<?php

use Model\App;
use Model\Database;
use Core\Validator;

$db = App::resolve(Database::class);


if (isset($_POST['new_school_id'])) {
    $db->query('UPDATE accounts SET school_id = :school_id WHERE school_id = :id', [
        ':school_id' => $_POST['new_school_id'],
        ':id' => $_POST['school_id']
    ]);
}

if (isset($_POST['new_l_name'])) {
    $db->query('UPDATE accounts SET l_name = :l_name WHERE school_id = :id', [
        ':l_name' => $_POST['new_l_name'],
        ':id' => $_POST['school_id']
    ]);
}

if (isset($_POST['new_f_name'])) {
    $db->query('UPDATE accounts SET f_name = :f_name WHERE school_id = :id', [
        ':f_name' => $_POST['new_f_name'],
        ':id' => $_POST['school_id']
    ]);
}

if (isset($_POST['personality_type'])) {
    $db->query('UPDATE accounts SET personality_type = :pt WHERE school_id = :id', [
        ':pt' => $_POST['personality_type'],
        ':id' => $_POST['school_id']
    ]);
}

if (isset($_POST['new_email'])) {
    $db->query('UPDATE accounts SET email = :email WHERE school_id = :id', [
        ':email' => $_POST['new_email'],
        ':id' => $_POST['school_id']
    ]);
}

if (isset($_POST['new_password'])) {
    $db->query('UPDATE accounts SET password = :password WHERE school_id = :id', [
        ':password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT),
        ':id' => $_POST['school_id']
    ]);
}

if (isset($_POST['activate'])) {
    $db->query('UPDATE accounts SET account_activation_hash = NULL WHERE school_id = :id', [
        ':id' => $_POST['school_id']
    ]);
}

if (isset($_POST['new_room_id'])) {
    $idHasRoom = $db->query('SELECT * FROM rooms WHERE room_id = :id', [
        ':id' => $_POST['new_room_id']
    ]);

    if (! $idHasRoom) {
        $db->query('UPDATE rooms SET room_id = :room_id WHERE room_id = :id', [
            ':room_id' => $_POST['new_room_id'],
            ':id' => $_POST['room_id']
        ]);
    } 
}

if (isset($_POST['new_room_name'])) {
    $db->query('UPDATE rooms SET room_name = :room_name WHERE room_id = :id', [
        ':room_name' => $_POST['new_room_name'],
        ':id' => $_POST['room_id']
    ]);
}



header('Location: /admin');
exit;