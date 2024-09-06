<?php
require('include/db_config.php');

if(isset($_POST['submit']))
{ 
    $id = $_POST['id'];
    $city = trim($_POST["city"]);
    $img = trim($_POST["img"]);
    $caption = trim($_POST["caption"]);
     
    if($con->connect_error)
    {
        die('Connection Failed : ' . $con->connect_error);
        header("Location: home.php");
    }
    else    
    {
        // Use prepared statement to avoid SQL injection
        $stmt = $con->prepare("UPDATE cities SET city=?, img=?, caption=? WHERE id=?");
        $stmt->bind_param("sssi", $city, $img, $caption, $id);
        
        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Edit successful')</script>";
            echo "<script>window.location.href='city.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
        $con->close();
    }
}
?>

