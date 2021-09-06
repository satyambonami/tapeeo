<?php 
    include_once("../inc/config.php");
    $pageName="User Profile";
    $icon = "fas fa-user";

    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
$userId=$_SESSION['adi']['id'];
// Profile
    if(isset($_POST['submit_profile'])){
        $name=mysqli_real_escape_string($conn,ak_secure_string($_POST['name']));

        $action=mysqli_query($conn,"UPDATE `".$tblPrefix."users` SET `name`='$name' WHERE `id`='$userId'");

        if($action == true){
            $_SESSION['toast']['type']="success";
            $_SESSION['toast']['msg']="Profile Successfully Updated.";
            $_SESSION['adi']['name']=$name;

            $tmpName = $_FILES['profile_img']['tmp_name'];
            if(file_exists($tmpName)){
                $fileName = $_FILES['profile_img']['name'];
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
                    $fileName = 'user-'.$userId.'.'.$ext;
                    if(move_uploaded_file($tmpName, '../assets/img/users/'.$fileName)==true){
                        mysqli_query($conn, "UPDATE `".$tblPrefix."users` SET `img`='$fileName' WHERE id=$userId");
                        $_SESSION['adi']['img']=$fileName;
                        $_SESSION['toast']['type']="success";
                        $_SESSION['toast']['msg']="Profile Image Successfully Updated.";
                    }else{
                         $_SESSION['toast']['type']="error";
                        $_SESSION['toast']['msg']="Something went wrong, Please try again.";
                    }
                }else{
                    $_SESSION['toast']['type']="warning";
                    $_SESSION['toast']['msg']="Upload only image format(jpg, jpeg, png).";
                }
            }
        }else{
             $_SESSION['toast']['type']="error";
             $_SESSION['toast']['msg']="Something went wrong.";
        }
    }

    // Socila Media
    if(isset($_POST['submit-social'])){
        $facebook=mysqli_real_escape_string($conn,ak_secure_string($_POST['facebook']));
        $instagram=mysqli_real_escape_string($conn,ak_secure_string($_POST['instagram']));
        $twitter=mysqli_real_escape_string($conn,ak_secure_string($_POST['twitter']));
        $linkedin=mysqli_real_escape_string($conn,ak_secure_string($_POST['linkedin']));

       $socialArr = array('facebook'=> $facebook, 'linkedin'=> $linkedin, 'twitter' => $twitter,'instagram' => $instagram);

        $actionQ = "";
        foreach($socialArr as $key => $value){
            $actionQ .= "UPDATE `".$tblPrefix."general` SET key_value = '$value' WHERE key_name = '$key'; ";
            $_SESSION['general'][$key] = $value;
        }

        if(mysqli_multi_query($conn, $actionQ)==true){
            $_SESSION['toast']['msg']= 'Data successfully updated.';
        }else{
            $_SESSION['toast']['msg'] = 'Something went wrong, Please try again.';
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
    <?php include_once("inc/nav.php");?>
    <section class="admin-content ">
        <?php include_once("inc/breadcrum.php");?>
        <section class="pull-up">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 mx-auto mt-2">
                        <div class="card py-3 m-b-30">
                            <div class="card-body">
                                <ul class="nav nav-tabs tab-line" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#line-home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="home-tab">
                                        <form method="POST" enctype="multipart/form-data">
                                            <h3 class="text-center">Personal Data</h3>
                                            <p class="text-muted text-center"> Use this page to update your contact information...</p>
                                            <div class="text-center">
                                                <label class="avatar-input"> 
                                                    <span class="avatar avatar-xl"> 
                                                        <img src="assets/img/users/<?php echo $_SESSION['adi']['img'];?>" alt="<?php echo $_SESSION['adi']['name'];?>" class="avatar-img rounded-circle"> 
                                                        <span class="avatar-input-icon rounded-circle"> 
                                                            <i class="mdi mdi-upload mdi-24px"></i> 
                                                        </span> 
                                                    </span>
                                                    <input type="file" class="avatar-file-picker" name="profile_img">
                                                </label>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail6">Name</label>
                                                    <input type="text" value="<?php echo $_SESSION['adi']['name'];?>" class="form-control" id="inputEmail6" placeholder="Name" name="name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo $_SESSION['adi']['email'];?>" disabled>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-cta" name="submit_profile">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>
    <?php include_once("inc/js.php");?>
</body>
</html>