					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'moderation'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
<?php
class uberCore {
public static function AddBan($type, $value, $reason, $expireTime, $addedBy, $blockAppeal) {
mysql_query("INSERT INTO bans (id,bantype,value,reason,expire,added_by,added_date,appeal_state) VALUES (NULL,'" . $type . "','" . $value . "','" . $reason . "','" . $expireTime . "','" . $_SESSION['user']['username'] . "','" . time() . "','" . (($blockAppeal) ? '0' : '1') . "')");
}
}
if (isset($_GET['unban']) && is_numeric($_GET['unban'])) {
$boss = mysql_query("SELECT * FROM bans WHERE id = '" . $_GET['unban'] . "'");
mysql_query("DELETE FROM bans WHERE id = '" . $_GET['unban'] . "' LIMIT 1");
echo '<span class="alert alert-success"><strong>Success!</strong></span>';
if (mysql_affected_rows() >= 1) {
echo '<span class="alert alert-success"><strong>Success!</strong> Unban has been logged.</span>';
header("Location: /manage/adminbans");
exit;
}
}
if (isset($_POST['bantype'])) {
$bantype  = filter($_POST['bantype']);
$value    = filter($_POST['value']);
$reason   = filter($_POST['reason']);
$length   = filter($_POST['length']);
$noAppeal = '';
if (isset($_POST['no-appeal'])) {
$noAppeal = filter($_POST['no-appeal']);
}
if ($bantype != "ip" && $bantype != "user") {
$bantype = "user";
}
if (strlen($value) <= 0 || strlen($reason) <= 0 || !is_numeric($length) || intval($length) < 60) {
echo 'Please fill in all fields correctly! (Also take note a ban must be at least 1 minute in length!';
header("Location: /manage/adminbans");
exit;
}
// $type, $value, $reason, $expireTime, $addedBy
uberCore::AddBan($bantype, $value, $reason, time() + $length, $addedBy, (($noAppeal == "checked") ? true : false));
}
?>
<?php
    if(isset($_POST['no-appeal']) || isset($_POST['bantype']) || isset($_GET['unban']))
    {
        function doCommand($header, $data = '')
{
    $musData = $header . chr(1) . $data;
    $sock = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));

    socket_connect($sock, '127.0.0.1', '30001');
 
    socket_send($sock, $musData, strlen($musData), MSG_DONTROUTE);
    socket_close($sock);
}
         doCommand("reload_bans");
    }
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Bans</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Manage Staff Bans</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Manage Staff Bans (<?php
echo number_format(mysql_num_rows(mysql_query("SELECT * FROM bans WHERE bantype = 'user'")));
?> Total Bans)</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Manage Staff Bans
						</div>
					<div class="panel-body">
<form method="post">
Ban type:<br />
<select name="bantype" class="form-control input-sm" onclick="onchange="if (this.value == 'ip') { document.getElementById('ban-value-heading').innerHTML = 'IP Address'; } else { document.getElementById('ban-value-heading').innerHTML = 'Username'; }" onkeyup="onchange="if (this.value == 'ip') { document.getElementById('ban-value-heading').innerHTML = 'IP Address'; } else { document.getElementById('ban-value-heading').innerHTML = 'Username'; }" onchange="if (this.value == 'ip') { document.getElementById('ban-value-heading').innerHTML = 'IP Address'; } else { document.getElementById('ban-value-heading').innerHTML = 'Username'; }">
<option value="ip">IP Ban</option>
<option value="user">User ban</option>
</select><br />
<br />
<span id="ban-value-heading">IP Address</span>:<Br />
<input type="text"class="form-control input-sm" name="value"><br />
<br />
Reason:<br />
<input type="text" class="form-control input-sm" name="reason"><br />
<br />
<script type="text/javascript">
function banPreset(val)
{
	document.getElementById('banlength').value = val;
}
</script>
Length (in seconds!):<br />
<input type="text" class="form-control input-sm" name="length" id="banlength"> <br />
<small>(Presets: <a href="#" onclick="banPreset(3600);">1hr</a> <a href="#" onclick="banPreset(10800);">3hr</a> <a href="#" onclick="banPreset(43200);">12hr</a> <a href="#" onclick="banPreset(86400);">1day</a> <a href="#" onclick="banPreset(259200);">3day</a> <a href="#" onclick="banPreset(604800);">1wk</a> <a href="#" onclick="banPreset(1209600);">2wk</a> <a href="#" onclick="banPreset(2592000);">1mo</a> <a href="#" onclick="banPreset(7776000);">3mo</a> <a href="#" onclick="banPreset(1314000);">1yr</a> <a href="#" onclick="banPreset(2628000);">2yr</a> <a href="#" onclick="banPreset(360000000);">Perm</a>)</small><br />
<br />
<input type="submit" class="btn btn-success" value="Ban">
</form>
<h2>Bans list</h2>
<br />
 <table class="table table-striped">
<thead>
<tr>
	<td>Ban ID</td>
	<td>Data</td>
	<td>Reason</td>
	<td>Expires</td>
	<td>Added</td>
	<td>Option</td>
</tr>
</thead>
<tbody>
<?php
if (isset($_GET['unban']) && is_numeric($_GET['unban'])) {
$boss = mysql_query("SELECT * FROM bans WHERE id = '" . $_GET['unban'] . "'");
mysql_query("DELETE FROM bans WHERE id = '" . $_GET['unban'] . "' LIMIT 1");
echo '<span class="alert alert-success"><strong>Success!</strong></span>';
if (mysql_affected_rows() >= 1) {
echo '<span class="alert alert-success"><strong>Success!</strong> Unban has been logged.</span>';
MUS("reload_bans");
header("Location: /manage/adminbans");
exit;
}
}
$getBans = mysql_query('SELECT * FROM bans ORDER BY ID DESC');
while ($ban = mysql_fetch_assoc($getBans)) {
echo '<tr>
	<td><span class="badge">' . $ban['id'] . '</span></td>
	<td>' . $ban['bantype'] . ' ban: <b>' . $ban['value'] . '</b></td>
	<td style="text-align: center; font-size: 90%;">' . $ban['reason'] . '</td>
	' . (($ban['expire'] <= time()) ? '<td style="text-align: center; background-color: #F6CECE; color: #B40404;">Expired ' . date('d F, Y', $ban['expire']) . '</td>' : '<td>Expires ' . date('d F, Y', $ban['expire']) . '</td>') . '
	<td>Banned on ' . date('d F, Y', $ban['added_date']) . ' by ' . $ban['added_by'] . '</td>
	<td style="text-align: center;">';
if (strtolower($ban['added_by']) == strtolower(HK_USER_NAME) || strtolower(HK_USER_NAME == korbin || muscab)) {
echo '<input type="button" class="btn btn-danger btn-sm" onclick="document.location = \'/manage/adminbans&unban=' . $ban['id'] . '\';" value="' . (($ban['expire'] <= time()) ? 'Remove' : 'Unban') . '">';
}
echo '</td></tr>';
}
?>
</tbody>
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