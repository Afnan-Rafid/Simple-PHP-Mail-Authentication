<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer-master/src/Exception.php';
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';

function sendMail($email,$subject,$message){

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = getenv("SMTP_EMAIL");
$mail->Password = getenv("SMTP_PASSWORD");
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->setFrom('afnanrafid049@gmail.com','Afnan Rafid');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

}