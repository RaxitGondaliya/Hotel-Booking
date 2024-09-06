<?php
require('include/db_config.php');

if(isset($_POST['submit']))
{ 
    $id = $_POST['id'];
    $room_no = trim($_POST["room_no"]);
    $room_name = trim($_POST["room_name"]);
    $room_img = trim($_POST["room_img"]);
    $room_price = trim($_POST["room_price"]);
    $hotel_id = trim($_POST["hotel_id"]);
     
    if($con->connect_error)
    {
        die('Connection Failed : ' . $con->connect_error);
        header("Location: home.php");
    }
    else    
    {
        // Use prepared statement to avoid SQL injection
        $stmt = $con->prepare("UPDATE room_list  SET room_no=?, room_name=?,room_img=?, room_price=?, hotel_id=? WHERE id=?");
        $stmt->bind_param("ssssii", $room_no, $room_name, $room_img, $room_price, $hotel_id, $id);
        
        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Edit successful')</script>";
            echo "<script>window.location.href='room_list.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
        $con->close();
    }
}
?>

