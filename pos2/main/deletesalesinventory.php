<?php
	include('../connect.php');
	$id=$_GET['id'];
	$p_qty=$_GET['p_qty'];
	
	$result = $db->prepare("SELECT * FROM tbl_product WHERE p_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$p_qty=$row['p_qty'];
}

	$sql = "UPDATE tbl_product 
        SET p_qty=p_qty+?
		WHERE p_id=?";

	
	$result = $db->prepare("DELETE FROM tbl_salesorder_pos WHERE transaction_id= :id");
	$result->bindParam(':id', $id);
	$result->execute();
		header("location: sales_inventory.php");
?>