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
if(!isset($_REQUEST['payment_id'])) {
    header('location: customer-order-delivered.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
    $statement->execute(array($_REQUEST['payment_id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: customer-order-delivered.php');
        exit;
    }
}

foreach($result as $row) {
  $id = $row['id'];
  $photo = $row['photo'];
  $payment_id = $row['payment_id'];
}
?>

<?php
if (isset($_POST['form1'])) {


    if(empty($_POST['reason_id'])) {
      $valid = 0;
      $error_message .= LANG_VALUE_123."<br>";
    }

        $statement = $pdo->prepare("UPDATE tbl_payment SET reason_id=? WHERE payment_id=?");

        $statement->execute(array(
          strip_tags($_POST['reason_id']),
          $_REQUEST['payment_id']
          ));  

          ?>

          <script>
            window.location.href = "./return-change-status.php?id=<?php echo $row['id']; ?>&task=Request";
        </script>
          <?php
          
    


    
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
                        <li class="h3 mb-0" >Return Item</li>


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
              <span class="me-3" style="display: contents!important;"><?php echo $row['payment_date']; ?></span>

              <?php

            $os = $row['order_status'];
            $pm = $row['payment_method'];
            $ps = $row['payment_status'];
            $ss = $row['shipping_status'];
            $ds = $row['delivery_status'];
            $rs = $row['return_status'];


            if ( $pm == 'GCash') {
            echo '<span class="badge rounded-pill bg-primary">' .$row['payment_method']. '</span>';

                if ( $os == 'Accepted.') {
                  echo '<span class="badge rounded-pill bg-success">Accepted </span>';
                  } else {
                  echo '<span class="badge rounded-pill bg-warning">Status : Pending</span>';
                  }

                if ( $ps == 'Paid') {
                    echo '<span class="badge rounded-pill bg-success">Paid </span>';
                    } else {
                    echo '<span class="badge rounded-pill bg-warning">Payment: Pending </span>';
                    }

                if ( $ds == 'Completed') {
                    echo '<span class="badge rounded-pill bg-success">Delivered </span>';
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
            echo '<span class="badge rounded-pill" style="background-color:#06afaf;">' .$row['payment_method']. '</span>';

                if ( $os == 'Accepted') {
                  echo '<span class="badge rounded-pill bg-success">Accepted </span>';
                  } else {
                  echo '<span class="badge rounded-pill bg-warning">Status : Pending</span>';
                  }

                if ( $ds == 'Completed') {
                  echo '<span class="badge rounded-pill bg-success">Delivered </span>';
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
            echo '<span class="badge rounded-pill bg-info">' .$row['payment_method']. '</span>';

                if ( $os == 'Accepted') {
                  echo '<span class="badge rounded-pill bg-success">Accepted </span>';
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
    </div>
  </section> 
    
  <section class="content">
    <div class="container-login100">
        <div class="wrap-login100">

        <?php 
        $rid = $row['reason_id'];
        $rs = $row['return_status'];

            if ( $rid == 0) {
              ?>

        <div class="content">
                                
                                <?php
                                if($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;margin-bottom:20px; background: red;'>".$error_message."</div>";
                                }
                                if($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;margin-bottom:20px; background: darkgreen;'>".$success_message."</div>";
                                }
                                ?>

      <form action="" method="post">
      <?php $csrf->echoInputField(); ?>
        <div class="user-details">

          
              <div class="input-box">
                <label for="" class="txt2">Reason of Return * </label>
                  <div class="wrap-input100 validate-input" >
                    <select name="reason_id" class="input100" value="<?php if(isset($_POST['reason_id'])){echo $_POST['reason_id'];} ?>">
                          
                      <option value="">Select Reason of Return</option>
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
                  </div>
              </div>
            </div>
            
            <div class="wrap-input100 validate-input" style="padding-top:10px;">
              <button class="btn btn-primary btn-s" type="submit" value="Return" name="form1">
                  Return Item
                </button><br>
            </div>
          
      <?php 
        }else{
          ?>
              <div class="col-lg-12">
        <!-- Details -->
      
      <div class="card mb-4">
        
        <div class="card-body">
            
          <div class="mb-3 d-flex justify-content-between">
                        <div class="col-lg-12">
                          <h3>Return Status :</h3>
                          <?php echo $rs; ?>
                         </a>
                        </div>
      <?php 
        }
          ?>

  </section> 
    
        
</body>
</html>
    
        </div> 
      </div>   
    </div>   
  </div> 
<?php require_once('footermain.php'); ?>