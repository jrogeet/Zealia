<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['school_id'];

if ($_SESSION['user']['account_type'] === "admin") {
    // Handle form submission for updating admin information
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $f_name = $_POST['f_name'] ?? '';
        $l_name = $_POST['l_name'] ?? '';
        $school_id = $_POST['school_id'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $c_password = $_POST['c_password'] ?? '';

        $errors = [];

        // Validate inputs
        if (!empty($school_id) && !Validator::string($school_id)) {
            $errors['school_id'] = 'School ID must be numeric';
        }

        if (!empty($email) && !Validator::email($email)) {
            $errors['email'] = 'Please provide a valid email address';
        }

        if (!empty($password)) {
            if ($password !== $c_password) {
                $errors['password'] = 'Passwords do not match';
            }
        }

        // If no validation errors, proceed with update
        if (empty($errors)) {
            try {
                // Start building the SQL query
                $sql = "UPDATE accounts SET ";
                $params = [];
                $updates = [];

                // Only include fields that were provided
                if (!empty($f_name)) {
                    $updates[] = "f_name = :f_name";
                    $params[':f_name'] = $f_name;
                }
                if (!empty($l_name)) {
                    $updates[] = "l_name = :l_name";
                    $params[':l_name'] = $l_name;
                }
                if (!empty($school_id)) {
                    $updates[] = "school_id = :school_id";
                    $params[':school_id'] = $school_id;
                }
                if (!empty($email)) {
                    $updates[] = "email = :email";
                    $params[':email'] = $email;
                }
                if (!empty($password)) {
                    $updates[] = "password = :password";
                    $params[':password'] = password_hash($password, PASSWORD_BCRYPT);
                }

                if (!empty($updates)) {
                    $sql .= implode(", ", $updates);
                    $sql .= " WHERE school_id = :current_id";
                    $params[':current_id'] = $currentUserId;

                    $db->query($sql, $params);
                    
                    // Update session data
                    if (!empty($f_name)) $_SESSION['user']['f_name'] = $f_name;
                    if (!empty($l_name)) $_SESSION['user']['l_name'] = $l_name;
                    if (!empty($school_id)) $_SESSION['user']['school_id'] = $school_id;
                    if (!empty($email)) $_SESSION['user']['email'] = $email;

                    $_SESSION['success_message'] = 'Account information updated successfully!';
                }
            } catch (Exception $e) {
                $errors['database'] = "An error occurred while updating the information.";
            }
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }

    header('Location: /admin-settings');
    exit();
} else {
    abort(403);
}


