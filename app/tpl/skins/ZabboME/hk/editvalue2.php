					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'amb'"));
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
	<title>ZabboASE &bull; Edit Rare Values</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Edit Rare Values</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Rare Values</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Rare Values Editor
						</div>
					<div class="panel-body">
										<?php
// Get ID of rare
$id = intval($_GET['id']);
// Get existing 
$existq = mysql_query("SELECT * FROM cms_values WHERE id = '$id'") or die(mysql_error());
$exist            = mysql_num_rows($existq);
$values           = mysql_fetch_array($existq);
// If non-existing, redirect to /me
if ($exist == 0) {
header('Location: ../me');
}
if (isset($_POST['submit'])) {
// Define new variables
$name = secureStr($_POST['name']);
$credits  = secureStr($_POST['credits']);
$diamonds  = secureStr($_POST['diamonds']);
$tokens  = secureStr($_POST['tokens']);
$added_time = time();
// If field is empty, tell the user
if (empty($name)) {
echo '
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Error</strong> Please fill in all fields!
							</div>';
} else {
mysql_query("UPDATE cms_values SET name = '$name', credits = '$credits', diamonds = '$diamonds', tokens = '$tokens', added_time = '$time' WHERE id = '$id'") or die(mysql_error());
echo '
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Success!</strong> Rare Value updated. Redirecting you back to the Rare Values page...
							</div>';
header("refresh:3;url=values");
}
}
?>
						<div class="module">
							<div class="module-body">
								<form method="post" class="form-horizontal row-fluid"> 	
								
Rare Name <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['name']); ?>" name="name" /><br>
								
Credits Amount <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['credits']); ?>" name="credits" /><br>
Diamonds Amount <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['diamonds']); ?>" name="diamonds" /><br>
Tokens Amount <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['tokens']); ?>" name="tokens" /><br>

			


<button type="submit" class="btn btn-info btn-xs" name="submit">Edit Value</button>
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