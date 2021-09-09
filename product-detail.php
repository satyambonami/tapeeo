<?php
include_once("inc/config.php");
$pageName = "Product";

$linkPrefix = "";
// Product Details
if (isset($_GET['product']) && isset($_GET['id'])) {
    $Pid = mysqli_real_escape_string($conn, ak_secure_string($_GET['id']));
    $data = mysqli_query($conn, "SELECT `pid`, `name`, `slug`, `fulldesc`, `description`, `quantity`, `image`, `price`, `discount`, `offer_price`, `meta_title`, `meta_desc`, `meta_keywords`, `warranty`, `date_time`, `status` FROM `" . $tblPrefix . "products` WHERE pid = $Pid");

    if (mysqli_num_rows($data) == 0) {
        $_SESSION['toast']['msg'] = "No Product Found.";
        header("location:shop.php");
        exit();
    } else {
        $product = mysqli_fetch_assoc($data);
    }
} else {
    $_SESSION['toast']['msg'] = "No Product Found.";
    header("location:shop.php");
    exit();
}

// Related PRoducts
$Rdata = mysqli_query($conn, "SELECT `pid`,`name`,`image`,`offer_price` FROM `" . $tblPrefix . "products` WHERE status=2 AND pid != " . $_GET['id'] . " ORDER BY pid ASC");
// print_r($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/head.php') ?>
    <link rel="stylesheet" href="admin/assets/css/alertify.rtl.min.css">
    <link rel="stylesheet" href="admin/assets/css/alertify-default-theme.rtl.min.css">
</head>

<body>
    <?php include('inc/header.php') ?>
    <main>
        <section class="breadcrumb-detail">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-what">
                            <h2 class="text-center">
                                <?php echo SITE_NAME . ' ' . $pageName; ?>
                            </h2>
                            <div class="animationLinetappeo mt-2"></div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding-2 ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6">
                        <div class="product-box py-5">
                            <div class="ProductimgBox text-center">
                                <img src="img/products/<?php echo $product['image']; ?>" class="img-fluid img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 d-flex align-items-center">
                        <div class="detail-content">
                            <div class="heading-what mb-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xxl-0 ">
                                <h2 style="color:#d33696;">
                                    <?php echo $product['name']; ?>
                                    <div class="animationLine mt-2 w-25"></div>
                                </h2>
                            </div>
                            <div class="price">
                                <h3>
                                    <span class="me-2">$</span><span data-price="<?php echo $product['offer_price']; ?>" class="priceHead"><?php echo $product['offer_price']; ?></span>

                                    <span style="text-decoration:line-through; font-size: 20px !important;">
                                        $<?php echo $product['price']; ?>
                                    </span>
                                    &nbsp;
                                    <span style="font-size: 20px !important;">
                                        Discount
                                        <?php echo $product['discount']; ?>%
                                    </span>
                                </h3>

                                <!-- Card Button -->
                                <div class="card_button mt-4 align-items-center">
                                    <?php if($product['quantity'] > 0){ ?>
                                        <div class="card_btn">
                                            <p class="minus">
                                                <i class="fas fa-minus"></i>
                                            </p>
                                            <input type="text" class="showNumber" readonly style="width: 30px; margin-left: 15px;">
                                            <!-- <input type="number" name="quantity" id=""class="number" value="1" max="<?php echo $product['quantity']; ?>" min="1"> -->
                                            <p class="plus">
                                                <i class="fas fa-plus"></i>
                                            </p>
                                        </div>
                                        <button type="button" class="btn btn-gradient py-3 ms-3 add-to-cart" data-this-pid="<?php echo $product['pid']; ?>" data-this-qty="1">Add to cart</button>
                                    <?php }else{ ?>
                                        <h6 class="text-danger ps-3">Out of Stock</h6>
                                        <?php }?>
                                </div>
                                <!-- Card Button -->
                                <div class="short-discription mt-4">
                                    <p style="color: #707070;">
                                        <?php echo $product['description']; ?>
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
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="text-center line_Div buttonActiv">
                            <p>Description</p>
                            <div class="animationLine mt-2 w-100 tab-content animiLine"></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6 ">
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
                        <?php echo htmlspecialchars_decode($product['fulldesc']); ?>
                    </div>
                    <div class="content active_ContentTwo hideDiv">
                        <?php echo htmlspecialchars_decode($product['warranty']); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if (mysqli_num_rows($Rdata) != 0) {
        ?>
            <section class="section-padding-1  baby_arrival_featured_section">
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
                            <?php
                            $i = 0;
                            while ($related = mysqli_fetch_assoc($Rdata)) {
                                $i++;
                            ?>
                                <div class="item"> 
                                    <div class="col-12 ">
                                        <div class="baby_boys baby_item wow fadeInLeft  baby_filter_show ">
                                            <div class="featured_content">
                                                <div class="featured_img_content position-relative">
                                                    <img src="img/products/<?php echo $related['image'] ?>" class="img-fluid" alt="img/products/<?php echo $related['image'] ?>">
                                                    <div class="featured_btn vertical_middle">
                                                        <a style="margin: 0 10px;" href="product-detail.php?product=<?php ak_url_encode($related['name']) ?>&id=<?php echo $related['pid'] ?>" class="btn btn-gradient">View Product</a>
                                                    </div>
                                                </div>
                                                <div class="featured_detail_content">
                                                    <a href="">
                                                        <p class="featured_title  text-capitalize  "><?php echo $related['name']; ?></p>
                                                    </a>
                                                    <p class="featured_price title_h5  "><span>$<?php echo $related['offer_price']; ?></span></p>
                                                    <div class="featured_btn d-xl-none">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- Tab Section -->
    </main>
    <?php include('inc/footer.php') ?>
    <?php include('inc/js.php') ?>
    <script src="admin/assets/js/alertify.min.js"></script>

    <?php echo toast(1); ?>
    <script>
        AOS.init();



        const lineDiv = document.querySelectorAll(".line_Div");
        const buttonActiv = document.querySelector(".buttonActiv");
        const buttonOneActiv = document.querySelector(".buttonOneActiv");

        const active_ContentOne = document.querySelector(".active_ContentOne");
        const active_ContentTwo = document.querySelector(".active_ContentTwo");

        const tab = document.querySelectorAll(".tab-content");
        const animiLine = document.querySelectorAll(".animiLine");
        const cardBtn = document.querySelectorAll(".card_btn");
        const minus = document.querySelector(".minus");
        const plus = document.querySelector(".plus");
        const num = document.querySelector(".number");

        const price = document.querySelector(".priceHead");
        const priceHead = +document.querySelector(".priceHead").getAttribute("data-price");
        const showNumber = document.querySelector(".showNumber");

        // card js
        let startNumebr = 1;
        const totalrice = [priceHead];
        showNumber.value = 1;

        cardBtn.forEach((item) => {
            const arr = [...item.children];

            // plus the number
            arr[2].addEventListener("click", function() {
                startNumebr++;

                if (startNumebr <= 10) {
                    arr[1].textContent = startNumebr;
                    // change input value
                    showNumber.value = startNumebr;
                    totalrice.push(priceHead);

                    let sum = 0;
                    for (let i = 0; i < totalrice.length; i++) {
                        sum += totalrice[i];
                    }
                    price.textContent = sum.toFixed(2);
                }
                if (startNumebr >= 10) {
                    startNumebr = 10;
                    return;
                }
            });

            // minus the number
            arr[0].addEventListener("click", function() {
                if (startNumebr >= 2 && startNumebr <= 10) {
                    startNumebr--;
                    arr[1].textContent = startNumebr;
                    // change input value
                    showNumber.value = startNumebr;

                    totalrice.pop();
                    let sumReduce = 0;
                    for (let i = 0; i < totalrice.length; i++) {
                        sumReduce += totalrice[i];
                    }
                    price.textContent = sumReduce.toFixed(2);
                } else {
                    return;
                }
            });
        });


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
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>

</body>

</html>