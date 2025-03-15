<?php 
if(isset($_POST['account_cms']))
	{
	$cms_bg = mysql_real_escape_string(filter($_POST['cms_bg']));
	mysql_query("UPDATE users SET cms_bg = '".$cms_bg."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	}
?>

<?php

$profileData = mysql_query("SELECT id,cms_bg FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$cms_bg1 = mysql_fetch_array($profileData);

}
?>

<?php 
if(isset($_POST['account_cms']))
	{
	$cms_headerbg = mysql_real_escape_string(filter($_POST['cms_headerbg']));
	mysql_query("UPDATE users SET cms_headerbg = '".$cms_headerbg."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	}
?>

<?php

$profileData = mysql_query("SELECT id,cms_headerbg FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$cms_headerbg1 = mysql_fetch_array($profileData);

}
?>

<?php 
if(isset($_POST['account_cms']))
	{
	$cms_color = mysql_real_escape_string(filter($_POST['cms_color']));
	mysql_query("UPDATE users SET cms_color = '".$cms_color."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
			$successMessage = '<div class="alert alert-success"><b></b><center><b>Your changes have successfully saved!</b></center></div>';

	}
?>

<?php

$profileData = mysql_query("SELECT id,cms_color FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$cms_color1 = mysql_fetch_array($profileData);

}
?>

<?php 
if(isset($_POST['account_cms']))
	{
	$cms_mebg = mysql_real_escape_string(filter($_POST['cms_mebg']));
	mysql_query("UPDATE users SET cms_mebg = '".$cms_mebg."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	}
?>

<?php

$profileData = mysql_query("SELECT id,cms_mebg FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$cms_mebg1 = mysql_fetch_array($profileData);

}
?>

<?php 
if(isset($_POST['account_cms']))
	{
	$cms_rightheader = mysql_real_escape_string(filter($_POST['cms_rightheader']));
	mysql_query("UPDATE users SET cms_rightheader = '".$cms_rightheader."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	}
?>

<?php

$profileData = mysql_query("SELECT id,cms_rightheader FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$cms_rightheader1 = mysql_fetch_array($profileData);

}
?>

<?php
if(isset($_POST['account_cms']))
{
	$acc_pin =  mysql_real_escape_string(filter($_POST['acc_pin']));
	if(is_numeric($acc_pin) && ($acc_pin == 0 || $acc_pin == 1))
	{
		mysql_query("UPDATE users SET security_enabled = '".$acc_pin."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	}
}
?>

<?php

$profileData = mysql_query("SELECT id,security_enabled FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profilePIN = mysql_fetch_array($profileData);

}
?>
<script>
window.__cfRLUnblockHandlers = true;
</script>
<script>
function previewTS(el)
{
document.getElementById('ts-preview').innerHTML = '<img src="{swfurl}/dcr/hof_furni/icons/' + el + '" />';
}
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
background: url('{cdnurl}/images/design/header/<?php echo $cms_headerbg1['cms_headerbg']; ?>');
background-position: 0% 0%;
}

.container-fluid.bg-holo { 
background-image: url({cdnurl}/images/banner.png?v=<?php echo time() ?>), url('{cdnurl}/images/design/bg/<?php echo $cms_bg1['cms_bg']; ?>');
background-position: right bottom, right bottom;
background-attachment: fixed;
background-repeat: no-repeat, repeat;
}
.bg-hotel {
background: url('{cdnurl}/images/design/headerright/<?php echo $cms_rightheader1['cms_rightheader']; ?>') 100% 40% no-repeat;
height: 144px;
}
.card h1.title {
background-color: #<?php if (mysql_num_rows($cms_color1) < 1) echo '' . ($cms_color1['cms_color']) . '!important';?>;
}
.card h1.title {
background-color: #<?php if (mysql_num_rows($cms_color1) < 1) echo '3e93b9';?>;
}
.navbar-default {
background-color: #<?php if (mysql_num_rows($cms_color1) < 1) echo '' . ($cms_color1['cms_color']) . '!important';?>;
margin-bottom: 0!important;
}
.navbar-default {
background-color: #<?php if (mysql_num_rows($cms_color1) < 1) echo '3e93b9';?>;
margin-bottom: 0!important;
}
.list-group-item.active, 
.list-group-item.active:focus, 
.list-group-item.active:hover {
background: #<?php echo $cms_color1['cms_color']; ?>;
}
.nav-tabs {
background: #<?php echo $cms_color1['cms_color']; ?>;
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
background: url('{cdnurl}/images/design/mebox/<?php echo $cms_mebg1['cms_mebg']; ?>') 50% 50% no-repeat;
background-size: cover;
}
.mebg .body {
min-height: 150px;
padding-left: 140px;
color: #FFF;
}
.mebg .avatar {
background: url('{imager}<?php echo $user['look']; ?>&size=l&head_direction=3&gesture=sml&&action=wav') 0% 40% no-repeat;
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
</style>