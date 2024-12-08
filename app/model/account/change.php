<?php

use Model\App;
use Model\Database;
use Model\Logger;
use Core\Validator;

$db = App::resolve(Database::class);
$logger = new Logger($db);

$errors = [];

if (isset($_POST["cur_pass"])) {
    $curpass = $_POST["cur_pass"];
    $newpass = $_POST["new_pass"];
    $conewpass = $_POST["conew_pass"];

    $pass = $db->query('SELECT password FROM accounts WHERE school_id = :id', [
        ':id' => $_SESSION['user']['school_id']
    ])->find();

    // var_dump($pass);
    // dd($pass);

    if (! password_verify($curpass, $pass['password'])) {
        $errors['cur_pass'] = 'Current password is incorrect';
    }

    if (! Validator::string($newpass, 7, 255)) {
        $errors['password'] = 'Please provide a password with a minimum length of 7 characters.';
    } 
    
    if ( ! preg_match("/[a-z]/i", $newpass)) {
        $errors['password-letter'] = 'Password must contain at least one letter';
    }
    
    if (! preg_match("/[0-9]/", $newpass)) {
        $errors['password-number'] = 'Password must contain at least one number';
    }

    if ($newpass !== $conewpass) {
        $errors['new_pass'] = 'New passwords do not match';
    }


    if (! empty($errors)) {
        $_SESSION['message'] = 'Please fix the following errors:';
        $_SESSION['message_type'] = 'error';
        $_SESSION['errors'] = $errors;
        
        header('Location: /account');
        exit();
    } else {
        $logger->log(
            'PASSWORD CHANGE',
            'success',
            'user',
            $_SESSION['user']['school_id'],
        );

        $db->query('UPDATE accounts SET password = :pass WHERE school_id = :id', [
            ':pass' => password_hash($newpass, PASSWORD_DEFAULT),
            ':id' => $_SESSION['user']['school_id']
        ]);

        $_SESSION['message'] = 'Password successfully updated!';
        $_SESSION['message_type'] = 'success';
        
        header('Location: /account');
        exit();
    }
}
