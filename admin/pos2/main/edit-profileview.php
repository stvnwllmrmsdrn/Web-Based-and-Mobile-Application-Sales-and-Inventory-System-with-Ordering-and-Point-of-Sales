<html>
<head>
<title>
Standly Hardware - Update Profile
</title>
<?php
	require_once('auth.php');
?>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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
</head>
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
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
	<div class="span10">
	<div class="contentheader">
			<i class="icon-user"></i> Update Profile
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Update Profile</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: center;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: center;">
	<thead>
		<tr>
			<th style="text-align: center;"><h2><i class="icon icon-edit icon-large"></i> Update Profile </th>
		</tr>
	</thead>
	<tbody>
			<?php
				include('../connect.php');
                $userpos = $_SESSION['SESS_MEMBER_ID'];
				$result = $db->prepare("SELECT * FROM tbl_user_pos WHERE id = $userpos");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				$pass = $row['password'];
				$hidden_password = preg_replace("|.|","*",$pass);
			?>
			<tr class="record">
			<td style="text-align: center;"><h2>Username: <?php echo $row['username']; ?><br>
			Password: <?php echo $hidden_password ?><br>
			Name: <?php echo $row['name']; ?><br>
			Position: <?php echo $row['position'];?><br>
			<a rel="facebox" href="edit-profile.php?id=<?php echo $row['id']; ?>"><br><center><button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-edit icon-large"></i> Update</button>
</a>
			</tr>
			<?php
				}
			?>	
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

</body>
<?php include('footer.php');?>

</html>