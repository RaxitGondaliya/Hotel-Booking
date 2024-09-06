
<?php
    require('include/db_config.php');
   
    // $con = mysqli_connect("localhost","root","","hotel");
    if(isset($_POST['submit']))
    { 
         
    $admin_name = trim($_POST["admin_name"]);
    $admin_pass = trim($_POST["admin_pass"]);
    echo $admin_name."   ".$admin_pass;
        if($con->connect_error)
        {
            die('connection Failed :  '.$con->connect_error);
            header("Location: home.php");
        }
        else
        {
            $stmt=$con->prepare("insert into admin_cred(admin_name,admin_pass)values(?,?)");
            $stmt->bind_param("ss",$admin_name,$admin_pass);
            $stmt->execute();
            // echo"registration scuessfully";
            echo"<script>alert('Add scuessfully')</script>";
            $stmt->close();
            $con->close();
            // header("Location: index.php");
            echo "<script>window.location.href = 'home.php';</script>";
        }
    } 
?>