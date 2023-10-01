<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
 
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
 
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug  = 0; 
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'meetri.test@gmail.com';                     //SMTP username
    $mail->Password   = 'sjfvznswfdkodxic';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
    //Recipients
    $mail->setFrom('noreply@meetri.in', 'Meetri Mailer');
    $mail->addAddress('hi@icheckify.co.in', 'icheckify');     //Add a recipient email address and name 
   
 
 
    $to = 'meetri.in@gmail.com';
    $name = $_POST["name"];
    $email= $_POST["email"];
    $text= $_POST["message"];
    $subject= $_POST["subject"];

    $message =$_POST["message"];

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'ichekify | Signup form filled';
    $mail->Body    = '<table style="width:100%">
    <tr><td><b>Hello Team iCheckify</b></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td><b>Following are details of filled contact form:</b></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td><b>Name :</b> '.$name.'</td></tr>
    <tr><td><b>Email :</b> '.$email.'</td></tr>
    <tr><td><b>Subject :</b> '.$subject.'</td></tr>
    <tr><td><b>Message :</b> '.$message.'</td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td><b>Take Action accordingly!</b></td></tr>
    <tr><td><b>Have a nice day!</b></td></tr>
    </table>';
 
    //$mail->send();
    if(@($mail->Send())){
    echo 'Message has been sent';
    }
    else {
	echo "Message could not be sent";
}

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>