<?php
include_once("../inc/config.php");
$pageName = "Address";
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
                            <div class="row">
                                <div class="col-6 gy-3">
                                    <h6 class="ms-1">Default : <span style="color:#DF2C77"><b>HOME</b></span></h6>
                                    <div class="address-card">
                                        <h5 class="mb-2">
                                            Address holder name
                                        </h5>
                                        <p class="mb-2">
                                            Phone - +8144582619
                                        </p>
                                        <p class="mb-2">5 McBride Road, Viola,id, 83832 United States </p>
                                        <p class="mb-2">Viola,id, 83832 United States</p>
                                        <p class="mb-2">Postal Code : 99579</p>
                                        <div class="address-func">
                                            <div class="default">
                                                <a href="">Remove from default </a>
                                            </div>
                                            <div class="edit-delete mt-2">
                                            <a href="" class="me-2">Edit Address </a>
                                            <a href="">Delete Address </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 gy-3">
                                    <h6 class="ms-1"><span style="color:#DF2C77"><b>Office</b></span></h6>
                                    <div class="address-card">
                                        <h5 class="mb-2">
                                            Address holder name
                                        </h5>
                                        <p class="mb-2">
                                            Phone - +8144582619
                                        </p>
                                        <p class="mb-2">5 McBride Road, Viola,id, 83832 United States </p>
                                        <p class="mb-2">Viola,id, 83832 United States</p>
                                        <p class="mb-2">Postal Code : 99579</p>
                                        <div class="address-func">
                                            <div class="default">
                                                <a href="">Set as default </a>
                                            </div>
                                            <div class="edit-delete mt-2">
                                            <a href="" class="me-2">Edit Address </a>
                                            <a href="">Delete Address </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 gy-3">
                                    <h6 class="ms-1"><commit commit -m span style="color:#DF2C77"><b>HOME</b></span></h6>
                                    <div class="address-card">
                                        <h5 class="mb-2">
                                            Address holder name
                                        </h5>
                                        <p class="mb-2">
                                            Phone - +8144582619
                                        </p>
                                        <p class="mb-2">5 McBride Road, Viola,id, 83832 United States </p>
                                        <p class="mb-2">Viola,id, 83832 United States</p>
                                        <p class="mb-2">Postal Code : 99579</p>
                                        <div class="address-func">
                                            <div class="default">
                                                <a href="">Remove from default </a>
                                            </div>
                                            <div class="edit-delete mt-2">
                                            <a href="" class="me-2">Edit Address </a>
                                            <a href="">Delete Address </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 gy-3 mt-5">
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <div class="add-address">
                                        <div class=" d-flex align-items-center justify-content-center">
                                        <img src="img/plus.png" class="img-fluid">
                                        </div>
                                        <h2 class="text-center mt-3">Add Address</h2>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('inc/modal.php')?>
    <?php include('../inc/footer.php')?>
    <?php include('../inc/js.php')?>
</body>

</html>