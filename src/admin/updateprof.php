<?php 
include('header.php');
include('config.php');
include('config_update.php');
?>

<section>
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- main content -->
    <div class="update-profile">

<?php
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$id'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);
   }
?>

<form action="" method="post" enctype="multipart/form-data">
   <div id="flex">
        <div class="input-control">
            <span>Name :</span>
            <input type="text" name="update_lastName" value="<?php echo $fetch['lastName']; ?>" class="input-field">
            <input type="text" name="update_firstName" value="<?php echo $fetch['firstName']; ?>" class="input-field">
            <input type="text" name="update_middleName" value="<?php echo $fetch['middleName']; ?>" class="input-field"><br>
            <span>Phone Number :</span>
            <input type="text" name="update_phoneNumber" value="<?php echo $fetch['phoneNumber']; ?>" class="input-field">
        </div>

        <div class="input-control">
            <span>username :</span>
            <input type="text" name="update_username" value="<?php echo $fetch['username']; ?>" class="input-field">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="input-field">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="input-field">
      </div>
      <div class="input-control">
         <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
         <span>old password :</span>
         <input type="password" name="update_pass" placeholder="enter previous password" class="input-field">
         <span>new password :</span>
         <input type="password" name="new_pass" placeholder="enter new password" class="input-field">
         <span>confirm password :</span>
         <input type="password" name="confirm_pass" placeholder="confirm new password" class="input-field">
      </div>
   </div>
   <input type="submit" value="update profile" name="update_profile" class="btn">
   
   <a href="user.php" class="delete-btn">Go back</a>
</form>

</div>
  </div>
</div>
</section>

<?php include('footer.php'); ?>