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

// echo "<pre>";
// print_r($_SESSION['checkout']);
// echo "</pre>";

// unset($_SESSION['checkout']);
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
                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xxl-8 my-3">
                            <div class="address-main-card">
                                <div class="row">
                                    <h6 class="mb-0">Select Existing Address</h6>
                                    <?php 
                                        $address1 = mysqli_query($conn,"SELECT * FROM `".$tblPrefix."user_address` WHERE `user_id` = '$userId' AND status=2");
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
                                                        <H6> <input type="radio" name="shipping-address" id="address" class="select-this radioButtons" value="<?php echo $userAddress['id'];?>" require data-this-id='<?php echo $userAddress['id']; ?>' data-name='<?php echo $userAddress['name']; ?>' data-email='<?php echo $userAddress['email']; ?>' data-phone='<?php echo $userAddress['phone']; ?>' data-city='<?php echo $userAddress['city']; ?>' data-state='<?php echo $userAddress['state']; ?>' data-country='<?php echo $userAddress['country']; ?>' data-address='<?php echo $userAddress['address']; ?>' data-pincode='<?php echo $userAddress['pincode']; ?>' data-type='<?php echo $userAddress['pincode']; ?>'> Select Address</H6>
                                                        <h6 class="ms-1"><?php if($userAddress['default']==1){ echo 'Default';}?> <span style="color:#DF2C77"><b></b></span></h6>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                                <form method="POST" id="addressData">
                                    <div class="row">
                                        <h6 class="mt-4">Or Add a new address </h6>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group border-0">
                                                        <input type="text" class="form-control" placeholder=" Name" name="name" autocomplete="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group border-0">
                                                        <input type="text" class="form-control" placeholder="Contact" name="phone" autocomplete="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group border-0">
                                                        <input type="email" class="form-control" placeholder="Your Email" name="email" autocomplete="">
                                                    </div>
                                                </div>
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
                                                                <?php
                                                                    $Datacity = mysqli_query($conn,"SELECT `id`, `name` FROM `cities`"); 
                                                                    while($City = mysqli_fetch_assoc($Datacity)){
                                                                ?>
                                                                <option value="<?php echo $City['id'];?>" ><?php echo $City['name'];?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                <input type="checkbox" name="" id="" required> I've read and <span style="color: #D33696">accept the
                                    terms & condition *</span>
                                    <script src="https://www.paypal.com/sdk/js?client-id=Ab2EH23j3dFGxSN8ELJmFkK20gTSyqnpsjGyzYRZ6pjqiJYQqd55Cd1XY8nCV1nrx8169FxmmHLAbyrr&currency=USD&disable-funding=credit,card"></script>
                                    <div class="procedDiv">
                                        <div id="paypal-button-container"></div>
                                    </div>
                                <!-- <button class="w-100 btn btn-gradient mt-3 rounded" type="submit" name="checkout">Place Order</button> -->
                            </div>
                        </div>
                    </div>
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
<script type="text/javascript">
    $('.select-this').on('click', function() {
        $('input[name="this-id"]').val($(this).data('this-id'));
        $('input[name="name"]').val($(this).data('name'));
        $('input[name="email"]').val($(this).data('email'));
        $('input[name="phone"]').val($(this).data('phone'));
        $('input[name="address"]').val($(this).data('address'));
        $('input[name="zipcode"]').val($(this).data('pincode'));
        $('select[name="city"]').val($(this).data('city'));
        $('select[name="state"]').val($(this).data('state'));
    });
</script>
<script>
     const radioButtons = document.querySelectorAll('.radioButtons');
    const cardDivContent = document.querySelector('.procedDiv');

    cardDivContent.style.display = 'none';

    // get the all radio bttons
    radioButtons.forEach(item => {
       item.addEventListener('click', function(e) {
           // if the radio button was clicked than " the input filds
            if(item.checked) {
                console.log(item);

                cardDivContent.style.display = 'block';

                formInputDiv.forEach(el => {
                   el.value = '';
                });
            }    
       });
    });

    //if the user used the iput filds then remove the radio button clicked
    formInputDiv.forEach(item => {
        item.addEventListener('click', function(e) {
           radioButtons.forEach(item => {
               item.checked = false;
           })
        });
    });
</script>
<script>
      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
            return actions.order.create({
                "purchase_units": [{
                    "amount": {
                    "currency_code": "USD",
                    "value": "<?php echo $_SESSION['checkout']['grand-total']?>",
                    "breakdown": {
                        "item_total": {  /* Required when including the `items` array */
                        "currency_code": "USD",
                        "value": "<?php echo $_SESSION['checkout']['grand-total']?>",
                        },
                    }
                    },
                    "items": [
                        <?php foreach($_SESSION['checkout']['id'] as $item => $itm){ ?>
                    {
                        "name": "<?php echo $_SESSION['checkout']['name'][$item]?>", /* Shows within upper-right dropdown during payment approval */
                        "description": "<?php echo $_SESSION['checkout']['name'][$item]?>", /* Item details will also be in the completed paypal.com transaction view */
                        "unit_amount": {
                        "currency_code": "USD",
                        "value": "<?php echo $_SESSION['checkout']['price'][$item]?>"
                        },
                        "quantity": "<?php echo $_SESSION['checkout']['qnty'][$item]?>"
                    },
                    <?php }?>
                    {
                        "name": "Tax", /* Shows within upper-right dropdown during payment approval */
                        "description": "Tax", /* Item details will also be in the completed paypal.com transaction view */
                        "unit_amount": {
                        "currency_code": "USD",
                        "value": "<?php echo $TotalTax?>"
                        },
                        "quantity": "1"
                    },
                    {
                        "name": "Shipping", /* Shows within upper-right dropdown during payment approval */
                        "description": "Shipping", /* Item details will also be in the completed paypal.com transaction view */
                        "unit_amount": {
                        "currency_code": "USD",
                        "value": "<?php echo $shippingTotal?>"
                        },
                        "quantity": "1"
                    },
                    ]
                }]
            });
            },


        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                let transaction = orderData.purchase_units[0].payments.captures[0];
                let transactionId = transaction.id;
                let transactionStatus = transaction.status;
                // let addressData =  $('#addressData').serialize();
                let name = $('input[name="name"]').val(),
                email = $('input[name="email"]').val(),
                phone = $('input[name="phone"]').val(),
                address = $('input[name="address"]').val(),
                pincode = $('input[name="zipcode"]').val(),
                state = $('select[name="state"]').val(),
                city = $('select[name="city"]').val();
                let tax = <?php echo $TotalTax; ?>,
                    shipping = <?php echo $shippingTotal?>;
                    $.ajax({
                        url : '../inc/success.php',
                        type : 'POST',
                        data : { data : transactionId,status : transactionStatus,name,email,phone,address,pincode,state,city,tax,shipping},

                        success: function(response){
                            // console.log(response);
                            alertify.success("Order Successfully Placed");
                            window.location.href = "<?php echo SITE_URL?>user/index.php";

                        },
                        error: function(response){
                            // console.log(response);
                        }
                    });
          });
        }
      }).render('#paypal-button-container');
</script>

</body>

</html>