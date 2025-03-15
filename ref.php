<?php
define('IN_INDEX', 1);
$_GET['url'] = 'index';
require_once('global.php');
if(isset($_GET['id'])){
	$uID = filter($_GET['id']); 
	if($uID != $_GET['id']){
		die('Stop being shady...');
	}
	if($engine->num_rows('SELECT null FROM users WHERE id = \''.$engine->secure($uID).'\'') >= 1){
		
		$ips = $engine->num_rows('SELECT null FROM users WHERE ip_last = \''.$engine->secure($_SERVER['REMOTE_ADDR']).'\'');
		$ips2 = $engine->num_rows('SELECT null FROM cms_referrals WHERE ip = \''.$engine->secure($_SERVER['REMOTE_ADDR']).'\'');
		
		if($ips >= 1 || $ips2 >= 1){
			header('Location: /');
			exit();
		}else{
			setcookie('ref', $uID, time()+3600);
			$engine->query('INSERT INTO cms_referrals (user, ip) VALUES (\''.$engine->fetch_assoc('SELECT username FROM users WHERE id = \''.$engine->secure($uID).'\'')['username'].'\', \''.$engine->secure($_SERVER['REMOTE_ADDR']).'\')');
			header('Location: /index?novote');
			exit();
		}
		
	}else{
		header('Location: /');
		exit();
	}
}else{
		header('Location: /');
		exit();
	}
?>