<?php
include_once("../inc/config.php");
$pageName = "Address";
$linkPrefix = "../";
if(!isset($_SESSION['user'])){
    $_SESSION['toast']['msg']="Please login to continue";
    header('location:login.php');
    exit();
}

$dataAddress = mysqli_query($conn,"SELECT `id`, `user_id`, `default`, `type`, `name`, `email`, `phone`, `country`, `state`, `city`, `pincode`, `address`, `date_time`, `status` FROM `bnmi_user_address` WHERE `user_id` = 12 AND `status` !=0 ");

// Add/Edit Address
if(isset($_POST['submit-address'])){
    $userId = 12;
    $id=mysqli_real_escape_string($conn,ak_secure_string($_POST['this-id']));
    $type= mysqli_real_escape_string($conn,ak_secure_string($_POST['type']));
    $name=mysqli_real_escape_string($conn,ak_secure_string($_POST['name']));
    $email=trim(strtolower(mysqli_real_escape_string($conn,ak_secure_string($_POST['email']))));
    $phone=mysqli_real_escape_string($conn,ak_secure_string($_POST['phone']));
    $city=mysqli_real_escape_string($conn,ak_secure_string($_POST['city']));
    $state=mysqli_real_escape_string($conn,ak_secure_string($_POST['state']));
    $country=mysqli_real_escape_string($conn,ak_secure_string($_POST['country']));
    $pincode=mysqli_real_escape_string($conn,ak_secure_string($_POST['zipcode']));
    $address=htmlspecialchars($_POST['address']);
    $address=stripslashes($address);
    if($id!=0){
        $query="UPDATE `".$tblPrefix."user_address` SET `type`='$type',`name`='$name',`phone`='$phone',`country`='$country',`city`='$city',`state`='$state',`address`='$address',`pincode`='$pincode' WHERE id='$id'";
        $actionQ=mysqli_query($conn,$query);
    }else{
        $actionQ=mysqli_query($conn,"INSERT INTO `".$tblPrefix."user_address`(`user_id`,`type`,`name`, `email`,`phone`, `country`, `city`, `state`, `address`, `pincode`, `status`, `date_time`) VALUES ('$userId','$type','$name','$email','$phone','$country','$city','$state','$address','$pincode',2,'$cTime')");
    }
    if($actionQ==true){
        $_SESSION['toast']['type']="success";
        $_SESSION['toast']['msg']="Address succesfully added.";
        header("location:address.php");
        exit();
    }else{
        $_SESSION['toast']['msg']="Something went wrong, please try again.";
        header("location:address.php");
        exit();
    }
}

// Set Defaylt Address
if(isset($_GET['address'])){
    $id=mysqli_real_escape_string($conn,ps_secure_string($_GET['address']));
    $data=mysqli_query($conn,"SELECT id FROM `".$tblPrefix."user_address` WHERE `default`=1 AND `user_id`='$userId'");
    if(mysqli_num_rows($data)>0){ 
        $prvdata=mysqli_fetch_assoc($data);
        $prvId=$prvdata['id'];
        $newQuery="UPDATE `".$tblPrefix."user_address` SET `default`='1' WHERE `id`='$id'";
        if(mysqli_query($conn,$newQuery)==true){
            $query=mysqli_query($conn,"UPDATE `".$tblPrefix."user_address` SET `default`='0' WHERE `id`='$prvId'");
            if($query==true){
                $_SESSION['toast']['type']="success";
                $_SESSION['toast']['msg']="Changes saved.";
                header("location:address.php");
                exit();
            }else{
                $_SESSION['toast']['msg']="Something went wrong, please try again.";
            }
        }
    }
}

// Delete Address
if(isset($_GET['delete-row'])){
    $id=mysqli_real_escape_string($conn,ps_secure_string($_GET['delete-row']));
    if(mysqli_query($conn, "UPDATE `".$tblPrefix."user_address` SET `status`='0' WHERE id='$id'")==true){
        $_SESSION['toast']['type']="success";
        $_SESSION['toast']['msg']= "Successfully deleted.";
        header('location:address.php');
        exit();
    }else{
        $_SESSION['toast']['msg']= "Something went wrong, Please try again.";
    }
}

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
                    <div class="col-9">
                        <div class="address-main-card">
                            <div class="row">
                                <?php
                                    while($address = mysqli_fetch_assoc($dataAddress)){
                                ?>
                                    <div class="col-6 gy-3">
                                        <h6 class="ms-1"><?php if($address['default']==1){ echo 'DEFAULT :';}?> <span style="color:#DF2C77"><b class='text-uppercase'><?php if($address['type']==1){
                                            echo 'Residential';}else{ echo 'Commercial';} ?></b></span></h6>
                                        <div class="address-card">
                                            <h5 class="mb-2">
                                                <?php echo $address['name'];?>
                                            </h5>
                                            <p class="mb-2">
                                                Phone - <?php echo $address['phone'];?>
                                            </p>
                                            <p class="mb-2"><?php echo $address['address'];?></p>
                                            <p class="mb-2"><?php echo country($address['country']);?></p>
                                            <p class="mb-2">Postal Code : <?php echo $address['pincode'];?></p>
                                            <div class="address-func">
                                                <div class="default">
                                                    <a href="">Remove from default </a>
                                                </div>
                                                <div class="edit-delete mt-2">
                                                <a href="" class="me-2 edit-this">Edit Address </a>
                                                <a href="">Delete Address </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                <div class="col-6 gy-3 mt-5">
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <div class="add-address">
                                        <div class=" d-flex align-items-center justify-content-center">
                                        <img src="img/plus.png" class="img-fluid">
                                        </div>
                                        <h2 class="text-center mt-3">Add Address</h2>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('inc/modal.php')?>
    <?php include('../inc/footer.php')?>
    <?php include('../inc/js.php')?>
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>  
    <script type="text/javascript">
    $('.edit-this').on('click', function(){
        $('input[name="this-id"]').val($(this).data('this-id'));
        $('input[name="name"]').val($(this).data('name'));
        $('input[name="email"]').val($(this).data('email'));
        $('input[name="phone"]').val($(this).data('phone'));
        $('input[name="city"]').val($(this).data('city'));
        $('input[name="state"]').val($(this).data('state'));
        $('input[name="pincode"]').val($(this).data('pincode'));
        $('textarea[name="address"]').val($(this).data('address'));
    });
</script>
<script type="text/javascript">
$('.country').on('change', function(){
	var state = $(this).val();
	$.ajax({
		url : '../inc/ajax-state.php',
		type : 'post',
		data : { state : state},

		success: function(response){
			$('#state').html(response);
			console.log(response);

		},
		error: function(response){
			console.log(response);
		}
	});
});
</script>
<script type="text/javascript">
$('.state').on('change', function(){
	var city = $(this).val();
	$.ajax({
		url : '../inc/ajax-city.php',
		type : 'post',
		data : { city : city},

		success: function(response){
			$('#city').html(response);
			console.log(response);

		},
		error: function(response){
			console.log(response);
		}
	});
});
</script>
</body>
</html>