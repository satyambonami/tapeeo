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
    <link rel="stylesheet" href="../admin/assets/css/alertify.rtl.min.css">
<link rel="stylesheet" href="../admin/assets/css/alertify-default-theme.rtl.min.css">
</head>

<body>
    <?php include('../inc/header.php') ?>
    <?php include('inc/header-user.php') ?>
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 offset-xl-3 offset-xxl-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="login-main forget">
                            <h3 class="heading-color my-3 text-center">Enter your Email</h3>
                            <form method="POST" class="mt-2 d-flex">
                                <input type="email" class="form-control mt-0" placeholder="Your Email" name="email"
                                    require autocomplete="off">
                                <button type="submit" class="btn btn-gradient rounded ms-lg-2 ms-xl-2 ms-xxl-2" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 offset-xl-3 offset-xxl-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="login-main forget">
                            <h3 class="heading-color my-3 text-center">Enter your Password</h3>
                            <form method="POST" class="mt-2 text-center">
                                <input type="pass" class="form-control" placeholder="New Password" name=""
                                    require autocomplete="off">
                                <input type="pass" class="form-control" placeholder="Confirm Password" name=""
                                    require autocomplete="off">

                                <button type="submit" class="btn btn-gradient rounded mt-2" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>
</body>

</html>