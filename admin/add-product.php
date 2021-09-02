<?php 
    include_once("../inc/config.php");
    $pageName="Add Product";
    $icon="";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }

    // Add Edit Products
    if(isset($_POST['productSubmit'])){
        $Pname = mysqli_real_escape_string($conn,ak_secure_string($_POST['pName'])); 
        $Pslug = mysqli_real_escape_string($conn,ak_secure_string($_POST['pSlug'])); 
        $Pqnty = mysqli_real_escape_string($conn,$_POST['pQnty']); 
        $price = mysqli_real_escape_string($conn,$_POST['Pprice']);
        $discount = mysqli_real_escape_string($conn,ak_secure_string($_POST['Pdiscount']));
        $Mtitle =  myslqi_real_escape_string($conn,ak_secure_string($_POST['Mtitle']));
        $Mkeyword = myslqi_real_escape_string($conn,ak_secure_string($_POST['Mkeyword']));
        $Mdesc = htmlspecialchars($_POST['Mdesc']);
        $PshortDesc = myslqi_real_escape_string($conn,ak_secure_string($_POST['PshortDesc']));
        $Pdesc = myslqi_real_escape_string($conn,ak_secure_string($_POST['Pdesc']));
        $Pwarranty = myslqi_real_escape_string($conn,ak_secure_string($_POST['Pwarranty']));
        $offerPrice = $price - (($price*$discount)/100);
        
        if(isset($_GET['id'])){
            $id = myslqi_real_escape_string($conn,$_GET['id']);
            $query = mysqli_query($conn,"UPDATE `".$tblPrefix."products` SET `name`='$Pname',`slug`='$Pslug',`fulldesc`='$Pdesc',`description`='$PshortDesc',`quantity`='$Pqnty',`price`='$price',`discount`='$discount',`offer_price`='$offerPrice',`meta_title`='$Mtitle',`meta_desc`='$Mdesc',`meta_keywords`='$Mkeyword',`warranty`='$Pwarranty' WHERE `pid` = '$id' ");
        }else{
            $query = mysqli_query($conn,"INSERT INTO `".$tblPrefix."products`(`name`, `slug`, `fulldesc`, `description`, `quantity`, `price`, `discount`, `offer_price`, `meta_title`, `meta_desc`, `meta_keywords`, `warranty`, `date_time`, `status`) VALUES ('$Pname','$Pslug','$Pdesc','$PshortDesc','$Pqnty','$price','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]')");
        }
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
                    <div class="row">
                        <div class="col-lg-12 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="ProductName">Product Name</label>
                                                <input type="text" class="form-control" id="ProductName" placeholder="Product Name" autocomplete="off" required name="pName" />
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="ProductSlug">Product Slug</label>
                                                <input type="text" class="form-control" id="ProductSlug" placeholder="Product Slug" autocomplete="off" required name="pSlug" />
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="Quantity">Product Quantity</label>
                                                <input type="text" class="form-control" id="Quantity" placeholder="Product Quantity" autocomplete="off" required name="pQnty" />
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="Rprice">Product Price</label>
                                                <div class="input-group mb-3 pl-0 col-12">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="Rprice" placeholder="Product Price" aria-label="Amount (to the nearest dollar)" name="Pprice"  autocomplete="off" required/>
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="Quantity">Product Discount (in %)</label>
                                                <input type="text" class="form-control" id="Quantity" placeholder="Product Discount" autocomplete="off" required name="Pdiscount" />
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="Mtitle">Product Meta Title</label>
                                                <input type="text" class="form-control" id="Mtitle" placeholder="Product Meta Title" autocomplete="off" required name="Mtitle" />
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="Mkeyword">Product Meta KeyWords (Seprate Keywords Using Comma)</label>
                                                <input type="text" class="form-control" id="Mkeyword" placeholder="Product Meta KeyWords" autocomplete="off" required name="Mkeyword" />
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="Mdesc">Product Meta Description</label>
                                                <input type="text" class="form-control" id="Mdesc" placeholder="Product Meta KeyWords" autocomplete="off" required name="Mdesc" />
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputllogo02" name="Pimage" />
                                                <label class="custom-file-label" for="inputllogo02" required>Product Image</label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="PshortDesc">Product Short Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" id="PshortDesc" placeholder="Product Short Description" name="PshortDesc" autocomplete="off" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="Mdesc">Product Description</label>
                                                <textarea class="form-control ckeditor" name="Pdesc" autocomplete="off" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="Mdesc">Product Warranty</label>
                                                <textarea class="form-control ckeditor" name="Pwarranty" autocomplete="off" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-cta py-2 px-5" type="submit" name="productSubmit">Save</button>
                                        </div>
                                    </form>
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