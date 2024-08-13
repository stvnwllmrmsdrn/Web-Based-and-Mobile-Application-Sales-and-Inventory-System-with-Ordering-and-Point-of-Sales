
<footer>

<div class="footer-category">

  <div class="container">

    <h2 class="footer-category-title">Brand directory</h2>

        <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
      ?>

    <div class="footer-category-box">

      <h3 class="category-box-title" href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?> :</h3>
    
    
            <?php
            $statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
            $statement1->execute(array($row['tcat_id']));
            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result1 as $row1) {
              ?>

        <a class="footer-category-link" href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category"><?php echo $row1['mcat_name']; ?></a>
        

          <?php
          }
          ?>

     
    </div>

    <?php
      }
      ?>

  </div>
  
</div>

<div class="footer-nav">

  <div class="container">


    <ul class="footer-nav-list">
    <li class="footer-nav-item">
        <h2 class="nav-title">Popular Categories</h2>
      </li>
          <?php if($home_service_on_off == 1): ?>
              <div class="footer-nav-item">
                  <?php
                  $statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
                  $statement1->execute(array($row['tcat_id']));
                  $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($result1 as $row1) {
                    ?>

                    <a class="footer-nav-link" href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category"><?php echo $row1['mcat_name']; ?></a>
              
            <?php
            }
            ?>
 
              </div>
          <?php endif; ?>
    </ul>

    <ul class="footer-nav-list">
    
      <li class="footer-nav-item">
        <h2 class="nav-title">Products</h2>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Prices drop</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">New products</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Best sales</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="contact.php" class="footer-nav-link">Contact us</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="contact.php" class="footer-nav-link">Sitemap</a>
      </li>
    
    </ul>

    <ul class="footer-nav-list">
    
      <li class="footer-nav-item">
        <h2 class="nav-title">Our Company</h2>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Delivery</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Legal Notice</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Terms and conditions</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">About us</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Secure payment</a>
      </li>
    
    </ul>


    <ul class="footer-nav-list">
    <li class="footer-nav-item">
        <h2 class="nav-title">Services</h2>
      </li>
    <?php if($home_service_on_off == 1): ?>
        <div class="footer-nav-item">
            <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_service");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    ?>
                  
                            <a href="#" class="footer-nav-link"><?php echo $row['title']; ?></a>
                 
                   
                    <?php
                }
            ?>
        
</div>
<?php endif; ?>
    </ul>

    <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">Contact</h2>
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="location-outline"></ion-icon>
        </div>

        <address class="content">
        <a class="footer-nav-link" href="contact.php"> <?php echo nl2br($contact_address); ?>  </span>
        </address>
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="call-outline"></ion-icon>
        </div>

        <a href="contact.php" class="footer-nav-link"><?php echo $contact_phone; ?></span></a>
        
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="mail-outline"></ion-icon>
        </div>

        <a class="footer-nav-link" href="mailto:<?php echo $contact_email; ?>"><span><?php echo $contact_email; ?></span></a>
      </li>

    </ul>

    <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">Follow Us</h2>
      </li>

      <li>
        <ul class="social-link">

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

        </ul>
      </li>

    </ul>

  </div>

</div>

<div class="footer-bottom">

  <div class="container">

    <img src="./assets/img/payment1.png" alt="payment method" class="payment-img">

    <p class="copyright">
      Copyright &copy; <a href="#">Standly Hardware</a> all rights reserved.
    </p>

  </div>

</div>

</footer>

<script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  </body>

</html>