<?php 
    include_once("../inc/config.php");
    $pageName="Add Product";
    $icon="fas fa-user";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        $query = mysqli_query($conn,"SELECT *  FROM `".$tblPrefix."users` WHERE id = '$id'");
        $data = mysqli_fetch_assoc($query);
        $address = mysqli_query($conn,"SELECT * FROM `".$tblPrefix."user_address` WHERE user_id = $id");
    }else{
        $_SESSION['toast']['msg']="No User Found!";
        header('location:users.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php include_once('inc/css.php');?>
    <title><?php echo $pageName ." | ". SITE_NAME?></title>
</head>
<body class="sidebar-pinned ">
    <?php include_once('inc/sidebar.php');?>
    <main class="admin-main">
        <?php include_once('inc/nav.php');?>
        <section class="admin-content ">
            <?php include_once("inc/breadcrum.php");?>
            <section class="pull-up">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto mt-2 m-b-30">
                            <div class="card py-3 ">
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="UserName"> Name</label>
                                                <input type="text" class="form-control" id="UserName" placeholder="Name" autocomplete="off" required name="name" value
                                                ="<?php echo $data['name']?>"/>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="UserEmail"> Email</label>
                                                <input type="text" class="form-control" id="UserEmail" placeholder="Email" autocomplete="off" required name="email" value
                                                ="<?php echo $data['email']?>"/>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="UserContact"> Contact</label>
                                                <input type="text" class="form-control" id="UserContact" placeholder="Contact" autocomplete="off" required name="contact" value
                                                ="<?php echo $data['phone']?>"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card py-3 mt-2">
                                <div class="card-body">
                                    <h6>User Addresses</h6>
                                    <?php
                                    if(mysqli_num_rows($address)){
                                        while($userAddress = mysqli_fetch_assoc($address)){
                                    ?>
                                    <div class="form-row mt-2">
                                        <div class="col-12 pb-2">
                                        <?php if($userAddress['default']==1){ echo 'Default :';}?> <?php if($userAddress['type']==1){
                                            echo 'Residential';}else{ echo 'Commercial';} ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="UserName"> Name</label>
                                            <input type="text" class="form-control" id="UserName" placeholder="Name" autocomplete="off" required name="name" value
                                            ="<?php echo $userAddress['name'];?>"/>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="UserEmail"> Email</label>
                                            <input type="text" class="form-control" id="UserEmail" placeholder="Email" autocomplete="off" required name="email" value
                                            ="<?php echo $userAddress['email'];?>"/>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="UserContact"> Contact</label>
                                            <input type="text" class="form-control" id="UserContact" placeholder="Contact" autocomplete="off" required name="contact" value
                                            ="<?php echo $userAddress['phone'];?>"/>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="UserContact"> Address</label>
                                            <input type="text" class="form-control" id="UserContact" placeholder="Contact" autocomplete="off" required name="contact" value
                                            ="<?php echo $userAddress['address'];?>"/>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="UserContact"> Country</label>
                                            <input type="text" class="form-control" id="UserContact" placeholder="Contact" autocomplete="off" required name="contact" value
                                            ="<?php echo country($userAddress['country']);?>"/>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="UserContact"> State</label>
                                            <input type="text" class="form-control" id="UserContact" placeholder="Contact" autocomplete="off" required name="contact" value
                                            ="<?php echo state($userAddress['state']);?>"/>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="UserContact"> City</label>
                                            <input type="text" class="form-control" id="UserContact" placeholder="Contact" autocomplete="off" required name="contact" value
                                            ="<?php echo city($userAddress['city']);?>"/>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="UserContact"> Postal Code</label>
                                            <input type="text" class="form-control" id="UserContact" placeholder="Contact" autocomplete="off" required name="contact" value
                                            ="<?php echo $userAddress['pincode'];?>"/>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php } }else{ ?>
                                        <h6>No Adress Found.</h6>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mx-auto mt-2">
                             <div class="card py-3 m-b-30">
                                <div class="card-body text-center">
                                    <img src="../img/users/<?php echo $data['img'];?>" alt="<?php echo $data['name']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

</body>
    <?php include_once('inc/js.php');?>
</html>
