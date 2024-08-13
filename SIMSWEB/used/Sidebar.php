<?php require_once('head.php'); ?>


<!DOCTYPE html>
<html lang="en">



<!--
  - CATEGORY
-->


<!-- here -->
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



<!--
  - PRODUCT
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
                                    
            </div> 

          

        </div>
      





    





<!--
- FOOTER
-->












  <!--
    - custom js link
  -->
  
  <!-- <script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script src="assets/js/megamenu.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.animate.js"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/jquery.touchSwipe.min.js"></script>
<script src="assets/js/bootstrap-touch-slider.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<script src="assets/js/custom.js"></script>  -->

