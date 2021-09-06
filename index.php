<?php
    include_once("inc/config.php");
    $pageName="Home";

    $linkPrefix="";
    $product = mysqli_query($conn,"SELECT `pid`,`name`,`image`,`offer_price` FROM `".$tblPrefix."products` WHERE status=2 ORDER BY pid ASC LIMIT 3");

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
            <div class="row">
                <div class="
              offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xxl-1
              col-12 col-sm-12 col-md-12 col-lg-5 col-xxl-5 
              d-flex
              align-items-center banner-justify
            ">
                    <div class="banner-content px-3">
                        <h1>
                            Others <br />
                            <span>tap</span> or <span style="color: #d33696">scan</span>
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
              col-12 col-sm-12 col-md-12 col-lg-7 col-xxl-6 gy-5 gy-sm-5 gy-md-5 gy-lg-0 gy-xxl-0
              d-flex
              justify-content-center
              align-items-center
              donutBg
              position-relative
            ">
                    <!-- extra file link -->

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
    <!-- main tag start here  -->
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                <?php
                    $i=0;
                    while($dataP = mysqli_fetch_assoc($product)){
                        $i++;
                ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4 gy-3 gy-sm-3 gy-md-3 gy-lg-0 gy-xxl-0">
                        <a href="product-detail.php?product=<?php ak_url_encode( $dataP['name'])?>&id=<?php echo $dataP['pid']?>">
                            <div class="product-box  <?php if($i % 2 == 0){echo 'product-box-pink';}else{echo 'product-box-blue';}?>">
                                <div class="product-image text-center">
                                    <img src="img/products/<?php echo $dataP['image']?>" class="w-100 img-fluid ">
                                </div>
                                <div class="product-heading text-center mt-3">
                                    <h6><?php echo $dataP['name'];?></h6>
                                    <p>$<?php echo $dataP['offer_price'];?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }?>
                </div>
            </div>
        </section>
        <!-- section-2 -->
        <section class="">
            <div class="container" style="
            background: url('img/Path 1.png');
            background-repeat: no-repeat;
            background-size: cover;
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

                        <!-- heading-2 -->
                        <div class="what-is-text text-center mt-5">
                            <h4>Ever had to share the group pic with everyone?</h4>
                        </div>
                        <div class="what-is-img text-center mt-5">
                            <img src="img/groupPicComic.png" class="img-fluid img-responsive" />
                        </div>
                        <div class="what-is-content mt-3">
                            <p class="text-center">
                                WiFi, files, portfolios, resumes, contracts, forms, links, playlists. Digital stuff is a
                                pain share quickly in face-to-face interactions.
                            </p>
                        </div>
                        <!-- end -->

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
        <section class=" section-padding-1 pb-lg-0 pb-xxl-0">
            <div class="container sec-3-bg-img">
                <div class="row">
                    <div class="col-10 offset-2 what-is-tapeeo m-auto">
                        <div class="heading-what mb-5">
                            <h2 class="text-center">
                                How Its Work?
                                <div class="animationLinetappeo mt-2"></div>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-5 col-xxl-5 border-right-white steps-tapeoo">
                                <!-- Step 1 -->
                                <div class="step-1">
                                    <h6 class="">1.Make your Tapeeo at Tapeeo.app</h6>
                                    <div class="step-1-img mt-4">
                                        <img src="img/12.png" class="img-fluid img-responsive" />
                                    </div>
                                </div>
                                <!-- step 2 -->
                                <div class="step-2 mt-4">
                                    <h6 class="">2. Select a Tapeeo for the moment</h6>
                                    <!-- step 2 first row -->
                                    <div class="row align-items-center">
                                        <div class="col-3 step-2-img mt-2">
                                            <div class="svg-step rounded-circle p-2 text-center card_div" id="0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="37.295" height="37.722" viewBox="0 0 50.295 37.722">
                                                    <path id="businesscard" d="M47.162,37.723H3.151a3.02,3.02,0,0,1-2.21-.933,3.02,3.02,0,0,1-.933-2.21V3.143A3.02,3.02,0,0,1,.942.934,3.02,3.02,0,0,1,3.151,0h44.01a3.02,3.02,0,0,1,2.21.933,3.02,3.02,0,0,1,.933,2.21V34.579a3,3,0,0,1-.933,2.235,3.059,3.059,0,0,1-2.21.909ZM17.3,23.872v-.835q4.716-1.867,4.716-10.462a5.44,5.44,0,0,0-2.186-4.691,9.39,9.39,0,0,0-5.674-1.6,9.39,9.39,0,0,0-5.674,1.6,5.44,5.44,0,0,0-2.186,4.691q0,8.351,4.716,10.413v.884a12.984,12.984,0,0,0-5.623,2.21,4.747,4.747,0,0,0-2.235,3.684q0,.589,1.056.958A12.682,12.682,0,0,0,7.3,31.24q2.039.147,3.365.172t3.488.025q2.162,0,3.488-.025t3.365-.172a12.682,12.682,0,0,0,3.095-.516q1.056-.369,1.056-.958a4.731,4.731,0,0,0-2.26-3.684,13.143,13.143,0,0,0-5.6-2.21ZM45.59,6.287H33.016a1.6,1.6,0,0,0-1.572,1.572,1.6,1.6,0,0,0,1.572,1.572H45.59a1.6,1.6,0,0,0,1.572-1.572A1.6,1.6,0,0,0,45.59,6.287Zm-14.146,11a1.6,1.6,0,0,0,1.572,1.572H39.3a1.572,1.572,0,0,0,0-3.144H33.016a1.6,1.6,0,0,0-1.572,1.572Zm14.146,7.86H33.016a1.572,1.572,0,0,0,0,3.144H45.59a1.572,1.572,0,0,0,0-3.144Z" transform="translate(-0.009 -0.001)" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-9 step-2-text ">
                                            <p class="mb-0 text-start">Business Profile</p>
                                        </div>
                                    </div>
                                    <!-- step 2 second row -->
                                    <div class="row align-items-center">
                                        <div class="col-3 step-2-img mt-2">
                                            <div class="svg-step rounded-circle p-2 text-center card_div" id="1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="37.295" height="37.722" viewBox="0 0 50.295 37.722">
                                                    <path id="businesscard" d="M47.162,37.723H3.151a3.02,3.02,0,0,1-2.21-.933,3.02,3.02,0,0,1-.933-2.21V3.143A3.02,3.02,0,0,1,.942.934,3.02,3.02,0,0,1,3.151,0h44.01a3.02,3.02,0,0,1,2.21.933,3.02,3.02,0,0,1,.933,2.21V34.579a3,3,0,0,1-.933,2.235,3.059,3.059,0,0,1-2.21.909ZM17.3,23.872v-.835q4.716-1.867,4.716-10.462a5.44,5.44,0,0,0-2.186-4.691,9.39,9.39,0,0,0-5.674-1.6,9.39,9.39,0,0,0-5.674,1.6,5.44,5.44,0,0,0-2.186,4.691q0,8.351,4.716,10.413v.884a12.984,12.984,0,0,0-5.623,2.21,4.747,4.747,0,0,0-2.235,3.684q0,.589,1.056.958A12.682,12.682,0,0,0,7.3,31.24q2.039.147,3.365.172t3.488.025q2.162,0,3.488-.025t3.365-.172a12.682,12.682,0,0,0,3.095-.516q1.056-.369,1.056-.958a4.731,4.731,0,0,0-2.26-3.684,13.143,13.143,0,0,0-5.6-2.21ZM45.59,6.287H33.016a1.6,1.6,0,0,0-1.572,1.572,1.6,1.6,0,0,0,1.572,1.572H45.59a1.6,1.6,0,0,0,1.572-1.572A1.6,1.6,0,0,0,45.59,6.287Zm-14.146,11a1.6,1.6,0,0,0,1.572,1.572H39.3a1.572,1.572,0,0,0,0-3.144H33.016a1.6,1.6,0,0,0-1.572,1.572Zm14.146,7.86H33.016a1.572,1.572,0,0,0,0,3.144H45.59a1.572,1.572,0,0,0,0-3.144Z" transform="translate(-0.009 -0.001)" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-9 step-2-text ">
                                            <p class="mb-0 text-start">Social Profile</p>
                                        </div>
                                    </div>
                                    <!-- step 2 three row -->
                                    <div class="row align-items-center">
                                        <div class="col-3 step-2-img mt-2">
                                            <div class="svg-step rounded-circle p-2 text-center card_div" id="2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="37.639" height="37.832" viewBox="0 0 59.639 28.832">
                                                    <path id="amazon-pay" d="M58.246,9l-.548.091a9.922,9.922,0,0,0-4.74,1.894,7.833,7.833,0,0,0-.885.676.426.426,0,0,1-.063-.184c-.063-.34-.091-.7-.151-1.042A.875.875,0,0,0,50.91,9.6H49.47c-.885,0-1.039.189-1.039,1.046V37.194a.634.634,0,0,0,.608.638H51.7c.368,0,.58-.24.608-.638a1.521,1.521,0,0,0,.03-.368V27.6c.124.124.217.184.277.245a8.748,8.748,0,0,0,7.618,1.927A7.593,7.593,0,0,0,65.71,25.4a12.111,12.111,0,0,0,1.279-5.443,13.659,13.659,0,0,0-1.009-6.129,7.323,7.323,0,0,0-5.474-4.619c-.4-.091-.823-.124-1.221-.184C58.919,9,58.582,9,58.244,9ZM78.622,9a1.52,1.52,0,0,1-.368.061,18.052,18.052,0,0,0-3.607.52c-.764.184-1.5.457-2.235.7a.933.933,0,0,0-.673.979c.03.4,0,.825,0,1.223.03.611.277.769.86.615.979-.247,1.955-.52,2.934-.7a14.809,14.809,0,0,1,4.649-.184,3.088,3.088,0,0,1,2.111,1.07,3.5,3.5,0,0,1,.676,2.048c.03,1.042.03,1.864.03,2.9,0,.061,0,.121-.03.149h-.154a22.331,22.331,0,0,0-4-.608,10.655,10.655,0,0,0-4.157.489,6.042,6.042,0,0,0-3.7,3.12,6.565,6.565,0,0,0-.492,3.824,5.145,5.145,0,0,0,2.7,3.971,7.257,7.257,0,0,0,4.74.671,10.027,10.027,0,0,0,5.043-2.293c.061-.061.123-.089.184-.149.091.489.158.951.247,1.38a.725.725,0,0,0,.676.671h2.048a.608.608,0,0,0,.585-.611,1.169,1.169,0,0,0,.03-.338V15.457a10.17,10.17,0,0,0-.133-1.594,4.969,4.969,0,0,0-2.386-3.824,7.412,7.412,0,0,0-2.719-.883c-.459-.063-.892-.093-1.347-.154h-1.5Zm10.6,0c-.308,0-.459.273-.4.576a6.884,6.884,0,0,0,.247.771c2.447,6.056,4.921,12.106,7.4,18.195a1.651,1.651,0,0,1,0,1.468c-.394.916-.734,1.862-1.16,2.78a2.831,2.831,0,0,1-1.895,1.685,5.084,5.084,0,0,1-1.925.124c-.308-.03-.615-.091-.923-.124-.429-.03-.638.149-.671.608v1.23c.03.706.247,1.009.948,1.133a15.115,15.115,0,0,0,2.109.238A5.266,5.266,0,0,0,97.881,35a16.1,16.1,0,0,0,1.16-2.293c2.962-7.492,5.9-14.953,8.834-22.478a2.493,2.493,0,0,0,.184-.676c.058-.368-.126-.55-.459-.543h-2.472a.988.988,0,0,0-.979.638c-.061.184-.124.333-.184.517L99.594,22.679c-.308.885-.648,1.8-.953,2.78-.063-.154-.091-.214-.123-.308-1.62-4.465-3.206-8.923-4.826-13.387-.245-.734-.52-1.442-.795-2.146-.109-.348-2.694-.606-3.672-.606ZM58.216,12.178a4.571,4.571,0,0,1,4.19,3.244,11.43,11.43,0,0,1,.613,4.05,11.856,11.856,0,0,1-.485,3.733c-.858,2.661-8.6,2.81-10.006,1.834a.386.386,0,0,1-.214-.394V14.262a.414.414,0,0,1,.214-.424,8.64,8.64,0,0,1,5.688-1.654Zm19.842,8.261c.524-.044,3.654.3,4.693.45.217.03.273.124.273.308-.03.613,0,1.2,0,1.808S83,24.168,83,24.783a.367.367,0,0,1-.184.361,9.678,9.678,0,0,1-4.681,1.869,4.383,4.383,0,0,1-2.079-.214c-.76-.279-1.8-3.308-1.585-4.1a2.979,2.979,0,0,1,2.046-1.955,7.6,7.6,0,0,1,1.547-.305Z" transform="translate(-48.431 -9)" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-9 step-2-text ">
                                            <p class="mb-0 text-start">Pay Me</p>
                                        </div>
                                    </div>
                                    <!-- step 2 four row -->
                                    <div class="row align-items-center">
                                        <div class="col-3 step-2-img mt-2">
                                            <div class="svg-step rounded-circle p-2 text-center card_div" id="3">

                                                <svg id="link" xmlns="http://www.w3.org/2000/svg" width="37.768" height="37.404" viewBox="0 0 52.768 40.404">
                                                    <path id="Path_2" data-name="Path 2" d="M44.436,8.719a10.538,10.538,0,0,0-14.929,0L32,11.212a7.042,7.042,0,1,1,9.958,9.958l-14.05,14.05a7.035,7.035,0,0,1-9.958-9.94l2.476-2.493L17.95,20.295l-2.493,2.493A10.55,10.55,0,0,0,30.422,37.662l14.05-14.05a10.538,10.538,0,0,0-.034-14.893Z" transform="translate(5.231 -5.619)" />
                                                    <path id="Path_3" data-name="Path 3" d="M6.747,38.523a7.025,7.025,0,0,1,0-9.958L20.8,14.514a7.025,7.025,0,0,1,9.958,0,6.92,6.92,0,0,1,2,5.007,7.025,7.025,0,0,1-2.054,5L26.979,28.3,29.472,30.8,33.2,27.072A10.569,10.569,0,0,0,18.249,12.126L4.2,26.176a10.461,10.461,0,0,0,7.482,17.933A10.661,10.661,0,0,0,19.2,41.017l-2.493-2.493a7.025,7.025,0,0,1-9.958,0Z" transform="translate(-1.091 -3.706)" />
                                                </svg>

                                            </div>
                                        </div>
                                        <div class="col-9 step-2-text ">
                                            <p class="mb-0 text-start">My Website </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 3 -->
                                <div class="step-3 mt-4">
                                    <h6 class="">3.Select a Tapeeo for the moment</h6>
                                    <div class="step-2-img mt-4">
                                        <img src="img/Wallet_Cryptocurrency_Mobile_App.png"
                                            class="w-75 img-fluid img-responsive imgDivContent" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-xxl-7">
                                <div
                                    class="content-text px-0 px-sm-0 px-md-0 px-lg-5 px-xxl-5 pt-3 pt-sm-3 pt-md-3 pt-lg-0 pt-xxl-0">
                                    <p>
                                        After signing up on Tapeeo.app. You can start making single purpose web pages
                                        called Tapeeo. You can make Sitches to take payments, share links like a
                                        Calendly or Google form, sell products, start chats, book appointments, give out
                                        forms, share files,
                                        and much more
                                    </p>
                                    <p>
                                        You then select the Tapeeo you want for the moment and tap. It's that simple.
                                    </p>
                                    <p>
                                        No apps to download. Just tap or scan your newly purchased Tapeeo device to get
                                        set up instantly. The phones you tap don't need to download anything either and
                                        it works on both Android and iOS devices.
                                    </p>
                                    <p>
                                        No apps to download. Just tap or scan your newly purchased Tapeeo device to get
                                        set up instantly. The phones you tap don't need to download anything either and
                                        it works on both Android and iOS device
                                    </p>
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde, magni
                                        blanditiis? Harum unde temporibus delectus id corrupti minima consectetur, aut
                                        obcaecati reiciendis repellendus mollitia vel, a recusandae laudantium libero
                                        quos.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi deserunt porro
                                        doloribus nam! Ducimus minus nihil consequuntur nam tempore sint, totam officia
                                        consequatur labore autem eius sit adipisci at deleniti?
                                    </p>
                                </div>
                                <div
                                    class="vedio-what px-0 px-sm-0 px-md-0 px-lg-5 px-xxl-5 pt-3 pt-sm-3 pt-md-3 pt-lg-0 pt-xxl-0">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/7YH5CQqMuWM"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
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
                            How to share tapeeos
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
        <!-- section 5 -->
        <section class="section-padding-1">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 what-is-tapeeo ">
                        <h4 class="text-center">
                            Tapeeo for the...
                            <div class="animationLinetappeo mt-2"></div>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="sectionContent my-2 " data-aos="fade-right" data-aos-easing="linear"
                        data-aos-duration="300">
                        <div class="cardFr product-box-blue animationSec">
                            <p>Photographer/Trainer/Freelancer</p>
                        </div>
                    </div>
                    <div class="sectionContent my-2" data-aos="fade-right" data-aos-easing="linear"
                        data-aos-duration="500">
                        <div class="cardFr product-box-pink animationSec">
                            <p>Restaurant/Small Business Owner </p>
                        </div>
                    </div>
                    <div class="sectionContent my-2" data-aos="fade-right" data-aos-easing="linear"
                        data-aos-duration="700">
                        <div class="cardFr product-box-blue animationSec">
                            <p>Streamer/Instructor/Influencer</p>
                        </div>
                    </div>
                    <div class="sectionContent my-2" data-aos="fade-right" data-aos-easing="linear"
                        data-aos-duration="900">
                        <div class="cardFr product-box-pink animationSec">
                            <p>Non-Verbal Communicator</p>
                        </div>
                    </div>
                    <div class="sectionContent my-2" data-aos="fade-right" data-aos-easing="linear"
                        data-aos-duration="1100">
                        <div class="cardFr product-box-blue animationSec">
                            <p>Sales Person/Networker</p>
                        </div>
                    </div>
                    <div class="sectionContent my-2" data-aos="fade-right" data-aos-easing="linear"
                        data-aos-duration="1300">
                        <div class="cardFr product-box-pink animationSec">
                            <p>Event Host</p>
                        </div>
                    </div>
                    <div class="sectionContent my-2" data-aos="fade-right" data-aos-easing="linear"
                        data-aos-duration="1400">
                        <div class="cardFr product-box-blue animationSec">
                            <p>Traveller</p>
                        </div>
                    </div>
                    <div class="sectionContent my-2" data-aos="fade-right" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <div class="cardFr product-box-pink animationSec">
                            <p>Human Being</p>
                        </div>
                    </div>
                </div>






            </div>
            </div>
        </section>
        <!-- section6 -->
        <section>
            <div class="container" style="background: url('img/Rectangle\ 7.png');
        background-repeat: no-repeat;
        background-size: cover;
        padding: 40px 0;
        border-radius: 30px;
        overflow: hidden;
      ">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4">
                        <div class="imgBx text-center">
                            <img src="img/Free shipping-pana.png" class="img-responsive img-fluid w-50">
                        </div>
                        <h6 class="text-center" style="font-weight: 700;">
                            Free NA Shipping
                        </h6>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4">
                        <div class="imgBx text-center">
                            <img src="img/Credit card-rafiki (1).png" class="img-responsive img-fluid w-50">
                        </div>
                        <h6 class="text-center" style="font-weight: 700;">
                            Easy Refunds
                        </h6>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4">
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
    </main>
    <?php include('inc/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <?php include('inc/js.php') ?>
    
</body>

</html>