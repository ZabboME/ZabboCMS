<title>Help Tips ~ {shortname}</title>

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
<h2>How to deal with a problem in {shortname}</h2>
<p>You may occasionally come across the odd misbehaving {shortname}. Never fear, help is at hand! On this page we'll tell you what tools work best in tricky situations.</p>
<h2>In a room</h2>
<p>When you're in a room and another {shortname} is being out-of-line, click on their avatar and a drop-down menu will appear.  This lets you either ignore, moderate or in really disruptive cases, report them.</p>
<h4>Ignoring a {shortname}</h4>
<p>If <strong>a {shortname} is saying things which make you feel uncomfortable</strong>, you can put them on ignore. This is an ideal solution for teasing, spamming or when you simply want to say "Bye Felicia!" but don't know how.</p>
<p><img src="https://images.habbo.com/c_images/Help/report_4.png" alt="Click an avatar to ignore, moderate or report" class="align-right" style="float: right;"></p>
<ol>
<li>Click on their avatar. A drop-down menu will appear.</li>
<li>Choose the <em>Ignore</em> option.</li>
<li>You won't see what the {shortname} says anymore. If you want to un-ignore later, click the avatar again and choose <em>Listen</em>.</li>
</ol>
<h4>Moderating a {shortname}</h4>
<p><strong>In your own rooms, or if you have room rights</strong>, you can decide who can visit the room, and you have the power to mute, kick or ban other users. This allows you to play an active part in the general {shortname} moderation and to contribute to a safer and more enjoyable community.</p>
<p>Read more on {shortname} Helpdesk about <a target="_blank" rel="noopener noreferrer" ng-href="https://help.habbo.com/entries/22562247-Room-moderation-tools-" href="https://help.habbo.com/entries/22562247-Room-moderation-tools-">room moderation tools</a> and <a target="_blank" rel="noopener noreferrer" ng-href="https://help.habbo.com/entries/68606947-All-about-Room-Settings-Tool" href="https://help.habbo.com/entries/68606947-All-about-Room-Settings-Tool">room settings</a>.</p>
<h4>Reporting a {shortname}</h4>
<p>If <strong>things are getting heated in a room</strong>: {shortname}s are talking about meeting in real life, want to video call, exchange personal contact details or someone's being badly bullied… consider reporting that person. No one likes a tattle-tale, so remember to use this only when someone is intentionally doing harm to others or themselves.</p>
<ol>
<li>Click on the trouble-making {shortname}'s avatar. A drop-down menu will appear.</li>
<li>Choose <em>Report</em></li>
<li>Highlight the lines of chat that you feel out moderation team need to see.</li>
<li>Choose a topic for your call that best matches your problem.</li>
<li>Tell our moderation team what happened.</li>
<li>Send the help request and our moderation team will try to resolve the issue. If you chose <em>Bullying</em> a Guardian may intervene.</li>
</ol>
<p><img src="https://images.habbo.com/c_images/Help/help_button.png" alt="Help button" class="align-right" style="float: right;"></p>
<p>Another way of doing the same is this:</p>
<ol>
<li>Click <em>Help</em> in the top right corner.</li>
<li>Choose <em>Someone is misbehaving</em>. You'll see a list of all {shortname}s in the room.</li>
<li>Click the badly-behaving {shortname}.</li>
<li>Highlight the lines of chat you feel our moderation team need to see.</li>
<li>Choose a topic for your call.</li>
<li>Tell our moderation team what happened.</li>
<li>Send the help request and our moderation team will try to resolve the issue.</li>
</ol>
<hr>
<h2>In personal messaging/chat</h2>
<p>If <strong>you are chatting to someone on PM and they are making you feel uncomfortable</strong>:</p>
<ol>
<li>Click the <em>Report</em> button below the other {shortname}'s picture in the chat window.</li>
<li>You will be asked for more information about what happened.</li>
<li>Our moderation team will then take appropriate action.</li>
</ol>
<p><img src="https://images.habbo.com/c_images/Help/report_im.png" alt="Reporting a {shortname} in personal messaging" style="float: right;"></p>
<h2>In a group forum</h2>
<p><img src="https://images.habbo.com/c_images/Help/flag_3.png" alt="Orange flag for reporting forum threads and posts" class="align-right" style="float: right;"></p>
<p>You can <strong>report an inappropriate group forum thread or post</strong>:</p>
<ol>
<li>Click the orange flag icon in the forum.</li>
<li>You will be asked for more information about the situation.</li>
<li>Our moderation team will then take appropriate action.</li>
</ol>
<h2>On a web page</h2>
<p><img src="https://images.habbo.com/c_images/Help/reportroom.png" alt="White flag for reporting room home pages or camera pics" class="align-right" style="float: right;"></p>
<p>You can <strong>report an inappropriate photo, room or room image on a room homepage or photo page</strong>:</p>
<ol>
<li>Click the white flag icon</li>
<li>Choose a topic for your call that best matches your problem</li>
<li>Let us know what's wrong with the room or photo</li>
<li>Our moderation team will then take appropriate action</li>
</ol>
<hr>
<h2>Safety Tips</h2>
<p>On our <a href="/playing-zabbo/safety">Safety Tips</a> page you'll find <strong>suggestions on how to have fun without putting yourself at risk</strong>. Check it out, there's lots of helpful information!</p>
<h2>{shortname} Way</h2>
<p>Haven't read <a href="/playing-zabbo/zabbo-way">The {shortname} Way</a> yet? Please do! This stuff is really important. It's <strong>a set of simple rules</strong> to follow so that the hotel remains a fun place to hang out.</p>
<h2>How to play</h2>
<p>Looking for <strong>ideas on what to do in {shortname}</strong>? Read our <a href="/playing-zabbo/how-to-play">guide on how to play</a>!</p>
<p>If you need <strong>instructions on how to use furni, effects, or any other tool</strong> in the Hotel, click the <em>Help</em> button in the top right corner, then click <em>Ask for instructions</em> and a Helper will be on their way.</p>
<h2>{shortname} Help Desk</h2>
<p>If you have a <strong>problem with your {shortname} account, there was an error with the credits you bought or you have questions about a banned account</strong>, find your answer in our <a target="_blank" rel="noopener noreferrer" ng-href="https://help.habbo.com" href="https://help.habbo.com">Customer Support &amp; Helpdesk</a> pages.</p>
</article></main>
</div>
</div>
</div>

<div class="col-md-9" style="float: right;width: 292px;">
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEEN HELPLINES</font></font></h1>
<div class="body">
<p>If you are feeling sad, being bullied, harming yourself or just want to talk to someone for advice and help about things outside {shortname}, please contact these helplines.</p>
<p>For player assistance, {shortname} bans, and other {shortname}-related questions, you can contact the <a target="_blank" rel="noopener noreferrer" ng-href="/contact" href="/contact">{shortname} Helpdesk</a>.</p>
<h4>Australia</h4>
<p><strong>Kids Help</strong></p>
<ul>
<li>Phone: 1-800-55-1800</li>
<li><a href="http://www.kidshelpline.com.au/" target="_blank" rel="noopener noreferrer">www.kidshelpline.com.au</a></li>
</ul>
<h4>Canada</h4>
<p><strong>KidsHelpPhone</strong></p>
<ul>
<li>Phone: 1-800-668-6868</li>
<li><a href="http://www.kidshelpphone.ca/Teens/" target="_blank" rel="noopener noreferrer">www.kidshelpphone.ca/Teens</a></li>
</ul>
<h4>India</h4>
<p><strong>Aasra</strong></p>
<p>If you are feeling alone or depressed, you can talk to Aasra.</p>
<ul>
<li>Phone: 91-22-27546669</li>
<li><a href="http://www.aasra.info/" target="_blank" rel="noopener noreferrer">www.aasra.info</a></li>
</ul>
<p><strong>Connecting India</strong></p>
<p>If you are emotionally distressed or feeling suicidal, call Connecting India.</p>
<ul>
<li>Phone: 99-22-001122</li>
<li><a href="http://connectingindia.org/" target="_blank" rel="noopener noreferrer">connectingindia.org</a></li>
</ul>
<h4>Ireland</h4>
<p><strong>TeenLine Ireland</strong></p>
<ul>
<li>Phone: 1-800-833-634 (Wednesdays 4 pm to 11 pm, other days 8 pm to 11 pm)</li>
<li><a href="http://teenline.ie/" target="_blank" rel="noopener noreferrer">teenline.ie</a></li>
</ul>
<h4>Malaysia</h4>
<p><strong>Childline Malaysia</strong></p>
<ul>
<li>Phone: 15999</li>
</ul>
<h4>New Zealand</h4>
<p><strong>0800 What's Up</strong></p>
<ul>
<li>Phone: 0-800-942-8787 (1 pm to 10 pm)</li>
<li><a href="http://www.whatsup.co.nz/" target="_blank" rel="noopener noreferrer">www.whatsup.co.nz</a></li>
</ul>
<h4>Philippines</h4>
<p><strong>Manila Lifeline Centre</strong></p>
<ul>
<li>Phone: 02-896-9191 or 0917-854-9191</li>
</ul>
<h4>Singapore</h4>
<p><strong>Tinkle Friend</strong></p>
<ul>
<li>Phone: 1-800-2744-788 (Monday to Friday, 9.30am to 11.30am &amp; 2.30pm to 5.00pm)</li>
<li><a href="http://www.tinklefriend.com/talk-to-us" target="_blank" rel="noopener noreferrer">www.tinklefriend.com/talk-to-us</a></li>
</ul>
<h4>UK</h4>
<p><strong>Childline</strong></p>
<p>Whether you're feeling stressed, anxious, lonely or down, you can call Childline.</p>
<ul>
<li>Phone: 0-800-1111</li>
<li><a href="http://www.childline.org.uk/" target="_blank" rel="noopener noreferrer">www.childline.org.uk</a></li>
</ul>
<p><strong>CEOP</strong></p>
<p>If you are a young person who has been approached about sex online, or forced or tricked into taking part in sexual activity with anyone online or in the real world, you can visit the <a href="http://www.ceop.police.uk/safety-centre/" target="_blank" rel="noopener noreferrer">CEOP Safety Centre</a> for advice and to report directly to CEOP.</p>
<h4>USA</h4>
<p><strong>Teen Line</strong></p>
<p>If you have a problem or just want to talk, you can call or text Teen Line or use their <a href="https://teenlineonline.org/board/" target="_blank" rel="noopener noreferrer">message boards</a>.</p>
<ul>
<li>Phone: 310-855-4673 (6pm to 10pm PST)</li>
<li>Text TEEN to 839863 (5:30pm-9:30pm PST)</li>
<li><a href="https://teenlineonline.org/" target="_blank" rel="noopener noreferrer">teenlineonline.org</a></li>
</ul>
<p><strong>Cybertipline</strong></p>
<p>If you see child sexual exploitation on the Internet, you can report it to CyberTipline.</p>
<ul>
<li><a href="http://www.cybertipline.com" target="_blank" rel="noopener noreferrer">www.cybertipline.com</a></li>
</ul></div>
</div>
</div>



</div>
</div>

</div>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>