<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'proyectoyana@gmail.com';                 // SMTP username asturias.issabel.local@gmail.com
$mail->Password = 'proyectoYANA99';                           // SMTP password *ff@OW@QTnJn
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('dartcoupli@hotmail.com', 'Mailer');
$mail->addAddress('dartcoupli@hotmail.com', 'Joe User');     // Add a recipient
$mail->addAddress('dartcoupli@hotmail.com');               // Name is optional
$mail->addReplyTo('dartcoupli@hotmail.com', 'Information');
$mail->addCC('dartcoupli@hotmail.com');
$mail->addBCC('dartcoupli@hotmail.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>