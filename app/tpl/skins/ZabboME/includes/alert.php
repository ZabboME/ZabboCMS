<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);
?>
<?php
		$result2 = mysql_query("SELECT * FROM users WHERE id = '" . filter($user['id']) . "' AND website_alert = ''" . filter($user['0']) . "'' ORDER BY id DESC LIMIT 1000");

		if (mysql_num_rows($result2) == 1)
		echo '';
		else
			echo '

				';
			{
		while ($row2 = mysql_fetch_array($result2)) {
		echo '
		 
<div class="alert alert-success" style="text-align: justify;background: #3682a5;">
<div class="col-1 alert-icon-col">
<center>We\'re undergoing revamping and making updates overall please be patient until we fully return.</center>
<button type="button" class="close" data-dismiss="website_alert" name="website_alert" value="1" style="float: right;font-family: Ubuntu;position: relative;margin-top: -22px;font-size: 20px;z-index: 1;color: white;font-weight: bolder;" data-toggle="tooltip" data-placement="top" data-original-title="Delete Notification Permanently!"><a href="{url}/dismiss3" style="text-decoration: none;">x</a></button>
</div></div>
<style>
.alert.alert-success {
    background: #27ae60;
    color: #FFF;
}
table {
    width: 100%;
    font-size: 14px;
    background-color: #b3b3b300;
}
</style>
			
		
			';
		}
	}
?>