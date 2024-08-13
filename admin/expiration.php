<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Expired Product</h1>
	</div>
	<div class="content-header-right">
<a href ="PrintExpired.php" style ="float:right;" class="btn btn-success btn-sm"> Print</a>
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
								<th width="1%">#</th>
								<th>Photo</th>
								<th>Barcode </th>
								<th>Product Name</th>
								<th>Quantity</th>
                                <th> Expiration Date </th>
                                <th> Status </th>
								
							</tr>
						</thead>
						<tbody>
						<?php
                            $date_today = date('Y-m-d h:i:s');
							$expired_sevenday = date('Y-m-d', strtotime($date_today . '+1 month'));
							$i=0;
							$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE date_expire <= '".$expired_sevenday."' AND date_expire != '00:00:00' ORDER BY p_id");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class =  "<?php
								
								if($row['date_expire'] < $date_today)
								{
									echo 'bg-r';
								}
								else if($row['date_expire'] > $date_today && $row['date_expire'] <= $expired_sevenday){
									echo 'bg-g';
								}
								else
								{
									echo '';
								}
								?>">
									<td><?php echo $i; ?></td>
									<td style="width:82px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="<?php echo $row['p_name']; ?>" style="width:80px;"></td>
									
                                    <td> <?php echo "<img alt='' src='barcode.php?codetype=code128&size=40&text=".$row['p_id']."&print=true'/>"?></td>	
									<td><?php echo $row['p_name']; ?></td>	
                 			        <td><p style ="float:right;"><?php
									$qty = $row['p_qty']; 
									if ($qty > 0)
									{
										echo $qty;
									}
									else
									{
										echo 'Out of Stock';
									}
									
									
									?> </td>
                            
                                    <td><?php echo date('F d, Y', strtotime($row['date_expire'])); ?></td>
                                    <td><?php
								
									if($row['date_expire'] < $date_today)
									{
										echo '<span style="color:red;font-weight:400;">EXPIRED</span>';
									}
									else if($row['date_expire'] > $date_today && $row['date_expire'] <= $expired_sevenday){
										echo '<span style="color:orange;font-weight:400;">NEAR TO EXPIRE</span>';
									}
									else
									{
										echo '';
									}
									?>
									
									
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