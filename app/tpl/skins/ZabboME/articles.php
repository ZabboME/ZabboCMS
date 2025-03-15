
<title>{shortname} ~ {newsTitle}</title>
<style>
.card h1.title {
    background: #3B599C;
    color: #FFF;
    padding: 10px;
    border-radius: 3px;
    letter-spacing: 0.5px;
    font-size: 14px;
    margin-top: 0;
    width: fit-content;
}

</style>
<?php 
	$navigatorID = 2;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		
<?php
if (isset($_GET['deleteID']) && $_GET['deleteID'] != null && is_numeric($_GET['deleteID']))
{
$deleteID = filter($_GET['deleteID']);
if ($_SESSION['user']['rank'] >= 17)
{
$getRank = mysql_fetch_array(mysql_query("SELECT `rank` FROM `users` WHERE `id` = '".$_SESSION['user']['id']."'"));
if ($getRank >= 17)
{
mysql_query("DELETE FROM `site_news_comments` WHERE `id` = '".$deleteID."'");
mysql_query("INSERT INTO `stafflogs` (`type`,`userid`,`action`,`timestamp`) VALUES ('CMS','".$_SESSION['user']['id']."','Deleted a news comment','".time()."')");
}
}
}else if (isset($_GET['banID']) && $_GET['banID'] != null && is_numeric($_GET['banID']))
{
$banID = filter($_GET['banID']);
if ($_SESSION['user']['rank'] >= 17)
{
$getRank = mysql_fetch_array(mysql_query("SELECT `rank` FROM `users` WHERE `id` = '".$_SESSION['user']['id']."'"));
if ($getRank >= 17)
{
$getComments = mysql_query("SELECT * FROM `site_news_comments` WHERE `id` = '".$banID."'")  or die(mysql_error());
if (mysql_num_rows($getComments) > 0)
{
$commentData = mysql_fetch_array($getComments);
mysql_query("DELETE FROM `site_news_comments` WHERE `userid` = '".$commentData['userid']."'") or die(mysql_error());
mysql_query("UPDATE `users` SET `cms_comment_banned` = '1' WHERE `id` = '".$commentData['userid']."' LIMIT 1");
mysql_query("INSERT INTO `stafflogs` (`type`,`userid`,`action`,`timestamp`) VALUES ('CMS','".$_SESSION['user']['id']."','Banned a user from posting news comments.','Banned user ID: ('".filter($_GET['ban'])."')','".time()."')");
}
}
}
}
?>
<div class="row">
    <div class="col-md-3">
        <div class="list-group">

			<?php
{
for ($i = 0; $i < 6; $i++)
{
$sectionName = "";
$sectionCutoffMax = 0;
$sectionCutoffMin = 0;

switch ($i)
{
case 0:
$sectionName = 'Today';
$sectionCutoffMax = time();
$sectionCutoffMin = time() - 86400;
break;

case 1:
$sectionName = 'Yesterday';
$sectionCutoffMax = time() - 86400;
$sectionCutoffMin = time() - 172800;
break;

case 2:
$sectionName = 'This week';
$sectionCutoffMax = time() - 172800;
$sectionCutoffMin = time() - 604800;
break;

case 3:
$sectionName = 'Last week';
$sectionCutoffMax = time() - 604800;
$sectionCutoffMin = time() - 1209600;
break;

case 4:
$sectionName = 'This month';
$sectionCutoffMax = time() - 1209600;
$sectionCutoffMin = time() - 2592000;
break;

case 5:
$sectionName = 'Last month';
$sectionCutoffMax = time() - 2592000;
$sectionCutoffMin = time() - 5184000;
break;
}

$q = "SELECT * FROM cms_news WHERE published >= " . $sectionCutoffMin . " AND published <= " . $sectionCutoffMax .  " ORDER BY published DESC";
$getArticles = mysql_query($q);
if (mysql_num_rows($getArticles) > 0)
{
echo '            <br><a class="list-group-item active ">
			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
			<center><b>' . $sectionName . '</b></center>
			</font></font></a><br>';

while ($a = mysql_fetch_assoc($getArticles))
{
if($a['id'] == $_GET['id'])
{
echo ' <a class="list-group-item active ">
			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>' . $a['title'] . '&nbsp;&raquo;</b></font></font></a>';
}else
{
echo '<a class="list-group-item" href="/news/' . $a['id'] . '"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">' . $a['title'] . '&nbsp;&raquo;</font></font></a>
			';
}
}
}
}
}
?>
			</font></font></a>
			</div>
    </div>

        <div class="col-md-9">
       <div class="card" style="background: white;">
           <h1 class="title" style="width: 100%;">
                    <span style="float: right;padding-right: 10px;"><font style="vertical-align: inherit;">
					<font style="vertical-align: inherit;">
					<b>Posted on</b>: {newsDate}
					</font></font></span>
					<font style="vertical-align: inherit;">
					<font style="vertical-align: inherit;"> 
                    <b>Title</b>: {newsTitle}
					</font></font></h1>
	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
			
			          <h1 class="title" style="width: 100%;">
                    <span><font style="vertical-align: inherit;">
					<b>Description</b>: {newsSummary}
					<font style="vertical-align: inherit;float: right;">
					<b>Written By</b>: {newsAuthor}
					</font></font></span>
					<font style="vertical-align: inherit;">
					<font style="vertical-align: inherit;"> 
					<a href="{url}/home/{newsAuthor}"><div class="ripping" style="margin-top:-15px;float:right;margin-right: 5px;width: 50px;height:40px;background:url({imager}{newsAuthorLook}&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat;" data-toggle="tooltip" data-placement="top" title="" data-original-title="{newsAuthor}" aria-describedby="tooltip507070"></div></a>
				
					</font></font></h1>
            <div class="body">
		
			{newsContent}
<?php
$getComments = mysql_query("SELECT * FROM `site_news_comments` WHERE `article` = '".filter($_GET['id'])."' ORDER BY `id` DESC");
?>
			<?php
			$checkBan = mysql_query("SELECT `cms_comment_banned` FROM `users` WHERE `cms_comment_banned` = '1' AND `id` = '".$_SESSION['user']['id']."' LIMIT 1");
						
			if(mysql_num_rows($checkBan) > 0)

			{
			echo '
			<h1 class="title">
                    <font style="vertical-align: inherit;">
					<font style="vertical-align: inherit;">
					<b><center>Banned from posting news comments!</center></b></font></font></h1>
			<div style="padding: 5px;">
			<p align="center">You\'re banned from posting news comments, due to this you cannot post comments.</p>
			</div>';
			}else
			{
			if(isset($_POST['post_comment']) && $_SESSION['user']['id'] != null)
			{
			$getArticle = mysql_query("SELECT * FROM `cms_news` WHERE `id` = '".filter($_GET['id'])."'") or die(mysql_error());
			if (mysql_num_rows($getArticle) > 0)
			{
			$articleInfo = mysql_fetch_array($getArticle) or die(mysql_error());

			if (mysql_num_rows($checkBan) > 0)
			{
			$errorMessage = 'You\'re banned from leaving a comment.';
			}else
			{
			if($_POST['comment'] == NULL)
			{
			$errorMessage = 'You have left a field empty.';
			}else
			{
			$checkInfo = mysql_query("SELECT * FROM `site_news_comments` WHERE `article` = '".filter($_GET['id'])."' ORDER BY `id` DESC LIMIT 1") or die(mysql_error());
			$newsInfo = mysql_fetch_array($checkInfo);
			if($newsInfo['userid'] == $_SESSION['user']['id'])
			{
			$errorMessage = 'Hey! The last comment was from you, let somebody else comment first!';
			}else
			{
			mysql_query("INSERT INTO `site_news_comments` (`article`, `userid`, `comment`, `posted_on`) VALUES ('".filter($_GET['id'])."', '".$_SESSION['user']['id']."', '".filter($_POST['comment'])."', '".date("M j, Y g:i A")."')") or die(mysql_error());
			$successMessage = 'You have successfully left a comment.';
			}
			}
			}
			}
			}

			echo'
			<h1 class="title" style="width: 100%;">
                    <font style="vertical-align: inherit;">
					<font style="vertical-align: inherit;">
					<b><center>Post Comment</center></b></font></font></h1>';

			if (isset($errorMessage))
			{
			echo '
			<div class="action-error flash-message">
			<div class="rounded">
			<div class="rounded-done"><div class="alert alert-danger" style="text-align: justify;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
                    </button>
                    <center><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
					'.$errorMessage.'</div></font></font></a></center></b></div>
			</div>
			</div>';
			}elseif (isset($successMessage))
			{
			echo '
			<div class="action-confirmation flash-message">
			<div class="rounded">
			<div class="rounded-done"><div class="alert alert-success" style="text-align: justify;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
                    </button>
                    <center><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
					'.$successMessage.'</div></font></font></a></center></b></div>
			</div>
			</div>';
			}

			echo '
			<form action="" method="post">
			<textarea class="form-control is-valid" name="comment" maxlength="500"></textarea><br /><br />
			<center><input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="post_comment" value="Post Comment" /></center>
			</form>
			
			';
			}
			?>
            </font>
            </div>
        </div>
		
<div class="card" style="background: white;">
<div class="body" style="padding: 10px;overflow-y: scroll;">
<div style='height:350px;margin-left:5px;margin-right:6px;margin-top:5px;'>
<?php $getComments = mysql_query("SELECT * FROM `site_news_comments` WHERE `article` = '".filter($_GET['id'])."' ORDER BY `id` DESC"); ?>

<?php
	if(mysql_num_rows($getComments) == 0)
		echo '<div class="alert alert-danger" style="text-align: justify;"><B><CENTER>Sorry, but no one has posted a comment yet!</B></CENTER></div>';
	else
	{
	echo '';
	while($commentInfo = mysql_fetch_array($getComments))
	{
	$userInfo = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$commentInfo['userid']."'"));

	echo '<table style="width: 640px;"><tbody><tr>
	<td width="90px" valign="top" style="position: relative;top: -50px;">
	
	<div class="platte" style="float: left;margin-left: -5px;background:url({cdnurl}/images/plate.png) no-repeat;background-position: 50% 100%;width: 119px;height: 108px;margin-top: 60px;"><a href="{url}/home/'.$userInfo['username'].'"><div class="ripping"><img src="{imager}'.$userInfo['look'].'&head_direction=3&gesture=sml&action=wav" style="margin-left: 24px;margin-top: -24px;" data-toggle="tooltip" data-placement="top" data-original-title="'.$userInfo['username'].'"></a></div></div></td>
	<td width="427px" valign="top"><br>
	<div class="gaestebuch" style="width: 675px;margin-left: -10px;padding: 5px;">
	<div class="row" style="background: #ffffff4f;padding: 10px;">
	<div class="col-md-9">
	<div class="badge" style="position: relative;top: -7px;"><strong>RE: {newsTitle}</strong></div>
	<div class="card" style="width:640px;overflow-y: scroll;height: 90px;"><div class="body" style="text-align: justify;text-justify: inter-word;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></br>'. htmlentities($commentInfo['comment']).'</font></font></div>
	</div></div></div>
	<div class="badge" style="position: relative;top: -22px;left: 175px;background-color: #cacaca;"><i>Posted by <a href="{url}/home/'.$userInfo['username'].'"><b>'.$userInfo['username'].'</b></a> <img src="{cdnurl}/images/flags_small/'.$userInfo['country'].'.png" style="height: 20px;" data-toggle="tooltip" data-placement="top" data-original-title="'. str_replace("-", " ", $userInfo['country']) .'"> on '.$commentInfo['posted_on'].'</i></div>

	</div><div style="width: 637px;height:1px;background-color:#ccc;margin-top: -20px;margin-left: 7px;"></div></br>
	';
	
			if($userInfo['username'] == 'Danna')
			{
			echo '<img src="/game/c_images/album1584/CoOwner.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="CoOwner">';
			}
			elseif($userInfo['username'] == 'Justin' || $userInfo['username'] == 'n04h')
			{
			echo '<img src="/game/c_images/album1584/ZabOwner.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="ZabOwner">';
			}
			elseif($userInfo['rank'] == 18)
			{
			echo '<img src="/game/c_images/album1584/OCLEAD.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="CommunityLeader">';
			}elseif($userInfo['rank'] == 17)
			{
			echo '<img src="/game/c_images/album1584/MNGR.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="MANAGER">';
			}elseif($userInfo['rank'] == 16)
			{
			echo '<img src="/game/c_images/album1584/ADMN.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="Administrator">';
			}elseif($userInfo['rank'] == 15)
			{
			echo '<img src="/game/c_images/album1584/MOD.gif" style="margin-top: -145px;margin-left: -25px;" data-toggle="tooltip" data-placement="top" data-original-title="Moderator">';
			}elseif($userInfo['rank'] == 14)
			{
			echo '<img src="/game/c_images/album1584/TMOD.gif" style="margin-top: -145px;margin-left: -25px;" data-toggle="tooltip" data-placement="top" data-original-title="Trial Moderator">';
			}elseif($userInfo['rank'] == 13)
			{
			echo '<img src="/game/c_images/album1584/eventmanager.gif" style="margin-top: -145px;margin-left: -25px;" data-toggle="tooltip" data-placement="top" data-original-title="Event Manager">';
			}elseif($userInfo['rank'] == 12)
			{
			echo '<img src="/game/c_images/album1584/eventteam.gif" style="position: relative;margin-top: -190px;margin-left: -42px;" data-toggle="tooltip" data-placement="top" data-original-title="Event Team">';
			}elseif($userInfo['rank'] == 9)
			{
			echo '<img src="/game/c_images/album1584/GOATVIP.gif" style="position: relative;margin-top: -190px;margin-left: -42px;" data-toggle="tooltip" data-placement="top" data-original-title="Goat VIP">';
			}elseif($userInfo['rank'] == 8)
			{
			echo '<img src="/game/c_images/album1584/BUILDER.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="Support Team Leader">';
			}elseif($userInfo['rank'] == 7)
			{
			echo '<img src="/game/c_images/album1584/VALUES.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="Value Team">';
			}elseif($userInfo['rank'] == 6)
			{
			echo '<img src="/game/c_images/album1584/BUILDER.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="Builder Team">';
			}elseif($userInfo['rank'] == 4)
			{
			echo '<img src="/game/c_images/album1584/EVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="EVIP">';
			}elseif($userInfo['rank'] == 5)
			{
			echo '<img src="/game/c_images/album1584/PVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="PVIP">';
			}elseif($userInfo['rank'] == 6)
			{
			echo '<img src="/game/c_images/album1584/FVIP.gif" style="margin-top: -175px;margin-left: -45px;position: relative;" data-toggle="tooltip" data-placement="top" data-original-title="FVIP">';
			}

			if ($_SESSION['user']['rank'] >= 17)
			{
			echo '</td><div style="position: relative;margin-left: 660px;margin-top: 30px;top: 43px;z-index: 99999999;"><a class="label label-pill label-warning" href="{url}/index.php?url=news&id='.$_GET['id'].'&deleteID='.$commentInfo['id'].'">Delete</a> | 
			<a class="label label-pill label-danger" href="{url}/index.php?url=news&id='.$_GET['id'].'&banID='.$commentInfo['id'].'">Ban</a></div>';
			}
			echo '</td>


	';
			}
			echo '</tbody></table>';
			} ?>						
								
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