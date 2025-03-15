<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$userLook = mysql_fetch_assoc($home);
?>
<?php
$Look = mysql_query("SELECT * FROM users WHERE id = '" . $_SESSION['user']['id'] . "' LIMIT 1");
$getLook = mysql_fetch_assoc($Look);
?>
<title>{shortname} ~ Submissions Entry</title>
<?php 
	$navigatorID = 6;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		
<div class="row">
<div class="col-md-7">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>Please Fill Out All Of Your Requested Submission Details Below!</center></font></font></h1>

<?php
						$sql = mysql_query("SELECT user FROM users_submissions WHERE user = '".$_SESSION['user']['username']."'");
						$sqlmax1 = mysql_query("SELECT user FROM users_submissions WHERE entry = 'ROTW' AND user_id = '".$_SESSION['user']['id']."'");
						
						if(isset($_POST['submitrotw']))
						{
						if (empty($_POST['agree']) || empty($_POST['reply_sent']) || empty($_POST['entry']) || empty($_POST['room']))
						{
						echo '<div class="alert alert-danger" style="text-align: center;">Please fill in all fields.</div>'; 
						}
						else
						{
						if(mysql_num_rows($sqlmax1) < 1){
						mysql_query("INSERT INTO `users_submissions` (user_id,user,feedback,agree,timestamp,reply_sent,entry,room) VALUES ('".$_SESSION['user']['id']."', '".$_SESSION['user']['username']."', '".filter($_POST["feedback"])."', '".filter($_POST["agree"])."','".time($_POST["timestamp"])."', '".filter($_POST["reply_sent"])."', '".filter($_POST["entry"])."', '".filter($_POST["room"])."')") or die(mysql_error());
						mysql_query("INSERT INTO users_submissions SET timestamp = '" . time() . "' WHERE timestamp = '' LIMIT 1");
						mysql_query("INSERT INTO users_submissions SET reply_sent = '1' WHERE reply_sent = '0' LIMIT 1");
	
						echo '<div class="alert alert-success"><b>Thank you!</b> Your ROTW Submission has been submitted and is awaiting to be reviewed by our Event Team!</div>'; 
						
						}else{
						echo '<div class="alert alert-danger">You\'re only allowed <b>1</b> ROTW Submission per week. You\'ve already reached the maximum amount! Please wait for a reply, or wait for all submissions to get deleted for the next week.</div>';
						} 
						}	
						}
?>

<?php
						$sql1 = mysql_query("SELECT user FROM users_submissions WHERE user = '".$_SESSION['user']['username']."'");
						$sqlmax2 = mysql_query("SELECT user FROM users_submissions WHERE entry = 'COTW' AND user_id = '".$_SESSION['user']['id']."'");
						
						if(isset($_POST['submitcotw']))
						{
						if (empty($_POST['agree']) || empty($_POST['reply_sent']) || empty($_POST['entry']) || empty($_POST['room']))
						{
						echo '<div class="alert alert-danger" style="text-align: center;">Please fill in all fields.</div>'; 
						}
						else
						{
						if(mysql_num_rows($sqlmax2) < 1){
						mysql_query("INSERT INTO `users_submissions` (user_id,user,feedback,agree,timestamp,reply_sent,entry,room) VALUES ('".$_SESSION['user']['id']."', '".$_SESSION['user']['username']."', '".filter($_POST["feedback"])."', '".filter($_POST["agree"])."','".time($_POST["timestamp"])."', '".filter($_POST["reply_sent"])."', '".filter($_POST["entry"])."', '".filter($_POST["room"])."')") or die(mysql_error());
						mysql_query("INSERT INTO users_submissions SET timestamp = '" . time() . "' WHERE timestamp = '' LIMIT 1");
						mysql_query("INSERT INTO users_submissions SET reply_sent = '1' WHERE reply_sent = '0' LIMIT 1");
	
						echo '<div class="alert alert-success"><b>Thank you!</b> Your COTW Submission has been submitted and is awaiting to be reviewed by our Event Team!</div>'; 
						
						}else{
						echo '<div class="alert alert-danger">You\'re only allowed <b>1</b> COTW Submission per week. You\'ve already reached the maximum amount! Please wait for a reply, or wait for all submissions to get deleted for the next week.</div>';
						} 
						}	
						}
?>
<form method="post">
<div class="form-section">
<strong>Pick Your ROTW Room</strong><br />
<select class="form-select" name="room" required="">
<?php
				$rooms = mysql_query("SELECT id, name, state, description FROM rooms WHERE owner_id = '".$_SESSION['user']['id']."'");
				while($room = mysql_fetch_array($rooms)){
					echo "<option value=\"[Room ID: ".$room['id']."] - Room Name: ".$room['name']."\">[Room ID: ".$room['id']."] - Room Name: ".$room['name']."</option>";
				}
?>
</select>
</div>

<div class="form-section">
<strong>What Kind Of ROTW Theme Would You Like To See?</strong><br />
<textarea class="form-control is-valid" name="feedback" maxlength="3000"></textarea>
</div>

<div class="form-section">
<input name="entry" required="" type="hidden" value="ROTW"></input>
<input name="reply_sent" required="" type="hidden" value="1"></input>
<input name="agree" required="" type="hidden" value="yes"></input>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><br/>
<input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="submitrotw" class="submit_field" value="Send ROTW Submission"></font></font>  
</div>

</form>
<br>
<hr/>
<form method="post">
<br>
<div class="form-section">
<strong>Pick Your COTM Room</strong><br />
<select class="form-select" name="room" required="">
<?php
				$rooms = mysql_query("SELECT id, name, state, description FROM rooms WHERE owner_id = '".$_SESSION['user']['id']."'");
				while($room = mysql_fetch_array($rooms)){
					echo "<option value=\"[Room ID: ".$room['id']."] - Room Name: ".$room['name']."\">[Room ID: ".$room['id']."] - Room Name: ".$room['name']."</option>";
				}
?>
</select>
</div>

<div class="form-section">
<strong>What Kind Of COTM Theme Would You Like To See?</strong><br />
<textarea class="form-control is-valid" name="feedback" maxlength="3000"></textarea>
</div>

<div class="form-section">
<input name="entry" required="" type="hidden" value="COTW"></input>
<input name="reply_sent" required="" type="hidden" value="1"></input>
<input name="agree" required="" type="hidden" value="yes"></input>

<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><br/>
<input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="submitcotw" class="submit_field" value="Send COTM Submission"></font></font>  
</form>
</div>

</div>
</div>
</div>


<div class="col-md-5">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>Your Event Submissions Status</center></font></font></h1>				
<?php
						$selectapps = mysql_query("SELECT reply FROM users_submissions WHERE user = '".$_SESSION['user']['username']."'");
						echo "<div class='alert alert-success' style='text-align: center;'><center>You have sent in a total of <strong> ";
						echo mysql_num_rows($selectapps);
						echo " </strong>Event Entries!</center></div>";
					?>
<?php
	$home1 = mysql_query("SELECT * FROM users_submissions WHERE user = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	if(mysql_num_rows($home) != 0)
	{
		
	$home1 = mysql_query("SELECT * FROM users_submissions WHERE user = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user1 = mysql_fetch_assoc($home1);

	if($user1['reply_sent'] == 2){ $OnlineStatus11 = "
	
<div class='alert alert-success' style='text-align: center;'>Hey, Our Event Team has replied to your event submission entry!</br><center><b>Our Reply Is Listed Below</b></center></div>	
	"; } else { $OnlineStatus11 = " $OnlineStatus11
	
"; }

?>
<?php
	$home11 = mysql_query("SELECT * FROM users_submissions WHERE user = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	
	$user11 = mysql_fetch_assoc($home11);

	if($user11['reply_sent'] == 1){ $OnlineStatus111 = "
	
<div class='alert alert-danger' style='text-align: center;'>You do not have any replies yet.</div>
	"; } else { $OnlineStatus111 = "
	
";
		
	$home = mysql_query("SELECT * FROM users_submissions WHERE user = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);

	if($user['reply_sent'] == 2){ $OnlineStatus1 = '
	
<div class="alert alert-success" style="text-align: center;">Hey '.$user11['user'].', Our Event Team has replied to your event submission entry!</br></br>

<center><b>We\'ve replied to your "'.$user11['entry'].'" event submission entry!</b><br><i> '.$user11['reply'].'</i></center></div>	
	'; } else { $OnlineStatus1 = ' '; }


?>
<?php echo $OnlineStatus111 ?>
<?php echo $OnlineStatus1 ?>
</div>
</div>
</div>

<div class="col-md-5">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>Outfit Of The Week Submission</center></font></font></h1>

<?php
						$sql3 = mysql_query("SELECT user FROM users_submissions WHERE user = '".$_SESSION['user']['username']."'");
						$sqlmax3 = mysql_query("SELECT user FROM users_submissions WHERE entry = 'OOTW' AND user_id = '".$_SESSION['user']['id']."'");

						if(isset($_POST['submitlook']))
						{
						if (empty($_POST['agree']) || empty($_POST['reply_sent']) || empty($_POST['entry']))
						{
						echo '<div class="alert alert-danger" style="text-align: center;">Please fill in all fields.</div>'; 
						}
						else
						{
						if(mysql_num_rows($sqlmax3) < 1){
						mysql_query("INSERT INTO `users_submissions` (user_id,user,feedback,agree,timestamp,reply_sent,look,entry) VALUES ('".$_SESSION['user']['id']."', '".$_SESSION['user']['username']."', '".filter($_POST["feedback"])."', '".filter($_POST["agree"])."','".time($_POST["timestamp"])."', '".filter($_POST["reply_sent"])."', '".$getLook["look"]."', '".filter($_POST["entry"])."')") or die(mysql_error());
						mysql_query("INSERT INTO users_submissions SET timestamp = '" . time() . "' WHERE timestamp = '' LIMIT 1");
						mysql_query("INSERT INTO users_submissions SET reply_sent = '1' WHERE reply_sent = '0' LIMIT 1");
	
						echo '<div class="alert alert-success" style="text-align: center;"><b>Thank you!</b> Your OOTW Submission has been submitted and is awaiting to be reviewed by our Event Team!</div>'; 
						
						}
						else{
						echo '<div class="alert alert-danger">You\'re allowed <b>1</b> OOTW Submissions per week. You\'ve already reached the maximum amount! Please wait for a reply, or wait for all submissions to get deleted for the next week.</div>';
						} 
						}	
						}
?>
<form method="post">
<center><div class="platte" style="background:url({cdnurl}/images/ootw.gif?1) no-repeat;background-position:50% 100%;width: 145px;height: 155px;">
<a href="/home/{username}"><img data-toggle="tooltip" data-placement="top" data-original-title="{username}" src="{imager}<?php echo $getLook['look']; ?>&amp;head_direction=3&amp;gesture=sml&amp;action=wav" style="margin-left: 10px;margin-top: 6px;"></a>

</div>
<div class="form-section">
<strong>Outfit Of The Week Styles You'd Like To See?</strong><br />
<textarea class="form-control is-valid" name="feedback" maxlength="3000"></textarea>


<br/>
<input name="look" required="" type="hidden" value="<?php echo $getLook['look']; ?>"</input>
<input name="reply_sent" required="" type="hidden" value="1"></input>
<input name="agree" required="" type="hidden" value="yes"></input>
<input name="entry" required="" type="hidden" value="OOTW"></input>
<input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;width: 235px;margin-left: 40px;margin-top: -10px;" type="submit" name="submitlook" class="submit_field" value="Send OOTW Submission"></font></font> 
		</center>
</div>

</form>
</div>
</div>
</div>

<!--div class="col-md-5">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>This Weeks Events Available</center></font></font></h1>
<p>
Coming Soon....
</p>
</div>
</div>
</div>
<div class="col-md-5">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>Last Week Event Winners</center></font></font></h1>
<p>
Coming Soon....
</p>
</div>
</div>
</div>
-->
</div>
</div>
</div>


<?php include_once('/includes/footer.php'); ?>
</body>
</html>