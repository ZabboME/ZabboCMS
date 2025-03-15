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

require_once ('/includes/checktheban.php'); ?>
<?php require_once ('/includes/maintenance_access.php'); ?>

<!DOCTYPE html>
<html class="no-js?<?php echo time() ?>" lang="en">
	<head>
		<title>{shortname} ~ No Access!</title>
		<meta charset="UTF-8">
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Join millions in the planet&apos;s most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{longname}">
		<meta property="og:title" content="{shortname} ~ Create PIN!">
		<meta property="og:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta property="og:url" content="{url}/account/newpin">
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
<div class='uk-container uk-margin-large-top'>
		<div uk-grid>
		<div class='uk-width1-1@s uk-width-1-3@m'>
			<center class='uk-margin'>
			    <a href="{url}"><img class='shine' src='{cdnurl}/images/logo.png?<?php echo time() ?>' /></a>
			</center>


			 <div class='habbo uk-card uk-card-default uk-card-body'>
				 <h3 class='uk-card-title chocolate__title__rainbow '><b>Hey There {username}, you do not have access!</b></h3>
					  <div class='uk-margin'>
						  <div class='uk-inline'>
						  <p>Your IP has been logged for trying to access an URL you don't have permissions to do so!</p>
                          	<center><h3 style="text-align: center;"><strong><img src="{cdnurl}/images/Frank_111.gif" alt="" data-cke-saved-src="{cdnurl}/{cdn-name}/img/Frank_111.gif" style="position:  relative;margin-left:  95px;margin-bottom:  -30px;"></strong></h3></center>
						  </div>
					  </div>

					<p class='habbo habbo-extra' style='width: auto;'>
						<span uk-icon='icon: question'>  </span> Not the page you wanted? Click <a href="{url}/me"><b>here</b></a> to go back!
					</p>

			  </div>
		   </div>

		  <div class='uk-width-1-2@m uk-visible@m'>
              <div class="uk-margin habbo habbo-opaque uk-card uk-card-default uk-card-body" style='padding-top: 35px; padding-bottom: 35px;margin-top: 115px'>
                <dl class="uk-description-list uk-description-list-divider" style="margin-left: 6px;">
				<dt><span uk-icon='icon: lifesaver'></span> <b>Sorry, but you don't have access to the page you requested.</b></dt>
				<dd>Please try typing a URL again. If you end up back here, please use the 'Here' button to get back to where you started.</dd>
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