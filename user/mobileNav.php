<?php
include_once("../inc/config.php");
$pageName = "mobile Nav";
$linkPrefix = "../";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../inc/head.php') ?>
    <?php include('inc/user-head.php') ?>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mobilelogo text-center">
                <img src="../img/logo.png" alt="" class="img-fluid img-rsponsive">
            </div>
        </div>
    </div>
    <main class="mobilenav">
        <div class="side-nav-img text-center p-4">
            <img src="img/Ellipse 3.png" class="img-responsive">
        </div>
    </main>


    <div class="mobilemenu">
        <div class="container">
        <div class="row w-100">
            <div class="col-2 text-center">
                <img src="./img/bag.png" alt="" class="img-responsive">
                <small>CART</small>
            </div>
            <div class="col-2 text-center">
                <img src="./img/bag.png" alt="" class="img-responsive">
                <small>CART</small>
            </div>
            <div class="col-2 text-center">
                <img src="./img/bag.png" alt="" class="img-responsive">
                <small>CART</small>
            </div>
            <div class="col-2 text-center">
                <img src="./img/bag.png" alt="" class="img-responsive">
                <small>CART</small>
            </div>
            <div class="col-2 text-center">
                <img src="./img/bag.png" alt="" class="img-responsive">
                <small>CART</small>
            </div>
        </div>
        </div>
    </div>
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>

</body>

</html>