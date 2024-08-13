<div class="category">


<div class="product-container">

  <div class="container">


    <!--
      - SIDEBAR
    -->

    <div class="sidebar  has-scrollbar " data-mobile-menu>

      <div class="sidebar-category" >

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
	
		<li class="menu-top1"><ion-icon name="cart-sharp" ></ion-icon>
      <a href="customer-order" class="menu-title">Orders</a>
    </li>

		<li class="menu-top1"><ion-icon name="information-circle"></ion-icon>
          <a href="customer-profile-update" class="menu-title">Manage Profile</a>
    </li>

    <li class="menu-top1"><ion-icon name="information-circle"></ion-icon>
          <a href="customer-billing-shipping-update" class="menu-title">Shipping & Billing</a>
    </li>

    <li class="menu-top1"><ion-icon name="information-circle"></ion-icon>
          <a href="customer-password-update" class="menu-title">Manage Password</a>
    </li>


    <?php
				if (isset($_SESSION['customer'])) {
					?>
				
				<li class="menu-top1"><ion-icon name="log-out"></ion-icon><a href="logout" class="menu-title">
						Logout
					</a></li>
				<?php
				} else {
					?>
				
				<?php
				}
				?>
			</a>
        </li>
      

        



<!-- here -->


          



  
      <div class="menu-bottom" >

        <ul class="menu-category-list" style="padding-left:0;">
            

          
          

        </ul>

        <ul class="menu-social-container">

          <li>
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
        </div>
        </div>