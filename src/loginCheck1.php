<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE  username = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['pass']= $row['password'];
      $user= $row['username'];
      header('location:profile.php?user='.$user.'');
   }else{
      $message[] = 'Incorrect email or password!';
   }
}
?>