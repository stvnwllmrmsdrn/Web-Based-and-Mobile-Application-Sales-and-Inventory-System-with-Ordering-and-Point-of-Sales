<?php require_once('header.php'); ?>

<?php
$error_message = '';
if(isset($_POST['form1'])) {
    $valid = 1;
    if(empty($_POST['subject_text'])) {
        $valid = 0;
        $error_message .= 'Subject can not be empty\n';
    }
    if(empty($_POST['message_text'])) {
        $valid = 0;
        $error_message .= 'Subject can not be empty\n';
    }
    if($valid == 1) {

        $subject_text = strip_tags($_POST['subject_text']);
        $message_text = strip_tags($_POST['message_text']);

        // Getting Customer Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
        $statement->execute(array($_POST['cust_id']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $cust_email = $row['cust_email'];
        }

        // Getting Admin Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $admin_email = $row['contact_email'];
        }

        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
        $statement->execute(array($_POST['payment_id']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
        	
        	if($row['payment_method'] == 'PayPal'):
        		$payment_details = '
Transaction Id: '.$row['txnid'].'<br>
        		';
        	elseif($row['payment_method'] == 'Stripe'):
				$payment_details = '
Transaction Id: '.$row['txnid'].'<br>
Card number: '.$row['card_number'].'<br>
Card CVV: '.$row['card_cvv'].'<br>
Card Month: '.$row['card_month'].'<br>
Card Year: '.$row['card_year'].'<br>
        		';
        	elseif($row['payment_method'] == 'Bank Deposit'):
				$payment_details = '
Transaction Details: <br>'.$row['bank_transaction_info'];
        	endif;

            $order_detail .= '
Customer Name: '.$row['customer_name'].'<br>
Customer Email: '.$row['customer_email'].'<br>
Payment Method: '.$row['payment_method'].'<br>
Payment Date: '.$row['payment_date'].'<br>
Payment Details: <br>'.$payment_details.'<br>
Paid Amount: '.$row['paid_amount'].'<br>
Payment Status: '.$row['payment_status'].'<br>
Shipping Status: '.$row['shipping_status'].'<br>
Payment Id: '.$row['payment_id'].'<br>
            ';
        }

        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($_POST['payment_id']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $i++;
            $order_detail .= '
<br><b><u>Product Item '.$i.'</u></b><br>
Product Name: '.$row['product_name'].'<br>
Size: '.$row['size'].'<br>
Color: '.$row['color'].'<br>
Quantity: '.$row['quantity'].'<br>
Unit Price: '.$row['unit_price'].'<br>
            ';
        }

        $statement = $pdo->prepare("INSERT INTO tbl_customer_message (subject,message,order_detail,cust_id) VALUES (?,?,?,?)");
        $statement->execute(array($subject_text,$message_text,$order_detail,$_POST['cust_id']));

        // sending email
        $to_customer = $cust_email;
        $message = '
<html><body>
<h3>Message: </h3>
'.$message_text.'
<h3>Order Details: </h3>
'.$order_detail.'
</body></html>
';
        $headers = 'From: ' . $admin_email . "\r\n" .
                   'Reply-To: ' . $admin_email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Sending email to admin                  
        mail($to_customer, $subject_text, $message, $headers);
        
        $success_message = 'Your email to customer is sent successfully.';
        header("Refresh:0");

    }
}

if(isset($_POST['form2'])) {
	$valid = 1;

    $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE id=?");
        $statement->execute(array($_POST['ID']));
        $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2 as $row2) {
            $total_attempt = $row2['attempt'];
        }

    $total_attempt = $row2['attempt'] + 1;

    if($valid == 1) {
    
        
    
    	$statement = $pdo->prepare("UPDATE tbl_refund_order SET 
    	seller_notes='".$_POST['seller_notes']."',
        status='Declined'
    	WHERE id='".$_POST['ID']."'");
    	$statement->execute();
    	$success_message = 'Delivery Receipt is added successfully uploaded!';
        header("Refresh:0");
    	
        //Getting Customer Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
        $statement->execute(array($_POST['cust_id']));
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
            $contact_phone = $row['contact_phone'];
        }
        
        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE id=?");
        $statement->execute(array($_POST['ID']));
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
                                Customer Email:<b> '.$cust_email.'</b><br><br>
                                Refund Date: <b>'.date("l | F d, Y | h:i:s A", strtotime($row['refund_date'])).'</b><br>                            
                                Refund Amount:<b> ₱'.formatMoney ($row['refund_amount'], true).'</b><br>   
                                <h3>Refund Status : </h3>
                                Refund Confirmation: <b>'.$row['status'].'</b><br>
                                
                            ';
        
            $order_detail .= '
                <div style="margin: 10px;padding-bottom:10px;"><br>
                                <img src="https://standlyhardware.com/assets/uploads/product-featured-'.$row['product_id'].'.jpg" width="90" height="90" style="float:left;padding-right:10px;" >
                                <b>'.$row['product_name'].'</b><br>
                                Size:<b> '.$row['size'].'</b><br>
                                Color: <b>'.$row['color'].'</b><br>
                                Quantity:<b> '.$row['quantity'].'</b><br>
                                Unit Price:<b> ₱'.formatMoney ($row['unit_price'], true).'</b><br>
                                
                                
                                </div>
            ';
        }
        // sending email
        $to_customer = $cust_email;
        $subject = 'Standly Hardware || Refund Request #'.$row['refund_id'].' Declined ';
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
                                       <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:55px;mso-line-height-rule:exactly;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Refund Request Declined!</h1></td>
                                      </tr>
                                      <tr>
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello '.$cust_name.', Your Refund Request #'.$row['refund_id'].' has been Declined.  <br></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Refund: #'.$row['refund_id'].' Details: </h3>
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
</div>';
        $headers = "From: Standly Hardware ". $admin_email . "\r\n" .
                  "Reply-To: Standly Hardware ". $admin_email . "\r\n" .
                  'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                  "MIME-Version: 1.0\r\n" . 
                  "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Sending email to admin                  
        mail($to_customer, $subject, $message, $headers);
        header("Refresh:0");
        $success_message = 'Your email to customer is sent successfully.';
    } 
}  

if(isset($_POST['form3'])) {
	$valid = 1;

    // $statement = $pdo->prepare("SELECT * FROM tbl_salesoverall WHERE order_id=?");
    // $statement->execute(array($_POST['Order_ID']));
    // $result3 = $statement->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($result3 as $row3) {
        
    //     $profit = $row3['profit'];
    //     $amount = $row3['total_amount'];
    //     $order_quantity = $row3['quantity'];
    //     $invoice_payment_id = $row3['invoice_payment_id'];
    // }

    // $statement = $pdo->prepare("SELECT * FROM tbl_salesoverall_info WHERE invoice_payment_id=?");
    // $statement->execute(array($invoice_payment_id));
    // $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($result4 as $row4) {
        
    //     $profit_info = $row4['profit'];
    //     $amount_info = $row4['total_amount'];
    //     $finalTotalAmount_pos = $row4['finalTotalAmount_pos'];
    // }

    // $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE id=?");
    // $statement->execute(array($_POST['ID']));
    // $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($result2 as $row2) {
    //     $refund_quantity = $row2['quantity'];
    //     $refund_amount = $row2['refund_amount'];

    // }
    
    
    // $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE id=?");
    // $statement->execute(array($_POST['Order_ID']));
    // $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($result1 as $row1) {
    //     $quantity = $row1['quantity'];
    //     $order_id = $row1['id'];
        
    // }

    

    // $total_quantity = $quantity - $refund_quantity;
    // $total_amount = $amount - $refund_amount;
    // $new_profit = $total_quantity*$profit;
    
    if($valid == 1) {
    
        $statement = $pdo->prepare("UPDATE tbl_refund_order SET 
        status='Accepted'
    	WHERE id='".$_POST['ID']."'");
    	$statement->execute();
    	
        // $statement = $pdo->prepare("UPDATE tbl_order SET 
        // quantity='".$total_quantity."'
    	// WHERE id='".$order_id."'");
    	// $statement->execute();

        // $statement = $pdo->prepare("UPDATE tbl_salesoverall SET 
        // quantity='".$total_quantity."',
        // totalProfit='".$new_profit."',
        // total_amount='".$total_amount."'
    	// WHERE order_id='".$order_id."'");
    	// $statement->execute();

        // $statement = $pdo->prepare("UPDATE tbl_salesoverall_info SET 
        // profit='".$new_profit."',
        // total_amount='".$total_amount."'
    	// WHERE invoice_payment_id='".$invoice_payment_id."'");
    	// $statement->execute();

        // $success_message = 'Order Refund Confirmed!';
        header("Refresh:0");
    	
        //Getting Customer Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
        $statement->execute(array($_POST['cust_id']));
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
            $contact_phone = $row['contact_phone'];
        }
        
        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE id=?");
        $statement->execute(array($_POST['ID']));
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
                $status = $row['status'];
                $status = "Refund Confirmed";
            $order_detail .= '
                                Customer Name: <b>'.$cust_name.' '.$cust_cname.' </b><br>
                                Customer Email:<b> '.$cust_email.'</b><br><br>
                                Refund Date: <b>'.date("l | F d, Y | h:i:s A", strtotime($row['refund_date'])).'</b><br>
                                Refund Amount:<b> ₱'.formatMoney ($row['refund_amount'], true).'</b><br>
                                <h3>Refund Status : </h3>
                                Refund Confirmation: <b>'.$status.'</b><br>
                            ';
        
            $order_detail .= '
                <div style="margin: 10px;padding-bottom:10px;"><br>
                                <img src="https://standlyhardware.com/assets/uploads/product-featured-'.$row['product_id'].'.jpg" width="90" height="90" style="float:left;padding-right:10px;" >
                                <b>'.$row['product_name'].'</b><br>
                                Size:<b> '.$row['size'].'</b><br>
                                Color: <b>'.$row['color'].'</b><br>
                                Quantity:<b> '.$row['quantity'].'</b><br>
                                Unit Price:<b> ₱'.formatMoney ($row['unit_price'], true).'</b><br>
                                </div>
            ';
        }
        // sending email
        $to_customer = $cust_email;
        $subject = 'Standly Hardware || Refund Request #'.$row['refund_id'].' Confirmation ';
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
                                       <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:55px;mso-line-height-rule:exactly;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Refund Request Status</h1></td>
                                      </tr>
                                      <tr>
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$cust_name.'</b>, Your Refund Request #'.$row['refund_id'].' has been successfully confirmed.  <br></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Refund #'.$row['refund_id'].' Details: </h3>
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
</div>';
        $headers = "From: Standly Hardware ". $admin_email . "\r\n" .
                  "Reply-To: Standly Hardware ". $admin_email . "\r\n" .
                  'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                  "MIME-Version: 1.0\r\n" . 
                  "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Sending email to admin                  
        mail($to_customer, $subject, $message, $headers);
        header("Refresh:0");
        // $success_message = 'Your email to customer is sent successfully.';
    } 
}  

if(isset($_POST['form1pic'])) {
	$valid = 1;
    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path == '') {
    	$valid = 0;
        $error_message .= "You must have to select a photo<br>";
    } else {
    	$ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    $statement = $pdo->prepare("SELECT * FROM tbl_salesoverall WHERE order_id=?");
    $statement->execute(array($_POST['Order_ID']));
    $result3 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result3 as $row3) {
        
        $profit = $row3['profit'];
        $amount = $row3['total_amount'];
        $order_quantity = $row3['quantity'];
        $invoice_payment_id = $row3['invoice_payment_id'];
    }

    $statement = $pdo->prepare("SELECT * FROM tbl_salesoverall_info WHERE invoice_payment_id=?");
    $statement->execute(array($invoice_payment_id));
    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result4 as $row4) {
        -
        $profit_info = $row4['profit'];
        $amount_info = $row4['total_amount'];
        $finalTotalAmount_pos = $row4['finalTotalAmount_pos'];
        $shippingfee = $row4['shippingfee'];
    }

    $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE id=?");
    $statement->execute(array($_POST['ID']));
    $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result2 as $row2) {
        $refund_quantity = $row2['quantity'];
        $refund_amount = $row2['refund_amount'];
    }
    $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE id=?");
    $statement->execute(array($_POST['Order_ID']));
    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result1 as $row1) {
        $quantity = $row1['quantity'];
        $order_id = $row1['id'];
        $payid = $row1['payment_id'];
    }
    $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
    $statement->execute(array($payid));
    $result5 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result5 as $row5) {
        $paidamount = $row5['paid_amount'];
        $payidd= $row5['id'];
        $paymentid = $row5['payment_id'];
    }

    $total_quantity = $quantity - $refund_quantity;
    $total_amount = $amount - $refund_amount;
    $new_profit = $total_quantity * $profit;
    $totalFinal = $paidamount - $refund_amount;

    if($valid == 1) {

        $payment_date = date('Y-m-d H:i:s');
        $date = strtotime($payment_date);
        $time = time();
    	$final_name = 'refund-receipt-'.$_POST['ID'].'.'.$ext;
    	move_uploaded_file( $path_tmp, '../assets/uploads/delivery_receipt/'.$final_name );

    	$statement = $pdo->prepare("UPDATE tbl_refund_order SET 
        refund_status='Completed',
        refund_receipt='".$final_name."',
        refund_pay_date='".$payment_date."'
        WHERE id='".$_POST['ID']."'");
    	$statement->execute();
    	$success_message = 'Order has been Successfully Refunded!';

        $statement = $pdo->prepare("UPDATE tbl_order SET 
        quantity='".$total_quantity."'
    	WHERE id='".$order_id."'");
    	$statement->execute();
    	
    	$statement = $pdo->prepare("UPDATE tbl_payment SET 
        paid_amount='".$totalFinal."'
    	WHERE payment_id='".$paymentid."'");
    	$statement->execute();

        $statement = $pdo->prepare("UPDATE tbl_salesoverall SET 
        quantity='".$total_quantity."',
        totalProfit='".$new_profit."',
        total_amount='".$total_amount."'
    	WHERE order_id='".$order_id."'");
    	$statement->execute();

        $statement = $pdo->prepare("UPDATE tbl_salesoverall_info SET 
        profit='".$new_profit."',
        total_amount='".$total_amount."',
        finalTotalAmount_pos='".$total_amount."'
    	WHERE invoice_payment_id='".$invoice_payment_id."'");
    	$statement->execute();

        header("Refresh:0");

        //Getting Customer Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
        $statement->execute(array($_POST['cust_id']));
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
            $contact_phone = $row['contact_phone'];
        }
        
        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE id=?");
        $statement->execute(array($_POST['ID']));
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
                $status = $row['status'];
                $status = "Refund Confirmed";
            $order_detail .= '
                Customer Name: <b>'.$cust_name.' '.$cust_cname.' </b><br>
                                Customer Email:<b> '.$cust_email.'</b><br><br>
                                Refund Date: <b>'.date("l | F d, Y | h:i:s A", strtotime($row['refund_date'])).'</b><br>
                                Refund Amount:<b> ₱'.formatMoney ($row['refund_amount'], true).'</b><br>  

                                <h3>Refund Status : </h3>
                                Refund Confirmation: <b>'.$status.'</b><br>
                                Shipping Status: <b>'.$row['shipping_status'].'</b><br>
							    Delivery Status: <b>'.$row['receive_status'].'</b><br>
							    Refund Status: <b>'.$row['refund_status'].'</b><br>
                                
                            ';
        
            $order_detail .= '
                <div style="margin: 10px;padding-bottom:10px;"><br>
                                <img src="https://standlyhardware.com/assets/uploads/product-featured-'.$row['product_id'].'.jpg" width="90" height="90" style="float:left;padding-right:10px;" >
                                <b>'.$row['product_name'].'</b><br>
                                Size:<b> '.$row['size'].'</b><br>
                                Color: <b>'.$row['color'].'</b><br>
                                Quantity:<b> '.$row['quantity'].'</b><br>
                                Unit Price:<b> ₱'.formatMoney ($row['unit_price'], true).'</b><br>
                                </div>
            ';
        }
        // sending email
        $to_customer = $cust_email;
        $subject = 'Standly Hardware || Refund Request #'.$row['refund_id'].' Completed ';
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
                                       <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:55px;mso-line-height-rule:exactly;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Refund Request Status</h1></td>
                                      </tr>
                                      <tr>
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$cust_name.' </b>. Your Refund Request #'.$row['refund_id'].' has been successfully completed.  <br></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Refund: #'.$row['refund_id'].' Details: </h3>
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
</div>';
        $headers = "From: Standly Hardware ". $admin_email . "\r\n" .
                  "Reply-To: Standly Hardware ". $admin_email . "\r\n" .
                  'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                  "MIME-Version: 1.0\r\n" . 
                  "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Sending email to admin                  
        mail($to_customer, $subject, $message, $headers);
        header("Refresh:0");
        
    }
}
?>
<?php
if($error_message != '') {
    echo "<script>alert('".$error_message."')</script>";
}
if($success_message != '') {
    echo "<script>alert('".$success_message."')</script>";
}
?>
<?php
$status = '';
if(isset($_GET['status'])){
    $status = $_GET['status'];
}
$i=0;
if($status == 'weekly'){
$date_nowss = date('Y-m-d h:i:s');
$date_weekss = (isset($_POST['start_date']) ? date("Y-m-d h:i:s", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d h:i:s", strtotime("+1 week")));
$start_date = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : $date_nowss);
$end_date = $date_weekss;
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order 
                            WHERE refund_date 
                            BETWEEN '".$start_date."' 
                            AND '".$end_date."' 
                            ORDER by id DESC");


}elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order 
                            WHERE refund_date 
                            BETWEEN '".$start_datee."' 
                            AND '".$end_datee."' 
                            ORDER by id DESC");


}elseif($status == 'monthly'){
$month_sel = (isset($_POST['month_sect']) ? $_POST['month_sect'] : date('m'));
$year_sel = (isset($_POST['year_sect']) ? $_POST['year_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order 
                            WHERE MONTH(refund_date) = '".$month_sel."' 
                            AND YEAR(refund_date) = '".$year_sel."' 
                            ORDER by id DESC");

}elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['yearly_sect']) ? $_POST['yearly_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order 
                            WHERE YEAR(refund_date) = '".$yearly_sel."' 
                            ORDER by id DESC");

}elseif($status == 'daily'){
$daily = (isset($_POST['start_day']) ? $_POST['start_day']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['start_day']) ? $_POST['start_day']." 23:59:00" : date('Y-m-d 23:59:00'));
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order 
                            WHERE refund_date 
                            BETWEEN '".$daily."' 
                            AND '".$daily_end."' 
                            ORDER by id DESC");
}
else{
$statement = $pdo->prepare("SELECT * FROM tbl_refund_order ORDER by id DESC");
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';                            
// var_dump($result);
// echo '</pre>';
// die();
$totalAmount = 0;
foreach ($result as $rowAmount) {
    if($rowAmount['refund_status'] == 'Completed'){
    $totalAmount += $rowAmount['refund_amount'];
    }
    else
    {
    //   $totalAmount += $rowAmount['refund_amount'];  
    }
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Online Return/Refund Products</h1>
	</div>
    <div>
<form action="PrintReturnOnline.php" method="POST">
<?php if($status == 'weekly'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $start_date?>">
<input type="hidden" name="end_date" value="<?php echo $end_date?>">
<?php elseif($status == 'all'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $start_datee?>">
<input type="hidden" name="end_date" value="<?php echo $end_datee?>">
<?php elseif($status == 'monthly'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $month_sel?>">
<input type="hidden" name="end_date" value="<?php echo $year_sel?>">
<?php elseif($status == 'yearly'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $yearly_sel?>">
<input type="hidden" name="end_date" value="">
<?php elseif($status == 'daily'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $daily?>">
<input type="hidden" name="end_date" value="<?php echo $daily_end?>">
<?php endif;?>
<button type="submit" name="printBtn" style="float:right;" class="btn btn-success btn-large"> Print</button>
</form>
</div>
</section>
<div>
    <div class="tab-report" style="margin-left:1%; padding:10px 5px 10px 5px">
        <div class="tab-week">
            <a href="return_ordering.php?status=all" class="btn btn-sm btn-success"><i class="fa fa-search" aria-hidden="true"></i></a>
                <a href="return_ordering.php?status=daily" class="btn btn-sm btn-success">DAILY</a>
                <a href="return_ordering.php?status=weekly" class="btn btn-sm btn-success">WEEKLY</a>
                <a href="return_ordering.php?status=monthly" class="btn btn-sm btn-success">MONTHLY</a>
                <a href="return_ordering.php?status=yearly" class="btn btn-sm btn-success">YEARLY</a>
        </div>
             <?php echo "<h3> TOTAL RETURN/REFUND : ₱ ".formatMoney ($totalAmount, true)."</h3>"; ?>
    </div>
    <div>
          <?php if(isset($_GET['status'])):
            $status = $_GET['status'];
        ?>
            <?php if($status == 'weekly'):
                    $date_nows = date('Y-m-d');
                    $date_weeks = (isset($_POST['start_date']) ? date("Y-m-d", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d", strtotime("+1 week")));    
            ?>
            <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="return_ordering.php?status=weekly" method="POST">
                    <input type="date" name="start_date" id="start_date" style="width: 175px; height:30px;"value="<?php echo (isset($_POST['start_date']) ? $_POST['start_date'] : $date_nows)?>">
                    <input type="date" readonly name="end_date" id="end_date" style="width: 175px; height:30px;" value="<?php echo $date_weeks?>">
                    <button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
                    <?php if (isset($_POST['start_date']) && isset($_POST['end_date'])):?>
                    	   <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_date)).
                                 " - ".date('F d, Y', strtotime($end_date));?></b></h3>
							<h3 style ="float:right; margin-right:1%;">WEEKLY RETURN/REFUND:</h3>
					<?php else:?>
					 <h3 style ="float:right; margin-right:3%;">WEEKLY RETURN/REFUND</h3>
                    <?php endif; ?>
                </form>
            </div>
             <?php  elseif($status == 'all'):
                $date_nowss = date('Y-m-d');
                $date_weekss = date('Y-m-d'); ?>
            <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="return_ordering.php?status=all" method="POST">
                    
                    <input type="date" name="start_datee" id="start_datee" style="width: 175px; height:30px;" value="<?php echo (isset($_POST['start_datee']) ? $_POST['start_datee'] : $date_nowss)?>">
                    
                    <input type="date" name="end_datee" id="end_datee" style="width: 175px; height:30px;" value="<?php echo (isset($_POST['end_datee']) ? $_POST['end_datee'] : $date_weekss)?>">
                    <button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
                  <?php if (isset($_POST['start_datee']) && isset($_POST['end_datee']) ):?>
                    <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_datee));?>
                                  - <?php echo date('F d, Y',strtotime($end_datee));?></b></h3>
                                  <h3 style ="float:right; margin-right:1%;">RETURN/REFUND:</h3>
                    <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">RETURN/REFUND</h3>
                    <?php endif; ?>
                </form>
            </div>
                <?php elseif($status == 'monthly'):?> 
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                    <form action="return_ordering.php?status=monthly" method="POST">
                        <select style="width: 175px; height:30px;" name="month_sect" id="month_sect">
                            <?php for($m=1; $m<=12; ++$m){
                                $mont_now = date('m');
                                $month_selected = date('m', mktime(0, 0, 0, $m, 1));
                                $mont_name = date('F', mktime(0, 0, 0, $m, 1));
                            ?>
                                <?php if(isset($_POST['year_sect'])):?>
                                    <option value="<?php echo $month_selected?>" <?php echo ($month_selected == $_POST['month_sect'] ? 'selected': '');?>><?php echo $mont_name; ?></option>
                                <?php else:?>
                                    <option value="<?php echo $month_selected;?>" <?php echo ($month_selected == $mont_now ? 'selected': '');?>><?php echo $mont_name; ?></option>
                                <?php endif;?>
                            <?php } ?>
                        </select>
                        <?php $years = array_combine(range(date("Y"), 1910), range(date("Y"), 1910));?>
                        <select style="width: 175px; height:30px; font-size:10px;" name="year_sect" id="year_sect">
                            <?php foreach($years as $year):?>
                                <?php if(isset($_POST['year_sect'])):?>
                                    <option value="<?php echo $year?>" <?php echo ($year == $_POST['year_sect'] ? 'selected': '');?>><?php echo $year; ?></option>
                                <?php else:?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                        <button type="submit" class ="btn btn-primary" style="width: 100px; height:35px;">Search</button>
                          <?php if(isset($_POST['year_sect'])):?>
                         <h3 style ="float:right; margin-right:2%;"><b><?php echo date("F",mktime(0,0,0,$month_sel,10)). " "
                            .$year_sel. "</h3>";?></b></h3>
                        <h3 style ="float:right; margin-right:1%;">MONTHLY RETURN/REFUND:</h3>
                        <?php else:?>
                        <h3 style ="float:right; margin-right:3%;">MONTHLY RETURN/REFUND</h3>
                        <?php endif; ?>
                    </form>
                </div>
            <?php elseif($status == 'yearly'):?>
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                    <form action="return_ordering.php?status=yearly" method="POST">
                        <?php $yearlys = array_combine(range(date("Y"), 1910), range(date("Y"), 1910));?>
                        <select style="width: 175px; height:30px; font-size:10px;" name="yearly_sect" id="yearly_sect">
                            <?php foreach($yearlys as $yearly):?>
                                <?php if(isset($_POST['yearly_sect'])):?>
                                    <option value="<?php echo $yearly?>" <?php echo ($yearly == $_POST['yearly_sect'] ? 'selected': '');?>><?php echo $yearly; ?></option>
                                <?php else:?>
                                    <option value="<?php echo $yearly; ?>"><?php echo $yearly; ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                          <button type="submit" class ="btn btn-primary" style="width: 100px; height:35px;">Search</button>
                         <?php if(isset($_POST['yearly_sect'])):?>
                        <h3 style ="float:right; margin-right:2%;"><b><?php echo $yearly_sel?></b></h3>
                        <h3 style ="float:right; margin-right:1%;">YEARLY RETURN/REFUND: </h3>
                         <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">YEARLY RETURN/REFUND</h3>
                    <?php endif; ?>
                    </form>
                </div>
            <?php elseif($status == 'daily'):
                $date_nows = date('Y-m-d');
                $day_ends = (isset($_POST['start_day']) ? date("Y-m-d", strtotime($_POST['start_day']."+1 day")) : date("Y-m-d"));    
            ?>
                <div style="margin-left:1%; padding:10px 5px 10px 5px">
                <form action="return_ordering.php?status=daily" method="POST">
                    <input type="date" name="start_day" id="start_day" style="width: 175px; height:30px; font-size:10px;" value="<?php echo (isset($_POST['start_day']) ? $_POST['start_day'] : $date_nows)?>">
                            <button type="submit" class ="btn btn-primary" style="width: 100px; height:35px;">Search</button>
                     <?php if (isset($_POST['start_day'])):?>
                    <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y',strtotime($daily));?></b></h3>
                    <h3 style ="float:right; margin-right:1%;">DAILY RETURN/REFUND: </h3>
                    <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">DAILY RETURN/REFUND</h3>
                    <?php endif; ?>
                </form>
            </div>
            <?php endif;?>
        <?php endif;?>
    </div>
</div>


<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-info">
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
                    <th width ="1%">#</th>
                    <th width ="13%">Customer Details</th>
			        <th width ="15%">Return/Refund Product Details</th>
			        <th width ="15%;"><p style="float:right;">Total Amount</p></th>
                    <th width ="15%">Reason of Return/Refund</th>
                    <th width ="10%">Proof of Return/Refund</th>
                    <th width ="10%">Return/Refund Status</th>
                    <th width ="10%">Ship-Back Status</th>
                    <th width ="10%">Received Status</th>
			        <th width ="10%">Return/Refund Status</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	foreach ($result as $row) {
            		$i++;
            		?> 
					<tr class="<?php if($row['refund_status']!=='Pending'){echo 'bg-g';}else{echo 'bg-r';} ?>">
					    <td><?php echo $i; ?></td>
	                    <td>
                        <?php
                           $statement1 = $pdo->prepare("SELECT 
                                                        t1.cust_id,
                                                        t1.id,

                                                        t2.cust_id,
                                                        t2.cust_name,
                                                        t2.cust_email

                                                        FROM tbl_refund_order t1
                                                        JOIN tbl_customer t2
                                                        ON t1.cust_id = t2.cust_id
                                                        WHERE t1.id=?");
                            $statement1->execute(array($row['id']));
                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result1 as $row10) {
                           
                            echo '<b>Customer ID:</b> '.$row10['cust_id']; 
                            echo '<br><b>Customer Name:</b> ' .$row10['cust_name']; 
                            echo '<br><b>Customer Email:</b> '.$row10['cust_email']; 
                           
                                } 
                            ?> 
                        <td>

                        <b>Payment ID: </b><?php echo $row['refund_id']; ?><br>   
                        <b>Date: </b><?php echo date('l | F d, Y | h:i:s A',strtotime($row['refund_date'])); ?><br><br>

                           <?php
                           $statement1 = $pdo->prepare("SELECT * FROM tbl_refund_order WHERE refund_id=?");
                           $statement1->execute(array($row['refund_id']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                           foreach ($result1 as $row1) {
                                echo '<b>Product:</b> '.$row1['product_name'];
                                echo '<br><b>Quantity:</b> '.$row1['quantity'];
                                echo '<br> <b>Price: </b> ₱'.formatMoney ($row1['unit_price'], true);
                           }
                           ?>

                        </td>
                        <td><p style ="float:right;"><?php echo '₱ '.formatMoney($row['refund_amount'],true); ?></p></td>
                        <td>
                        
                            <?php
                           $statement1 = $pdo->prepare("SELECT 
                                                        t1.reason_id,

                                                        t2.id,
                                                        t2.reason

                                                        FROM tbl_refund_order t1
                                                        JOIN tbl_reason t2
                                                        ON t1.reason_id = t2.id
                                                        WHERE refund_id=?");
                            $statement1->execute(array($row['refund_id']));
                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result1 as $row1) {
                            ?>
                            
                            <b>CUSTOMER REASON: </b><br><?php echo $row1['reason']; ?>
                            <?php
                                } 
                            ?> 
                            <br><br><b>ATTEMPTS: </b><?php echo $row['attempt']; ?>
                            <br><br><b>CUSTOMER NOTES: </b><br><?php echo $row['notes']; ?><br><br>
                            
                        </td>
                        <td>
                        <b>GCASH NUMBER: </b><br><?php echo $row['gcash_no']; ?><br>
                        <br><b>PROOF OF RETURN/REFUND:</b> 
                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['refund_id']; ?>"class="btn btn-l btn-primary" style="width:100%;margin-bottom:4px;">View Proof of Refund</a>
                                <div id="model-<?php echo $row['refund_id']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="font-weight: bold;">Refund Proof</h4>
                                            </div>
                                            <div class="modal-body" style="font-size: 14px">
                                                <form action="" method="post">
                                                    <table class="table table-bordered">
                                                    <tr>
                                                            <td>Refund ID : <?php echo $row['refund_id']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Refund Date : </b><?php $wop = $row['refund_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <img class="" src="../assets/uploads/refund_proof/<?php echo $row['photo']; ?>" style="width:100%;margin-top:20px;border-radius:0;">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                        <td>
                        <b> REQUEST STATUS: </b><br>
                          <!--<b> ORDER STATUS </b><br>-->
                            <?php $status = $row['status']; ?>
                            <?php if($row['status'] == 'Pending'): ?>
                            <b>Pending</b>
                            <?php elseif($row['status'] == 'Accepted'): ?>
                            <b>Return Confirmed</b>
                            <?php elseif($row['status'] == 'Declined'): ?>
                            <b><span style="color:red;">Declined</b></span>
                            <?php endif; ?>
                        <!--<?php// echo $row['status']?>-->
                            <br><br><br>
                            <?php
                                if($row['status']=='Pending'){
                                    ?>

                                    <form action="" method="post">
            							<input type="hidden" name="Order_ID" value="<?php echo $row['order_id'];?>">
                                        <input type="hidden" name="cust_id" value="<?php echo $row['cust_id']; ?>">
                                        <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                                        <!-- <input type="hidden" name="payment_ID" value="<?php echo $row['payment_id'];?>"> -->
                                        <button type="submit" name="form3" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;">Accept Request</button>
                                    </form>


                                        <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>"class="btn btn-danger btn-l" style="width:100%;margin-bottom:4px;">Decline Request</a>
                                            <div id="model-<?php echo $i; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title" style="font-weight: bold;">Decline Request</h4>
                                                        </div>
                                                        <div class="modal-body" style="font-size: 14px">
                                                            <form action="" method="post">
                                                                <table class="table table-bordered">
                                                                    
                                                                    <tr>
                                                                        <td>Notes to Customer</td>
                                                                        <td>
            								                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
            								                                <input type="hidden" name="Order_ID" value="<?php echo $row['order_id'];?>">
                                                                            <input type="hidden" name="cust_id" value="<?php echo $row['cust_id']; ?>">
                                                                            <textarea name="seller_notes" class="form-control" cols="30" rows="10" style="width:100%;height: 200px;"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><input type="submit" value="Send Message" name="form2"></td>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

									<?php 
                                }
                            ?>
						</td>
                        
                        <td>
                        <b>SHIPPING STATUS: </b> <br><?php echo $row['shipping_status']?> <br><br>
                            <!-- <br><b>Shipping Date: </b><?php $wop = $row['ship_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?> -->

                        

                            <?php
                                if($row['shipping_status']!=='Pending'){
                                    ?>
                                    <b>SHIPPING DETAILS:</b>
                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['refund_id']; ?>1"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">View Refund Details</a>
                                <div id="model-<?php echo $row['refund_id']; ?>1" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="font-weight: bold;">Shipping Details</h4>
                                            </div>
                                            <div class="modal-body" style="font-size: 14px">
                                                <form action="" method="post">
                                                    <table class="table table-bordered">
                                                    <tr>
                                                            <td>Shipping Date : </b><?php $wop = $row['ship_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <img class="" src="../assets/uploads/refund_proof/proof_ship/<?php echo $row['proof_ship']; ?>" style="width:100%;margin-top:20px;border-radius:0;">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div> <br><br>
                         <b>SHIPPING NOTES: </b><?php echo $row['ship_notes']?>
                                    
                                    <?php 
                                    
                                }
                            ?>
                        </td>

                        <td>
                            <b>RECEIVE STATUS: </b><br><?php echo $row['receive_status']?>
                            <br><br><br>
                            <?php
                                if($row['shipping_status']!=='Pending'){
                                    if($row['receive_status']=='Pending'){
                                    ?>
									    <a href="return-change-drop-status.php?id=<?php echo $row['id']; ?>&cust_id=<?php echo $row['cust_id']; ?>&task=Received" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Received item</a>
									<?php 
                                    }else{
                                    echo "";
                                    }
                                }
                            ?>
                        </td>

						<td>
                            <b>RETURN/REFUND STATUS: </b><br><?php echo $row['refund_status']?>
                            <br>
                            <?php
                                if($row['receive_status']!=='Pending'){
                                    if($row['refund_status']=='Pending'){
                                    ?>

									    <!-- <a href="return-change-refund-status.php?id=<?php echo $row['id']; ?>&task=Completed" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Mark as Complete</a> -->
                                        <br><b>UPLOAD RECEIPT:</b><br>
                                        <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>2"class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Upload Receipt</a>
                                                <div id="model-<?php echo $i; ?>2" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title" style="font-weight: bold;">Delivery Receipt</h4>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <table class="table table-bordered">
                                                                        <input type="hidden" name="Order_ID" value="<?php echo $row['order_id'];?>">
                                                                        <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                                                                        <input type="hidden" name="cust_id" value="<?php echo $row['cust_id'];?>">

                                                                        <tr>
                                                                            <td>Return/Refund Receipt</td>
                                                                            <td>
                                                                                <input type="hidden" name="PaymentID" value="<?php echo $row['id'];?>">
                                                                                <input type="file" name="photo" id="sub_photo">(Only jpg, jpeg, gif and png are allowed)
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td><input type="submit" id="sub_receipt" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;" name="form1pic"></td>
                                                                        </tr>
                                                                    </table>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
									<?php 
                                    }else{
                                    echo ""; ?><br>
                                        <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['id']; ?>5"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">View Receipt</a>
                                                <div id="model-<?php echo $row['id']; ?>5" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <b>RETURN/REFUND RECEIPT</b>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <form action="" method="post">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>RETURN/REFUND ID : <?php echo $row['id']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            <img class="" src="../assets/uploads/delivery_receipt/<?php echo $row['refund_receipt']; ?>" style="width:100%;margin-top:20px;border-radius:0;">
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                    <?php
                                    }
                                }
                            ?>
                        </td>
						
                                   
	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div>
  

</section>


<div class="modal fade" id="confirm-return" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Return/Refund Product Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to return this item?</p>
            </div>
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Reason of Return:</label>
							<div class="col-sm-4">
								<select name="id" class="form-control select2 top-cat" width ="50%">
									<option value=""></option>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary btn-ok" type ="submit" >Return</a>



<?php require_once('footer.php'); ?>