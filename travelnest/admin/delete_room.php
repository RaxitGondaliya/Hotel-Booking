<?php
require('include/db_config.php');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM room_list WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        // echo 'City deleted successfully';
        echo "<script>window.location.href = 'rooms.php';</script>";
    } else {
        echo 'Error deleting hotel: ' . $con->error;
    }
} else {
    echo 'Invalid city ID';
}

$con->close();
?>
