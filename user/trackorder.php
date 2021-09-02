<?php
include_once("../inc/config.php");
$pageName = "Your Order";
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
                    <?php include('inc/user-sidenav.php'); ?>
                    <div class="col-9 px-5">
                        <div class="track-main-card">
                            <form class="row">
                                <div class="col-9">
                                    <input type="text" class="form-control mt-0 mb-0"  placeholder="Enter Order Tracking Number">
                                </div>
                                <div class="col-3 d-flex align-items-center">
                                    <button type="submit" class="btn btn-gradient rounded px-4">Track Order</button>
                                </div>
                            </form>
                        </div>
                        <div class="track-main-card mt-3"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>
</body>

</html>