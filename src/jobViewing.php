<!-- header -->
<?php include "layouts/_header.php";?>
<?php include "layouts/_navigationH.php";?>
<!-- /header -->
<div class="wrapper">
  <div id="container" class="clear">
    <!-- main content -->
        <div id="homepage">
          <!-- registration area -->
            <div id ="container-prof">
                    <div class="row">
                        <!-- Product main img -->
                        
                        <div id="container-job">
                     <?php 
                                require 'config.php';
                                    $query = "SELECT * FROM `jobopening`";
                                    $query_run = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_assoc($query_run))
                                        {
                                            ?>
                                            <div class="box">
                                                <div>
                                                    <?php 
                                                        if($row['image'] == ''){
                                                            echo '<img src="images/default-avatar.png" id="avatar" width="200px">';
                                                        }else{
                                                            echo '<img src="uploaded_img/'.$row['image'].'" id="avatar" width="200px">';}
                                                    ?>
                                                </div>
                                                <div>
                                                    <?php echo $row['job'];?>
                                                </div>
                                                <div>
                                                    <?php echo $row['salary'];?>
                                                </div>
                                                <div>
                                                    <?php echo $row['business'];?>
                                                </div>
                                             </div>
                                            <?php
                                        }
                            ?>
               </div>
                     </div>
                  </div>
            </div>
   </div>        
<?php include "layouts/_footer.php"?>