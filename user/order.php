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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                        <div class="order-card box-shadow" style="padding:30px 30px ;">
                            <!-- order-head -->
                            <div class="row mb-3 ">
                                <div class="col-4 d-none d-sm-none d-md-block d-lg-block d-xxl-block">
                                    <h5 class="mb-0">Product</h5>
                                </div>
                                <div class="col-2 d-none d-sm-none d-md-block d-lg-block d-xxl-block">
                                    <h5 class="mb-0">Price</h5>
                                </div>
                                <div class="col-3 d-none d-sm-none d-md-block d-lg-block d-xxl-block">
                                    <h5 class="mb-0">Order date</h5>
                                </div>
                                <div class="col-3 d-none d-sm-none d-md-block d-lg-block d-xxl-block">
                                    <h5 class="mb-0">Order status</h5>
                                </div>
                            </div>
                            <!-- order-card -->
                            <?php
                                $i=0;
                                $dataQ = mysqli_query($conn, "SELECT `id`, `prod_id`, `prod_prices`, `prod_quantity`, `status`, `date_time` FROM `".$tblPrefix."orders` WHERE `user_id`='$userId' AND `status`!=0  ORDER BY id DESC");
                                    if(mysqli_num_rows($dataQ)){  
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
                            <a href="../inc/invoice.php?id=<?php echo $data['id'];?>">Download Invoice</a>
                                <div class="col-12 col-sm-7 col-md-4 col-lg-4 col-xxl-4 py-2">
                                    <div class="d-flex align-items-center ">
                                        <img src="img/Untitled-5121.png" class="w-25 img-fluid ">
                                        <p class="mb-0 ms-2"><?php echo $prodData['name'];?> (x<?php echo $quantityArr[$idKey];?>)</p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-5  col-md-2 col-lg-2 col-xxl-2 text-center">
                                    <p>$<?php echo $priceArr[$idKey];?></p>
                                </div>
                                <div class="col-6 col-sm-7 col-md-3 col-lg-3 col-xxl-3 text-center">
                                    <p><?php echo date("d/M/Y",strtotime($data['date_time']));?></p>
                                </div>
                                <div class="col-12 col-sm-5 col-md-3 col-lg-3 col-xxl-3 ">
                                    <div class="text-center text-sm-center text-md-start text-lg-start text-xxl-center  mt-2">
                                        <!--1= , 2=processing, 3= packaging, 4=out for delivery, 5=delivered -->
                                        <?php if($data['status'] == 2){
                                            echo '<h6 class="mb-0 text-info"><i class="fas fa-circle"></i> Processing</h6>';
                                        }elseif($data['status'] == 3){
                                            echo '<h6 class="mb-0 text-info"><i class="fas fa-circle"></i> Packaging</h6>';
                                        }elseif($data['status'] == 4){
                                            echo '<h6 class="mb-0 text-info"><i class="fas fa-circle"></i> Out for Delivery</h6>';
                                        }elseif($data['status'] == 5){
                                            echo '<h6 class="mb-0 text-success"><i class="fas fa-circle"></i> Delivered</h6>';
                                        }else{
                                            echo '<h6 class="mb-0 text-danger"><i class="fas fa-circle"></i> Cancelled</h6>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php } } } }else{ ?>
                                <div class="text-center">
                                    <img src="../img/no-order.png" alt="No Address Found" class="img-fluid img-responsive">
                                </div>
                                <?php } ?>
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