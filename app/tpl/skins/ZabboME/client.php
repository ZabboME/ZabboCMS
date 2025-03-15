<?php require_once ('/includes/checktheban.php'); ?>
<?php require_once ('/includes/maintenance_access.php'); ?>
<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{shortname} ~ Client</title>
		<meta charset="UTF-8">
		<base href="{swfurl}">
		<meta name="permissions-policy" content="microphone=(self)">
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Join millions in the planet&apos;s most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{longname}">
		<meta property="og:title" content="{shortname} ~ Beta">
		<meta property="og:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta property="og:url" content="{url}/404">
		<meta property="og:image" content="{cdnurl}/images/app_summary_image.gif?<?php echo time() ?>">
		<meta property="og:image:height" content="514">
		<meta property="og:image:width" content="514">
		<meta name="twitter:card" content="{cdnurl}/images/app_summary_image.gif?<?php echo time() ?>">
		<meta name="twitter:title" content="{shortname} ~ Beta">
		<meta name="twitter:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta name="twitter:image" content="{cdnurl}/images/app_summary_image.gif?<?php echo time() ?>">
		<meta name="twitter:site" content="@{twitter}">
		<meta itemprop="name" content="{shortname} ~ Beta">
		<meta itemprop="description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta itemprop="image" content="{cdnurl}/images/app_summary_image.gif?<?php echo time() ?>">
		<meta name="description" content="Check into {longname} the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more..." />
		<meta name="keywords" content="{longname}, zabbo.me, Zabbo, zabbo.co, {shortname}, habbo.click, habbo.com, Habbo, Habbo HTML5, boon.pw, boon, habboon.com, habboon, freshhotel.com, freshhotel, fresh hotel, fresh-hotel, fresh-hotel.org, hablush, hablush.com, hablush.co, playrise, playrise.com, habdab, habdab.gq, traker.pro, traker, findretros, thehabbos, findretros.com, thehabbos.org, habbo ranking, habbolist, tophabbos, top habbo retro, habbo retros, html5 retros, habbo html5, habbo ranking list, top retros, top habbo, habbo topstats, habbo hotel, virtual, world, social network, free, community, avatar, chat, online, teen, roleplaying, join, social, groups, forums, safe, play, games, online, friends, teens, rares, rare furni, collecting, create, collect, connect, furni, furniture, pets, room design, sharing, expression, badges, hangout, music, celebrity, celebrity visits, celebrities, mmo, mmorpg, massively multiplayer" />
		<link rel="dns-prefetch" href="//ajax.googleapis.com">
		<link rel="stylesheet" href="{cdnurl}/client/css/app.css?<?php echo time() ?>" type="text/css"/>
		<link rel="stylesheet" href="{cdnurl}/clientnew/client_plugins.css?<?php echo time() ?>" type="text/css"/>
		<link rel="stylesheet" href="{cdnurl}/client/css/disconnected.css?<?php echo time() ?>" type="text/css"/>
		<script src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
		<link rel="preload" as="style" href="{cdnurl}/client/css/app.01d3072f.css?v=<?php echo time() ?>" />
		<link rel="stylesheet" href="{cdnurl}/client/css/app.01d3072f.css?v=<?php echo time() ?>" />
		<link rel="dns-prefetch" href="//google-analytics.com" />
		<link rel="icon" href="{cdnurl}/favicon.ico?<?php echo time() ?>" />
		<style>
		body {
			margin: 0;
			position: fixed;
			width: 100%;
			height: 100%;
		}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<iframe id="nitro" src="{swfurl}/react/index.html?sso={sso}" width="100%" height="100%" frameborder="0" class="absolute top-0 left-0 m-0 h-full w-full overflow-hidden border-none p-0"></iframe>
	
	<div id="disconnected" class="h-screen w-full">
		<div class="absolute h-full w-full bg-black bg-opacity-50"></div>
	
		<div class="relative flex h-full w-full flex-col items-center justify-center gap-4">
			<h2 class="text-2xl text-white">
				Whoops! It seems like you have been disconnected...
			</h2>
	
			<div class="flex gap-x-4">
				<a target="_blank" href="{url}/me">
					<button type="submit" class="w-full rounded bg-green-600 hover:bg-green-700 text-white p-2 border-2 border-green-500 transition ease-in-out duration-150 font-semibold">
					Back to website
					</button>
					</a>
	<button
		class="py-2 px-4 text-white rounded bg-eeb425 border-2 transition ease-in-out"
		onclick="reloadClient()">
		Reload client
	</button>
			</div>
		</div>
	</div>
<?php
$result = mysql_query("SELECT * FROM users WHERE id = '" . filter($user['id']) . "' AND client_menu = '0'");
										
if (mysql_num_rows($result) == 1)
echo ' ';
{
while ($row = mysql_fetch_array($result)) {{
$ip          = $row['verified_ip'];

 require_once ('/includes/client_addons.php');
	}
	}
	}
?>

<div id="refreshreward">
	<script>
		var refreshIdReward = setInterval(function()
		{
			 $('#refreshreward').load('{url}/dailyreward');
		}, 10000);
	</script>
</div>
		
<div id="refreshreminder">
	<script>
		var refreshIdReminder = setInterval(function()
		{
			 $('#refreshreminder').load('{url}/rewardreminder');
		}, 600000);
	</script>
</div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" type="text/javascript"></script>	
		
<!--<script type="text/javascript" src="https://retro.itsbeats.net/index.js"></script>-->
<style>
.tooltip{position:absolute;z-index:1070;display:block;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:12px;font-style:normal;font-weight:400;line-height:1.42857143;text-align:left;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;letter-spacing:normal;word-break:normal;word-spacing:normal;word-wrap:normal;white-space:normal;filter:alpha(opacity=0);opacity:0;line-break:auto}.tooltip.in{filter:alpha(opacity=90);opacity:.9}.tooltip.top{padding:5px 0;margin-top:-3px}.tooltip.right{padding:0 5px;margin-left:3px}.tooltip.bottom{padding:5px 0;margin-top:3px}.tooltip.left{padding:0 5px;margin-left:-3px}.tooltip-inner{max-width:200px;padding:3px 8px;color:#fff;text-align:center;background-color:#000;border-radius:4px}.tooltip-arrow{position:absolute;width:0;height:0;border-color:transparent;border-style:solid}.tooltip.top .tooltip-arrow{bottom:0;left:50%;margin-left:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.top-left .tooltip-arrow{right:5px;bottom:0;margin-bottom:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.top-right .tooltip-arrow{bottom:0;left:5px;margin-bottom:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.right .tooltip-arrow{top:50%;left:0;margin-top:-5px;border-width:5px 5px 5px 0;border-right-color:#000}.tooltip.left .tooltip-arrow{top:50%;right:0;margin-top:-5px;border-width:5px 0 5px 5px;border-left-color:#000}.tooltip.bottom .tooltip-arrow{top:0;left:50%;margin-left:-5px;border-width:0 5px 5px;border-bottom-color:#000}.tooltip.bottom-left .tooltip-arrow{top:0;right:5px;margin-top:-5px;border-width:0 5px 5px;border-bottom-color:#000}.tooltip.bottom-right .tooltip-arrow{top:0;left:5px;margin-top:-5px;border-width:0 5px 5px;border-bottom-color:#000}.popover{position:absolute;top:0;left:0;z-index:1060;display:none;max-width:276px;padding:1px;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;font-style:normal;font-weight:400;line-height:1.42857143;text-align:left;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;letter-spacing:normal;word-break:normal;word-spacing:normal;word-wrap:normal;white-space:normal;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #ccc;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 5px 10px rgba(0,0,0,.2);box-shadow:0 5px 10px rgba(0,0,0,.2);line-break:auto}.popover.top{margin-top:-10px}.popover.right{margin-left:10px}.popover.bottom{margin-top:10px}.popover.left{margin-left:-10px}.popover-title{padding:8px 14px;margin:0;font-size:14px;background-color:#f7f7f7;border-bottom:1px solid #ebebeb;border-radius:5px 5px 0 0}.popover-content{padding:9px 14px}.popover>.arrow,.popover>.arrow:after{position:absolute;display:block;width:0;height:0;border-color:transparent;border-style:solid}.popover>.arrow{border-width:11px}.popover>.arrow:after{content:"";border-width:10px}.popover.top>.arrow{bottom:-11px;left:50%;margin-left:-11px;border-top-color:#999;border-top-color:rgba(0,0,0,.25);border-bottom-width:0}.popover.top>.arrow:after{bottom:1px;margin-left:-10px;content:" ";border-top-color:#fff;border-bottom-width:0}.popover.right>.arrow{top:50%;left:-11px;margin-top:-11px;border-right-color:#999;border-right-color:rgba(0,0,0,.25);border-left-width:0}.popover.right>.arrow:after{bottom:-10px;left:1px;content:" ";border-right-color:#fff;border-left-width:0}.popover.bottom>.arrow{top:-11px;left:50%;margin-left:-11px;border-top-width:0;border-bottom-color:#999;border-bottom-color:rgba(0,0,0,.25)}.popover.bottom>.arrow:after{top:1px;margin-left:-10px;content:" ";border-top-width:0;border-bottom-color:#fff}.popover.left>.arrow{top:50%;right:-11px;margin-top:-11px;border-right-width:0;border-left-color:#999;border-left-color:rgba(0,0,0,.25)}.popover.left>.arrow:after{right:1px;bottom:-10px;content:" ";border-right-width:0;border-left-color:#fff}
</style>
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
});
function popup(width, height, url) {
    var width = width;
    var height = height;
    var url = url;
    $("body").append('<div id="popup"></div>');
    $("#popup").append('<div id="makeblack"></div>');
    $("#popup").append('<div id="alert" style="width: ' + width + 'px;height: ' + height + 'px;"></div>');
    $("#popup #alert").load(url);
}


function popup(width, height, url) {
    var width = width;
    var height = height;
    var url = url;
    $("body").append('<div id="popup"></div>');
    $("#popup").append('<div id="makeblack"></div>');
    $("#popup").append('<div id="alert" style="width: ' + width + 'px;height: ' + height + 'px;"></div>');
    $("#popup #alert").load(url);
}
</script>
	<script>
	function reloadClient() {
			window.location.href = window.location;
		}
	</script>
	<script src="{cdnurl}/js/disconnect.js?v=<?php echo time() ?>"></script>
</body>
</html>
