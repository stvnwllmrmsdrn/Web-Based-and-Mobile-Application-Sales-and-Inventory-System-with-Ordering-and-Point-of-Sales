<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['id'];
$a = $_POST['username'];
$z = $_POST['password'];
$b = $_POST['name'];
$c = $_POST['position'];

// query
$sql = "UPDATE tbl_user_pos 
        SET username=?, password=?, name=?, position=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$c,$id));
echo '<script>alert("Profile Update Successfully")</script>';
header("location: edit-profileview.php");


?>