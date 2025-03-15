<?php
if(isset($_POST['account']))
{
$acc_mail = mysql_real_escape_string($_POST['acc_mail']);

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
mysql_query("UPDATE users SET mail = '".strip_tags_content($acc_mail)."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
}
?>

<?php
if(isset($_POST['account']))
	{
	$acc_mail =  mysql_real_escape_string(filter($_POST['acc_mail']));
	mysql_query("UPDATE users SET mail = '".$acc_mail."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
		$successMessage = '<div class="alert alert-success" style="text-align: justify;"><b></b><center><b>Your changes have successfully saved!</b></center></div>';

	}
?>

<?php
$profileData = mysql_query("SELECT id,mail FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileMail = mysql_fetch_array($profileData);

}
?>
<title>{shortname} ~ Password & Email Settings</title>

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

<a href="/account/client" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Client Settings </font></font></a>

<a href="/account/profilepage" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Profile Page Settings </font></font></a>

<a class="list-group-item active">
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
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Change Password & Email Settings</font></font></h1>

<div class="body pb0">
    <form action="" method="post">
<?php echo $successMessage; ?>
<div class="listening">
            <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email Address</font></font></b>
<i style="font-size: 12px;"><font style="vertical-align: inherit;">This will be helpful for resetting your password or pin in the future!</font></i>
            <input type="text" class="form-control is-valid" size="35" maxlength="35" name="acc_mail" value="<?php echo filter($profileMail['mail']); ?>" id="mail">
        </div>

<div class="listening even">
            <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Current Password</font></font></b>
<i style="font-size: 12px;"><font style="vertical-align: inherit;">Your current password is the password you use to login to {shortname}.</font></i>
            <input type="password" class="form-control is-valid" size="35" maxlength="35" name="acc_old_password" placeholder="Old Password...">
        </div>

        <div class="listening">
            <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">New Password</font></font></b>
<i style="font-size: 12px;"><font style="vertical-align: inherit;">Please use a minimum of 6 characters and only change this field if you wish to change your {shortname} login password.</font></i>
            <input type="password" class="form-control is-valid" size="35" maxlength="35" name="acc_new_password" placeholder="New Password...">
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
