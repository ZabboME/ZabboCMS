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
	<title>ZabboASE &bull; Rare Values</title>
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

<script type="text/javascript">
function previewTS(el)
{
	document.getElementById('ts-preview').innerHTML = '<img src="{swfurl}/dcr/hof_furni/icons/' + el + '?1" />';
}
function suggestSEO(el)
{
	var suggested = el;
	suggested = suggested.toLowerCase();
	suggested = suggested.replace(/^\s+/, ''); 
	suggested = suggested.replace(/\s+$/, '');
	suggested = suggested.replace(/[^a-z 0-9]+/g, '');
	while (suggested.indexOf(' ') > -1)
	{
		suggested = suggested.replace(' ', '-');
	}
	document.getElementById('url').value = suggested;
}
</script>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Rare Values</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Rare Values</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
			
			<!-- Icon Adder start -->		
			
		<div class="panel panel-danger">
				<!--	<div class="panel-heading">
						Rare Values ICON Adder
						</div>
					<div class="panel-body">
<?php
										
									//require_once('/includes/MUS.php');
									//$Hamada = new MUS;
									// Upload Badge Code & update MUS.
												//$getFilter = mysql_query("SELECT * FROM `badge_definitions` WHERE `code` = '".$_POST['badge']."'");
												$filter = mysql_fetch_array($getFilter);
												$target_dir = "../ase/icons/";
												//$target_file = $target_dir . basename($_FILES["badgeimage"]["name"]);
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
												if($imageFileType != "png")
												{
													echo '					
													<div class="col-lg-12"><div class="alert bg-danger" role="alert">
														<strong>Error:</strong> Image should be .png.
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
												if  ($_POST['badge'] != basename($_FILES["badgeimage"]["name"], ".png"))
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
														mysql_query("INSERT INTO `badge_definitions` (code) VALUES('".$_POST['badge']."')") or die(mysql_error());
														$Hamada->sendMUS("reload_badgedef");
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
											<input type="file" name="badgeimage" id="file"/>
											<br>
											<input type="submit" name="add_badge" value="Upload ICON!" class="btn btn-primary">
								</form>
					</div>
					</div>	-->


<!-- Icon Adder end -->		
			
			
			
			<div class="panel panel-primary chat">
<div class="panel-heading">
	Current Rare Values
	<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
<div class="panel-body">
 <table class="table table-striped">
<thead>
<tr>
<th>Rare Icon</th>
<th>Rare Name</th>
<th>Credits</th>
<th>Duckets</th>
<th>Diamonds</th>
<th>Points</th>
<th>Editor</th>
<th>Timestamp</th>
<th>Controls</th>
</tr>
</thead>
<tbody>
<?php
$getValues = mysql_query("SELECT * FROM cms_values ORDER BY id DESC") or die(mysql_error());
while ($values = mysql_fetch_assoc($getValues)) {
$type = $values['category'];
$removeUnderscore = str_replace("_", " ", $values['name']); // Remove any underscores and replace with a space
$removeGif        = str_replace(".gif", " ", $removeUnderscore); // Remove .gif from end of file name
$rarename         = ucwords(strtolower($removeGif)); // Make first letter of variable a capital. e.g "nelly gold" to "Nelly Gold"
$raretype         = ucwords(strtolower($type)); // Make first letter of variable a capital. e.g "nelly gold" to "Nelly Gold"
echo '
											<tr>
												<td><img src="' . $values['item_icon'] . '"></td>
												<td>' . $values['item_name'] . '  [Set Total: ' . number_format($values['item_total']) . ']</td>
												<td>' . number_format($values['item_credits']) . '</td>
												<td>' . number_format($values['item_duckets']) . '</td>
												<td>' . number_format($values['item_diamonds']) . '</td>
												<td>' . number_format($values['item_points']) . '</td>
												<td>' . $values['added_by'] . '</td>
												<td>' . date("F j, Y - g:i a", $values['added_date']) . '</td>
												<td><a href="index.php?url=editvalue&id=' . $values['id'] . '" class="btn btn-info btn-xs">Edit</a>&nbsp; <a href="index.php?url=values&delete&id=' . $values['id'] . '" class="btn btn-danger btn-xs">Delete</a></td>
											</tr>';
}
?>
</body>
</table>
</div>
</div>

<br>
	<div class="panel panel-primary">
					<div class="panel-heading">
						Rare Value Item Adder
						</div>
					<div class="panel-body">
										<?php
if (isset($_GET['delete'])) {
mysql_query("DELETE FROM cms_values WHERE id = '" . $_GET['id'] . "'");
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Well done!</strong> Rare Value Deleted</div>';
echo ("<meta http-equiv=\"refresh\" content=\"0;url={url}/ase/index.php?url=values\" />");
}
?>
							<?php
if ($_SESSION['user']['rank'] >= 7) {
function secureStr($str) {
return mysql_real_escape_string(stripslashes(htmlspecialchars($str)));
}
if (isset($_POST['rare_submit'])) {
$item_name = secureStr($_POST['item_name']);
$item_credits  = secureStr($_POST['item_credits']);
$item_duckets  = secureStr($_POST['item_duckets']);
$item_diamonds  = secureStr($_POST['item_diamonds']);
$item_points  = secureStr($_POST['item_points']);
$item_icon = secureStr($_POST['item_icon']);
$item_total  = secureStr($_POST['item_total']);
$added_by = secureStr($_POST['added_by']);
$added_date = secureStr($_POST['added_date']);
$item_category  = secureStr($_POST['item_category']);
$userLook = secureStr($_POST['user_look']);
$userID = secureStr($_POST['user_id']);

if (empty($item_name) && empty($item_total) && empty($item_icon) && empty($item_category)) {
echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Error:</strong> You have not entered all required for the rare item, make sure to put 0 in cunrrecy if it doesn\'t have a cost!</div>';
} else {
$q = "INSERT INTO cms_values (item_name, item_credits, item_duckets, item_diamonds, item_points, item_icon, item_total, item_category, user_look, user_id, added_by, added_date) VALUES('{$item_name}','{$item_credits}','{$item_duckets}','{$item_diamonds}','{$item_points}','{swfurl}/dcr/hof_furni/icons/{$item_icon}','{$item_total}','{$item_category}','" . $_SESSION['user']['look'] . "','" . $_SESSION['user']['id'] . "','" . $_SESSION['user']['username'] . "','" . time() . "')";
mysql_query($q) or die(mysql_error());
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Well done!</strong> Rare Value Added!</div>';
echo ("<meta http-equiv=\"refresh\" content=\"0;url={url}/ase/index.php?url=values\" />");

}
} else if ($_POST['rare_view']) {
?>
								
							<?php
}
?>
								<form method="post">
								
Item Name <input type="text" class="form-control form-xs" placeholder="Item Name In Game/Client..."  name="item_name" required="" /><br>						
Credits Amount <input type="text" class="form-control form-xs" placeholder="Item Worth In Credits, Put 0 If No Price..." name="item_credits" required="" /><br>
Duckets Amount <input type="text" class="form-control form-xs" placeholder="Item Worth In Duckets, Put 0 If No Price..." name="item_duckets"required="" /><br>
Diamonds Amount <input type="text" class="form-control form-xs" placeholder="Item Worth In Dimaonds, Put 0 If No Price..." name="item_diamonds" required=""/><br>
Points Amount <input type="text" class="form-control form-xs" placeholder="Item Worth In Points, Put 0 If No Price..." name="item_points" required=""/><br>
Total LTD Set Amount <input type="text" class="form-control form-xs" placeholder="Total Number Of Items In LTD Set..." name="item_total" required=""/><br>
<td><b>Item Category</b></td>
<td><select name="item_category" class="form-control is-valid">
	<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Please Select Category </font></font></option>
	<option value="No Category"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No Category</font></font></option>
	<option value="Limited Rare"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Limited Rare</font></font></option>
	<option value="Limited Point"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Limited Point</font></font></option>
</select></td>
</tr>
<br>
				
Select Rare Icon
<select name="item_icon" class="form-control input-sm" style="width: 95%" data-placeholder="Rare Icon" onkeypress="previewTS(this.value);" onchange="previewTS(this.value);" style="font-size: 14px;">
													<?php
if ($handle = opendir('../game/dcr/hof_furni/icons/')) {
while (false !== ($file = readdir($handle))) {
if ($file == '.' || $file == '..') {
continue;
}
echo '<option value="' . $file . '"';
if (isset($_POST['item_icon']) && $_POST['item_icon'] == $file) {
echo ' selected';
}
echo '>' . $file . '</option>';
}
}
?>
			</select>
<label id="ts-preview" name="item_icon" style="margin-left: 20px; padding: 10px;text-align: center; vertical-align: middle;"></label>

<br>
			<input type="submit" class="btn btn-success btn-xs" value="Add Rare" name="rare_submit">
								</form>
								<?php
} else {
die('Go away please.');
}
?>
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