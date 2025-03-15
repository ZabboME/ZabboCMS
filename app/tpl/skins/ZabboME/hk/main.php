<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'SMOD'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
		<?php
if (isset($_GET['doDel']) && is_numeric($_GET['doDel'])) {
mysql_query("DELETE FROM bans WHERE id = '" . intval($_GET['doDel']) . "' LIMIT 1");
if (mysql_affected_rows() >= 1) {
echo 'Ban Deleted.';
}
header("Location: index.php?url=main&deleteOK");
exit;
}
?>		
<?php
function relativeTime($time){
	//if(is_int($time) {
		
		$SECOND = 1;
		$MINUTE = 60 * $SECOND;
		$HOUR = 60 * $MINUTE;
		$DAY = 24 * $HOUR;
		$MONTH = 30 * $DAY;
		$before = time() - $time;
		if ($before < 0) { return "0 Seconds ago"; }
		if ($before < 1 * $MINUTE) { return "Just now"; }
		if ($before < 2 * $MINUTE) { return "About a minute ago"; }
		if ($before < 45 * $MINUTE) { return floor($before / 60) . "  Minutes ago"; }
		if ($before < 90 * $MINUTE) { return "About an hour ago"; }
		if ($before < 24 * $HOUR) { return (floor($before / 60 / 60) == 1 ? 'About an hour ago' : floor($before / 60 / 60) . ' hours ago');}
		if ($before < 48 * $HOUR) { return "Just over a day ago"; }
		if ($before < 30 * $DAY) { return floor($before / 60 / 60 / 24) . " days ago"; }
		if ($before < 12 * $MONTH) { $months = floor($before / 60 / 60 / 24 / 30); return $months <= 1 ? "About one month ago" : $months . " months ago";
		} else { $years = floor($before / 60 / 60 / 24 / 30 / 12); return $years <= 1 ? "About one year ago" : $years . " years ago";
		} return "$time";
		}

//}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="icon" href="{url}/app/tpl/skins/ZabboME/hk/favicon.ico?<?php echo time() ?>" />

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
				<li><a href="/ase/main">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
							<div class="large">{online}</div>
							<div class="text-muted">Active Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-basket color-orange"></em>
							<div class="large"><?php
echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM catalog_items")));
?></div>
							<div class="text-muted">Catalog Items</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?php 
$query = mysql_query("SELECT COUNT(*) AS stats1 FROM users") or die(mysql_error());
$data = mysql_fetch_assoc($query);
echo number_format($data['stats1']);
?></div>
							<div class="text-muted">Registered Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-ban color-red"></em>
							<div class="large"><?php
echo number_format(mysql_num_rows(mysql_query("SELECT * FROM bans")));
?></div>
							<div class="text-muted">Banned Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-line-chart color-red"></em>
							<div class="large"><?php
echo number_format(mysql_num_rows(mysql_query("SELECT * FROM users WHERE rank >= '10' AND hidden = '0'")));
?></div>
							<div class="text-muted">Staff Members</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-gamepad color-blue"></em>
							<div class="large"><?php
echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM events_hosted_logs")));
?></div>
							<div class="text-muted">Events Hosted</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-trophy color-orange" style="font-size: x-large;"></em>
							<div class="large"><?php
echo number_format(mysql_num_rows(mysql_query("SELECT * FROM users WHERE rank = '8' || rank = '9'")));
?></div>
							<div class="text-muted">Event Team Members</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-wrench color-blue" style="font-size: x-large;"></em>
							<div class="large"><?php
echo number_format(mysql_num_rows(mysql_query("SELECT * FROM users WHERE rank = '6'")));
?></div>
							<div class="text-muted">Builder Team Members</div>
						</div>
					</div>
				</div>	
				
			</div><!--/.row-->
		</div>
		
			<div class="col-md-6">
				<div class="panel panel-danger chat">
					<div class="panel-heading">
						Latest Bans
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
                                   <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Reason</th>
                                            <th>Staff</th>
											<th>Timestamp</th>
											<?php if($_SESSION['user']['rank'] >= 16 ){
				
											?>
											<th>Manage</th>
										 <?php
													}
												?>	

                                        </tr>
                                    </thead>
									
                                    <tbody>
									<?php
					$getUserGroup = mysql_query("SELECT * FROM `bans` WHERE `id` ORDER BY id DESC LIMIT 10");
						while($groupdata= mysql_fetch_array($getUserGroup))
						{
				?>	
				
				<?php
					if(!is_numeric($_GET['i'])) $_GET['i'] = 1;
					$q = mysql_query("SELECT * FROM bans WHERE id = '" . filter($groupdata['id']) . "' LIMIT 1");
				//	if(mysql_num_rows($q) != 1) header("" . filter($_GET['i']) . "'");
					$groupData1 = mysql_fetch_assoc($q);
					unset($q);
					$userList = mysql_query("SELECT * FROM bans WHERE id = '{$groupData1["id"]}'");
				  
				?>
				                 
				
				<td style="text-align: justify;word-break: break-word;"><span class="badge">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b><?php echo mysql_result(mysql_query("SELECT username FROM users WHERE id = '{$groupdata['user_id']}' LIMIT 1"), 0); ?></b></font></font></span>
				<br><i style="font-size: 11px;word-break: break-word;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font></font></i></td>  
				<td style="text-align: justify;word-break: break-word;"><span class="badge">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b><?php echo $groupdata['ban_reason']; ?></b></font></font></span>
				<br><i style="font-size: 11px;word-break: break-word;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font></font></i></td>  
				<td style="text-align: justify;word-break: break-word;"><span class="badge">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b><?php echo mysql_result(mysql_query("SELECT username FROM users WHERE id = '{$groupdata['user_staff_id']}' LIMIT 1"), 0); ?></b></font></font></span>
				<br><i style="font-size: 11px;word-break: break-word;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font></font></i></td> 
				<td><span class="badge"><?php echo relativeTime($groupdata['timestamp']); ?></span></td> 
				<?php if($_SESSION['user']['rank'] >= 16 ){
				
			 ?>
				<td><a class="btn btn-danger btn-xs" value="Delete" href="index.php?url=main&doDel=<?php echo $groupdata['id']; ?>">Delete</a></td>
<?php
						}
					?>	
					
					
							
                                                              

                                    
									</tbody>
								<?php
						}
					?>	
					
					 </table>
					</div>
					</div>
					
					
				</div> 
				
			
			
			<div class="col-md-6">
				<div class="panel panel-success chat">
					<div class="panel-heading">
						Latest Logins
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$result = mysql_query("SELECT id,username,last_online FROM users ORDER BY last_online DESC LIMIT 10");
while ($row = mysql_fetch_array($result)) {
$ip          = $row['ip_current'];
$xml         = simplexml_load_file("http://ip-api.com/xml/$ip");
$CountryName = $xml->country;
$CountryCode = $xml->countryCode;
echo '
                                                        <tr>
                                                             <td><span class="badge">' . $row['id'] . '</span></td>
                                                            <td>' . $row['username'] . '</td>
                                                             <td>' . time_elapsed_string('@' . $row['last_online'] . '') . '</td>
                                                        </tr>
                                            ';
}
?>
                                    </tbody>
                                </table>
					</div>
				</div>
			</div><!--/.col-->
			
			<?php if($_SESSION['user']['rank'] >= 6 ){
				
			 ?>
			<div class="col-md-12">
				<div class="panel panel-primary chat">
					<div class="panel-heading">
						Latest Registrations
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
                           
                                
     

	<?php
					$result = mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 10");

					if (mysql_num_rows($result) == 0)
					echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>You do not have any transactions on {longname} yet!</b></center></div>';
					else
						if($_SESSION['user']['rank'] >= 6 )
						echo '
								<thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            '.((getPageRank('CL') <= $getUseRank4Page['rank']) ? '<th>Registered IP address</th>' : '' ).'
                                            '.((getPageRank('CL') <= $getUseRank4Page['rank']) ? '<th>Latest IP address</th>' : '' ).'
                                            <th>Machine ID</th>
                                            <th>Location</th>
                                            <th>Flag</th>
											'.((getPageRank('CL') <= $getUseRank4Page['rank']) ? '<th>Ban User</th>' : '' ).'
                                        </tr>
                                    </thead>
							';
						{
					while ($row = mysql_fetch_array($result)) {
					$ip = $row['ip_current'];
					$xml = simplexml_load_file("http://ip-api.com/xml/$ip");
					$CountryName = $xml->country;
					$CountryCode = $xml->countryCode;
						if($_SESSION['user']['rank'] >= 6 )
					echo '
									<tr>
										 <td><span class="badge">' . $row['id'] . '</span></td>
										<td>' . $row['username'] . '</td>
										'.((getPageRank('CL') <= $getUseRank4Page['rank']) ? '<td>' . $row['ip_register'] . '</td>' : '' ).'
										'.((getPageRank('CL') <= $getUseRank4Page['rank']) ? '<td>' . $row['ip_current'] . '</td>' : '' ).'
										
										  <td><span class="label label-warning">' . $row['machine_id'] . '</td>
										<td>' . $CountryName . '</td>
										<td><img src="flags/' . $CountryCode . '.gif" /></td>
										<td>
										'.((getPageRank('CL') <= $getUseRank4Page['rank']) ? '<form action="" method="post">
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
			</div>
				<?php
						}
					?>	
			<!--/.col-->
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