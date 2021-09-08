<?php
include_once("inc/config.php");
$pageName = "Contact";

$linkPrefix = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, ak_secure_string($_POST['name']));
    $email = trim(strtolower(mysqli_real_escape_string($conn, ak_secure_string($_POST['email']))));
    $subject = mysqli_real_escape_string($conn, ak_secure_string($_POST['subject']));
    $message = htmlspecialchars($_POST['message']);

    $query = mysqli_query($conn, "INSERT INTO `" . $tblPrefix . "query` (`name`,`email`,`subject`,`msg`,`date_time`,`status`) VALUES('$name','$email','$subject','$message','$cTime',1)");

    if ($query == true) {
        $_SESSION['toast']['type'] = "success";
        $_SESSION['toast']['msg'] = "Query successfully sent";
        header('location:contact.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <head>
        <?php include('inc/head.php') ?>
        <link rel="stylesheet" href="admin/assets/css/alertify.rtl.min.css">
        <link rel="stylesheet" href="admin/assets/css/alertify-default-theme.rtl.min.css">

    </head>

<body>
    <!-- MAin MEnu Bar -->
    <?php include('inc/header.php') ?>
    <main>
        <section style="background: url('img/Ellipse\ 2.png'); background-size: 100% 100%; padding: 60px; padding-top: 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-what mt-5">
                            <h2 class="text-center">
                                <?php echo $pageName; ?> <?php echo SITE_NAME; ?>
                                <div class="animationLinetappeo mt-2"></div>
                            </h2>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding-1">
            <div class="container">
                <!-- <div class="row ">
                    <div class="col-4">
                        <div class="product-box text-center rounded">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <h6>Building Number , Loality </h6>
                            <h6>Area , Postal code </h6>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="product-box text-center rounded">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <h6>Building Number , Loality </h6>
                            <h6>Area , Postal code </h6>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="product-box text-center rounded d-flex align-items-center justify-content-around py-5">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <div>
                            <h5>Building Number , Loality </h5>
                            <h5>Area , Postal code </h5>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row  ">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 gy-5">
                        <div class="p-0">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20152794.650853816!2d-127.23455117809867!3d64.15165005987579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1631080768685!5m2!1sen!2sin" width="100%" height="460" style="border:0; border-radius:15px; box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.1);" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <!-- <div class="conatact-info">
                            <h2>
                                Information
                            </h2>
                            <h6 class="mt-4 fw-bold">
                                Address
                            </h6>
                            
                            <h6 class="mt-4 fw-bold">
                                Email
                            </h6>
                            <a href="mailto:<?php echo $_SESSION['general']['email']; ?>"><?php echo $_SESSION['general']['email']; ?></a>
                        </div> -->
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 gy-5">
                        <div class="contact-form">
                            <h2>
                                Send us a message
                            </h2>
                            <div class="c-form mt-4">
                                <form method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" require autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email" name="email" require autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject" name="subject" require autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message" require autocomplete="off"></textarea>
                                    </div>
                                    <div class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-end text-xxl-end">
                                        <button type="submit" class="btn btn-gradient" name="submit">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <?php include('inc/footer.php') ?>
    <?php include('inc/js.php') ?>
    <script src="admin/assets/js/alertify.min.js"></script>

    <?php echo toast(1); ?>
</body>

</html>