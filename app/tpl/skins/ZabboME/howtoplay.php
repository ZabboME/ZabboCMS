<title>How To Play {shortname}</title>

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
<h2>How to play</h2>
<p>You've styled your avatar, gotten comfy in your homeroom and you've been shown how a few things work by the Hotel Manager… So, what next?</p>
<p>Here are some ideas:</p>
<p><img src="https://images.habbo.com/c_images/HowToPlay/navigator.png" alt="Navigator" class="align-right" style="float: right;"></p>
<h3>Explore rooms</h3>
<p>Click the Navigator and choose one of the public rooms where you can chat with other {shortname}s.</p>
<hr>
<p><img src="https://images.habbo.com/c_images/HowToPlay/askfriend.png" alt="Ask to be friend" class="align-right" style="float: right;"></p>
<h3>Make friends</h3>
<p>Click on a {shortname}, ask them to be your friend or give them respect!</p>
<hr>
<p><img src="https://images.habbo.com/c_images/HowToPlay/citizenship.png" alt="Habbo citizenship" class="align-right" style="float: right;"></p>
<h3>Complete your {shortname} Citizenship</h3>
<p>To get to know the Hotel a bit better, start by clicking on the Help tool in the the top right corner in the hotel.</p>
<hr>
<p><img src="https://images.habbo.com/c_images/HowToPlay/gamehub.png" alt="Game Hub" class="align-right" style="float: right;"></p>
<h3>Visit game rooms</h3>
<p>Find the Game Hub in the list of public rooms in the navigator. Once there, use any of the arcade machines to go to a game room!</p>
<hr>
<p><img src="https://images.habbo.com/c_images/HowToPlay/shop.png" alt="Shop" class="align-right" style="float: right;"></p>
<h3>Go shopping</h3>
<p>Go to the Duckets shop and see what your free duckets can get you!</p>
<hr>
<h3>Check out the latest activities</h3>
<p>Visit the <a href="/">Home</a> section of the website to find out all the latest news, competitions and general goings-on in {shortname}!</p>
<p>Once you've done a few of these, you will be well on your way to becoming a fully fledged {shortname} citizen!</p>
<blockquote>
<h3>Join {shortname}!</h3>
<p>Haven't registered for {shortname} yet? <a href="/register">Join now</a>!</p>
</blockquote></main>
</div>
</div>
</div>

<div class="col-md-9" style="float: right;width: 292px;">
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{shortname} Way</font></font></h1>
<div class="body">
<p>Follow the <a href="/playing-zabbo/zabbo-way">{shortname} Way</a> - a series of guidelines to keep you on the right side of fun!</p>
</div>
</div>
</div>

<div class="col-md-9" style="float: right;width: 292px;">
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Safety Tips</font></font></h1>
<div class="body">
<p>Protect yourself with awareness! Learn how to <a href="/playing-zabbo/safety">stay safe on the internet</a>.</p>
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