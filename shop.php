<?php
include_once("inc/config.php");
$pageName = "Shop";

$linkPrefix = "";
$productData = mysqli_query($conn, "SELECT `pid`,`name`,`image`,`offer_price` FROM `" . $tblPrefix . "products` WHERE status=2 ORDER BY pid ASC");
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
        <section style="background: url('img/Ellipse\ 2.png'); background-size: 100% 100%; padding: 60px; padding-top: 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-what mt-5">
                            <h2 class="text-center">
                                <?php echo SITE_NAME . ' ' . $pageName; ?>
                                <div class="animationLinetappeo mt-2"></div>
                            </h2>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding-1 baby_arrival_featured_section" >
            <div class="container">
                <div class="row">
                    <?php
                    if (mysqli_num_rows($productData)) {
                        $i = 0;
                        while ($dataPrd = mysqli_fetch_assoc($productData)) {
                            $i++;
                    ?>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4 gy-3 gy-sm-3 gy-md-3 gy-lg-0 gy-xxl-">
                                <div class="baby_boys baby_item wow fadeInLeft  baby_filter_show ">
                                    <div class="featured_content">
                                        <div class="featured_img_content position-relative">
                                            <img src="img/products/<?php echo $dataPrd['image'] ?>" class="img-fluid" alt="img/products/<?php echo $dataPrd['image'] ?>">
                                            <div class="featured_btn vertical_middle">
                                                <a style="margin: 0 10px;" href="product-detail.php?product=<?php ak_url_encode($dataPrd['name']) ?>&id=<?php echo $dataPrd['pid'] ?>" class="btn btn-gradient">View Product</a>
                                            </div>
                                        </div>
                                        <div class="featured_detail_content">
                                            <a href="">
                                                <p class="featured_title  text-capitalize  "><?php echo $dataPrd['name']; ?></p>
                                            </a>
                                            <p class="featured_price title_h5  "><span>$<?php echo $dataPrd['offer_price']; ?></span></p>
                                            <div class="featured_btn d-xl-none">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4 gy-3 ">
                                <a href="product-detail.php?product=<?php echo $dataPrd['name'] ?>&id=<?php echo $dataPrd['pid'] ?>">
                                    <div class="product-box <?php if ($i % 2 == 0) {
                                                                echo 'product-box-pink';
                                                            } else {
                                                                echo 'product-box-blue';
                                                            } ?>">
                                        <div class="product-image text-center">
                                            <img src="img/products/<?php echo $dataPrd['image'] ?>" class="w-100 img-fluid ">
                                        </div>
                                        <div class="product-heading text-center mt-3">
                                            <h6><?php echo $dataPrd['name'] ?></h6>
                                            <p>$<?php echo $dataPrd['offer_price'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                        <?php }
                    } else { ?>
                        <img src="img/no-result.png" alt="No Result" class="img-fluid img-responsive w-50 m-auto">
                    <?php  } ?>
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