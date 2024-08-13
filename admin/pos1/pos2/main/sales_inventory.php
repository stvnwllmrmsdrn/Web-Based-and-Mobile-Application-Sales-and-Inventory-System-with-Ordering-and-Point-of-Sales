<html>
<head>
<title>
POS
</title>
<link rel="shortcut icon" href="img/favicon.png">
<?php 
require_once('auth.php');
?>

 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
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
timeValue += (hours >= 12) ? " PM" : " AM"
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


<?php include('navfixed.php');?><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> POINT OF SALES REPORTS
			</div>
			<ul class="breadcrumb">
			<h4><li><a href="index.php">Dashboard</a></li> /
			<li class="active">Point of Sales Reports</li></ul>
<a href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
	<div style="float:right;">		
</div>
<br><br>
<form action="sales_inventory.php" method="get">
<center><strong>From : <input type="text" style="width: 225px; padding:15px;" name="d1" class="tcal" value="Date from" />&nbsp&nbsp&nbsp&nbsp&nbsp    To: <input type="text" style="width: 225px; padding:15px;" name="d2" class="tcal" value="Date to" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:16px;margin-bottom: 15px;">
Point of Sales Reports <br> Date from: <?php echo $_GET['d1'] ?> to <?php echo $_GET['d2'] ?>
</div>
<div>
<?php 
			include('../connect.php');
			$d1=$_GET['d1'];
			$d2=$_GET['d2'];
			$resultas = $db->prepare("SELECT sum(amount) from tbl_sales_pos WHERE date BETWEEN :a AND :b");
			$resultas->bindParam(':a', $d1);
			$resultas->bindParam(':b', $d2);
			$resultas->execute();
			for($i=0; $rowas = $resultas->fetch(); $i++){
			$fgfg=$rowas['sum(amount)']; 
			
			}
			?>
				<?php 
			include('../connect.php');
			$d1=$_GET['d1'];
			$d2=$_GET['d2'];
			$resultas = $db->prepare("SELECT sum(profit) from tbl_salesorder_pos WHERE date BETWEEN :c AND :d");
			$resultas->bindParam(':c', $d1);
			$resultas->bindParam(':d', $d2);
			$resultas->execute();
			for($i=0; $rowas = $resultas->fetch(); $i++){
			$fgfg1=$rowas['sum(profit)'];
			
			}
			?>
			<div style="text-align:right;">
			<h4>Total Amount:  <font style="color:red;; font:bold 22px 'Aleo';"><?php echo formatMoney($fgfg, true);?></font>
			<br>
			Total Profit: <font style="color:red;; font:bold 22px 'Aleo';"><?php echo formatMoney($fgfg1, true);?></font>

		</div>
<h4>Search:</h4>
<input type="text" style="padding:20px;" name="filter" value="" id="filter" placeholder="Search here..." autocomplete="off" />
<button  style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</button></a>


<div class="content" id="content">
<br><br><br>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
<thead>
		<tr>
			<th width ="25%">Customer Details</th>
			<th width ="20%">Product Details</th>
			<th width ="20%">Payment Information</th>
			<th width ="20%"> Amount </th>
			<th width ="20%"> Profit </th>
			<th width ="20%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
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
				
				include('../connect.php');
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$result = $db->prepare("SELECT s.transaction_id,
				 							   s.name, 
											   s.cashier, 
											   s.cust_contact, 
											   s.cust_address, 
											   s.invoice_number, 
											   s.date, 
											   s.type,
											   s.amount,

											   so.p_current_price, 
											   so.qty,  
											   so.profit,
											   so.p_name,  
											   so.order_details,
											   so.invoice
						
											   
											   FROM tbl_salesorder_pos so 
											   JOIN tbl_sales_pos AS s 
											   ON s.invoice_number = so.invoice
											   ORDER BY transaction_id DESC");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			
				
			?>
			
			<tr class="record">
				
<?php /*CUSTOMER DETAILS*/?>
			<td><b>Customer Name:</b><br> <?php echo $row['name']; ?><br>
			<b>Contact Number: </b><?php echo $row['cust_contact']; ?><br>
			<b>Address: </b><?php echo $row['cust_address']; ?></td>
<?php /*PRODUCT DETAILS*/?>
<td><?php

                           $result1 = $db->prepare("SELECT * FROM tbl_salesorder_pos WHERE invoice=?");
						   $result1->execute(array($row['invoice']));
                           $result1->execute();
						   for($i=0; $row1 = $result1->fetch(); $i++){
			
                                echo '<b>Product: </b> '.$row1['p_name'];
                                echo '<br><b>Quantity: </b>'.$row1['qty'];
                                echo '<br> <b>Unit Price:</b> '.formatMoney ($row1['p_current_price'], true).'';
                                echo '<br><br>';
                           }
                           ?>      </td> 
<?php /*PAYMENT DETAILS*/?>

			<td><b>Payment Method: </b><?php echo '<span style="color:red;">' .$row['type']; ?><br></span>
			<b>Transaction ID: </b><?php echo $row['transaction_id']; ?><br>
			<b>Invoice Number: <br></b><?php echo $row['invoice_number']; ?><br>
			<b>Date: </b> <?php echo $row['date']; ?><br>
			<b>Cashier: </b> <?php echo $row['cashier']; ?></td>
<?php /*TOTAL AMOUNT*/?>
			<td>₱ <?php
			$p_old_price=$row['amount'];
			echo formatMoney($p_old_price, true);
			?></td>
<?php /*PROFIT*/?>
				<td>₱ <?php
			$profit=$row['profit'];
			echo formatMoney($profit, true);
			?></td>
<?php /*RECEIPT*/			?>
			<td>
			<button class="btn btn-info btn-small"><a href ="preview1.php?invoice=<?php echo $row['invoice_number'];?>"> View Receipt</a>
			</td>

				<?php }  ?>
			
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesalesinventory.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>