<?php 
    include_once("../inc/config.php");
    $pageName="Orders";
    $icon = ""; 
    
    if(!isset($_SESSION['adi'])){
        $_SESSION['toast']['msg']="Please, Log-in to continue.";
        header("location:login.php");
        exit();
    }

//change status..
if(isset($_POST['status']) && isset($_POST['order_id'])){
	$orderId = mysqli_real_escape_string($conn, $_POST['order_id']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);

	mysqli_query($conn, "UPDATE `".$tblPrefix."orders` SET status = $status WHERE id=$orderId");
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
                                                <th>Order Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Grand Total</th>
                                                <th>Order On</th>
                                                <th>Status</th>
                                                <th width="15%">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i=0;
                                                $dataQ = mysqli_query($conn, "SELECT ord.id, ord.total_amount, ord.status, ord.date_time, u.name, u.email, u.phone FROM `".$tblPrefix."orders` ord LEFT JOIN `".$tblPrefix."users` u ON u.id=ord.user_id WHERE ord.status!=0 ORDER BY ord.id DESC");
                                                while($data= mysqli_fetch_assoc($dataQ)){
                                                    $i++;
                                            ?>
                                           <tr>
                                                <td><?php echo $i;?></td>
                                                <td>#TAPEEO<?php echo $data['id'];?></td>
                                                <td><?php echo $data['name'];?></td>
                                                <td><?php echo $data['email'];?></td>
                                                <td><?php echo $data['phone'];?></td>
                                                <td>$<?php echo $data['total_amount'];?></td>
                                                <td><?php echo $data['date_time'];?></td>
                                                <td width="120px">
                                                    <div>
                                                        <!-- 0=deleted, 1= cancelled, 2=processing, 3= packaging, 4=out for delivery, 5=delivered -->
                                                        <select class="order-status form-control" data-order-id="<?php echo $data['id'];?>">
                                                            <option value="" selected="" disabled="">Change Status</option>
                                                            <option value="1" <?php if($data['status']==1){ echo ' selected';} ?>>Cancelled</option>
                                                            <option value="2" <?php if($data['status']==2){ echo ' selected';} ?>>Processing</option>
                                                            <option value="3" <?php if($data['status']==3){ echo ' selected';} ?>>Packaging</option>
                                                            <option value="4" <?php if($data['status']==4){ echo ' selected';} ?>>Out For Delivery</option>
                                                            <option value="5" <?php if($data['status']==5){ echo ' selected';} ?>>Delivered</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="../inc/invoice.php?id=<?php echo $data['id'];?>" class="btn btn-primary" data-position="top" data-delay="40" data-tooltip="Download Invoice"><i class="mdi mdi-cloud-download"></i></a>									                                                    								
                                                    <a href="view-orders.php?id=<?php echo $data['id'];?>" data-this-id="" class="btn btn-primary" data-position="top" data-delay="40" data-tooltip="View Order Details"><i class="mdi mdi-eye"></i></a>									
                                                </td>
                                            </tr>
                                            <?php }?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>ORDER ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Grand Total</th>
                                                <th>Order On</th>
                                                <th>Status</th>
                                                <th width="15%">Options</th>
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
<script type="text/javascript">
	$(document).ready(function(){
		$("body").on('change', '.order-status', function(){
			var status = $(this).val(),
				orderId = $(this).data('order-id');
			if(status!="" && status!=null){
				$.ajax({
					url: '',
					type: 'post',
					data:{status: status, order_id: orderId},
					success: function(){
						alertify.warning("Status changed.", 3000);
					},
					error: function(){
						alertify.warning("Something went wrong, Please try again.", 3000);
					}
				});
			}
		});
	});
</script>
</html>