<?php
    include_once("inc/config.php");
    $pageName="Contact";

    $linkPrefix="";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <head>
        <?php include('inc/head.php')?>
    <style>
        .form-control {
            display: block;
            width: 100%;
            padding: 0.575rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #eee;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.50rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            margin-top: 12px;
        }
    </style>
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
                            <h6 class="mt-4">

                                Address
                            </h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illo tempora possimus sed dicta culpa laborum suscipit deserunt. Nesciunt harum optio odio doloribus nihil eos sed, voluptatibus eligendi quis atque.</p>
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
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
                                    </div>
                                    <div class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-end text-xxl-end">
                                        <a href="" class="btn btn-gradient">Send Message</a>
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
</body>

</html>