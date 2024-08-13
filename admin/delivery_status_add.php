<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['delivery_status'])) {
		$valid = 0;
		$error_message .= 'Delivery Status can not be empty<br>';
	}

    
	if($valid == 1) {

		// getting auto increment id
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_delivery_status'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}

	
		$statement = $pdo->prepare("INSERT INTO tbl_delivery_status (delivery_status) VALUES (?)");
		$statement->execute(array($_POST['delivery_status'],));
			
		$success_message = 'Type of Delivery is added successfully!';

		unset($_POST['delivery_status']);
     
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Type of Delivery</h1>
	</div>
	<div class="content-header-right">
		<a href="delivery_status.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


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
							<label for="" class="col-sm-2 control-label">Type of Delivery <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="delivery_status" value="<?php if(isset($_POST['delivery_status'])){echo $_POST['delivery_status'];} ?>">
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