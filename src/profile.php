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

        <!-- main content -->

        <?php include "layouts/_sidebar.php"?>
        &emsp;
        <div id="container-job">
            <?php include_once "functions/_functions.php";
                displayJob();
            ?>
        </div>
    </div>
</div>
<?php include "layouts/_footer.php"?>