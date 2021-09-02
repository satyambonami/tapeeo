<?php
    include_once("inc/config.php");
    $pageName="Contact";

    $linkPrefix="";

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn,ak_secure_string($_POST['name']));
        $email = trim(strtolower(mysqli_real_escape_string($conn,ak_secure_string($_POST['email']))));
        $subject = mysqli_real_escape_string($conn,ak_secure_string($_POST['subject']));
        $message = htmlspecialchars($_POST['message']);

        $query = mysqli_query($conn,"INSERT INTO `".$tblPrefix."query` (`name`,`email`,`subject`,`msg`,`date_time`,`status`) VALUES('$name','$email','$subject','$message','$cTime',1)");
        
        if($query == true){
            $_SESSION['toast']['type']="success";
            $_SESSION['toast']['msg']="Query successfully sent";
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
        <?php include('inc/head.php')?>
        <link rel="stylesheet" href="admin/assets/css/alertify.rtl.min.css">
        <link rel="stylesheet" href="admin/assets/css/alertify-default-theme.rtl.min.css">
    
</head>

<body>
    <!-- MAin MEnu Bar -->
    <?php include('inc/header.php')?>
    <main>
        <section style="background: url('img/Ellipse\ 2.png'); background-size: 100% 100%; padding: 60px; padding-top: 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-what mt-5">
                            <h2 class="text-center">
                                <?php echo $pageName;?>  <?php echo SITE_NAME;?>
                                <div class="animationLinetappeo mt-2"></div>
                            </h2>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6">
                        <div class="conatact-info">
                            <h2>
                                Information
                            </h2>
                            <h6 class="mt-4 fw-bold">
                                Address
                            </h6>
                            <p><?php echo $_SESSION['general']['address'];?></php>
                            <h6 class="mt-4 fw-bold">
                                Email
                            </h6>
                            <a href="mailto:<?php echo $_SESSION['general']['email'];?>"><?php echo $_SESSION['general']['email'];?></a>
                        </div>
                        <div class="com mt-3">
                            <h6>
                                Communiction with us
                            </h6>
                            <div class="social-links text-center d-flex mt-4">
                                <ul class="text-center  ps-0">
                                    <?php if($_SESSION['general']['facebook']!=NULL){ ?>
                                    <li>
                                        <a href="<?php echo $_SESSION['general']['facebook']; ?>" target="_blank" class="ps-0">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <?php }?>
                                    <?php if($_SESSION['general']['youtube']!=NULL){ ?>
                                    <li>
                                        <a href="<?php echo $_SESSION['general']['youtube']; ?>" target="_blank">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <?php }?>
                                    <?php if($_SESSION['general']['instagram']!=NULL){ ?>
                                    <li>
                                        <a href="<?php echo $_SESSION['general']['instagram']; ?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <?php }?>
                                    <?php if($_SESSION['general']['tiktok']!=NULL){ ?>
                                    <li>
                                        <a href="<?php echo $_SESSION['general']['tiktok']; ?>" target="_blank">
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6">
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
    <?php include('inc/footer.php')?>
    <?php include('inc/js.php')?>
    <script src="admin/assets/js/alertify.min.js"></script>
    
<?php echo toast(1);?>
</body>

</html>