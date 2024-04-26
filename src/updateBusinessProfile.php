<?php include "config.php";?>
<?php include "action2.php";?>
    <!-- header -->
    <?php include "layouts/_header.php";?>
    <?php include "layouts/_navigationH.php";?>
    <!-- /header -->
        <!-- content -->
        <div class="wrapper">
        <div id="container" class="clear">
        <!-- main content -->
        <div class="update-profile">

    <?php
    include_once "functions/_functions.php";
    updateBusinessProfile();
    $select = mysqli_query($conn, "SELECT * FROM `business_form` WHERE id = '$emp_id'") or die('query failed');
    if(mysqli_num_rows($select) > 0){
        $fetch = mysqli_fetch_assoc($select);
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
            if($fetch['image'] == ''){
                echo '<img src="images/default-avatar.png" id="avatar" width="150px">';
            }else{
                echo '<img src="uploaded_img/'.$fetch['image'].'" id="avatar" width="150px">';
            }
            if(isset($message)){
                foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
                }
            }
        ?>
        <div id="flex">
            <div class="input-control">
                <span>Last Name :</span>
                <input type="text" name="update_lastName" value="<?php echo $fetch['lastName']; ?>" class="input-field" required>

                <br><br><span>Last Name :</span>
                <input type="text" name="update_firstName" value="<?php echo $fetch['firstName']; ?>" class="input-field"required>

                <br><br><span>Last Name :</span>
                <input type="text" name="update_middleName" value="<?php echo $fetch['middleName']; ?>" class="input-field"required><br>

                <br><br><span>Phone Number :</span>
                <input type="text" name="update_phoneNumber" value="<?php echo $fetch['phoneNumber']; ?>" class="input-field" pattern="[0-9]{11}" required>

                <span> Business Name :</span>
                <input type="text" name="update_businessName" value="<?php echo $fetch['businessName']; ?>" class="input-field"required>

                <span>Email :</span>
                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="input-field"required>

                <span>Update picture:</span>
                <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="input-field">
            </div>
            <div class="input-control">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                <span>Input password :</span>
                <input type="password" name="password" placeholder="Enter password to confirm" class="input-field" required>
            </div>
        </div>
        <input type="submit" value="Update Profile" name="update_profile" class="btn">

        <a href="profileemp.php" class="delete-btn">Go back</a>
    </form>

</div>
</div>
</div>
<!-- /content -->

<!-- Footer -->
<?php include"layouts/_footer.php";?>
<!-- /Footer -->