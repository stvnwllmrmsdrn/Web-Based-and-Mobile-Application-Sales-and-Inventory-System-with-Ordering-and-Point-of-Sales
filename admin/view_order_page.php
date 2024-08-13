<?php require_once('header.php'); ?>

<link rel="shortcut icon" href="img/favicon.png">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
	  .content{
		width: 80%;
		background: #ecf0f5;
	  }

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<?php

		$payment_date = date('Y-m-d H:i:s');
        $date = strtotime($payment_date);

		$i=0;
	    $statement = $pdo->prepare("SELECT * FROM tbl_order ORDER BY id");
	    $statement->execute();
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row5) {
	    	$i++;
	    	$order_p_id[$i] = $row5['product_id'];
            $order_p_name[$i] = $row5['product_name'];
	    	$order_p_qty[$i] = $row5['quantity'];
            $order_p_price[$i] = $row5['unit_price'];
        }

        $i=0;
	    $statement = $pdo->prepare("SELECT * FROM tbl_product");
	    $statement->execute();
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row3) {
	    	$i++;
	    	$arr_p_id[$i] = $row3['p_id'];
	    	$arr_p_name[$i] = $row3['p_name'];
	    	$arr_p_qty[$i] = $row3['p_qty'];
	    	$arr_p_sup_price[$i] = $row3['p_old_price'];
	    	$arr_p_selling_price[$i] = $row3['p_current_price'];


        }
        
        for($i=1;$i<=count($order_p_id);$i++) {

            $p_qty = $order_p_qty[$i];
            
            for($j=1;$j<=count($arr_p_id);$j++)
            {
                if($arr_p_id[$j] == $order_p_id[$i]) 
                {
                    $selling_price =  $arr_p_selling_price[$j];
                    $supplier_price = $arr_p_sup_price[$j];
                    $p_id = $arr_p_id[$j];
                    $p_name = $arr_p_name[$j];
                    break;
                }
            }
		$amount = $selling_price * $p_qty; 
        $profit = $selling_price - $supplier_price;
        $total_profit = $profit * $p_qty;
		$statement = $pdo->prepare("SELECT * FROM tbl_payment ORDER BY id");
	    $statement->execute();
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row6) {
	    	
	    	$cust_id= $row6['customer_id'];
	    	$cust_name= $row6['customer_name'];
	    	$cust_email= $row6['customer_email'];
	    	$payment_date= $row6['payment_date'];
	    	$paid_amount= $row6['paid_amount'];
	    	$payment_method= $row6['payment_method'];
	    	$payment_method= $row6['payment_method'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
	    $statement->execute(array($cust_id));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row7) {
	    	
	    	$cust_id= $row7['cust_id'];
	    	$cust_cname= $row7['cust_cname'];
	    	$cust_address= $row7['cust_address'];
	    	$cust_contact= $row7['cust_phone'];
	    	$cust_city= $row7['cust_s_city'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost WHERE city_id=?");
	    $statement->execute(array($cust_city));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row8) {
	    	
	    	// $cust_city= $row8['cust_city'];
	    	$shipping= $row8['amount'];
        }
	}

?>
<section class="content-header">
	<div class="content-header-left">
	<h1>View Online Orders</h1>
	</div> 
	<a href ="order.php" class="btn btn-primary btn-l" style="float:right;">Back</a>
<!--    <div>-->
<!--<a href ="PrintOrders.php" style ="float:right;" class="btn btn-success btn-sm"> Print</a>-->
<!--</div>-->
</section>

<section class="content">
<?php 
$statement = $pdo->prepare("SELECT * FROM tbl_payment ORDER BY payment_id DESC");
$statement->execute();
$result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result4 as $row6) {
	
	$cust_id= $row6['customer_id'];
	$cust_name= $row6['customer_name'];
	$cust_email= $row6['customer_email'];
	$payment_date= $row6['payment_date'];
	$paid_amount= $row6['paid_amount'];
	$payment_method= $row6['payment_method'];
	$payment_method= $row6['payment_method'];
?>
	<!-- <section style="padding: 6%;">
		<div class="content" id="content">
			<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">

				
			<div style="width: 100%; margin-top: 70px;"> -->
<div class="content" id="content">
<div class="box box-info">
<div style="margin: 0 auto; padding: 20px; width: 80%; font-weight: normal;">
				<table border="3" cellpadding="4"style="border: 1px solid black; text-align:right;" cellspacing="0" style="font-family: arial; font-size: 14px;	text-align:left;" width="100%">
					<thead >
						<tr><h3>ORDER ID#:<?php echo $row6['payment_id']; ?></h3></tr>
						<tr>
						    <th width ="3%"><p style="text-align: center;">#</th>
							<th width ="10%"> <p style="text-align: center;">Photo </th>
							<th width ="20%"><p style="text-align: center;"> Product Name </th>
							<th width ="15%"><p style ="text-align: center;"> Unit of Measurement </th>
							<th width ="10%"><p style ="text-align: center;"> Color </th>
							<th width ="15%"><p style ="text-align: center;"> Price </th>
							<th width ="10%"><p style ="text-align: center;"> Quantity </th>
							<th width ="15%"><p style ="text-align: center;"> Amount </th>
						</tr>
						<?php 
						$i=0;
						$statement = $pdo->prepare("SELECT 	t1.id,
															t1.product_id,
															t1.product_name,
															t1.size,
															t1.color,
															t1.quantity,
															t1.unit_price,
															t1.payment_id,

															t2.p_id,
															t2.p_name,
															t2.p_featured_photo

															FROM tbl_order t1
															JOIN tbl_product t2
															ON t1.product_id = t2.p_id
															WHERE payment_id=?");
						$statement->execute(array($row6['payment_id']));
						$result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
						foreach ($result4 as $row5) {
							$i++;
							$order_p_id[$i] = $row5['product_id'];
							$order_p_name[$i] = $row5['product_name'];
							$order_p_size[$i] = $row5['size'];
							$order_p_color[$i] = $row5['color'];
							$order_p_qty[$i] = $row5['quantity'];
							$order_p_price[$i] = $row5['unit_price'];
							$amount = $order_p_price[$i] * $order_p_qty[$i]; 
						?>
					</thead>
					
					<tbody >
							<tr class="record">

								<td><p style="text-align: center;"><?php echo $i ?>
									
								<td style="text-align: center;"><img src="../assets/uploads/<?php echo $row5['p_featured_photo']; ?>" alt="" width="80" class="img-fluid"></a>
								</td>
								<td><b><p  style="text-align: center;"><?php echo $order_p_name[$i]; ?></td>
								<td><b><p style="text-align: center;"><?php echo $order_p_size[$i]; ?></td>
								<td><b><p style="text-align: center;"><?php echo $order_p_color[$i]; ?></td>
								<td><b><p style ="float:right;padding-right:5px;">₱ <?php echo formatMoney($order_p_price[$i], true); ?> </b></td>
								<td><b><p style="text-align: center;"><?php echo $order_p_qty[$i]	; ?></b></td>
								<td style="text-align:right;"><b>₱
								<?php echo formatMoney($amount, true);
								?></b>
								</td>
							</tr>
						<?php
							}
						?>
							<tr><td></td></tr>
							<tr>
								<td colspan="7" style=" text-align:right;border-style: hidden;padding-top:20px;"><strong style="font-size: 14px;">VATable Sales: &nbsp;</strong></td>
								<td colspan="2" style="text-align:right;border-style: hidden;padding-top:20px;">₱ <strong style="font-size: 14px;">
								<?php

								$vat = $paid_amount / 1.12 - $shipping;
								$vatt = $vat * .12;

								echo formatMoney($vat, true);
								?>
								</strong></td>
								
							</tr>
							<tr>
								<td colspan="7" style="text-align:right;border-style: hidden;"><strong style="font-size: 14px;">VAT-Exempt Sales: &nbsp;</strong></td>
								<td colspan="2" style="text-align:right;border-style: hidden;">₱<b> 0.00</b> <strong style="font-size: 14px;">
							</tr>
							<tr>
								<td colspan="7"  style="text-align:right;border-style: hidden;"><strong style="font-size: 14px;">Zero Rated Sales: &nbsp;</strong></td>
								<td colspan="2" style="text-align:right;border-style: hidden;">₱<b> 0.00</b>  <strong style="font-size: 14px;">
							</tr>
							<tr>
								<td colspan="7" style=" text-align:right;border-style: hidden;"><strong style="font-size: 14px;">VAT Amount: &nbsp;</strong></td>
								<td colspan="2" style="text-align:right;border-style: hidden;">₱<strong style="font-size: 14px;"><?php echo formatMoney($vatt, true); ?>
							</tr>
							<tr>
								<td colspan="7" style=" text-align:right;border-style: hidden;"><strong style="font-size: 14px;">Discount (%) : &nbsp;</strong></td>
								<td colspan="2" style="text-align:right;border-style: hidden;">₱ <strong style="font-size: 14px;">0.00</strong></td>
							</tr>
							<tr>
								<td colspan="7" style=" text-align:right;border-style: hidden;"><strong style="font-size: 14px;">Delivery Fee: &nbsp;</strong></td>
								<td colspan="2" style="text-align:right;border-style: hidden;">₱ <strong style="font-size: 14px;"><?php echo formatMoney($shipping, true); ?></strong></td>
							</tr>
								<tr><td></td></tr>
							<tr>
								<td colspan="7" style=" text-align:right;border-style: hidden;"><strong style="font-size: 14px;">Total Sales: &nbsp;</strong></td>
								<td colspan="2" style="text-align:right;border-style: hidden;">₱ <strong style="font-size: 14px;"><?php echo formatMoney($paid_amount, true); ?></strong></td>
							</tr>
							<tr>
								<td colspan="7"style=" text-align:right;border-style: hidden;"><strong style="font-size: 14px;">Total Amount Paid:&nbsp;</strong></td>
								<td colspan="2" style="text-align:right;border-style: hidden;">₱ <strong style="font-size: 14px; color: #222222;"><?php echo formatMoney($paid_amount, true); ?></strong></td>
							</tr>

							<tr>
								
							</tr>
					
					</tbody>
				
				</table><b><br><br>
			</div>
		</div>
		</div>
	

<?php }?>
</section>
	





</div>

</div>
</div>

</div>
</div>
<section>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 98%; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>