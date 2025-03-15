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

// Special Functions

	function filter($var)
	{
		return mysql_real_escape_string(stripslashes(htmlspecialchars($var)));
	}

	if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
	 if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) { $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP']; } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];

	define('A', 'app/');
	define('I', 'interfaces/');
	define('M', 'management/');
	define('T', 'tpl/');

	function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
	
	function format_num($num, $precision = 2) {
		if ($num < 1000) {
			return $num;
		}
		$a = array( 1000000000 => 'B',
					   1000000 => 'M',
						  1000 => 'K'
		);
		foreach ($a as $amount => $str) {
			$d = $num / $amount;
			if ($d >= 1) {
				$r = round($d, $precision);
				return $r . $str;
			}
		}
	}

	function nicetime($date)
		{
			if(empty($date)) {

				return "N/A";
			}

			$periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
			$lengths         = array("60","60","24","7","4.35","12","10");

			$now             = time();
			$unix_date       = strtotime($date);

			if(empty($unix_date)) {

				return "Bad Timestamp";
			}

			if($now > $unix_date) {

				$difference     = $now - $unix_date;
				$tense          = "ago";
			} else {

				$difference     = $unix_date - $now;
				$tense         = "from now";
			}

			for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {

			$difference /= $lengths[$j];
			}

			$difference = round($difference);

			if($difference != 1) {

				$periods[$j].= "s";
			}

			return "$difference $periods[$j] {$tense}";
		}

		function relativeTime($time)
		{			
			$SECOND = 1;
			$MINUTE = 60 * $SECOND;
			$HOUR = 60 * $MINUTE;
			$DAY = 24 * $HOUR;
			$MONTH = 30 * $DAY;
			$before = time() - $time;
			if ($before < 0) { return "0 Seconds ago"; }
			if ($before < 1 * $MINUTE) { return "Just now"; }
			if ($before < 2 * $MINUTE) { return "About a minute ago"; }
			if ($before < 45 * $MINUTE) { return floor($before / 60) . "  Minutes ago"; }
			if ($before < 90 * $MINUTE) { return "About an hour ago"; }
			if ($before < 24 * $HOUR) { return (floor($before / 60 / 60) == 1 ? 'About an hour ago' : floor($before / 60 / 60) . ' hours ago');}
			if ($before < 48 * $HOUR) { return "Just over a day ago"; }
			if ($before < 30 * $DAY) { return floor($before / 60 / 60 / 24) . " days ago"; }
			if ($before < 12 * $MONTH) { $months = floor($before / 60 / 60 / 24 / 30); return $months <= 1 ? "About one month ago" : $months . " months ago";
			} else { $years = floor($before / 60 / 60 / 24 / 30 / 12); return $years <= 1 ? "About one year ago" : $years . " years ago";
			} return "$time";
		}

		function OnlineTime($time){
			$SECOND = 1;
			$MINUTE = 60 * $SECOND;
			$HOUR = 60 * $MINUTE;
			$DAY = 24 * $HOUR;
			$MONTH = 30 * $DAY;
			$before = $time;
			if ($before < 0) { return "No time at all"; }
			if ($before < 1 * $MINUTE) { return " just now </b>"; }
			if ($before < 2 * $MINUTE) { return " About a minute </b>"; }
			if ($before < 45 * $MINUTE) { return floor($before / 60) . " Minutes </b>"; }
			if ($before < 90 * $MINUTE) { return " About an hour </b>"; }
			if ($before < 24 * $HOUR) { return (floor($before / 60 / 60) == 1 ? 'About an hour' : floor($before / 60 / 60) . ' Hours </b>');}
			if ($before < 48 * $HOUR) { return " Just over a day </b>"; }
			if ($before < 30 * $DAY) { return floor($before / 60 / 60 / 24) . " Days </b>"; }
			if ($before < 12 * $MONTH) { $months = floor($before / 60 / 60 / 24 / 30); return $months <= 1 ? "About one month" : $months . " Months </b>";
			} else { $years = floor($before / 60 / 60 / 24 / 30 / 12); return $years <= 1 ? "About one year" : $years . " years </b>";
			} return "$time";
			}
		
			function number($n){
			$n = (0+str_replace(",","",$n));
			
			if(!is_numeric($n)) return false;
			
			else if($n>1000000000) return round(($n/1000000000),1).'B';
			else if($n>1000000) return round(($n/1000000),1).'M';
			else if($n>1000) return round(($n/1000),1).'K';
			
			return number_format($n);
		}

		function relativeTimeValues($time){				
				$SECOND = 1;
				$MINUTE = 60 * $SECOND;
				$HOUR = 60 * $MINUTE;
				$DAY = 24 * $HOUR;
				$MONTH = 30 * $DAY;
				$before = time() - $time;
				if ($before < 0) { return "0 sec ago"; }
				if ($before < 1 * $MINUTE) { return "Just now"; }
				if ($before < 2 * $MINUTE) { return "a min ago"; }
				if ($before < 45 * $MINUTE) { return floor($before / 60) . "  mins ago"; }
				if ($before < 90 * $MINUTE) { return "an hour ago"; }
				if ($before < 24 * $HOUR) { return (floor($before / 60 / 60) == 1 ? 'an hour ago' : floor($before / 60 / 60) . ' hours ago');}
				if ($before < 48 * $HOUR) { return "over a day ago"; }
				if ($before < 30 * $DAY) { return floor($before / 60 / 60 / 24) . " days ago"; }
				if ($before < 12 * $MONTH) { $months = floor($before / 60 / 60 / 24 / 30); return $months <= 1 ? "one month ago" : $months . " months ago";
				} else { $years = floor($before / 60 / 60 / 24 / 30 / 12); return $years <= 1 ? "one year ago" : $years . " years ago";
				} return "$time";
				}
		
//REVOLUTION

use Revolution as Rev;

//INTERFACES

require_once A . I . 'interface.core.php';

require_once A . I . 'interface.engine.php';

require_once A . I . 'interface.users.php';

require_once A . I . 'interface.template.php';

//TPL

require_once A . T . I . 'interface.forms.php';

//HTML

require_once A . T . I . 'interface.html.php';

//CSS

require_once A . T . I . 'interface.css.php';

//JS

require_once A . T . I . 'interface.js.php';

//CLASSES

//APP

require_once A . 'class.core.php';

require_once A . 'class.engine.php';

require_once A . 'class.users.php';

require_once A . 'class.template.php';

//MANAGEMENT

require_once A . M . 'config.php';

require_once A . M . 'recaptchalib.php';

//TPL

require_once A . T . 'class.forms.php';

//HTML

require_once A . T . 'class.html.php';

//CSS

require_once A . T . 'class.css.php';

//JS

require_once A . T . 'class.js.php';

//OBJ

$core = new Rev\core();

$engine = new Rev\engine();

$users = new Rev\users();

$template = new Rev\template();

$template->form = new Rev\forms();

$template->html = new Rev\html();

$template->css = new Rev\css();

$template->js = new Rev\js();

//START
session_start();

/*
$core->CheckTheVote();
*/

$engine->Initiate();

$ip_addr = $_SERVER['REMOTE_ADDR'];

$template->Initiate();


?>