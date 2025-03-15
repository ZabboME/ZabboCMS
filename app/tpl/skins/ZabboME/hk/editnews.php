					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'TMOD'"));
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
	<title>ZabboASE &bull; Edit Article</title>
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
				<li>Dashboard</li> <li>Moderation</li> <li class="active">Edit Article</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Article</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Edit News
						</div>
					<div class="panel-body">
<?php
$id = intval($_GET['id']);
$existq = mysql_query("SELECT * FROM cms_news WHERE id = '$id'") or die(mysql_error());
$exist = mysql_num_rows($existq);
$news  = mysql_fetch_array($existq);
if ($exist == 0) {
header('Location: ../me');
}
if (isset($_POST['submit'])) {
$title      = mysql_real_escape_string($_POST['title']);
$shortstory = mysql_real_escape_string($_POST['shortstory']);
$longstory  = mysql_real_escape_string($_POST['longstory']);
$topstory  = mysql_real_escape_string($_POST['topstory']);
$author  = mysql_real_escape_string($_POST['author']);
$userId     = $_SESSION['user']['username'];
$time       = time();
if (empty($title) OR empty($shortstory) OR empty($longstory)) {
echo '
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Error</strong> Please fill in all fields!
									</div>';
} else {
mysql_query("UPDATE cms_news SET title = '$title', shortstory = '$shortstory', longstory = '$longstory', image = '$topstory', author = '$author' WHERE id = '$id'") or die(mysql_error());
header("Refresh:0");
echo '
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Success!</strong> News article updated. Redirecting you back to the dashboard...
									</div>';
header("refresh:3;url=index.php?url=news");
}
}
?>
								<form name="post_news" method="post" action=" "> 			
									<div class="control-group">
										<label class="control-label" for="inputNormal">News Title</label>
										<div class="controls">				
											<input class="form-control" type="text" name="title" id="title" value="<?php
echo $news['title'];
?>" /> <br />
										</div>
									</div>				
									<div class="control-group">
										<label class="control-label" for="inputNormal">Short Story Title</label>
										<div class="controls">				
											<input type="text" name="shortstory" id="shortstory" value="<?php
echo $news['shortstory'];
?>" placeholder="Short Description" class="form-control">
										</div>
									</div>
									<br/>
									<div class="control-group">
										<label class="control-label" for="inputNormal">Long Story</label>
										<div class="controls">				
											<textarea name="longstory" id="textarea"><?php
echo $news['longstory'];
?></textarea><br />
									<div class="control-group">
										<label class="control-label" for="inputNormal">Author</label>
										<div class="controls">				
											<input type="text" class="form-control" name="author" value="<?php echo $news['author']; ?>">
										</div>
									</div><br />

<script src="https://cdn.tiny.cloud/1/pj356i5qwby1cgxgt37457sffa3mvgdilx8aez110lbn2cb9/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
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
											<script>
												// THIS IS REQUIRED JAVASCRIPT FOR THE NEWS EDITOR
												CKEDITOR.replace( 'textarea' );
											</script>
										</div>
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
										</div>
							</div>
									<p></p>
									<div class="control-group">
										<button type="submit" class="btn btn-small btn-primary" name="submit">Edit News</button>
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