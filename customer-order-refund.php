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
  width: 80%;
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
if(!isset($_REQUEST['id'])) {
    header('location: customer-order-delivered.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: customer-order-delivered.php');
        exit;
    }
}

foreach($result as $row) {
  $id = $row['id'];
  // $photo = $row['photo'];
  $payment_id = $row['payment_id'];
}
?>

<?php

  if (isset($_POST['form1'])) {

	  $valid = 1;
    
    $refund_id = time();
    $refund_date = date('Y-m-d H:i:s');
    $order_id = $_REQUEST['id'];
    $product_id = $row['product_id'];
    $product_name = $row['product_name'];
    $size = $row['size'];
    $color = $row['color'];
    $qty = $rqty[$i];
    $unit_price = $row['unit_price'];
    $refund_amount = $unit_price*$_POST['qty'];


    if(empty($_POST['qty'])) {
      $valid = 0;
      $error_message .= "You must have to select quantity<br>";
    }

    if(empty($_POST['reason_id'])) {
      $valid = 0;
      $error_message .= "You must have to select a reason<br>";
    }



    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];
      
    if($path!='') {
      $ext = pathinfo( $path, PATHINFO_EXTENSION );
      $file_name = basename( $path, '.' . $ext );
      if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
          $valid = 0;
          $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
      }
    } else {
    	$valid = 0;
        $error_message .= 'You must have to upload proof<br>';
    }
    
      
    if($valid == 1) {

      // removing the existing photo
      if($_FILES['photo']!='') {
        unlink('assets/uploads/refund_proof/'.$final_name);	
      }
      // updating the data
      $final_name = 'refund-'.$refund_id.'.'.$ext;
        move_uploaded_file( $path_tmp, 'assets/uploads/refund_proof/'.$final_name );
        $_FILES['photo'] = $final_name;

        // updating the database
      $statement = $pdo->prepare("UPDATE tbl_refund_order SET photo=? WHERE id=?");
      $statement->execute(array($final_name,$order_id));

        $success_message = 'User Photo is updated successfully.';

        header('location: customer-order-delivered.php');
    
  
  

      //Saving data into the main table tbl_product
      $statement = $pdo->prepare("INSERT INTO tbl_refund_order(
                                  product_id,
                                  product_name,
                                  size,
                                  color,
                                  quantity,
                                  unit_price,
                                  refund_id,
                                  refund_date,
                                  refund_amount,
                                  reason_id,
                                  photo,
                                  status,
                                  order_id,	
                                  cust_id,
                                  refund_status,
                                  shipping_status,
                                  receive_status,
                                  notes,
                                  gcash_no,
                                  attempt
                                ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                  $product_id,
                                  $product_name,
                                  $size,
                                  $color,
                                  $_POST['qty'],
                                  $unit_price,
                                  $refund_id,
                                  $refund_date,
                                  $refund_amount,
                                  $_POST['reason_id'],
                                  $final_name,
                                  'Pending',
                                  $order_id,
                                  $_SESSION['customer']['cust_id'],
                                  'Pending',
                                  'Pending',
                                  'Pending',
                                  $_POST['notes'],
                                  $_POST['gcash'],
                                  1,
                                ));

      // $current_qty = $row['quantity'];
      // $final_quantity = $current_qty - $_POST['qty'];
      // $statement = $pdo->prepare("UPDATE tbl_order SET quantity=? WHERE id=?");
      // $statement->execute(array($final_quantity,$_REQUEST['id']));
    }
  }

?>

 </div>
</div>
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
                <div class="inner">
                    <h1>Return/Refund Item</h1>
                </div>
                </div>
             
            <br>

<div class="category">

<?php require_once('usernave.php'); ?>

 <!-- The Modal -->
 <div id="myModal" class="modal1">

<!-- Modal content -->
<div class="modal1-content">
  <span class="close">&times;</span>
  <?php require_once('termsrefund.php'); ?>
</div>

</div>

<div class="container" style="padding:0;margin-top: 0;">

<div class="category">

<section class="content">

    <div class="row">
        <div class="col-md-12">
                            
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" style="background-color:transparent;margin-top:30px;">
                        <li class="h3 mb-0" >Return/Refund Item</li>


                    </ul>
                  <div>
        </div>

        <?php
           
            $adjacents = 5;

            $statement4 = $pdo->prepare("SELECT 

                                      t1.id,
                                      t1.product_id,
                                      t1.product_name,
                                      t1.size,
                                      t1.color,
                                      t1.quantity,
                                      t1.unit_price,
                                      t1.payment_id,

                                      t2.payment_id,
                                      t2.payment_date,
                                      t2.order_status,
                                      t2.payment_method,
                                      t2.payment_status,
                                      t2.shipping_status,
                                      t2.delivery_status,
                                      t2.return_status

                                      FROM tbl_order t1
                                      JOIN tbl_payment t2
                                      ON t1.payment_id = t2.payment_id
                                      WHERE t2.payment_id=? ");
            $statement4->execute(array($row['payment_id']));
            $result2 = $statement4->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result2 as $row1) 
          ?>

<div class="row">
  
    <div class="d-flex justify-content-between align-items-center py-3">
      <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #<?php echo $row1['payment_id']; ?></h2>
    </div>

      <div class="col-lg-12">
        <!-- Details -->
      
      <div class="card mb-4">
        
        <div class="card-body">
            
          <div class="mb-3 d-flex justify-content-between">
            
            <div>
            <span class="me-3" style="display: contents!important;"><?php $wop = $row1['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?></span>
            
              <?php

            $os = $row1['order_status'];
            $pm = $row1['payment_method'];
            $ps = $row1['payment_status'];
            $ss = $row1['shipping_status'];
            $ds = $row1['delivery_status'];
            $rs = $row1['return_status'];


            if ( $pm == 'GCash') {
            echo '<span class="badge rounded-pill bg-primary">' .$row1['payment_method']. '</span>';

                if ( $os == 'Accepted.') {
                  echo '<span class="badge rounded-pill bg-success">Order Confirmed </span>';
                  } else {
                  echo '<span class="badge rounded-pill bg-warning">Status : Pending</span>';
                  }

                if ( $ps == 'Paid') {
                    echo '<span class="badge rounded-pill bg-success">Paid </span>';
                    } else {
                    echo '<span class="badge rounded-pill bg-warning">Payment: Pending </span>';
                    }

                if ( $ds == 'Completed') {
                    echo '<span class="badge rounded-pill bg-success">Order Completed </span>';
                    }elseif ( $ss == 'Shipped Out') {
                      echo '<span class="badge rounded-pill bg-warning">Shipped Out </span>';
                    } else {
                    echo '<span class="badge rounded-pill bg-warning">Pending Shipping</span>';
                    }

                if ( $rs == 'Returned') {
                  echo '<span class="badge rounded-pill bg-danger">Returned </span>';
                  }elseif ( $rs == 'Request') {
                    echo '<span class="badge rounded-pill bg-warning">Pending Return </span>';
                  }else {
                  echo '';
                  }
                }

                
                
            elseif ( $pm == 'Cash on Delivery') {
            echo '<span class="badge rounded-pill" style="background-color:#06afaf;">' .$row1['payment_method']. '</span>';

                if ( $os == 'Accepted') {
                  echo '<span class="badge rounded-pill bg-success">Order Confirmed </span>';
                  } else {
                  echo '<span class="badge rounded-pill bg-warning">Status : Pending</span>';
                  }

                if ( $ds == 'Completed') {
                  echo '<span class="badge rounded-pill bg-success">Order Completed </span>';
                  }elseif ( $ss == 'Shipped Out') {
                    echo '<span class="badge rounded-pill bg-warning">Shipped Out </span>';
                  } else {
                  echo '<span class="badge rounded-pill bg-warning">Pending Shipping</span>';
                  }
                
                if ( $rs == 'Returned') {
                  echo '<span class="badge rounded-pill bg-danger">Returned </span>';
                  }elseif ( $rs == 'Request') {
                    echo '<span class="badge rounded-pill bg-warning">Pending Return </span>';
                  }else {
                  echo '';
                  }
              
                  
            } else {
            echo '<span class="badge rounded-pill bg-info">' .$row1['payment_method']. '</span>';

                if ( $os == 'Accepted') {
                  echo '<span class="badge rounded-pill bg-success">Order Confirmed </span>';
                  } else {
                  echo '<span class="badge rounded-pill bg-warning">Status : Pending</span>';
                  }

                if ( $ds == 'Completed') {
                  echo '<span class="badge rounded-pill bg-success">Pickup </span>';
                  }elseif ( $ss == 'Pickup') {
                    echo '<span class="badge rounded-pill bg-warning">Ready to Pickup </span>';
                  } else {
                  echo '<span class="badge rounded-pill bg-warning">Preparing for Pickup</span>';
                  }

                if ( $rs == 'Returned') {
                  echo '<span class="badge rounded-pill bg-danger">Returned </span>';
                  }elseif ( $rs == 'Request') {
                    echo '<span class="badge rounded-pill bg-warning">Pending Return </span>';
                  }else {
                  echo '';
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
                                      
          $statement1->execute(array($row['id']));
          $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result1 as $row1) {
              
          ?>
          
          <table class="table table-borderless">
            <tbody>
            
              <tr>
              <?php
                  $rqty[$i] = $row1['quantity'];
                  $row_total_price = $row1['unit_price']*$row1['quantity'];

                  ?>
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
                  <?php echo '₱'.formatMoney ($row1['unit_price'], true); ?><br>

                </td>

              </tr>
              
            </tbody>

          <?php
        } 
      ?>  

            <tfoot>
              <tr class="fw-bold">
                <td colspan="2">TOTAL</td>
                
                <td class="text-end">
                  
                  <span class="small" >
                  <?php echo $row1['quantity']; ?> X <?php echo '₱'.formatMoney ($row1['unit_price'], true); ?></span>
                  
                  <?php echo '₱'.formatMoney ($row_total_price, true); ?>
                </td>
              </tr>
            </tfoot>
          </table>
      </div>
     </div>
    </div>
  </section> 
    
  <section class="content">
    <div class="container-login100">
        <div class="wrap-login100">

        <?php 
        // $rid = $row['reason_id'];
        // $rs = $row['return_status'];

            // if ( $rid == 0) {
              ?>

        <div class="content">
                                
                                <?php
                                if($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;margin-bottom:20px; '>".$error_message."</div>";
                                }
                                if($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;margin-bottom:20px; background: darkgreen;'>".$success_message."</div>";
                                }
                                ?>

      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <?php $csrf->echoInputField(); ?>
        <div class="user-details">

        <?php
                  $order_id = $_REQUEST['id'];
                  $product_id = $row1['product_id'];
                  $product_name = $row1['product_name'];
                  $color = $row1['color'];
                  $size = $row1['size'];
                  $qty = $rqty[$i];
                  $unit_price = $row1['unit_price'];
                  $refund_amount = $row1['unit_price']*$qty;

                  ?>
          
              <div class="input-box">
                <label for="reason_id" class="h5">Reason of Return/Refund *<h6> Choose reason of your return/refund.</h6>

                  <div class="wrap-input100 validate-input" >
                    <select name="reason_id" id="reason_id" class="form-control" style="width:250px;" value="<?php if(isset($_POST['reason_id'])){echo $_POST['reason_id'];} ?>">
                          
                      <!-- <option value="">Select Reason of Return</option> -->
                        <?php
                        $statement = $pdo->prepare("SELECT * FROM tbl_reason ORDER BY id ASC");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                        foreach ($result as $row) {
                            ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['reason']; ?></option>
                      <?php
                      }
                      ?>    
                    </select> 
                    <label for="notes" class="h5">GCash Number * </label>
                    <input class="form-control" id="gcash" type="number" name="gcash" style="width: 250px;" placeholder=" Enter Gcash Number" value="" /required>
                    <td colspan="2"><h6>Please double check your gcash number before your click the return/refund button.</h6>
                    
                    
                    <label for="qty" class="h5">Quantity * </label><input type="number" class="form-control" id="qty" name="qty" value="<?php echo $rqty[$i]; ?>" min="1" max="<?php echo $rqty[$i]; ?>" placeholder="" autocomplete="off" style="width: 75px; height:30px; padding-top:4px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required></input> <br>
                    <label for="notes" class="h5">Additional Information * </label>
                    <textarea class="form-control"  id="notes" name="notes" class="" cols="100%" rows="5" value="" placeholder="Notes to Seller"></textarea>
                    

                    <h4>Upload Proof Return/Refund</h4>
                    <div class="col-sm-12" style="padding: 10px 0;">
                      <input class="form-control" type="file" name="photo" id="formreceipt" style="width:370px;">
                    </div>

                  </div>
              </div>
            </div>
         <h6>Please check the details carefully before submitting the request for return/refund. We cannot proccess your request if you submit an invalid proof of your reason of return/refund.</h6>
         <p class="txt2"><a id="myBtn" style="color:#2196f3;">TERMS & CONDITIONS  </a></p>

            
            <div class="wrap-input100 validate-input" style="padding-top:10px;">
              <button class="btn btn-primary btn-s" type="submit" value="Return" name="form1" id="form1button">
                  Return/Refund
                </button><br>
            </div>
        </form>
          
      <?php 
        // }else{
          ?>
              <div class="col-lg-12">
        <!-- Details -->
      
      <div class="card mb-4">
        
        <!-- <div class="card-body">
            
          <div class="mb-3 d-flex justify-content-between">
                        <div class="col-lg-12">
                          <h3>Return Status :</h3>
                          <?php echo $rs; ?>
                         </a>
                        </div> -->
      <?php 
        // }
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
  formreceipt = $('#formreceipt').val();

        $('#form1button').prop("disabled", true);
        if ( formreceipt == '' ) {
              $('#form1button').prop("disabled", true);
        }
        $('#formreceipt').on('change',function() {
          formreceipt = $('#formreceipt').val();
            if ( formreceipt == '' ) {
            	$('#form1button').prop("disabled", true);
            }else {
                $('#form1button').prop("disabled", false);
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