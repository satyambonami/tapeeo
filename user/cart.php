<?php
include_once("../inc/config.php");
$pageName = "Tapeoo Cart";
$linkPrefix = "../";

if(isset($_GET['remove'])){
    $cartId = mysqli_real_escape_string($conn, ps_secure_string($_GET['remove']));
  
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
    }else{
      unset($_SESSION['cart'][$cartId]);
    }
  }
if(isset($_POST['checkout'])){
    $_SESSION['checkout']['id'] = $_POST['product-id'];
    $_SESSION['checkout']['quantity'] = $_POST['product-quantity'];
    $_SESSION['checkout']['grand-total'] = $_POST['grand-total'];
    $_SESSION['checkout']['name'] = $_POST['product-name'];
    $_SESSION['checkout']['price'] = $_POST['product-price'];
    $_SESSION['checkout']['image'] = $_POST['product-image'];

    if(isset($_SESSION['checkout'])){
        header("location:checkout.php");
        exit();
    }else{
        $_SESSION['toast']['msg'] = "Something went wrong, Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../inc/head.php') ?>
    <?php include('inc/user-head.php') ?>
    <style>
        .card_btn{
            width: 111px;
            background: #fff;
        }
        .card_btn p{
            font-size: 16px;
        }
        .card_btn i{
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php include('../inc/header.php') ?>
    <?php include('inc/header-user.php') ?>
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="cart-section">
                            <table class="table table-responsive list">
                            <thead>
                                <tr>
                                    <th scope="col">Products Details</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if(isset($_SESSION['user'])){
                                    $cartQ = mysqli_query($conn, "SELECT cart.id, cart.quantity as cartqty, pr.name, pr.offer_price, pr.image, pr.pid, pr.quantity as prq FROM `".$tblPrefix."cart` cart LEFT JOIN `".$tblPrefix."products` pr ON cart.prod_id=pr.pid WHERE user_id='".$_SESSION['user']['id']."'");
                                    $totalAmount =0;
                                    while ($cartData = mysqli_fetch_assoc($cartQ)){
                                        $imgPrd=explode(",",$cartData['image']);
                                        $prodTotal = $cartData['offer_price']*$cartData['cartqty'];
                                        $totalAmount += $prodTotal;
                                ?>
                                <tr>
                                    <input type="hidden" name="product-id[]" value="<?php echo $cartData['pid'];?>">
                                    <input type="hidden" name="product-name[]" value="<?php echo $cartData['name'];?>">
                                    <input type="hidden" name="product-price[]" value="<?php echo $cartData['offer_price'];?>">
                                    <input type="hidden" name="product-image[]" value="<?php echo $cartData['image'];?>">
                                    <td>
                                        <div class="detailsrow">
                                            <img src="../img/Untitled-1.png" alt="">
                                            <div class="details">
                                                <h6>Tappeo Card</h6>
                                                <h6>Color Black</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-form__item product-form__item--quantity">
                                        <div class="dec button qtyminus">-</div>
                                            <input type="number" name="product-quantity[]" class="quantity" value="<?php echo $value;?>" max="10" pattern="[0-9]*" readonly>
                                            <div class="inc button qtyplus">+</div>
                                        </div>
                                    </td>
                                    <td class="heading-color">$ 39</td>
                                    <td class="total heading-color">$ 39</td>
                                    <td>
                                        <small><a href=""><i class="fas fa-edit"></i></a></small>
                                        <small><a href=""><i class="far fa-trash-alt"></i></a></small>
                                    </td>
                                </tr>
                            <?php } }elseif(isset($_SESSION['cart'])){
                                foreach ($_SESSION['cart'] as $key => $value) {
                                $cartQ = mysqli_query($conn, "SELECT name,offer_price,quantity,image,pid,quantity FROM `".$tblPrefix."products` WHERE pid='$key' AND status=2");
                                    $totalAmount =0;
                                    while ($cartData = mysqli_fetch_assoc($cartQ)){
                                    $imgPrd=explode(",",$cartData['image']);
                                    $prodTotal = $cartData['offer_price']*$value;
                                    $totalAmount = $totalAmount+$prodTotal;
                            ?>
                            <tr>
                                <input type="hidden" name="product-id[]" value="<?php echo $cartData['pid'];?>">
                                <input type="hidden" name="product-name[]" value="<?php echo $cartData['name'];?>">
                                <input type="hidden" name="product-price[]" value="<?php echo $cartData['offer_price'];?>">
                                <input type="hidden" name="product-image[]" value="<?php echo $cartData['image'];?>">
                                <td>
                                    <div class="detailsrow">
                                        <img src="../img/Untitled-1.png" alt="">
                                        <div class="details">
                                            <h6>Tappeo Card</h6>
                                            <h6>Color Black</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-increase position-relative" href="#" data-price="<?php echo $cartData['offer_price'];?>"></a>
                                        <input type="text" class="prod-quantity text-center" name="product-quantity[]" value="1" data-max="<?php echo $cartData['quantity'];?>" pattern="[0-9]*" readonly="">
                                    <a class="btn btn-reduce position-relative" href="#" data-price="<?php echo $cartData['offer_price'];?>"></a>
                                </td>
                                <td class="heading-color">$ 39</td>
                                <td class="total heading-color">$ 39</td>
                                <td>
                                    <small><a href=""><i class="fas fa-edit"></i></a></small>
                                    <small><a href=""><i class="far fa-trash-alt"></i></a></small>
                                </td>
                            </tr>
                            <?php } } }?>
                            </tbody>
                        </table>
                        </div>
                        
                    </div>
                    <div class="col-3 ">
                        <div class="order-summary">
                        <h3 class="heading-color">Cart Total</h3>
                        <hr>
                        <div class="product-details">
                            <h6 class="product_name">Tappeo Brand</h6>
                            <h6 class="product_price">$ 150.00</h6>
                        </div>
                        <div class="product-details mt-1">
                            <h6>Tax Charges</h6>
                            <h6>$ 200</h6>
                        </div>
                        <div class="product-details mt-1">
                            <h6>Deleviery Charges</h6>
                            <h6>$ 200</h6>
                        </div>

                        <div class="product-details mt-1">
                            <h6>Total</h6>
                            <h6>$ 200</h6>
                        </div>
                        
                        <!-- <div class="shipping mt-1">
                            <select name="" id="">
                                <option value="">Standard Delivery</option>
                                <option value="">Free Delivery</option>
                            </select>
                        </div> -->
                        <button class="w-100 btn btn-gradient mt-3 rounded" type="submit">Proceed To Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript">
        $(".btn-increase").on('click', function(){
        var price = parseInt($(this).data('price')),
            finalPrice = parseInt($('.final-price').text());
            finalPrice += price;
            prodQuan = $(this).closest('.quantity-input').find('.prod-quantity').val();
            maxQuan = $(this).closest('.quantity-input').find('.prod-quantity').data('max');
            prodQuan++;
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
            $('input[name="grand-total"]').val(finalPrice);
            $(this).closest('.quantity-input').find('.prod-quantity').val(prodQuan);  
        }
        });
    </script>
</body>

</html>