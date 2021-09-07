<?php 
require_once 'config.php';
require 'dompdf/vendor/autoload.php';

if(isset($_GET['id'])){
	$orderId = mysqli_real_escape_string($conn, $_GET['id']);
	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$dataQ = mysqli_query($conn, "SELECT ord.*, u.name as u_name, u.email as u_email, u.phone as u_phone, u.country as u_country, u.state as u_state, u.city as u_city, u.pincode as u_pincode, u.address as u_address FROM `".$tblPrefix."orders` ord LEFT JOIN `".$tblPrefix."user_address` u ON ord.address_id= u.id  WHERE ord.status!=0 AND ord.id=$orderId");
		$data = mysqli_fetch_assoc($dataQ);
		$priceArr = explode(',', $data['prod_prices']);
		$quantityArr = explode(',', $data['prod_quantity']);
		$prodIdArr = explode(',', $data['prod_id']);
        $city = city($data['u_city']);
        $state = state($data['u_state']);
        $country  = country($data['u_country']);
	}
}else{
	$_SESSION['toast']['msg'] = "Something went wrong, Please try again.";
	header("location:../user/index.php");
	exit();
}

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html=
    '<!DOCTYPE html><html lang="en"><head></head><body style="padding: 100px;"> <header> <img src="./img/logo.png" style=" height: 100%; width: auto;" alt=""> </header> <section><table style=" border-style: none; color: #D33696; font-size: 20px; font-size: 20px; display: flex; flex-direction: row; flex-wrap: wrap; justify-content: flex-end; align-content: center;"><tr><td style="font-size: 50px;">INVOICE</td></tr></table><h1 style=" font-size: 36px; font-weight: 300; color: #ccc;">Invoice to:</h1><table style="float: left; border-style: none; margin-bottom: 30px;"><tr><td style="font-size: 30px; color: #ccc;">Annie Marie</td></tr><tr><td style="font-style: normal; font-size: 22px; color: #ccc;"> 24 Dummy Street Area <br> Location Lorem Ipsum <br> 45412</td></tr></table><table style="float: right; border-style: none; margin-bottom: 30px;"><tr><td style="font-style: normal; font-size: 22px; color: #ccc;">Invoice# <span style="padding-left: 30px;">S75124</span></td></tr><tr><td style="font-style: normal; font-size: 22px; color: #ccc;">Date <span style="padding-left: 30px;">01/05/2021</span></td></tr></table><table style=" width:100%; background-color: #EDFCFD; padding: 20px 0; border: 1px solid #ccc; border-collapse: collapse;">';
                
                $i=0;
                $subTotal =0;
                foreach($prodIdArr as $idKey => $idVal){
                    $i++;
                    $prodTotal = $quantityArr[$idKey]*$priceArr[$idKey];
                    $subTotal +=$prodTotal;

                    $prodQ = mysqli_query($conn, "SELECT name, image FROM `".$tblPrefix."products` WHERE pid=$idVal");
                    $prodData = mysqli_fetch_assoc($prodQ);
                        $html .='<tr style="font-size: 22px; color: #ccc;">
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;">'.$i.'</td>
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;">'.$prodData['name'].'</td>
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;">$'.$priceArr[$idKey].'</td>
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;"><span style="float: left;">'.$quantityArr[$idKey].'</span> <span style="float: right;"> $'.$priceArr[$idKey].'.00</span></td>
                                </tr>';
                }

                $html .= '</table></section><section><table style=" display: flex; align-content: flex-start; flex-wrap: wrap; flex-direction: column; margin-top: 30px;"><tr><td style="color: #D33696; font-size: 28px;">Thank you for your business</td></tr></table><table style=" display: flex; align-content: flex-end; flex-wrap: wrap; flex-direction: column; font-size: 22px; color: #ccc;"><tr><td><span style="float: left;"> Sub Total</span> <span style="float: right;">$220.00</span></td></tr><tr><td><span style="float: left;">Tax</span> <span style="float: right;">0.00%</span></td></tr><tr><td>......................................................</td></tr><tr><td><span style="float: left;">Total</span> <span style="float: right;">$220.00</span></td></tr></table><table style="display: flex; justify-content: flex-end ;margin-top: 50px;"><tfoot><tr><td style="text-decoration:overline ; font-size: 28px; color: #ccc; " >Author Sign</td></tr></tfoot></table> </section></body></html>';

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