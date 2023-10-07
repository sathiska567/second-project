<?php
require __DIR__.'/PHPMailer/Exception.php';
require __DIR__.'/PHPMailer/PHPMailer.php';
require __DIR__.'/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Retrieve form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$businessName = $_POST['business-name'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$paymentMethod = $_POST['payment-method'];
$payPhone = $_POST['pay-phone'];
$payEmail = $_POST['pay-email'];

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
$mail->setFrom($email, $firstname); // Replace with your email and name
$mail->addAddress('contact@ivyhero.org', 'Johnr Gaetano'); // Replace with recipient email and name


// Email content
$mail->isHTML(true);
$mail->Subject = 'Affiliate Form';
$mail->Body = "
    First Name: $firstname<br>
    Last Name: $lastname<br>
    Business Name: $businessName<br>
    Address: $address<br>
    Address 2: $address2<br>
    City: $city<br>
    State: $state<br>
    ZIP: $zip<br>
    Email: $email<br>
    Phone: $phone<br>
    Payment Method: $paymentMethod<br>
    Pay Phone: $payPhone<br>
    Pay Email: $payEmail<br>
";

// Send the email
echo ($mail->send()) ? 'success' : 'error';
?>