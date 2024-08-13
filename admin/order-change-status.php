<?php require_once('header.php'); ?>

<?php
if( !isset($_REQUEST['id']) || !isset($_REQUEST['task']) ) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
	$total = $statement->rowCount();
	foreach ($result as $row) {
		$payment_id =$row['payment_id'];
	}
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php
  $date = date('Y-m-d H:i:s');

	$statement = $pdo->prepare("UPDATE tbl_payment SET payment_status=?,pay_accept_date=? WHERE id=?");
	$statement->execute(array($_REQUEST['task'],$date,$_REQUEST['id']));

	header('location: order.php');

	//Getting Customer Email Address
	$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
	$statement->execute(array($_REQUEST['cust_id']));
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
	$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
	$statement->execute(array($payment_id));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
	foreach ($result as $row) {
		
		if($row['payment_method'] == 'PayPal'):
			$payment_details = 'Transaction Id: '.$row['txnid'].'<br>';
		elseif($row['payment_method'] == 'Bank Deposit'):
			$payment_details = 'Transaction Details: <br>'.$row['bank_transaction_info'];
		endif;

		$order_detail .= '
			Name: <b>'.$cust_name.' '.$cust_cname.' </b><br>
			Email:<b> '.$row['customer_email'].'</b><br><br>
			Payment Date: <b>'.date("l | F d, Y | h:i:s A", strtotime($row['payment_date'])).'</b><br>
			Payment Method: <b>'.$row['payment_method'].'</b><br>
			Order Amount: <b>₱'.formatMoney ($row['paid_amount'], true).'</b><br><br>
			
			
			<h3>Order Status : </h3>
			<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#c8ecff" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#c8ecff;border-radius:0 10px 10px 0" role="presentation">
			<tr>
			<td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px"><strong>Order Confirmation: <b> Confirmed</strong></p></td>
			</tr>
			<tr>
			<td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-left:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px"><strong>Payment Status: <b> Paid</strong></p></td>
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
							<div style="margin: 10px;padding-bottom:10px;bgcolor="#c8ecff"">
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
	$subject = 'Standly Hardware || Order #'.$payment_id.' Payment Confirmation ';
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
								   <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello <b>'.$cust_name.'</b>, Your Payment in your order #'.$row['payment_id'].' has been confirmed.  <br>
								   The seller is now preparing your orders.
								   </p></td>
								  </tr>
								</table></td>
							  </tr>
							</table></td>
						  </tr>
						  <tr>
							<td align="left" valign="top" style="padding:20px;Margin:0;width:560px">
							<table cellpadding="0" cellspacing="0" class="es-content" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
							
							<h3>Order #'.$payment_id.' Details:</h3>
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
	$success_message = 'Your email to customer is sent successfully.';
	header("Refresh:0");

?>

