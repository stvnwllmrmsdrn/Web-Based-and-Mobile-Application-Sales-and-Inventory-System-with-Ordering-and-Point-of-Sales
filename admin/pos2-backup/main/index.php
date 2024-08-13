<!DOCTYPE html>
<html>
<head>
<title>
POS
</title>
<link rel="shortcut icon" href="img/favicon.png">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">


	<link rel="stylesheet" href="./css/bootstrap.min.css">
	
	<link rel="stylesheet" href="css/AdminLTE.min.css">

    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
	require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	
</head>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>

<a href="sales.php?id=cash&invoice="></a>
<?php
}
if($position=='admin') {
?>
<!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<li class="active">Dashboard</li>
			</ul>
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center><img src="img/logo.png" alt="Standley's logo" width="320" height="70"><br></center></font>
<div id="mainmain">


<?php
}
?>
</div>
<section class="content">
<div class="row">

            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-primary" >
                <div class="inner" >
				<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">
				<h3>POS</h3>

                  <p>Point of Sales</p>
                </div>
                <div class="icon">
				<i class="icon-shopping-cart icon"></i>
                </div>
				</a>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
				<a href="products.php">
				<h3>Inventory</h3>

                  <p>View Inventory</p>
                </div>
                <div class="icon">
				<i class="icon-list-alt icon"></i>
                </div>
				</a>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
				<a href="sales_inventory.php">
				<h3>Reports</h3>

                  <p>POS Sales Reports</p>
                </div>
                <div class="icon" color="white">
				<i class="icon-bar-chart icon" ></i>
                </div>
				

				</div>

				</section>
<div class="clearfix"></div>

</div>
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
