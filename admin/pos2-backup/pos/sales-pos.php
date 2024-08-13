<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>POS Sales Report</h1>
</div>
<div>
<button  style="float:right;" class="btn btn-success btn-large" onclick="window.print()"> Print</button></a>
</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th>Transaction ID</th>
								<th width="160">Invoice Number</th>
								<th width="60">Customer Name</th>
								<th width="60">Product Name</th>
								<th width="60">Price</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Date</th>
                                <th>Payment Type</th>
                                <th>Cashier</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT
                                                        s1.transaction_id,
                                                        s1.invoice,
                                                        s2.name,
                                                        s1.p_name,
                                                        s1.p_current_price,
                                                        s1.qty,
                                                        s1.amount,
                                                        s1.date,
                                                        s2.type,
                                                        s2.cashier FROM tbl_salesorder_pos AS s1, tbl_sales_pos AS s2 WHERE s1.transaction_id = s2.transaction_id ORDER BY transaction_id DESC");

							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
                                    <td><?php echo $row['transaction_id']; ?></td>
									<td><?php echo $row['invoice']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['p_name']; ?></td>
									<td>₱<?php echo formatMoney ($row['p_current_price'], true); ?></td>
									<td><?php echo $row['qty']; ?></td>
                                    <td>₱<?php echo formatMoney ($row['amount'], true); ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['cashier']; ?></td>
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