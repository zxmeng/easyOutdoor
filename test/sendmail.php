<?php
require 'PHPmailer/Send_Mail.php';
$to = "hck.lawrence@gmail.com";
$subject = "Test Mail SubjectYOYOYOYO";
$body = "Hi<br/>Test Mail<br/>Amazon SES"; // HTML  tags
Send_Mail($to,$subject,$body);
?>