<link rel="stylesheet" href="assets/css/main.css">
<?php require_once('head.php'); ?>
<?php require_once('sidebar1.php'); ?>
<link rel="stylesheet" href="./main.css">

<title> <?php echo $meta_keyword_home; ?> | <?php echo $about_title; ?></title>

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
                   </div>
    </div>
</div>
                

            

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

        <a href="https://www.standlyhardware.com" class="cta-content">

          <p class="discount"><?php echo $about_title; ?></p>

          <h2 class="cta-title"><?php echo $meta_title_home; ?></h2>
            
            <div class="cta-text">
                <?php echo $about_content; ?>
          </div>

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
              <p class="service-desc"><?php echo nl2br($row['content']); ?> </p>

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
</div>
     
</main>
</div></div>
<?php require_once('footermain.php'); ?>