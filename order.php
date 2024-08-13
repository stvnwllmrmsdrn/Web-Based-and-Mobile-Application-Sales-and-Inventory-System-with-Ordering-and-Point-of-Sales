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
Customer Name: '.$row['customer_name'].'<br>
Customer Email: '.$row['customer_email'].'<br>
Payment Method: '.$row['payment_method'].'<br>
Payment Date: '.$row['payment_date'].'<br>
Payment Details: <br>'.$payment_details.'<br>
Paid Amount: '.$row['paid_amount'].'<br>
Order Status: '.$row['order_status'].'<br>
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
                   <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello '.$_POST['cust_name'].' '.$_POST['cust_cname'].', Thanks for choosing Standly Hardware :). </p></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
            <table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
            <h3>Message: </h3>
            '.$message_text.'
            <h3>Order Details: </h3>
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
        $headers = 'From: ' . $admin_email . "\r\n" .
                   'Reply-To: ' . $admin_email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Sending email to admin                  
        mail($to_customer, $subject_text, $message, $headers);
        
        $success_message = 'Your email to customer is sent successfully.';

    }
}

// if(isset($_POST['form1pic'])) {
// 	$valid = 1;
//     $path = $_FILES['photo']['name'];
//     $path_tmp = $_FILES['photo']['tmp_name'];

//     if($path == '') {
//     	$valid = 0;
//         $error_message .= "You must have to select a photo<br>";
//     } else {
//     	$ext = pathinfo( $path, PATHINFO_EXTENSION );
//         $file_name = basename( $path, '.' . $ext );
//         if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
//             $valid = 0;
//             $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
//         }
//     }

//     if($valid == 1) {
    
//     	// getting auto increment id
//     	$date = date('Y-m-d h:i:s');
//     	$final_name = 'del-receipt-'.$_POST['PaymentID'].'.'.$ext;
//     	move_uploaded_file( $path_tmp, '../assets/uploads/delivery_receipt/'.$final_name );
    
//     	$statement = $pdo->prepare("UPDATE tbl_payment SET 
//         delivery_status='Completed',
//     	photo_receipt='".$final_name."',
//     	date_receipt='".$date."'
//     	WHERE payment_id='".$_POST['PaymentID']."'");
//     	$statement->execute();
//     	$success_message = 'Delivery Receipt is added successfully uploaded!';
    	
//         header("Refresh:0");
//     } 
// }

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
    	
        $i=0;
	    $statement = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
	    $statement->execute(array($_POST['PaymentID']));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row5) {
	    	$i++;
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
                                        product_id,
                                        product_name,
                                        product_price,
                                        quantity,
                                        total_amount,
                                        profit,
                                        date
                                    )   VALUES (?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        $_POST['PaymentID'],
                                        $p_id,
                                        $p_name,
                                        $selling_price,
                                        $p_qty,
                                        $amount,
                                        $total_profit,
                                        $payment_date
                                        
                                ));

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
	    	$payment_method= $row6['payment_method'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
	    $statement->execute(array($cust_id));
	    $result4 = $statement->fetchAll(PDO::FETCH_ASSOC);							
	    foreach ($result4 as $row7) {
	    	
	    	$cust_id= $row7['customer_id'];
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

        $success_message = 'Order is Completed, Product is updated successfully.';



        header("Refresh:0");
        }
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

    if($valid == 1) {
    
    	$statement = $pdo->prepare("UPDATE tbl_payment SET 
        order_status='Accepted'
    	WHERE id='".$_POST['ID']."'");
    	$statement->execute();
        
        
        $final_quantity = $current_qty - $order_p_qty[$i];
        $statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
        $statement->execute(array($final_quantity,$order_p_id[$i]));

        $success_message = 'Order Accepted, Product is updated successfully.';
        header("Refresh:0");
        }
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

    if($valid == 1) {
        $date = date('Y-m-d H:i:s');
    
    	$statement = $pdo->prepare("UPDATE tbl_payment SET 
        order_status='Accepted.',
        order_accept_date='".$date."'
    	WHERE id='".$_POST['ID']."'");
    	$statement->execute();
        
        
        $final_quantity = $current_qty - $order_p_qty[$i];
        $statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
        $statement->execute(array($final_quantity,$order_p_id[$i]));

        $success_message = 'Order Accepted, Product is updated successfully.';
        header("Refresh:0");
        }
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
    	$success_message = 'Payment Receipt is Marked as Invalid!';
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

<section class="content-header">
	<div class="content-header-left">
		<h1>View Online Orders</h1>
	</div>
    <div>
<a href ="PrintOrders.php" style ="float:right;" class="btn btn-success btn-sm"> Print</a>
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
            	$statement = $pdo->prepare("SELECT * FROM tbl_payment ORDER by id DESC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr class="<?php if($row['delivery_status']=='Completed'){echo 'bg-g';}else{echo 'bg-r';} ?>">
	                    <td><?php echo $i; ?></td>
	                    <td>
                            <b>Customer ID:</b> <?php echo $row['customer_id']; ?><br>
                            <b>Customer Name:</b> <?php echo $row['customer_name']; ?><br>
                            <b>Customer Email:</b> <?php echo $row['customer_email']; ?><br><br>
                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">Send Message</a>
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
                                <b>PAYMENT DETAILS</b><br>
                        		<b>Payment Method:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID: </b><?php echo $row['payment_id']; ?><br>
                        		<b>Date: </b> <?php $wop = $row['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?><br>
                            <?php elseif($row['payment_method'] == 'Cash on Pickup'): ?>
                                <b>PAYMENT DETAILS</b><br>
                        		<b>Payment Method: </b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID: </b><?php echo $row['payment_id']; ?><br>
                        		<b>Date: </b> <?php $wop = $row['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?><br>
                        	<?php elseif($row['payment_method'] == 'GCash'): ?>
                                <b>PAYMENT DETAILS</b><br>
                        		<b>Payment Method: </b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>Payment ID:</b> <?php echo $row['payment_id']; ?><br>
                        		<b>ATTEMPT:</b> <?php echo $row['attempt']; ?><br>
								<b>Date: </b> <?php $wop = $row['payment_date']; print date("l | F d, Y | h:i:s A", strtotime($wop)) ?><br>
                        		<b>Customer Notes:</b> <br>- <?php echo $row['bank_transaction_info']; ?><br>
                        	<?php elseif($row['payment_method'] == 'Bank Deposit'): ?>
                                <b>PAYMENT DETAILS</b><br>
                        		<b>- PAYMENT METHOD:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                        		<b>- PAYMENT ID:</b> <?php echo $row['payment_id']; ?><br>
								<b>- DATE:</b> <?php $wop = $row['payment_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?><br>
                        		<b>- TRANSACTION INFORMATION:</b> <br><?php echo $row['bank_transaction_info']; ?><br>
                        	<?php endif; ?>
                        </td>
                        <td>
                           
                             <p style ="float:right;">₱<?php echo formatMoney ($row['paid_amount'], true); ?></p></td>
                        <td>
                            <b> REQUEST STATUS: </b><br>
                            <?php echo $row['order_status']; ?>
                            <br><br><br><br>
                            <?php
                                if($row['order_status']=='Pending'){
                                    if($row['payment_method']=='GCash'){
                                        ?>
                                            <!-- <a href="order-status.php?id=<?php echo $row['id']; ?>&task=Accepted." class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Accept Order</a> -->
                                            <form action="" method="post">
                                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                                                <input type="hidden" name="payment_ID" value="<?php echo $row['payment_id'];?>">
                                                <input type="hidden" name="prod_ID" value="<?php echo $row1['product_id'];?>">
                                                <input type="hidden" name="prod_QTY" value="<?php echo $row1['quantity'];?>">
                                                <button type="submit" name="form4" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;">Accept Order</button>
                                            </form>

                                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>1"class="btn btn-danger btn-l" style="width:100%;margin-bottom:4px;">Decline Request</a>
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
            								                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">

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
                                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                                                <input type="hidden" name="payment_ID" value="<?php echo $row['payment_id'];?>">
                                                <input type="hidden" name="prod_ID" value="<?php echo $row1['product_id'];?>">
                                                <input type="hidden" name="prod_QTY" value="<?php echo $row1['quantity'];?>">
                                                <button type="submit" name="form2" class="btn btn-l btn-success" style="width:100%;margin-bottom:4px;">Accept Order</button>
                                            </form>

                                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>1"class="btn btn-danger btn-l" style="width:100%;margin-bottom:4px;">Decline Request</a>
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
            								                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">

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
                            <?php echo $row['payment_status']; ?>
                            <br><br><br>    
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
                                            <a href="order-change-status.php?id=<?php echo $row['id']; ?>&task=Paid" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Mark as Paid</a>
                                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>1"class="btn btn-danger btn-l" style="width:100%;margin-bottom:4px;">Invalid Receipt</a>
                                            <div id="model-<?php echo $i; ?>1" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title" style="font-weight: bold;">Mark Receipt as Invalid</h4>
                                                        </div>
                                                        <div class="modal-body" style="font-size: 14px">
                                                            <form action="" method="post">
                                                                <table class="table table-bordered">
                                                                    
                                                                    <tr>
                                                                        <td>Notes to Customer</td>
                                                                        <td>
            								                                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">

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
                                                                        <tr>
                                                                            <td>PAYMENT DATE : <?php $wop = $row['pay_date']; print date("l | m-d-Y | h:i:s A", strtotime($wop)) ?></td>

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
                            <br><br><br><br>

                            <?php
                            if($row['shipping_status']!=='Pending') { ?>

                            <!-- <a href="print_receipt.php?payment_id=<?php echo $row['payment_id']; ?>" class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">Print Receipt</a> -->
                            <a href="#" data-toggle="modal" data-target="#model-<?php echo $row['payment_id']; ?>5"class="btn btn-primary btn-l" style="width:100%;margin-bottom:4px;">Print Delivery Receipt</a>
                                                <div id="model-<?php echo $row['payment_id']; ?>5" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <b>PRINT DELIVERY RECEIPT</b>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <iframe src="print_receipt.php?payment_id=<?php echo $row['payment_id']; ?>" width="100%" height="170" style="border:1px solid black;"></iframe>
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
                            <?php
                            if($row['payment_status']=='Paid') {
                                if($row['shipping_status']=='Pending'){
                                    ?>
                                    <a href="shipping-change-status.php?id=<?php echo $row['id']; ?>&task=Shipped Out" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Ready to Ship</a>
                                    <?php
                                }
                            }elseif($row['payment_status']=='Cash on Delivery') {
                                if($row['shipping_status']=='Pending'){
                                    if($row['order_status']=='Accepted'){
                                        ?>
                                        <a href="shipping-change-status.php?id=<?php echo $row['id']; ?>&task=Shipped Out" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Ready to Ship</a>
                                        <?php
                                    }
                                }
                            }elseif($row['payment_status']=='Cash on Pickup') {
                                if($row['shipping_status']=='Pending'){
                                    if($row['order_status']=='Accepted'){
                                        ?>
                                        <a href="shipping-change-status.php?id=<?php echo $row['id']; ?>&task=Pickup" class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Ready to Pickup</a>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </td>

                        <td>
                            <b>DELIVERY STATUS:</b><br>
                            <?php echo $row['delivery_status']; ?><br><br>
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
                                                                <b>PAYMENT RECEIPT</b>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <form action="" method="post">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>PAYMENT ID : <?php echo $row['payment_id']; ?></td>
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

                                    <a href="#" data-toggle="modal" data-target="#model-<?php echo $i; ?>2"class="btn btn-success btn-l" style="width:100%;margin-bottom:4px;">Uplaod Receipt</a>
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
                                                                <b>PAYMENT RECEIPT</b>
                                                            </div>
                                                            <div class="modal-body" style="font-size: 14px">
                                                                <form action="" method="post">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>PAYMENT ID : <?php echo $row['payment_id']; ?></td>
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