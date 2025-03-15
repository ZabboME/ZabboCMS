<?php require_once ('/includes/checktheban.php'); ?>
<?php require_once ('/includes/maintenance_access.php'); ?>

<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>{shortname} ~ Disconnected!</title>
<meta name="robots" content="404, follow">
<meta name="description" content="Check into {shortname} Hotel one of the world's largest virtual retro hotels for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more..."/>
<meta property="og:url" content="{url}/404">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@{shortname}ME"/> 
<meta name="twitter:title" content="{shortname} Hotel ~ Virtual World, Avatar Chat and Pixel Art!">
<meta name="twitter:description" content="Check into {shortname} Hotel one of the world's largest virtual retro hotels for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta itemprop="description" content="Check into one of the world\'s largest virtual retro hotels for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta itemprop="name" content="{shortname} Hotel">
<meta property="og:description" content="Check into {shortname} Hotel one of the world's largest virtual retro hotels for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta name="keywords" content="{shortname} Hotel, {shortname}, retro hotel, habbo, habbo hotel, habbo retros, habbo retro, retros, fresh, fresh-hotel, virtual, world, social network, free, community, avatar, chat, online, teen, roleplaying, join, social, groups, forums, safe, play, games, online, friends, teens, rares, rare furni, collecting, create, collect, connect, furni, furniture, pets, room design, sharing, expression, badges, hangout, music, celebrity, celebrity visits, celebrities, mmo, mmorpg, massively multiplayer, otaku, ragezone, devbest, retroslist, thehabbos, phoenix, phx, phoenix emulator, emulator, revcms, ubercms, butterfly, bfly, free credits, free coins, coins, credits"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="rccount" content="0">
<link rel="icon" href="{cdnurl}/favicon.ico?<?php echo time() ?>" type="image/x-icon"/>
</head>
<body id="home">
<body>
<style>
html {
background-image: linear-gradient(to right, #30e8bf8c, #311b626b),url(./images/hotel_view_me.png);
background-size: cover;
image-rendering: optimizeSpeed;
image-rendering: crisp-edges;
image-rendering: pixelated;
height: 100%;
width: 100%;
}

.client-disconnect-overlay {
z-index:9990!important;
position:absolute;
left:0;
top:0;
bottom:0;
right:0;
background-image:url({cdnurl}/images/client/landing_super_bg.png);
text-align:center;
}

.client-disconnect-overlay .client-landing-image,.client-loading-overlay .client-landing-image {
z-index:9991!important;
position:absolute;
bottom:0;
}

.client-loading-overlay .client-landing-left,.client-disconnect-overlay .client-landing-left {
left:0;
height:500px;
width:400px;
background:url({cdnurl}/images/client/landing_super_left.png);
background-repeat:no-repeat;
}

.client-loading-overlay .client-landing-right,.client-disconnect-overlay .client-landing-right {
right:0;
height:700px;
width:388px;
background:url({cdnurl}/images/client//landing_super_right.png);
background-repeat:no-repeat;
}

.client-loading-overlay .client-loading-logo,.client-disconnect-overlay .client-disconnect-logo {
background:url({cdnurl}/images/design/logo/logo_1.gif);
background-position: top center;
background-repeat: no-repeat;
width: 266px;
height: 480px;
margin-left: auto;
margin-right: auto;
margin-top: -60px;
}

.client-loading-overlay .client-loading-info,.client-disconnect-overlay .client-disconnect-info {
z-index:9999!important;
position:absolute;
width:300px;
height:auto;
margin-left:auto;
margin-right:auto;
bottom:auto;
left:0;
right:0;
}

.client-disconnect-overlay .disconnect-box:first-child,.client-loading-overlay .loading-box:first-child {
margin-top:0;
}

.client-loading-overlay .loading-text,.client-disconnect-overlay .disconnect-text {
font-family:Tahoma,Helvetica,Arial,sans-serif;
font-size:12px;
font-weight:400;
margin-top:0;
color:#fff;
}

.client-disconnect-overlay .disconnect-button {
font-family:Tahoma,Helvetica,Arial,sans-serif;
font-weight:400;
font-size:22px;
display:block;
width:100%;
}

.button-green,.button-success,.button-login {
background:#00813e;
border:2px solid #8eda55;
display:inline-block;
color:#fff;
-webkit-box-shadow:0 0 0 1px rgba(50,50,50,1);
-moz-box-shadow:0 0 0 1px rgba(50,50,50,1);
box-shadow:0 0 0 1px rgba(50,50,50,1);
padding:10px;
}

.button-login:hover,.button-green:hover,.button-success:hover {
background:#00ab54;
border:2px solid #b9f373;
}

.black-outline {
-webkit-box-shadow:0 0 0 1px rgba(50,50,50,1);
-moz-box-shadow:0 0 0 1px rgba(50,50,50,1);
box-shadow:0 0 0 1px rgba(50,50,50,1);
}

.rounded {
border-radius:4px 4px 4px 4px;
-webkit-border-radius:4px 4px 4px 4px;
-moz-border-radius:4px;
-o-border-radius:4px 4px 4px 4px;
}

.client-loading-overlay .loading-box,.client-disconnect-overlay .disconnect-box {
background:rgba(0,0,0,.2);
margin-top:5px;
border-bottom:2px solid rgba(0,0,0,.4);
padding:5px 10px;
}

.spacer-tiny {
margin-top:5px;
}

.client-loading-overlay .loading-text-massive,.client-disconnect-overlay .disconnect-text-massive {
font-size:40px!important;
}

.uppercase {
text-transform:uppercase!important;
}

.spacer {
margin-top:20px;
}

div.rounded,div.rounded-done {
padding:10px!important;
}

.centered {
text-align:center!important;
}

.btn-hover:hover {
opacity:.8;
cursor:pointer;
}

.button {
cursor:pointer;
font-size:25px;
}
.ripping {
    -webkit-filter: drop-shadow(2px 1px 0 #fff) drop-shadow(-2px 1px 0 #fff) drop-shadow(0 -2px 0 #fff);
}
</style>
<body>
<div id="client-disconnect-overlay" class="client-disconnect-overlay default-cursor not-selectable" unselectable="on">
<div class="client-landing-image client-landing-left"></div>
<div class="client-landing-image client-landing-right"></div>
<div class="ripping"><div class="client-disconnect-logo" style="position: relative;top: 280px;left: -2px;"></div></div>
<div class="spacer-tiny"></div>
<div class="client-disconnect-info centered" style="position: relative;left: -2px;top: -80px;">
<div class="disconnect-box black-outline rounded centered">
<div class="disconnect-text disconnect-text-massive">
Disconnected!
</div>
</div>
<div class="spacer"></div>
<button type="submit" id="disconnect-reload-button" class="disconnect-button button button-green uppercase rounded black-outline">
Reconnecting
<p>You'll automatically be reconnected to {longname} in <strong><span id="time">05</span></strong> seconds.</p>
</button>
</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	function startTimer(duration, display) {
		var timer = duration, minutes, seconds;
		setInterval(function () {
			minutes = parseInt(timer / 60, 05);
			seconds = parseInt(timer % 60, 05);

			minutes = minutes < 05 ? "0" + minutes : minutes;
			seconds = seconds < 05 ? "0" + seconds : seconds;

			display.text(seconds);

			if (--timer < 0) {
				timer = duration;
			}
		}, 1000);
	}

	jQuery(function ($) {
		var fiveMinutes = 05,
			display = $('#time');
		startTimer(fiveMinutes, display);
	});						

	$(document).ready(function () {
		window.setTimeout(function () {
			location.href = "{url}/client";
		}, 5000);
	});	
</script>
</body>
<?php require('includes/checktheban.php'); ?>
</html>