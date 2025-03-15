<?php include_once('meta.php'); ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css?v=<?php echo time() ?>" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/clear.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/sweetalert.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/theme.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/buttons.css?v=<?php echo time() ?>">
<link rel="stylesheet" href="{cdnurl}/css/animate.css?v=<?php echo time() ?>">
<!--<link rel="stylesheet" href="{cdnurl}/css/1.css?v=<?php echo time() ?>">-->
<link rel="stylesheet" href="{cdnurl}/css/snow.css?v=<?php echo time() ?>">
<script src="https://code.jquery.com/jquery-latest.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js?v=<?php echo time() ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js?v=<?php echo time() ?>"></script>
<script src="{cdnurl}/js/theme.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script src="{cdnurl}/js/flash.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script src="{cdnurl}/js/jscolor.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script src="{cdnurl}/js/sweetalert.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script disable-devtool-auto url='/' src='{cdnurl}/js/disable-devtool.min.js'></script>
<?php require "theme_system.php" ?>
<body data-gr-c-s-loaded="true" id="Zabbo" style="overflow-x:hidden">
<div class="container-fluid header">
<div class="container">
<div class="subnavi top">
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav mr-auto">
<p style="position: absolute;margin-top: -2px;margin-left: 300px;">
<style>
.fixed {
	position:fixed;
	z-index:300000!Important;
	width:100%;
	border-bottom:20px solid white;
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
.bgplaceholder {
    top: -75px;
}
.bgplaceholder {
    animation-name: rotate;
    animation-duration: 10s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    position: relative;
    width: 100%;
    height: 100%;
    background: url({cdnurl}/images/badge_placeholder.png) no-repeat center;
    background-size: cover;
}
</style>
<b>Did you know?</b> <span class='text_s'><span class='fact1'>{longname} strives to remain professional as possible.</span></span>
<script>
var $m = jQuery.noConflict();
$m(document).ready(function(){	
	max = parseInt(4);
	cur = parseInt(4);
	var Facts = {};
	Facts[1] = "<span class='fact1'>{longname} strives to remain professional as possible.</span>"; Facts[3] = "<span class='fact3'>{longname} has a built in day and night system.</span>"; Facts[4] = "<span class='fact4'>Purchasing VIP will help us pay for the server costs.</span>"; Facts[5] = "<span class='fact5'>We're always updating the hotel with new things for you to enjoy!</span>"; 				 
	setInterval(function(){
			if(cur+1 <= 5)
			{
				cur = cur+1;
			}
			else{
				cur = 1;
			}				
		newText = Facts[cur];				
		$m('.text_s').fadeOut(function(){					
			$m('.text_s').html(newText);
			$m('.text_s').fadeIn();				
		});			
	},4500);
});
</script>
</p>
</ul>
</div>
</div>
<?php
$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
if(mysql_num_rows($home) != 1)
{
$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
}
$user = mysql_fetch_assoc($home);
?>
<?php
$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "'");
if(mysql_num_rows($home) != 1)
{
$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "'");
}
$user1 = mysql_fetch_assoc($home);
?>	
<?php
if($user1['shopbought'] == 1)
{
echo'
<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your store purchase of <br><b>'.$user1['shoppackage'].'</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>
';
mysql_query("UPDATE users SET shopbought = '0', shoppackage = NULL WHERE id = '".$user1['id']."' LIMIT 1");	
}
?>
<?php
$userList1 = mysql_query("SELECT user_id FROM users_apps WHERE user_id = '" . $_SESSION['user']['id'] . "'");
?>
<?php
$userList1214 = mysql_query("SELECT profile_id FROM profile_comments WHERE profile_id = '".$user['id']."'");
?>		
<div class="row">
<div class="col-md-4">
<a href="{url}">
<img class="shine zoom-picture" src="{cdnurl}/images/design/logo/logo_1.gif?v=<?php echo time() ?>" class="logo-img" style="position: absolute;top: 25px;">	
</a>
</div>
<div class="col-md-8 removeonbreakpoint">
<div class="bg-hotel">
<div id="clientbutton">
<?php
if ($user1['rank'] >= 1) {
    echo '
	<a href="/client" class="joinin" target="_blank">
	<button class="btn btn-block btn-joinin" style="border-radius: 4px;box-shadow: 0 1px 0 2px rgb(0 0 0 / 30%)!important;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enter {shortname}</font></font></button>
	</a>
	';
} elseif ($user1['rank'] == null) {
    echo '';
}
?>
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
</font>
</font>
</user>
<desc>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Member(s) Online</font></font></desc>
</div>
<div id="google_translate_element" style="position: relative;top: 8px;">
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es,pt,tr,ru', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
$userList = mysql_query("SELECT status FROM cms_user_reports WHERE status = '0'");
?>	
<?php
$userList1 = mysql_query("SELECT status FROM cms_user_reports WHERE user_id = '" . $_SESSION['user']['id'] . "'");
?>			
<?php
$userList2 = mysql_query("SELECT status FROM cms_user_reports WHERE status = '2'");
?>				
<?php
$userList21 = mysql_query("SELECT reply_sent FROM users_apps WHERE reply_sent = '1'");
?>
<?php require_once ('checktheban.php'); ?>
<?php require_once ('maintenance_access.php'); ?>

