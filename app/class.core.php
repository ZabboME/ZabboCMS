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

/*
=======================================================
=======================================================
**/

namespace Revolution;
if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
class core implements iCore
{
	
	
    final public function crawlerDetect($USER_AGENT){
        return preg_match('/bot|Discord|discord|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit/i', strtolower($USER_AGENT));
    }

    /*
	final public function CheckTheVote(){
		$currentUrl = $_SERVER['REQUEST_URI']; 
		if (strpos($currentUrl, '/index?novote') !== false || strpos($currentUrl, '/register') !== false || strpos($currentUrl, '/dailyreward') !== false || strpos($currentUrl, '/logout') !== false || strpos($currentUrl, '/vpn') !== false || strpos($currentUrl, '/rewardreminder') !== false) {
			return;
		}   
		if($this->crawlerDetect($_SERVER['HTTP_USER_AGENT'])) {
		} else {
			if(!isset($_SESSION['vote_expire']) || $_SESSION['vote_expire'] < time()) {
				unset($_SESSION['voted']);
				unset($_SESSION['redirect_url']);
			}
			if(!isset($_SESSION['voted'])) {
				header('Location: /findretros/vote.php?url='.urlencode($currentUrl).'&time='.time());
				exit();
			}
		}
	}*/

	final public function getOnline()
	{
		global $engine;
		return $engine->result("SELECT COUNT(*) as online_count FROM users WHERE online = '1';");
	}
	
	final public function getStatus()
	{
		global $engine;
		return $engine->result("SELECT status FROM server_status");
	}
	
	final public function SystemError($who, $txt)
	{
		die('<div style="position:fixed;top:80px;right:0;left:0;bottom:0;">
			<div style="padding: 30px 0px 30px 0px; margin: 0px 50px; background: #a82700; font-family: arial; font-size: 15px; color: #fff;text-shadow:0 1px 0 #000;position:absolute;left:0;right:0;top:95px;z-index:1;text-align:center;border:2px solid #000;border-radius:5px 5px 5px 5px;-moz-border-radius:5px 5px 5px 5px;">
				<b style="font-size:20px;">' . $who. '</b><br />
				' . $txt . '
				<BR><BR>If you\'re continuously getting this error, please report it <a href="https://discordapp.com/invite/a5Pxku4">here</a>.
			</div>
		</div>');
		exit;	
	}
	
	final public function handleCall($k)
	{
		global $users, $template, $_CONFIG;
		
		if($_CONFIG['hotel']['in_maint'] == false)
		{
			if(!isset($_SESSION['user']['id']))
			{
				switch($k)
				{
					case "index":
					case null:
					case "login":
					$users->login();
					break;
					
					case "register":
					$users->register();
					break;
					
					case "maintenance":
					case null:
				
					case "me":
					case "home":
					case "404":
					case "accountclient":
					case "client":
					case "beta":
					//case "community":
					case "accountdesign":
					case "support":
					case "submissions":
					case "disconnected":
					case "accountinfo":
					case "accountlogins":
					case "store":
					case "topstats":
					case "staff":
					case "accountprofilepage":
					case "apps":
					case "events":
					case "online":
					case "leaderboards":
					case "members":
    			    case "pictures":
					case "events":
					case "values":
					case "contact";
					case "ipbanned";
					case "noaccess";
					case "values";
					case "valuesteam";
					case "pinnew";
					case "pinverify";
					case "contact";
					case "vipleaderboards";
					case "account":
					case "news":
					case "storecurrency":
					case "storelevels":
					case "welcome":
					case "storeother":
					case "storevip":
					case "locked";

					header('Location: '.$_CONFIG['hotel']['url'].'/index');
					exit;
					break;
					
					default:
					//Nothing
					break;
				}
			}
			else
			{
				if($_SESSION['user']['ip_current'] != $_SERVER['REMOTE_ADDR'])
				{
					header('Location: '.$_CONFIG['hotel']['url'].'/logout');
				}
				
				if($k != "pinnew" && $k != "pinverify" && $k != "logout" && $k != "banned" && $k != "maintenance" && $k != "locked" && $k != "vpn")
				{

				    $secenabled = mysql_fetch_assoc(mysql_query("SELECT security_enabled FROM users WHERE id = '" . $_SESSION['user']['id'] . "'"));

					if($secenabled['security_enabled'] == 1) {

					    $users->checkSecure($_SESSION['user']['id']);
					}
 
				}

				if($k != "logout" && $k != "banned" && $k != "maintenance" && $k != "vpn" && $k != "locked")
				{
				    $VPNEnabled = mysql_fetch_assoc(mysql_query("SELECT value FROM cms_settings WHERE `key` = 'vpn_mode' LIMIT 1"));

					if($VPNEnabled['value'] == 1) {
					    $users->VPNCheck();
					}

				}
				
				switch($k)
				{
					case "index":
					case null:
						header('Location: '.$_CONFIG['hotel']['url'].'/me');
					exit;
					break;
					
					case "register":
					header('Location: '.$_CONFIG['hotel']['url'].'/me');
					exit;
					break;
					
					case "forgot":
						header('Location: '.$_CONFIG['hotel']['url'].'/me');
						exit;
					break;
					
					case "client":
						$users->createSSO($_SESSION['user']['id']);
						$users->updateUser($_SESSION['user']['id'], 'ip_current', $_SERVER['REMOTE_ADDR']);
						$template->setParams('sso', $users->getInfo($_SESSION['user']['id'], 'auth_ticket'));
					break;
					
					case "beta":
						$users->createSSO($_SESSION['user']['id']);
						$users->updateUser($_SESSION['user']['id'], 'ip_current', $_SERVER['REMOTE_ADDR']);
						$template->setParams('sso', $users->getInfo($_SESSION['user']['id'], 'auth_ticket'));
					break;
						
					case "help":
						$users->help();
					break;
				
					case "account":
						$users->updateAccount();
					break;
					
					default:
						//nothing
					break;
				}
			}
		}
		elseif($_GET['url'] != 'maintenance')
		{
			header('Location: '.$_CONFIG['hotel']['url'].'/maintenance');
			exit;
		}
	}

	final public function handleCallHK($k)
	{
		global $users, $engine, $_CONFIG, $ase;
		
		
		if($_SESSION["in_hk"] != true)
		{
			if(isset($_SESSION['user']['id']))
			{				
				if($k != 'index' && $k != 'login')
				{
					header("Location: ".$_CONFIG['hotel']['url']."/ase/login");
					exit;
				}
				
				if($k == 'login' || $k == 'index')
				{
					$users->loginHK();
				}
				else
				{
					header("Location:".$_CONFIG['hotel']['url']."/ase/login");
					exit;
				}
			}
			else
			{
				header("Location:".$_CONFIG['hotel']['url']."/index");
				exit;
			}
		}
		else
		{
			
				$user = mysql_fetch_assoc(mysql_query("SELECT rank FROM users WHERE id = '" . $_SESSION['user']['id'] . "'"));
				$real_rank = $user['rank'];
				$sess_rank = $_SESSION['user']['rank'];
				
				if($real_rank != $sess_rank)
				{
					$_SESSION['user']['rank'] = $real_rank;
					session_destroy();
					header('location:/index');
				}
				else
				{
					
					
				}
				
			if($k == 'login' || $k == 'index')
			{
				header("Location:".$_CONFIG['hotel']['url']."/ase/main");
				exit;
			}
			
			if(!isset($k))
			{
				header("Location:".$_CONFIG['hotel']['url']."/ase/main");
				exit;
			}
			else
			{
				
				if($k == 'balist')
				{
						
					if(isset($_GET["unban"]))
					{
						$user = $engine->secure($_GET["unban"]);
						$engine->query("DELETE FROM bans WHERE id = '" . $user . "'");
						header("Location: ".$_CONFIG['hotel']['url']."/ase/index.php?url=banlist");
						exit;
					}	
				}
			}
		}
	}
	
	final public function hashed($password)
	{
		return password_hash($password, PASSWORD_DEFAULT);
	}
	
	final public function pinhashed($pin)
	{
		return md5($pin);
	}
	
	final public function GetCurrentIP(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		
		return $ip;
	}

}

?>