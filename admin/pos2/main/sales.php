<!DOCTYPE html>
<html>
<head>
	<!-- js -->			
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<title>
Standly Hardware - Point Of Sales
</title>
<link rel="shortcut icon" href="img/favicon.png">
<?php
	require_once('auth.php');
?>
       
  <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
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

	<!-- combosearch box-->	
	
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>

	
	
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->




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
<body>
<?php include('navfixed.php');?>
	

  
<?php  ?>				
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
		<div class="contentheader">
			<i class="icon-money"></i> POINT OF SALES
			</div>
			<ul class="breadcrumb">
			<h4><a href="index.php"><li>Dashboard</li></a> /
			<li class="active">Point of Sales</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

</div>
<p style="color: red;">OR NO: <?php echo $_GET['invoice']; ?></h5></p>
<h4>Product Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Quantity</h4>												
<form action="incoming.php" method="post" >
											
<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>">
<select name="product" style="width:650px; "class="chzn-select" required>
<option></option>
	<?php
	$id=$_GET['invoice'];
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM tbl_product WHERE p_id ORDER BY p_id ASC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	$qty = $row['p_qty'];
	$date_expire = $row['date_expire'];
	$date_today = date("m-d-y");
	if($qty > 0 && $date_today > $date_expire)		
	{
?>		<option value="<?php echo $row['p_id'];?>"><?php echo $row['p_id']; ?><p> - </p><?php echo $row['p_name']; ?></option>
		<?php
		
			}
		} 
			?>
			
			</select>
<input type="number" name="qty" value="1" min="1" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    title="Numbers only" autocomplete="off" style="width: 75px; height:30px; padding-top:4px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:4px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
<button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i>  Add</button>

</form>
<table class="table table-bordered" id="resultTable" data-responsive="table" required>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
	<thead>
		<tr>
			<th width="0.5%">#</th>
			<th width="5%">Photo</th>
			<th width ="25%"> Product Name </th>
			<th width ="3%"><p style ="float:right;"> Stock </th>
			<th width ="10%"><p style ="float:right;"> Price </th>
			<th width ="8%"><p style ="float:right;">Quantity </th>	
			<th width ="10%"><p style ="float:right;"> Amount </th>
			<th width ="0.1%"> </th>
		</tr>
	</thead>
	<tbody>
	<?php
				$id=$_GET['invoice'];
				include('../connect.php');
				$userpos = $_SESSION['SESS_MEMBER_ID'];
				$result = $db->prepare("SELECT s.transaction_id, 
                							   s.invoice, 
                							   s.product, 
                							   sum(s.amount), 
                							   s.p_name, 
                							   s.p_current_price, 
                							   sum(s.qty),
                							   qty,
                							   s.product,
                			
                
                							   p.p_id,
                							   p.p_name,
                							   p.p_qty,
                							   p.p_featured_photo,
                
                							   up.id,
                							   up.name, 
                							   
                							   so.user_id,
                							   so.invoice_number,
                							   so.cashier
                
                							   FROM tbl_salesorder_pos s
                							   LEFT JOIN tbl_product p
                							   ON p.p_id = s.product
                							   LEFT JOIN tbl_sales_pos so
                							   ON s.invoice = so.invoice_number
                							   LEFT JOIN tbl_user_pos up
                							   ON up.id = so.cashier 
                							   AND $userpos = so.user_id
                							   WHERE invoice= '".$_GET['invoice']."' 
                							   GROUP BY p_id");
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $i ?></td>
			<td style="width:82px;"><img src="../../../assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="<?php echo $row['p_name']; ?>" style="width:80px;"></td>
		
			<td><?php echo $row['p_name'];  ?></td>
			<td><p style ="float:right;">	
			<?php
				$qty1 = $row['p_qty']; 
				if($qty1 > 0)
				{
					echo $qty1;
				}
				else {
				
					echo '<p style="color: red;">';	
					echo 'Out of Stock';
	
				}
			?></td>
			<td><p style ="float:right;">₱
			<?php
			$ppp=$row['p_current_price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			<td><p style ="float:right;"><?php 
			$qty11 = $row['sum(s.qty)']; 
			if($qty11 < $qty1)
			{
				echo $qty11;
			}
			else {
				$totqty = $qty11 + ($qty1);
				echo $totqty;
	
			}
			?></td>
			
			<td><p style ="float:right;">₱
			<?php
			$dfdf=$row['sum(s.amount)'];

			if($qty11 < $qty1)
			{
				echo formatMoney($dfdf, true);
			}
			elseif ($qty1 > -1)
			{
				echo formatMoney($dfdf, true);
			}
			else {
				$totalqty = $qty11 +($qty1);
				$totalAmount = $ppp * $totalqty;
				echo formatMoney($totalAmount, true);
			}
			
			?>
			</td>
			<td width="90"><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-danger"><i class="icon icon-trash"></i></button></a></td>
			</tr>
			<?php
				}
			?>
			
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td><p style ="float:right;"> Total Amount: </td>
			<th></th>		</tr>
			<tr>
				
				<th colspan="6"><strong style="font-size: 14px; color: #222222;">TOTAL:</strong></th>
				<td colspan="1"><p style ="float:right;">₱ <strong style="font-size: 14px; color: #222222;">
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
				$sdsd=$_GET['invoice'];
			$resultas = $db->prepare("SELECT sum(so.amount),
												 sum(so.qty),
												 sum(so.p_current_price),
												 so.p_current_price,
												 so.invoice,
												 so.p_name,
												 so.transaction_id,
												 so.qty,

												 p.p_id,
												 sum(p.p_qty),
												 p.p_name,
												 p.p_qty										 
										 
										 
										  FROM tbl_salesorder_pos so
										  LEFT JOIN tbl_product p
										  ON so.p_name = p.p_name
										  WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(so.amount)'];
				$totalStock =$rowas ['sum(p.p_qty)'];
				$totalStock1 =$rowas ['p_qty'];
				$totalStockOrder = $rowas ['sum(so.qty)'];
				$totalStockOrder1 = $rowas ['qty'];
				$price = $rowas ['p_current_price'];
				$price1= $rowas ['sum(so.p_current_price)'];
				echo formatMoney($fgfg, true);
				}
				?>
	
		
				</td>
				<th></th>
			</tr>
		
	</tbody>
</table><br>
<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?> "><button class="btn btn-success btn-large btn-block" required><i class="icon icon-arrow-right"></i> Process Order</button></a>
<div class="clearfix"></div>
</div>
</div>
</div>
</body>
<?php include('footer.php');?>
</html>