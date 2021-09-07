<?php 
require_once 'config.php';
require 'dompdf/vendor/autoload.php';

// if(isset($_GET['id'])){
// 	$orderId = mysqli_real_escape_string($conn, $_GET['id']);
// 	if(isset($_GET['id'])){
// 		$id = mysqli_real_escape_string($conn, $_GET['id']);
// 		$dataQ = mysqli_query($conn, "SELECT ord.*, u.name as u_name, u.email as u_email, u.phone as u_phone, u.country as u_country, u.state as u_state, u.city as u_city, u.pincode as u_pincode, u.address as u_address FROM `".$tblPrefix."orders` ord LEFT JOIN `".$tblPrefix."user_address` u ON ord.address_id= u.id  WHERE ord.status!=0 AND ord.id=$orderId");
// 		$data = mysqli_fetch_assoc($dataQ);
// 		$priceArr = explode(',', $data['prod_prices']);
// 		$quantityArr = explode(',', $data['prod_quantity']);
// 		$prodIdArr = explode(',', $data['prod_id']);
//         $city = city($data['u_city']);
//         $state = state($data['u_state']);
//         $country  = country($data['u_country']);
// 	}
// }else{
// 	$_SESSION['toast']['msg'] = "Something went wrong, Please try again.";
// 	header("location:../user/index.php");
// 	exit();
// }

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html=
    '<!DOCTYPE html><html lang="en"><head></head></head><body> <header> <img src="./img/logo.png" class="img" alt=""> </header> <section><table class="heading"><tr><td>INVOICE</td></tr></table><h1>Invoice to:</h1><table class="f-left"><tr><td >Annie Marie</td></tr><tr><td style="font-style: normal;"> 24 Dummy Street Area <br> Location Lorem Ipsum <br> 45412</td></tr></table><table class="f-right"><tr><td>Invoice# <span style="padding-left: 30px;">S75124</span></td></tr><tr><td>Date <span style="padding-left: 30px;">01/05/2021</span></td></tr></table><table style="width:100%; background-color: #EDFCFD;"><tr><th>SL.</th><th>Item Decription</th><th>Price</th><th>Qty. Total</th></tr><tr class="td-padding"><td>1</td><td>Tapeeo Band <small>Lorem ispum</small></td><td>$50.00</td><td>1 <span>$350.00</span></td></tr><tr class="td-padding"><td>1</td><td>Tapeeo Band <small>Lorem ispum</small></td><td>$50.00</td><td>1 <span>$350.00</span></td></tr><tr class="td-padding"><td>1</td><td>Tapeeo Band <small>Lorem ispum</small></td><td>$50.00</td><td>1 <span>$350.00</span></td></tr></table> </section></body></html>';


    $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
// mysqli_error($conn);
// exit();