					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'EventTeam'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
<?php
if (isset($_GET['doDel']) && is_numeric($_GET['doDel'])) {
mysql_query("DELETE FROM users_submissions WHERE id = '" . intval($_GET['doDel']) . "' LIMIT 1");
if (mysql_affected_rows() >= 1) {
echo 'Deleted.';
}
header("Location: index.php?url=submissions&deleteOK");
exit;
}
if (isset($_GET['doBump']) && is_numeric($_GET['doBump'])) {
mysql_query("UPDATE users_submissions SET timestamp = '" . time() . "' WHERE id = '" . intval($_GET['doBump']) . "' LIMIT 1");
if (mysql_affected_rows() >= 1) {
echo 'Date bumped.';
}
header("Location: index.php?url=submissions&bumpOK");
exit;
}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Submissions</title>
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
<style>
.chat .panel-body {
    overflow-y: scroll;
    height: 265px;
}
</style>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Submissions</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Submissions</h1>
			</div>
		</div><!--/.row-->
		
			<div class="col-md-12">
				<div class="panel panel-primary chat">
					<div class="panel-heading">
						Manage ROTW Submissions
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
<thead>
<tr>
	<th>Username</th>
	<th>Room ID & Name</th>
	<th>Event</th>
	<th>Timestamp</th>
	<th>Manage ROTW Submissions</th>
</tr>
</thead>
<tbody>

<?php
$getApps = mysql_query("SELECT * FROM users_submissions WHERE entry = 'ROTW' ORDER BY id DESC") or die(mysql_error());
while ($apps = mysql_fetch_assoc($getApps)) {
echo '
												<tr>
													<td><span class="badge">' . $apps['user'] . '</span></td>
													<td><span class="badge">' . $apps['room'] . '</span></td>
													<td><span class="badge">' . $apps['entry'] . '</span></td>
													<td><span class="badge">' . date("F j, Y - g:i a", $apps['timestamp']) . '</span></td> 
													<td>
													<input type="button" class="btn btn-warning btn-xs" value="View Submissions" onclick="document.location = \'index.php?url=viewrotw&id=' . $apps['id'] . '\';">
													<input type="button" class="btn btn-success btn-xs" value="Update/bump date" onclick="document.location = \'index.php?url=submissions&doBump=' . $apps['id'] . '\';">

											';
if($_SESSION['user']['rank'] >= 12 ){
												
echo '<input type="button" class="btn btn-danger btn-xs" value="Delete" onclick="document.location = \'index.php?url=submissions&doDel=' . $apps['id'] . '\';">&nbsp;';
												
}
}
?>

</td></tr>
</tbody>
</table>
</div>
</div>

<div class="panel panel-primary chat">
					<div class="panel-heading">
						Manage COTW Submissions
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
<thead>
<tr>
	<th>Username</th>
	<th>Room ID & Name</th>
	<th>Event</th>
	<th>Timestamp</th>
	<th>Manage COTW Submissions</th>

</tr>
</thead>
<tbody>
<?php
$getApps = mysql_query("SELECT * FROM users_submissions WHERE entry = 'COTW' ORDER BY id DESC") or die(mysql_error());
while ($apps = mysql_fetch_assoc($getApps)) {
echo '
												<tr>
													<td><span class="badge">' . $apps['user'] . '</span></td>
													<td><span class="badge">' . $apps['room'] . '</span></td>
													<td><span class="badge">' . $apps['entry'] . '</span></td>
													<td><span class="badge">' . date("F j, Y - g:i a", $apps['timestamp']) . '</span></td> 
													<td>
													<input type="button" class="btn btn-warning btn-xs" value="View Submissions" onclick="document.location = \'index.php?url=viewcotw&id=' . $apps['id'] . '\';">
													<input type="button" class="btn btn-success btn-xs" value="Update/bump date" onclick="document.location = \'index.php?url=submissions&doBump=' . $apps['id'] . '\';">
													
											';
											
											if($_SESSION['user']['rank'] >= 12 ){
												
echo '<input type="button" class="btn btn-danger btn-xs" value="Delete" onclick="document.location = \'index.php?url=submissions&doDel=' . $apps['id'] . '\';">&nbsp;';
												
}
}
?>

</td></tr>

</tbody>
</table>
</div>
</div>

<div class="panel panel-primary chat">
					<div class="panel-heading">
						Manage OOTW Submissions
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
<thead>
<tr>
	<th>Look</th>
	<th>Username</th>
	<th>Event</th>
	<th>Timestamp</th>
	<th>Manage OOTW Submissions</th>
</tr>
</thead>
<tbody>
<?php
$getApps = mysql_query("SELECT * FROM users_submissions WHERE entry = 'OOTW' ORDER BY id DESC") or die(mysql_error());
while ($apps = mysql_fetch_assoc($getApps)) {
echo '
												<tr>
													<td><span class="badge" style="width: 50px;height: 50px;"><img style="margin-left: -14px;margin-top: -5px;" src="{imager}' . $apps['look'] . '&amp;size=m&amp;direction=4&amp;head_direction=2&amp;gesture=sml&amp;headonly=1"></span></td>
													<td><span class="badge">' . $apps['user'] . '</span></td>
													<td><span class="badge">' . $apps['entry'] . '</span></td>
													<td><span class="badge">' . date("F j, Y - g:i a", $apps['timestamp']) . '</span></td> 
													<td>
													<input type="button" class="btn btn-warning btn-xs" value="View Submissions" onclick="document.location = \'index.php?url=viewootw&id=' . $apps['id'] . '\';">
													<input type="button" class="btn btn-success btn-xs" value="Update/bump date" onclick="document.location = \'index.php?url=submissions&doBump=' . $apps['id'] . '\';">
													
											';
											if($_SESSION['user']['rank'] >= 12 ){
												
echo '<input type="button" class="btn btn-danger btn-xs" value="Delete" onclick="document.location = \'index.php?url=submissions&doDel=' . $apps['id'] . '\';">&nbsp;';
												
}
}
?>

</td></tr>
</tbody>
</table>
</div>
</div>


</div>
</div>



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