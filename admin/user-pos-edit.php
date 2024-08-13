<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['username'])) {
		$valid = 0;
		$error_message .= 'Username name can not be empty<br>';
	}
	
    if(empty($_POST['name'])) {
		$valid = 0;
		$error_message .= 'Name can not be empty<br>';
	}

    if(empty($_POST['position'])) {
		$valid = 0;
		$error_message .= 'Position can not be empty<br>';
	}
	else {
		// Duplicate checking
    	$statement = $pdo->prepare("SELECT * FROM tbl_user_pos WHERE username=?");
		$statement->execute(array($_REQUEST['id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			$username = $row['username'];
		}

		$statement = $pdo->prepare("SELECT * FROM tbl_user_pos WHERE username=? and username!=?");
    	$statement->execute(array($_POST['username'],$username));
    	$total = $statement->rowCount();							
    	if($total) {
    		$valid = 0;
        	$error_message .= 'Username already exists<br>';
    	}
    }


	if($valid == 1) {

		if($path == '') {
			$statement = $pdo->prepare("UPDATE tbl_user_pos SET username=?, name=?, position=? WHERE id=?");
    		$statement->execute(array($_POST['username'],$_POST['name'],$_POST['position'],$_REQUEST['id']));
		} else {

            $statement = $pdo->prepare("UPDATE tbl_user_pos SET username=?, name=?, position=? WHERE id=?");
    		$statement->execute(array($_POST['username'],$_POST['name'],$_POST['position'],$_REQUEST['id']));
        }	   

	    $success_message = 'Account is updated successfully!';
	}
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_user_pos WHERE id=?");
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
		<h1>Edit Cashier</h1>
	</div>
	<div class="content-header-right">
		<a href="user-pos.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_user_pos WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$username = $row['username'];
    $name = $row['name'];
    $position = $row['position'];
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
							<label for="" class="col-sm-2 control-label">Username<span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="username" value="<?php echo $username; ?>">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo $name; ?>">
						</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Position <span>*</span></label>
							<div class="col-sm-6">
							<select name="position" class="form-control"value="<?php echo $position;?>">
							<option value ="Cashier"> Cashier </option>
			</select>
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