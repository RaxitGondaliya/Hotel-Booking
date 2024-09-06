<?php
    require('include/db_config.php');
   
    // $con = mysqli_connect("localhost","root","","hotel");
    if(isset($_POST['submit']))
    { 
         
    $hotel_name = trim($_POST["hotel_name"]);
    $hotel_img = trim($_POST["hotel_img"]);
    $address = trim($_POST["address"]);
    $location = trim($_POST["location"]);
    $room_price = trim($_POST["room_price"]);
    $city_id = trim($_POST["city_id"]);
        if($con->connect_error)
        {
            die('connection Failed :  '.$con->connect_error);
            header("Location: home.php");
        }
        else
        {
            $stmt=$con->prepare("insert into hotel_list(hotel_name,hotel_img,address,location,room_price,city_id)values(?,?,?,?,?,?)");
            $stmt->bind_param("sssssi",$hotel_name,$hotel_img,$address,$location,$room_price,$city_id);
            $stmt->execute();
            // echo"registration scuessfully";
            echo"<script>alert('Add scuessfully')</script>";
            $stmt->close();
            $con->close();
            // header("Location: index.php");
            echo "<script>window.location.href = 'hotel_list.php';</script>";
        }
    } 
?>