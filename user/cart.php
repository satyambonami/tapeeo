<?php
include_once("../inc/config.php");
$pageName = "Tapeoo Cart";
$linkPrefix = "../";

$prodTotal =0;
$total =0;
$shippingTotal =$_SESSION['general']['shipping_charge'];
$taxTotal =$_SESSION['general']['tax'];
$totalPrice=0;
$grandTotal=0;
$cartCount = 0;
// print_r($_SESSION['cart']);
// print_r($_SESSION['checkout']);
// Remove Product From Cart
if(isset($_GET['remove'])){
    $cartId = mysqli_real_escape_string($conn, ak_secure_string($_GET['remove']));

    if(isset($_SESSION['user'])){
        $actionQ = mysqli_query($conn, "DELETE FROM `".$tblPrefix."cart` WHERE id=$cartId");
            if($actionQ == true){
                $_SESSION['toast']['msg'] = "Product successfully removed from cart.";
                header("location:cart.php");
                exit();
            }else{
                $_SESSION['toast']['msg'] = "Something went wrong, Please try again.";
                header("location:cart.php");
                exit();
            }
        }elseif(isset($_SESSION['cart'])){
            unset($_SESSION['cart'][$cartId]);
            header("location:cart.php");
            exit();
    }
}

if(isset($_POST['checkout'])){
    $_SESSION['checkout']['id']=$_POST['product-id'];
    $_SESSION['checkout']['name']=$_POST['product-name'];
    $_SESSION['checkout']['price']=$_POST['product-price'];
    $_SESSION['checkout']['qnty']=$_POST['product-quantity'];
    $_SESSION['checkout']['grand-total']=$_POST['grand-total'];

    if(isset($_SESSION['user'])){
        if(isset($_SESSION['checkout'])){
            header("location:checkout.php");
            exit();
        }else{
        $_SESSION['toast']['msg'] = "Something went wrong, Please try again.";
        }
    }else{
        $_SESSION['toast']['type'] = "alert";
        $_SESSION['toast']['msg'] = "Please login to continue.";
        header("location:index.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../inc/head.php') ?>
    <?php include('inc/user-head.php') ?>
    <style>
    .card_btn {
        width: 111px;
        background: #fff;
    }

    .card_btn p {
        font-size: 16px;
    }

    .card_btn i {
        font-size: 14px;
    }
    </style>
</head>

<body>
    <?php include('../inc/header.php') ?>
    <?php include('inc/header-user.php') ?>
    <link rel="stylesheet" href="../admin/assets/css/alertify.rtl.min.css">
<link rel="stylesheet" href="../admin/assets/css/alertify-default-theme.rtl.min.css">
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <form method="POST">
                        <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-9 col-xxl-9 gx-md-0">
                            <div class="cart-section table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="row" style="width: 400px !important;">Products Details</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(isset($_SESSION['user']) && !isset($_SESSION['cart'])){ 
                                            $cartUser=mysqli_query($conn,"SELECT cart.id as cID, cart.quantity as cartqty,pr.pid as prodId, pr.name,pr.price, pr.offer_price, pr.image, pr.pid, pr.quantity as prq FROM `".$tblPrefix."cart` cart LEFT JOIN `".$tblPrefix."products` pr ON cart.prod_id=pr.pid WHERE user_id='".$_SESSION['user']['id']."'");
                                            while($cartData1=mysqli_fetch_assoc($cartUser)){
                                                $cartCount++;
                                                $quantity=$cartData1['cartqty'];
                                                $ProdTotal=$cartData1['offer_price']*$quantity;
                                                $totalPrice= $totalPrice+$ProdTotal;
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="detailsrow">
                                                    <img src="../img/products/<?php echo $cartData1['image']; ?>" alt="<?php echo $cartData1['name']; ?>" class="img-fluid img-responsive">
                                                    <div class="details">
                                                        <h6><?php echo $cartData1['name'];?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                            <div class="quantity">
                                                <div class="quantity-input">
                                                <a class="btn btn-reduce position-relative" href="#" data-price="<?php echo $cartData1['offer_price']; ?>"></a>
                                                    <input type="hidden" name="product-id[]" value="<?php echo $cartData1['prodId']; ?>">
                                                    <input type="hidden" name="product-name[]" value="<?php echo $cartData1['name']; ?>">
                                                    <input type="hidden" name="product-price[]" value="<?php echo $cartData1['offer_price']; ?>">
                                                    <input type="hidden" name="product-image[]" value="<?php echo $cartData1['image']; ?>">

                                                    <input type="text" class="prod-quantity text-center" name="product-quantity[]" value="1" data-max="<?php echo $cartData1['prq']; ?>" pattern="[0-9]*" readonly="">
                                                    <a class="btn btn-increase position-relative" href="#" data-price="<?php echo $cartData1['offer_price']; ?>"></a>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="heading-color">$ <?php echo $cartData1['price']; ?></td>
                                            <td class="total heading-color">$ <?php echo $cartData1['offer_price']; ?></td>
                                            <td>
                                            <small><a data-this-id="<?php echo $cartData1['cID'];?>" class="remove-item"><i class="far fa-trash-alt"></i></a></small>
                                            </td>
                                        </tr>
                                    <?php } }elseif(isset($_SESSION['cart'])){ 
                                                foreach($_SESSION['cart'] as $key => $value){
                                                    $dataPrdC = mysqli_query($conn,"SELECT `pid`, `name`, `quantity`, `image`, `price`, `discount`, `offer_price`, `status` FROM `".$tblPrefix."products` WHERE pid = $key");
                                                    while($cartDataC = mysqli_fetch_assoc($dataPrdC)){
                                                        $cartCount++;
                                                        $quantity=$value;
                                                        $ProdTotal=$cartDataC['offer_price']*$value;
                                                        $totalPrice= $totalPrice+$ProdTotal;
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="detailsrow">
                                                    <img src="../img/products/<?php echo $cartDataC['image'];?>" alt="<?php echo $cartDataC['name'];?>" class="img-fluid img-responsive">
                                                    <div class="details text-center">
                                                        <h6><?php echo $cartDataC['name']?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                            <div class="quantity">
                                                <div class="quantity-input">
                                                    <a class="btn btn-reduce position-relative" data-price="<?php echo $cartDataC['price']; ?>"></a>
                                                    <input type="hidden" name="product-id[]" value="<?php echo $cartDataC['pid']?>">
                                                    <input type="hidden" name="product-name[]" value="<?php echo $cartDataC['name']?>">
                                                    <input type="hidden" name="product-price[]" value="<?php echo $cartDataC['offer_price']?>">
                                                    <input type="hidden" name="product-image[]" value="<?php echo $cartDataC['image']?>">
                                                    
                                                    <input type="text" class="prod-quantity text-center" name="product-quantity[]" value="1" data-max="<?php echo $cartDataC['quantity']?>" pattern="[0-9]*" readonly="">
                                                    
                                                    <a class="btn btn-increase position-relative" data-price="<?php echo $cartDataC['price']; ?>"></a>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="heading-color ">
                                                <div class="cart-price">
                                                    $ <?php echo $cartDataC['price']?></td>
                                                </div>
                                            <td class="total heading-color">
                                                <div class="cart-total">
                                                    $ <?php echo $cartDataC['offer_price']?>
                                                </div>
                                            </td>
                                            <td>
                                                <small><a data-this-id="<?php echo $cartDataC['pid'];?>" class="remove-item"><i class="far fa-trash-alt"></i></a></small>
                                            </td>
                                        </tr>
                                    <?php } } }?>
                                    <?php 
                                            if($cartCount==0){ ?>
                                    <tr>
                                        <td>
                                            <h6>Your Cart is Empty..</h6>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                            <?php  if($cartCount != 0 ){ ?>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-3 col-xxl-3 gy-3 gy-sm-3 gy-md-3 gy-lg-3 gy-xl-0 gy-xxl-0">
                                    <div class="order-summary">
                                        <h3 class="heading-color">Cart Total</h3>
                                        <hr>
                                        <?php $TotalTax = ($totalPrice*$taxTotal)/100;?>
                                        <div class="sub-total product-details mt-1">
                                            <h6>Sub Total</h6>
                                            <h6>$<?php echo $totalPrice;?></h6>
                                        </div>
                                        <div class="product-details mt-1">
                                            <h6>Tax Charges</h6>
                                            <h6>$<?php echo $TotalTax;?>
                                            <small>(<?php echo $_SESSION['general']['tax']?>%)</small>
                                        </h6>
                                        </div>
                                        <div class="product-details mt-1">
                                            <h6>Deleviery Charges</h6>
                                            <h6>$<?php if($shippingTotal!=0){echo $shippingTotal;}elseif($shippingTotal==0){echo 'Free Shipping';}?></h6>
                                        </div>

                                        <div class="product-details mt-1">
                                            <h6>Total</h6>
                                            <?php $grandTotal = $totalPrice + $shippingTotal + $TotalTax;?>
                                            <input type="hidden" name="grand-total" value="<?php echo $grandTotal;?>">
                                            <h6 class="final-price">$<?php echo $grandTotal;?></h6>
                                        </div>
                                        <button class="w-100 btn btn-gradient mt-3 rounded" type="submit" name="checkout">Proceed To
                                            Checkout</button>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('inc/mobileNav.php') ?>
    <?php include('../inc/js.php') ?>
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>
    <script type="text/javascript">
		$(".btn-increase").on('click', function(){
			var price = parseInt($(this).data('price')),
				finalPrice = $('.final-price').text();
				finalPrice += price;
				prodQuan = $(this).closest('.quantity-input').find('.prod-quantity').val();
				maxQuan = $(this).closest('.quantity-input').find('.prod-quantity').data('max');
				prodQuan++;
                // alert(finalPrice);
				//alert(maxQuan);
			if(maxQuan>=prodQuan){
				$('.final-price').text(finalPrice);
				$('.sub-total').text(finalPrice);
				$('input[name="grand-total"]').val(finalPrice);
				$(this).closest('.quantity-input').find('.prod-quantity').val(prodQuan);	
			}
		});

		$(".btn-reduce").on('click', function(){
			var price = parseInt($(this).data('price')),
				finalPrice = parseInt($('.final-price').text()),
				prodQuan = $(this).closest('.quantity-input').find('.prod-quantity').val();
				prodQuan--;
				finalPrice -= price;
			if(prodQuan >0){
				$('.final-price').text(finalPrice);
				$('.sub-total').text(finalPrice);
				//$('input[name="grand-total"]').val(finalPrice);
				$(this).closest('.quantity-input').find('.prod-quantity').val(prodQuan);	
			}
		});
	</script>
<script>
    $('.remove-item').on('click', function(){
        var id = $(this).data('this-id');
        if(confirm("Do you want to remove this item?")){
            window.location = "?remove="+id;
            return true;
        }else{
            return false;
        }
    });
</script>
   
</body>

</html>