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
if (isset($_GET['delete'])) {
mysql_query("DELETE FROM cms_staff WHERE id = '" . $_GET['id'] . "'");
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Well done!</strong> User has been removed from staff page</div>';
echo ("<meta http-equiv=\"refresh\" content=\"0;url={url}/ase/index.php?url=staffpage\" />");
}
?>
							<?php
if ($_SESSION['user']['rank'] >= 6) {
function secureStr($str) {
return mysql_real_escape_string(stripslashes(htmlspecialchars($str)));
}
if (isset($_POST['staffsubmit'])) {
$username = secureStr($_POST['username']);
$margintop     = secureStr($_POST['margintop']);
$marginright     = secureStr($_POST['marginright']);
$extra     = secureStr($_POST['extra']);
$lepageid     = secureStr($_POST['pageid']);
$q = "INSERT INTO cms_staff (username, margintop, marginright, extra, pageid) VALUES('{$username}','{$margintop}','{$marginright}','{$extra}', '{$lepageid}')";
mysql_query($q) or die(mysql_error());
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Well done!</strong> User Added</div>';
} else if ($_POST['rare_view']) {
?>
								<p><center><img src="{url}/ase/value_images/<?php
echo $_POST['rare'];
?>"></center></p>
							<?php
}
?>
								<form method="post">
User ID: <input type="text" class="form-control form-xs" placeholder="User ID" name="username" /><br>
Margin Top: <input type="text" class="form-control form-xs" placeholder="Margin Top Amount (No need to enter PX, only the number)" name="margintop" /><br>
Margin Left: <input type="text" class="form-control form-xs" placeholder="Margin Left Amount (No need to enter PX, only the number)" name="marginright" /><br>
Extra: <input type="text" class="form-control form-xs" placeholder="Example: &action=sit" name="extra" /><br>
Page ID: <select name="pageid" class="form-control input-sm" style="width: 95%" tabindex="1" data-placeholder="Rank a User">
													<option value="1">Management</option>
													<option value="2">Moderation</option>
													<option value="3">Events</option>
												</select><br>
											<input type="submit" class="btn btn-success btn-xs" value="Add User" name="staffsubmit">
								</form>
								<?php
} else {
die('Go away please.');
}
?>
							</div>
						</div>
						<div class="panel panel-primary">
					<div class="panel-heading">
						Current Users On Page
						</div>
					<div class="panel-body">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-striped table-striped  display dataTable" width="100%" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
									<thead>
										<tr>
											<th>User ID</th>
											<th>Margin Top</th>
											<th>Margin Right</th>
											<th>Extra</th>
											<th>Page ID</th>
											<th>Controls</th>
										</tr>
									</thead>
									<tbody>										
									<?php
$getStaff = mysql_query("SELECT * FROM cms_staff ORDER BY id ASC") or die(mysql_error());
while ($staff = mysql_fetch_assoc($getStaff)) {
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
echo '
											<tr>
												<td>' . $staff['username'] . '</td>
												<td>' . $staff['margintop'] . '</td>
												<td>' . $staff['marginright'] . '</td>
												<td>' . $staff['extra'] . '</td>
												<td>' . $thepage . '</td>
												<td><a href="index.php?url=editstaff&id=' . $staff['id'] . '" class="btn btn-info btn-xs">Edit</a>&nbsp; <a href="index.php?url=staffpage&delete&id=' . $staff['id'] . '" class="btn btn-danger btn-xs">Delete</a></td>
											</tr>';
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