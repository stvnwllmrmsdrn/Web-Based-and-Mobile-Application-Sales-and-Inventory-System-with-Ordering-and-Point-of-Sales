<?php require_once('head.php'); ?>
<?php require_once('sidebar.php'); ?>


<div class="product-box">

      <!--
        - PRODUCT MINIMAL
      -->

      <div class="product-minimal">

        <div class="product-showcase">

          <h2 class="title">New Arrivals</h2>
          
          <div class="showcase-wrapper has-scrollbar">

          <?php if($home_latest_product_on_off == 1): ?>

            <div class="showcase-container">
                <?php
                        $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ORDER BY p_id DESC LIMIT ".$total_latest_product_home);
                        $statement->execute(array(1));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                        foreach ($result as $row) {
                            ?>
                      <div class="showcase">

                            <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                              <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="70" height="70" class="showcase-img" >
                            </a>

                                <div class="showcase-content">

                                  <a href="product.php?id=<?php echo $row['p_id']; ?>">
                                    <h4 class="showcase-title"><?php echo $row['p_name']; ?></h4>
                                  </a>

                                  <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-category">View Product</a>

                                  <div class="price-box">
                                    <p class="price">₱<?php echo $row['p_current_price']; ?> 
                                          <?php if($row['p_sale_price'] != ''): ?></p>
                                    <del>₱<?php echo $row['p_sale_price']; ?></del>
                                    <?php endif; ?>
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

        <div class="product-showcase">

          <h2 class="title">Featured Products</h2>
          
          <div class="showcase-wrapper has-scrollbar">

          <?php if($home_featured_product_on_off == 1): ?>

            <div class="showcase-container">
            <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=? AND p_is_active=? LIMIT ".$total_featured_product_home);
                    $statement->execute(array(1,1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
                      <div class="showcase">

                            <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                              <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="70" height="70" class="showcase-img" >
                            </a>

                                <div class="showcase-content">

                                  <a href="product.php?id=<?php echo $row['p_id']; ?>">
                                    <h4 class="showcase-title"><?php echo $row['p_name']; ?></h4>
                                  </a>

                                  <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-category">View Product</a>

                                  <div class="price-box">
                                    <p class="price">₱<?php echo $row['p_current_price']; ?> 
                                          <?php if($row['p_sale_price'] != ''): ?></p>
                                    <del>₱<?php echo $row['p_sale_price']; ?></del>
                                    <?php endif; ?>
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

        <div class="product-showcase">

          <h2 class="title">Popular Product</h2>
          
          <div class="showcase-wrapper has-scrollbar">

          <?php if($home_popular_product_on_off == 1): ?>

            <div class="showcase-container">
                      <?php
                              $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ORDER BY p_total_view DESC LIMIT ".$total_popular_product_home);
                              $statement->execute(array(1));
                              $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                              foreach ($result as $row) {
                                  ?>
                      <div class="showcase">

                            <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                              <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="70" height="70" class="showcase-img" >
                            </a>

                                <div class="showcase-content">

                                  <a href="product.php?id=<?php echo $row['p_id']; ?>">
                                    <h4 class="showcase-title"><?php echo $row['p_name']; ?></h4>
                                  </a>

                                  <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-category">View product</a>

                                  <div class="price-box">
                                    <p class="price">₱<?php echo $row['p_current_price']; ?> 
                                          <?php if($row['p_sale_price'] != ''): ?></p>
                                    <del>₱<?php echo $row['p_sale_price']; ?></del>
                                    <?php endif; ?>
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
          
      </div>



      <!--
        - PRODUCT FEATURED
      -->

      <div class="product-featured">

        <h2 class="title">Deal of the day</h2>
        <?php if($home_featured_product_on_off == 1): ?>

        <div class="showcase-wrapper has-scrollbar">

        <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=? AND p_is_active=? LIMIT ".$total_featured_product_home);
                    $statement->execute(array(1,1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>

          <div class="showcase-container">

            <div class="showcase">
              
              <div class="showcase-banner" href="product.php?id=<?php echo $row['p_id']; ?>"> 
                <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="400" height="400" class="showcase-img" >
              </div>

              <div class="showcase-content">
                
                <div class="showcase-rating">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star-outline"></ion-icon>
                  <ion-icon name="star-outline"></ion-icon>
                </div>

                <a href="product.php?id=<?php echo $row['p_id']; ?>">
                  <h3 class="showcase-title"><?php echo $row['p_name']; ?></h3>
                </a>


                <p class="showcase-desc">
                <?php echo $row['p_description']; ?>
                </p>

                <div class="price-box">
                  <p class="price">₱150.00</p>

                  <del>₱200.00</del>
                </div>

                <button class="add-cart-btn">add to cart</button>

                <div class="showcase-status">
                  <div class="wrapper">
                    <p>
                      already sold: <b>20</b>
                    </p>

                    <p>
                      available: <b>40</b>
                    </p>
                  </div>

                  <div class="showcase-status-bar"></div>
                </div>

                <div class="countdown-box">

                  <p class="countdown-desc">
                    Hurry Up! Offer ends in:
                  </p>

                  <div class="countdown">

                    <div class="countdown-content">

                      <p class="display-number">360</p>

                      <p class="display-text">Days</p>

                    </div>

                    <div class="countdown-content">
                      <p class="display-number">24</p>
                      <p class="display-text">Hours</p>
                    </div>

                    <div class="countdown-content">
                      <p class="display-number">59</p>
                      <p class="display-text">Min</p>
                    </div>

                    <div class="countdown-content">
                      <p class="display-number">00</p>
                      <p class="display-text">Sec</p>
                    </div>

                  </div>

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



      <!--
        - PRODUCT GRID
      -->

      

      <div class="product-main">


        <h2 class="title">New Products</h2>

        <?php if($home_latest_product_on_off == 1): ?>

        <div class="product-grid">

        <?php
                        $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ORDER BY p_id DESC LIMIT ".$total_latest_product_home);
                        $statement->execute(array(1));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                        foreach ($result as $row) {
                            ?>

          <div class="showcase">

            <div class="showcase-banner">

            <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
            <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="300" height="300" class="product-img default" >
            <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="300" height="300" class="product-img hover" >
            </a>

              <p class="showcase-badge angle pink">new</p>

              <div class="showcase-actions">

                <button class="btn-action">
                  <ion-icon name="heart-outline"></ion-icon>
                </button>

                <button class="btn-action">
                  <ion-icon name="eye-outline"></ion-icon>
                </button>

                <button class="btn-action">
                  <ion-icon name="repeat-outline"></ion-icon>
                </button>

                <button class="btn-action">
                  <ion-icon name="bag-add-outline"></ion-icon>
                </button>

              </div>

            </div>

            <div class="showcase-content">

              <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-category">Tool</a>

              <a href="product.php?id=<?php echo $row['p_id']; ?>">
                <h3 class="showcase-title"><?php echo $row['p_name']; ?> </h3>
              </a>

              <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
              </div>

              <div class="price-box">
                <p class="price">₱<?php echo $row['p_current_price']; ?></p>
                <del>₱<?php echo $row['p_sale_price']; ?></del>
              </div>

            </div>
            <a href="product.php?id=<?php echo $row['p_id']; ?>">
            <button class="add-cart-btn1">add to cart</button>
            </a>

          </div>
          <?php
                }
                ?>

        </div>

      </div>
      
    
    <?php endif; ?>

    <div class="product-main">


        <h2 class="title">Featured Products</h2>

        <?php if($home_featured_product_on_off == 1): ?>

        <div class="product-grid">

            <?php
              $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=? AND p_is_active=? LIMIT ".$total_featured_product_home);
              $statement->execute(array(1,1));
              $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
              foreach ($result as $row) {
                  ?>

          <div class="showcase">

            <div class="showcase-banner">

            <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
            <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="300" height="300" class="product-img default" >
            <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="300" height="300" class="product-img hover" >
            </a>

            <p class="showcase-badge angle black">sale</p>

              <div class="showcase-actions">

                <button class="btn-action">
                  <ion-icon name="heart-outline"></ion-icon>
                </button>

                <button class="btn-action">
                  <ion-icon name="eye-outline"></ion-icon>
                </button>

                <button class="btn-action">
                  <ion-icon name="repeat-outline"></ion-icon>
                </button>

                <button class="btn-action">
                  <ion-icon name="bag-add-outline"></ion-icon>
                </button>

              </div>

            </div>

            <div class="showcase-content">

              <a href="product.php?id=<?php echo $row['p_id']; ?>" class="showcase-category">Tool</a>

              <a href="product.php?id=<?php echo $row['p_id']; ?>">
                <h3 class="showcase-title"><?php echo $row['p_name']; ?> </h3>
              </a>

              <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
              </div>

              <div class="price-box">
                <p class="price">₱<?php echo $row['p_current_price']; ?></p>
                <del>₱<?php echo $row['p_sale_price']; ?></del>
              </div>

            </div>
            <a href="product.php?id=<?php echo $row['p_id']; ?>">
            <button class="add-cart-btn1">add to cart</button>
            </a>

          </div>
          <?php
                }
                ?>

        </div>

      </div>
      
    </div>
    <?php endif; ?>

    


  </div>

</div>





<!--
  - TESTIMONIALS, CTA & SERVICE
-->

<div>

  <div class="container">

    <div class="testimonials-box">

      <!--
        - TESTIMONIALS
      -->

      <div class="testimonial">

        <h2 class="title">About</h2>

        <div class="testimonial-card">

          <img src="assets/uploads/<?php echo $favicon; ?>" alt="alan doe" class="testimonial-banner" width="80" height="80">

          <p class="testimonial-name">Standly Hardware Store</p>

          <p class="testimonial-title">Tools and Equipments</p>

          <img src="./assets/img/quotes.png" alt="quotation" class="quotation-img" width="26">

          <p class="testimonial-desc">
          We aim to offer our customers a variety of the latest Tools and Equipments. 
          </p>

        </div>

      </div>



      <!--
        - CTA
      -->

      <div class="cta-container">

        <img src="./assets/img/bannermain.avif" alt="summer collection" class="cta-banner">

        <a href="#" class="cta-content">

          <p class="discount">25% Discount</p>

          <h2 class="cta-title">Hand Tools Collections</h2>

          <p class="cta-text">Starting @ ₱99</p>

          <button class="cta-btn">Shop now</button>

        </a>

      </div>



      <!--
        - SERVICE
      -->

      <div class="service">

        <h2 class="title">Our Services</h2>

        <div class="service-container">

          <a href="#" class="service-item">

            <div class="service-icon">
              <ion-icon name="boat-outline"></ion-icon>
            </div>

            <div class="service-content">

              <h3 class="service-title">NationWide Delivery</h3>
              <p class="service-desc">For Order Over ₱100</p>

            </div>

          </a>

          <a href="#" class="service-item">
          
            <div class="service-icon">
              <ion-icon name="rocket-outline"></ion-icon>
            </div>
          
            <div class="service-content">
          
              <h3 class="service-title">Next Day delivery</h3>
              <p class="service-desc">Bulacan Area Orders Only</p>
          
            </div>
          
          </a>

          <a href="#" class="service-item">
          
            <div class="service-icon">
              <ion-icon name="call-outline"></ion-icon>
            </div>
          
            <div class="service-content">
          
              <h3 class="service-title">Best Online Support</h3>
              <p class="service-desc">Hours: 8AM - 5PM</p>
          
            </div>
          
          </a>

          <a href="#" class="service-item">
          
            <div class="service-icon">
              <ion-icon name="arrow-undo-outline"></ion-icon>
            </div>
          
            <div class="service-content">
          
              <h3 class="service-title">Return Policy</h3>
              <p class="service-desc">Easy Return</p>
          
            </div>
          
          </a>

          <a href="#" class="service-item">
          
            <div class="service-icon">
              <ion-icon name="ticket-outline"></ion-icon>
            </div>
          
            <div class="service-content">
          
              <h3 class="service-title">10% money back</h3>
              <p class="service-desc">For Order Over ₱100</p>
          
            </div>
          
          </a>

        </div>

      </div>

    </div>

  </div>

</div>





<!--
  - BLOG
-->

<div class="blog">

  <div class="container">

    <div class="blog-container has-scrollbar">

      <div class="blog-card">

        <a href="#">
          <img src="./assets/img/b1.avif" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives" width="300" class="blog-banner">
        </a>

        <div class="blog-content">

          <a href="#" class="blog-category">Hand Tools</a>

          <a href="#">
            <h3 class="blog-title">Power Tools</h3>
          </a>

          <p class="blog-meta">
            View Catalog
          </p>

        </div>

      </div>

      <div class="blog-card">
      
        <a href="#">
          <img src="./assets/img/b2.avif" alt="Curbside fashion Trends: How to Win the Pickup Battle."
            class="blog-banner" width="300">
        </a>
      
        <div class="blog-content">
      
          <a href="#" class="blog-category">Electrical</a>
      
          <h3>
            <a href="#" class="blog-title">Mid Week Price Saver</a>
          </h3>
      
          <p class="blog-meta">
            View Catalog
          </p>
      
        </div>
      
      </div>

      <div class="blog-card">
      
        <a href="#">
          <img src="./assets/img/b3.avif" alt="EBT vendors: Claim Your Share of SNAP Online Revenue."
            class="blog-banner" width="300">
        </a>
      
        <div class="blog-content">
      
          <a href="#" class="blog-category">Paints & Coatings</a>
      
          <h3>
            <a href="#" class="blog-title">Power Tools Sales</a>
          </h3>
      
          <p class="blog-meta">
            View Catalog
          </p>
      
        </div>
      
      </div>

      <div class="blog-card">
      
        <a href="#">
          <img src="./assets/img/b4.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle."
            class="blog-banner" width="300">
        </a>
      
        <div class="blog-content">
      
          <a href="#" class="blog-category">Board Products</a>
      
          <h3>
            <a href="#" class="blog-title"> Best Sellers</a>
          </h3>
      
          <p class="blog-meta">
            View Catalog
          </p>
      
        </div>
      
      </div>

    </div>

  </div>

</div>
</div>
</main>


<?php require_once('footermain.php'); ?>