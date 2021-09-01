<?php 
    include_once("../inc/config.php");
    $pageName="Add Product";
    $icon="";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php include_once('inc/css.php');?>
    <title><?php echo $pageName ." | ". SITE_NAME?></title>
</head>
<body class="sidebar-pinned ">
    <?php include_once('inc/sidebar.php');?>
    <main class="admin-main">
        <?php include_once('inc/nav.php');?>
        <section class="admin-content ">
            <?php include_once("inc/breadcrum.php");?>
            <section class="pull-up">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                            <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="ProductName">Product Name</label>
                                    <input type="text" class="form-control" id="ProductName" placeholder="Product Name" autocomplete="off" required name="pName">
                                </div>
                                <div class="form-group col-6">
                                    <label for="ProductSlug">Product Slug</label>
                                    <input type="text" class="form-control" id="ProductSlug" placeholder="Product Slug" autocomplete="off" required name="pSlug">
                                </div>
                                <div class="form-group col-6">
                                    <label for="Quantity">Product Quantity</label>
                                    <input type="text" class="form-control" id="Quantity" placeholder="Product Quantity" autocomplete="off" required name="pQnty">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="input-group mb-3 col-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">


                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

</body>
    <?php include_once('inc/js.php');?>
</html>