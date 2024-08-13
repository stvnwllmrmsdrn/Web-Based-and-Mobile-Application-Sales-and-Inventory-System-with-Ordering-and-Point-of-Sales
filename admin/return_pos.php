<?php require_once('header.php'); ?>
<?php
$status = '';
if(isset($_GET['status'])){
    $status = $_GET['status'];
}
$i=0;
if($status == 'weekly'){
$date_nowss = date('Y-m-d h:i:s');
$date_weekss = (isset($_POST['start_date']) ? date("Y-m-d h:i:s", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d h:i:s", strtotime("+1 week")));
$start_date = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : $date_nowss);
$end_date = $date_weekss;
$statement = $pdo->prepare("SELECT *, 
                            t2.name, 
                            t2.cust_address, 
                            t2.cust_contact, 
                            t3.reason FROM tbl_return_pos 
                            t1 JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 ON t1.reason_id = t3.id  
                            WHERE t1.return_date 
                            BETWEEN '".$start_date."' AND '".$end_date."' 
                            ORDER by return_id DESC");
}
elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT *, 
                            t2.name, 
                            t2.cust_address, 
                            t2.cust_contact, 
                            t3.reason FROM tbl_return_pos 
                            t1 JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 ON t1.reason_id = t3.id  
                            WHERE t1.return_date 
                            BETWEEN '".$start_datee."' AND '".$end_datee."' 
                            ORDER by return_id DESC");
                            
}elseif($status == 'monthly'){
$month_sel = (isset($_POST['month_sect']) ? $_POST['month_sect'] : date('m'));
$year_sel = (isset($_POST['year_sect']) ? $_POST['year_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT *, 
                            t2.name, 
                            t2.cust_address, 
                            t2.cust_contact, 
                            t3.reason 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason 
                            t3 ON t1.reason_id = t3.id  
                            WHERE MONTH(t1.return_date) = '".$month_sel."' 
                            AND YEAR(t1.return_date) = '".$year_sel."' 
                            ORDER by t1.return_id DESC");

}elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['yearly_sect']) ? $_POST['yearly_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT *, 
                            t2.name, 
                            t2.cust_address, 
                            t2.cust_contact, 
                            t3.reason 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            WHERE YEAR(t1.return_date) = '".$yearly_sel."' 
                            ORDER by t1.return_id DESC");

}elseif($status == 'daily'){
$daily = (isset($_POST['start_day']) ? $_POST['start_day']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['start_day']) ? $_POST['start_day']." 23:59:00" : date('Y-m-d 23:59:00'));
$statement = $pdo->prepare("SELECT *, 
                            t2.name, 
                            t2.cust_address, 
                            t2.cust_contact, 
                            t3.reason 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            WHERE t1.return_date 
                            BETWEEN '".$daily."' 
                            AND '".$daily_end."' 
                            ORDER by t1.return_id DESC");
}
else{
$statement = $pdo->prepare("SELECT *, 
                            t2.name, 
                            t2.cust_address, 
                            t2.cust_contact, 
                            t3.reason 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            ORDER by t1.return_id DESC");
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$totalAmount = 0;
foreach ($result as $rowAmount) {
    $totalAmount += $rowAmount['return_totAmount'];   
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Walk-in Return Products</h1>
</div>
<div>
<form action="PrintReturnWalkin.php" method="POST">
<?php if($status == 'weekly'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $start_date?>">
<input type="hidden" name="end_date" value="<?php echo $end_date?>">
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
<input type="hidden" name="start_datee" value="<?php echo date('Y-m-d 01:00:00', strtotime($start_datee));?>">
<input type="hidden" name="end_datee" value="<?php echo date('Y-m-d 23:59:00', strtotime($end_datee))?>">
<?php endif;?>
<button type="submit" name="printBtn" style="float:right;" class="btn btn-success btn-large"> Print</button>
</form>
</div>
</section>
<div>
    <div class="tab-report" style="margin-left:1%; padding:10px 5px 10px 5px">
        <div class="tab-week">
                <a href="return_pos.php?status=all" class="btn btn-sm btn-success"><i class="fa fa-search" aria-hidden="true"></i></a>
                <a href="return_pos.php?status=daily" class="btn btn-sm btn-success">DAILY</a>
                <a href="return_pos.php?status=weekly" class="btn btn-sm btn-success">WEEKLY</a>
                <a href="return_pos.php?status=monthly" class="btn btn-sm btn-success">MONTHLY</a>
                <a href="return_pos.php?status=yearly" class="btn btn-sm btn-success">YEARLY</a>
        </div>
            <?php echo "<h3> TOTAL SALES/RETURN : ₱ ".formatMoney ($totalAmount, true)."</h3>"; ?>
    </div>
    <div>
         <?php if(isset($_GET['status'])):
            $status = $_GET['status'];
        ?>
            <?php if($status == 'weekly'):
                    $date_nows = date('Y-m-d');
                    $date_weeks = (isset($_POST['start_date']) ? date("Y-m-d", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d", strtotime("+1 week")));    
            ?>
            <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="return_pos.php?status=weekly" method="POST">
                    <input type="date" name="start_date" id="start_date" style="width: 175px; height:30px;"value="<?php echo (isset($_POST['start_date']) ? $_POST['start_date'] : $date_nows)?>">
                    <input type="date" readonly name="end_date" id="end_date" style="width: 175px; height:30px;" value="<?php echo $date_weeks?>">
                    <button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
                    <?php if (isset($_POST['start_date']) && isset($_POST['end_date'])):?>
                    	   <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_date)).
                                 " - ".date('F d, Y', strtotime($end_date));?></b></h3>
							<h3 style ="float:right;">WEEKLY RETURN: </h3>
					<?php else:?>
					 <h3 style ="float:right; margin-right:3%;">WEEKLY SALES/RETURN</h3>
                    <?php endif; ?>
                </form>
            </div>
             <?php  elseif($status == 'all'):
                $date_nowss = date('Y-m-d');
                $date_weekss = date('Y-m-d'); ?>
            <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="return_pos.php?status=all" method="POST">
                    
                    <input type="date" name="start_datee" id="start_datee" style="width: 175px; height:30px;" value="<?php echo (isset($_POST['start_datee']) ? $_POST['start_datee'] : $date_nowss)?>">
                    
                    <input type="date" name="end_datee" id="end_datee" style="width: 175px; height:30px;" value="<?php echo (isset($_POST['end_datee']) ? $_POST['end_datee'] : $date_weekss)?>">
                    <button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
                  <?php if (isset($_POST['start_datee']) && isset($_POST['end_datee']) ):?>
                    <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_datee));?>
                                  - <?php echo date('F d, Y',strtotime($end_datee));?></b></h3>
                                  <h3 style ="float:right; margin-right:1%;">SALES/RETURN:</h3>
                    <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">SALES/RETURN</h3>
                    <?php endif; ?>
                </form>
            </div>
                <?php elseif($status == 'monthly'):?> 
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                    <form action="return_pos.php?status=monthly" method="POST">
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
                        <h3 style ="float:right; margin-right:1%;">MONTHLY SALES/RETURN:</h3>
                        <?php else:?>
                        <h3 style ="float:right; margin-right:3%;">MONTHLY SALES/RETURN</h3>
                        <?php endif; ?>
                    </form>
                </div>
            <?php elseif($status == 'yearly'):?>
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                    <form action="return_pos.php?status=yearly" method="POST">
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
                        <h3 style ="float:right; margin-right:1%;">YEARLY SALES/RETURN: </h3>
                         <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">YEARLY SALES/RETURN</h3>
                    <?php endif; ?>
                    </form>
                </div>
            <?php elseif($status == 'daily'):
                $date_nows = date('Y-m-d');
                $day_ends = (isset($_POST['start_day']) ? date("Y-m-d", strtotime($_POST['start_day']."+1 day")) : date("Y-m-d"));    
            ?>
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="return_pos.php?status=daily" method="POST">
                    <input type="date" name="start_day" id="start_day" style="width: 175px; height:30px; font-size:10px;" value="<?php echo (isset($_POST['start_day']) ? $_POST['start_day'] : $date_nows)?>">
                            <button type="submit" class ="btn btn-primary" style="width: 100px; height:35px;">Search</button>
                     <?php if (isset($_POST['start_day'])):?>
                    <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y',strtotime($daily));?></b></h3>
                    <h3 style ="float:right; margin-right:1%;">DAILY SALES/RETURN: </h3>
                    <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">DAILY SALES/RETURN</h3>
                    <?php endif; ?>
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
			    <tr>
			        <th width ="1%">#</th>
                    <th width="18%">Customer Details</th>
			        <th width="18%"> Return Product Details</th>
                    <th width="15%">Return Payment Information</th>
					<th width="10%">Return Total Amount</th>
					<th width="10%">Reason of Return</th>
					<th width="15%">Reason Description</th>
					<th>Status</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            							
            	foreach ($result as $row) {
            		$i++;
            		?>   
            		<tr class="<?php if($row['reason_id']=='0'){echo 'bg-r';}else{echo 'bg-g';} ?>">   
            		<td><?php echo $i; ?></td>
	                    <td><?php // CUSTOMER DETAILS // ?>
                            <b>Customer Name:</b> <?php echo $row['name']; ?><br>
							<b>Customer Address:</b> <?php echo $row['cust_address']; ?><br>
                            <b>Customer Contact:</b> <?php echo $row['cust_contact']; ?><br><br>
						</td>
                    
						<td><?php // PRODUCT DETAILS // ?>
							<b>Product:</b> <?php echo $row['return_product_name']; ?><br>
							<b>Quantity:</b> <?php echo $row['return_quantity']; ?><br>
							<b>Price:</b> <?php echo formatMoney($row['return_price'],true); ?><br>
                        </td> 
                       
						<?php // PAYMENT DETAILS // ?>
                        <td>
						<b>Payment Method: </b><?php echo '<span style="color:red;">' .$row['type']; ?><br></span>
						<b>Invoice Number: </b><?php echo $row['invoice_number']; ?><br>
						<b>Date: </b> <?php echo date('l | F d, Y | h:i:s A', strtotime($row['return_date'])); ?><br>
						<b>Cashier: </b> <?php echo $row['cashier']; ?><br>
						</td>
						<?php // TOTAL AMOUNT // ?>
						<td><p style ="float:right;">₱ <?php
						echo formatMoney($row['return_totAmount'],true);
						?></td>				
						<td><?php echo $row['reason'];?> </td>	
						<td><?php echo $row['description_return'];?> </td>	
						<td><?php echo '<span style="color:red;">Returned</span>'?> </td>	
						</tr>		
						<?php
						}
						?>							
						</tbody>
					</table>
				</div>
						</div>
						</div>
						</div>
			</div>
		</div>
	</div>
</section>


<?php require_once('footer.php'); ?>