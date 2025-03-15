<?php 
$getBan = mysql_query("SELECT * FROM `bans` WHERE `value` = '".$_SESSION['user']['username']."' OR `value` = '".$_SERVER['REMOTE_ADDR']."'");
if(mysql_num_rows($getBan) == 0) 
{
	header("Location: /me");
	exit;
} 

$getInfo = mysql_fetch_assoc($getBan);
if(time() > $getInfo['expire'])
{
	mysql_query("DELETE FROM `bans` WHERE `value` = '".$_SESSION['user']['username']."' OR `value` = '".$_SERVER['REMOTE_ADDR']."'") or die(mysql_error());
	header("Location: me");
	exit;
}
?>

<!DOCTYPE html>
<html class="no-js?<?php echo time() ?>" lang="en">
	<head>
		<title>{shortname} ~ You're IP Banned!</title>
		<meta charset="UTF-8">
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Join millions in the planet&apos;s most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{longname}">
		<meta property="og:title" content="{shortname} ~ You're IP Banned!">
		<meta property="og:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta property="og:url" content="{url}/ipbanned">
		<meta property="og:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta property="og:image:height" content="628">
		<meta property="og:image:width" content="1200">
		<meta name="twitter:card" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:title" content="{shortname} ~ Create PIN!">
		<meta name="twitter:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta name="twitter:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:site" content="@{twitter}">
		<meta itemprop="name" content="{shortname} ~ Create PIN!">
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
			  <div class='uk-container'>
			<div class='habbos__online'>
			  <img src='{cdnurl}/images/online.gif' style='margin-top: -3px;'/></a> {online} User(s) Online
			</div>
			<div class='habbos__online__registration'>
			  <?php echo (mysql_num_rows(mysql_query("SELECT NULL FROM users"))); ?> Registered Users
			</div>
		  </div>
<div class='uk-container uk-margin-large-top'>
		<div uk-grid>
		<div class='uk-width1-1@s uk-width-1-3@m'>
			<center class='uk-margin'>
			    <a href="{url}"><img class='shine' src='{cdnurl}/images/logo.png?<?php echo time() ?>' /></a>
			</center>


			 <div class='habbo uk-card uk-card-default uk-card-body'>
				 <h3 class='uk-card-title chocolate__title__rainbow '><b>Hey {username}, Your Account is IP Banned!</b></h3>
					  <div class='uk-margin'>
						  <div class='uk-inline'>
							Here is some information regarding your IP Ban.
						<hr/>
						<b>IP Banned by:</b> <?php echo $getInfo['added_by']; ?><br/>
						<b>Type Of Ban:</b> <?php echo $getInfo['bantype']; ?><br/>
						<b>IP Ban Reason:</b> <?php echo $getInfo['reason']; ?><br/>
						<b>Date of IP ban:</b>  <?php echo date("D, d F Y H:i (P)", $getInfo['added_date']); ?><br/>
						<b>IP Ban Expiry Date:</b> <?php echo date("D, d F Y H:i (P)", $getInfo['expire']); ?><br/>
							
						  </div>
					  </div>

					<p class='habbo habbo-extra' style='width: auto;'>
						<span uk-icon='icon: question'>  </span> Not the page you wanted? Click <a href="{url}/logout"><b>here</b></a> to go back!
					</p>

			  </div>
		   </div>

		  <div class='uk-width-1-2@m uk-visible@m'>
              <div class="uk-margin habbo habbo-opaque uk-card uk-card-default uk-card-body" style='padding-top: 35px; padding-bottom: 35px;margin-top: 115px'>
                <dl class="uk-description-list uk-description-list-divider" style="margin-left: 6px;">
				<dt><span uk-icon='icon: lifesaver'></span> <b>You have been banned from playing {longname}!</b></dt>
				<dd>You've been banned from playing {longname} for not following our rules, {longname} is a game to enjoy and have fun not break the rules.
				<br/><br/>
				If you want to appeal your IP Ban - <a href="{discord}"><b>Click here</b></a>!
				</dd>
			  </dl>
		  </div>
		</div>
		</div>
	  </div>
	</div>
		<script src='https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js'></script>
		<script src='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.32/dist/js/uikit.min.js'></script>
		<script async src='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.33/dist/js/uikit-icons.min.js'></script>
    </body>
</html>
  </body>
</html>
