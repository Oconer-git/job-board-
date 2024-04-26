<?php
include 'config.php';

if(isset($_POST['update_profile'])){

$update_lastName = mysqli_real_escape_string($conn, $_POST['update_lastName']);
$update_firstName = mysqli_real_escape_string($conn, $_POST['update_firstName']);
$update_phoneNumber = mysqli_real_escape_string($conn, $_POST['update_phoneNumber']);
$update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
$update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

mysqli_query($conn, "UPDATE `user_form` SET lastName = '$update_lastName', firstName = '$update_firstName', phoneNumber = '$update_phoneNumber', username = '$update_username', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

$old_pass = $_POST['old_pass'];
$update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
$new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
$confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
    if($update_pass != $old_pass){
        $message[] = 'old password not matched!';
    }elseif($new_pass != $confirm_pass){
        $message[] = 'confirm password not matched!';
    }else{
        mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
        $message[] = 'password updated successfully!';
    }
}

$update_image = $_FILES['update_image']['name'];
$update_image_size = $_FILES['update_image']['size'];
$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
$update_image_folder = 'uploaded_img/'.$update_image;

if(!empty($update_image)){
    if($update_image_size > 2000000){
        $message[] = 'image is too large';
    }else{
        $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
        if($image_update_query){
        move_uploaded_file($update_image_tmp_name, $update_image_folder);
        }
        $message[] = 'image updated succssfully!';
    }
}

}