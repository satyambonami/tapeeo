<?php 
    include_once("../inc/config.php");
    $pageName="Add FAQ";
    $icon="fas fa-list-ol";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }

    // Add Edit Products
    if(isset($_POST['submit'])){
        $question = mysqli_real_escape_string($conn,ak_secure_string($_POST['question']));
        $answer = htmlspecialchars($_POST['answer']);
        
        if(isset($_GET['id'])){
            $id = mysqli_real_escape_string($conn,$_GET['id']);
            $query = mysqli_query($conn,"UPDATE `".$tblPrefix."faqs` SET `question`='$question',`answer`='$answer' WHERE id = $id");
        }else{
            $query = mysqli_query($conn,"INSERT INTO `".$tblPrefix."faqs`(`question`, `answer`, `status`) VALUES ('$question','$answer',2)");
        }
        
        if($query == true){
            $_SESSION['toast']['type']="success";
            $_SESSION['toast']['msg']="FAQ Successfully add";
            header("location:faq.php");
            exit();
        }else{
            $_SESSION['toast']['msg']="Something went wrong, Please try again later";
            header("location:faq.php");
            exit();
        }
    }
    
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        $queryData = mysqli_query($conn,"SELECT `id`,`question`,`answer`,`status` FROM `".$tblPrefix."faqs` WHERE id = $id ");
        if(mysqli_num_rows($queryData) != 0){
            $data = mysqli_fetch_assoc($queryData);
        }else{
            $_SESSION['toast']['msg']="No Data Found !";
            header("location:faq.php");
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
                        <div class="col-lg-8 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="FaqQuestion">FAQ Question</label>
                                                <input type="text" class="form-control" id="FaqQuestion" placeholder="Faq Question" autocomplete="off" required name="question" value
                                                ="<?php if(isset($_GET['id'])){ echo $data['question']; }?>"/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="Mdesc">FAQ Answer</label>
                                                <textarea class="form-control ckeditor" name="answer" autocomplete="off" required>
                                                    <?php if(isset($_GET['id'])){ echo $data['answer']; }?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-cta py-2 px-5" type="submit" name="submit">Save</button>
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
