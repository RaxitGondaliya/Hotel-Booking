<?php
require('include/db_config.php');

if(isset($_POST['submit']))
{ 
    $id = $_POST['id'];
    $admin_name = trim($_POST["admin_name"]);
    $admin_pass = trim($_POST["admin_pass"]);
    
    if($con->connect_error)
    {
        die('Connection Failed : ' . $con->connect_error);
        header("Location: home.php");
    }
    else    
    {
        // Use prepared statement to avoid SQL injection
        $stmt = $con->prepare("UPDATE admin_cred SET admin_name=?, admin_pass=? WHERE id=?");
        $stmt->bind_param("ssi", $admin_name, $admin_pass, $id);
        
        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Edit successful')</script>";
            echo "<script>window.location.href='home.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
        $con->close();
    }
}
?>



