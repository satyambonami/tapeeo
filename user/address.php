<?php
include_once("../inc/config.php");
$pageName = "Privacy Policy";
$linkPrefix = "../";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../inc/head.php') ?>
    <?php include('inc/user-head.php') ?>

</head>

<body>
    <?php include('../inc/header.php') ?>
    <?php include('inc/header-user.php') ?>
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                <?php include('inc/user-sidenav.php') ?>
                    <div class="col-9">
                        <div class="address-main-card">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main> 
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>
</body>

</html>