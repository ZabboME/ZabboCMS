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
	<title>ZabboASE &bull; Close Support Ticket</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Finish Support Ticket</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Finish Support Ticket</h1>
			</div>
		</div><!--/.row-->

	

										<?php
$id = intval($_GET['id']);
$existq = mysql_query("SELECT * FROM cms_user_reports WHERE id = '$id'") or die(mysql_error());

$exist = mysql_num_rows($existq);
$news  = mysql_fetch_array($existq);
if ($exist == 0) {
header('Location: ../me');
}
if (isset($_POST['submit'])) {
$status  = mysql_real_escape_string($_POST['status']);

if (empty($status)) {
echo '
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Error</strong> Please fill in all fields!
									</div>';
} else {
mysql_query("UPDATE cms_user_reports SET status = '$status' WHERE id = '$id'") or die(mysql_error());
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

		<form name="post_news" method="post" action=" "> 
									<div class="control-group">
										<label class="control-label" for="inputNormal">Contact Ticket Status</label>
										<div class="controls">		
											<select name="status" id="status" value="<?php echo $news['status'];?>">
										<option value="2">Close Ticket</option>
										</select>
											</div>
									</div><br />
									
								
	<div class="control-group">
										<button type="submit" class="btn btn-small btn-primary" name="submit">Close Support Ticket</button>
										<a href="/ase/contact" type="return" class="btn btn-small btn-primary" name="return">Go Back!</a>
									</div>
</form>

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