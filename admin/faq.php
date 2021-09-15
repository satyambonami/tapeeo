<?php 
    include_once("../inc/config.php");
    $pageName="FAQ's";
    $icon = "fas fa-list-ol";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
    // Delete Query
    if(isset($_GET['delete-row'])){
        $id = mysqli_real_escape_string($conn, ak_secure_string($_GET['delete-row']));
        $dataQ = mysqli_query($conn, "UPDATE `".$tblPrefix."faqs` SET `status` = 0 WHERE `pid`=$id"); 
        if($dataQ==true){
            $_SESSION['toast']['msg']="Succesfully Deleted";
            header("location:product.php");
            exit();
        }else{
            $_SESSION['toast']['msg']="Something Went Wrong";
        }
    }
    // Change Status
    if(isset($_POST['id']) && isset($_POST['status'])){
        echo $id=mysqli_real_escape_string($conn,$_POST['id']);
        $status=mysqli_real_escape_string($conn,$_POST['status']);
        
        mysqli_query($conn,"UPDATE `".$tblPrefix."faqs` SET `status`=$status WHERE id=$id");
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
                                <div class="card-body">
                                    <div class="table-responsive p-t-10">
                                        <table id="example" class="table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i =0;
                                                    $faqData = mysqli_query($conn,"SELECT `id`,`question`,`answer`,`status` FROM `".$tblPrefix."faqs` WHERE status != 0"); 
                                                    while($faq = mysqli_fetch_assoc($faqData)){
                                                        $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td>
                                                        <?php echo substr($faq['question'],0,120); ?>...
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars_decode(substr($faq['answer'],0,180));?>...
                                                    </td>
                                                    <td>
                                                        <span class="ml-5">
                                                            <label class="cstm-switch">
                                                                <input type="checkbox" data-this-id="<?php echo $faq['id'];?>" <?php if($faq['status']==2){ echo 'checked';}?>  name="option" class="cstm-switch-input change-status">
                                                                <span class="cstm-switch-indicator"></span>
                                                            </label>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="add-faq.php?id=<?php echo $faq['id'];?>" class="btn btn-primary">
                                                            <i class="mdi mdi-grease-pencil"></i>
                                                        </a>
                                                        
                                                        <a href="#" class="btn btn-danger delete-row" data-this-id="<?php echo $faq['id'];?>">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Question</th>
                                                <th>Answer</th>
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
        <a href="add-faq.php" class="btn-floating btn btn-primary" id="Add Section" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add">
    <i class="mdi mdi-plus"></i>
</a>
    </main>
</body>
    <?php include_once('inc/js.php');?>
</html>