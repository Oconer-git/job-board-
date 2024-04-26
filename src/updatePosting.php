<?php include "config.php";?>
<?php include "action2.php";?>
<?php include "update_posting.php";?>
<!-- header -->
<?php include"layouts/_header.php";?>
<?php include"layouts/_navigationEmp.php";?>
<!-- /header -->
<!-- content -->
<div class="wrapper">
  <div id="container" class="clear">
    <!-- main content -->
    <div class="update-profile">

<?php
    include "config.php";
    $jobId = $_GET['update'];
    $query = "SELECT * FROM `jobopening` WHERE id = '$jobId' ";
    $select = mysqli_query($conn, $query);
    if(mysqli_num_rows($select) > 0){
        $fetch = mysqli_fetch_assoc($select);
   }
?>

<form action="" method="post" enctype="multipart/form-data">
   <?php
      if($fetch['image'] == ''){
         echo '<img src="images/no-image.jpg" id="avatar" width="150px">';
      }else{
         echo '<img src="uploaded_img/'.$fetch['image'].'" id="avatar" width="150px">';
      }
   ?>
   <div id="flex">
        <div class="input-control">
            <span>Name:</span><br>
            <input type="text" name="update_business" value="<?php echo $fetch['business']; ?>" class="input-field"><br>

            <span>Position:</span><br>
            <input type="text" name="update_job" value="<?php echo $fetch['job']; ?>" class="input-field"><br>

            <span>Contact Person: </span><br>
            <input type="text" name="update_contact_person" value="<?php echo $fetch['contact_person']; ?>" class="input-field"><br>

            <span>Contact Number :</span><br>
            <input type="tel" name="update_contact_number" value="<?php echo $fetch['contact_number']; ?>" class="input-field" pattern="[0-9]{11}"><br>

            <span>Address:</span><br>
            <input type="text" name="update_address" value="<?php echo $fetch['address']; ?>" class="input-field"><br><br>

            <span>Sex preffered :</span><br>
            <input type="text" name="update_sex" value="<?php echo $fetch['sex']; ?>" class="input-field"><br>

            <span>Contractual :</span><br>
            <input type="text" name="update_contractual" value="<?php echo $fetch['contractual']; ?>" class="input-field"><br>

            <span>Description :</span><br>
            <input type="text" name="update_Desc" value="<?php echo $fetch['Desc']; ?>" class="input-field"><br>

            <span>Update pictures:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="input-field"><br><br>
      </div>
   </div>
   <input type="submit" value="update_post" name="update_post" class="btn"><br>

   <a href="profileemp.php" class="delete-btn">Go back</a>
</form>

</div>
  </div>
</div>
<!-- /content -->

<!-- Footer -->
<?php include"layouts/_footer.php";?>
<!-- /Footer -->