					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'amb'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
							<script type="text/javascript">
function previewTS(el)
{
	document.getElementById('ts-preview').innerHTML = '<img src="{url}/ase/ts/' + el + '" />';
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; View Support Ticket</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">View Support Ticket</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View Support Ticket</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary chat">
					<div class="panel-heading">
						View Support Ticket
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
<thead>
<tr>
	<th>ID</th>
	<th>User ID</th>
	<th>Username</th>
	<th>IP Address</th>
	<th>Anonymously</th>
	<th>Timestamp</th>
</tr>
</thead>
<tbody>
<?php
$id = intval($_GET['id']);
$getNews = mysql_query("SELECT * FROM cms_user_reports WHERE id = '$id'");
$i       = 1;
while ($n = mysql_fetch_assoc($getNews)) {
	$user_id = $n['user_id'];
$grabUser = mysql_query("SELECT * FROM users WHERE id = '" . $user_id . "' LIMIT 1");
while ($userData = mysql_fetch_assoc($grabUser)) {
$highlight = '#fff';
if ($i <= 3) {
$highlight = '#CEE3F6';
} else if ($i <= 5) {
$highlight = '#EFFBFB';
}
echo '<tr>
	<td><span class="badge">' . $n['id'] . '</span></td>
	<td><span class="badge">' . $n['user_id'] . '</span></td>
	<td><span class="badge">' . $n['reporter_username'] . '</span></td>
	<td><span class="badge">' . $n['submitted_ip'] . '</span></td>
	<td><span class="badge">' . $n['report_anon'] . '</span></td>
	<td><span class="badge">' . date("F j, Y - g:i a", $n['submitted_on']) . '</span></td> 
	</tr>';
$i++;
}
}
?>
</tbody>
</table>
<?php 
							$uId = $_SESSION['user']['id'];
							$getReports = mysql_query("SELECT * FROM cms_user_reports WHERE user_id = " . $user_id . " ORDER BY id DESC");
							if(mysql_num_rows($getReports) == 0)
								echo 'You have no submitted reports';
							else
							{
								while ($showReports = mysql_fetch_array($getReports)) {
									switch($showReports['report_type'])
									{
										case 1:
											echo '<td><span class="badge">&raquo Report against staff member <b>' . filter($showReports['report_staff']) . '</b></span></td><br><br>';
											break;
											
										case 2:
											echo '<td><span class="badge">&raquo Submitted a report regarding furniture</span></td><br><br>';
											break;
										
										case 3:
											echo '<td><span class="badge">&raquo Submitted a comment/suggestion</span></td><br><br>';
											break;
											
										case 4:
											echo '<td><span class="badge">&raquo Submitted a compliment to <b>' . filter($showReports['report_staff']) . '</b></span></td><br><br>';
									}
								}
							}
						?>
</div>
</div>

										<?php
$id = intval($_GET['id']);
$existq = mysql_query("SELECT * FROM cms_user_reports WHERE id = '$id'") or die(mysql_error());
$existq1 = mysql_query("SELECT * FROM users WHERE id = ".$_SESSION['user']['id']."") or die(mysql_error());

$exist = mysql_num_rows($existq);
$news1  = mysql_fetch_array($existq1);
$news  = mysql_fetch_array($existq);
if ($exist == 0) {
header('Location: ../me');
}
if (isset($_POST['submit'])) {
$status  = mysql_real_escape_string($_POST['status']);
$handled_by  = mysql_real_escape_string($_POST['handled_by']);

if (empty($status)) {
echo '
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Error</strong> Please fill in all fields!
									</div>';
} else {
mysql_query("UPDATE cms_user_reports SET status = '$status' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE cms_user_reports SET handled_by = '$handled_by' WHERE id = '$id'") or die(mysql_error());
header("Refresh:0");
echo '
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Success!</strong>This users Contact Ticket was updated. Redirecting you back to the dashboard...
									</div>';
header("refresh:3;url=index.php?url=contact");
}
}
?>

		
									<div class="control-group">
										<label class="control-label" for="inputNormal">Reported/Suggested, Compliment, Furni Asking To Be Fixed</label>
										<div class="controls">				
											<textarea name="report_info" id="report_info"><?php
											echo $news['report_info'];
											?></textarea>
												</div>
									</div><br />
								<form name="post_news" method="post" action=" "> 
										
									<div class="control-group">
										<label class="control-label" for="inputNormal">Extra Report Info</label>
										<div class="controls">				
											<textarea name="report_extra" id="report_extra"><?php
											echo $news['report_extra'];
											?></textarea>
												</div>
									</div><br />
									<div class="control-group">
										<label class="control-label" for="inputNormal">Contact Ticket Status</label>
										<div class="controls">		
											<select name="status" id="status" value="<?php echo $news['status'];?>">
										<option value="1">Handling Ticket</option>
										</select>
											</div>
									</div><br />
									
									<div class="control-group">
										<label class="control-label" for="inputNormal">Staff Handled By</label>
										<div class="controls">				
											<input name="handled_by" id="handled_by" value="<?php
											echo $news1['username'];
											?>" ></input>
												</div>
									</div><br />
	<div class="control-group">
										<button type="submit" class="btn btn-small btn-primary" name="submit">Handling Support Ticket</button>
										<a href="/ase/contact" type="return" class="btn btn-small btn-primary" name="return">Go Back!</a>
									</div>
<br>
<br></div></div>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        width: 750,
        height: 200,
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "css/content.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    }); 
</script>
											<script>
												// THIS IS REQUIRED JAVASCRIPT FOR THE NEWS EDITOR
												CKEDITOR.replace( 'editor1' );
											</script>
										</div>
									</div>
									
									
						
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