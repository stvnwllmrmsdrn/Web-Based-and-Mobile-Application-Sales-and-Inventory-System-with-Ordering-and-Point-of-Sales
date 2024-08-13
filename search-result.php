<?php require_once('head.php'); ?>
<?php require_once('Sidebar.php'); ?>

<?php
if(!isset($_REQUEST['search_text'])) {
    header('location: index.php');
    exit;
} else {
	if($_REQUEST['search_text']=='') {
		header('location: index.php');
    	exit;
	}
}
?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_search = $row['banner_search'];
}
?>

<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $banner_search; ?>)">
    <div class="inner">
        <h1>
            Search By: 
            <?php 
                $search_text = strip_tags($_REQUEST['search_text']); 
                echo $search_text; 
            ?>            
        </h1>
    </div>
</div>  

<div class="product-box">
    <div class="product-main">

        <h2 class="title">
            All Products related to:  
            <?php 
                $search_text = strip_tags($_REQUEST['search_text']); 
                echo $search_text; 
            ?>            
        </h2>

        

            <div class="product-grid">

            <?php
            $search_text = '%'.$search_text.'%';
            ?>

			<?php
            /* ===================== Pagination Code Starts ================== */
            $adjacents = 5;
            $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? AND p_name LIKE ?");
            $statement->execute(array(1,$search_text));
            $total_pages = $statement->rowCount();

            $targetpage = BASE_URL.'search-result.php?search_text='.$_REQUEST['search_text'];   //your file name  (the name of this file)
            $limit = 12;                                 //how many items to show per page
            $page = @$_GET['page'];
            if($page) 
                $start = ($page - 1) * $limit;          //first item to display on this page
            else
                $start = 0;
            

            $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? AND p_name LIKE ? LIMIT $start, $limit");
            $statement->execute(array(1,$search_text));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
           
            
            if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
            $prev = $page - 1;                          //previous page is page - 1
            $next = $page + 1;                          //next page is page + 1
            $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
            $lpm1 = $lastpage - 1;   
            $pagination = "";
            if($lastpage > 1)
            {   
                $pagination .= "<div class=\"pagination\">";
                if ($page > 1) 
                    $pagination.= "<a href=\"$targetpage&page=$prev\">&#171; previous</a>";
                else
                    $pagination.= "<span class=\"disabled\">&#171; previous</span>";    
                if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
                {   
                    for ($counter = 1; $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";                 
                    }
                }
                elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
                {
                    if($page < 1 + ($adjacents * 2))        
                    {
                        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";                 
                        }
                        $pagination.= "...";
                        $pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                        $pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";       
                    }
                    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                    {
                        $pagination.= "<a href=\"$targetpage&page=1\">1</a>";
                        $pagination.= "<a href=\"$targetpage&page=2\">2</a>";
                        $pagination.= "...";
                        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";                 
                        }
                        $pagination.= "...";
                        $pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                        $pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";       
                    }
                    else
                    {
                        $pagination.= "<a href=\"$targetpage&page=1\">1</a>";
                        $pagination.= "<a href=\"$targetpage&page=2\">2</a>";
                        $pagination.= "...";
                        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";                 
                        }
                    }
                }
                if ($page < $counter - 1) 
                    $pagination.= "<a href=\"$targetpage&page=$next\">next &#187;</a>";
                else
                    $pagination.= "<span class=\"disabled\">next &#187;</span>";
                $pagination.= "</div>\n";       
            }
            /* ===================== Pagination Code Ends ================== */
            ?>

                <?php
                
                if(!$total_pages):
                    echo '<span style="color:red;font-size:18px;">No result found</span>';
                else:
                foreach ($result as $row) {
                    ?>
 <title> <?php echo $meta_keyword_home; ?> | <?php 
                $search_text = strip_tags($_REQUEST['search_text']); 
                echo $search_text; 
            ?> </title>   
 
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

                <a href="product?id=<?php echo $row['p_id']; ?>" class="showcase-category">Tool</a>

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
                    <p class="price">₱<?php echo formatMoney ( $row['p_current_price'], true); ?></p>
                    
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
                            ?>
                            <div class="clear"></div>
							<div class="pagination">
                            <?php 
                                echo $pagination; 
                            ?>
                            </div>
                            <?php
                            endif;
                        ?>

            </div>
            
            </div>

     

    



</div>



</div>
</div>
<?php require_once('footermain.php'); ?> 