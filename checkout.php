<?php require_once('head.php'); ?>
<?php require_once('sidebar1.php'); ?>
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
    <link rel="stylesheet" href="./main.css">

    <?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_checkout = $row['banner_checkout'];
}

$ts1 = time();
$ts2 = strtotime($current_date_time);
?>

<title> <?php echo $meta_keyword_home; ?> | Checkout </title>

<?php
if(!isset($_SESSION['cart_p_id'])) {
    header('location: cart.php');
    exit;
}
?>
 </div>
</div>
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $banner_checkout; ?>)">
    <div class="page-banner-inner">
        <h1><?php echo LANG_VALUE_22; ?></h1>
    </div>
</div>
<div class="container-fluid">
<div class="page" >
    <div class="container">
            
                
                <?php if(!isset($_SESSION['customer'])): ?>
                    <p>
                        <a href="login.php" class="btn btn-md btn-danger"><?php echo LANG_VALUE_160; ?></a>
                    </p>
                <?php else: ?>

                <h3 class="special"><?php echo LANG_VALUE_26; ?></h3>
                     
                         <?php
                        $table_total_price = 0;

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
                        foreach($_SESSION['cart_size_name'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_size_name[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['cart_color_id'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_color_id[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['cart_color_name'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_color_name[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['cart_p_qty'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_qty[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['cart_p_current_price'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_current_price[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['cart_p_name'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_name[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['cart_p_featured_photo'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_featured_photo[$i] = $value;
                        }
                        ?>
                        
                        
                   

                

                

                


  <!-- Title -->
  <div class="d-flex justify-content-between align-items-center py-3">
    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #<?php echo $ts1; ?></h2>
  </div>

  <!-- Main content -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
              <span class="me-3" style="display: contents!important;"><?php echo date("l | m-d-Y | h:i:s A", strtotime ($current_date_time)); ?></span>
              <span class="me-3" style="display: contents!important;">#<?php echo $ts1; ?></span>
              <span class="badge rounded-pill bg-info" id="cod_tag">SHIPPING</span>
              <span class="badge rounded-pill bg-info" id="cop_tag">Cash on Pickup</span>
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
          <table class="table table-borderless">
            <tbody>
            <?php for($i=1;$i<=count($arr_cart_p_id);$i++): ?>
              <tr>
                <td>
                  <div class="d-flex mb-2">
                    <div class="flex-shrink-0">
                    <img src="assets/uploads/<?php echo $arr_cart_p_featured_photo[$i]; ?>" alt="" width="80" class="img-fluid">
                    </div>
                    <div class="flex-lg-grow-1 ms-3">
                      <h6 class="small mb-0"><a href="#" class="text-reset"><?php echo $arr_cart_p_name[$i]; ?></a></h6>
                      <span class="small"><?php echo $arr_cart_size_name[$i]; ?> - <?php echo $arr_cart_color_name[$i]; ?></span>
                    </div>
                  </div>
                </td>
                <td><?php echo $arr_cart_p_qty[$i]; ?></td>
                    <?php
                    $row_total_price = $arr_cart_p_current_price[$i]*$arr_cart_p_qty[$i];
                    $table_total_price = $table_total_price + $row_total_price;
                    ?>
                <td class="text-end">₱<?php echo formatMoney ($row_total_price, true); ?></td>
              </tr>
              <?php endfor; ?> 
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2">Subtotal</td>
                <td class="text-end">₱<?php echo formatMoney ($table_total_price, true); ?></td>
              </tr>
              <tr id="shipping_cost">
                  <?php
							$i=0;
							$statement = $pdo->prepare("SELECT * 
														FROM tbl_customer t1
														JOIN tbl_country t2
														ON t1.cust_country = t2.country_id
														JOIN tbl_city t3
														ON t1.cust_s_city = t3.city_id
														JOIN tbl_state t4
														ON t1.cust_s_state = t4.state_id
                            
													");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
                <?php
                }
                ?>
                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost WHERE city_id=?");
                    $statement->execute(array($_SESSION['customer']['cust_s_city']));
                    $total = $statement->rowCount();
                    if($total) {
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            $shipping_cost = $row['amount'];
                        }
                    } else {
                        $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost_all WHERE sca_id=1");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            $shipping_cost = $row['amount'];
                        }
                    }  
                    ?>     
                <td colspan="2">Shipping Fee</td>
                <td class="text-end">₱<?php echo formatMoney ($shipping_cost, true); ?></td>
              </tr>
              <tr class="fw-bold">
                <td colspan="2">TOTAL</td>
                    <?php
                    $final_total = $table_total_price+$shipping_cost;
                    ?>
                <td class="text-end" id="total"> ₱<?php echo formatMoney ($final_total, true); ?></td>
                <td class="text-end" id="total_cop"> ₱<?php echo formatMoney ($table_total_price, true); ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- Payment -->
      <div class="card mb-4" id="shipping_info">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="h6">Payment Method</h3>

                <div class="flex-shrink-0" id="gcash_logo" style="display: inline-flex;align-items: center">
                  <img src="assets/img/icons/gcash.gif" alt="" width="60" class="img-fluid"><h4 style="padding-left:10px;"><strong>Gcash Payment</strong></h4>
                </div>

                <div class="flex-shrink-0" id="cod_logo" style="display: inline-flex;align-items: center">
                  <img src="assets/img/icons/cod.png" alt="" width="40" class="img-fluid"><h4 style="padding-left:10px;"><strong>Cash on Delivery</strong></h4>
                </div>

                <div class="flex-shrink-0" id="cod_logo" style="display: inline-flex;align-items: center">
                  <img src="assets/img/icons/peso.gif" alt="" width="40" class="img-fluid">
                  <p style="padding-left:14px;"><h4><strong>Total:  ₱<?php echo formatMoney ($final_total, true); ?> </strong><span class="badge bg-success rounded-pill">PENDING</span></h4></p>
                </div>
            </div>
            <div class="col-lg-6">
              <h3 class="h6">Billing Address</h3>
              <address>
                <?php
							$i=0;
							$statement = $pdo->prepare("SELECT * 
														FROM tbl_customer t1
														JOIN tbl_country t2
														ON t1.cust_country = t2.country_id
														JOIN tbl_city t3
														ON t1.cust_b_city = t3.city_id
														JOIN tbl_state t5
														ON t1.cust_b_state = t5.state_id

                            WHERE cust_id=?
                            
													");
							$statement->execute(array($_SESSION['customer']['cust_id']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
                <?php
                }
                ?>
                <strong><?php echo $_SESSION['customer']['cust_b_name']; ?></strong><br>
                <?php echo nl2br($_SESSION['customer']['cust_b_address']); ?><br>
                <?php echo $row['city_name']; ?>, <?php echo $row['state_name']; ?>, <?php echo $row['country_name']; ?>  <?php echo $_SESSION['customer']['cust_b_zip']; ?><br>
                Contact: <?php echo $_SESSION['customer']['cust_b_phone']; ?>
              </address>
            </div>
          </div>
        </div>
      </div>
      <!-- Shipping -->
      <div class="card mb-4" id="billing_info">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="h6">Shipping Information</h3>
                <strong>Standly Hardware Delivery</strong><br>
                  <div class="flex-shrink-0" id="cod_logo" style="display: inline-flex;align-items: center">
                    <img src="assets/img/icons/truck.gif" alt="" width="40" class="img-fluid"><h4 class="text-decoration-underline" style="padding-left:10px;"><strong>TRK<?php echo $ts2; ?></strong></h4>
                  </div>
                <hr>
            </div>
            <div class="col-lg-6">
              <h3 class="h6">Shipping Address</h3>
              <address>
              <?php
							$i=0;
							$statement = $pdo->prepare("SELECT * 
														FROM tbl_customer t1
														JOIN tbl_country t2
														ON t1.cust_country = t2.country_id
														JOIN tbl_city t3
														ON t1.cust_s_city = t3.city_id
														JOIN tbl_state t4
														ON t1.cust_s_state = t4.state_id
                            
                            WHERE cust_id=?
													");
							$statement->execute(array($_SESSION['customer']['cust_id']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
                <?php
                }
                ?>
                <strong><?php echo $_SESSION['customer']['cust_s_name']; ?></strong><br>
                <?php echo nl2br($_SESSION['customer']['cust_s_address']); ?><br>
                <?php echo $row['city_name']; ?>, <?php echo $row['state_name']; ?>, <?php echo $row['country_name']; ?>  <?php echo $_SESSION['customer']['cust_s_zip']; ?><br>
                Contact: <?php echo $_SESSION['customer']['cust_s_phone']; ?>
              </address>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div class="col-lg-4">
      <!-- Customer Notes -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6">Store Notes</h3>
          <textarea class="form-control" style="border-radius:15px;background-color: #d9edff;" cols="30" rows="3" disabled>Hello <?php echo ($_SESSION['customer']['cust_b_name']); ?>, Please double check your order before you place it. Thank you!</textarea>

        </div>
      </div>
    <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6"><?php echo LANG_VALUE_33; ?></h3>
          <div class="row">
          <?php
		                $checkout_access = 1;
		                if(
		                    ($_SESSION['customer']['cust_b_name']=='') ||
		                    ($_SESSION['customer']['cust_b_cname']=='') ||
		                    ($_SESSION['customer']['cust_b_phone']=='') ||
		                    ($_SESSION['customer']['cust_b_country']=='') ||
		                    ($_SESSION['customer']['cust_b_address']=='') ||
		                    ($_SESSION['customer']['cust_b_city']=='') ||
		                    ($_SESSION['customer']['cust_b_state']=='') ||
		                    ($_SESSION['customer']['cust_b_zip']=='') ||
		                    ($_SESSION['customer']['cust_s_name']=='') ||
		                    ($_SESSION['customer']['cust_s_cname']=='') ||
		                    ($_SESSION['customer']['cust_s_phone']=='') ||
		                    ($_SESSION['customer']['cust_s_country']=='') ||
		                    ($_SESSION['customer']['cust_s_address']=='') ||
		                    ($_SESSION['customer']['cust_s_city']=='') ||
		                    ($_SESSION['customer']['cust_s_state']=='') ||
		                    ($_SESSION['customer']['cust_s_zip']=='')
		                ) {
		                    $checkout_access = 0;
		                }
		                ?>
                    <?php if($checkout_access == 0): ?>
		                	<div class="col-md-12">
				                <div style="color:red;font-size:22px;margin-bottom:50px;">
			                        You must have to fill up all the billing and shipping information from your dashboard panel in order to checkout the order. Please fill up the information going to <a href="customer-billing-shipping-update.php" style="color:red;text-decoration:underline;">this link</a>.
			                    </div>
	                    	</div>
	                	<?php else: ?>
		                	<div class="col-md-12">
		                		
	                            <div class="row">

	                                <div class="col-md-12 form-group">
	                                    <label for=""><?php echo LANG_VALUE_34; ?> *</label>
	                                    <select name="payment_method" class="form-control select2" id="advFieldsStatus">
                                            <option value="cod">Cash on Delivery</option>
                                            <option value="cop">Cash on Pickup</option>
	                                          <option value="Bank Deposit">Gcash</option>
                                            
	                                    </select>
	                                </div>

                                    <form action="payment/cod/init.php" method="post" id="cod_form">
                                        <input type="hidden" name="amount" value="<?php echo $final_total; ?>">
                                       
                                        <div class="col-md-12 form-group" display="hidden">
                                            <label for="">Notes to seller <br></label>
                                            <textarea name="transaction_info" type="hidden" class="form-control" style="border-radius:15px;" cols="30" rows="5" value="Please be careful with the product" placeholder="Hello <?php echo ($_SESSION['customer']['cust_b_name']); ?>, enter your message to the seller.">Please be careful to my order. Thank you!</textarea>
                                            <br><span style="font-size:14px;font-weight:normal;">(Click Place order to process the order)</span>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="submit" class="btn btn-primary" value="Place Order" name="form3">
                                        </div>
                                    </form>
                                    
                                    <form action="payment/cop/init.php" method="post" id="cop_form">
                                        <input type="hidden" name="amount" value="<?php echo $table_total_price; ?>">
                                       
                                        <div class="col-md-12 form-group" display="hidden">
                                            <label for="">Notes to seller <br></label>
                                            <textarea name="transaction_info" type="hidden" class="form-control" style="border-radius:15px;" cols="30" rows="5" value="Total : <?php echo $table_total_price; ?> " placeholder="Hello <?php echo ($_SESSION['customer']['cust_b_name']); ?>, enter your message to the seller.">Please be careful to my order. Thank you!</textarea>
                                            <br><span style="font-size:14px;font-weight:normal;">(Click Place order to process the order)</span>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="submit" class="btn btn-primary" value="Place Order" name="form3">
                                        </div>
                                    </form>

                                    <form class="paypal" action="<?php echo BASE_URL; ?>payment/paypal/payment_process.php" method="post" id="paypal_form" target="_blank">
                                        <input type="hidden" name="cmd" value="_xclick" />
                                        <input type="hidden" name="no_note" value="1" />
                                        <input type="hidden" name="lc" value="UK" />
                                        <input type="hidden" name="currency_code" value="USD" />
                                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

                                        <input type="hidden" name="final_total" value="<?php echo $final_total; ?>">
                                        <div class="col-md-12 form-group">
                                            <input type="submit" class="btn btn-primary" value="<?php echo LANG_VALUE_46; ?>" name="form1">
                                        </div>
                                    </form>

                                    <form action="payment/bank/init.php" method="post" id="bank_form">
                                        <input type="hidden" name="amount" value="<?php echo $final_total; ?>">
                                        <!-- <img src="gcash1.png" style="width:100%;"> -->
                                        <div class="col-md-12 form-group" display="hidden">
                                            <label for="">Notes to seller <br></label>
                                            <textarea name="transaction_info" type="hidden" class="form-control" style="border-radius:15px;" cols="30" rows="5" value="Total : <?php echo $table_total_price; ?> " placeholder="Hello <?php echo ($_SESSION['customer']['cust_b_name']); ?>, enter your message to the seller.">Please be careful to my order. Thank you!</textarea>
                                            <br><span style="font-size:14px;font-weight:normal;">(Click Place order to process the order)</span>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="submit" class="btn btn-primary" value="Place Order" name="form3">
                                        </div>
                                    </form>
	                                
	                            </div>
		                            
		                        
		                    </div>
		                <?php endif; ?>
                        
                </div>
                

                <?php endif; ?>
        </div>
      </div>
    </div>




                
                


            </div><div class="cart-buttons">
                    <ul>
                        <a href="cart.php" class="btn btn-danger">Cancel Checkout</a>
                    </ul>
                </div>  
        </div>
    </div>
</div>





<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $stripe_public_key = $row['stripe_public_key'];
    $stripe_secret_key = $row['stripe_secret_key'];
}
?>

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
<script>
	function confirmDelete()
	{
	    return confirm("Sure you want to delete this data?");
	}
	$(document).ready(function () {
		advFieldsStatus = $('#advFieldsStatus').val();

        $('#paypal_form').hide();
        $('#stripe_form').hide();
        $('#bank_form').hide();
        $('#cod_form');
        $('#cop_form').hide();
        // $('#ship').hide();
        $('#total').show();
        $('#total_cop').hide();
        $('#cod_tag').show();
        $('#cop_tag').hide();
        $('#cod_logo').show();
        $('#gcash_logo').hide();

        $('#advFieldsStatus').on('change',function() {
            advFieldsStatus = $('#advFieldsStatus').val();
            if ( advFieldsStatus == '' ) {
            	$('#paypal_form').hide();
              $('#stripe_form').hide();
              $('#bank_form').hide();
              $('#cod_form').hide();
              $('#cop_form').hide();
              $('#cod_tag').show();
              $('#cop_tag').hide();
            } else if ( advFieldsStatus == 'PayPal' ) {
              $('#paypal_form').show();
              $('#stripe_form').hide();
              $('#bank_form').hide();
              $('#cod_form').hide();
              $('#cop_form').hide();
            } else if ( advFieldsStatus == 'Stripe' ) {
              $('#paypal_form').hide();
              $('#stripe_form').show();
              $('#bank_form').hide();
              $('#cod_form').hide();
              $('#cop_form').hide();
            } else if ( advFieldsStatus == 'Bank Deposit' ) {
            	$('#paypal_form').hide();
              $('#stripe_form').hide();
              $('#bank_form').show();
              $('#cod_form').hide();
              $('#cop_form').hide();
              $('#shipping_cost').show();
              $('#shipping_info').show();
              $('#billing_info').show();
              $('#total_cop').hide();
              $('#total').show();
              $('#cod_tag').show();
              $('#cop_tag').hide();
              $('#cod_logo').hide();
              $('#gcash_logo').show();
            }else if ( advFieldsStatus == 'cod' ) {
            	$('#paypal_form').hide();
              $('#stripe_form').hide();
              $('#bank_form').hide();
              $('#cod_form').show();
              $('#cop_form').hide();
              $('#shipping_cost').show();
              $('#shipping_info').show();
              $('#billing_info').show();
              $('#total_cop').hide();
              $('#total').show();
              $('#cod_tag').show();
              $('#cop_tag').hide();
              $('#cod_logo').show();
        $('#gcash_logo').hide();
            }else if ( advFieldsStatus == 'cop' ) {
              $('#paypal_form').hide();
              $('#shipping_cost').hide();
              $('#shipping_info').hide();
              $('#billing_info').hide();
              $('#stripe_form').hide();
              $('#bank_form').hide();
              $('#cod_form').hide();
              $('#cop_form').show();
              $('#total').hide();
              $('#total_cop').show();
              $('#cop_tag').show();
              $('#cod_tag').hide();
            }
        });
	});


	$(document).on('submit', '#stripe_form', function () {
        // createToken returns immediately - the supplied callback submits the form if there are no errors
        $('#submit-button').prop("disabled", true);
        $("#msg-container").hide();
        Stripe.card.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
            // name: $('.card-holder-name').val()
        }, stripeResponseHandler);
        return false;
    });
    Stripe.setPublishableKey('<?php echo $stripe_public_key; ?>');
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#submit-button').prop("disabled", false);
            $("#msg-container").html('<div style="color: red;border: 1px solid;margin: 10px 0px;padding: 5px;"><strong>Error:</strong> ' + response.error.message + '</div>');
            $("#msg-container").show();
        } else {
            var form$ = $("#stripe_form");
            var token = response['id'];
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            form$.get(0).submit();
        }
    }
</script>
</body>
</html>
    

<?php require_once('footermain.php'); ?>