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
	// echo "</pre>";
	$product = '('.$data['prod_id'].')';
	$prod = mysqli_query($conn,"SELECT name,image FROM `bnmi_products` WHERE pid IN $product");
	print_r(mysqli_fetch_assoc($prod));
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