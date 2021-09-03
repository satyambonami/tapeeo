<?php
include_once("../inc/config.php");
$pageName = "Address";
$linkPrefix = "../";

// Add/Edit Address
if(isset($_POST['submit-address'])){
    $id=mysqli_real_escape_string($conn,ps_secure_string($_POST['this-id']));
    $name=mysqli_real_escape_string($conn,ps_secure_string($_POST['name']));
    $email=mysqli_real_escape_string($conn,ps_secure_string($_POST['email']));
    $phone=mysqli_real_escape_string($conn,ps_secure_string($_POST['phone']));
    $city=mysqli_real_escape_string($conn,ps_secure_string($_POST['city']));
    $state=mysqli_real_escape_string($conn,ps_secure_string($_POST['state']));
    $pincode=mysqli_real_escape_string($conn,ps_secure_string($_POST['pincode']));
    $address=htmlspecialchars($_POST['address']);
    $address=stripslashes($address);
    if($id!=0){
        $query="UPDATE `".$tblPrefix."user_address` SET `name`='$name',`phone`='$phone',`city`='$city',`state`='$state',`address`='$address',`pincode`='$pincode' WHERE id='$id'";
        $actionQ=mysqli_query($conn,$query);
    }else{
        $actionQ=mysqli_query($conn,"INSERT INTO `".$tblPrefix."user_address`(`user_id`,`name`, `phone`, `city`, `state`, `address`, `pincode`, `status`, `date_time`) VALUES ('$userId','$name','$phone','$city','$state','$address','$pincode',2,'$cTime')");
        $actionQ=mysqli_query($conn,"INSERT INTO `".$tblPrefix."user_address`(`user_id`, `default`, `name`, `email`, `phone`, `whatsapp`, `state`, `city`, `pincode`, `address`, `status`) VALUES ('$userId',0,'$name','$email','$phone','$phone','$state','$city','$pincode','$address',2)");
    }
    if($actionQ==true){
        $_SESSION['toast']['type']="success";
        $_SESSION['toast']['msg']="Address succesfully submited.";
        header("refresh:0");
        exit();
    }else{
        $_SESSION['toast']['msg']="Something went wrong, please try again.";
        header("refresh:0");
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
                header("refresh:0");
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
        header('refresh:0');
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
                                <div class="col-6 gy-3">
                                    <h6 class="ms-1">Default : <span style="color:#DF2C77"><b>HOME</b></span></h6>
                                    <div class="address-card">
                                        <h5 class="mb-2">
                                            Address holder name
                                        </h5>
                                        <p class="mb-2">
                                            Phone - +8144582619
                                        </p>
                                        <p class="mb-2">5 McBride Road, Viola,id, 83832 United States </p>
                                        <p class="mb-2">Viola,id, 83832 United States</p>
                                        <p class="mb-2">Postal Code : 99579</p>
                                        <div class="address-func">
                                            <div class="default">
                                                <a href="">Remove from default </a>
                                            </div>
                                            <div class="edit-delete mt-2">
                                            <a href="" class="me-2">Edit Address </a>
                                            <a href="">Delete Address </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 gy-3">
                                    <h6 class="ms-1"><span style="color:#DF2C77"><b>Office</b></span></h6>
                                    <div class="address-card">
                                        <h5 class="mb-2">
                                            Address holder name
                                        </h5>
                                        <p class="mb-2">
                                            Phone - +8144582619
                                        </p>
                                        <p class="mb-2">5 McBride Road, Viola,id, 83832 United States </p>
                                        <p class="mb-2">Viola,id, 83832 United States</p>
                                        <p class="mb-2">Postal Code : 99579</p>
                                        <div class="address-func">
                                            <div class="default">
                                                <a href="">Set as default </a>
                                            </div>
                                            <div class="edit-delete mt-2">
                                            <a href="" class="me-2">Edit Address </a>
                                            <a href="">Delete Address </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 gy-3">
                                    <h6 class="ms-1"><commit commit -m span style="color:#DF2C77"><b>HOME</b></span></h6>
                                    <div class="address-card">
                                        <h5 class="mb-2">
                                            Address holder name
                                        </h5>
                                        <p class="mb-2">
                                            Phone - +8144582619
                                        </p>
                                        <p class="mb-2">5 McBride Road, Viola,id, 83832 United States </p>
                                        <p class="mb-2">Viola,id, 83832 United States</p>
                                        <p class="mb-2">Postal Code : 99579</p>
                                        <div class="address-func">
                                            <div class="default">
                                                <a href="">Remove from default </a>
                                            </div>
                                            <div class="edit-delete mt-2">
                                            <a href="" class="me-2">Edit Address </a>
                                            <a href="">Delete Address </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script type="text/javascript">
    $('.add-new').on('click', function(){
            //alert(sType);
        $('input[name="this-id"]').val(0);
        $('input[name="name"]').val('');
        $('input[name="email"]').val('');
        $('input[name="phone"]').val('');
        $('input[name="city"]').val('');
        $('input[name="state"]').val('');
        $('input[name="pincode"]').val('');
        $('textarea[name="address"]').val('');
    });

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
		url : 'inc/ajax-state.php',
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
		url : 'inc/ajax-city.php',
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