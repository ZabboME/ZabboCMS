<?php
	$home = mysql_query("SELECT * FROM users_settings WHERE user_id = '" . Filter($_GET['id']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users_settings WHERE user_id = '" . $_SESSION['user']['id'] . "' LIMIT 1");
	}
	$ustat = mysql_fetch_assoc($home);
?>
<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);
?>
<?php
	$usersstats1_a = mysql_query("SELECT * FROM users_settings WHERE user_id = '".$user['id']."' ORDER BY id DESC LIMIT 1");
	while($usersstats2 = mysql_fetch_assoc($usersstats1_a)){
	$row1 = mysql_fetch_assoc($row1 = mysql_query("SELECT username,look FROM users WHERE id = '".$usersstats2['id']."' LIMIT 1"));
?>
<?php
				
$userList1 = mysql_query("SELECT profile_id FROM profile_comments WHERE profile_id = '".$user['id']."'");
				  
?>	
				
<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);

	//if($user['online'] == 1){ $OnlineStatus = "<div style='position: absolute;top: 4px;right: 4px;float: right;'><div class='ripping'><img src='{cdnurl}/images/habbo_online_big.gif' data-toggle='tooltip' data-placement='top' data-original-title='This user is online!'></div></div>"; } else { $OnlineStatus = "<div style='position: absolute;top: 4px;right: 4px;float: right;'><div class='ripping'><img src='{cdnurl}/images/habbo_offline_big.gif' data-toggle='tooltip' data-placement='top' data-original-title='This user is offline!'></div></div>"; }

?>
<?php
	$getFriends = mysql_query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."' GROUP BY user_two_id");
	$getFriends2 = mysql_query("SELECT * FROM messenger_friendships WHERE user_two_id = '".$user['id']."' GROUP BY user_one_id");
?>
<title>{shortname} ~ <?php echo $user['username']; ?>'s Home Profile</title>

<?php
	$navigatorID = 1;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>
<style>

.mebg .mottobox {
    box-shadow: 0 1px 0 2px rgba(0,0,0,.3);
    margin-top: 12px;
    margin-left: -25px;
    border: 1px solid #5f5f5f;
    border-radius: 2%;
    position: relative;
    -webkit-box-shadow: 0 1px 0 2px rgba(0,0,0,.3);
    height: 180px;
    vertical-align: middle;
    -webkit-box-align: center;
    background-color: #383838a6;
    width: 175px;
    align-items: center;
    justify-content: center;
    -webkit-box-pack: center;
}
    .mebg.bg_xmas {
        background: url('{cdnurl}/images/design/mebox/<?php echo $user['cms_mebg']; ?>') 50% 50% no-repeat;
		background-size: cover;
    }

    .mebg .body h1 {
        font-size: 35px;
        padding: 0px;
        padding-top: 20px;
        margin: 0px;
    }

    .mebg .body h5 {
        font-size: 16px;
        padding: 0px;
        padding-top: 10px;
        margin: 0px;
    }
.window_style_2 .inner {
    background-color: #383838;
    border-style: solid;
    border-width: 5px 5px 6px;
    -moz-border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAZdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuMjHxIGmVAAAAc0lEQVQ4T+2MQQrAMAgE/Vb//7B21ZhaayCm0FMGFqJmhxLOYobIB3BUYj0WeHDLC7Nhh6oU7B7HKUKnCzHXZUboihTvNZmxhVu4wH/CtiwRuirUfV0aOuKRvd7u40q8kLEBt7wwiu8iHb/8khfZp5k0iC6lmsww3tLZfgAAAABJRU5ErkJggg==) 5 5 6 repeat;
    -webkit-border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAZdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuMjHxIGmVAAAAc0lEQVQ4T+2MQQrAMAgE/Vb//7B21ZhaayCm0FMGFqJmhxLOYobIB3BUYj0WeHDLC7Nhh6oU7B7HKUKnCzHXZUboihTvNZmxhVu4wH/CtiwRuirUfV0aOuKRvd7u40q8kLEBt7wwiu8iHb/8khfZp5k0iC6lmsww3tLZfgAAAABJRU5ErkJggg==) 5 5 6 repeat;
    -o-border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAZdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuMjHxIGmVAAAAc0lEQVQ4T+2MQQrAMAgE/Vb//7B21ZhaayCm0FMGFqJmhxLOYobIB3BUYj0WeHDLC7Nhh6oU7B7HKUKnCzHXZUboihTvNZmxhVu4wH/CtiwRuirUfV0aOuKRvd7u40q8kLEBt7wwiu8iHb/8khfZp5k0iC6lmsww3tLZfgAAAABJRU5ErkJggg==) 5 5 6 repeat;
    border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAZdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuMjHxIGmVAAAAc0lEQVQ4T+2MQQrAMAgE/Vb//7B21ZhaayCm0FMGFqJmhxLOYobIB3BUYj0WeHDLC7Nhh6oU7B7HKUKnCzHXZUboihTvNZmxhVu4wH/CtiwRuirUfV0aOuKRvd7u40q8kLEBt7wwiu8iHb/8khfZp5k0iC6lmsww3tLZfgAAAABJRU5ErkJggg==) 5 5 6 fill repeat;
    border-radius: 7px;
    color: #fff;
    box-sizing: border-box;
}
    .mebg a.btn {
        padding: 10px;
    }

    .balance2 {
        height: 40px;
        line-height: 40px;
        color: #FFF;
        font-size: 12px;
        width: 100%;

        padding-left: 20px;
        border-right: 1px solid rgba(255, 255, 255, 0.1);
    }


    .balance2.credits {
        background: url({cdnurl}/images/6.png) no-repeat;
        background-position: 00% 50%;
    }

    .balance2.pixels {
        background: url({cdnurl}/images/5.png) no-repeat;
        background-position: 00% 50%;
    }

    .balance2.points {
        background: url({cdnurl}/images/8.png) no-repeat;
        background-position: 00% 50%;
    }


    .balance2.onlinetime {
        background: url({cdnurl}/images/9.png) no-repeat;
        background-position: 00% 50%;
        border-right: 0px;
    }


    .Sterne {
        background: url('{cdnurl}/images/8.png') 5px 50% no-repeat;
    }

    .Taler {
        background: url('{cdnurl}/images/6.png') 5px 50% no-repeat;
    }
    .Pixel {
        background: url('{cdnurl}/images/5.png') 5px 50% no-repeat;
    }

    .token {
        background: url('{cdnurl}/images/13.png') 5px 50% no-repeat;
    }

    .credits {
        background: url({cdnurl}/images/6.png) no-repeat;
        background-position: 02% 50%;
        padding-left: 40px;
    }

    .pixels {
        background: url({cdnurl}/images/5.png) no-repeat;
        background-position: 02% 50%;
        padding-left: 40px;
    }
	.closebox2 {
background-image: url(/img/close.png);
    width: 19px;
    height: 20px;
}

.closebox2:hover {
    background-position: center;
}

.closebox2:active {
	background-position: bottom;
}
.timestamp {
    font-size: 12px;
    margin-top: 20px;
    float: right;
}
</style>
<style>
.label-primary1 {
    background-color: #ffffff4f;
}
 </style>

<div class="row">
<div class="col-md-7">
<div class="card mebg bg_xmas" >
<div class="ripping" style="position: absolute;z-index: 1;"><img src="{cdnurl}/images/flags_small/<?php echo $user['country']; ?>.png?<?php echo time() ?>" style="height: 20px;width: 20px;" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo str_replace("-", " ", $user['country']); ?>"></div>
<div class="ripping" style="position: absolute;z-index: 0;margin-left: -15px;margin-top: -5px;"><img class="shine" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $user['username']; ?>" src="{imager}<?php echo $user['look']; ?>&size=l&head_direction=3&gesture=sml&dance=3&img_format=gif"></div>
<div class="body">
<div class="row">
<div class="col-md-4">
<div class="mottobox" style="padding: 5px;">

<h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><img src="{cdnurl}/images/icons/myhabcord.gif" class="ripping" style="position: relative;left: 5px;margin-right: 15px;"><b style="font-size: 14.5px;"><?php echo $user['username']; ?></b></font></font></h1>

<h5><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;font-size: 14.5px;margin-left: 15px;"><img src="{cdnurl}/images/icons/motto.gif" class="ripping" style="position: relative;top: -2px;left: -10px;"><?php echo $user['motto']; ?></font></font></h5>


						<h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14.5px;margin-left: 15px;"><img src="{cdnurl}/images/icons/friends.gif" class="ripping" style="position: relative;top: -2px;left: -10px;"> <?php echo mysql_num_rows($getFriends)+mysql_num_rows($getFriends2); ?> Friends!</font></font></h5>
						<h5><font style="vertical-align: inherit;"><?php
$getuip = mysql_fetch_assoc(mysql_query("SELECT ip_current FROM users WHERE id ='".$user['id']."' LIMIT 1"));
$isBanned = mysql_query("SELECT null FROM bans WHERE ip='".$getuip['ip_current']."' OR user_id='".$getuip['id']."' LIMIT 1") or die(mysql_error());
if(mysql_num_rows($isBanned) > 0)
{
	echo '<font style="vertical-align: inherit;font-size: 14.5px;margin-left: 15px;"><img src="{cdnurl}/images/icons/x.gif" class="ripping" style="position: relative;top: -2px;left: -10px;"><span style="color:#fb6363"><b>Banned</b>!</span></p>';
}else
{
	echo '<font style="vertical-align: inherit;font-size: 14.5px;margin-left: 15px;"><img src="{cdnurl}/images/icons/check.gif" class="ripping" style="position: relative;top: -2px;left: -10px;"><span style="color:#54ff54">Not banned.</span></p>';
}
?></font></font></h5>
</div>

</div>
<div class="col-md-8">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12 col-12">
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #e8c25a;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Rank </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="word-break: break-all;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);max-width: 68px;text-overflow: clip;white-space: nowrap;"><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">
 <?php

$getUser1 = mysql_query("SELECT * FROM users WHERE id ='".$user['id']."' AND hidden = '0'");
$userrank = mysql_fetch_array($getUser1);


$rankId = $userrank['rank'];

{
	$getRank = mysql_query("SELECT * FROM permissions WHERE id ='$rankId'");
}
$rank = mysql_fetch_array($getRank);


echo "".$rank['rank_name']."";
?>

</font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #A47D15;background-image: url({cdnurl}/images/star.png);background-repeat: no-repeat;background-position: center center;"></div>
</div>

<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);

	if($user['cms_currency_private'] == 1){ $OnlineStatus1 = "
	
		<div class='window_style_2' style='position: relative;height: 29px;width: 100%;margin-top: -29px;'>
<div class='inner' style='position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);'>
<div style='width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;'>
<span class='TextWaehrung' style='color: #e8c25a;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;margin-left: 2px;'>Credits </font></font></span>
<span class='count_number' data-amount='8653254' data-text='' style='text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'> 
Private
	</font></font></span>
</div>
</div>
<div class='inner' style='position: absolute;right: 0px;width: 29px;height: 29px;background-color: #A47D15;background-image: url({cdnurl}/images/icons/credits.gif);background-repeat: no-repeat;background-position: center center;'></div>
</div>
	
	"; } else { $OnlineStatus1 = "
	
"; }

?>
	<div class='window_style_2' style='position: relative; height: 29px;width: 100%;'>
<div class='inner' style='position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);'>
<div style='width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;'>
<span class='TextWaehrung' style='color: #e8c25a;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;margin-left: 2px;'>Credits </font></font></span>
<span class='count_number' data-amount='8653254' data-text='' style='text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'> 
<?php echo number($user['credits']); ?>
	</font></font></span>
</div>
</div>
<div class='inner' style='position: absolute;right: 0px;width: 29px;height: 29px;background-color: #A47D15;background-image: url({cdnurl}/images/icons/credits.gif);background-repeat: no-repeat;background-position: center center;'></div>
</div>
<?php echo $OnlineStatus1 ?>


<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);

	if($user['cms_currency_private'] == 1){ $OnlineStatus1 = "
	
		<div class='window_style_2' style='position: relative;height: 29px;width: 100%;margin-top: -29px;'>
<div class='inner' style='position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);'>
<div style='width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;'>
<span class='TextWaehrung' style='color: #3bd0f1;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);padding-left: 1px;'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;margin-left: 2px;'>Diamonds </font></font></span>
<span class='count_number' data-amount='8653254' data-text='' style='text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'> 
N/A
	</font></font></span>
</div>
</div>
<div class='inner' style='position: absolute;right: 0px;width: 29px;height: 29px;background-color: #006ea2;background-image: url({cdnurl}/images/icons/diamonds.gif);background-repeat: no-repeat;background-position: center center;'></div>
</div>
	
	"; } else { $OnlineStatus1 = "
	
"; }

?>
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #3bd0f1;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Diamonds </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php
								$getDiamonds = mysql_query("SELECT username,look,motto,amount FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND id = ". $user['id'] ."");
								while($diamondsCurrency = mysql_fetch_array($getDiamonds)) {
									echo ''.number($diamondsCurrency['amount']).'';}
						?></font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #006ea2;background-image: url({cdnurl}/images/icons/diamonds.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<?php echo $OnlineStatus1 ?>

</div>
<div class="col-md-6 col-xs-12  col-12">
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #e8c25a;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;margin-left: 2px;">VIP </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;"><?php

$getUser1 = mysql_query("SELECT * FROM users WHERE id ='".$user['id']."'");
$userrank = mysql_fetch_array($getUser1);


$rankId = $userrank['rank'];
if($rankId == 3 || $rankId == 2 || $rankId == 4 || $rankId == 5 || $rankId == 6 || $rankId == 7 || $rankId == 8 || $rankId == 9 || $rankId == 10 || $rankId == 11 || $rankId == 12 || $rankId == 13 || $rankId == 14 || $rankId == 15 || $rankId == 9 || $rankId == 16 || $rankId == 17 || $rankId == 18 || $rankId == 19) 
{
}else
	echo "Not VIP";
{
	$getRank = mysql_query("SELECT * FROM permissions WHERE id ='$rankId'");
}
$rank = mysql_fetch_array($getRank);

?>
<?php
$rankId = $userrank['rank'];
if($rankId == 1)
{
}else
	echo "Active";
{
	$getRank2 = mysql_query("SELECT * FROM permissions WHERE id ='$rankId'");
}
$rank2 = mysql_fetch_array($getRank);

?>
</font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #A47D15;background-image: url({cdnurl}/images/star.png);background-repeat: no-repeat;background-position: center center;"></div>
</div>


<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);

	if($user['cms_currency_private'] == 1){ $OnlineStatus1 = "
	
		<div class='window_style_2' style='position: relative;height: 29px;width: 100%;margin-top: -29px;'>
<div class='inner' style='position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);'>
<div style='width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;'>
<span class='TextWaehrung' style='color: #dd75ff;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;margin-left: 2px;'>Duckets </font></font></span>
<span class='count_number' data-amount='8653254' data-text='' style='text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'> 
Private
	</font></font></span>
</div>
</div>
<div class='inner' style='position: absolute;right: 0px;width: 29px;height: 29px;background-color: #aa54c5;background-image: url({cdnurl}/images/icons/duckets.gif);background-repeat: no-repeat;background-position: center center;'></div>
</div>
	
	"; } else { $OnlineStatus1 = "
	
"; }

?>
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #dd75ff;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Duckets </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php
								$getDuckets = mysql_query("SELECT username,look,motto,amount FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND id = ". $user['id'] ."");
								while($ducketsCurrency = mysql_fetch_array($getDuckets)) {
									echo ''.number($ducketsCurrency['amount']).'';}
						?></font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #aa54c5;background-image: url({cdnurl}/images/icons/duckets.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<?php echo $OnlineStatus1 ?>


<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);

	if($user['cms_currency_private'] == 1){ $OnlineStatus1 = "
	
		<div class='window_style_2' style='position: relative;height: 29px;width: 100%;margin-top: -29px;'>
<div class='inner' style='position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);'>
<div style='width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;'>
<span class='TextWaehrung' style='color: #fb0000;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;margin-left: 2px;'>Points</font></font></span>
<span class='count_number' data-amount='8653254' data-text='' style='text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'> 
N/A
	</font></font></span>
</div>
</div>
<div class='inner' style='position: absolute;right: 0px;width: 29px;height: 29px;background-color: #960303;background-image: url({cdnurl}/images/icons/points.gif);background-repeat: no-repeat;background-position: center center;'></div>
</div>
	
	"; } else { $OnlineStatus1 = "
	
"; }

?>
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #fb0000;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Points</font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php
								$getGOTW = mysql_query("SELECT username,look,motto,amount FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '101' AND id = ". $user['id'] ."");
								while($gotwCurrency = mysql_fetch_array($getGOTW)) {
									echo ''.number($gotwCurrency['amount']).'';}
						?></font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #960303;background-image: url({cdnurl}/images/icons/points.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<?php echo $OnlineStatus1 ?>


</div>
<div class="col-md-12">
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #34d639;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Last Online: </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php 
 $GetUsers = mysql_query("SELECT id,username,motto,rank,last_online,online,look,country,hidden FROM users WHERE id = '" . $user['id'] . "'");
                                                                $amount = mysql_num_rows($GetUsers);
                                                                while($Users = mysql_fetch_assoc($GetUsers))
                                                                {
                                                                  if($Users['online'] == 1){ $OnlineStatus = "Active right now!"; } else { $OnlineStatus = "". relativeTime($Users['last_online']). ""; }
echo "$OnlineStatus ";
																}
                                                        
                ?>  </font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #297b2c;background-image: url({cdnurl}/images/9.png);background-repeat: no-repeat;background-position: center center;"></div>
</div>
</div>
<div class="col-md-12">
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #34d639;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Registered On: </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo date("D j M Y ", $user['account_created']); ?></font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #297b2c;background-image: url({cdnurl}/images/9.png);background-repeat: no-repeat;background-position: center center;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
				
					$userList12 = mysql_query("SELECT creator_id FROM items_camera WHERE creator_id = '".$user['id']."'");
				  
				?>	
				
				
<?php
	$userList121 = mysql_query("SELECT time FROM items_camera WHERE creator_id = '".$user['id']."'");
?>	

<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<div style='margin-left:15px;margin-right:6px;margin-top:5px;'>

			<?php
			$checkBan = mysql_query("SELECT `cms_comment_banned` FROM `users` WHERE `cms_comment_banned` = '1' AND `id` = '".$_SESSION['user']['id']."' LIMIT 1");
						
			if(mysql_num_rows($checkBan) > 0)

			{
			echo '
			<h1 class="title">
                    <font style="vertical-align: inherit;">
					<font style="vertical-align: inherit;">
					<b><center>Banned from posting news comments!</center></b></font></font></h1>
			<div style="padding: 5px;">
			<p align="center">You\'re banned from posting news comments, due to this you cannot post comments.</p>
			</div>';
			}else
			{
			if(isset($_POST['post_comment']) && $_SESSION['user']['id'] != null)
			{
			$getArticle = mysql_query("SELECT * FROM `profile_comments` WHERE `profile_id` = '".$user['id']."'") or die(mysql_error());
			if (mysql_num_rows($getArticle) > 0)
			{
			$articleInfo = mysql_fetch_array($getArticle) or die(mysql_error());

			if (mysql_num_rows($checkBan) > 0)
			{
			$errorMessage = 'You\'re banned from leaving a comment.';
			}else
			{
			if($_POST['comment'] == NULL)
			{
			$errorMessage = 'You have left a field empty.';
			}else
			{
			$checkInfo = mysql_query("SELECT * FROM `profile_comments` WHERE `sender` = '".$_SESSION['user']['id']."' ORDER BY `id` DESC LIMIT 1") or die(mysql_error());
			$newsInfo = mysql_fetch_array($checkInfo);
			if($newsInfo['sender'] == $_SESSION['user']['id'])
			{
			$errorMessage = 'Hey! The last comment was from you, let somebody else comment first!';
			}else
			{
			mysql_query("INSERT INTO `profile_comments` (`profile_id`, `sender`, `comment`, `posted_on`) VALUES ('".$user['id']."', '".$_SESSION['user']['id']."', '".filter($_POST['comment'])."', '".date("M j, Y g:i A")."')") or die(mysql_error());
			$successMessage = 'You have successfully left a comment.';
			}
			}
			}
			}
			}

			echo'
			<h1 class="title" style="width: 100%;">
                    <font style="vertical-align: inherit;">
					<font style="vertical-align: inherit;">
					<b><center>Post Comment</center></b></font></font></h1>';

			if (isset($errorMessage))
			{
			echo '
			<div class="action-error flash-message">
			<div class="rounded">
			<div class="rounded-done"><div class="alert alert-danger" style="text-align: justify;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
                    </button>
                    <center><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
					'.$errorMessage.'</div></font></font></a></center></b></div>
			</div>
			</div>';
			}elseif (isset($successMessage))
			{
			echo '
			<div class="action-confirmation flash-message">
			<div class="rounded">
			<div class="rounded-done"><div class="alert alert-success" style="text-align: justify;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
                    </button>
                    <center><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
					'.$successMessage.'</div></font></font></a></center></b></div>
			</div>
			</div>';
			}

			echo '
			<form action="" method="post">
			<textarea class="form-control is-valid" name="comment" maxlength="500"></textarea><br /><br />
			<center><input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="post_comment" value="Post Comment" /></center>
			</form>
			
			';
			}
			?>
            </font>
           </div>
		    </div> </div>
					
<?php			
	$userList1 = mysql_query("SELECT profile_id FROM profile_comments WHERE profile_id = '".$user['id']."'");
?>	
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $user['username']; ?>'s Guestbook Has <b class="label label-primary1"><?php echo mysql_num_rows($userList1); ?></b> Comments</font></font></h1>

<div class="body" style="padding: 10px;overflow-y: scroll;height: 234px;">
<div style='height:350px;margin-left:5px;margin-right:6px;margin-top:5px;'>
<?php $getComments = mysql_query("SELECT * FROM `profile_comments` WHERE `profile_id` = '".$user['id']."' ORDER BY `id` DESC"); ?>

<?php
	if(mysql_num_rows($getComments) == 0)
		echo '<div class="alert alert-danger" style="text-align: justify;"><B><CENTER>Sorry, but no one has posted a comment yet!</B></CENTER></div>';
	else
	{
	echo '';
	while($commentInfo = mysql_fetch_array($getComments))
	{
	$userInfo = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$commentInfo['sender']."'"));

	echo '<table style="width: 485px;"><tbody><tr>
	<td width="90px" valign="top" style="position: relative;top: -50px;">
	
<div class="platte" style="float: left;margin-left: -5px;background:url({cdnurl}/images/plate.png) no-repeat;background-position: 50% 100%;width: 119px;height: 108px;margin-top: 60px;"><a href="{url}/home/'.$userInfo['username'].'"><div class="ripping"><img src="{imager}'.$userInfo['look'].'&head_direction=3&gesture=sml&action=wav" style="margin-left: 24px;margin-top: -24px;" data-toggle="tooltip" data-placement="top" data-original-title="'.$userInfo['username'].'"></a></div></div></td>
<td width="427px" valign="top"><br>
<div class="gaestebuch" style="width: 460px;margin-left: 15px;padding: 5px;">
<div class="row" style="background: #ffffff4f;padding: 10px;height: 140px;">
<div class="col-md-9">
<div class="card" style="width: 440px;height: 90px;"><div class="body" style="text-align: justify;text-justify: inter-word;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></br>'. htmlentities($commentInfo['comment']).'</font></font></div>
</div></div></div>
<div class="badge" style="position: relative;top: -32px;left: 100px;background-color: #cacaca;"><i>Posted by <a href="{url}/home/'.$userInfo['username'].'"><b>'.$userInfo['username'].'</b></a> <img src="{cdnurl}/images/flags_small/'.$userInfo['country'].'.png" style="height: 20px;" data-toggle="tooltip" data-placement="top" data-original-title="'. str_replace("-", " ", $userInfo['country']) .'"> on '.$commentInfo['posted_on'].'</i></div>

</div><div style="width: 465px;height:1px;background-color:#ccc;margin-top: -20px;margin-left: 15px;"></div></br>
	';
	
			if($userInfo['username'] == 'Danna')
			{
			echo '<img src="/game/c_images/album1584/CoOwner.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="CoOwner">';
			}
			elseif($userInfo['username'] == 'Justin' || $userInfo['username'] == 'n04h')
			{
			echo '<img src="/game/c_images/album1584/ZabOwner.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="ZabOwner">';
			}
			elseif($userInfo['rank'] == 18)
			{
			echo '<img src="/game/c_images/album1584/CommunityLeader.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="CommunityLeader">';
			}elseif($userInfo['rank'] == 17)
			{
			echo '<img src="/game/c_images/album1584/MANAGER.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="MANAGER">';
			}elseif($userInfo['rank'] == 16)
			{
			echo '<img src="/game/c_images/album1584/Administrator.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="Administrator">';
			}elseif($userInfo['rank'] == 15)
			{
			echo '<img src="/game//c_images/album1584/Moderator.gif" style="margin-top: -145px;margin-left: -25px;" data-toggle="tooltip" data-placement="top" data-original-title="Moderator">';
			}elseif($userInfo['rank'] == 14)
			{
			echo '<img src="/game//c_images/album1584/TrialModerator.gif" style="margin-top: -145px;margin-left: -25px;" data-toggle="tooltip" data-placement="top" data-original-title="TrialModerator">';
			}elseif($userInfo['events_rank'] == 14)
			{
			echo '<img src="/game//c_images/album1584/eventteam.gif" style="position: relative;margin-top: -190px;margin-left: -42px;" data-toggle="tooltip" data-placement="top" data-original-title="EventTeam">';
			}elseif($userInfo['events_rank'] == 13)
			{
			echo '<img src="/game//c_images/album1584/eventmanager.gif" style="position: relative;margin-top: -190px;margin-left: -42px;" data-toggle="tooltip" data-placement="top" data-original-title="EventManager">';
			}elseif($userInfo['rank_vip'] == 12)
			{
			echo '<img src="/game//c_images/album1584/SVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="SVIP">';
			}elseif($userInfo['rank_vip'] == 2)
			{
			echo '<img src="/game//c_images/album1584/GVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="GVIP">';
			}elseif($userInfo['rank_vip'] == 3)
			{
			echo '<img src="/game//c_images/album1584/DVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="DVIP">';
			}elseif($userInfo['rank_vip'] == 4)
			{
			echo '<img src="/game//c_images/album1584/EVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="EVIP">';
			}elseif($userInfo['rank_vip'] == 5)
			{
			echo '<img src="/game//c_images/album1584/PVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="PVIP">';
			}elseif($userInfo['rank_vip'] == 6)
			{
			echo '<img src="/game//c_images/album1584/FVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="FVIP">';
			}

			if ($_SESSION['user']['rank'] >= 15)
			{
			echo '</td><div style="float: left;position: relative;margin-left: 1px;margin-top: -25px;top: 160px;z-index: 99999999;"><a class="label label-pill label-warning" href="{url}/index.php?url=news&id='.$_GET['id'].'&deleteID='.$commentInfo['id'].'">Delete</a> | 
			<a class="label label-pill label-danger" href="{url}/index.php?url=news&id='.$_GET['id'].'&banID='.$commentInfo['id'].'">Ban</a></div>';
			}
			echo '</td>


	';
			}
			echo '</tbody></table>';
			} ?>						
								
            </div>
			</div>
			</div>
</div>
<div class="col-md-5">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $user['username']; ?>'s Avatar Stats Information</font></font></h1>
<table class="table table-striped" style="width: 100%;max-width: 100%;margin-bottom: 0px;">
<tbody>
<?php
				
					$Roomvisits = mysql_query("SELECT * FROM room_enter_log WHERE user_id = '".$user['id']."'");
				  
				?>	
<tr><td>Achievement Score:</td><td style="text-align: right;"><b><?php echo number($usersstats2['achievement_score']); ?></b></td><td><img src="{cdnurl}/images/star.png" align="right"></td></tr>
<tr><td>Total Online Time:</td><td style="text-align: right;"><b><?php echo OnlineTime($usersstats2['online_time']); ?></b></td><td><img src="{cdnurl}/images/online_time.gif" align="right"></td></tr>
<tr><td>Respects Received:</td><td style="text-align: right;"><b><?php echo number($usersstats2['respects_received']); ?></b></td><td><img src="{cdnurl}/images/respect.gif" align="right"></td></tr>
<tr><td>Respects Given:</td><td style="text-align: right;"><b><?php echo number($usersstats2['respects_given']); ?></b></td><td><img src="{cdnurl}/images/respect.gif" align="right"></td></tr>
<tr><td>Room Visits:</td><td style="text-align: right;"><b><?php echo mysql_num_rows($Roomvisits); ?></b></td><td><img src="{cdnurl}/images/room.png" align="right"></td></tr>

<?php

					$married_query = mysql_query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."' AND relation = '1'");
					$married_ship = mysql_fetch_assoc($married_query);
					$bff_query = mysql_query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."' AND relation = '2'");
					$bff_ship = mysql_fetch_assoc($bff_query);
					$ignored_query = mysql_query("SELECT * FROM messenger_friendships WHERE user_one_id = '".$user['id']."' AND relation = '3'");
					$ignored_ship = mysql_fetch_assoc($ignored_query);

					$married_user_query = mysql_query("SELECT * FROM users WHERE id = '".$married_ship['user_two_id']."'");
					$married_user = mysql_fetch_assoc($married_user_query);

					$bff_user_query = mysql_query("SELECT * FROM users WHERE id = '".$bff_ship['user_two_id']."'");
					$bff_user = mysql_fetch_assoc($bff_user_query);

					$ignored_user_query = mysql_query("SELECT * FROM users WHERE id = '".$ignored_ship['user_two_id']."'");
					$ignored_user = mysql_fetch_assoc($ignored_user_query);

					if (!$married_user['username']) {
						$married_user['username'] = "<span onclick='return false;'>Nobody</span>";
					}
					if (!$bff_user['username']) {
						$bff_user['username'] = "<span onclick='return false;'>Nobody</span>";
					}
					if (!$ignored_user['username']) {
						$ignored_user['username'] = "<span onclick='return false;'>Nobody</span>";
					}

					echo '
					<tr><td>Heart:</td><td style="text-align: right;"><b><i><a href="{url}/home/'.$married_user['username'].'">'.$married_user['username'].'</i></b></a></td><td><img src="{cdnurl}/images/heart.png" align="right"></td></tr>
					<tr><td>Smile:</td><td style="text-align: right;"><b><i><a href="{url}/home/'.$bff_user['username'].'">'.$bff_user['username'].'</i></b></td></a><td><img src="{cdnurl}/images/smile.png" align="right"></td></tr>
					<tr><td>Bobba:</td><td style="text-align: right;"><b><i><a href="{url}/home/'.$ignored_user['username'].'">'.$ignored_user['username'].'</i></b></td></a><td><img src="{cdnurl}/images/bobba.png" align="right"></td></tr>';
				?>


</tbody></table>
</div>
</div>
	<?php
				
					$userList = mysql_query("SELECT badge_code FROM users_badges WHERE user_id = '".$user['id']."'");
				  
				?>					

<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $user['username']; ?> Has <b class="label label-primary1"><?php echo mysql_num_rows($userList); ?></b> Badges So Far!</font></font></h1>
<div style='height:235px;overflow-y:scroll;margin-left:5px;margin-right:5px;margin-top:5px;'>
<?php
if($user['rank'] == 5)
{
	$getBadges = mysql_query("SELECT * FROM `users_badges` WHERE `user_id` = '".$user['id']."' AND badge_code <> 'ADM'");
}else
{
	$getBadges = mysql_query("SELECT * FROM `users_badges` WHERE `user_id` = '".$user['id']."'");
}
if (mysql_num_rows($getBadges) == 0)
echo '<center>You do not have any badges!</center>';
else
{
while ($badgeInfo = mysql_fetch_array($getBadges))
{
echo '<img data-toggle="tooltip" data-placement="top" data-original-title="'.$badgeInfo['badge_code'].'" src="/game/c_images/album1584/'.$badgeInfo['badge_code'].'.gif" style="display:inline; padding: 5px 5px 5px 5px;" draggable="false">';
}
}

?>

</center>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>


<?php
}?>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>
