<link rel="stylesheet" href="./profile.css">
<nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>
				  
        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list" style="padding-left:0;">
		
		<?php
			if (isset($_SESSION['customer'])) {
                if(empty($_SESSION['customer']['photo'])) {
				  ?>
                      <li class="menu-top"><a href="dashboard" class="menu-top2">
                          <img class="side_profile" src="assets/uploads/<?php echo $favicon; ?>"  alt="User Profile">
                          <?php echo $_SESSION['customer']['cust_name']; ?>	<?php echo $_SESSION['customer']['cust_cname']; ?></a>
                      </li>
                
                      <?php 
                    }
                  else{
                ?>
                
                      <li class="menu-top"><a href="dashboard" class="menu-top2">
                        <img class="side_profile" src="assets/uploads/profile/<?php echo $_SESSION['customer']['photo']; ?>"  alt="User Profile">
                        <?php echo $_SESSION['customer']['cust_name']; ?>	<?php echo $_SESSION['customer']['cust_cname']; ?></a>
                      </li>
                		
                        <?php
                      } 
                    }
                else{
                ?>
        <li class="menu-top1"><ion-icon name="log-out"></ion-icon><a href="login" class="menu-title">
            <?php echo LANG_VALUE_9; ?>
          </a></li>
        <li class="menu-top1"><ion-icon name="person-add"></ion-icon><a href="registration" class="menu-title">
            <?php echo LANG_VALUE_15; ?>
				    </a></li>
      <?php
    }
  ?>
			</a>
        </li>
	
		<li class="menu-top1"><ion-icon name="cart-sharp"></ion-icon>
          <a href="customer-order" class="menu-title">Orders</a>
        </li>

		<li class="menu-top1"><ion-icon name="home"></ion-icon>
          <a href="https://standlyhardware.com/" class="menu-title">Home</a>
        </li>
        
        <li class="menu-top1"><ion-icon name="information-circle"></ion-icon>
			<a class="menu-title" href="about">
				<?php echo $about_title; ?>
			</a>
		</li>

		<li class="menu-top1"><ion-icon name="help-circle"></ion-icon>
			<a class="menu-title" href="faq">
				<?php echo $faq_title; ?>
			</a>
		</li>

		<li class="menu-top1"><ion-icon name="call"></ion-icon>
			<a class="menu-title" href="contact">
				<?php echo $contact_title; ?>
			</a>
		</li>
		
		<li class="menu-top1"><ion-icon name="cloud-download"></ion-icon>
          <a href="https://standlyhardware.com/Standly Hardware.apk" class="menu-title">Download App</a>
        </li>

        



<!-- here -->


          



  
      <div class="menu-bottom">

        <ul class="menu-category-list" style="padding-left:0;">
            

          <li class="menu-category">

            <button class="accordion-menu" data-accordion-btn>

			<li class="menu-top2">
			<ion-icon name="language"></ion-icon>
              <p class="menu-title">Language</p></li>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">English</a>
              </li>

            </ul>

          </li>
          
          <li class="menu-category">

            <button class="accordion-menu" data-accordion-btn>

			<li class="menu-top2">
			<ion-icon name="logo-paypal"></ion-icon>
              <p class="menu-title">Currency</p></li>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">PHP &#8369;</a>
              </li>

            </ul>

          </li>
          

        </ul>
 
        <ul class="menu-social-container" >

          <li style="padding-left:0;">
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

	  <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

        <?php
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
            ?>

          <div class="slider-item <?php if($i==0) {echo 'active';} ?>" >

            <img src="assets/uploads/<?php echo $row['photo']; ?>" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle" ><?php echo $row['heading']; ?></p>

              <h2 class="banner-title"><?php echo $row['heading']; ?></h2>

              <p class="banner-text">
              <?php echo nl2br($row['content']); ?>
              </p>

              <a href="<?php echo $row['button_url']; ?>" class="banner-btn">Shop now</a>

            </div>

            

          </div>
          <?php
            $i++;
        }
        ?>

        </div>

      </div>

    </div>

    </nav>