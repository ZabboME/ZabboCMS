<?php
 if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
 
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
*
  __  __        _____  ____  _         _____      _   _   _
 |  \/  |      / ____|/ __ \| |       / ____|    | | | | (_)
 | \  / |_   _| (___ | |  | | |      | (___   ___| |_| |_ _ _ __   __ _ ___
 | |\/| | | | |\___ \| |  | | |       \___ \ / _ \ __| __| | '_ \ / _` / __|
 | |  | | |_| |____) | |__| | |____   ____) |  __/ |_| |_| | | | | (_| \__ \
 |_|  |_|\__, |_____/ \___\_\______| |_____/ \___|\__|\__|_|_| |_|\__, |___/
          __/ |                                                    __/ |
         |___/                                                    |___/    

*/

## Hotel MySQL Settings Also known as Database Settings. ##
## Type of connection: It must be connect, or pconnect: if you want a persistent connection. ##

$_CONFIG['mysql']['connection_type'] = 'pconnect';
$_CONFIG['mysql']['hostname'] = 'localhost';
$_CONFIG['mysql']['username'] = 'root';
$_CONFIG['mysql']['password'] = 'yourpass';
$_CONFIG['mysql']['database'] = 'yourdb';
$_CONFIG['mysql']['port'] = '3306';
/*

  _    _       _       _    _____      _   _   _
 | |  | |     | |     | |  / ____|    | | | | (_)
 | |__| | ___ | |_ ___| | | (___   ___| |_| |_ _ _ __   __ _ ___
 |  __  |/ _ \| __/ _ \ |  \___ \ / _ \ __| __| | '_ \ / _` / __|
 | |  | | (_) | ||  __/ |  ____) |  __/ |_| |_| | | | | (_| \__ \
 |_|  |_|\___/ \__\___|_| |_____/ \___|\__|\__|_|_| |_|\__, |___/
                                                        __/ |
                                                       |___/    
													  
*/

## Hotel URL Settings & Basic Settings & Register Currency & Maintenance Settings. ##
$_CONFIG['hotel']['url'] = 'https://demo.habzone.lol'; /*/ All URL's do not end with an ---> [ / ] /*/
$_CONFIG['hotel']['cdnurl'] = 'https://demo.habzone.lol/app/tpl/skins/ZabboME/assets'; /*/ All URL's do not end with an ---> [ / ] This is where you edit the web-build. /*/
$_CONFIG['hotel']['shortname'] = 'Zabbo'; /*/ Your hotels shortname example 'Short Hotel Name' /*/
$_CONFIG['hotel']['longname'] = 'Zabbo Hotel'; /*/ Your hotels shortname example 'Long Hotel Name' /*/
$_CONFIG['hotel']['description'] = 'Make friends, join the fun, get noticed!'; /*/ Tell users about your hotel. /*/
$_CONFIG['hotel']['in_maint'] = false; /*/ This is your hotels maintenance settings, ( 'True' equals hotel offline etc... ) /*/
$_CONFIG['hotel']['reports_enabled'] = true; /*/ This is your hotels contacr settings, ( 'True' equals contact online etc... ) /*/
$_CONFIG['hotel']['motto'] = 'I am new to Zabbo!'; /*/ Default motto, that all users will have when they register. /*/
$_CONFIG['hotel']['credits'] = 35000; /*/ Default credits, that all users will have when they register. /*/
$_CONFIG['hotel']['duckets'] = 45000; /*/ Default duckets, that all users will have when they register. /*/
$_CONFIG['hotel']['diamonds'] = 50; /*/ Default diamonds, that all users will have when they register. /*/
$_CONFIG['hotel']['points'] = 0; /*/ Default points, that all users will have when they register. /*/
$_CONFIG['hotel']['figure'] = 'hd-180-1.ch-210-66.lg-270-82.sh-290-91.hr-100'; // Default look/figure users will register with.

## Hotel Social Accounts & Links Management ##
$_CONFIG['social']['discord'] = 'https://discord.gg/YnV2cAX8Jf'; /*/ Your Hotel Discord Link 'https://discord.gg/{code}' /*/
$_CONFIG['social']['discord_widget'] = '1086448144063135904'; /*/ Your Hotel Discord Link 'https://discord.gg/{code}' /*/
$_CONFIG['social']['twitter'] = 'https://twitter.com/Zabbo_ME'; /*/ Your Hotel Twitter Link 'https://twitter.com/{code}' /*/

## Hotel Avatar Imager Link Management ##
$_CONFIG['avatar']['imager'] = 'https://www.habbo.com/habbo-imaging/avatarimage?figure='; /*/ Your Hotel avatar imager Link 'https://imager.url.com/?figure=' /*/

## Hotel API Link Management ##
$_CONFIG['api']['link'] = 'https://ext.habzone.lol'; /*/ Your Hotel API Link 'https://api.habzone.lol' /*/

## Cloudflare Turnstile Captcha Site Key Management ##
## https://www.cloudflare.com/en-gb/application-services/products/turnstile/
$_CONFIG['cloudflare']['sitekey'] = '0x4AAAAAAAOU_rtN4t2yzpeg'; /*/ Cloudflare Turnstile Captcha Site Key Example '0x4AAAAAAAOU_rtN4t2yzpeg' /*/
$_CONFIG['cloudflare']['secretkey'] = '0x4AAAAAAAOU_k5oqfqhT9zpEgtKCWaCtCc'; /*/ Cloudflare Turnstile Captcha Secret Key Example '0x4AAAAAAAOU_k5oqfqhT9zpEgtKCWaCtCc' /*/

## TinyCloud HK News Post API Key Management ##
## Make an account on https://www.tiny.cloud/auth/signup/ or if you already have one go to https://www.tiny.cloud/auth/login/ and then 
## You'll see something on https://www.tiny.cloud/my-account/integrate/#html that sats "get your API Key" click that button top right of the page
## You will see an API key like 'pj356i5qwby1cgxgt37457sffa3mvgdilx8aez110lbn2cb9' copy it and paste below
## Go to "Approved Domains" on https://www.tiny.cloud/my-account/domains/and add new domain as yours
$_CONFIG['tinycloud']['tinykey'] = 'pj356i5qwby1cgxgt37457sffa3mvgdilx8aez110lbn2cb9'; /*/ Paste your Tiny Cloud API Key Example 'pj356i5qwby1cgxgt37457sffa3mvgdilx8aez110lbn2cb9' /*/

## Skin/Template Management ##
/*/ Your Hotel Skin /*/
$_CONFIG['template']['style'] = 'ZabboME';

## Client Settings For Client.php Vars,Flash_Text, Furnidata etc.... ##
$_CONFIG['hotel']['swfurl'] = 'https://game1.habzone.lol'; /*/ All URL's do not end with an ---> [ / ] This is where you edit the SWF URL. /*/
$_CONFIG['hotel']['external_vars'] = '/gamedata/external_variables.txt'; //URL to your external vars
$_CONFIG['hotel']['external_texts'] = '/gamedata/external_flash_texts.txt'; //URL to your external texts
$_CONFIG['hotel']['product_data'] = '/gamedata/productdata.txt'; //URL to your productdata
$_CONFIG['hotel']['furni_data'] = '/gamedata/furnidata.xml'; //URL to your furnidata
$_CONFIG['hotel']['swf_folder'] = '/gordon/PRODUCTION-CustomBUILD2020ZabboLife/'; //URL to your SWF folder

//## END OF CODE
?>
