<?php include "config.php";?>
<?php include "action.php";?>
    <!-- header -->
    <?php include"layouts/_header.php";?>
    <?php include"layouts/_navigationH.php";?>
    <!-- /header -->
        <!-- content -->
        <div class="wrapper">
            <div id="container">
                <!-- main content -->
                <div class="update-profile">

        <?php
        include_once "functions/_functions.php";
        updateProfile();

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
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
        ?>

        <div id="flex">
        <div class="input-control">
            <span>Name :</span><br>
            <input  type="text" name="update_lastName" value="<?php echo $fetch['lastName']; ?>" class="input-field">
            <input type="text" name="update_firstName" value="<?php echo $fetch['firstName']; ?>" class="input-field"><br>
            <span>Phone Number :</span><br>
            <input type="text" name="update_phoneNumber" value="<?php echo $fetch['phoneNumber']; ?>" class="input-field" minlength="13" maxlength="13"><br>
        </div>

        <div class="input-control">
            <span>Username :</span><br>
            <input type="text" name="update_username" value="<?php echo $fetch['username']; ?>" class="input-field"><br>
            <span>Email address :</span><br>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="input-field"><br>
            <span>update picture :</span><br>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="input-field"><br>
        </div>
        <div class="input-control">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old password :</span><br>
            <input type="password" name="update_pass" placeholder="enter previous password" class="input-field"><br>
            <span>New password :</span><br>
            <input type="password" name="new_pass" placeholder="enter new password" class="input-field"><br>
            <span>Confirm password :</span><br>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="input-field"><br>
        </div>
        </div>
        <input type="submit" value="update profile" name="update_profile" class="btn"><br>

        <a href="profile.php" class="delete-btn">Go back</a>
        </form>

        </div>
        </div>
        </div>
        <!-- /content -->

        <!-- Footer -->
        <?php include"layouts/_footer.php";?>
        <!-- /Footer -->