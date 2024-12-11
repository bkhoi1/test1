<?php 
	require_once 'includes/connect.php';
	$sql='';
	if (isset($_GET)) {
		$dlt=$_GET['id'];
		$sql="DELETE FROM `khach_hang` WHERE id_khach_hang=$dlt";
	
	$RESULT=mysqli_query($connect,$sql);
	header('Location: manager_customer.php');}
 ?>