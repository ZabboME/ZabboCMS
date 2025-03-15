					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'OWNER'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
function sendMUS($key, $data = []) {
    // Connect to the Rcon port.
    $socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        //Attempt to send the data to the server.
        if ( @socket_connect($socket, "127.0.0.1", "3001")) {
            $message = json_encode([
                'key' => $key,
                'data' => $data
            ]);

            @socket_send($socket, $message, strlen($message), MSG_DONTROUTE);
            @socket_close($socket);
        }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Word Filter</title>
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
?>z
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li>Dashboard</li> <li>Management</li> <li class="active">Word Filter</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Word Filter (<?php
echo mysql_num_rows(mysql_query("SELECT NULL FROM wordfilter"));
?> Words/Hotels Filtered)</h1>
			</div>
						<?php
if (isset($_GET['remove_id'])) {
$qry = mysql_query('DELETE FROM `wordfilter` WHERE `id` = "' . filter($_GET['remove_id']) . '"');
sendMUS("updatewordfilter");
if ($qry) {
echo '<div class="col-lg-12"><div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> You have deleted ' . filter($_GET['removedname']) . ' from the filter!<a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div></div><meta http-equiv="refresh" content="2;url=filter"/>';
}
}
function secureStr($str) {
return mysql_real_escape_string(stripslashes(htmlspecialchars($str)));
}
if (isset($_POST['filter_submit'])) {
$filteredword = secureStr($_POST['word']);
$replacement     = secureStr($_POST['replacement']);
$hideword     = secureStr($_POST['hide']);
$reportword     = secureStr($_POST['report']);
$muteword     = secureStr($_POST['mute']);
if (empty($filteredword)) {
echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Error:</strong> You have not entered a word to filter!</div>';
} else {
$q = "INSERT INTO wordfilter (key, replacement, hide, report, mute) VALUES('{$filteredword}','{$replacement}','{$hideword}','{$reportword}','{$muteword}')";
mysql_query($q) or die(mysql_error());
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>'.$filteredword.'</strong> has been replaced with <strong>'.$replacement.'</strong></div>';
}
}
/*if (isset($_POST['filterWord'])) {
$check = mysql_num_rows(mysql_query('SELECT null FROM `wordfilter` WHERE `key` = "' . filter($_POST['key']) . '"'));
if ($check == 1) {
echo '<div class="col-lg-12"><div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> This hotel has already been filtered!<a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div></div><meta http-equiv="refresh" content="2;url=filter"/>';
} else {
//$insertquery = mysql_query('INSERT INTO wordfilter (key,replacement,hide,report,mute) VALUES ("' . $_POST['key'] . '", "' . $_POST['replacement'] . '", "' . $_POST['hide'] . '", "' . $_POST['report'] . '", "' . $_POST['mute'] . '")');
$insertquery = mysql_query('INSERT INTO `wordfilter` (`key`, `replacement`, `hide`, `report`, `mute`) VALUES ('boonfrffff.pw', 'Zabbo', '0', '0', '0')');
sendMUS("updatewordfilter");
echo '<div class="col-lg-12"><div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> You have filtered ' . filter($_POST['replacement']) . '<a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div></div><meta http-equiv="refresh" content="2;url=filter"/>';
}
}*/
?>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Word Filter 
						</div>
					<div class="panel-body">
										<form method="post">
Word: <input type="text" class="form-control form-xs" placeholder="Word" name="word" /><br>
Replacement: <input type="text" class="form-control form-xs" placeholder="Replacement" name="replacement"><br>
Hide Word <select name="hide" class="form-control form-xs">
												<option value="0" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No</font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Yes</font></font></option>
											</select><br>
Report Word <select name="report" class="form-control form-xs">
												<option value="0" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No</font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Yes</font></font></option>
											</select><br>
Mute Word <select name="mute" class="form-control form-xs">
												<option value="0" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No</font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Yes</font></font></option>
											</select><br>
											<input type="submit" class="btn btn-success btn-xs" value="Add Filter" name="filter_submit">
								</form>
<br><br>
<table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Word</th>
											<th>Replacement</th>
											<th>Hide</th>
                                            <th>Report</th>
											<th>Mute</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$query = mysql_query("SELECT * FROM `wordfilter`");
while ($row = mysql_fetch_assoc($query)) {
echo '
                                                        <tr>
															<td><span class="label label-danger">' . $row['key'] . '</span></td>
                                                             <td><span class="label label-primary">' . $row['replacement'] . '</span></td>
															 <td><span class="label label-success">' . $row['hide'] . '</span></td>
															 <td><span class="label label-success">' . $row['report'] . '</span></td>
															 <td><span class="label label-success">' . $row['mute'] . '</span></td>

                                                             <td><a href="index.php?url=filter&remove_id=' . $row['id'] . '&removedname=' . $row['key'] . '"<a class="btn btn-danger btn-xs">Delete</a></td>
                                                        </tr>
                                            ';
}
?>
                                    </tbody>
                                </table>
					</div>
				</div>
			</div>
							</div>
						</div>		-->
			
			
			
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