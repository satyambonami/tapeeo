<?php
include_once("../inc/config.php");
$pageName = "Privacy Policy";
$linkPrefix = "../";
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
        <section class="section-padding-1 cart-section">
            <div class="container">
                <div class="row">
                    <div class="col-9">
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
                                        <input type="number" name="" value="1" id="">
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
                                        <input type="number" name="" value="1" id="">
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
                                        <input type="number" name="" value="1" id="">
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
                                        <input type="number" name="" value="1" id="">
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
                    <div class="col-3 order-summary">
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
                        <input type="radio" id="COD" name="fav_language" value="COD">
                        <label for="html">
                            <h6>Cash On Delivery</h6>
                        </label><br>
                        <input type="radio" id="PUM" name="fav_language" value="PUM">
                        <label for="css">
                            <h6>Pay U Money</h6>
                        </label><br>
                        <input type="checkbox" name="" id=""> I've read and <span style="color: #D33696">accept the terms & condition *</span>
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
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>

</body>

</html>