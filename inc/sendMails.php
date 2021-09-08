<?php

require 'mailer/vendor/autoload.php';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
 

// //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

function sendMail($email,$subject,$message){
	//required parameters...
	$production = PROD;
	$siteName = SITE_NAME;
	$MailFrom = SITE_EMAIL;

	//smtp request...
	$mail = new PHPMailer;
	$mail->Host       = 'smtp.adityakundra.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
    $mail->Username   = 'info@adityakundra.com';                     //SMTP username
    $mail->Password   = 'Kundraji@2001';                  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;           
    $mail->setFrom($MailFrom, $siteName);
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo($MailFrom, $siteName);

	$mail->Subject = $subject;
    $mail->Body    = $message;
	$mail->IsHTML(true);
	if($production != 1){
		$file = fopen(rand(99999,999999).'.html', 'w');
		fwrite($file, $message);
		fclose($file);
		return true;
	} else {
		if(!$mail->send()) {
			return false;
		} else {
			return true;
		}
	}
}


function CnfProductMail($email,$prodId){
	global $conn;
	global $tblPrefix;
	// print_r($prodId);
	// echo "Mailer";
	$query = mysqli_query($conn,"SELECT * FROM `".$tblPrefix."orders` WHERE id = '$prodId' ");
	// echo "<pre>";
	$data = mysqli_fetch_assoc($query);
	$prdId = explode(',', $data['prod_id']);
	$priceArr = explode(',', $data['prod_prices']);
	$quantityArr = explode(',', $data['prod_quantity']);
	// echo "</pre>";
	$html='<!DOCTYPE html><html><head><style>.main_div{width:600px;height:205vh;overflow:hidden;position:absolute;left:30%}.logo{position:relative;left:11rem}.order_div{position:relative;width:100%;height:170px;background-color:#FEEAF1}p{text-align:center}.item_ordered{position:relative;width:100%;;background-color:white;top:15px}.line{position:relative;width:94%;height:1.5px;background-color:black;opacity:0.5;left:3%;top:-15px}.items{position:relative;width:90%;height:85px;left:5%;top:-7%}.imgdiv{position:relative;width:24%;height:100%}.imgdiv img{width:50%;position:relative;top:25px}.additional{position:relative;width:80%;height:350px;margin-top:40px;margin-left:10%}.innerdiv{position:absolute;width:50%;height:100%}.section{position:relative;width:94%;height:70px;left:3%;top:30px}.footer{position:relative;width:94%;height:150px;left:3%}</style></head><body><div class="main_div"><div class="logo"> <img src="'.SITE_URL.'/img/logo.png" style="height:80px;"></div><div class="order_div"><p style="font-size: 20pt;"> Order Confirmation</p><p> Hey smiles Anne Marie</p><p> We`ve got your order! Your World is about to look a whole lot better</p><p> we`ll Drop you another email when your order ships.</p></div><h3 style="text-align: center;"> ORDER NO. - TAPEEO 4512</h3><p style="margin-top:-15px;"> 24/08/2021</p><div class="item_ordered"><h3 style="margin-left: 3%;"> ITEM ORDERED</h3><div class="line"></div>';
	
foreach($prdId as $idKey => $idVal){
	$prod = mysqli_query($conn,"SELECT name,image FROM `bnmi_products` WHERE pid = $idVal");
	while($d = mysqli_fetch_assoc($prod)){
		echo "hii";
			$html .= '<div class="items">
				<p style="position: absolute; margin-left: 70px;
								margin-top: 30px;">
					'.$d['name'].'
				</p>
				<div class="imgdiv">
					<img src="'.SITE_URL.'/img/products/'.$d['image'].'" style="margin-top: -13px;">
				</div>
				<p style=" margin-top: -3.5rem; margin-left: 50%;">
					x'.$quantityArr[$idKey].'
				</p>
				<p style="text-align: right; margin-top: -38px;
								color: #D33696;">
					$'.$priceArr[$idKey]*$quantityArr[$idKey].'
				</p>
			</div>';
	}
}

$html.='<div class="line"></div></div><div class="additional"><div class="innerdiv"><p style="text-align: left; margin-left: 30px; padding-bottom: 7px;"> Discount</p><p style="text-align: left; margin-left: 30px; padding-bottom: 7px;"> Subtotal</p><p style="text-align: left; margin-left: 30px; padding-bottom: 7px;"> Tax Charges</p><p style="text-align: left; margin-left: 30px; padding-bottom: 7px;"> Total</p><h3 style="margin-left: -40px; margin-top: 40px;"> BILLING INFO</h3><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> Annie Marie</p><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> 600 Montgomery st</p><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> San Francisco CA</p><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> 94411</p><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> United States</p><p style="text-align: left; margin-left: 30px; color: #41EBDF; margin-top: -10px;"> Anne@companyname.com</p></div><div class="innerdiv" style="margin-left: 75%;"><p style="text-align: left; margin-left: 30px; padding-bottom: 7px;"> -$18.00</p><p style="text-align: left; margin-left: 30px; padding-bottom: 7px;"> $89.00</p><p style="text-align: left; margin-left: 30px; padding-bottom: 7px;"> $0.00</p><p style="text-align: left; margin-left: 30px; padding-bottom: 7px;"> $89.00</p><h3 style="margin-left: -40px; margin-top: 40px;"> SHIPPING ADDRESS</h3><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> Annie Marie</p><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> 600 Montgomery st</p><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> San Francisco CA</p><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> 94411</p><p style="text-align: left; margin-left: 30px; margin-top: -10px;"> United States</p></div></div><div class="line" style="margin-top: 150px;"></div><p> If you need help with anything please don`t hesitate to drop us an</p><p style="margin-top: -10px; text-decoration: underline;"> email:tapeeo@company.com</p><div class="section"><h3> SHOP</h3><h3 style="text-align: center; margin-top: -42px;"> ABOUT</h3><h3 style="text-align: right; margin-top: -40px;"> CONTACT</h3></div><div class="line"></div><div class="footer"><p> Lorns</p><p> 84 Miller Street</p><p> Glasgow, G11DT</p><p> Copyright@2021</p></div><div class="line"></div><p style="color: #D33696; font-size: 24pt; margin-top: -5px;"> Tapeeo.com</p></div></body></html>';
echo $html;
die();
//required parameters...
	// $production = PROD;
	// $siteName = SITE_NAME;
	// $MailFrom = SITE_EMAIL;

	// //smtp request...
	// $mail = new PHPMailer;
	// $mail->Host       = 'smtp.adityakundra.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
    // $mail->Username   = 'info@adityakundra.com';                     //SMTP username
    // $mail->Password   = 'Kundraji@2001';                  
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;           
    // $mail->setFrom($MailFrom, $siteName);
    // $mail->addAddress($email);     //Add a recipient
    // $mail->addReplyTo($MailFrom, $siteName);
	
	// $html='';
	
	// $mail->Subject = $subject;
    // $mail->Body    = $message;
	// $mail->IsHTML(true);
	// if($production != 1){
	// 	$file = fopen(rand(99999,999999).'.html', 'w');
	// 	fwrite($file, $message);
	// 	fclose($file);
	// 	return true;
	// } else {
	// 	if(!$mail->send()) {
	// 		return false;
	// 	} else {
	// 		return true;
	// 	}
	// }
}


?>