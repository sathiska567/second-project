<?php
require __DIR__.'/PHPMailer/Exception.php';
require __DIR__.'/PHPMailer/PHPMailer.php';
require __DIR__.'/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Retrieve form data
$wifi = (isset($_POST['hero-wifi'])) ? $_POST['hero-wifi'] : 'False';
$tablet = (isset($_POST['hero-tablet'])) ? $_POST['hero-tablet'] : 'False';
$healthcare = (isset($_POST['hero-healthcare'])) ? $_POST['hero-healthcare'] : 'False';
$utilities = (isset($_POST['hero-utilities'])) ? $_POST['hero-utilities'] : 'False';
$email = $_POST['hero-email'];
$zip = $_POST['hero-zip'];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'mail.freegovservices.com'; // Replace with your SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'service@freegovservices.com'; // Replace with your email address
$mail->Password = 'QY)0izmMsXVA'; // Replace with your email password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;
$mail->IsHTML(true); 

// Sender and recipient settings
$mail->setFrom($email, "User"); // Replace with your email and name
$mail->addAddress('contact@ivyhero.org', 'Johnr Gaetano'); // Replace with recipient email and name


// Email content
$mail->isHTML(true);
$mail->Subject = 'Hero Form';
$mail->Body = "
    WiFi: $wifi<br>
    Tablet: $tablet<br>
    Healthcare: $healthcare<br>
    Utilities: $utilities<br>
    Email: $email<br>
    ZIP: $zip<br>
";

// Send the email
echo ($mail->send()) ? 'success' : 'error';
?>