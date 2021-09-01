<?php
    include_once("../inc/config.php");
    $pageName="Privacy Policy";
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
        <section class="section-padding-1 cart-section">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                <th scope="col">Products Details</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>1</td>
                                <td><input type="number" name="" id="" value="1"></td>
                                <td class="heading-color">$ 39</td>
                                <td class="total"><h6 class="heading-color">$ 39</h6>
                                                          <small><a href="">Edit</a></small>
                                                          <small><a href="">Remove</a></small>
                                </td>
                                </tr>
                                <tr>
                                <th>2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <th>3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php')?>
    <?php include('../inc/js.php')?>
</body>
</html>
