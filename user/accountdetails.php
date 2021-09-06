<?php
include_once("../inc/config.php");
$pageName = "Account Details";
$linkPrefix = "../";
if(!isset($_SESSION['user'])){
    $_SESSION['toast']['msg']="Please login to continue";
    header('location:login.php');
    exit();
}
$userId=$_SESSION['user']['id'];

if(isset($_POST['updateDetails'])){
    $name = mysqli_real_escape_string($conn,ak_secure_string($_POST['name']));
    $phone = mysqli_real_escape_string($conn,ak_secure_string($_POST['phone']));
    $address = mysqli_real_escape_string($conn,ak_secure_string($_POST['address']));
    $coutry = mysqli_real_escape_string($conn,ak_secure_string($_POST['country']));
    $state = mysqli_real_escape_string($conn,ak_secure_string($_POST['state']));
    $city = mysqli_real_escape_string($conn,ak_secure_string($_POST['city']));
    $pincode = mysqli_real_escape_string($conn,ak_secure_string($_POST['pincode']));

    $query="UPDATE `bnmi_users` SET `name`='$name',`phone`='$phone' WHERE id='$userId'";
    $dataQ = mysqli_query($conn,$query);
    if($dataQ == true ){
        $_SESSION['user']['name']=$name;
        $_SESSION['user']['phone']=$phone;
        $tmpName = $_FILES['Pimage']['tmp_name'];
            if(file_exists($tmpName)){
                $fileName = $_FILES['Pimage']['name'];
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
                    $fileName = rand(1111,9999).".".$ext;
                    if(move_uploaded_file($tmpName, '../img/users/'.$fileName)==true){
                        $image="UPDATE `".$tblPrefix."users` SET img='$fileName' WHERE id='$userId'";
                        if(mysqli_query($conn,$image)==true){
                            $_SESSION['user']['img']=$fileName;
                            $_SESSION['toast']['type']="success";
                            $_SESSION['toast']['msg']="Successfully updated.";
                            header('location:accountdetails.php');
                            exit();
                        }
                    }else{
                        $_SESSION['toast']['msg']="Something went wrong, Please try again.";
                        header('location:accountdetails.php');
                        exit();
                    }
                }else{
                        $_SESSION['toast']['msg']="Upload only image format(jpg,jpeg,png).";
                        header('location:accountdetails.php');
                        exit();
                    }
            }
            $_SESSION['toast']['type']="success";
            $_SESSION['toast']['msg']="Successfully updated.";
            header('location:accountdetails.php');
            exit();
    }else{
        $_SESSION['toast']['msg']="Something went wrong, Please try again.";
        header('location:accountdetails.php');
        exit();
    }
}

$dataAddress = mysqli_query($conn,"SELECT * FROM `".$tblPrefix."user_address` WHERE `user_id`='$userId' AND `default`=1 ");
$address = mysqli_fetch_assoc($dataAddress);

// Update Password
if(isset($_POST['change-password'])){
    $oldPass=mysqli_real_escape_string($conn,ak_secure_string($_POST['oldpass']));
    $newPass=mysqli_real_escape_string($conn,ak_secure_string($_POST['newpass']));
    $cnfpass=mysqli_real_escape_string($conn,ak_secure_string($_POST['cnfpass']));
    if($newPass == $cnfpass)
    {
        $pass= hash('sha512',$oldPass.HASH_KEY);
        $checkUser=mysqli_query($conn, "SELECT `id` FROM `".$tblPrefix."users` WHERE `id`=$userId AND `password`='$pass'");
        if(mysqli_fetch_assoc($checkUser)>0){
            $newPassword=hash('sha512',$newPass.HASH_KEY);
                $updateQ="UPDATE `".$tblPrefix."users` SET password='$newPassword' WHERE id=".$userId;
                $update=mysqli_query($conn, $updateQ);
                if($update==true){
                    $_SESSION['toast']['type']='success';
                    $_SESSION['toast']['msg']='Password successfully changed.';
                    header("Refresh:0");
                    exit();
                }else{
                    $_SESSION['toast']['msg']='Something went wrong, Please try again.';
                    header("Refresh:0");
                    exit();
                }
        }else{
        $_SESSION['toast']['msg']="Old password not matched.";
        header("Refresh:0");
        exit();
        }
    }else{
        $_SESSION['toast']['msg']="Password not matched, Please try again later!";
        header("Refresh:0");
        exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../inc/head.php') ?>
    <?php include('inc/user-head.php') ?>
    <link rel="stylesheet" href="../admin/assets/css/alertify.rtl.min.css">
<link rel="stylesheet" href="../admin/assets/css/alertify-default-theme.rtl.min.css">
</head>

<body>
    <?php include('../inc/header.php') ?>
    <?php include('inc/header-user.php') ?>
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <?php include('inc/user-sidenav.php') ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                        <div class="details-div">
                            <!-- Tab Section -->
                            <section class="tab_section section-padding-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div class="text-center line_Div buttonActiv">
                                                <p>Edit Profile</p>
                                                <div class="animationLine mt-2 w-100 tab-content animiLine"></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 col-lg-6 ">
                                            <div class="text-center line_Div buttonOneActiv">
                                                <p>Password</p>
                                                <div class="animationLine mt-2 w-100 tab-content removeLine animiLine">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="container accountdetails section-padding-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="content active_ContentOne ">
                                            <form method="POST" class="mb-4" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center position-relative">
                                                        <div class="text-center mb-3 mx-auto userImg" onclick="open_file()">
                                                            <div id="img-preview"><img src="../img/users/<?php if($_SESSION['user']['img'] == NULL){echo 'user.png';}else{echo $_SESSION['user']['img'];}?>" alt="" class="inputuserimage"
                                                                id="target"></div>
                                                                <input type="file" id="choose-file"
                                                            name="Pimage" hidden/>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="text" class="form-control"
                                                            placeholder="Name" autocomplete="off" name="name" required value="<?php echo $_SESSION['user']['name'];?>">

                                                    </div>
                                                </div>
                                                <input type="number" class="form-control"  placeholder="Contact" value="<?php echo $_SESSION['user']['phone'];?>"  name="phone" autocomplete="off" required >

                                                <input type="email" class="form-control" placeholder="example@gmail.com" disabled value="<?php echo $_SESSION['user']['email'];?>">
                                                <input type="text" class="form-control"
                                                    placeholder="Street , House , Locality" value="<?php if(isset($address)){ echo $address['address'];}?>"  name="address" autocomplete="off" required >

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select country" aria-label="Default select example" name="country" >
                                                                <option selected disabled value="231">United States</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select state" id="state" aria-label="Default select example" name="state" >
                                                            <?php
                                                                $DataState = mysqli_query($conn,"SELECT `id`, `name` FROM `states`"); 
                                                                while($State = mysqli_fetch_assoc($DataState)){
                                                            ?>
                                                            <option value="<?php echo $State['id'];?>" <?php if(isset($address)){ if($State['id'] == $address['state']){echo 'selected';} } ?>><?php echo $State['name'];?></option>
                                                            <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select" id="city" aria-label="Default select example" name="city" >
                                                                <option selected disabled value="0">Select City</option>
                                                                <?php
                                                                    $Datacity = mysqli_query($conn,"SELECT `id`, `name` FROM `cities`"); 
                                                                    while($City = mysqli_fetch_assoc($Datacity)){
                                                                ?>
                                                                <option value="<?php echo $City['id'];?>" <?php if(isset($address)) {if($City['id'] == $address['city']){echo 'selected';}} ?>><?php echo $City['name'];?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" placeholder="Postal Code" value="<?php if(isset($address)){ $address['pincode'];}?>"  name="pincode" autocomplete="off" required >
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-12 text-end mt-3">
                                                        <div class="submit-btn  mt-2 text-end text-sm-end text-md-end text-lg-end text-xxl-end">
                                                            <button type="submit" class="btn btn-gradient px-2 px-sm-2 px-md-3 px-lg-3 px-xxl-3 " name="updateDetails">Update Details
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                        </div>
                                        <div class="content active_ContentTwo hideDiv">
                                            <form method="POST" class="mb-4">
                                                <input type="password" class="form-control" placeholder="Current Password" name="oldpass" required autoocomplete="off">

                                                <input type="password" class="form-control" placeholder="New Password" name="newpass" required autoocomplete="off">

                                                <input type="password" class="form-control" placeholder="Confirm Password" name="cnfpass" required autoocomplete="off">

                                                <div
                                                    class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-end text-xxl-end">
                                                    <button type="submit" class="btn btn-gradient" name="change-password">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- data -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../inc/footer.php') ?>
    <?php include('inc/mobileNav.php') ?>
    <?php include('../inc/js.php') ?>
    <script src = "../admin/assets/js/alertify.min.js"> </script>
    <?php echo toast(1);?>
    <script>
    AOS.init();

    const lineDiv = document.querySelectorAll(".line_Div");
    const buttonActiv = document.querySelector(".buttonActiv");
    const buttonOneActiv = document.querySelector(".buttonOneActiv");

    const active_ContentOne = document.querySelector(".active_ContentOne");
    const active_ContentTwo = document.querySelector(".active_ContentTwo");

    const tab = document.querySelectorAll(".tab-content");
    const animiLine = document.querySelectorAll(".animiLine");


    // tab-content
    function tabContentFunction(e) {
        removeCl();
        // adding the class
        this.classList.add("active_divTab");

        const child = e.currentTarget.children[1];

        child.classList.remove("removeLine");
        child.classList.add("addLine");
    }

    function removeCl() {
        animiLine.forEach((item) => {
            item.classList.add("removeLine");
            item.classList.remove("addLine");
        });
    }


    // avtive_card display
    lineDiv.forEach((item) => {
        item.addEventListener("click", tabContentFunction);
    });

    // hide and show
    buttonActiv.addEventListener("click", function() {
        active_ContentOne.classList.remove("hideDiv");
        active_ContentTwo.classList.add("hideDiv");
    });

    // hide and show
    buttonOneActiv.addEventListener("click", function() {
        active_ContentTwo.classList.remove("hideDiv");
        active_ContentOne.classList.add("hideDiv");
    });

    function open_file() {
        document.getElementById('choose-file').click();
    }
    // select image
    const chooseFile = document.getElementById("choose-file");
    const imgPreview = document.getElementById("img-preview");
    chooseFile.addEventListener("change", function() {
        getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function() {
                imgPreview.style.display = "block";
                imgPreview.innerHTML = '<img src="' + this.result + '" />';
            });
        }
    }
    </script>
</body>

</html>