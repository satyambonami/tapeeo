<?php
    include_once("inc/config.php");
    $pageName="Shop";

    $linkPrefix="";
    $productData = mysqli_query($conn,"SELECT `pid`,`name`,`image`,`offer_price` FROM `".$tblPrefix."products` WHERE status=2 ORDER BY pid ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/head.php')?>
</head>

<body>
    <?php include('inc/header.php')?>
    <main>
        <section style="background: url('img/Ellipse\ 2.png'); background-size: 100% 100%; padding: 60px; padding-top: 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-what mt-5">
                            <h2 class="text-center">
                            <?php echo SITE_NAME .' '. $pageName;?>
                                <div class="animationLinetappeo mt-2"></div>
                            </h2>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding-1" style="background-image: url('img/Group\ 28.png'); background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <?php
                    $i=0;
                        while($dataPrd = mysqli_fetch_assoc($productData)){
                            $i++;
                    ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4 gy-3 ">
                        <a href="product-detail.php?id=<?php echo $dataPrd['pid']?>">
                            <div class="product-box <?php if($i % 2 == 0){echo 'product-box-pink';}else{echo 'product-box-blue';}?>">
                                <div class="product-image text-center">
                                    <img src="img/products/<?php echo $dataPrd['image']?>" class="w-100 img-fluid ">
                                </div>
                                <div class="product-heading text-center mt-3">
                                    <h6><?php echo $dataPrd['name']?></h6>
                                    <p>$<?php echo $dataPrd['offer_price']?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </section>
    </main>
    <?php include('inc/footer.php')?>
    <?php include('inc/js.php')?>
</body>

</html>