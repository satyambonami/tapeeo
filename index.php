<?php
include_once("inc/config.php");
$pageName = "Home";

$linkPrefix = "";
$product = mysqli_query($conn, "SELECT `pid`,`name`,`image`,`offer_price` FROM `" . $tblPrefix . "products` WHERE status=2 ORDER BY pid ASC LIMIT 3");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/head.php') ?>
</head>

<body>
    <div class="showBeforeStart">
        <div>
            <h1 class="ml4">
                <span class="letters letters-1">Tap</span>
                <span class="letters letters-2">Pay</span>
                <span class="letters letters-3">Go!</span>
            </h1>
        </div>
    </div>
    <?php include('inc/header.php') ?>
    <!--Banner  -->
    <section class="banner-section">
        <div class="container">
            <div class="row py-5">
                <div class="
                        offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xxl-0
                        col-12 col-sm-12 col-md-12 col-lg-7 col-xxl-7 
                        d-flex 
                        align-items-center banner-justify order-1 order-sm-1 order-md-1 order-lg-1 order-xxl-1
                        ">
                        <div class="banner-content px-3 m-auto mt-3 mt-lg-0 mt-xxl-0">
                            <h1>
                                New <span style="color: #d33696">Business</span> <span>Card</span><br />
                                For <span>New</span> <span style="color: #d33696">Generation</span>
                            </h1>
                            <h4>your Tapeeo device to....</h4>
                            <!-- Animation div -->
                            <div class="animationText_div d-flex">
                                <!-- Animation text -->
                                <h5 class="animationText"></h5>
                            </div>
                            <!-- animtion line -->
                            <div class="animationLine"></div>
                            <!-- Animation div -->
                            <a href="shop.php" class="btn btn-gradient mt-2">Shop Now</a>
                        </div>
                    </div>
                <div class="
                    col-12 col-sm-12 col-md-12 col-lg-5 col-xxl-5 gy-5 gy-sm-5 gy-md-5 gy-lg-0 gy-xxl-0
                    d-flex
                    justify-content-center
                    align-items-center
                    position-relative order-2 order-sm-2 order-md-2 order-lg-2 order-xxl-2">
                    <img src="img/logo5.gif" alt="Tapeeo Card" class="img-fluid img-responsive">
                </div>
            </div>
        </div>
    </section>
    <!-- main tag start here  -->
    <main>
        <!-- section-2 -->
        <section class="section-padding-1 pb-0">
            <div class="container" style="
            background-color:#f3fdfe;
            border-radius:40px;
            padding: 60px 0;
            overflow: hidden;
          ">
                <div class="row">
                    <div class="offset-1 col-10 what-is-tapeeo">
                        <div class="heading-what text-center mb-5">
                            <h2>
                                What is TAPEEO for?
                                <div class="animationLinetappeo mt-2"></div>
                            </h2>
                        </div>
                        <!-- heading-1 -->
                        <div class="what-is-text text-center">
                            <h4>Ever had to awkwardly recite contact details?</h4>
                        </div>
                        <div class="what-is-img text-center mt-5">
                            <img src="img/emailComic.png" class="img-fluid img-responsive" />
                        </div>

                        <div class="heading-what text-center mt-5">
                            <h4>
                                TAPEEO fixes that.
                                <div class="animationLinetappeo mt-2"></div>
                            </h4>
                        </div>
                        <div class="what-is-content mt-1">
                            <p class="text-center">
                                And in a way no one else has done before. A Tapeeo device can instantly share exactly
                                what you want, whenever you want. It's also just half the cost of a box of business
                                cards.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section 3 -->
        <section class="section-padding-1 pb-lg-0 pb-xxl-0">
            <div class="container sec-3-bg-img">
            <div class="row d-none d-sm-none d-md-none d-lg-block d-xxl-block">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6 offset-0 offset-sm-0 offset-md-3 offset-lg-3 offset-xxl-3  ">
                        <div class="scene scene--card">
                            <div class="card-flip">
                                <div class="card__face card__face--front">
                                    <div class="flip-logo">
                                        <img src="img/logo.png" class="img-fluid img-responsive ">
                                    </div>
                                </div>
                                <div class="card__face card__face--back">
                                    <div class="bar-code">
                                        <img src="img/card 3.png" class="img-fluid img-responsive ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="
                        offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xxl-1
                        col-12 col-sm-12 col-md-12 col-lg-5 col-xxl-5 
                        d-flex 
                        align-items-center banner-justify order-1 order-sm-1 order-md-1 order-lg-1 order-xxl-1
                        ">
                        <div class="banner-content px-3 m-auto mt-3 mt-lg-0 mt-xxl-0">
                            <h1>How </br>  <span style="color: #d33696">TAPEEO</span> Works ?
                            </h1>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident, commodi. Perferendis repellendus ipsam suscipit? Maiores error eos officia laboriosam quos suscipit facere eius laudantium eligendi corporis tenetur, magnam amet? Iure.
                            </p>
                        </div>
                    </div>
                    <div class="
                        col-12 col-sm-12 col-md-12 col-lg-7 col-xxl-6 gy-5 gy-sm-5 gy-md-5 gy-lg-0 gy-xxl-0
                        d-flex
                        justify-content-center
                        align-items-center
                        donutBg
                        position-relative order-2 order-sm-2 order-md-2 order-lg-2 order-xxl-2 flex-column 
                        ">
                        <!-- extra file link --> 
                        <div class="row d-block d-sm-block d-md-block d-lg-none d-xxl-none mb-3">
                            <div class="col-12">
                                <div class="scene scene--card">
                                    <div class="card-flip">
                                        <div class="card__face card__face--front">
                                            <div class="flip-logo">
                                                <img src="img/logo.png" class="img-fluid img-responsive ">
                                            </div>
                                        </div>
                                        <div class="card__face card__face--back">
                                            <div class="bar-code">
                                                <img src="img/card 3.png" class="img-fluid img-responsive ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Mobiel Div -->
                        <!-- Mobiel Div -->
                        <div class="mobile_div_outer">
                            <div class="mobile_div_inner">
                                <div class="screen">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="./img/shop.cf037be9.jpg" />
                                        </div>
                                        <div class="item">
                                            <img src="./img/profile.af3b48e1.jpg" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Mobiel Div -->
                        <!-- Mobiel Div -->

                        <!-- extra file link -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Section-4 -->
        <section class=" how-to-share-bg">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="heading-what ">
                        <h2 class="text-center">
                            How to share tapeeo
                            <div class="animationLinetappeo mt-2"></div>
                        </h2>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-4 gy-5 gx-5" style="display:table;">
                        <div class="product-box" style="display:table-cell;">
                            <div class="imgBox text-center">
                                <img src="img/responsive.png" class="img-fluid img-responsive" />
                            </div>
                            <div class="ContentBx text-center p-4">
                                <h4>With a Tapeeo Device</h4>
                                <p class="mb-0">
                                    For face-to-face interactions. People can scan or tap your device to open your
                                    active Tapeeos. You can buy one here (this store was made with a Shop Tapeeo).
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-4 gy-5 gx-5" style="display:table;">
                        <div class="product-box" style="display: table-cell;">
                            <div class="imgBox text-center">
                                <img src="img/qr-code.png" class="img-fluid img-responsive" />
                            </div>
                            <div class="ContentBx text-center p-4">
                                <h4>QR Code</h4>
                                <p class="mb-0">
                                    Print your QR code at Tapeeo.app and tape it to your counter, window, or put it in a
                                    plaque. Then use it as a payment terminal, guest sign up, event guide, WiFi login,
                                    for contact tracing, to share your menu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-4 gy-5 gx-5" style="display: table;">
                        <div class="product-box" style="display: table-cell;">
                            <div class="imgBox text-center">
                                <img src="img/link.png" class="img-fluid img-responsive" />
                            </div>
                            <div class="ContentBx text-center p-4">
                                <h4>Link</h4>
                                <p class="mb-0">
                                    Every Tapeeo has a short link that you can use to share it. You can customize the
                                    link to whatever is available. Sign up to reserve your preferred links. As an
                                    example.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-4 gy-5 gx-5" style="display: table;">
                        <div class="product-box" style="display: table-cell;">
                            <div class="imgBox text-center">
                                <img src="img/bed.png" class="img-fluid img-responsive" />
                            </div>
                            <div class="ContentBx text-center p-4">
                                <h4>Embedding</h4>
                                <p class="mb-0">
                                    If you already have a site, you can expand its functionallity by embedding tapeeo.
                                    Our blog, contact form, and store are all embedded tapeeo. You can learn how to do
                                    this here.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section-7 -->
        <section class="section-padding-1 ">
            <div class="container">
                <div class="row">
                    <div class="col-10 offset-1">
                        <h2 class="text-center">
                            <b style="font-size: 30px;">Questions or inquiries? Use our Contact Tapeeo</b>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
         <!-- section6 -->
         <section class="mb-5 pb-4">
            <div class="container quickPoints" style="background-color:#f3fdfe;
                border-radius: 80px;
                overflow: hidden;
            ">
                <div class="row">
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xxl-4">
                        <div class="imgBx text-center">
                            <img src="img/Free shipping-pana.png" class="img-responsive img-fluid w-50">
                        </div>
                        <h6 class="text-center" style="font-weight: 700;">
                            Free NA Shipping
                        </h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xxl-4">
                        <div class="imgBx text-center">
                            <img src="img/Credit card-rafiki (1).png" class="img-responsive img-fluid w-50">
                        </div>
                        <h6 class="text-center" style="font-weight: 700;">
                            Easy Refunds
                        </h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xxl-4">
                        <div class="imgBx text-center">
                            <img src="img/Safe-bro.png" class="img-responsive img-fluid w-50">
                        </div>
                        <h6 class="text-center" style="font-weight: 700;">
                            Secure Checkout
                        </h6>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('inc/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <?php include('inc/js.php') ?>
    <script>
        var card = document.querySelector('.card-flip');
        card.addEventListener('click', function() {
            card.classList.toggle('is-flipped');
        });
    </script>

</body>

</html>