<?php

include 'config.php';

if(isset($_POST['submit'])){

   $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
   $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
   $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE username = '$username' AND email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(lastName, firstName, middleName, gender, phoneNumber, username, email, password, image) VALUES('$lastName', '$firstName', '$middleName', '$gender', '$phoneNumber', '$username', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>