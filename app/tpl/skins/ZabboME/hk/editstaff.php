					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'management'"));
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
	<title>ZabboASE &bull; Staff Page</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Staff Page</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Staff Page</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Staff Page
						</div>
					<div class="panel-body">
										 <?php
// Get ID of rare
$id = intval($_GET['id']);
// Get existing 
$existq = mysql_query("SELECT * FROM cms_staff WHERE id = '$id'") or die(mysql_error());
$exist            = mysql_num_rows($existq);
$staff           = mysql_fetch_array($existq);
$pageid = $staff['pageid'];
if ($pageid == 1) {
$thepage = "Management";
}
if ($pageid == 2) {
$thepage = "Moderation";
}
if ($pageid == 3) {
$thepage = "Events";
}
// If non-existing, redirect to /me
if ($exist == 0) {
header('Location: ../me');
}
if (isset($_POST['submit'])) {
// Define new variables
$username   = mysql_real_escape_string($_POST['username']);
$margintop   = mysql_real_escape_string($_POST['margintop']);
$marginright   = mysql_real_escape_string($_POST['marginright']);
$extra   = mysql_real_escape_string($_POST['extra']);
$lepageid   = mysql_real_escape_string($_POST['pageid']);
mysql_query("UPDATE cms_staff SET username = '$username', margintop = '$margintop', marginright = '$marginright', extra = '$extra', pageid = '$lepageid' WHERE id = '$id'") or die(mysql_error());
echo '
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Success!</strong> User updated. Redirecting you back to the Staff Page Users page...
							</div>';
header("refresh:3;url={url}/ase/staffpage");
}
?>
						<div class="module">
							<div class="module-head">
								<h3>Edit User</h3>
							</div>
							<div class="module-body">
								<form method="post" class="form-horizontal row-fluid"> 	
User ID: <input type="text" class="form-control form-xs" value="<?php
echo $staff['username'];
?>" name="username" /><br>
Margin Top: <input type="text" class="form-control form-xs" value="<?php
echo $staff['margintop'];
?>" name="margintop" /><br>
Margin Left: <input type="text" class="form-control form-xs" value="<?php
echo $staff['marginright'];
?>" name="marginright" /><br>
Extra: <input type="text" class="form-control form-xs" value="<?php
echo $staff['extra'];
?>" name="extra" /><br>
What Page is the user displayed on? <select name="pageid" class="form-control input-sm" style="width: 95%" tabindex="1" data-placeholder="Select Page Id">
													<option value="<?php
echo htmlspecialchars($pageid);
?>">Current Page: <?php
echo htmlspecialchars($thepage);
?></option>
													<option value="1">Management</option>
													<option value="2">Moderation</option>
													<option value="3">Events</option>
												</select>	<br>		
										<button type="submit" class="btn btn-info btn-xs" name="submit">Edit User</button>
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