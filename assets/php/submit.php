<?php
$your_email="info@lechkom.pl";

if(!empty($_POST))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	$to      = $your_email;
	$subject = 'Contact Form : '.$subject;
	$headers = 'From: '.$name.' <'.$email.'>' . "\r\n";
	$message = $name.' sent you a message via the contact form :'."\r\n".$message;
	
	mail($to, $subject, $message, $headers);
}

?>