<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}

$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$logo = $row['logo'];
	$favicon = $row['favicon'];
}

function formatMoney($number, $fractional=false) {
	if ($fractional) {
		$number = sprintf('%.2f', $number);
	}
	while (true) {
		$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
		if ($replaced != $number) {
			$number = $replaced;
		} else {
			break;
		}
	}
	return $number;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Standly Hardware - Administrator Panel </title>
	<link rel="icon" type="img/png" href="../assets/uploads/favicon.png">

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css"/>
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="style.css">
<style>
animated {
  animation: wiggle 5s linear infinite;
}

/* Keyframes */
@keyframes wiggle {
  0%, 7% {
    transform: rotateZ(0);
  }
  15% {
    transform: rotateZ(-15deg);
  }
  20% {
    transform: rotateZ(10deg);
  }
  25% {
    transform: rotateZ(-10deg);
  }
  30% {
    transform: rotateZ(6deg);
  }
  35% {
    transform: rotateZ(-4deg);
  }
  40%, 100% {
    transform: rotateZ(0);
  }
}

body {
  background: #000;
}

animated {
  position: absolute;
  left: calc(100% - 3em);
  top: calc(50% - 2em);
  bottom: calc(50% - 5em);
  
  height: 1.5em;
  width: 1.5em;
  
  background-color: red;
  /*background: linear-gradient(top, #555, #333);*/
  /*border: none;*/
  /*border-top: 3px solid orange;*/
  border-radius: 50%;
  text-align: center;
  color: #fff;
  font-family: Helvetica, Arial, Sans-serif;
  font-size: 1em;
  transform-origin: 50% 5em;
}    
    
</style>	

</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

		<a href="index.php" class="logo">
				<span class="logo-lg"><img src="img/logo.png" alt="Standley's logo" width="200" height="40"></span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Administrator Panel</span>
    <!-- Top Bar ... User Information .. Login/Log out Area -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					<li><a href="pos2/main/index.php" class="btn btn-block bt-lg active"><img src="../assets/img/icons/giphy.gif" alt="" width="30" height ="20" class="img-fluid"> POINT OF SALES</a></i></li>
					
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="../assets/uploads/<?php echo $_SESSION['user']['photo']; ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $_SESSION['user']['full_name']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="profile-edit.php" class="btn btn-default btn-flat">Edit Profile</a>
									</div>
									<div>
										<a href="logout.php" class="btn btn-default btn-flat">Log out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
		</header>

  		<?php $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
<!-- Side Bar to Manage Shop Activities -->
  		<aside class="main-sidebar">
    		<section class="sidebar">
      
      			<ul class="sidebar-menu">

			        <li class="treeview <?php if($cur_page == 'index.php') {echo 'active';} ?>">
			          <a href="index.php">
			            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
			          </a>
			        </li>
					<li class="treeview <?php if( ($cur_page == 'product.php') || ($cur_page == 'product-add.php') || ($cur_page == 'product-edit.php') ) {echo 'active';} ?>">
                        <a href="product.php">
                            <i class="fa fa-shopping-bag"></i> <span>Product Management</span>
                        </a>
                    </li>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE delivery_status = 'Pending'");
$statement->execute();
$totalpendingorders = $statement->rowCount(); ?>
                    <li class="treeview <?php if( ($cur_page == 'order.php') ) {echo 'active';} ?>">
                        <a href="order.php">
                            <i class="fa fa-book"></i> <span>Order Management</span>
                            <?php if ($totalpendingorders == 0 ) { echo ''; }else { echo '<animated>'.$totalpendingorders.'</animated>';}?>
                        </a>
                    </li>

					<li class="treeview <?php if( ($cur_page == 'sales-ordering.php') || ($cur_page == 'sales-pos.php') ) {echo 'active';} ?>">
                        <a href="#">
                            <i class="fa fa-line-chart"></i>
                            <span>Sales</span>
                            <span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="salesall.php"><i class="fa fa-circle-o"></i>Online/Point of Sales Report</a></li>
                            <li><a href="sales-ordering.php"><i class="fa fa-circle-o"></i> Online Sales Report</a></li>
                            <li><a href="sales-pos.php"><i class="fa fa-circle-o"></i>Point of Sales Report</a></li>
</ul>
					<li class="treeview <?php if( ($cur_page == 'supplier.php') || ($cur_page == 'supplier-add.php') || ($cur_page == 'supplier-edit.php') ) {echo 'active';} ?>">
                        <a href="supplier.php">
                            <i class="fa fa-truck"></i> <span>Supplier</span>
                        </a>
                    </li>
					<li class="treeview <?php if( ($cur_page == 'critical_stock.php') ) {echo 'active';} ?>">
                        <a href="critical_stock.php">
                            <i class="fa fa-exclamation-circle"></i> <span>Critical Stocks </span>
                        </a>
                    </li>

					<li class="treeview <?php if( ($cur_page == 'expiration.php') ) {echo 'active';} ?>">
                        <a href="expiration.php">
                            <i class="fa fa-exclamation-triangle"></i> <span>Expired Product</span>
                        </a>
                    </li>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE refund_status = 'Pending'");
$statement->execute();
$pendingrefund = $statement->rowCount(); ?> 
					<li class="treeview <?php if( ($cur_page == 'return_ordering.php') || ($cur_page == 'return_pos.php') ) {echo 'active';} ?>">
                        <a href="#">
                            <i class="fa fa-undo"></i>
                            <span>Return / Refund</span>
                            <?php if ($pendingrefund == 0 ) { echo ''; }else { echo '<animated>'.$pendingrefund.'</animated>';}?>
                            <span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="return_ordering.php"><i class="fa fa-circle-o"></i>Online Return/Refund Products</a></li>
                            <li><a href="return_pos.php"><i class="fa fa-circle-o"></i> Walk-in Return Products</a></li>
</ul>

			        <li class="treeview <?php if( ($cur_page == 'settings.php') ) {echo 'active';} ?>">
			          <a href="settings.php">
			            <i class="fa fa-sliders"></i> <span>Website Maintenance</span>
			          </a>
			        </li>

                    
                    <li class="treeview <?php if( ($cur_page == 'reason.php') || ($cur_page == 'reason-add.php') || ($cur_page == 'reason-edit.php') || ($cur_page == 'discount.php') || ($cur_page == 'discount-add.php') || ($cur_page == 'discount-edit.php') || ($cur_page == 'size.php') || ($cur_page == 'size-add.php') || ($cur_page == 'size-edit.php') || ($cur_page == 'color.php') || ($cur_page == 'color-add.php') || ($cur_page == 'color-edit.php') || ($cur_page == 'country.php') || ($cur_page == 'country-add.php') || ($cur_page == 'country-edit.php') || ($cur_page == 'province.php') || ($cur_page == 'province-add.php') || ($cur_page == 'province-edit.php') || ($cur_page == 'city.php') || ($cur_page == 'city-add.php') || ($cur_page == 'city-edit.php') || ($cur_page == 'shipping-cost.php') || ($cur_page == 'shipping-cost-edit.php') || ($cur_page == 'top-category.php') || ($cur_page == 'top-category-add.php') || ($cur_page == 'top-category-edit.php') || ($cur_page == 'mid-category.php') || ($cur_page == 'mid-category-add.php') || ($cur_page == 'mid-category-edit.php') || ($cur_page == 'end-category.php') || ($cur_page == 'end-category-add.php') || ($cur_page == 'end-category-edit.php') ) {echo 'active';} ?>">
                       
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>System Maintenance</span>
                            <span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="size.php"><i class="fa fa-circle-o"></i> Unit of Measurements</a></li>
                            <li><a href="color.php"><i class="fa fa-circle-o"></i> Color</a></li>
                            <li><a href="discount.php"><i class="fa fa-circle-o"></i> Discount</a></li>
							<li><a href="reason.php"><i class="fa fa-circle-o"></i> Reasons of Return</a></li>
                            <li><a href="country.php"><i class="fa fa-circle-o"></i> Country</a></li>
                            <li><a href="province.php"><i class="fa fa-circle-o"></i> Province</a></li>
							<li><a href="city.php"><i class="fa fa-circle-o"></i> City</a></li>
                            <li><a href="shipping-cost.php"><i class="fa fa-circle-o"></i> Shipping Cost</a></li>
                            <li><a href="top-category.php"><i class="fa fa-circle-o"></i> Main Category</a></li>
                            <li><a href="mid-category.php"><i class="fa fa-circle-o"></i> Sub Category</a></li>
                            <li><a href="end-category.php"><i class="fa fa-circle-o"></i> End Category</a></li>
                        </ul>
                    </li>


                    


                     <li class="treeview <?php if( ($cur_page == 'slider.php') ) {echo 'active';} ?>">
			          <a href="slider.php">
			            <i class="fa fa-picture-o"></i> <span>Manage Sliders</span>
			          </a>
			        </li>
                    <!-- Icons to be displayed on Shop -->
			        <li class="treeview <?php if( ($cur_page == 'service.php') ) {echo 'active';} ?>">
			          <a href="service.php">
			            <i class="fa fa-list-ol"></i> <span>Services</span>
			          </a>
			        </li>

			      			        <li class="treeview <?php if( ($cur_page == 'faq.php') ) {echo 'active';} ?>">
			          <a href="faq.php">
			            <i class="fa fa-question-circle"></i> <span>FAQ</span>
			          </a>
			        </li>

						<li class="treeview <?php if( ($cur_page == 'customer.php') || ($cur_page == 'customer-add.php') || ($cur_page == 'customer-edit.php') ) {echo 'active';} ?>">
			          <a href="customer.php">
			            <i class="fa fa-user-plus"></i> <span>Registered Customer</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($cur_page == 'page.php') ) {echo 'active';} ?>">
			          <a href="page.php">
			            <i class="fa fa-tasks"></i> <span>Page Settings</span>
			          </a>
			        </li>
			        
			        <li class="treeview <?php if( ($cur_page == 'user-pos.php') || ($cur_page == 'user-pos-edit.php') || ($cur_page == 'user-pos-add.php') || ($cur_page == 'profile-edit.php') || ($cur_page == 'profile-edit.php') || ($cur_page == 'user-pos-add.php') ) {echo 'active';} ?>">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>User</span>
                            <span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="profile-edit.php"><i class="fa fa-user"></i> <span>Administrator</span></a></li>
                            <li><a href="user-pos.php"><i class="fa fa-users"></i> <span>Point of Sales Users</span></a></li>
						</ul>
					</li>

					<li class="treeview <?php if( ($cur_page == 'backup-index.php') ) {echo 'active';} ?>">
			          <a href="backup-index.php">
			            <i class="fa fa-database"></i> <span>Back Up</span>
			          </a>
			        </li>


      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper">