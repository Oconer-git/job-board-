<?php include"config.php";?>
<?php include"userreg.php";?>
<!-- header -->
<?php include"layouts/_header.php";?>
<!-- /header -->
            <div class="wrap">
                <div id = "RegForm">
                    <div class= "formReg">
                        <form action="" method="post" enctype="multipart/form-data">
                        <a href="login.php">
                            <img src="images/logob.png" width="400px">
                        </a>
                        <p id="title">Register now</p>
                        <?php
                        if(isset($message)){
                            foreach($message as $message){
                                echo '<div class="message">'.$message.'</div>';
                            }
                        }
                        ?>
                        <div class="input-control-reg">
                            <input type="text" name="firstName" placeholder="First Name" class="input-field" required>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="lastName" placeholder="Last Name" class="input-field" required>
                        </div>

                        <div class="input-control-reg">
                            <input type="radio" name="gender" required value="Male">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" required value="Female">
                            <label for="female">Female</label>&emsp;&nbsp;&nbsp;
                            <label for="phoneNumber">Phone Number:</label>&nbsp;
                            <input minlength="13" type="tel" name="phoneNumber" placeholder= "phone number" class="input-field" value="+639" pattern=".{13,13}" required>
                        </div>

                        <div class="input-control-reg">
                            <input minlength="8" type="text" name="username" placeholder="Username" class="input-field" pattern=".{8,}" required>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="email" name="email" placeholder="Enter Email" class="input-field" required>
                        </div>

                        <div class="input-control-reg"><br>
                            <label for="password">Password:</br></label>
                            <input minlength="8" type="password" name="password" placeholder="Password (8 least character)" class="input-password" required>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input minlength="8" type="password" name="cpassword" placeholder="Confirm password"  class="input-password" required>
                            <br>
                        </div>

                        <div class="input-control-reg">
                        <br>
                            <label for="file-upload" class="custom-file-upload">Profile Upload:</label>
                            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
                        </br></br>
                        </div>

                        <div class="submitCondition">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <input type="submit" name="submit" value="Register now" class="btn">
                            <p> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;Already have an account? <a href="login.php">Login now</a></p>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

<?php include"layouts/_footer.php" ?>