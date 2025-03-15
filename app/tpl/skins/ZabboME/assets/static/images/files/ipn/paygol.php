<?php 

	define('IN_INDEX', 1);	
	require_once '../../core.php';
	
	//Call CloudFlare first, or dis is 'gna be gaaay! ;'D (Only needed for CloudFlare)
	if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])) { $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP']; }
	
	//check that the request comes from PayGol server
	if(!in_array($_SERVER['REMOTE_ADDR'], array('109.70.3.48', '109.70.3.146', '109.70.3.58'))) 
	{
	  header("Location: http://wabbo.me/404");
	}	

	//get the variables from PayGol system
	$message_id	= ($_GET['message_id']);
	$service_id	= ($_GET['service_id']);
	$shortcode	= ($_GET['shortcode']);
	$keyword	= ($_GET['keyword']);
	$message	= ($_GET['message']);
	$sender	 	= ($_GET['sender']);
	$operator	= ($_GET['operator']);
	$country	= ($_GET['country']);
	$custom		= filter($_GET['custom']);//In my case this is the username.
	$points		= ($_GET['points']);
	$price		= ($_GET['price']);
	$currency	= ($_GET['currency']);

	$get_id = mysql_result(mysql_query("SELECT id FROM users WHERE username = '".$custom."' LIMIT 1"), 0);
	mysql_query("UPDATE users SET vip_points = vip_points + '".$points."' WHERE username = '".$custom."'") or die(mysql_error());
	mysql_query("INSERT INTO `user_tokens` (username,currency,type) VALUES ('".$custom."', '".$points."', 'paygol')") or die(mysql_error());
	mus("updatepoints", $get_id);
	
?>