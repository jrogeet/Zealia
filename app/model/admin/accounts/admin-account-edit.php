<?php

use Core\Validator;

use Model\Database;
use Model\App;
use Model\Logger;

$db = App::resolve(Database::class);
$logger = new Logger($db);

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

        $logger->log(
            'ADMIN: EDIT ACCOUNT FIRST NAME',
            'success',
            'user',
            $id,
            [
                'school_id' => $id,
                'new_f_name' => $f_name,
                'old_f_name' => $decoded_allUserInfo['f_name'],
            ]
        );
    } 

    if (! empty($l_name)) {
        $db->query('update accounts set l_name = :l_name where school_id = :id', [
            ':l_name' => $l_name,
            ':id' => $id,
        ]);

        $logger->log(
            'ADMIN: EDIT ACCOUNT LAST NAME',
            'success',
            'user',
            $id,
            [
                'school_id' => $id,
                'new_l_name' => $l_name,
                'old_l_name' => $decoded_allUserInfo['l_name'],
            ]
        );
    } 

    if (! empty($school_id)) {
        $db->query('update accounts set school_id = :school_id where school_id = :id', [
            ':school_id' => $school_id,
            ':id' => $id,
        ]);

        $logger->log(
            'ADMIN: EDIT ACCOUNT SCHOOL ID',
            'success',
            'user',
            $id,
            [
                'school_id' => $id,
                'new_school_id' => $school_id,
                'old_school_id' => $decoded_allUserInfo['school_id'],
            ]
        );
    } 

    if (! empty($email)) {
        $db->query('update accounts set email = :email where school_id = :id', [
            ':email' => $email,
            ':id' => $id,
        ]);

        $logger->log(
            'ADMIN: EDIT ACCOUNT EMAIL',
            'success',
            'user',
            $id,
            [
                'school_id' => $id,
                'new_email' => $email,
                'old_email' => $decoded_allUserInfo['email'],
            ]
        );
    }

    if (! empty($password)) {
        if ($password === $c_password) {
            $db->query('update accounts set password = :password where school_id = :id', [
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':id' => $id,
            ]);

            $logger->log(
                'ADMIN: EDIT ACCOUNT PASSWORD',
                'success',
                'user',
                $id,
                [
                    'school_id' => $id,
                ]
            );
        }
    }

    if (isset($school_id)) {
        header("Location: /admin-account-edit?id={$school_id}");
    } else {
        header("Location: /admin-account-edit?id={$id}"); 
    }


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

    $logger->log(
        'ADMIN: DELETE ACCOUNT',
        'success',
        'user',
        $id,
    );

    header("Location: /admin-accounts");
    exit();
}