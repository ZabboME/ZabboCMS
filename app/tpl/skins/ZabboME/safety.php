<title>Safety Tips ~ {shortname}</title>

<?php 
	$navigatorID = 5;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		
<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);
?>
     <!-- Page Content -->
<div class="row">

<?php
$userList = mysql_query("SELECT id FROM paypal WHERE username = '".$user['username']."'");
?>	

<div class="col-md-9">
<div class="card">
<div class="body">
<main class="wrapper wrapper--content" ui-view="" style=""><article class="main main--fixed static-content">
<h2>Safety tips</h2>
<p>These are the top 7 tips for how to navigate the internet safely and securely!</p>
<p><img src="https://images.habbo.com/c_images/Security/safetytips1_n.png" alt="Protect your personal info" class="align-right" style="float: right;"></p>
<h3>Protect Your Personal Info</h3>
<p>You never know who you're truly speaking to online, so never share your personal information! Giving away your personal info - real name, address, phone numbers, photos or school - could lead to you being scammed, bullied or put in serious danger.</p>
<hr>
<p><img src="https://images.habbo.com/c_images/Security/safetytips2_n2.png" alt="Protect your privacy" class="align-right" style="float: right;"></p>
<h3>Protect Your Privacy</h3>
<p>Never share your any of your personal details. This includes Facebook, Twitter, Skype, Instagram and Snapchat info. You never know who might get their hands on it!</p>
<hr>
<p><img src="https://images.habbo.com/c_images/Security/safetytips3_n.png" alt="Don't give in to peer pressure" class="align-right" style="float: right;"></p>
<h3>Don't Give In To Peer Pressure</h3>
<p>Just because everyone else seems to be doing it, doesn't mean you have to. If you are not comfortable with something, don't do it!</p>
<hr>
<p><img src="https://images.habbo.com/c_images/Security/safetytips4_n.png" alt="Keep your pals in pixels" class="align-right" style="float: right;"></p>
<h3>Keep Your Pals In Pixels</h3>
<p>Do not meet up with someone you only know from the internet!  People aren't always who they claim to be. If a {shortname} asks you to meet with them in real life say "No, thanks!" click 'Ignore' on them and tell your parents or another trusted adult.</p>
<hr>
<p><img src="https://images.habbo.com/c_images/Security/safetytips5_n.png" alt="Don't be scared to speak up" class="align-right" style="float: right;"></p>
<h3>Don't Be Scared To Speak Up</h3>
<p>If someone is making you feel uncomfortable, threatening you, or pressuring you to do something you don't want to, put them on ignore, and report them immediately to our moderation team using the "Call for Help" button.</p>
<hr>
<p><img src="https://images.habbo.com/c_images/Security/safetytips6_n.png" alt="Ban the cam" class="align-right" style="float: right;"></p>
<h3>Ban The Cam</h3>
<p>You have no control over your personal photos, videos + webcam images after you share them on the internet. Once an image is posted, it can never be removed, will be viewable by anyone and could be used to bully or blackmail you. Before you share a pic or video, ask yourself; are you comfortable with people you don't know viewing it?</p>
<hr>
<p><img src="https://images.habbo.com/c_images/Security/safetytips7_n.png" alt="Be a smart surfer" class="align-right" style="float: right;"></p>
<h3>Stick To The Real {shortname}!</h3>
<p>Websites that offer free prizes, credits, furni, or "staff rights" are ALL scams designed to steal your password. Never give them your login details or download files from these websites. They could be keyloggers or viruses!</p>
<br><br><br>
</main>
</div>
</div>
</div>

<div class="col-md-9" style="float: right;width: 292px;">
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PARENTS' GUIDE</font></font></h1>
<div class="body">
<p>Curious about the effective tools that ensure our users can have fun in a safe environment? See our <a target="_blank" rel="noopener noreferrer" ng-href="https://help.habbo.com/forums/144065-information-for-parents" href="https://help.habbo.com/forums/144065-information-for-parents">Parents' Guide on the Customer Support &amp; Helpdesk</a> pages.</p>
</div>
</div>
</div>

<div class="col-md-9" style="float: right;width: 292px;">
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Need Help?</font></font></h1>
<div class="body">
<p>Learn how to help yourself or how to get help on our <a href="/playing-zabbo/help">Help page</a>.
It also contains a list of phone numbers and websites if you need someone to talk to.</p>
<p>If you can't find answers there, please see our <a target="_blank" rel="noopener noreferrer" ng-href="/contact" href="/contact">Customer Support &amp; Helpdesk</a> pages.</p></div>
</div>
</div>


</div>
</div>

</div>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>