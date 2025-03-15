<?php
function sendMUS($key, $data = []) {
    // Connect to the Rcon port.
    $socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        //Attempt to send the data to the server.
        if ( @socket_connect($socket, "127.0.0.1", "3001")) {
            $message = json_encode([
                'key' => $key,
                'data' => $data
            ]);

            @socket_send($socket, $message, strlen($message), MSG_DONTROUTE);
            @socket_close($socket);
        }
}

function filter($var)
	{
		return stripslashes(htmlspecialchars($var));
	}

require_once('paypal.class.php');
$p = new paypal_class;
$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';

$this_script = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if (empty($_GET['action'])) $_GET['action'] = 'process';

switch ($_GET['action']) {

   case 'process':

   if(!isset($_POST['username']) || !isset($_POST['amount']))
   {
	 echo 'Username and amount needed for purchase!';
	 die;
   }

$name = filter($_POST['username']);

switch($_POST['amount'])
{
	case '1':
	$cost = '3.00'; // Cost
	$wut = '£3 Store Credit'; // Name of Package
	break;
	
	case '2':
	$cost = '5.00'; // Cost
	$wut = '£5 Store Credit'; // Name of Package
	break;
	
	case '3':
	$cost = '7.00'; // Cost
	$wut = '£7 Store Credit'; // Name of Package
	break;

	case '4':
	$cost = '11.00'; // Cost
	$wut = '£11 Store Credit'; // Name of Package
	break;
	
	case '5':
	$cost = '12.00'; // Cost
	$wut = '£12 Store Credit'; // Name of Package
	break;
	
	case '6':
	$cost = '15.00'; // Cost
	$wut = '£15 Store Credit'; // Name of Package
	break;
	
	case '7':
	$cost = '20.00'; // Cost
	$wut = '£20 Store Credit'; // Name of Package
	break;
	
	case '8':
	$cost = '25.00'; // Cost
	$wut = '£25 Store Credit'; // Name of Package
	break;
	
	case '9':
	$cost = '50.00'; // Cost
	$wut = '£50 Store Credit'; // Name of Package
	break;
	
	case '10':
	$cost = '75.00'; // Cost
	$wut = '£75 Store Credit'; // Name of Package
	break;
	
}

      $p->add_field('business', 'yourpaypalemail@gmail.com');
      $p->add_field('return', 'https://'.$_SERVER['HTTP_HOST']);
	  $p->add_field('custom', $name);
      $p->add_field('cancel_return', 'https://'.$_SERVER['HTTP_HOST']);
      $p->add_field('notify_url', $this_script.'?action=ipn');
	  $p->add_field('item_number', filter($_POST['amount']));
      $p->add_field('item_name', $wut);
      $p->add_field('amount', $cost);
	  $p->add_field('currency_code', 'GBP');

      $p->submit_paypal_post();
      break;

   case 'ipn':

      if ($p->validate_ipn())
	  {
		$host = "127.0.0.1";
		$username = "root"; //IIS user
		$password = "yourpass"; // Database pasword
		$dbname = "hotel";  // Database Name

		$connect = mysql_connect($host, $username, $password) or die(mysql_error());
		mysql_select_db($dbname, $connect) or die("Could not connect to database, error: ".mysql_error());

		$user = mysql_query("SELECT * FROM users WHERE username = '".$p->ipn_data['custom']."'");
		$u = mysql_fetch_array($user);

		switch($p->ipn_data['item_number'])
		{
			case '1':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£3 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£3 Store Credit', shopbalance = shopbalance + 3 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£3 Store Credit", "packageprice" =>  3]);		
            break;
			
			case '2':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£5 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£5 Store Credit', shopbalance = shopbalance + 5 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£5 Store Credit", "packageprice" =>  5]);		
            break;
			
			case '3':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£7 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£7 Store Credit', shopbalance = shopbalance + 7 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£7 Store Credit", "packageprice" =>  7]);		
            break;
			
			case '4':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£11 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£11 Store Credit', shopbalance = shopbalance + 11 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£11 Store Credit", "packageprice" =>  11]);		
            break;
			
			case '5':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£12 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£12 Store Credit', shopbalance = shopbalance + 12 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£12 Store Credit", "packageprice" =>  12]);		
            break;
			
			case '6':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£15 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£15 Store Credit', shopbalance = shopbalance + 15 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£15 Store Credit", "packageprice" =>  15]);		
            break;
			
			case '7':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£20 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£20 Store Credit', shopbalance = shopbalance + 20 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£20 Store Credit", "packageprice" =>  20]);		
            break;
			
			case '8':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£25 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£25 Store Credit', shopbalance = shopbalance + 25 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£25 Store Credit", "packageprice" =>  25]);		
            break;
			
			case '9':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£50 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£50 Store Credit', shopbalance = shopbalance + 50 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£50 Store Credit", "packageprice" =>  50]);		
            break;
			
			case '10':
			mysql_query("INSERT INTO paypal (username, amount, cash) VALUES ('".$p->ipn_data['custom']."', 'Store Credit Topup', '£75 GBP')");
			mysql_query("UPDATE users SET shopbought = '1', shoppackage = '£75 Store Credit', shopbalance = shopbalance + 75 WHERE username = '".$p->ipn_data['custom']."' LIMIT 1");
			sendMUS("paypal", ["user_id" => "".$u['id']."", "packagename" =>  "£75 Store Credit", "packageprice" =>  75]);		
            break;
		
		}
	}
	  break;
}
?>
