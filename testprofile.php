<?php require_once('head.php'); ?>

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
	<link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="./profile.css">
 

                               

<?php
// Check if the customer is logged in or not
if(!isset($_SESSION['customer'])) {
    header('location: '.BASE_URL.'logout.php');
    exit;
} else {
    // If customer is logged in, but admin make him inactive, then force logout this user.
    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=? AND cust_status=?");
    $statement->execute(array($_SESSION['customer']['cust_id'],0));
    $total = $statement->rowCount();
    if($total) {
        header('location: '.BASE_URL.'logout.php');
        exit;
    }
}
?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
$statement->execute(array($_SESSION['customer']['cust_id']));
$statement->rowCount();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$cust_name = $row['cust_name'];
    $cust_cname = $row['cust_cname'];
	$cust_email     = $row['cust_email'];
	$cust_phone     = $row['cust_phone'];
	$photo          = $row['photo'];
	$cust_status    = $row['cust_status'];
}

if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['cust_name'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_123."<br>";
    }

    if(empty($_POST['cust_phone'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_124."<br>";
    }

    if(empty($_POST['cust_address'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_125."<br>";
    }

    if(empty($_POST['cust_country'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_126."<br>";
    }

    if(empty($_POST['cust_city'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_127."<br>";
    }

    if(empty($_POST['cust_state'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_128."<br>";
    }

    if(empty($_POST['cust_zip'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_129."<br>";
    }

    if($valid == 1) {

    // update data into the database
    $statement = $pdo->prepare("UPDATE tbl_customer SET cust_name=?, cust_cname=?, cust_phone=?, cust_country=?, cust_address=?, cust_city=?, cust_state=?, cust_zip=? WHERE cust_id=?");
        
    $statement->execute(array(
                            strip_tags($_POST['cust_name']),
                            strip_tags($_POST['cust_cname']),
                            strip_tags($_POST['cust_phone']),
                            strip_tags($_POST['cust_country']),
                            strip_tags($_POST['cust_address']),
                            strip_tags($_POST['cust_city']),
                            strip_tags($_POST['cust_state']),
                            strip_tags($_POST['cust_zip']),
                            $_SESSION['customer']['cust_id']
                        ));  
   
    $success_message = LANG_VALUE_130;

    $_SESSION['customer']['cust_name'] = $_POST['cust_name'];
    $_SESSION['customer']['cust_cname'] = $_POST['cust_cname'];
    $_SESSION['customer']['cust_phone'] = $_POST['cust_phone'];
    $_SESSION['customer']['cust_country'] = $_POST['cust_country'];
    $_SESSION['customer']['cust_address'] = $_POST['cust_address'];
    $_SESSION['customer']['cust_city'] = $_POST['cust_city'];
    $_SESSION['customer']['cust_state'] = $_POST['cust_state'];
    $_SESSION['customer']['cust_zip'] = $_POST['cust_zip'];
                    }
}

if(isset($_POST['form2'])) {

	$valid = 1;

	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

    	// removing the existing photo
    	if($_SESSION['customer']['photo']!='') {
    		unlink('assets/uploads/profile/'.$_SESSION['customer']['photo']);	
    	}

    	// updating the data
    	$final_name = 'cust-'.$_SESSION['customer']['cust_id'].'.'.$ext;
        move_uploaded_file( $path_tmp, 'assets/uploads/profile/'.$final_name );
        $_SESSION['customer']['photo'] = $final_name;

        // updating the database
		$statement = $pdo->prepare("UPDATE tbl_customer SET photo=? WHERE cust_id=?");
		$statement->execute(array($final_name,$_SESSION['customer']['cust_id']));

        $success_message = 'User Photo is updated successfully.';
    	
    }
}

if(isset($_POST['form3'])) {
	$valid = 1;

	if( empty($_POST['password']) || empty($_POST['re_password']) ) {
        $valid = 0;
        $error_message .= "Password can not be empty<br>";
    }

    if( !empty($_POST['password']) && !empty($_POST['re_password']) ) {
    	if($_POST['password'] != $_POST['re_password']) {
	    	$valid = 0;
	        $error_message .= "Passwords do not match<br>";	
    	}        
    }

    if($valid == 1) {

    	$_SESSION['customer']['cust_password'] = md5($_POST['password']);

    	// updating the database
		$statement = $pdo->prepare("UPDATE tbl_customer SET cust_password=? WHERE cust_id=?");
		$statement->execute(array(md5($_POST['password']),$_SESSION['customer']['cust_id']));

    	$success_message = 'User Password is updated successfully.';
    }
}

?>



<div class="page" style="padding-top:0;">
    
<div class="container">
    
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
                <div class="inner">
                <h1>Profile</h1>
                </div>
            </div><br>
            
<?php require_once('usernave.php'); ?> 

<div class="containerc">
    <section class="content">

	<div class="row">
		<div class="col-md-12">
				
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">Profile</a></li>
						<li><a href="#tab_2" data-toggle="tab">Photo</a></li>
						<li><a href="#tab_3" data-toggle="tab">Password</a></li>
					</ul>
					<div class="tab-content">
          				<div class="tab-pane active" id="tab_1">
                            <div class="box box-info">
                                <div class="box-body">
                                    <?php
                                    if($error_message != '') {
                                        echo "<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$error_message."</div>";
                                    }
                                    if($success_message != '') {
                                        echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$success_message."</div>";
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <?php $csrf->echoInputField(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="form-group"  style="text-align: -webkit-center;">
                                                <h3>Edit Profile</h3>
                                                    <img class="profile" src="assets/uploads/profile/<?php echo $_SESSION['customer']['photo']; ?>">

                                                </div>

                                                <div class="col-md-6 form-group">
                                                <label for=""><?php echo LANG_VALUE_102; ?> *</label>
                                                <input type="text" class="form-control" name="cust_name" value="<?php echo $_SESSION['customer']['cust_name']; ?>">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for=""><?php echo LANG_VALUE_103; ?> *</label>
                                                <input type="text" class="form-control" name="cust_cname" value="<?php echo $_SESSION['customer']['cust_cname']; ?>">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for=""><?php echo LANG_VALUE_94; ?> *</label>
                                                <input type="text" class="form-control" name="" value="<?php echo $_SESSION['customer']['cust_email']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for=""><?php echo LANG_VALUE_104; ?> *</label>
                                                <input type="text" class="form-control" name="cust_phone" value="<?php echo $_SESSION['customer']['cust_phone']; ?>">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for=""><?php echo LANG_VALUE_105; ?> *</label>
                                                <textarea name="cust_address" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $_SESSION['customer']['cust_address']; ?></textarea>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for=""><?php echo LANG_VALUE_106; ?> *</label>
                                                <select name="cust_country" class="form-control">
                                                <?php
                                                $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                                                $statement->execute();
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($result as $row) {
                                                    ?>
                                                    <option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $_SESSION['customer']['cust_country']) {echo 'selected';} ?>><?php echo $row['country_name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>                                    
                                            </div>
                                            
                                            <div class="col-md-6 form-group">
                                                <label for=""><?php echo LANG_VALUE_107; ?> *</label>
                                                <select name="cust_city" class="form-control">
                                                <?php
                                                $statement = $pdo->prepare("SELECT * FROM tbl_city ORDER BY city_name ASC");
                                                $statement->execute();
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($result as $row) {
                                                    ?>
                                                    <option value="<?php echo $row['city_id']; ?>" <?php if($row['city_id'] == $_SESSION['customer']['cust_city']) {echo 'selected';} ?>><?php echo $row['city_name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>                                    
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for=""><?php echo LANG_VALUE_108; ?> *</label>
                                                <select name="cust_state" class="form-control">
                                                <?php
                                                $statement = $pdo->prepare("SELECT * FROM tbl_state ORDER BY state_name ASC");
                                                $statement->execute();
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($result as $row) {
                                                    ?>
                                                    <option value="<?php echo $row['state_id']; ?>" <?php if($row['state_id'] == $_SESSION['customer']['cust_state']) {echo 'selected';} ?>><?php echo $row['state_name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>                                    
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for=""><?php echo LANG_VALUE_109; ?> *</label>
                                                <input type="text" class="form-control" name="cust_zip" value="<?php echo $_SESSION['customer']['cust_zip']; ?>">
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="<?php echo LANG_VALUE_5; ?>" name="form1">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                            
          				<div class="tab-pane" id="tab_2">
							<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="col-md-12" style="text-align: -webkit-center;">
                                    <div class="box box-info">
                                        <div class="box-body">
                                                <div class="form-group"><br>
                                                
                                                    <h3>Edit Profile Picture</h3>
                                                    
                                                        <div class="form-group">
                                                            <img class="profile" src="assets/uploads/profile/<?php echo $_SESSION['customer']['photo']; ?>">
                                                        </div>

                                                        <div class="col-sm-12" style="padding:20px;text-align-last: center;">
                                                            <input type="file" name="photo">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input type="submit" class="btn btn-primary" value="Update Photo" name="form2">
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</form>
          				</div>

          				<div class="tab-pane" id="tab_3"><br>
							<form class="form-horizontal" action="" method="post">
                                <div class="box box-info">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="" style="float: left;">Password :</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label for="" style="float: left;">Retype Password :</label>
                                            <input type="password" class="form-control" name="re_password">
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Update Password" name="form3">

                                    </div>
                                </div>
							</form>
          				</div>
                        
          			</div>
				</div>			

		</div>
	</div>      
            </section>             
            </div>
        </div>
    </div>
</div>

           

           


</div></div></div></div>


<script src="assets/js/jquery-2.2.4.min.js"></script>
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
<script src="assets/js/custom.js"></script>
<?php require_once('footermain.php'); ?>