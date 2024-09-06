<?php 

    require('include/essentils.php');

    session_start();
    session_destroy();
    redirect('index.php');

?>