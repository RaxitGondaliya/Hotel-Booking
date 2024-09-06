<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="" action="send.php"  method="post">
        Email<input type="email" name="email" value=""><br>
        Subject<input type="text" name="subject" value=""><br>
        Message<input type="text" name="message" value=""><br>
        <button type="submit" name="send">Send</button>
     </form>

</body>
</html>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/SMTP.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';
require('inc/esseentials.php');
adminLogin();
include 'inc/connection.inc.php';


if(isset($_POST["send"])){
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "voyagevista53@gmail.com";
	$mail->Password = "biymdqwufyqctxze"; 
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

	$mail->CharSet = 'UTF-8';

    $mail->SetFrom("voyagevista53@gmail.com");

    $mail->AddAddress( $contact_email);

    $mail->IsHTML(true);

    $mail->Subject = "Answer";
    $mail->Body = $_POST["message"];

    $mail->send();

echo"
<script>
alert('Sent Successfully ');
document.location.href = 'index.php';
</script>

";
}

?>