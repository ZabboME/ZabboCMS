					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'TMOD'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
<?php
if (isset($_GET['doDel']) && is_numeric($_GET['doDel'])) {
mysql_query("DELETE FROM cms_news WHERE id = '" . intval($_GET['doDel']) . "' LIMIT 1");
if (mysql_affected_rows() >= 1) {
echo 'Article deleted.';
}
header("Location: index.php?url=news&deleteOK");
exit;
}
if (isset($_GET['doBump']) && is_numeric($_GET['doBump'])) {
mysql_query("UPDATE cms_news SET published = '" . time() . "' WHERE id = '" . intval($_GET['doBump']) . "' LIMIT 1");
if (mysql_affected_rows() >= 1) {
echo 'Article date bumped.';
}
header("Location: index.php?url=news&bumpOK");
exit;
}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; News</title>
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
				<li>Dashboard</li> <li>Moderation</li> <li class="active">Manage Articles</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Manage Articles</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Manage Articles
						</div>
					<div class="panel-body">
<p>
	<a href="index.php?url=newspublish">
		<b>
			Write new article
		</b>
	</a>
</p>
<br />
 <table class="table table-striped">
<thead>
<tr>
	<td>ID</td>
	<td>Title</td>
	<td>Topstory snippet</td>
	<td>Published</td>
	<td>Author</td>
	<td>Controls</td>
</tr>
</thead>
<tbody>
<?php
$getNews = mysql_query("SELECT * FROM cms_news ORDER BY published DESC");
$i       = 1;
while ($n = mysql_fetch_assoc($getNews)) {
	$username = $n['author'];
$grabUser = mysql_query("SELECT * FROM users WHERE username = '" . $username . "' LIMIT 1");
while ($userData = mysql_fetch_assoc($grabUser)) {
$highlight = '#fff';
if ($i <= 3) {
$highlight = '#CEE3F6';
} else if ($i <= 5) {
$highlight = '#EFFBFB';
}
echo '<tr style="background-color: ' . $highlight . ';">
	<td>' . $n['id'] . '</td>
	<td>' . $n['title'] . '</td>
	<td>' . $n['shortstory'] . '</td>
	<td>' . date("F j, Y - g:i a", $n['published']) . '</td>
	<td>' . $userData['username'] . '</td>
	<td>
		<input type="button" class="btn btn-info btn-xs" value="View" target="_blank" onclick="document.location = \'{url}/ase/index.php?url=news&id=' . $n['id'] . '\';">&nbsp;
		<input type="button" class="btn btn-danger btn-xs" value="Delete" onclick="document.location = \'index.php?url=news&doDel=' . $n['id'] . '\';">&nbsp;
		<input type="button" class="btn btn-warning btn-xs" value="Edit" onclick="document.location = \'index.php?url=editnews&id=' . $n['id'] . '\';">
		<input type="button" class="btn btn-success btn-xs" value="Update/bump date" onclick="document.location = \'index.php?url=news&doBump=' . $n['id'] . '\';">&nbsp;
	</td>
	</tr>';
$i++;
}
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