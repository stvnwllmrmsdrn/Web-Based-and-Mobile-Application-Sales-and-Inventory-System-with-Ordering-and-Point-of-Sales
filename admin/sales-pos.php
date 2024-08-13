<?php require_once('header.php'); ?>
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
    
    	$statement = $pdo->prepare("UPDATE tbl_sales_pos SET 
    	photo_delivery_receipt='".$final_name."',
    	receipt_date_upload='".$date."'
    	WHERE invoice_number='".$_POST['invoiceID']."'");
    	$statement->execute();
    	$success_message = 'Delivery Receipt is added successfully uploaded!';
    	
    } 
}
?>
<?php 
$statuss = '';
if(isset($_GET['status'])){
    $statuss = $_GET['status'];
}
// WEEKLY SALES
$i=0;
include('sales-pos_queries.php');
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$totalAmount = 0;
$sf = 0;
$discount = 0;
foreach ($result as $rowAmount) {
    $totalAmount += $rowAmount['totalSales'];  
    $totalProfit += $rowAmount['TotalProfit'];
    $totalReturn += $rowAmount['ReturnTotal'];
//  $sf = $rowAmount['shipAmount'];
// 	$discount = $row['TotDiscount'];
// 	$totalDiscount = $totalAmount - ($totalAmount * ($discount / 100));
// 	$finalDis = $totalAmount - $totalDiscount;
// 	$TotalSales = $totalAmount - $finalDis;
// 	$totalfinal = $TotalSales + $sf;
    
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Point of Sales Reports</h1>
	</div>
	<div class="content-header-right">
	<form action="PrintReportPOS.php" method="POST">
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
                <a href="sales-pos.php?status=all" class="btn btn-sm btn-success"><i class="fa fa-search" aria-hidden="true"></i></a>
                <a href="sales-pos.php?status=daily" class="btn btn-sm btn-success">DAILY</a>
                <a href="sales-pos.php?status=weekly" class="btn btn-sm btn-success">WEEKLY</a>
                <a href="sales-pos.php?status=monthly" class="btn btn-sm btn-success">MONTHLY</a>
                <a href="sales-pos.php?status=yearly" class="btn btn-sm btn-success">YEARLY</a>
        </div>
            <?php echo "<h3> TOTAL SALES :  ₱ ".formatMoney ($totalAmount, true)."<br><br>
            TOTAL PROFIT :  ₱ ".formatMoney ($totalProfit, true)."</h3>"; ?>
    </div><div><div>
    <?php if(isset($_GET['status'])):
            $status = $_GET['status'];
        ?>
            <?php if($status == 'weekly'):
                    $date_nows = date('Y-m-d');
                    $date_weeks = (isset($_POST['start_date']) ? date("Y-m-d", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d", strtotime("+1 week")));    
            ?>
            <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="sales-pos.php?status=weekly" method="POST">
                    <input type="date" name="start_date" id="start_date" style="width: 175px; height:30px;"value="<?php echo (isset($_POST['start_date']) ? $_POST['start_date'] : $date_nows)?>">
                    <input type="date" readonly name="end_date" id="end_date" style="width: 175px; height:30px;" value="<?php echo $date_weeks?>">
                    <button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
                    <?php if (isset($_POST['start_date']) && isset($_POST['end_date'])):?>
                    	   <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_date)).
                                 " - ".date('F d, Y', strtotime($end_date));?></b></h3>
							<h3 style ="float:right; margin-right:1%;">WEEKLY SALES:</h3>
					<?php else:?>
					 <h3 style ="float:right; margin-right:3%;">WEEKLY SALES</h3>
                    <?php endif; ?>
                </form>
            </div>
             <?php  elseif($status == 'all'):
                $date_nowss = date('Y-m-d');
                $date_weekss = date('Y-m-d'); ?>
            <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="sales-pos.php?status=all" method="POST">
                    
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
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                    <form action="sales-pos.php?status=monthly" method="POST">
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
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                    <form action="sales-pos.php?status=yearly" method="POST">
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
                    <h3 style ="float:right; margin-right:3%;">YEARLY SALES</h3>
                    <?php endif; ?>
                    </form>
                </div>
           <?php elseif($status == 'daily'):
                $date_nows = date('Y-m-d');
                $day_ends = (isset($_POST['start_day']) ? date("Y-m-d", strtotime($_POST['start_day']."+1 day")) : date("Y-m-d"));    
            ?>
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="sales-pos.php?status=daily" method="POST">
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
								<th width ="0.5%">#</th>
									<th width ="20%">Customer Details</th>
									<th width ="15%">Product Details</th>
									<th width ="25%">Payment Information</th>
									<th width ="10%">Total Amount</th>
									<th width ="10%">Profit</th>
									<th width ="10%">Delivery Status</th>
									<th width ="10%">Action</th>
								</tr>
							</thead>
						<tbody>
					<?php
            	foreach ($result as $row) {
            		$i++;
            		?>   
            		<tr class="bg-g"> 
            		<td><?php echo $i; ?></td>
	                    <td><?php // CUSTOMER DETAILS // ?>
                            <b>Customer Name:</b> <?php echo $row['name']; ?><br>
							<b>Address:</b> <?php echo $row['cust_address']; ?><br>
                            <b>Contact:</b> <?php echo $row['cust_contact']; ?><br><br>
						</td>
						<td><?php // PRODUCT DETAILS // ?><?php
						$a=0;
						$result1 = $pdo->prepare("SELECT *, SUM(qty) as totalQty,
												SUM(p_current_price) as totalAmounts
												FROM tbl_salesorder_pos 
												WHERE invoice=?
												GROUP BY product 
												"); 
						$result1->execute(array($row['invoice_number']));
						$result = $result1->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row1) {
						$totQTY = $row1 ['qty'];
						$totprice = $row1 ['p_current_price'];
						$total = $totprice * $totQTY;
						$a++;
						 echo '<b>Product: </b> '.$row1['p_name'];
						 echo '<br><b>Quantity: </b>'.$row1['totalQty'];
						 echo '<br> <b>Price:</b>  ₱'.formatMoney ($row1['totalAmounts'], true).'';
						 echo '<br><br>';
				    	}
                        ?></td> 
						<?php // PAYMENT DETAILS // ?>
                        <td>
						<b>Payment Method: </b><?php echo '<span style="color:red;">' .$row['type']; ?><br></span>
						<b>Invoice Number: </b><?php echo $row['invoice_number']; ?><br>
						<b>Date: </b> <?php echo date('l | F d, Y | h:i:s A', strtotime($row['datePOS'])); ?><br>
						<b>Cashier: </b> <?php echo $row['cashier']; ?><br>
						<b>Discount: </b> <?php 
						$discount = $row['discount_status'];
						$discount1 = $row['discount_name'];  
						if($discount == 0){
						echo 'No Discount';
						}
						else {
						echo $discount1;
						}
						?><br>
						<b>Delivery Location & Fee: </b> 
						<?php 
						$ship = $row['shipping_id'];
						$shipp = $row['city_name'];
						$sf = $row['shipAmount'];  
						if($ship == 0){
						echo 'Completed';
						}
						else {
						echo $shipp ." ₱" . $sf;
						}
						?>
					    </td>
						<?php // TOTAL AMOUNT // ?>
						<td><p style ="float:right;">₱
				        <?php echo formatMoney($row['totalSales'],true); ?>
						</td>
						<td><p style ="float:right;">₱
				        <?php echo formatMoney($row['TotalProfit'],true); ?>
						</td>
						<td>
                        <?php
		                $status = $row['shipping_id']; 
                        if ($status == 0)
		            	{
			               echo 'Completed';
		            	}    
        		        else 
        		    	{
			        	// echo 'For Delivery'; ?>
						<?php
						$result1 = $pdo->prepare("SELECT photo_delivery_receipt, receipt_date_upload
												FROM tbl_sales_pos 
												WHERE invoice_number=?"); 
						$result1->execute(array($row['invoice_number']));
						$result = $result1->fetchAll(PDO::FETCH_ASSOC);
						$photo = $result[0]["photo_delivery_receipt"];
						$dateupload = $row["receipt_date_upload"];
						$unixtime = 1307595105;
						?>
						<?php if($photo == "" || $photo == NULL):?>
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<h5><b>Upload Delivery Receipt:</b></h5>
								<input type="hidden" name="invoiceID" value="<?php echo $row['invoice_number'];?>">
								<input type="file" name="photo">
								<br><button type="submit" name="form1pic" class="btn btn-l btn-success pull-left" style="width:100%;margin-bottom:4px;">Submit</button>
							</div>
						</form>
						<?php else:?>
							<h5>Delivery Receipt</h5><a href="javascript:void(0);" class="btn btn-l btn-primary image_show"style="width:100%;margin-bottom:4px;" data-image="<?php echo $photo;?>">View Receipt</a>
						<?php endif;?>
						
						</div>
						<?php
						}
						?>
                        </td>
					<td>
					    <br><br>
					    
					<?php if($status >= 1) {
					      if($photo == '' || $photo == NULL) { ?>
					  
			     	<?php } elseif($status >= 1) {
					        if($photo !== '' || $photo !== NULL) { ?>
					   <a href ="" class="btn btn-l btn-primary" style="width:100%;margin-bottom:4px;" data-href="return-pos.php?id=<?php echo $row['invoice']; ?>"  data-toggle="modal" data-target="#confirm-delete">Process Return</a>
			
					<?php 
			     	}
			     	}
					}
					?>
					<?php if($status == 0) {
					    if($photo == '' || $photo == NULL)?>
					<a href ="" class="btn btn-l btn-primary" style="width:100%;margin-bottom:4px;" data-href="return-pos.php?id=<?php echo $row['invoice']; ?>"  data-toggle="modal" data-target="#confirm-delete">Process Return</a>
					</td>	  				           
	                </tr>
            		<?php
				}
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div>
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Return Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to return this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Confirm</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="show-reciept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delivery Receipt:</h4>
            </div>
            <div class="modal-body">
              <img id="image_here" style="width:100%;margin-top:20px;border-radius:0; src="" alt="">
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
		$(document).ready(function(){
			$('.image_show').on('click',function(e){
				e.preventDefault();
				var imgFile = $(this).data('image');
				let img = document.getElementById('image_here');
				img.src = 'delivery-receipt-pos/'+imgFile;
				$('#show-reciept').modal('show');
			})
		})
</script>