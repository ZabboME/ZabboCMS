					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'TMOD'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
<?php
function formatType($t) {
switch (intval($t)) {
case 101:
return 'Sex';
case 102:
return 'Pers.info';
case 103:
return 'Scam';
case 104:
return 'Abusive';
case 105:
return 'Blocking';
case 106:
return 'Other';
default:
return $t;
}
}
function formatSent($stamp) {
$stamp = time() - $stamp;
$x     = '';
if ($stamp >= 604800) {
$x = ceil($stamp / 604800) . 'wks';
} else if ($stamp > 86400) {
$x = ceil($stamp / 86400) . 'day';
} else if ($stamp >= 3600) {
$x = ceil($stamp / 3600) . 'hr';
} else if ($stamp >= 120) {
$x = ceil($stamp / 60) . 'min';
} else {
$x = $stamp . ' s';
}
$x .= ' ago';
return $x;
}
?>			
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; CFH</title>
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
				<li>Dashboard</li> <li>Moderation</li> <li class="active">CFH</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">CFH</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						CFH
						</div>
					<div class="panel-body">
									 <table class="table table-striped">
<thead>
	<td>ID</td>
	<td>Type</td>
	<td>Status</td>
	<td>Sender</td>
	<td>Reported user</td>
	<td>Moderator</td>
	<td>Message</td>
	<td>Room</td>
	<td>Sent</td>
	<td>Chatlog</td>
</thead>
<?php
$get = mysql_query("SELECT * FROM moderation_tickets ORDER BY id DESC LIMIT 35");
while ($user = mysql_fetch_assoc($get)) {
echo '<tr>';
echo '<td>' . $user['id'] . '</td>';
echo '<td>' . $user['type'] . '</td>';
echo '<td>' . $user['status'] . '</td>';
echo '<td>' . $user['sender_id'] . '</td>';
echo '<td>';
if ($user['reported_id'] >= 1) {
echo $user['reported_id'];
} else {
echo '-';
}
echo '</td>';
echo '<td>';
if ($user['moderator_id'] >= 1) {
echo $user['moderator_id'];
} else {
echo '-';
}
echo '</td>';
echo '<td>' . $user['message'] . '</td>';
echo '<td>' . $user['room_name'] . '</td>';
echo '<td>' . date("F j, Y - g:i a", $result['user']) . '</td>';
echo '<td><a href="index.php?_cmd=chatlogs&timeSearch=' . $user['timestamp'] . '">View</a></td>';
echo '</tr>';
}
?>
</table>
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