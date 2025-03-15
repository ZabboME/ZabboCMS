<?php

	define('IN_INDEX', 1);	
	require_once '../../core.php';
	require_once('paypal.class.php');

	$p = new paypal_class; 
	$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';

	$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	if(empty($_GET['action'])) $_GET['action'] = 'process';  
	switch ($_GET['action']) {
		case 'process':
		if(!isset($_POST['name']))
		{
			echo '';
			die;  
		}   
		if(!isset($_POST['credits']))
		{
			echo '';
			die;  
		}

		$swag = filter($_POST['name']);
		$dBox = filter($_POST['credits']);

		if($dBox == 50) {
			$price = '5';
		}
		elseif($dBox == 100) {
			$price = '10';
		}
		elseif($dBox == 250) {
			$price = '20';
		}
		elseif($dBox == 500) {
			$price = '30';
		}
		else {
			echo '';
			die;
		}
		$p->add_field('business', 'thomassurji@gmail.com');
		$p->add_field('return', '%www%'); //The success URL
		$p->add_field('custom', $swag);
		$p->add_field('tokens', $dBox);
		$p->add_field('cancel_return', '%www%'); // The "canceled" URL
		$p->add_field('notify_url', $this_script.'?action=ipn'); //The IPN URL, the URL pointing to THIS page.
		$p->add_field('item_number', $dBox);
		$p->add_field('item_name', '%hotel_name% Credits');
		$p->add_field('amount', '$'.$price.'.00');
		$p->submit_paypal_post();
		break;

		case 'ipn':
		if ($p->validate_ipn()) { 
				$get_id = mysql_result(mysql_query("SELECT id FROM users WHERE username = '".$p->ipn_data['custom']."' LIMIT 1"), 0);
				mysql_query("UPDATE users SET credits = credits + '".$p->ipn_data['item_number']."' WHERE id = '".$get_id."' LIMIT 1") or die(mysql_error());
				mysql_query("INSERT INTO user_tokens (username, currency, type, amount) VALUES ('".$p->ipn_data['custom']."', '".$p->ipn_data['item_number']."', 'paypal', '".$p->ipn_data['amount']."')")  or die(mysql_error());
				mus("updatepoints", $get_id);
		  }
		  break;
		}     

?>