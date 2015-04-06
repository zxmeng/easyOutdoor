<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from = "easyoutdoor.310@gmail.com";
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Mailer = "smtp";
$mail->Host       = "ssl://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       = 465;                    // set the SMTP port
$mail->Username   = "easyoutdoor.310@gmail.com";  // SES SMTP  username
$mail->Password   = "lawrenceho";  // SES SMTP password
$mail->SetFrom($from, 'From Name');

$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);

if(!$mail->Send())
return false;
else
return true;

}
?>
