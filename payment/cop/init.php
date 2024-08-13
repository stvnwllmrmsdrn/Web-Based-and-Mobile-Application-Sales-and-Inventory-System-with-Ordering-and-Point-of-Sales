<?php
ob_start();
session_start();
include("../../admin/inc/config.php");
include("../../admin/inc/functions.php");
// Getting all language variables into array as global variable
$i=1;
$statement = $pdo->prepare("SELECT * FROM tbl_language");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	define('LANG_VALUE_'.$i,$row['lang_value']);
	$i++;
}
?>
<?php
function formatMoney($number, $fractional=false) {
	if ($fractional) {
		$number = sprintf('%.2f', $number);
	}
	while (true) {
		$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
		if ($replaced != $number) {
			$number = $replaced;
		} else {
			break;
		}
	}
	return $number;
}

if( !isset($_REQUEST['msg']) ) {
	if(empty($_POST['transaction_info'])) {
		header('location: ../../checkout.php');
	} else {
		$payment_date = date('Y-m-d H:i:s');
	    $payment_id = time();

	    $statement = $pdo->prepare("INSERT INTO tbl_payment (   
	                            customer_id,
	                            customer_name,
	                            customer_email,
	                            payment_date,
	                            txnid, 
	                            paid_amount,
	                            card_number,
	                            card_cvv,
	                            card_month,
	                            card_year,
	                            bank_transaction_info,
	                            payment_method,
	                            order_status,
	                            payment_status,
	                            shipping_status,
								delivery_status,
								delivery_id,
	                            payment_id
	                        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	    $statement->execute(array(
	                            $_SESSION['customer']['cust_id'],
	                            $_SESSION['customer']['cust_name'],
	                            $_SESSION['customer']['cust_email'],
	                            $payment_date,
	                            '',
	                            $_POST['amount'],
	                            '', 
	                            '',
	                            '', 
	                            '',
	                            $_POST['transaction_info'],
	                            'Cash on Pickup',
	                            'Pending',
	                            'Cash on Pickup',
	                            'Pending',
								'Pending',
								"TRK$payment_id",
	                            $payment_id
	                        ));

	    $i=0;
	    foreach($_SESSION['cart_p_id'] as $key => $value) 
	    {
	        $i++;
	        $arr_cart_p_id[$i] = $value;
	    }

	    $i=0;
	    foreach($_SESSION['cart_p_name'] as $key => $value) 
	    {
	        $i++;
	        $arr_cart_p_name[$i] = $value;
	    }

	    $i=0;
	    foreach($_SESSION['cart_size_name'] as $key => $value) 
	    {
	        $i++;
	        $arr_cart_size_name[$i] = $value;
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
	    $statement = $pdo->prepare("SELECT * FROM tbl_product");
	    $statement->execute();
	    $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result as $row) {
	    	$i++;
	    	$arr_p_id[$i] = $row['p_id'];
	    	$arr_p_qty[$i] = $row['p_qty'];
	    }

	    for($i=1;$i<=count($arr_cart_p_name);$i++) {
	        $statement = $pdo->prepare("INSERT INTO tbl_order (
	                        product_id,
	                        product_name,
	                        size, 
	                        color,
	                        quantity, 
	                        unit_price, 
	                        payment_id
	                        ) 
	                        VALUES (?,?,?,?,?,?,?)");
	        $sql = $statement->execute(array(
	                        $arr_cart_p_id[$i],
	                        $arr_cart_p_name[$i],
	                        $arr_cart_size_name[$i],
	                        $arr_cart_color_name[$i],
	                        $arr_cart_p_qty[$i],
	                        $arr_cart_p_current_price[$i],
	                        $payment_id
	                    ));

	        // Update the stock
            for($j=1;$j<=count($arr_p_id);$j++)
            {
                if($arr_p_id[$j] == $arr_cart_p_id[$i]) 
                {
                    $current_qty = $arr_p_qty[$j];
                    break;
                }
            }
            // $final_quantity = $current_qty - $arr_cart_p_qty[$i];
            // $statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
            // $statement->execute(array($final_quantity,$arr_cart_p_id[$i]));
            
	    }
	    unset($_SESSION['cart_p_id']);
	    unset($_SESSION['cart_size_id']);
	    unset($_SESSION['cart_size_name']);
	    unset($_SESSION['cart_color_id']);
	    unset($_SESSION['cart_color_name']);
	    unset($_SESSION['cart_p_qty']);
	    unset($_SESSION['cart_p_current_price']);
	    unset($_SESSION['cart_p_name']);
	    unset($_SESSION['cart_p_featured_photo']);

        // Getting Customer Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
        $statement->execute(array($_SESSION['customer']['cust_id']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $cust_name = $row['cust_name'];
			$cust_cname = $row['cust_cname'];
            $cust_email = $row['cust_email'];
        }

        // Getting Admin Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $admin_email = $row['contact_email'];
        }
        
        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        	$logo = $row['logo'];
        	$favicon = $row['favicon'];
        	$contact_email = $row['contact_email'];
        	$contact_phone = $row['contact_phone'];
        	$meta_title_home = $row['meta_title_home'];
        	$meta_keyword_home = $row['meta_keyword_home'];
        	$meta_description_home = $row['meta_description_home'];
        	$before_head = $row['before_head'];
        	$after_body = $row['after_body'];
        }


        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
        $statement->execute(array($payment_id));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
        	
        	if($row['payment_method'] == 'PayPal'):
        		$payment_details = '
Transaction Id: '.$row['txnid'].'<br>
        		';
        	elseif($row['payment_method'] == 'Bank Deposit'):
				$payment_details = '
Transaction Details: <br>'.$row['bank_transaction_info'];
        	endif;

            $order_detail .= '
                                Customer Name: <b>'.$cust_name.' '.$cust_cname.' </b><br>
                                Customer Email:<b> '.$row['customer_email'].'</b><br><br>
                                Payment Method: <b>'.$row['payment_method'].'</b><br>
                                Payment Date: <b>'.date("l | F d, Y | h:i:s A", strtotime($row['payment_date'])).'</b><br>
                                Order Amount: <b>₱'.formatMoney ($row['paid_amount'], true).'</b><br><br>
                                
                                <h3>Order Status : </h3>
                                <table style="border-spacing:0px;background-color:#c8ecff;width: 100%;">
                                <tr>
                                <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><strong>Order Confirmation: <b> '.$row['order_status'].'</strong></p></td>
                                </tr>
                                </table>
            ';
        }

        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($payment_id));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $i++;
            $order_detail .= '
                                <div style="margin: 10px;padding-bottom:10px;">
                                <br><b><u> Item #'.$i.'</u></b><br>
                                <img src="https://standlyhardware.com/assets/uploads/product-featured-'.$row['product_id'].'.jpg" width="90" height="90" style="float:left;padding-right:10px;" >
                                <b>'.$row['product_name'].'</b><br>
                                Size:<b> '.$row['size'].'</b><br>
                                Color: <b>'.$row['color'].'</b><br>
                                Quantity:<b> '.$row['quantity'].'</b><br>
                                Unit Price:<b> ₱'.formatMoney ($row['unit_price'], true).'</b><br>
                                </div>
            ';
        }

        $statement = $pdo->prepare("INSERT INTO tbl_customer_message (order_detail,cust_id) VALUES (?,?)");
        $statement->execute(array($order_detail,$_SESSION['customer']['cust_id']));

        // sending email
        $subject = 'Standly Hardware || Order #'.$row['payment_id'].' Details';
        $to_customer = $cust_email;
        $message = '
                    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA">
                      <tr>
                       <td valign="top" style="padding:0;Margin:0">
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                          <tr>
                           <td align="center" style="padding:0;Margin:0">
                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                              <tr>
                               <td align="left" style="padding:0;Margin:0;padding-top:15px;padding-left:20px;padding-right:20px">
                                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                  <tr>
                                   <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                      <tr>
                                       <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;font-size:0px"><img src="https://standlyhardware.com/assets/uploads/logo.png" width="320" height="70"></td>
                                      </tr>
                                      <tr>
                                       <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:55px;mso-line-height-rule:exactly;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Thank you for your Order!</h1></td>
                                      </tr>
                                      <tr>
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$_SESSION['customer']['cust_name'].'</b>, Thanks for your order. </p></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Order Details: #'.$row['payment_id'].' </h3>
                                '.$order_detail.'
                                </td>
                                </table>
                              </tr>
                              <tr>
                               <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                  <tr>
                                   <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:5px" role="presentation">
                                     
                                      <tr>
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
                                           <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Got a question? Email us at '. $admin_email .' or give us a call at '. $contact_phone .' </a>.</p>
                                           <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px"><br>Thanks,</p>
                                           <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px">Standly Hardware Admin</p>
                                       </td>
                                      </tr>
                                    </table>
                                    </td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        
                      </tr>
                    </table>
            </div>
            
';
        $headers = "From: Standly Hardware ". $admin_email . "\r\n" .
                   "Reply-To: Standly Hardware ". $admin_email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Sending email to admin                  
        mail($to_customer, $subject, $message, $headers);
        
        $success_message = 'Your email to customer is sent successfully.';
        
	    header('location: ../../payment_success.php');
	}
}
?>