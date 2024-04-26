<div id="profile-page">
    <div class="profile-con">
        <div class ="upper-box">
            <div class="profile-box"> <?php
                    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                        if(mysqli_num_rows($select) > 0){
                            $fetch = mysqli_fetch_assoc($select);
                            $image = $fetch['image'];
                            $firstName = $fetch['firstName'];
                            $lastName = $fetch['lastName'];
                            $phoneNumber = $fetch['phoneNumber'];
                            $username = $fetch['username'];
                        }
                        $image = $fetch['image'];
                        if($fetch['image'] == ''){
                            echo '<a href="profile.php"> <img src="images/default-avatar.png" id="avatar" width="200px"> </a>';
                        }else{
                            echo '<a href="profile.php"> <img src="uploaded_img/'.$image.'" id="avatar" width="200px"> </a>';
                        }
                    ?>
            </div>
            <div class="profile-box">
                <h4> <?php echo $firstName; ?> <?php echo $lastName; ?> </h4>
                <h4>@<?php echo $username; ?> </h4>
                <h4><?php echo $phoneNumber; ?> </h4>
                <br>
            </div>
            <?php echo '<a href="updateProfile.php?='.$firstName.' '.$lastName.'" class="update-btn">update profile</a>' ?>
            <br><br>
        </div>
        <br>
        <div class="lower-box">
            <div class= "category">
                <ul>
                    <li><h3> Job Vacancies in:</h3></li>
                    <?php
                    include_once "functions/_functions.php";
                        locationCategory();
                    ?>
                </ul>
                <br><br>
                <ul>
                    <li><h3> Available Jobs: </h3></li>
                    <?php
                        include_once "functions/_functions.php";
                        jobCategory();
                    ?>
                </ul>
            </div>
                    </div>
    </div><br>
</div>