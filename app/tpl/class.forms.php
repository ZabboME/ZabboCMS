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
==  Credits to Revue & Justin for ZabboCMS theme   ==
=====================================================	

	 =======================================
	 == © 2015 ~ 2022 zabbo.me (Build v4) ==
	 =======================================
	 ====== PLEASE LEAVE ALL CREDITS =======  
	 =======================================

*/

namespace Revolution;
if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
class forms implements iForms
{

	public $error;

	final public function setData()
	{
		global $engine;
		foreach($_POST as $key => $value)
		{
			if($value != null)
			{
				$this->$key = $engine->secure($value);
			}
			else
			{
				$this->error = 'Please fill in all fields';
				return;
			}
		}
	
	}
	
	final public function unsetData()
	{
		global $template;
		foreach($this as $key => $value)
		{
			unset($this->$key);	
		}	
	}
	
	final public function writeData($key)
	{
		global $template;
		echo $this->$key;
	}
	
	final public function outputError()
	{
		global $template;
		if(isset($this->error))
		{
			echo "<div id='message'> " . $this->error . " </div>";
		}
	}
		
	function getRankColour($r)
	{
		switch ($r)
		{
			case 7:
				return('color:#FF6600;font-weight:bold;');
			break;
			
			case 6:
				return('color:#0099CC;font-weight:bold;');
			break;
			
			case 5:
				return('color:#663399;font-weight:bold;');
			break;
			
			case 4:
				return('color:#00CC33;font-weight:bold;');
			break;
			
			case 3:
				return('color:#088A08;font-weight:bold;');
			break;
			
			case 2:
				return('color:#FF0000;font-weight:bold;');
			break;
			
			default:
				return('');
			break;
		}
	}
	
	final public function getChangelog()
	{
		global $template, $engine;
		
		$result = mysql_query("SELECT * FROM cms_changelog ORDER BY id DESC");
		$a = 1;
		
		while ($log = mysql_fetch_array($result))
		{
			$template->setParams("log-". $a, '&raquo; '. $log["change"] . '<br>');
			$a++;
		}
	}
	
	final public function getPageNews()
	{
		global $template, $engine, $_CONFIG;
		
			if(!isset($_GET['id']) || !is_numeric($_GET['id']))
			{
				$_GET['id'] = 1;
			}
				$result = mysql_query("SELECT title, id FROM cms_news WHERE id != '" . $engine->secure($_GET['id']) . "' ORDER BY id DESC");

				
				while($news1 = mysql_fetch_array($result))
				{
				if($news1['id'] == $_GET['id'])
					{
						$template->setParams('newsList', '<li class="newslist">'.$news1['title'].'&raquo</li>');
					}
					else
					{
						$template->setParams('newsList', '<li class="newslist"><a href="'.$_CONFIG['hotel']['url'].'/index.php?url=news&id='.$news1['id'].'">'.$news1['title'].'&raquo</a></li>');
					}
				}

				$news = $engine->fetch_assoc("SELECT title, shortstory, longstory, author, published, image FROM cms_news WHERE id = '" . $engine->secure($_GET['id']) . "' LIMIT 1");
				$userData = $engine->fetch_assoc("SELECT id, username, look FROM users WHERE username = '" . $news['author'] . "' LIMIT 1");
				
				$template->setParams('newsTitle', $news['title']);
				$template->setParams('newsContent', $news['longstory']);
				$template->setParams('newsAuthor', $userData['username']);
				$template->setParams('newsAuthorLook', $userData['look']);
				$template->setParams('newsDate', date("d-m-y H:h", $news['published']));
				$template->setParams('newsSummary', $news['shortstory']);
				$template->setParams('newsIMG', $news['image']);
				unset($result);
				unset($news1);
				unset($news);
	}

	final public function getPageHome()
	{
		global $template, $engine;
		$a = 1;
		$data = mysql_query("SELECT title, id, published, shortstory, image, author FROM cms_news ORDER BY id DESC");
        while($news = mysql_fetch_array($data, MYSQL_ASSOC)){

       	{

			$news12 =  $engine->fetch_assoc("SELECT title, shortstory, longstory, author, published, image FROM cms_news WHERE author = '" . $news['author'] . "' LIMIT 1");
			$userData = $engine->fetch_assoc("SELECT id, username, look FROM users WHERE username = '" . $news['author'] . "' LIMIT 1");

            $template->setParams('newsTitle-' . $a, $news['title']);
            $template->setParams('newsID-' . $a, $news['id']);
			$template->setParams('newsDate-' . $a, date("d-m-y", $news['published']));
            $template->setParams('newsCaption-' . $a, $news['shortstory']);
            $template->setParams('newsIMG-' . $a, $news['image']);
			$template->setParams('newsAuthor-' . $a, $userData['username']);
			$template->setParams('newsLook-' . $a, $userData['look']);


        	$a++;
        }
        }
        unset($news);
        unset($data);
	}
}

?>