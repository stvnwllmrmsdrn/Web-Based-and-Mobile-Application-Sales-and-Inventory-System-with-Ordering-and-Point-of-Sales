<link rel="stylesheet" href="assets/css/main.css">
<?php require_once('head.php'); ?>
<?php require_once('sidebar.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $faq_title = $row['faq_title'];
    $faq_banner = $row['faq_banner'];
}
?>

<!DOCTYPE html>
<html lang="en">



    <!--
      - SIDEBAR
    -->
    <div class="product-container">

<div class="container">


        <ul class="sidebar-menu-category-list">

                <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    $faq_title = $row['faq_title'];
                    $faq_banner = $row['faq_banner'];
                }
                ?>

                    <div class="page-banner" style="background-image: url(assets/uploads/<?php echo $faq_banner; ?>);">
                        <div class="inner">
                            <h1><?php echo $faq_title; ?></h1>
                        </div>
                    </div><br><br>
                    <div class="containerc">
          <li class="sidebar-menu-category">
            
                <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_faq");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                ?>

                <button class="sidebar-accordion-menu" data-accordion-btn>

                    <div class="menu-title-flex">
                    <a class="menu-title" data-parent="#faqAccordion" data-target="#question<?php echo $row['faq_id']; ?>"></a>
                        <h2 class="panel-title">
                            Q: <?php echo $row['faq_title']; ?>
                        </h2>
                    </div>

                    <div>
                    <ion-icon name="add-outline" class="add-icon"></ion-icon>
                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>

                </button>

            <ul class="sidebar-submenu-category-list" data-accordion id="question<?php echo $row['faq_id']; ?>">

                <li class="sidebar-submenu-category">
                
                    <a class="sidebar-submenu-title" ></a>
                    <h3><span class="label label-primary">- Answer -</span></h3>
                        <p>
                            <?php echo $row['faq_content']; ?>
                        </p>

                </li>
                  
                  
            </ul>
            
            <?php
                }
                ?>

            </li>
        </ul>
    </li>

        </ul>

        </div>
        </main>
</div></div>

</div></div>
<?php require_once('footermain.php'); ?>