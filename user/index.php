<?php
include_once("../inc/config.php");
$pageName = "Tapeoo Dashboard";
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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xxl-9">
                        <div class="dashboard-div">
                            <div class="dashboard-head">
                                <div class="row">
                                    <div class="col-7 col-sm-7 col-md-7 col-lg-4 col-xxl-4">
                                        <h1>Good Morning </h1>
                                        <div class="animationLinetappeo ms-0 mt-2 w-100"></div>
                                        <h5 class="ms-4">
                                            its good to see you again
                                        </h5>
                                    </div>
                                    <div class="col-5 col-sm-5 col-md-5 col-lg-6 col-xxl-6 d-flex align-items-center">
                                        <h1 style="color:#D33696;">
                                            UserName
                                        </h1>
                                    </div>
                                </div>

                            </div>
                            <!-- dashboard-copntent -->
                            <div class="dashboard-content">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 gy-3">
                                        <div class="details-dasboard mb-3">
                                            <h6 class="mb-3" style="color:#D33696;">
                                                <b>Details</b>
                                            </h6>
                                            <h5 class="mb-3">
                                                User Name
                                            </h5>
                                            <p>
                                                Email- useremail@gmail.com
                                            </p>
                                            <p>
                                                Phone - +8144582619
                                            </p>
                                            <p>Tapeoo user since - july 2021</p>
                                        </div>
                                        <div class="details-dasboard">
                                            <h6 class="mb-3" style="color:#D33696;">
                                                <b>Default Address</b>
                                            </h6>
                                            <h5 class="mb-3">
                                                Address holder name
                                            </h5>
                                            <p>
                                                Phone - +8144582619
                                            </p>
                                            <p> 404 Veltri Drive Egegik </p>
                                            <p>State: Alaska</p>
                                            <p>Postal Code : 99579</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 gy-3">
                                        <div class="order-dashboard">
                                            <h6 class="mb-3" style="color:#D33696;">
                                                <b>Recent Orders</b>
                                            </h6>
                                            <!-- start loop from here -->
                                            <div class="order-card order-pink mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Tapeoo Card</h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="order-success text-end">
                                                            <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-card order-blue mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Tapeoo Card</h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="order-success text-end">
                                                            <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-card order-pink mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Tapeoo Card</h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="order-success text-end">
                                                            <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-card order-blue mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Tapeoo Card</h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="order-success text-end">
                                                            <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-card order-pink mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Tapeoo Card</h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="order-success text-end">
                                                            <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-card order-blue mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Tapeoo Card</h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="order-success text-end">
                                                            <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- end loop -->
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