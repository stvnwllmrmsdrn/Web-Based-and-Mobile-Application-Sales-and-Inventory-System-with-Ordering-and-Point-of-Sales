
<?php require_once('head.php'); ?>
<?php require_once('sidebar1.php'); ?>



<link rel="stylesheet" href="./main.css">



<!-- <hear -->
</div>
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
    <div class="inner">
        <h1><?php echo $contact_title; ?></h1>
    </div>
</div>

<br>


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

 <title> <?php echo $meta_keyword_home; ?> | <?php echo $contact_title; ?> </title>   
<div class="container">

<div class="containerc">
    
    
<div class="container">
    
      <div class="contentc">
        <div class="left-sidec">
          <div class="address detailsc">
            <i class="fas fa-map-marker-altc"></i>
            <div class="topicc">Address</div>
            <div class="text-onec"><?php echo nl2br($contact_address); ?></div>
          </div>
          <div class="phone detailsc">
            <i class="fas fa-phone-altc"></i>
            <div class="topicc">Phone</div>
            <div class="text-twoc"><?php echo $contact_phone; ?></div> 
          </div>
          <div class="email detailsc">
            <i class="fas fa-envelopec"></i>
            <div class="topicc">Email</div>
            <div class="text-onec"><a href="mailto:<?php echo $contact_email; ?>"><span><?php echo $contact_email; ?></span></a></div>
          </div>
        </div>

        <?php
                if($error_message != '') {
                    echo "<script>alert('".$error_message."')</script>";
                }
                if($success_message != '') {
                    echo "<script>alert('".$success_message."')</script>";
                }
                ?>

        <div class="right-sidec">
          <div class="topic-textc">Send us a message</div>
          <p>If you have any concern, you can send me message from here. It's my pleasure to help you.</p>
          
          <form action="#" method="post">
          <?php $csrf->echoInputField(); ?>
            <div class="input-boxc">
              <input type="text" name="visitor_name" placeholder="Enter your name" />
            </div>
            <div class="input-boxc">
              <input type="number" name="visitor_phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only" placeholder="Phone Number" />
            </div>
            <div class="input-boxc">
              <input type="text" name="visitor_email" placeholder="Enter your email" />
            </div>
            <div class="input-boxc message-boxc">
              <textarea name="visitor_message" placeholder="Enter your message"></textarea>
            </div>
            <div class="buttonc">
              <input type="submit" value="Send Message" class="btn btn-primary pull-right" name="form_contact">
            </div>
          </form>
        </div>
        
      </div>
      
      
    </div>
    <h3>Find Us On Map</h3>
                <?php echo $contact_map_iframe; ?>
    
    </div>
    

    

    <!-- <div class="containerc">
<div class="container">
      <div class="contentc">
        <div class="left-sidec">
          <div class="address detailsc">
            <i class="fas fa-map-marker-altc"></i>
            <div class="topicc">Address</div>
            <div class="text-onec">Surkhet, NP12</div>
            <div class="text-twoc">Birendranagar 06</div>
          </div>
          <div class="phone detailsc">
            <i class="fas fa-phone-altc"></i>
            <div class="topicc">Phone</div>
            <div class="text-onec">+0098 9893 5647</div>
            <div class="text-twoc">+0096 3434 5678</div>
          </div>
          <div class="email detailsc">
            <i class="fas fa-envelopec"></i>
            <div class="topicc">Email</div>
            <div class="text-onec">codinglab@gmail.com</div>
            <div class="text-twoc">info.codinglab@gmail.com</div>
          </div>
        </div>
        <div class="right-sidec">
          <div class="topic-textc">Send us a message</div>
          <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
          <form action="#">
            <div class="input-boxc">
              <input type="text" placeholder="Enter your name" />
            </div>
            <div class="input-boxc">
              <input type="text" placeholder="Enter your email" />
            </div>
            <div class="input-boxc">
              <input type="text" placeholder="Enter your email" />
            </div>
            <div class="input-boxc message-boxc">
              <textarea placeholder="Enter your message"></textarea>
            </div>
            <div class="buttonc">
              <input type="button" value="Send Now" />
            </div>
          </form>
        </div>
      </div>
    </div>
    </div> -->

</div></div>



<?php require_once('footermain.php'); ?>