<?php 
	require_once 'includes/connect.php';
	$sql='';
	if (isset($_GET)) {
		$dlt=$_GET['id'];
		$sql="DELETE FROM `admin` WHERE id=$dlt";
	}
	$RESULT=mysqli_query($connect,$sql);
	header('Location: manager_account.php');
 ?>