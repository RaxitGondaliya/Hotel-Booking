<?php
require('include/db_config.php');

if(isset($_POST['submit']))
{ 
    $id = $_POST['id'];
    $hotel_name = trim($_POST["hotel_name"]);
    $hotel_img = trim($_POST["hotel_img"]);
    $address = trim($_POST["address"]);
    $location = trim($_POST["location"]);
    $room_price = trim($_POST["room_price"]);
    $city_id = trim($_POST["city_id"]);
    
    if($con->connect_error)
    {
        die('Connection Failed : ' . $con->connect_error);
        header("Location: home.php");
    }
    else    
    {
        // Use prepared statement to avoid SQL injection
        $stmt = $con->prepare("UPDATE hotel_list SET hotel_name=?, hotel_img=? ,address=?,location=?, room_price=? , city_id=? WHERE id=?");
        $stmt->bind_param("sssssii", $hotel_name,$hotel_img, $address,$location, $room_price, $city_id, $id);
        
        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Edit successful')</script>";
            echo "<script>window.location.href='hotel_list.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
        $con->close();
    }
}
?>



