					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'moderation'"));
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
				<div class="panel panel-primary chat" style="padding: 10px;">
					<div class="panel-heading">
						Rare Values Editor</div>	
<?php
$id = intval($_GET['id']);
$existq = mysql_query("SELECT * FROM cms_values WHERE id = '$id'") or die(mysql_error());
$exist = mysql_num_rows($existq);
$values  = mysql_fetch_array($existq);
if ($exist == 0) {
header('Location: ../me');
}
if (isset($_POST['submit'])) {
$item_name = mysql_real_escape_string($_POST['item_name']);
$item_credits  = mysql_real_escape_string($_POST['item_credits']);
$item_duckets  = mysql_real_escape_string($_POST['item_duckets']);
$item_diamonds  = mysql_real_escape_string($_POST['item_diamonds']);
$item_points  = mysql_real_escape_string($_POST['item_points']);
$item_total  = mysql_real_escape_string($_POST['item_total']);
$item_up  = mysql_real_escape_string($_POST['item_up']);
$item_drop  = mysql_real_escape_string($_POST['item_drop']);
$item_category  = mysql_real_escape_string($_POST['item_category']);
$added_date = time();
$userUsername = $_SESSION['user']['username'];
$userId = $_SESSION['user']['id'];
$userLook = $_SESSION['user']['look'];

if (empty($item_name)) {
echo '
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Error</strong> Please fill in all fields!
									</div>';
} else {
mysql_query("UPDATE cms_values SET item_name = '$item_name' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_credits = '$item_credits' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_duckets = '$item_duckets' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_diamonds = '$item_diamonds' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_points = '$item_points' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_total = '$item_total' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_up = '$item_up' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_drop = '$item_drop' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_category = '$item_category' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET added_date = '$added_date' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET item_edited = '1' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET added_by = '$userUsername' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET user_id = '$userId' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_values SET user_look = '$userLook' WHERE id = '$id'") or die(mysql_error());


header("Refresh:0");
echo '
									<br /><div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Success!</strong> Rare Value updated. Redirecting you back to the Rare Values page...
									</div>';
header("refresh:3;url=index.php?url=values");
}
}
?>						
						<form method="post" class="form-horizontal row-fluid"> 	

						<br />
						
Item Name <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['item_name']); ?>" name="item_name" /><br>						
Credits Amount <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['item_credits']); ?>" name="item_credits" /><br>
Duckets Amount <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['item_duckets']); ?>" name="item_duckets" /><br>
Diamonds Amount <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['item_diamonds']); ?>" name="item_diamonds" /><br>
Points Amount <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['item_points']); ?>" name="item_points" /><br>
Total LTD Set Amount <input type="text" class="form-control form-xs" value="<?php echo htmlspecialchars($values['item_total']); ?>" name="item_total" /><br>
<td><b>Item Category</b></td>
<td><select name="item_category" class="form-control is-valid">
	<option value="<?php echo htmlspecialchars($values['item_category']); ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current Category = <?php echo htmlspecialchars($values['item_category']); ?> </font></font></option>
	<option value="No Category"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No Category</font></font></option>
	<option value="Limited Rare"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Limited Rare</font></font></option>
	<option value="Limited Point"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Limited Point</font></font></option>
</select></td>
</tr>
<br>
<td><b>Increased Status</b></td>
<td><select name="item_up" class="form-control is-valid">
	<option value="<?php echo htmlspecialchars($values['item_up']); ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current Increased Status #<?php echo htmlspecialchars($values['item_up']); ?> </font></font></option>
	<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True #1</font></font></option>
	<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">False #0</font></font></option>
</select></td>
</tr>
<br>
<td><b>Decreased Status</b></td>
<td><select name="item_drop" class="form-control is-valid">
	<option value="<?php echo htmlspecialchars($values['item_drop']); ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current Decreased Status #<?php echo htmlspecialchars($values['item_drop']); ?> </font></font></option>
	<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True #1</font></font></option>
	<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">False #0</font></font></option>
</select></td>
</tr>

<br>
																		
	<div class="control-group">
										<button type="submit" class="btn btn-small btn-primary" name="submit">Update Rare Item Value</button>
							
						
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