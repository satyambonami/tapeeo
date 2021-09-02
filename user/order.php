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
                    <?php include('inc/user-sidenav.php') ?>
                    <div class="col-9">
                        <div class="order-card box-shadow" style="padding:30px 30px ;">
                            <!-- order-head -->
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 class="mb-0">Product</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="mb-0">Price</h5>
                                </div>
                                <div class="col-3">
                                    <h5 class="mb-0">Order date</h5>
                                </div>
                                <div class="col-3">
                                    <h5 class="mb-0">Order status</h5>
                                </div>
                            </div>
                            <!-- order-card -->
                            <div class="row order-main order-card order-pink mt-3 align-items-center ">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="img/Untitled-5121.png" class="w-25 img-fluid ">
                                        <p class="mb-0 ms-2">Tapeoo Card x2</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p>$43</p>
                                </div>
                                <div class="col-3">
                                    <p>12 Aug 2021</p>
                                </div>
                                <div class="col-3">
                                    <div class="order-success ">
                                        <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row order-main order-card order-blue  mt-3 align-items-center">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="img/Untitled-5121.png" class="w-25 img-fluid ">
                                        <p class="mb-0 ms-2">Tapeoo Card x2</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p>$43</p>
                                </div>
                                <div class="col-3">
                                    <p>12 Aug 2021</p>
                                </div>
                                <div class="col-3">
                                    <div class="order-success ">
                                        <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row order-main order-card order-pink mt-3 align-items-center">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="img/Untitled-5121.png" class="w-25 img-fluid ">
                                        <p class="mb-0 ms-2">Tapeoo Card x2</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p>$43</p>
                                </div>
                                <div class="col-3">
                                    <p>12 Aug 2021</p>
                                </div>
                                <div class="col-3">
                                    <div class="order-success ">
                                        <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row order-main order-card order-blue mt-3 align-items-center">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="img/Untitled-5121.png" class="w-25 img-fluid ">
                                        <p class="mb-0 ms-2">Tapeoo Card x2</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p>$43</p>
                                </div>
                                <div class="col-3">
                                    <p>12 Aug 2021</p>
                                </div>
                                <div class="col-3">
                                    <div class="order-success ">
                                        <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row order-main order-card order-pink mt-3 align-items-center">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="img/Untitled-5121.png" class="w-25 img-fluid ">
                                        <p class="mb-0 ms-2">Tapeoo Card x2</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p>$43</p>
                                </div>
                                <div class="col-3">
                                    <p>12 Aug 2021</p>
                                </div>
                                <div class="col-3">
                                    <div class="order-success ">
                                        <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
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
    <?php include('../inc/js.php') ?>
</body>

</html>