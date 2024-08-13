<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Walk-in Highest Demand Products</h1>
	</div>
	<div>
	<a href ="PrintHighestDemandWalkin.php" style="float:right;" class="btn btn-success btn-sm"> Print</a>
</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr class ="bg-gray">
								<th width="1%">#</th>
                                <th width="5%">Photo</th>
								<th width ="40%">Product Name</th>
								<th width ="20%">Price</th>
								<th width ="20%; float:right;">Number of Sold</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
                        	$statement = $pdo->prepare("SELECT sum(t1.qty) as total, 
                                                                t1.p_name, 
                                                                t1.qty, 
                                                                t1.product,
                                                                t1.p_current_price,
                                                                SUM(t1.qty) as totqty,
                                                                
                                                                t2.p_id,
                                                                t2.p_featured_photo 


                                                                FROM tbl_salesorder_pos t1 
                                                                JOIN tbl_product t2
                                                                ON t1.product = t2.p_id
                                                                WHERE t1.qty 
                                                                GROUP BY t1.product 
                                                                ORDER BY total 
                                                                DESC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-g">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:82px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:80px;"></td>
									<td><p style ="color:black;"><?php echo $row['p_name']; ?></td>
									<td><p style ="color:black; float:right;">₱ <?php echo formatMoney($row['p_current_price'],true); ?></td>
									<td><p style ="color:black; float:right;"><?php echo $row['totqty']; ?></td>
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