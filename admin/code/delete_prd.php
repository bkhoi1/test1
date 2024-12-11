<?php 
	require_once 'includes/connect.php';
	$sql='';
	if (isset($_GET)) {
		$dlt=$_GET['id'];
		$sql="DELETE FROM `san_pham` WHERE id=$dlt";
	}
	$RESULT=mysqli_query($connect,$sql);
	header('Location: manager_product.php');
 ?>