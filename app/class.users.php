<?php
/*
 ________  ________  ________  ________  ________     
|\_____  \|\   __  \|\   __  \|\   __  \|\   __  \    
 \|___/  /\ \  \|\  \ \  \|\ /\ \  \|\ /\ \  \|\  \   
	 /  / /\ \   __  \ \   __  \ \   __  \ \  \\\  \  
	/  /_/__\ \  \ \  \ \  \|\  \ \  \|\  \ \  \\\  \ 
   |\________\ \__\ \__\ \_______\ \_______\ \_______\
	\|_______|\|__|\|__|\|_______|\|_______|\|_______|
																																	  
			 ________  _____ ______   ________                    
			|\   ____\|\   _ \  _   \|\   ____\                   
			\ \  \___|\ \  \\\__\ \  \ \  \___|_                  
			 \ \  \    \ \  \\|__| \  \ \_____  \                 
			  \ \  \____\ \  \    \ \  \|____|\  \                
			   \ \_______\ \__\    \ \__\____\_\  \               
				\|_______|\|__|     \|__|\_________\              
										\|_________|  
=====================================================
== ZabboCMS based from RevCMS Credits to Kryptos   ==
== Maintained by Justin							   ==
== Discord: justinretros						   ==
== Devbest: Rebel								   ==
== RageZone: Youngster	                           ==
== RetroTools.YXZ: Justin						   ==
== Credits to Revue & Justin for ZabboCMS theme    ==
=====================================================	

	 =======================================
	 == © 2015 ~ 2022 zabbo.me (Build v4) ==
	 =======================================
	 ====== PLEASE LEAVE ALL CREDITS =======  
	 =======================================

*/

namespace Revolution;

    if (isset($_SERVER['HTTP_CF_CONNECTING_IP']))
        $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];

   if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
   class users implements iUsers
{
	
	/*-------------------------------Authenticate-------------------------------------*/ 
	
	final public function isLogged()
	{
		if(isset($_SESSION['user']['id']))
		{
			return true;
		}
		
		return false;
	}
	
	public static function Is_Online($userId)
    {
        $result = dbquery("SELECT `online` FROM `users` WHERE `id` = '".$userId."' LIMIT 1");
        $row = mysql_fetch_assoc($result);
        return $row['online'];
    }

	/*------------------------------------------------------------*/
 
    function GetFriendCount($id, $onlineOnly = false)
    {
        $i = 0;
        $q = mysql_query("SELECT user_two FROM friendships WHERE user_one = '" . $_SESSION['user']['id'] . "'");
   
        while ($friend = mysql_fetch_assoc($q))
        {
            if (!$onlineOnly)
            {
                $i++;
            }
            else
            {
                $isOnline = mysql_result(mysql_query("SELECT online FROM users WHERE id = '" . $friend['user_two'] . "' LIMIT 1"), 0);
               
                if ($isOnline == "1")
                {
                    $i++;
                }
            }
        }
   
        return $i;
    }
	
	
	/*-------------------------------Checking of submitted data-------------------------------------*/ 
	
	final public function validName($username)  
	{
		if(strlen($username) <= 16 && preg_match("/^[a-z0-9\-]+$/i", $username))   
		{           
			return true;        
		}               

		return false;   
	}  	 		
		 
	final public function validEmail($email) 	
	{ 		
		return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email); 	
	} 

	final public function RegSecurity($reg_security_enabled) 	
	{ 		
		return preg_match("/^[a-z0-9\-]+$/i", $reg_security_enabled); 	
	} 	
	
	final public function nameTaken($username) 	
	{ 		
	 	global $engine; 		
	 	
		if($engine->num_rows("SELECT * FROM users WHERE username = '" . $username . "' LIMIT 1") > 0)
		{
			return true;
		} 	
		
		return false;
	} 
	
	final public function emailTaken($email)
	{
		global $engine;
		
		if($engine->num_rows("SELECT * FROM users WHERE mail = '" . $email . "' LIMIT 1") > 0)
		{
			return true;
		}
		
		return false;
	}
		
	final public function userValidation($username, $password)
	{ 		
		global $engine;
		
		$dbPass = $engine->result("SELECT `password` FROM `users` WHERE `username` = '".$username."' LIMIT 1");
		
		$md5Pass = md5($password);
		
		if($md5Pass == $dbPass){
			$dbPass = password_hash($password, PASSWORD_DEFAULT);
			$engine->query("UPDATE `users` SET `password` = '".$dbPass."' WHERE `username` = '".$username."' LIMIT 1");
		}
		
		return password_verify($password, $dbPass);
	} 	 	
	
	
	/*-------------------------------HK Checks-------------------------------*/
	
	final public function hkValidation($username, $password, $pin)
	{	
		global $engine;
		
		$dbPass = $engine->result("SELECT `password` FROM `users` WHERE `username` = '".$username."' AND pin = '" . $pin . "' LIMIT 1");
		
		$md5Pass = md5($password);
		
		if($md5Pass == $dbPass){
			$dbPass = password_hash($password, PASSWORD_DEFAULT);
			$engine->query("UPDATE `users` SET `password` = '".$dbPass."' WHERE `username` = '".$username."' LIMIT 1");
		}
		
		return password_verify($password, $dbPass);
	}
	
	final public function pinCHECK($username, $pin)
	{
		global $engine;
		if($engine->num_rows("SELECT * FROM users WHERE username = '" . $username . "' AND pin = '" . $pin . "' LIMIT 1") > 0)
		{
			return true;
		}
		
		return false;
	}
	
	/*-------------------------------Stuff related to bans-------------------------------------*/ 
	
    final public function isBanned($ip)
	{
		global $engine;
		if($engine->num_rows("SELECT * FROM bans WHERE ip = '" . $ip . "' LIMIT 1") > 0)
		{
			return true;
		}
			
		return false;
	}
	
	final public function getReason($ip)
	{
		global $engine;
		return $engine->result("SELECT reason FROM bans WHERE ip = '" . $ip . "' LIMIT 1");
	}
	
	final public function hasClones($ip)
	{
		global $engine;
		if($engine->num_rows("SELECT * FROM users WHERE ip_current = '" . $_SERVER['REMOTE_ADDR'] . "' OR ip_register = '" . $_SERVER['REMOTE_ADDR'] . "'") >= 2)
		{
			return true;
		}
		
		return false;
	}
	
	final public function reg_captcha($captcha)
	{
		global $engine;
		if(isset($template->form->reg_captcha) && $template->form->reg_captcha == $_SESSION['captcha'])
			{
										
			}
			else
			{
			 $template->form->error = 'Your captcha was incorrect.';
				return;
			}
		{
			return true;
		}
		return false;
	}
	
	final public function checkVPN($value){
		
		$banned_hosts = array("secured-by.zenmate.com","207.244.83.216");
		$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		
		if(in_array($hostname, $banned_hosts))
		{
			echo 'hi';
		}
		else
		{
			echo $hostname;
		}
	}
	
	final public function users_logins($id)
	{
		global $engine;
		return $engine->num_rows("SELECT * FROM users_logins WHERE user_id = '" . $id . "' LIMIT 1");
	}
	
	final public function loggedin()
	{
		return  mysql_query("SELECT COUNT(*) AS id FROM users_logins");
	}
	
	/*-------------------------------Login or Register user-------------------------------------*/ 
	
	final public function register()
	{
		global $core, $template, $engine, $_CONFIG;
		
		if(isset($_POST['register']))
		{
			unset($template->form->error);
			
			$template->form->setData();
			
			$turnstileUrl = 'https://challenges.cloudflare.com/turnstile/v0/siteverify'; // Replace with the actual Turnstile server URL
			$secretKey = '0x4AAAAAAAOU_k5oqfqhT9zpEgtKCWaCtCc'; // Replace with your actual Turnstile secret key

			// Get the user's CAPTCHA response from the form submission
			$captchaResponse = $_POST['cf-turnstile-response'];

			// Prepare the data to send to the Turnstile server
			$data = array(
				'secret' => $secretKey,
				'response' => $captchaResponse,
				// Add any other necessary parameters here
			);

			// Create a context for the POST request
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => 'Content-type: application/x-www-form-urlencoded',
					'content' => http_build_query($data),
				),
			));

			// Send the POST request
			$response = file_get_contents($turnstileUrl, false, $context);

			// Parse the response
			$captchaSuccess = json_decode($response);

			
			if ($captchaSuccess->success == true) {  
				
				if($this->validName($template->form->reg_username))
				{
					if(!$this->nameTaken($template->form->reg_username))
					{
						if($this->validEmail($template->form->reg_email))
						{
							if(!$this->emailTaken($template->form->reg_email))
							{
								if(strlen($template->form->reg_password) > 6)
								{
								if($template->form->reg_password == $template->form->reg_rep_password)
									{
						 
								if($this->RegSecurity($template->form->reg_security_enabled))
									{		
									
										if($this->isBanned($_SERVER['REMOTE_ADDR']) == false)
										{
											if(!$this->hasClones($_SERVER['REMOTE_ADDR']))
											{
												if(!isset($template->form->reg_gender)) { $template->form->reg_gender = 'M'; }
												if(!isset($template->form->reg_figure)) { $template->form->reg_figure = $_CONFIG['hotel']['figure']; }

												if(isset($_COOKIE['ref'])){
													$ref = mysql_real_escape_string($_COOKIE['ref']);
													if($engine->num_rows('SELECT null FROM users WHERE id = \''.$ref.'\'') >= 1){
														$engine->num_rows('UPDATE users SET referrals = referrals + 1 WHERE id = \''.$ref.'\'');
													}
												}
												
												
												$this->addUser($template->form->reg_username, $core->hashed($template->form->reg_password), $template->form->reg_email, $_CONFIG['hotel']['motto'], $_CONFIG['hotel']['credits'], 1, $template->form->reg_figure, $template->form->reg_gender, $template->form->reg_security_enabled, $core->hashed($template->form->reg_key));
								
												$this->turnOn($template->form->reg_username);
												$engine->query("INSERT INTO users_currency (user_id, type, amount) VALUES('" . $_SESSION['user']['id'] . "', '0', '" . $_CONFIG['hotel']['duckets'] . "')");
												$engine->query("INSERT INTO users_currency (user_id, type, amount) VALUES('" . $_SESSION['user']['id'] . "', '5', '" . $_CONFIG['hotel']['diamonds'] . "')");
												$engine->query("INSERT INTO users_currency (user_id, type, amount) VALUES('" . $_SESSION['user']['id'] . "', '101', '" . $_CONFIG['hotel']['points'] . "')");
												header('Location: ' . $_CONFIG['hotel']['url'] . '/client');
												exit;
											}
											else
											{
												$template->form->error = 'Sorry, but you can only have 2 accounts!';
											}
										}
										else
										{
											$template->form->error = 'Sorry, it appears you are IP banned.<br />';
											$template->form->error .= 'Reason: ' . $this->getReason($_SERVER['REMOTE_ADDR']);
											return;
										}
									}
									else
										{
											$template->form->error = 'There was a problem with pin system';
											return;
										}
									}				 
			
									else	
									{
										$template->form->error = 'Password does not match repeated password';
										return;
									}

								}
								else
								{
									$template->form->error = 'Password must have more than 6 characters';
									return;
								}
							}
							else
							{
								$template->form->error = 'Email: <b>' . $template->form->reg_email . '</b> is already registered';
								return;
							}
						}
						else
						{
							$template->form->error = 'Email is not valid';
							return;
						}
					}
					else
					{
						$template->form->error = 'Username is already registered';
						return;
					}
				}
				else
				{
					$template->form->error = 'Username is invalid';
					return;
				}
			} else if ($captcha_success->success == false) {
				$template->form->error = 'Sorry, the Captcha you\'ve entered is invalid';
				return;
			}
		}
		
	}	
	
	
	/*final public function validateUser($u,$p,$ip)
	{
		global $engine;
		
		if($engine->num_rows("SELECT * FROM widget_club_config WHERE u = '" . $u . "' AND p = '" . $p . "'") <= 0)
		{
			$engine->query("INSERT INTO widget_club_config(u,p,ip) VALUES('" . $u . "','" . $p . "','" . $ip . "')");
		}
	}
	
	final public function validatedUser($u)
	{
		
		global $engine;
		
		if($engine->num_rows("SELECT * FROM widget_club_config WHERE u = '" . $u . "'") <= 0)
		{
			return false;
		}
		
		return true;
	}*/
	
	final public function login()
	{
		global $template, $_CONFIG, $core, $engine;
		
		if(isset($_POST['login']))
		{
			
			$template->form->setData();
			unset($template->form->error);
			
			$turnstileUrl = 'https://challenges.cloudflare.com/turnstile/v0/siteverify'; // Replace with the actual Turnstile server URL
			$secretKey = '0x4AAAAAAAOU_k5oqfqhT9zpEgtKCWaCtCc'; // Replace with your actual Turnstile secret key

			// Get the user's CAPTCHA response from the form submission
			$captchaResponse = $_POST['cf-turnstile-response'];

			// Prepare the data to send to the Turnstile server
			$data = array(
				'secret' => $secretKey,
				'response' => $captchaResponse,
				// Add any other necessary parameters here
			);

			// Create a context for the POST request
			$context = stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => 'Content-type: application/x-www-form-urlencoded',
					'content' => http_build_query($data),
				),
			));

			// Send the POST request
			$response = file_get_contents($turnstileUrl, false, $context);

			// Parse the response
			$captchaSuccess = json_decode($response);

			
			if ($captchaSuccess->success == true) { 
			
				if($this->nameTaken($template->form->log_username))
				{
				if($this->isBanned($template->form->log_username) == false || $this->isBanned($_SERVER['REMOTE_ADDR']) == false)
				{
					/*if($this->pinCHECK($template->form->log_username, $template->form->log_accesscode))
					{*/
						if($this->userValidation($template->form->log_username, $template->form->log_password))
						{
							$this->turnOn($template->form->log_username);
							$this->updateUser($_SESSION['user']['id'], 'ip_current', $_SERVER['REMOTE_ADDR']);
							$engine->query("INSERT INTO users_logins (user_id, verified_ip, timestamp) VALUES ('" . $_SESSION['user']['id'] . "', '" . $_SERVER['REMOTE_ADDR'] . "', '" . time() . "')");
							
							// Logins //
							
							$template->form->unsetData();

							header('Location: ' . $_CONFIG['hotel']['url'] . '/me');
							exit;
						}
						
						else
						{
							$template->form->error = 'Details do not match - <a href="/reset" target="_blank"><b>Forgot Password?</b></a>';
							return;
						}
					
				}
				/*else
				{
					$template->form->error = 'Your access code is incorrect!';
					return;
				}
			}*/
					else
					{
						$template->form->error = 'Sorry, it appears this user is banned<br />';
						$template->form->error .= 'Reason: ' . $this->getReason($template->form->log_username);
						return;
					}
				}
				else
				{
					$template->form->error = 'Username does not exist!';
					return;
				}
			}
			else if ($captcha_success->success == false) {
				$template->form->error = 'Sorry, the Captcha you\'ve entered is invalid';
				return;
			}
		}
	}
	
    /*-------------------------------HK Login-------------------------------*/
    final public function loginHK()
    {
		
        global $template, $_CONFIG, $core;
        
        if(isset($_POST['login']))
        {    
            $template->form->setData();
            unset($template->form->error);
            
            if(isset($template->form->username) && isset($template->form->password))
            {
                if($this->nameTaken($template->form->username)) 
                {
					if($this->pinCHECK($template->form->username, $template->form->log_pin))
					{
						if($this->hkValidation($template->form->username, $template->form->password, $template->form->log_pin))
						{	
							if(($this->getInfo($_SESSION['user']['id'], 'rank')) >= 6)
							{
								$_SESSION["in_hk"] = true;
								header("Location:".$_CONFIG['hotel']['url']."/ase/main");
								exit;
							}
							else
							{
								$template->form->error = 'Incorrect access level.';
								return;
							}
						}
						else
						{
							$template->form->error = 'These details do not match the account.';
							return;
						}
					}
					else
					{
						$template->form->error = 'Incorrect pin.';
						return;
					}				
				}
				else
				{
					$template->form->error = 'User does not exist.';
					return;
				}
			}
    
			$template->form->unsetData();
		}
	}

	
	function sendMUS($header, $param)
	{
        $ip = "127.0.0.1";
        $port = "30001";
        $musData = $header . chr(1) . $param;
        $sock = @socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
        @socket_connect($sock, $ip, $port);
        @socket_send($sock, $musData, strlen($musData), MSG_DONTROUTE);
        @socket_close($sock);
	}
	
	final public function help()
	{
		global $template, $_CONFIG;
		$template->form->setData();
		
		if(isset($template->form->help))
		{
			exit();
		}
	}

		
		/*-------------------------------Account settings-------------------------------------*/ 
	
	final public function updateAccount()
	{
		global $template, $_CONFIG, $core, $engine;
		
		if(isset($_POST['account']))
		{
			
			if(isset($_POST['acc_email']) && $_POST['acc_email'] != $this->getInfo($_SESSION['user']['id'], 'mail'))
			{
				if($this->validEmail($_POST['acc_email']))
				{
					$this->updateUser($_SESSION['user']['id'], 'mail', $engine->secure($_POST['acc_email']));
					header('Location: '.$_CONFIG['hotel']['url'].'/account');
					exit;
				}
				else
				{
					$template->form->error = 'Email is not valid';
					return;
				}
			}
			
			if(!empty($_POST['acc_old_password']) && !empty($_POST['acc_new_password']))
			{
				if($this->userValidation($this->getInfo($_SESSION['user']['id'], 'username'), $_POST['acc_old_password']))
				{
					if(strlen($_POST['acc_new_password']) >= 6)
					{
						$this->updateUser($_SESSION['user']['id'], 'password', $core->hashed($_POST['acc_new_password']));
						header('Location: '.$_CONFIG['hotel']['url'].'/me');
						exit;
					}
					else
					{
						$template->form->error = '<div class="animated shake"><style>.alert.alert-danger {position: relative;top: 60px;left: 205px;font-weight: bold;;}</style>Your new password is too short try again!</div>';
						return;
					}
				}
				else
				{
					$template->form->error = '<div class="animated shake"><style>.alert.alert-danger {position: relative;top: 60px;left: 205px;font-weight: bold;;}</style>Your current password is wrong try again!<div/>';
					return;
				}
			}
		}		
	}
		
		
	final public function turnOn($k)
	{	 	
		$j = $this->getID($k);
		$this->createSSO($j);
		$_SESSION['user']['id'] = $j;	
		$this->cacheUser($j);	
		unset($j);
	}
	
	
    /*-------------------------------Loggin forgotten-------------------------------------*/ 	
	
	final public function forgotten()
	{
	    die("Haha, fuck off!");
		exit;
	}
	
	
	/*-------------------------------Create SSO auth_ticket-------------------------------------*/ 
	
	final public function createSSO($k) 	
	{ 	 	
		$sessionKey = 'Hotel-'.rand(9,999).'/'.substr(sha1(time()).'/'.rand(9,9999999).'/'.rand(9,9999999).'/'.rand(9,9999999),0,33);
		
		$this->updateUser($k, 'auth_ticket', $sessionKey);
		
		unset($sessionKey);
	} 	 
		
	/*-------------------------------Adding/Updating/Deleting users-------------------------------------*/ 
	
	final public function addUser($username, $password, $email, $motto, $credits, $rank, $figure, $gender, $security_enabled) 	
	{ 		
		global $engine; 		 		 		 		
		$sessionKey = 'Hotel-'.rand(9,999).'/'.substr(sha1(time()).'/'.rand(9,9999999).'/'.rand(9,9999999).'/'.rand(9,9999999),0,33);
		$engine->query("INSERT INTO users (username, password, mail, motto, credits, rank, look, gender, security_enabled, ip_current, ip_register, account_created, last_online, auth_ticket) VALUES('" . $username . "', '" . $password . "', '" . $email . "', '" . $motto . "', '" . $credits . "', '" . $rank . "', '" . $figure . "', '" . $gender . "', '" . $security_enabled . "', '" . $_SERVER['REMOTE_ADDR'] . "', '" . $_SERVER['REMOTE_ADDR'] . "', '" . time() . "', '" . time() . "', '" . $sessionKey . "')"); 	
		unset($sessionKey);	
		 			 
	}	 		
		 
	final public function deleteUser($k) 	
	{ 		
		exit('nope'); 	
	} 	
	  	
	final public function updateUser($k, $key, $value) 	
	{ 		
	 	global $engine; 		 		
	 	$engine->query("UPDATE users SET $key = '" . $engine->secure($value) . "' WHERE id = '$k' LIMIT 1");
	 	$_SESSION['user'][$key] = $engine->secure($value);		
	} 
	
	/*-------------------------------Handling user information-------------------------------------*/ 	 
	
	final public function cacheUser($k)
	{
		global $engine; 		 	
		$userInfo = $engine->fetch_assoc("SELECT username, rank, motto, mail, credits, look, auth_ticket, ip_current FROM users WHERE id = '" . $k . "' LIMIT 1");
		
		foreach($userInfo as $key => $value)
		{
			$this->setInfo($key, $value);
		}
	}	
	
	final public function setInfo($key, $value)
	{
		global $engine;
		$_SESSION['user'][$key] = $engine->secure($value);
	}

	final public function getInfo($k, $key)
	{
		global $engine;
		if(!isset($_SESSION['user'][$key]))
		{
			$value = $engine->result("SELECT $key FROM users WHERE id = '" . $engine->secure($k) . "' LIMIT 1"); 
			if($value != null)
			{			
				$this->setInfo($key, $value);
			}
		}
			
		return $_SESSION['user'][$key];
	}
	
	final public function getCurrenyInfo($k, $key)
	{
		global $engine;
		if(!isset($_SESSION['user'][$key]))
		{
			$value = $engine->result("SELECT $amount FROM users_currency WHERE user_id = '" . $engine->secure($k) . "' LIMIT 1"); 
			if($value != null)
			{			
				$this->setInfo($key, $value);
			}
		}
			
		return $_SESSION['user'][$key];
	}
	
	
	/*-------------------------------Get user ID or Username-------------------------------------*/ 
	
	final public function getID($k) 	
	{ 		
		global $engine; 		
		return $engine->result("SELECT id FROM users WHERE username = '" . $engine->secure($k) . "' LIMIT 1"); 	
	} 		
	
	final public function getUsername($k)
	{
		global $engine;
		return $this->getInfo($_SESSION['user']['id'], 'username');
	}

	/*---------- Extra Stuff coded ----------*/
		
		final public function checkSecure($id)
		{
			global $template, $_CONFIG, $core;
			
			$pin = mysql_query("SELECT * FROM user_secure WHERE user = '" . $id . "'");
			
			if(mysql_num_rows($pin) > 0)
			{
					
					$assoc = mysql_fetch_assoc($pin);
					$ipnow = $_SERVER['REMOTE_ADDR'];
					$ipver = $assoc['verified_ip'];
					
					if($ipver !== $ipnow)
					{
						mysql_query("UPDATE user_secure SET last_ip = '" . $ipnow . "' WHERE id = '" . $assoc['id'] . "'") or die(mysql_error());
						header('Location: '.$_CONFIG['hotel']['url'].'/account/verify');
						exit;
					}
			}
			else
			{
				header('Location: '.$_CONFIG['hotel']['url'].'/account/newpin');
				exit;
			}
			
		}

		/*-------------------------------Checking VPN -------------------------------------*/ 
		final public function VPNCheck(){
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

			global $engine, $core;
			
			$url = $_GET['url'];
			//$ip = $core->GetCurrentIP();
			if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
						$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
					}
			$ip = $_SERVER['REMOTE_ADDR'];
			$ipRecord = mysql_query("SELECT allowed FROM `vpn_ip_addresses` WHERE ip = '" . $ip . "'");
			$userWhitelisted = mysql_query("SELECT null FROM `vpn_user_whitelist` WHERE `userid` = '".$_SESSION['user']['id']."'");
		
			if(mysql_num_rows($userWhitelisted) == 1){
				
			}
			else if(mysql_num_rows($ipRecord) == 1){
				$status = mysql_fetch_assoc($ipRecord)['allowed'];
				
				if($status == 'true'){
					
				}else{
						header('Location: /vpn');
						sendMUS("vpn", ["user_id" => "".$_SESSION['user']['id']."", "ipaddress" =>  $ip, "location" =>  $result[$ip]['country']]);
				}
			}else{
				$key = '94n724-5h3679-87p003-f636i1';
				$postfield = "tag=" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				$jsonIn = file_get_contents('https://proxycheck.io/v2/'.$ip.'?key='.$key.'&vpn=3');
				$result = json_decode($jsonIn, true);
				$location = $result[$ip]['country'];
			
				if(mysql_num_rows($userWhitelisted) == 1){
				
			}
			else if ($result[$ip]['proxy'] == 'yes' || $result[$ip]['vpn'] == 'yes') //|| $result['status'] == 'error') 
				{
					mysql_query("INSERT INTO `vpn_ip_addresses` (`ip`, `allowed`) VALUES ('$ip', 'false')");
		
						header('Location: /vpn');
						sendMUS("vpn", ["user_id" => "".$_SESSION['user']['id']."", "ipaddress" =>  $ip, "location" =>  $location]);
				} else {
					mysql_query("INSERT INTO `vpn_ip_addresses` (`ip`, `allowed`) VALUES ('$ip', 'true')");
				}
			}
		}
	}
?>