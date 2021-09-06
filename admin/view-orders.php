<?php 
    include_once("../inc/config.php");
    $pageName="Order Details";
    $icon = "far fa-envelope"; 
    
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

// Product Details
if(isset($_GET['id'])){
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$dataQ = mysqli_query($conn, "SELECT ord.*, u.name as u_name, u.email as u_email, u.phone as u_phone, u.city as u_city, u.state as u_state, u.address as u_address, u.pincode as u_pincode, ud.id as addressId, ud.type, ud.name as addName, ud.email as addEmail, ud.phone as addPhone, ud.country as addCountry, ud.state as addState, ud.city as addCity, ud.pincode as addPincode, ud.address as addAddress FROM `".$tblPrefix."orders` ord LEFT JOIN `".$tblPrefix."users` u ON u.id=ord.user_id LEFT JOIN `".$tblPrefix."user_address` ud ON ord.address_id = ud.id  WHERE ord.status!=0 AND ord.id=$id");
	$data = mysqli_fetch_assoc($dataQ);
	$priceArr = explode(',', $data['prod_prices']);
	$quantityArr = explode(',', $data['prod_quantity']);
	$prodIdArr = explode(',', $data['prod_id']);
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
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <span>
                                                Order Id : 
                                            </span>
                                            TAPEEO<?php echo $data['id'];?>
                                        </div>
                                        <div class="col-6">
                                            <span>
                                                Booking Time : 
                                            </span>
                                            <?php echo date("d/M/Y",strtotime($data['date_time']));?>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <span>
                                                Delivery Address : 
                                            </span>
                                            <?php echo $data['addName'];?>, <?php echo $data['addEmail'];?>, <?php echo $data['addPhone'];?>, 
                                            <?php echo $data['addAddress'];?>, <?php echo city($data['addCity']);?>, <?php echo state($data['addState']);?>, <?php echo country($data['addCountry']);?>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-2">
                                            <span>Delivery Status :</span>
                                        </div>
                                        <div class="col-6">
                                            <form method="POST">
                                                 <!-- 0=deleted, 1= cancelled, 2=processing, 3= packaging, 4=out for delivery, 5=delivered -->
                                                <select class="order-status form-control" data-order-id="<?php echo $data['id'];?>">
                                                    <option value="" selected="" disabled="">Change Status</option>
                                                    <option value="1" <?php if($data['status']==1){ echo ' selected';} ?>>Cancelled</option>
                                                    <option value="2" <?php if($data['status']==2){ echo ' selected';} ?>>Processing</option>
                                                    <option value="3" <?php if($data['status']==3){ echo ' selected';} ?>>Packaging</option>
                                                    <option value="4" <?php if($data['status']==4){ echo ' selected';} ?>>Out For Delivery</option>
                                                    <option value="5" <?php if($data['status']==5){ echo ' selected';} ?>>Delivered</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                                <?php
                                                $i=0;
                                                $subTotal =0;
                                                foreach ($prodIdArr as $idKey => $idVal) {
                                                    $i++;
                                                    $prodTotal = $quantityArr[$idKey]*$priceArr[$idKey];
                                                    $subTotal +=$prodTotal;

                                                    $prodQ = mysqli_query($conn, "SELECT name, image FROM `".$tblPrefix."products` WHERE pid=$idVal");
                                                    $prodData = mysqli_fetch_assoc($prodQ);
                                                ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><img src="../img/products/<?php echo explode(',',$prodData['image'])[0];?>" style="height: 75px; width: 75px;"></td>
                                                    <td><?php echo $prodData['name'];?></td>
                                                    <td><?php echo $quantityArr[$idKey];?></td>
                                                    <td>$<?php echo $priceArr[$idKey];?></td>
                                                    <td>$<?php echo $prodTotal;?></td>
                                                </tr>
                                            <?php }?>
                                            <tfoot>
                                                <tr style="border-top:1px solid #ccc;">
                                                    <th colspan="4"></th>
                                                    <th><b>Sub-Total : </b></th>
                                                    <th>$<?php echo $subTotal;?></th>
                                                </tr>
                                                <tr style="border-top:1px solid #ccc;">
                                                    <th colspan="4"></th>
                                                    <th><b>Tax : </b></th>
                                                    <th>$<?php echo $data['tax'];?></th>
                                                </tr>
                                                <tr style="border-top:1px solid #ccc;">
                                                    <th colspan="4"></th>
                                                    <th><b>Shipping : </b></th>
                                                    <th>$<?php echo $data['shipping'];?></th>
                                                </tr>
                                                <tr style="border-top:1px solid #ccc; font-weight: 900; font-size: 18px;">
                                                    <th colspan="4"></th>
                                                    <th><b>Grand Total : </b></th>
                                                    <th>$<?php echo $data['total_amount'];?></th>
                                                </tr>
                                            </tfoot>
                                            </table>
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