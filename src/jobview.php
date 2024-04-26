<?php
include "action.php";
include "config.php";
?>
<!-- header -->
<?php include "layouts/_header.php";?>
<?php include "layouts/_navigationH.php";?>
<!-- /header -->

<div class="wrapper">
    <div id="container">

        <?php include "layouts/_sidebar.php"?>
        &emsp;

        <div id = "container-job">
            <?php
                include "config.php";
                $job_id = $_GET['job'];
                $query = "SELECT * FROM `jobopening` WHERE id = $job_id  ";
                $query_run = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($query_run))
                    {
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

                    <div id="container-view">
                        <div class="img-con">'
                            .($image == "" ?
                            '<img src="images/no-image.png" id="business-img" width="200px">' :
                            '<img src="uploaded_img/'.$image.'" id="business-img" width="200px">').
                            '
                        </div>

                        <div id="job-viewing">
                        <div class="info-con">
                            <h3> Vacancy from: '.$business.'</h3>
                            <h3>Location: '.$location.'</h3>

                            <h3> Position: '.$job.'</h3>

                            <h3> Starting Salary: '.$salary.'</h3>
                            <h3> Preffered Sex: '.$sex.'</h3>
                            <h3>Contractual: '.$contractual.'</h3>
                        </div>
                    </div>
                    <div id="desc-view">
                    <h3>Description: <br>'.$desc.'<br><br></h3>
                            <button id="myBtn" class="apply">Apply</button>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                              <div class="modal-content">
                                <span class="close">&times;</span>
                                <form method="post">
                                <label>Full Name:<br></label>
                                <input type="text" name="fullName"/><br>
                                <label>Contact Number:<br></label>
                                <input type="tel" name="contact"/><br>
                                <label>Email Address:<br></label>
                                <input type="email" name="email"/><br>
                                <label>Resume:<br></label>
                                <input type="file" name="fileUpload"/><br>
                                <button onclick="myFunction()" name="confirm" class="confirm">Confirm</button>
                            </form>
                              </div>

                            </div>
                            <script>
                            function myFunction() {
                                alert("Your application was submited succesfully!");
                            }
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the button that opens the modal
                            var btn = document.getElementById("myBtn");

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks the button, open the modal
                            btn.onclick = function() {
                              modal.style.display = "block";
                            }

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                              modal.style.display = "none";
                            }

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                              if (event.target == modal) {
                                modal.style.display = "none";
                              }
                            }
                            </script>
                    <a href="profile.php" class="back">Go Back</a>

                    </div>
                    ';
                    ?>
                <?php
                    }
            ?>
            </div>
        </div>
</div>
<?php include "layouts/_footer.php"?>