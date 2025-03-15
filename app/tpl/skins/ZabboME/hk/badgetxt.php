					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'OWNER'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}

$USER = mysql_query('SELECT * FROM users WHERE id = "'. $_SESSION['user']['id'] . '"');
$USERR = mysql_fetch_assoc($USER);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Add Badge Text</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Add Badge Text</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Badges</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
						Add Badge Text
						</div>
					<div class="panel-body">
<?php
									if($_SESSION['user']['rank'] >= 6)
									{
										if($_POST['badge'])
										{
											if ($_POST['code'] != null && $_POST['title'] != null && $_POST['desc'] != null)
											{
											$extjson = fopen("../game/gamedata/AddedBadgetxt.json", "a") or die("Please message <b>Justin</b> on discord!");
											$json = "\n\"badge_name_" .$_POST['code'] . "\": \"" .$_POST['title'] . "\",\n";
											fwrite($extjson, $json);
											$json = "\"badge_desc_" .$_POST['code'] . "\": \"" .$_POST['desc'] . "\",";
											fwrite($extjson, $json);
											fclose($extjson);
											
											echo '					
											<div class="alert alert-success">
												<button type="button" class="close" data-dismiss="alert">×</button>
												<strong>AYYY!</strong> You\'ve used <b>' .$_POST['title'] . '</b> as your title & <b>' .$_POST['desc'] . '</b> as the description for badge code: <b>' .$_POST['code'] . '</b>!
											</div>';
											}
											else
											{
												echo '					
												<div class="alert alert-error">
													<button type="button" class="close" data-dismiss="alert">×</button>
													<strong>Error:</strong> Please enter something ..
												</div>';
											}
										}
									}
								?>
							
							
								<form method="post" enctype="multipart/form-data" style="padding: 10px;">
											<br>
											<input type="text" name="code" class="form-control" placeholder="Badge Code (Ex. HAM)" style="margin-bottom: 10px;width:300px;">
											<br>
											<input type="text" name="title" class="form-control" placeholder="Badge title" style="margin-bottom: 10px;width:300px;">
											<br>
											<input type="text" name="desc" class="form-control" placeholder="Badge description" style="margin-bottom: 10px;width:300px;">
											<br>
											<input type="submit" name="badge" class="btn btn-primary">
								</form>
					</div>
					</div>
					</div>
					</div>
</body><!--/.row-->
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