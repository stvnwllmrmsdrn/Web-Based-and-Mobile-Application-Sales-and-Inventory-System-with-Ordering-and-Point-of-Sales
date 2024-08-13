<!-- This is main configuration File -->
<?php
ob_start();
session_start();
include("admin/inc/config.php");
include("admin/inc/functions.php");
include("admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Getting all language variables into array as global variable
$i = 1;
$statement = $pdo->prepare("SELECT * FROM tbl_language");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	define('LANG_VALUE_' . $i, $row['lang_value']);
	$i++;
}

$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$logo = $row['logo'];
	$favicon = $row['favicon'];
	$contact_email = $row['contact_email'];
	$contact_phone = $row['contact_phone'];
	$meta_title_home = $row['meta_title_home'];
	$meta_keyword_home = $row['meta_keyword_home'];
	$meta_description_home = $row['meta_description_home'];
	$before_head = $row['before_head'];
	$after_body = $row['after_body'];
}

// Checking the order table and removing the pending transaction that are 24 hours+ old. Very important
$current_date_time = date('Y-m-d H:i:s');
$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$ts1 = strtotime($row['payment_date']);
	$ts2 = strtotime($current_date_time);
	$diff = $ts2 - $ts1;
	$time = $diff / (3600);
	if ($time > 24) {

		// Return back the stock amount
		$statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
		$statement1->execute(array($row['payment_id']));
		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result1 as $row1) {
			$statement2 = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
			$statement2->execute(array($row1['product_id']));
			$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result2 as $row2) {
				$p_qty = $row2['p_qty'];
			}
			$final = $p_qty + $row1['quantity'];

			$statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
			$statement->execute(array($final, $row1['product_id']));
		}

		// Deleting data from table
		$statement1 = $pdo->prepare("DELETE FROM tbl_order WHERE payment_id=?");
		$statement1->execute(array($row['payment_id']));

		$statement1 = $pdo->prepare("DELETE FROM tbl_payment WHERE id=?");
		$statement1->execute(array($row['id']));
	}
}
?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
    $cta_title = $row['cta_title'];
    $cta_content = $row['cta_content'];
    $cta_read_more_text = $row['cta_read_more_text'];
    $cta_read_more_url = $row['cta_read_more_url'];
    $cta_photo = $row['cta_photo'];
    $featured_product_title = $row['featured_product_title'];
    $featured_product_subtitle = $row['featured_product_subtitle'];
    $latest_product_title = $row['latest_product_title'];
    $latest_product_subtitle = $row['latest_product_subtitle'];
    $popular_product_title = $row['popular_product_title'];
    $popular_product_subtitle = $row['popular_product_subtitle'];
    $total_featured_product_home = $row['total_featured_product_home'];
    $total_latest_product_home = $row['total_latest_product_home'];
    $total_popular_product_home = $row['total_popular_product_home'];
    $home_service_on_off = $row['home_service_on_off'];
    $home_welcome_on_off = $row['home_welcome_on_off'];
    $home_featured_product_on_off = $row['home_featured_product_on_off'];
    $home_latest_product_on_off = $row['home_latest_product_on_off'];
    $home_popular_product_on_off = $row['home_popular_product_on_off'];

	$contact_map_iframe = $row['contact_map_iframe'];
    $contact_email = $row['contact_email'];
    $contact_phone = $row['contact_phone'];
    $contact_address = $row['contact_address'];

}

?>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $contact_title = $row['contact_title'];
    $contact_banner = $row['contact_banner'];

	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta Tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="assets/uploads/<?php echo $favicon; ?>">

	<!-- Stylesheets -->
	

	<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/jquery.bxslider.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/rating.css">
	<link rel="stylesheet" href="assets/css/spacing.css">
	<link rel="stylesheet" href="assets/css/bootstrap-touch-slider.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/tree-menu.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/responsive.css"> -->

	<link rel="stylesheet" href="main.css">

	<link rel="shortcut icon" href="./assets/images/logo/stanicon.png" type="image/x-icon">

	<!--
  - custom css link
-->
	<link rel="stylesheet" href="./style-main.css">

	<!--
  - google font link
-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
		rel="stylesheet">



	<?php

	$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) {
		$about_meta_title = $row['about_meta_title'];
		$about_meta_keyword = $row['about_meta_keyword'];
		$about_meta_description = $row['about_meta_description'];
		$faq_meta_title = $row['faq_meta_title'];
		$faq_meta_keyword = $row['faq_meta_keyword'];
		$faq_meta_description = $row['faq_meta_description'];
		$blog_meta_title = $row['blog_meta_title'];
		$blog_meta_keyword = $row['blog_meta_keyword'];
		$blog_meta_description = $row['blog_meta_description'];
		$contact_meta_title = $row['contact_meta_title'];
		$contact_meta_keyword = $row['contact_meta_keyword'];
		$contact_meta_description = $row['contact_meta_description'];
		$pgallery_meta_title = $row['pgallery_meta_title'];
		$pgallery_meta_keyword = $row['pgallery_meta_keyword'];
		$pgallery_meta_description = $row['pgallery_meta_description'];
		$vgallery_meta_title = $row['vgallery_meta_title'];
		$vgallery_meta_keyword = $row['vgallery_meta_keyword'];
		$vgallery_meta_description = $row['vgallery_meta_description'];
	}

	$cur_page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

	if ($cur_page == 'index.php' || $cur_page == 'login.php' || $cur_page == 'registration.php' || $cur_page == 'cart.php' || $cur_page == 'checkout.php' || $cur_page == 'forget-password.php' || $cur_page == 'reset-password.php' || $cur_page == 'product-category.php' || $cur_page == 'product.php') {
		?>
		<title>
			<?php echo $meta_title_home; ?>
		</title>
		<meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
		<meta name="description" content="<?php echo $meta_description_home; ?>">
		<?php
	}

	if ($cur_page == 'about.php') {
		?>
		<title>
			<?php echo $about_meta_title; ?>
		</title>
		<meta name="keywords" content="<?php echo $about_meta_keyword; ?>">
		<meta name="description" content="<?php echo $about_meta_description; ?>">
		<?php
	}
	if ($cur_page == 'faq.php') {
		?>
		<title>
			<?php echo $faq_meta_title; ?>
		</title>
		<meta name="keywords" content="<?php echo $faq_meta_keyword; ?>">
		<meta name="description" content="<?php echo $faq_meta_description; ?>">
		<?php
	}
	if ($cur_page == 'contact.php') {
		?>
		<title>
			<?php echo $contact_meta_title; ?>
		</title>
		<meta name="keywords" content="<?php echo $contact_meta_keyword; ?>">
		<meta name="description" content="<?php echo $contact_meta_description; ?>">
		<?php
	}
	if ($cur_page == 'product.php') {
		$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
		$statement->execute(array($_REQUEST['id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$og_photo = $row['p_featured_photo'];
			$og_title = $row['p_name'];
			$og_slug = 'product.php?id=' . $_REQUEST['id'];
			$og_description = substr(strip_tags($row['p_description']), 0, 200) . '...';
		}
	}

	if ($cur_page == 'dashboard.php') {
		?>
		<title>Dashboard -
			<?php echo $meta_title_home; ?>
		</title>
		<meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
		<meta name="description" content="<?php echo $meta_description_home; ?>">
		<?php
	}
	if ($cur_page == 'customer-profile-update.php') {
		?>
		<title>Update Profile -
			<?php echo $meta_title_home; ?>
		</title>
		<meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
		<meta name="description" content="<?php echo $meta_description_home; ?>">
		<?php
	}
	if ($cur_page == 'customer-billing-shipping-update.php') {
		?>
		<title>Update Billing and Shipping Info -
			<?php echo $meta_title_home; ?>
		</title>
		<meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
		<meta name="description" content="<?php echo $meta_description_home; ?>">
		<?php
	}
	if ($cur_page == 'customer-password-update.php') {
		?>
		<title>Update Password -
			<?php echo $meta_title_home; ?>
		</title>
		<meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
		<meta name="description" content="<?php echo $meta_description_home; ?>">
		<?php
	}
	if ($cur_page == 'customer-order.php') {
		?>
		<title>Orders -
			<?php echo $meta_title_home; ?>
		</title>
		<meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
		<meta name="description" content="<?php echo $meta_description_home; ?>">
		<?php
	}
	?>

	<?php if ($cur_page == 'blog-single.php'): ?>
		<meta property="og:title" content="<?php echo $og_title; ?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php echo BASE_URL . $og_slug; ?>">
		<meta property="og:description" content="<?php echo $og_description; ?>">
		<meta property="og:image" content="assets/uploads/<?php echo $og_photo; ?>">
	<?php endif; ?>

	<?php if ($cur_page == 'product.php'): ?>
		<meta property="og:title" content="<?php echo $og_title; ?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php echo BASE_URL . $og_slug; ?>">
		<meta property="og:description" content="<?php echo $og_description; ?>">
		<meta property="og:image" content="assets/uploads/<?php echo $og_photo; ?>">
	<?php endif; ?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

	<!-- <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script> -->

	<?php echo $before_head; ?>

	<div class="overlay" data-overlay></div>

	<!--
  - MODAL
-->

	<div class="modal" data-modal>

		<div class="modal-close-overlay" data-modal-overlay></div>

		<div class="modal-content">

			<button class="modal-close-btn" data-modal-close>
				<ion-icon name="close-outline"></ion-icon>
			</button>

			<div class="newsletter-img">
				<img src="./assets/img/plug.png" alt="subscribe newsletter" width="400" height="400">
			</div>

			<div class="newsletter">

				<form action="#">

					<div class="newsletter-header">

						<h3 class="newsletter-title">Subscribe Newsletter.</h3>

						<p class="newsletter-desc">
							Subscribe the <b>Stanley</b> to get latest products and discount update.
						</p>

					</div>

					<input type="email" name="email" class="email-field" placeholder="Email Address" required>

					<button type="submit" class="btn-newsletter">Subscribe</button>

				</form>

			</div>

		</div>

	</div>





	<!--
  - NOTIFICATION TOAST
-->

	<div class="notification-toast" data-toast>

		<button class="toast-close-btn" data-toast-close>
			<ion-icon name="close-outline"></ion-icon>
		</button>

		<div class="toast-banner">
			<img src="./assets/img/bulb.jpg" alt="Rose Gold Earrings" width="80" height="70">
		</div>

		<div class="toast-detail">

			<p class="toast-message">
				Someone in new just bought
			</p>

			<p class="toast-title">
				170-240V Studio Bulb
			</p>

			<p class="toast-meta">
				<time datetime="PT2M">2 Minutes</time> ago
			</p>

		</div>

	</div>

</head>

<body>







	<header>

		<div class="header-top">

			<div class="container">

				<ul class="header-social-container">

					<li>
						<a href="#" class="social-link">
							<ion-icon name="logo-facebook"></ion-icon>
						</a>
					</li>

					<li>
						<a href="#" class="social-link">
							<ion-icon name="logo-twitter"></ion-icon>
						</a>
					</li>

					<li>
						<a href="#" class="social-link">
							<ion-icon name="logo-instagram"></ion-icon>
						</a>
					</li>

					<li>
						<a href="#" class="social-link">
							<ion-icon name="logo-linkedin"></ion-icon>
						</a>
					</li>

				</ul>

				<div class="header-alert-news">
					<p>
						<b>Free Shipping</b>
						This Week Order Over - ₱55
					</p>
				</div>

				<div class="header-top-actions">

					<select name="currency">

						<option value="php">PHP &#8369;</option>
						<!-- <option value="usd">USD &#8369;</option> -->

					</select>

					<select name="language">

						<option value="en-US">English</option>

					</select>

				</div>

			</div>

		</div>

		<div class="header-main">

			<div class="container">

				<a href="#" class="header-logo">
					<img src="assets/uploads/<?php echo $logo; ?>" alt="Standley's logo" width="320" height="70">
				</a>

				<div class="header-search-container">
					<form class="header-search-container" role="search" action="search-result.php" method="get">
						<?php $csrf->echoInputField(); ?>
						<div class="">
							<input type="search" class="search-field" placeholder="<?php echo LANG_VALUE_2; ?>"
								name="search_text">

						</div>
						<button type="submit" class="search-btn"><ion-icon name="search-outline"></ion-icon></button>
					</form>

				</div>

				<div class="header-user-actions">

					<button class="action-btn">
						<ul class="desktop-menu-category-list">
							<li class="menu-category">
								<ion-icon name="person-outline" class="dropdown-panel-list"></ion-icon>

								<ul class="dropdown-list">
									<li class="dropdown-item">
										<?php
										if (isset($_SESSION['customer'])) {
											?>
										<li class="dropdown-item"><i class="fa fa-user"><a href="dashboard.php"></i>
											<?php echo LANG_VALUE_13; ?>
											<?php echo $_SESSION['customer']['cust_name']; ?></a>
										</li>
										<?php
										} else {
											?>
										<li class="dropdown-item"><a href="login.php"><i class="fa fa-sign-in"></i>
												<?php echo LANG_VALUE_9; ?>
											</a></li>
										<li class="dropdown-item"><a href="registration.php"><i class="fa fa-user-plus"></i>
												<?php echo LANG_VALUE_15; ?>
											</a></li>
										<?php
										}
										?>
							</li>
						</ul>

						</li>
						</ul>
					</button>


					<button class="action-btn">

						<ul class="desktop-menu-category-list">
							<li class="menu-category">
								<ion-icon name="heart-outline" class="dropdown-panel-list"></ion-icon>
								<span class="count">

									<?php
									if (isset($_SESSION['cart_p_id'])) {
										$table_total_price = 0;
										$i = 0;
										foreach ($_SESSION['cart_p_qty'] as $key => $value) {
											$i++;
											$arr_cart_p_qty[$i] = $value;
										}
										$i = 0;
										foreach ($_SESSION['cart_p_current_price'] as $key => $value) {
											$i++;
											$arr_cart_p_current_price[$i] = $value;
										}
										for ($i = 1; $i <= count($arr_cart_p_qty); $i++) {
											$row_total_price = $arr_cart_p_current_price[$i] * $arr_cart_p_qty[$i];
											$table_total_price = $table_total_price + $row_total_price;
										}

									} else {
									}
									?>
									<?php
									if (isset($_SESSION['cart_p_id'])) {

										$i = ['cart_p_id'];
										for ($i = 0; $i <= count($arr_cart_p_qty); $i++) {

										}
										$i = $i - 1;
										echo $i;
									} else {
										echo '0';
									}
									?>

								</span>
								<ul class="dropdown-list">
									<li class="dropdown-item">

									</li>
								</ul>
							</li>
						</ul>
					</button>



					<button class="action-btn">

						<ul class="desktop-menu-category-list">
							<li class="menu-category">

								<ion-icon name="bag-handle-outline" class="dropdown-panel-list"></ion-icon>
								<span class="count">
									<?php
									if (isset($_SESSION['cart_p_id'])) {

										$i = ['cart_p_id'];
										for ($i = 0; $i <= count($arr_cart_p_qty); $i++) {

										}
										$i = $i - 1;
										echo $i;
									} else {
										echo '0';
									}
									?>
								</span>

								<ul class="dropdown-list">
									<li class="dropdown-item"><a href="cart.php">
											<?php echo LANG_VALUE_18; ?> :
											<?php
											if (isset($_SESSION['cart_p_id'])) {

												$i = ['cart_p_id'];
												for ($i = 0; $i <= count($arr_cart_p_qty); $i++) {

												}
												$i = $i - 1;
												echo $i;
											} else {
												echo '0';
											}
											?>
											(₱
											<?php
											if (isset($_SESSION['cart_p_id'])) {
												$table_total_price = 0;
												$i = 0;
												foreach ($_SESSION['cart_p_qty'] as $key => $value) {
													$i++;
													$arr_cart_p_qty[$i] = $value;
												}
												$i = 0;
												foreach ($_SESSION['cart_p_current_price'] as $key => $value) {
													$i++;
													$arr_cart_p_current_price[$i] = $value;
												}
												for ($i = 1; $i <= count($arr_cart_p_qty); $i++) {
													$row_total_price = $arr_cart_p_current_price[$i] * $arr_cart_p_qty[$i];
													$table_total_price = $table_total_price + $row_total_price;
												}
												echo $table_total_price;
											} else {
												echo '0';
											}

											?>)
					</li>
				</div>
			</div>
		</div>




		<nav class="desktop-navigation-menu">

			<div class="container">
				<div>

					<ul class="desktop-menu-category-list">

						<li class="menu-category">
							<a href="index.php" class="menu-title">Home</a>
						</li>

						<?php
						$statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
						$statement->execute();
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row) {
							?>

							<li class="menu-category"><a class="menu-title"
									href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>

								<div class="dropdown-panel">

									<?php
									$statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
									$statement1->execute(array($row['tcat_id']));
									$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result1 as $row1) {
										?>

										<ul class="dropdown-panel-list">

											<li class="menu-title"><a
													href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category"><?php echo $row1['mcat_name']; ?></a></li>

											<ul>

												<?php
												$statement2 = $pdo->prepare("SELECT * FROM tbl_end_category WHERE mcat_id=?");
												$statement2->execute(array($row1['mcat_id']));
												$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
												foreach ($result2 as $row2) {
													?>

													<li class="panel-list-item">
														<a
															href="product-category.php?id=<?php echo $row2['ecat_id']; ?>&type=end-category"><?php echo $row2['ecat_name']; ?></a>
													</li>
													<?php
												}
												?>
											</ul>

								</li>

								</li>
							</ul>
							<?php
									}
									?>



					</div>
					</li>

					<?php
						}
						?>

				<?php
				$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
				$statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row) {
					$about_title = $row['about_title'];
					$faq_title = $row['faq_title'];
					$blog_title = $row['blog_title'];
					$contact_title = $row['contact_title'];
					$pgallery_title = $row['pgallery_title'];
					$vgallery_title = $row['vgallery_title'];
				}
				?>

				<li class="menu-category">
					<a class="menu-title" href="about.php">
						<?php echo $about_title; ?>
					</a>
				</li>

				<li class="menu-category">
					<a class="menu-title" href="faq.php">
						<?php echo $faq_title; ?>
					</a>
				</li>

				<li class="menu-category">
					<a class="menu-title" href="contact.php">
						<?php echo $contact_title; ?>
					</a>
				</li>
				</ul>
			</div>

		</nav>

		<div class="mobile-bottom-navigation">

			<button class="action-btn" >
				<ion-icon name="menu-outline"></ion-icon>
			</button>

			<button class="action-btn" type="button"><a href="cart.php">
				<ion-icon name="bag-handle-outline"></ion-icon>

					<span class="count">
						<?php
						if (isset($_SESSION['cart_p_id'])) {

							$i = ['cart_p_id'];
							for ($i = 0; $i <= count($arr_cart_p_qty); $i++) {

							}
							$i = $i - 1;
							echo $i;
						} else {
							echo '0';
						}
						?>
					</span>
				</a>
			</button>

			<button class="action-btn">
				<ion-icon name="home-outline"></ion-icon>
			</button>

			<button class="action-btn"><a href="#">
					<ion-icon name="heart-outline"></ion-icon>

					<span class="count">
						<?php
						if (isset($_SESSION['cart_p_id'])) {

							$i = ['cart_p_id'];
							for ($i = 0; $i <= count($arr_cart_p_qty); $i++) {

							}
							$i = $i - 1;
							echo $i;
						} else {
							echo '0';
						}
						?>
					</span>
				</a>
			</button>

			<button class="action-btn" data-mobile-menu-open-btn>
				<ion-icon name="grid-outline"></ion-icon>
			</button>

		</div>

		<nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

			<div class="menu-top">
				<h2 class="menu-title">Menu</h2>

				<button class="menu-close-btn" data-mobile-menu-close-btn>
					<ion-icon name="close-outline"></ion-icon>
				</button>
			</div>

			<ul class="mobile-menu-category-list">

				<li class="menu-category">
					<a class="menu-title" href="index.php">Home
						<?php echo $about_title; ?>
					</a>
					
				</li>

				<?php
				$statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
				$statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row) {
					?>
					<li class="menu-category">
						<button class="accordion-menu" data-accordion-btn>
							<a class="menu-title"
								href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>

							<div>
								<ion-icon name="add-outline" class="add-icon"></ion-icon>
								<ion-icon name="remove-outline" class="remove-icon"></ion-icon>
							</div>
						</button>

						<ul class="submenu-category-list" data-accordion>


							<li class="submenu-category">
								<?php
								$statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
								$statement1->execute(array($row['tcat_id']));
								$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
								foreach ($result1 as $row1) {
									?>
									<a class="submenu-title"
										href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category"><?php echo $row1['mcat_name']; ?></a>
								</li>


								<?php
								}
								?>
						</ul>

					</li>
					<?php
				}
				?>

				<li class="menu-category">
					<a class="menu-title" href="about.php">
						<?php echo $about_title; ?>
					</a>
				</li>

				<li class="menu-category">
					<a class="menu-title" href="faq.php">
						<?php echo $faq_title; ?>
					</a>
				</li>

				<li class="menu-category">
					<a class="menu-title" href="contact.php">
						<?php echo $contact_title; ?>
					</a>
				</li>

			</ul>

			<div class="menu-bottom">

				<ul class="menu-category-list">

					<li class="menu-category">

						<button class="accordion-menu" data-accordion-btn>
							<p class="menu-title">Language</p>

							<ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
						</button>

						<ul class="submenu-category-list" data-accordion>

							<li class="submenu-category">
								<a href="#" class="submenu-title">English</a>
							</li>

						</ul>

					</li>

					<li class="menu-category">
						<button class="accordion-menu" data-accordion-btn>
							<p class="menu-title">Currency</p>
							<ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
						</button>

						<ul class="submenu-category-list" data-accordion>
							<li class="submenu-category">
								<a href="#" class="submenu-title">PHP &#8369;</a>
							</li>
						</ul>
					</li>

				</ul>

				<ul class="menu-social-container">

					<li>
						<a href="#" class="social-link">
							<ion-icon name="logo-facebook"></ion-icon>
						</a>
					</li>

					<li>
						<a href="#" class="social-link">
							<ion-icon name="logo-twitter"></ion-icon>
						</a>
					</li>

					<li>
						<a href="#" class="social-link">
							<ion-icon name="logo-instagram"></ion-icon>
						</a>
					</li>

					<li>
						<a href="#" class="social-link">
							<ion-icon name="logo-linkedin"></ion-icon>
						</a>
					</li>

				</ul>

			</div>


		</nav>

		
	

		

    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
        
      </button>

      <button class="action-btn" type="button" ><a href="cart.php">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">
                  <?php
                  if (isset($_SESSION['cart_p_id'])) {

                    $i = ['cart_p_id'];
                    for ($i = 0; $i <= count($arr_cart_p_qty); $i++) {

                    }
                    $i = $i - 1;
                    echo $i;
                  } else {
                    echo '0';
                  }
                  ?>
                </span>
                </a>
      </button>

      <button class="action-btn" ><a href="index.php">
        <ion-icon name="home-outline" ></ion-icon>
      </button></a>

      <button class="action-btn"><a href="#">
        <ion-icon name="heart-outline"></ion-icon>

        <span class="count">
                  <?php
                  if (isset($_SESSION['cart_p_id'])) {

                    $i = ['cart_p_id'];
                    for ($i = 0; $i <= count($arr_cart_p_qty); $i++) {

                    }
                    $i = $i - 1;
                    echo $i;
                  } else {
                    echo '0';
                  }
                  ?>
                </span>
                </a>
      </button>

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="index.php" class="menu-title">Home</a>
        </li>

        



<!-- here -->


          

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
  ?>
<li class="menu-category">
  <button class="accordion-menu" data-accordion-btn>
    <a class="menu-title" href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>
    
    <div>
      <ion-icon name="add-outline" class="add-icon"></ion-icon>
      <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
    </div>
  </button>

  <ul class="submenu-category-list" data-accordion>


    <li class="submenu-category">
    <?php
    $statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
    $statement1->execute(array($row['tcat_id']));
    $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result1 as $row1) {
      ?>
        <a class="submenu-title" href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category"><?php echo $row1['mcat_name']; ?></a>
      </li>

  
      <?php
    }
    ?>
  </ul>

  </li>
  <?php
}
?>
<!-- header -->

        <li class="menu-category">
					<a class="menu-title" href="about.php"><?php echo $about_title; ?></a>
				</li>

				<li class="menu-category">
				<a class="menu-title" href="faq.php"><?php echo $faq_title; ?></a>
				</li>

				<li class="menu-category">
				<a class="menu-title" href="contact.php"><?php echo $contact_title; ?></a>
				</li>

      </ul>

      <div class="menu-bottom">

        <ul class="menu-category-list">

          <li class="menu-category">

            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Language</p>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">English</a>
              </li>

            </ul>

          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Currency</p>
              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">PHP &#8369;</a>
              </li>
            </ul>
          </li>

        </ul>

        <ul class="menu-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

	  <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

        <?php
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
            ?>

          <div class="slider-item <?php if($i==0) {echo 'active';} ?>" >

            <img style="background-image:url(assets/uploads/<?php echo $row['photo']; ?>);" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle" ><?php echo $row['heading']; ?></p>

              <h2 class="banner-title"><?php echo $row['heading']; ?></h2>

              <p class="banner-text">
              <?php echo nl2br($row['content']); ?>
              </p>

              <a href="<?php echo $row['button_url']; ?>" class="banner-btn">Shop now</a>

            </div>

            

          </div>
          <?php
            $i++;
        }
        ?>

        </div>

      </div>

    </div>

    </nav>

	

  </header>




  
