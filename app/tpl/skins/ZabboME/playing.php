<title>What's {shortname}</title>

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
<h2>What is {shortname}?</h2>
<p><a href="/register" class="remove-link"><img src="https://images.habbo.com/c_images/WhatIsHabbo/join_now.png" alt="Join now" class="align-right" style="float: right;"></a></p>
<p>{shortname} is an online vintage pixel-art style virtual community where you can
<strong>create your own avatar, make friends, chat, build rooms, design + play games</strong>
and so much more! Almost anything is possible in this strange place full of
awesome people…</p>
<h2>More than just a game…</h2>
<p><img src="https://images.habbo.com/c_images/WhatIsHabbo/ill_15.png" alt="Find your community" class="align-right" style="float: right;"></p>
<p>Styling your avatar in the most on-trend styles isn't the only way to have fun
in {shortname}. Want to be the architect of the century and <strong>build dazzling
structures</strong>? Builders Club is for you! Want to show off your crazy <strong>game
building skills</strong> and stump your friends? Join our competitions! Are you crazy
about <strong>selfies and funny pics</strong>? Our Camera feature is endless fun!</p>
<h2>Find your community</h2>
<p>Do you love to chat and hang out with friends? <strong>{shortname} Groups, forums and
Roleplaying communities</strong> are a great place to start. Join the army and suit up
for duty, don your cape and save the universe, wear {shortname} Couture as you strut
down the runway, become a nurse and save pixel lives. Join in and start
exploring the endless role-playing possibilities!</p>
<h2>Express yourself</h2>
<p><img src="https://images.habbo.com/c_images/WhatIsHabbo/ill_16.png" alt="Express yourself" class="align-right" style="float: right;"></p>
<p>Creativity and individuality are welcomed in {shortname}! Every week we have tons of
awesome competitions for you to enter. From <strong>room building to Selfies, to pixel
art videos and short story comps</strong> - there are tons of cool things to get your
artistic juices flowing and win awesome achievements + prizes! Feeling creative?
Check out our <a href="/">news</a> to find out about fun weekly competitions!</p>
<h2>Play free, forever.</h2>
<p>{shortname} is a <strong>free to play</strong> game, so you can explore a vast world of rooms,
complete quests, chat and win prizes without ever having to pay a thing!</p>
<p>Some in-game 'extras' like pets, {shortname} Club membership, Builders Club membership
and furniture can be purchased with {shortname} Credits. For more info about in-game
extras, head to the <a href="/store">{shortname}Store</a>.</p>
<h2>Always here to help…</h2>
<p><img src="https://images.habbo.com/c_images/WhatIsHabbo/ill_17.png" alt="Always here to help" class="align-right" style="float: right;"><p>
<p>The Hotel is moderated 24 hours a day, seven days a week. You can also do a lot
to make sure you stay safe on {shortname} and on the internet. Read our <a href="/playing-zabbo/safety">Safety
Tips</a> to find out how.</p>
<p>As a popular online virtual world we are proud to have great <strong>in-depth
knowledge of online safety</strong>, following international guidelines set out by
government groups and teen organisations.</p>
<h2>Play on desktop, iPad, Android</h2>
<p>The {shortname} world is waiting for you - take a peek, watch this video!</p>
<iframe src="//www.youtube.com/embed/Psd3nCVJjPM" frameborder="0" width="640" height="360"></iframe><p>Check out loads of more videos on <a href="https://www.youtube.com/user/habbo" target="_blank" rel="noopener noreferrer">Habbo's YouTube
page</a>…</p>
<h2>Join {shortname}!</h2>
<p><a href="/register" class="remove-link"><img src="https://images.habbo.com/c_images/WhatIsHabbo/join_now.png" alt="Join now" class="align-right" style="float: right;"></a></p>
<p>Become a part of the world's biggest online community for teens. <a href="/register">Join {shortname}
now</a>!</p>
</article></main>
</div>
</div>
</div>

<div class="col-md-9" style="float: right;width: 292px;">
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HOW TO PLAY</font></font></h1>
<div class="body">
<p>Get creative, get constructive, get social! See our <a href="/playing-zabbo/how-to-play">tips on what to do in {shortname}</a>.</p>

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
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PARENTS' GUIDE</font></font></h1>
<div class="body">
<p>Curious about the effective tools that ensure our users can have fun in a safe environment? See our <a target="_blank" rel="noopener noreferrer" ng-href="https://help.habbo.com/forums/144065-information-for-parents" href="https://help.habbo.com/forums/144065-information-for-parents">Parents' Guide on the Customer Support &amp; Helpdesk</a> pages.</p>
</div>
</div>
</div>

</div>
</div>

</div>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>