<?php
include_once("../inc/config.php");
$pageName = "Your Order";
$linkPrefix = "../";
if(!isset($_SESSION['user'])){
    $_SESSION['toast']['msg']="Please login to continue";
    header('location:login.php');
    exit();
}
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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xxl-9 px-5">
                        <div class="track-main-card">
                            <form class="row">
                                <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xxl-9">
                                    <input type="text" class="form-control mt-0 mb-0" placeholder="Enter Order Tracking Number">
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xxl-3 d-flex align-items-center justify-content-center justify-content-lg-start mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-gradient rounded px-4 ">Track Order</button>
                                </div>
                            </form>
                        </div>
                        <div class="track-main-card mt-3">
                            <div class="root">
                                <figure>
                                    <img src="img/truck.png"  alt="">
                                    <figcaption>
                                        <h4>Tracking Details</h4>
                                        <h6>Order Number</h6>
                                        <h2># A61452B</h2>
                                    </figcaption>
                                </figure>
                                <div class="order-track">
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                            <span class="order-track-status-dot"></span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Label Created</p>
                                            <span class="order-track-text-sub">1st November, 2019</span>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                            <span class="order-track-status-dot"></span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat"> Shipped - 123 Start St.
                                                Seattle, WA </p>
                                            <span class="order-track-text-sub">1st November, 2019</span>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                            <span class="order-track-status-dot-blank"></span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat"> Estimated - 456 End St.
                                                New York City, NY</p>
                                            <span class="order-track-text-sub">3rd November, 2019</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('inc/mobileNav.php') ?>
    <?php include('../inc/js.php') ?>
</body>

</html>