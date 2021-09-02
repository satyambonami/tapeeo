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
        $Mtitle =  mysqli_real_escape_string($conn,ak_secure_string($_POST['Mtitle']));
        $Mkeyword = mysqli_real_escape_string($conn,ak_secure_string($_POST['Mkeyword']));
        $Mdesc = htmlspecialchars($_POST['Mdesc']);
        $PshortDesc = mysqli_real_escape_string($conn,ak_secure_string($_POST['PshortDesc']));;
        $Pdesc = htmlspecialchars($_POST['Pdesc']);
        $Pwarranty = htmlspecialchars($_POST['Pwarranty']);
        $offerPrice = $price - (($price*$discount)/100);
        
        if(isset($_GET['id'])){
            $id = mysqli_real_escape_string($conn,$_GET['id']);
            $query = mysqli_query($conn,"UPDATE `".$tblPrefix."products` SET `name`='$Pname',`slug`='$Pslug',`fulldesc`='$Pdesc',`description`='$PshortDesc',`quantity`='$Pqnty',`price`='$price',`discount`='$discount',`offer_price`='$offerPrice',`meta_title`='$Mtitle',`meta_desc`='$Mdesc',`meta_keywords`='$Mkeyword',`warranty`='$Pwarranty' WHERE `pid` = '$id' ");
        }else{
            $query = mysqli_query($conn,"INSERT INTO `".$tblPrefix."products`(`name`, `slug`, `fulldesc`, `description`, `quantity`, `price`, `discount`, `offer_price`, `meta_title`, `meta_desc`, `meta_keywords`, `warranty`, `date_time`, `status`) VALUES ('$Pname','$Pslug','$Pdesc','$PshortDesc','$Pqnty','$price','$discount','$offerPrice','$Mtitle','$Mdesc','$Mkeyword','$Pwarranty','$cTime',2)");
            $id = mysqli_insert_id($conn);
        }

        if($query == true){
            $tmpName = $_FILES['Pimage']['tmp_name'];
            if(file_exists($tmpName)){
                $fileName = $_FILES['Pimage']['name'];
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
                    $fileName = rand(1111,9999).".".$ext;
                    if(move_uploaded_file($tmpName, '../img/products/'.$fileName)==true){
                        $image="UPDATE `".$tblPrefix."products` SET image='$fileName' WHERE pid='$id'";
                        if(mysqli_query($conn,$image)==true){
                            $_SESSION['toast']['type']="success";
                            $_SESSION['toast']['msg']="Successfully updated.";
                            header('location:add-product.php?id='.$id.'');
                            exit();
                        }
                    }else{
                        $_SESSION['toast']['msg']="Something went wrong, Please try again.";
                        header('location:add-product.php?id='.$id.'');
                        exit();
                    }
                }else{
                        $_SESSION['toast']['msg']="Upload only image format(jpg,jpeg,png).";
                        header('location:add-product.php?id='.$id.'');
                        exit();
                    }
            }
        $_SESSION['toast']['type']="success";
        $_SESSION['toast']['msg']="Successfully updated.";
        header('location:add-product.php?id='.$id.'');
        exit();
        }else{
            $_SESSION['toast']['type']="warning";
            $_SESSION['toast']['msg']="Something went wrong, Please try again later.";
            header('refresh:0');
            exit();
        }
    }
    
    if(isset($_GET['id'])){
        $pid = mysqli_real_escape_string($conn,$_GET['id']);
        $queryData = mysqli_query($conn,"SELECT `pid`, `name`, `slug`, `fulldesc`, `description`, `quantity`, `image`, `price`, `discount`, `offer_price`, `meta_title`, `meta_desc`, `meta_keywords`, `warranty`, `date_time`, `status` FROM `".$tblPrefix."products` WHERE pid = $pid ");
        if(mysqli_num_rows($queryData) != 0){
            $data = mysqli_fetch_assoc($queryData);
        }else{
            $_SESSION['toast']['msg']="No Data Found !";
            header("location:product.php");
            exit();
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
                        <div class="col-lg<?php if(isset($_GET['id'])){echo'-8';}else{echo'-12';}?> mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="ProductName">Product Name</label>
                                                <input type="text" class="form-control" id="ProductName" placeholder="Product Name" autocomplete="off" required name="pName" value
                                                ="<?php if(isset($_GET['id'])){ echo $data['name']; }?>"/>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="ProductSlug">Product Slug</label>
                                                <input type="text" class="form-control" id="ProductSlug" placeholder="Product Slug" autocomplete="off" required name="pSlug" value
                                                ="<?php if(isset($_GET['id'])){ echo $data['slug']; }?>"/>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="Quantity">Product Quantity</label>
                                                <input type="text" class="form-control" id="Quantity" placeholder="Product Quantity" autocomplete="off" required name="pQnty" value 
                                                ="<?php if(isset($_GET['id'])){ echo $data['quantity']; }?>"/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="Rprice">Product Price</label>
                                                <div class="input-group mb-3 pl-0 col-12">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="Rprice" placeholder="Product Price" aria-label="Amount (to the nearest dollar)" name="Pprice"  autocomplete="off" required value ="<?php if(isset($_GET['id'])){ echo $data['price']; }?>" />
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="Quantity">Product Discount (in %)</label>
                                                <input type="text" class="form-control" id="Quantity" placeholder="Product Discount" autocomplete="off" required name="Pdiscount" value
                                                ="<?php if(isset($_GET['id'])){ echo $data['discount']; }?>" />
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="Mtitle">Product Meta Title</label>
                                                <input type="text" class="form-control" id="Mtitle" placeholder="Product Meta Title" autocomplete="off" required name="Mtitle" value
                                                ="<?php if(isset($_GET['id'])){ echo $data['meta_title']; }?>" />
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="Mkeyword">Product Meta Keyword <small>(Seprate Keywords Using Comma)</small> </label>
                                                <input type="text" class="form-control" id="Mkeyword" placeholder="Product Meta KeyWords" autocomplete="off" required name="Mkeyword" value
                                                ="<?php if(isset($_GET['id'])){ echo $data['meta_keywords']; }?>" />
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="Mdesc">Product Meta Description</label>
                                                <input type="text" class="form-control" id="Mdesc" placeholder="Product Meta KeyWords" autocomplete="off" required name="Mdesc" value
                                                ="<?php if(isset($_GET['id'])){ echo $data['meta_desc']; }?>" />
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
                                                    <textarea class="form-control" id="PshortDesc" placeholder="Product Short Description" name="PshortDesc" autocomplete="off" required>
                                                    <?php if(isset($_GET['id'])){ echo $data['description']; }?>
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="Mdesc">Product Description</label>
                                                <textarea class="form-control ckeditor" name="Pdesc" autocomplete="off" required>
                                                    <?php if(isset($_GET['id'])){ echo htmlspecialchars_decode($data['fulldesc']); }?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="Mdesc">Product Warranty</label>
                                                <textarea class="form-control ckeditor" name="Pwarranty" autocomplete="off" required>
                                                    <?php if(isset($_GET['id'])){ echo htmlspecialchars_decode($data['warranty']); }?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-cta py-2 px-5" type="submit" name="productSubmit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($_GET['id'])){ ?>
                        <div class="col-lg-4 mx-auto mt-2">
                             <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <img src="../img/products/<?php echo $data['image'];?>" alt="<?php echo $data['name']?>">
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </section>
        </section>
    </main>

</body>
    <?php include_once('inc/js.php');?>
</html>
