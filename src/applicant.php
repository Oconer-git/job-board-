<?php

include 'config.php';

if (isset($_POST['confirm'])) {
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fileUpload = mysqli_real_escape_string($conn, $_POST['fileUpload']);
    
    $insert = mysqli_query($conn, "INSERT INTO `applicant`(fullName, contact, email, fileUpload) VALUES ('$fullName', '$contact', '$email', '$fileUpload')") or die('query failed');

}

?>