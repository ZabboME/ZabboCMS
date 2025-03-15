<title>{shortname} ~ Way ~</title>

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
<h2>{shortname} Way</h2>
<p>The {shortname} Way is like a code of conduct, a guide to how {shortname}s should act in the Hotel. Playing by the rules puts the fun in {shortname}!</p>
<h2>DO…</h2>
<p><img src="https://images.habbo.com/c_images/HabboWay/habboway_2a.png" alt="Do chat" class="align-right" style="float: right;"></p>
<h4>Chat</h4>
<p>Be a chatterbox and get to know your fellow {shortname}s! Make new friends, chat with old ones and have FUN!</p>
<h4>Create</h4>
<p>Let your creativity run wild and really express yourself! From building epic rooms to creating awesome selfies - You could be the next Pixel Picasso!</p>
<p><img src="https://images.habbo.com/c_images/HabboWay/habboway_5a.png" alt="Do create" class="align-right" style="float: right;"></p>
<h4>Help</h4>
<p>Help a stranger, gain a friend! Always be helpful to other {shortname}s - you never know when you might need help yourself.</p>
<h4>Trade</h4>
<p>Build your own furni empire and trade your way to the top! If you have a nose for business, use the Marketplace to sell items and stock up on credits.</p>
<p><img src="https://images.habbo.com/c_images/HabboWay/habboway_1a.png" alt="Do play games" class="align-right" style="float: right;"></p>
<h4>Play &amp; host games</h4>
<p>Play games with friends, get in the competitive spirit and kick butt! Or create your own games and get popular! Successful games means other {shortname}s will want to join and swamp your room with fun.</p>
<h4>Make friends</h4>
<p>Have fun, hang out and you might just make a great pixel friend…</p>
<hr>
<h2>DON'T…</h2>
<p><img src="https://images.habbo.com/c_images/HabboWay/habboway_2b.png" alt="Don't troll" class="align-right" style="float: right;"></p>
<h4>Troll</h4>
<p>No one likes trolls, not even their mothers! Bullying in {shortname} will not be tolerated.</p>
<h4>Scam or script</h4>
<p>Make it, don't fake it! No one likes a trickster. Stealing doesn't make you rich, it makes you a criminal.</p>
<h4>Trick or cheat</h4>
<p>Cheaters and tricksters never prosper; they just spoil everyone else's {shortname} experience.</p>
<p><img src="https://images.habbo.com/c_images/HabboWay/habboway_7b.png" alt="Don't sell for real money" class="align-right" style="float: right;"></p>
<h4>Sell for real money</h4>
<p>Never sell your furni, account, password or anything in the game for real money. You will lose everything, plus you'll have wasted all the time and effort it took to collect those things!</p>
<h4>Cyber</h4>
<p>Cybering is <strong>strictly</strong> forbidden. Cam requests will result in punishment. Remember: Never meet up with people you met online. They aren't always who they claim to be!</p>
<hr>
<blockquote>
<h4>How to play</h4>
<p>Get creative, get constructive, get social! See our <a href="/playing-zabbo/how-to-play">tips on what to do in {shortname}</a>.</p>
</blockquote>
</main>
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