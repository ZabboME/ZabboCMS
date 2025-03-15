<title>{shortname} ~ Online Users</title>

<?php 
	$navigatorID = 1;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		

<div class="row">
<div class="col-md-12">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Online Users</font></font></h1>
<div class="row">
<div style='height:775px;overflow-y:scroll;margin-right:6px;margin-top:5px;'>

<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);
?>
<?php

	$row1 = mysql_query("SELECT id,username,rank,look,motto,online,cms_color FROM users WHERE `online` = '1' ORDER BY RAND()") or die('There isn\'t any users online at the time, so the citizens online couldn\'t fetch. Try again later.');

	if (mysql_num_rows($row1) > 0)
	{
        while($row = mysql_fetch_assoc($row1)) {

?>

<?php

$getUser1 = mysql_query("SELECT * FROM users WHERE id ='".$row['id']."'");
$userrank = mysql_fetch_array($getUser1);


$rankId = $userrank['rank'];
if($rankId == 8 || $rankId == 5 || $rankId == 1)
{
	$getRank = mysql_query("SELECT * FROM permissions WHERE id ='1'");
}else
{
	$getRank = mysql_query("SELECT * FROM permissions WHERE id ='$rankId'");
}
$rank = mysql_fetch_array($getRank);
?>

<?php

$getUser2 = mysql_query("SELECT * FROM users WHERE id ='".$user['id']."'");
$userrank2 = mysql_fetch_array($getUser1);


$rankId1 = $userrank['rank'];
if($rankId1 == 8 || $rankId == 5 | $rankId == 4)
{
	$getRank1 = mysql_query("SELECT * FROM permissions WHERE id ='1'");
}else
{
	$getRank1 = mysql_query("SELECT * FROM permissions WHERE id ='$rankId'");
}
$rank1 = mysql_fetch_array($getRank1);
?>
            <div class="col-lg-2 col-xs-6">
			<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);padding-bottom: 10px;">
			<h1 class="title" style="font-size: 12px;"><?php  echo $row['username']; ?></h1>
			<div <?php  echo (($rank['id'] < 3) ? 'class="card rarepreview" style="margin-bottom: 0px;background-color: #313131;")'  :'')  ?> '>
			<div <?php  echo (($rank['id'] > 2) ? 'class="card rarepreview" style="margin-bottom: 0px;background-color: #884500;")'  :'')  ?> '>
			<div <?php  echo (($rank['id'] > 9) ? 'class="card rarepreview" style="margin-bottom: 0px;background-color: #00354c;")'  :'')  ?> '>
			<div <?php  echo (($rank['id'] == 15) ? 'class="user-icon-sparkle" style="background-image: url({cdnurl}/images/staff.gif")'  :'')  ?> '>
			<div <?php  echo (($rank['id'] > 9) ? 'class="user-icon-sparkle" style="background-image: url({cdnurl}/images/staff.gif")'  :'')  ?> '>
			<a href="{url}/home/<?php  echo $row['username']; ?>"><div class="rare_icon" style="background: url('{imager}<?php  echo $row['look']; ?>&size=sml&head_direction=3&gesture=sml&&action=wav') 50% 80% no-repeat;"></div></a></div>
			<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
			<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
			<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
			<span style="color: #e8c25a;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;">Rank</span>
			<span class="count_number" data-amount="8653254" data-text="" style="word-break: break-all;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);max-width: 69px;text-overflow: clip;white-space: pre;"><?php  echo $rank['rank_name']; ?></span>
			</div>
			</div>
			<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #A47D15;background-image: url({cdnurl}/images/star.png);background-repeat: no-repeat;background-position: center center;"></div>
			</div>
			</div></div>
			</div>
			</div>
			</div>
			</div>
			

           <?php   }

    } else { echo '<div class="rounded rounded-red" style="font-weight: bold; text-align: center;">There\'s no civilians online at this time!</div>'; } ?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include_once('/includes/footer.php'); ?>
</body>
</html>