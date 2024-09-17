<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$id = $_POST['id'];

if (isset($_POST['edit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $school_id = $_POST['school_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $decoded_allUserInfo = json_decode($_POST['encoded_allUserInfo'], true);

    if (! empty($f_name)) {
        $db->query('update accounts set f_name = :f_name where school_id = :id', [
            ':f_name' => $f_name,
            ':id' => $id,
        ]);
    } 

    if (! empty($l_name)) {
        $db->query('update accounts set l_name = :l_name where school_id = :id', [
            ':l_name' => $l_name,
            ':id' => $id,
        ]);
    } 

    if (! empty($school_id)) {
        $db->query('update accounts set school_id = :school_id where school_id = :id', [
            ':school_id' => $school_id,
            ':id' => $id,
        ]);
    } 

    if (! empty($email)) {
        $db->query('update accounts set email = :email where school_id = :id', [
            ':email' => $email,
            ':id' => $id,
        ]);
    }

    if (! empty($password)) {
        if ($password === $c_password) {
            $db->query('update accounts set password = :password where school_id = :id', [
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':id' => $id,
            ]);
        } else {

        }
    }

    header("Location: /admin-account-edit?id={$id}");
    exit();


} elseif (isset($_POST['activate'])) {
    $db->query('update accounts set account_activation_hash = null where school_id = :id', [
        ':id' => $id,
    ]);

    header("Location: /admin-account-edit?id={$id}");
    exit();

} elseif (isset($_POST['delete'])) {
    $db->query('delete from accounts where school_id = :id', [
        ':id' => $id,
    ]);

    header("Location: /admin-accounts");
    exit();
}