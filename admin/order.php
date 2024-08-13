<?php require_once('header.php'); ?>
<?php
$status = '';
if(isset($_GET['status'])){
    $status = $_GET['status'];
}
$i=0;
// WEEKLY FILTER QUERY
if($status == 'weekly'){
$date_nowss = date('Y-m-d h:i:s');
$date_weekss = (isset($_POST['start_date']) ? date("Y-m-d h:i:s", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d h:i:s", strtotime("+1 week")));
$start_dates = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : $date_nowss);
$end_dates = $date_weekss;
$statement = $pdo->prepare("SELECT * FROM tbl_payment
                            WHERE payment_date 
                            BETWEEN '".$start_dates."' 
                            AND '".$end_dates."'
                            GROUP by payment_id
                            ORDER by payment_date DESC");
}
elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT * FROM tbl_payment
                            WHERE payment_date 
                            BETWEEN '".$start_datee."' 
                            AND '".$end_datee."' 
                            GROUP by payment_id
                            ORDER by payment_date DESC");

} // MONTHLY FILTER QUERY
elseif($status == 'monthly'){
$month_sel = (isset($_POST['month_sect']) ? $_POST['month_sect'] : date('m'));
$year_sel = (isset($_POST['year_sect']) ? $_POST['year_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT * FROM tbl_payment
                            WHERE MONTH(payment_date) = '".$month_sel."' 
                            AND YEAR(payment_date) = '".$year_sel."' 
                            GROUP by payment_id
                            ORDER by payment_date DESC");

} // YEARLY FILTER QUERY
elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['yearly_sect']) ? $_POST['yearly_sect'] : date('Y'));
$statement = $pdo->prepare("SELECT * FROM tbl_payment
                            WHERE YEAR(payment_date) = '".$yearly_sel."'
                            GROUP by payment_id
                            ORDER by payment_date DESC");

} // DAILY FILTER QUERY
elseif($status == 'daily'){
$daily = (isset($_POST['start_day']) ? $_POST['start_day']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['start_day']) ? $_POST['start_day']." 23:59:00" : date('Y-m-d 23:59:00'));
$statement = $pdo->prepare("SELECT * FROM tbl_payment
                            WHERE payment_date  
                            BETWEEN '".$daily."' 
                            AND '".$daily_end."'
                            GROUP by payment_id
                            ORDER by payment_date DESC");

}
else {
$statement = $pdo->prepare("SELECT * FROM tbl_payment
                            WHERE payment_id 
                            GROUP BY payment_id
                            ORDER by id DESC");
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// die();
$OrderPrice = 0;
$OrderQty = 0;
$SupplierPrice = 0;
$totalProfit =0;
$totalProfitQty = 0;
$totalAmount = 0;
foreach ($result as $rowAmount) {
    // $totalAmount += $rowAmount['finalTotalAmount_pos'];
    // $OrderPrice += $rowAmount['totProfit'];

}
?>
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
        $statement->execute(array($_POST['payment_id']));
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
                            <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><strong>Order Confirmation: <b> Confirmed</strong></p></td>
                            </tr>
                            <tr>
                            <td align="left" style="padding:0;Margin:0;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><b>Payment Status: '.$row['payment_status'].' </b></p></td>
                            </tr>
                            <tr>
                            <td align="left" style="padding:0;Margin:0;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><b>Shipping Status: '.$row['shipping_status'].' </b></p></td>
                            </tr>
                            <tr>
                            <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><b>Delivery Status: '.$row['delivery_status'].' </b> </p></td>
                            </tr>
                            </table>
                                
                            ';
        }

        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($_POST['payment_id']));
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

        $statement = $pdo->prepare("INSERT INTO tbl_customer_message (subject,message,order_detail,cust_id) VALUES (?,?,?,?)");
        $statement->execute(array($subject_text,$message_text,$order_detail,$_POST['cust_id']));

        // sending email
        $subject = 'Standly Hardware || Order #'.$_POST['payment_id'].' - ' .$_POST['subject_text'] ;
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
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$cust_name.' '.$cust_cname.'</b>, Your order #'.$row['payment_id'].' has been Delivered.
                                       </p></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Message: </h3>
                                - '.$message_text.'
                                <h3>Order #'.$row['payment_id'].' Details: </h3>
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
        header("Refresh:0");
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

    // $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
    // $statement->execute(array($_POST['prod_ID']));
    // $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($result1 as $row1) {

    //     $current_quantity = $row1['p_qty'];
        
    
    // }
    // $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
    // $statement1->execute(array($_POST['ID']));
    // $result2 = $statement1->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($result2 as $row2) {
    
    //     $product_id = $row2['prod_ID'];
    //     $product_qty = $row2['quantity'];

    // }

    if($valid == 1) {
    
    	// getting auto increment id
        $payment_date = date('Y-m-d H:i:s');
        $date = strtotime($payment_date);
        $time = time();
    	$final_name = 'del-receipt-'.$_POST['PaymentID'].'.'.$ext;
    	move_uploaded_file( $path_tmp, '../assets/uploads/delivery_receipt/'.$final_name );
    
    	$statement = $pdo->prepare("UPDATE tbl_payment SET 
        delivery_status='Completed',
    	photo_receipt='".$final_name."',
    	date_receipt='".$payment_date."'
    	WHERE payment_id='".$_POST['PaymentID']."'");
    	$statement->execute();
    	$success_message = 'Delivery Receipt is added successfully uploaded!';
    	header("Refresh:0");
    	
        $i=0;
	    $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
	    $statement->execute(array($_POST['PaymentID']));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row5) {
	    	$i++;
	    	$order_id[$i] = $row5['id'];
	    	$order_p_id[$i] = $row5['product_id'];
            $order_p_name[$i] = $row5['product_name'];
	    	$order_p_qty[$i] = $row5['quantity'];
            $order_p_price[$i] = $row5['unit_price'];
        }

        $i=0;
	    $statement = $pdo->prepare("SELECT * FROM tbl_product");
	    $statement->execute();
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row3) {
	    	$i++;
	    	$arr_p_id[$i] = $row3['p_id'];
	    	$arr_p_name[$i] = $row3['p_name'];
	    	$arr_p_qty[$i] = $row3['p_qty'];
	    	$arr_p_sup_price[$i] = $row3['p_old_price'];
	    	$arr_p_selling_price[$i] = $row3['p_current_price'];
	    	$arr_p_photo[$i] = $row3['p_featured_photo'];



        }
        
        for($i=1;$i<=count($order_p_id);$i++) {

            $p_qty = $order_p_qty[$i];
            
            for($j=1;$j<=count($arr_p_id);$j++)
            {
                if($arr_p_id[$j] == $order_p_id[$i]) 
                {
                    $selling_price =  $arr_p_selling_price[$j];
                    $supplier_price = $arr_p_sup_price[$j];
                    $p_id = $arr_p_id[$j];
                    $p_name = $arr_p_name[$j];
                    break;
                }
            }

        $amount = $selling_price * $p_qty; 
        $profit = $selling_price - $supplier_price;
        $total_profit = $profit * $p_qty;
        $statement = $pdo->prepare("INSERT INTO tbl_salesoverall (
                                        invoice_payment_id,
                                        order_id,
                                        product_id,
                                        product_name,
                                        product_price,
                                        quantity,
                                        total_amount,
                                        profit,
                                        totalProfit,
                                        date
                                    )   VALUES (?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        $_POST['PaymentID'],
                                        $order_id[$i],
                                        $p_id,
                                        $p_name,
                                        $selling_price,
                                        $p_qty,
                                        $amount,
                                        $profit,
                                        $total_profit,
                                        $payment_date
                                        
                                ));

        // header("Refresh:0");
        }
        $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
	    $statement->execute(array($_POST['PaymentID']));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row6) {
	    	
	    	$cust_id= $row6['customer_id'];
	    	$cust_name= $row6['customer_name'];
	    	$cust_email= $row6['customer_email'];
	    	$payment_date= $row6['payment_date'];
	    	$paid_amount= $row6['paid_amount'];
	    	$payment_method= $row6['payment_method'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
	    $statement->execute(array($cust_id));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row7) {
	    	
	    	$cust_address= $row7['cust_address'];
	    	$cust_contact= $row7['cust_phone'];
	    	$cust_city= $row7['cust_s_city'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost WHERE city_id=?");
	    $statement->execute(array($cust_city));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row8) {
	    	
	    	$cust_city= $row8['cust_city'];
	    	$shipping= $row8['amount'];
        }

        $statement = $pdo->prepare("INSERT INTO tbl_salesoverall_info (
                                        invoice_payment_id,
                                        cust_name,
                                        cust_address,
                                        cust_contact,
                                        cust_email,
                                        date,
                                        payment_method,
                                        discount,
                                        shippingfee,
                                        total_amount,
                                        profit,
                                        finalTotalAmount_pos

                                    )   VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        $_POST['PaymentID'],
                                        $cust_name,
                                        $cust_address,
                                        $cust_contact,
                                        $cust_email,
                                        $payment_date,
                                        $payment_method,
                                        '',
                                        $shipping,
                                        $paid_amount,
                                        $total_profit,
                                        $paid_amount
                                        
                                ));
        $success_message = 'Order Completed & Delivery Receipt Successfully Uploaded! ';


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
        }
        
        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
        $statement->execute(array($_POST['PaymentID']));
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
                                <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><strong>Order Confirmation: <b> Confirmed</strong></p></td>
                                </tr>
                                <tr>
                                <td align="left" style="padding:0;Margin:0;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><b>Payment Status: '.$row['payment_status'].' </b></p></td>
                                </tr>
                                <tr>
                                <td align="left" style="padding:0;Margin:0;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><b>Shipping Status: '.$row['shipping_status'].' </b></p></td>
                                </tr>
                                <tr>
                                <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><b>Delivery Status: '.$row['delivery_status'].' </b> </p></td>
                                </tr>
                                </table>
                                
                            ';
        }
        
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($_POST['PaymentID']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $i++;
            $order_detail .= '
                <div style="margin: 10px;padding-bottom:10px;">
                                <br><b><u> Item #'.$i.'</u></b><br>
                                <img src="https://standlyhardware.com/assets/uploads/'.$row['p_featured_photo'].'." width="90" height="90" style="float:left;padding-right:10px;" >
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
        $subject = 'Standly Hardware || Order #'.$row['payment_id'].' Completed ';
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
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$cust_name.' '.$cust_cname.'</b>, Your order #'.$row['payment_id'].' has been Delivered.
                                       </p></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Order #'.$row['payment_id'].' Details: </h3>
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
if(isset($_POST['form2'])) {
	$valid = 1;


    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
    $statement->execute(array($_POST['prod_ID']));
    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result1 as $row1) {

        $current_quantity = $row1['p_qty'];
        
    
    }
    $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
    $statement1->execute(array($_POST['ID']));
    $result2 = $statement1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result2 as $row2) {
    
        $product_id = $row2['prod_ID'];
        $product_qty = $row2['quantity'];

    }
    $i=0;
    $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
    $statement->execute(array($_POST['payment_ID']));
    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
    foreach ($result4 as $row5) {
        $i++;
        $order_p_id[$i] = $row5['product_id'];
        $order_p_qty[$i] = $row5['quantity'];
        $order_p_name[$i] = $row5['product_name'];
    }

    $i=0;
    $statement = $pdo->prepare("SELECT * FROM tbl_product");
    $statement->execute();
    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
    foreach ($result4 as $row3) {
        $i++;
        $arr_p_id[$i] = $row3['p_id'];
        $arr_p_qty[$i] = $row3['p_qty'];
    }

    

    if($valid == 1) {
    
        for($i=1;$i<=count($order_p_id);$i++) {
            
            // Update the stock
            for($j=1;$j<=count($arr_p_id);$j++)
            {
                if($arr_p_id[$j] == $order_p_id[$i]) 
                {
                    $current_qty = $arr_p_qty[$j];
                    break;
                }
            }
    
        $total_quantity = $current_quantity - $_POST['prod_QTY']; 
    
        if($order_p_qty[$i] > $current_quantity){
            $temp_msg = 'Sorry, The current available stocks for '. $order_p_name[$i].' are '.$current_quantity.' item(s)';
            $valid = 0;
            header("Refresh:0");
            ?>
            <script type="text/javascript">alert('<?php echo $temp_msg; ?>');</script>
            <?php
        }

    	$statement = $pdo->prepare("UPDATE tbl_payment SET 
        order_status='Accepted'
    	WHERE id='".$_POST['ID']."'");
    	$statement->execute();
        
        $final_quantity = $current_qty - $order_p_qty[$i];
        $statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
        $statement->execute(array($final_quantity,$order_p_id[$i]));

        $success_message = 'Order Confirmed, Product is updated successfully.';
        header("Refresh:0");
        }

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
        }
        
        $subject = 'Standly Hardware || Order Confirmation';
        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
        $statement->execute(array($_POST['payment_ID']));
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
                                <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><strong>Order Confirmation: <b> Confirmed</strong></p></td>
                                </tr>
                                </table>
                            ';
        }
        
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($_POST['payment_ID']));
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
        // sending email
        $to_customer = $cust_email;
        $subject = 'Standly Hardware || Order #'.$row['payment_id'].' Confirmation ';
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
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$cust_name.' '.$cust_cname.'</b>, Your order #'.$row['payment_id'].' has been confirmed.
                                       </p></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Order #'.$row['payment_id'].' Details: </h3>
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

if(isset($_POST['form4'])) {
	$valid = 1;


    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
    $statement->execute(array($_POST['prod_ID']));
    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result1 as $row1) {

        $current_quantity = $row1['p_qty'];
        
    
    }
    $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
    $statement1->execute(array($_POST['ID']));
    $result2 = $statement1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result2 as $row2) {
    
        $product_id = $row2['prod_ID'];
        $product_qty = $row2['quantity'];

    }
    
    $total_quantity = $current_quantity - $_POST['prod_QTY']; 
    $i=0;
    $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
    $statement->execute(array($_POST['payment_ID']));
    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
    foreach ($result4 as $row5) {
        $i++;
        $order_p_id[$i] = $row5['product_id'];
        $order_p_qty[$i] = $row5['quantity'];
        $order_p_name[$i] = $row5['product_name'];
    }

    $i=0;
    $statement = $pdo->prepare("SELECT * FROM tbl_product");
    $statement->execute();
    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
    foreach ($result4 as $row3) {
        $i++;
        $arr_p_id[$i] = $row3['p_id'];
        $arr_p_qty[$i] = $row3['p_qty'];
    }
    
    
    if($valid == 1) {
        $date = date('Y-m-d H:i:s');
        for($i=1;$i<=count($order_p_id);$i++) {
        
            // Update the stock
            for($j=1;$j<=count($arr_p_id);$j++)
            {
                if($arr_p_id[$j] == $order_p_id[$i]) 
                {
                    $current_qty = $arr_p_qty[$j];
                    break;
                }
            }
            if($order_p_qty[$i] > $current_quantity){
                $temp_msg = 'Sorry, The current available stocks for '. $order_p_name[$i].' are '.$current_quantity.' item(s)';
                $valid = 0;
                header("Refresh:0");
                ?>
                <script type="text/javascript">alert('<?php echo $temp_msg; ?>');</script>
                <?php
            }

            $statement = $pdo->prepare("UPDATE tbl_payment SET 
            order_status='Accepted.',
            order_accept_date='".$date."'
            WHERE id='".$_POST['ID']."'");
            $statement->execute();
            
            
            $final_quantity = $current_qty - $order_p_qty[$i];
            $statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
            $statement->execute(array($final_quantity,$order_p_id[$i]));
            $success_message = 'Order Confirmed, Product is updated successfully.';

            header("Refresh:0");
 
        }
        
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
        }
        
        $subject = 'Standly Hardware || Order Confirmation';
        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
        $statement->execute(array($_POST['payment_ID']));
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
                                <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><strong>Order Confirmation: <b> Confirmed</strong></p></td>
                                </tr>
                                </table>
                            ';
        }
        
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($_POST['payment_ID']));
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
        // sending email
        $to_customer = $cust_email;
        $subject = 'Standly Hardware || Order #'.$row['payment_id'].' Confirmation ';
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
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$cust_name.' '.$cust_cname.'</b>, Your order #'.$row['payment_id'].' has been confirmed.  <br>
                                       To proceed to payment, please click the link below or go to your Standly Hardware app and follow the procedure for the payment.<br>
                                       <a href="https://standlyhardware.com/customer-order">Proceed to payment</a></p></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Order #'.$row['payment_id'].' Details: </h3>
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

if(isset($_POST['form3'])) {
	$valid = 1;

    $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE id=?");
        $statement->execute(array($_POST['ID']));
        $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2 as $row2) {
            
        }


    if($valid == 1) {
    
        
    
    	$statement = $pdo->prepare("UPDATE tbl_payment SET 
    	decline_note='".$_POST['decline_note']."',
        order_status='Declined'
    	WHERE id='".$_POST['ID']."'");
    	$statement->execute();
    	$success_message = 'Order Request Declined!';
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
        }
        
        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
        $statement->execute(array($_POST['payment_ID']));
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
                                <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><strong>Order Confirmation: <b> Declined</strong></p></td>
                                </tr>
                                </table>
                            ';
        }
        
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($_POST['payment_ID']));
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
        // sending email
        $to_customer = $cust_email;
        $subject = 'Standly Hardware || Order #'.$row['payment_id'].' Declined ';
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
                                       <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:55px;mso-line-height-rule:exactly;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Your Order has been Declined.</h1></td>
                                      </tr>
                                      <tr>
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello  <b>'.$cust_name.' '.$cust_cname.'</b>, Your order #'.$row['payment_id'].' has been Declined.
                                       </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Order #'.$row['payment_id'].'Details: </h3>
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

if(isset($_POST['form5'])) {
	$valid = 1;

    $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE id=?");
        $statement->execute(array($_POST['ID']));
        $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2 as $row2) {
            
        }


    if($valid == 1) {
    
    	$statement = $pdo->prepare("UPDATE tbl_payment SET 
    	decline_payment='".$_POST['decline_notes']."',
        payment_status='Declined'
    	WHERE id='".$_POST['ID']."'");
    	$statement->execute();
    	$success_message = 'Payment Receipt is Declined!';
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
        }
        
        $order_detail = '';
        $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
        $statement->execute(array($_POST['payment_ID']));
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
                                <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><strong>Order Confirmation: <b> Confirmed</strong></p></td>
                                </tr>
                                <tr>
                                <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-left:10px"><p style="Margin:5px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px;width: 100%;"><strong>Shipping Status: <b> '.$row['payment_status'].'</strong></p></td>
                                </tr>
                                </table>
                                
                            ';
        }
        
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement->execute(array($_POST['payment_ID']));
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
        // sending email
        $to_customer = $cust_email;
        $subject = 'Standly Hardware || Order #'.$row['payment_id'].' Payment Receipt Declined ';
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
                                       <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:55px;mso-line-height-rule:exactly;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Your Payment Receipt has been <b>Declined</b>.</h1></td>
                                      </tr>
                                      <tr>
                                       <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$cust_name.' '.$cust_cname.'</b>, Your order #'.$row['payment_id'].' Payment Receipt has been Declined.  <br>
                                       Please check the details carefully before submitting the request. If you reach the limit of attempt, your order is no longer be able to process.
                                       </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                
                                <h3>Order #'.$row['payment_id'].' Details: </h3>
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


?>
<?php
if($error_message != '') {
    echo "<script>alert('".$error_message."')</script>";
}
if($success_message != '') {
    echo "<script>alert('".$success_message."')</script>";
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Online Orders</h1></div> 
		<div>
<form action="PrintSalesAll.php" method="POST">
<?php if($status == 'weekly'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_date" value="<?php echo $start_dates?>">
<input type="hidden" name="end_date" value="<?php echo $end_dates?>">
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
<?php elseif($status == 'all'):?>
<input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>">
<input type="hidden" name="start_datee" value="<?php echo $start_datee?>">
<input type="hidden" name="end_datee" value="<?php echo $end_datee?>">
<?php endif;?>
	<a href ="view_order_page.php" class="btn btn-primary btn-l" style ="float:right;">Switch View</a>
</form>

</div>
</section>

<div>
    <div class="tab-report" style="margin-left:1%; padding:10px 5px 10px 5px">
        <div class="tab-week">
                <a href="order.php?status=all" class="btn btn-sm btn-success"><i class="fa fa-search" aria-hidden="true"></i></a>
                <a href="order.php?status=daily" class="btn btn-sm btn-success">DAILY</a>
                <a href="order.php?status=weekly" class="btn btn-sm btn-success">WEEKLY</a>
                <a href="order.php?status=monthly" class="btn btn-sm btn-success">MONTHLY</a>
                <a href="order.php?status=yearly" class="btn btn-sm btn-success">YEARLY</a>
        </div>
            <?php //echo "<h3> TOTAL SALES : ₱ ".formatMoney ($totalAmount, true)."<br><br>
                    //    TOTAL PROFIT : ₱ ".formatMoney ($OrderPrice, true)."</h3>"; ?>
    <div>
        <?php if(isset($_GET['status'])):
            $status = $_GET['status'];
      ?>
            <?php if($status == 'weekly'):
                    $date_nows = date('Y-m-d');
                    $date_weeks = (isset($_POST['start_date']) ? date("Y-m-d", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d", strtotime("+1 week")));    
            ?>
            <div style="margin-left:0%; padding:10px 5px 10px 5px">
                <form action="order.php?status=weekly" method="POST">
                    <input type="date" name="start_date" id="start_date" style="width: 175px; height:30px;"  value="<?php echo (isset($_POST['start_date']) ? $_POST['start_date'] : $date_nows)?>">
                    <input type="date" readonly name="end_date" style="width: 175px; height:30px;"  id="end_date" value="<?php echo $date_weeks?>">
							<button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
							   <?php if(isset($_POST['start_date']) && isset($_POST['end_date'])):?>
							   <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_dates)).
                                 " - ".date('F d, Y', strtotime($end_dates));?></b></h3>
							<h3 style ="float:right; margin-right:1%;">WEEKLY: </h3>
							<?php else:?>
							<h3 style ="float:right; margin-right:3%;">WEEKLY ORDERS</h3>
							<?php endif;?>
                </form>
            </div>
            <?php  elseif($status == 'all'):
                $date_nowss = date('Y-m-d');
                $date_weekss = date('Y-m-d'); ?>
            <div style="margin-left:0%; padding:10px 5px 10px 5px">
                <form action="order.php?status=all" method="POST">
                    
                    <input type="date" name="start_datee" id="start_datee" style="width: 175px; height:30px;" value="<?php echo (isset($_POST['start_datee']) ? $_POST['start_datee'] : $date_nowss)?>">
                    
                    <input type="date" name="end_datee" id="end_datee" style="width: 175px; height:30px;" value="<?php echo (isset($_POST['end_datee']) ? $_POST['end_datee'] : $date_weekss)?>">
                    <button type="submit" class="btn btn-primary" style="width: 100px; height:35px;" >Search</button>
                    <?php if (isset($_POST['start_datee']) && isset($_POST['end_datee']) ):?>
                    <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y', strtotime($start_datee));?>
                                  - <?php echo date('F d, Y',strtotime($end_datee));?></b></h3>
                                  <h3 style ="float:right; margin-right:1%;">ORDERS:</h3>
                    <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">ORDERS</h3>
                    <?php endif; ?>
                </form>
            </div>
            <?php elseif($status == 'monthly'):?> 
                <div style="margin-left:0%; padding:10px 5px 10px 5px">
                    <form action="order.php?status=monthly" method="POST">
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
                        <h3 style ="float:right; margin-right:1%;">MONTHLY:</h3>
                        <?php else:?>
                        <h3 style ="float:right; margin-right:3%;">MONTHLY ORDERS</h3>
                        <?php endif; ?>
                    </form>
                </div>
            <?php elseif($status == 'yearly'):?>
                <div style="margin-left:0%; padding:10px 5px 10px 5px">
                    <form action="order.php?status=yearly" method="POST">
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
                        <h3 style ="float:right; margin-right:1%;">YEARLY: </h3>
                        <?php else:?>
                        <h3 style ="float:right; margin-right:3%;">YEARLY ORDERS </h3>
                        <?php endif;?>
                    </form>
                </div>
            <?php elseif($status == 'daily'):
                $date_nows = date('Y-m-d');
                $day_ends = (isset($_POST['start_day']) ? date("Y-m-d", strtotime($_POST['start_day']."+1 day")) : date("Y-m-d"));    
            ?>
                <div style="margin-left:0%; padding:10px 5px 10px 5px">
                <form action="order.php?status=daily" method="POST">
                    <input type="date" name="start_day" id="start_day" style="width: 175px; height:30px; font-size:10px;" value="<?php echo (isset($_POST['start_day']) ? $_POST['start_day'] : $date_nows)?>">
                     <button type="submit" class ="btn btn-primary" style="width: 100px; height:35px;">Search</button>
                     
                    <?php if(isset($_POST['start_day'])):?>
                    <h3 style ="float:right; margin-right:2%;"><b><?php echo date('F d, Y',strtotime($daily));?></b></h3>
                    <h3 style ="float:right; margin-right:1%;">DAILY: </h3>
                    <?php else:?>
                    <h3 style ="float:right; margin-right:3%;">DAILY ORDERS</h3>
                    <?php endif;?>
                </form>
                 
            </div>
            <?php endif;?>
        <?php endif;?>
    </div>
</div>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
			        <th width ="1%">#</th>
                    <th width ="15%">Customer Details</th>
			        <th >Product Details</th>
                    <th width ="15%">Payment Information</th>
                    <th width = "10%">Total Amount</th>
                    <th width ="10%">Order Status</th>
                    <th width ="10%">Payment Status</th>
                    <th width ="10%">Shipping Status</th>
                    <th width ="10%">Delivery Status</th>
                    <!-- <th>Return Status</th> -->
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
            						
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr class="<?php if($row['delivery_status']=='Completed'){echo 'bg-g';}else{echo 'bg-r';} ?>">
	                    <td><?php echo $i; ?></td>
	                    <td>
                            <!--<b>Customer ID:</b> <?php // echo $row['customer_id']; ?><br>-->
                            <b>Customer Name:</b> <?php echo $row['customer_name']; ?><br>
                            <b>Customer Email:</b> <?php echo $row['customer_email']; ?><br>
                            <br><a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">Send Message</a>
                            <div id="model-<?php echo $i; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="font-weight: bold;">Send Message</h4>
										</div>
										<div class="modal-body" style="font-size: 14px">
											<form action="" method="post">
                                                <input type="hidden" name="cust_id" value="<?php echo $row['customer_id']; ?>">
                                                <input type="hidden" name="payment_id" value="<?php echo $row['payment_id']; ?>">
												<table class="table table-bordered">
													<tr>
														<td>Subject</td>
														<td>
                                                            <input type="text" name="subject_text" class="form-control" style="width: 100%;">
														</td>
													</tr>
                                                    <tr>
                                                        <td>Message</td>
                                                        <td>
                                                            <textarea name="message_text" class="form-control" cols="30" rows="10" style="width:100%;height: 200px;"></textarea>
                                                        </td>
                                                    </tr>
													<tr>
														<td></td>
														<td><input type="submit" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;" value="Send Message" name="form1"></td>
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
							                            <br><a href="view_order.php?payment_id=<?php echo $row['payment_id']; ?>" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;"> Switch View</a>

                        </td>
                        <td>
                           <?php
                           $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
                           $statement1->execute(array($row['payment_id']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                          foreach ($result1 as $row1) {
                                echo '<b>Product:</b> '.$row1['product_name'];
                                echo '<br><b>Unit of Measurement:</b> '.$row1['size'];
                                echo '<br><b>Color:</b> '.$row1['color'];
                                echo '<br><b>Quantity:</b> '.$row1['quantity'];
                                echo '<br><b>Price:</b> '.formatMoney ($row1['unit_price'], true);
                                echo '<br><br>';
                           }
                           ?>
                        </td>
                        <td>
                        	<?php if($row['payment_method'] == 'PayPal'): ?>
                        		<b>PAYMENT METHOD:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>TRANSACTION ID:</b> TRN<?php echo $row['payment_id']; ?><br>
                        		<b>PAYMENT ID:</b> <?php echo $row['payment_id']; ?><br>
                        		<b>DATE:</b> <?php $wop = $row['payment_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?><br>
                            <?php elseif($row['payment_method'] == 'Cash on Delivery'): ?>
                        		<b>Payment Method:</b> <br><?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID: </b><?php echo $row['payment_id']; ?><br>
                        		<b>Date: </b> <?php $wop = $row['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?><br>
                            <?php elseif($row['payment_method'] == 'Cash on Pickup'): ?>
                        		<b>Payment Method: </b><br> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID: </b><?php echo $row['payment_id']; ?><br>
                        		<b>Date: </b> <?php $wop = $row['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?><br>
                        	<?php elseif($row['payment_method'] == 'GCash'): ?>
                        		<b>Payment Method: </b> <br><?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID:</b> <?php echo $row['payment_id']; ?><br>
                        		<b>Payment Attempt:</b> <?php echo $row['attempt']; ?><br>
								<b>Date: </b> <?php $wop = $row['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?><br>
                        		<b>Customer Notes:</b> <br>- <?php echo $row['bank_transaction_info']; ?><br>
                        	<?php elseif($row['payment_method'] == 'Bank Deposit'): ?>
                        		<b>- PAYMENT METHOD:</b> <br><?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>- PAYMENT ID:</b> <?php echo $row['payment_id']; ?><br>
								<b>- DATE:</b> <?php $wop = $row['payment_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?><br>
                        		<b>- TRANSACTION INFORMATION:</b> <br><?php echo $row['bank_transaction_info']; ?><br>
                        	<?php endif; ?>
                        </td>
                        <td>
                           
                             <p style ="float:right;">₱<?php echo formatMoney ($row['paid_amount'], true); ?></p></td>
                        <td>
                            <!--<b> ORDER STATUS </b><br>-->
                            <?php $status = $row['order_status']; ?>
                            <?php if($row['order_status'] == 'Pending'): ?>
                            <b>Order Pending</b>
                            <?php elseif($row['order_status'] == 'Accepted'): ?>
                            <b>Order Confirmed</b>
                            <?php elseif($row['order_status'] == 'Accepted.'): ?>
                            <b>Order Confirmed</b>
                            <?php elseif($row['order_status'] == 'Declined'): ?>
                            <b><span style="color:red;">Declined</b></span>
                            <?php endif; ?>
                            
                            <br><br><br>
                            <?php
                                if($row['order_status']=='Pending'){
                                    if($row['payment_method']=='GCash'){
                                        ?>
                                            <!-- <a href="order-status.php?id=<?php echo $row['id']; ?>&task=Accepted." class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Accept Order</a> -->
                                            <form action="" method="post">
                                                <input type="hidden" name="cust_id" value="<?php echo $row['customer_id']; ?>">
                                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                                                <input type="hidden" name="payment_ID" value="<?php echo $row['payment_id'];?>">
                                                <input type="hidden" name="prod_ID" value="<?php echo $row1['product_id'];?>">
                                                <input type="hidden" name="prod_QTY" value="<?php echo $row1['quantity'];?>">
                                                <button type="submit" name="form4" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;">Confirm Order</button>
                                            </form>

                                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>1"class="btn btn-danger btn-l" style="width:100%;margin-bottom:4px;">Decline Order</a>
                                            <div id="model-<?php echo $i; ?>1" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title" style="font-weight: bold;">Decline Order Request</h4>
                                                        </div>
                                                        <div class="modal-body" style="font-size: 14px">
                                                            <form action="" method="post">
                                                                <table class="table table-bordered">
                                                                    
                                                                    <tr>
                                                                        <td>Notes to Customer</td>
                                                                        <td>
            								                                <input type="hidden" name="cust_id" value="<?php echo $row['customer_id']; ?>">
                                                                            <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                                                                            <input type="hidden" name="payment_ID" value="<?php echo $row['payment_id'];?>">

                                                                            <textarea name="decline_note" class="form-control" cols="30" rows="10" style="width:100%;height: 200px;"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><input type="submit" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;" value="Send Message" name="form3"></td>
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
                                    ?>
                                    <!-- <a href="order-status.php?id=<?php echo $row['id']; ?>&task=Accepted" class="btn btn-success btn-xs" style="width:100%;margin-bottom:4px;">Accept Order</a> -->
                                            <form action="" method="post">
                                                <input type="hidden" name="cust_id" value="<?php echo $row['customer_id']; ?>">
                                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                                                <input type="hidden" name="payment_ID" value="<?php echo $row['payment_id'];?>">
                                                <input type="hidden" name="prod_ID" value="<?php echo $row1['product_id'];?>">
                                                <input type="hidden" name="prod_QTY" value="<?php echo $row1['quantity'];?>">
                                                <button type="submit" name="form2" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;">Confirm Order</button>
                                            </form>

                                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>1"class="btn btn-danger btn-l" style="width:100%;margin-bottom:4px;">Decline Order</a>
                                            <div id="model-<?php echo $i; ?>1" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title" style="font-weight: bold;">Decline Order Request</h4>
                                                        </div>
                                                        <div class="modal-body" style="font-size: 14px">
                                                            <form action="" method="post">
                                                                <table class="table table-bordered">
                                                                    
                                                                    <tr>
                                                                        <td>Notes to Customer</td>
                                                                        <td>
            								                                <input type="hidden" name="cust_id" value="<?php echo $row['customer_id']; ?>">
                                                                            <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                                                                            <input type="hidden" name="payment_ID" value="<?php echo $row['payment_id'];?>">

                                                                            <textarea name="decline_note" class="form-control" cols="30" rows="10" style="width:100%;height: 200px;"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><input type="submit" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;" value="Send Message" name="form3"></td>
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
                        <br><br>
                        </td>
                        <td>
                            <b>PAYMENT STATUS:</b><br>
                            <span style="color:red;"><b><?php echo $row['payment_status']; ?></b></span><br><br>
                
                            <?php
                            if($row['order_status']!=='Pending') {
                                if($row['payment_method']=='GCash'){
                                    if($row['payment_status']=='Pending'){
                                        if($row['photo']!==''){
                                        ?>
                                        <b>PAYMENT RECEIPT:</b>

                                           <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['payment_id']; ?>"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">View Receipt</a>
                                                <div id="model-<?php echo $row['payment_id']; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <b>PAYMENT RECEIPT</b>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <form action="" method="post">
                                                                    <table class="table table-bordered">
                                                                    <tr>
                                                                            <td>PAYMENT ID : <?php echo $row['payment_id']; ?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>PAYMENT DATE : <?php $wop = $row['payment_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            <img class="" src="../assets/uploads/payment_receipt/<?php echo $row['photo']; ?>" style="width:100%;margin-top:20px;border-radius:0;">
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
                                            <a href="order-change-status.php?id=<?php echo $row['id']; ?>&cust_id=<?php echo $row['customer_id']; ?>&task=Paid" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Mark as Paid</a>
                                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>1"class="btn btn-danger btn-l" style="width:100%;margin-bottom:4px;">Decline Receipt</a>
                                            <div id="model-<?php echo $i; ?>1" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title" style="font-weight: bold;">Decline Payment Receipt</h4>
                                                        </div>
                                                        <div class="modal-body" style="font-size: 14px">
                                                            <form action="" method="post">
                                                                <table class="table table-bordered">
                                                                    
                                                                    <tr>
                                                                        <td>Notes to Customer</td>
                                                                        <td>
            								                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
            								                                <input type="hidden" name="cust_id" value="<?php echo $row['customer_id']; ?>">
                                                                            <input type="hidden" name="payment_ID" value="<?php echo $row['payment_id'];?>">

                                                                            <textarea name="decline_notes" class="form-control" cols="30" rows="10" style="width:100%;height: 200px;"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><input type="submit" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;" value="Send Message" name="form5"></td>
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
                                        }else {
                                            echo '';
                                            ?>
                                        <?php
                                    }}else {
                                        ?>
                                        <b>PAYMENT RECEIPT:</b>
                                           <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['payment_id']; ?>"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">View Receipt</a>
                                                <div id="model-<?php echo $row['payment_id']; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <b>PAYMENT RECEIPT</b>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <form action="" method="post">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>PAYMENT ID : <?php echo $row['payment_id']; ?></td>

                                                                        </tr>
                                                                        <!--<tr>-->
                                                                        <!--    <td>PAYMENT DATE : <?php // $wop = $row['pay_date']; date("l | m-d-Y | h:i:s A", strtotime($wop)) ?></td>-->

                                                                        <!--</tr>-->
                                                                        <tr>
                                                                            <td>
                                                                            <img class="" src="../assets/uploads/payment_receipt/<?php echo $row['photo']; ?>" style="width:100%;margin-top:20px;border-radius:0;">
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

                                        <?php
                                        ?>
                                    <?php
                                }}else {
                                    ?>
                                    <?php
                                }
                            }
                            ?>
                            <br><br>
                        </td>
                        <td>
                            <b>SHIPPING STATUS:</b><br>
                            <?php echo $row['shipping_status']; ?>
                            <br><br><br>

                            <?php
                            if($row['shipping_status']!=='Pending') { ?>

                             <!--<a href="print_receipt.php?payment_id=<?php //echo $row['payment_id']; ?>" class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">Print Receipt</a> -->
                             <!--<p>Delivery Receipt</p>-->
                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['payment_id']; ?>5"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">Print Receipt</a>
                            
                                                <div id="model-<?php echo $row['payment_id']; ?>5" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <b>PRINT DELIVERY RECEIPT</b>
                                                            </div>
                                                            <div class="" style="font-size: 14px">
                                                                <iframe src="print_receipt.php?payment_id=<?php echo $row['payment_id']; ?>" width="100%" height="170" style="border:1px solid black;"></iframe>
                                                            </div>
                                                            <!--<div class="">-->
                                                            <!--    <button type="button" class="btn btn-default" data-dismiss="">Close</button>-->
                                                            <!--</div>-->
                                                        </div>
                                                    </div>
                                                    </div>
                                <?php
                                                }
                                                ?>
                            <?php
                            if($row['payment_status']=='Paid') {
                                if($row['shipping_status']=='Pending'){
                                    ?>
                                    <a href="shipping-change-status.php?id=<?php echo $row['id']; ?>&cust_id=<?php echo $row['customer_id']; ?>&task=Shipped Out" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Ready to Ship</a>
                                    <?php
                                }
                            }elseif($row['payment_status']=='Cash on Delivery') {
                                if($row['shipping_status']=='Pending'){
                                    if($row['order_status']=='Accepted'){
                                        ?>
                                        <a href="shipping-change-status.php?id=<?php echo $row['id']; ?>&cust_id=<?php echo $row['customer_id']; ?>&task=Shipped Out" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Ready to Ship</a>
                                        <?php
                                    }
                                }
                            }elseif($row['payment_status']=='Cash on Pickup') {
                                if($row['shipping_status']=='Pending'){
                                    if($row['order_status']=='Accepted'){
                                        ?>
                                        <a href="shipping-change-status.php?id=<?php echo $row['id']; ?>&cust_id=<?php echo $row['customer_id']; ?>&task=Pickup" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Ready to Pickup</a>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </td>

                        <td>
                            <b>DELIVERY STATUS:</b><br>
                            <?php echo $row['delivery_status']; ?><br>
                            <?php
                                if($row['shipping_status']=='Shipped Out') {
                                    if($row['delivery_status']!=='Completed'){

                						$result1 = $pdo->prepare("SELECT photo_receipt, date_receipt
                												FROM tbl_payment 
                												WHERE payment_id=?"); 
                						$result1->execute(array($row['payment_id']));
                						$result = $result1->fetchAll(PDO::FETCH_ASSOC);
                						$photo = $result[0]["photo_receipt"];
                						$dateupload = $row["date_receipt"];?>


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
                                                                        
                                                                        <tr>
                                                                            <td>Delivery Receipt</td>
                                                                            <td>
                                                                                <input type="hidden" name="PaymentID" value="<?php echo $row['payment_id'];?>">
                                                                                <input type="hidden" name="cust_id" value="<?php echo $row['customer_id'];?>">
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
            						<?php }else { 
                                        if(empty($row['photo_receipt'])) {
                                            echo '';
                                            }else{ ?>
            						
            						    <br>
                                        <b>DELIVERY RECEIPT:</b><br>
            							<!-- <a href="javascript:void(0);" class="btn btn-l btn-primary image_show" style="width:100%;margin-bottom:4px;" data-image="<?php echo $photo;?>">View Delivery Receipt</a> -->
                                        <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['payment_id']; ?>4"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">View Receipt</a>
                                                <div id="model-<?php echo $row['payment_id']; ?>4" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <b>DELIVERY RECEIPT</b>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <form action="" method="post">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>DELIVERY ID : <?php echo $row['payment_id']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            <img class="" src="../assets/uploads/delivery_receipt/<?php echo $row['photo_receipt']; ?>" style="width:100%;margin-top:20px;border-radius:0;">
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
                                }}
                                ?>
                                    <?php
                                
                                }elseif($row['shipping_status']=='Pickup') {
                                    if($row['delivery_status']!=='Completed'){

                                    ?>
                                    <?php
                						$result1 = $pdo->prepare("SELECT photo_receipt, date_receipt
										FROM tbl_order 
										WHERE payment_id=?"); 
                						$result1->execute(array($row['payment_id']));
                						$result = $result1->fetchAll(PDO::FETCH_ASSOC);
                						$photo = $result[0]["photo_receipt"];
                						$dateupload = $row["date_receipt"];?>

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
                                                                    
                                                                    <tr>
                                                                        <td>Delivery Receipt</td>
                                                                        <td>
                                                                            <input type="hidden" name="PaymentID" value="<?php echo $row['payment_id'];?>">
                                                                            <input type="hidden" name="cust_id" value="<?php echo $row['customer_id'];?>">
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
            							
                                        <?php }else { 
                                            // if($row['photo_receipt'] == "" || $row['photo_receipt'] == NULL) {
                                                if(empty($row['photo_receipt'])) {
                                                echo '';
                                                }else{ ?>
                                            

                                        <br>
                                        <b>DELIVERY RECEIPT:</b><br>
            							<!-- <a href="javascript:void(0);" class="btn btn-l btn-primary image_show" style="width:100%;margin-bottom:4px;" data-image="<?php echo $photo;?>">View Delivery Receipt</a> -->
                                        <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['payment_id']; ?>4"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">View Receipt</a>
                                                <div id="model-<?php echo $row['payment_id']; ?>4" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <b>DELIVERY RECEIPT</b>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <form action="" method="post">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>DELIVERY ID : <?php echo $row['payment_id']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            <img class="" src="../assets/uploads/delivery_receipt/<?php echo $row['photo_receipt']; ?>" style="width:100%;margin-top:20px;border-radius:0;">
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
                            }?>
                        </td>

                        <!-- <td>
                            <?php
                            if($row['delivery_status']=='Completed') {
                                if($row['return_status']==''){
                                    ?>
                                        <?php echo "No Return Request"?>
                                    <?php
                                }elseif($row['return_status']=='Request'){
                                    ?>
                                    <a href="return_ordering.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs" style="width:100%;margin-bottom:4px;">View Return Request</a>
                                    <?php 
                                }else{
                                    ?>
                                    <?php echo "Returned"?>
                                    <?php 
                                }
                            }
                            ?> -->

	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div>
  

</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show-reciept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delivery Receipt:</h4>
            </div>
            <div class="modal-body">
              <img id="image_here" style="width:100%;margin-top:20px;border-radius:0; src="" alt="">
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
		$(document).ready(function(){
			$('.image_show').on('click',function(e){
				e.preventDefault();
				var imgFile = $(this).data('image');
				let img = document.getElementById('image_here');
				img.src = '../assets/uploads/delivery_receipt/'+imgFile;
				$('#show-reciept').modal('show');
			})
		})
</script>
<script src="assets/js/jquery-2.2.4.min.js"></script>

  <script>
$(document).ready(function () {
    sub_photo = $('#sub_photo').val();

        $('#sub_receipt').prop("disabled", true);
        if ( sub_photo == '' ) {
              $('#sub_receipt').prop("disabled", true);
        }
        $('#sub_photo').on('change',function() {
            sub_photo = $('#sub_photo').val();
            if ( sub_photo == '' ) {
            	$('#sub_receipt').prop("disabled", true);
            }else {
                $('#sub_receipt').prop("disabled", false);
            }
        });
});
</script>
<script>
$(document).ready(function () {
    sub_photo1 = $('#sub_photo1').val();

        $('#sub_receipt1').prop("disabled", true);
        if ( sub_photo1 == '' ) {
              $('#sub_receipt1').prop("disabled", true);
        }
        $('#sub_photo1').on('change',function() {
            sub_photo1 = $('#sub_photo1').val();
            if ( sub_photo == '' ) {
            	$('#sub_receipt1').prop("disabled", true);
            }else {
                $('#sub_receipt1').prop("disabled", false);
            }
        });
});
</script>