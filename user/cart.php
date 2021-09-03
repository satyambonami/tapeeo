<?php
include_once("../inc/config.php");
$pageName = "Tapeoo Cart";
$linkPrefix = "../";
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
                                    <tr>
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
                                        <div class="quantity">
                                            <div class="quantity-input">
                                            <a class="btn btn-increase position-relative" href="#" data-price="540.00"></a>
                                                <input type="hidden" name="product-id[]" value="20">
                                                <input type="hidden" name="product-name[]" value="Childrens Books">
                                                <input type="hidden" name="product-price[]" value="540.00">
                                                <input type="hidden" name="product-image[]" value="2491554248597.jpg">

                                                <input type="text" class="prod-quantity text-center" name="product-quantity[]" value="1" data-max="50" pattern="[0-9]*" readonly="">
                                                
                                                <a class="btn btn-reduce position-relative" href="#" data-price="540.00"></a>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="heading-color">$ 39</td>
                                        <td class="total heading-color">$ 39</td>
                                        <td>
                                            <small><a href=""><i class="fas fa-edit"></i></a></small>
                                            <small><a href=""><i class="far fa-trash-alt"></i></a></small>
                                        </td>
                                    </tr>
                                    <tr>
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
                                        <div class="quantity">
                                            <div class="quantity-input">
                                            <a class="btn btn-increase position-relative" href="#" data-price="540.00"></a>
                                                <input type="hidden" name="product-id[]" value="20">
                                                <input type="hidden" name="product-name[]" value="Childrens Books">
                                                <input type="hidden" name="product-price[]" value="540.00">
                                                <input type="hidden" name="product-image[]" value="2491554248597.jpg">

                                                <input type="text" class="prod-quantity text-center" name="product-quantity[]" value="1" data-max="50" pattern="[0-9]*" readonly="">
                                                
                                                <a class="btn btn-reduce position-relative" href="#" data-price="540.00"></a>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="heading-color">$ 39</td>
                                        <td class="total heading-color">$ 39</td>
                                        <td>
                                            <small><a href=""><i class="fas fa-edit"></i></a></small>
                                            <small><a href=""><i class="far fa-trash-alt"></i></a></small>
                                        </td>
                                    </tr>
                                    <tr>
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
                                        <div class="quantity">
                                            <div class="quantity-input">
                                            <a class="btn btn-increase position-relative" href="#" data-price="540.00"></a>
                                                <input type="hidden" name="product-id[]" value="20">
                                                <input type="hidden" name="product-name[]" value="Childrens Books">
                                                <input type="hidden" name="product-price[]" value="540.00">
                                                <input type="hidden" name="product-image[]" value="2491554248597.jpg">

                                                <input type="text" class="prod-quantity text-center" name="product-quantity[]" value="1" data-max="50" pattern="[0-9]*" readonly="">
                                                
                                                <a class="btn btn-reduce position-relative" href="#" data-price="540.00"></a>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="heading-color">$ 39</td>
                                        <td class="total heading-color">$ 39</td>
                                        <td>
                                            <small><a href=""><i class="fas fa-edit"></i></a></small>
                                            <small><a href=""><i class="far fa-trash-alt"></i></a></small>
                                        </td>
                                    </tr>

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
                            <button class="w-100 btn btn-gradient mt-3 rounded" type="submit">Proceed To
                                Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>
    <script>
    const lineDiv = document.querySelector(".line_Div");
    const buttonActiv = document.querySelector(".buttonActiv");
    const buttonOneActiv = document.querySelector(".buttonOneActiv");

    const active_ContentOne = document.querySelector(".active_ContentOne");
    const active_ContentTwo = document.querySelector(".active_ContentTwo");

    const tab = document.querySelectorAll(".tab-content");
    const animiLine = document.querySelectorAll(".animiLine");

    const minus = document.querySelector(".minus");
    const plus = document.querySelector(".plus");
    const num = document.querySelector(".number");


    // card js
    let startNumebr = 1;

    // inc the number
    plus.addEventListener("click", function() {
        startNumebr++;
        num.textContent = startNumebr;
    });

    // minus the number
    // if the number is less then one so stop
    const desnumerb = function() {
        minus.addEventListener("click", function() {
            if (startNumebr >= 2) {
                startNumebr--;
                num.textContent = startNumebr;
            } else {
                return;
            }
        });
    };

    desnumerb();

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