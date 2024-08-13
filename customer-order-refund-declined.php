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
if(!isset($_REQUEST['id'])) {
    header('location: customer-order-return.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: customer-order-return.php');
        exit;
    }
}

foreach($result as $row) {
  $id = $row['id'];
  $reason_id = $row['reason_id'];
  $quantity = $row['quantity'];
  $notes = $row['notes'];
  $gcash_no = $row['gcash_no'];
  $photo = $row['photo'];
  $attempt = $row['attempt'];
  $total_attempt = 3 - $attempt;
  $add_attempt = $row['attempt'] + 1;
}
?>

<?php

  if (isset($_POST['form1'])) {

	  $valid = 1;
    
    $refund_date = date('Y-m-d H:i:s');




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
      $final_name = 'refund'.$id.'.'.$ext;
        move_uploaded_file( $path_tmp, 'assets/uploads/refund_proof/'.$final_name );
        $_FILES['photo'] = $final_name;

        // updating the database
      $statement = $pdo->prepare("UPDATE tbl_refund_order SET photo=? WHERE id=?");
      $statement->execute(array($final_name,$id));

        $success_message = 'User Photo is updated successfully.';

        header('location: customer-order-return.php');
    
  
  

      //Saving data into the main table tbl_product
      $statement = $pdo->prepare("UPDATE tbl_refund_order SET
                                status=?,
                                notes=?,
                                gcash_no=?,
                                reason_id=?,
                                attempt=?,
                                refund_date=?
                                WHERE id=?");
      $statement->execute(array(
                                'Pending',
                                $_POST['notes'],
                                $_POST['gcash'],
                                $_POST['reason_id'],
                                $add_attempt,
                                $refund_date,
                                $id
                              ));

    }
  }

?>

 </div>
</div>
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
                <div class="inner">
                    <h1>Refund Item</h1>
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
                        <li class="h3 mb-0" >Refund Item</li>


                    </ul>
                  <div>
        </div>

        <?php
           
            $adjacents = 5;
          ?>

<div class="row">
  
    <div class="d-flex justify-content-between align-items-center py-3">
      <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Refund ID: <?php echo $row['refund_id']; ?></h2>
    </div>

      <div class="col-lg-12">
        <!-- Details -->
      
      <div class="card mb-4">
        
        <div class="card-body">
            
          <div class="mb-3 d-flex justify-content-between">
            
            <div>
            <span class="me-3" style="display: contents!important;"><?php $wop = $row['refund_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?></span>
            
            <?php

            $os = $row['status'];
            $ss = $row['shipping_status'];
            $rs = $row['receive_status'];
            $rr = $row['refund_status'];
            $at = $row['attempt'];

            if ( $os == 'Pending') {
              echo '<span class="badge rounded-pill bg-warning">Request Refund</span>';
              }elseif ( $os == 'Declined'){
              echo '<span class="badge rounded-pill bg-danger">Request Declined</span>';
              }else {
              echo '<span class="badge rounded-pill bg-success">Request Accepted</span>';
              }
            if ( $ss == 'Pending') {
              echo '<span class="badge rounded-pill bg-warning">Pending Shipping</span>';
              }else {
              echo '<span class="badge rounded-pill bg-success">Shipped Out</span>';
              }
            if ( $rs == 'Pending') {
              echo '<span class="badge rounded-pill bg-warning">Pending Deliver</span>';
              }else {
              echo '<span class="badge rounded-pill bg-success">Received</span>';
              }
            if ( $rr == 'Pending') {
              echo '<span class="badge rounded-pill bg-warning">Pending Refund</span>';
              }else {
              echo '<span class="badge rounded-pill bg-success">Completed</span>';
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

                                      t2.p_id,
                                      t2.p_name,
                                      t2.p_featured_photo

                                      FROM tbl_refund_order t1
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

        <!-- request details -->

     <table class="table table-borderless">
        <tbody>
          <div>
            <tr>
              <?php
                  $rqty[$i] = $row1['quantity'];
                  $row_total_price = $row1['unit_price']*$row1['quantity'];

                  ?>
                <td >
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <?php $csrf->echoInputField(); ?>
        <div class="user-details">
          
              <div class="input-box">
                <label for="reason_id" class="h5">Reason of Return * </label>

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
                    <label for="notes" class="h5">GCash No. * </label>
                    <input id ="gcash" class="form-control" type="text" name="gcash" style="width: 250px;" placeholder=" Enter Gcash Number" value="<?php echo $gcash_no; ?>" >
                   
                    <label for="qty" class="h5">Quantity * </label><input type="number" class="form-control" id="qty" name="qty" value="<?php echo $quantity; ?>" min="1" max="<?php echo $rqty[$i]; ?>" placeholder="" autocomplete="off" style="width: 75px; height:30px; padding-top:4px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" disabled></input>
                    <label for="notes" class="h5">Additional Information * </label>
                    <textarea name="notes" id="notes" class="form-control" cols="100%" rows="5" value=""><?php echo $notes; ?></textarea>
                    
                    

                    <h4>Upload Proof Return</h4>
                    <div class="col-sm-12" style="padding: 10px 0;">
                      <input class="form-control" type="file" name="photo" id="formreceipt" style="width:370px;">
                    </div>

                  </div>
              </div>
            </div>
            
            
                </td>

              </tr>
              
            </tbody>


            <tfoot>
              <tr class="fw-bold">
                <td colspan="2"><h6>You are now have <b> <?php echo $total_attempt; ?> </b>  available ATTEMPT to request for <b> REFUND</b>. Please check the details carefully before submitting the request. If you reach the limit of attempt, your request is no longer be able to process.</h6>
                <div class="wrap-input100 validate-input" style="padding-top:10px;">
                
              <button class="btn btn-primary btn-s" type="submit" value="Return" name="form1" id="form1button">
                  Refund
                </button><br>
            </div>
        </form>
                </td>
                
              
              </tr>
            </tfoot>
            
          </table>

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
<?php require_once('footermain.php'); ?>