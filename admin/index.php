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

// $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
// $statement->execute(array('Completed'));
// $total_order_completed = $statement->rowCount();

// $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE shipping_status=?");
// $statement->execute(array('Completed'));
// $total_shipping_completed = $statement->rowCount();

// $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
// $statement->execute(array('Pending'));
// $total_order_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE refund_status=? ");
$statement->execute(array('Pending'));
$total_return_request = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE refund_status=? ");
$statement->execute(array('Completed'));
$total_order_return = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_return_pos");
$statement->execute(array());
$total_return_walk = $statement->rowCount();

$total_refund = $total_order_return + $total_return_walk;

// $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=? AND shipping_status=?");
// $statement->execute(array('Completed','Pending'));
// $total_order_complete_shipping_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty < reorder_level ORDER BY p_id DESC");
$statement->execute();
$out_of_stock = $statement->rowCount();

$date_today = date('Y-m-d');
$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE date_expire > $date_today ORDER BY p_id DESC");
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
				<div class="small-box bg-fuchsia">
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
				<div class="small-box bg-red">
				  <div class="inner">
					<h3><?php echo $zerostock; ?></h3>
                    
					<p>Out of Stock</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-close"></i>
				  </div>
				  
				</div>
			  </div>

		</a>
        
            <!-- ./col -->
  <!--      <a href="order.php">-->
  <!--          <div class="col-lg-3 col-xs-6">-->
              <!-- small box -->
  <!--            <div class="small-box bg-green">-->
  <!--              <div class="inner">-->
  <!--                <h3><?php //echo $total_order_completed; ?></h3>-->

  <!--                <p>Completed Orders</p>-->
  <!--              </div>-->
  <!--              <div class="icon">-->
  <!--                <i class="ionicons ion-android-checkbox-outline"></i>-->
  <!--              </div>-->
               
  <!--            </div>-->
  <!--          </div>-->
  <!--      </a>-->
            <!-- ./col -->
  <!--      <a href="order.php">-->
  <!--          <div class="col-lg-3 col-xs-6">-->
              <!-- small box -->
  <!--            <div class="small-box bg-orange">-->
  <!--              <div class="inner">-->
  <!--                <h3><?php// echo $total_shipping_completed; ?></h3>-->

  <!--                <p>Completed Shipping</p>-->
  <!--              </div>-->
  <!--              <div class="icon">-->
  <!--                <i class="ionicons ion-checkmark-circled"></i>-->
  <!--              </div>-->
                
  <!--            </div>-->
  <!--          </div>-->
  <!--      </a>-->
			<!-- ./col -->
		<!--<a href="order.php">-->
		<!--	<div class="col-lg-3 col-xs-6">-->
				<!-- small box -->
		<!--		<div class="small-box bg-aqua">-->
		<!--		  <div class="inner">-->
		<!--			<h3><?php //echo $total_order_complete_shipping_pending; ?></h3>-->
  
		<!--			<p>Pending Shippings</p>-->
		<!--		  </div>-->
		<!--		  <div class="icon">-->
		<!--			<i class="ionicons ion-load-a"></i>-->
		<!--		  </div>-->
				  
		<!--		</div>-->
		<!--	  </div>-->
		<!--	</a>-->
            
  <!--      <a href="order.php">-->
  <!--          <div class="col-lg-3 col-xs-6">-->
              <!-- small box -->
  <!--            <div class="small-box bg-yellow">-->
  <!--              <div class="inner">-->
  <!--                <h3><?php //echo $total_order_pending; ?></h3>-->

  <!--                <p>Pending Orders</p>-->
  <!--              </div>-->
  <!--              <div class="icon">-->
  <!--                <i class="ionicons ion-clipboard"></i>-->
  <!--              </div>-->
                
  <!--            </div>-->
  <!--          </div>-->
  <!--      </a>-->
        
       <a href="return_ordering.php">
            <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-orange">
				  <div class="inner">
					<h3><?php echo $total_return_request; ?></h3>
  
					<p>Pending Return Orders</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-refresh"></i>
				  </div>
				  
				</div>
			  </div>
		</a>

		<a href="return_ordering.php">
            <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
				  <div class="inner">
					<h3><?php echo $total_refund; ?></h3>
  
					<p>All Completed Return Orders</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-checkmark-circled"></i>
				  </div>
				  
				</div>
			  </div>
		</a>
		
            <a href="shipping-cost.php">
			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-olive">
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
				<div class="small-box bg-teal">
				  <div class="inner">
					<h3><?php echo $total_customers; ?></h3>
  
					<p>Active Customers</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-person-stalker"></i>
				  </div>
				  
				</div>
			  </div>
			</a>
            <!-- ./col -->
<!-- <div class="row"> -->

<?php 
$link =mysqli_connect("localhost","root","");
mysqli_select_db($link,"ecommerceweb");

// HIGHEST ONLINE SALES
$count =0;
$res =mysqli_query($link,"SELECT 
                          t1.unit_price * SUM(t1.quantity) as total,
                          t1.product_name,
                          t1.product_id,
                          t1.payment_id,
                          t2.payment_id,
                          t2.delivery_status
                          FROM tbl_order t1
                          JOIN tbl_payment t2
                          ON t1.payment_id = t2.payment_id
                          WHERE t2.delivery_status = 'Completed'
                          GROUP BY t1.product_id
                          ORDER BY total DESC LIMIT 5");
while($row=mysqli_fetch_array($res))
{
$test[$count]["label"]=$row["product_name"];
$test[$count]["y"]=$row["total"];
$count = $count +1;
}

// LOWEST ONLINE SALES
$count1 =0;
$res1 =mysqli_query($link,"SELECT 
                          t1.unit_price * SUM(t1.quantity) as total,
                          t1.product_name,
                          t1.product_id
                          FROM tbl_order t1
                          JOIN tbl_payment t2
                          ON t1.payment_id = t2.payment_id
                          WHERE t2.delivery_status = 'Completed'
                          GROUP BY t1.product_id
                          ORDER BY total ASC LIMIT 5");
while($row=mysqli_fetch_array($res1))
{
$test1[$count1]["label"]=$row["product_name"];
$test1[$count1]["y"]=$row["total"];
$count1 = $count1 +1;
}

// HIGHEST ONLINE DEMAND
$count2 =0;
$res2 =mysqli_query($link,"SELECT SUM(t1.quantity) as total,
                            t1.product_name,
                            t1.product_id
                            FROM tbl_order t1
                            JOIN tbl_payment t2
                            ON t1.payment_id = t2.payment_id
                            WHERE t2.delivery_status = 'Completed'
                            GROUP BY t1.product_id 
                            ORDER BY total DESC LIMIT 5");
while($row=mysqli_fetch_array($res2))
{
$test2[$count2]["label"]=$row["product_name"];
$test2[$count2]["y"]=$row["total"];
$count2 = $count2 +1;
}

// LOWEST ONLINE DEMAND
$count3 =0;
$res3 =mysqli_query($link,"SELECT SUM(t1.quantity) as total,
                            t1.product_name,
                            t1.product_id
                            FROM tbl_order t1
                            JOIN tbl_payment t2
                            ON t1.payment_id = t2.payment_id
                            WHERE t2.delivery_status = 'Completed'
                            GROUP BY t1.product_id 
                            ORDER BY total ASC LIMIT 5");
while($row=mysqli_fetch_array($res3))
{
$test3[$count3]["label"]=$row["product_name"];
$test3[$count3]["y"]=$row["total"];
$count3 = $count3 +1;
}

// WALKIN

// HIGHEST ONLINE SALES
$countw4 =0;
$resw4 =mysqli_query($link,"SELECT *, p_current_price * SUM(qty) as total FROM tbl_salesorder_pos GROUP BY product ORDER BY total DESC LIMIT 5");
while($row=mysqli_fetch_array($resw4))
{
$testw4[$countw4]["label"]=$row["p_name"];
$testw4[$countw4]["y"]=$row["total"];
$countw4 = $countw4 +1;
}

// LOWEST ONLINE SALES
$countw5 =0;
$resw5 =mysqli_query($link,"SELECT *, p_current_price * SUM(qty) as total FROM tbl_salesorder_pos GROUP BY product ORDER BY total ASC LIMIT 5");
while($row=mysqli_fetch_array($resw5))
{
$testw5[$countw5]["label"]=$row["p_name"];
$testw5[$countw5]["y"]=$row["total"];
$countw5 = $countw5 +1;
}

// HIGHEST DEMAND WALKIN
$countw6 =0;
$resw6 =mysqli_query($link,"SELECT *, SUM(qty) as total FROM tbl_salesorder_pos GROUP BY product ORDER BY total DESC LIMIT 5");
while($row=mysqli_fetch_array($resw6))
{
$testw6[$countw6]["label"]=$row["p_name"];
$testw6[$countw6]["y"]=$row["total"];
$countw6 = $countw6 +1;
}

// LOWEST DEMAND WALKIN
$countw7 =0;
$resw7 =mysqli_query($link,"SELECT *, SUM(qty) as total FROM tbl_salesorder_pos GROUP BY product ORDER BY total ASC LIMIT 5");
while($row=mysqli_fetch_array($resw7))
{
$testw7[$countw7]["label"]=$row["p_name"];
$testw7[$countw7]["y"]=$row["total"];
$countw7 = $countw7 +1;
}


// // LOWEST DEMAND WALKIN
// $counts =0;
// $ress =mysqli_query($link,"SELECT * FROM tbl_salesorder_pos t1
//                             JOIN tbl_payment t2
//                             ON t1.date = t2.date 
//                             WHERE MONTH(t1.date) AND MONTH(t2.date)
//                             GROUP BY t1.product");
// while($row=mysqli_fetch_array($ress))
// {
// $tests[$counts]["label"]=$row["MONT"];
// $tests[$counts]["y"]=$row["total"];
// $counts = $counts +1;
// }
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
    
// var chartt = new CanvasJS.Chart("chartContainert", {
// 	animationEnabled: true,
// 	//theme: "light2",
// 	title:{
// 		text: "SALES"
// 	},
// 	axisX:{
// 		crosshair: {
// 			enabled: true,
// 			snapToDataPoint: true
// 		}
// 	},
// 	axisY:{
// 		title: "in Metric Tons",
// 		includeZero: true,
// 		crosshair: {
// 			enabled: true,
// 			snapToDataPoint: true
// 		}
// 	},
// 	toolTip:{
// 		enabled: false
// 	},
// 	data: [{
// 		type: "area",
// 		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
// 	}]
// });
// chartt.render();
 
	// HIGHEST SALES ONLINE

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
// 	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
	   // link: <a href="rep_highest_earnings_online.php">
		text: "TOP 5 - PRODUCT SALES"
	},
	axisY: {
		title: "SALES",
		includeZero: true,
		prefix: "₱ "

	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		yValueFormatString: "₱ #,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "outside", 
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
        height: "10px",
        width: "10px",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

	// LOWEST SALES ONLINE
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
// 	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "BOTTOM 5 - PRODUCT SALES"
	},
	axisY: {
		title: "SALES",
		includeZero: true,
		prefix: "₱ "
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		yValueFormatString: "₱ #,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
        height: "10px",
        width: "10px",
		dataPoints: <?php echo json_encode($test1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();

	// HIGHEST DEMAND ONLINE
var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
// 	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "TOP 5 - PRODUCT DEMAND"
	},
	axisY: {
		title: "NUMBER OF SOLD",
		valueFormatString: "#",
	    interval: 1
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		yValueFormatString: "#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
        height: "10px",
        width: "10px",
		dataPoints: <?php echo json_encode($test2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();

	// LOWEST DEMAND ONLINE
var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
// 	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "BOTTOM 5 - PRODUCT DEMAND"
	},
	axisY: {
		title: "NUMBER OF SOLD",
		valueFormatString: "#",
	    interval: 1
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		yValueFormatString: "#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
        height: "10px",
        width: "10px",
		dataPoints: <?php echo json_encode($test3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();


// WALK IN

	// HIGHEST SALES WALKIN

var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
// 	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
	   // link: <a href="rep_highest_earnings_online.php">
		text: "TOP 5 - PRODUCT SALES"
	},
	axisY: {
		title: "SALES",
		includeZero: true,
		prefix: "₱ "

	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		yValueFormatString: "₱ #,##0.00",
		indexLabel: "{y}",
		indexLabelPlacement: "outside", 
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
        height: "10px",
        width: "10px",
		dataPoints: <?php echo json_encode($testw4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();


	// LOWEST SALES WALKIN

var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
// 	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
	   // link: <a href="rep_highest_earnings_online.php">
		text: "BOTTOM 5 - PRODUCT SALES"
	},
	axisY: {
		title: "SALES",
		includeZero: true,
		prefix: "₱ "

	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		yValueFormatString: "₱ #,##0.00",
		indexLabel: "{y}",
		indexLabelPlacement: "outside", 
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
        height: "10px",
        width: "10px",
		dataPoints: <?php echo json_encode($testw5, JSON_NUMERIC_CHECK); ?>
	}]
});
chart5.render();

	// HIGHEST DEMAND WALKIN 
var chart6 = new CanvasJS.Chart("chartContainer6", {
	animationEnabled: true,
// 	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "TOP 5 - PRODUCT DEMAND"
	},
	axisY: {
		title: "NUMBER OF SOLD",
		valueFormatString: "#",
	    interval: 1
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		yValueFormatString: "#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
        height: "10px",
        width: "10px",
		dataPoints: <?php echo json_encode($testw6, JSON_NUMERIC_CHECK); ?>
	}]
});
chart6.render();

	// LOWEST DEMAND ONLINE
var chart7 = new CanvasJS.Chart("chartContainer7", {
	animationEnabled: true,
// 	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "BOTTOM 5 - PRODUCT DEMAND"
	},
	axisY: {
		title: "NUMBER OF SOLD",
		valueFormatString: "#",
	    interval: 1
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		yValueFormatString: "#",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
        height: "10px",
        width: "10px",
		dataPoints: <?php echo json_encode($testw7, JSON_NUMERIC_CHECK); ?>
	}]
});
chart7.render();
}

</script>
</head>
<body>
<div class="content-header-left">
<h1>&nbsp<img src="img/giphy.gif" width="45" height="45"> ONLINE</h1>
</div>
<div class="col-lg-6 col-xs-4">
<div class="small-box bg-blue">
<div class="inner">
<a href ="rep_highest_earnings_online.php" style="color:black;"><i>VIEW MORE</i></a>
<div id="chartContainer" style="height: 370px; width: 100%;"></div></div></div></div>
<div class="col-lg-6 col-xs-8">
<div class="small-box bg-red">
<div class="inner">
<a href ="rep_lowest_earnings_online.php" style="color:black;"><i>VIEW MORE</i></a>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div></div></div></div>
<div class="col-lg-6 col-xs-8">
<div class="small-box bg-blue">
<div class="inner">
<a href ="rep_highest_demand_online.php" style="color:black;"><i>VIEW MORE</i></a>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div></div></div></div>
<div class="col-lg-6 col-xs-8">
<div class="small-box bg-red">
<div class="inner">
<a href ="rep_lowest_demand_online.php" style="color:black;"><i>VIEW MORE</i></a>
<div id="chartContainer3" style="height: 370px; width: 100%;"></div></div></div></div>
<div class="content-header-left">
<h1>&nbsp<img src="img/walk-in.gif" width="45" height="45">WALK-IN</h1>
</div>
<?php // WALK IN ?>
<div class="col-lg-6 col-xs-8">
<div class="small-box bg-blue">
<div class="inner">
<a href ="rep_highest_earnings_walkin.php" style="color:black;"><i>VIEW MORE</i></a>
<div id="chartContainer4" style="height: 370px; width: 100%;"></div></div></div></div>
<div class="col-lg-6 col-xs-8">
<div class="small-box bg-red">
<div class="inner">
<a href ="rep_lowest_earnings_walkin.php" style="color:black;"><i>VIEW MORE</i></a>
<div id="chartContainer5" style="height: 370px; width: 100%;"></div></div></div></div>
<div class="col-lg-6 col-xs-8">
<div class="small-box bg-blue">
<div class="inner">
<a href ="rep_highest_demand_walkin.php" style="color:black;"><i>VIEW MORE</i></a>
<div id="chartContainer6" style="height: 370px; width: 100%;"></div></div></div></div>
<div class="col-lg-6 col-xs-8">
<div class="small-box bg-red">
<div class="inner">
<a href ="rep_lowest_demand_walkin.php" style="color:black;"><i>VIEW MORE</i></a>
<div id="chartContainer7" style="height: 370px; width: 100%;"></div></div></div></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>                            
</section>

<?php require_once('footer.php'); ?>