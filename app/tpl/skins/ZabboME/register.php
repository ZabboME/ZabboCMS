<title>{shortname} ~ Registration</title>
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
<meta property="og:title" content="Zabbo Hotel ~ Registration">
<meta property="og:description" content="Check into Zabbo Hotel, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta property="og:url" content="{url}">
<meta property="og:image" content="{cdnurl}/images/app_summary_image.gif?v=<?php echo time() ?>">
<meta property="og:image:height" content="514">
<meta property="og:image:width" content="514">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Zabbo Hotel ~ Registration">
<meta name="twitter:description" content="Check into Zabbo Hotel, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta name="twitter:image" content="{cdnurl}/images/app_summary_image.gif?v=<?php echo time() ?>">
<meta name="twitter:site" content="{twitter}">
<meta itemprop="name" content="Zabbo Hotel ~ Registration">
<meta itemprop="description" content="Check into Zabbo Hotel, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
<meta itemprop="image" content="{cdnurl}/images/app_summary_image.gif?v=<?php echo time() ?>">
<meta name="description" content="Check into Zabbo Hotel the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more..." />
<meta name="keywords" content="Zabbo Hotel, zabbo, zabbo.com, zabbo.me, register, Zabbo, zabbo.co, Zabbo, habbo.click, habbo.com, Habbo, Habbo HTML5, boon.pw, boon, habboon.com, habboon, freshhotel.com, freshhotel, fresh hotel, fresh-hotel, fresh-hotel.org, hablush, hablush.com, hablush.co, playrise, playrise.com, habdab, habdab.gq, traker.pro, traker, findretros, thehabbos, findretros.com, thehabbos.org, habbo ranking, habbolist, tophabbos, top habbo retro, habbo retros, html5 retros, habbo html5, habbo ranking list, top retros, top habbo, habbo topstats, habbo hotel, virtual, world, social network, free, community, avatar, chat, online, teen, roleplaying, join, social, groups, forums, safe, play, games, online, friends, teens, rares, rare furni, collecting, create, collect, connect, furni, furniture, pets, room design, sharing, expression, badges, hangout, music, celebrity, celebrity visits, celebrities, mmo, mmorpg, massively multiplayer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{cdnurl}/css/clear.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/sweetalert.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/theme.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/buttons.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/animate.css?v=<?php echo time() ?>">
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
        $(".logo-img").attr('src', '{cdnurl}/images/design/logo/' + bg + '.png?reload');
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
                background-image: url({cdnurl}/images/banner.png?v=<?php echo time() ?>), url('{cdnurl}/images/design/bg/bg_5.png');
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
        background: url('{cdnurl}/images/design/mebox/mebox_5.png') 50% 50% no-repeat;
		background-size: cover;
    }
    .mebg .body {
        min-height: 150px;
        padding-left: 140px;
        color: #FFF;
    }

	.mebg .avatar {
        background: url('{imager}&size=l&head_direction=3&gesture=sml&&action=wav') 0% 40% no-repeat;
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
.christmas-trees {
    background-image: url(/app/tpl/skins/ZabboME/assets/images/footer-bg.png);
    background-repeat-y: no-repeat;
    width: 100%;
    height: 210px;
    position: absolute;
    left: 0;
    z-index: 0;
    bottom: 100px;
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
    height: 80px;
    margin-right: 4px;
    margin-top: -86px;
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

#Zabbo {
    color: #3f3f3f;
    font-family: "Ubuntu", sans-serif;
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

</style>
<body data-gr-c-s-loaded="true" id="Zabbo" style="overflow-x:hidden">
<div class="alert alert-success mb-0 text-center" style="border-radius: 0 !important; margin: 0;"><p class="mb-0">You can access Zabbo Hotel with your <b>Old Account</b> from last year to play!</p></div>

<div class="container-fluid header">
<div class="container">
<div class="row">
<div class="col-md-4">
<a href="{url}">
<img class="shine zoom-picture" src="{cdnurl}/images/design/logo/logo_1.gif?v=<?php echo time() ?>" style="position: absolute;top: 40px;">
</a>
</div>
<div class="col-md-8 removeonbreakpoint">
<div class="bg-hotel">
<div id="clientbutton">
<a href="{url}/" class="joinin">
<button class="btn btn-block btn-joinin" style="border-radius: 4px;box-shadow: 0 1px 0 2px rgb(0 0 0 / 30%)!important;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
<i class="fa fa-reply"></i>&nbsp;Cancel Registration</font></font></button>
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
<ul class="nav navbar-nav"><li class=""><a href="/" target=""><i class="fa fa-home"></i> <font style="vertical-align: inherit;">Homepage</font></a></li>
<li class="active"><a target=""><i class="fa fa-plus-circle"></i> <font style="vertical-align: inherit;">Registration</font></a></li></ul>
</ul>

<li class="nav navbar-nav dropdown">
<ul class="nav navbar-nav dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;"><li class=""><a target=""><i class="fa fa-users"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Playing {shortname}&nbsp;<span class="caret"></span></font></a></ul>
<ul class="dropdown-menu" role="menu" aria-labelledby="playing">
<li role="presentation"><a role="menuitem" tabindex="1" href="/playing-zabbo/what-is-zabbo">What's {shortname}?</a></li>
<li role="presentation"><a role="menuitem" tabindex="2" href="/playing-zabbo/how-to-play">How To Play</a></li>
<li role="presentation"><a role="menuitem" tabindex="3" href="/playing-zabbo/zabbo-way">{shortname} Way</a></li>
<li role="presentation"><a role="menuitem" tabindex="4" href="/playing-zabbo/safety">Safety Tips</a></li>
<li role="presentation"><a role="menuitem" tabindex="5" href="/playing-zabbo/help">{shortname} Help</a></li>

</ul>
</li>
<ul class="nav navbar-nav"><li class=""><a href="/values"><i class="fa fa-search"></i> <font style="vertical-align: inherit;">Values</font></a></li></ul>
<ul class="nav navbar-nav navbar-right"><li class=""><a href="{url}/index"><i class="fa fa-reply"></i>&nbsp;&nbsp;
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Go Back</font></font></a></li></ul>
</div>
</div>
</div>
</nav>
<div class="container-fluid bg-holo">
<style>
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
.dropdown-menu {
    position: absolute;
    top: 100%;
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
    background-color: #7575758f;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
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
.card {
    background: #d0d0d0bd;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.15), 0 1px rgba(0, 0, 0, 0.15);
    border-radius: 3px;
    border: none;
    margin-bottom: 20px;
    padding: 10px;
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
.alert.alert-failed {
    background: #b41010;
    color: #FFF;
    border-radius: 5px;
    width: fit-content;
}
.alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
.window_style_2 {
    font-family: Ubuntu;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    border-radius: 6px;
    position: relative;
    font-size: 12px;
    box-sizing: border-box;
    margin-top: 10px;
}

.window_style_2 .inner {
    background-color: #313131;
    border-style: solid;
    border-width: 5px 5px 6px;
    -moz-border-image: url(data:image/gif;base64,R0lGODlhKAAoAPcAAAAAAP////v7/v39//z8/v7+//39/vX2/Ojr+e/x+/f4/fb3/MLL79Xb9Nfd9dbc9OPn+Ort+uvu+vDy+/Hz+/n6/mR912Z/12eA12mC2GqC2GmB12uD2GyE2W2F2WyE2G6F2W6G2W+G2W+H2XCH2nCI2nGI2nCH2XKJ2nSK23SL23aM23iO3HmP3HqP3HqQ3HyR3XyR3ICU3oCV3n+U3YGW3oKW3oSY34WZ34mc4Iqd4Iue4Yyf4Y2f4Y2g4Y+h4pKk4pan5Jeo5Jan45mp5Jqq5Zur5Z2t5pys5Z6u5aGw5qe16Ku56ay56a266q676q266bC966+86rG+67K+67rF7b3H7cDK77/J7sHL78LM78jR8cfQ8NHY89Tb9NPa89Xc9Nnf9drg9d7j9uDl9+fr+fL0+2qD2GuE2HGJ2n2T3Y+i4pSm45qr5aW056a157K/67G+6rPA677J7sTO8MXP8MzV8svU8dDY89jf9d3j9+Hm9+Po+Ojs+d7k9uXq+Oru+uvv+u/y+/r7/vv8/v3+//7///3+/v///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAIgALAAAAAAoACgAAAj/ABEJHEiwoMGDCBMKRMGwocOHECMqjEixokSEFjNmPKixI0WOHkM2BCkyJMmSHU9SNHHiIUuNKh9+4PCChggPHz54YDEjhIaWHw1SFIEmSBQnQtT0GALERg84Vpi40BC0YMQRMK48yFLFj4IAYAUgYDBHzJgiHi5ahQgCDAU+BcDKnRsAkIQCaz5AjOnhhwG6gOneQbNX6MMMdQIrBjvIhoiHKkusALR4sZszkA03REMEMAHAA+jmSetQZQY5cwWxqaFFLoQdOL7MncACKEOVHbzMnWKBw4oJAQwFubDhxiC5hXiQvq0ZBQkWguYuwUCCRJkAhXJwCOHiwNwmVEc24w9hfG6YFBqOhA7AxQMHKnSvhGe+lqEHHYfoRhhDaO6fPYaAFVcAW3BQWnMe+CBXH14sUJkEXlQAVhcGilefcyz4AZYBeLyBBRnHyWWGF3FAEYiASnRw4IUogNCCHXIJYIQGOAiRBBJAvIBCA3IJgkSFFhIEUQghtEFHGXrEMEIIaHDAwQcjeCBFAg48IcN8QQ4UkQkcaKCCCiNQdAILIGjwWGEsumRCRWmckEZFMaEEZ3NyWhRnnWgKiedGd4qEiFpporRQZhjhqeWKCiWqKKKKNlooCo5GmhB9klaqpaWYGhQQADs=) 5 5 6 repeat;
    -webkit-border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAiUlEQVQ4Ee3UYQrAIAgF4Het3f9gDsvnjIQy9rNBJE2/mtCA+REAlTELttIQEXkqI2w+wFJBslyDHR1AX10EEY7gEca9MtRBJlVnojzlBasdBG4PtQX9/ta71ytCvf4PPlBfVFFiVtvBUzTBcjAm7sZ27RrYPpsLuwDzWGezd0zlP4aDDE5R1uMFpZrMMFJQBroAAAAASUVORK5CYII=) 5 5 6 repeat;
    -o-border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAiUlEQVQ4Ee3UYQrAIAgF4Het3f9gDsvnjIQy9rNBJE2/mtCA+REAlTELttIQEXkqI2w+wFJBslyDHR1AX10EEY7gEca9MtRBJlVnojzlBasdBG4PtQX9/ta71ytCvf4PPlBfVFFiVtvBUzTBcjAm7sZ27RrYPpsLuwDzWGezd0zlP4aDDE5R1uMFpZrMMFJQBroAAAAASUVORK5CYII=) 5 5 6 repeat;
    border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAiUlEQVQ4Ee3UYQrAIAgF4Het3f9gDsvnjIQy9rNBJE2/mtCA+REAlTELttIQEXkqI2w+wFJBslyDHR1AX10EEY7gEca9MtRBJlVnojzlBasdBG4PtQX9/ta71ytCvf4PPlBfVFFiVtvBUzTBcjAm7sZ27RrYPpsLuwDzWGezd0zlP4aDDE5R1uMFpZrMMFJQBroAAAAASUVORK5CYII=) 5 5 6 fill repeat;
    border-radius: 7px;
    color: #fff;
    box-sizing: border-box;
}
</style>
<div class="container">
<br>
<div class="col-md-3" style="margin-top: -8px;margin-left: 50px;">
<div class="window_style_2" style="position: absolute;float: left;top: -1px;height: 29px;width: 130px;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #e8c25a;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Credits </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{credits}</font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #A47D15;background-image: url({cdnurl}/images/icons/credits.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<div class="window_style_2" style="position: relative;margin-top: 50px;height: 29px;width: 130px;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #3bd0f1;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diamonds </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{diamonds}</font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #006ea2;background-image: url({cdnurl}/images/icons/diamonds.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<div class="window_style_2" style="position: absolute;float: right;right: 1px;top: -1px;height: 29px;width: 130px;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #dd75ff;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Duckets </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{duckets}</font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #aa54c5;background-image: url({cdnurl}/images/icons/duckets.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<div class="window_style_2" style="position: absolute;top: 40px;right: 0px;float: right;height: 29px;width: 130px;"> <div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #ff4949;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Points</font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{points}</font></font></span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #A5001E;background-image: url({cdnurl}/images/icons/points.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<br /><br />
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
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-12">
<div class="card">
<div class="card-body">
<h1 class="title"><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;"><center>{shortname} ~ Registration!</center></font></font></h1>
<?php if(isset($template->form->error)) { echo '<div class="alert alert-danger"><center>'.$template->form->error.'</center></div>'; } ?>

<form action="" method="post">
<div class="form-group">

<i class="fa fa-user"></i> <label for="username">Username</label><br />
<i style="font-size: 12px;"><font style="vertical-align: inherit;">This will be your shown username in-game that other players will see!</font></i><br />
<input type="text" onkeyup="changeAvatar(this.value,'#imager')" class="form-control is-valid" data-parsley-required-message="Desired Username..." placeholder="Desired Username..." tabindex="1" size="16" maxlength="16" name="reg_username" id="zabbo-name" required="" data-parsley-id="5">
<div class="imager" id="imager" style="background-image: url({cdnurl}/images/index/ghost.png?v=<?php echo time() ?>);"></div>
</div>

<div class="form-group">
<i class="fa fa-lock"></i> <label for="password">Password</label><br />
<i style="font-size: 12px;"><font style="vertical-align: inherit;">Please do not use the same password you have used on other Habbo Retros.</font></i>
<input type="password" class="form-control is-valid" data-parsley-required-message="Desired Password..." placeholder="Desired Password..." tabindex="2" name="reg_password" id="password" required="" data-parsley-id="7">
</div>

<div class="form-group">
<i class="fa fa-lock"></i> <label for="password">Repeat Password</label><br />
<i style="font-size: 12px;"><font style="vertical-align: inherit;">Please repeat the same password you have entered above.</font></i>
<input type="password" class="form-control is-valid" data-parsley-required-message="Repeat Password..." placeholder="Repeat Password..." tabindex="3" name="reg_rep_password" id="password2" required="" data-parsley-id="7">
</div>

<div class="form-group">
<i class="fa fa-envelope"></i> <label for="email">Email</label><br />
<i style="font-size: 12px;"><font style="vertical-align: inherit;">Please make sure to put a legit email incase you forget your password or pin code.</font></i>
<input type="text" class="form-control is-valid" data-parsley-required-message="Your E-mail Address..." placeholder="Your E-mail Address..." tabindex="4" size="48" maxlength="48" name="reg_email" id="email" required="" data-parsley-id="5">
</div>

<div class="form-group">
<i class="fa fa-exclamation-triangle"></i> <label for="security_enabled">Pin System</label><br />
<i style="font-size: 12px;"><font style="vertical-align: inherit;">Please choose if you'd like to use our 4 digit pin system for further protection on your account.</font></i>
<select name="reg_security_enabled" class="form-select" tabindex="6" id="security_enabled" required="">
<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enabled</font></font></option>
<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Disabled</font></font></option>
</select>
</div>

<div class="form-group">
<center>
<div class="cf-turnstile" data-sitekey="{sitekey}"></div>
</center>
</div>

<div class="form-group mb-0">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="form-control is-valid btn btn-block btn-joinin right" tabindex="8" style="border-radius: 6px;" type="submit" name="register" value="Complete Registration"></font></font>
</div>
</form>
</div>
</div>
</div>
<div class="col-lg-4 d-lg-block d-none">
<iframe src="https://discordapp.com/widget?id={discord_widget}&theme=dark" title="Discord Widget" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
</div>
</div>
</div>
<script type="text/javascript" src="{cdnurl}/js/index/scripts.js?v=<?php echo time() ?>"></script>
<script type="text/javascript" src="{cdnurl}/js/index/finaly_fix2.js?v=<?php echo time() ?>"></script>
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?v=<?php echo time() ?>"></script>
<script>
function changeAvatar(value, target) {  
	target = $(target);
	if(value.length != 0){
		target.css("background-image", "url({url}/avatar/username/" + value + "&action=wav&direction=2&head_direction=3&gesture=sml");
	}
}
</script>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>