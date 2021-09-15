<?php
require_once ('config.php');

if(isset($_POST['verify'])){
	$email = strtolower(trim(mysqli_real_escape_string($conn, $_POST['email'])));

	$checkUserQ = "SELECT `id`, `password` FROM `".$tblPrefix."users` WHERE email = '$email' AND status>0 AND type=0";
	$checkUser = mysqli_query($conn, $checkUserQ);

	if(mysqli_num_rows($checkUser) > 0){
		$user = mysqli_fetch_assoc($checkUser);
		$userId = $user['id'];

		$token = bin2hex(openssl_random_pseudo_bytes(64));

		$mac = hash_hmac('sha256', $userId.':'.$token, HASH_KEY);
		$storeTokenForUser = mysqli_query($conn, "UPDATE `".$tblPrefix."users` SET `token` = '$mac' WHERE id = $userId");

		$subject = "Account recovery request.";
		$encMail = base64_encode($email);
		$fallbackUrl = SITE_URL.'user/forget.php?u='.$encMail.'&token='.$token;

		if(sendmail($email, $subject, $fallbackUrl, 2)==true){
			$_SESSION['toast']['type']="success";
			$_SESSION['toast']['msg'] = 'An account recovery email has been send to '.$email.'. <br> Please follow the link in the email to recover your account.';
			header("location:../user/login.php");
			exit();
		}
	}else{
		$_SESSION['toast']['msg'] = "No account associated with this Email address. Did you forgot that too?";
		header("location:../user/forget.php");
			exit();
	}
}elseif(isset($_POST['recover-account']) && isset($_POST['u']) && isset($_POST['token'])){
	$password=mysqli_real_escape_string($conn,ak_secure_string($_POST['password']));
	$Cnfpassword=mysqli_real_escape_string($conn,ak_secure_string($_POST['conf-password']));
	if($password == $Cnfpassword){
		$email = base64_decode(mysqli_real_escape_string($conn, $_POST['u']));
		$token = mysqli_real_escape_string($conn, $_POST['token']);
		$newPass=hash('sha512',$_POST['password'].HASH_KEY);

		$checkUser = mysqli_query($conn, "SELECT `id`, `token` FROM `".$tblPrefix."users` WHERE email = '$email'");
		if(mysqli_num_rows($checkUser) == 1){
			$user = mysqli_fetch_assoc($checkUser);
			$mac = hash_hmac('sha256', $user['id'].':'.$token, HASH_KEY);
			if (hash_equals($user['token'], $mac)) {
				$updatePass = mysqli_query($conn, "UPDATE `".$tblPrefix."users` SET password = '$newPass', token = '' WHERE id = ".$user['id']);
				if ($updatePass==true){
					unset($_SESSION['user']);
					$_SESSION['toast']['type']="success";
					$_SESSION['toast']['msg'] = "Your password has been successfully reset. Please proceed to login. ";
					header('location:../user/login.php');
					exit();
				} else {
					$_SESSION['toast']['msg'] = 'An unexpected error has occured. Please try again.';
				}
			} else {
				$_SESSION['toast']['msg'] = 'Invalid/Expired token, Please check your link or generate a new token';
			}
		}else{
			$_SESSION['toast']['msg'] = 'No account found with this email address. Please register for a new account or check your link.';
		}
	}else{
		$_SESSION['toast']['msg'] = "Password did not match, Please try again.";
		header('location:../user/forget.php?u='.$email.'&token='.$token);
		exit();
	}
}

?>