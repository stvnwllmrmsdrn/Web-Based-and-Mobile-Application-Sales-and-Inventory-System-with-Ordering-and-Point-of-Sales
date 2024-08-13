<?php require_once('head.php'); ?>
<?php require_once('banner.php'); ?>
<?php require_once('Sidebar.php'); ?>


<div class="product-box">

        
        <!--
        - PRODUCT GRID
      -->

      

      <div class="product-main">


        <div class="d-flex align-items-center">
           <h2 class="title"> <img src="assets/img/icons/new.gif" alt="" height="40" class="img-fluid"> New Products</h2>
        </div>

        <?php if($home_latest_product_on_off == 1): ?>

        <div class="product-grid">

        <?php
        $statement = $pdo->prepare("SELECT
            
                        t1.p_id,
                        t1.p_name,
                        t1.p_old_price,
                        t1.p_current_price,
                        t1.p_walkin_price,
                        t1.p_sale_price,
                        t1.p_qty,
                        t1.p_featured_photo,
                        t1.p_is_featured,
                        t1.p_is_active,
                        t1.ecat_id,

                        t2.ecat_id,
                        t2.ecat_name,

                        t3.mcat_id,
                        t3.mcat_name,

                        t4.tcat_id,
                        t4.tcat_name


                        FROM tbl_product t1
                        JOIN tbl_end_category t2
                        ON t1.ecat_id = t2.ecat_id
                        JOIN tbl_mid_category t3
                        ON t2.mcat_id = t3.mcat_id
                        JOIN tbl_top_category t4
                        ON t3.tcat_id = t4.tcat_id
                        
                        WHERE p_is_active=? AND p_qty!='0' ORDER BY p_id DESC LIMIT ".$total_latest_product_home);

        $statement->execute(array(1));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>

          <div class="showcase">

            <div class="showcase-banner">

            <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
            <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="300" height="300" class="product-img default" >
           
                <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
                $statement->execute(array($row['p_id']));
                $photo = $statement->rowCount();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row1) {
                  $photo = $row1['photo'];
                  $p_id = $row1['p_id'];
                }

                if ($photo == 0){
                     echo '<img style="background-image:url(assets/uploads/'.$row['p_featured_photo'].');" ' .$row['p_name'].  'width="300" height="300" class="product-img hover" >';
                } else {
                      echo '<img style="background-image:url(assets/uploads/product_photos/'.$row1['photo'].');" '.$row['p_name'].' width="300" height="300" class="product-img hover" >';
                    }  
                ?>     
            </a>

              <p class="showcase-badge angle pink">new</p>

              <div class="showcase-actions">

                <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action" >
                    <ion-icon name="heart-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="eye-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="repeat-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="bag-add-outline"></ion-icon>
                    </button></a>

              </div>

            </div>

            <div class="showcase-content">

              <a href="product-category?id=<?php echo $row['mcat_id']; ?>&type=mid-category" class="showcase-category"><?php echo $row['mcat_name']; ?> </a>

              <a href="product?id=<?php echo $row['p_id']; ?>">
                <h3 class="showcase-title"><?php echo $row['p_name']; ?> </h3>
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
                                                    echo htmlspecialchars("($tot_rating)"); 
                                                }
                                                ?>
              </div>

              <div class="price-box">
                <p class="price">₱<?php echo formatMoney ($row['p_current_price'], true); ?></p>
                <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
               
              </div>

            </div>
            <a href="product?id=<?php echo $row['p_id']; ?>">
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


        <div class="d-flex align-items-center">
           <h2 class="title"> <img src="assets/img/icons/trend.gif" alt="" width="40" class="img-fluid"> <?php echo $popular_product_title; ?></h2>
          </div>

        <?php if($home_popular_product_on_off == 1): ?>

        <div class="product-grid">

        <?php
        $statement = $pdo->prepare("SELECT
            
                        t1.p_id,
                        t1.p_name,
                        t1.p_old_price,
                        t1.p_current_price,
                        t1.p_walkin_price,
                        t1.p_sale_price,
                        t1.p_qty,
                        t1.p_featured_photo,
                        t1.p_is_featured,
                        t1.p_is_active,
                        t1.ecat_id,

                        t2.ecat_id,
                        t2.ecat_name,

                        t3.mcat_id,
                        t3.mcat_name,

                        t4.tcat_id,
                        t4.tcat_name


                        FROM tbl_product t1
                        JOIN tbl_end_category t2
                        ON t1.ecat_id = t2.ecat_id
                        JOIN tbl_mid_category t3
                        ON t2.mcat_id = t3.mcat_id
                        JOIN tbl_top_category t4
                        ON t3.tcat_id = t4.tcat_id
                        
                        WHERE p_is_active=? AND p_qty!='0' ORDER BY p_total_view DESC LIMIT ".$total_popular_product_home);

        $statement->execute(array(1));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>

          <div class="showcase">

            <div class="showcase-banner">

            <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
            <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="300" height="300" class="product-img default" >
            <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
                $statement->execute(array($row['p_id']));
                $photo = $statement->rowCount();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row1) {
                  $photo = $row1['photo'];
                  $p_id = $row1['p_id'];
                }

                if ($photo == 0){
                     echo '<img style="background-image:url(assets/uploads/'.$row['p_featured_photo'].');" ' .$row['p_name'].  'width="300" height="300" class="product-img hover" >';
                } else {
                      echo '<img style="background-image:url(assets/uploads/product_photos/'.$row1['photo'].');" '.$row['p_name'].' width="300" height="300" class="product-img hover" >';
                    }  
                ?>    
            </a>

              <p class="showcase-badge angle #009688">trend</p>

              <div class="showcase-actions">

                <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action" >
                    <ion-icon name="heart-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="eye-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="repeat-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="bag-add-outline"></ion-icon>
                    </button></a>

              </div>

            </div>

            <div class="showcase-content">

              <a href="product-category?id=<?php echo $row['mcat_id']; ?>&type=mid-category" class="showcase-category"><?php echo $row['mcat_name']; ?></a>

              <a href="product?id=<?php echo $row['p_id']; ?>">
                <h3 class="showcase-title"><?php echo $row['p_name']; ?> </h3>
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
                                                    echo htmlspecialchars("($tot_rating)"); 
                                                }
                                                ?>
              </div>

              <div class="price-box">
                <p class="price">₱<?php echo formatMoney ($row['p_current_price'], true); ?></p>
                <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
              </div>

            </div>
            <a href="product?id=<?php echo $row['p_id']; ?>">
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


       <div class="d-flex align-items-center">
       <h2 class="title"> <img src="assets/img/icons/save.gif" alt="" width="40" class="img-fluid"> Featured Products</h2>
      </div>

        <?php if($home_featured_product_on_off == 1): ?>

        <div class="product-grid">

        <?php
        $statement = $pdo->prepare("SELECT
            
                        t1.p_id,
                        t1.p_name,
                        t1.p_old_price,
                        t1.p_current_price,
                        t1.p_walkin_price,
                        t1.p_sale_price,
                        t1.p_qty,
                        t1.p_featured_photo,
                        t1.p_is_featured,
                        t1.p_is_active,
                        t1.ecat_id,

                        t2.ecat_id,
                        t2.ecat_name,

                        t3.mcat_id,
                        t3.mcat_name,

                        t4.tcat_id,
                        t4.tcat_name


                        FROM tbl_product t1
                        JOIN tbl_end_category t2
                        ON t1.ecat_id = t2.ecat_id
                        JOIN tbl_mid_category t3
                        ON t2.mcat_id = t3.mcat_id
                        JOIN tbl_top_category t4
                        ON t3.tcat_id = t4.tcat_id
                        
                        WHERE p_is_featured=? AND p_is_active=? AND p_qty!='0' LIMIT ".$total_featured_product_home);

        $statement->execute(array(1,1));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>

          <div class="showcase">

            <div class="showcase-banner">

            <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
            <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="300" height="300" class="product-img default" >
            <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
                $statement->execute(array($row['p_id']));
                $photo = $statement->rowCount();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row1) {
                  $photo = $row1['photo'];
                  $p_id = $row1['p_id'];
                }

                if ($photo == 0){
                     echo '<img style="background-image:url(assets/uploads/'.$row['p_featured_photo'].');" ' .$row['p_name'].  'width="300" height="300" class="product-img hover" >';
                } else {
                      echo '<img style="background-image:url(assets/uploads/product_photos/'.$row1['photo'].');" '.$row['p_name'].' width="300" height="300" class="product-img hover" >';
                    }  
                ?>    
                
              </a>

            <p class="showcase-badge angle black">sale</p>

              <div class="showcase-actions">

                <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action" >
                    <ion-icon name="heart-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="eye-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="repeat-outline"></ion-icon>
                    </button></a>

                    <a href="product.php?id=<?php echo $row['p_id']; ?>">
                    <button class="btn-action">
                    <ion-icon name="bag-add-outline"></ion-icon>
                    </button></a>

              </div>

            </div>

            <div class="showcase-content">

              <a href="product-category?id=<?php echo $row['mcat_id']; ?>&type=mid-category" class="showcase-category"><?php echo $row['mcat_name']; ?></a>

              <a href="product?id=<?php echo $row['p_id']; ?>">
                <h4 class="showcase-title"><?php echo $row['p_name']; ?> </h4>
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
                                                    echo htmlspecialchars("($tot_rating)"); 
                                                }
                                                ?>
              </div>

              <div class="price-box">
                <p class="price">₱<?php echo formatMoney ($row['p_current_price'], true); ?></p>
                <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
              </div>

            </div>
            <a href="product?id=<?php echo $row['p_id']; ?>">
            <button class="add-cart-btn1">add to cart</button>
            </a>

          </div>
          <?php
                }
                ?>

        </div>

      </div>
      
    <?php endif; ?>
    
     <!--
        - PRODUCT FEATURED
      -->

      <div class="product-featured">

        <div class="d-flex align-items-center">
          <h2 class="title"> <img src="assets/img/icons/best-deal.gif" alt="" width="40" class="img-fluid"> Deal of the Day</h2>
        </div>
        <?php if($home_featured_product_on_off == 1): ?>

        <div class="showcase-wrapper has-scrollbar">

        <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=? AND p_is_active=? AND p_qty!='0' LIMIT ".$total_featured_product_home);
                    $statement->execute(array(1,1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>

          <div class="showcase-container">

            <div class="showcase">
              
              <div class="showcase-banner" href="product?id=<?php echo $row['p_id']; ?>"> 
                
                <img src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" <?php echo $row['p_name']; ?> width="400" height="400" class="showcase-img" >
              </div>

              <div class="showcase-content">
                
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
                                                    for($i=1;$i<=5;$i++) {
                                                        ?>
                                                        <?php if($i>$avg_rating): ?>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endif; ?>
                                                        <?php
                                                    }
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
                                                    echo htmlspecialchars("($tot_rating)"); 
                                                }
                                                ?>
                </div>

                <a href="product?id=<?php echo $row['p_id']; ?>">
                  <h3 class="showcase-title"><?php echo $row['p_name']; ?></h3>
                </a>


                <p class="showcase-desc">
                <?php echo $row['p_description']; ?>
                </p>

                <div class="price-box">
                  <p class="price">₱<?php echo formatMoney ($row['p_current_price'], true); ?></p>

                  <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
                </div>

                <a href="product?id=<?php echo $row['p_id']; ?>">
                <button class="add-cart-btn">add to cart</button></a>

                <div class="showcase-status">
                  <div class="wrapper">
                    <p>
                      already sold: <b>20</b>
                    </p>

                    <p>
                      available: <b><?php echo  nl2br (" $p_qty  ");?></b>
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
        - PRODUCT MINIMAL
      -->

      <div class="product-minimal">

        <div class="product-showcase">

         <div class="d-flex align-items-center">
          <h2 class="title"> <img src="assets/img/icons/new.gif" alt="" height="40" class="img-fluid"> New Arrivals</h2>
        </div>
          
          <div class="showcase-wrapper has-scrollbar">

          <?php if($home_latest_product_on_off == 1): ?>

            <div class="showcase-container">
                <?php
                        $statement = $pdo->prepare("SELECT 
                        
                            t1.p_id,
                            t1.p_name,
                            t1.p_old_price,
                            t1.p_current_price,
                            t1.p_walkin_price,
                            t1.p_sale_price,
                            t1.p_qty,
                            t1.p_featured_photo,
                            t1.p_is_featured,
                            t1.p_is_active,
                            t1.ecat_id,
    
                            t2.ecat_id,
                            t2.ecat_name,
    
                            t3.mcat_id,
                            t3.mcat_name,
    
                            t4.tcat_id,
                            t4.tcat_name
    
    
                            FROM tbl_product t1
                            JOIN tbl_end_category t2
                            ON t1.ecat_id = t2.ecat_id
                            JOIN tbl_mid_category t3
                            ON t2.mcat_id = t3.mcat_id
                            JOIN tbl_top_category t4
                            ON t3.tcat_id = t4.tcat_id
                            WHERE p_is_active=? AND p_qty!='0' ORDER BY p_id DESC LIMIT ".$total_latest_product_home);
                        
                        $statement->execute(array(1));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                        foreach ($result as $row) {
                            ?>
                      <div class="showcase">

                            <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                              <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="70" height="70" class="showcase-img" >
                            </a>

                                <div class="showcase-content">

                                  <a href="product?id=<?php echo $row['p_id']; ?>">
                                    <h4 class="showcase-title"><?php echo $row['p_name']; ?></h4>
                                  </a>

                                  <a href="product-category?id=<?php echo $row['mcat_id']; ?>&type=mid-category" class="showcase-category"><?php echo $row['mcat_name']; ?></a>


                                  <div class="price-box">
                                    <p class="price">₱<?php echo formatMoney ($row['p_current_price'], true); ?> 
                                          <?php if($row['p_walkin_price'] != ''): ?></p>
                                    <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
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

         <div class="d-flex align-items-center">
          <h2 class="title"> <img src="assets/img/icons/save.gif" alt="" width="40" class="img-fluid"> Featured Products</h2>
        </div>
          
          <div class="showcase-wrapper has-scrollbar">

          <?php if($home_featured_product_on_off == 1): ?>

            <div class="showcase-container">
            <?php
                   $statement = $pdo->prepare("SELECT 
                        
                            t1.p_id,
                            t1.p_name,
                            t1.p_old_price,
                            t1.p_current_price,
                            t1.p_walkin_price,
                            t1.p_sale_price,
                            t1.p_qty,
                            t1.p_featured_photo,
                            t1.p_is_featured,
                            t1.p_is_active,
                            t1.ecat_id,
    
                            t2.ecat_id,
                            t2.ecat_name,
    
                            t3.mcat_id,
                            t3.mcat_name,
    
                            t4.tcat_id,
                            t4.tcat_name
    
    
                            FROM tbl_product t1
                            JOIN tbl_end_category t2
                            ON t1.ecat_id = t2.ecat_id
                            JOIN tbl_mid_category t3
                            ON t2.mcat_id = t3.mcat_id
                            JOIN tbl_top_category t4
                            ON t3.tcat_id = t4.tcat_id
                            WHERE p_is_featured=? AND p_is_active=? AND p_qty!='0' LIMIT ".$total_featured_product_home);
                            
                    $statement->execute(array(1,1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
                      <div class="showcase">

                            <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                              <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="70" height="70" class="showcase-img" >
                            </a>

                                <div class="showcase-content">

                                  <a href="product?id=<?php echo $row['p_id']; ?>">
                                    <h4 class="showcase-title"><?php echo $row['p_name']; ?></h4>
                                  </a>

                                  <a href="product-category?id=<?php echo $row['mcat_id']; ?>&type=mid-category" class="showcase-category"><?php echo $row['mcat_name']; ?></a>


                                  <div class="price-box">
                                    <p class="price">₱<?php echo formatMoney ($row['p_current_price'], true); ?> 
                                          <?php if($row['p_walkin_price'] != ''): ?></p>
                                    <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
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

          <div class="d-flex align-items-center">
            <h2 class="title"> <img src="assets/img/icons/trend.gif" alt="" width="40" class="img-fluid"> Popular Product</h2>
          </div>
          
          <div class="showcase-wrapper has-scrollbar">

          <?php if($home_popular_product_on_off == 1): ?>

            <div class="showcase-container">
                      <?php
                             $statement = $pdo->prepare("SELECT 
                        
                            t1.p_id,
                            t1.p_name,
                            t1.p_old_price,
                            t1.p_current_price,
                            t1.p_walkin_price,
                            t1.p_sale_price,
                            t1.p_qty,
                            t1.p_featured_photo,
                            t1.p_is_featured,
                            t1.p_is_active,
                            t1.ecat_id,
    
                            t2.ecat_id,
                            t2.ecat_name,
    
                            t3.mcat_id,
                            t3.mcat_name,
    
                            t4.tcat_id,
                            t4.tcat_name
    
    
                            FROM tbl_product t1
                            JOIN tbl_end_category t2
                            ON t1.ecat_id = t2.ecat_id
                            JOIN tbl_mid_category t3
                            ON t2.mcat_id = t3.mcat_id
                            JOIN tbl_top_category t4
                            ON t3.tcat_id = t4.tcat_id
                            WHERE p_is_active=? AND p_qty!='0' ORDER BY p_total_view DESC LIMIT ".$total_popular_product_home);
                            
                              $statement->execute(array(1));
                              $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                              foreach ($result as $row) {
                                  ?>
                      <div class="showcase">

                            <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-img-box">
                              <img style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);" <?php echo $row['p_name']; ?> width="70" height="70" class="showcase-img" >
                            </a>

                                <div class="showcase-content">

                                  <a href="product?id=<?php echo $row['p_id']; ?>">
                                    <h4 class="showcase-title"><?php echo $row['p_name']; ?></h4>
                                  </a>

                                  <a href="product-category?id=<?php echo $row['mcat_id']; ?>&type=mid-category" class="showcase-category"><?php echo $row['mcat_name']; ?></a>


                                  <div class="price-box">
                                    <p class="price">₱<?php echo formatMoney ( $row['p_current_price'], true); ?> 
                                          <?php if($row['p_walkin_price'] != ''): ?></p>
                                    <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
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



     


      

    
    </div>

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

          <img src="assets/uploads/<?php echo $favicon; ?>" alt="alan doe" class="testimonial-banner" width="80" height="70">

          <p class="testimonial-name"><?php echo $meta_title_home; ?></p>

          <p class="testimonial-title"><?php echo $meta_keyword_home; ?></p>

          <img src="./assets/img/quotes.png" alt="quotation" class="quotation-img" width="26">

          <p class="testimonial-desc">
          <?php echo $meta_description_home; ?>
          </p>

        </div>

      </div>



      <!--
        - CTA
      -->

      <div class="cta-container">

        <img src="./assets/img/bannermain.avif" alt="Featured Product" class="cta-banner">

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

      <?php if($home_service_on_off == 1): ?>
      <div class="service">

        <h2 class="title">Our Services</h2>

        <div class="service-container">
        <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_service");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    ?>

          <a href="#" class="service-item">

            <div class="service-icon">
            <div class="photo"><img src="assets/uploads/<?php echo $row['photo']; ?>" width="50px" alt="<?php echo $row['title']; ?>"></div>
            </div>

            <div class="service-content">

              <h3 class="service-title"><?php echo $row['title']; ?></h3>
              <p class="service-desc"><?php echo nl2br($row['content']); ?></p>

            </div>

          </a>
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
  - BLOG
-->

<div class="blog">

  <div class="container">

    <div class="blog-container has-scrollbar">

      <div class="blog-card">

        <a href="https://standlyhardware.com/product-category?id=1&type=top-category">
          <img src="./assets/img/b1.avif" alt="" width="300" class="blog-banner">
        </a>

        <div class="blog-content">

          <a href="https://standlyhardware.com/product-category?id=1&type=top-category" class="blog-category">Hand Tools</a>

          <a href="https://standlyhardware.com/product-category?id=1&type=top-category">
            <h3 class="blog-title">Power Tools</h3>
          </a>

          <p class="blog-meta">
            View Catalog
          </p>

        </div>

      </div>

      <div class="blog-card">
      
        <a href="#">
          <img src="./assets/img/b2.avif" alt=""
            class="blog-banner" width="300">
        </a>
      
        <div class="blog-content">
      
          <a href="https://standlyhardware.com/product-category?id=2&type=top-category" class="blog-category">Electrical</a>
      
          <h3>
            <a href="https://standlyhardware.com/product-category?id=2&type=top-category" class="blog-title">Mid Week Price Saver</a>
          </h3>
      
          <p class="blog-meta">
            View Catalog
          </p>
      
        </div>
      
      </div>

      <div class="blog-card">
      
        <a href="https://standlyhardware.com/product-category?id=3&type=top-category">
          <img src="./assets/img/b3.avif" alt=""
            class="blog-banner" width="300">
        </a>
      
        <div class="blog-content">
      
          <a href="https://standlyhardware.com/product-category?id=3&type=top-category" class="blog-category">Paints & Coatings</a>
      
          <h3>
            <a href="https://standlyhardware.com/product-category?id=3&type=top-category" class="blog-title">Power Tools Sales</a>
          </h3>
      
          <p class="blog-meta">
            View Catalog
          </p>
      
        </div>
      
      </div>

      <div class="blog-card">
      
        <a href="https://standlyhardware.com/product-category?id=4&type=top-category">
          <img src="./assets/img/b4.jpg" alt=""
            class="blog-banner" width="300">
        </a>
      
        <div class="blog-content">
      
          <a href="https://standlyhardware.com/product-category?id=4&type=top-category" class="blog-category">Board Products</a>
      
          <h3>
            <a href="https://standlyhardware.com/product-category?id=4&type=top-category" class="blog-title"> Best Sellers</a>
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