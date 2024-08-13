<?php require_once('head.php'); ?> 

<link rel="stylesheet" href="assets/css/main1.css">
<link rel="stylesheet" href="assets/css/styler.css">
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
<title> <?php echo $meta_keyword_home; ?> | Registration </title>

<?php
$cust_name = "";
$cust_cname = "";
$cust_email = "";
$cust_phone = "";
$cust_country = "";
$cust_state = "";
$cust_city = "";
$cust_zip = "";
$cust_address = "";
$cust_password = "";
$cust_re_password = "";




$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_registration = $row['banner_registration'];
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

// Getting Admin Email Address
        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $admin_email = $row['contact_email'];
        }


?>

<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['cust_name'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_123."<br>";
    }

    if(empty($_POST['cust_email'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_131."<br>";
    } else {
        if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= LANG_VALUE_134."<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
            $statement->execute(array($_POST['cust_email']));
            $total = $statement->rowCount();                            
            if($total) {
                $valid = 0;
                $error_message .= LANG_VALUE_147."<br>";
            }
        }
    }

    if(empty($_POST['cust_phone'])) {
        $valid = 0;
        $error_message .=  LANG_VALUE_124."<br>";
    }

    if(empty($_POST['cust_address'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_125."<br>";
    }

    if(empty($_POST['cust_country'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_126."<br>";
    }

    if(empty($_POST['cust_city'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_127."<br>";
    }

    if(empty($_POST['cust_state'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_128."<br>";
    }

    if(empty($_POST['cust_zip'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_129."<br>";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if(!empty($_POST["cust_password"]) && ($_POST["cust_re_password"] == $_POST["cust_password"])) {
        $password = test_input($_POST["cust_password"]);
        $cpassword = test_input($_POST["cust_re_password"]);
        if (strlen($_POST["cust_password"]) <= '8') {
            $valid = 0;
            $error_message .= "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $valid = 0;
            $error_message .= "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $valid = 0;
            $error_message .= "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $valid = 0;
            $error_message .= "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
    }
    elseif(!empty($_POST["cust_password"])) {
        $valid = 0;
        $error_message .= LANG_VALUE_139."<br>";
    } else {
        $valid = 0;
         $error_message .= "Password can not be empty   ";
    }

    $cust_name = strip_tags($_POST['cust_name']); 
    $cust_cname = strip_tags($_POST['cust_cname']);
    $cust_email = strip_tags($_POST['cust_email']);
    $cust_phone = strip_tags($_POST['cust_phone']);
    $cust_country = strip_tags($_POST['cust_country']);
    $cust_state = strip_tags($_POST['cust_state']);
    $cust_city = strip_tags($_POST['cust_city']);
    $cust_zip = strip_tags($_POST['cust_zip']);
    $cust_address = strip_tags($_POST['cust_address']);
    $cust_password = $_POST['cust_password'];
    $cust_re_password = $_POST['cust_re_password'];


    if($valid == 1) {

        $token = md5(time());
        $cust_datetime = date('Y-m-d h:i:s');
        $cust_timestamp = time();

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_customer (
                                        cust_name,
                                        cust_cname,
                                        cust_email,
                                        cust_phone,
                                        cust_country,
                                        cust_address,
                                        cust_city,
                                        cust_state,
                                        cust_zip,
                                        cust_b_name,
                                        cust_b_cname,
                                        cust_b_phone,
                                        cust_b_country,
                                        cust_b_address,
                                        cust_b_city,
                                        cust_b_state,
                                        cust_b_zip,
                                        cust_s_name,
                                        cust_s_cname,
                                        cust_s_phone,
                                        cust_s_country,
                                        cust_s_address,
                                        cust_s_city,
                                        cust_s_state,
                                        cust_s_zip,
                                        cust_password,
                                        cust_token,
                                        cust_datetime,
                                        cust_timestamp,
                                        cust_status
                                    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        strip_tags($_POST['cust_name']),
                                        strip_tags($_POST['cust_cname']),
                                        strip_tags($_POST['cust_email']),
                                        strip_tags($_POST['cust_phone']),
                                        strip_tags($_POST['cust_country']),
                                        strip_tags($_POST['cust_address']),
                                        strip_tags($_POST['cust_city']),
                                        strip_tags($_POST['cust_state']),
                                        strip_tags($_POST['cust_zip']),
                                        strip_tags($_POST['cust_name']),
                                        strip_tags($_POST['cust_cname']),
                                        strip_tags($_POST['cust_phone']),
                                        strip_tags($_POST['cust_country']),
                                        strip_tags($_POST['cust_address']),
                                        strip_tags($_POST['cust_city']),
                                        strip_tags($_POST['cust_state']),
                                        strip_tags($_POST['cust_zip']),
                                        strip_tags($_POST['cust_name']),
                                        strip_tags($_POST['cust_cname']),
                                        strip_tags($_POST['cust_phone']),
                                        strip_tags($_POST['cust_country']),
                                        strip_tags($_POST['cust_address']),
                                        strip_tags($_POST['cust_city']),
                                        strip_tags($_POST['cust_state']),
                                        strip_tags($_POST['cust_zip']),
                                        md5($_POST['cust_password']),
                                        $token,
                                        $cust_datetime,
                                        $cust_timestamp,
                                        0
                                    ));

        // Send email for confirmation of the account
        $to = $_POST['cust_email'];
        $from = 'Standly Hardware';
        
        $subject = 'Standly Hardware || Email Verification';
        $verify_link = BASE_URL.'standlyhardware.com/verify.php?email='.$to.'&token='.$token;
        $message = '<br><br>
        

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
                      <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:55px;mso-line-height-rule:exactly;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Thank you for your Registration!</h1></td>
                     </tr>
                     <tr>
                      <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:24px;color:#333333;font-size:16px">Hello '.$_POST['cust_name'].', Thanks for your Registration! Your account has been created. To activate your account, click the Verification button below:</p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr>
              <td class="esdev-adapt-off" align="left" style="padding:20px;background-color: #c8ecff;Margin:0">
               <table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
                 <tr>
                  <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                   <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                     <tr class="es-mobile-hidden">
                      <td align="left" style="padding:0;Margin:0;width:146px">
                       <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                         <tr>
                          <td align="center" height="40" style="padding:0;Margin:0"></td>
                         </tr>
                       </table></td>
                     </tr>
                   </table></td>
                  <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                   <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                     <tr>
                      <td align="left" style="padding:0;Margin:0;width:121px">
                       <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#c8ecff" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#c8ecff;border-radius:10px 0 0 10px" role="presentation">
                         <tr>
                          <td align="right" style="padding:0;Margin:0;padding-top:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px">Name: </p></td>
                         </tr>
                         <tr>
                          <td align="right" style="padding:0;Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px">Email Address: </p></td>
                         </tr>
                       </table></td>
                     </tr>
                   </table></td>
                  <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                   <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                     <tr>
                      <td align="left" style="padding:0;Margin:0;width:155px">
                       <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#c8ecff" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#c8ecff;border-radius:0 10px 10px 0" role="presentation">
                         <tr>
                          <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px"><strong>'.$_POST['cust_name'].' '.$_POST['cust_cname'].'</strong></p></td>
                         </tr>
                         <tr>
                          <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-left:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px"><strong>'.$_POST['cust_email'].'</strong></p></td>
                         </tr>
                       </table></td>
                     </tr>
                   </table></td>
                  <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                   <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                     <tr class="es-mobile-hidden">
                      <td align="left" style="padding:0;Margin:0;width:138px">
                       <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                         <tr>
                          <td align="center" height="40" style="padding:0;Margin:0"></td>
                         </tr>
                       </table></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr>
              <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-left:20px;padding-right:20px">
               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                 <tr>
                  <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:5px" role="presentation">
                     <tr>
                      <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
                        <span class="es-button-border msohide" style="border-style:solid;border-color:#2CB543;background:#0da3f1;border-width:0px;display:inline-block;border-radius:6px;width:auto;mso-hide:all">
                            <a href="'.$verify_link.'" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:20px;padding:10px 30px 10px 30px;display:inline-block;background:#0da3f1;border-radius:6px;font-weight:normal;font-style:normal;line-height:24px;width:auto;text-align:center;mso-padding-alt:0;mso-border-alt:10px solid #0da3f1;padding-left:30px;padding-right:30px">Verify Account</a></span><!--<![endif]--></td>
                     </tr>
                     <tr>
                      <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-top:20px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px">Got a question? Email us at '.$row['contact_email'].' or give us a call at '.$row['contact_phone'].' </a>.</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px"><br>Thanks,</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;line-height:21px;color:#333333;font-size:14px">Standly hardware Admin</p></td>
                     </tr>
                   </table></td>
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
                   
        
        
        // Sending Email
        mail($to, $subject, $message, $headers);

        unset($_POST['cust_name']);
        unset($_POST['cust_cname']);
        unset($_POST['cust_email']);
        unset($_POST['cust_phone']);
        unset($_POST['cust_address']);
        unset($_POST['cust_city']);
        unset($_POST['cust_state']);
        unset($_POST['cust_zip']);

        $success_message = LANG_VALUE_152;
    }
}
?>


<link rel="stylesheet" href="./main.css">

<div class="category">

 

</div>

<!-- <hear -->

<div class="page-banner" style="background-color:#444;background-image: url(assets/uploads/<?php echo $banner_registration; ?>);">
    <div class="inner">
        <h1 style="z-index:1;"><?php echo LANG_VALUE_16; ?></h1>
    </div>
</div>

<!--
<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <h3>Contact Form</h3>
                <div class="row cform">
                    <div class="col-md-8">
                        <div class="well well-sm">
                            
                        <?php
// After form submit checking everything for email sending
if(isset($_POST['form_contact']))
{
    $error_message = '';
    $success_message = '';
    $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
    foreach ($result as $row) 
    {
        $receive_email = $row['receive_email'];
        $receive_email_subject = $row['receive_email_subject'];
        $receive_email_thank_you_message = $row['receive_email_thank_you_message'];
    }

    $valid = 1;

    if(empty($_POST['visitor_name']))
    {
        $valid = 0;
        $error_message .= 'Please enter your name.\n';
    }

    if(empty($_POST['visitor_phone']))
    {
        $valid = 0;
        $error_message .= 'Please enter your phone number.\n';
    }


    if(empty($_POST['visitor_email']))
    {
        $valid = 0;
        $error_message .= 'Please enter your email address.\n';
    }
    else
    {
        // Email validation check
        if(!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL))
        {
            $valid = 0;
            $error_message .= 'Please enter a valid email address.\n';
        }
    }

    if(empty($_POST['visitor_message']))
    {
        $valid = 0;
        $error_message .= 'Please enter your message.\n';
    }

    if($valid == 1)
    {
        
        $visitor_name = strip_tags($_POST['visitor_name']);
        $visitor_email = strip_tags($_POST['visitor_email']);
        $visitor_phone = strip_tags($_POST['visitor_phone']);
        $visitor_message = strip_tags($_POST['visitor_message']);

        // sending email
        $to_admin = $receive_email;
        $subject = $receive_email_subject;
        $message = '
<html><body>
<table>
<tr>
<td>Name</td>
<td>'.$visitor_name.'</td>
</tr>
<tr>
<td>Email</td>
<td>'.$visitor_email.'</td>
</tr>
<tr>
<td>Phone</td>
<td>'.$visitor_phone.'</td>
</tr>
<tr>
<td>Comment</td>
<td>'.nl2br($visitor_message).'</td>
</tr>
</table>
</body></html>
';
        $headers = 'From: ' . $visitor_email . "\r\n" .
                   'Reply-To: ' . $visitor_email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Sending email to admin                  
        mail($to_admin, $subject, $message, $headers); 
        
        $success_message = $receive_email_thank_you_message;

    }
}
?>
                
                
-->

<div class="product-container">




    <!--
      - SIDEBAR
    -->
    

    <div class="sidebar  has-scrollbar" data-mobile-menu>

      <div class="sidebar-category">

        <div class="sidebar-top">
          <h2 class="sidebar-title">Login</h2>

          <button class="sidebar-close-btn" data-mobile-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        

        </div>
        <!-- HERE -->
        <div class="product-showcase">
          <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" value="<?php echo LANG_VALUE_4; ?>" name="form1">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                    Forgot Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="signup.html">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
          <!-- HERE -->
          
          
</div>
<br></div> </div>




    
<section class="homeL" id="homeL">
    <div class="container-login100">
        <div class="wrap-login100">

<div class="container">
    <span class="login100-form-title">Customer Registration</span>
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

          <label for="cust_name" class="txt2"><?php echo LANG_VALUE_102; ?> *</label>
                <div class="col-md-2 wrap-input100 validate-input" >
                    <input class="input100" type="text" id="cust_name" name="cust_name" placeholder="<?php echo LANG_VALUE_102; ?>" value="<?php echo $cust_name; ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                </span>
                </div>
                
          </div>

          <div class="input-box">

          <label for="cust_cname" class="txt2"><?php echo LANG_VALUE_103; ?> *</label>
                <div class="col-md-2 wrap-input100 validate-input" >
                    <input class="input100" type="text" id="cust_cname" name="cust_cname" placeholder="<?php echo LANG_VALUE_103; ?>" value="<?php echo $cust_cname; ?>">
                    <span class="focus-input100"></span>
                   <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                </span>
                </div>
                
          </div>

          <div class="input-box">
          <label for="cust_email" class="txt2"><?php echo LANG_VALUE_94; ?> *</label>
                <div class="col-md-4 wrap-input100 validate-input" >
                    <input class="input100" type="email" id="cust_email" name="cust_email" placeholder="<?php echo LANG_VALUE_94; ?>" value="<?php echo $cust_email; ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                </span>
                </div>
          </div>
          <div class="input-box">
          <label for="cust_phone" class="txt2"><?php echo LANG_VALUE_104; ?> * </label>
                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="number" id="cust_phone" name="cust_phone" placeholder="<?php echo LANG_VALUE_104; ?>" value="<?php echo $cust_phone; ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    </span>
                </div>
          </div>
          <div class="input-box1">
          <label for="cust_address" class="txt2"><?php echo LANG_VALUE_105; ?> *</label>
                <div class="wrap-input100 validate-input" >
                    <textarea id="cust_address" name="cust_address" placeholder="<?php echo LANG_VALUE_105; ?>" class="input100" cols="10" rows="10" value="<?php echo $cust_address; ?>" ><?php echo $cust_address; ?></textarea>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                    </span>
                </div>
          </div>
          
        
          <div class="input-box">
            <label for="cust_country" class="txt2"><?php echo LANG_VALUE_106; ?> * </label>

                <div class="wrap-input100 validate-input">
                <span class="focus-input100"></span>

                  <span class="symbol-input100">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                  </span>
								  <select name="cust_country" id="cust_country" class="input100 select2 country-id">
                    <option value="">Select Country</option>
                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);	
                    foreach ($result as $row) {
                      ?>
                      <option <?php if($cust_country == $row['country_id']) echo "selected";?> value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
                    <?php
                    }
                ?>
                </select><span class="focus-input100"></span>
                </div>
            </div>

          <div class="input-box">
            <label for="state" class="txt2"><?php echo LANG_VALUE_108; ?> * </label>
          
            <div class="wrap-input100 validate-input">

              <span class="symbol-input100">
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
              </span>

              <select name="cust_state" id="state" class="input100 select2 state-id"  >
                <option value="">Select Province</option> 
                <?php $statement = $pdo->prepare("SELECT * FROM tbl_state WHERE country_id=?");
                $statement->execute(array($cust_country));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                ?>
                <option <?php if($cust_state == $row['state_id']) echo "selected";?> value="<?php echo $row['state_id']; ?>"><?php echo $row['state_name']; ?></option>
                <?php
	            } ?>
              </select>  <span class="focus-input100"></span>
            </div>
          </div>

          <div class="input-box">
          <label for="cust_city" class="txt2"><?php echo LANG_VALUE_107; ?> * </label>
          
            <div class="wrap-input100 validate-input">
              <span class="symbol-input100">
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
              </span>
              <select name="cust_city" id="cust_city" class="input100 select2 city-id" >
                <option value="">Select City</option> <span class="focus-input100"></span>
                <?php $statement = $pdo->prepare("SELECT * FROM tbl_city WHERE state_id=?");
                $statement->execute(array($cust_state));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?><option value="">Select City</option><?php						
                foreach ($result as $row) {
                    ?>
                    <option <?php if($cust_city == $row['city_id']) echo "selected";?> value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                <?php
	            } ?>
              </select>  <span class="focus-input100"></span>
              </div>
          </div>

        <div class="input-box">
        <label for="cust_zip" class="txt2"><?php echo LANG_VALUE_109; ?> *</label>
                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="number" id="cust_zip" name="cust_zip" placeholder="<?php echo LANG_VALUE_109; ?>" value="<?php if(isset($_POST['cust_zip'])){echo $_POST['cust_zip'];} ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                </span>
                </div>
        </div>
        
        <div class="input-box">
        <label for="cust_password" class="txt2"><?php echo LANG_VALUE_96; ?> *</label>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" id="cust_password" name="cust_password" placeholder="<?php echo LANG_VALUE_96; ?>" value="<?php echo $cust_password; ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                </span>
                </div>
        </div>
        <div class="input-box">
        <label for="cust_re_password" class="txt2"><?php echo LANG_VALUE_98; ?> *</label>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" id="cust_re_password" name="cust_re_password" placeholder="<?php echo LANG_VALUE_98; ?>" value="<?php echo $cust_re_password; ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                </span>
                </div>
        </div>
        <label for="" class="txt2" onclick="myFunction()"><?php echo '<small>Show Password</small>'?></label>

      

                <div class="login100-form-title">
                   

<!-- The Modal -->
<div id="myModal" class="modal1">

  <!-- Modal content -->
  <div class="modal1-content">
    <span class="close">&times;</span>
    <?php require_once('terms.php'); ?>
  </div>

</div>

                  <div style="text-align: -webkit-center;">
                    <input type ="checkbox"  class="txt2" style="margin-bottom:10px;" required/>
                    <p class="txt2"><button id="myBtn" style="color:#2196f3;">TERMS & CONDITIONS  </button></p>
                    </div>
                  </div><br>
                    
                    
                    <button class="login100-form-btn" type="submit" value="<?php echo LANG_VALUE_15; ?>" name="form1">
                    <?php echo LANG_VALUE_15; ?>
                    </button><br>
                    
                  </div>
              <div>
                    <span class="txt1">
                        Already have account,
                    </span>
                    
                    <a class="txt2" href="login">
                        Login instead
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a></div>

                    </form>
                </div></div>
        </div>
        
       
      </form>
    </div>
  </div>

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
            
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script>
		$(document).ready(function() {
	        $('#editor1').summernote({
	        	height: 300
	        });
	        $('#editor2').summernote({
	        	height: 300
	        });
	        $('#editor3').summernote({
	        	height: 300
	        });
	        $('#editor4').summernote({
	        	height: 300
	        });
	        $('#editor5').summernote({
	        	height: 300
	        });
	    });
		$(".country-id").on('change',function(){
			var id=$(this).val();
			var dataString = 'id='+ id;
			$.ajax
			({
				type: "POST",
				url: "get-state.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".state-id").html(html);
				}
			});			
		});
		$(".state-id").on('change',function(){
			var id=$(this).val();
			var dataString = 'id='+ id;
			$.ajax
			({
				type: "POST",
				url: "get-city.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".city-id").html(html);
				}
			});			
		});
        $(".city-id").on('change',function(){
			var id=$(this).val();
			var dataString = 'id='+ id;
			$.ajax
			({
				type: "POST",
				url: "get-city.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".add-cat").html(html);
				}
			});			
		});
        
	</script>
    <script>
        function myFunction() {
        var x = document.getElementById('cust_password');
        var y = document.getElementById('cust_re_password');
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
        }
    </script>
            

            
        
    </div></div>
    </section><br>
    </div></div></div>




<?php require_once('footermain.php'); ?>