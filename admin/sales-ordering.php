<?php require_once('header.php'); ?>

<?php
$status = '';
if(isset($_GET['status'])){
    $status = $_GET['status'];
}
$i=0;
// WEEKLY FILTER QUERY
if($status == 'weekly'){
$date_nowss = date('Y-m-d h:i:s');
$date_weekss = (isset($_POST['start_date']) ? date("Y-m-d h:i:s", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d h:i:s", strtotime("+1 week")));
$start_dates = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : $date_nowss);
$end_dates = $date_weekss;
$statement = $pdo->prepare("SELECT *, 
                            t1.payment_id as PayID,
                            
                            t2.payment_id as PayyID,                                                                  
                            t2.product_id,t2.quantity,
                            t2.unit_price, 
                            SUM(t2.quantity),
                            t2.id,
                            
                            t3.order_id,
                            t3.profit,
                            t3.totalProfit,
                            SUM(t3.totalProfit) as totProfit,
                            SUM(t3.total_amount) + t4.shippingfee as totalAmount
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id
                            JOIN tbl_salesoverall t3
                            ON t2.id = t3.order_id
                            JOIN tbl_salesoverall_info t4
                            ON t3.invoice_payment_id = t4.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed'
                            AND t1.payment_date 
                            BETWEEN '".$start_dates."' 
                            AND '".$end_dates."'
                            GROUP BY t1.payment_id
                            ORDER by t1.id DESC");
}
elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT *, 
                            t1.payment_id as PayID,
                            
                            t2.payment_id as PayyID,                                                                  
                            t2.product_id,t2.quantity,
                            t2.unit_price, 
                            SUM(t2.quantity),
                            t2.id,
                            
                            t3.order_id,
                            t3.profit,
                            t3.totalProfit,
                            SUM(t3.totalProfit) as totProfit,
                            SUM(t3.total_amount) + t4.shippingfee as totalAmount
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id
                            JOIN tbl_salesoverall t3
                            ON t2.id = t3.order_id
                            JOIN tbl_salesoverall_info t4
                            ON t3.invoice_payment_id = t4.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' 
                            AND t1.payment_date 
                            BETWEEN '".$start_datee."' 
                            AND '".$end_datee."' 
                            GROUP BY t1.payment_id
                            ORDER by t1.id DESC");

} // MONTHLY FILTER QUERY
elseif($status == 'monthly'){
$month_sel = (isset($_POST['month_sect']) ? $_POST['month_sect'] : date('m'));
$year_sel = (isset($_POST['year_sect']) ? $_POST['year_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT *, 
                            t1.payment_id as PayID,
                            
                            t2.payment_id as PayyID,                                                                  
                            t2.product_id,t2.quantity,
                            t2.unit_price, 
                            SUM(t2.quantity),
                            t2.id,
                            
                            t3.order_id,
                            t3.profit,
                            t3.totalProfit,
                            SUM(t3.totalProfit) as totProfit,
                            SUM(t3.total_amount) + t4.shippingfee as totalAmount
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id
                            JOIN tbl_salesoverall t3
                            ON t2.id = t3.order_id
                            JOIN tbl_salesoverall_info t4
                            ON t3.invoice_payment_id = t4.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed'
                            AND MONTH(t1.payment_date) = '".$month_sel."' 
                            AND YEAR(t1.payment_date) = '".$year_sel."' 
                            GROUP BY t1.payment_id
                            ORDER by t1.id DESC");

} // YEARLY FILTER QUERY
elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['yearly_sect']) ? $_POST['yearly_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT *, 
                           t1.payment_id as PayID,
                            
                            t2.payment_id as PayyID,                                                                  
                            t2.product_id,t2.quantity,
                            t2.unit_price, 
                            SUM(t2.quantity),
                            t2.id,
                            
                            t3.order_id,
                            t3.profit,
                            t3.totalProfit,
                            SUM(t3.totalProfit) as totProfit,
                            SUM(t3.total_amount) + t4.shippingfee as totalAmount
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id
                            JOIN tbl_salesoverall t3
                            ON t2.id = t3.order_id
                            JOIN tbl_salesoverall_info t4
                            ON t3.invoice_payment_id = t4.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' 
                            AND YEAR(t1.payment_date) = '".$yearly_sel."' 
                            GROUP BY t1.payment_id
                            ORDER by t1.id DESC");

} // DAILY FILTER QUERY
elseif($status == 'daily'){
$daily = (isset($_POST['start_day']) ? $_POST['start_day']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['start_day']) ? $_POST['start_day']." 23:59:00" : date('Y-m-d 23:59:00'));
$statement = $pdo->prepare("SELECT *, 
                            t1.payment_id as PayID,
                            
                            t2.payment_id as PayyID,                                                                  
                            t2.product_id,t2.quantity,
                            t2.unit_price, 
                            SUM(t2.quantity),
                            t2.id,
                            
                            t3.order_id,
                            t3.profit,
                            t3.totalProfit,
                            SUM(t3.totalProfit) as totProfit,
                            SUM(t3.total_amount) + t4.shippingfee as totalAmount
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id
                            JOIN tbl_salesoverall t3
                            ON t2.id = t3.order_id
                            JOIN tbl_salesoverall_info t4
                            ON t3.invoice_payment_id = t4.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' 
                            AND t1.payment_date BETWEEN '".$daily."' 
                            AND '".$daily_end."' 
                            GROUP BY t1.payment_id
                            ORDER by t1.id DESC");

}
else {
    $statement = $pdo->prepare("SELECT *, 
                            t1.payment_id as PayID,
                            
                            t2.payment_id as PayyID,                                                                  
                            t2.product_id,t2.quantity,
                            t2.unit_price, 
                            SUM(t2.quantity),
                            t2.id,
                            
                            t3.order_id,
                            t3.profit,
                            t3.totalProfit,
                            SUM(t3.totalProfit) as totProfit,
                            SUM(t3.total_amount) + t4.shippingfee as totalAmount
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id
                            JOIN tbl_salesoverall t3
                            ON t2.id = t3.order_id
                            JOIN tbl_salesoverall_info t4
                            ON t3.invoice_payment_id = t4.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' AND t1.payment_date 
                            GROUP BY t1.payment_id
                            ORDER by t1.id DESC");
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$OrderPrice = 0;
$OrderQty = 0;
$SupplierPrice = 0;
$totalProfit =0;
$totalProfitQty = 0;
$totalAmount = 0;
foreach ($result as $rowAmount) {
    $totalAmount += $rowAmount['totalAmount'];
    // $OrderPrice = $rowAmount['unit_price'];
    // $OrderQty += $rowAmount['quantity'];
    // $SupplierPrice = $rowAmount['p_old_price'];
    $totalProfit += $rowAmount['totProfit'];
    // $totalProfitQty = $totalProfit * $OrderQty;
// echo '<pre>';
// var_dump($totalProfit);
// echo '</pre>';
// die();  
    
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Online Sales Reports</h1>
	</div>
    <div>
<form action="PrintReportOrdering.php" method="POST">
<?php if($status == 'weekly'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $start_dates?>">
<input type="hidden" name="end_date" value="<?php echo $end_dates?>">
<input type="hidden" name="cust_email" value="<?php echo $cust_email?>">
<?php elseif($status == 'monthly'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $month_sel?>">
<input type="hidden" name="end_date" value="<?php echo $year_sel?>">
<?php elseif($status == 'yearly'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $yearly_sel?>">
<input type="hidden" name="end_date" value="">
<?php elseif($status == 'daily'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $daily?>">
<input type="hidden" name="end_date" value="<?php echo $daily_end?>">
<?php elseif($status == 'all'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_datee" value="<?php echo $start_datee?>">
<input type="hidden" name="end_datee" value="<?php echo $end_datee?>">
<?php endif;?>
<button type="submit" name="printBtn" style="float:right;" class="btn btn-success btn-large"> Print</button>
</form>

</div>
</section>

<div>
    <div class="tab-report" style="margin-left:1%; padding:10px 5px 10px 5px">
        <div class="tab-week">
                <a href="sales-ordering.php?status=all" class="btn btn-sm btn-success"><i class="fa fa-search" aria-hidden="true"></i></a>
                <a href="sales-ordering.php?status=daily" class="btn btn-sm btn-success">DAILY</a>
                <a href="sales-ordering.php?status=weekly" class="btn btn-sm btn-success">WEEKLY</a>
                <a href="sales-ordering.php?status=monthly" class="btn btn-sm btn-success">MONTHLY</a>
                <a href="sales-ordering.php?status=yearly" class="btn btn-sm btn-success">YEARLY</a>
        </div>
            <?php echo "<h3> TOTAL SALES : ₱ ".formatMoney ($totalAmount, true)."<br><br>
                        TOTAL PROFIT : ₱ ".formatMoney ($totalProfit, true)."</h3>"; ?>
    <div>
        <?php if(isset($_GET['status'])):
            $status = $_GET['status'];
      ?>
            <?php if($status == 'weekly'):
                    $date_nows = date('Y-m-d');
                    $date_weeks = (isset($_POST['start_date']) ? date("Y-m-d", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d", strtotime("+1 week")));    
            ?>
            <div style="margin-left:0%; padding:10px 5px 10px 5px">
                <form action="sales-ordering.php?status=weekly" method="POST">
                    <input type="date" name="start_date" id="start_date" style="width: 175px; height:30px;"  value="<?php echo (isset($_POST['start_date']) ? $_POST['start_date'] : $date_nows)?>">
                    <input type="date" readonly name="end_date" style="width: 175px; height:30px;"  id="end_date" value="<?php echo $date_weeks?>">
							<button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
							  <?php if(isset($_POST['start_date']) && isset($_POST['end_date'])):?>
							   <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_dates)).
                                 " - ".date('F d, Y', strtotime($end_dates));?></b></h3>
							<h3 style ="float:right; margin-right:1%;">WEEKLY SALES:</h3>
							<?php else:?>
							<h3 style ="float:right; margin-right:3%;">WEEKLY SALES</h3>
							<?php endif;?>
                </form>
            </div>
            <?php  elseif($status == 'all'):
                $date_nowss = date('Y-m-d');
                $date_weekss = date('Y-m-d'); ?>
            <div style="margin-left:0%; padding:10px 5px 10px 5px">
                <form action="sales-ordering.php?status=all" method="POST">
                    
                    <input type="date" name="start_datee" id="start_datee" style="width: 175px; height:30px;" value="<?php echo (isset($_POST['start_datee']) ? $_POST['start_datee'] : $date_nowss)?>">
                    
                    <input type="date" name="end_datee" id="end_datee" style="width: 175px; height:30px;" value="<?php echo (isset($_POST['end_datee']) ? $_POST['end_datee'] : $date_weekss)?>">
                    <button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
                  <?php if (isset($_POST['start_datee']) && isset($_POST['end_datee']) ):?>
                    <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_datee));?>
                                  - <?php echo date('F d, Y',strtotime($end_datee));?></b></h3>
                                  <h3 style ="float:right; margin-right:1%;">SALES:</h3>
                    <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">SALES</h3>
                    <?php endif; ?>
                </form>
            </div>
            <?php elseif($status == 'monthly'):?> 
                <div style="margin-left:0%; padding:10px 5px 10px 5px">
                    <form action="sales-ordering.php?status=monthly" method="POST">
                        <select style="width: 175px; height:30px;" name="month_sect" id="month_sect">
                            <?php for($m=1; $m<=12; ++$m){
                                $mont_now = date('m');
                                $month_selected = date('m', mktime(0, 0, 0, $m, 1));
                                $mont_name = date('F', mktime(0, 0, 0, $m, 1));
                            ?>
                                <?php if(isset($_POST['year_sect'])):?>
                                    <option value="<?php echo $month_selected?>" <?php echo ($month_selected == $_POST['month_sect'] ? 'selected': '');?>><?php echo $mont_name; ?></option>
                                <?php else:?>
                                    <option value="<?php echo $month_selected;?>" <?php echo ($month_selected == $mont_now ? 'selected': '');?>><?php echo $mont_name; ?></option>
                                <?php endif;?>
                            <?php } ?>
                        </select>
                        <?php $years = array_combine(range(date("Y"), 1910), range(date("Y"), 1910));?>
                        <select style="width: 175px; height:30px; font-size:10px;" name="year_sect" id="year_sect">
                            <?php foreach($years as $year):?>
                                <?php if(isset($_POST['year_sect'])):?>
                                    <option value="<?php echo $year?>" <?php echo ($year == $_POST['year_sect'] ? 'selected': '');?>><?php echo $year; ?></option>
                                <?php else:?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                        <button type="submit" class ="btn btn-primary" style="width: 100px; height:35px;">Search</button>
                            <?php if(isset($_POST['year_sect'])):?>
                         <h3 style ="float:right; margin-right:2%;"><b><?php echo date("F",mktime(0,0,0,$month_sel,10)). " "
                            .$year_sel. "</h3>";?></b></h3>
                        <h3 style ="float:right; margin-right:1%;">MONTHLY SALES:</h3>
                        <?php else:?>
                        <h3 style ="float:right; margin-right:3%;">MONTHLY SALES</h3>
                        <?php endif; ?>
                    </form>
                </div>
            <?php elseif($status == 'yearly'):?>
                <div style="margin-left:0%; padding:10px 5px 10px 5px">
                    <form action="sales-ordering.php?status=yearly" method="POST">
                        <?php $yearlys = array_combine(range(date("Y"), 1910), range(date("Y"), 1910));?>
                        <select style="width: 175px; height:30px; font-size:10px;" name="yearly_sect" id="yearly_sect">
                            <?php foreach($yearlys as $yearly):?>
                                <?php if(isset($_POST['yearly_sect'])):?>
                                    <option value="<?php echo $yearly?>" <?php echo ($yearly == $_POST['yearly_sect'] ? 'selected': '');?>><?php echo $yearly; ?></option>
                                <?php else:?>
                                    <option value="<?php echo $yearly; ?>"><?php echo $yearly; ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                        <button type="submit" class ="btn btn-primary" style="width: 100px; height:35px;">Search</button>
                           <?php if(isset($_POST['yearly_sect'])):?>
                        <h3 style ="float:right; margin-right:2%;"><b><?php echo $yearly_sel?></b></h3>
                        <h3 style ="float:right; margin-right:1%;">YEARLY SALES: </h3>
                        <?php else:?>
                        <h3 style ="float:right; margin-right:3%;">YEARLY SALES </h3>
                        <?php endif;?>
                    </form>
                </div>
            <?php elseif($status == 'daily'):
                $date_nows = date('Y-m-d');
                $day_ends = (isset($_POST['start_day']) ? date("Y-m-d", strtotime($_POST['start_day']."+1 day")) : date("Y-m-d"));    
            ?>
                <div style="margin-left:0%; padding:10px 5px 10px 5px">
                <form action="sales-ordering.php?status=daily" method="POST">
                    <input type="date" name="start_day" id="start_day" style="width: 175px; height:30px; font-size:10px;" value="<?php echo (isset($_POST['start_day']) ? $_POST['start_day'] : $date_nows)?>">
                     <button type="submit" class ="btn btn-primary" style="width: 100px; height:35px;">Search</button>
                     
                    <?php if(isset($_POST['start_day'])):?>
                    <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y',strtotime($daily));?></b></h3>
                    <h3 style ="float:right; margin-right:1%;">DAILY SALES: </h3>
                    <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">DAILY SALES</h3>
                    <?php endif;?>
                </form>
                 
            </div>
            <?php endif;?>
        <?php endif;?>
    </div>
</div>
<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr class="bg-gray">
			        <th width="1%">#</th>
                    <th width="20%">Customer Details</th>
			        <th width="20%">Product Details</th>
                    <th width="20%">Payment Information </th>
                    <th width="10%"><p style="float:right;">Total Amount</th>
                    <th width="10%"><p style="float:right;">Profit</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	foreach ($result as $row) {
            		$i++;
            		 ?>     
            		 <tr class="<?php if($row['delivery_status']!=='Pending'){echo 'bg-g';}else{echo 'bg-r';} ?>">
            		 <td><?php echo $i; ?></td>
	                    <td>
                            <!--<b>Customer ID:</b> <?php // echo $row['customer_id']; ?><br>-->
                            <b>Customer Name:</b> <?php echo $row['customer_name']; ?><br>
                            <b>Customer Email:</b> <br><?php echo $row['customer_email']; ?><br><br>
                            
                        <td>
                           <?php
                           $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
                           $statement1->execute(array($row['payment_id']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                           foreach ($result1 as $row1) {
                                echo '<b>Product:</b> '.$row1['product_name'];
                                echo '<br><b>Quantity:</b> '.$row1['quantity'];
                                echo '<br> <b>Price:</b> '.formatMoney ($row1['unit_price'], true);
                                echo '<br><br>';
                           }
                           ?>
                        </td>
						<?php // PAIBA NALANG YUNG PAYMENT INFORMATION NA UPDATED CODE SAYO*\\ ?>
                        <td>
                            	<?php if($row['payment_method'] == 'PayPal'): ?>
                        		<b>Payment Method:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment Id:</b> <?php echo $row['payment_id']; ?><br>
                        		<b>Date: </b> <?php echo date('l | F d, Y | h:i:s A', strtotime($row['payment_date'])); ?><br>
                        		<b>Transaction Id:</b> <?php echo $row['payment_id']; ?><br>
                            <?php elseif($row['payment_method'] == 'Cash on Delivery'): ?>
                        		<b>Payment Method:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID:</b> <?php echo $row['payment_id']; ?><br>
                        		<b>Date: </b> <br><?php echo date('l | F d, Y | h:i:s A', strtotime($row['payment_date'])); ?><br>
                        		
                            <?php elseif($row['payment_method'] == 'Cash on Pickup'): ?>
                        		<b>Payment Method:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID:</b> <?php echo $row['payment_id']; ?><br>
                        		<b>Date: </b> <br><?php echo date('l | F d, Y | h:i:s A', strtotime($row['payment_date'])); ?><br>
                        		
                        	<?php elseif($row['payment_method'] == 'GCash'): ?>
                        		<b>Payment Method:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID:</b> <?php echo $row['payment_id']; ?><br>
								<b>Date: </b> <br><?php echo date('l | F d, Y | h:i:s A', strtotime($row['payment_date'])); ?><br>
                        		<b>Customer Note:</b> <br><?php echo $row['bank_transaction_info']; ?><br>
                        	<?php elseif($row['payment_method'] == 'Bank Deposit'): ?>
                        		<b>Payment Method:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID:</b> <?php echo $row['payment_id']; ?><br>
								<b>Date: </b> <br><?php echo date('l | F d, Y | h:i:s A', strtotime($row['payment_date'])); ?><br>
                        		<b>Customer Note:</b> <br><?php echo $row['bank_transaction_info']; ?><br>
                        	<?php endif; ?>
                        </td>
                        <td><p style ="float:right;">₱<?php echo formatMoney ($row['totalAmount'], true); ?></td>
                        <td><p style ="float:right;">₱<?php echo formatMoney ($row['totProfit'], true); ?></td>
	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div>
  

</section>






<?php require_once('footer.php'); ?>