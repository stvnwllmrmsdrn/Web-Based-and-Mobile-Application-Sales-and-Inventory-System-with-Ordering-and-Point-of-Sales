
<?php require_once('head.php'); ?>
<?php require_once('sidebar1.php'); ?>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="./main.css">
	<link rel="stylesheet" href="assets/css/main1.css">



<?php
if(!isset($_REQUEST['id'])) {
    header('location: index.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: index.php');
        exit;
    }
}

foreach($result as $row) {
    $p_name = $row['p_name'];
    $p_old_price = $row['p_old_price'];
    $p_current_price = $row['p_current_price'];
    $p_walkin_price = $row['p_walkin_price'];
    $p_qty = $row['p_qty'];
    $p_featured_photo = $row['p_featured_photo'];
    $p_description = $row['p_description'];
    $p_short_description = $row['p_short_description'];
    $p_feature = $row['p_feature'];
    $p_condition = $row['p_condition'];
    $p_return_policy = $row['p_return_policy'];
    $p_total_view = $row['p_total_view'];
    $p_is_featured = $row['p_is_featured'];
    $p_is_active = $row['p_is_active'];
    $ecat_id = $row['ecat_id'];
}

// Getting all categories name for breadcrumb
$statement = $pdo->prepare("SELECT
                        t1.ecat_id,
                        t1.ecat_name,
                        t1.mcat_id,

                        t2.mcat_id,
                        t2.mcat_name,
                        t2.tcat_id,

                        t3.tcat_id,
                        t3.tcat_name

                        FROM tbl_end_category t1
                        JOIN tbl_mid_category t2
                        ON t1.mcat_id = t2.mcat_id
                        JOIN tbl_top_category t3
                        ON t2.tcat_id = t3.tcat_id
                        WHERE t1.ecat_id=?");
$statement->execute(array($ecat_id));
$total = $statement->rowCount();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $ecat_name = $row['ecat_name'];
    $mcat_id = $row['mcat_id'];
    $mcat_name = $row['mcat_name'];
    $tcat_id = $row['tcat_id'];
    $tcat_name = $row['tcat_name'];
}


$p_total_view = $p_total_view + 1;

$statement = $pdo->prepare("UPDATE tbl_product SET p_total_view=? WHERE p_id=?");
$statement->execute(array($p_total_view,$_REQUEST['id']));


$statement = $pdo->prepare("SELECT * FROM tbl_product_size WHERE p_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $size[] = $row['size_id'];
}

$statement = $pdo->prepare("SELECT * FROM tbl_product_color WHERE p_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $color[] = $row['color_id'];
}


if(isset($_POST['form_review'])) {
    
    $statement = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=? AND cust_id=?");
    $statement->execute(array($_REQUEST['id'],$_SESSION['customer']['cust_id']));
    $total = $statement->rowCount();
    
    if($total) {
        $error_message = LANG_VALUE_68; 
    } else {
        $statement = $pdo->prepare("INSERT INTO tbl_rating (p_id,cust_id,comment,rating) VALUES (?,?,?,?)");
        $statement->execute(array($_REQUEST['id'],$_SESSION['customer']['cust_id'],$_POST['comment'],$_POST['rating']));
        $success_message = LANG_VALUE_163;    
    }
    
}

// Getting the average rating for this product
$t_rating = 0;
$statement = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
$statement->execute(array($_REQUEST['id']));
$tot_rating = $statement->rowCount();
if($tot_rating == 0) {
    $avg_rating = 0;
} else {
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
    foreach ($result as $row) {
        $t_rating = $t_rating + $row['rating'];
    }
    $avg_rating = $t_rating / $tot_rating;
}

if(isset($_POST['form_add_to_cart'])) {

	// getting the currect stock of this product
	$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$current_p_qty = $row['p_qty'];
	}
	if(empty($_POST['p_qty']) ):
		$temp_msg = 'Please add quantity to add to cart';
		?>
		<script type="text/javascript">alert('<?php echo $temp_msg; ?>');</script>
    <?php
	elseif($_POST['p_qty'] > $current_p_qty):
		$temp_msg = 'Sorry, The current available stocks '.$current_p_qty.' item(s)';
		?>
		<script type="text/javascript">alert('<?php echo $temp_msg; ?>');</script>
	<?php
	else:
    if(isset($_SESSION['cart_p_id']))
    {
        $arr_cart_p_id = array();
        $arr_cart_size_id = array();
        $arr_cart_color_id = array();
        $arr_cart_p_qty = array();
        $arr_cart_p_current_price = array();

        $i=0;
        foreach($_SESSION['cart_p_id'] as $key => $value) 
        {
            $i++;
            $arr_cart_p_id[$i] = $value;
        }

        $i=0;
        foreach($_SESSION['cart_size_id'] as $key => $value) 
        {
            $i++;
            $arr_cart_size_id[$i] = $value;
        }

        $i=0;
        foreach($_SESSION['cart_color_id'] as $key => $value) 
        {
            $i++;
            $arr_cart_color_id[$i] = $value;
        }


        $added = 0;
        if(!isset($_POST['size_id'])) {
            $size_id = 0;
        } else {
            $size_id = $_POST['size_id'];
        }
        if(!isset($_POST['color_id'])) {
            $color_id = 0;
        } else {
            $color_id = $_POST['color_id'];
        }
        for($i=1;$i<=count($arr_cart_p_id);$i++) {
            if( ($arr_cart_p_id[$i]==$_REQUEST['id']) && ($arr_cart_size_id[$i]==$size_id) && ($arr_cart_color_id[$i]==$color_id) ) {
                $added = 1;
                break;
            }
        }
        if($added == 1) {
           $error_message1 = 'This product is already added to the shopping cart.';
        } else {

            $i=0;
            foreach($_SESSION['cart_p_id'] as $key => $res) 
            {
                $i++;
            }
            $new_key = $i+1;

            if(isset($_POST['size_id'])) {

                $size_id = $_POST['size_id'];

                $statement = $pdo->prepare("SELECT * FROM tbl_size WHERE size_id=?");
                $statement->execute(array($size_id));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    $size_name = $row['size_name'];
                }
            } else {
                $size_id = 0;
                $size_name = '';
            }
            
            if(isset($_POST['color_id'])) {
                $color_id = $_POST['color_id'];
                $statement = $pdo->prepare("SELECT * FROM tbl_color WHERE color_id=?");
                $statement->execute(array($color_id));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    $color_name = $row['color_name'];
                }
            } else {
                $color_id = 0;
                $color_name = '';
            }
          

            $_SESSION['cart_p_id'][$new_key] = $_REQUEST['id'];
            $_SESSION['cart_size_id'][$new_key] = $size_id;
            $_SESSION['cart_size_name'][$new_key] = $size_name;
            $_SESSION['cart_color_id'][$new_key] = $color_id;
            $_SESSION['cart_color_name'][$new_key] = $color_name;
            $_SESSION['cart_p_qty'][$new_key] = $_POST['p_qty'];
            $_SESSION['cart_p_current_price'][$new_key] = $_POST['p_current_price'];
            $_SESSION['cart_p_name'][$new_key] = $_POST['p_name'];
            $_SESSION['cart_p_featured_photo'][$new_key] = $_POST['p_featured_photo'];

            $success_message1 = 'Product is added to the cart successfully!';
        }
        
    }
    else
    {

        if(isset($_POST['size_id'])) {

            $size_id = $_POST['size_id'];

            $statement = $pdo->prepare("SELECT * FROM tbl_size WHERE size_id=?");
            $statement->execute(array($size_id));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
            foreach ($result as $row) {
                $size_name = $row['size_name'];
            }
        } else {
            $size_id = 0;
            $size_name = '';
        }
        
        if(isset($_POST['color_id'])) {
            $color_id = $_POST['color_id'];
            $statement = $pdo->prepare("SELECT * FROM tbl_color WHERE color_id=?");
            $statement->execute(array($color_id));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
            foreach ($result as $row) {
                $color_name = $row['color_name'];
            }
        } else {
            $color_id = 0;
            $color_name = '';
        }
        

        $_SESSION['cart_p_id'][1] = $_REQUEST['id'];
        $_SESSION['cart_size_id'][1] = $size_id;
        $_SESSION['cart_size_name'][1] = $size_name;
        $_SESSION['cart_color_id'][1] = $color_id;
        $_SESSION['cart_color_name'][1] = $color_name;
        $_SESSION['cart_p_qty'][1] = $_POST['p_qty'];
        $_SESSION['cart_p_current_price'][1] = $_POST['p_current_price'];
        $_SESSION['cart_p_name'][1] = $_POST['p_name'];
        $_SESSION['cart_p_featured_photo'][1] = $_POST['p_featured_photo'];

        $success_message1 = 'Product is added to the cart successfully!';
    }
	endif;
}
?>

<?php
if($error_message1 != '') {
    echo "<script>alert('".$error_message1."')</script>";
}
if($success_message1 != '') {
    echo "<script>alert('".$success_message1."')</script>";
    header('location: product.php?id='.$_REQUEST['id']);
}

?>

<title> <?php echo $meta_keyword_home; ?> | <?php echo $p_name; ?></title>

<div class="table-responsive">
<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="<?php echo BASE_URL.'index' ?>">Home</a></li>
                        <li>></li>
                        <li><a href="<?php echo BASE_URL.'product-category?id='.$tcat_id.'&type=top-category' ?>"><?php echo $tcat_name; ?></a></li>
                        <li>></li>
                        <li><a href="<?php echo BASE_URL.'product-category?id='.$mcat_id.'&type=mid-category' ?>"><?php echo $mcat_name; ?></a></li>
                        <li>></li>
                        <li><a href="<?php echo BASE_URL.'product-category?id='.$ecat_id.'&type=end-category' ?>"><?php echo $ecat_name; ?></a></li>
                        <li>></li>
                        <li><?php echo $p_name; ?></li>
                    </ul>
                </div><br></div>

				<div class="product">
                
                
					<div class="row">
                        
						<div class="col-md-5">
							<ul class="prod-slider">
                                
								<li style="background-image: url(assets/uploads/<?php echo $p_featured_photo; ?>);">
                                    <a class="popup" href="assets/uploads/<?php echo $p_featured_photo; ?>"></a>
								</li>
                                <?php
                                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
                                $statement->execute(array($_REQUEST['id']));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    ?>
                                    <li style="background-image: url(assets/uploads/product_photos/<?php echo $row['photo']; ?>);">
                                        <a class="popup" href="assets/uploads/product_photos/<?php echo $row['photo']; ?>"></a>
                                    </li>
                                    <?php
                                }
                                ?>
							</ul>
							<div id="prod-pager">
								<a data-slide-index="0" href=""><div class="prod-pager-thumb" style="background-image: url(assets/uploads/<?php echo $p_featured_photo; ?>"></div></a>
                                <?php
                                $i=1;
                                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
                                $statement->execute(array($_REQUEST['id']));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    ?>
                                    <a data-slide-index="<?php echo $i; ?>" href=""><div class="prod-pager-thumb" style="background-image: url(assets/uploads/product_photos/<?php echo $row['photo']; ?>"></div></a>
                                    <?php
                                    $i++;
                                }
                                ?>
							</div>
						</div>
						<div class="col-md-7">
                            
							<div class="p-title"><h2><?php echo $p_name; ?></h2></div>
							<div class="p-review">
								<div class="showcase-rating">
                                    <?php
              $t_rating = 0;
              $statement1 = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
              $statement1->execute(array($row['p_id']));
              $tot_rating = $statement1->rowCount();
              if($tot_rating == 0) {
                  $avg_rating = 0;
              } else {
                  $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($result1 as $row1) {
                      $t_rating = $t_rating + $row1['rating'];
                  }
                  $avg_rating = $t_rating / $tot_rating;
              }
              ?>
              <?php
              if($avg_rating == 0) {
                  echo  nl2br ("Stocks: ($p_qty)  ");
              }
              elseif($avg_rating == 1.5) {
                  echo '
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                  ';
                  echo htmlspecialchars("($tot_rating)    -"); 
              } 
              elseif($avg_rating == 2.5) {
                  echo '
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                  ';
                  echo htmlspecialchars("($tot_rating)"); echo  nl2br ("      -    Stocks: ($p_qty)  ");
              }
              elseif($avg_rating == 3.5) {
                  echo '
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                  ';
                  echo htmlspecialchars("($tot_rating)"); echo  nl2br ("      -    Stocks: ($p_qty)  ");
              }
              elseif($avg_rating == 4.5) {
                  echo '
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                  ';
                  echo htmlspecialchars("($tot_rating)"); echo  nl2br ("      -    Stocks: ($p_qty)  ");
              }
              else {
                  for($i=1;$i<=5;$i++) {
                      ?>
                      <?php if($i>$avg_rating): ?>
                          <i class="fa fa-star-o"></i>
                      <?php else: ?>
                          <i class="fa fa-star"></i>
                      <?php endif; ?>
                      <?php
                  }
                  echo htmlspecialchars("($tot_rating)"); echo  nl2br ("      -    Stocks: ($p_qty)  ");
              }
              ?>
                                </div>
							</div>
							<div class="p-short-des">
								<p>
									<?php echo $p_short_description; ?>
								</p>
							</div>  
                            <form action="" method="post">
                            <div class="p-quantity">
                                <div class="row">
                                    <?php if(isset($size)): ?>
                                    <div class="col-md-12 mb_20">
                                        <?php echo LANG_VALUE_165; ?> <br>
                                        <select name="size_id" class="form-control select2" style="width:auto;">
                                            <?php
                                            $statement = $pdo->prepare("SELECT * FROM tbl_size");
                                            $statement->execute();
                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result as $row) {
                                                if(in_array($row['size_id'],$size)) {
                                                    ?>
                                                    <option value="<?php echo $row['size_id']; ?>"><?php echo $row['size_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php endif; ?>

                                    <?php if(isset($color)): ?>
                                    <div class="col-md-12">
                                        <?php echo LANG_VALUE_53; ?> <br>
                                        <select name="color_id" class="form-control select2" style="width:auto;">
                                            <?php
                                            $statement = $pdo->prepare("SELECT * FROM tbl_color");
                                            $statement->execute();
                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result as $row) {
                                                if(in_array($row['color_id'],$color)) {
                                                    ?>
                                                    <option value="<?php echo $row['color_id']; ?>"><?php echo $row['color_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php endif; ?>

                                </div>
                                
                            </div>
							<div class="p-price">
                                <span style="font-size:14px;"><?php echo LANG_VALUE_54; ?></span><br>
                                <span>
                                        ₱<?php echo formatMoney ($p_current_price, true); ?>
                                        <?php if($p_walkin_price!=''): 
                                        ?>
                                        <del>₱<?php echo formatMoney ($p_walkin_price, true); ?></del>
                                    <?php endif; ?> 
                                </span>
                                
                            </div>
                            <input type="hidden" name="p_current_price" value="<?php echo $p_current_price; ?>">
                            <input type="hidden" name="p_name" value="<?php echo $p_name; ?>">
                            <input type="hidden" name="p_featured_photo" value="<?php echo $p_featured_photo; ?>">
							<div class="p-quantity">
                                <?php echo LANG_VALUE_55; ?> 
								<input type="number" class="input-text qty" step="1" min="1" max="" name="p_qty" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only">  <?php echo  htmlspecialchars ("Available Stocks: ($p_qty)  ");?>
							</div>
							<button class="login100-form-btn btn-cart1" type="submit" value="<?php echo LANG_VALUE_154; ?>" name="form_add_to_cart">
                            <?php echo LANG_VALUE_154; ?>
                            </button>
                            </form>
							<!-- <div class="share">
                                <?php echo LANG_VALUE_58; ?> <br>
								<div class="sharethis-inline-share-buttons"></div>
							</div> -->
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><?php echo LANG_VALUE_59; ?></a></li>
								<li role="presentation"><a href="#feature" aria-controls="feature" role="tab" data-toggle="tab"><?php echo LANG_VALUE_60; ?></a></li>
                                <li role="presentation"><a href="#condition" aria-controls="condition" role="tab" data-toggle="tab"><?php echo LANG_VALUE_61; ?></a></li>
                                <li role="presentation"><a href="#return_policy" aria-controls="return_policy" role="tab" data-toggle="tab"><?php echo LANG_VALUE_62; ?></a></li>
                               <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab"><?php echo LANG_VALUE_63; ?></a></li>
							</ul>

							<!-- Tab panes --><div class="table-responsive">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="description" style="margin-top: -30px; >
									<p style="margin-top: -30px; max-width: 200px;">
                                        <?php
                                        if($p_description == '') {
                                            echo LANG_VALUE_70;
                                        } else {
                                            echo $p_description;
                                        }
                                        ?>
									</p>
								</div>
                                <div role="tabpanel" class="tab-pane" id="feature" style="margin-top: -30px;">
                                    <p>
                                        <?php
                                        if($p_feature == '') {
                                            echo LANG_VALUE_71;
                                        } else {
                                            echo $p_feature;
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="condition" style="margin-top: -30px;">
                                    <p>
                                        <?php
                                        if($p_condition == '') {
                                            echo LANG_VALUE_72;
                                        } else {
                                            echo $p_condition;
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="return_policy" style="margin-top: -30px;">
                                    <p>
                                        <?php
                                        if($p_return_policy == '') {
                                            echo LANG_VALUE_73;
                                        } else {
                                            echo $p_return_policy;
                                        }
                                        ?>
                                    </p>
                                </div>
								<div role="tabpanel" class="tab-pane" id="review" style="margin-top: -30px;">

                                    <div class="review-form">
                                        <?php
                                        $statement = $pdo->prepare("SELECT * 
                                                            FROM tbl_rating t1 
                                                            JOIN tbl_customer t2 
                                                            ON t1.cust_id = t2.cust_id 
                                                            WHERE t1.p_id=?");
                                        $statement->execute(array($_REQUEST['id']));
                                        $total = $statement->rowCount();
                                        ?>
                                        <h2><?php echo LANG_VALUE_63; ?> (<?php echo $total; ?>)</h2>
                                        <?php
                                        if($total) {
                                            $j=0;
                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result as $row) {
                                                $j++;
                                                ?>
                                                <div class="mb_10"><b><u><?php echo LANG_VALUE_64; ?> <?php echo $j; ?></u></b></div>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        
                                                        <td style="padding:0;">
                                                            <li class=""><a href="#" class="menu-top2">
                                                                <img class="side_profile" src="assets/uploads/profile/<?php echo $row['photo']; ?>"  alt="User Profile">
                                                                <h4 style="padding:0;margin:0;"><?php echo $row['cust_name']; ?> <?php echo $row['cust_cname']; ?></h4></a></li>
                                                            </li>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0 60px;">
                                                            <div class="showcase-rating">
                                                                <?php
                                                                for($i=1;$i<=5;$i++) {
                                                                    ?>
                                                                    <?php if($i>$row['rating']): ?>
                                                                        <i class="fa fa-star-o"></i>
                                                                    <?php else: ?>
                                                                        <i class="fa fa-star"></i>
                                                                    <?php endif; ?>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0 60px;"><h5 style="padding:0;"><?php echo $row['comment']; ?></h5></td>
                                                    </tr>
                                                    
                                                </table>
                                                <?php
                                            }
                                        } else {
                                            echo LANG_VALUE_74;
                                        }
                                        ?>
                                        
                                        <h2><?php echo LANG_VALUE_65; ?></h2>
                                        <?php
                                        if($error_message != '') {
                                            echo "<script>alert('".$error_message."')</script>";
                                        }
                                        if($success_message != '') {
                                            echo "<script>alert('".$success_message."')</script>";
                                        }
                                        ?>
                                        <?php if(isset($_SESSION['customer'])): ?>

                                            <?php
                                            $statement = $pdo->prepare("SELECT * 
                                                                FROM tbl_rating
                                                                WHERE p_id=? AND cust_id=?");
                                            $statement->execute(array($_REQUEST['id'],$_SESSION['customer']['cust_id']));
                                            $total = $statement->rowCount();
                                            ?>
                                            <?php if($total==0): ?>
                                            <form action="" method="post">
                                            <div class="rating-section">
                                                <input type="radio" name="rating" class="rating" value="1" checked>
                                                <input type="radio" name="rating" class="rating" value="2" checked>
                                                <input type="radio" name="rating" class="rating" value="3" checked>
                                                <input type="radio" name="rating" class="rating" value="4" checked>
                                                <input type="radio" name="rating" class="rating" value="5" checked>
                                            </div>                                            
                                            <div class="form-group">
                                                <textarea name="comment" class="form-control" cols="30" rows="10" placeholder="Write your comment (optional)" style="height:100px;"></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-default" name="form_review" value="<?php echo LANG_VALUE_67; ?>">
                                            </form>
                                            <?php else: ?>
                                                <span style="color:red;"><?php echo LANG_VALUE_68; ?></span>
                                            <?php endif; ?>


                                        <?php else: ?>
                                            <p class="error">
												<?php echo LANG_VALUE_69; ?> <br>
												<a href="login" style="color:red;text-decoration: underline;"><?php echo LANG_VALUE_9; ?></a>
											</p>
                                        <?php endif; ?>                         
                                    </div>

								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
</div>
</div></div>
               
<div class="product  pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2><?php echo LANG_VALUE_155; ?></h2>
                    <h3><?php echo LANG_VALUE_156; ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            <div class="product-grid">

        <?php
                $statement = $pdo->prepare("SELECT 
                
                      
                        t1.p_id,
                        t1.p_name,
                        t1.p_old_price,
                        t1.p_current_price,
                        t1.p_walkin_price,
                        t1.p_sale_price,
                        t1.p_qty,
                        t1.p_featured_photo,
                        t1.p_is_featured,
                        t1.p_is_active,
                        t1.ecat_id,

                        t2.ecat_id,
                        t2.ecat_name,

                        t3.mcat_id,
                        t3.mcat_name,

                        t4.tcat_id,
                        t4.tcat_name


                        FROM tbl_product t1
                        JOIN tbl_end_category t2
                        ON t1.ecat_id = t2.ecat_id
                        JOIN tbl_mid_category t3
                        ON t2.mcat_id = t3.mcat_id
                        JOIN tbl_top_category t4
                        ON t3.tcat_id = t4.tcat_id
                        
                        WHERE t1.ecat_id=? AND p_id!=?");

                $statement->execute(array($ecat_id,$_REQUEST['id']));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    ?>

        <div class="showcase">

            <div class="showcase-banner">

                <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="300" height="300" class="product-img default" >
                <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
                $statement->execute(array($row['p_id']));
                $photo = $statement->rowCount();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row1) {
                  $photo = $row1['photo'];
                  $p_id = $row1['p_id'];
                }

                if ($photo == 0){
                     echo '<img style="background-image:url(assets/uploads/'.$row['p_featured_photo'].');" ' .$row['p_name'].  'width="300" height="300" class="product-img hover" >';
                } else {
                      echo '<img style="background-image:url(assets/uploads/product_photos/'.$row1['photo'].');" '.$row['p_name'].' width="300" height="300" class="product-img hover" >';
                    }  
                ?>    
                </a>

                <p class="showcase-badge angle black">sale</p>

                <div class="showcase-actions">

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action" >
                    <ion-icon name="heart-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="eye-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="repeat-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="bag-add-outline"></ion-icon>
                    </button></a>

                </div>
            </div>

        

            <div class="showcase-content">

            <a href="product-category?id=<?php echo $row['mcat_id']; ?>&type=mid-category" class="showcase-category"><?php echo $row['mcat_name']; ?></a>

            <a href="product?id=<?php echo $row['p_id']; ?>">
                <h4 class="showcase-title"><?php echo $row['p_name']; ?> </h4>
            </a>

            <div class="showcase-rating">
               <?php
              $t_rating = 0;
              $statement1 = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
              $statement1->execute(array($row['p_id']));
              $tot_rating = $statement1->rowCount();
              if($tot_rating == 0) {
                  $avg_rating = 0;
              } else {
                  $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($result1 as $row1) {
                      $t_rating = $t_rating + $row1['rating'];
                  }
                  $avg_rating = $t_rating / $tot_rating;
              }
              ?>
              <?php
              if($avg_rating == 0) {
                  echo  nl2br ("Stocks: (".$row['p_qty'].") ");
              }
              elseif($avg_rating == 1.5) {
                  echo '
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                  ';
                  echo htmlspecialchars("($tot_rating)");
              } 
              elseif($avg_rating == 2.5) {
                  echo '
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                  ';
                  echo htmlspecialchars("($tot_rating)");
              }
              elseif($avg_rating == 3.5) {
                  echo '
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                  ';
                  echo htmlspecialchars("($tot_rating)");
              }
              elseif($avg_rating == 4.5) {
                  echo '
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                  ';
                  echo htmlspecialchars("($tot_rating)");
              }
              else {
                  for($i=1;$i<=5;$i++) {
                      ?>
                      <?php if($i>$avg_rating): ?>
                          <i class="fa fa-star-o"></i>
                      <?php else: ?>
                          <i class="fa fa-star"></i>
                      <?php endif; ?>
                      <?php
                  }
                  echo htmlspecialchars("($tot_rating)");
              }
              ?>
            </div>

            <div class="price-box">
                <p class="price">₱<?php echo formatMoney ( $row['p_current_price'], true); ?></p>
                
                <?php if($row['p_walkin_price'] != ''): ?>
                <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
                <?php endif; ?>
            </div>

            <?php if($row['p_qty'] == 0): ?>
            <div class="out-of-stock">
                <div class="inner">
                    Out Of Stock
                </div>
            </div>
            

            
            

            <?php else: ?>
                <a href="product?id=<?php echo $row['p_id']; ?>">
                <button class="add-cart-btn1"><?php echo LANG_VALUE_154; ?></button>
                </a>
            <?php endif; ?>

        </div>
    </div>
    <?php
                }
                ?>


                </div>

                </div>

            </div>
            
        </div>
        
    </div>
    
    </div>

                

          </div>
    
</div>



<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script src="assets/js/megamenu.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.animate.js"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/jquery.touchSwipe.min.js"></script>
<script src="assets/js/bootstrap-touch-slider.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<script src="assets/js/custom.js"></script>

    
<?php require_once('footermain.php'); ?>
