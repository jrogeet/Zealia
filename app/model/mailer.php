<?php

require base_path('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

 // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';
$mail->Port = 587;
$mail->Username   = 'ambitionxmbti@gmail.com';                     //SMTP username
$mail->Password   = 'hxkdxiaoovkruywu';   

$mail->isHTML(true);

return $mail;



// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'ambitionxmbti@gmail.com';                     //SMTP username
//     $mail->Password   = 'hxkdxiaoovkruywu';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('ambitionxmbti@gmail.com', 'Stacku');
//     $mail->addAddress('johnrogeeturqueza21@gmail.com', 'John');     //Add a recipient            //Name is optional



//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Playboi Copernicus';
//     $mail->Body    = 'On Skibidi';
//     $mail->AltBody = 'Fanum Tax-maxxing';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
