
<?php require_once('head.php'); ?>

<link rel="stylesheet" href="assets/css/main1.css">

<title> <?php echo $meta_keyword_home; ?> | Login </title>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_login = $row['banner_login'];
}
?>
<!-- login form -->
<?php
if(isset($_POST['form1'])) {
        
    if(empty($_POST['cust_email']) || empty($_POST['cust_password'])) {
        $error_message = LANG_VALUE_132.'<br>';
    } else {
        
        $cust_email = strip_tags($_POST['cust_email']);
        $cust_password = strip_tags($_POST['cust_password']);

        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
        $statement->execute(array($cust_email));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $cust_status = $row['cust_status'];
            $row_password = $row['cust_password'];
        }

        if($total==0) {
            $error_message .= LANG_VALUE_133.'<br>';
        } else {
            //using MD5 form
            if( $row_password != md5($cust_password) ) {
                $error_message .= LANG_VALUE_133.'<br>';
            } else {
                if($cust_status == 0) {
                    $error_message .= LANG_VALUE_148.'<br>';
                } else {
                    $_SESSION['customer'] = $row;
                    header("location: ".BASE_URL."index.php");
                }
            }
            
        }
    }
}
?>


<link rel="stylesheet" href="./main.css">



<!-- <hear -->

<div class="page-banner" style="background-color:#444;background-image: url(assets/uploads/<?php echo $banner_login; ?>);">
    <div class="inner">
        <h1><?php echo LANG_VALUE_10; ?></h1>
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
                    <a class="txt2" href="registration">
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

            <div class="login100-pic js-tilt" data-tilt>
            <img src="assets/uploads/<?php echo $favicon; ?>" alt="logo image">
            </div>

            <form class="login100-form validate-form" action="" method="post">

            <?php $csrf->echoInputField(); ?> 

                <span class="login100-form-title">
                    Customer Login
                </span>

                <?php
                                if($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;background: red;margin-bottom:20px;'>".$error_message."</div>";
                                }
                                if($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;background: red;    margin-bottom:20px;'>".$success_message."</div>";
                                }
                                ?>


                <label for="cust_email" class="txt2"><?php echo LANG_VALUE_94; ?> *</label>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" id="cust_email" name="cust_email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    </span>
                </div>

                <label for="myInput" class="txt2" ><?php echo LANG_VALUE_96; ?> *</label>
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" id ="myInput" name="cust_password" placeholder="Password">
                    
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                    </span>
                </div>
                <label for="" class="txt2" onclick="myFunction()"><?php echo '<small>Show Password</small>'?></label>
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
                    <a class="txt2" href="registration">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div></div>
    </section><br>
    </div></div></div>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>



<?php require_once('footermain.php'); ?>