<?php

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$formcontent="From: $name \n Message: $message";
$recipient = "besher.service@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader);

?>