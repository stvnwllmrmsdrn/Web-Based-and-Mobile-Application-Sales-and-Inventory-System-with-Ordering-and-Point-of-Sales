<?php require_once('head.php'); ?>
<?php require_once('Sidebar.php'); ?>



<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_product_category = $row['banner_product_category'];
}
?>

<?php
if( !isset($_REQUEST['id']) || !isset($_REQUEST['type']) ) {
    header('location: index.php');
    exit;
} else {

    if( ($_REQUEST['type'] != 'top-category') && ($_REQUEST['type'] != 'mid-category') && ($_REQUEST['type'] != 'end-category') ) {
        header('location: index.php');
        exit;
    } else {

        $statement = $pdo->prepare("SELECT * FROM tbl_top_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $top[] = $row['tcat_id'];
            $top1[] = $row['tcat_name'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $mid[] = $row['mcat_id'];
            $mid1[] = $row['mcat_name'];
            $mid2[] = $row['tcat_id'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_end_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $end[] = $row['ecat_id'];
            $end1[] = $row['ecat_name'];
            $end2[] = $row['mcat_id'];
        }

        if($_REQUEST['type'] == 'top-category') {
            if(!in_array($_REQUEST['id'],$top)) {
                header('location: index.php');
                exit;
            } else {

                // Getting Title
                for ($i=0; $i < count($top); $i++) { 
                    if($top[$i] == $_REQUEST['id']) {
                        $title = $top1[$i];
                        break;
                    }
                }
                $arr1 = array();
                $arr2 = array();
                // Find out all ecat ids under this
                for ($i=0; $i < count($mid); $i++) { 
                    if($mid2[$i] == $_REQUEST['id']) {
                        $arr1[] = $mid[$i];
                    }
                }
                for ($j=0; $j < count($arr1); $j++) {
                    for ($i=0; $i < count($end); $i++) { 
                        if($end2[$i] == $arr1[$j]) {
                            $arr2[] = $end[$i];
                        }
                    }   
                }
                $final_ecat_ids = $arr2;
            }   
        }

        if($_REQUEST['type'] == 'mid-category') {
            if(!in_array($_REQUEST['id'],$mid)) {
                header('location: index.php');
                exit;
            } else {
                // Getting Title
                for ($i=0; $i < count($mid); $i++) { 
                    if($mid[$i] == $_REQUEST['id']) {
                        $title = $mid1[$i];
                        break;
                    }
                }
                $arr2 = array();        
                // Find out all ecat ids under this
                for ($i=0; $i < count($end); $i++) { 
                    if($end2[$i] == $_REQUEST['id']) {
                        $arr2[] = $end[$i];
                    }
                }
                $final_ecat_ids = $arr2;
            }
        }

        if($_REQUEST['type'] == 'end-category') {
            if(!in_array($_REQUEST['id'],$end)) {
                header('location: index.php');
                exit;
            } else {
                // Getting Title
                for ($i=0; $i < count($end); $i++) { 
                    if($end[$i] == $_REQUEST['id']) {
                        $title = $end1[$i];
                        break;
                    }
                }
                $final_ecat_ids = array($_REQUEST['id']);
            }
        }
        
    }   
}
?>
<title> <?php echo $meta_keyword_home; ?> | <?php echo $title; ?> </title>
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $banner_product_category; ?>)">
    <div class="inner">
        <h1><?php echo LANG_VALUE_50; ?> <?php echo $title; ?></h1>
    </div>
</div>  

<div class="product-box">
    <div class="product-main">


        <h2 class="title"><?php echo LANG_VALUE_51; ?> "<?php echo $title; ?>"</h2>

        

            <div class="product-grid">

                        <?php
                            // Checking if any product is available or not
                            $prod_count = 0;
                            $statement = $pdo->prepare("SELECT * FROM tbl_product");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $prod_table_ecat_ids[] = $row['ecat_id'];
                            }

                            for($ii=0;$ii<count($final_ecat_ids);$ii++):
                                if(in_array($final_ecat_ids[$ii],$prod_table_ecat_ids)) {
                                    $prod_count++;
                                }
                            endfor;

                            if($prod_count==0) {
                                echo '<div class="pl_15">'.LANG_VALUE_153.'</div>';
                            } else {
                                for($ii=0;$ii<count($final_ecat_ids);$ii++) {
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
                        
                                    WHERE t1.ecat_id=? AND p_is_active=?");

                                    $statement->execute(array($final_ecat_ids[$ii],1));
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
                    
                    <?php if($row['p_walkin_price'] != ''): ?></p>
                        <del>₱<?php echo formatMoney ($row['p_walkin_price'], true); ?></del>
                    <?php endif; ?>
                    
                </div>

                <?php if($row['p_qty'] == 0): ?>
                <div class="out-of-stock">
                    <div class="inner">
                        Out Of Stock
                    </div>
                </div>
                

                
                

                <?php else: ?>
                    <a href="product?id=<?php echo $row['p_id']; ?>">
                    <button class="add-cart-btn1"><?php echo LANG_VALUE_154; ?></button>
                    </a>
                <?php endif; ?>

            </div>
        </div>
    

                    <?php
                 }
            }
        }
        ?></div>

            
            
        </div>
    </div>
</div>



</div>
</div>
<?php require_once('footermain.php'); ?>    