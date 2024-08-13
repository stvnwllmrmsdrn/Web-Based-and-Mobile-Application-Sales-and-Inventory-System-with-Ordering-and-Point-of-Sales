<?php require_once('header.php'); ?>
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
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
$start_dates = (isset($_POST['start_date']) ? $_POST['start_date']." 01:00:00" : $date_nowss);
$end_dates = $date_weekss;
$statement = $pdo->prepare("SELECT
						      t1.p_id,
							  t1.p_name,
							  t1.p_old_price,
						      t1.p_current_price,
							  t1.p_qty as current_quantity,
							  t1.p_featured_photo,
							  t1.p_is_featured,
							  t1.p_is_active,
							  t1.ecat_id,
							  t1.reorder_level,
							  t1.supplier_id,
							  t1.p_walkin_price,

							  t2.ecat_id,
							  t2.ecat_name,

							  t3.mcat_id,
							  t3.mcat_name,

							  t4.tcat_id,
							  t4.tcat_name,

						      t5.supplier_id,
							  t5.supplier_name,
							  
							  t6.date as sold_date,
							  t6.product_id,
							  t6.quantity as sold_quantity,
							  t6.id,
							  t6.invoice_payment_id

							  FROM tbl_product t1
							  JOIN tbl_end_category t2
							  ON t1.ecat_id = t2.ecat_id
							  JOIN tbl_mid_category t3
							  ON t2.mcat_id = t3.mcat_id
							  JOIN tbl_top_category t4
							  ON t3.tcat_id = t4.tcat_id
							  JOIN tbl_supplier t5 
							  ON t5.supplier_id = t1.supplier_id
							  JOIN tbl_salesoverall t6
							  ON t6.product_id = t1.p_id
							  WHERE t6.date
							  BETWEEN '".$start_dates."' AND '".$end_dates."'
							  GROUP BY t1.p_id
							  ORDER BY t1.p_id DESC");
}
elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 01:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT
						      t1.p_id,
							  t1.p_name,
							  t1.p_old_price,
						      t1.p_current_price,
							  t1.p_qty as current_quantity,
							  t1.p_featured_photo,
							  t1.p_is_featured,
							  t1.p_is_active,
							  t1.ecat_id,
							  t1.reorder_level,
							  t1.supplier_id,
							  t1.p_walkin_price,

							  t2.ecat_id,
							  t2.ecat_name,

							  t3.mcat_id,
							  t3.mcat_name,

							  t4.tcat_id,
							  t4.tcat_name,

						      t5.supplier_id,
							  t5.supplier_name,
							  
							  t6.date as sold_date,
							  t6.product_id,
							  t6.quantity as sold_quantity,
							  t6.id,
							  t6.invoice_payment_id

							  FROM tbl_product t1
							  JOIN tbl_end_category t2
							  ON t1.ecat_id = t2.ecat_id
							  JOIN tbl_mid_category t3
							  ON t2.mcat_id = t3.mcat_id
							  JOIN tbl_top_category t4
							  ON t3.tcat_id = t4.tcat_id
							  JOIN tbl_supplier t5 
							  ON t5.supplier_id = t1.supplier_id
							  JOIN tbl_salesoverall t6
							  ON t6.product_id = t1.p_id
							  WHERE t6.date
							  BETWEEN '".$start_datee."' AND '".$end_datee."'
							  GROUP BY t1.p_id
							  ORDER BY t1.p_id DESC");

} // MONTHLY FILTER QUERY
elseif($status == 'monthly'){
$month_sel = (isset($_POST['month_sect']) ? $_POST['month_sect'] : date('m'));
$year_sel = (isset($_POST['year_sect']) ? $_POST['year_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT
						      t1.p_id,
							  t1.p_name,
							  t1.p_old_price,
						      t1.p_current_price,
							  t1.p_qty as current_quantity,
							  t1.p_featured_photo,
							  t1.p_is_featured,
							  t1.p_is_active,
							  t1.ecat_id,
							  t1.reorder_level,
							  t1.supplier_id,
							  t1.p_walkin_price,

							  t2.ecat_id,
							  t2.ecat_name,

							  t3.mcat_id,
							  t3.mcat_name,

							  t4.tcat_id,
							  t4.tcat_name,

						      t5.supplier_id,
							  t5.supplier_name,
							  
							  t6.date as sold_date,
							  t6.product_id,
							  t6.quantity as sold_quantity,
							  t6.id,
							  t6.invoice_payment_id

							  FROM tbl_product t1
							  JOIN tbl_end_category t2
							  ON t1.ecat_id = t2.ecat_id
							  JOIN tbl_mid_category t3
							  ON t2.mcat_id = t3.mcat_id
							  JOIN tbl_top_category t4
							  ON t3.tcat_id = t4.tcat_id
							  JOIN tbl_supplier t5 
							  ON t5.supplier_id = t1.supplier_id
							  JOIN tbl_salesoverall t6
							  ON t6.product_id = t1.p_id
							  WHERE MONTH(t6.date) = '".$month_sel."'
				              AND YEAR(t6.date) = '".$year_sel."'
							  GROUP BY t1.p_id
							  ORDER BY t1.p_id DESC");

} // YEARLY FILTER QUERY
elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['yearly_sect']) ? $_POST['yearly_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT
						      t1.p_id,
							  t1.p_name,
							  t1.p_old_price,
						      t1.p_current_price,
							  t1.p_qty as current_quantity,
							  t1.p_featured_photo,
							  t1.p_is_featured,
							  t1.p_is_active,
							  t1.ecat_id,
							  t1.reorder_level,
							  t1.supplier_id,
							  t1.p_walkin_price,

							  t2.ecat_id,
							  t2.ecat_name,

							  t3.mcat_id,
							  t3.mcat_name,

							  t4.tcat_id,
							  t4.tcat_name,

						      t5.supplier_id,
							  t5.supplier_name,
							  
							  t6.date as sold_date,
							  t6.product_id,
							  t6.quantity as sold_quantity,
							  t6.id,
							  t6.invoice_payment_id

							  FROM tbl_product t1
							  JOIN tbl_end_category t2
							  ON t1.ecat_id = t2.ecat_id
							  JOIN tbl_mid_category t3
							  ON t2.mcat_id = t3.mcat_id
							  JOIN tbl_top_category t4
							  ON t3.tcat_id = t4.tcat_id
							  JOIN tbl_supplier t5 
							  ON t5.supplier_id = t1.supplier_id
							  JOIN tbl_salesoverall t6
							  ON t6.product_id = t1.p_id
							  WHERE t1.p_id AND YEAR(t6.date) = '".$yearly_sel."'
							  GROUP BY t1.p_id
							  ORDER BY t1.p_id DESC");

} // DAILY FILTER QUERY
elseif($status == 'daily'){
$daily = (isset($_POST['start_day']) ? $_POST['start_day']." 01:00:00" : date('Y-m-d 01:00:00'));
$daily_end = (isset($_POST['start_day']) ? $_POST['start_day']." 23:59:00" : date('Y-m-d 23:59:00'));
$statement = $pdo->prepare("SELECT
						      t1.p_id,
							  t1.p_name,
							  t1.p_old_price,
						      t1.p_current_price,
							  t1.p_qty as current_quantity,
							  t1.p_featured_photo,
							  t1.p_is_featured,
							  t1.p_is_active,
							  t1.ecat_id,
							  t1.reorder_level,
							  t1.supplier_id,
							  t1.p_walkin_price,

							  t2.ecat_id,
							  t2.ecat_name,

							  t3.mcat_id,
							  t3.mcat_name,

							  t4.tcat_id,
							  t4.tcat_name,

						      t5.supplier_id,
							  t5.supplier_name,
							  
							  t6.date,
							  t6.product_id,
							  t6.quantity as sold_quantity,
							  t6.id,
							  t6.invoice_payment_id

							  FROM tbl_product t1
							  JOIN tbl_end_category t2
							  ON t1.ecat_id = t2.ecat_id
							  JOIN tbl_mid_category t3
							  ON t2.mcat_id = t3.mcat_id
							  JOIN tbl_top_category t4
							  ON t3.tcat_id = t4.tcat_id
							  JOIN tbl_supplier t5 
							  ON t5.supplier_id = t1.supplier_id
							  LEFT JOIN tbl_salesoverall t6
							  ON t6.product_id = t1.p_id 
							  WHERE t1.p_id AND t6.date
							  BETWEEN '".$daily."' AND '".$daily_end."'
							  GROUP BY t1.p_id
							  ORDER BY t1.p_id DESC");
							  
// $statement1 = $pdo -> prepare("SELECT * FROM tbl_salesoverall 
//                                 WHERE date BETWEEN '".$daily."' AND '".$daily_end."'");
}
else {
   $statement = $pdo->prepare("SELECT
						      t1.p_id,
							  t1.p_name,
							  t1.p_old_price,
						      t1.p_current_price,
							  t1.p_qty as current_quantity,
							  t1.p_featured_photo,
							  t1.p_is_featured,
							  t1.p_is_active,
							  t1.ecat_id,
							  t1.reorder_level,
							  t1.supplier_id,
							  t1.p_walkin_price,

							  t2.ecat_id,
							  t2.ecat_name,

							  t3.mcat_id,
							  t3.mcat_name,

							  t4.tcat_id,
							  t4.tcat_name,

						      t5.supplier_id,
							  t5.supplier_name,
							  
							  t6.date as sold_date,
							  t6.product_id,
							  t6.quantity as sold_quantity,
							  t6.id,
							  t6.invoice_payment_id

							  FROM tbl_product t1
							  JOIN tbl_end_category t2
							  ON t1.ecat_id = t2.ecat_id
							  JOIN tbl_mid_category t3
							  ON t2.mcat_id = t3.mcat_id
							  JOIN tbl_top_category t4
							  ON t3.tcat_id = t4.tcat_id
							  JOIN tbl_supplier t5 
							  ON t5.supplier_id = t1.supplier_id
							  LEFT JOIN tbl_salesoverall t6
							  ON t1.p_id = t6.product_id
							  WHERE t1.p_id
							  GROUP BY t1.p_id 
							  ORDER BY t1.p_id DESC");
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// die();
$soldquantity = 0;
$currentquantity = 0;
$stocks = 0;
foreach ($result as $rowAmount) {
    $soldquantity = $rowAmount['sold_quantity'];
    $currentquantity = $rowAmount['current_quantity'];
    $stocks = $currentquantity - $soldquantity;
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>View Products</h1> 
		<!--<marquee behavior="scroll" direction="right" style="color:red; font-size:14px;"><b>SYSTEM MAINTENANCE !!! </b><img src="img/maintenance.gif" style="width:20px" ?></font> </marquee>-->
	</div>

	<div>
<!--<form action="printproduct.php" method="POST">-->
<!--<?php// if($status == 'weekly'):?>-->
<!--<input type="hidden" name="status" value="<?php //echo isset($_GET['status']) ? $_GET['status'] : '' ?>">-->
<!--<input type="hidden" name="start_date" value="<?php //echo $start_dates?>">-->
<!--<input type="hidden" name="end_date" value="<?php //echo $end_dates?>">-->
<!--<?php //elseif($status == 'monthly'):?>-->
<!--<input type="hidden" name="status" value="<?php //echo isset($_GET['status']) ? $_GET['status'] : '' ?>">-->
<!--<input type="hidden" name="start_date" value="<?php //echo $month_sel?>">-->
<!--<input type="hidden" name="end_date" value="<?php //echo $year_sel?>">-->
<!--<?php //elseif($status == 'yearly'):?>-->
<!--<input type="hidden" name="status" value="<?php //echo isset($_GET['status']) ? $_GET['status'] : '' ?>">-->
<!--<input type="hidden" name="start_date" value="<?php //echo $yearly_sel?>">-->
<!--<input type="hidden" name="end_date" value="">-->
<!--<?php //elseif($status == 'daily'):?>-->
<!--<input type="hidden" name="status" value="<?php //echo isset($_GET['status']) ? $_GET['status'] : '' ?>">-->
<!--<input type="hidden" name="start_date" value="<?php //echo $daily?>">-->
<!--<input type="hidden" name="end_date" value="<?php //echo $daily_end?>">-->
<!--<?php //elseif($status == 'all'):?>-->
<!--<input type="hidden" name="status" value="<?php //echo isset($_GET['status']) ? $_GET['status'] : '' ?>">-->
<!--<input type="hidden" name="start_datee" value="<?php //echo $start_datee?>">-->
<!--<input type="hidden" name="end_datee" value="<?php //echo $end_datee?>">-->
<!--<?php//endif;?>-->

<!--<a href="printproduct.php"style="float:right;" class="btn btn-success btn-large"> Print W/</a>-->
<!--<a href="ProductWPicture.php" style="float:right; margin-right: 2px;" class="btn btn-success btn-large">Print W/o</a>-->
		</form>
<a href="product-add.php" style="float:right; margin-right: 2px;" class="btn btn-success btn-large">Add Product</a>
<div class="btn-group dropleft" style ="float:right; margin-right: 2px;">
  <a class="btn btn-success dropdown-toggle"  data-toggle="dropdown">
Print  <i class="fa fa-caret-down"> </i>
    </button>
  </a>
  <div class="dropdown-menu">
    <a class="btn btn-primary dropdown-item" href="printproduct.php" style="margin-bottom: 2px;">With Picture</a>
    <a class="btn btn-warning dropdown-item" href="ProductWPicture.php">W/o Picture</a>
  </div>
</div>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th>Photo</th>
								<th>Barcode</th>
								<th width="160">Product Name</th>
								<th width="60">Supplier Price</th>
								<th width="60">Online Price</th>
								<th width="60">Walk-in Price</th>
								<th width="60">Quantity</th>
								<!--<th width="60">Number of Sold</th>-->
								<th>Featured?</th>
								<th>Active?</th>
								<th>Category</th>
								<th>Supplier</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td style="width:82px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="<?php echo $row['p_name']; ?>" style="width:80px;"></td>
									<td> <?php echo "<img alt='' src='barcode.php?codetype=code128&size=40&text=".$row['p_id']."&print=true'/>"?></td>	
								
									<td><?php echo $row['p_name']; ?></td>
									<td>₱<?php echo formatMoney ($row['p_old_price'], true); ?></td>
									<td>₱<?php echo formatMoney ($row['p_current_price'], true); ?></td>
									<td>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></td>
									<td><?php
									    $qty = $row['current_quantity'];
									    $sold_quant = $row['sold_quantity'];
									    $totalquant = $qty + $sold_quant;
        									if ($qty > 0)
            									{
            										echo $qty;
            									}
        									else
            									{
            									    echo '<font style="color:rgb(255, 95, 66);">';
            										echo 'Out of Stock';
            									}
        									?>
									</td>
								 <?php
								// 	if ($sold_quant != 0)
								// 	{
								// 	    echo $sold_quant;
								// 	}
								// 	else {
								// 	echo '<font style="color:rgb(255, 95, 66);">';
								// 	echo '0';
								// 	}
								// 	?>
									
									
									<td>
										<?php if($row['p_is_featured'] == 1) {echo '<span class="badge badge-success" style="background-color:green;">Yes</span>';} else {echo '<span class="badge badge-success" style="background-color:red;">No</span>';} ?>
									</td>
									<td>
										<?php if($row['p_is_active'] == 1) {echo '<span class="badge badge-success" style="background-color:green;">Yes</span>';} else {echo '<span class="badge badge-danger" style="background-color:red;">No</span>';} ?>
									</td>
									<td><?php echo $row['tcat_name']; ?><br><?php echo $row['mcat_name']; ?><br><?php echo $row['ecat_name']; ?></td>
									<td><?php echo $row['supplier_name'];?></td>
									<td>										
										<a href="product-edit.php?id=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
										<a href="#" class="btn btn-danger btn-xs" data-href="product-delete.php?id=<?php echo $row['p_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
									</td>
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
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
                <p style="color:red;">Be careful! This product will be deleted from the order table, payment table, size table, color table and rating table also.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>