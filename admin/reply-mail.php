<?php 
    include_once("../inc/config.php");
    $pageName="View/Reply Mail";
    $icon="far fa-envelope";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
    if(isset($_GET['id'])){
        $id=mysqli_real_escape_string($conn,ak_secure_string($_GET['id']));
        $data=mysqli_query($conn,"SELECT * FROM `".$tblPrefix."query` WHERE id='$id'");
        $query=mysqli_fetch_assoc($data);
    }

    if(isset($_POST['reply-query'])){
        $name = mysqli_real_escape_string($conn, ak_secure_string($_POST['name']));
        $email = trim(mysqli_real_escape_string($conn, ak_secure_string($_POST['email'])));
        $subject = mysqli_real_escape_string($conn, ak_secure_string($_POST['subject']));
        $message = htmlspecialchars_decode($_POST['message']);

        $Sendemail = sendMail($email,$subject,$message);

        if ($Sendemail ==true) {
            mysqli_query($conn, "UPDATE `".$tblPrefix."query` SET `subject`='$subject',`message`='$message', `status`=2 WHERE id=$id");
            $_SESSION['toast']['type']="success";
            $_SESSION['toast']['msg']="Email successfully sent to ".$name;
            header('location:contact.php');
            exit();
        }else{
            $_SESSION['toast']['msg']="Something went wrong, Please try again.";
            header('location:contact.php');
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
                    <div class="row ">
                        <div class="col-lg-12 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group col-md-12">
                                            <label for="head">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Name" value="<?php if(isset($_GET['id'])){echo $query['name'];}?>" name="name" autocomplete="off" required="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="head">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email" value="<?php if(isset($_GET['id'])){echo $query['email'];}?>" name="email" autocomplete="off" required="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="head">Message</label>
                                             <textarea class="form-control" >
                                                <?php if(isset($_GET['id'])){echo htmlspecialchars_decode($query['msg']);}?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="head">Email Subject</label>
                                            <input type="text" class="form-control" id="subject" placeholder="Subject" value="<?php if(isset($_GET['id'])){echo $query['subject'];}?>" name="subject" autocomplete="off" required="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="head">Reply Message</label>
                                             <textarea id="editor" class="form-control" name="message">
                                                <?php if(isset($_GET['id'])){echo $query['message'];}?>
                                                </textarea>
                                        </div>
                                        <div class="form-row pt-3">
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success m-auto" name="reply-query">Send Email</button>
                                            </div>
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