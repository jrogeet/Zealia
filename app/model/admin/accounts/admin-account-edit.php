<?php

use Core\Validator;

use Model\Database;
use Model\App;
use Model\Logger;

$db = App::resolve(Database::class);
$logger = new Logger($db);

if (!isset($_POST['id']) && !isset($_GET['id'])) {
    header("Location: /admin-accounts");
    exit();
}

$userExists = $db->query('select count(*) as count from accounts where school_id = :id', [
    ':id' => $_GET['id'] ?? $_POST['id']
])->find();

if (!$userExists || $userExists['count'] == 0) {
    header("Location: /admin-accounts");
    exit();
}

$id = $_GET['id'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$school_id = $_POST['school_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];
$decoded_allUserInfo = json_decode($_POST['encoded_allUserInfo'], true);

if (isset($_POST['edit'])) {
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
        $schoolIdExists = $db->query('select count(*) as count from accounts where school_id = :school_id and school_id != :current_id', [
            ':school_id' => $school_id,
            ':current_id' => $id
        ])->find();

        if ($schoolIdExists['count'] > 0) {
            header("Location: /admin-account-edit?id={$id}&error=school_id_taken");
            exit();
        }

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
                'old_school_id' => $id,
            ]
        );

        header("Location: /admin-account-edit?id={$school_id}");
        exit();
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

    if (empty($school_id)) {
        header("Location: /admin-account-edit?id={$id}");
        exit();
    }


} elseif (isset($_POST['activate'])) {
    $db->query('update accounts set account_activation_hash = null where school_id = :id', [
        ':id' => $id,
    ]);

    header("Location: /admin-account-edit?id={$id}");
    exit();

} elseif (isset($_POST['delete'])) {
    $db->query('delete from accounts where school_id = :id', [
        ':id' => $_POST['id'],
    ]);

    $logger->log(
        'ADMIN: DELETE ACCOUNT',
        'success',
        'user',
        $_POST['id'],
        [
            'deleted_school_id' => $_POST['id']
        ]
    );

    header("Location: /admin-accounts");
    exit();
}