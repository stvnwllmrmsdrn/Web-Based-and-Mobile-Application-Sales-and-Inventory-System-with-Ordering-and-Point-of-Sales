<?php require_once('head.php'); ?>

<?php
if( !isset($_REQUEST['id']) || !isset($_REQUEST['task']) ) {
	header('location: customer-order-recieve.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: customer-order-recieve.php');
		exit;
	}
}
?>

<?php
  	$date = date('Y-m-d H:i:s');

	$statement = $pdo->prepare("UPDATE tbl_payment SET delivery_status=?, date_receipt=? WHERE id=?");
	$statement->execute(array($_REQUEST['task'],$date,$_REQUEST['id']));

	header('location: customer-order-recieve.php');
?>