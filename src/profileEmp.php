<?php
include "config.php";
include "action2.php";
?>

<!-- header -->
<?php include"layouts/_header.php";?>
<?php include"layouts/_navigationEmp.php";?>
<!-- /header -->
<div class="wrapper">
<div id="container">
<!-- main content -->

<?php include_once "layouts/_sidebar2.php"; ?>

    <div id="container-job">
        <?php include_once "functions/_functions.php";
            displayEnteredJob();
        ?>
    </div>

</div>
<?php include"layouts/_footer.php"?>