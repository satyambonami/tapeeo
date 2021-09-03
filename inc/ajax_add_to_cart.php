<?php
require_once('config.php');
// Add To Cart
if(isset($_POST['prod_id']) && isset($_POST['quantity'])){
  $prodId = mysqli_real_escape_string($conn, ak_secure_string($_POST['prod_id']));
  $quantity = mysqli_real_escape_string($conn, ak_secure_string($_POST['quantity']));

  if(isset($_SESSION['user'])){
    $userId = $_SESSION['user']['id'];
    $checkCart = mysqli_query($conn, "SELECT id FROM `".$tblPrefix."cart` WHERE user_id=$userId AND prod_id=$prodId");
    if(mysqli_num_rows($checkCart)==0){
      $actionQ = "INSERT INTO `".$tblPrefix."cart` (`user_id`, `prod_id`, `quantity`, `date_time`) VALUES ('$userId', '$prodId', '$quantity', '$cTime')";
      if(mysqli_query($conn, $actionQ)==true){
        echo 1;
      }else{
        echo 0;
      }
    }else{
     echo 2;
    }
  }else{
    if(isset($_SESSION['cart'])){
      if(array_key_exists($prodId, $_SESSION['cart'])==false){
        $_SESSION['cart'][$prodId]=$quantity;
        echo 1;
      }else{
        echo 2;
      }
    }else{
      $_SESSION['cart'][$prodId]=$quantity;
        echo 2;
    }
  }
}
exit();