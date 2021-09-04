<?php
include_once("../inc/config.php");
$pageName = "Sign Up With Tapeoo";
$linkPrefix = "../";
       // register
if(isset($_POST['sign_up'])){
    $fname=mysqli_real_escape_string($conn,ak_secure_string($_POST['fname']));
    $lname=mysqli_real_escape_string($conn,ak_secure_string($_POST['lname']));
    $name= $fname.' '.$lname;
    $email=trim(strtolower(mysqli_real_escape_string($conn,ak_secure_string($_POST['email']))));
    $pass=mysqli_real_escape_string($conn,ak_secure_string($_POST['pass']));
    $cnfpass=mysqli_real_escape_string($conn,ak_secure_string($_POST['cpass']));
    if($pass==$cnfpass){
        $password=hash('sha512',$pass.HASH_KEY);
        $check=mysqli_query($conn,"SELECT `email` FROM `".$tblPrefix."users` WHERE `email`='$email'");
        $checkMail=mysqli_num_rows($check);
        if ($checkMail==0) {
            $data=mysqli_query($conn,"INSERT INTO `".$tblPrefix."users`(`type`, `name`, `email`, `password`,`date_time`, `status`) VALUES (0,'$name','$email','$password','$cTime',2)");
                if ($data==true) {
                    $_SESSION['toast']['type']="alert";
                    $_SESSION['toast']['msg']="Account succesfully created, Please login to continue";
                    // header("location:login.php");
                    // exit();
                }
        }else{
            $_SESSION['toast']['type']="error";
            $_SESSION['toast']['msg'] = "Email Already Regerstered";
            // header("location:signup.php");
            // exit();
        }
    }else{
            $_SESSION['toast']['type']="error";
            $_SESSION['toast']['msg'] = "Password not Matched";
            // header("location:signup.php");
            // exit();
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
                                        <input type="text" class="form-control" placeholder="First Name" name="fname"
                                            require autocomplete="off">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Last Name" name="lname"
                                            require autocomplete="off">
                                    </div>
                                </div>
                                <input type="email" class="form-control" placeholder="Your Email" name="email" require
                                    autocomplete="off">
                                <input type="password" class="form-control" placeholder="Enter Password" name="pass" require
                                    autocomplete="off">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpass"
                                    require autocomplete="off">
                                <div class="d-flex align-items-center ms-2">
                                    <input type="checkbox" name="TcPc" id="" required>
                                    <h6 class="mt-2 ms-2"> I have read <a href="" style="color: #707070; ">Privacy
                                            Policy</h6></a>
                                </div>
                                <div
                                    class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-start text-xxl-start">

                                    <button type="submit" class="btn btn-gradient" name="sign_up">Submit</button>
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
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>
</body>

</html>