<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM tbl_sales_pos WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>