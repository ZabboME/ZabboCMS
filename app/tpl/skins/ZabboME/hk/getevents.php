					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'EventTeam'"));
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
	<title>ZabboASE &bull; Event Members</title>
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
				<li>Dashboard</li> <li>General</li> <li class="active">Event Members</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Our Current Event Members</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
					Event Members
						</div>
					<div class="panel-body">
										 <table class="table table-striped">
<thead>
	<td><b>User ID</b></td>
	<td><b>Username</b></td>
	<td><b>Event Rank</b></td>
	<td><b>Hosted Events</b></td>
</thead>
<?php
$get1 = mysql_query("SELECT id,username,rank,mail FROM users WHERE rank = 13 ORDER BY rank DESC, id ASC");
while ($user1 = mysql_fetch_assoc($get1)) {
$rank1 = $user1['rank'];
if ($user1 == 9) {
$aanwezug1 = "Event Manager";
}
$Events = mysql_query("SELECT * FROM `events_hosted_logs` WHERE `userid` = '" . $user1['id'] . "' ORDER BY userid DESC"); 
$RankName = mysql_query("SELECT * FROM `permissions` WHERE `id` = '13' ORDER BY id DESC"); 

$EventCount = mysql_num_rows($Events);
$RankNameL = mysql_fetch_assoc($RankName);

echo '<tr>';
echo '<td><span class="badge">' . $user1['id'] . '</span></td>';
echo '<td><span class="badge">' . $user1['username'] . '</span></td>';
echo '<td><span class="badge">' . $RankNameL['rank_name'] . '</span></td>';
echo '<td><span class="badge">' . $EventCount . '</span></td>';
echo '</tr>';
}
?>
<?php
$get1 = mysql_query("SELECT id,username,rank,mail FROM users WHERE rank = 12 ORDER BY rank DESC, id ASC");
while ($user1 = mysql_fetch_assoc($get1)) {
$rank1 = $user1['rank'];
if ($user1 == 8) {
$aanwezug1 = "Event Team";
}
$Events = mysql_query("SELECT * FROM `events_hosted_logs` WHERE `userid` = '" . $user1['id'] . "' ORDER BY userid DESC"); 
$RankName = mysql_query("SELECT * FROM `permissions` WHERE `id` = '12' ORDER BY id DESC"); 

$EventCount = mysql_num_rows($Events);
$RankNameL = mysql_fetch_assoc($RankName);

echo '<tr>';
echo '<td><span class="badge">' . $user1['id'] . '</span></td>';
echo '<td><span class="badge">' . $user1['username'] . '</span></td>';
echo '<td><span class="badge">' . $RankNameL['rank_name'] . '</span></td>';
echo '<td><span class="badge">' . $EventCount . '</span></td>';
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