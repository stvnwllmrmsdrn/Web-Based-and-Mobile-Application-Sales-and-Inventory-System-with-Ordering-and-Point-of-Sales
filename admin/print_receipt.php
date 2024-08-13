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
		border-style: double;
		width: 68%;
		padding: 62px;
		background: #fff;
	  }

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<?php
if(!isset($_REQUEST['payment_id'])) {
    header('location: order.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
    $statement->execute(array($_REQUEST['payment_id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: order.php');
        exit;
    }
}
		$payment_date = date('Y-m-d H:i:s');
        $date = strtotime($payment_date);

		$i=0;
	    $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
	    $statement->execute(array($_REQUEST['payment_id']));
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
		$statement = $pdo->prepare("SELECT *, sum(paid_amount) as totAmount FROM tbl_payment WHERE payment_id=?");
	    $statement->execute(array($_REQUEST['payment_id']));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row6) {
	    	
	    	$cust_id= $row6['customer_id'];
	    	$cust_name= $row6['customer_name'];
	    	$cust_email= $row6['customer_email'];
	    	$payment_date= date('F d, Y',strtotime($row6['payment_date']));
	    	$paid_amount= $row6['totAmount'];
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
		<!-- <h1>View Receipt</h1> -->
	</div>
    <div style="text-align: center;">
<a href="javascript:Clickheretoprint()" style="font-size:20px;float:center;"><button class="btn btn-success btn-large" style="width:100%"><p class="fa fa-print"> Print</p> </button></a>


</div>
<!-- <a href="order.php" class="btn btn-primary btn-large"  style="font-size:20px;float:left;">Back</a> -->
</section>

<section style="padding: 6%;">
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

	<table cellpadding="2" cellspacing="2" style="font-family: arial; font-size: 14px;text-align:left;width : 100%;">

		<tr>
			<td><b>Official Receipt No.:</td>
			<td><?php echo '<span style="color:red;">' .$_REQUEST['payment_id']?></td>
		</tr>
		<tr>
			<td><b>Customer Name:</td>
			<td><?php echo $cust_name ?> <?php echo $cust_cname ?></td>
		</tr>
		<tr>
			<td><b>Address:</td>
			<td><?php echo $cust_address ?></td>
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
			<td><?php echo $payment_date ?></td>
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
			<th width ="3%">#</th>
				<th> Product Name </th>
				<th><p style ="float:right;"> Price </th>
				<th><p style ="float:right;"> Quantity </th>
				<th width ="15%"><p style ="float:right;"> Amount </th>
			</tr>
		</thead>
				<?php 
				$i=0;
				$statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
				$statement->execute(array($_REQUEST['payment_id']));
				$result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
				foreach ($result4 as $row5) {
					$i++;
					$order_p_id[$i] = $row5['product_id'];
					$order_p_name[$i] = $row5['product_name'];
					$order_p_qty[$i] = $row5['quantity'];
					$order_p_price[$i] = $row5['unit_price'];
					$amount = $order_p_price[$i] * $order_p_qty[$i]; 
				?>
		<tbody>
			<tr class="record">

				<td><?php echo $i ?>
				<td><b><?php echo $order_p_name[$i]; ?></td>
				
				<td><p style ="float:right;">₱ <?php echo formatMoney($order_p_price[$i], true); ?> </td>
				<td><p style ="float:right;"><?php echo $order_p_qty[$i]	; ?></td>
				<td style="text-align:right;">₱
				<?php echo formatMoney($amount, true);
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

					$vat = $paid_amount / 1.12;
					$vatt = $vat * .12;
					$totVat = $vat - $shipping;

					echo formatMoney($totVat, true);
					?>
					</strong></td>
					
				</tr>
				<tr>
					<td colspan="4" style="text-align:right;">VAT-Exempt Sales: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱<b> 0.00</b> <strong style="font-size: 14px;">
				</tr>
				<tr>
					<td colspan="4"  style="text-align:right;"><strong style="font-size: 14px;">Zero Rated Sales: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱<b> 0.00</b>  <strong style="font-size: 14px;">
				</tr>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">VAT Amount: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱<strong style="font-size: 14px;"><?php echo formatMoney($vatt, true); ?>
				</tr>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">Discount (%) : &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱<strong style="font-size: 14px;">0.00</strong></td>
				</tr>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">Delivery Fee: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱ <strong style="font-size: 14px;"><?php echo formatMoney($shipping, true); ?></strong></td>
				</tr>
					<tr><td></td></tr>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 14px;">Total Sales: &nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱ <strong style="font-size: 14px;"><?php echo formatMoney($paid_amount, true); ?></strong></td>
				</tr>
				<tr>
					<td colspan="4"style=" text-align:right;"><strong style="font-size: 14px;">Total Amount Paid:&nbsp;</strong></td>
					<td colspan="2" style="text-align:right;">₱ <strong style="font-size: 14px; color: #222222;"><?php echo formatMoney($paid_amount, true); ?></strong></td>
				</tr>
			
				</tbody>
				
	</table><b><br><br>
	<table style="WIDTH: 100%;TEXT-ALIGN: CENTER;">
			<tr>
					<td colspan="4">By:_____________________________</td>
					<td colspan="4">By:_____________________________</td>
			</tr>
			<tr>
					<td  colspan="4"><b>Signature over printed name</td>
					<td  colspan="4"><b>Signature over printed name</td>
			</tr>
			<tr>
					<td  colspan="4"><b>(DRIVER)</td>
					<td  colspan="4"><b>(CUSTOMER)</td>
			</tr>
		</table>
	<!--<br><center><h4><i>⬜I  hereby confirm that the items stated in this receipt have been delivered and received. </i></h4>-->
	
	
	</div>
	<br><br><br><br><div style="width: 350px; float: left; height: 120px;">
	            <table cellpadding="4" cellspacing="4" style="font-family: arial; font-size: 14px;text-align:left;width : 100%;">
		        <tr>
			    <td><b>&nbsp&nbspPrepared by: Administrator </td>
		        </tr>
	        </table>
	        </div><BR>
			
		
	





</div>

</div>
</div>

</div>
</div>
<section>
</section>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open(disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 98%; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>