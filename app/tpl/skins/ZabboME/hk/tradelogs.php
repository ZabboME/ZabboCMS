					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'TMOD'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
<?php
class RoomManager {
public static function CreateRoom($name, $owner, $model) {
mysql_query("INSERT INTO rooms (roomtype,caption,owner,state,model_name) VALUES ('private','" . filter($name) . "','" . $owner . "','open','" . $model . "')");
return intval(mysql_result(mysql_query("SELECT id FROM rooms WHERE owner = '" . $owner . "' ORDER BY id DESC LIMIT 1"), 0));
}
public static function PaintRoom($roomId, $wallpaper, $floor) {
mysql_query("UPDATE rooms SET wallpaper = '" . $wallpaper . "', floor = '" . $floor . "' WHERE id = '" . $roomId . "' LIMIT 1");
return (mysql_affected_rows() > 0) ? true : false;
}
public static function GetRoomVar($roomId, $var) {
return mysql_result(mysql_query("SELECT " . $var . " FROM rooms WHERE id = '" . $roomId . "' LIMIT 1"), 0);
}
}
class UsernameManager {
public static function GetUsername($user, $var) {
return mysql_result(mysql_query("SELECT " . $var . " FROM users WHERE id = '" . $user . "' LIMIT 1"), 0);
}
}
class CataManager {
public static function GetCatalog($item, $var) {
return mysql_result(mysql_query("SELECT " . $var . " FROM furniture WHERE id = '" . $item . "' "), 0);
}
}
?>
<?php
$searchResults = null;
if (isset($_GET['timeSearch'])) {
$_POST['searchQuery'] = $_GET['timeSearch'];
$_POST['searchType']  = '4';
}
if (isset($_POST['searchQuery'])) {
$query = filter($_POST['searchQuery']);
$type  = $_POST['searchType'];
$q     = "SELECT * FROM logs_client_trade WHERE ";
switch ($type) {
default:
case '1':
$q .= "1id = '" . $query . "'";
break;
case '2':
$q .= "1items LIKE '%" . $query . "%'";
break;
case '3':
$q .= "machine_id = '" . $query . "'";
break;
case '4':
$cutMin = intval($query) - 300;
$cutMax = intval($query) + 300;
$q .= "timestamp >= " . $cutMin . " AND timestamp <= " . $cutMax;
}
$searchResults = mysql_query($q);
}
?>			
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Trade Logs</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Trade Logs</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trade Logs</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Trade Logs
						</div>
					<div class="panel-body">
										<?php
if (isset($searchResults)) {
echo '<h2>Search results - You searched for "<span style="font-size: 125%;">' . date("F j, Y - g:i a", $_POST['searchQuery']) . '</span>"</h2>';
echo '<br /><p><a href="index.php?url=stafflogs&doReset">Clear search</a></p><br />
 <table class="table table-striped">
	<thead>
	<tr>
		<td>Username/User ID</td>
		<td>Trade</td>
		<td>Machine ID</td>
		<td>Timestamp</td>
	</tr>
	<tbody>';
while ($result = mysql_fetch_assoc($searchResults)) {
if (strlen($result['hour']) < 2) {
$result['hour'] = '0' . $result['hour'];
}
if (strlen($result['minute']) < 2) {
$result['minute'] = '0' . $result['minute'];
}
echo '<tr>
		<td><a href="#">' . (UsernameManager::GetUsername($result['user_id'], 'username')) . '<p></p></a> <span class="badge">(' . $result['user_id'] . ')</span></td>
		<td>' . $result['data_string'] . '</td>
		<td>' . $result['machine_id'] . '</td>
		<td>' . date("F j, Y - g:i a", $result['timestamp']) . '</td>
		<td>' . $result['timestamp'] . ' (<a href="index.php?url=stafflogs&timeSearch=' . $result['timestamp'] . '">Search</a>)</td>
		</tr>';
}
echo '</tbody>
	</thead>
	</table>';
} else {
echo '<h2>Search Trade Logs</h2>
	<br />
	<form method="post">
	Search type:&nbsp;
	<select class="form-control form-xs" name="searchType">
	<option value="1">By username (by ID only!)</option>
	<option value="2">By item</option>
	<option value="3">By Machine ID</option>
	<option value="4">By timestamp (600 second range)</option>
	</select>
	<br /><br />
	Search query:&nbsp;
	<input type="text" class="form-control form-xs" placeholder="Insert text to search" name="searchQuery">
	<br /><br />
	<input type="submit" class="btn btn-info btn-xs" value="Search">
	</form>
	<h2>Recent activity</h2>
	<table class="table table-striped" width="100%">
	<thead>
	<tr>
		<td>Initiating Trader</td>
		<td>Secondary Trader</td>
		<td>First Trader</td>
		<td>Second Trader</td>
		<td>Time</td>
		<td>Timestamp</td>
	</tr>
	<tbody>';
$getRecent = mysql_query("SELECT * FROM logs_client_trade ORDER BY id DESC LIMIT 30");
while ($recent = mysql_fetch_assoc($getRecent)) {
if (strlen($recent['hour']) < 2) {
$recent['hour'] = '0' . $recent['hour'];
}
if (strlen($recent['minute']) < 2) {
$recent['minute'] = '0' . $recent['minute'];
}
echo '<tr>
		<td><a href="#">' . (UsernameManager::GetUsername($recent['1id'], 'username')) . '<p></p></a> <span class="badge">(' . $recent['1id'] . ')</span></td>
		<td><a href="#">' . (UsernameManager::GetUsername($recent['2id'], 'username')) . '<p></p></a> <span class="badge">(' . $recent['2id'] . ')</span></td>
		<td><a href="#">' . (CataManager::GetCatalog($recent['1items'], 'item_name', 'item_name', 'item_name', 'item_name')) . '<p></p></a>(' . $recent['1items'] . ')</span></td>
		<td><small>' . $recent['2items'] . '</small></td>
		<td>' . $recent['timestamp'] . ' (<a href="index.php?url=tradelogs&timeSearch=' . $recent['timestamp'] . '">Search</a>)</td>
		</tr>';
}
echo '</tbody>
	</thead>
	</table>';
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