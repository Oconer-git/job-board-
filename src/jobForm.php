<?php include "action2.php";?>
<!-- header -->
<?php include "layouts/_header.php";?>
<?php include "layouts/_navigationEmp.php";?>
<!-- /header -->
<div class="wrapper">
	<div id="container" class="clear">
		<!-- main content -->
		<div id="homepage">
			<div id="registration">
				<h1>Job Details:</h1>
				<form action="" method="post" enctype="multipart/form-data">

                    <?php
                        include 'config.php';

                        if(isset($_POST['submit'])){

                            $business = mysqli_real_escape_string($conn, $_POST['business']);
                            $job = mysqli_real_escape_string($conn, $_POST['job']);
                            $location = mysqli_real_escape_string($conn, $_POST['location']);
                            $salary = mysqli_real_escape_string($conn, $_POST['salary']);
                            $sex = mysqli_real_escape_string($conn, $_POST['sex']);
                            $contractual = mysqli_real_escape_string($conn, $_POST['contractual']);
                            $desc = mysqli_real_escape_string($conn, $_POST['desc']);
                            $image = $_FILES['image']['name'];
                            $image_size = $_FILES['image']['size'];
                            $image_tmp_name = $_FILES['image']['tmp_name'];
                            $image_folder = 'uploaded_img/'.$image;

                            if($image_size > 500000){
                                $message[] = 'image size is too large!';
                            }else{
                                $insert = mysqli_query($conn,"INSERT INTO `jobopening`(`business`, `job`, `location`, `salary`, `sex`, `contractual`, `desc`, `image`) VALUES ('$business','$job','$location','$salary','$sex','$contractual','$desc','$image')")or die('query failed');

                                if($insert){
                                    move_uploaded_file($image_tmp_name, $image_folder);
                                    header('location:profileEmp.php');
                                }else{
                                    $message[] = 'uploading failed!';
                                }
                            }
                        }
                    ?>
                    <div class="input-control">
						<label for="business">Business name:</label>
						<input class="form" type="text" name="business" id="business" placeholder="Business name"> &nbsp;
					</div>
					<div class="input-control">
						<label for="job">Position:</label>
						<input class="form" type="text" name="job" id="job" placeholder="Job"> &nbsp;
					</div>
					<div class="input-control">
						<label for="location">Location:</label>
						<select id="location" name="location">
							<option value="">-Location-</option>
							<option value="Agoo">Agoo</option>
							<option value="Aringay">Aringay</option>
							<option value="Bacnotan">Bacnotan</option>
							<option value="Bagulin">Bagulin</option>
							<option value="Balaoan">Balaoan</option>
							<option value="Bangar">Bangar</option>
							<option value="Bauang">Bauang</option>
							<option value="Burgos">Burgos</option>
							<option value="Caba">Caba</option>
							<option value="Damortis">Damortis</option>
							<option value="Luna">Luna</option>
							<option value="Naguilian">Naguilian</option>
							<option value="Pugo">Pugo</option>
							<option value="Rosario">Rosario</option>
							<option value="City of San Fernando">City of San Fernando</option>
							<option value="San Gabriel">San Gabriel</option>
							<option value="San Juan">San Juan</option>
							<option value="Santol">Santol </option>
							<option value="Sto. Tomas">Sto. Tomas</option>
							<option value="Sudipen">Sudipen</option>
							<option value="Tubao">Tubao</option>
						</select>
					</div>
					<div class="input-control">
						<label for="salary">Salary:</label>
						<input class="form" type="text" name="salary" id="salary">
					</div>
					<div class="input-control">
						<label for="sex">Sex preffered:</label>
						<select id="sex" name="sex">
							<option value="">-Sex-</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="male-female">Male & Female</option>
						</select>
					</div>
					<div class="input-control">
						<label for="contractual">Contractual:</label>
						<input class="form" type="text" name="contractual" id="contractual">
					</div>
					<div class="input-control">
						<label for="desc">Description:</label><br>
						<textarea name="desc" id="desc"> </textarea>
					</div>
					<div class="input-control">
						</br>
						<label for="file-upload" class="custom-file-upload">Profile Upload:</label>
						<input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
						</br></br>
					</div>
					<div class="input-control">
						<input type="submit" name="submit" value="Submit" class="btn btn-md btn-rounded">
                        <h3><a href = "profileEmp.php"> Go back </a> </h3>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include"layouts/_footer.php"; ?>