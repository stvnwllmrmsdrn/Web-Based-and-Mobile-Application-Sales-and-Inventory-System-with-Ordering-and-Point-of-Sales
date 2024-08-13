<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['state_name'])) {
        $valid = 0;
        $error_message .= "Province Name can not be empty<br>";
    } else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM tbl_state WHERE state_name=?");
    	$statement->execute(array($_POST['state_name']));
    	$total = $statement->rowCount();
    	if($total)
    	{
    		$valid = 0;
        	$error_message .= "Province Name already exists<br>";
    	}
    }

    if($valid == 1) {

		// Saving data into the main table tbl_state
		$statement = $pdo->prepare("INSERT INTO tbl_state (state_name,country_id) VALUES (?,?)");
		$statement->execute(array($_POST['state_name'],$_POST['country_id']));
	
    	$success_message = 'Province is added successfully.';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Province</h1>
	</div>
	<div class="content-header-right">
		<a href="province.php" class="btn btn-primary btn-sm">View All</a>
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

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
					<div class="form-group">
							<label for="" class="col-sm-3 control-label">Country Name <span>*</span></label>
							<div class="col-sm-4">
								<select name="country_id" class="form-control select2">
									<option value="">Select Country</option>
									<?php
									$statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
									foreach ($result as $row) {
										?>
										<option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Province Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="state_name">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
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