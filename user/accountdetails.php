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
                        <div class="details-div">

                            <!-- deta -->
                            <div class="details-content">
                                <div class="row">
                                    <form>
                                        <div class="row">
                                            <div class="col-6">
                                                <Label>First Name</Label>
                                                <input type="text" class="form-control form-group"
                                                    placeholder="First Name">

                                            </div>
                                            <div class="col-6">
                                                <Label>First Name</Label>
                                                <input type="text" class="form-control form-group"
                                                    placeholder="First Name">
                                            </div>
                                        </div>


                                        <Label>First Name</Label>
                                        <input type="text" class="form-control form-group" placeholder="First Name">


                                        <Label>First Name</Label>
                                        <input type="text" class="form-control form-group" placeholder="First Name">



                                        <div
                                            class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-start text-xxl-start">
                                            <a href="" class="btn btn-gradient">Save Changes</a>
                                        </div>
                                    </form>
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