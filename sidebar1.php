<div class="product-container">
<div class="container">
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
                    <img src="assets/uploads/<?php echo $row['photo']; ?>" width="30px" alt="<?php echo $row['tcat_id']; ?>">

                  <a class="menu-title" href="product-category?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>
                  
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
                  
                    <a class="sidebar-submenu-title" href="product-category?id=<?php echo $row1['mcat_id']; ?>&type=mid-category"><?php echo $row1['mcat_name']; ?></a>
                
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
                              <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                              <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="75" height="75" class="showcase-img" >
                              
                              
                                <div class="showcase-content">
                                  
                                  <a href="product?id=<?php echo $row['p_id']; ?>">
                                    <h4 class="showcase-title" ><?php echo $row['p_name']; ?></h4>
                                  </a>

                                    <div class="showcase-rating">
                                      <?php
                                                $t_rating = 0;
                                                $statement1 = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
                                                $statement1->execute(array($row['p_id']));
                                                $tot_rating = $statement1->rowCount();
                                                $p_qty = $row['p_qty'];
                                                if($tot_rating == 0) {
                                                    $avg_rating = 0;
                                                } else {
                                                    $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result1 as $row1) {
                                                        $t_rating = $t_rating + $row1['rating'];
                                                    }
                                                    $avg_rating = $t_rating / $tot_rating;
                                                     
                                                }
                                                ?>
                                                <?php
                                                if($avg_rating == 0) {
                                                    echo  nl2br ("Stocks: ($p_qty)  ");
                                                }
                                                elseif($avg_rating == 1.5) {
                                                    echo '
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    ';
                                                    echo htmlspecialchars("($tot_rating)");
                                                } 
                                                elseif($avg_rating == 2.5) {
                                                    echo '
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    ';
                                                    echo htmlspecialchars("($tot_rating)");
                                                }
                                                elseif($avg_rating == 3.5) {
                                                    echo '
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    ';
                                                    echo htmlspecialchars("($tot_rating)");
                                                }
                                                elseif($avg_rating == 4.5) {
                                                    echo '
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        
                                                    ';
                                                    echo htmlspecialchars("($tot_rating)");
                                                }
                                                else {
                                                    
                                                    for($i=1;$i<=5;$i++) {
                                                        ?>
                                                        <?php if($i>$avg_rating): ?>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endif; ?>
                                                        <?php
                                                    }
                                                    echo htmlspecialchars("($tot_rating)     -"); echo  nl2br ("Stocks: ($p_qty)  ");
                                                }
                                                ?>
                                    </div>

                                    <div class="price-box">
                                      <!--<del>₱<?php echo $row['p_old_price']; ?></del>-->
                                      <p class="price">₱<?php echo $row['p_current_price']; ?> 
                                        <?php if($row['p_walkin_price'] != ''): ?></p>
                                        <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
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
                                <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                                <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="75" height="75" class="showcase-img" >
                                
                                
                                  <div class="showcase-content">
                                    
                                    <a href="product?id=<?php echo $row['p_id']; ?>">
                                      <h4 class="showcase-title" ><?php echo $row['p_name']; ?></h4>
                                    </a>

                                      <div class="showcase-rating">
                                        <?php
                                                $t_rating = 0;
                                                $statement1 = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
                                                $statement1->execute(array($row['p_id']));
                                                $tot_rating = $statement1->rowCount();
                                                $p_qty = $row['p_qty'];
                                                if($tot_rating == 0) {
                                                    $avg_rating = 0;
                                                } else {
                                                    $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result1 as $row1) {
                                                        $t_rating = $t_rating + $row1['rating'];
                                                    }
                                                    $avg_rating = $t_rating / $tot_rating;
                                                     
                                                }
                                                ?>
                                                <?php
                                                if($avg_rating == 0) {
                                                    echo  nl2br ("Stocks: ($p_qty)  ");
                                                }
                                                elseif($avg_rating == 1.5) {
                                                    echo '
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    ';
                                                    echo htmlspecialchars("($tot_rating)");
                                                } 
                                                elseif($avg_rating == 2.5) {
                                                    echo '
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    ';
                                                    echo htmlspecialchars("($tot_rating)");
                                                }
                                                elseif($avg_rating == 3.5) {
                                                    echo '
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    ';
                                                    echo htmlspecialchars("($tot_rating)");
                                                }
                                                elseif($avg_rating == 4.5) {
                                                    echo '
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        
                                                    ';
                                                    echo htmlspecialchars("($tot_rating)");
                                                }
                                                else {
                                                    
                                                    for($i=1;$i<=5;$i++) {
                                                        ?>
                                                        <?php if($i>$avg_rating): ?>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endif; ?>
                                                        <?php
                                                    }
                                                    echo htmlspecialchars("($tot_rating)     -"); echo  nl2br ("Stocks: ($p_qty)  ");
                                                }
                                                ?>
                                      </div>

                                      <div class="price-box">
                                        <!--<del>₱<?php echo $row['p_old_price']; ?></del>-->
                                        <p class="price">₱<?php echo $row['p_current_price']; ?> 
                                          <?php if($row['p_walkin_price'] != ''): ?></p>
                                        <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
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