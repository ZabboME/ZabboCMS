<title>{shortname} ~ Virtual World, Avatar Chat, and Pixel Art</title>
<?php
global $engine;
$template->form->getPageHome();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta http-equiv="x-dns-prefetch-control" content="on">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="dns-prefetch" href="//ajax.googleapis.com">
<link rel="dns-prefetch" href="//google-analytics.com" />
<link rel="shortcut icon" href="{cdnurl}/favicon.ico?v=<?php echo time() ?>" type="image/vnd.microsoft.icon" />
<meta name="description" content="Join millions in the planet&apos;s most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Zabbo.ME">
<meta property="og:title" content="Zabbo Hotel ~ Virtual World, Avatar Chat, and Pixel Art">
<meta property="og:description" content="Check into Zabbo Hotel, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta property="og:url" content="{url}">
<meta property="og:image" content="{cdnurl}/images/app_summary_image.gif?v=<?php echo time() ?>">
<meta property="og:image:height" content="514">
<meta property="og:image:width" content="514">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Zabbo Hotel ~ Virtual World, Avatar Chat, and Pixel Art">
<meta name="twitter:description" content="Check into Zabbo Hotel, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta name="twitter:image" content="{cdnurl}/images/app_summary_image.gif?v=<?php echo time() ?>">
<meta name="twitter:site" content="{twitter}">
<meta itemprop="name" content="Zabbo Hotel ~ Virtual World, Avatar Chat, and Pixel Art">
<meta itemprop="description" content="Check into Zabbo Hotel, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta itemprop="image" content="{cdnurl}/images/app_summary_image.gif?v=<?php echo time() ?>">
<meta name="description" content="Check into Zabbo Hotel the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more..." />
<meta name="keywords" content="Zabbo Hotel, zabbo, zabbo.com, zabbo.me, Zabbo, zabbo.co, Zabbo, habbo.click, habbo.com, Habbo, Habbo HTML5, boon.pw, boon, habboon.com, habboon, freshhotel.com, freshhotel, fresh hotel, fresh-hotel, fresh-hotel.org, hablush, hablush.com, hablush.co, playrise, playrise.com, habdab, habdab.gq, traker.pro, traker, findretros, thehabbos, findretros.com, thehabbos.org, habbo ranking, habbolist, tophabbos, top habbo retro, habbo retros, html5 retros, habbo html5, habbo ranking list, top retros, top habbo, habbo topstats, habbo hotel, virtual, world, social network, free, community, avatar, chat, online, teen, roleplaying, join, social, groups, forums, safe, play, games, online, friends, teens, rares, rare furni, collecting, create, collect, connect, furni, furniture, pets, room design, sharing, expression, badges, hangout, music, celebrity, celebrity visits, celebrities, mmo, mmorpg, massively multiplayer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{cdnurl}/css/clear.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/sweetalert.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/theme.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/buttons.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/animate.css?v=<?php echo time() ?>">
<!--<link rel="stylesheet" href="{cdnurl}/css/1.css?v=<?php echo time() ?>">-->
<link rel="stylesheet" href="{cdnurl}/css/snow.css?v=<?php echo time() ?>">
<script src="https://code.jquery.com/jquery-latest.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js?v=<?php echo time() ?>"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js?v=<?php echo time() ?>"></script>
<script src="{cdnurl}/js/theme.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script src="{cdnurl}/js/flash.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script src="{cdnurl}/js/jscolor.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script src="{cdnurl}/js/sweetalert.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script disable-devtool-auto url='/' src='{cdnurl}/js/disable-devtool.min.js'></script>
<script>
window.__cfRLUnblockHandlers = true;
</script>
<script>
function suggestSEO(el)
{
	var suggested = el;
	suggested = suggested.toLowerCase();
	suggested = suggested.replace(/^\s+/, ''); 
	suggested = suggested.replace(/\s+$/, '');
	suggested = suggested.replace(/[^a-z 0-9]+/g, '');
	while (suggested.indexOf(' ') > -1)
	{
		suggested = suggested.replace(' ', '-');
	}
	document.getElementById('url').value = suggested;
}
    function UpdateCard(color) {
        $(".box.modusdefinition").removeClass('selected');
        $(".modusdefinition_" + color).addClass('selected');
        $("#card_input").val(color);
    }

    function UpdateNavi(color) {
        $(".box.color").removeClass('selected');
        $(".color_" + color).addClass('selected');
        $("#navi_input").val(color);
        $(".navbar-default").css('background', '#' + color);
        $(".list-group-item.active").css('background', '#' + color);
        $(".list-group-item.active:focus").css('background', '#' + color);
        $(".list-group-item.active:hover").css('background', '#' + color);
		$(".card h1.title").css('background', '#' + color);
    }

    function UpdateBG(bg) {
        $(".box.bg").removeClass('selected');
        $(".bg_" + bg).addClass('selected');
        $("#bg_input").val(bg + ".png");
        $(".container-fluid.bg-holo").css('background', 'url(\'{cdnurl}/images/design/bg/' +
            bg + '.png\')');
    }

    function UpdateMeBox(bg) {
        $(".box.mebox").removeClass('selected');
        $(".mebox_" + bg).addClass('selected');
        $("#mebox_input").val(bg + ".png");
    }

    function UpdateHeader(bg) {
        $(".box.header").removeClass('selected');
        $(".header_" + bg).addClass('selected');
        $("#header_input").val(bg + ".png");
        $(".container-fluid.header").css('background',
            'url(\'{cdnurl}/images/design/header/' + bg + '.png\')');
    }

    function UpdateLogo(bg) {
        $(".box.logo").removeClass('selected');
        $(".logo_" + bg).addClass('selected');
        $("#logo_input").val(bg + ".png");
        $(".logo-img").attr('src', '{cdnurl}/images/design/logo/' + bg + '.png?v=<?php echo time() ?>');
    }
	
	function UpdateLeaderboard(loc) {
        document.getElementById('leaderboards').src = loc;
    }

    function UpdateHeaderRight(bg) {
        $(".box.headerright").removeClass('selected');
        $(".headerright_" + bg).addClass('selected');
        $("#headerright_input").val(bg + ".png");
        $(".bg-hotel").attr('src', '{cdnurl}/images/design/headerright/' + bg +
            '.png?reload');
        $(".bg-hotel").css('background', 'url(\'{cdnurl}/images/design/headerright/' + bg +
            '.png\') 100% 50% no-repeat');
    }
    </script>
	<style>
           	.container-fluid.header {
                background: url('{cdnurl}/images/design/header/header_17.png?v=<?php echo time() ?>');
                background-position: 0% 0%;
            }

            .container-fluid.bg-holo { 
                background-image: url('{cdnurl}/images/banner.png?v=<?php echo time() ?>'), url('{cdnurl}/images/design/bg/bg_5.png?v=<?php echo time() ?>');
                background-position: right bottom, right bottom;
                background-attachment: fixed;
                background-repeat: no-repeat, repeat;
            }
            .bg-hotel {
                background: url('{cdnurl}/images/design/headerright/headerright_1.png') 100% 40% no-repeat;
                height: 175px;
            }
            .card h1.title {
				background: #2a2a2a;
			}

            .navbar-default {
			background-color: #2a2a2a;
			margin-bottom: 0!important;
			}
            .list-group-item.active, 
            .list-group-item.active:focus, 
            .list-group-item.active:hover {
                 background: #2a2a2a;
            }
            .nav-tabs {
                 background: #2a2a2a;
            }
			#onlinecounter {
                margin-top: 0px;
                border-top: 0px;
                border-radius: 0px 0px 4px 4px;
            }
            #clientbutton {
                float: right;
                width: 155px;
                margin-top: 35px;
            }
            .btn-joinin {
                border-radius: 4px 4px 0px 0px;
                border: 2px solid rgba(0, 0, 0, 0.2);
                box-shadow: 0 1px 0 2px rgba(0,0,0,0.3);
                font-size: 13px;
            }
            a.joinin {
                text-decoration: none;
            }		
	.mebg.bg_xmas {
        background: url('{cdnurl}/images/design/mebox/mebox_2.png') 50% 50% no-repeat;
		background-size: cover;
    }
    .mebg .body {
        min-height: 150px;
        padding-left: 140px;
        color: #FFF;
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
.imager {
    width: 64px;
	height: 88px;
    margin-right: 4px;
    margin-top: -94px;
    position: relative;
    float: right;
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
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
	a.colorchange {
    color: #000;
}
.label-primary {
    background-color: #757575;
}

#Zabbo .list-item-animated {
    transition: 500ms cubic-bezier(0.59, 0.12, 0.34, 0.95);
    transition-property: opacity, transform;
}
.dropdown-menu {
    position: absolute;
    top: 46px!important;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #ffffff!important;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
    box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
}
.card {
    background: #c3c3c3a3; 
    background-repeat: no-repeat;
    /*box-shadow: inset 0 0 0 1000px rgb(216 216 220 / 29%);*/
    border-radius: 4px;
    border: #00000026 solid 1px;
    margin-bottom: 20px;
    padding: 10px;
}
table {
    width: 100%;
    font-size: 14px;
    background-color: #b3b3b300;
}
.listening.even {
    background: #ffffff78;
}
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #fdfdfd7d;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff0;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
	border: 0px solid transparent;
    border-radius: 4px;
}
.subnavi {
    background: #d0d0d0bd;
    border-radius: 0px 0px 5px 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-bottom: 2px solid rgba(0, 0, 0, 0.2);
    border-top: 0px;
    padding: 10px;
    padding-left: 0px;
    padding-top: 15px;
    margin-top: -30px;
    margin-left: -1px;
    margin-right: -1px;
    z-index: 10;
}

.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color: #ffffff69;
    border-color: #337ab7;
    border-radius: 5px;
}
.users .image {
    float: left;
    width: 82px;
    height: 82px;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-bottom: 2px solid rgba(0, 0, 0, 0.2);
    background: url({cdnurl}/images/me_rooms_active.gif) no-repeat;
    background-position: 50% 50%;
    background-color: #73737366;
    margin-right: 20px;
    margin-top: -5px;
    margin-left: -5px;
}
.desc {
    font-size: 12px;
    height: 24.7px;
    width: 100%;
}
.count {
    margin-top: 5px;
    margin-right: 15px;
    font-weight: bold;
    font-size: 30px;
}
.rooms .image {
    float: left;
    width: 82px;
    height: 82px;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-bottom: 2px solid rgba(0, 0, 0, 0.2);
    background: url({cdnurl}/images/room_icon_3.gif) no-repeat;
    background-position: 50% 50%;
    background-color: #73737366;
    margin-right: 20px;
    margin-top: -5px;
    margin-left: -5px;
}
.alert-danger, .btn {
    -webkit-box-shadow: 0 .125rem .25rem rgba(0,0,0,.09)!important;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.09)!important;
}
.alert-danger {
    background-color: #d9534f!important;
    color: #fff!important;
    border: 0!important;
    border-radius: 5px!important;
}
.alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
.alert.alert-failed {
    background: #b41010;
    color: #FFF;
    border-radius: 5px;
    width: fit-content;
}
</style>

<body data-gr-c-s-loaded="true" id="Zabbo" style="overflow-x:hidden">
<div class="container-fluid header">
<div class="container">
<div class="row">
<div class="col-md-4">
<a href="{url}">
<img class="shine zoom-picture" src="{cdnurl}/images/design/logo/logo_1.gif?v=<?php echo time() ?>" class="logo-img" style="position: absolute;top: 40px;">
</a>
</div>
<div class="col-md-8 removeonbreakpoint">
<div class="bg-hotel">
<div id="clientbutton">
<a href="{url}/register" class="joinin">
<button class="btn btn-block btn-joinin" style="border-radius: 4px;box-shadow: 0 1px 0 2px rgb(0 0 0 / 30%)!important;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-plus"></i> Register Now</font></font></button>
</a>
<div id="onlinecounter">
<user><i class="fa fa-users"></i> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
<script type="text/javascript">
                    $(document).ready(function() {
                        updateOnlineCount();

                        var auto_refresh = setInterval(function() {
                            updateOnlineCount();
                        }, 10000);

                        function updateOnlineCount() {
                            $.ajax({
                                url: '{api}/extra.php?action=getOnlineUsers',
                                dataType: 'json',
                                success: function(data) {
                                    $('#online-count').text(data.OnlineUsers);
                                },
                                error: function(error) {
                                    console.error('Error:', error);
                                }
                            });
                        }
                    });
</script>
<b id="online-count"></b>
</font></font></user>
<desc><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Member(s) Online</font></font></desc>
</div>
<div id="google_translate_element" style="position: relative;top: 8px;">
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es,pt,tr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="container">

<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Toggle navigation</font></font></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav navbar-nav">
<li class="active"><a target=""><i class="fa fa-home"></i> <font style="vertical-align: inherit;">Homepage</font></a></li></ul>
<ul class="nav navbar-nav"><li class=""><a href="/register" target=""><i class="fa fa-plus-circle"></i> <font style="vertical-align: inherit;">Registration</font></a></li>
</ul>

<li class="nav navbar-nav dropdown">
<ul class="nav navbar-nav dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;"><li class=""><a target=""><i class="fa fa-users"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Playing {shortname}&nbsp;<span class="caret"></span></font></a></li></ul>
<ul class="dropdown-menu" role="menu" aria-labelledby="playing">
<li role="presentation"><a role="menuitem" tabindex="1" href="/playing-zabbo/what-is-zabbo">What's {shortname}?</a></li>
<li role="presentation"><a role="menuitem" tabindex="2" href="/playing-zabbo/how-to-play">How To Play</a></li>
<li role="presentation"><a role="menuitem" tabindex="3" href="/playing-zabbo/zabbo-way">{shortname} Way</a></li>
<li role="presentation"><a role="menuitem" tabindex="4" href="/playing-zabbo/safety">Safety Tips</a></li>
<li role="presentation"><a role="menuitem" tabindex="5" href="/playing-zabbo/help">{shortname} Help</a></li>

</ul>
</li>
<ul class="nav navbar-nav"><li class=""><a href="/values"><i class="fa fa-search"></i> <font style="vertical-align: inherit;">Values</font></a></li></ul>
</div>
</div>
</div>
</nav>
<div class="container-fluid bg-holo">
<div class="container">
<br>
<div class="col-md-3" style="margin-left: 50px;">
<div class="card users">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM users"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>{shortname}'s signed up...</i></font></font></div>
</div>
<div class="card rooms">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM rooms"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>Rooms on {shortname}...</i></font></font></div>
</div>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<div class="row">
<div class="platte" style="float: left;margin-left: 60px;margin-top: 5px;background:url({cdnurl}/images/ootw.gif?1) no-repeat;background-position:50% 100%;width: 145px;height: 155px;">
<?php
			$getRandom = mysql_query("SELECT id,username,look,motto,account_created,online,ootw FROM users WHERE ootw = '1' ORDER BY RAND() LIMIT 1");
			$i = 0;

			while ($randomHabbo = mysql_fetch_assoc($getRandom))
			{		 
			echo '
			<a href="{url}/home/' . htmlspecialchars($randomHabbo['username']) . '"><img data-toggle="tooltip" data-placement="top" data-original-title="' . htmlspecialchars($randomHabbo['username']) . '" src="{imager}' . htmlspecialchars($randomHabbo['look']) . '&amp;head_direction=3&amp;gesture=sml&dance=4&img_format=gif" style="margin-left: 44px;margin-top: 6px;"></a>
			';

			$i++;
			}
?>
</div></div>
</div>
</div>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<div class="row">
<div class="platte" style="float: left;margin-left: 60px;margin-top: 5px;background:url({cdnurl}/images/uotw.gif?1) no-repeat;background-position:50% 100%;width: 145px;height: 155px;">
<?php
			$getRandom = mysql_query("SELECT id,username,look,motto,account_created,online,uotw FROM users WHERE uotw = '1' ORDER BY RAND() LIMIT 1");
			$i = 0;

			while ($randomHabbo = mysql_fetch_assoc($getRandom))
			{		 
			echo '
			<a href="{url}/home/' . htmlspecialchars($randomHabbo['username']) . '"><img data-toggle="tooltip" data-placement="top" data-original-title="' . htmlspecialchars($randomHabbo['username']) . '" src="{imager}' . htmlspecialchars($randomHabbo['look']) . '&amp;head_direction=3&amp;gesture=sml&action=wav&img_format=gif" style="margin-left: 44px;margin-top: 6px;"></a>
			';

			$i++;
			}
?>

</div></div>
</div>
</div>
</div>
<div class="col-lg-4 col-12">
<div class="card">
<div class="card-body">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>{shortname} ~ Login!</center></font></font></h1>
<form action="" method="post">
 <?php if(isset($template->form->error)) { echo '<div class="alert alert-danger"><center>'.$template->form->error.'</center></div>'; } ?>

<!--<div class="alert alert-failed" style="text-align: justify;">
<div class="col-1 alert-icon-col">
<center><strong>Maintenance Mode:</strong></br> {shortname} is undergoing work and only higher ranks can login at the moment, please check out our <a href="{discord}" target="_blank"><b>Discord Server</b></a> for more updates!</center>
</div></div>
<center><div class="alert alert-success" style="text-align: justify;">
<div class="col-1 alert-icon-col">
<center><custom class="countdown">
                <custom class="big" id="day">0</custom>
                <custom class="small">Days</custom>
           :
                <custom class="big" id="hour">0</custom>
                <custom class="small">Hours</custom>
           :
                <custom class="big" id="minute">0</custom>
                <custom class="small">Minutes</custom>
           :
                <custom class="big" id="second">0</custom>
                <custom class="small">Seconds</custom>
        </custom></center>
</div></div></center>-->

<div class="form-group">
<i class="fa fa-user"></i> <label for="username">Username</label>
<input type="text" onkeyup="changeAvatar(this.value,'#imager')" class="form-control is-valid" data-parsley-required-message="Please enter your username!" autocomplete="username" placeholder="Your Username..." tabindex="1" tabindex="1" size="16" maxlength="16" name="log_username" id="login-username" required="" data-parsley-id="5">
<div class="imager" id="imager" style="background-image: url({cdnurl}/images/index/ghost.png?v=<?php echo time() ?>);"></div>
</div>
<div class="form-group">
<i class="fa fa-lock"></i> <label for="password">Password</label>
<input type="password" class="form-control is-valid" data-parsley-required-message="You forgot to enter your password!" autocomplete="current-password" placeholder="Your Password..." tabindex="2" name="log_password" id="login-password" required="" data-parsley-id="7">
</div>
<p><small><a href="#" aria-label="Forgot your password?" style="left: 4px;position: relative;">Forgot your password?</a></small></p>
<div class="form-group">
<center>
<div class="cf-turnstile" data-sitekey="{sitekey}"></div>
</center>
</div>
<div class="form-group mb-0">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="login" value="Login"></font></font>
</div>
</form>
</div>
</div>
</div>

<div class="col-lg-4 d-lg-block d-none">
<div id="news" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#news" data-slide-to="0" class="active"></li><li data-target="#news" data-slide-to="1" class=""></li><li data-target="#news" data-slide-to="2" class=""></li></ol>
    <div class="carousel-inner">
    <div class="item active"><div class="news" style="background: url({url}/ase/ts/{newsIMG-1}) 50% 50%;background-size:cover;border-radius: 3px;"><div class="title"><a href="/news/{newsID-1}" class="btn btn-block right">Read More...</a>{newsTitle-1}</div></div>
	<div class="title" style="padding: 5px;background: #333;color: white;font-size: 11px;font-weight: bolder;font-family: sans-serif;">
    <i>Posted By: {newsAuthor-1}</i><i style="float: right;">Posted On: {newsDate-1}</i>
	</div>
	</div>
    <div class="item"><div class="news" style="background: url({url}/ase/ts/{newsIMG-2}) 50% 50%;background-size:cover;border-radius: 3px;"><div class="title"><a href="/news/{newsID-2}" class="btn btn-block right">Read More...</a>{newsTitle-2}</div></div>
	<div class="title" style="padding: 5px;background: #333;color: white;font-size: 11px;font-weight: bolder;font-family: sans-serif;">
    <i>Posted By: {newsAuthor-2}</i><i style="float: right;">Posted On: {newsDate-2}</i>
	</div>
	</div>
    <div class="item"><div class="news" style="background: url({url}/ase/ts/{newsIMG-3}) 50% 50%;background-size:cover;border-radius: 3px;"><div class="title"><a href="/news/{newsID-3}" class="btn btn-block right">Read More...</a>{newsTitle-3}</div></div>
	<div class="title" style="padding: 5px;background: #333;color: white;font-size: 11px;font-weight: bolder;font-family: sans-serif;">
    <i>Posted By: {newsAuthor-3}</i><i style="float: right;">Posted On: {newsDate-3}</i>
	</div>
	</div>
    </div>
 <a class="left carousel-control" href="#news" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#news" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
 
<br /> 
<iframe src="https://discordapp.com/widget?id={discord_widget}&theme=dark" title="Discord Widget" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
</div>
</div>
</div>
<script>
function changeAvatar(value, target) {  
	target = $(target);
	if(value.length != 0){
		target.css("background-image", "url({url}/avatar/username/" + value + "&action=wav&direction=2&head_direction=3&gesture=sml&img_format=gif");
	}
}
</script>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>