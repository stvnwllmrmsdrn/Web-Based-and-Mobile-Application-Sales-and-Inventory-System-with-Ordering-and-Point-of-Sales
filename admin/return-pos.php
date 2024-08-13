<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	$statement = $pdo->prepare("SELECT *, SUM(amount) as amountTotal FROM tbl_salesorder_pos WHERE transaction_id=?");
	$statement->execute(array($_POST['postID']));
	$totalsel = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row){
	    $transactionid = $row['transaction_id'];
	    $invoice = $row['invoice'];
	    $productid = $row['product'];
	    $qty = $row['qty'];
	    $totalamount = $row['amount'];
	    $totalamounted = $row['amountTotal'];
	    $profittt = $row['profit'];
	    $totalprofit = $row['totalProfit'];
	    $price = $row['p_current_price'];
	}
	
	$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
	$statement->execute(array($productid));
	$result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result1 as $row1){
	    $pid = $row1['p_id'];
	    $walkprice = $row1['p_walkin_price'];
	    $supplierprice = $row1['p_old_price'];
	}
	
	$statement = $pdo->prepare("SELECT * FROM tbl_sales_pos WHERE invoice_number=?");
	$statement->execute(array($invoice));
	$result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result2 as $row2){
	    $invoice_number = $row2['invoice_number'];
	    $amount_pos = $row2['amount_pos'];
	    $finalTotalAmount = $row2['finalTotalAmount'];
	    $discount = $row2['discount_status'];
	    $shippingfee = $row2['shipping_id'];
	}
	
	$statement = $pdo->prepare("SELECT * FROM tbl_salesoverall WHERE order_id=?");
	$statement->execute(array($transactionid));
	$result3 = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result3 as $row3){
	    $invoice_pay_id = $row3['invoice_payment_id'];
	    $orderidd = $row3['order_id'];
	    $quantity = $row3['quantity'];
	    $totalAmount = $row3['total_amount'];
	    $totalProfit = $row3['totalProfit'];
	    $profit = $row3['profit'];
	}
	
	$statement = $pdo->prepare("SELECT * FROM tbl_salesoverall_info WHERE invoice_payment_id=?");
	$statement->execute(array($invoice_pay_id));
	$result4 = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result4 as $row4){
	    $invoice_payy_id = $row4['invoice_payment_id'];
	    $total_amount = $row4['total_amount'];
	    $finalTotalAmountpos = $row4['finalTotalAmount_pos'];
	}
	
	$statement = $pdo->prepare("SELECT * FROM tbl_discount WHERE discount_id=?");
	$statement->execute(array($discount));
	$result5 = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result5 as $row5){
	    $dis_id = $row5['discount_id'];
	    $discount_name = $row5['discount_name'];
	    $discounted = $row5['discount'];
	    $discountedd = ($row5['discount']/100);
	}
	
	$statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost WHERE shipping_cost_id=?");
	$statement->execute(array($shippingfee));
	$result6 = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result6 as $row6){
	    $ship_id = $row6['shipping_cost_id'];
	    $cityid = $row6['city_id'];
	    $ShipAmount = $row6['amount'];
	}
	
	$statement = $pdo->prepare("SELECT * FROM tbl_return_pos WHERE invoice_number=?");
	$statement->execute(array($transactionid));
	$result7 = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result7 as $row7){
	    $invoice_return = $row7['invoice_number'];
	    $return_quantity = $row7['return_quantity'];
	    $return_price = $row7['return_price'];
	    $totalReturn = $row7['return_totAmount'];
	    $orderidd = $row7['order_id'];
	    $totalprof = $row7['profit'];
	    $productIDD = $row7['product_id'];
	}
	
	//Current Quantity
	$totalqty = $qty - $_POST['qty'];
	
	//Total Profit
	$totProfitt = $profittt * $totalqty;
	
	//Current TotalAmount
    $total_amountt = $price * $totalqty;
    
    //Total Amount with Discount
    $totAmountDis = $totalamounted -($totalamounted * $discountedd);
    $totalFinal = $totAmountDis + $ShipAmount;
    $totalF = $totalamounted;
	
    if(empty($_POST['qty'] )) {
        $valid = 0;
        $error_message .= "Quantity can not be empty<br>";
    }
	if(empty($_POST['p_current_price'])) {
        $valid = 0;
        $error_message .= "Price can not be empty<br>";
    }
	if(empty($_POST['reason_id'])) {
        $valid = 0;
        $error_message .= "Return Reason can not be empty<br>";
    }
	if(empty($_POST['description_return'])) {
        $valid = 0;
        $error_message .= "Return Reason Description must not be empty<br>";
    }
	if($_POST['qty'] > $qty){
		$valid = 0;
        $error_message .= "Quantity should be less than on current value.<br>";
	}


    if($valid == 1) {

    $statement = $pdo->prepare("UPDATE tbl_salesorder_pos SET 
    qty='".$totalqty."',
    amount='".$total_amountt."',
    totalProfit='".$totProfitt."'
    WHERE transaction_id='".$_POST['postID']."'");
    $statement->execute();
    
    $statement = $pdo->prepare("UPDATE tbl_salesoverall SET 
    quantity='".$totalqty."',
    total_amount='".$total_amountt."',
    totalProfit='".$totProfitt."'
    WHERE order_id='".$orderidd."'");
    $statement->execute();
    
    $statement = $pdo->prepare("UPDATE tbl_salesoverall_info SET 
    total_amount='".$totalF."',
    finalTotalAmount_pos='".$totalFinal."'
    WHERE invoice_payment_id='".$invoice_pay_id."'");
    $statement->execute();
    
    $statement = $pdo->prepare("UPDATE tbl_sales_pos SET 
    amount_pos ='".$totalF."',
    finalTotalAmount ='".$totalFinal."'
    WHERE invoice_number='".$invoice."'");
    $statement->execute();
    // echo '<pre>';
    // var_dump($statement);
    // echo '</pre>';
    // die();
    if($statement->execute()){
   
    $amountTotal = $_POST['p_current_price'] * $_POST['qty'];
    $statement = $pdo->prepare("INSERT INTO tbl_return_pos(
					invoice_number,
					reason_id,
					return_product_name,
					return_quantity,
					return_price,
					return_totAmount,
					return_date,
					description_return,
					order_id,
					profit,
					product_id
				) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $statement->execute(array(
					$_REQUEST['id'],
					$_POST['reason_id'],
					$_POST['p_name'],
					$_POST['qty'],
					$_POST['p_current_price'],
					$amountTotal,
					date('Y-m-d h:i:s'),
					$_POST['description_return'],
					$_POST['postID'],
					$profittt,
					$productid
				));
                }
                
            	$success_message = 'The product successfully return.';
    }
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_salesorder_pos WHERE invoice=?");
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
		<h1>Point of Sales Return Product</h1>
	</div>
	<div class="content-header-right">
		<a href="sales-pos.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php

$statement = $pdo->prepare("SELECT
							t1.transaction_id as posID,
							t1.p_name,
							t1.qty,
							SUM(t1.qty) as totalQuant,
							t1.amount,
							SUM(t1.amount) as totalAmount,
							t1.product,
							t1.invoice,
							t1.date,
							t1.reason_id, 
							t1.p_current_price
							FROM tbl_salesorder_pos t1
							WHERE invoice=?
							GROUP BY product");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

			
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
			<?php foreach ($result as $row1) :
				$posID = $row1['posID'];
				$p_name = $row1['p_name'];
				$p_current_price = $row1['p_current_price'];
				$qty = $row1['totalQuant'];
				$amount = $row1['totalAmount'];
				$product = $row1['product'];
				$reasonid = $row1['reason_id'];
				$invoice = $row1['invoice'];
				$date = $row1['date'];
				$date_today = date("m/d/y");
				$totalamount = $p_current_price * $qty;
		
			?>
			<?php
			    $i = 0;
				$statement = $pdo->prepare("SELECT * 
										FROM tbl_product t1
										JOIN tbl_salesorder_pos t2
										ON t2.product = t1.p_id
										WHERE t2.invoice=?");
				$statement->execute(array($row1['invoice']));
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row) $i++; { 	
					$p_id1	 = $row['product'];
				}

				$statementss = $pdo->prepare("SELECT * FROM tbl_reason WHERE id=?");
				$statementss->execute(array($_REQUEST['id']));
				$resultss = $statementss->fetchAll(PDO::FETCH_ASSOC);							
				foreach ($resultss as $rowss) {
					$reason_id[] = $rowss['id'];
				}
			?>
			<?php if($qty != 0):?>
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<input type="hidden" value="<?php echo $posID?>" name="postID" date="postID">
				
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							
							<label for="" class="col-sm-3 control-label">Product<br><span style="font-size:10px;font-weight:normal;"></span></label>
							<div class="col-sm-4">
								<input type="text" name="p_name" class="form-control" value="<?php echo $p_name; ?>"readonly>
							</div>
						</div>
						<div class="form-group">
							
							<label for="" class="col-sm-3 control-label">Quantity<br><span style="font-size:10px;font-weight:normal;"></span></label>
							<div class="col-sm-4">
								<input type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    title="Numbers only" name="qty" class="form-control" value="<?php echo $qty; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Price <span>*</span></label>
							<div class="col-sm-4">
								<input type="number" name="p_current_price" class="form-control" value="<?php echo $p_current_price ?>"readonly>
		                    
							</div>
						</div>	
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Amount <span>*</span><br><span style="font-size:10px;font-weight:normal;"></span></label>
							<div class="col-sm-4">
								<input type="number" name ="amount" class="form-control" value="<?php echo $totalamount; ?>"readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Date <span></span><br><span style="font-size:10px;font-weight:normal;"></span></label>
							<div class="col-sm-4">
								<input type="text" name="date" class="form-control" value="<?php echo date('F d, Y',strtotime($date_today)); ?>"readonly>
							</div>
						</div>
					
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Return Reason <span>*</span></label>
							<div class="col-sm-4">
								<select name="reason_id" class="form-control select2 top-cat">
		                            <option value="">Select Reason</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM tbl_reason ORDER BY id ASC");
		                            $statement->execute();
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) {
		                                ?>
		                                <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $reasonid){echo 'selected';} ?>><?php echo $row['reason']; ?></option>
		                                <?php
		                            }
		                            ?>
		                        </select>
								</div>
								</div>
								<div class="form-group">
							<label for="" class="col-sm-3 control-label">Return Reason Description<span>*</span></label>
							<div class="col-sm-8">
								<textarea name="description_return" id="description_return" class="form-control" cols="30" rows="10" id="editor1"></textarea>
							</div>
						</div>
								<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Return</button>
						</div>
						</div>
					</div>
				</div>
			</form>
			<?php endif;?>
			<?php endforeach;?>
		</div>
	</div>
</section>

<?php require_once('footer.php'); ?>