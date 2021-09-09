<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$cTime = date('Y-m-d H:i:s');
$cDate = date('Y-m-d');
$metaPage =0;
$activePage =0;
$tblPrefix ="bnmi_";

//constants...
define('HASH_KEY', 'tappeo');
define('PROD', 0); //during production 1 testing 0...

if(PROD){
define('SITE_URL', '');

    $hostName = '';
	$userName = '';
	$password = '';
	$database = '';
	
}else{
	define('SITE_URL', 'http://localhost/tapeeo/');
	$hostName = 'localhost';
	$userName = 'root';
	$password = '';
	$database = 'bnmi_tappeo';
}
$conn = mysqli_connect($hostName, $userName, $password, $database);

if($conn!=true){
	echo '<script> alert("Could not connect to database.");</script>';
	exit();
}

// PayPal configuration 
define('PAYPAL_ID', 'pstech.aditya@gmail.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', SITE_URL.'inc/success.php'); 
define('PAYPAL_CANCEL_URL', SITE_URL.'inc/cancel.php'); 
define('PAYPAL_NOTIFY_URL', SITE_URL.'inc/ipn.php'); 
define('PAYPAL_CURRENCY', 'USD'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
require_once('functions.php');
require_once('sendMails.php');

$genDataQ = mysqli_query($conn, "SELECT key_name, key_value FROM `".$tblPrefix."general` WHERE key_name!=''");
while($genData = mysqli_fetch_assoc($genDataQ)){
	$_SESSION['general'][$genData['key_name']]= $genData['key_value'];
}

define('SITE_NAME', ''.$_SESSION['general']['website_name'].'');
define('SITE_EMAIL', ''.$_SESSION['general']['mailer_email'].'');