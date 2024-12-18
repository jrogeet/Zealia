<?php

use Model\App;
use Model\Database;

$db = App::resolve(Database::class);


if (isset($_POST['email'])) {
    
    $email = $_POST['email'];
    $emailIsInRec = $db->query('SELECT email from accounts
    WHERE email = :email', [
        ':email' => $email
    ])->find();

    if($emailIsInRec) {
        $token = bin2hex(random_bytes(16));

        $token_hash = hash("sha256", $token);

        $expiry = date("Y-m-d H:i:s", time() + 60 * 30); // 30 minutes

        $db->query('UPDATE accounts SET reset_token_hash = :reset_hash,
        reset_token_expires_at = :reset_expiry WHERE email = :email', [
            ':reset_hash' => $token_hash,
            ':reset_expiry' => $expiry,
            ':email' => $email
        ]);

        $mail = require base_path('app/model/mailer.php');

        $mail->setFrom('ambitionxmbti@gmail.com', 'Zealia');
        $mail->addAddress($email);
        $domain = $_SERVER['HTTP_HOST'];
        $mail->Subject="Password Reset";
        $mail->Body = <<< END
        
            Click <a href="$domain/reset?token=$token">Reset Password</a>
            to reset your password.
            <br>
            <br>
            This link will expire in 30 minutes.
        END;

        try {
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }

    }

    $sent = true;

    view('session/login/forgot.view.php', [
        'sent' => $sent
    ]);
}

