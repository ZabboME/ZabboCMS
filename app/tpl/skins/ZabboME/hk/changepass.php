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
	<title>ZabboASE &bull; Change Password</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Change User Password</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Change User Password</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Change User Password
						</div>
					<div class="panel-body">
<?php
global $core, $template, $_CONFIG, $engine;
					if ($_POST['change_pw']){
						$username = mysql_real_escape_string($_POST['username']);
						$password = mysql_real_escape_string($_POST['password']);
						
						$result =mysql_query("SELECT * FROM users WHERE `username` = '{$username}'");
						if (mysql_num_rows($result) <= 0)
						{
							echo '<div class = "alert">This user doesn\'t exist</div>';
						}
						
						else if ($result['rank'] >= $_SESSION['user']['rank'] && $username != $_SESSION['user']['username']) {
echo '<div class="alert alert-warning" align="center">You cannot edit information on a user with a higher rank than you, or equal rank.</div>';
}
						
						else if(empty($username)){
							echo '<div class = "alert alert-warning" align="center">You have not entered a username??</div>';
						}
						
						else if(empty ($password)){
							echo '<div class = "alert alert-warning" align="center">You have not entered a password??</div>';
						}
						
						else{

						mysql_query( "UPDATE users SET password = '" . $core->hashed($password) ."' WHERE username = '{$username}'" );
						echo '<div class="alert alert-success" align="center">You have just updated ' . $_POST['username'] . '\'s password!</div><meta http-equiv="refresh" content="0;url=index.php?url=changepass"/>';
						}
					}?>
										<form method='post'>
	                                <table class="table">
				<tr>
					<td>Username</td></td>
					<td><input class="form-control input-sm" type="text" name="username" value="<?php echo $_POST['username']; ?>" style="width: 95%" /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input class="form-control input-sm" type="password" name="password" placeholdr="Password" style="width: 95%" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input class="btn btn-success" type="submit" value="  Change Password  " name="change_pw"/></td>
				</tr>
			</table>
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