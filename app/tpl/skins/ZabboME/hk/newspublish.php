					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'TMOD'"));
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
	<title>ZabboASE &bull; News</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
<script src="https://cdn.tiny.cloud/1/{tinykey}/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
	<!--Custom Font--> 
	
	
	<script>
    tinymce.init({
  selector: 'textarea',
  height: 500,
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
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li>Dashboard</li> <li>Moderation</li> <li class="active">Write News Article</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Write News Article</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Write News Article
						</div>
					<div class="panel-body">
<?php
if ($_SESSION['user']['rank'] >= 2) {
function secureStr($str) {
return mysql_real_escape_string(stripslashes(htmlspecialchars($str)));
}
if (isset($_POST['news_create'])) {
$title      = secureStr($_POST['title']);
$shortstory = secureStr($_POST['shortstory']);
$longstory  = secureStr($_POST['longstory']);
$topstory   = secureStr(mysql_real_escape_string($_POST['topstory']));
if (empty($title)) {
echo '<div class="alert alert-danger"><strong>Error:</strong> You have not entered a Title.</div>';
} else if (empty($shortstory)) {
echo '<div class="alert alert-danger"><strong>Error:</strong> You have not entered a Short Story.</div>';
} else if (empty($longstory)) {
echo '<div class="alert alert-danger"><strong>Error:</strong> You havent entered a Long Story.</div>';
} else {
$q         = "INSERT INTO cms_news (title, shortstory, longstory, published, image, author, look) VALUES('{$title}','{$shortstory}','" . htmlspecialchars_decode($longstory) . "'," . time() . ",'{$topstory}','" . $_SESSION['user']['username'] . "','" . $_SESSION['user']['look'] . "')";
mysql_query($q) or die(mysql_error());
echo '<div class="alert alert-success"><strong>Well done!</strong> News Article created.</div>';
header("refresh:0;url={url}/ase/index.php?url=news");
}
} else if ($_POST['topstory_view']) {
?>
									<center><img src="Top_Story_Images2/<?php
echo $_POST['topstory'];
?>"></center><br />
								<?php
}
?>
									<form method="post" class="form-horizontal row-fluid">
										<div class="control-group">
										<label class="control-label" for="basicinput">Title</label>
										<div class="controls">
											<input type="text" name="title" value="<?php
echo $_POST['title'];
?>" placeholder="News Title" class="form-control">
										</div>
										</div><br />
										<div class="control-group">
											<label class="control-label" for="basicinput">Short Story</label>
											<div class="controls">
												<input type="text" name="shortstory" value="<?php
echo $_POST['shortstory'];
?>" placeholder="Short Description" class="form-control">
											</div>
										</div>
										<br />
									
									<div class="control-group">
										<label class="control-label" for="inputNormal">Long Story</label>
											<textarea cols="80" id="textarea" rows="10" name="longstory" class="span8"></textarea>
									</div><br />
										<div class="control-group">
											<label class="control-label" for="basicinput">Author</label>
											<div class="controls">
												<input type="text" class="form-control" value="<?php
echo $_SESSION['user']['username'];
?>" disabled>
											</div><br />
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Select an Image</label>
												<div class="controls">
													<select class="form-control input-sm" onkeypress="previewTS(this.value);" onchange="previewTS(this.value);" name="topstory" id="topstory" style="font-size: 14px;">
													<?php
if ($handle = opendir('ts/')) {
while (false !== ($file = readdir($handle))) {
if ($file == '.' || $file == '..') {
continue;
}
echo '<option value="' . $file . '"';
if (isset($_POST['topstory']) && $_POST['topstory'] == $file) {
echo ' selected';
}
echo '>' . $file . '</option>';
}
}
?>
													</select>
												</div>
											<div id="ts-preview" style="margin-left: 20px; padding: 10px; float: left; text-align: center; vertical-align: middle;">
										</div><br>
										<div class="control-group">	
											<div class="controls">	
												<input type="submit" class="btn btn-small btn-primary" name="news_create">
											</div>
										</div>
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