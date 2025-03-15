					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'MOD'"));
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
	<title>ZabboASE &bull; Clone Search</title>
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
				<li>Dashboard</li> <li>Moderation</li> <li class="active">Clone Search</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Clone Search</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Clone Search
						</div>
					<div class="panel-body">
<?php
$ip = '';
if (isset($_POST['ip'])) {
$ip = filter($_POST['ip']);
}
echo '<h1>IP Lookup / Clone Checker</h1>
<br /><p>This tool can be used for looking up a user\'s IP, particulary useful when you need to ban a person or computer rather than just accounts.</p>';
echo '<br />
<form method="post">
Username:<br />
<input type="text" name="user" class="form-control" style="width:300px"><br/><br/>
<input type="submit" class="btn btn-info input-sm" value="Search">
</form>';
echo '<br />
<form method="post">
IP Address:<br />
<input type="text" name="ip" class="form-control" style="width:300px"><br/><br/>
<input type="submit" class="btn btn-info input-sm" value="Search">
</form>';
echo '<br />
<form method="post">
Machine ID:<br />
<input type="text" name="machine" class="form-control" style="width:300px"><br/><br/>
<input type="submit" class="btn btn-info input-sm" value="Search">
</form>';
if (isset($_POST['user'])) {
$user = filter($_POST['user']);
$get  = mysql_query("SELECT ip_current FROM users WHERE username = '" . $user . "' LIMIT 1");
if (mysql_num_rows($get) > 0) {
$ip = mysql_result($get, 0);
}
echo '<h2>' . $user . '\'s IP is<br /><b style="font-size: 100%;">' . $ip . '</b></h2> <hr/>';
}
if (isset($ip) && strlen($ip) > 0) {
echo '<h2 style="font-size: 140%;">Users on this IP: ' . $ip . '</h2>';
$get = mysql_query("SELECT * FROM users WHERE ip_current = '" . $ip . "' ORDER BY online desc LIMIT 50");
while ($user = mysql_fetch_assoc($get)) {
	echo'<div class="cd-timeline-img2 cd-picture" style="background: url({imager}' . $user['look'] . '&amp;direction=2&amp;head_direction=2&amp;action=wlk&amp;gesture=sml)no-repeat #5da8c5;background-position: center center;"></div>';
echo ' <div class="profile-sidebar2"><p><b>' . ($user['username']) . '</B> <small<span class="badge">(ID: ' . $user['id'] . ')</span></small><p>Last online: ' . date("F j, Y, g:i a", $user['last_online']) . '<br /><p></p>
			Registered IP: <span class="label label-primary">' . $user['ip_register'] . '</span><br /><p></p>
			Machine ID: <span class="label label-warning"> ' . $user['machine_id'] . '</span><br /><p></p>
			E-mail: ' . $user['mail'] . '<br /><p></p>
			This user is <b>' . (($user['online'] == "1") ? '<span class=\'label label-success\'>online</span>' : '<span class=\'label label-danger\'>offline</span>') . '</b></span><hr/></p></div>';
}
}
?>
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