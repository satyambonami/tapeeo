<?php
//alertify...
function toast($side){
	if(isset($_SESSION['toast'])){
		if(!isset($_SESSION['toast']['duration'])){
			$_SESSION['toast']['duration']=3; //In seconds...
		}

		if(isset($_SESSION['toast']['type'])){
			$type = $_SESSION['toast']['type'];
		}else{
			$type = "";
		}

		if($_SESSION['toast']['msg'] != ""){
			if($side==1){
				if($type=='alert'){
					$toastMsg ="<script>ak_alertify('".$_SESSION['toast']['msg']."');</script>";
				}elseif($type=='success'){
					$toastMsg ="<script>alertify.success('".$_SESSION['toast']['msg']."',".$_SESSION['toast']['duration'].");</script>";
				}elseif($type=='error'){
					$toastMsg ="<script>alertify.error('".$_SESSION['toast']['msg']."',".$_SESSION['toast']['duration'].");</script>";
				}elseif($type=='warning'){
					$toastMsg ="<script>alertify.warning('".$_SESSION['toast']['msg']."',".$_SESSION['toast']['duration'].");</script>";
				}else{
					$toastMsg ="<script>alertify.message('".$_SESSION['toast']['msg']."',".$_SESSION['toast']['duration'].");</script>";
				}
			}else{
				$toastMsg = "<script> Materialize.toast('".$_SESSION['toast']['msg']."', 5000);</script>";
			}

			$_SESSION['toast']['msg'] = "";
			unset($_SESSION['toast']['type']);
			unset($_SESSION['toast']['duration']);
			return $toastMsg;
		}
	}
}


//page names...
function page_name($param){
	$arr = array(
		1=> 'Home',
		2=> 'About',
		3=> 'Contact',
		4=> 'Portfolio',
		5=> 'FAQs',
		6=> 'Privacy & Policy',
		7=> 'Terms & Conditions',
		8=> 'Service Details'
	);

	if($param==0){
		return $arr;
	}else{
		return $arr[$param];
	}
}

// Cms Pages
function cms_types($id){
	$cmsType = array(
		1=>'About Us',
	);

	if($id==0){
		return $cmsType;
	}else{
		return $cmsType[$id];
	}
}

//banner location...
function banner_location($location){
	$arr = array(
		1=> 'Home Page Slider Banner',
	);

	if($location ==0){
		return $arr;
	}else{
		return $arr[$location];
	}
}


//product type...
function product_type($type){
	$arr = array(
		1 => 'New Arrivals',
		2 => 'Best Sellers',
		3 => 'Sale Items',
	);
	if($type ==0){
		return $arr;
	}else{
		return $arr[$type];
	}
}

// for security 
function ak_secure_number($param){
	//remove vulnerable params...
	$param = str_replace('"', "\"", str_replace("'", '\'', str_replace('</script>', '', str_replace('<script>', '', $param))));


	if(is_numeric($param)==true){
		return true;
	}else{
		return false;
	}
}


function ak_secure_string($param){
	//remove vulnerable params...
	$param = str_replace('"', "\"", str_replace("'", '\'', str_replace('</script>', '', str_replace('<script>', '', $param))));

	return $param;
}

function ak_show_string($param){
	$param = str_replace("`", "'", $param);

	return $param;
}

function ak_url_encode($param){
	$param = preg_replace("/[^a-zA-Z0-9 ]+/", "", $param);//it will return alpha numeric string with whitespace...
	$param = preg_replace("/\s+/", " ", $param); //remove multiple whitespace...
	$param = trim(strtolower($param));
	$url = str_replace(" ", "-", $param);

	return $url;
}

function ak_generate_invoice_number($orderId, $prefix){
	$invoiceId = str_pad($orderId, 7, '0', STR_PAD_LEFT);
    $invoiceNum = $prefix.$invoiceId;

    return $invoiceNum;
}

function ak_order_status($status){
	$arr = array(
		1 => 'Canceled',
		2 => 'Pending',
		3 => 'Shipped',
	);
	if($status ==0){
		return $arr;
	}else{
		return $arr[$type];
	}
}

function ak_shipping_status($status){
	$arr = array(
		1 => 'Canceled',
		2 => 'Pending',
		3 => 'Confirm',
	);
	if($status ==0){
		return $arr;
	}else{
		return $arr[$type];
	}
}

function country($countryId){
	global $conn;
	global $tblPrefix;
	
	if($countryId != NULL){	
		$country=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name FROM `countries` WHERE id=$countryId"))['name'];
		return $country;
	}else{
		$defaulCountry = 'United States';
		return $defaulCountry;
	}

}

function city($cityId){
	global $conn;
	global $tblPrefix;

	if($cityId != NULL){
		$city=mysqli_fetch_assoc(mysqli_query($conn,"SELECT id,name FROM `cities` WHERE id=$cityId"))['name'];
		return $city;
	}else{
		$defaultCity = '';
		return $defaultCity;
	}

}
function state($stateId){
	global $conn;
	global $tblPrefix;

	if($stateId != NULL){	
		$state=mysqli_fetch_assoc(mysqli_query($conn,"SELECT id,name FROM `states` WHERE id=$stateId"))['name'];	
		return $state;
	}else{
		$defaultState = '';
		return $defaultState;
	}
}