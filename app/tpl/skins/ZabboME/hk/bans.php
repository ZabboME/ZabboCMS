					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'TMOD'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}

$USER = mysql_query('SELECT * FROM users WHERE id = "'. $_SESSION['user']['id'] . '"');
$USERR = mysql_fetch_assoc($USER);

?>

<?php
if(!is_numeric($_GET['i'])) $_GET['i'] = 1;
$q = mysql_query("SELECT * FROM bans WHERE id = '" . filter($groupdata['id']) . "' LIMIT 1");
//	if(mysql_num_rows($q) != 1) header("" . filter($_GET['i']) . "'");
$groupData1 = mysql_fetch_assoc($q);
unset($q);
$userList = mysql_query("SELECT * FROM bans WHERE id = '{$groupData1["id"]}'");

?>
		<?php
if (isset($_GET['doDel']) && is_numeric($_GET['doDel'])) {
mysql_query("DELETE FROM bans WHERE id = '" . intval($_GET['doDel']) . "' LIMIT 1");
if (mysql_affected_rows() >= 1) {
echo 'Ban Deleted.';
}
header("Location: index.php?url=bans&deleteOK");
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
				<li>Dashboard</li> <li>Moderation</li> <li class="active">Manage Bans</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Manage Bans</h1>
			</div>
		</div><!--/.row-->
					
			
			
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Banlist
						</div>
							<div class="panel-body">
						<table class="table table-striped">
                                   <thead>
                                        <tr>
                                             <th>Username</th>
                                            <th>Reason</th>
                                            <th>Staff</th>
											<th>Timestamp</th>
											<?php if($_SESSION['user']['rank'] >= 12 ){
				
											?>
											<th>Manage</th>
										 <?php
													}
												?>	

                                        </tr>
                                    </thead>
									
                                    <tbody>
									<?php
					$getUserGroup = mysql_query("SELECT * FROM `bans` WHERE `id` ORDER BY id");
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
				<?php if($_SESSION['user']['rank'] >= 12 ){
				
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