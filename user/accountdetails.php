<?php
include_once("../inc/config.php");
$pageName = "Account Details";
$linkPrefix = "../";
if(!isset($_SESSION['user'])){
    $_SESSION['toast']['msg']="Please login to continue";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../inc/head.php') ?>
    <?php include('inc/user-head.php') ?>
</head>

<body>
    <?php include('../inc/header.php') ?>
    <?php include('inc/header-user.php') ?>
    <main>
        <section class="section-padding-1">
            <div class="container">
                <div class="row">
                    <?php include('inc/user-sidenav.php') ?>
                    <div class="col-9">
                        <div class="details-div">
                            <!-- Tab Section -->
                            <section class="tab_section section-padding-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="text-center line_Div buttonActiv">
                                                <p>Edit Profile</p>
                                                <div class="animationLine mt-2 w-100 tab-content animiLine"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6 ">
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
                                            <form action="" class="mb-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center position-relative">
                                                        <div class="text-center mb-3  userImg" onclick="open_file()">
                                                            <div id="img-preview"><img src="./img/Ellipse 3.png" alt="" class="inputuserimage"
                                                                id="target"></div>
                                                                <input type="file" id="choose-file"
                                                            name="choose-file" hidden/>
                                                            <!-- <input type="file" name="" id='input_file' hidden> -->
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control"
                                                            placeholder="First Name">

                                                    </div>
                                                    <div class="col-6">

                                                        <input type="text" class="form-control" placeholder="Last Name">

                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Contact">

                                                <input type="email" class="form-control" placeholder="example@gmail.com" disabled>
                                                <input type="text" class="form-control"
                                                    placeholder="Street , House , Locality">

                                                <div class="row">
                                                    <div class="col-6">

                                                        <input type="text" class="form-control" placeholder="City">

                                                    </div>
                                                    <div class="col-6">

                                                        <input type="text" class="form-control"
                                                            placeholder="Postal Code">

                                                    </div>
                                                    <div class="col-6">

                                                        <input type="text" class="form-control" placeholder="State">

                                                    </div>
                                                    <div class="col-6">

                                                        <input type="text" class="form-control" placeholder="Country">

                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-6 mt-3">
                                                        <a href="" class="heading-color ps-2">Clear Form Data</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <div
                                                            class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-end text-xxl-end">
                                                            <a href="" class="btn btn-gradient">Update Details</a>

                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                        </div>
                                        <div class="content active_ContentTwo hideDiv">
                                            <form action="" class="mb-4">
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
    <?php include('../inc/js.php') ?>
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