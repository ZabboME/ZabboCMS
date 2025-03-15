<?php
// This will check the access of each user when logged in to see if they're allowed during maintenance mode
// Coded By Justin
	$MaintenanceAccessCheck = mysql_query("SELECT * FROM users WHERE id = '" . $_SESSION['user']['id'] . "' AND access = '1' LIMIT 1");
	if(mysql_num_rows($MaintenanceAccessCheck) < 1)
	{
	header("Location: /maintenance");
	die();
	}
?>