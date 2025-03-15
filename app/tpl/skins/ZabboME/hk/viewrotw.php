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
	<title>ZabboASE &bull; View ROTW</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">View ROTW</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View ROTW</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary chat">
					<div class="panel-heading">
						Manage ROTW
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<table class="table table-striped">
<thead>
<tr>
	<th>ID</th>
	<th>User ID</th>
	<th>Username</th>
	<th>Feedback</th>
	<th>Entry</th>
	<th>Room ID & Name</th>
	<th>Agree Status</th>
	<th>Timestamp</th>
</tr>
</thead>
<tbody>
<?php
$id = intval($_GET['id']);
$getNews = mysql_query("SELECT * FROM users_submissions WHERE id = '$id'");
$i       = 1;
while ($n = mysql_fetch_assoc($getNews)) {
	$username = $n['user'];
$grabUser = mysql_query("SELECT * FROM users WHERE username = '" . $username . "' LIMIT 1");
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
	<td><span class="badge">' . $n['user'] . '</span></td>
	<td><span class="badge">' . $n['feedback'] . '</span></td>
	<td><span class="badge">' . $n['entry'] . '</span></td>
	<td><span class="badge">' . $n['room'] . '</span></td>
	<td><span class="badge">' . $n['agree'] . '</span></td>
	<td><span class="badge">' . date("F j, Y - g:i a", $n['timestamp']) . '</span></td> 
	</tr>';
$i++;
}
}
?>
</tbody>
</table>
</div>
</div>

										<?php
$id = intval($_GET['id']);
$existq = mysql_query("SELECT * FROM users_submissions WHERE id = '$id'") or die(mysql_error());
$exist = mysql_num_rows($existq);
$news  = mysql_fetch_array($existq);
if ($exist == 0) {
header('Location: ../me');
}
if (isset($_POST['submit'])) {
$reply  = mysql_real_escape_string($_POST['reply']);
$denied  = mysql_real_escape_string($_POST['denied']);
$reply_sent  = mysql_real_escape_string($_POST['reply_sent']);
if (empty($reply) OR empty($denied) OR empty($reply_sent)) {
echo '
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Error</strong> Please fill in all fields!
									</div>';
} else {
mysql_query("UPDATE users_submissions SET reply = '$reply' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE users_submissions SET denied = '$denied' WHERE id = '$id'") or die(mysql_error());
mysql_query("UPDATE users_submissions SET reply_sent = '$reply_sent' WHERE id = '$id'") or die(mysql_error());
header("Refresh:0");
echo '
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Success!</strong> This users ROTW submission entry was updated. Redirecting you back to the dashboard...
									</div>';
header("refresh:3;url=index.php?url=submissions");
}
}
?>
								<form name="post_news" method="post" action=" "> 
										
									<div class="control-group">
										<label class="control-label" for="inputNormal">Feedback?</label>
										<div class="controls">				
											<textarea name="feedback" id="feedback"><?php
											echo $news['feedback'];
											?></textarea>
												</div>
									</div><br />
									
									<div class="control-group">
										<label class="control-label" for="inputNormal">Respond To This Submissions Entry</label>
										<div class="controls">				
											<textarea name="reply" id="reply"><?php
											echo $news['reply'];
											?></textarea>
												</div>
									</div><br />
								<input name="denied" required="" type="hidden" value="1"></input>

									<div class="control-group">
										<label class="control-label" for="inputNormal">Set Reply Message Hidden Or Shown</label>
										<div class="controls">		
											<select name="reply_sent" >						
										<option value="<?php echo $news['reply_sent']; ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> You have the  number <?php echo $news['reply_sent']; ?> set!</font></font></option>
										<option value="1">#1 Hidden (No Reply)</option>
										<option value="2">#2 Shown (Shows Your Respond)</option>
										</select>
										</div>
									</div><br />
									
	<div class="control-group">
										<button type="submit" class="btn btn-small btn-primary" name="submit">Update Submission</button>
										<br/><br/>
									</div>


<script src="https://cdn.tiny.cloud/1/pj356i5qwby1cgxgt37457sffa3mvgdilx8aez110lbn2cb9/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
<!--Custom Font--> 
<script>
tinymce.init({
  selector: 'textarea',
  width: 750,
  height: 200,
  theme: 'modern',
  plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
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