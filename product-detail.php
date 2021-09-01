<?php
    include_once("inc/config.php");
    $pageName="Product";

    $linkPrefix="";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/head.php')?>
</head>

<body>
    <?php include('inc/header.php')?>
    <main>
        <section class="breadcrumb-detail" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-what">
                            <h2 class="text-center">
                            <?php echo SITE_NAME .' '. $pageName;?>
                            </h2>
                            <div class="animationLinetappeo mt-2"></div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding-2 detail-background" >
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6">
                        <div class="product-box py-5">
                            <div class="ProductimgBox">
                                <img src="img/2.png" class="img-fluid img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 d-flex align-items-center">
                        <div class="detail-content">
                            <div class="heading-what mb-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xxl-0 ">
                                <h2 style="color:#d33696;">
                                    TAPEEO CARD
                                    <div class="animationLine mt-2 w-25"></div>
                                </h2>
                            </div>
                            <div class="price">
                                <h3>
                                    $1.499
                                    <span style="text-decoration:line-through">
                                        $1.999
                                    </span>
                                </h3>

                                <!-- Card Button -->
                                <div class="card_button mt-4">
                                    <div class="card_btn">
                                        <p class="minus">
                                            <i class="fas fa-minus"></i>
                                        </p>
                                        <p class="number">1</p>
                                        <p class="plus">
                                            <i class="fas fa-plus"></i>
                                        </p>
                                    </div>
                                    <a href="" class="btn btn-gradient py-3 ms-3">Add to cart</a>
                                </div>
                                <!-- Card Button -->
                                <div class="short-discription mt-4">
                                    <p style="color: #707070;">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum in accusamus aut dolores qui nihil sint officia sed tenetur debitis, nam a quod et atque id ex non iste ducimus ullam libero. Eaque doloribus architecto libero ipsum in voluptas ratione sed
                                        sint magni quidem saepe, impedit animi dolor ducimus a. Voluptas eaque culpa, laborum perspiciatis ipsum officia excepturi placeat molestiae consequuntur qui, magnam corporis quod rerum dolores dicta similique autem?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!-- Tab Section -->
        <section class="tab_section section-padding-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="text-center line_Div buttonActiv">
                            <p>Description</p>
                            <div class="animationLine mt-2 w-100 tab-content animiLine"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="text-center line_Div buttonOneActiv">
                            <p>Warranty</p>
                            <div class="animationLine mt-2 w-100 tab-content removeLine animiLine"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="container section-padding-2">
            <div class="row">
                <div class="col-12">
                    <div class="content active_ContentOne ">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas nihil placeat iste. Nam sunt sit fugit est odio quibusdam cupiditate?</p>
                    </div>
                    <div class="content active_ContentTwo hideDiv">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas odit sapiente minus veniam exercitationem ducimus, officia voluptates, aliquid quam temporibus libero! Dolores quisquam fugit in fugiat excepturi mollitia deleniti perferendis.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <!-- heading -->
                    <div class="heading-what text-center mb-5">
                        <h2 style="color:#d33696;">
                            Related Product
                            <div class="animationLinetappeo mt-2"></div>
                        </h2>
                    </div>
                    <div class="owl-carousel owl-theme">

                        <div class="col-12  gy-3 gy-sm-3 gy-md-3 gy-lg-0 gy-xxl-0">
                            <a href="product-detail.html">
                                <div class="product-box product-box-blue">
                                    <div class="product-image text-center">
                                        <img src="img/Untitled-1.png" />
                                    </div>
                                    <div class="product-heading text-center mt-3">
                                        <h6>Tapeeo Card</h6>
                                        <p>$19</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <div class="col-12  gy-3 gy-sm-3 gy-md-3 gy-lg-0 gy-xxl-0">
                                <a href="product-detail.html">
                                    <div class="product-box product-box-pink">
                                        <div class="product-image text-center">
                                            <img src="img/Untitled-5121.png" />
                                        </div>
                                        <div class="product-heading text-center mt-3">
                                            <h6>Tapeeo Band</h6>
                                            <p>$24</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-12  gy-3 gy-sm-3 gy-md-3 gy-lg-0 gy-xxl-0">
                                <a href="product-detail.html">
                                    <div class="product-box product-box-purple">
                                        <div class="product-image text-center">
                                            <img src="img/Untitled-1.png" />
                                        </div>
                                        <div class="product-heading text-center mt-3">
                                            <h6>Tapeeo Car</h6>
                                            <p>$19</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-12 gy-3 gy-sm-3 gy-md-3 gy-lg-0 gy-xxl-0">
                                <a href="product-detail.html">
                                    <div class="product-box product-box-blue">
                                        <div class="product-image text-center">
                                            <img src="img/dsfsfs.png" />
                                        </div>
                                        <div class="product-heading text-center mt-3">
                                            <h6>Tapeeo Dot</h6>
                                            <p>$19</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Tab Section -->
    </main>
    <?php include('inc/footer.php')?>
    <?php include('inc/js.php')?>
    <script>
        AOS.init();



        const lineDiv = document.querySelectorAll(".line_Div");
        const buttonActiv = document.querySelector(".buttonActiv");
        const buttonOneActiv = document.querySelector(".buttonOneActiv");

        const active_ContentOne = document.querySelector(".active_ContentOne");
        const active_ContentTwo = document.querySelector(".active_ContentTwo");

        const tab = document.querySelectorAll(".tab-content");
        const animiLine = document.querySelectorAll(".animiLine");

        const minus = document.querySelector(".minus");
        const plus = document.querySelector(".plus");
        const num = document.querySelector(".number");

        // card js
        let startNumebr = 1;

        // inc the number
        plus.addEventListener("click", function() {
            startNumebr++;
            num.textContent = startNumebr;
        });

        // minus the number
        // if the number is less then one so stop
        const desnumerb = function() {
            minus.addEventListener("click", function() {
                if (startNumebr >= 2) {
                    startNumebr--;
                    num.textContent = startNumebr;
                } else {
                    return;
                }
            });
        };

        desnumerb();

        // tab-content
        function tabContentFunction(e) {
            removeCl();
            // adding the class
            this.classList.add("active_divTab");

            const child = e.currentTarget.children[1];

            child.classList.remove("removeLine");
            child.classList.add("addLine");
        }

        function removeCl() {
            animiLine.forEach((item) => {
                item.classList.add("removeLine");
                item.classList.remove("addLine");
            });
        }


        // avtive_card display
        lineDiv.forEach((item) => {
            item.addEventListener("click", tabContentFunction);
        });

        // hide and show
        buttonActiv.addEventListener("click", function() {
            active_ContentOne.classList.remove("hideDiv");
            active_ContentTwo.classList.add("hideDiv");
        });

        // hide and show
        buttonOneActiv.addEventListener("click", function() {
            active_ContentTwo.classList.remove("hideDiv");
            active_ContentOne.classList.add("hideDiv");
        });
    </script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots:false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>

</body>

</html>