<!DOCTYPE html>
<html class="no-js?<?php echo time() ?>" lang="en">
	<head>
		<title>{shortname} ~ Maintenance!</title>
		<meta charset="UTF-8">
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Join millions in the planet&apos;s most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{longname}">
		<meta property="og:title" content="{shortname} ~ Maintenance!">
		<meta property="og:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta property="og:url" content="{url}/maintenance">
		<meta property="og:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta property="og:image:height" content="628">
		<meta property="og:image:width" content="1200">
		<meta name="twitter:card" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:title" content="{shortname} ~ Maintenance!">
		<meta name="twitter:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta name="twitter:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:site" content="@{twitter}">
		<meta itemprop="name" content="{shortname} ~ Maintenance!">
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
				 <h3 class='uk-card-title chocolate__title__rainbow '><b>Hey {username}, {longname} is undergoing maintenance!</b></h3>
					  <div class='uk-margin'>
						  <div class='uk-inline'>
						 <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
						It looks like you don't have permission to access {longname} at the moment! </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
						</br>
						We are in maintenance mode you will be logged out of your account in <strong><span id="time">30</span></strong> seconds...
						</font></font></p>
                          	<center><h3 style="text-align: center;"><strong><img src="https://media.discordapp.net/attachments/1062837306702168145/1162872616319733840/frank_whoops.png" alt="" data-cke-saved-src="{cdnurl}/{cdn-name}/img/Frank_111.gif" style="position:  relative;margin-left:  95px;margin-bottom:  -30px;"></strong></h3></center>
						  </div>
					  </div>

					<p class='habbo habbo-extra' style='width: auto;'>
						<span uk-icon='icon: question'></span>&nbsp;Discord Server: <a href="{discord}"><b>Join Our Discord</b></a>
					</p>

			  </div>
		   </div>
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	function startTimer(duration, display) {
		var timer = duration, minutes, seconds;
		setInterval(function () {
			minutes = parseInt(timer / 60, 05);
			seconds = parseInt(timer % 60, 10);

			minutes = minutes < 05 ? "0" + minutes : minutes;
			seconds = seconds < 05 ? "0" + seconds : seconds;

			display.text(seconds);

			if (--timer < 0) {
				timer = duration;
			}
		}, 1000);
	}
	jQuery(function ($) {
		var fiveMinutes = 30,
			display = $('#time');
		startTimer(fiveMinutes, display);
	});						
	$(document).ready(function () {
		window.setTimeout(function () {
			location.href = "{url}/logout";
		}, 30000);
	});	
</script>
		  <div class='uk-width-1-2@m uk-visible@m'>
              <div class="uk-margin habbo habbo-opaque uk-card uk-card-default uk-card-body" style='padding-top: 35px; padding-bottom: 35px;margin-top: 115px'>
                <dl class="uk-description-list uk-description-list-divider" style="margin-left: 6px;">
				<dt><span uk-icon='icon: lifesaver'></span> <b>Sorry, {longname} is on Maintenance Mode.</b></dt>
				<dd>You're seeing this page because {longname} is currently undergoing updates or we're fixing bugs and you do not have permission to accees {longname} during maintenance.</dd>
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