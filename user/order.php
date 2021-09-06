<?php
include_once("../inc/config.php");
$pageName = "Your Order";
$linkPrefix = "../";
if(!isset($_SESSION['user'])){
    $_SESSION['toast']['msg']="Please login to continue";
    header('location:login.php');
    exit();
}
$userId=$_SESSION['user']['id'];

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
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <?php include('inc/user-sidenav.php') ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-9 col-xxl-9">
                        <div class="order-card box-shadow" style="padding:30px 30px ;">
                            <!-- order-head -->
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 class="mb-0">Product</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="mb-0">Price</h5>
                                </div>
                                <div class="col-3">
                                    <h5 class="mb-0">Order date</h5>
                                </div>
                                <div class="col-3">
                                    <h5 class="mb-0">Order status</h5>
                                </div>
                            </div>
                            <!-- order-card -->
                            <?php
                                $i=0;
                                $dataQ = mysqli_query($conn, "SELECT `id`, `prod_id`, `prod_prices`, `prod_quantity`, `status`, `date_time` FROM `".$tblPrefix."orders` WHERE `user_id`='$userId' AND `status`!=3  ORDER BY id DESC");
                                  while ($data = mysqli_fetch_assoc($dataQ)) {
                                    $priceArr = explode(',', $data['prod_prices']);
                                    $quantityArr = explode(',', $data['prod_quantity']);
                                    $prodIdArr = explode(',', $data['prod_id']);
                                    $condition ="WHERE ";
                                    foreach ($prodIdArr as $idKey => $idVal) {
                                        $prodQ = "SELECT name, image FROM `".$tblPrefix."products` WHERE pid=$idVal";
                                        $prodQ = mysqli_query($conn, $prodQ);
                                        while($prodData =  mysqli_fetch_assoc($prodQ)){
                                            $i++;
                            ?>
                            <div class="row order-main order-card <?php if($i %2!= 0){echo 'order-pink';}else{echo 'order-blue';}?> mt-3 align-items-center ">
                                <div class="col-4 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="img/Untitled-5121.png" class="w-25 img-fluid ">
                                        <p class="mb-0 ms-2"><?php echo $prodData['name'];?> (x<?php echo $quantityArr[$idKey];?>)</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p>$<?php echo $priceArr[$idKey];?></p>
                                </div>
                                <div class="col-3">
                                    <p><?php echo date("d/M/Y",strtotime($data['date_time']));?></p>
                                </div>
                                <div class="col-3">
                                    <div class="order-success ">
                                        <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                    </div>
                                </div>
                            </div>
                            <?php } } }?>
                            <!-- <div class="row order-main order-card order-blue  mt-3 align-items-center">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="img/Untitled-5121.png" class="w-25 img-fluid ">
                                        <p class="mb-0 ms-2">Tapeoo Card x2</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p>$43</p>
                                </div>
                                <div class="col-3">
                                    <p>12 Aug 2021</p>
                                </div>
                                <div class="col-3">
                                    <div class="order-success ">
                                        <h6 class="mb-0"><i class="fas fa-circle"></i> Completed</h6>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('inc/mobileNav.php') ?>
    <?php include('../inc/js.php') ?>
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>
</body>

</html>