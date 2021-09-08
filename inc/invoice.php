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
        $address = mysqli_query($conn,"SELECT `type`, `name`, `email`, `phone`, `country`, `state`, `city`, `pincode`, `address` FROM `".$tblPrefix."user_address` WHERE `id` = ".$data['address_id']." ");
        $add = mysqli_fetch_assoc($address);
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
    '<!DOCTYPE html>
    <html lang="en">
        <head></head>
        <body style="padding: 20px 40px;">
            <header></header>
            <section>
                <table style="width: 100%; border-style: none; color: #d33696; font-size: 20px; font-size: 20px; align-content: center;">
                    <tr>
                        <td style="font-size: 50px;">TAPEEO</td>
                    </tr>
                </table>

                <table style="width: 100%; border-style: none; color: #d33696; font-size: 20px; font-size: 20px; align-content: center;">
                    <tr>
                        <td style="font-size: 24px;text-align:right;">INVOICE</td>
                    </tr>
                </table>

                <h1 style="font-size: 20px; font-weight: 300; color: #ccc;">Invoice to:</h1>

                <table style="border-style: none; margin-bottom: 50px;margin-left: auto; ">
                <tr>
                <td style="font-style: normal; font-size: 18px; color: #ccc;"><span style="padding-left: 30px;">#TAPEEO'.$data['id'].'</span></td>
            </tr>
            <tr>
                <td style="font-style: normal; font-size: 18px; color: #ccc;">Date <span style="padding-left: 0px;">'.date("d/M/Y",strtotime($data['date_time'])).'</span></td>
            </tr>
                </table>

                <table style="border-style: none; margin-bottom: 50px; ">
                   
                <tr>
                    <td style="font-size: 20px; color: #ccc;">'.$add['name'].'</td>
                </tr>
                <tr>
                    <td style="font-style: normal; font-size: 18px; color: #ccc;">
                        '.$add['address'].' <br />
                        '.city($add['city']).', '.state($add['state']).', '.country($add['country']).' <br />
                        '.$add['pincode'].'
                    </td>
                </tr>
                </table>

                <table style="width: 100%; background-color: #edfcfd;  border: 1px solid #ccc; border-collapse: collapse; color:gray;">
                <tr>
                    <th style=" padding: 20px; border-right: 1px solid #ccc;">S.No</th>
                    <th style=" padding: 20px; border-right: 1px solid #ccc;">Product Name</th>
                    <th style=" padding: 20px; border-right: 1px solid #ccc;">Price</th>
                    <th style=" padding: 20px; border-right: 1px solid #ccc;">Quantity</th>
                    <th style=" padding: 20px; border-right: 1px solid #ccc;">Total</th>
                </tr>
                ';
                
                $i=0;
                $subTotal =0;
                foreach($prodIdArr as $idKey => $idVal){
                    $i++;
                    $prodTotal = $quantityArr[$idKey]*$priceArr[$idKey];
                    $subTotal +=$prodTotal;

                    $prodQ = mysqli_query($conn, "SELECT name, image FROM `".$tblPrefix."products` WHERE pid=$idVal");
                    $prodData = mysqli_fetch_assoc($prodQ);
                        $html .='<tr style="font-size: 16px; color: #ccc;">
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;">'.$i.'</td>
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;">'.$prodData['name'].'</td>
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;">$'.$priceArr[$idKey].'</td>
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;"><span">'.$quantityArr[$idKey].'</span></td>
                                    <td style=" padding: 20px; border-right: 1px solid #ccc;"> <span> $'.$priceArr[$idKey]*$quantityArr[$idKey].'.00</span></td>
                                </tr>';
                }

                $html .= '</table>
                        </section>
                        <section>
                            <table style="float:left; width:60%; margin-top: 30px;">
                                <tr>
                                    <td style="color: #D33696; font-size: 22px;">Thank you for your business</td>
                                </tr>
                            </table>
                            <table style=" float:left; width:40%; font-size: 18px; color: #ccc;">
                                <tr>
                                    <td><span style=""> Sub Total</span> <span style="">$'.$priceArr[$idKey]*$quantityArr[$idKey].'</span></td>
                                </tr>
                                <tr>
                                    <td><span style="">Tax</span> <span style="">'.$data['tax'].'</span></td>
                                </tr>
                                <tr>
                                    <td>......................................................</td>
                                </tr>
                                <tr>
                                    <td><span style="">Total</span> <span style="">$'.$data['total_amount'].'</span></td>
                                </tr>
                                <tr>
                                    <td><span style="">Shipping</span> <span style="">$'.$data['shipping'].'</span></td>
                                </tr>
                            </table>
                            <table style="float:left;width:100%; margin-top: 200px;">
                                <tfoot>
                                    <tr>
                                        <td style="text-decoration:overline ; font-size: 20px; color: #ccc; ">Author Sign</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </section>
                        </body>
                        
                        </html>';

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