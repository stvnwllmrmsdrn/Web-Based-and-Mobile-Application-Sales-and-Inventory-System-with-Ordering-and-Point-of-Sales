<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Cashier</h1>
	</div>
	<div class="content-header-right">
		<a href="user-pos-add.php" class="btn btn-primary btn-sm">Add Cashier</a>
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
								<th>Username</th>
                				<th>Cashier Name</th>
                				<th>Position</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT * FROM tbl_user_pos");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class="bg-g">
									<td><?php echo $i; ?></td>
									<td><?php echo $row['username']; ?></td>
    							    <td><?php echo $row['name']; ?></td>
									<td><?php echo $row['position']; ?></td>		
									<td><a href="user-pos-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs" >Edit</a>
									<a href="#" class="btn btn-danger btn-xs" data-href="user-pos-delete.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to update this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>