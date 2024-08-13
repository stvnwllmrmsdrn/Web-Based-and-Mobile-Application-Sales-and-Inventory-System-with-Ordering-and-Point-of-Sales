<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];
$cname = $_POST['name'];
$discount = $_POST['discount'];
$cust_contact = $_POST['cust_contact'];
$cust_address = $_POST['cust_address'];

if($d=='credit') {
    $f = $_POST['due'];
    $sql = "INSERT INTO tbl_sales_pos (invoice_number,cashier,date,type,amount,profit,due_date,name,cust_contact, cust_address) VALUES (:a,:b,:c,:d,:e,:z,:f,:g, :cust_contact, :cust_address)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname, ':cust_contact'=>$cust_contact, 'cust_address'=>$cust_address));
    header("location: preview.php?invoice=$a");
    exit();
    }
    if($d=='cash') {
    $f = $_POST['cash'];
    $sql = "INSERT INTO tbl_sales_pos (invoice_number,cashier,date,type,amount,profit,due_date,name,cust_contact, cust_address) VALUES (:a,:b,:c,:d,:e,:z,:f,:g, :cust_contact, :cust_address)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname, ':cust_contact'=>$cust_contact, 'cust_address'=>$cust_address));
    header("location: preview.php?invoice=$a");
    exit();
    }

?>