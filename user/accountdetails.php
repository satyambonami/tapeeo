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
                                        <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
                                    </div>
                                    <div class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-end text-xxl-end">
                                        <a href="" class="btn btn-gradient">Send Message</a>
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