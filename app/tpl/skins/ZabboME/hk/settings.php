					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'Hamada'"));
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
	<title>ZabboASE &bull; Site Settings</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Site Settings</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Site Settings</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Site Settings
						</div>
					<div class="panel-body">
										<?php
$two   = mysql_fetch_assoc(mysql_query("SELECT * FROM settings"));
$maint = $two['maintenance'];
if ($maint == 0) {
$aanwezug = "Disabled";
}
if ($maint == 1) {
$aanwezug = "Enabled";
}
?>
<?php
$two2  = mysql_fetch_assoc(mysql_query("SELECT * FROM site_alert"));
$popupenabled = $two2['enabled'];
if ($popupenabled == 0) {
$aanwezuug = "Disabled";
}
if ($popupenabled == 1) {
$aanwezuug = "Enabled";
}
?>
									<?php
if (isset($_POST['account'])) {
$uotw = mysql_real_escape_string($_POST['uotw']);
mysql_query("UPDATE settings SET uotw = '" . $uotw . "'") or die(mysql_error());
$uotwmessage = mysql_real_escape_string($_POST['uotwmessage']);
mysql_query("UPDATE settings SET uotwmessage = '" . $uotwmessage . "'") or die(mysql_error());
$maint = mysql_real_escape_string($_POST['maint']);
if ($maint == 0) {
$aanwezug = "Disabled";
}
if ($maint == 1) {
$aanwezug = "Enabled";
}
mysql_query("UPDATE settings SET maintenance = '" . $maint . "'") or die(mysql_error());
$notice = mysql_real_escape_string($_POST['notice']);
mysql_query("UPDATE settings SET notice = '" . $notice . "'") or die(mysql_error());
echo '<div class="alert alert-success" align="center">Your changes have been saved!</div>';
}
?>
										<form method='post'>
	                                <table class="table">
									<tr>
					<td>Maintenance</td>
					<td><select name="maint" class="form-control input-sm" style="width: 95%" tabindex="1" data-placeholder="Enable/Disable Maintenance">
													<option value="<?php
echo htmlspecialchars($two['maintenance']);
?>">Status: <?php
echo htmlspecialchars($aanwezug);
?></option>
													<option value="1">Enable</option>
													<option value="0">Disable</option>
												</select></td>
				</tr>
				<tr>
					<td>Site Notice</td></td>
					<td><input class="form-control input-sm" type="text" name="notice" value="<?php
echo mysql_result(mysql_query("SELECT notice FROM settings"), 0);
?>" style="width: 95%" /></td>
				</tr>
				<tr>
					<td>UOTW</td>
					<td><input class="form-control input-sm" type="text" name="uotw" value="<?php
echo mysql_result(mysql_query("SELECT uotw FROM settings"), 0);
?>" style="width: 95%" /></td>
				</tr>
				<tr>
					<td>UOTW Reason</td>
					<td><input class="form-control input-sm" type="text" name="uotwmessage" value="<?php
echo mysql_result(mysql_query("SELECT uotwmessage FROM settings"), 0);
?>" style="width: 95%" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input class="btn btn-success" type="submit" value="  Update Settings  " name="account"/></td>
				</tr>
			</table>
		</form>
		<br>
											<?php
if (isset($_POST['server'])) {
        function doCommand($header, $data = '')
{
    $musData = $header . chr(1) . $data;
    $sock = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));

    socket_connect($sock, '127.0.0.1', '30001');
 
    socket_send($sock, $musData, strlen($musData), MSG_DONTROUTE);
    socket_close($sock);
}
$creditcycle = mysql_real_escape_string($_POST['creditc']);
mysql_query("UPDATE server_settings SET value = '" . $creditcycle . "' WHERE variable = 'game.rewards.cycle'") or die(mysql_error());
$diamondcycle = mysql_real_escape_string($_POST['diamondc']);
mysql_query("UPDATE server_settings SET value = '" . $diamondcycle . "' WHERE variable = 'game.rewards.diamondcycle'") or die(mysql_error());
$credits = mysql_real_escape_string($_POST['credits']);
mysql_query("UPDATE server_settings SET value = '" . $credits . "' WHERE variable = 'game.rewards.credits.amount'") or die(mysql_error());
$duckets = mysql_real_escape_string($_POST['duckets']);
mysql_query("UPDATE server_settings SET value = '" . $duckets . "' WHERE variable = 'game.rewards.pixels.amount'") or die(mysql_error());
$diamonds = mysql_real_escape_string($_POST['diamonds']);
mysql_query("UPDATE server_settings SET value = '" . $diamonds . "' WHERE variable = 'game.rewards.diamonds.amount'") or die(mysql_error());
$doubled = mysql_real_escape_string($_POST['doubled']);
mysql_query("UPDATE server_settings SET value = '" . $doubled . "' WHERE variable = 'game.rewards.doublediamonds'") or die(mysql_error());
$cata = mysql_real_escape_string($_POST['cata']);
mysql_query("UPDATE server_settings SET value = '" . $cata . "' WHERE variable = 'catalogue_enabled'") or die(mysql_error());
$exch = mysql_real_escape_string($_POST['exch']);
mysql_query("UPDATE server_settings SET value = '" . $exch . "' WHERE variable = 'exchange_enabled'") or die(mysql_error());
$gift = mysql_real_escape_string($_POST['gift']);
mysql_query("UPDATE server_settings SET value = '" . $gift . "' WHERE variable = 'gifts_enabled'") or die(mysql_error());
$welcome = mysql_real_escape_string($_POST['welcome']);
mysql_query("UPDATE server_settings SET value = '" . $welcome . "' WHERE variable = 'welcome_message'") or die(mysql_error());
doCommand("reload_server_settings");
echo '<div class="alert alert-success" align="center">Your changes have been saved!</div>';
}
?>
		    		          <h1 class="page-header">Server Settings</h1>
												<form method='post'>
	                                <table class="table">
				<tr>
					<td>Credits/Duckets Cycle (Minutes)</td></td>
					<td><input class="form-control input-sm" type="text" name="creditc" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'game.rewards.cycle'"), 0);
?>" style="width: 95%" /></td>
				</tr>
				<tr>
					<td>Diamonds Cycle (Minutes)</td>
					<td><input class="form-control input-sm" type="text" name="diamondc" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'game.rewards.diamondcycle'"), 0);
?>" style="width: 95%" /></td>
				</tr>
				<tr>
					<td>Credits Amount</td></td>
					<td><input class="form-control input-sm" type="text" name="credits" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'game.rewards.credits.amount'"), 0);
?>" style="width: 95%" /></td>
				</tr>
								<tr>
					<td>Duckets Amount</td></td>
					<td><input class="form-control input-sm" type="text" name="duckets" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'game.rewards.pixels.amount'"), 0);
?>" style="width: 95%" /></td>
				</tr>
												<tr>
					<td>Diamonds Amount</td></td>
					<td><input class="form-control input-sm" type="text" name="diamonds" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'game.rewards.diamonds.amount'"), 0);
?>" style="width: 95%" /></td>
				</tr>
								<tr>
					<td>Catalogue Enabled</td></td>
					<td><input class="form-control input-sm" type="text" name="cata" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'catalogue_enabled'"), 0);
?>" style="width: 95%" /></td>
				</tr>
				
												<tr>
					<td>Double Diamonds Enabled</td></td>
					<td><input class="form-control input-sm" type="text" name="doubled" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'game.rewards.doublediamonds'"), 0);
?>" style="width: 95%" /></td>
				</tr>
								<tr>
					<td>Exchange Enabled</td></td>
					<td><input class="form-control input-sm" type="text" name="exch" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'exchange_enabled'"), 0);
?>" style="width: 95%" /></td>
				</tr>
												<tr>
					<td>Gifts Enabled</td></td>
					<td><input class="form-control input-sm" type="text" name="gift" value="<?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'gifts_enabled'"), 0);
?>" style="width: 95%" /></td>
				</tr>
												<tr>
					<td>Welcome Message</td></td>
					<td><textarea class="form-control input-sm" type="text" name="welcome" style="width: 95%;height:110px" /><?php
echo mysql_result(mysql_query("SELECT value FROM `server_settings` WHERE `variable` = 'welcome_message'"), 0);
?></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input class="btn btn-success" type="submit" value="  Update Server Settings  " name="server"/></td>
				</tr>
			</table>
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