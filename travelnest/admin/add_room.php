<?php
    require('include/db_config.php');
   
    // $con = mysqli_connect("localhost","root","","hotel");
    if(isset($_POST['submit']))
    { 
         
    $room_no = trim($_POST["room_no"]);
    $room_name = trim($_POST["room_name"]);
    $room_img = trim($_POST["room_img"]);
    $room_price = trim($_POST["room_price"]);
    $hotel_id = trim($_POST["hotel_id"]);
        if($con->connect_error)
        {
            die('connection Failed :  '.$con->connect_error);
            header("Location: home.php");
        }
        else
        {
            $stmt=$con->prepare("insert into room_list(room_no,room_name,room_img,room_price,hotel_id)values(?,?,?,?,?)");
            $stmt->bind_param("ssssi",$room_no,$room_name,$room_img,$room_price,$hotel_id);
            $stmt->execute();
            // echo"registration scuessfully";
            echo"<script>alert('Add scuessfully')</script>";
            $stmt->close();
            $con->close();
            // header("Location: index.php");
            echo "<script>window.location.href = 'room_list.php';</script>";
        }
    } 
?>