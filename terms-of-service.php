<?php
    include_once("inc/config.php");
    $pageName="Terms Of Services";

    $linkPrefix="";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('inc/head.php')?>
</head>

<body>
    <!-- MAin MEnu Bar -->
    <?php include('inc/header.php')?>
    <main>
        <section style="background: url('img/Ellipse\ 2.png'); background-size: 100% 100%; padding: 60px; padding-top: 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-what mt-5">
                            <h2 class="text-center">
                                <?php echo $pageName;?>
                                <div class="animationLinetappeo mt-2"></div>
                            </h2>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <div class="col-12 terms-of-use">
                        <?php echo htmlspecialchars_decode($_SESSION['general']['terms']);?>
                    </div>
                </div>
            </div>

        </section>
    </main>
    </main>
    <?php include('inc/footer.php')?>
    <?php include('inc/js.php')?>
</body>

</html>