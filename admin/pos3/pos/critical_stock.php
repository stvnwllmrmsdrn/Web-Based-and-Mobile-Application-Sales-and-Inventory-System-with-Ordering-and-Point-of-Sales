<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Critical Stock Level</h1>
	</div>
	<div class="content-header-right">
	<button style="float:right;" class="btn btn-success btn-large" onclick="window.print()"> Print</button></a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="30">#</th>
								<th>Product Name</th>
                                <th>Barcode </th>
								<th>Quantity</th>
                                <th> Critical Level Status </th>
                                <th> Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty < 20 ORDER BY p_id");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
                                    <td> <?php echo "<img alt='' src='barcode.php?codetype=code128&size=40&text=".$row['p_id']."&print=true'/>"?></td>	
									<td><?php echo $row['p_name']; ?></td>	
                 			        <td><font style="color:rgb(255, 95, 66);;"><?php echo $row['p_qty']; ?></font></td>
                                     <td><?php echo "Need Restock"; ?></td>
                                     <td><a href="add_critical_stock.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-xs">Add Stock</a>
								
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

<?php require_once('footer.php'); ?>