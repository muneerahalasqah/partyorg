<?php
use PHPMailer\PHPMailer\PHPMailer;
include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $subject="From: ".$name;
    $email=$_POST['email'];
    $message=$_POST['message'];
    
    $mail = new PHPMailer();
    $mail->addAddress('besher.service@gmail.com');
    $mail->setFrom($email);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    
    if($mail->send())
        echo "sent succefully";
    else
        $mail->ErrorInfo;
}

?>