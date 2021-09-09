<?php
include_once 'config.php';
// name,email,phone,address,pincode,state,city
    if(isset($_POST['data']) && isset($_POST['status']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['pincode']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['tax']) && isset($_POST['shipping'])){
        // print_r($data = $_POST['data']);
        // print_r($_POST['addressData']);
        // print_r($_SESSION['checkout']);
        $txnId = $_POST['data'];
        $txnStatus = $_POST['status'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $pincode = $_POST['pincode'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $tax = $_POST['tax'];
        $shipping = $_POST['shipping'];

        $checkAddress = mysqli_query($conn,"SELECT id, `user_id`,`name`,`email`,`phone`,`state`,`city`,`pincode`,`address` FROM `".$tblPrefix."user_address` WHERE (user_id = '".$_SESSION['user']['id']."' AND name = '$name' AND email = '$email' AND phone = '$phone' AND state = '$state' AND city = '$city' AND pincode = '$pincode' AND address = '$address' AND status = 2)");
 
        if(mysqli_num_rows($checkAddress) > 0){
            $aId = mysqli_fetch_assoc($checkAddress);
            $addressId = $aId['id'];
        }else{
            $query = "INSERT INTO `".$tblPrefix."user_address`(`user_id`, `default`, `type`, `name`, `email`, `phone`, `country`, `state`, `city`, `pincode`, `address`, `date_time`) VALUES ('".$_SESSION['user']['id']."','0','3','$name','$email','$phone','231','$state','$city','$pincode','$address','$cTime')";
            $queryData = mysqli_query($conn,$query);
            $addressId = mysqli_insert_id($conn);
        }

        $actionQ = "INSERT INTO `".$tblPrefix."orders`(`user_id`, `prod_id`, `prod_prices`, `total_amount`, `prod_quantity`, `tax`, `shipping`, `address_id`, `status`, `date_time`) 
        VALUES ('".$_SESSION['user']['id']."', '".implode(',',$_SESSION['checkout']['id'])."', '".implode(',',$_SESSION['checkout']['price'])."','".$_SESSION['checkout']['grand-total']."', '".implode(',',$_SESSION['checkout']['qnty'])."', '$tax', '$shipping', '$addressId', 2, '$cTime')";
        
        $orderQ = mysqli_query($conn, $actionQ);
            $orderId = mysqli_insert_id($conn);
        
        mysqli_query($conn, "INSERT INTO `".$tblPrefix."order_txn`(`txn_id`, `order_id`, `total_amount`, `date_time`, `payment_status`) VALUES ('$txnId', '$orderId', '".$_SESSION['checkout']['grand-total']."', '$cTime', '$txnStatus')");

        mysqli_query($conn, "DELETE FROM `".$tblPrefix."cart` WHERE user_id= '".$_SESSION['user']['id']."' ");
        
        foreach ($_SESSION['checkout']['id'] as $key => $value) {
            $query = mysqli_query($conn,"UPDATE `".$tblPrefix."products` SET `quantity` = `quantity` - '".$_SESSION['checkout']['qnty'][$key]."' WHERE pid='".$value."' ");
        }
        
        $userMail = $_SESSION['user']['email'];
        $mail = CnfProductMail($userMail,$orderId);
        
        unset($_SESSION['checkout']);
    }