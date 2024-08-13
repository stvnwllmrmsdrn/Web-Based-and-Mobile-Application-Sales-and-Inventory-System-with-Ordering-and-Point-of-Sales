<?php require_once('header.php'); ?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php

$statement = $pdo->prepare("SELECT * FROM tbl_product");
$statement->execute();
$total_product = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_status='1'");
$statement->execute();
$total_customers = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost");
$statement->execute();
$available_shipping = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Completed'));
$total_order_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE shipping_status=?");
$statement->execute(array('Completed'));
$total_shipping_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$total_order_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE return_status=? ");
$statement->execute(array('Request'));
$total_return_request = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE return_status=? ");
$statement->execute(array('Returned'));
$total_order_return = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=? AND shipping_status=?");
$statement->execute(array('Completed','Pending'));
$total_order_complete_shipping_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty < reorder_level ORDER BY p_id DESC");
$statement->execute();
$out_of_stock = $statement->rowCount();

$date_today = date('Y-m-d h:i:s');
$expired_sevenday = date('Y-m-d', strtotime($date_today . '+1 month'));
$i=0;
$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE date_expire < '".$expired_sevenday."' AND date_expire != '00:00:00' ORDER BY p_id");
$statement->execute();
$expired = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty = 0 ORDER BY p_id DESC");
$statement->execute();
$zerostock = $statement->rowCount();


?>

<section class="content">
<div class="row">
        <a href="product.php">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $total_product; ?></h3>

                  <p>Products</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-cart"></i>
                </div>
                
              </div>
            </div>
        </a>

        <a href="expiration.php">
            <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-maroon">
				  <div class="inner">
					<h3><?php echo $expired; ?></h3>
  
					<p>Near/Expired Product</p>
				  </div>
				  <div class="icon">
				      <i class="ionicons ion-sad"></i>
					
				  </div>
				  
				</div>
			  </div>
		</a>
		
        <a href="critical_stock.php">
            <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
				  <div class="inner">
					<h3><?php echo $out_of_stock; ?></h3>
  
					<p>Critical Stock Level</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-alert"></i>
				  </div>
				  
				</div>
			  </div>
		</a>
			  
			  
			 <a href="critical_stock.php">
			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-maroon">
				  <div class="inner">
					<h3><?php echo $zerostock; ?></h3>
                    
					<p>Out of Stock</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-close-circled"></i>
				  </div>
				  
				</div>
			  </div>

		</a>
        
            <!-- ./col -->
        <a href="order.php">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $total_order_completed; ?></h3>

                  <p>Completed Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-checkbox-outline"></i>
                </div>
               
              </div>
            </div>
        </a>
            <!-- ./col -->
        <a href="order.php">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3><?php echo $total_shipping_completed; ?></h3>

                  <p>Completed Shipping</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-checkmark-circled"></i>
                </div>
                
              </div>
            </div>
        </a>
			<!-- ./col -->
		<a href="order.php">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
				  <div class="inner">
					<h3><?php echo $total_order_complete_shipping_pending; ?></h3>
  
					<p>Pending Shippings</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-load-a"></i>
				  </div>
				  
				</div>
			  </div>
			</a>
            
        <a href="order.php">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $total_order_pending; ?></h3>

                  <p>Pending Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div>
        </a>
        
       <a href="return_ordering.php">
            <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-orange">
				  <div class="inner">
					<h3><?php echo $total_return_request; ?></h3>
  
					<p>Return Order Requests</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-android-exit"></i>
				  </div>
				  
				</div>
			  </div>
		</a>

		<a href="return_ordering.php">
            <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
				  <div class="inner">
					<h3><?php echo $total_order_return; ?></h3>
  
					<p>Return Orders</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-android-arrow-back"></i>
				  </div>
				  
				</div>
			  </div>
		</a>
		
            <a href="shipping-cost.php">
			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-teal">
				  <div class="inner">
					<h3><?php echo $available_shipping; ?></h3>
  
					<p>Available Shippings Locations</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-location"></i>
				  </div>
				  
				</div>
			  </div>
			</a>
			
			<a href="customer.php">
            <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
				  <div class="inner">
					<h3><?php echo $total_customers; ?></h3>
  
					<p>Active Customers</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-person-stalker"></i>
				  </div>
				  
				</div>
			  </div>
			  </div>
			</a>
            <!-- ./col -->

	<div class="content-header-left">
		<h1><img src="img/giphy.gif" width="45" height="35"><i> ONLINE CUSTOMERS</i></h1>
						</div>
<?php // HIGHEST EARNINGS PRODUCTS ?>
		<div class="row">
		<div class="col-lg 3 col-xs-6">
		<div class="small-box bg-blue">
				  <div class="inner">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr class ="bg-black">
								<th width="0.1%"><h4 style ="color:white;">#</th>
								<th width="1%"><h4 style ="color:white;">Photo</th>
								<th width="25%"><h4 style ="color:white;"> Product Name</th>
								<th width="5%"><h4 style ="color:white;">Total Sales</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT t1.unit_price * sum(t1.quantity) as total, 
                                                               t1.product_name, 
                                                               t1.unit_price, 
                                                               t1.product_id,
                                                               t1.quantity,

                                                               t2.p_id,
                                                               t2.p_name,
                                                               t2.p_featured_photo 
                                                               
                                                               FROM tbl_order t1
                                                               JOIN tbl_product t2
                                                               ON t1.product_id = t2.p_id 
                                                               WHERE unit_price 
                                                               GROUP BY product_id 
                                                               ORDER BY total 
                                                               DESC LIMIT 1");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-white">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:60px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:60px;"></td>
									<td><p style ="color:black;"><?php echo $row['product_name']; ?></td>
									<td><p style ="color:black; float:right;">₱ <?php echo number_format((float)$row['total'],2); ?></td>
								</tr>
								<p style ="color:White; font-size:30px;"><i><img src="img/highest.gif" width="45" height="30"> Highest Sales Product</p></i>	
								<a href="rep_highest_earnings_online.php" style="color:black; float:right; font-size:20px;"><u>View More</u></a>	
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<?php // LOWEST EARNINGS PRODUCTS ?>
		<div class="row">
		<div class="col-lg 3 col-xs-6">
		<div class="small-box bg-maroon">
				  <div class="inner">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr class ="bg-black">
								<th width="0.1%"><h4 style ="color:white;">#</th>
								<th width="1%"><h4 style ="color:white;">Photo</th>
								<th width="20%"><h4 style ="color:white;"> Product Name</th>
								<th width="5%"><h4 style ="color:white;">Total Sales</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT t1.unit_price * sum(t1.quantity) as total, 
                                                               t1.product_name, 
                                                               t1.unit_price, 
                                                               t1.product_id,
                                                               t1.quantity,

                                                               t2.p_id,
                                                               t2.p_name,
                                                               t2.p_featured_photo 
                                                               
                                                               FROM tbl_order t1
                                                               JOIN tbl_product t2
                                                               ON t1.product_id = t2.p_id 
                                                               WHERE unit_price 
                                                               GROUP BY product_id 
                                                               ORDER BY total 
                                                               ASC LIMIT 1");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-white">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:60px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:60px;"></td>
									<td><p style ="color:black;"><?php echo $row['product_name']; ?></td>
									<td><p style ="color:black; float:right;">₱ <?php echo number_format((float)$row['total'],2); ?></td>
								</tr>
								<p style ="color:White; font-size:30px;"><i><img src="img/lowest.gif" width="45" height="30"> Lowest Sales Product</p></i>
								<a href="rep_lowest_earnings_online.php" style="color:black; float:right; font-size:20px;"><u>View More</u></a>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
						</div>
						</div>

			  <?php // HIGH DEMAND ONLINE ?>
		<div class="row">
		<div class="col-lg 3 col-xs-6">
		<div class="small-box bg-blue">
				  <div class="inner">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr class ="bg-black">
								<th width="0.1%"><h4 style ="color:white;">#</th>
								<th width="1%"><h4 style ="color:white;">Photo</th>
								<th width="20%"><h4 style ="color:white;"> Product Name</th>
								<th width="2%"><h4 style ="color:white;">Sold</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT sum(t1.quantity) as total, 
                                                               t1.product_name, 
                                                               t1.quantity, 
                                                               t1.product_id,

                                                               t2.p_id,
                                                               t2.p_featured_photo,
                                                               t2.p_name
       
                                                               FROM tbl_order t1
                                                               JOIN tbl_product t2
                                                               ON t1.product_id = t2.p_id
                                                               WHERE quantity 
                                                               GROUP BY product_id 
                                                               ORDER BY total 
                                                               DESC LIMIT 3");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-white">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:60px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:60px;"></td>
									<td><p style ="color:black;"><?php echo $row['product_name']; ?></td>
									<td><p style ="color:black;"><?php echo $row['total']; ?></td>
								</tr>
								
								
								<?php
							}
							?>		
							<p style ="color:White; font-size:30px;"><i><img src="img/highest.gif" width="45" height="30"> Highest Demand Product</p></i>						
							<a href="rep_highest_demand_online.php" style="color:black; float:right; font-size:20px;"><u>View More</u></a>					
						</tbody>
					</table>
				</div>
			</div>
		</div>
	

		<?php // LOW DEMAND ONLINE ?>
		<div class="row">
		<div class="col-lg 3 col-xs-6">
		<div class="small-box bg-maroon">
				  <div class="inner">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr class ="bg-black">
								<th width="0.1%"><h4 style ="color:white;">#</th>
								<th width="1%"><h4 style ="color:white;">Photo</th>
								<th width="20%"><h4 style ="color:white;"> Product Name</th>
								<th width="2%"><h4 style ="color:white;">Sold</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT sum(t1.quantity) as total, 
                                                               t1.product_name, 
                                                               t1.quantity, 
                                                               t1.product_id,

                                                               t2.p_id,
                                                               t2.p_featured_photo,
                                                               t2.p_name
       
                                                               FROM tbl_order t1
                                                               JOIN tbl_product t2
                                                               ON t1.product_id = t2.p_id
                                                               WHERE quantity 
                                                               GROUP BY product_id 
                                                               ORDER BY total 
                                                              	ASC LIMIT 3");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-white">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:60px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:60px;"></td>
									<td><p style ="color:black;"><?php echo $row['product_name']; ?></td>
									<td><p style ="color:black;"><?php echo $row['total']; ?></td>
								</tr>
								
								
								<?php
							}
							?>		
							<p style ="color:White; font-size:30px;"><i><img src="img/lowest.gif" width="45" height="30"> Lowest Demand Product </p></i>						
							<a href="rep_lowest_demand_online.php" style="color:black; float:right; font-size:20px;"><u>View More</u></a>					
						</tbody>
					</table>
				</div>
			</div>
		</div>
						</div></div>

	<div class="content-header-left">
	<h1><img src="img/walk-in.gif" width="50" height="40"> <i>WALK IN CUSTOMERS</i></h1>
	</div>
						<?php // HIGHEST EARNINGS PRODUCTS WALKIN ?>
		<div class="row">
		<div class="col-lg 3 col-xs-6">
		<div class="small-box bg-blue">
				  <div class="inner">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr class ="bg-black">
								<th width="0.1%"><h4 style ="color:white;">#</th>
								<th width="1%"><h4 style ="color:white;">Photo</th>
								<th width="20%"><h4 style ="color:white;"> Product Name</th>
								<th width="5%"><h4 style ="color:white;">Total Sales</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT t1.p_current_price * sum(t1.qty) as total, 
                                                               t1.p_name, 
                                                               t1.p_current_price, 
                                                               t1.product,

                                                               t2.p_id,
                                                               t2.p_featured_photo 


                                                               FROM tbl_salesorder_pos t1 
                                                               JOIN tbl_product t2
                                                               ON t1.product = t2.p_id
                                                               WHERE t1.p_current_price                                                               
                                                               GROUP BY t1.product 
                                                               ORDER BY total 
                                                               DESC LIMIT 1");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-white">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:60px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:60px;"></td>
									<td><p style ="color:black;"><?php echo $row['p_name']; ?></td>
									<td><p style ="color:black; float:right;">₱ <?php echo number_format((float)$row['total'],2); ?></td>
									
								</tr>
								<?php
							}
							?>		
							<p style ="color:White; font-size:30px;"><i><img src="img/highest.gif" width="45" height="30"> Highest Sales Product </p></i>			
								<a href="rep_highest_earnings_walkin.php" style="color:black; float:right; font-size:20px;"><u>View More</u></a>										
													
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<?php // LOWEST EARNINGS PRODUCTS WALKIN ?>
		<div class="row">
		<div class="col-lg 3 col-xs-6">
		<div class="small-box bg-maroon">
				  <div class="inner">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr class ="bg-black">
								<th width="0.1%"><h4 style ="color:white;">#</th>
								<th width="1%"><h4 style ="color:white;">Photo</th>
								<th width="20%"><h4 style ="color:white;"> Product Name</th>
								<th width="5%"><h4 style ="color:white;">Total Sales</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT t1.p_current_price * sum(t1.qty) as total, 
							t1.p_name, 
							t1.p_current_price, 
							t1.product,

							t2.p_id,
							t2.p_featured_photo 


							FROM tbl_salesorder_pos t1 
							JOIN tbl_product t2
							ON t1.product = t2.p_id
							WHERE t1.p_current_price                                                               
							GROUP BY t1.product 
							ORDER BY total 
							ASC LIMIT 1");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row) {
					$i++;
					?>
					<tr class ="bg-white">
					<td><p style ="color:black;"><?php echo $i; ?></td>
					<td style="width:60px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:60px;"></td>
					<td><p style ="color:black;"><?php echo $row['p_name']; ?></td>
					<td><p style ="color:black; float:right;">₱ <?php echo number_format((float)$row['total'],2); ?></td>
					
					</tr>
								<?php
							}
							?>	
							<p style ="color:White; font-size:30px;"><i><img src="img/lowest.gif" width="45" height="30"> Lowest Sales Product </p></i>			
								<a href="rep_lowest_earnings_walkin.php" style="color:black; float:right; font-size:20px;"><u>View More</u></a>										
														
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
		</div>

		<?php // HIGH DEMAND POS ?>
		<div class="row">
		<div class="col-lg 3 col-xs-6">
		<div class="small-box bg-blue">
				  <div class="inner">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr class ="bg-black">
								<th width="0.1%"><h4 style ="color:white;">#</th>
								<th width="1%"><h4 style ="color:white;">Photo</th>
								<th width="20%"> <h4 style ="color:white;"> Product Name</th>
								<th width="1%"><h4 style ="color:white;">Sold</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT sum(t1.qty) as total, 
                                                                t1.p_name, 
                                                                t1.qty, 
                                                                t1.product,
                                                                
                                                                t2.p_id,
                                                                t2.p_featured_photo 


                                                                FROM tbl_salesorder_pos t1 
                                                                JOIN tbl_product t2
                                                                ON t1.product = t2.p_id
                                                                WHERE t1.qty 
                                                                GROUP BY t1.product 
                                                                ORDER BY total 
                                                                DESC LIMIT 3");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-white">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:60px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:60px;"></td>
									<td><p style ="color:black;"><?php echo $row['p_name']; ?></td>
									<td><p style ="color:black;"><?php echo $row['total']; ?></td>
								</tr>
								
								<?php
							}
							?>	
							<p style ="color:White; font-size:30px;"><i><img src="img/highest.gif" width="45" height="30"> Highest Demand Product </p></i>					
							<a href="rep_highest_demand_walkin.php" style="color:black; float:right; font-size:20px;"><u>View More</u></a>										
												
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<?php // LOW DEMAND POS ?>
		<div class="row">
		<div class="col-lg 3 col-xs-6">
		<div class="small-box bg-maroon">
				  <div class="inner">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr class ="bg-black">
								<th width="0.1%"><h4 style ="color:white;">#</th>
								<th width="1%"><h4 style ="color:white;">Photo</th>
								<th width="20%"><h4 style ="color:white;"> Product Name
								</th>
								<th width="2%"><h4 style ="color:white;">Sold</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT sum(t1.qty) as total, 
                                                                t1.p_name, 
                                                                t1.qty, 
                                                                t1.product,
                                                                
                                                                t2.p_id,
                                                                t2.p_featured_photo 


                                                                FROM tbl_salesorder_pos t1 
                                                                JOIN tbl_product t2
                                                                ON t1.product = t2.p_id
                                                                WHERE t1.qty 
                                                                GROUP BY t1.product 
                                                                ORDER BY total 
                                                                ASC LIMIT 3");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class ="bg-white">
									<td><p style ="color:black;"><?php echo $i; ?></td>
                                    <td style="width:60px;"><img src="../assets/uploads/<?php echo $row['p_featured_photo']; ?>" style="width:60px;"></td>
									<td><p style ="color:black;"><?php echo $row['p_name']; ?></td>
									<td><p style ="color:black;"><?php echo $row['total']; ?></td>
								</tr>
								
								
								<?php
							}
							?>	
							<p style ="color:White; font-size:30px;"><i><img src="img/lowest.gif" width="45" height="30"> Lowest Demand Product </p></i>												
							<a href="rep_lowest_demand_walkin.php" style="color:black; float:right; font-size:20px;"><u>View More</u></a>															
						</tbody>
					</table>
				</div>
			</div>
		</div>
						</div>
						</div>
        
</section>

<?php require_once('footer.php'); ?>