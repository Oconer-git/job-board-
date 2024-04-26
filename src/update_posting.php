<?php
include 'config.php';
if(isset($_POST['update_post'])){

    $update_business = mysqli_real_escape_string($conn, $_POST['update_business']);
    $update_job = mysqli_real_escape_string($conn, $_POST['update_job']);
    $update_contact_person = mysqli_real_escape_string($conn, $_POST['update_contact_person']);
    $update_contact_number = mysqli_real_escape_string($conn, $_POST['update_contact_number']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
    $update_sex = mysqli_real_escape_string($conn, $_POST['update_sex']);
    $update_contractual = mysqli_real_escape_string($conn, $_POST['update_contractual']);
    $update_Desc = mysqli_real_escape_string($conn, $_POST['update_Desc']);

   
    $update = $_GET['update'];
    $query = "UPDATE `jobopening` SET `business` = '$update_business', `job` = '$update_job', `contact_person` = '$update_contact_person', `contact_number` = '$update_contact_number', `address` = '$update_address', `sex` = '$update_sex', `contractual` = '$update_contractual', `Desc` = '$update_Desc' WHERE `id` = '$update'";

    mysqli_query($conn, $query);
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/'.$update_image;

    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $message[] = 'image is too large';
        }else{
            $image_update_query = mysqli_query($conn, "UPDATE `business_form` SET image = '$update_image' WHERE id = '$update'") or die('query failed');
        }
    }
}