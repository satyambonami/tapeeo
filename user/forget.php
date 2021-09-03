<?php
include_once("../inc/config.php");
$pageName = "Forget Password";
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
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <div class="offset-3 col-6">
                        <div class="login-main forget">
                            <h3 class="heading-color my-3 text-center">Enter your mail</h3>
                            <form method="POST" class="mt-2 d-flex">
                                <input type="email" class="form-control mt-0" placeholder="Your Email" name="email"
                                    require autocomplete="off">
                                <button type="submit" class="btn-forget" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('../inc/js.php') ?>
</body>

</html>