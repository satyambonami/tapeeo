<?php
include_once("../inc/config.php");
$pageName = "Login With Tapeoo";
$linkPrefix = "../";

// Sign In
if (isset($_POST['login'])) {
    $email = strtolower(mysqli_real_escape_string($conn, ak_secure_string($_POST['email'])));
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $password = hash('sha512', $pass . HASH_KEY);

    $checkAdmin = mysqli_query($conn, "SELECT * FROM `" . $tblPrefix . "users` WHERE `email`='$email' AND `password`='$password' AND status>1 AND type=0");
    if (mysqli_num_rows($checkAdmin) > 0) {
        $adminData = mysqli_fetch_assoc($checkAdmin);
        $_SESSION['user'] = $adminData;
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']['password']);
            $_SESSION['toast']['type'] = "success";
            $_SESSION['toast']['msg'] = "Successfully logged In.";
            header("location:index.php");
            exit();
        } else {
            $_SESSION['toast']['msg'] = 'Something went wrong, Please try again.';
        }
    } else {
        $_SESSION['toast']['msg'] = 'Currently you are not registered with us, Or your account is deactivated. <br> Please contact to senior admin.';
    }
}

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
        <section class=" section-padding-1 loginpage">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 g-md-0 g-lg-0 g-xl-0 g-xxl-0">
                        <div class="login-background p-5">
                            <h1 class="heading-color font-weight-bolder">Welcome Back</h1>
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam in tenetur
                                corrupti nostrum doloribus tempora. Reprehenderit sint laborum consectetur
                                nesciunt! </p>
                            <a href="./signup.php" class=" btn-sign">Sign Up</a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 g-md-0 g-lg-0 g-xl-0 g-xxl-0">
                        <div class="login-main d-flex justify-content-center flex-column">
                            <div class="text-center">
                                <img src="../img/<?php echo $_SESSION['general']['logo']; ?>" alt="" class="img-responsive img-fluid login-form-image">
                                <p class="mt-2">Sign In to your account</p>
                                <form method="POST">
                                    <input type="email" class="form-control" placeholder="Your Email" name="email" require autocomplete="off">
                                    <input type="password" class="form-control" placeholder="Enter Password" name="password" require autocomplete="off">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="heading-color mt-2 mb-2 text-start"> <a href="./forget.php" style="color: #707070; ">
                                                    Forgot Password </a></p>
                                        </div>
                                        <div class="col-7">
                                            <p class="heading-color mt-2 mb-2 text-end"> <a href="./signup.php" style="color: #D33696; ">
                                                    Don't have an account?</a></p>
                                        </div>
                                    </div>
                                    <div class="submit-btn mt-2 text-center text-sm-center text-md-center text-lg-center text-xxl-center">
                                        <button type="submit" class="btn btn-gradient" name="login"> Submit </button>
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
    <script src="../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1); ?>
</body>

</html>