<?php
function locationCategory(){
    include "config.php";
    $query = "SELECT DISTINCT `location` FROM `jobopening` ORDER BY `location` ASC";
    $query_run = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($query_run)) {
        $location = $row["location"];
        ?>
        <?php
            echo '
                    <li>
                    <a class="job-base" href="locationBase.php?loc=' . $location .' ">' . $location . '</a>
                    </li>
                ';
    }
}

function jobCategory(){
    include "config.php";
    $query = "SELECT DISTINCT `job` FROM `jobopening` ORDER BY `job` ASC";
    $query_run = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($query_run))
            {
            $job = $row["job"];
            ?>
            <?php
                echo'
                    <li>
                    <a href="jobBase.php?job='.$job.'">'.$job.'</a>
                    </li>
                ';
            }
}

function displayJobFilter(){
                include "config.php";
                $job_keyword = $_GET['job'];
                $query = "SELECT * FROM `jobopening` HAVING `job` = '$job_keyword'";
                $query_run = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($query_run))
                    {
                        $image = $row['image'];
                        $business = $row["business"];
                        $job = $row["job"];
                        $salary = $row["salary"];
                        $location = $row["location"];
                        $id = $row["id"]
                    ?>
                    <?php
                    echo '
                    <div id="job-list">
                        <div class="image-con">'
                            .($image == "" ?
                            '<img src="images/no-image.png" id="business-img" width="125px">' :
                            '<img src="uploaded_img/'.$image.'" id="business-img" width="145px">').
                            '
                        </div>
                        <div class="job-description">
                            <h3>'.$business.'</h3>
        
                            <h3>'.$job.'</h3>
        
                            <h3>'.$location.'</h3>
                            <a href="jobview.php?job='.$id.'">VIEW</a>
                        </div>
                    </div>';
                    }

}

function displayLocationFilter(){
    include "config.php";
                $loc_keyword = $_GET['loc'];
                $query = "SELECT * FROM `jobopening` ";
                $query = "SELECT * FROM `jobopening` HAVING `location` = '$loc_keyword' ";
                $query_run = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($query_run))
                    {
                        $image = $row['image'];
                        $business = $row["business"];
                        $job = $row["job"];
                        $salary = $row["salary"];
                        $location = $row["location"];
                        $id = $row["id"]
                    ?>
                    <?php
                    echo '
                    <div id="job-list">
                        <div class="image-con">'
                            .($image == "" ?
                            '<img src="images/no-image.png" id="business-img" width="125px">' :
                            '<img src="uploaded_img/'.$image.'" id="business-img" width="145px">').
                            '
                        </div>
                        <div class="job-description">
                            <h3>'.$business.'</h3>
        
                            <h3>'.$job.'</h3>
        
                            <h3>'.$location.'</h3>
                            <a href="jobview.php?job='.$id.'">VIEW</a>
                        </div>
                    </div>';
                    }
}

function updateProfile(){
    include 'config.php';
    if(isset($_POST['update_profile'])){
        $user_id = $_SESSION['user_id'];
        $update_lastName = mysqli_real_escape_string($conn, $_POST['update_lastName']);
        $update_firstName = mysqli_real_escape_string($conn, $_POST['update_firstName']);
        $update_middleName = mysqli_real_escape_string($conn, $_POST['update_middleName']);
        $update_phoneNumber = mysqli_real_escape_string($conn, $_POST['update_phoneNumber']);
        $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

        mysqli_query($conn, "UPDATE `user_form` SET lastName = '$update_lastName', firstName = '$update_firstName', middleName = '$update_middleName', phoneNumber = '$update_phoneNumber', username = '$update_username', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

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
}

function updateBusinessProfile(){
    include 'config.php';
    $emp_id = $_SESSION['emp_id'];

    if(isset($_POST['update_profile'])){

        $update_lastName = mysqli_real_escape_string($conn, $_POST['update_lastName']);
        $update_firstName = mysqli_real_escape_string($conn, $_POST['update_firstName']);
        $update_middleName = mysqli_real_escape_string($conn, $_POST['update_middleName']);
        $update_phoneNumber = mysqli_real_escape_string($conn, $_POST['update_phoneNumber']);
        $update_businessName = mysqli_real_escape_string($conn, $_POST['update_businessName']);
        mysqli_real_escape_string($conn, $_POST['update_businessName']);
        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

        mysqli_query($conn, "UPDATE `business_form` SET lastName = '$update_lastName', firstName = '$update_firstName', middleName = '$update_middleName', phoneNumber = '$update_phoneNumber', businessName = '$update_businessName', email = '$update_email' WHERE id = '$emp_id'") or die('query failed');

        $update_image = $_FILES['update_image']['name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder = 'uploaded_img/'.$update_image;

        if(!empty($update_image)){
            if($update_image_size > 2000000){
                $message[] = 'image is too large';
            }else{
                $image_update_query = mysqli_query($conn, "UPDATE `business_form` SET image = '$update_image' WHERE id = '$emp_id'") or die('query failed');
            }
        }
    }
}
function displayJob(){
    include "config.php";
    $query = "SELECT * FROM `jobopening` ";
    $query_run = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($query_run))
        {
            $image = $row['image'];
            $business = $row["business"];
            $job = $row["job"];
            $salary = $row["salary"];
            $location = $row["location"];
            $id = $row["id"]
        ?>
        <?php
        echo '
            <div id="job-list">
                <div class="image-con">'
                    .($image == "" ?
                    '<img src="images/no-image.png" id="business-img" width="125px">' :
                    '<img src="uploaded_img/'.$image.'" id="business-img" width="145px">').
                    '
                </div>
                <div class="job-description">
                    <h3>'.$business.'</h3>

                    <h3>'.$job.'</h3>

                    <h3>'.$location.'</h3>
                    <a href="jobview.php?job='.$id.'">VIEW</a>
                </div>
            </div>';
        ?>
    <?php
        }
}
function displayEnteredJob(){
    include "config.php";
    $emp_id = $_SESSION['emp_id'];
    $query = "SELECT * FROM `jobopening` ";
    $query = "SELECT * FROM `jobopening` WHERE `uploadedBy` = $emp_id ";
    $query_run = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($query_run)) {
        $image = $row['image'];
        $business = $row["business"];
        $job = $row["job"];
        $salary = $row["salary"];
        $location = $row["location"];
        $id = $row["id"]
        ?>
                <?php
        echo '
                <div id="job-list"">

                <div class="image-con">'
            . ($image == "" ?
            '<img src="images/no-image.png" id="business-img" width="125px">' :
            '<img src="uploaded_img/'.$image.'" id="business-img" width="145px">').
            '
                        <h3>' . $business . '</h3>

                        <h3>' . $job . '</h3>

                        <h3>' . $salary . '</h3>
                        <h3>' . $location . '</h3>
                        <a href="updatePosting.php?update=' . $id . '">Update Posting</a>
                </div>

                </div>';
                ?>
            <?php
    }
}

function displayFilteredJob(){
    include "config.php";
    $job_id = $_GET['job'];
    $query = "SELECT * FROM `jobopening` WHERE id = $job_id  ";
    $query_run = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($query_run)) {
        $image = $row['image'];
        $business = $row["business"];
        $job = $row["job"];
        $salary = $row["salary"];
        $location = $row["location"];
        $sex = $row["sex"];
        $contractual = $row["contractual"];
        $desc = $row["Desc"];
        $id = $row["id"];

            ?>
        <?php
        echo '

        <div id=container>'
            . ($image == "" ?
                '<img src="images/no-image.png" id="business-img" width="150px" height="150px">' :
                '<img src="uploaded_img/' . $image . '" id="business-img" width="150px">') .
            '
        </div>

        <div id="job-list">
                <h3> Vacancy from:' . $business . '</h3>
                <h3>Location:' . $location . '</h3>

                <h3> Position:' . $job . '</h3>

                <h3> Starting Salary:' . $salary . '</h3>
                <h3> Preffered Sex:' . $sex . '</h3>
                <h3>Contractual: ' . $contractual . '</h3>
                <h3>Description: ' . $desc . '</h3>

                <a href="profile.php">Go Back</a>


        </div>';
        ?>
        <?php
    }
}