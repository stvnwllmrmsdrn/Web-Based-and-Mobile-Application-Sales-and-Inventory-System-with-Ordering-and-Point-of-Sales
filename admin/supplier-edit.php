<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['supplier_name'])) {
		$valid = 0;
		$error_message .= 'Supplier name can not be empty<br>';
	}

	if(empty($_POST['supplier_address'])) {
		$valid = 0;
		$error_message .= 'Address can not be empty<br>';
	}
    if(empty($_POST['supplier_contact'])) {
		$valid = 0;
		$error_message .= 'Contact can not be empty<br>';
	}

    if(empty($_POST['supplier_email'])) {
		$valid = 0;
		$error_message .= 'Email can not be empty<br>';
	}



	if($valid == 1) {

		if($path == '') {
			$statement = $pdo->prepare("UPDATE tbl_supplier SET supplier_name=?, supplier_address=?,supplier_contact=?, supplier_email=? WHERE supplier_id=?");
    		$statement->execute(array($_POST['supplier_name'],$_POST['supplier_address'],$_POST['supplier_contact'],$_POST['supplier_email'],$_REQUEST['id']));
		} else {

            $statement = $pdo->prepare("UPDATE tbl_supplier SET supplier_name=?, supplier_address=?, supplier_contact=?, supplier_email=? WHERE supplier_id=?");
            $statement->execute(array($_POST['supplier_name'],$_POST['supplier_address'],$_POST['supplier_contact'],$_POST['supplier_email'],$_REQUEST['id']));
        }	   

	    $success_message = 'Supplier is updated successfully!';
	}
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_supplier WHERE supplier_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Supplier</h1>
	</div>
	<div class="content-header-right">
		<a href="supplier.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_supplier WHERE supplier_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$supplier_name = $row['supplier_name'];
	$supplier_address = $row['supplier_address'];
    $supplier_contact = $row['supplier_contact'];
    $supplier_email = $row['supplier_email'];
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
							<label for="" class="col-sm-2 control-label">Supplier Name<span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="supplier_name" value="<?php echo $supplier_name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Address <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="supplier_address" value="<?php echo $supplier_address; ?>">
						</div>
						</div>	
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Number <span>*</span></label>
							<div class="col-sm-6">
								<input type="number" autocomplete="off" class="form-control" name="supplier_contact" value="<?php echo $supplier_contact; ?>">
						</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Email <span>*</span></label>
							<div class="col-sm-6">
                            <input type="text" autocomplete="off" class="form-control" name="supplier_email" value="<?php echo $supplier_email; ?>">
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
		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>