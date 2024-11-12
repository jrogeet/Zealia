<?php

use Model\App;
use Model\Database;
use Model\Logger;
use Core\Validator;

$db = App::resolve(Database::class);
$logger = new Logger($db);

$token = $_POST["token"];
$password = $_POST["password"];
$confirm_password = $_POST["password_confirmation"];


$token_hash = hash("sha256", $token);

$account = $db->query("SELECT * FROM accounts
            WHERE reset_token_hash = :reset_hash", [
                ":reset_hash" => $token_hash,
            ])->find();


if (! $account) {
    die("Invalid or expired token");
}

if (strtotime($account["reset_token_expires_at"]) <= time()) {
    die("Token expired");
}

$errors = [];

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password with a minimum length of 7 characters.';
} 

if ( ! preg_match("/[a-z]/i", $password)) {
    $errors['password-letter'] = 'Password must contain at least one letter';
}

if (! preg_match("/[0-9]/", $password)) {
    $errors['password-number'] = 'Password must contain at least one number';
}

if ($password !== $confirm_password) {
    $errors['password-confirm'] = 'Please confirm if the password match!';
}


if(! empty($errors)) {
    return view('session/login/reset-password.view.php', [
        'errors' => $errors,
        'token' => $token,
    ]);
}

$pass_hash = password_hash($password, PASSWORD_DEFAULT);

$db->query("UPDATE accounts SET password = :pass 
            WHERE reset_token_hash = :reset_hash ", [
    ":pass" => $pass_hash,
    ":reset_hash" => $token_hash
]);

$logger->log(
    'PASSWORD RESET',
    'success',
    'user',
    $account['school_id'],
);

$mail = require base_path('app/model/mailer.php');

$mail->setFrom('ambitionxmbti@gmail.com', 'AMBITION');
$mail->addAddress($account["email"]);
$mail->Subject="Password Changed Successfully";
$mail->Body = <<< END

    Your password has been changed successfully!
    <br>
    <br>
    {$account["f_name"]} {$account["l_name"]}
    <br>
    {$account["school_id"]}
END;

try {
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
}

header("Location: /login");
exit();