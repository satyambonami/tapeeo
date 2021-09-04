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
                    <div class="col-8 my-3">
                        <div class="address-main-card">
                            <div class="row">
                                <div class="col-6 gy-3">
                                    <div class="address-card">
                                        <h5 class="mb-2">
                                            Address holder name
                                        </h5>

                                        <p class="mb-2">5 McBride Road, Viola,id, 83832 United States </p>

                                        <div class="address-func">
                                            <div class="edit-delete mt-2 d-flex justify-content-between">
                                                <H6><a href="" class="me-2">Select Address </a></H6>
                                                <h6 class="ms-1">Default <span style="color:#DF2C77"><b></b></span></h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 gy-3">
                                    <div class="address-card">
                                        <h5 class="mb-2">
                                            Address holder name
                                        </h5>

                                        <p class="mb-2">5 McBride Road, Viola,id, 83832 United States </p>

                                        <div class="address-func">
                                            <div class="edit-delete mt-2 ">

                                                <h6><a href="" class="me-2">Select Address </a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form action="" class="my-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group border-0">
                                                    <input type="text" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group border-0">
                                                    <input type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group border-0">
                                            <input type="text" class="form-control" placeholder="Contact">
                                        </div>

                                        <div class="form-group border-0">
                                            <input type="email" class="form-control" placeholder="Your Email">
                                        </div>

                                        <div class="form-group border-0">
                                            <input type="text" class="form-control"
                                                placeholder="Street , House , Locality">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group border-0">
                                                    <input type="text" class="form-control" placeholder="City">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group border-0">
                                                    <input type="text" class="form-control" placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group border-0">
                                                    <input type="text" class="form-control" placeholder="State">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group border-0">
                                                    <input type="text" class="form-control" placeholder="Country">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-6 mt-3">
                                                <a href="" class="heading-color ps-2">Clear Form Data</a>
                                            </div>
                                            <div class="col-6">
                                                <div
                                                    class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-end text-xxl-end">
                                                    <a href="" class="btn btn-gradient">Send Message</a>

                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->


                    </div>
                    <div class="col-4 my-3">
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
                                <h6>PayPal</h6>
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
    <?php include('inc/modal.php')?>
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>

</body>

</html>