<?php 
    include_once("../inc/config.php");
    $pageName="Products";
    $icon = ""; 
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
    // Delete Query
    if(isset($_GET['delete-row'])){
        $id = mysqli_real_escape_string($conn, ak_secure_string($_GET['delete-row']));
        $dataQ = mysqli_query($conn, "UPDATE `".$tblPrefix."query` SET `status` = 0 WHERE `id`=$id"); 
        if($dataQ==true){
            $_SESSION['toast']['msg']="Succesfully Deleted";
            header("location:feedback.php");
            exit();
        }else{
            $_SESSION['toast']['msg']="Something Went Wrong";
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
                    <div class="row ">
                        <div class="col-lg-10 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <div class="table-responsive p-t-10">
                                        <table id="example" class="table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Id</td>
                                                    <td>Name</td>
                                                    <td>Quantity</td>
                                                    <td>Price</td>
                                                    <td>Date</td>
                                                    <td>
                                                        <span class="ml-5">
                                                            <label class="cstm-switch">
                                                                <input type="checkbox" data-this-id="<?php echo $dataP['id'];?>" <?php if($dataP['status']==2){ echo 'checked';}?>  name="option" class="cstm-switch-input change-status">
                                                                <span class="cstm-switch-indicator"></span>
                                                            </label>
                                                        </span>
                                                    </td>
                                                    <td>Action</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>   
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <a href="add-product.php" class="btn-floating btn btn-primary" id="Add Section" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add">
    <i class="mdi mdi-plus"></i>
</a>
    </main>
</body>
    <?php include_once('inc/js.php');?>
</html>