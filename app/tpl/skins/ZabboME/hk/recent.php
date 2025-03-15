					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'TMOD'"));
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
	<title>ZabboASE &bull; Registration</title>
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
				<li>Dashboard</li> <li>Moderation</li> <li class="active">Registration</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Registration</h1>
			</div>
		</div><!--/.row-->

		
			<div class="col-md-12">
				<div class="panel panel-primary chat">
					<div class="panel-heading">
						Latest Registrations
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body" style="height: 520px;">
						<table class="table table-striped">
                           
                                
     

	<?php
					$result = mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 30");

					if (mysql_num_rows($result) == 0)
					echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>You do not have any transactions on {longname} yet!</b></center></div>';
					else
						echo '
								<thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            '.((getPageRank('ADMIN') <= $getUseRank4Page['rank']) ? '<th>Registered IP address</th>' : '' ).'
                                            '.((getPageRank('ADMIN') <= $getUseRank4Page['rank']) ? '<th>Latest IP address</th>' : '' ).'
                                            <th>Machine ID</th>
                                            <th>Location</th>
                                            <th>Flag</th>
											'.((getPageRank('ADMIN') <= $getUseRank4Page['rank']) ? '<th>Ban User</th>' : '' ).'
                                        </tr>
                                    </thead>
							';
						{
					while ($row = mysql_fetch_array($result)) {
					$ip = $row['ip_current'];
					$xml = simplexml_load_file("http://ip-api.com/xml/$ip");
					$CountryName = $xml->country;
					$CountryCode = $xml->countryCode;
						if($_SESSION['user']['rank'] >= 2 )
					echo '
									<tr>
										 <td><span class="badge">' . $row['id'] . '</span></td>
										<td>' . $row['username'] . '</td>
										'.((getPageRank('ADMIN') <= $getUseRank4Page['rank']) ? '<td>' . $row['ip_register'] . '</td>' : '' ).'
										'.((getPageRank('ADMIN') <= $getUseRank4Page['rank']) ? '<td>' . $row['ip_current'] . '</td>' : '' ).'
										
										  <td><span class="label label-warning">' . $row['machine_id'] . '</td>
										<td>' . $CountryName . '</td>
										<td><img src="flags/' . $CountryCode . '.gif" /></td>
										<td>
										'.((getPageRank('ADMIN') <= $getUseRank4Page['rank']) ? '<form action="" method="post">
											<center>
												<input type="submit" value="Ban User" name="ban" class="btn btn-danger btn-xs">
												<input type="hidden" value="'. $row['id']. '" name="ban">
											</center>
										</form>' : '' ).'
									</td>
									</tr>
						';
					}
				}
				?>

                                </table>
					</div>
				</div>
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