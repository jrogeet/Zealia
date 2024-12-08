<?php

use Core\Validator;

use Model\Database;
use Model\App;

$db = App::resolve(Database::class);

if (isset($_POST['create'])) {
    unset($_POST['create']);
    $encoded_accounts = $_POST['encoded_accounts'] ?? '[]';
    $encoded_students = $_POST['encoded_students'] ?? '[]';
    $encoded_instructors = $_POST['encoded_instructors'] ?? '[]';
    
    // Ensure we have valid JSON, default to empty array if decode fails
    $accounts = json_decode($encoded_accounts, true) ?? [];

    $account_type = $_POST['account_type'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $school_id = $_POST['school_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Check for existing school ID or email
    $idExists = false;
    $emailExists = false;
    
    // Only check for duplicates if we have existing accounts
    if (!empty($accounts)) {
        foreach($accounts as $account) {
            if ($account['school_id'] === $school_id) {
                $idExists = true;
                break;
            }
            if ($account['email'] === $email) {
                $emailExists = true;
                break;
            }
        }
    }

    if ($idExists) {
        view('admin/accounts/admin-accounts.view.php', [
            'accounts' => $accounts,
            'students' => json_decode($encoded_students, true) ?? [],
            'instructors' => json_decode($encoded_instructors, true) ?? [],
            'encoded_accounts' => $encoded_accounts,
            'encoded_students' => $encoded_students,
            'encoded_instructors' => $encoded_instructors,
            'idExists' => true
        ]);
        exit();
    }

    if ($emailExists) {
        view('admin/accounts/admin-accounts.view.php', [
            'accounts' => $accounts,
            'students' => json_decode($encoded_students, true) ?? [],
            'instructors' => json_decode($encoded_instructors, true) ?? [],
            'encoded_accounts' => $encoded_accounts,
            'encoded_students' => $encoded_students,
            'encoded_instructors' => $encoded_instructors,
            'emailExists' => true
        ]);
        exit();
    }

    // If no duplicates found, proceed with account creation
    $activation_token = bin2hex(random_bytes(16));
    $activation_token_hash = hash("sha256", $activation_token);

    try {
        $db->query("INSERT INTO accounts(school_id, email, password, l_name, f_name, account_type, account_activation_hash)
        VALUES(:school_id, :email, :password, :l_name, :f_name, :account_type, :activation_token_hash)", [
            ':school_id'=> $school_id,
            ':email'=> $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
            ':l_name'=> $l_name,
            ':f_name'=> $f_name,
            ':account_type'=> $account_type,
            ':activation_token_hash' => $activation_token_hash
        ]);

        // Fetch updated accounts after successful creation
        $updatedAccounts = $db->query("SELECT * FROM accounts WHERE account_type != 'admin'")->findAll();
        
        $updatedStudents = [];
        $updatedInstructors = [];
        foreach ($updatedAccounts as $account) {
            if ($account['account_type'] === "student") {
                $updatedStudents[] = $account;
            } elseif ($account['account_type'] === "instructor") {
                $updatedInstructors[] = $account;
            }
        }

        view('admin/accounts/admin-accounts.view.php', [
            'accounts' => $updatedAccounts,
            'students' => $updatedStudents,
            'instructors' => $updatedInstructors,
            'encoded_accounts' => json_encode($updatedAccounts),
            'encoded_students' => json_encode($updatedStudents),
            'encoded_instructors' => json_encode($updatedInstructors),
            'success' => true
        ]);
        exit();

    } catch (PDOException $e) {
        // Handle database errors
        error_log($e->getMessage());
        header('location: /admin-accounts?error=database');
        exit();
    }
}