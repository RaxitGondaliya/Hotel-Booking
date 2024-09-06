<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/PHPMailer.php';

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

    $mail->AddAddress($_POST["email"]);

    $mail->IsHTML(true);

    $mail->Subject = $_POST["subject"];
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