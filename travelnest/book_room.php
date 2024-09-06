<?php
session_start();
require('include/dbconfig.php');
require('include/links.php');

// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/SMTP.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';

if (isset($_POST['submit'])) {
    $hotel_name = trim($_POST["hotel_name"]);
    $room_no = trim($_POST["room_no"]);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $adults = $_POST['adult'];
    $children = $_POST['child'];
    $room_price = $_POST['room_price'];

    // Insert data into the booking table
    $insertQuery = "INSERT INTO booking (hotel_name, room_no, username, email, checkin, checkout, adult, children, total_amount) VALUES ('$hotel_name','$room_no','$username', '$email', '$checkin', '$checkout', '$adults', '$children', '$room_price')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        // Email content
        $subject = "Booking Confirmation";

        $message = "
        <html>
<head>
</head>

<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;'>
    <div class='container' style='max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
        <div class='header' style='text-align: center; margin-bottom: 20px; background-color: #2693d1; color: white; padding: 10px; border-radius: 10px 10px 0 0;'>
            <h1 style='color: white; margin-top: 5px;'>Booking Confirmation</h1>
        </div>
        <div class='details' style='margin-top: 20px; padding: 20px; background-color: #b1d3ff; border-radius: 0 0 10px 10px;'>
            <table style='width: 100%;'>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Username:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>$username</td>
                </tr>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Email:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>$email</td>
                </tr>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Hotel Name:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>$hotel_name</td>
                </tr>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Room No:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>$room_no</td>
                </tr>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Check-in:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>$checkin</td>
                </tr>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Check-out:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>$checkout</td>
                </tr>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Adults:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>$adults</td>
                </tr>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Children:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>$children</td>
                </tr>
                <tr>
                    <th style='padding: 10px; border-bottom: 1px solid #ddd; text-align: left; font-weight: bold;'>Total:</th>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>₹ $room_price</td>
                </tr>
            </table>
        </div>
        <div class='footer' style='text-align: center; background-color: #ffb627; color: white; padding: 20px; border-radius: 0 0 10px 10px;'>
            <h1 style='color: black; margin: 0;'>Thank you for booking with us!</h1>
        </div>
    </div>
</body>
</html>

        ";

        // SMTP configuration
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "travelnest794@gmail.com";
        $mail->Password = "tsqc ttdx zdip kcnv"; // Make sure this password is correct
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        // Set the sender email address
        $mail->SetFrom("travelnest794@gmail.com");

        // Set the recipient email address
        $mail->AddAddress($email);

        // Set the email format to HTML
        $mail->IsHTML(true);

        // Set the email subject and body
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            $_SESSION['booking_success'] = true;
            header("Location: index.php");
            exit();
        } else {
            // Email sending failed
            echo "<script>alert('Booking Fail: {$mail->ErrorInfo}')</script>";
            header("Location: index.php");
        }
    } else {
        // Handle the case where the form was not submitted properly
        echo "<script>alert('Invalid form submission')</script>";
    }
}
?>
