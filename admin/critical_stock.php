<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Critical Stock Level</h1>
	</div>
	<div class="content-header-right">
	<a href ="PrintCritical.php" style ="float:right;" class="btn btn-success btn-sm"> Print</a>
	</div>
</section>
 
								
<!--<form method="post" action="critical_stock.php" style ="margin-left: 20px;">-->
<!--        <label for="filterDropdown">Select Filter:</label>-->
<!--        <select name="filterOption" id="filterDropdown">-->
<!--            <option value="0">Out of Stock</option>-->
            <!-- Add more options as needed -->
<!--        </select>-->
<!--        <button type="submit" name="submit">Filter</button>-->
<!--    </form>-->

<!--    <div id="filteredData">-->
<!--      -->
<!--      //  if (isset($_POST['submit'])) {-->
<!--       //     $selectedOption = $_POST['filterOption'];-->

<!--       //     $dsn = "mysql:host=127.0.0.1:3306t;dbname=u393106330_ecommerceweb";-->
<!--        //    $username = "u393106330_admin";-->
<!--        //    $password = "123123123PDm!";-->

<!--      //      try {-->
<!--      //          $pdo = new PDO($dsn, $username, $password);-->
<!--        //        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);-->

 
<!--       //         $stmt = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty = :selectedOption");-->
<!--        //        $stmt->bindParam(':selectedOption', $selectedOption);-->
<!--       //         $stmt->execute();-->

<!--       //         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {-->
<!--      //           $stmt = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty = :selectedOption");-->
<!--      //          }-->
<!--     //       } catch (PDOException $e) {-->
<!--       //         echo "Connection failed: " . $e->getMessage();-->
<!--     //       }-->


    
    <!--</div>-->
								
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="30">#</th>
								<th>Photo</th>
								<th>Barcode </th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Critical Level</th>
                                <th> Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty <= reorder_level ORDER BY p_id");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class="bg-r"> 
									<td><?php echo $i; ?></td>
									<td style="width:82px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="<?php echo $row['p_name']; ?>" style="width:80px;"></td>
									
                                    <td> <?php echo "<img alt='' src='barcode.php?codetype=code128&size=40&text=".$row['p_id']."&print=true'/>"?></td>	
									<td><?php echo $row['p_name']; ?></td>	
                 			        <td><font style="color:rgb(255, 95, 66);;">
									<?php 
									$qty = $row['p_qty']; 
									if($qty > 0)
									{
										echo $qty;
									}
									else
									{
										echo 'Out of Stock';
									}
									?></font></td>
									 <td><p style ="float:right;"><?php echo $row['reorder_level']; ?></font></td>
                                     <td><a href="" class ="btn btn-primary btn-xs" data-href ="add_critical_stock.php?p_id=<?php echo $row['p_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Restock</a>
								
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
                <h4 class="modal-title" id="myModalLabel">Restock Product Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to restock this product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary btn-ok">Confirm</a>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>