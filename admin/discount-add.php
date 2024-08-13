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
		$error_message .= 'Discount % can not be empty<br>';
	}
    
	if($valid == 1) {

		// getting auto increment id
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_discount'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}

	
		$statement = $pdo->prepare("INSERT INTO tbl_discount (discount_name,discount) VALUES (?,?)");
		$statement->execute(array($_POST['discount_name'],$_POST['discount'],));
			
		$success_message = 'Discount is added successfully!';

		unset($_POST['discount_name']);
		unset($_POST['discount']);
     
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Discount</h1>
	</div>
	<div class="content-header-right">
		<a href="discount.php" class="btn btn-primary btn-sm">View All</a>
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
							<label for="" class="col-sm-2 control-label">Discount Name <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="discount_name" value="<?php if(isset($_POST['discount_name'])){echo $_POST['discount_name'];} ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Discount%<span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    title="Numbers only" class="form-control" name="discount" value="<?php if(isset($_POST['discount'])){echo $_POST['discount'];} ?>">	</div>
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