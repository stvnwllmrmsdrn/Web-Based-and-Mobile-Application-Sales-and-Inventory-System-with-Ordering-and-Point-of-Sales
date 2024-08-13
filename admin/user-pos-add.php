<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['username'])) {
		$valid = 0;
		$error_message .= 'Username can not be empty<br>';
	}

	if(empty($_POST['password'])) {
		$valid = 0;
		$error_message .= 'Password can not be empty<br>';
	}
    
	if(empty($_POST['name'])) {
		$valid = 0;
		$error_message .= 'Name can not be empty<br>';
	}
    
	if(empty($_POST['position'])) {
		$valid = 0;
		$error_message .= 'Position can not be empty<br>';
	} else {
    	// Duplicate checking
    	$statement = $pdo->prepare("SELECT * FROM tbl_user_pos WHERE username=?");
    	$statement->execute(array($_POST['username']));
    	$total = $statement->rowCount();
    	if($total)
    	{
    		$valid = 0;
        	$error_message .= "Username already exists<br>";
    	}
    }	

	if($valid == 1) {

		// getting auto increment id
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_user_pos'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}

	
		$statement = $pdo->prepare("INSERT INTO tbl_user_pos(username,password,name,position) VALUES (?,?,?,?)");
		$statement->execute(array($_POST['username'],$_POST['password'],$_POST['name'],$_POST['position'],));
			
		$success_message = 'Your Account is added successfully!';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Cashier</h1>
	</div>
	<div class="content-header-right">
		<a href="user-pos.php" class="btn btn-primary btn-sm">View All</a>
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
							<label for="" class="col-sm-2 control-label">Username <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="username">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password <span>*</span></label>
							<div class="col-sm-4">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> Cashier Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="name">
							</div>
						</div>
						<div class="form-group">
						<label for="" class="col-sm-2 control-label"> Position <span>*</span></label>
							<div class="col-sm-4">
							<select name="position" class="form-control">
							<option value="">--- Choose a position ---</option>
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