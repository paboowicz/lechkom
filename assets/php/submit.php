<?php
$your_email="s.lechowicz@lechkom.pl";

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
<?php
} else {
//formularz przesłano
//wysyłamy więc maila


require_once('class.phpmailer.php');

$mail = new PHPMailer();


$mail->IsSMTP(); // telling the class to use SMTP
$mail->CharSet = 'utf-8';
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->From       = "lechkomwww@gmail.com";
$mail->FromName   = "formularz";
$mail->SMTPAuth = true;
$mail->Username = 'lechkomwww@gmail.com';
$mail->Password = 'elsebek1983	';

//budujemy treśc maila
$bodyHtml = 'Imie:'.$_POST['name'].'<br />';
$bodyHtml.= 'email:'.$_POST['email'].'<br />';
$bodyHtml.= 'Pozostałe dane';
$mail->Subject    = 'Jakiś temat';
$mail->AltBody    = strip_tags($bodyHtml); // treść tekstowa
$mail->MsgHTML($bodyHtml);

//do kogo wysyłamy
$mail->AddAddress("lechkomwww@gmail.com");
if(!$mail->Send()) {
  echo "Blad wysylki: " . $mail->ErrorInfo;
} else {
  echo "Formularz wyslano";
}
}
?>
