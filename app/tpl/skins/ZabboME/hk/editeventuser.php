					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'EventManager'"));
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
	<title>ZabboASE &bull; Event Edit User</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Event Edit User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Event Edit User</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Event Edit User
						</div>
					<div class="panel-body">
<form method='post' style="padding: 10px;">
<div class="col-xs-3">
	                            <input type="text" name="l_username" class="form-control" placeholder="Username" style="margin-bottom: 10px;">
								</div>
<input type="submit" class="btn btn-primary btn-sm" value="Edit User" name="lookup" style="
    position: absolute;
    margin-top: 2px;
    margin-left: -5px;
    height: 40px;
    font-variant-caps: all-small-caps;
    font-size: 15px;
    font-family: sans-serif;
    font-weight: bolder;
    border-radius: 3px;
    border-color: #1075c3;
">                    </form>
							<br>
							 <?php
						$two = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username = '" . mysql_real_escape_string($_POST['l_username']) . "'"));
						        /*function doCommand($header, $data = '')
{
    $musData = $header . chr(1) . $data;
    $sock = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));

    socket_connect($sock, '157.90.22.194', '2195');
 
    socket_send($sock, $musData, strlen($musData), MSG_DONTROUTE);
    socket_close($sock);
}*/
	                    if(isset($_POST['update'])) 
						{
	                        mysql_query("UPDATE users SET 
							username = '" . mysql_real_escape_string($_POST['username']) . "',
	                        rank = '" . mysql_real_escape_string($_POST['rank']) . "',
							pin = '" . mysql_real_escape_string($_POST['pin']) . "'	WHERE username = '" . mysql_real_escape_string($_POST['username_current']) . "'") or die(mysql_error());
	                        echo "<div class=\"alert alert-success\" style=\"margin-top: 45px;font-size: 15px;margin-left: 27px; width: fit-content;font-weight: bolder;color: #ffffff;background-color: #38b904;border-color: #4f861f;\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" style=\"float: right; margin-left: 5px;font-size: 35px;margin-top: -7px;border-radius: 140px;background: #00000000;\">×</button>User <b>" . strip_tags($_POST['username_current']) . "</b> successfully updated!</div>";
	                    }
						

						if(isset($_POST['client']))
						{
							$user = mysql_query("SELECT * FROM users WHERE username = '". mysql_real_escape_string($_POST['username_current']) ."'");
							while ($u = mysql_fetch_array($user)){
							mysql_query("UPDATE users SET 
							username = '" . mysql_real_escape_string($_POST['username']) . "',
	                        rank = '" . mysql_real_escape_string($_POST['rank']) . "',
							pin = '" . mysql_real_escape_string($_POST['pin']) . "'	WHERE username = '" . mysql_real_escape_string($_POST['username_current']) . "'") or die(mysql_error());
	                        echo "<div class=\"alert alert-success\" style=\"margin-top: 45px;font-size: 15px;margin-left: 27px; width: fit-content;font-weight: bolder;color: #ffffff;background-color: #38b904;border-color: #4f861f;\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" style=\"float: right; margin-left: 5px;font-size: 35px;margin-top: -7px;border-radius: 140px;background: #00000000;\">×</button>User <b>" . strip_tags($_POST['username_current']) . "</b> successfully updated!</div>";
							//doCommand("reload_user_rank", "".$u['id']."");
							//doCommand("alert_user", "".$u['id'].":Your rank has been updated by a Event Manager, please reload the client!");
						}
					}
						
	                    if(isset($_POST['lookup'])) {
	                        if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '". ($_POST['l_username']) ."'")) == 0) { 
	                            echo "<div class=\"alert alert-error\" style=\"padding: 15px;margin-bottom: 25px;border: 1px solid #7b0909a1;border-radius: 4px;background: #d85e5ef2;width: fit-content;margin-top: 50px;font-size: 15px;color: white;font-weight: bolder;margin-left: 27px;\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" style=\"float: right; margin-left: 5px;font-size: 35px;margin-top: -7px;border-radius: 140px;background: #00000000;\">×</button>User <b>" . strip_tags($_POST['l_username']) . "</b> not found!</div>"; 
	                        } else {
	                ?>
					<div class="col col-1">
						<div class="module">
	                        <div class="con">
	                            <form method='post' style="padding: 10px;">
	                                <input type="hidden" name="username_current" value="<?php echo htmlspecialchars($_POST['l_username']); ?>" />
	                                <table width="100%" style="margin-bottom: 10px;">
									<?php
									if ($two['username'] == "Justin")
										{
											echo '
                                        <tr>
                                            <td><b>Username</td>
                                            <td><input type="text" class="form-control input-sm" value="' . strip_tags($_POST['l_username']) . '" readonly/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Motto</td>
                                            <td><input type="text" class="form-control input-sm" value="' . strip_tags($two['motto']) . '" readonly/></td>
                                        </tr>';
										}
										else
										{
											echo '<tr>
                                            <td><b>Username</td>
                                            <td><input type="text" class="form-control input-sm" name="username" value="' . strip_tags($two['username']) . '" readonly/></td>
                                        </tr>
                                  
										
							
										<tr>
										 <td><b>Rank</b></td>
											<td><select name="rank" class="form-control is-valid">
												<option value="' . strip_tags($two['rank']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current rank #' . strip_tags($two['rank']) . '</font></font></option>
												<option value="8"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Event Team #8</font></font></option>
												<option value="9"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Event Manager #9</font></font></option>
											</select></td>
										</tr>
										
										<tr>
										
										<td><b>Event ASE PIN</td>
                                            <td><input type="text" class="form-control input-sm" name="pin" value="' . strip_tags($two['pin']) . '" /></td>
                                        </tr>';
										}
										?>
                                    </table>
									
									<?php
									if ($two['username'] != "Justin" && $two['online'] == 0)
									{
										echo'
                                    <input type="submit" class="btn btn-primary btn-sm" value="Save Changes" name="update" style="float: right;background: #217332;margin-top: 2px;margin-left: 5px;height: 40px;font-variant-caps: all-small-caps;font-size: 15px;font-family: sans-serif;font-weight: bolder;border-radius: 3px;border-color: #0cde39;">';
									};
									
									?>
                                </form>
                            </div>
						</div>
                    <?php } } ?>
                </div>
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