<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `rank` = '9'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Vouchers</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
		    <?php
// Include Header
include "includes/header.php";
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li>Dashboard</li> <li>Management</li> <li class="active">Vouchers</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Vouchers</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Vouchers
						</div>
					<div class="panel-body">
								  <?php
if (isset($_POST['v-code'])) {
$vCode   = filter($_POST['v-code']);
$vValueC = filter($_POST['v-valuec']);
$vValueP = filter($_POST['v-valuep']);
$vValueS = filter($_POST['v-values']);
$vValueK = filter($_POST['v-valuek']);
$vValueB = filter($_POST['v-valueb']);
if (strlen($vCode) <= 0) {
echo '<div class="alert alert-danger"><strong>Error!</strong> A voucher code could not be submitted. Please enter a valid voucher code!</div>';
} else {
mysql_query("INSERT INTO catalog_vouchers (voucher,type,value,current_uses,max_uses,enabled) VALUES ('" . $vCode . "','" . $vValueC . "','" . intval($vValueP) . "','" . intval($vValueS) . "','" . intval($vValueK) . "','1')");
echo '<div class="alert alert-success"><strong>Success!</strong> The voucher recently submitted is now live and ready for use!</div>';
}
}
?>			
<h1>Vouchers</h1>
<br />
<p>
Vouchers can be exchanged for credits, pixels or shells on the website and in the in-game catalogue.
</p>
<br />
<p style="font-size: 125%; color: darkred;">
	<b>NOTE:</b> This feature is coming soon. Please do not ask about why it's not working, it's being coded!</u>
	
	<!-- Staff are *NOT* to abuse this system. Vouchers may be used as a method of refunds,
	rewards, or prizes, but not to be handed out without VALID reason. Amounts must be kept reasonable.
	<u>Abuse of this system WILL be punished.-->
</p>
<br />
<div style="float: left; width: 49%;">
	<h2>Redeemable vouchers</h2>
	<br />
 <table class="table table-striped">
	<thead>
		<td>Voucher Code</td>
		<td>Type</td>
		<td>Value</td>
		<td>Current Usage</td>
		<td>Max Uses</td>
		<td>Enabled</td>
	</thead>
	<?php
$get = mysql_query("SELECT voucher,type,value,current_uses,max_uses,enabled FROM catalog_vouchers ");
while ($user = mysql_fetch_assoc($get)) {
echo '<tr>';
echo '<td>' . $user['voucher'] . '</td>';
echo '<td>' . $user['type'] . '</td>';
echo '<td>' . $user['value'] . '</td>';
echo '<td>' . $user['current_uses'] . '</td>';
echo '<td>' . $user['max_uses'] . '</td>';
echo '<td>' . $user['enabled'] . '</td>';
echo '</tr>';
}
?>
	</table>
</div>
<div style="float: right; width: 49%;">
	<h2>Add new voucher</h2>
	<br />
	<form method="post">
		<br />
	        Voucher:<br />
		<input type="text" name="v-code"><br />
	        Type:<br />
	         <select name="v-valuec">
	         <option>credits</option>
   			 <option>duckets</option>
    		</select> <br/>
	       Value:<br />
		<input type="text" name="v-valuep"><br />
	        Max Uses:<br />
		<input type="text" name="v-valuek"><br />
					Current Uses:<br />
		<input type="text" placeholder="0"  value="0" name="v-values" disabled><br />
			Enabled:<br />
		<input type="text" placeholder="1" value="1" disabled><br />
		<br />
		<input type="submit" class="btn btn-success btn-xs" value="Submit">
	</form>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>