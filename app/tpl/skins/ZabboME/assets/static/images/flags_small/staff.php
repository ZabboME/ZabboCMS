
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>{hotelName}: Staff</title>
<link rel="stylesheet" href="{url}/rooms.css" type="text/css">
 
<script type="text/javascript" src="{url}/rooms.js"></script>
	<script type="text/javascript">
		var andSoItBegins = (new Date()).getTime();
	</script>

	<link rel="shortcut icon" href="{url}/app/tpl/skins/Habbo/web-gallery/v2/favicon.ico" type="image/vnd.microsoft.icon" />
	<link rel="stylesheet" href="{url}/app/tpl/skins/Habbo/web-gallery/static/styles/common.css" type="text/css" />
	<script src="{url}/app/tpl/skins/Habbo/web-gallery/static/js/libs2.js" type="text/javascript"></script>
	<script src="{url}/app/tpl/skins/Habbo/web-gallery/static/js/visual.js" type="text/javascript"></script>
	<script src="{url}/app/tpl/skins/Habbo/web-gallery/static/js/libs.js" type="text/javascript"></script>
	<script src="{url}/app/tpl/skins/Habbo/web-gallery/static/js/common.js" type="text/javascript"></script>
	<script src="{url}/app/tpl/skins/Habbo/web-gallery/static/js/fullcontent.js" type="text/javascript"></script>

	<script type="text/javascript">
	document.habboLoggedIn = true;
	var habboName = "{username}";
	var habboId = {userid};
	var facebookUser = false;
	var habboReqPath = "";
	var habboStaticFilePath = "{url}/app/tpl/skins/Habbo/web-gallery";
	var habboImagerUrl = "http://www.habbo.com/habbo-imaging/";
	var habboPartner = "";
	var habboDefaultClientPopupUrl = "{url}/client";
	window.name = "habboMain";
	if (typeof HabboClient != "undefined") {
		HabboClient.windowName = "26530fff566f9e67da99560b7fe8da6d71d46391";
		HabboClient.maximizeWindow = true;
	}
	</script>
	<link rel="stylesheet" href="{url}/app/tpl/skins/Habbo/web-gallery/static/styles/lightweightmepage.css" type="text/css" />
	<script src="{url}/app/tpl/skins/Habbo/web-gallery/static/js/lightweightmepage.js" type="text/javascript"></script>
	<meta name="description" content="{meta_description}" />
	<meta name="keywords" content="{meta_keywords}" />

	<!--[if IE 8]>
	<link rel="stylesheet" href="{url}/app/tpl/skins/Habbo/web-gallery/static/styles/ie8.css" type="text/css" />
	<![endif]-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" href="{url}/app/tpl/skins/Habbo/web-gallery/static/styles/ie.css" type="text/css" />
	<![endif]-->
	<!--[if lt IE 7]>
	<link rel="stylesheet" href="{url}/app/tpl/skins/Habbo/web-gallery/static/styles/ie6.css" type="text/css" />
	<script src="{url}/app/tpl/skins/Habbo/web-gallery/static/js/pngfix.js" type="text/javascript"></script>
	<script type="text/javascript">
	try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}
	</script>

	<style type="text/css">
	body { behavior: url(/js/csshover.htc); }
	</style>
	<![endif]-->
	<meta name="build" content="63-BUILD2470 - 30.09.2013 11:10 - com" />
</head>

<body id="home" class=" ">
<div id="overlay"></div>

<?php 

$navigatorID = 2;
require_once ('app/tpl/skins/Habbo/template/header.php'); 

?>


<div id="content-container">

<div id="navi2-container" class="pngbg">
    <div id="navi2" class="pngbg clearfix">
		<ul>
		<?php 

		$subNavigatorID = 6;
		require_once ('app/tpl/skins/Habbo/template/sub_header.php'); 

		?>
		</ul>
    </div>
</div>
<div id="container">
			<div id="content">
				<div id="column1" class="column">
					<?php $rankcolor = 'settings'; $rankid = 11; $getRanks = $engine->query("SELECT id,name FROM ranks WHERE id = ".$rankid." ORDER BY id DESC"); while ($Ranks = mysqli_fetch_assoc($getRanks)){ echo '<div class="habblet-container "><div class="cbb clearfix '.$rankcolor.'"><h2 class="title">' . $Ranks['name'] . 's</h2>'; $getMembers = $engine->query("SELECT id,username,motto,look,online,account_created,last_online,country FROM users WHERE rank = '" . $Ranks['id'] . "'"); if (mysqli_num_rows($getMembers) > 0) { $oe = 1; while ($member = mysqli_fetch_assoc($getMembers)) { if($member['online'] == 1){ $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_online_anim.gif' title='Offline'></div>"; } else { $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_offline.gif' title='Offline'></div>"; } $Bans = $engine->query("SELECT null FROM `users_bans` WHERE `added_by` = '" . $member['username'] . "'"); $BanCount = mysqli_num_rows($Bans); $Tickets = $engine->query("SELECT * FROM `moderation_tickets` WHERE `moderator_id` = '" . $member['id'] . "'"); $TicketsCount = mysqli_num_rows($Tickets); echo ' <div style"margin: 5px; margin-top: -5px;"> <div style="width: 65px; display: inline;"><!-- FINDME --><img src="https://www.habbo.com/habbo-imaging/avatarimage?figure=' .$member['look'] . '&size=m&direction=2&head_direction=3&gesture=sml"></div><div style="width: 345px; float: right; display: inline; padding: 5px;"><p>'. $OnlineStatus .' <strong>&nbsp;<a href="{url}/home/' .$member['username'] . '">' .$member['username'] . '</a><img src="{url}/app/tpl/skins/Habbo/images/flags/' .$member['country'] . '.png" align="right"></strong></p><strong>Motto:</strong> ' . htmlspecialchars(htmlspecialchars($member['motto'])) . '<br /> <strong>Registed:</strong> '. date('l jS \of F', $member['account_registered']) .'<br /> <strong>Last Online:</strong> '. date('l jS \of F', $member['last_online']) .'<br /> <strong>Bans:</strong> '. $BanCount .'<br /> <strong>Tickets Answered:</strong> '. $TicketsCount .'<br /> </div> </div> '; } } else{ echo '<center><div style="margin: 5px;"><i>There are no staff with this rank, yet.</i></div></center>'; } echo '</div></div><script type="text/javascript">if (!$(document.body).hasClassName(\'process-template\')) { Rounder.init(); }</script> '; } ?>						
					<?php $rankcolor = 'pixeldarkblue'; $rankid = 10; $getRanks = $engine->query("SELECT id,name FROM ranks WHERE id = ".$rankid." ORDER BY id DESC"); while ($Ranks = mysqli_fetch_assoc($getRanks)){ echo '<div class="habblet-container "><div class="cbb clearfix '.$rankcolor.'"><h2 class="title">' . $Ranks['name'] . 's</h2>'; $getMembers = $engine->query("SELECT id,username,motto,look,online,account_created,last_online,country FROM users WHERE rank = '" . $Ranks['id'] . "'"); if (mysqli_num_rows($getMembers) > 0) { $oe = 1; while ($member = mysqli_fetch_assoc($getMembers)) { if($member['online'] == 1){ $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_online_anim.gif' title='Offline'></div>"; } else { $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_offline.gif' title='Offline'></div>"; } $Bans = $engine->query("SELECT null FROM `users_bans` WHERE `added_by` = '" . $member['username'] . "'"); $BanCount = mysqli_num_rows($Bans); $Tickets = $engine->query("SELECT * FROM `moderation_tickets` WHERE `moderator_id` = '" . $member['id'] . "'"); $TicketsCount = mysqli_num_rows($Tickets); echo ' <div style"margin: 5px; margin-top: -5px;"> <div style="width: 65px; display: inline;"><img src="https://www.habbo.com/habbo-imaging/avatarimage?figure=' .$member['look'] . '&size=m&direction=2&head_direction=3&gesture=sml"></div><div style="width: 345px; float: right; display: inline; padding: 5px;"><p>'. $OnlineStatus .' <strong>&nbsp;<a href="{url}/home/' .$member['username'] . '">' .$member['username'] . '</a><img src="{url}/app/tpl/skins/Habbo/images/flag/' .$member['country'] . '.png" align="right"></strong></p><strong>Motto:</strong> ' . htmlspecialchars(htmlspecialchars($member['motto'])) . '<br /> <strong>Registed:</strong> '. date('l jS \of F', $member['account_registered']) .'<br /> <strong>Last Online:</strong> '. date('l jS \of F', $member['last_online']) .'<br /> <strong>Bans:</strong> '. $BanCount .'<br /> <strong>Tickets Answered:</strong> '. $TicketsCount .'<br /> </div> </div> '; } } else{ echo '<center><div style="margin: 5px;"><i>There are no staff with this rank, yet.</i></div></center>'; } echo '</div></div><script type="text/javascript">if (!$(document.body).hasClassName(\'process-template\')) { Rounder.init(); }</script> '; } ?>
					<?php $rankcolor = 'brown'; $rankid = 9; $getRanks = $engine->query("SELECT id,name FROM ranks WHERE id = ".$rankid." ORDER BY id DESC"); while ($Ranks = mysqli_fetch_assoc($getRanks)){ echo '<div class="habblet-container "><div class="cbb clearfix '.$rankcolor.'"><h2 class="title">' . $Ranks['name'] . 's</h2>'; $getMembers = $engine->query("SELECT id,username,motto,look,online,account_created,last_online,country FROM users WHERE rank = '" . $Ranks['id'] . "'"); if (mysqli_num_rows($getMembers) > 0) { $oe = 1; while ($member = mysqli_fetch_assoc($getMembers)) { if($member['online'] == 1){ $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_online_anim.gif' title='Offline'></div>"; } else { $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_offline.gif' title='Offline'></div>"; } $Bans = $engine->query("SELECT null FROM `users_bans` WHERE `added_by` = '" . $member['username'] . "'"); $BanCount = mysqli_num_rows($Bans); $Tickets = $engine->query("SELECT * FROM `moderation_tickets` WHERE `moderator_id` = '" . $member['id'] . "'"); $TicketsCount = mysqli_num_rows($Tickets); echo ' <div style"margin: 5px; margin-top: -5px;"> <div style="width: 65px; display: inline;"><img src="https://www.habbo.com/habbo-imaging/avatarimage?figure=' .$member['look'] . '&size=m&direction=2&head_direction=3&gesture=sml"></div><div style="width: 345px; float: right; display: inline; padding: 5px;"><p>'. $OnlineStatus .' <strong>&nbsp;<a href="{url}/home/' .$member['username'] . '">' .$member['username'] . '</a><img src="{url}/app/tpl/skins/Habbo/images/flag/' .$member['country'] . '.png" align="right"></strong></p><strong>Motto:</strong> ' . htmlspecialchars(htmlspecialchars($member['motto'])) . '<br /> <strong>Registed:</strong> '. date('l jS \of F', $member['account_registered']) .'<br /> <strong>Last Online:</strong> '. date('l jS \of F', $member['last_online']) .'<br /> <strong>Bans:</strong> '. $BanCount .'<br /> <strong>Tickets Answered:</strong> '. $TicketsCount .'<br /> </div> </div> '; } } else{ echo '<center><div style="margin: 5px;"><i>There are no staff with this rank, yet.</i></div></center>'; } echo '</div></div><script type="text/javascript">if (!$(document.body).hasClassName(\'process-template\')) { Rounder.init(); }</script> '; } ?>
					<?php $rankcolor = 'green'; $rankid = 7; $getRanks = $engine->query("SELECT id,name FROM ranks WHERE id = ".$rankid." ORDER BY id DESC"); while ($Ranks = mysqli_fetch_assoc($getRanks)){ echo '<div class="habblet-container "><div class="cbb clearfix '.$rankcolor.'"><h2 class="title">' . $Ranks['name'] . 's</h2>'; $getMembers = $engine->query("SELECT id,username,motto,look,online,account_created,last_online,country FROM users WHERE rank = '" . $Ranks['id'] . "'"); if (mysqli_num_rows($getMembers) > 0) { $oe = 1; while ($member = mysqli_fetch_assoc($getMembers)) { if($member['online'] == 1){ $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_online_anim.gif' title='Offline'></div>"; } else { $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_offline.gif' title='Offline'></div>"; } $Bans = $engine->query("SELECT null FROM `users_bans` WHERE `added_by` = '" . $member['username'] . "'"); $BanCount = mysqli_num_rows($Bans); $Tickets = $engine->query("SELECT * FROM `moderation_tickets` WHERE `moderator_id` = '" . $member['id'] . "'"); $TicketsCount = mysqli_num_rows($Tickets); echo ' <div style"margin: 5px; margin-top: -5px;"> <div style="width: 65px; display: inline;"><img src="https://www.habbo.com/habbo-imaging/avatarimage?figure=' .$member['look'] . '&size=m&direction=2&head_direction=3&gesture=sml"></div><div style="width: 345px; float: right; display: inline; padding: 5px;"><p>'. $OnlineStatus .' <strong>&nbsp;<a href="{url}/home/' .$member['username'] . '">' .$member['username'] . '</a><img src="{url}/app/tpl/skins/Habbo/images/flag/' .$member['country'] . '.png" align="right"></strong></p><strong>Motto:</strong> ' . htmlspecialchars(htmlspecialchars($member['motto'])) . '<br /> <strong>Registed:</strong> '. date('l jS \of F', $member['account_registered']) .'<br /> <strong>Last Online:</strong> '. date('l jS \of F', $member['last_online']) .'<br /> <strong>Bans:</strong> '. $BanCount .'<br /> <strong>Tickets Answered:</strong> '. $TicketsCount .'<br /> </div> </div> '; } } else{ echo '<center><div style="margin: 5px;"><i>There are no staff with this rank, yet.</i></div></center>'; } echo '</div></div><script type="text/javascript">if (!$(document.body).hasClassName(\'process-template\')) { Rounder.init(); }</script> '; } ?>
					<?php $rankcolor = 'blue'; $rankid = 6; $getRanks = $engine->query("SELECT id,name FROM ranks WHERE id = ".$rankid." ORDER BY id DESC"); while ($Ranks = mysqli_fetch_assoc($getRanks)){ echo '<div class="habblet-container "><div class="cbb clearfix '.$rankcolor.'"><h2 class="title">' . $Ranks['name'] . 's</h2>'; $getMembers = $engine->query("SELECT id,username,motto,look,online,account_created,last_online,country FROM users WHERE rank = '" . $Ranks['id'] . "'"); if (mysqli_num_rows($getMembers) > 0) { $oe = 1; while ($member = mysqli_fetch_assoc($getMembers)) { if($member['online'] == 1){ $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_online_anim.gif' title='Offline'></div>"; } else { $OnlineStatus = "<div style='float: left;'><img src='{url}/app/tpl/skins/Habbo/images/habbo_offline.gif' title='Offline'></div>"; } $Bans = $engine->query("SELECT null FROM `users_bans` WHERE `added_by` = '" . $member['username'] . "'"); $BanCount = mysqli_num_rows($Bans); $Tickets = $engine->query("SELECT * FROM `moderation_tickets` WHERE `moderator_id` = '" . $member['id'] . "'"); $TicketsCount = mysqli_num_rows($Tickets); echo ' <div style"margin: 5px; margin-top: -5px;"> <div style="width: 65px; display: inline;"><img src="https://www.habbo.com/habbo-imaging/avatarimage?figure=' .$member['look'] . '&size=m&direction=2&head_direction=3&gesture=sml"></div><div style="width: 345px; float: right; display: inline; padding: 5px;"><p>'. $OnlineStatus .' <strong>&nbsp;<a href="{url}/home/' .$member['username'] . '">' .$member['username'] . '</a><img src="{url}/app/tpl/skins/Habbo/images/flag/' .$member['country'] . '.png" align="right"></strong></p><strong>Motto:</strong> ' . htmlspecialchars(htmlspecialchars($member['motto'])) . '<br /> <strong>Registed:</strong> '. date('l jS \of F', $member['account_registered']) .'<br /> <strong>Last Online:</strong> '. date('l jS \of F', $member['last_online']) .'<br /> <strong>Bans:</strong> '. $BanCount .'<br /> <strong>Tickets Answered:</strong> '. $TicketsCount .'<br /> </div> </div> '; } } else{ echo '<center><div style="margin: 5px;"><i>There are no staff with this rank, yet.</i></div></center>'; } echo '</div></div><script type="text/javascript">if (!$(document.body).hasClassName(\'process-template\')) { Rounder.init(); }</script> '; } ?>
				</div>

        <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
		
			<div id="column2" class="column">
				<div class="habblet-container ">
					<div class="habblet-container ">		
						<div class="cbb clearfix blue ">
							<h2 class="title">Staff Info</h2>
							<div style="padding: 8px;">
								The {hotelname} staff are here to make sure the hotel is run effectively, and smoothly. These staff Manage, Develop, Moderate, and Entertain the hotel! With help from events staff and eXperts, this amazing team keeps {hotelname} safe and enjoyable!
							</div>
						</div>
					</div>
				</div>
			</div>
<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
		
		
		</div>
		
			</div>
		</div>

        <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
        <script type="text/javascript">
            HabboView.run();
        </script>

        <!--[if lt IE 7]>
            <script type="text/javascript">
                Pngfix.doPngImageFix();
            </script>
        <![endif]-->
        
        <?php include('template/footer.php'); ?>
</body>
</html>