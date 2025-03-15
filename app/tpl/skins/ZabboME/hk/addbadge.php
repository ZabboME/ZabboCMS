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
	<title>ZabboASE &bull; Add Badge</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Add Badges</li>
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
						Add Badge
						</div>
					<div class="panel-body">
<?php
										
									//require_once('/includes/MUS.php');
									//$Hamada = new MUS;
									// Upload Badge Code & update MUS.
												//$getFilter = mysql_query("SELECT * FROM `badge_definitions` WHERE `code` = '".$_POST['badge']."'");
												$filter = mysql_fetch_array($getFilter);
												$target_dir = "../game/c_images/album1584/";
												$target_file = $target_dir . basename($_FILES["badgeimage"]["name"]);
												$uploaded = 1;
												$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
												
												// if Submit button is clicked
												if($_POST['add_badge'])
												{											
												
												//Checks if file is an image
												$check = getimagesize($_FILES["badgeimage"]["tmp_name"]);
												if($check !== false) 
												{
													$uploaded = 1;
											    }
												
												// Check file size
												if ($_FILES["badgeimage"]["size"] > 42000) 
												{
    												echo '<div class="col-lg-12"><div class="alert bg-danger" role="alert">
															<strong>Error:</strong> Sorry your file is too large.
														 </div></div><meta http-equiv="refresh" content="1;url=addbadge"/>';
														 $uploaded = 0;
												}
												
												// Allow certain file formats
												if($imageFileType != "gif")
												{
													echo '					
													<div class="col-lg-12"><div class="alert bg-danger" role="alert">
														<strong>Error:</strong> Image should be .gif.
													</div></div>';
													$uploaded = 0;
												}
												
												// Check if $upload is set to 0 & badge name is not like code.
												if ($uploaded == 0) 
												{
													echo '<div class="col-lg-12"><div class="alert bg-danger" role="alert">
															<strong>Error:</strong> Sorry your file was not uploaded.
														 </div></div><meta http-equiv="refresh" content="1;url=addbadge"/>';
												}
												
												//Check if the badge code isn't = to image name.
												if  ($_POST['badge'] != basename($_FILES["badgeimage"]["name"], ".gif"))
												{
													echo '					
													<div class="col-lg-12"><div class="alert bg-danger" role="alert">
														<strong>Error:</strong> Your badge code was <b>'.$_POST['badge'].'</b> & image name was <b>' . basename($_FILES["badgeimage"]["name"], ".gif"). '</b>, they should match.
													</div></div><meta http-equiv="refresh" content="1;url=addbadge"/>';  
												}
												
												// Check if file already exists
												if (file_exists($target_file)) 
												{
													echo '<div class="col-lg-12"><div class="alert bg-danger" role="alert">
														<strong>Error:</strong> Image already exists.
														</div></div><meta http-equiv="refresh" content="1;url=addbadge"/>';
														$uploaded = 0;
												}
												
												//If badge is already in db
												if ($_POST['badge'] == $filter['code'])
												{
													echo '					
													<div class="col-lg-12"><div class="alert bg-danger" role="alert">
														<strong>Error:</strong> The badge <strong>'.$_POST['badge'].'</strong> already exists.
													</div></div><meta http-equiv="refresh" content="1;url=addbadge"/>';  						
												}
													if ($_POST['badge'] == basename($_FILES["badgeimage"]["name"], ".gif") && move_uploaded_file($_FILES["badgeimage"]["tmp_name"], $target_file) && $_POST['badge'] != $filter['code']) 
													{
														//mysql_query("INSERT INTO `badge_definitions` (code) VALUES('".$_POST['badge']."')") or die(mysql_error());
														//$Hamada->sendMUS("reload_badgedef");
														echo '<div class="col-lg-12"><div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>The badge ' . basename($_FILES["badgeimage"]["name"], ".gif"). '</b> is now added.</div></div><meta http-equiv="refresh" content="1;url=addbadge"/>';
													}
													else
													{
														echo '					
													<div class="col-lg-12"><div class="alert bg-danger" role="alert">
														<strong>Error:</strong> There was an error adding your badge.
													</div></div>'; 
													}
										}
									?>
							
								<form method="post" enctype="multipart/form-data" style="padding: 10px;">
											<input type="file" name="badgeimage" id="file"  multiple accept="image/gif, image/png"/>
											<br>
											<input type="text" name="badge" class="form-control" placeholder="Filename (Ex. HAM) without .gif" style="margin-bottom: 10px;width:300px;">
											<input type="submit" name="add_badge" class="btn btn-primary">
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