<?php
$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
if(mysql_num_rows($home) != 1)
{
$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
}
$user = mysql_fetch_assoc($home);
?>

<title>{shortname} ~ Login Attempts</title>

<?php
$navigatorID = 1;
require_once ('/includes/header.php');
require_once ('/includes/navigator.php');
?>

<div class="row">
<div class="col-md-12">
</div>
</div>
<div class="row">
<div class="col-md-3">
<div class="list-group">
<a href="/account/info" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Information </font></font>
</a>

<a href="/account/client" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Client Settings </font></font></a>

<a href="/account/profilepage" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Profile Page Settings </font></font></a>

<a href="/account" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Password & Email Settings </font></font></a>

<a class="list-group-item active">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Login Attempts </font></font></a>
<a href="/account/design" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Website & Design Options </font></font></a> </div>
</div>
<style>
.label-primary1 {
background-color: #ffffff4f;
}
</style>
<div class="col-md-9">
<div class="card">
<?php

$userList12324 = mysql_query("SELECT user_id FROM users_logins WHERE user_id = '".$user['id']."'");

?>		
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Login Attempts <b class="label label-primary1">15</b>  Most Recent</font></font></h1>
<div class="body" style='height:450px;overflow-y:scroll;margin-right:6px;margin-top:5px;'>

<table class="table table-striped">

	<tbody>
	<?php
		$result = mysql_query("SELECT * FROM users_logins WHERE user_id = '" . filter($user['id']) . "' ORDER BY id DESC LIMIT 15");
		
	if (mysql_num_rows($result) == 0)
		echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>You do not have any recent login attempts yet!</b></center></div>';
		else
			echo '
					<thead>
					<tr>
						<th>Flag</th>
						<th>Location</th>
						<th>Username</th>
						<th>IP Address</th>
						<th>Login Information</th>
					</tr>
				</thead>
				';
		{

		while ($row = mysql_fetch_array($result)) {
		$ip          = $row['verified_ip'];
		$xml         = simplexml_load_file("http://ip-api.com/xml/$ip");
		$CountryName = $xml->country;
		$CountryCode = $xml->countryCode;
		echo '
						<tr>
							<td><span class="badge"><img src="{cdnurl}/images/login_flags/' . $CountryCode . '.gif" /></span></td>
							<td><span class="badge">' . $CountryName . '</span></td>
							<td><span class="badge">{username}</span></td>
								<td><span class="badge">' . $row['verified_ip'] . '</span></td>
								<td>
								<span class="label label-warning1">Successfully logged in</span>
								<span class="badge">' . relativeTime($row['timestamp']) . '</span>
								</td>
						</tr>
		';
			}
		}
	?>
									
									</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include_once('/includes/footer.php'); ?>
</body>
</html>
