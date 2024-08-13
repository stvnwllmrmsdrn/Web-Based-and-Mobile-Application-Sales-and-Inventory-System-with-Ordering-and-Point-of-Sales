<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM tbl_user_pos WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="update-prof.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Update Profile</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<span>Username: </span><input type="text" style="width:265px; height:30px;" name="username" value="<?php echo $row['username']; ?>" /><br>
<span>Password: </span><input type="password" style="width:265px; height:30px;" name="password" value="<?php echo $row['password']; ?>" /><br>
<span>Name: </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['name']; ?>" /><br>
<span>Position: </span><select name="position" style="width:265px; height:30px;" value="<?php echo $row['position'];?>"><br>					
<option value ="Cashier"> Cashier </option></select><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Update</button>
    
</div>
</form>
<?php
}
?>