<?php
    include_once("../inc/config.php");
    $pageName="Checkout";
    $linkPrefix="../";

    if(!isset($_SESSION['checkout'])){
        $_SESSION['toast']['type']="error";
        $_SESSION['toast']['msg']="An unexpected error occured.";
        header('location:cart.php');
        exit();
    }
$shippingTotal =$_SESSION['general']['shipping_charge'];
$taxTotal =$_SESSION['general']['tax'];
$userId = $_SESSION['user']['id'];
$totalPrice = 0;

// add/Update address...
// echo"<pre>";
//   print_r($_SESSION['checkout']);
// echo"</pre>";
// unset($_SESSION['checkout']);

  if(isset($_POST['status']) && isset($_POST['transaction'])){
      if(isset($_POST['shipping-address'])){
        $addressId = mysqli_real_escape_string($conn, ak_secure_string($_POST['shipping-address']));
      }elseif(isset($_POST['type']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['zipcode']) && isset($_POST['address'])){
        $type= mysqli_real_escape_string($conn,ak_secure_string($_POST['type']));
        $name=mysqli_real_escape_string($conn,ak_secure_string($_POST['name']));
        $email=trim(strtolower(mysqli_real_escape_string($conn,ak_secure_string($_POST['email']))));
        $phone=mysqli_real_escape_string($conn,ak_secure_string($_POST['phone']));
        $city=mysqli_real_escape_string($conn,ak_secure_string($_POST['city']));
        $state=mysqli_real_escape_string($conn,ak_secure_string($_POST['state']));
        $country=mysqli_real_escape_string($conn,ak_secure_string($_POST['country']));
        $pincode=mysqli_real_escape_string($conn,ak_secure_string($_POST['zipcode']));
        $address=htmlspecialchars($_POST['address']);
        mysqli_query($conn,"INSERT INTO `".$tblPrefix."user_address`(`user_id`,`type`,`name`, `email`,`phone`, `country`, `city`, `state`, `address`, `pincode`, `status`, `date_time`) VALUES ('$userId','$type','$name','$email','$phone','$country','$city','$state','$address','$pincode',2,'$cTime')");
        $addressId = mysqli_insert_id($conn);
      }else{
        $_SESSION['toast']['type'] = 'warning';
        $_SESSION['toast']['msg'] = "Please select address or add a new";
        header('location:checkout.php');
        exit();
      }
    $tax = mysqli_real_escape_string($conn,ak_secure_string($_POST['tax']));
    $shipping = mysqli_real_escape_string($conn,ak_secure_string($_POST['shipping']));
  
    $actionQ = "INSERT INTO `".$tblPrefix."orders`(`user_id`, `prod_id`, `prod_prices`, `total_amount`, `prod_quantity`, `tax`, `shipping`, `address_id`, `status`, `date_time`) 
    VALUES ('".$_SESSION['user']['id']."', '".implode(',',$_SESSION['checkout']['id'])."', '".implode(',',$_SESSION['checkout']['price'])."','".$_SESSION['checkout']['grand-total']."', '".implode(',',$_SESSION['checkout']['qnty'])."', '$tax', '$shipping', '$addressId', 2, '$cTime')";
  
    if(mysqli_query($conn, $actionQ)==true){
      $orderId = mysqli_insert_id($conn);
      $txnId = rand(111111,999999).$orderId;
  
    mysqli_query($conn, "INSERT INTO `".$tblPrefix."order_txn`(`txn_id`, `order_id`, `total_amount`, `date_time`, `payment_status`) VALUES ('$txnId', '$orderId', '".$_SESSION['checkout']['grand-total']."', '$cTime', 'Pending')");
    mysqli_query($conn, "DELETE FROM `".$tblPrefix."cart` WHERE user_id=$userId");
    foreach ($_SESSION['checkout']['id'] as $key => $value) {
        $query = mysqli_query($conn,"UPDATE `".$tblPrefix."products` SET `quantity` = `quantity` - '".$_SESSION['checkout']['qnty'][$key]."' WHERE id='".$value."' ");
    }
    $userMail = $_SESSION['user']['email'];
    $mail = CnfProductMail($userMail,$orderId);
    
    //   $_SESSION['checkout']['amount'] = $_SESSION['checkout']['grand-total'];
    //   $_SESSION['checkout']['product_info'] = SITE_NAME." | Product";
    //   $_SESSION['checkout']['txn_id'] = $txnId;
    unset($_SESSION['checkout']);
      $_SESSION['toast']['type'] = 'success';
      $_SESSION['toast']['msg'] = "Order Successfully Placed";
      header('location:index.php');
      exit();
    }else{
      $_SESSION['toast']['type']='error';
      $_SESSION['toast']['msg']='Something went wrong, please try again.';
    }
  
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../inc/head.php')?>
    <?php include('inc/user-head.php')?>
    <link rel="stylesheet" href="../admin/assets/css/alertify.rtl.min.css">
<link rel="stylesheet" href="../admin/assets/css/alertify-default-theme.rtl.min.css">
</head>

<body>
    <?php include('../inc/header.php')?>
    <?php include('inc/header-user.php')?>
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <form method="POST">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xxl-8 my-3">
                                <div class="address-main-card">
                                    <div class="row">
                                        <h6 class="mb-0">Select Existing Address</h6>
                                        <?php 
                                            $address1 = mysqli_query($conn,"SELECT * FROM `".$tblPrefix."user_address` WHERE `user_id` = '$userId' AND status!=0");
                                            while($userAddress = mysqli_fetch_assoc($address1)){
                                        ?>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6 gy-3" style="display:table;">
                                                <div class="address-card" style="display: table-cell;">
                                                    <h5 class="mb-2">
                                                        <?php echo $userAddress['name'];?>
                                                    </h5>
        
                                                    <p class="mb-2"><?php echo $userAddress['address'];?>,<?php echo city($userAddress['city']);?>,<?php echo state($userAddress['state']);?><?php echo country($userAddress['country']);?></p>
        
                                                    <div class="address-func">
                                                        <div class="edit-delete mt-2 d-flex justify-content-between">
                                                            <H6> <input type="radio" name="shipping-address" id="address" value="<?php echo $userAddress['id'];?>" require
                                                             > Select Address</H6>
                                                            <h6 class="ms-1"><?php if($userAddress['default']==1){ echo 'Default';}?> <span style="color:#DF2C77"><b></b></span></h6>
        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <h6 class="mt-4">Or Add a new address </h6>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group border-0">
                                                        <select class="form-select" aria-label="Default select example" name="type" >
                                                            <option selected disabled value="0">Select Address Type</option>
                                                            <option value="1">Residential</option>
                                                            <option value="2">Commercial</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group border-0">
                                                        <input type="text" class="form-control" placeholder=" Name" name="name" autocomplete="">
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group border-0">
                                                <input type="text" class="form-control" placeholder="Contact" name="phone" autocomplete="">
                                            </div>
    
                                            <div class="form-group border-0">
                                                <input type="email" class="form-control" placeholder="Your Email" name="email" autocomplete="">
                                            </div>
    
                                            <div class="form-group border-0">
                                                <input type="text" class="form-control"
                                                    placeholder="Street , House , Locality" name="address" autocomplete="">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group border-0">
                                                        <input type="text" class="form-control" placeholder="Postal Code" name="zipcode" autocomplete="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select country" aria-label="Default select example" name="country" >
                                                                <option selected disabled value="231">United States</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select state" id="state" aria-label="Default select example" name="state" >
                                                            <option selected disabled value="0">Select State</option>
                                                            <?php
                                                                $DataState = mysqli_query($conn,"SELECT `id`, `name` FROM `states`"); 
                                                                while($State = mysqli_fetch_assoc($DataState)){
                                                            ?>
                                                            <option value="<?php echo $State['id'];?>" ><?php echo $State['name'];?></option>
                                                            <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select" id="city" aria-label="Default select example" name="city" >
                                                                <option selected disabled value="0">Select City</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
        
        
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xxl-4 my-3">
                                <div class="trackorder-summary">
                                    <h3 class="heading-color">Your Order</h3>
                                    <hr>
                                    <?php 
                                        foreach ($_SESSION['checkout']['id'] as $key => $value) {
                                            $totalPrice += $_SESSION['checkout']['price'][$key] * $_SESSION['checkout']['qnty'][$key];
                                    ?>
                                    <div class="product-details">
                                        <h6 class="product_name"><?php echo $_SESSION['checkout']['name'][$key];?><small>(x <?php echo $_SESSION['checkout']['qnty'][$key];?>)</small></h6>
                                        <h6 class="product_price">$<?php echo $_SESSION['checkout']['price'][$key]*$_SESSION['checkout']['qnty'][$key];?></h6>
                                    </div>
                                    <?php } 
                                        $TotalTax = ($totalPrice*$taxTotal)/100;
                                    ?>
                                    <div class="product-details mt-1">
                                        <h6>Tax Charges</h6>
                                        <h6>$<?php echo $TotalTax;?></h6>
                                    </div>
                                    <div class="product-details mt-1">
                                        <h6>Deleviery Charges</h6>
                                        <h6>$<?php echo $shippingTotal;?></h6>
                                    </div>
                                    <?php $grandTotal = $totalPrice + $shippingTotal + $TotalTax;?>
                                    <div class="product-details mt-1">
                                        <h6>Total</h6>
                                        <h6>$<?php echo $grandTotal;?></h6>
                                    </div>
                                    <div>
                                        <input type="radio" id="COD" name="fav_language" value="COD" required>
                                        <label for="html">
                                            <h6>Cash On Delivery</h6>
                                        </label>
                                    </div>
                                    <input type="hidden" name="tax" value="<?php echo $TotalTax;?>">
                                    <input type="hidden" name="shipping" value="<?php echo $shippingTotal;?>">
                                    <input type="checkbox" name="" id="" required> I've read and <span style="color: #D33696">accept the
                                        terms & condition *</span>
                                        <div id="paypal-button-container"></div>
                                    <button class="w-100 btn btn-gradient mt-3 rounded"  id="paypal-button-container" type="submit" name="checkout">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php')?>
    <?php include('../inc/js.php')?>
    <?php include('inc/modal.php')?>
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>
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