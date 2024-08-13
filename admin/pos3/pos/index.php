<?php require_once('header.php'); ?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php

$statement = $pdo->prepare("SELECT * FROM tbl_product");
$statement->execute();
$total_product = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty < 20 ORDER BY p_id DESC");
$statement->execute();
$out_of_stock = $statement->rowCount();
?>

<section class="content">
<div class="row">
            <div class="col-lg-3 col-xs-6">
            <a href="product.php">
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
            </div></a>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
            <a href="critical_stock.php">
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
            </div></a>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>1</h3>

                  <p>Sales</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-checkbox-outline"></i>
                </div>
               
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
            <a href="sales-pos.php">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3>1</h3>

                  <p>Sales Report</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div></a>
            
			

		  </div>
		  
</section>

<?php require_once('footer.php'); ?>