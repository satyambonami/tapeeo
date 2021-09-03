<?php
include_once("../inc/config.php");
$pageName = "Sign Up With Tapeoo";
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
        <section class=" section-padding-1 loginpage">
            <div class="container">
                <div class="row offset-1">
                    <div class="col-5 g-0 h-50">
                        <div class="sign-background p-5">
                            <h1 class="heading-color font-weight-bolder">Create an Account</h1>
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam in tenetur
                                corrupti nostrum doloribus tempora. Reprehenderit sint laborum consectetur
                                nesciunt! </p>
                            <a href="./login.php" class=" btn-sign">Login </a>
                        </div>
                    </div>

                    <div class="col-5 g-0">
                        <div class="sign-main d-flex justify-content-center flex-column">
                            <div class="text-center">
                            <img src="../img/logo.png" alt="" class="img-responsive img-fluid login-form-image">
                            <p class="mt-2">Sign In to your account</p>
                            <form method="POST" class="mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="First Name" name="name"
                                            require autocomplete="off">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Last Name" name="name"
                                            require autocomplete="off">
                                    </div>
                                </div>
                                <input type="email" class="form-control" placeholder="Your Email" name="email" require
                                    autocomplete="off">
                                <input type="text" class="form-control" placeholder="Enter Password" name="pass" require
                                    autocomplete="off">
                                <input type="text" class="form-control" placeholder="Confirm Password" name="cpass"
                                    require autocomplete="off">
                                <div class="d-flex align-items-center ms-2">
                                    <input type="checkbox" name="" id="">
                                    <h6 class="mt-2 ms-2"> I have read <a href="" style="color: #707070; ">Privacy
                                            Policy</h6></a>
                                </div>
                                <div
                                    class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-start text-xxl-start">

                                    <button type="submit" class="btn btn-gradient" name="submit">Submit</button>
                                </div>
                                
                            </form>
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