<html>
<head>
<title>Checkout</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestname.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>
<?php
session_start();
$_SESSION['SESS_MEMBER_ID'];

?>

<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	border: 1px solid #999;
	background: #EEEEEE;
	padding: 5px 10px;
	box-shadow:0 1px 2px #ddd;
    -moz-box-shadow:0 1px 2px #ddd;
    -webkit-box-shadow:0 1px 2px #ddd;
}
.suggestionsBox {
	position: absolute;
	left: 10px;
	margin: 0;
	width: 268px;
	top: 40px;
	padding:0px;
	background-color: #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
.combopopup{
	padding:3px;
	width:268px;
	border:1px #CCC solid;
}

</style>	
</head>
<body onLoad="document.getElementById('country').focus();">
<form action="savesales.php" method="post">
<div id="ac">
<center><h4><img src="img/logo.png" alt="Standley's logo" width="320" height="70"> </h4></center><hr>
<p style="color: red;">OR NO: <b><?php echo $_GET['invoice']; ?></p>
<input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="amount_pos" value="<?php echo $_GET['total']; ?>" />
<input type="hidden" name="ptype" value="<?php echo $_GET['pt']; ?>" />
<input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>" />
<input type="hidden" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
<input type="hidden" name="profit" value="<?php echo $_GET['totalprof']; ?>" />
<input type="hidden" name="cash" value="<?php echo $_GET['cash']; ?>" />
<input type="hidden" name="discount_status" value="<?php echo $_GET['discount_status']; ?>" />
<input type="hidden" name="due_date" value="<?php echo $_GET['due_date']; ?>" />
<input type="hidden" name="delivery_status" value="<?php echo $_GET['delivery_status']; ?>" />
<input type="hidden" name="shipping_id" value="<?php echo $_GET['shipping_id']; ?>" />

<h4>Customer Name*</h4>
<input type="text" size="25" value="<?php echo 'CUSTOMER' ?>" name="name" id="country"onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" placeholder="Enter Customer Name" style="width: 355px; height:30px;" required />
     
      <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
<?php
$total=$_GET['total'];
$asas=$_GET['pt'];

if($asas=='cash') {
?>

<h4>Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Delivery <small>Optional</small></h4>
<input type="text" name="cust_address" placeholder="Enter Address" style="width: 180px; height:25px;  margin-bottom: 15px;"/>
<select name="shipping_id"  placeholder ="shipping" style="width: 180px; height:35px;">
<option>Select Location</option>
	<?php
	$id=$_GET['invoice'];
	include('../connect.php');
	$result = $db->prepare("SELECT 
							t1.shipping_cost_id,
							t1.city_id,
							t1.amount,

							t2.city_id,
							t2.city_name,

							t3.shipping_id

							FROM tbl_shipping_cost t1
							LEFT JOIN tbl_city t2
							ON t2.city_id = t1.city_id
							LEFT JOIN tbl_sales_pos t3
							ON t3.shipping_id = t1.shipping_cost_id			
							WHERE shipping_cost_id
							GROUP BY city_name");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){ 
	?>
		
		<option value="<?php echo $row['shipping_cost_id'];?>"> - <?php echo $row['city_name'];?> - <?php echo $row['amount'];?></option>
		<?php echo 'Optional';?>
	<?php
				} 
			?>
			</select>

<h4>Contact Number &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Payment*</h4>
<input type="number" name="cust_contact" placeholder="Enter Contact Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    title="Numbers only" style="width: 175px; height:30px;  margin-bottom: 15px;"/>
<input type="number" name="cash" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    title="Numbers only" placeholder="Enter Payment" style="width: 170px; height:30px;  margin-bottom: 15px;"  required/>	

<!--<h4>Discount <small>Optional</small></h4>-->
<!--<select name="discount_status" placeholder ="discount" style="width: 375px; height:30px;  margin-bottom: 15px;">-->
<!--<option>Select Discount</option>-->
<?php
// 	$id=$_GET['invoice'];
// 	include('../connect.php');
// 	$result = $db->prepare("SELECT * FROM tbl_discount WHERE discount_id");
// 		$result->execute();
// 		for($i=0; $row = $result->fetch(); $i++){
// 	?>
		
	<?php // echo $row['discount_id'];?> <?php //echo $row['discount_name'];?>
<?php
// 				} 
// 			?>

			
			</select>
<?php
}
?>
<div class="modal-footer">
<div><center>
<button class="btn btn-success btn-block btn-large" style="width:100px;"><i class="icon icon-arrow-right icon-large"></i> Submit</button>
</center></div>
</form>
</body>
</html>
            </div>

































