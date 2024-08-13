<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['discount_name'])) {
		$valid = 0;
		$error_message .= 'Discount name can not be empty<br>';
	}

	if(empty($_POST['discount'])) {
		$valid = 0;
		$error_message .= 'Discount can not be empty<br>';
	}
 


	if($valid == 1) {

		if($path == '') {
			$statement = $pdo->prepare("UPDATE tbl_discount SET discount_name=?, discount=? WHERE discount_id=?");
    		$statement->execute(array($_POST['discount_name'],$_POST['discount'],$_REQUEST['id']));
		} else {

            $statement = $pdo->prepare("UPDATE tbl_discount SET discount_name=?, discount=? WHERE discount_id=?");
            $statement->execute(array($_POST['discount_name'],$_POST['discount'],$_REQUEST['id']));
        }	   

	    $success_message = 'Discount is updated successfully!';
	}
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_discount WHERE discount_id=?");
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
		<h1>Edit Discount</h1>
	</div>
	<div class="content-header-right">
		<a href="discount.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_discount WHERE discount_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$discount_name = $row['discount_name'];
	$discount = $row['discount'];
  
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
							<label for="" class="col-sm-2 control-label">Discount Name<span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="discount_name" value="<?php echo $discount_name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Discount% <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    title="Numbers only" class="form-control" name="discount" value="<?php echo $discount; ?>">
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