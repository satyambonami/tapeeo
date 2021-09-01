<?php 
    include_once("../inc/config.php");
    $pageName="Dashboard ";
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php require_once("inc/css.php");?>
    <title><?php echo $pageName ." | ". SITE_NAME?></title>
</head>
<body class="sidebar-pinned">
    <?php include_once("inc/sidebar.php");?>
    <main class="admin-main">
        <?php include_once("inc/nav.php");?>
        <section class="admin-content ">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bg-dark bg-dots m-b-30">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-12 pt-3 text-center">
                                        <h1 class="text-white"><span class="js-greeting">Good </span>, <?php echo ucfirst($_SESSION['adi']['name']);?>!</h1></div>
                                </div>
                                <div class="row py-3 justify-content-center">
                                    <div class="col-lg-3 text-center">
                                        <div class="d-block pb-2">
                                            <div class="avatar avatar-lg">
                                                <div class=" avatar-title rounded-circle"> <i class="mdi mdi-account-multiple"></i></div>
                                            </div>
                                        </div>
                                        <h1 class=" m-0 text-white">
                                            12345
                                        </h1>
                                        <p class="text-white opacity-75 text-overline">Total Subscribers</p>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <div class="d-block pb-2">
                                            <div class="avatar avatar-lg">
                                                <div class=" avatar-title rounded-circle bg-soft-warning"> <i class="mdi mdi-clipboard-check"></i></div>
                                            </div>
                                        </div>
                                        <h1 class=" m-0 text-white">
                                        12345
                                        </h1>
                                        <p class="text-white opacity-75 text-overline ">Total Queries</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php require_once("inc/js.php");?>
</body>
</html>