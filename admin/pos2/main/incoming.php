<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$date = date('Y-m-d H:i:s');
$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM tbl_product WHERE p_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['p_walkin_price'];
$name=$row['p_name'];
$p=$row['p_old_price'];
$qty=$row['p_qty'];
}

//edit qty
$sql = "UPDATE tbl_product 
        SET p_qty=p_qty-?
		WHERE p_id=?";
$q = $db->prepare($sql);
$q ->execute(array($c,$b));
$d= $asasa*$c;
$profit = $asasa - $p;
$profit1 = $profit * $c;

// query
if($c < $qty)
{
    $i = 0;
    $statementsel = $db->prepare("SELECT * FROM tbl_salesorder_pos WHERE product=? AND invoice = '".$_POST['invoice']."'");
    // var_dump($statementsel);
    // die();
	$statementsel->execute(array($b));
	$totalsel = $statementsel->rowCount();
	$resultsel = $statementsel->fetchAll(PDO::FETCH_ASSOC);

    if(count($resultsel) > 0){
        $qyt = 0;
        $amountss = 0;
        $qyt = $resultsel[0]['qty'] + $c;
        $amountss = $resultsel[0]['amount'] + $d;
        $totalProfit = $resultsel[0]['profit'] * $qyt;
        $statement = $db->prepare("UPDATE tbl_salesorder_pos t1 
                                        JOIN tbl_salesoverall t2 SET 
                                        t1.qty='".$qyt."',
                                        t1.amount='".$amountss."',
                                        t1.totalProfit='".$totalProfit."',
                                        
                                        t2.quantity= '".$qyt."',
                                        t2.total_amount='".$amountss."',
                                        t2.totalProfit='".$totalProfit."'
                                        
                                        WHERE t1.product='".$b."'
                                        AND t2.product_id='".$b."'
                                        AND t1.invoice = '".$a."'
                                        AND t2.invoice_payment_id = '".$a."'");
    $statement->execute();
    }
    else{
    $sql = "INSERT INTO tbl_salesorder_pos 
                        (invoice,
                        product,
                        qty,
                        amount,
                        p_name,
                        p_current_price,
                        profit,
                        totalProfit,
                        date) 
                        VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,
                          ':b'=>$b,
                          ':c'=>$c,
                          ':d'=>$d,
                          ':e'=>$name,
                          ':f'=>$asasa,
                          ':g'=>$profit,
                          ':h'=>$profit1,
                          ':i'=>$date));
                          
    $statement = $db->prepare("SELECT * FROM tbl_salesorder_pos WHERE invoice=?");
    $statement->execute(array($a));
    $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result2 as $row2) {
        $transid = $row2['transaction_id'];
        $invoice = $row2['invoice'];
    }
   
    $sql = "INSERT INTO tbl_salesoverall
                        (invoice_payment_id,
                        product_id,
                        quantity,
                        total_amount,
                        product_name,
                        product_price,
                        profit,
                        totalProfit,
                        date,
                        order_id)
                        VALUES(:a,:b,:c,:d,:e,:f,:g,:h,:i,:id)";
        $q = $db ->prepare($sql);
        $q->execute(array(':a'=>$a,
                          ':b'=>$b,
                          ':c'=>$c,
                          ':d'=>$d,
                          ':e'=>$name,
                          ':f'=>$asasa,
                          ':g'=>$profit,
                          ':h'=>$profit1,
                          ':i'=>$date,
                          ':id'=>$transid));
}
header("location: sales.php?id=$w&invoice=$a");
}
elseif ($qty > $c) {
    echo '<script>alert("Out of Stocks Products")</script>';
}
?>