<title>{shortname} ~ Community</title>
<?php 
	$navigatorID = 2;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		
<style>
    .box {
        width: 243px;
        height: 70px;
        margin-top: 10px;
        margin-bottom: 20px;
        float: left;
        margin-right: 37px;
    }
    .box1 {
        margin-left: 20px;
        margin-top: 5px;
        background: #FFF;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        width: 238px;
        height: 70px;
        border-radius: 4px;
    }
    .count {

        margin-top: 5px;
        margin-right: 15px;
        font-weight: bold;
        font-size: 30px;
    }
    .desc {

        font-size: 12px;
        height: 24.7px;
        width: 100%;


    }
    #column.diagramm {
        width: 100%;
        height: 400px;
    }
    .users .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
		background: url('{cdnurl}/images/me_rooms_active.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }
    .rooms .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/room_icon_3.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }
    .items .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/v24_1.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }
    .bans .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
		background: url('{cdnurl}/images/toolbar_bb_03.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }	
	
	.pets .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/tonestroom_big.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }
	
	
    .bans .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
		background: url('{cdnurl}/images/toolbar_bb_03.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }


    .chats .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/v22_5.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }


    .pms .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/mail2.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }

    .groups .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/v22_4.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }	


    .events .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
		background: url('{cdnurl}/images/v24_2.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }


    .trade .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/toolbar_05.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }


    .staff .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/mod_1.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }
    .values .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/groupboard_Sticky.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }	
    .events .image {
        float: left;
        width: 82px;
        height: 82px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        background: url('{cdnurl}/images/events_icon.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }	

</style>

<div class="row">
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM users"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>{shortname}'s signed up...</i></font></font></div>
</div>
</div>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card rooms">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM rooms"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>Rooms on {shortname}...</i></font></font></div>
</div>
</div>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card items">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number(mysql_num_rows(mysql_query("SELECT NULL FROM items"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>Items on {shortname}...</i></font></font></div>
</div>
</div>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card pets">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM users_pets"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>Pets on {shortname}...</i></font></font></div>
</div>
</div>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card bans">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM bans"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>Banned on {shortname}...</i></font></font></div>
</div>
</div>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card groups">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM guilds"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>Groups on {shortname}...</i></font></font></div>
</div>
</div>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card events">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM events_hosted_logs"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>Events on {shortname}...</i></font></font></div>
</div>
</div>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card staff">
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number_format(mysql_num_rows(mysql_query("SELECT NULL FROM users_apps"))); ?></font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;background-color: #73737366; border: 1px solid #777a81; border-radius: 3px; padding: 1.25%;"><i>Applications received...</i></font></font></div>
</div>
</div>


</div>

<?php
$eo = 'even';
function GenerateRoomOccupancy($usersNow, $usersMax)
{
$num = 1;
$percentage = intval(($usersNow / $usersMax) * 100);

if ($percentage <= 0)
{
$num = 1;
}
else if ($percentage < 35)
{
$num = 2;
}
else if ($percentage < 75)
{
$num = 3;
}
else if ($percentage < 100)
{
$num = 4;
}
else if ($percentage >= 100)
{
$num = 5;
}

return '' . $num;
}

?>

<div class="row">


<style>
.badge {
    display: inline-block;
    min-width: 12px;
    padding: 5px 6px;
    font-size: 14px;
    font-weight: 700;
    line-height: 2;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}
</style>		

<div class="col-md-9">
	<div class="card" style="padding: 0;">
		<div class="body" style="padding: 10px;">
		<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Random Groups</font></font></h1>
		</div>
		<table class="rooms table table-striped">
			<tbody>
				<?php
					$getUserGroup = mysql_query("SELECT * FROM `guilds` WHERE `id` ORDER BY rand() LIMIT 5");
						while($groupdata= mysql_fetch_array($getUserGroup))
						{
				?>	
				
				<?php
					if(!is_numeric($_GET['i'])) $_GET['i'] = 1;
					$q = mysql_query("SELECT * FROM guilds WHERE id = '" . filter($groupdata['id']) . "' LIMIT 1");
				//	if(mysql_num_rows($q) != 1) header("" . filter($_GET['i']) . "'");
					$groupData1 = mysql_fetch_assoc($q);
					unset($q);
					$userList = mysql_query("SELECT * FROM guilds_members WHERE guild_id = '{$groupData1["id"]}'");
				  
				?>
				<td>   <center>                  
				<img data-toggle="tooltip" data-placement="top" data-original-title="Owned By:  <?php echo mysql_result(mysql_query("SELECT username FROM users WHERE id = '{$groupdata['user_id']}' LIMIT 1"), 0); ?>" src="https://badges.zabbo.me/badge/<?php echo $groupdata['badge']; ?>.gif"></a></td>
				<td style="text-align: justify;word-break: break-word;"><span class="badge">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b><?php echo $groupdata['name']; ?></b></font></font></span>
				<td style="text-align: justify;word-break: break-word;">
				<font style="font-size: 11px;vertical-align: inherit;"><font style="vertical-align: inherit;"><i><?php echo $groupdata['description']; ?></i></font></font>
				<br><i style="font-size: 11px;word-break: break-word;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font></font></i></td>    
				<td style="width: 150px;padding-right: 10px;"><a class="form-control is-valid"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center><b> <?php echo mysql_num_rows($userList); ?> Member</b></font></font></center></center></td></tr><tr>

						<?php
						}
					?>		
				
			</tbody>
		</table>
	</div>
</div>

	
<div class="col-md-3">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<div class="row">
<div class="platte" style="float: left;margin-left: 60px;margin-top: 5px;background:url({cdnurl}/images/ootw.gif?1) no-repeat;background-position:50% 100%;width: 145px;height: 155px;"><?php
			$getRandom = mysql_query("SELECT id,username,look,motto,account_created,online,ootw FROM users WHERE ootw = '1' ORDER BY RAND() LIMIT 1");
			$i = 0;

			while ($randomHabbo = mysql_fetch_assoc($getRandom))
			{		 
			echo '
			<a href="{url}/home/' . htmlspecialchars($randomHabbo['username']) . '"><img data-toggle="tooltip" data-placement="top" data-original-title="' . htmlspecialchars($randomHabbo['username']) . '" src="{imager}' . htmlspecialchars($randomHabbo['look']) . '&amp;head_direction=3&amp;gesture=sml&dance=4&img_format=gif" style="margin-left: 44px;margin-top: 6px;"></a>
			';

			$i++;
			}
?>

</div></div>
</div>
</div>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<div class="row">
<div class="platte" style="float: left;margin-left: 60px;margin-top: 5px;background:url({cdnurl}/images/uotw.gif?1) no-repeat;background-position:50% 100%;width: 145px;height: 155px;"><?php
			$getRandom = mysql_query("SELECT id,username,look,motto,account_created,online,uotw FROM users WHERE uotw = '1' ORDER BY RAND() LIMIT 1");
			$i = 0;

			while ($randomHabbo = mysql_fetch_assoc($getRandom))
			{		 
			echo '
			<a href="{url}/home/' . htmlspecialchars($randomHabbo['username']) . '"><img data-toggle="tooltip" data-placement="top" data-original-title="' . htmlspecialchars($randomHabbo['username']) . '" src="{imager}' . htmlspecialchars($randomHabbo['look']) . '&amp;head_direction=3&amp;gesture=sml&amp;action=wav&img_format=gif" style="margin-left: 44px;margin-top: 6px;"></a>
			';

			$i++;
			}
?>

</div></div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include_once('/includes/footer.php'); ?>

</body>
</html>