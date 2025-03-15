<?php 
define('IN_INDEX', 1);
require_once 'global.php';

$core->handleCallHK($_GET['url']);

$template->write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">');
$template->write('<link rel="shortcut icon" href="/app/tpl/skins/ZabboME/hk/favicon.ico?<?php echo time() ?>" />');

$template->write('<html xmlns="http://www.w3.org/1999/xhtml">');

	$template->write('<head>');
		
		$template->css->getHK();
		
		$template->js->getHK();
		
	$template->write('</head>');
	
	$template->write('<body>');
		
		$template->html->getHK($engine->secure($_GET['url']));
		
	$template->write('</body>');
	
$template->write('</html>');

$template->outputTPL();

?>