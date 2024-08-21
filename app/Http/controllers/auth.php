<?php

use Model\Database;
use Core\Validator;


$config = require_once base_path('app/model/config.php');
$db = new Database($config['database']);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])) {
        $l_school_id = $_POST["l_school_id"];
        $l_password = $_POST["l_password"];

        $log = $db->query('select * from accounts where school_id = :id', [
            ':id' => $l_school_id
        ])->find();
        
        if (! empty($log)) {
            if (password_verify($l_password, $log['password'])){
                $_SESSION["current_id"] = $l_school_id;
                if($log['account_type'] === 'student') {
                    $_SESSION['current_type'] = 'student';
                } elseif($log['account_type'] === 'professor') {
                    $_SESSION['current_type'] = 'professor';
                } else {
                    $_SESSION['current_type'] = 'admin';
                }
                // header("Location: {$_SESSION['current_type']}/dashboard");
                header("Location: /dashboard");
                die();
            } elseif ($l_password === $log['password']) {
                $_SESSION["current_id"] = $l_school_id;
                if($log['account_type'] === 'student') {
                    $_SESSION['current_type'] = 'student';
                } elseif($log['account_type'] === 'professor') {
                    $_SESSION['current_type'] = 'professor';
                } else {
                    $_SESSION['current_type'] = 'admin';
                }
                // header("Location: {$_SESSION['current_type']}/dashboard");
                header("Location: /dashboard");
                die();
            }
        }
    
    }




    if(isset($_POST["register"])) {
        $school_number = filter_input(INPUT_POST, "s_school_number", FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, "r_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $c_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $firstn = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $lastn = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_type = $_POST["usertype"];

        $errors = array();


        if(empty($school_number) OR empty($password) OR empty($firstn) OR empty($lastn) OR ($user_type === "")) {
            array_push($errors, "All fields are required");
        } 

        if (strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 characters long");
        }

        if (Validator::email($email) === false) {
            array_push($errors, "You must use your Fatima Email!");
        }

        if ($password !== $c_password) {
            array_push($errors, "Password does not match");
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
                echo "<br>";
            }
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);


            $check = $db->query('select school_id, email from accounts where school_id = :id OR email = :email', [
                ':id' => $school_number,
                ':email' => $email,
            ])->findAll();

            if(!empty($check)) { 
                echo "<div class='alert alert-danger'>Either the Email or School ID you input has already been used</div>";
                echo "<br>";
            } else {
                $db->query("INSERT INTO accounts (school_id, email, password, f_name, l_name, account_type) 
                VALUES ('$school_number', '$email', '$hash', '$firstn', '$lastn', '$user_type')")->findAll();
            }
        }
    }
    
}




view('auth.view.php', [
    'heading' => 'Authorization'
]);