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

<?php
if(isset($_POST['form1pic'])) {
	$valid = 1;
    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path == '') {
    	$valid = 0;
        $error_message .= "You must have to select a photo<br>";
    } else {
    	$ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

if($valid == 1) {

	// getting auto increment id
	$date = date('Y-m-d h:i:s');
	$final_name = 'del-receipt-'.$date.'-'.$_POST['invoiceID'].'.'.$ext;
	move_uploaded_file( $path_tmp, 'delivery-receipt-pos/'.$final_name );

	$statement = $db->prepare("UPDATE tbl_sales_pos SET 
	photo_delivery_receipt='".$final_name."',
	receipt_date_upload='".$date."'
	WHERE invoice_number='".$_POST['invoiceID']."'");
	$statement->execute();
	$success_message = 'Delivery Receipt is added successfully uploaded!';
	
} 
}
?>


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
//FOR TRANSACTION ID - ST CODE
$finalcode='ST-'.createRandomPassword();
?>

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
<div>
	<?php
	include('../connect.php');
				// $userpos1 = $_SESSION['SESS_MEMBER_ID'];
				// $results = $db->prepare("SELECT 
				// 						sum(s.amount_pos),
				// 						s.cashier,
				// 						s.user_id,
				// 						s.date as DatePOS,
				// 						s.discount_status,
				// 						s.amount_pos,
				// 						s.transaction_id,
				// 						s.shipping_id,
										
				// 						SUM(so.amount) as totalAmount,
										
				// 						sp.id,
				// 						sp.name,

				// 						d.discount_id,
				// 						d.discount,

				// 						sh.shipping_cost_id,
				// 						sh.amount,
				// 						sh.city_id,

				// 						c.city_id,
				// 						c.city_name

				// 						FROM tbl_sales_pos s
				// 						LEFT JOIN tbl_salesorder_pos so
				// 						ON s.invoice_number = so.invoice
				// 						LEFT JOIN tbl_user_pos sp
				// 						ON s.cashier = sp.name
				// 						LEFT JOIN tbl_discount d
				// 						ON d.discount_id = s.discount_status
				// 						LEFT JOIN tbl_shipping_cost sh
				// 						ON sh.shipping_cost_id = s.shipping_id
				// 						LEFT JOIN tbl_city c
				// 						ON sh.city_id = c.city_id
				// 						WHERE $userpos1 = s.user_id
 			// 							AND s.date 
				// 						ORDER BY s.transaction_id DESC
				// 						");
				// $results->execute();
				// for($i=0; $rows = $results->fetch(); $i++){
				// }
				// ?>
				<?php // PROFIT COMPUTATION!!!
			// include('../connect.php');
			// $d1=$_GET['d1'];
			// $d2=$_GET['d2'];
			// $resultas = $db->prepare("SELECT sum(profit) from tbl_salesorder_pos WHERE date BETWEEN :c AND :d");
			// $resultas->bindParam(':c', $d1);
			// $resultas->bindParam(':d', $d2);
			// $resultas->execute();
			// for($i=0; $rowas = $resultas->fetch(); $i++){
			// $fgfg1=$rowas['sum(profit)'];
			
			// }
		?>
	
<h3>Search:</h3>
<input type="text" style="padding:20px; width:100%;" name="filter" value="" id="filter" placeholder="Search here..." autocomplete="off" />
<!--<button  style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</button></a>-->


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
			<th> #</th>
			<th width ="20%">Customer Details</th>
			<th width ="20%">Product Details</th>
			<th width ="18%">Payment Information</th>
			<th width ="15%"><p style ="float:right;">Total Amount </th>
			 <th width ="10%">Type of Delivery</th>
			<th width ="10%"> Action </th>
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
				$userpos = $_SESSION['SESS_MEMBER_ID'];
				$result = $db->prepare("SELECT s.transaction_id,
				 							   s.name, 
											   s.cashier, 
											   s.cust_contact, 
											   s.cust_address, 
											   s.invoice_number, 
											   s.date as DatePOS,
											   s.amount_pos, 
											   s.type,
											   s.user_id,
											   s.discount_status,
											   s.delivery_status,
											   s.shipping_id,

											   so.p_current_price, 
											   so.qty,  
											   so.p_name,  
											   so.invoice,
											   so.date,
											   SUM(so.amount) as totalAmount,

											   d.discount_id,
											   d.discount_name,
											   d.discount,

											   sp.id,
											
											   ds.d_id,
											   ds.d_status,

											   sh.shipping_cost_id,
											   sh.amount,
											   sh.city_id,

											   c.city_id,
											   c.city_name

											   FROM tbl_salesorder_pos so 
											   LEFT JOIN tbl_sales_pos s 
											   ON s.invoice_number = so.invoice
											   LEFT JOIN tbl_discount d
											   ON d.discount_id = s.discount_status
											   LEFT JOIN tbl_user_pos sp
											   ON sp.id = s.cashier
											   LEFT JOIN tbl_delivery_status ds
											   ON s.delivery_status = ds.d_id
											   LEFT JOIN tbl_shipping_cost sh
											   ON sh.shipping_cost_id = s.shipping_id
											   LEFT JOIN tbl_city c
											   ON sh.city_id = c.city_id
											   WHERE $userpos = s.user_id
											   AND s.date 
											   GROUP BY s.transaction_id DESC
											   ");
						   
				$result->execute();
				for($a=1; $row = $result->fetch(); $a++){
			
				
			?>
			
			<tr class="record">
			<td><?php echo $a ?></td>
<?php /*CUSTOMER DETAILS*/?>
			<td><b>Customer Name:</b><?php echo $row['name']; ?><br>
			<b>Contact Number: </b><?php echo $row['cust_contact']; ?><br>
			<b>Address: </b><?php echo $row['cust_address']; ?></td>
<?php /*PRODUCT DETAILS*/?>
<td><?php
            $result1 = $db->prepare("SELECT 
											sum(qty), 
											p_name,
											p_current_price,
											amount,
											sum(amount)
											
											FROM tbl_salesorder_pos 
											WHERE invoice=? 
											GROUP BY product");
			$result1->execute(array($row['invoice']));
            $result1->execute();
			for($b=0; $row1 = $result1->fetch(); $b++){
			
            echo '<b>Product: </b> '.$row1['p_name'];
            echo '<br><b>Quantity: </b>'.$row1['sum(qty)'];
			
            echo '<br> <b>Unit Price:</b> '.formatMoney ($row1['p_current_price'], true).'';
            echo '<br><br>';
            }
    ?></td> 
<?php /*PAYMENT DETAILS*/?>
			<td><b>Payment Method: </b><?php echo '<span style="color:red;">' .$row['type']; ?><br></span>
			<b>Transaction ID: </b><?php echo $row['transaction_id']; ?><br>
			<b>Invoice Number: </b><?php echo $row['invoice_number']; ?><br>
			<b>Date: </b> <?php echo date('l | F d, Y | h:i:s A',strtotime($row['DatePOS'])); ?><br>			
			<b>Cashier: </b> <?php echo $row['cashier']; ?><br>			
			<b>Discount: </b> 
			<?php 
			$discount = $row['discount_status'];
			$discount1 = $row['discount_name'];  
			if($discount == 0){
				echo 'No Discount';
			}
			else {
				echo $discount1;
			}
			?><br>
			<b>Delivery Location & Fee: </b> <br>
			<?php 
			$ship = $row['shipping_id'];
			$shipp = $row['city_name'];
			$sf = $row['amount'];  
			if($ship == 0){
				echo 'Completed';
			}
			else {
				echo $shipp ." - ₱" . $sf;
			}
			?></td>
			
<?php /*TOTAL AMOUNT*/?>
			<td><p style ="float:right;">₱ <?php
			$total=$row['totalAmount'];
// 			$discount = $row['discount'];
			$sf = $row['amount']; 
// 			$totalDiscount = $p_old_price - ($p_old_price * ($discount / 100));
// 			$finalDis = $p_old_price - $totalDiscount;
// 			$TotalSales = $p_old_price - $finalDis;
			$totalfinal = $total + $sf;
			echo formatMoney($totalfinal, true);
			?></td>
	            	<td>
                        <?php
                        $photo = $row['photo_delivery_receipt'];
		                $status = $row['shipping_id']; 
                         if ($status == 0){
			             echo 'Completed';
                         }
                         elseif($photo != NULL)
                         {
                          echo 'Completed';
                         }
			             else{
			             echo 'Delivery';
			             }
			        	?>
                        </td>
<?php /*PROFIT*/?>
		<?php // <td>₱ <?php
		 //	$profit=$row['profit'];
		//	echo formatMoney($profit, true);
		//	?>
<?php /*RECEIPT*/			?>
			<td>
			<button class="btn btn-info"><a href ="preview1.php?invoice=<?php echo $row['invoice_number'];?>"> View Receipt</a>
			</td>
			<?php }  ?>
					
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</body>
<?php include('footer.php');?>
</html>