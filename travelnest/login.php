<?php
    session_start();
    // $connection= mysqli_connect('localhost','root','','hotel');
    require('include/dbconfig.php');

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);  

    $q1  = "select email,password from registration where email='$email' and password='$password'";
    $r1 = $connection->query($q1);

    $noor = $r1->num_rows;
    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

    if($noor == 1)
    {
        $_SESSION['userlogin'] = $email;
        $_SESSION['user_id'] = true;
        // $stmt=$connection->prepare("insert into login(email,password)values(?,?)");
        // $stmt->bind_param("ss",$email,$password);
        // $stmt->execute();
        echo"<script>alert('Login successfully')</script>";
        // echo "<script>window.location.href = 'index.php';</script>";

            // $_SESSION['userlogin'] = $email;
            if (!empty($referrer)) {
                header("Refresh: 0; URL=$referrer"); 
            } else {
                header("Refresh: 0; URL=index.php"); 
            }

    }
    else
    {
        echo"<script>alert('invalid email and pass')</script>";
        $_SESSION['userlogin'] != $email;
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>