
<?php require_once('head.php'); ?>



<link rel="stylesheet" href="./main.css">

<div class="category">

  <div class="container">

    <div class="category-item-container has-scrollbar">

      <?php
        $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
          ?>

          <div class="category-item">

            <div class="category-img-box">

              <img src="./assets/img/icons/tool.png" alt="winter wear" width="30">

            </div>

            <div class="category-content-box">
              <div class="category-content-flex">

                <h3 class="category-item-title" href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></h3>
                
                <p class="category-item-amount">(53)</p>  
              </div>
              <a href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category" class="category-btn" >Show all</a>
                      
            </div>
          </div>
      <?php
      }
      ?>
    </div>

  </div>

</div>

<!-- <hear -->

<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
    <div class="inner">
        <h1><?php echo $contact_title; ?></h1>
    </div>
</div><br>

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

  <div class="container">


    <!--
      - SIDEBAR
    -->
    

    <div class="sidebar  has-scrollbar" data-mobile-menu>

      <div class="sidebar-category">

        <div class="sidebar-top">
          <h2 class="sidebar-title">Category</h2>

          <button class="sidebar-close-btn" data-mobile-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        <ul class="sidebar-menu-category-list">

        <!-- here -->

                  <?php
          $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
          $statement->execute();
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result as $row) {
            ?>
          <li class="sidebar-menu-category">
            <button class="sidebar-accordion-menu" data-accordion-btn>

                <div class="menu-title-flex">
                    <img src="./assets/img/icons/cat.png" alt="" width="20" height="20"
                      class="menu-title-img">

                  <a class="menu-title" href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>
                  
                  </div>

                <div>
                  <ion-icon name="add-outline" class="add-icon"></ion-icon>
                  <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                </div>

            </button>

            <ul class="sidebar-submenu-category-list" data-accordion>

              <li class="sidebar-submenu-category">
                <?php
                $statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
                $statement1->execute(array($row['tcat_id']));
                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result1 as $row1) {
                  ?>
                  
                    <a class="sidebar-submenu-title" href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category"><?php echo $row1['mcat_name']; ?></a>
                
                  </li>
                  <?php
                }
                ?>
            </ul>

            </li>
            <?php
          }
          ?>

            </ul>

          </li>

        </ul>

        </div>
        <!-- HERE -->
        <div class="product-showcase">
          <?php if($home_featured_product_on_off == 1): ?>

          <h3 class="showcase-heading">FEATURED PRODUCTS</h3>
             
            <div class="showcase-wrapper">
                  
              <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=? AND p_is_active=? LIMIT ".$total_featured_product_home);
                    $statement->execute(array(1,1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                    ?>
                        <div class="showcase-container">
                          
                            <div class="showcase">
                              <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                              <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="75" height="75" class="showcase-img" >
                              
                              
                                <div class="showcase-content">
                                  
                                  <a href="product.php?id=<?php echo $row['p_id']; ?>">
                                    <h4 class="showcase-title" ><?php echo $row['p_name']; ?></h4>
                                  </a>

                                    <div class="showcase-rating">
                                      <ion-icon name="star"></ion-icon>
                                      <ion-icon name="star"></ion-icon>
                                      <ion-icon name="star"></ion-icon>
                                      <ion-icon name="star"></ion-icon>
                                      <ion-icon name="star"></ion-icon>
                                    </div>

                                    <div class="price-box">
                                      <del>₱<?php echo $row['p_old_price']; ?></del>
                                      <p class="price">₱<?php echo $row['p_current_price']; ?> 
                                        <?php if($row['p_old_price'] != ''): ?></p>
                                          <?php endif; ?>

                                      
                                    </div>
                                  
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                  ?>
            </div>
            <?php endif; ?> 
            
            <br>
                                  
            </div> 
          <!-- HERE -->
          <div class="product-showcase">
            <?php if($home_latest_product_on_off == 1): ?>

            <h3 class="showcase-heading">LATEST PRODUCTS</h3>
              
              <div class="showcase-wrapper">
                    
                    <?php
                          $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ORDER BY p_id DESC LIMIT ".$total_latest_product_home);
                          $statement->execute(array(1));
                          $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                          foreach ($result as $row) {
                              ?>
                          <div class="showcase-container">
                            
                              <div class="showcase">
                                <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                                <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="75" height="75" class="showcase-img" >
                                
                                
                                  <div class="showcase-content">
                                    
                                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                                      <h4 class="showcase-title" ><?php echo $row['p_name']; ?></h4>
                                    </a>

                                      <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                      </div>

                                      <div class="price-box">
                                        <del>₱<?php echo $row['p_old_price']; ?></del>
                                        <p class="price">₱<?php echo $row['p_current_price']; ?> 
                                          <?php if($row['p_old_price'] != ''): ?></p>
                                            <?php endif; ?>

                                        
                                      </div>
                                    
                                  </div>

                              </div>
                          </div>
                      <?php
                      }
                    ?>
              </div>
              <?php endif; ?>
                                    
            </div> <div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
                <div class="inner">
                    <h1><?php echo $contact_title; ?></h1>
            </div>
</div><br></div> 







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
          <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
          
          <form action="#" method="post">
          <?php $csrf->echoInputField(); ?>
            <div class="input-boxc">
              <input type="text" placeholder="Enter your name" />
            </div>
            <div class="input-boxc">
              <input type="text" placeholder="Phone Number" />
            </div>
            <div class="input-boxc">
              <input type="text" placeholder="Enter your email" />
            </div>
            <div class="input-boxc message-boxc">
              <textarea placeholder="Enter your message"></textarea>
            </div>
            <div class="buttonc">
              <input type="button" value="Send Message" class="btn btn-primary pull-right" name="form_contact">
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