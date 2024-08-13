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
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.profit) as totProfit,
                            t1.product_id,
                            SUM(t1.totalProfit) as totProf,
                            t1.totalProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t1.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos,
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE t2.date 
                            BETWEEN '".$start_dates."' 
                            AND '".$end_dates."'
                            GROUP by t2.invoice_payment_id
                            ORDER by t2.date DESC");
}
elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT *, 
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.profit) as totProfit,
                            t1.product_id,
                            SUM(t1.totalProfit) as totProf,
                            t1.totalProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t1.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE t2.date 
                            BETWEEN '".$start_datee."' 
                            AND '".$end_datee."' 
                            GROUP by t2.invoice_payment_id
                            ORDER by t2.date DESC");

} // MONTHLY FILTER QUERY
elseif($status == 'monthly'){
$month_sel = (isset($_POST['month_sect']) ? $_POST['month_sect'] : date('m'));
$year_sel = (isset($_POST['year_sect']) ? $_POST['year_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT *, 
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.profit) as totProfit,
                            t1.product_id,
                            SUM(t1.totalProfit) as totProf,
                            t1.totalProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t1.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE MONTH(t2.date) = '".$month_sel."' 
                            AND YEAR(t2.date) = '".$year_sel."' 
                            GROUP by t2.invoice_payment_id
                            ORDER by t2.date DESC");

} // YEARLY FILTER QUERY
elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['yearly_sect']) ? $_POST['yearly_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT *, 
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.profit) as totProfit,
                            t1.product_id,
                            SUM(t1.totalProfit) as totProf,
                            t1.totalProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t2.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE YEAR(t2.date) = '".$yearly_sel."'
                            GROUP by t2.invoice_payment_id
                            ORDER by t2.date DESC");

} // DAILY FILTER QUERY
elseif($status == 'daily'){
$daily = (isset($_POST['start_day']) ? $_POST['start_day']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['start_day']) ? $_POST['start_day']." 23:59:00" : date('Y-m-d 23:59:00'));
$statement = $pdo->prepare("SELECT *, 
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.profit) as totProfit,
                            t1.product_id,
                            SUM(t1.totalProfit) as totProf,
                            t1.totalProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t2.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE t2.date  
                            BETWEEN '".$daily."' 
                            AND '".$daily_end."'
                            GROUP by t2.invoice_payment_id
                            ORDER by t2.date DESC");

}
else {
    $statement = $pdo->prepare("SELECT  
                                t1.id,
                                t1.invoice_payment_id,
                                t1.product_price as price,
                                t1.quantity as pqty,
                                t1.product_name,
                                t1.date,
                                t1.profit,
                                SUM(t1.profit) as totProfit,
                                t1.product_id,
                                SUM(t1.totalProfit) as totProf,
                                t1.totalProfit,
                                SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                                
                                t2.id,
                                t2.invoice_payment_id,
                                t2.cust_name,
                                t2.cust_address,
                                t2.cust_contact,
                                t2.cust_email,
                                t2.date,
                                t2.profit as ProfTIT,
                                t2.payment_method,
                                t2.discount,
                                t2.shippingfee,
                                t2.cashier,
                                t2.total_amount,
                                t2.due,
                                t2.cashier_id_pos,
                                t2.finalTotalAmount_pos,
                                
                                t3.p_id,
                                t3.p_name,
                                t3.p_old_price
                        
                                FROM tbl_salesoverall t1 
                                JOIN tbl_salesoverall_info t2 
                                ON t1.invoice_payment_id = t2.invoice_payment_id 
                                JOIN tbl_product t3
                                ON t1.product_id = t3.p_id
                                WHERE t2.date 
                                GROUP by t1.invoice_payment_id
                                ORDER by t1.date DESC");
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// die();
$OrderPrice = 0;
$OrderQty = 0;
$SupplierPrice = 0;
$totalProfit =0;
$totalProfitQty = 0;
$totalAmount = 0;
foreach ($result as $rowAmount) {
    $totalAmount += $rowAmount['totalAmount'];
    $OrderPrice += $rowAmount['totProf'];

}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Online/Point of Sales Reports</h1>
	</div>
    <div>
<form action="PrintSalesAll.php" method="POST">
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
                <a href="salesall.php?status=all" class="btn btn-sm btn-success"><i class="fa fa-search" aria-hidden="true"></i></a>
                <a href="salesall.php?status=daily" class="btn btn-sm btn-success">DAILY</a>
                <a href="salesall.php?status=weekly" class="btn btn-sm btn-success">WEEKLY</a>
                <a href="salesall.php?status=monthly" class="btn btn-sm btn-success">MONTHLY</a>
                <a href="salesall.php?status=yearly" class="btn btn-sm btn-success">YEARLY</a>
        </div>
            <?php echo "<h3> TOTAL SALES : ₱ ".formatMoney ($totalAmount, true)."<br><br>
                        TOTAL PROFIT : ₱ ".formatMoney ($OrderPrice, true)."</h3>"; ?>
    <div>
        <?php if(isset($_GET['status'])):
            $status = $_GET['status'];
      ?>
            <?php if($status == 'weekly'):
                    $date_nows = date('Y-m-d');
                    $date_weeks = (isset($_POST['start_date']) ? date("Y-m-d", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d", strtotime("+1 week")));    
            ?>
            <div style="margin-left:0%; padding:10px 5px 10px 5px">
                <form action="salesall.php?status=weekly" method="POST">
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
                <form action="salesall.php?status=all" method="POST">
                    
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
                    <form action="salesall.php?status=monthly" method="POST">
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
                    <form action="salesall.php?status=yearly" method="POST">
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
                <form action="salesall.php?status=daily" method="POST">
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
                    <th width="10%">Status</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	foreach ($result as $row) {
            		$i++;
            		 ?>     
            		 <tr class="bg-g">
            		 <td><?php echo $i; ?></td>
	                    <td>
	                        <?php if($row['cashier_id_pos'] == 0):?>
                            <b>Customer Name:</b> <?php echo $row['cust_name']; ?><br>
                            <b>Customer Email:</b> <?php echo $row['cust_email']; ?>
                            <?php else: ?>
                            <b>Customer Name:</b> <?php echo $row['cust_name']; ?><br>
                            <b>Customer Contact:</b> <?php echo $row['cust_contact']; ?><br>
                            <b>Customer Address:</b> <?php echo $row['cust_address']; ?>
                            <?php endif;?>
                            
                            
                        <td>
                           <?php
                           $statement1 = $pdo->prepare("SELECT * FROM tbl_salesoverall WHERE invoice_payment_id=?");
                           $statement1->execute(array($row['invoice_payment_id']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                           foreach ($result1 as $row1) {
                                echo '<b>Product:</b> '.$row1['product_name'];
                                echo '<br><b>Quantity:</b> '.$row1['quantity'];
                                echo '<br> <b>Price:</b> '.formatMoney ($row1['product_price'], true);
                                echo '<br><br>';
                           }
                           ?>
                        </td>
						<?php // PAIBA NALANG YUNG PAYMENT INFORMATION NA UPDATED CODE SAYO*\\ ?>
                        <td>
                          <?php if($row['cashier_id_pos'] == 0):?>
                            <b>Payment Method:<span style="color:red;"> <?php echo $row['payment_method']; ?></b></span><br>
                            <b>Payment ID:</b> <?php echo $row['invoice_payment_id']; ?><br>
                            <b>Date:</b> <?php echo date('l | F d, Y | h:i:s A',strtotime($row['date'])); ?>
                            <?php else: ?>
                            <b>Payment Method: <span style="color:red;"><?php echo $row['payment_method']; ?></b></span><br>
                            <b>Invoice Number</b> <?php echo $row['invoice_payment_id']; ?><br>
                            <b>Date:</b> <?php echo date('l | F d, Y | h:i:s A',strtotime($row['date'])); ?><br>
                            <b>Cashier:</b> <?php echo $row['cashier']; ?>
                            <?php endif; ?>
                            </td>
                        
                        <td><p style ="float:right;">₱<?php echo formatMoney ($row['totalAmount'], true); ?></td>
                        <?php ?>
                        <td><p style ="float:right;">₱<?php echo formatMoney ($row['totProf'], true); ?></td>
                        <td>
                        <?php if($row['cashier_id_pos'] == 0):?>
                        <span style="color:green;"> ONLINE </span>
                        <?php else: ?>
                        <span style="color:blue;">WALK-IN</span>
                        <?php endif; ?>    
                        </td>
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