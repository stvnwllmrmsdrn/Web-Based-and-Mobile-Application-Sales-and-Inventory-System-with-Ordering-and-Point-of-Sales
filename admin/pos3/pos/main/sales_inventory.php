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
$finalcode='RS-'.createRandomPassword();
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
<?php include('navfixed.php');?><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> POS Sales Report
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li>
			</ul>
<br>

<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
	<div style="float:right;">		
<button  style="float:left;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</button></a>
</div>
<br>
<br>
<br>


<input type="text" style="padding:20px;" name="filter" value="" id="filter" placeholder="Search here..." autocomplete="off" />
<div class="content" id="content">
<br><br><br>
<strong>POS Sales Reports</strong>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width ="18%">Transaction ID</th>
			<th width ="15%">Invoice Number</th>
			<th width ="20%">Customer Name</th>
			<th> Date </th>
			<th width ="40%"> Product Name </th>
			<th width ="15%"> Payment Type </th>
			<th width ="20%">Price </th>
			<th> Quantity </th>
			<th width ="20%"> Total Amount </th>
			
			<th width ="15%"> Profit </th>
			<th> Action </th>
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
				$result = $db->prepare("SELECT s.transaction_id, s.name, s.invoice_number, so.date, so.p_name,so.p_current_price, so.qty, so.amount, s.profit, s.type FROM tbl_salesorder_pos AS so, tbl_sales_pos AS s WHERE so.transaction_id=s.transaction_id ORDER BY transaction_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['transaction_id']; ?></td>
			<td><?php echo $row['invoice_number']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['p_name']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td>₱ <?php
			$p_current_price=$row['p_current_price'];
			echo formatMoney($p_current_price, true);
			?></td>
			<td><?php echo $row['qty']; ?></td>
			<td>₱ <?php
			$p_old_price=$row['amount'];
			echo formatMoney($p_old_price, true);
			?></td>
			
				<td>₱ <?php
			$profit=$row['profit'];
			echo formatMoney($profit, true);
			?></td>
			<td> 				
			<a href="deletesalesinventory.php?id=<?php echo $row['transaction_id']; ?>&qty=<?php echo $row['qty'];?>"><button class="btn btn-mini btn-danger"><i class="icon icon-trash"></i> Delete </button></a>
			</tr>
			<?php
				}
			?>
		
				
			
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>Total Amount</th>
				<th>Total Profit</th>
				<th></th>
			<tr>
				
			<tr>
				<th colspan="8"><strong style="font-size: 20px; color: #222222;">Total:</strong></th>
				<th colspan="1">₱<strong style="font-size: 13px; color: #222222;">
				<?php
				$resultas = $db->prepare("SELECT sum(amount) from tbl_sales_pos");
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)']; 
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></th>
				
				<th colspan="1">₱ <strong style="font-size: 13px; color: #222222;">
				<?php
				$resultas = $db->prepare("SELECT sum(profit) from tbl_sales_pos");
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(profit)'];
				echo formatMoney($fgfg, true);
				}
				?>
				
					</th>
					
					<th></th>
			</tr>
		
		
		
		
		
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