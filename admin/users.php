<?php 
    include_once("../inc/config.php");
    $pageName="Products";
    $icon = ""; 
    
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Country</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 0;
                                                    $dataUser = mysqli_query($conn,"SELECT * FROM `".$tblPrefix."users` WHERE status=2 AND type=0");
                                                    while($users = mysqli_fetch_assoc($dataUser)){
                                                        $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><img src="../img/users/<?php echo $users['img'];?>" alt="<?php echo $users['name'];?>" style="height:80px;"></td>
                                                    <td><?php echo $users['name'];?></td>
                                                    <td><?php echo $users['email'];?></td>
                                                    <td><?php echo $users['phone'];?></td>
                                                    <td><?php echo country($users['country']);?></td>
                                                    <td>
                                                        <a href="view-user.php?id=<?php echo $users['id'];?>" class="btn btn-primary">
                                                            <i class="mdi mdi-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                            <th>Id</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Country</th>
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
    </main>
</body>
    <?php include_once('inc/js.php');?>
</html>