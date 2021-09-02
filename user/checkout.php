<?php
    include_once("../inc/config.php");
    $pageName="Checkout";
    $linkPrefix="../";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../inc/head.php')?>
    <?php include('inc/user-head.php')?>
</head>

<body>
    <?php include('../inc/header.php')?>
    <?php include('inc/header-user.php')?>
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
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
                                    <a href="">
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
                        <!-- Button trigger modal -->


                    </div>
                    <div class="col-3">
                        <div class="trackorder-summary">
                            <h3 class="heading-color">Your Order</h3>
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
                            <input type="radio" id="COD" name="fav_language" value="COD">
                            <label for="html">
                                <h6>Cash On Delivery</h6>
                            </label><br>
                            <input type="radio" id="PUM" name="fav_language" value="PUM">
                            <label for="css">
                                <h6>Pay U Money</h6>
                            </label><br>
                            <input type="checkbox" name="" id=""> I've read and <span style="color: #D33696">accept the
                                terms & condition *</span>
                           
                            <button class="w-100 btn btn-gradient mt-3 rounded" type="submit">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php')?>
    <?php include('../inc/js.php')?>

</body>

</html>