<?php require_once('head.php'); ?>

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
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link rel="stylesheet" href="./profile.css">
   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="cartstyle.css">
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
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

                               

<?php
// Check if the customer is logged in or not
if(!isset($_SESSION['customer'])) {
    header('location: '.BASE_URL.'logout.php');
    exit;
} else {
    // If customer is logged in, but admin make him inactive, then force logout this user.
    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=? AND cust_status=?");
    $statement->execute(array($_SESSION['customer']['cust_id'],0));
    $total = $statement->rowCount();
    if($total) {
        header('location: '.BASE_URL.'logout.php');
        exit;
    }
}
?>

<div class="page" style="padding-top:0;">

<div class="container" style="padding:0;">
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
       <div class="inner">
           <h1>Dashboard</h1>
       </div>
   </div> <br>
   
<div class="category">
<?php require_once('usernave.php'); ?>

            <div class="container" style="padding:0;margin: 0;">

<section class="content-header" style="padding:0;width: 100%">
            <?php

$statement = $pdo->prepare("SELECT * FROM tbl_product");
$statement->execute();
$total_product = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_status='1'");
$statement->execute();
$total_customers = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Completed'));
$total_order_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE shipping_status=?");
$statement->execute(array('Completed'));
$total_shipping_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$total_order_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=? AND shipping_status=?");
$statement->execute(array('Completed','Pending'));
$total_order_complete_shipping_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? AND shipping_status=? ORDER BY id DESC ");
$statement->execute(array('cust_email','Completed'));
$total_order_completeds = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? ORDER BY id DESC");
$statement->execute(array($_SESSION['customer']['cust_email']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$totalorder = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? AND delivery_status='Pending' ORDER BY id DESC");
$statement->execute(array($_SESSION['customer']['cust_email']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$totalordership = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? AND delivery_status='Completed' ORDER BY id DESC");
$statement->execute(array($_SESSION['customer']['cust_email']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$totalordercompleted = $statement->rowCount();
?>

<div class="row" style="display: flow-root;">


          <a href="cart.php">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                    <?php
                    if(isset($_SESSION['cart_p_id'])) {
                      $i=0;
                      foreach($_SESSION['cart_p_qty'] as $key => $value) 
                      {
                        $i++;
                      } 
                      
                      echo "<h3>$i</h3>";
                    } else {
                      echo "<h3>0</h3>";
                    }
                  ?>
                  <p>Cart</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-cart"></i>
                </div>
               
              </div>
            </div>
            </a>

            <a href="customer-order-recieve.php">
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo $totalordership; ?></h3>

                  <p>Pending Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div>
            </a>

            <a href="customer-order-delivered.php">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $totalordercompleted; ?></h3>

                  <p>Completed Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-checkmark-circled"></i>
                </div>
                
              </div>
            </div>
            </a>

          <a href="customer-order.php">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $totalorder; ?></h3>

                  <p>All Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-cart"></i>
                </div>
                
              </div>
            </div>
          </a>

          <?php
            /* ===================== Pagination Code Starts ================== */
            $adjacents = 5;

            $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=?  ORDER BY id DESC");
            $statement->execute(array($_SESSION['customer']['cust_email']));
            $total_pages = $statement->rowCount();

            $statement = $pdo->prepare("SELECT * FROM tbl_product");
            $statement->execute();
            $total_product = $statement->rowCount();
            

            $targetpage = BASE_URL.'customer-order.php';
            $limit = 10;
            $page = @$_GET['page'];
            if($page) 
                $start = ($page - 1) * $limit;
            else
                $start = 0;
            
            
            $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? ORDER BY id DESC LIMIT $start, $limit");
            $statement->execute(array($_SESSION['customer']['cust_email']));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
           
            
            if ($page == 0) $page = 1;
            $prev = $page - 1;
            $next = $page + 1;
            $lastpage = ceil($total_pages/$limit);
            $lpm1 = $lastpage - 1;   
            $pagination = "";
            if($lastpage > 1)
            {   
                $pagination .= "<div class=\"pagination\">";
                if ($page > 1) 
                    $pagination.= "<a href=\"$targetpage?page=$prev\">&#171; previous</a>";
                else
                    $pagination.= "<span class=\"disabled\">&#171; previous</span>";    
                if ($lastpage < 7 + ($adjacents * 2))
                {   
                    for ($counter = 1; $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                    }
                }
                elseif($lastpage > 5 + ($adjacents * 2))
                {
                    if($page < 1 + ($adjacents * 2))        
                    {
                        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                        }
                        $pagination.= "...";
                        $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                        $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
                    }
                    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                    {
                        $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                        $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                        $pagination.= "...";
                        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                        }
                        $pagination.= "...";
                        $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                        $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
                    }
                    else
                    {
                        $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                        $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                        $pagination.= "...";
                        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                        }
                    }
                }
                if ($page < $counter - 1) 
                    $pagination.= "<a href=\"$targetpage?page=$next\">next &#187;</a>";
                else
                    $pagination.= "<span class=\"disabled\">next &#187;</span>";
                $pagination.= "</div>\n";       
            } 
            /* ===================== Pagination Code Ends ================== */
            ?>


   

</div>
<div class="col-lg-12" style="padding:0;">
    
  <div class="tab-pane active" id="tab_1">
  <div class="d-flex align-items-center">
      <img src="assets/img/icons/shopping.gif" alt="" width="32" class="img-fluid">
      <h4>Recent Orders</h4>  
    </div>  
  
            <?php
                $tip = $page*10-10;
                          
                  if ($totalorder==0){
                    echo "No Pending Orders";
            
                  }else{
                    foreach ($result as $row) {
                    $tip++;
              ?>

  <!-- Main content -->
  <div class="row">
    <div class="d-flex justify-content-between align-items-center py-3">
      <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #<?php echo $row['payment_id']; ?></h2>
      <?php
                if($row['payment_status']=='Pending' && $row['order_status']=='Accepted.') {
                  if($row['return_status']=='' && $row['photo']==''){
                      ?>
                      <a href="customer-order-details?payment_id=<?php echo $row['payment_id']; ?>" class="btn btn-primary btn-xs" style="width:100px;height:25px;margin-bottom:4px;">Pay Order</a>
                      <?php
                  }
              }
              ?>
    </div>

      <div class="col-lg-12">
        <!-- Details -->
      
      <div class="card mb-4">
        
        <div class="card-body">
            
          <div class="mb-3 d-flex justify-content-between">
            
            <div>
              <span class="me-3" style="display: contents!important;"><?php $wop = $row['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?></span>

              <?php

$os = $row['order_status'];
// $os = 'Order Confirmed';
$pm = $row['payment_method'];
$ps = $row['payment_status'];
$ss = $row['shipping_status'];
$ds = $row['delivery_status'];
$at = $row['attempt'];
$rs = $row['return_status'];
$pay = $row['photo'];



if ( $pm == 'GCash') {
  echo '<span class="badge rounded-pill bg-primary">' .$row['payment_method']. '</span>';
    if ( $os == 'Accepted.') {
    echo '<span class="badge rounded-pill bg-success">Order Confirmed </span>';
        if ( $ps == 'Paid') {
        echo '<span class="badge rounded-pill bg-success">Paid </span>';
            if ( $ds == 'Completed') {
            echo '<span class="badge rounded-pill bg-success">Order Completed </span>';
            }elseif ( $ss == 'Shipped Out') {
              echo '<span class="badge rounded-pill bg-warning">Out for Delivery </span>';
            } else {
            echo '<span class="badge rounded-pill bg-warning">Preparing to Ship</span>';
            }
        }elseif ( $ps == 'Pending') {
            if ($pay == ''){
              echo '<span class="badge rounded-pill bg-warning">Pending Payment </span>';
            }else {
              echo '<span class="badge rounded-pill bg-warning">Pending Payment Confirmation</span>';
            }
        }elseif ( $ps == 'Declined') {
        echo '<span class="badge rounded-pill bg-danger">Payment Declined </span>';
        }
    }elseif ( $os == 'Declined') {
    echo '<span class="badge rounded-pill bg-danger">Order Declined</span>';
    }elseif ( $os == 'Pending') {
    echo '<span class="badge rounded-pill bg-warning">Pending Order Confirmation</span>';
    }

      
      
  }elseif ( $pm == 'Cash on Delivery') {
  echo '<span class="badge rounded-pill" style="background-color:#06afaf;">' .$row['payment_method']. '</span>';
      if ( $os == 'Accepted') {
        echo '<span class="badge rounded-pill bg-success">Order Corfirmed </span>';
            if ( $ds == 'Completed') {
            echo '<span class="badge rounded-pill bg-success">Order Completed </span>';
            }elseif ( $ss == 'Shipped Out') {
              echo '<span class="badge rounded-pill bg-warning">Out for Delivery </span>';
            } else {
            echo '<span class="badge rounded-pill bg-warning">Preparing to Ship</span>';
            }
        }elseif ( $os == 'Declined') {
        echo '<span class="badge rounded-pill bg-danger">Order Declined</span>';
        } else {
        echo '<span class="badge rounded-pill bg-warning">Pending Order Confirmation</span>';
        }
  
        
  } else {
  echo '<span class="badge rounded-pill bg-info">' .$row['payment_method']. '</span>';

      if ( $os == 'Accepted') {
        echo '<span class="badge rounded-pill bg-success">Order Confirmed </span>';
            if ( $ds == 'Completed') {
            echo '<span class="badge rounded-pill bg-success">Order Completed </span>';
            }elseif ( $ss == 'Pickup') {
              echo '<span class="badge rounded-pill bg-warning">Ready to Pickup </span>';
            } else {
            echo '<span class="badge rounded-pill bg-warning">Preparing for Pickup</span>';
            }
        } elseif ( $os == 'Declined') {
        echo '<span class="badge rounded-pill bg-danger">Order Declined</span>';
        }else {
        echo '<span class="badge rounded-pill bg-warning">Pending Order Confirmation</span>';
        }
  }
            ?>

    

            </div>

            <div class="d-flex">
              <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text">Invoice</span></button>
              <div class="dropdown">

                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>

                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                </ul>

              </div>
            </div>
          </div>
                        
          <?php
          $statement1 = $pdo->prepare("SELECT 

                                      t1.id,
                                      t1.product_id,
                                      t1.product_name,
                                      t1.size,
                                      t1.color,
                                      t1.quantity,
                                      t1.unit_price,
                                      t1.payment_id,

                                      t2.p_id,
                                      t2.p_name,
                                      t2.p_featured_photo

                                      FROM tbl_order t1
                                      JOIN tbl_product t2
                                      ON t1.product_id = t2.p_id
                                      WHERE payment_id=?  ");
                                      
          $statement1->execute(array($row['payment_id']));
          $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result1 as $row1) {
              
          ?>
          
          <table class="table table-borderless">
            <tbody>
            
              <tr>
                <td >
                  <div class="d-flex mb-2">
                    <div class="flex-shrink-0" style="align-self: center;">
                      <a href="customer-order-details?payment_id=<?php echo $row['payment_id']; ?>">
                        <img src="assets/uploads/<?php echo $row1['p_featured_photo']; ?>" alt="" width="80" class="img-fluid"></a>
                   
                    </div>

                    <div class="flex-lg-grow-1 ms-3">
                      <h6 class="small mb-0"><a href="customer-order-details?payment_id=<?php echo $row['payment_id']; ?>" class="text-reset fw-bold"><?php echo $row1['product_name']; ?></a></h6>
                      <span class="small ">Color: <?php echo $row1['color']; ?></span>
                      <span class="small">Unit of Measurement: <?php echo $row1['size']; ?></span>
                      <span class="small">Quantity: <?php echo $row1['quantity']; ?></span>
                    </div>

                  </div>
                </td>

                <td class="text-end" colspan="2"><?php echo '₱'.formatMoney ($row1['unit_price'], true); ?></td>

              </tr>
              
            </tbody>

          <?php
        } 
      ?>  

            <tfoot>
              <tr class="fw-bold">
                <td colspan="2">TOTAL</td>
                <td class="text-end"><?php echo '₱'.formatMoney ($row['paid_amount'], true); ?></td>
              </tr>
            </tfoot>
          </table>
          
        </div>
      </div>

    <?php
  } }
?>     

        </div>
      </div>

      <?php 
    echo $pagination; 
  ?>     


    

                    
              
            </section> 
        
</body>
</html>
            

        
            

		  </div>
                
            </div>
        </div>

    </div>


</div></div>
</div></div>

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