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
class css implements iCSS
{
	
	private $css;
	

	final public function get()
	{
		global $_CONFIG;
		foreach (glob("app/tpl/skins/".$_CONFIG['template']['style']."/styles/*.css") as $filename)
		{
 			$this->css = '<link rel="stylesheet" type="text/css" href="'.$filename.'"/>';
   
    		$this->setCSS();
		}
	}
	
	final public function getHK()
	{
		global $_CONFIG;
		foreach (glob("../app/tpl/skins/".$_CONFIG['template']['style']."/hk/styles/*.css") as $filename)
		{
 			$this->css = '<link rel="stylesheet" type="text/css" href="'.$filename.'"/>';
   
    		$this->setCSS();
		}
	}
	
	final public function setCSS()
	{
		global $template;
		$template->tpl .= $this->css;
		unset($this->css);
	}


}
?>