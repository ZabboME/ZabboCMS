					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'management'"));
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
	<title>ZabboASE &bull; Strike Tool</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Strike Tool</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Strike Tool</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Strike Tool
						</div>
					<div class="panel-body">
									<?php
if (isset($_POST['strikes'])) {
$strikes      = $_POST['strikes'];
$strikereason = $_POST['strikereason'];
$key          = filter($_POST['name']);
$check = mysql_query("SELECT id,rank,strikes,strikereason FROM users WHERE username = '" . $key . "' OR id = '" . $key . "' LIMIT 1") or die(mysql_error());
$exists = mysql_num_rows($check);
$drow   = mysql_fetch_assoc($check);
if ($exists > 0) {
if ($drow['rank'] >= 9) {
echo ('<div class = "alert">You may not Strike an Owner!</div>');
exit;
} else {
mysql_query("UPDATE users SET strikes = '" . $strikes . "' WHERE username = '" . $key . "' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE users SET strikereason = '" . $strikereason . "' WHERE username = '" . $key . "' LIMIT 1") or die(mysql_error());
echo ('<div class="alert alert-success" align="center">Strike has been added.<meta http-equiv="refresh" content="0;url=striketool"/></div>');
exit;
}
} else {
echo ('<div class = "alert">This user does not exist</div>');
exit;
}
}
?>
								<form action='index.php?url=striketool&do=something' method='post' name='theAdminForm' id='theAdminForm'>
Username: <input type="text" class="form-control form-xs" placeholder="Username" name="name" /><br>
Strike Number: <input type="text" class="form-control form-xs" placeholder="1-3" name="strikes" /><br>
Strike Reason: <input type="text" class="form-control form-xs" placeholder="Reason" name="strikereason" /><br>
<input type='submit' value='Strike!' class="btn btn-success btn-xs" accesskey="s">
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