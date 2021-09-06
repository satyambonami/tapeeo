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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-9 col-xxl-9">
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
                                                            <div id="img-preview"><img src="../img/users/<?php echo $_SESSION['user']['img'];?>" alt="" class="inputuserimage"
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
                                                <input type="number" class="form-control" placeholder="Contact" value="<?php echo $_SESSION['user']['phone'];?>"  name="phone" autocomplete="off" required >

                                                <input type="email" class="form-control" placeholder="example@gmail.com" disabled value="<?php echo $_SESSION['user']['email'];?>">
                                                <input type="text" class="form-control"
                                                    placeholder="Street , House , Locality" value="<?php echo $address['address'];?>"  name="address" autocomplete="off" required >

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select country" aria-label="Default select example" name="country" >
                                                            <option selected disabled value="0">Select Country</option>
                                                                <?php
                                                                    $DataCountry = mysqli_query($conn,"SELECT `id`, `name` FROM `countries`"); 
                                                                    while($country = mysqli_fetch_assoc($DataCountry)){
                                                                ?>
                                                                <option value="<?php echo $country['id'];?>" <?php if($country['id'] == $address['country']){echo 'selected';} ?>><?php echo $country['name'];?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select state" id="state" aria-label="Default select example" name="state" >
                                                                <option selected disabled value="0">Select State</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group border-0">
                                                            <select class="form-select" id="city" aria-label="Default select example" name="city" >
                                                                <option selected disabled value="0">Select City</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" placeholder="Postal Code" value="<?php echo $address['pincode'];?>"  name="pincode" autocomplete="off" required >
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-6 mt-3">
                                                        <a href="" class="heading-color ps-2">Clear Form Data</a>
                                                    </div>
                                                    <div class="col-6">
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
                                                <input type="text" class="form-control" placeholder="Current Password">

                                                <input type="email" class="form-control" placeholder="New Password">

                                                <input type="text" class="form-control" placeholder="Confirm Password">

                                                <div
                                                    class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-end text-xxl-end">
                                                    <a href="" class="btn btn-gradient">Save Password</a>

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
    <script type="text/javascript">
$('.country').on('change', function(){
	var state = $(this).val();
	$.ajax({
		url : '../inc/ajax-state.php',
		type : 'post',
		data : { state : state},

		success: function(response){
			$('#state').html(response);
			console.log(response);

		},
		error: function(response){
			console.log(response);
		}
	});
});
</script>
<script type="text/javascript">
$('.state').on('change', function(){
	var city = $(this).val();
	$.ajax({
		url : '../inc/ajax-city.php',
		type : 'post',
		data : { city : city},

		success: function(response){
			$('#city').html(response);
			console.log(response);

		},
		error: function(response){
			console.log(response);
		}
	});
});
</script>
</body>

</html>