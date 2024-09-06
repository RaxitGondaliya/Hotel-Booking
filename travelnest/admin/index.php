<?php 
    require('include/essentils.php');
    require('include/db_config.php');

    session_start();
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
        redirect('home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    
    <?php require('include/links.php')?>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-light"> 

    <div class="login-form text-center rounded bg-white shadow overflow-hidden ">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Admin Login Panel</h4>
            <div class="p-4">
            <div class="mb-3">
                <input name="admin_name"required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
              </div>
              <div class="mb-4">
                <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
              </div>
              <button name="login" type="submit" class="btn text-white coustem-bg shadow-none">Login</button>
            </div>
        </form>
    </div>

    <?php 
        if(isset($_POST['login']))
        {
            $admin_name = $_POST['admin_name'];
            $admin_pass = $_POST['admin_pass'];

            $query = "SELECT * FROM `admin_cred` WHERE `admin_name` = ? AND `admin_pass` = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ss", $admin_name, $admin_pass);
            mysqli_stmt_execute($stmt);

            $res = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($res) == 1){
                $row = mysqli_fetch_assoc($res);
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminId'] = $row['id'];
                redirect('home.php');
            }
            else{
                alert('error','Login failed - Invalid Credentials!');
            }

            mysqli_stmt_close($stmt);
        }
    ?>    
</body>
</html>