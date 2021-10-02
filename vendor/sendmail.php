<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php';
require_once '../resources/php/init.php';

$mail = new PHPMailer(true);
try {

  $email = $_GET['email'];
  $user_Cnumber = $_GET['user_Cnumber'];
  $quarantine_date = $_GET['quarantine_date'];
  // $user_Cnumber = $_GET['user_Cnumber'];
  $emails = explode(",",$email);
  foreach ($emails as $email) {
    $body = "You may have been in contact with a COVID-19 positive. Your quarantine may end on $quarantine_date.";
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contact.tracing.sms@gmail.com';
    $mail->Password   = 'contacttracingsms';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('contact.tracing.sms@gmail.com');
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'RFID-BASED CONTACT TRACING';
    $mail->Body    = $body;

    $mail->send();
    header('Location: ../send_sms.php?quarantine_date='.$quarantine_date.'&user_Cnumber='.$user_Cnumber);
  }
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}