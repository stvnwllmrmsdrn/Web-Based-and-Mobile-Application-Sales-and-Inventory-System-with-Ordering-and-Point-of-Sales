<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$date = $_POST['date'];
$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM tbl_product WHERE p_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['p_current_price'];
$name=$row['p_name'];
$p=$row['p_old_price'];
}

//edit qty
$sql = "UPDATE tbl_product 
        SET p_qty=p_qty-?
		WHERE p_id=?";
$q = $db->prepare($sql);
$q ->execute(array($c,$b));
$asasa = $asasa;
$d=$asasa*$c;
$profit = $asasa - $p ;
// query
$sql = "INSERT INTO tbl_salesorder_pos (invoice,product,qty,amount,p_name,p_current_price,profit,date) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':g'=>$profit,':h'=>$date));
header("location: sales.php?id=$w&invoice=$a");


?>