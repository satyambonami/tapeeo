<?php
include_once("../inc/config.php");
$pageName = "Forget Password";
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
                            <h3 class="heading-color my-3">Eter</h3>
                            <form method="POST" class="mt-4">

                                <input type="email" class="form-control" placeholder="Your Email" name="email" require autocomplete="off">
                                <input type="text" class="form-control" placeholder="Enter Password" name="pass" require autocomplete="off">

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <div class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-start text-xxl-start">

                                            <button type="submit" class="btn btn-gradient" name="submit">Submit</button>
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex  align-items-end flex-column ">
                                        <p class="heading-color mb-0"> <a href="" style="color: #707070; "> Forgot Password </a></p>
                                        <p class="heading-color mb-0">Don't have an account? <a href="" style="color: #707070; "> Signin </a></p>
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