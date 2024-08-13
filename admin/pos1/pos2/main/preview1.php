<!DOCTYPE html>
<html>
<head>
<?php require_once ('auth.php');?>
<title>
POS
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
$result = $db->prepare("SELECT * FROM tbl_sales_pos WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$cust_contact =$row['cust_contact'];
$discount = $row['discount'];
$cust_add = $row['cust_address'];
$invoice=$row['invoice_number'];
$date=$row['date'];
$cash=$row['due_date'];
$cashier=$row['cashier'];
$pt=$row['type'];
$am=$row['amount'];
if($pt=='cash'){
$cash=$row['due_date'];
$amount=$cash-$am;
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



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
<body>

<?php include('navfixed.php');?>
	
	<!--/span-->
		
	<div class="span10">
	<a href="sales_inventory.php?d1=&d2="><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	<center><img src="img/logo.png" alt="Standley's logo" width="320" height="70"><br>
	<div style="font:bold 25px 'Aleo';">Customer Official Receipt</div>
	<i><b>Standly Hardware</b></i>	<br>
Mary Ville Square, Mac Arthur Highway, Saluysoy, Meycauayan Bulacan	<br> Contact/Viber: 09270053202	<br>Facebook: Standly Hardware<br>Website: Standlyhardware.com<br><br>
	</center>
	<div>
	<?php
	
	?>
	</div>
	</div>
	<div style="width: 300px; float: left; height: 120px;">
	<table cellpadding="4" cellspacing="4" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<td><b>Official Receipt No.:</td>
			<td><?php echo $invoice ?></td>
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

	<div style="width: 150px; float: right; height: 110px;">
	<table cellpadding="4" cellspacing="4" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

	<tr>
			<td><b>Date Issued:</td>
			<td><?php echo $date ?></td>
		</tr>
		<tr>
			<td><b>Cashier:</td>
			<td><?php echo $cashier ?></td>
		</tr>
		<tr>
			<td><b>Discount:</td>
			<td><?php echo $discount ?></td>
		</tr>
	</table>
	
	</div>
    <br><br>
	<div class="clearfix"></div>
	</div>
	<div style="width: 100%; margin-top: 70px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
		<thead>
			<tr>
				<th> Product Name </th>
				<th> Price </th>
				<th> Quantity </th>
				<th> Amount </th>
			</tr>
		</thead>
		<tbody>
			
		<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM tbl_salesorder_pos WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><b><?php echo $row['p_name']; ?></td>
				
				<td>₱
				<?php
				$ppp=$row['p_current_price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				<td><?php echo $row['qty']; ?></td>
				<td>₱
				<?php
				$dfdf=$row['amount'];
				echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
				<tr><td style ="color: black"></td></tr>
				<tr>
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">VATable Sales: &nbsp;</strong></td>
					<td colspan="2">₱ <strong style="font-size: 12px;">
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
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">VAT-Exempt Sales: &nbsp;</strong></td>
					<td colspan="2"><b>₱ 0.00</b> <strong style="font-size: 12px;">
				</tr>	
				<tr>
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">Zero Rated Sales: &nbsp;</strong></td>
					<td colspan="2"><b>₱ 0.00</b>  <strong style="font-size: 12px;">
				</tr>	
				<?php 
					?>
				<tr>
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">VAT Amount: &nbsp;</strong></td>
					<td colspan="2">₱<strong style="font-size: 12px;">
					<?php

					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM tbl_salesorder_pos WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $row = $resultas->fetch(); $i++){
					$fgfg=$row['sum(amount)'];
					$vatable = $fgfg / 1.12;
					$vatt = $vatable * .12;
					echo formatMoney($vatt, true);
					}
					?>
					</strong></td>
					
				</tr>

				<tr>
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">Discount: &nbsp;</strong></td>
					<td colspan="2">₱<strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(so.amount), so.discount, d.discount, d.discount_id, d.discount_name, so.invoice FROM tbl_salesorder_pos as so, tbl_discount as d WHERE so.discount = d.discount ORDER BY discount_id = :discount ");
					$resultas->bindParam(':discount', $sdsd);
					$resultas->execute();
					for($i=0; $row = $resultas->fetch(); $i++){
					$fgfg=$row['sum(so.amount)'];
					$discount=$row['discount'];
					$totDiscount  = ($discount * $fgfg) / 100;
					$totalDiscount = $totDiscount - $fgfg;
					echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
					
				</tr>
			
				<tr>
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">Total Sales: &nbsp;</strong></td>
					<td colspan="2">₱ <strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM tbl_salesorder_pos WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $row = $resultas->fetch(); $i++){
					$fgfg=$row['sum(amount)'];
					echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
					
				</tr>
				<?php 
				if($pt=='cash'){
				?>
				<tr>
					<td colspan="3"style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Total Amount Paid:&nbsp;</strong></td>
					<td colspan="2">₱ <strong style="font-size: 12px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">
					<font style="font-size:20px;">
					<?php
					if($pt=='cash'){
					echo 'Change:';
					}
					if($pt=='credit'){
					echo 'Due Date:';
					}
					?>&nbsp;
					</strong></td>
					<td colspan="2">₱ <strong style="font-size: 15px; color: #222222;">
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
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($amount, true);
					}
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table><b><br>
	<center><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBy:____________________________</center>
	<center><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Authorized Signature</center>
	<center><p><i>"THIS OFFICIAL RECEIPT SHALL BE VALID FOR (5) YEARS FROM THE DATE OF ATP"</p>
	</div>
	</div>
	</div>
	</div>
	
	<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
</div>
</div>


