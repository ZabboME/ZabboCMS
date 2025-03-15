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
if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
class template implements iTemplate
{

public $tpl;

private $params = array();
	
	
final public function Initiate()
{
	global $_CONFIG, $users, $engine, $core, $template;
	$this->setParams('shortname', $_CONFIG['hotel']['shortname']);
	$this->setParams('longname', $_CONFIG['hotel']['longname']);
	$this->setParams('description', $_CONFIG['hotel']['description']);
	$this->setParams('url', $_CONFIG['hotel']['url']);
	$this->setParams('cdnurl', $_CONFIG['hotel']['cdnurl']);		
	$this->setParams('swfurl', $_CONFIG['hotel']['swfurl']);
	$this->setParams('external_vars', $_CONFIG['hotel']['external_vars']);
	$this->setParams('external_texts', $_CONFIG['hotel']['external_texts']);
	$this->setParams('sitekey', $_CONFIG['cloudflare']['sitekey']);
	$this->setParams('imager', $_CONFIG['avatar']['imager']);
	$this->setParams('tinykey', $_CONFIG['tinycloud']['tinykey']);
	$this->setParams('api', $_CONFIG['api']['link']);
	$this->setParams('swf_folder', $_CONFIG['hotel']['swf_folder']);;
	$this->setParams('furni_data', $_CONFIG['hotel']['furni_data']);
	$this->SetParams('product_data', $_CONFIG['hotel']['product_data']);		
	$this->setParams('online_text', $_CONFIG['hotel']['online_text']);
	$this->setParams('discord', $_CONFIG['social']['discord']);
	$this->setParams('discord_widget', $_CONFIG['social']['discord_widget']);
	$this->setParams('twitter', $_CONFIG['social']['twitter']);
	$this->setParams('reports_enabled', $_CONFIG['hotel']['reports_enabled']);
	$this->setParams('skin', $_CONFIG['template']['style']);
	$this->setParams('credits', number_format($_CONFIG['hotel']['credits']));
	$this->setParams('duckets', number_format($_CONFIG['hotel']['duckets']));
	$this->setParams('diamonds', number_format($_CONFIG['hotel']['diamonds']));
	$this->setParams('points', number_format($_CONFIG['hotel']['points']));
	$this->setParams('online', $core->getOnline());
	$this->setParams('status', $core->getStatus());
		
if($users->isLogged())
{	
	$this->setParams('username', $users->getInfo($_SESSION['user']['id'], 'username'));
	$this->setParams('id', $users->getInfo($_SESSION['user']['id'], 'id'));
	$this->setParams('rank', $users->getInfo($_SESSION['user']['id'], 'rank'));
	$this->setParams('motto', $users->getInfo($_SESSION['user']['id'], 'motto'));
	$this->setParams('email', $users->getInfo($_SESSION['user']['id'], 'mail'));
	$this->setParams('credits', $users->getInfo($_SESSION['user']['id'] ,'credits'));
	$this->setParams('duckets', $users->getInfo($_SESSION['user']['id'] ,'0', 'amount'));
	$this->setParams('figure', $users->getInfo($_SESSION['user']['id'], 'look'));
	$this->setParams('ip_current', $users->getInfo($_SESSION['user']['id'], 'ip_current'));
	$this->setParams('country', $users->getInfo($_SESSION['user']['id'], 'country'));
	$this->setParams('refferal', $users->getInfo($_SESSION['user']['id'], 'ref'));  
	$this->setParams('referralCount', $users->getInfo($_SESSION['user']['id'], 'referrals'));
	$this->setParams('lastSignedIn',  date('M j, Y H:i:s A', $users->getInfo($_SESSION['user']['id'],  'last_online')));
	$this->setParams('lastOn',  date('M j, Y', $users->getInfo($_SESSION['user']['id'],  'last_online'))); 			
	$this->setParams('registered', number_format($engine->result("SELECT COUNT(*) FROM `users`")));
	$this->setParams('bots', number_format($engine->result("SELECT COUNT(*) FROM `bots`")));
	$this->setParams('groups', number_format($engine->result("SELECT COUNT(*) FROM `groups`")));
	$this->setParams('rooms', number_format($engine->result("SELECT COUNT(*) FROM `rooms`")));
	$this->setParams('furni', number_format($engine->result("SELECT COUNT(*) FROM `furniture`")));
		
if($this->params['rank'] > 6)
		{
			$this->setParams('housekeeping', '<li><a href="ase/login">ArticleHK</a></li>'); 
		}
		else
		{
			$this->setParams('housekeeping', ''); 
		}
		
		if($_GET['url'] == 'me' || $_GET['url'] == 'account' || $_GET['url'] == 'home' || $_GET['url'] == 'settings' || $_GET['url'] == 'community' || $_GET['url'] == 'indexnow' || $_GET['url'] == 'index')
		{
			$template->form->getPageHome();				
		}
		
		if($_GET['url'] == 'news' || $_GET['url'] == 'articles' || $_GET['url'] == 'indexnow' || $_GET['url'] == 'index')
		{
			$template->form->getPageNews();
		}
	}
}
			
final public function setParams($key, $value)
	{	
		$this->params[$key] .= $value; 
	}

final public function filterParams($str)
	{
		foreach($this->params as $key => $value)
			{
				$str = str_ireplace('{' . $key . '}', $value, $str);
			}
	return $str;
}

final public function write($str)
	{
		$this->tpl .= $str;
	}

final public function outputTPL()
	{
		echo $this->filterParams($this->tpl);
		unset($this->tpl);
	}
}
?>