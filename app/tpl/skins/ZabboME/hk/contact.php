					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'amb'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
<?php
if (isset($_GET['doDel']) && is_numeric($_GET['doDel'])) {
mysql_query("DELETE FROM cms_user_reports WHERE id = '" . intval($_GET['doDel']) . "' LIMIT 1");
if (mysql_affected_rows() >= 1) {
echo 'Article deleted.';
}
header("Location: index.php?url=contact&deleteOK");
exit;
}
if (isset($_GET['doBump']) && is_numeric($_GET['doBump'])) {
mysql_query("UPDATE cms_user_reports SET submitted_on = '" . time() . "' WHERE id = '" . intval($_GET['doBump']) . "' LIMIT 1");
if (mysql_affected_rows() >= 1) {
echo 'Article date bumped.';
}
header("Location: index.php?url=contact&bumpOK");
exit;
}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Contact Tickets</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active"> Support Tickets</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Support Tickets</h1>
			</div>
		</div><!--/.row-->
		
			<div class="col-md-12">
				<div class="panel panel-primary chat">
					<div class="panel-heading">
						Manage Support Tickets
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
<thead>
<tr>
	<th>ID</th>
	<th>User ID</th>
	<th>Username</th>
	<th>Timestamp</th>
	<th>Manage Support Ticket</th>
</tr>
</thead>
<tbody>
<?php
$getApps = mysql_query("SELECT * FROM cms_user_reports WHERE status = '0' ORDER BY id DESC") or die(mysql_error());
while ($apps = mysql_fetch_assoc($getApps)) {
echo '
												<tr>
													<td><span class="badge">' . $apps['id'] . '</span></td>
													<td><span class="badge">' . $apps['user_id'] . '</span></td>
													<td><span class="badge">' . $apps['reporter_username'] . '</span></td>
													<td><span class="badge">' . date("F j, Y - g:i a", $apps['submitted_on']) . '</span></td> 
													<td>
													<input type="button" class="btn btn-warning btn-xs" value="Handle Support Ticket" onclick="document.location = \'index.php?url=viewtickets&id=' . $apps['id'] . '\';">
													</td></tr>
											';
}
?>
</tbody>
</table>
</div>
</div>

<div class="panel panel-primary chat">
<div class="panel-heading">
	Handling Support Tickets
	<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
<div class="panel-body">
 <table class="table table-striped">
<thead>
<tr>
	<th>ID</th>
	<th>User ID</th>
	<th>Username</th>
	<th>Staff Handling</th>
	<th>Timestamp</th>
	<th>Manage Support Ticket</th>
</tr>
</thead>
<tbody>
<?php
$getApps = mysql_query("SELECT * FROM cms_user_reports WHERE status = '1' ORDER BY id DESC") or die(mysql_error());
while ($apps = mysql_fetch_assoc($getApps)) {
echo '
												<tr>
													<td><span class="badge">' . $apps['id'] . '</span></td>
													<td><span class="badge">' . $apps['user_id'] . '</span></td>
													<td><span class="badge">' . $apps['reporter_username'] . '</span></td>
													<td><span class="badge">' . $apps['handled_by'] . '</span></td>
													<td><span class="badge">' . date("F j, Y - g:i a", $apps['submitted_on']) . '</span></td> 
													<td>
													<input type="button" class="btn btn-warning btn-xs" value="Finish Support Ticket" onclick="document.location = \'index.php?url=closeticket&id=' . $apps['id'] . '\';">
													<input type="button" class="btn btn-warning btn-xs" value="View Support Ticket" onclick="document.location = \'index.php?url=viewtickets&id=' . $apps['id'] . '\';">
													<input type="button" class="btn btn-success btn-xs" value="Update/bump date" onclick="document.location = \'index.php?url=contact&doBump=' . $apps['id'] . '\';">
													</td></tr>
											';
}
?>
</body>
</table>
</div>
</div>

<div class="panel panel-primary chat">
<div class="panel-heading">
	Closed Support Tickets
	<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
<div class="panel-body">
 <table class="table table-striped">
<thead>
<tr>
	<th>ID</th>
	<th>User ID</th>
	<th>Username</th>
	<th>Closed By</th>
	<th>Timestamp</th>
	<th>Manage Support Ticket</th>
</tr>
</thead>
<tbody>
<?php
$getApps = mysql_query("SELECT * FROM cms_user_reports WHERE status = '2' ORDER BY id DESC") or die(mysql_error());
while ($apps = mysql_fetch_assoc($getApps)) {
echo '
												<tr>
													<td><span class="badge">' . $apps['id'] . '</span></td>
													<td><span class="badge">' . $apps['user_id'] . '</span></td>
													<td><span class="badge">' . $apps['reporter_username'] . '</span></td>
													<td><span class="badge">' . $apps['handled_by'] . '</span></td>
													<td><span class="badge">' . date("F j, Y - g:i a", $apps['submitted_on']) . '</span></td> 
													<td>
													<input type="button" class="btn btn-danger btn-xs" value="Delete" onclick="document.location = \'index.php?url=contact&doDel=' . $apps['id'] . '\';">&nbsp;
													<input type="button" class="btn btn-warning btn-xs" value="View Support Ticket" onclick="document.location = \'index.php?url=viewtickets&id=' . $apps['id'] . '\';">
													<input type="button" class="btn btn-success btn-xs" value="Update/bump date" onclick="document.location = \'index.php?url=contact&doBump=' . $apps['id'] . '\';">
													</td></tr>
											';
}
?>
</body>
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