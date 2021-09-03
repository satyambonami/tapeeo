<?php 
require_once('config.php');
if(isset($_POST['state'])){
	$id=mysqli_real_escape_string($conn,$_POST['state']);

	$sql="SELECT id, name FROM `states` WHERE `country_id`='$id'";
	$res=mysqli_query($conn,$sql);

	echo '<option value="">State</option>';
	while($data=mysqli_fetch_array($res)){
		echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
	} 
}
?>


