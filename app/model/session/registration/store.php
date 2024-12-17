<?php

use Core\Authenticator;
use Core\Session;
use Core\Validator;
use Http\Forms\RegisterForm;
use Model\App;
use Model\Database;

$school_id = $_POST["school_id"];
$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

echo "{$school_id}, {$email}, {$fname}, {$lname}, {$password}, {$confirm_password}";

// Debug: Print received data
error_log("Received registration data:");
error_log("School ID: " . $school_id);
error_log("Email: " . $email);
error_log("Name: " . $fname . " " . $lname);

$form = new RegisterForm;

$name = $fname . ' ' . $lname;

if ($form->validate($school_id, $email, $fname, $lname, $password, $confirm_password, $recaptchaResponse)) {
    echo "SUCCESS";
    error_log("Form validation passed");
    
    $auth = new Authenticator();
    $attempt_result = $auth->attempt($school_id, $password, 'r', $email, $name);
    error_log("Auth attempt result: " . $attempt_result);

    switch ($attempt_result) {
        case 0:
            error_log("Registration failed: Account already exists");
            $form->error('regexist', 'School ID or Email already used in an account. <br>Please try to login');
            break;
        case 1:
            error_log("Registration approved, attempting database insert");
            try {
                $activation_token = $auth->register($school_id, $email, $password, $lname, $fname);
                error_log("Database insert successful. Activation token: " . $activation_token);

                if (!$activation_token) {
                    throw new Exception("Failed to generate activation token");
                }

                $mail = require base_path('app/model/mailer.php');

                $mail->setFrom('ambitionxmbti@gmail.com', 'Zealia');
                $mail->addAddress($email);
                $mail->Subject = "Account Activation";
                $domain = $_SERVER['HTTP_HOST'];
                $mail->Body = "Click <a href='$domain/active-success?token=$activation_token'>Activate</a> to activate your account.";
                $mail->isHTML(true);

                try {
                    $mail->send();
                    error_log("Activation email sent successfully");
                    return redirect('/activate-account');
                } catch (Exception $e) {
                    error_log("Email sending failed: " . $mail->ErrorInfo);
                    echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                    exit;
                }
            } catch (Exception $e) {
                error_log("Registration error: " . $e->getMessage());
                $form->error('database', 'Failed to create account. Please try again. Error: ' . $e->getMessage());
            }
            break;
        default:
            error_log("Unexpected auth attempt result: " . $attempt_result);
            $form->error('auth', 'Authentication error. Please try again.');
            break;
    }
}

// Flash errors and old input data
Session::flash('errors', $form->errors());
Session::flash('old', [
    'school_id' => $school_id,
    'email' => $email,
    'fname' => $fname,
    'lname' => $lname
]);

return redirect('/register');