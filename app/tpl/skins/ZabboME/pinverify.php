<?php require_once ('/includes/checktheban.php'); ?>
<?php require_once ('/includes/maintenance_access.php'); ?>

<!DOCTYPE html>
<html class="no-js?<?php echo time() ?>" lang="en">
	<head>
		<title>{shortname} ~ Verify PIN!</title>
		<meta charset="UTF-8">
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Join millions in the planet&apos;s most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{longname}">
		<meta property="og:title" content="{shortname} ~ Verify PIN!">
		<meta property="og:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta property="og:url" content="{url}/account/verify">
		<meta property="og:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta property="og:image:height" content="628">
		<meta property="og:image:width" content="1200">
		<meta name="twitter:card" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:title" content="{shortname} ~ Verify PIN!">
		<meta name="twitter:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta name="twitter:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:site" content="@{twitter}">
		<meta itemprop="name" content="{shortname} ~ Verify PIN!">
		<meta itemprop="description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta itemprop="image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="description" content="Check into {longname} the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more..." />
		<meta name="keywords" content="{longname}, zabbo.me, Zabbo, zabbo.co, {shortname}, habbo.click, habbo.com, Habbo, Habbo HTML5, boon.pw, boon, habboon.com, habboon, freshhotel.com, freshhotel, fresh hotel, fresh-hotel, fresh-hotel.org, hablush, hablush.com, hablush.co, playrise, playrise.com, habdab, habdab.gq, traker.pro, traker, findretros, thehabbos, findretros.com, thehabbos.org, habbo ranking, habbolist, tophabbos, top habbo retro, habbo retros, html5 retros, habbo html5, habbo ranking list, top retros, top habbo, habbo topstats, habbo hotel, virtual, world, social network, free, community, avatar, chat, online, teen, roleplaying, join, social, groups, forums, safe, play, games, online, friends, teens, rares, rare furni, collecting, create, collect, connect, furni, furniture, pets, room design, sharing, expression, badges, hangout, music, celebrity, celebrity visits, celebrities, mmo, mmorpg, massively multiplayer" />
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/typeface-ubuntu-condensed@0.0.44/index.min.css?<?php echo time() ?>'>
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.32/dist/css/uikit.min.css?<?php echo time() ?>'>
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css?<?php echo time() ?>'>
		<link rel="dns-prefetch" href="//ajax.googleapis.com">
		<link rel="dns-prefetch" href="//google-analytics.com" />
		<link rel="icon" href="{cdnurl}/favicon.ico?<?php echo time() ?>" />
		<link rel='stylesheet' href='{cdnurl}/pin/css/pin.css?<?php echo time() ?>'>
	</head>
	<body>
<?php
	$pin = mysql_query("SELECT * FROM user_secure WHERE user = '" . $_SESSION['user']['id'] . "'");
		$assoc = mysql_fetch_assoc($pin);

			if($assoc['verified_ip'] === $_SERVER['REMOTE_ADDR'])
			{
				header('Location: '.$_CONFIG['hotel']['url'].'/me');
					exit;
			}

			if(!isset($_SESSION['user']['id']))
			{
				die('You are not logged in.');
			}
	$myIP = preg_replace('/(?!\d{1,3}\.\d{1,3}\.)\d/', 'X', $assoc['verified_ip']);
?>
	<div class='uk-container uk-margin-large-top'>
		<div uk-grid>
		<div class='uk-width1-1@s uk-width-1-3@m'>
			<center class='uk-margin'>
			    <a href="{url}"><img class='shine' src='{cdnurl}/images/logo.png?<?php echo time() ?>' /></a>
			</center>
			<div class='habbo uk-card uk-card-default uk-card-body'>
				 <h3 class='uk-card-title chocolate__title__rainbow '><b>Welcome back {username}, please enter your PIN</b></h3>
<?php
if(isset($_POST['CheckPin']))
	{		
		global $core;
		
		$pin1 = filter($_POST['Pin1']);
		$pin2 = filter($_POST['Pin2']);
		$pin3 = filter($_POST['Pin3']);
		$pin4 = filter($_POST['Pin4']);

		$pin = $pin1 . $pin2 . $pin3 . $pin4;
		
		if(is_numeric($pin))
		{											
			if(mysql_num_rows(mysql_query("SELECT * FROM user_secure WHERE user = '" . $_SESSION['user']['id'] . "' AND pin = '" . $core->pinhashed($pin) . "'")) > 0)
			{
				if($_SESSION['user']['rank'] > 3)
				{
						mysql_query("INSERT INTO staff_login_logs(action,ipaddress,username,timestamp) VALUES('Successfully Verified staff pin', '" . $_SERVER['REMOTE_ADDR'] . "', '" . $_SESSION['user']['username'] . "','" . time() . "') ");
				}
				
				mysql_query("UPDATE user_secure SET verified_ip = '" . $_SERVER['REMOTE_ADDR'] . "' WHERE user = '" . $_SESSION['user']['id'] . "'");
				header('Location: '.$_CONFIG['hotel']['url'].'/me');
				exit;
			}
			else
			{
				if(mysql_num_rows(mysql_query("SELECT * FROM badges WHERE user_id = '" . $_SESSION['user']['id'] . "' AND badge_id = '11'")) > 0)
				{
						mysql_query("INSERT INTO staff_login_logs(action,ipaddress,username,timestamp) VALUES('Incorrect staff pin', '" . $_SERVER['REMOTE_ADDR'] . "', '" . $_SESSION['user']['username'] . "','" . time() . "') ");
				}
				
				echo "<div class='error'>Invalid PIN, access denied!</div>";
			}
		}
		else
		{
			echo "<div class='error'>The PIN you have chosen is invalid. Make sure all blank fields are filled!!</div>";												
		}										
	}
?>				
	<div class='uk-margin'>
		  <center><div class='uk-inline'>
		  <form action="" method="POST">
				    <select class="uk-select" name='Pin1' style="height:50px;width:56px;font-size:xx-large;">
						<option>--</option>
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
					</select>
					<select class="uk-select" name='Pin2' style="height:50px;width:56px;font-size:xx-large;">
						<option>--</option>
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
					</select>
					<select class="uk-select" name='Pin3' style="height:50px;width:56px;font-size:xx-large;">
						<option>--</option>
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
					</select>
					<select class="uk-select" name='Pin4' style="height:50px;width:56px;font-size:xx-large;">
						<option>--</option>
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
					</select>
				<br /><br />
				<button type="submit" name="CheckPin" class="uk-button uk-button-default chocolate__button__primary">Enter {longname}</button>
		  </div></center>
	</div>
				<p class='habbo habbo-extra' style='width: auto;'>
					<span uk-icon='icon: question'></span> Not <b>{username}</b>? Click <a href="{url}/logout"><b>here</b></a>  to login with a different account!
				</p>
				
				<div style='text-align:center;padding:8px;color:white;background:#FA4D4D;margin-bottom:4px;'>Last Verified IP: <?php echo $myIP; ?></div>
				<br />
				<center><p class='habbo habbo-extra' style='width: auto;'>				
					 <b><i>E-Mail Address PIN Reset</b></i>: <a href="{url}/resetpin.php" target="_blank">{url}/resetpin.php</a>
					 <br />
					 <b><i>Discord Support PIN Reset</b></i>: <a href="{discord}" target="_blank">{discord}</a>
				</p></center>
		    </div> 
		</div>
			<div class='uk-width-1-2@m uk-visible@m'>
				<div class="uk-margin habbo habbo-opaque uk-card uk-card-default uk-card-body" style='padding-top: 15px; padding-bottom: 15px;margin-top: 115px'>
					<dl class="uk-description-list uk-description-list-divider" style="margin-left: 6px;">
						<dt><span uk-icon='icon: question'></span> <b>What's Pin Verification</b></dt>
						<dd>Our pin verification system detects if your '<b><i>{username}</b></i>' account has accessed from a <br /><b>NEW IP ADDRESS OR VPN</b>. Our pin verification page will show if you access {longname} from another WiFi access point that you didn't last play {longname} on.</dd>
						<dt><span uk-icon='icon: heart'></span> <b>Our PIN System Is Used For</b></dt>
						<dd>{longname} has made our own pin verification to protect you! This is just in-case your data or passwords, have been put at risk by other Habbo Retros or members of those Retros! Here at {shortname} we take our users safety very serious, which is why we created the pin system!</dd>
						<dt><span uk-icon='icon: lifesaver'></span> <b>How does having a pin protect you?</b></dt>
						<dd>The benefit to using our pin verification, would be if you play other Habbo Retro you wouldn't have to worry about if their database gets leaked since our pin verification systems stops any hackers from accessing your {shortname} account in-game. This feature is mostly for the people who Retro Hop or use the same passwords on Habbo Retros.</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
		<script src='https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js'></script>
		<script src='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.32/dist/js/uikit.min.js'></script>
		<script async src='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.33/dist/js/uikit-icons.min.js'></script>
    </body>
</html>