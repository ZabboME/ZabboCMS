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
	<title>ZabboASE &bull; GOTW</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="{url}/app/tpl/skins/{skin}/images/favicon.ico" />

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
				<li class="active">GOTW</li>
			</ol>
		</div><!--/.row-->
											<?php
    if(isset($_POST['update']))
    {
       function RCON($header, $data = '') {
    $musData = $header . chr(1) . $data;

    $sock = @socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
	@socket_connect($sock, '185.134.21.180', '3321');
    @socket_send($sock, $musData, strlen($musData), MSG_DONTROUTE);
    @socket_close($sock);
}
         RCON('resetgotw', $_SESSION['user']['id']);
    }
?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">GOTW<br><form method='post'><td><input class="btn btn-success" type="submit" value="Reset GOTW" name="update"/></td></form></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary chat">
					<div class="panel-heading">
						Top 5
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>GOTW Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$result = mysql_query("SELECT * FROM users WHERE rank < 3 ORDER BY gotw_points DESC LIMIT 5");
while ($row = mysql_fetch_array($result)) {
$ip          = $row['ip_last'];
$xml         = simplexml_load_file("http://ip-api.com/xml/$ip");
$CountryName = $xml->country;
$CountryCode = $xml->countryCode;
echo '
                                                        <tr>
                                                             <td><span class="badge">' . $row['id'] . '</span></td>
                                                            <td>' . $row['username'] . '</td>
                                                             <td>' . $row['gotw_points'] . '</td>
                                                        </td>
                                                        </tr>
                                            ';
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