<?php
    // session_start()
    // $con = mysqli_connect("localhost","root","","hotel");
    require('include/dbconfig.php');
    if(isset($_POST['submit']))
    { 
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $pno = trim($_POST["pno"]);
        $pic = trim($_POST["pic"]);
        $address = trim($_POST["address"]);
        $pincode = trim($_POST["pincode"]);
        $dob = trim($_POST["dob"]);
        $password = trim($_POST["password"]);
        $cpassword = trim($_POST["cpassword"]);

        if($password == $cpassword)
        {
            if($connection->connect_error)
            {
                 die('connection Failed :  '.$connection->connect_error);
                 header("Location: index.php");
            }
            else
            {
                $stmt=$connection->prepare("insert into registration (username,email,pno,pic,address,pincode,dob,password)values(?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssssss",$username,$email,$pno,$pic,$address,$pincode,$dob,$password);
                $stmt->execute();
                // echo"registration scuessfully";
                echo"<script>alert('registration scuessfully')</script>";
                $stmt->close();
                $connection->close();
                // header("Location: index.php");
                echo "<script>window.location.href = 'index.php';</script>";
            }
        }
        else{
            // echo "Password does not match";
            // header("Location: index.php");
            echo"<script>alert('Password does not match')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }

?>
