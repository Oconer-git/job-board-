<?php include "config.php";?>
<?php include "loginCheck1.php";?>
<!-- header -->
<?php include"layouts/_header.php";?>
<!-- /header -->
<div class="wrap">
    <div id="con">
        <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="flex1">
                    <a href="index.php">
                    <img src="images/logoB.png" width="300px">
                    </a>
                    <br>
                    <h1>Login now</h1>

                    <input type="text" name="username" placeholder="Username" class="input-field" required>

                    <input type="password" name="password" placeholder="Password" class="input-field" required>
                    <br>
                    <?php

                    if(isset($message)){
                        foreach($message as $message){
                            echo '<div class="message"><h3>'.$message.'</h3></div>';
                        }
                    }
                    ?>
                    <br>
                    <input type="submit" name="submit" value="Login" class="btn">
                    <h4></br>Don't have an account? <a href="register.php">Sign up<br></a></h4>
                    <br>
                    <div>
            </form>
                            <form action="empLogin.php">
                                <input type="submit" value="Login as Employer" class="btn-reg">
                            </form>
                    </div>
        </div>
    </div>
<div>
    <br>
<?php include"layouts/_footer.php" ?>
