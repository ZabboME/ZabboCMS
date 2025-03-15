<?php require_once ('/includes/checktheban.php'); ?>
<?php require_once ('/includes/maintenance_access.php'); ?>

<!DOCTYPE html>
<html class="no-js?<?php echo time() ?>" lang="en">
	<head>
		<title>{shortname} ~ Locked!</title>
		<meta charset="UTF-8">
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Join millions in the planet&apos;s most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{longname}">
		<meta property="og:title" content="{shortname} ~ Locked!">
		<meta property="og:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta property="og:url" content="{url}/account/newpin">
		<meta property="og:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta property="og:image:height" content="628">
		<meta property="og:image:width" content="1200">
		<meta name="twitter:card" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:title" content="{shortname} ~ Locked!">
		<meta name="twitter:description" content="Check into {longname}, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta name="twitter:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:site" content="@{twitter}">
		<meta itemprop="name" content="{shortname} ~ Locked!">
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
		<link rel="stylesheet" href="{cdnurl}/css/animate.css?<?php echo time() ?>">

	</head>
	<body>
<div class='uk-container uk-margin-large-top'>
		<div uk-grid>
		<div class='uk-width1-1@s uk-width-1-3@m'>
			<center class='uk-margin'>
			    <a href="{url}"><img class='shine' src='{cdnurl}/images/logo.png?<?php echo time() ?>' /></a>
			</center>


			 <div class='habbo uk-card uk-card-default uk-card-body'>
				 <h3 class='uk-card-title chocolate__title__rainbow '><b>Hey {username}, Locked Account Detected!</b></h3>
					  <div class='uk-margin'>
						  <div class='uk-inline'>
						  <p>We have detected your account is currently <b>Locked</b>, please contact us via Discord!</p>
                          	<center><h3 style="text-align: center;"><strong><img src="{cdnurl}/images/Frank_111.gif" alt="" data-cke-saved-src="{cdnurl}/{cdn-name}/img/Frank_111.gif" style="position:  relative;margin-left:  95px;margin-bottom:  -30px;"></strong></h3></center>
						  </div>
					  </div>

				<p class='habbo habbo-extra' style='width: auto;'>
						<span uk-icon='icon: question'>  </span> Account Locked? Click <a href="{discord}"><b>here</b></a> to join our Discord!
					</p>
					<p class='habbo habbo-extra' style='width: auto;'>
						<span uk-icon='icon: question'>  </span> Unlocked? Click <a href="{url}/client"><b>here</b></a> to access the client!
					</p>

			  </div>
		   </div>

		  <div class='uk-width-1-2@m uk-visible@m'>
              <div class="uk-margin habbo habbo-opaque uk-card uk-card-default uk-card-body" style='padding-top: 35px; padding-bottom: 35px;margin-top: 115px'>
                <dl class="uk-description-list uk-description-list-divider" style="margin-left: 6px;">
				<dt><span uk-icon='icon: lifesaver'></span> <b>If this to be an error, please contact us on our discord!</b></dt>
				<dd>If you report this to one of our staff members within the Discord server. You will be able the have your account will be unlocked allowing you to access Zabbo again!</dd>
			  </dl>
		  </div>
		</div>
		</div>
	</div>
	<a href="{discord}" class="animated shake" target="_blank" style="box-shadow: 2px 2px 10px rgba(0,0,0,.2);display: block; position: fixed; bottom: 15px; right: 15px; border-radius: 100px; padding: 10px 15px; animation: flipInX 1s; background: #7289da;"><img src="data:image/gif;base64,R0lGODlhKAAoAPcAAAAAAP////v7/v39//z8/v7+//39/vX2/Ojr+e/x+/f4/fb3/MLL79Xb9Nfd9dbc9OPn+Ort+uvu+vDy+/Hz+/n6/mR912Z/12eA12mC2GqC2GmB12uD2GyE2W2F2WyE2G6F2W6G2W+G2W+H2XCH2nCI2nGI2nCH2XKJ2nSK23SL23aM23iO3HmP3HqP3HqQ3HyR3XyR3ICU3oCV3n+U3YGW3oKW3oSY34WZ34mc4Iqd4Iue4Yyf4Y2f4Y2g4Y+h4pKk4pan5Jeo5Jan45mp5Jqq5Zur5Z2t5pys5Z6u5aGw5qe16Ku56ay56a266q676q266bC966+86rG+67K+67rF7b3H7cDK77/J7sHL78LM78jR8cfQ8NHY89Tb9NPa89Xc9Nnf9drg9d7j9uDl9+fr+fL0+2qD2GuE2HGJ2n2T3Y+i4pSm45qr5aW056a157K/67G+6rPA677J7sTO8MXP8MzV8svU8dDY89jf9d3j9+Hm9+Po+Ojs+d7k9uXq+Oru+uvv+u/y+/r7/vv8/v3+//7///3+/v///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAIgALAAAAAAoACgAAAj/ABEJHEiwoMGDCBMKRMGwocOHECMqjEixokSEFjNmPKixI0WOHkM2BCkyJMmSHU9SNHHiIUuNKh9+4PCChggPHz54YDEjhIaWHw1SFIEmSBQnQtT0GALERg84Vpi40BC0YMQRMK48yFLFj4IAYAUgYDBHzJgiHi5ahQgCDAU+BcDKnRsAkIQCaz5AjOnhhwG6gOneQbNX6MMMdQIrBjvIhoiHKkusALR4sZszkA03REMEMAHAA+jmSetQZQY5cwWxqaFFLoQdOL7MncACKEOVHbzMnWKBw4oJAQwFubDhxiC5hXiQvq0ZBQkWguYuwUCCRJkAhXJwCOHiwNwmVEc24w9hfG6YFBqOhA7AxQMHKnSvhGe+lqEHHYfoRhhDaO6fPYaAFVcAW3BQWnMe+CBXH14sUJkEXlQAVhcGilefcyz4AZYBeLyBBRnHyWWGF3FAEYiASnRw4IUogNCCHXIJYIQGOAiRBBJAvIBCA3IJgkSFFhIEUQghtEFHGXrEMEIIaHDAwQcjeCBFAg48IcN8QQ4UkQkcaKCCCiNQdAILIGjwWGEsumRCRWmckEZFMaEEZ3NyWhRnnWgKiedGd4qEiFpporRQZhjhqeWKCiWqKKKKNlooCo5GmhB9klaqpaWYGhQQADs="></a>

		<script src='https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js'></script>
		<script src='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.32/dist/js/uikit.min.js'></script>
		<script async src='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.33/dist/js/uikit-icons.min.js'></script>
    </body>
</html>