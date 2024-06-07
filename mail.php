<?php
// require 'vendor/autoload.php'; // Ensure you have installed PHPMailer via Composer
require 'client.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'alaricsenpai86@gmail.com'; // Your Gmail email address
    $mail->Password   = 'senpaialaric86';   // Your Gmail password or App password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('intergrityloans@gmail.com', 'Mailer');
    $mail->addAddress($email, 'Joe User');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
