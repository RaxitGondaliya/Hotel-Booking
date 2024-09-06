<?php
require('include/db_config.php');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $cityId = $_GET['id'];

    $sql = "DELETE FROM cities WHERE id = $cityId";

    if ($con->query($sql) === TRUE) {
        // echo 'City deleted successfully';
        echo "<script>window.location.href = 'city.php';</script>";
    } else {
        echo 'Error deleting city: ' . $con->error;
    }
} else {
    echo 'Invalid city ID';
}

$con->close();
?>
