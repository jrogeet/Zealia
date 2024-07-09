<?php


use Model\App;
use Model\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (isset($_POST["cur_pass"])) {
    $curpass = $_POST["cur_pass"];
    $newpass = $_POST["new_pass"];
    $conewpass = $_POST["conew_pass"];

    $pass = $db->query('select password from accounts where school_id = :id', [
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
        return view('account/account.view.php', [
            'errors'=> $errors
        ]);
    } else {
        $db->query('update accounts set password = :pass where school_id = :id', [
            ':pass' => password_hash($newpass, PASSWORD_DEFAULT),
            ':id' => $_SESSION['user']['school_id']
        ]);

        header('Location: /');
        exit();
    }
}
