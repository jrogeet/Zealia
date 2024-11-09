<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

if (isset($_POST['search'])) {
    unset($_POST['search']);
    $accounts = json_decode($_POST['encoded_accounts'], true);
    $students = json_decode($_POST['encoded_students'], true);
    $instructors = json_decode($_POST['encoded_instructors'], true);

    $search_input = $_POST['search_input'];

    $searched_accounts = [];
    foreach ($accounts as $account) {
        if (stripos($account['f_name'], $search_input) !== false 
        || stripos($account['l_name'], $search_input) !== false 
        || stripos($account['school_id'], $search_input) !== false
        || stripos($account['email'], $search_input) !== false) {
            $searched_accounts[] = $account;
        }
    }

    $searched_instructors = [];
    foreach ($instructors as $instructor) {
        if (stripos($instructor['f_name'], $search_input) !== false 
        || stripos($instructor['l_name'], $search_input) !== false 
        || stripos($instructor['school_id'], $search_input) !== false
        || stripos($instructor['email'], $search_input) !== false) {
            $searched_instructors[] = $instructor;
        }
    }

    $searched_students = [];
    foreach ($students as $student) {
        if (stripos($student['f_name'], $search_input) !== false 
        || stripos($student['l_name'], $search_input) !== false 
        || stripos($student['school_id'], $search_input) !== false
        || stripos($student['email'], $search_input) !== false) {
            $searched_students[] = $student;
        }
    }

    view('admin/accounts/admin-accounts.view.php', [
        'accounts' => $searched_accounts,
        'students' => $searched_students,
        'instructors' => $searched_instructors,
        'encoded_accounts' => $_POST['encoded_accounts'],
        'encoded_students' => $_POST['encoded_students'],
        'encoded_instructors' => $_POST['encoded_instructors'],
    ]);

} elseif (isset($_POST['create'])) {
    unset($_POST['create']);
    $encoded_accounts = $_POST['encoded_accounts'];
    $encoded_students = $_POST['encoded_students'];
    $encoded_instructors = $_POST['encoded_instructors'];
    $accounts = json_decode($encoded_accounts, true);
    $students = json_decode($encoded_students, true);
    $instructors = json_decode($encoded_instructors, true);

    $account_type = $_POST['account_type'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $school_id = $_POST['school_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    foreach($accounts as $account) {
        if ($account['school_id'] === $school_id) {
            $idExists = true;
            
            view('admin/accounts/admin-accounts.view.php', [
                'accounts' => $accounts,
                'students' => $students,
                'instructors' => $instructors,
                'encoded_accounts' => $encoded_accounts,
                'encoded_students' => $encoded_students,
                'encoded_instructors' => $encoded_instructors,
                'idExists' => $idExists,
            ]);

        } elseif ($account['email'] === $email) {
            $emailExists = true;

            view('admin/accounts/admin-accounts.view.php', [
                'accounts' => $accounts,
                'students' => $students,
                'instructors' => $instructors,
                'encoded_accounts' => $encoded_accounts,
                'encoded_students' => $encoded_students,
                'encoded_instructors' => $encoded_instructors,
                'emailExists' => $emailExists,
            ]);

        } else {
            // generate random string of bytes in hex digits
            // for email activation or confirmation
            $activation_token = bin2hex(random_bytes(16));
            $activation_token_hash = hash("sha256", $activation_token);

            $db->query("INSERT INTO accounts(school_id, email, password, l_name, f_name, account_type, account_activation_hash)
            VALUES(:school_id, :email, :password, :l_name, :f_name, :account_type, :activation_token_hash)", [
                ':school_id'=> $school_id,
                ':email'=> $email,
                ':password' => password_hash($password, PASSWORD_BCRYPT),
                ':l_name'=> $lname,
                ':f_name'=> $fname,
                ':account_type'=> $account_Type,
                ':activation_token_hash' => $activation_token_hash
            ]);

            $success = true;
            
            view('admin/accounts/admin-accounts.view.php', [
                'accounts' => $accounts,
                'students' => $students,
                'instructors' => $instructors,
                'encoded_accounts' => $encoded_accounts,
                'encoded_students' => $encoded_students,
                'encoded_instructors' => $encoded_instructors,
                'emailExists' => $emailExists,
                'success' => $success,
            ]);
        }
    }

    // db->query("INSERT INTO accounts(school_id, email, password, l_name, f_name, account_type, account_activation_hash)
    // VALUES(:school_id, :email, :password, :l_name, :f_name, :account_type, :activation_token_hash)", [
    //     ':school_id'=> $school_id,
    //     ':email'=> $email,
    //     ':password' => password_hash($password, PASSWORD_BCRYPT),
    //     ':l_name'=> $lname,
    //     ':f_name'=> $fname,
    //     ':account_type'=> $usertype,
    //     ':activation_token_hash' => $activation_token_hash
    // ]);

    header('location: /admin-accounts');
    exit();
}