<?php

    include 'config.php';
    session_start();
    $emp_id = $_SESSION['emp_id'];

    if(!isset($emp_id)){
    header('location:emplogin.php');
    };

    if(isset($_GET['logout'])){
    unset($emp_id);
    session_destroy();
    header('location:emplogin.php');
    }

?>