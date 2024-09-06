<?php
require('include/db_config.php');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM admin_cred WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        // echo 'City deleted successfully';
        echo "<script>window.location.href = 'home.php';</script>";
    } else {
        echo 'Error deleting admin: ' . $con->error;
    }
} else {
    echo 'Invalid city ID';
}

$con->close();
?>
