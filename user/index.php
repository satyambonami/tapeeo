<?php
include_once("../inc/config.php");
$pageName = "Tapeoo Dashboard";
$linkPrefix = "../";
if(!isset($_SESSION['user'])){
    $_SESSION['toast']['msg']="Please login to continue";
    header('location:login.php');
    exit();
}
$userId=$_SESSION['user']['id'];
$userData = mysqli_query($conn,"SELECT `name`,`email`,`phone`,`date_time` FROM `".$tblPrefix."users` WHERE id='$userId'");
$user = mysqli_fetch_assoc($userData);

$dataAddress = mysqli_query($conn,"SELECT * FROM `".$tblPrefix."user_address` WHERE `user_id`='$userId' AND `default`=1 ");
$address = mysqli_fetch_assoc($dataAddress);

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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xxl-9">
                        <div class="dashboard-div">
                            <div class="dashboard-head">
                                <div class="row">
                                    <div class="col-7 col-sm-7 col-md-7 col-lg-4 col-xxl-4">
                                        <h1 class="msContent">Good,  </h1>
                                        <div class="animationLinetappeo ms-0 mt-2 w-100"></div>
                                        <h5 class="ms-4">
                                            its good to see you again
                                        </h5>
                                    </div>
                                    <div class="col-5 col-sm-5 col-md-5 col-lg-6 col-xxl-6 d-flex align-items-center">
                                        <h1 style="color:#D33696;">
                                            <?php echo $user['name'];?>
                                        </h1>
                                    </div>
                                </div>

                            </div>
                            <!-- dashboard-copntent -->
                            <div class="dashboard-content">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 gy-3">
                                        <div class="details-dasboard mb-3">
                                            <h6 class="mb-3" style="color:#D33696;">
                                                <b>Details</b>
                                            </h6>
                                            <h5 class="mb-3">
                                            <?php echo $user['name'];?>
                                            </h5>
                                            <p>
                                                Email- <?php echo $user['email'];?>
                                            </p>
                                            <p>
                                                Phone - <?php echo $user['phone'];?>
                                            </p>
                                            <p>Tapeoo user since - <?php echo date("M, Y",strtotime($user['date_time']));?></p>
                                        </div>
                                        <div class="details-dasboard">
                                            <h6 class="mb-3" style="color:#D33696;">
                                                <b>Default Address</b>
                                            </h6>
                                            <h5 class="mb-3">
                                                <?php echo $address['name'];?>
                                            </h5>
                                            <p>
                                                Phone - <?php echo $address['phone'];?>
                                            </p>
                                            <p> <?php echo $address['address'];?> </p>
                                            <p>Country: <?php echo country($address['country']);?></p>
                                            <p>State: <?php echo state($address['state']);?></p>
                                            <p>city: <?php echo city($address['city']);?></p>
                                            <p>Postal Code : <?php echo $address['pincode'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 gy-3">
                                        <div class="order-dashboard">
                                            <h6 class="mb-3" style="color:#D33696;">
                                                <b>Recent Orders</b>
                                            </h6>
                                            <!-- start loop from here -->
                                            <?php
                                                $i=0;
                                                $dataQ = mysqli_query($conn, "SELECT `prod_id` FROM `".$tblPrefix."orders` WHERE `user_id`='$userId' AND `status`!=3  ORDER BY id DESC");
                                                while ($data = mysqli_fetch_assoc($dataQ)) {
                                                    $prodIdArr = explode(',', $data['prod_id']);
                                                    foreach($prodIdArr as $id => $prd){
                                                        $q = mysqli_query($conn,"SELECT name, image FROM `".$tblPrefix."products` WHERE pid=$prd");
                                                        while($dataPrd = mysqli_fetch_assoc($q)){
                                                            $i++;
                                            ?>
                                                <div class="order-card <?php if($i %2!= 0){echo 'order-pink';}else{echo 'order-blue';}?> mb-3">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="mb-0"><?php echo $dataPrd['name'];?></h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="order-success text-end">
                                                                <h6 class="mb-0"><i class="fas fa-circle"></i> Completed
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } } }?>
                                            <!-- end loop -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script>
           const msContent = document.querySelector('.msContent');
            setInterval(() => {
            //get the date 
            const date = new Date();
            const hour = date.getHours();
            // update the dom
            hour < 12 ? msContent.textContent = 'Good Morning' : msContent.textContent = 'Good Afternon';
            // update time every single second
            }, 1000)
    </script>
</body>

</html>