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

.list-ic.vertical {
  padding: 0;
  margin: 0;
}
.list-ic.vertical li {
  list-style-type: none;
  text-align: left;
}
.list-ic.vertical li span {
  margin: 1.4em 0;
}
.list-ic.vertical li::before {
  top: -35px;
  left: 13px;
  width: 0.2em;
  height: 4em;
}
.list-ic li:first-child::before {
  display: none;
}
.list-ic .active {
  background: dodgerblue;
}
.list-ic .active ~ li {
  background: lightblue;
}
.list-ic .active ~ li::before {
  background: lightblue;
}

@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,800');

* {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}


body {
  font-family: Open Sans, sans-serif;
  font-style: normal !important;
  font-weight: normal !important;
  font-variant: normal !important;
  text-transform: none !important;
  speak: normal;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}


</style> 

    <?php
if(!isset($_REQUEST['id'])) {
    header('location: customer-order.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: customer-order.php');
        exit;
    }
}


$statement1 = $pdo->prepare("SELECT 
                                  t1.payment_id,
                                  t1.id,
                                  t1.product_id,
                                  
                                  t2.payment_id,
                                  t2.payment_date,
                                  t2.order_status,
                                  t2.delivery_status,
                                  t2.payment_status,
                                  t2.payment_method,
                                  t2.shipping_status,

                                  t3.p_id

                                  FROM tbl_order t1
                                  JOIN tbl_payment t2
                                  ON t1.payment_id = t2.payment_id
                                  JOIN tbl_product t3
                                  ON t1.product_id =  t3.p_id
                                  WHERE t1.id=?");

$statement1->execute(array($_REQUEST['id']));
$result2 = $statement1->fetchAll(PDO::FETCH_ASSOC);
foreach ($result2 as $row2) {}
              

if(isset($_POST['form_review'])) {
    
  $statement = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=? AND cust_id=?");
  $statement->execute(array($row2['product_id'],$_SESSION['customer']['cust_id']));
  $total = $statement->rowCount();
  
  if($total) {
      $error_message = LANG_VALUE_68; 
  } else {
      $statement = $pdo->prepare("INSERT INTO tbl_rating (p_id,cust_id,comment,rating) VALUES (?,?,?,?)");
      $statement->execute(array($row2['product_id'],$_SESSION['customer']['cust_id'],$_POST['comment'],$_POST['rating']));
      $success_message = LANG_VALUE_163;    
  }
  
}


foreach($result as $row) {
  $id = $row['id'];
  $payment_id = $row['payment_id'];
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
    	$final_name = 'payment-'.$_REQUEST['payment_id'].'.'.$ext;
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
    	$final_name = 'payment-'.$_REQUEST['payment_id'].'.'.$ext;
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
            <span class="me-3" style="display: contents!important;"><?php $wop = $row2['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?></span>

              <?php

            $os = $row2['order_status'];
            $pm = $row2['payment_method'];
            $ps = $row2['payment_status'];
            $ss = $row2['shipping_status'];
            $ds = $row2['delivery_status'];
            $row_total_price = $row['unit_price']*$row['quantity'];


            if ( $pm == 'GCash') {
              echo '<span class="badge rounded-pill bg-primary">' .$row2['payment_method']. '</span>';
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
              echo '<span class="badge rounded-pill" style="background-color:#06afaf;">' .$row2['payment_method']. '</span>';
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
              echo '<span class="badge rounded-pill bg-info">' .$row2['payment_method']. '</span>';
  
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
                                      WHERE id=?  ");
                                      
          $statement1->execute(array($_REQUEST['id']));
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

                <td class="text-end" colspan="2">
                <?php echo '₱'.formatMoney ($row1['unit_price'], true); ?></td>

              </tr>
              
            </tbody>

          <?php
        } 
      ?>  

            <tfoot>
              <tr class="fw-bold">
                <td colspan="2">TOTAL</td>
                <td class="text-end"><?php echo '₱'.formatMoney ($row_total_price, true); ?></td>
              </tr>
            </tfoot>
          </table>
      </div>
     </div>

    <!-- Receipt Details -->

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
                                            $statement->execute(array($row2['product_id'],$_SESSION['customer']['cust_id']));
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
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/custom.js"></script>
<?php require_once('footermain.php'); ?>