<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
<title>
POS
</title>

<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/ionicons.min.css">
	<link rel="stylesheet" href="../css/datepicker3.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/select2.min.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="../css/AdminLTE.min.css">
	<link rel="stylesheet" href="../css/_all-skins.min.css">

	<link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./main/img/favicon.png">


    <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body class="hold-transition login-page sidebar-mini">
<div class="login-box">
	<div class="login-logo">
	<legend  class=" text-center"><img src="../img/logo.png" alt="Standley's logo" width="320" height="70"><br></legend>
	</div>
    <div class="login-box">
		<div class="login-box-body">

		<h4><p class="login-box-msg"><b>CASHIER PANEL</b></p></h4>
			
			<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				foreach($_SESSION['ERRMSG_ARR'] as $msg) {
					echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
				}
				unset($_SESSION['ERRMSG_ARR']);
			}
			?>

		<form action="login.php" method="post">

		<div class="form-group has-feedback">
				<input class="form-control"  autocomplete="off" autofocus Placeholder="Cashier Name" type="text" name="username" Placeholder="Cashier Name" required/>
		</div>
		<div class="form-group has-feedback">
				<input class="form-control"  autocomplete="off"  type="password"  name="password" Placeholder="Password" required/>
		
		
		</div>

		<div class="row">
				<div class="col-xs-8"></div>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-large btn-primary btn-block pull-right" name="form1" value="Log In"><br><br>
				</div>
				<div class="col-xs-8"></div>
				<div class="col-xs-4" >
					<a href="../login.php">
				<input type="button" class="btn btn-large btn-primary btn-block pull-right" value="Log in as Admin"></a><br><br>
				</div>
				
	</div>
				</form>
</div>
</div>
</div>
</div>


</body>
</html>