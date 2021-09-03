<?php
include_once("../inc/config.php");
$pageName = "Signup With Tapeoo";
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
                    <div class="offset-3 col-6">
                        <div class="login-main">
                            <h3 class="heading-color my-3">Create An Account</h3>
                            <form method="POST" class="mt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="First Name" name="name" require autocomplete="off">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Last Name" name="name" require autocomplete="off">
                                    </div>
                                </div>
                                <input type="email" class="form-control" placeholder="Your Email" name="email" require autocomplete="off">
                                <input type="text" class="form-control" placeholder="Enter Password" name="pass" require autocomplete="off">
                                <input type="text" class="form-control" placeholder="Confirm Password" name="cpass" require autocomplete="off">
                                <div class="d-flex align-items-center ms-2">
                                    <input type="checkbox" name="" id="">
                                    <h6 class="mt-2 ms-2"> I have read <a href="" style="color: #707070; ">Privacy Policy</h6></a>
                                </div>
                                <div class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-start text-xxl-start">

                                    <button type="submit" class="btn btn-gradient" name="submit">Submit</button>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 d-flex  align-items-start">
                                        <p class="heading-color mb-0">Already have an account ? <a href="" style="color: #707070; ">Login </a></p>
                                    </div>
                                </div>
                        </div>

                    </div>

                    </form>

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