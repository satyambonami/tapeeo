<?php
include_once("../inc/config.php");
$pageName = "Login With Tapeoo";
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
                        <div class="login-background p-5">
                            <h1 class="heading-color font-weight-bolder">Welcome Back</h1>
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam in tenetur
                                corrupti nostrum doloribus tempora. Reprehenderit sint laborum consectetur
                                nesciunt! </p>
                            <a href="./signup.php" class=" btn-sign">Sign Up</a>
                        </div>
                    </div>

                    <div class="col-5 g-0">
                        <div class="login-main d-flex justify-content-center flex-column">
                            <div class="text-center">
                            <img src="../img/logo.png" alt="" class="img-responsive img-fluid login-form-image">
                            <p class="mt-2">Sign In to your account</p>
                            <form action="">
                                <input type="email" class="form-control" placeholder="Your Email" name="email" require
                                    autocomplete="off">
                                <input type="text" class="form-control" placeholder="Enter Password" name="pass" require
                                    autocomplete="off">
                                <div class="row">
                                    <div class="col-5">
                                        <p class="heading-color mt-2 mb-2 text-start"> <a href="./forget.php"
                                                style="color: #707070; ">
                                                Forgot Password </a></p>
                                    </div>
                                    <div class="col-7">
                                        <p class="heading-color mt-2 mb-2 text-end"> <a href="./signup.php"
                                                style="color: #D33696; ">
                                                Already have an account</a></p>
                                    </div>
                                </div>
                                <div
                                    class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-center text-xxl-center">
                                    <button type="submit" class="btn btn-gradient" name="submit"> Submit </button>
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