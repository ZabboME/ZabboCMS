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
interface iUsers
{

	public function nameTaken($username);

	public function userValidation($username, $password);

	public function addUser($username, $password, $email, $motto, $credits, $rank, $figure, $gender, $security_enabled); 
	
	public function isLogged();
	
	public function deleteUser($k);
	
	public function updateUser($k, $key, $value);
	
	public function cacheUser($id);
	
	public function getInfo($k, $key);
	
	public function getID($username);
	
	public function getUsername($k);
	
	public function validName($username);

	public function validEmail($email);
			
	public function register();

	public function login();
	
	public function help();
	
	public function updateAccount();
	
	public function turnOn($k);
	
	public function setInfo($key, $value);
	
	public function createSSO($k);


}
?>