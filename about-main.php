<link rel="stylesheet" href="assets/css/main.css">
<?php require_once('head.php'); ?>
<?php require_once('sidebar.php'); ?>



<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
   $about_title = $row['about_title'];
    $about_content = $row['about_content'];
    $about_banner = $row['about_banner'];
}
?>
<!DOCTYPE html>
<html lang="en">
<main>
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $about_banner; ?>);" background-size="100px">
    <div class="inner">
        <h1><?php echo $about_title; ?></h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                
                <p>
                    <?php echo $about_content; ?>
                </p>

            </div>
        </div>
    </div>
</div>

</main>
</div></div>
<?php require_once('footermain.php'); ?>