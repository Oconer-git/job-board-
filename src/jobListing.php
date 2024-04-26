<?php

include 'config.php';

if(isset($_POST['submit'])){

    $business = mysqli_real_escape_string($conn, $_POST['business']);
    $job = mysqli_real_escape_string($conn, $_POST['job']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $contractual = mysqli_real_escape_string($conn, $_POST['contractual']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    if($image_size > 200000){
        $message[] = 'image size is too large!';
    }else{
        $insert = mysqli_query($conn,"INSERT INTO `jobopening`(`business`, `job`, `location`, `salary`, `sex`, `contractual`, `desc`, `image`) VALUES ('$business','$job','$location','$salary','$sex','$contractual','$desc','$image')")or die('query failed');

        if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            header('location:profileEmp.php');
        }else{
            $message[] = 'uploading failed!';
        }
    }
}
?>