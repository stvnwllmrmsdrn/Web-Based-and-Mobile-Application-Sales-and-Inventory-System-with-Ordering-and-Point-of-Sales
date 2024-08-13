<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Online Lowest Demand Products</h1>
	</div>
	<div>
	<a href ="PrintLowDemandProductOnline.php" style="float:right;" class="btn btn-success btn-sm"> Print</a>
</div>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr class ="bg-gray">
								<th width="1%">#</th>
                                <th width="3%" height="5%">Photo</th>
								<th width ="40%">Product Name</th>
								<th width ="20%">Price</th>
								<th width ="20%; float:right;">Number of Sold</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
                        	$statement = $pdo->prepare("SELECT sum(t1.quantity) as total, 
                                                               t1.product_name, 
                                                               t1.quantity, 
                                                               t1.product_id,
                                                               t1.unit_price,
                                                               t1.payment_id,

                                                               t2.p_id,
                                                               t2.p_featured_photo,
                                                               t2.p_name,
                                                               
                                                               t3.payment_id,
                                                               t3.delivery_status
       
                                                               FROM tbl_order t1
                                                               JOIN tbl_product t2
                                                               ON t1.product_id = t2.p_id
                                                               JOIN tbl_payment t3
                                                               ON t1.payment_id = t3.payment_id
                                                               WHERE t3.delivery_status = 'Completed'
                                                               GROUP BY t1.product_id 
                                                               ORDER BY total 
                                                               ASC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-r">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:82px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:80px;"></td>
									<td><p style ="color:black;"><?php echo $row['product_name']; ?></td><td><p style ="color:black;float:right;">₱ <?php echo number_format((float)$row['unit_price'],2); ?></td>
									<td><p style ="color:black; float:right;"><?php echo $row['total']; ?></td>
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

<?php require_once('footer.php'); ?>