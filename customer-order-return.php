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
                        <li ><a href="customer-order" data-toggle="tab">All</a></li>
                        <li><a href="customer-order-pay" data-toggle="tab">To Pay<?php if ($to_pay == 0 ) { echo ''; }else { echo '<span class="count">'.$to_pay.'</span>';}?></a></li>
                        <li><a href="customer-order-ship" data-toggle="tab">To Ship<?php if ($to_ship == 0 ) { echo ''; }else { echo '<span class="count">'.$to_ship.'</span>';}?></a></li>
                        <li><a href="customer-order-recieve" data-toggle="tab">To Receive<?php if ($to_receive == 0 ) { echo ''; }else { echo '<span class="count">'.$to_receive.'</span>';}?></a></li>
                        <li><a href="customer-order-delivered" data-toggle="tab">Completed</a></li>
                        <li class="active"><a href="customer-order-return" data-toggle="tab">Refund<?php if ($refund == 0 ) { echo ''; }else { echo '<span class="count">'.$refund.'</span>';}?></a></li>


                    </ul>
                  <div>
        </div>

   
<?php
            /* ===================== Pagination Code Starts ================== */
            $adjacents = 5;

            $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE cust_id=? ORDER BY id DESC");
            $statement->execute(array($_SESSION['customer']['cust_id']));
            $total_pages = $statement->rowCount();

            $statement = $pdo->prepare("SELECT * FROM tbl_product");
            $statement->execute();
            $total_product = $statement->rowCount();
            

            $targetpage = BASE_URL.'customer-order-return.php';
            $limit = 10;
            $page = @$_GET['page'];
            if($page) 
                $start = ($page - 1) * $limit;
            else
                $start = 0;
            
            
            $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE cust_id=? ORDER BY refund_date DESC LIMIT $start, $limit");
            $statement->execute(array($_SESSION['customer']['cust_id']));
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
    <div class="d-flex justify-content-between align-items-center py-3">
    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Return/Refund ID: <?php echo $row['refund_id']; ?></h2>

    </div>

      <div class="col-lg-12">
        <!-- Details -->
      
      <div class="card mb-4">
        
        <div class="card-body">
            
          <div class="mb-3 d-flex justify-content-between">
            
            <div>
            <span class="me-3" style="display: contents!important;"><?php $wop = $row['refund_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?></span>
              
        <?php

          $os = $row['status'];
          $ss = $row['shipping_status'];
          $rs = $row['receive_status'];
          $rr = $row['refund_status'];

              if ( $os == 'Pending') {
                echo '<span class="badge rounded-pill bg-warning">Request Return/Refund</span>';
                }elseif ( $os == 'Declined'){
                echo '<span class="badge rounded-pill bg-danger">Request Declined</span>';
                }else {
                echo '<span class="badge rounded-pill bg-success">Request Confirmed</span>';
                }
              if ( $ss == 'Pending') {
                echo '<span class="badge rounded-pill bg-warning">Pending Shipping</span>';
                }else {
                echo '<span class="badge rounded-pill bg-success">Shipped Out</span>';
                }
              if ( $rs == 'Pending') {
                echo '<span class="badge rounded-pill bg-warning">Pending Shipping Received</span>';
                }else {
                echo '<span class="badge rounded-pill bg-success">Received</span>';
                }
              if ( $rr == 'Pending') {
                echo '<span class="badge rounded-pill bg-warning">Pending Return/Refund</span>';
                }else {
                echo '<span class="badge rounded-pill bg-success">Return/Refund Completed</span>';
                }
            ?>
            
            </div>

            <div class="d-flex">
              <?php
                if($row['status']=='Accepted') {
                  if($row['shipping_status']=='Pending') {

                        ?>
                        <!-- <a href="receive-change-status.php?id=<?php echo $row['id']; ?>&task=Shipped-Back" class="btn btn-primary btn-xs" style="width:100%;margin-bottom:4px;">Shipped Back</a> -->
                        <a href="customer-order-refund-ship.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs" style="width:100%;height:25px;margin-bottom:4px;">Shipped Back</a>

                        <?php
                }
              }
              ?>
              
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
                                      t1.refund_id,

                                      t2.p_id,
                                      t2.p_name,
                                      t2.p_featured_photo

                                      FROM tbl_refund_order t1
                                      JOIN tbl_product t2
                                      ON t1.product_id = t2.p_id
                                      WHERE refund_id=?  ");
                                      
          $statement1->execute(array($row['refund_id']));
          $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result1 as $row1) {
              
          ?>
          
          <table class="table table-borderless">
            <tbody>
            
              <tr>
              <td >
                  <div class="d-flex mb-2">
                    <div class="flex-shrink-0" style="align-self: center;">
                      <a href="customer-order-refund-details?id=<?php echo $row['id']; ?>">
                        <img src="assets/uploads/<?php echo $row1['p_featured_photo']; ?>" alt="" width="80" class="img-fluid"></a>
                   
                    </div>

                    <div class="flex-lg-grow-1 ms-3">
                      <h6 class="small mb-0"><a href="customer-order-refund-details?id=<?php echo $row['id']; ?>" class="text-reset fw-bold"><?php echo $row1['product_name']; ?></a></h6>
                      <span class="small ">Color: <?php echo $row1['color']; ?></span>
                      <span class="small">Unit of Measurement: <?php echo $row1['size']; ?></span>
                      <span class="small">Quantity: <?php echo $row1['quantity']; ?></span>
                    </div>

                  </div>
                </td>

                <td class="text-end" colspan="2"><?php echo '₱'.formatMoney ($row1['unit_price'], true); ?>
                <br><br>
                <?php
                if($row['status']=='Accepted') {
                    if($row['shipping_status']=='pending') {
                        ?>
                        <a href="customer-order-refund-ship.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs" style="width:100px;margin-bottom:4px;">Shipped Back</a>
                        <?php
                    }
                  }
                ?>

              </td>

              </tr>
              
            </tbody>

          <?php
        } 
      ?>  

            <tfoot>
              <tr class="fw-bold">
                <td colspan="2">TOTAL</td>
                <td class="text-end"><?php echo '₱'.formatMoney ($row['refund_amount'], true); ?></td>
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
<?php require_once('footermain.php'); ?>