<?php
if(isset($_POST['account']))
{
$acc_motto = mysql_real_escape_string(filter($_POST['acc_motto']));
$acc_fr = mysql_real_escape_string($_POST['acc_fr']);
$acc_fo = mysql_real_escape_string($_POST['acc_fo']);
$acc_fooom = mysql_real_escape_string($_POST['acc_foom']);
$acc_look = mysql_real_escape_string($_POST['acc_look']);
$acc_clientmenu = mysql_real_escape_string($_POST['acc_clientmenu']);

function strip_tags_content($text, $tags = '', $invert = FALSE) {

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
  $tags = array_unique($tags[1]);

  if(is_array($tags) AND count($tags) > 0) {
    if($invert == FALSE) {
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
    }
    else {
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
    }
  }
  elseif($invert == FALSE) {
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
  }
  return $text;
}
mysql_query("UPDATE users SET motto = '".strip_tags_content($acc_motto)."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
mysql_query("UPDATE users_settings SET block_friendrequests = '".strip_tags_content($acc_fr)."' WHERE user_id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
mysql_query("UPDATE users_settings SET block_following = '".strip_tags_content($acc_fo)."' WHERE user_id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
mysql_query("UPDATE users SET look = '".strip_tags_content($acc_look)."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
}
?>
<?php
if(isset($_POST['account']))
	{
	$acc_motto = mysql_real_escape_string(filter($_POST['acc_motto']));
	mysql_query("UPDATE users SET motto = '".$acc_motto."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	$successMessage = '<div class="alert alert-success" style="text-align: justify;"><b></b><center><b>Your changes have successfully saved!</b></center></div>';
	}
?>
<?php
if(isset($_POST['account']))
{
	$acc_fr = mysql_real_escape_string(filter($_POST['acc_fr']));
	if(is_numeric($acc_fr) && ($acc_fr == 0 || $acc_fr == 1))
	{
		mysql_query("UPDATE users_settings SET block_friendrequests = '".$acc_fr."' WHERE user_id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
		$successMessage = '<div class="alert alert-success" style="text-align: justify;"><b></b><center><b>Your changes have successfully saved!</b></center></div>';
	}
}
?>
<?php
if(isset($_POST['account']))
{
	$acc_fo = mysql_real_escape_string(filter($_POST['acc_fo']));
	if(is_numeric($acc_fo) && ($acc_fo == 0 || $acc_fo == 1))
	{
		mysql_query("UPDATE users_settings SET block_following = '".$acc_fo."' WHERE user_id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
		$successMessage = '<div class="alert alert-success" style="text-align: justify;"><b></b><center><b>Your changes have successfully saved!</b></center></div>';
	}
}
?>
<?php
if(isset($_POST['account']))
{
	$acc_foom = mysql_real_escape_string(filter($_POST['acc_foom']));
	if(is_numeric($acc_foom) && ($acc_foom == 0 || $acc_foom == 1))
	{
		mysql_query("UPDATE users_settings SET block_roominvites = '".$acc_foom."' WHERE user_id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
		$successMessage = '<div class="alert alert-success" style="text-align: justify;"><b></b><center><b>Your changes have successfully saved!</b></center></div>';
	}
}
?>
<?php
if(isset($_POST['account']))
	{
	$acc_look = mysql_real_escape_string(filter($_POST['acc_look']));
	mysql_query("UPDATE users SET look = '".$acc_look."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
		$successMessage = '<div class="alert alert-success" style="text-align: justify;"><b></b><center><b>Your changes have successfully saved!</b></center></div>';
	}
?>

<?php
if(isset($_POST['account']))
{
	$acc_clientmenu = mysql_real_escape_string(filter($_POST['acc_clientmenu']));
	if(($acc_clientmenu == 0 || $acc_clientmenu == 1))
	{
		mysql_query("UPDATE users SET client_menu = '".$acc_clientmenu."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
		$successMessage = '<div class="alert alert-success" style="text-align: justify;"><b></b><center><b>Your changes have successfully saved!</b></center></div>';
	}
}
?>
<?php
$profileData = mysql_query("SELECT id,motto FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileMotto = mysql_fetch_array($profileData);

}
?>
<?php

$profileData = mysql_query("SELECT user_id,block_friendrequests FROM users_settings WHERE user_id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileFreinds = mysql_fetch_array($profileData);

}
?>
<?php

$profileData = mysql_query("SELECT user_id,block_following FROM users_settings WHERE user_id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileFollowing = mysql_fetch_array($profileData);

}
?>
<?php

$profileData = mysql_query("SELECT user_id,block_roominvites FROM users_settings WHERE user_id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileRooms = mysql_fetch_array($profileData);

}
?>
<?php
$profileData = mysql_query("SELECT id,look FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileLook = mysql_fetch_array($profileData);

}
?>

<?php
$profileData = mysql_query("SELECT id,client_menu FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileClientMenu= mysql_fetch_array($profileData);

}
?>

<title>{shortname} ~ Client Settings</title>

<?php
	$navigatorID = 1;
    require_once ('/includes/header.php');
    require_once ('/includes/navigator.php');
?>


<div class="row">
<div class="col-md-12">
</div>
</div>
<div class="row">
<div class="col-md-3">
<div class="list-group">

<a href="/account/info" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Information </font></font></a>

<a class="list-group-item active">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Client Settings </font></font></a>

<a href="/account/profilepage" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Profile Page Settings </font></font></a>

<a href="/account" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Password & Email Settings </font></font></a>

<a href="/account/logins" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Login Attempts </font></font></a>
<a href="/account/design" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Website & Design Options </font></font></a> </div>
</div>
<div class="col-md-9">
<div class="card pb0">
            <h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Change Client Settings</font></font></h1>

            <div class="body pb0">
                <form action="" method="post">
					<?php echo $successMessage; ?>
                    <div class="listening">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Motto</font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">Your motto is what other users will see on your <a href="/home/{username}" target="_blank">Profile Page</a> and when clicking your user in the {longname} client.</font></i>
                        <input type="text" class="form-control is-valid" size="50" maxlength="50" name="acc_motto" value="<?php echo filter($profileMotto['motto']); ?>" id="motto">
                    </div>
					
					<div class="listening even">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Client Online Bar Menu</font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">Shown (0) | Hidden (1)</font></i>
                        <select name="acc_clientmenu" class="form-select">
							<option value="<?php echo filter($profileClientMenu['client_menu']); ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> You have the number <?php echo filter($profileClientMenu['client_menu']); ?> set!</font></font></option>
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Show Client Menu Bar</font></font></option>
                            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hide Client Menu Bar</font></font></option>
                        </select>
                    </div>
					
					<div class="listening">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Friend Requests</font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">Not Blocked (0) | Blocked (1)</font></i>
                        <select name="acc_fr" class="form-select">
							<option value="<?php echo filter($profileFreinds['block_friendrequests']); ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> You have the number <?php echo filter($profileFreinds['block_friendrequests']); ?> set!</font></font></option>
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Accept new friend requests</font></font></option>
                            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Block new friend requests</font></font></option>
                        </select>
                    </div>
					
					<div class="listening even">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Block Room Following</font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">Not Blocked (0) | Blocked (1)</font></i>
                        <select name="acc_fo" class="form-select">

							<option value="<?php echo filter($profileFollowing['block_following']); ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> You have the number <?php echo filter($profileFollowing['block_following']); ?> set!</font></font></option>
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Allow Room Follwoing</font></font></option>
                            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Block Room Following</font></font></option>
                        </select>
                    </div>
					
					<div class="listening">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Block Room Invites</font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">Not Blocked (0) | Blocked (1)</font></i>
                        <select name="acc_foom" class="form-select">

							<option value="<?php echo filter($profileRooms['block_roominvites']); ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> You have the number <?php echo filter($profileRooms['block_roominvites']); ?> set!</font></font></option>
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Allow Room Invites</font></font></option>
                            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Block Room Invites</font></font></option>
                        </select>
                    </div>

                    <div class="listening even">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Insert Look From Another Habbo Retro</font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">{imager} [Code]</font></i>
						<p class="body rareauctionwindow" style="background: url('{imager}<?php echo filter($profileLook['look']); ?>') 0% -10px no-repeat;height: 100px;padding-left: 80px;padding-top: 5px;margin-top: 10px;"><p>
                        <input type="text" class="form-control is-valid" size="125" maxlength="125" name="acc_look" value="<?php echo filter($profileLook['look']); ?>" id="look">
                    </div>

                    <div class="listening border-bottom">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="account" value="Save Settings"></font></font>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>