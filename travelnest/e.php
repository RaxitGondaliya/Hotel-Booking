<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - HOTELS</title>
    
  <?php require('include/links.php')?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
</head>
<body class="bg-light">
    <!---------------- header ---------------> 
        <?php require('include/header.php')?>

     <div class="my-5 px-4">
        <h2 Class=" fw-bold text-center ">HOTELS</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container ">
        <div class="row justify-content-center"> 
        
        <!---------------------------  ------------------------------>
            <div class="col-lg-9 col-md-12 px-4 ">   

        <?Php
            require('include/dbconfig.php');

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedCity = $_POST['city'];

            //$query = "select * from hotel_list";
            //$query = "SELECT * FROM hotel_list WHERE city = '$selectedCity'";
            $query = "SELECT hotel_list.*, cities.city FROM hotel_list
              JOIN cities ON hotel_list.city_id = cities.id
              WHERE cities.city = '$selectedCity'";
            $query_run = mysqli_query($connection,$query);
            $hotel = mysqli_num_rows($query_run);

            if($hotel>0)
            {
              while($row = mysqli_fetch_assoc($query_run))
              {
        ?>

                <div class="card mb-4 border-0 shadow" >
                    <div class="row g-0 p-3 ">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3" >
                            <img src="<?php echo $row['hotel_img'] ?>"  height="300px"  width="360px" class="img-fluid rounded " ></img>
                        </div>
                        
                        <div class="col-md-4 px-lg-3 px-md-3 px-0 ">
                            <h5 class="mb-3 mt-3 ms-3"><?php echo $row['hotel_name'] ?> </h5>
                            <h6 class="mb-3 mt-3 ms-3"> <img src="https://cdn-icons-png.flaticon.com/128/2838/2838912.png" height="18px" width="18px"></img> Ahemdabad >> Gujrat</h6>
                            
                            <div class=" mt-5 border text-center ms-3" style="background-color:#CAE9E0; border-radius:10px; padding:5px 8px; display:inline-flex;"> 
                                <span class=""> <img src="https://cdn-icons-png.flaticon.com/128/8832/8832108.png" height="20px" width="20px"></img></span>
                                <span  class="fw-bold ms-2 mt-1" style="color:#008631;font-size:12px;">  Free Cancellation </span>
                            </div>

                            <div class="mt-3 border text-center ms-2" style="background-color:#CECBD6; border-radius:20px; padding:5px 8px; display:inline-flex;">
                                <span class=""><img src="https://hotels.easemytrip.com/newhotel/images/discount-logo.svg" width="16" height="16"></span>
                                <span class="fw-bold ms-2 mt-1" style="font-size:12px;">EMTSTAY Discount Applied</span>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex flex-column  text-center">
                            <div class="  mt-2 border "  style="background-color:#187bcd; border-radius:10px; padding:3px 6px;  "> 
                                <span class="" style=""> <img src="https://cdn-icons-png.flaticon.com/128/2977/2977921.png" height="18px" width="18px"></img></span>
                                <span  class="fw-bold ms-2" style="color:white;font-size:12px;"> offer of the Day </span>
                            </div>
                            <div class="justify-content-end mt-5">
                                <h5 class="mb-2 "><?php echo $row['room_price'] ?></h5>
                                <h6 class="mb-2 "> per night</h6>
                                <a href="rooms.php" class="btn btn-sm w-100 shadow-none mt-4 fw-bold" style="font-size:20px;background-color:orange;border-radius:10px;">View Room</a>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
              }
            }
            else{
            echo "no recored found";
            }

        }
        ?>

            </div>
        
            
        </div>
    </div>



     <!--------------- footer -------------------->
    <?php require('include/footer.php')?>
</body>
</html>







<!-- booking after send the msg to user -->
                                                                   

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data and book the room

    // Assuming you have variables like $userEmail, $userPhoneNumber, $bookingDetails, etc.
    
    // Perform the booking logic here
    
    // Send email notification
    $toEmail = $userEmail;
    $subject = "Hotel Booking Confirmation";
    $message = "Thank you for booking with us! Your booking details: $bookingDetails";
    $headers = "From: your-email@example.com"; // Set your email address here

    mail($toEmail, $subject, $message, $headers);

    // Send SMS notification (replace with actual SMS integration)
    $toPhoneNumber = $userPhoneNumber;
    $smsMessage = "Thank you for booking with us! Your booking details: $bookingDetails";
    sendSMS($toPhoneNumber, $smsMessage); // Implement sendSMS() as needed

    // Display success message to the user
    echo "Booking successful! Check your email and phone for confirmation.";
}
?>

<!-- Your HTML form for room booking goes here -->
<form method="post" action="your_booking_page.php">
    <!-- Your form fields go here -->

    <button type="submit">Book Room</button>
</form>


<?php
session_start();
require('include/dbconfig.php');

// Assuming you have included the necessary functions for sending emails

if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $adults = $_POST['adult'];
    $children = $_POST['child'];

    // Insert data into the booking table
    $insertQuery = "INSERT INTO booking (username, email, checkin, checkout, adults, children) VALUES ('$username', '$email', '$checkin', '$checkout', '$adults', '$children')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        // Booking successful, send confirmation email
        $subject = "Booking Confirmation";
        $message = "Thank you for booking! Your booking details:\n\nUsername: $username\nEmail: $email\nCheck-in: $checkin\nCheck-out: $checkout\nAdults: $adults\nChildren: $children";
        // Replace the following line with your email-sending function
        mail($email, $subject, $message);

        // You can redirect the user to a thank-you page or perform other actions as needed
        header("Location: thank_you_page.php");
        exit();
    } else {
        // Handle the case where insertion into the booking table fails
        echo "Booking failed. Please try again.";
    }
} else {
    // Handle the case where the form was not submitted properly
    echo "Invalid form submission.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url=index.php">
    <title>Thank You for Booking</title>
</head>
<body>
    <h1>Thank You for Booking!</h1>
    <p>Your booking was successful. You will be redirected to the home page shortly.</p>
</body>
</html>

<!-- HTML for a button triggering the booking process -->
<button onclick="checkLoginAndRedirect()">Book Now</button>

<script>
    function checkLoginAndRedirect() {
        // Check if the user is logged in
        if (isLoggedIn()) {
            // User is already logged in, redirect to booking page
            window.location.href = "booking.php";
        } else {
            // User is not logged in, prompt to login or register
            var response = confirm("You need to login or register to book a room. Do you want to proceed?");
            if (response == true) {
                // Redirect to login page
                window.location.href = "login.php";
            } else {
                // Redirect to registration page
                window.location.href = "registration.php";
            }
        }
    }

    // Placeholder function to check if user is logged in
    function isLoggedIn() {
        // Implement your logic to check if the user is logged in
        // This might involve checking session variables, cookies, or tokens
        // Return true if logged in, false otherwise
        return false; // Replace with actual check
    }
</script>



<script>
    // Check if the user is logged in
    function checkLogin() {
        // Assume you have a session or a token indicating the user is logged in
        var isLoggedIn = true; // Replace this with your actual check

        // If the user is logged in, proceed with booking
        if (isLoggedIn) {
            // Redirect or proceed with booking process
            window.location.href = "booking.php";
        } else {
            // If the user is not logged in, show a message or redirect to the login page
            alert("Please log in to proceed with booking.");
            // You can redirect to the login page
            // window.location.href = "login.php";
        }
    }
</script>

<!-- Example button to trigger the checkLogin function -->
<button onclick="checkLogin()">Book Now</button>

<!-- booking.php -->

<?php

    $con = mysqli_connect("localhost","root","","hotel");
    
    if(isset($_POST['submit']))
    { 
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $checkin = trim($_POST["checkin"]);
        $checkout = trim($_POST["checkout"]);
        $adult = trim($_POST["adult"]);
        $child = trim($_POST["child"]);

            if($con->connect_error)
            {
                 die('connection Failed :  '.$con->connect_error);
                 header("Location: index.php");
            }
            else
            {
                $stmt=$con->prepare("insert into booking (name,email,checkin,checkout,adult,child)values(?,?,?,?,?,?)");
                $stmt->bind_param("ssssii",$name,$email,$checkin,$checkout,$adult,$child);
                $stmt->execute();
                $stmt->close();
                $con->close();
                echo"<script>alert('Booking successfully')</script>";
                echo "<script>window.location.href = 'index.php';</script>";
            }
    }
?>


<?php
require('include/dbconfig.php');

// Retrieve hotel_id from the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to fetch hotel details based on the hotel_id
    $hotelQuery = "SELECT * FROM hotel_list WHERE id = '$id'";
    $hotelResult = mysqli_query($connection, $hotelQuery);

    // Check if hotel details are found
    if(mysqli_num_rows($hotelResult) > 0) {
        $hotelRow = mysqli_fetch_assoc($hotelResult);
    } else {
        echo "Hotel details not found";
    }

    // Query to fetch room details based on the hotel_id
    $roomQuery = "SELECT * FROM room_list WHERE id = '$id'";
    $roomResult = mysqli_query($connection, $roomQuery);

    // Check if room details are found
    if(mysqli_num_rows($roomResult) > 0) {
        $roomRow = mysqli_fetch_assoc($roomResult);
    } else {
        echo "Rooms not available";
    }
}
?>

<!-- Inside the booking form -->
<input type="hidden" name="hotel_name" value="<?php echo $hotelRow['hotel_name']; ?>">
<input type="hidden" name="room_no" value="<?php echo $roomRow['room_no']; ?>">

<?php
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Retrieve the user's email from the session
    $userEmail = $_SESSION['user_email'];
    // Redirect to booking.php with the email as a parameter
    header("Location: booking.php?email=$userEmail");
    exit();
}
?>

<?php
// Check if the email parameter is set in the URL
if (isset($_GET['email'])) {
    // Get the email from the URL parameter
    $userEmail = $_GET['email'];
    // Query the registration table to fetch the username based on the email
    $query = "SELECT username FROM registration WHERE email = '$userEmail'";
    $result = mysqli_query($connection, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the username from the result
        $row = mysqli_fetch_assoc($result);
        $userName = $row['username'];
    } else {
        // If user information is not found, set the username to an empty string
        $userName = '';
    }
} else {
    // If the email parameter is not set, set the username to an empty string
    $userName = '';
}
?>

<div class="col-md-6">
    <div class="mt-1">
        <label class="form-label" style="font-weight:500;">Your Name</label>
        <!-- Display the username in the input field -->
        <input type="text" class="form-control" name="username" value="<?php echo $userName; ?>">
    </div>
</div>
<div class="col-md-6">
    <div class="mt-1">
        <label class="form-label" style="font-weight:500;">Your Email</label>
        <!-- Display the email from the URL parameter -->
        <input type="email" class="form-control" name="email" value="<?php echo $userEmail; ?>">
    </div>
</div>






<?php
session_start();
require('include/dbconfig.php');
require('include/links.php');

// Assuming you have included the necessary functions for sending emails
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

    // Insert data into the booking table
    $insertQuery = "INSERT INTO booking ( hotel_name, room_no, username, email, checkin, checkout, adult, children) VALUES ('$hotel_name','$room_no','$username', '$email', '$checkin', '$checkout', '$adults', '$children')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {

        // Retrieve form data
        $subject = "Booking Confirmation";
        $message = "Thank you for booking! Your booking details:\n\nUsername: $username\nEmail: $email\nCheck-in: $checkin\nCheck-out: $checkout\nAdults: $adults\nChildren: $children";
        // Replace the following line with your email-sending function
        // $from = "eseymacktrip.com"
        $headers = 'From : travelnest.com';

        
        $mail = new PHPMailer();

        // SMTP configuration
       // SMTP configuration
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "travelnest794@gmail.com";
        $mail->Password = "tsqc ttdx zdip kcnv"; // Make sure this password is correct
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->CharSet = 'UTF-8';

        // Set the sender email address
        $mail->SetFrom("travelnest794@gmail.com"); // Replace "Your Name" with your name

        // Set the recipient email address
        $mail->AddAddress($email);

        // Set the email format to HTML
        $mail->IsHTML(true);

        // Set the email subject and body
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $message;

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            $_SESSION['booking_success'] = true;
            // echo "<script>alert('Booking successfully')</script>";
            header("Location: index.php");
            exit();
        } else {
            // Email sending failed
            echo "<script>alert('Booking Fail: {$mail->ErrorInfo}')</script>";
            header("Location: index.php");
        }

    }} else {
        // Handle the case where the form was not submitted properly
        // echo "Invalid form submission.";
        echo"<script>alert('Invalid form submission')</script>";
}

?>
