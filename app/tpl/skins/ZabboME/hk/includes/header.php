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

$gethwuser = mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'");
$hwuser    = mysql_fetch_assoc($gethwuser);
if (!isset($_SESSION['user']['id']) || $_SESSION['user']['rank'] < 6) {
header("Location: ../noaccess");
die();
}
else if ($hwuser['rank'] < 6) {
header("Location: ../logout");
die();
}
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));

$getUseRank4Page2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));


// Check if users can access page.
function getPageRank($a) {
$perms = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = '" . $a . "'"));
return $perms['rank'];
}

// Check if users can access page.
function getPageRank2($a2) {
$perms2 = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE `rank` = '12'"));
return $perms2['rank'];
}


function time_elapsed_string($datetime, $full = false) {
$now     = new DateTime;
$ago     = new DateTime($datetime);
$diff    = $now->diff($ago);
$diff->w = floor($diff->d / 7);
$diff->d -= $diff->w * 7;
$string = array(
'y' => 'year',
'm' => 'month',
'w' => 'week',
'd' => 'day',
'h' => 'hour',
'i' => 'minute',
's' => 'second'
);
foreach ($string as $k => &$v) {
if ($diff->$k) {
$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
} else {
unset($string[$k]);
}
}
if (!$full)
$string = array_slice($string, 0, 1);
return $string ? implode(', ', $string) . ' ago' : 'just now';
}
$query1 = mysql_query("SELECT COUNT(*) AS stats1 FROM users_apps") or die(mysql_error());
$data1 = mysql_fetch_assoc($query1);
$query13 = mysql_query("SELECT COUNT(*) AS stats13 FROM users_submissions") or die(mysql_error());
$data12 = mysql_fetch_assoc($query13);
$query2 = mysql_query("SELECT COUNT(*) AS stats2 FROM bug_reports WHERE status = '0'") or die(mysql_error());
$data2 = mysql_fetch_assoc($query2);
$query11 = mysql_query("SELECT COUNT(*) AS stats3 FROM cms_user_reports ") or die(mysql_error());
$data11 = mysql_fetch_assoc($query11);
if ($hwuser['online'] == 1) {
$aanwezug = '<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>';
}
if ($hwuser['online'] == 0) {
$aanwezug = '<div class="profile-usertitle-status"><span class="indicator label-danger"></span>Offline</div>';
}
?>
<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "'");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "'");
	}
	$user1 = mysql_fetch_assoc($home);
?>		

<style>
#cd-timeline{position:relative;padding:2em 0;margin-top:2em;margin-bottom:2em;}.cd-container{width:90%;max-width:1170px;margin:0 auto;}#cd-timeline::before{content:'';position:absolute;top:0;left:18px;height:100%;width:4px;background:#3d434c;}.cd-timeline-block:first-child{margin-top:0;}.cd-timeline-block{position:relative;margin:2em 0;}.cd-timeline-img.cd-movie{background:#c03b44;}.cd-timeline-content{position:relative;margin-left:60px;background:#3d434c;border-radius:0.25em;padding:1em;box-shadow:0 3px 0 #31363d;}.cd-timeline-content::before{content:'';position:absolute;top:16px;right:100%;height:0;width:0;border:7px solid transparent;border-right:7px solid #3d434c;}.cd-timeline-content h2{color:#ffffff;}h2{font-size:1.70rem;line-height:110%;margin:1.78rem 0 1.424rem 0;}.soc{color:rgba(255,255,255,0.66);text-align:left;font-size:15px;}.cd-timeline-content:after{content:"";display:table;clear:both;}.cd-timeline-block:after{content:"";display:table;clear:both;}.cd-timeline-block{position:relative;margin:2em 0;}
.cd-timeline-img {
    position: absolute;
    top: 10;
    left: 1px;
    width: 60px;
    height: 65px;
    border-radius: 50%;
    box-shadow: 0 0 0 1px #31363d, inset 0 1px 0 rgb(67,74,84), 0 1px 0 1px rgba(0,0,0,0.12);
}
.cd-timeline-img2 {
    position: absolute;
    top: 10;
    left: 20px;
    width: 60px;
    height: 65px;
    border-radius: 50%;
    box-shadow: 0 0 0 1px #31363d, inset 0 1px 0 rgb(67,74,84), 0 1px 0 1px rgba(0,0,0,0.12);
}
.profile-sidebar2 {
    padding: 10px 0;
    border-bottom: 1px solid #e9ecf2;
    padding-left: 60px;
}
</style>
<style>
::-webkit-scrollbar{width:7px;height:7px;}::-webkit-scrollbar-thumb{border-radius:1em;background-color:rgba(50,50,50,0.3);}::-webkit-scrollbar-thumb:hover{background-color:rgba(50,50,50,0.6);}::-webkit-scrollbar-track{border-radius:1em;background-color:rgba(50,50,50,0.1);}::-webkit-scrollbar-track:hover{background-color:rgba(50,50,50,0.2);}
</style>
<?php
// CSS & Javascript
require_once('checktheban.php');
?>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="/ase/main"><span>Zabbo</span>ASE</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
		<div class="cd-timeline-img cd-picture" style="background: url({imager}<?php
echo mysql_result(mysql_query("SELECT look FROM users WHERE id = '" . $_SESSION['user']['id'] . "'"), 0);
?>&amp;direction=2&amp;head_direction=3&amp;gesture=sml)no-repeat #5da8c5;{imager}
    background-position: center center;">
</div>  
				<img src="{imager}<?php
echo mysql_result(mysql_query("SELECT look FROM users WHERE id = '" . $_SESSION['user']['id'] . "'"), 0);
?>&direction=3&head_direction=3&gesture=sml&headonly=1" class="img-responsive" align="left">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php
echo mysql_result(mysql_query("SELECT username FROM users WHERE id = '" . $_SESSION['user']['id'] . "'"), 0);
?> <a href="#"><em class="fa fa-cogs"></em></a></div>
<?php
echo $aanwezug;
?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="/ase/main"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<?php
if (getPageRank('EventTeam') <= $getUseRank4Page['rank'])
echo '
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> General <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					
					'.((getPageRank('EventTeam') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/getevents">
						<span class="fa fa-arrow-right">&nbsp;</span> Event Members
					</a></li>' : '' ).'
					'.((getPageRank('EventTeam') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/eventbook">
						<span class="fa fa-arrow-right">&nbsp;</span> Event Handbook
					</a></li><hr>' : '' ).'
					'.((getPageRank('TMOD') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/getstaff">
						<span class="fa fa-arrow-right">&nbsp;</span> Staff Members
					</a></li>' : '' ).'
					'.((getPageRank('TMOD') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/handbook">
						<span class="fa fa-arrow-right">&nbsp;</span> Staff Handbook
					</a></li><hr>' : '' ).'
					'.((getPageRank('TMOD') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/cmdhandbook">
						<span class="fa fa-arrow-right">&nbsp;</span> Commands Handbook
					</a></li>' : '' ).'
				</ul>
			</li>';
if (getPageRank('amb') <= $getUseRank4Page['rank'])
echo '
							<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Moderation <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/namechangelogs">
						<span class="fa fa-arrow-right">&nbsp;</span> Namechange Logs
					</a></li>' : '' ).'
					
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/stafflogs">
						<span class="fa fa-arrow-right">&nbsp;</span> Client Staff Logs
					</a></li>' : '' ).'
					
					
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/tradelogs">
						<span class="fa fa-arrow-right">&nbsp;</span> Client Trade Logs
					</a></li>' : '' ).'
	
					
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/chatlogs">
						<span class="fa fa-arrow-right">&nbsp;</span> Chatlogs
					</a></li>' : '' ).'
					
					
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/chatlogspm">
						<span class="fa fa-arrow-right">&nbsp;</span> Console Chatlogs
					</a></li>' : '' ).'
					
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/recent">
						<span class="fa fa-arrow-right">&nbsp;</span> Registration
					</a></li>' : '' ).'
			
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/cfh">
						<span class="fa fa-arrow-right">&nbsp;</span> CFH
					</a></li>' : '' ).'
					
				</ul>
			</li>';	
						
			
if (getPageRank('SMOD') <= $getUseRank4Page['rank'])
echo '
<li class="parent "><a data-toggle="collapse" href="#sub-item-5">
				<em class="fa fa-navicon">&nbsp;</em> Management <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					'.((getPageRank('ADMIN') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/edituser">
						<span class="fa fa-arrow-right">&nbsp;</span> Account Editor
					</a></li>' : '' ).'
					
					'.((getPageRank('EventManager') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/editeventuser">
						<span class="fa fa-arrow-right">&nbsp;</span> Event Account Editor
					</a></li>' : '' ).'
					
					
					'.((getPageRank('management') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/changepass">
						<span class="fa fa-arrow-right">&nbsp;</span> Change User Password
					</a></li>' : '' ).'
					
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/iptool">
						<span class="fa fa-arrow-right">&nbsp;</span> Clone Search
					</a></li><hr>' : '' ).'
					
					'.((getPageRank('MOD') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/addbadge">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Badge
					</a></li>' : '' ).'
					
					'.((getPageRank('MOD') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/badgetxt">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Badge Text
					</a></li>' : '' ).'
					
					'.((getPageRank('MOD') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/badges">
						<span class="fa fa-arrow-right">&nbsp;</span> Manage User Badges
					</a></li>' : '' ).'
					
					'.((getPageRank('TMOD') <= $getUseRank4Page['rank']) ? '<hr><li><a class="" href="/ase/newspublish">
						<span class="fa fa-arrow-right">&nbsp;</span> Write News Article
					</a></li>' : '' ).'
					
					'.((getPageRank('TMOD') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/news">
						<span class="fa fa-arrow-right">&nbsp;</span> Manage News Article
					</a></li><hr>' : '' ).'
					
					'.((getPageRank('EventTeam') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/staffapps">
						<span class="fa fa-arrow-right">&nbsp;</span> Staff Applications <b class="label label-pill label-warning">' . number_format($data1['stats1']) . '</b>
					</a></li>' : '' ).'
					
					'.((getPageRank('EventTeam') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/submissions">
						<span class="fa fa-arrow-right">&nbsp;</span> Event Submissions <b class="label label-pill label-warning">' . number_format($data12['stats13']) . '</b>
					</a></li><hr>' : '' ).'
				
					'.((getPageRank('ADMIN') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/bans">
						<span class="fa fa-arrow-right">&nbsp;</span> Manage Bans
					</a></li>' : '' ).'
					
					'.((getPageRank('TMOD') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/furni">
						<span class="fa fa-arrow-right">&nbsp;</span> Manage Item Editor
					</a></li>' : '' ).'
					
					'.((getPageRank('moderation') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/values">
						<span class="fa fa-arrow-right">&nbsp;</span> Manage Rare Values
					</a></li>' : '' ).'
					
					'.((getPageRank('amb') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/filter">
						<span class="fa fa-arrow-right">&nbsp;</span> Manage Word Filter
					</a></li>' : '' ).'
					
					'.((getPageRank('EventManager') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/vouchers">
						<span class="fa fa-arrow-right">&nbsp;</span> Manage Insert Voucher
					</a></li>' : '' ).'
					

				
				</ul>
			</li>';
			
			
			if (getPageRank('OWNER') <= $getUseRank4Page['rank'])
echo '
<li class="parent "><a data-toggle="collapse" href="#sub-item-6">
				<em class="fa fa-navicon">&nbsp;</em> Owner <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-6">
					
					'.((getPageRank('OWNER') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/addcataimg">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Catalog Image
					</a></li>' : '' ).'
					
					'.((getPageRank('OWNER') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/addiconfurni">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Furni Icon
					</a></li>' : '' ).'
					
					'.((getPageRank('OWNER') <= $getUseRank4Page['rank']) ? '<li><a class="" href="/ase/addfurni">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Furniture
					</a></li>' : '' ).'

				</ul>
			</li>';

			if (getPageRank('EventManager') <= $getUseRank4Page['rank'])
			echo '
			<li class="parent "><a data-toggle="collapse" href="#sub-item-7">
							<em class="fa fa-navicon">&nbsp;</em> Radio ASE <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
							</a>
							<ul class="children collapse" id="sub-item-7">

								'.((getPageRank('EventManager') <= $getUseRank4Page['rank']) ? '<li><a class="" href="#">
									<span class="fa fa-arrow-right">&nbsp;</span> Radio Details
								</a></li>' : '' ).'
								
								'.((getPageRank('EventManager') <= $getUseRank4Page['rank']) ? '<li><a class="" href="#">
									<span class="fa fa-arrow-right">&nbsp;</span> Radio Request
								</a></li>' : '' ).'
								
								'.((getPageRank('EventManager') <= $getUseRank4Page['rank']) ? '<li><a class="" href=#">
									<span class="fa fa-arrow-right">&nbsp;</span> Event Entries
								</a></li>' : '' ).'

								'.((getPageRank('EventManager') <= $getUseRank4Page['rank']) ? '<li><a class="" href="#">
									<span class="fa fa-arrow-right">&nbsp;</span> Useful Links
								</a></li>' : '' ).'
			
							</ul>
						</li>';
?>
			<li><a href="{url}/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->