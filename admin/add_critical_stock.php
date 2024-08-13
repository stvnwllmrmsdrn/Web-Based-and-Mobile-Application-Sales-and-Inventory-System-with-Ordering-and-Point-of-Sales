<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['p_qty'])) {
		$valid = 0;
		$error_message .= 'Quantity can not be empty<br>';
	}


	if($valid == 1) {

		if($path == '') {
			$statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
    		$statement->execute(array($_POST['p_qty'],$_REQUEST['p_id']));
		} else {

            $statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
            $statement->execute(array($_POST['p_qty'],$_REQUEST['p_id']));
        }	   

	    $success_message = 'Stock is added successfully!';
	}
}
?>

<?php
if(!isset($_REQUEST['p_id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
	$statement->execute(array($_REQUEST['p_id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>
<script>
function sum() {
	 var txtFirstNumberValue = document.getElementById('txt1').value;
	 var txtSecondNumberValue = document.getElementById('txt2').value;
     var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;				
            }
        }
</script>
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Critical Stock</h1>
	</div>
	<div class="content-header-right">
		<a href="critical_stock.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
$statement->execute(array($_REQUEST['p_id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$p_qty = $row['p_qty'];
	$current_qty = $row['p_qty'];
	$product = $row['p_name'];
	$qty = $current_qty + $p_qty;
}
?>

<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
				<p>
				<?php echo $error_message; ?>
				</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
				<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="box box-info">
					<div class="box-body">
					    	<div class="form-group">
							<label for="" class="col-sm-2 control-label">Product Name:</span></label>
							<div class="col-sm-6">
							<input type="text" autocomplete="off" class="form-control" name="p_name" value ="<?php echo $product ?>"readonly>
			</div>
			</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Additional Stock:</span></label>
							<div class="col-sm-6">
								<input type="hidden" autocomplete="off" id ="txt1" onkeyup="sum();" value ="<?php echo $p_qty ?>"class="form-control" name="p_qty">
								<input type="number" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    title="Numbers only" id ="txt2" onkeyup="sum();" class="form-control" name="p_qty">
			</div>
			</div>
			<div class="form-group">
							<label for="" class="col-sm-2 control-label">Current Stock:</span></label>
							<div class="col-sm-6">
							<input type="number" autocomplete="off" class="form-control" name="p_qty" value ="<?php echo $p_qty ?>"readonly>
			</div>
			</div>
			<div class="form-group">
							<label for="" class="col-sm-2 control-label">Total Stock:</span></label>
							<div class="col-sm-6">
								<input type="number" autocomplete="off" id ="txt3" onkeyup="sum();" class="form-control" name="p_qty" readonly>
			</div>
			</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
					</div>
            </div>
            </div>
			</form>

</section>

<?php require_once('footer.php'); ?>