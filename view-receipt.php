<?php require_once('head.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="cartstyle.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/jquery.bxslider.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/rating.css">
	<link rel="stylesheet" href="assets/css/spacing.css">
	<link rel="stylesheet" href="assets/css/bootstrap-touch-slider.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/tree-menu.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    

    <?php
if(!isset($_REQUEST['payment_id'])) {
    header('location: customer-order.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_id=?");
    $statement->execute(array($_REQUEST['payment_id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: customer-order.php');
        exit;
    }
}

foreach($result as $row) {
  $id = $row['id'];
  $photo = $row['photo'];
  $payment_id = $row['payment_id'];
}

?>

 </div>
</div>
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
                <div class="inner">
                    <h1><?php echo LANG_VALUE_24; ?></h1>
                </div>
                </div>
             
            <br>

<div class="category">

<?php require_once('usernave.php'); ?>


<div class="container" style="padding:0;margin-top: 0;">

<div class="category">

<section class="content">

<div class="col-lg-12">
<a href="customer-order-details?payment_id=<?php echo $row['payment_id']; ?>" class="btn btn-primary btn-xs">Back</a>
                          <h3>Payment Receipt :</h3>
                          <a href="#">
                          Uploaded File:  <?php echo ($row['photo']); ?>
                          
                          <img class="" src="assets/uploads/payment_receipt/<?php echo $row['photo']; ?>" style="width:100%;margin-top:20px;border-radius:0;">
                          </a>
                        </div>


               


            </section> 
        
</body>
</html>
    
        </div> 
      </div>   
    </div>   
  </div> 
<?php require_once('footermain.php'); ?>