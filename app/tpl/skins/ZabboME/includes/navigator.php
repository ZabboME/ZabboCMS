<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="container">

<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Toggle navigation</font></font></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<?php
/* 

=====================================================
== ZabboCMS based from RevCMS Credits to Kryptos   ==
== Maintained by Justin							   ==
== Discord: justinretros						   ==
== Devbest: Rebel								   ==
== RageZone: Youngster	                           ==
== RetroTools.YXZ: Justin						   ==
== Credits to Revue & Justin for ZabboCMS theme    ==
=====================================================	

	 =======================================
	 == © 2015 ~ 2022 zabbo.me (Build v4) ==
	 =======================================
	 ====== PLEASE LEAVE ALL CREDITS =======  
	 =======================================

*/

	if ($navigatorID == 1)
		echo '
			<div class="nav navbar-nav dropdown">
				<ul class="nav navbar-nav dropdown-toggle" id="menu1" data-toggle="dropdown" style="cursor: pointer;"><li class="active"><a target=""><i class="fa fa-home"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">{username}&nbsp;<span class="caret"></span></font></a></li></ul>
				<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
					<li role="presentation"><a role="menuitem" tabindex="1" href="/me">{username}</a></li>
					<li role="presentation"><a role="menuitem" tabindex="2" href="/account/info">Account Settings</a></li>
					<li role="presentation"><a role="menuitem" tabindex="3" href="/home/{username}">My Profile Page &nbsp;<b class="label label-primary">' .(mysql_num_rows($userList1214)) . '</b></a></li>
					<li role="presentation"><a role="menuitem" tabindex="4" href="/apps">Hiring Applications &nbsp;<b class="label label-primary">Open</b></a></li>
				</ul>
			</div>
			';
			else
	if ($user1['rank'] >= 1)
		echo '
			<li class="nav navbar-nav dropdown">
				<ul class="nav navbar-nav dropdown-toggle" id="me" data-toggle="dropdown" style="cursor: pointer;"><li class=""><a target=""><i class="fa fa-home"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">{username}&nbsp;<span class="caret"></span></font></a></li></ul>
				<ul class="dropdown-menu" role="menu" aria-labelledby="me">
					<li role="presentation"><a role="menuitem" tabindex="1" href="/me">{username}</a></li>
					<li role="presentation"><a role="menuitem" tabindex="2" href="/account/info">Account Settings</a></li>
					<li role="presentation"><a role="menuitem" tabindex="3" href="/home/{username}">My Profile Page &nbsp;<b class="label label-primary">' .(mysql_num_rows($userList1214)) . '</b></a></li>
					<li role="presentation"><a role="menuitem" tabindex="4" href="/apps">Hiring Applications &nbsp;<b class="label label-primary">Open</b></a></li>
				</ul>
			</li>
			';
	if ($navigatorID == 2)
			echo '
			<li class="nav navbar-nav dropdown">
				<ul class="nav navbar-nav dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;"><li class="active"><a target=""><i class="fa fa-users"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Community&nbsp;<span class="caret"></span></font></a></li></ul>
				<ul class="dropdown-menu" role="menu" aria-labelledby="community">
					<li role="presentation"><a role="menuitem" tabindex="1" href="/community">Community</a></li>
					<li role="presentation"><a role="menuitem" tabindex="2" href="/news">News Article</a></li>
					<li role="presentation"><a role="menuitem" tabindex="3" href="/pictures">Latest Pictures</a></li>
					<li role="presentation"><a role="menuitem" tabindex="4" href="/staff">Staff Team</a></li>
					<li role="presentation"><a role="menuitem" tabindex="5" href="/events">Event Team</a></li>
					<li role="presentation"><a role="menuitem" tabindex="6" href="/support">Support Teams</a></li>
					<li role="presentation"><a role="menuitem" tabindex="7" href="/members">VIP Members</a></li>
					<li role="presentation"><a role="menuitem" tabindex="8" href="/leaderboards">Leaderboards</a></li>
					<li role="presentation"><a role="menuitem" tabindex="9" href="/vipleaderboards">VIP Leaderboards</a></li>
				</ul>
			</li>
			';
			else
		echo '<li class="nav navbar-nav dropdown">
				<ul class="nav navbar-nav dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;"><li class=""><a target=""><i class="fa fa-users"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Community&nbsp;<span class="caret"></span></font></a></li></ul>
				<ul class="dropdown-menu" role="menu" aria-labelledby="community">
					<li role="presentation"><a role="menuitem" tabindex="1" href="/community">Community</a></li>
					<li role="presentation"><a role="menuitem" tabindex="2" href="/news">News Article</a></li>
					<li role="presentation"><a role="menuitem" tabindex="3" href="/pictures">Latest Pictures</a></li>
					<li role="presentation"><a role="menuitem" tabindex="4" href="/staff">Staff Team</a></li>
					<li role="presentation"><a role="menuitem" tabindex="5" href="/events">Event Team</a></li>
					<li role="presentation"><a role="menuitem" tabindex="6" href="/support">Support Teams</a></li>
					<li role="presentation"><a role="menuitem" tabindex="7" href="/members">VIP Members</a></li>
					<li role="presentation"><a role="menuitem" tabindex="8" href="/leaderboards">Leaderboards</a></li>
					<li role="presentation"><a role="menuitem" tabindex="9" href="/vipleaderboards">VIP Leaderboards</a></li>

			
				</ul>
			</li>';
		if ($navigatorID == 5)
        echo '<li class="nav navbar-nav dropdown">
            <ul class="nav navbar-nav dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;"><li class="active"><a target=""><i class="fa fa-users"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Playing {shortname}&nbsp;<span class="caret"></span></font></a></li></ul>
            <ul class="dropdown-menu" role="menu" aria-labelledby="playing">
                <li role="presentation"><a role="menuitem" tabindex="1" href="/playing-zabbo/what-is-zabbo">What\'s {shortname}?</a></li>
                <li role="presentation"><a role="menuitem" tabindex="2" href="/playing-zabbo/how-to-play">How To Play</a></li>
                <li role="presentation"><a role="menuitem" tabindex="3" href="/playing-zabbo/zabbo-way">{shortname} Way</a></li>
                <li role="presentation"><a role="menuitem" tabindex="4" href="/playing-zabbo/safety">Safety Tips</a></li>
                <li role="presentation"><a role="menuitem" tabindex="5" href="/playing-zabbo/help">{shortname} Help</a></li>

            </ul>
        </li>
    ';
    else
    echo '<li class="nav navbar-nav dropdown">
        <ul class="nav navbar-nav dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;"><li class=""><a target=""><i class="fa fa-users"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Playing {shortname}&nbsp;<span class="caret"></span></font></a></li></ul>
        <ul class="dropdown-menu" role="menu" aria-labelledby="playing">
            <li role="presentation"><a role="menuitem" tabindex="1" href="/playing-zabbo/what-is-zabbo">What\'s {shortname}?</a></li>
            <li role="presentation"><a role="menuitem" tabindex="2" href="/playing-zabbo/how-to-play">How To Play</a></li>
            <li role="presentation"><a role="menuitem" tabindex="3" href="/playing-zabbo/zabbo-way">{shortname} Way</a></li>
            <li role="presentation"><a role="menuitem" tabindex="4" href="/playing-zabbo/safety">Safety Tips</a></li>
            <li role="presentation"><a role="menuitem" tabindex="5" href="/playing-zabbo/help">{shortname} Help</a></li>
        </ul>
    </li>';
	
	if ($navigatorID == 3)
		echo '<ul class="nav navbar-nav"><li class="active"><a target=""><i class="fa fa-search"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Values</font></a></li></ul>';
			else
		echo '<ul class="nav navbar-nav"><li class=""><a href="/values"><i class="fa fa-search"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Values</font></a></li></ul>';
	
	if ($navigatorID == 6)
		echo '<ul class="nav navbar-nav"><li class="active"><a target=""><i class="fa fa-edit"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Submissions</font></a></li></ul>';
			else
		if ($user1['rank'] >= 1)	
		echo '<ul class="nav navbar-nav"><li class=""><a href="/submissions" target=""><i class="fa fa-edit"></i></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Submissions</font></a></li></ul>';
	
	
	if ($navigatorID == 4)
		echo '<ul class="nav navbar-nav"><li class="active"><a target=""><i class="fa fa-shopping-basket"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Store</font></a></li></ul>';
			else
		if ($user1['rank'] >= 1)		
		echo '<ul class="nav navbar-nav"><li class=""><a href="/store" target=""><i class="fa fa-shopping-basket"></i></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Store</font></a></li></ul>';
	
	if($user1['rank'] == 6 ) 
	
		echo '<ul class="nav navbar-nav"><li class=""><a href="{url}/ase/index.php?url=login" target="_blank"><i class="fa fa-cog"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Builder ASE</font> 
	
	</a></li></ul>';
	
	if($user1['rank'] == 7 ) 
	
		echo '<ul class="nav navbar-nav"><li class=""><a href="{url}/ase/index.php?url=login" target="_blank"><i class="fa fa-cog"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Value ASE</font> 
	
	</a></li></ul>';

	if($user1['rank'] == 12 || $user1['rank'] == 13 ) 
	
		echo '<ul class="nav navbar-nav"><li class=""><a href="{url}/ase/index.php?url=login" target="_blank"><i class="fa fa-cog"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Event ASE</font> 
	
	</a></li></ul>';
			
	
	if($user1['rank'] >= 14 )  { 
	echo '<ul class="nav navbar-nav"><li class=""><a href="{url}/ase/index.php?url=login" target="_blank"><i class="fa fa-cog"></i>&nbsp;&nbsp;<font style="vertical-align: inherit;">Staff ASE</font> 
	<i class="label label-pill label-warning">New Apps: ' .(mysql_num_rows($userList21)) . '</i>
	</a></li></ul>
	';

	
	}

    if ($user1['rank'] >= 1)
        echo '<ul class="nav navbar-nav navbar-right"><li class=""><a href="javascript:LogoutMe()" target="" data-toggle="tooltip" data-placement="bottom" data-original-title="{username} do you wish to logout?"><i class="fa fa-reply"></i>&nbsp;&nbsp;
    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Logout</font></font></a></li></ul>';

    if ($user1['rank'] == null)
        echo '<ul class="nav navbar-nav navbar-right-go-back"><li class=""><a href="/index"><i class="fa fa-reply"></i>&nbsp;&nbsp;
    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Go Back</font></font></a></li></ul>';
        

?>
</div>
</div>
</div>
</nav>
<div class="container-fluid bg-holo">
<div class="container">
<br>
<?php 
	require_once ('alert.php'); 
?>