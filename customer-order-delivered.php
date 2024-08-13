<?php require_once('head.php'); ?>
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

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=?");
$statement->execute(array($_SESSION['customer']['cust_email']));
$all_orders = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? AND order_status!='Accepted' AND order_status!='Declined' AND payment_status!='Paid' ORDER BY id DESC");
$statement->execute(array($_SESSION['customer']['cust_email']));
$to_pay = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? AND order_status!='Pending' AND order_status!='Declined' AND payment_status!='Pending' AND shipping_status='Pending' AND delivery_status='Pending' ORDER BY id DESC");
$statement->execute(array($_SESSION['customer']['cust_email']));
$to_ship = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? AND order_status!='Pending' AND shipping_status!='Pending' AND payment_status!='Pending' AND delivery_status='Pending' ORDER BY id DESC");
$statement->execute(array($_SESSION['customer']['cust_email']));
$to_receive = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE cust_id=? AND refund_status!='Completed' ORDER BY id DESC");
$statement->execute(array($_SESSION['customer']['cust_id']));
$refund = $statement->rowCount();
?>

 </div>
</div>


            <div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
                <div class="inner">
                    <h1><?php echo LANG_VALUE_24; ?></h1>
                </div>
                </div>
             
            <br>

<div class="category">

<?php require_once('usernave.php'); ?>



<div class="container" style="padding:0;margin-top: 0;">

<div class="category">

<section class="content">

    <div class="row">
        <div class="col-md-12">
                            
                <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" id="scroll" style="">
                        <li><a href="customer-order" data-toggle="tab">All</a></li>
                        <li><a href="customer-order-pay" data-toggle="tab">To Pay<?php if ($to_pay == 0 ) { echo ''; }else { echo '<span class="count">'.$to_pay.'</span>';}?></a></li>
                        <li><a href="customer-order-ship" data-toggle="tab">To Ship<?php if ($to_ship == 0 ) { echo ''; }else { echo '<span class="count">'.$to_ship.'</span>';}?></a></li>
                        <li><a href="customer-order-recieve" data-toggle="tab">To Receive<?php if ($to_receive == 0 ) { echo ''; }else { echo '<span class="count">'.$to_receive.'</span>';}?></a></li>
                        <li class="active"><a href="customer-order-delivered" data-toggle="tab">Completed</a></li>
                        <li><a href="customer-order-return" data-toggle="tab">Refund<?php if ($refund == 0 ) { echo ''; }else { echo '<span class="count">'.$refund.'</span>';}?></a></li>


                    </ul>
                  <div>
        </div>

   
<?php
            /* ===================== Pagination Code Starts ================== */
            $adjacents = 5;

            $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? AND delivery_status!='Pending' AND return_status='' ORDER BY id DESC");
            $statement->execute(array($_SESSION['customer']['cust_email']));
            $total_pages = $statement->rowCount();

            $statement = $pdo->prepare("SELECT * FROM tbl_product");
            $statement->execute();
            $total_product = $statement->rowCount();
            

            $targetpage = BASE_URL.'customer-order-delivered.php';
            $limit = 10;
            $page = @$_GET['page'];
            if($page) 
                $start = ($page - 1) * $limit;
            else
                $start = 0;
            
            
            $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? AND delivery_status!='Pending' AND return_status='' ORDER BY id DESC LIMIT $start, $limit");
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


   

<div class="">
  <div class="tab-pane active" id="tab_1">
                                           
            <?php
            $tip = $page*10-10;
            foreach ($result as $row) {
                $tip++;
                ?>

  <!-- Main content -->
  <div class="row">
    <div class="d-flex justify-content-between align-items-center py-3" name="order<?php echo $row['payment_id']; ?>">
      <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #<?php echo $row['payment_id']; ?></h2>
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
    echo '<span class="badge rounded-pill bg-success">Order Confirmed</span>';
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
        echo '<span class="badge rounded-pill bg-success">Order Confirmed </span>';
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
        echo '<span class="badge rounded-pill bg-success">Order Confirmed</span>';
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

            <!-- <div class="d-flex">
              <?php
                if($row['delivery_status']=='Completed') {
                    if($row['return_status']==''){
                        ?>
                        <a href="customer-order-return-details?payment_id=<?php echo $row['payment_id']; ?>" class="btn btn-primary btn-xs" style="width:100%;margin-bottom:4px;">Return Item</a>
                        <?php
                    }
                }
              ?>
              
            </div> -->
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

                      <?php if($row1['quantity'] != 0){
                        echo '<span class="small">Quantity: ' .$row1['quantity'].'</span>';
                            }else{
                              echo '';
                      } 
                      ?>

                      
                      <?php
                            $statement = $pdo->prepare("SELECT * 
                                                FROM tbl_rating
                                                WHERE p_id=? AND cust_id=?");
                            $statement->execute(array($row1['product_id'],$_SESSION['customer']['cust_id']));
                            $result3 = $statement->fetchAll(PDO::FETCH_ASSOC);
                            $ratings = $statement->rowCount();
                            foreach ($result3 as $row3) {
                              $rating = $row3['rating'];
                            }

                            if ($ratings==0) {
                              echo '';
                             
                            }else {
                              echo '<span class="small">Rated: ';
                            
                              
                                for($i=1;$i<=5;$i++) {
                                  ?>
                                  <?php if($i>$rating){ ?>
                                    <i class="fa fa-star-o"></i>
                                  <?php }else{ ?>
                                    <i class="fa fa-star"></i>
                                  <?php } 
                                
                              }
                            }
                              ?>

                      </span>

                    </div>

                  </div>
                </td>

                <td class="text-end" colspan="2"><?php echo '₱'.formatMoney ($row1['unit_price'], true); ?><br><br>
                <?php
                if($row['delivery_status']=='Completed') {
                    if($row['return_status']==''){
                      }if($row1['quantity'] == 0){
                        ?>
                        <span class="btn btn-danger btn-xs" style="width:100%;margin-bottom:4px;">Order Refunded</span>
                        <?php
                      }else{
                        ?>
                        <a href="customer-order-refund?id=<?php echo $row1['id']; ?>" class="btn btn-primary btn-xs" style="width:100px;margin-bottom:4px;">Return/Refund</a>
                        <?php
                            $statement = $pdo->prepare("SELECT * 
                                                FROM tbl_rating
                                                WHERE p_id=? AND cust_id=?");
                            $statement->execute(array($row1['product_id'],$_SESSION['customer']['cust_id']));
                            $total = $statement->rowCount();
                            ?>
                            <?php if($total==0): ?>
                              <a href="customer-order-rating?id=<?php echo $row1['id']; ?>" class="btn btn-success btn-xs" style="width:100px;margin-bottom:4px;">Rate</a>

                            <?php else: ?>
                            <?php endif; ?>
                        <?php
                      }
                      
                }
              ?></td>

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
  } 
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
  <script src="assets/js/jquery-2.2.4.min.js"></script>

  <script>
$(document).ready(function () {
  formreceipt = $('#order<?php echo $row['payment_id']; ?>').val();

        $('#form2button1').prop("disabled", true);
        if ( $row1['quantity'] == 0 ) {
              $('#form2button1').prop("disabled", true);
        }
        $('#formreceipt').on('change',function() {
          formreceipt = $('#formreceipt').val();
            if ( formreceipt == 0 ) {
            	$('#form2button1').prop("disabled", true);
            }else {
                $('#form2button1').prop("disabled", false);
            }
        });
});
</script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/custom.js"></script>
<?php require_once('footermain.php'); ?>