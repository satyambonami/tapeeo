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
    <?php if(isset($_GET['u']) && isset($_GET['token'])){
        $u=mysqli_real_escape_string($conn,$_GET['u']);
        $token=mysqli_real_escape_string($conn,$_GET['token']);
    ?>
     <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 offset-xl-3 offset-xxl-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="login-main forget">
                            <h3 class="heading-color my-3 text-center">Enter your Password</h3>
                            <form method="POST" class="mt-2 text-center" action="../inc/forget-password.php">
                                <input type="hidden" name="u" value="<?php echo $u;?>">
                                <input type="hidden" name="token" value="<?php echo $token;?>">
                                <input type="password" class="form-control" placeholder="New Password" name="password"
                                    require autocomplete="off">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="conf-password"
                                    require autocomplete="off">
                                <button type="submit" class="btn btn-gradient rounded mt-2" name="recover-account">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php }else{?>
            <section class="section-padding-1">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-3 offset-xl-3 offset-xxl-3 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="login-main forget">
                                <h3 class="heading-color my-3 text-center">Enter your Email</h3>
                                <form method="POST" class="mt-2 d-flex" action="../inc/forget-password.php">
                                    <input type="email" class="form-control mt-0" placeholder="Your Email" name="email"
                                        required autocomplete="off">
                                    <button type="submit" class="btn btn-gradient rounded ms-lg-2 ms-xl-2 ms-xxl-2" name="verify">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }?> 
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>
</body>

</html>