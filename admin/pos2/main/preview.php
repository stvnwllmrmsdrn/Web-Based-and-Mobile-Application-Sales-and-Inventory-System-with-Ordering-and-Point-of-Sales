<!DOCTYPE html>
<html>
<head>
<?php require_once ('auth.php');?>
<title>
Standly Hardware - Receipt
</title>
<link rel="shortcut icon" href="img/favicon.png">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<?php
$invoice=$_GET['invoice'];
include('../connect.php');
$result = $db->prepare("SELECT
						t1.transaction_id,
						t1.name,
						t1.cust_contact,
						t1.discount_status,
						t1.cust_address,
						t1.invoice_number,
						t1.date,
						t1.due_date,
						t1.cashier,
						t1.type,
						t1.amount_pos,
						t1.shipping_id,
						t1.finalTotalAmount,

						t2.d_id,
						t2.d_status,

						t3.p_qty,
						t3.p_name,
						t3.p_id,

						t4.shipping_cost_id
				
			
					    FROM tbl_product t3
						LEFT JOIN tbl_sales_pos t1
						ON t1.invoice_number= :userid
						LEFT JOIN tbl_delivery_status t2
						ON t2.d_status = t1.delivery_status
						LEFT JOIN tbl_shipping_cost t4
						ON t4.shipping_cost_id = t1.shipping_id
						LEFT JOIN tbl_city t5
						ON t4.city_id = t5.city_id
						WHERE t1.transaction_id");

$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$qty1 = $row['p_qty'];
$cust_contact =$row['cust_contact'];
$shipping = $row['shipping_id'];
$discount = $row['discount_status'];
$cust_add = $row['cust_address'];
$invoice=$row['invoice_number'];
$date= date('F d, Y | h:i:s A', strtotime($row['date']));
$cash=$row['due_date'];
$cashier=$row['cashier'];
$pt=$row['type'];
$am=$row['amount_pos'];
if($pt=='cash'){
$amount=$cash < $am;
}
}
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='ST-'.createRandomPassword();
?>
<body>

<?php include('navfixed.php');?>
	
	<!--/span-->
		
	<div class="span10">
	<a href="./sales_inventory.php?d1=&d2="<?php echo $finalcode ?>"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back </button></a>

<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	<center><img src="img/logo.png" alt="Standley's logo" width="320" height="70"><br>
	<div style="font:bold 25px 'Aleo';">Customer Official Receipt</div>
	<i><b>Standly Hardware</b></i>	<br>
GML Commercial Building, MC Arthur Highway, Saluysoy, Meycauayan Bulacan	<br> Contact/Viber: 09270053202	<br>Facebook: Standly Hardware<br>Website: Standlyhardware.com<br><br>
	</center>
	<div>
	<?php
	
	?>
	</div>
	</div>
	<div style="width: 350px; float: left; height: 120px;">
	<table cellpadding="4" cellspacing="4" style="font-family: arial; font-size: 14px;text-align:left;width : 100%;">

		<tr>
			<td><b>Official Receipt No.:</td>
			<td><?php echo '<span style="color:red;">' .$invoice ?></td>
		</tr>
		<tr>
			<td><b>Customer Name:</td>
			<td><?php echo $cname ?></td>
		</tr>
		<tr>
			<td><b>Address:</td>
			<td><?php echo $cust_add ?></td>
		</tr>
		<tr>
			<td><b>Contact Number:</td>
			<td><?php echo $cust_contact ?></td>
		</tr>
	</table>
	
	</div>

	<div style="width: 250px; float: right; height: 110px;">
	<table cellpadding="4" cellspacing="4" style="font-family: arial; font-size: 14px;text-align:left;width : 100%;">

	<tr>
			<td><b>Date Issued:</td>
			<td><?php echo $date ?></td>
		</tr>
		<tr>
			<td><b>Cashier:</td>
			<td><?php echo $cashier ?></td>
		</tr>
		
		<tr>
			<td><b>TIN:</td>
			<td><?php  ?></td>
		</tr>
	
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 100%; margin-top: 70px;">
	<table border="3" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 14px;	text-align:left;" width="100%">
		<thead>
			<tr>
			<th width ="0.5%">#</th>
				<th> Product Name </th>
				<th><p style ="float:right;"> Price </th>
				<th><p style ="float:right;"> Quantity </th>
				<th width ="15%"><p style ="float:right;"> Amount </th>
			</tr>
		</thead>
		<tbody>
			
		<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT 
						so.qty, 
						so.p_name,
						so.p_current_price,
						so.amount,
						sum(so.amount),
						so.product,

						p.p_qty,
						p.p_id,
						p.p_name
					
						FROM tbl_salesorder_pos so
						JOIN tbl_product p
						ON so.product = p.p_id
						WHERE p.p_id AND invoice= :userid 
						GROUP BY product");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=1; $row1 = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $i ?>
				<td><b><?php echo $row1['p_name']; ?></td>
				
				<td><p style ="float:right;">₱
				<?php
				$ppp=$row1['p_current_price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				<td><p style ="float:right;"><?php 
			    $qty11 = $row1['qty']; 
			    echo $qty11;
	
			?></td>
				<td style="text-align:right;">₱
				<?php
				$dfdf=$row1['sum(so.amount)'];
				$total = $ppp * $qty11;
				echo formatMoney($total, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
				<tr><td></td></tr>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">VATable Sales: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱ <strong style="font-size: 14px;">
					<?php

					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM tbl_salesorder_pos WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $row = $resultas->fetch(); $i++){
					$fgfg=$row['sum(amount)'];
					$vat = $fgfg / 1.12;
					echo formatMoney($vat, true);
					}
					?>
					</strong></td>
					
				</tr>
				<tr>
					<td colspan="4" style="text-align:right;">VAT-Exempt Sales: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱<b> 0.00</b> <strong style="font-size: 14px;">
				</tr>	
				<tr>
					<td colspan="4"  style="text-align:right;""><strong style="font-size: 14px;">Zero Rated Sales: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱<b> 0.00</b>  <strong style="font-size: 14px;">
				</tr>	
				<?php 
					?>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">VAT Amount: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱<strong style="font-size: 14px;">
					<?php

					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(so.amount_pos),
														so.transaction_id, 
														so.discount_status, 
														so.invoice_number,

														d.discount, 
														d.discount_id, 
														d.discount_name
														
														FROM tbl_sales_pos so
														JOIN tbl_discount d
														ON so.discount_status = d.discount_id 
														JOIN tbl_discount ds
														ON so.invoice_number = :a
														WHERE d.discount");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $row = $resultas->fetch(); $i++){
					$discount2=$row['discount'];
					$vatt = $vat * .12;
					echo formatMoney($vatt, true);
					}
					?>
					</strong></td>
					
				</tr>

				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">Discount (<?php echo $discount2 ?>%) : &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱<strong style="font-size: 14px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(so.amount_pos),
														so.transaction_id, 
														so.discount_status, 
														so.invoice_number,
														so.shipping_id,
														so.finalTotalAmount,
														so.amount_pos,

														d.discount, 
														d.discount_id

														FROM tbl_sales_pos so
														JOIN tbl_discount d
														ON so.discount_status = d.discount_id 
														AND so.invoice_number = :a
														WHERE d.discount
														ORDER BY so.transaction_id DESC");
					
					
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $row = $resultas->fetch(); $i++){
					$df = $row['amount_pos'];
					$finalDiscount1 = $row['finalTotalAmount'];
					$finalDis = ($df - $finalDiscount1);
					echo formatMoney($finalDis, true);
					}
					?>
					</strong></td>
					
				</tr>

				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">Delivery Fee: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱ <strong style="font-size: 14px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT 
														so.transaction_id, 
														so.shipping_id, 
														so.invoice_number,

														s.shipping_cost_id,
														s.amount
														
														FROM tbl_sales_pos so
														JOIN tbl_shipping_cost s
														ON so.shipping_id = s.shipping_cost_id 
														
														AND so.invoice_number = :a
														WHERE s.shipping_cost_id
														ORDER BY so.transaction_id DESC");
					
					
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $row = $resultas->fetch(); $i++){
					$df1 = $row['amount'];
					echo formatMoney($df1, true);
					}
					?>
					</strong></td>
				</tr>
					<tr><td></td></tr>
				<tr>
				<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">Total Sales: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱ <strong style="font-size: 14px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(so.amount_pos),
														so.transaction_id, 
														so.discount_status, 
														so.invoice_number,
														so.shipping_id,
														so.finalTotalAmount
														
														FROM tbl_sales_pos so
														WHERE so.invoice_number = :a
														ORDER BY so.transaction_id DESC");
														
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $row = $resultas->fetch(); $i++){
					$TotalS=$row['finalTotalAmount'];
					echo formatMoney($TotalS, true);
					}
					?>
					</strong></td>
					
				</tr>
				<?php 
				if($pt=='cash'){
				?>
				<tr>
					<td colspan="4"style=" text-align:right;"><strong style="font-size: 14px;">Total Amount Paid:&nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱ <strong style="font-size: 14px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px; color: #222222;">
					<font style="font-size:20px; color: #222222;">
					<?php
					if($pt=='cash'){
					echo 'Change:';
					}
					?>&nbsp;
					</strong></td>
					<td colspan="2" style="text-align:right;">₱ <strong style="font-size: 16px; color: #222222;">
					<?php
					function formatMoney($number, $fractional=false) {
						if ($fractional) {
							$number = sprintf('%.2f', $number);
						}
						while (true) {
							$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
							if ($replaced != $number) {
								$number = $replaced;
							} else {
								break;
							}
						}
						return $number;
					}

					if($pt=='cash'){
					$change = $cash - $TotalS;
					echo formatMoney($change, true);
					}
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table><b><br>
	<center><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBy:____________________________</center>
	<center><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Signature over printed name</center>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(OWNER)<br>
	<br><center><h4><i>"THIS OFFICIAL RECEIPT SHALL BE VALID FOR FIVE (5) YEARS FROM THE DATE OF ATP" </i></h4></div>
	</di
	</div>
	</div>
	</div>
</div>
</div>
	<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	


