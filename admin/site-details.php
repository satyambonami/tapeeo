<?php 
    include_once("../inc/config.php");
    $pageName="General Details";
	$icon="fas fa-info-circle";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
    //update logo
if(isset($_POST['sub-logo'])){
	$tmpName = $_FILES['logo']['tmp_name'];
	if(file_exists($tmpName)){
		$fileName = $_FILES['logo']['name'];
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
			$fileName = 'logo.'.$ext;
			if(move_uploaded_file($tmpName, '../img/'.$fileName)==true){
				mysqli_query($conn, "UPDATE `".$tblPrefix."general` set key_value = '$fileName' WHERE id = 1");
				$_SESSION['general']['logo']=$fileName;
                $_SESSION['toast']['type']="success";
				$_SESSION['toast']['msg']="Logo successfully updated.";
                header('Refresh:0');
                exit();
			}else{
                $_SESSION['toast']['type']="warning";
				$_SESSION['toast']['msg']="Something went wrong, Please try again.";
                header('Refresh:0');
                exit();
			}
		}else{
                $_SESSION['toast']['type']="error";
				$_SESSION['toast']['msg']="Upload only image format(jpg,jpeg,png).";
                header('Refresh:0');
                exit();
			}
	}
}

//update favicon...
if(isset($_POST['sub-favicon'])){
	$tmpName = $_FILES['favicon']['tmp_name'];
	if(file_exists($tmpName)){
		$fileName = $_FILES['favicon']['name'];
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
			$fileName = 'favicon.'.$ext;
			if(move_uploaded_file($tmpName, '../img/'.$fileName)==true){
				mysqli_query($conn, "UPDATE `".$tblPrefix."general` SET key_value = '$fileName' WHERE id =2 ");
				$_SESSION['general']['favicon']=$fileName;
                $_SESSION['toast']['type']="success";
				$_SESSION['toast']['msg']="Favicon successfully updated.";
                header('Refresh:0');
                exit();
			}else{
                $_SESSION['toast']['type']="warning";
				$_SESSION['toast']['msg']="Something went wrong, Please try again.";
                header('Refresh:0');
                exit();
			}
		}else{
                $_SESSION['toast']['type']="error";
				$_SESSION['toast']['msg']="Upload only image format(jpg,jpeg,png).";
                header('Refresh:0');
                exit();
			}
	}
}
// general detail
	if(isset($_POST['submit_general'])){	
        $facebook=mysqli_real_escape_string($conn,ak_secure_string($_POST['facebook']));
        $instagram=mysqli_real_escape_string($conn,ak_secure_string($_POST['instagram']));
        $youtube=mysqli_real_escape_string($conn,ak_secure_string($_POST['youtube']));
        $tiktok=mysqli_real_escape_string($conn,ak_secure_string($_POST['tiktok']));
		$site=mysqli_real_escape_string($conn,ak_secure_string($_POST['site']));
		$contact=mysqli_real_escape_string($conn,ak_secure_string($_POST['contact']));
		$email=mysqli_real_escape_string($conn,ak_secure_string($_POST['email']));
		$mailer=mysqli_real_escape_string($conn,ak_secure_string($_POST['mailer']));
		$address=mysqli_real_escape_string($conn,ak_secure_string($_POST['address']));
        $tax=mysqli_real_escape_string($conn,ak_secure_string($_POST['tax']));
        $shipping=mysqli_real_escape_string($conn,ak_secure_string($_POST['shipping_charge']));
		$socialArr = array('facebook'=> $facebook,'youtube'=> $youtube,'instagram'=> $instagram,'tiktok'=> $tiktok,'website_name'=> $site, 'phone_number'=> $contact, 'email' => $email,'mailer_email' => $mailer, 'address' => $address, 'tax'=> $tax, 'shipping_charge'=> $shipping);

		$actionQ = "";
		foreach($socialArr as $key => $value){
			$actionQ .= "UPDATE `".$tblPrefix."general` SET key_value = '$value' WHERE key_name = '$key'; ";
			$_SESSION['general'][$key] = $value;
		}

		if(mysqli_multi_query($conn, $actionQ)==true){
			$_SESSION['toast']['type']= 'success';
			$_SESSION['toast']['msg']= 'Data successfully updated.';
            header('Refresh:0');
            exit();
            
		}else{
			$_SESSION['toast']['type']= 'error';
			$_SESSION['toast']['msg'] = 'Something went wrong, Please try again.';
            header('Refresh:0');
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
                                <ul class="nav nav-tabs tab-line" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#line-home" role="tab" aria-controls="home" aria-selected="true">Logo/Favicon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link show" id="profile-tab2" data-toggle="tab" href="#line-profile" role="tab" aria-controls="profile" aria-selected="false">General Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="home-tab">
                                        <form method="POST" enctype="multipart/form-data">
                                            <h3 class="text-center">Logo/Favicon</h3>
                                            <div class="form-row mb-3">
                                            	<img src="../img/<?php echo $_SESSION['general']['logo'];?>" class="img-circle img-responsive m-auto mx-2" alt="Logo" height="100px;">
	                                            <div class="custom-file">
			                                        <input type="file" class="custom-file-input" id="inputlogo01" name="logo">
			                                        <label class="custom-file-label" for="inputlogo01">Logo</label>
			                                    </div>
			                                </div>
			                                <div class="form-row mb-4">
	                                            <button type="submit" class="btn btn-success btn-cta py-2 px-5" name="sub-logo">Save</button>
	                                        </div>
			                            </form>
			                            <form method="POST" enctype="multipart/form-data">
			                                <div class="form-row mb-5">
			                                	<img src="../img/<?php echo $_SESSION['general']['favicon'];?>" class="img-circle img-responsive m-auto mx-2" alt="Favicon" height="100px;">
			                                    <div class="custom-file">
			                                        <input type="file" class="custom-file-input" id="inputllogo02" name="favicon">
			                                        <label class="custom-file-label" for="inputllogo02">Favicon</label>
			                                    </div>
			                                </div>
			                                <div class="form-row mb-4">
	                                            <button type="submit" class="btn btn-success btn-cta py-2 px-5" name="sub-favicon">Save</button>
	                                        </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="line-profile" role="tabpanel" aria-labelledby="profile-tab">
                                         <form method="POST" enctype="multipart/form-data">
                                            <h3 class="text-center">General Details</h3>
                                            <div class="form-row">
                                            	<div class="form-group col-lg-12">
				                                    <label for="sitename">Site Name</label>
				                                    <input type="type" class="form-control" id="sitename" placeholder="Site Name"  name="site" value="<?php echo $_SESSION['general']['website_name'];?>">
				                                </div>
				                                <div class="form-group col-md-6">
				                                    <label for="contactinput">Contact Number</label>
				                                    <input type="type" class="form-control" id="contactinput" placeholder="Number" name="contact" value="<?php echo $_SESSION['general']['phone_number'];?>">
				                                </div>
				                                <div class="form-group col-md-6">
				                                    <label for="inputemail">Email</label>
				                                    <input type="email" class="form-control" id="inputemail" placeholder="Email" name="email" value="<?php echo $_SESSION['general']['email'];?>">
				                                </div>
				                                <div class="form-group col-md-6">
				                                    <label for="mailerinout">Mailer Mail</label>
				                                    <input type="email" class="form-control" id="mailerinout" placeholder="Mailer Mail" name="mailer" value="<?php echo $_SESSION['general']['mailer_email'];?>">
				                                </div>
				                                <div class="form-group col-md-6">
				                                    <label for="addinput">Address</label>
				                                    <input type="type" class="form-control" id="addinput" placeholder="Address" name="address" value="<?php echo $_SESSION['general']['address'];?>">
				                                </div>
                                                <div class="form-group col-md-6">
				                                    <label for="addinput">Product Tax (in %)</label>
				                                    <input type="type" class="form-control" id="addinput" placeholder="tax" name="tax" value="<?php echo $_SESSION['general']['tax'];?>">
				                                </div>
                                                <div class="form-group col-md-6">
				                                    <label for="addinput">Shipping Charges (in $)</label>
				                                    <input type="type" class="form-control" id="addinput" placeholder="Shipping Charges" name="shipping_charge" value="<?php echo $_SESSION['general']['shipping_charge'];?>">
				                                </div>
                                                <div class="form-group col-md-6">
				                                    <label for="addinput">Facebook Account Link</label>
				                                    <input type="type" class="form-control" id="addinput" placeholder="facebook" name="facebook" value="<?php echo $_SESSION['general']['facebook'];?>">
				                                </div>
                                                <div class="form-group col-md-6">
				                                    <label for="addinput">Youtube Account Link</label>
				                                    <input type="type" class="form-control" id="addinput" placeholder="Youtube" name="youtube" value="<?php echo $_SESSION['general']['youtube'];?>">
				                                </div>
                                                <div class="form-group col-md-6">
				                                    <label for="addinput">Instagram Account Link</label>
				                                    <input type="type" class="form-control" id="addinput" placeholder="Instagram" name="instagram" value="<?php echo $_SESSION['general']['instagram'];?>">
				                                </div>
                                                <div class="form-group col-md-6">
				                                    <label for="addinput">TikTok Accout Link</label>
				                                    <input type="type" class="form-control" id="addinput" placeholder="TikTok" name="tiktok" value="<?php echo $_SESSION['general']['tiktok'];?>">
				                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-cta py-2 px-5" name="submit_general">Save</button>
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

</body>
    <?php include_once('inc/js.php');?>
</html>