<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Walk-in Lowest Sales Products</h1>
	</div>
	<div>
	<a href ="PrintLowestEarningsWalkin.php" style="float:right;" class="btn btn-success btn-sm"> Print</a>
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
                                <th width="1%">Photo</th>
								<th width ="40%">Product Name</th>
								<th width ="10%">Price</th>
								<th width ="10%">Number of Sold</th>
								<th width ="20%; float:right;">Total Sales</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
                            $statement = $pdo->prepare("SELECT t1.p_current_price * sum(t1.qty) as total, 
                                                               t1.p_name, 
                                                               t1.p_current_price, 
                                                               t1.product,
                                                               SUM(t1.qty) as totqty,

                                                               t2.p_id,
                                                               t2.p_featured_photo 


                                                               FROM tbl_salesorder_pos t1 
                                                               JOIN tbl_product t2
                                                               ON t1.product = t2.p_id
                                                               WHERE t1.p_current_price                                                               
                                                               GROUP BY t1.product 
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
									<td><p style ="color:black;"><?php echo $row['p_name']; ?></td>
									<td><p style ="color:black; float:right;">₱ <?php echo number_format((float)$row['p_current_price'],2); ?></td>
									<td><p style ="color:black;float:right;"><?php echo $row['totqty']; ?></td>
									<td><p style ="color:black; float:right;">₱ <?php echo number_format((float)$row['total'],2); ?></td>
									
									
									
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