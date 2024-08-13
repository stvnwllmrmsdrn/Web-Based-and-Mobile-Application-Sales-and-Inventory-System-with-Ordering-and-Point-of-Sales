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
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 100; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal1-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 400px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style> 

    <?php
    if(isset($_SESSION['customer'])){
      if(!isset($_REQUEST['payment_id'])) {
          header('location: customer-order.php');
          exit;
      } else {
          // Check the id is valid or not
          $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
          $statement->execute(array($_REQUEST['payment_id']));
          $total = $statement->rowCount();
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
          if( $total == 0 ) {
              header('location: customer-order.php');
              exit;
          }
      }
    }else { 
        header('location: login.php');
        exit;
    } 

foreach($result as $row) {
  $id = $row['id'];
  $photo = $row['photo'];
  $payment_id = $row['payment_id'];
  $attempt = $row['attempt'];
  $total_attempt = 3 - $attempt;
  $add_attempt = $row['attempt'] + 1;
  $payment_status = $row['payment_status'];
  $decline_note = $row['decline_note'];
}

if(isset($_POST['form3'])) {

	$valid = 1;

	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

      

    	// updating the data
    	$date = date('Y-m-d h:i:s');
    	$final_name = 'payment'.$date.'-'.$_REQUEST['payment_id'].'.'.$ext;
        move_uploaded_file( $path_tmp, 'assets/uploads/payment_receipt/'.$final_name );
        $_FILES['photo'] = $final_name;

        // updating the database
      $statement = $pdo->prepare("UPDATE tbl_payment SET photo=?,attempt=?,payment_status=? WHERE payment_id=?");
      $statement->execute(array($final_name,$add_attempt,'Pending',$_REQUEST['payment_id']));

        $success_message = 'User Photo is updated successfully.';

        header('location: customer-order-pay.php');
    	
    }

    
}
if(isset($_POST['form2'])) {

	$valid = 1;

	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

      

    	// updating the data
    	$date = date('Y-m-d h:i:s');
    	$final_name = 'payment'.$date.'-'.$_REQUEST['payment_id'].'.'.$ext;
        move_uploaded_file( $path_tmp, 'assets/uploads/payment_receipt/'.$final_name );
        $_FILES['photo'] = $final_name;

        // updating the database
      $statement = $pdo->prepare("UPDATE tbl_payment SET photo=?,attempt=? WHERE payment_id=?");
      $statement->execute(array($final_name,1,$_REQUEST['payment_id']));

        $success_message = 'User Photo is updated successfully.';

        header('location: customer-order-pay.php');
    	
    }

    
}


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
                    <ul class="nav nav-tabs" style="background-color:transparent;margin-top:30px;">
                        <li class="h3 mb-0" >View Order Details</li>


                    </ul>
                  <div>
        </div>

        <?php
           
            $adjacents = 5;

            $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=?  ORDER BY id DESC");
            $statement->execute(array($_SESSION['customer']['cust_email']));
          ?>

<div class="row">
    <div class="d-flex justify-content-between align-items-center py-3">
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
                  echo '<span class="badge rounded-pill bg-success">Order Accepted </span>';
                      if ( $ps == 'Paid') {
                      echo '<span class="badge rounded-pill bg-success">Paid </span>';
                          if ( $ds == 'Completed') {
                          echo '<span class="badge rounded-pill bg-success">Delivered </span>';
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
                      echo '<span class="badge rounded-pill bg-success">Order Accepted </span>';
                          if ( $ds == 'Completed') {
                          echo '<span class="badge rounded-pill bg-success">Delivered </span>';
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
                      echo '<span class="badge rounded-pill bg-success">Accepted </span>';
                          if ( $ds == 'Completed') {
                          echo '<span class="badge rounded-pill bg-success">Completed </span>';
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
                      <a href="product?id=<?php echo $row1['product_id']; ?>">
                        <img src="assets/uploads/<?php echo $row1['p_featured_photo']; ?>" alt="" width="80" class="img-fluid"></a>
                   
                    </div>

                    <div class="flex-lg-grow-1 ms-3">
                      <h6 class="small mb-0"><a href="product?id=<?php echo $row1['product_id']; ?>" class="text-reset fw-bold"><?php echo $row1['product_name']; ?></a></h6>
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

    <!-- Receipt Details -->

    <!-- <?php 
            if ( $pm == 'GCash') {
              if ( $os == 'Accepted.') {
              ?>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                  <div class="form-groupp">
                    <?php 
                      if(empty($row['photo'])) {
                          ?>
                            <div class="col-lg-12">
                              <h3>Proceed to Payment</h3>
                            </div>
                  <div>

                  <div class="col-sm-12" style="padding:20px;">
                      <input type="file" name="photo" id="formreceipt">
                  </div>
                    
                  <div class="form-groupp">
                      <div class="col-lg-4">
                          <input type="submit" class="btn btn-primary" value=" Upload Receipt" name="form2" id="form2button1">
                      </div>
                  </div>

                    <?php 
                      }else{
                        ?>
                        <div class="col-lg-12">
        <-- Details -->
      
      <!-- <div class="card mb-4">
        
        <div class="card-body">
            
          <div class="mb-3 d-flex justify-content-between">
                        <div class="col-lg-12">
                          <h3>Payment Receipt :</h3>
                          <a href="view-receipt?payment_id=<?php echo $row['payment_id']; ?>">
                          Uploaded File:  <?php echo ($row['photo']); ?>
                         </a>
                        </div>
                        <?php
                      }
                    ?> 
                </form>

                <?php
              }else{
                echo '';
              }
          }
          ?> --> 

      
            <?php 
            if ( $pm == 'GCash') {
              if ( $os == 'Accepted.') {
              ?>

                  <div class="form-groupp">
                    <?php 
                    if(empty($row['photo'])) {
                    ?>
                      <div class="col-lg-12">
                        <h3>Proceed to Payment</h3>
                        <h6>Please scan the <b>QR Code</b> below or copy the <b>GCash Number</b> and proceed to payment.</h6>
                    <input class="form-control" style="width:235px;" type="text" value="09709400645"><br>

                        <img src="assets/uploads/gcash.jpg" style="width:50%;">

                      </div>
                  <div>

                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                    <div class="col-sm-12" style="padding:20px;">
                      <h6>You only have <b> 3 ATTEMPTS </b> to submit your <b> Payment Receipt</b>. Please check the details before submitting the file.</h6>

                      <input type="file" class="form-control" style="width:235px;" name="photo" id="formreceipt">
                      
                    </div>
                       
                    
                  <div class="form-groupp">
                      <div class="col-lg-4">
                          <input type="submit" class="btn btn-primary" value=" Upload Receipt" name="form2" id="form2button1">
                      </div>
                  </div>
                  <?php
                      }else { 
                        ?>
                        <table class="table table-borderless">
                          <tbody>
                            <div>
                              <div class="mb-3 d-flex justify-content-between">
                                <span class="me-3" style="display: contents!important;"><?php $wop = $row['payment_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?></span>

                                <?php 
                                if ( $ps == 'Pending') {
                                  echo '<span class="badge rounded-pill bg-warning">Payment: Pending Request</span>';
                                  }elseif ( $ps == 'Declined'){
                                  echo '<span class="badge rounded-pill bg-danger">Payment: Invalid</span>';
                                  }else {
                                  echo '<span class="badge rounded-pill bg-success">Payment: Accepted</span>';
                                  }
                              ?>
                              </div>
                        <td >
                        <div class="d-flex mb-2">
                          <div class="flex-shrink-0" style="align-self: center;">
                            <a href="#" id="myBtn">
                              <img src="assets/uploads/payment_receipt/<?php echo $row['photo']; ?>" alt="" max width="80" class="img-fluid"></a>
                          </div>
                              <div id="myModal" class="modal1">
                              <div class="modal1-content">
                                <span class="close">&times;</span>
                                <img src="assets/uploads/payment_receipt/<?php echo $row['photo']; ?>" alt="" max width="100%" class="img-fluid"></a>
                              </div>

                            </div>
                          <div class="flex-lg-grow-12 ms-3">
                            <h6 class="small mb-0"><a class="text-reset fw-bold">Payment Method: <?php echo $pm; ?></a></h6>
                            <span class="small ">Payment Id: <?php echo $row['payment_id']; ?></span>
                            <span class="small">Date: <?php echo $row['payment_date']; ?></span><br>


                          </div>
                        </div>
                      </td>
                    </form>
                  <tr class="fw-bold">
                <td colspan="2">

                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                  <?php if ( $ps == 'Declined') { ?>

                                


            <tfoot>
              <tr class="fw-bold">
                <td colspan="2">
                  <?php 
                  if ( $ps == 'Declined') {
                    echo 'Seller Notes: ';
                    echo '<textarea class="form-control" style="border-radius:15px;background-color: #d9edff;" cols="30" rows="4" disabled> '.$row['decline_payment'].'</textarea>';
                      if ( $at <= 2) { 
                        ?>
                        <h6>Please scan the <b>QR Code</b> below or copy the <b>GCash Number</b> and proceed to payment.</h6>
                    <input class="form-control" style="width:235px;" type="text" value="09709400645"><br>

                        <img src="assets/uploads/gcash.jpg" style="width:50%;">
                        <h6>You are now have <b> <?php echo $total_attempt; ?> </b>  available ATTEMPT to resubmit <b> Payment Receipt</b>. Please check the details carefully before submitting the request. If you reach the limit of attempt, your order is no longer be able to process.</h6>

                              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                <div class="col-sm-12" style="padding:20px;">
                                    <input type="file" class="form-control" style="width:235px;" name="photo" id="formreceipt">
                                </div>
                                  
                                <div class="form-groupp">
                                    <div class="col-lg-4">
                                        <input type="submit" class="btn btn-primary" value=" Upload Receipt" name="form3" id="form2button1">
                                    </div>
                                </div>
                              </form>
                      <?php 
                      }else {
                        echo '<h6>You are now <b> UNABLE </b> to request for <b> REFUND</b> because you already reached the maximum attempt to request.</h6>';
                        }

                    
                    }else {
                    echo '';
                    }
                ?>
                </td>
                </form>
                </table>


                              <?php } ?>
                      <?php
                      }
                }
            }
            ?> 
            
            <?php 
            if ( $os == 'Declined') { ?>
              <h6>We're sorry to inform you that your order has been <b>Declined.</b></h6>
              <h5>Seller Notes:</h5>
              <textarea class="form-control" style="border-radius:15px;background-color: #d9edff;" cols="30" rows="4" disabled> <?php echo $decline_note ?></textarea>
            <?php } ?>
              
                
            </tbody>
              </table>
    </div>

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
  formreceipt = $('#formreceipt').val();

        $('#form2button1').prop("disabled", true);
        if ( formreceipt == '' ) {
              $('#form2button1').prop("disabled", true);
        }
        $('#formreceipt').on('change',function() {
          formreceipt = $('#formreceipt').val();
            if ( formreceipt == '' ) {
            	$('#form2button1').prop("disabled", true);
            }else {
                $('#form2button1').prop("disabled", false);
            }
        });
});
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>   

<?php require_once('footermain.php'); ?>