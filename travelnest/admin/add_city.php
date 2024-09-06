<?php
    require('include/db_config.php');
   
    // $con = mysqli_connect("localhost","root","","hotel");
    if(isset($_POST['submit']))
    { 
         
    $add_city = trim($_POST["city"]);
    $img_link = trim($_POST["img_link"]);
    $caption = trim($_POST["caption"]);
        if($con->connect_error)
        {
            die('connection Failed :  '.$con->connect_error);
            header("Location: home.php");
        }
        else
        {
            $stmt=$con->prepare("insert into cities(city,img,caption)values(?,?,?)");
            $stmt->bind_param("sss",$add_city,$img_link,$caption);
            $stmt->execute();
            // echo"registration scuessfully";
            echo"<script>alert('Add scuessfully')</script>";
            $stmt->close();
            $con->close();
            // header("Location: index.php");
            echo "<script>window.location.href = 'city.php';</script>";
        }
    } 
?>