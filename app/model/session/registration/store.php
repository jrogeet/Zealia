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

$form = new RegisterForm;

// validate form inputs

if ($form->validate($school_id, $email, $fname, $lname, $password, $confirm_password))
{
    $auth = new Authenticator();
    switch ($auth->attempt($school_id, $password, 'r', $email))
    {
        case 0:
            $form->error('regexist', 'School ID or Email already used in an account. <br>Please try to login');
            break;
        case 1:
            // if not, save into the database
            
            $activation_token = $auth->register($school_id, $email, $password, $lname, $fname);

            $mail = require base_path('app/model/mailer.php');

            $mail->setFrom('ambitionxmbti@gmail.com', 'Zealia');
            $mail->addAddress($email);
            $mail->Subject="Account Activation";
            $mail->Body = <<< END
            
                Click <a href="riasec.test/active-success?token=$activation_token">Activate</a>
                to activate your account.
            END;

            try {
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                exit;
            }

            // then, redirect to login page
            // view("session/login/create.view.php", [
            //     "loginmessage" => "Account created successfully!"
            // ]);

            redirect('/activate-account');
            break;
    }
}

Session::flash('errors', $form->errors());

return redirect('/register');

// return view('session/registration/create.view.php', [
//     'errors' => $form->errors()
// ]);