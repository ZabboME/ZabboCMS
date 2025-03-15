<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);
?>
<?php
$laston = mysql_query("SELECT * FROM users WHERE id = '" . $_SESSION['user']['id'] . "' LIMIT 1");
$usera = mysql_fetch_assoc($laston);
?>
<title>{shortname} ~ {username}</title>
<?php 
	$navigatorID = 1;
	require_once ('/includes/header.php'); 
	require_once ('/includes/navigator.php'); 
?>		
<div class="row">
<div class="col-md-7">
<div class="card mebg bg_xmas">
<div class="ripping" style="position: absolute;z-index: 1;"><img src="{cdnurl}/images/flags_small/<?php echo $user['country']; ?>.png?<?php echo time() ?>" style="height: 20px;width: 20px;" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo str_replace("-", " ", $user['country']); ?>"></div>
<div class="ripping" style="position: absolute;z-index: 0;margin-top: -25px;margin-left: -20px;"><img class="shine" data-toggle="tooltip" data-placement="top" data-original-title="{username}" src="{imager}<?php echo $user['look']; ?>&size=l&head_direction=3&gesture=sml&dance=3&img_format=gif"></div>
<div class="body">
<div class="row">
<div class="col-md-4">
<div class="mottobox">
<h1><font style="vertical-align: inherit;margin-left: 20px;"><font style="vertical-align: inherit;"><img src="{cdnurl}/images/icons/myhabcord.gif" class="ripping" style="position: relative;left: -10px;"><b style="font-size: 14.5px;">{username}</b></font></font></h1>
<h5><font style="vertical-align: inherit;margin-left: 20px;"><font style="vertical-align: inherit;font-size: 14.5px;"><img src="{cdnurl}/images/icons/motto.gif" class="ripping" style="position: relative;top: -2px;left: -10px;"><?php echo $user['motto']; ?></font></font></h5>
</div></div>
<div class="col-md-8">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12 col-12">
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #e8c25a;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Credits </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo number($user['credits']); ?></font></font></span>
</div>
</div>
<div class="inner " style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #A47D15;background-image: url({cdnurl}/images/icons/credits.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #3bd0f1;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);padding-left: 1px;">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Diamonds </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
<?php
$getDiamonds = mysql_query("SELECT username,look,motto,amount FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND id = ". $usera['id'] ."");
while($diamondsCurrency = mysql_fetch_array($getDiamonds)) {
echo ''.number($diamondsCurrency['amount']).'';}
?>
</font>
</font>
</span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #006ea2;background-image: url({cdnurl}/images/icons/diamonds.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
</div>
<div class="col-md-6 col-xs-12  col-12">
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #dd75ff;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Duckets </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
<?php
$getDuckets = mysql_query("SELECT username,look,motto,amount FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND id = ". $usera['id'] ."");
while($ducketsCurrency = mysql_fetch_array($getDuckets)) {
echo ''.number($ducketsCurrency['amount']).'';}
?>
</font>
</font>
</span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #aa54c5;background-image: url({cdnurl}/images/icons/duckets.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #fb0000;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">Points</font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
<?php
$getGOTW = mysql_query("SELECT username,look,motto,amount FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '101' AND id = ". $usera['id'] ."");
while($gotwCurrency = mysql_fetch_array($getGOTW)) {
echo ''.number($gotwCurrency['amount']).'';}
?>
</font>
</font>
</span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #960303;background-image: url({cdnurl}/images/icons/points.gif);background-repeat: no-repeat;background-position: center center;"></div>
</div>
</div>
<div class="col-md-12">
<div class="window_style_2" style="position: relative; height: 29px;width: 100%;">
<div class="inner" style="position: absolute; left: 0px; width: 100%; height: 100%; line-height: calc(29px - 12px);">
<div style="width: calc(100% - 30px);display: flex;flex-direction: row;justify-content: space-between;">
<span class="TextWaehrung" style="color: #34d639;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196); padding-left: 1px;">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;margin-left: 2px;">You were playing: </font></font></span>
<span class="count_number" data-amount="8653254" data-text="" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6784313725490196);">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
<?php 
$GetUsers = mysql_query("SELECT id,username,motto,rank,last_online,online,look,country,hidden FROM users WHERE id = '" . $_SESSION['user']['id'] . "'");
$amount = mysql_num_rows($GetUsers);
while($Users = mysql_fetch_assoc($GetUsers))
{
if($Users['online'] == 1){ $OnlineStatus = "Active right now!"; } else { $OnlineStatus = "". relativeTime($Users['last_online']). ""; }
echo "$OnlineStatus ";
}                                                   
?>   
</font>
</font>
</span>
</div>
</div>
<div class="inner" style="position: absolute;right: 0px;width: 29px;height: 29px;background-color: #297b2c;background-image: url({cdnurl}/images/9.png);background-repeat: no-repeat;background-position: center center;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<a href="{url}/client" target="_blank" class="is-valid btn btn-block btn-success right" style="position: relative;"><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Enter {longname} Client</font></font></a>
</div>
<div class="card" style="padding: 0;">
<div class="body" style="padding-bottom: 0px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{shortname} Active Rooms</font></font></h1>
</div>
<table class="rooms table table-striped" style="margin-bottom: 0px;">
<tbody>
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
 
    return 'room_icon_' . $num;
}
 
?>
<?php
 
 $get = mysql_query("SELECT * FROM rooms WHERE state = 'open' AND users > '0' ORDER BY users DESC LIMIT 5")or die(mysql_error());
 if (mysql_num_rows($get) == 0)
 echo '<center style="padding: 10px;"><div style="background: #990000;color: #fff;padding: 15px;font-weight: 500;border-radius: 4px;text-align: center;width: 55%;margin-top: -10px;"><b>There are no active rooms on {longname} yet!</b></div></center>';
 else				
		 {
 while ($room = mysql_fetch_assoc($get))
 {
	 if ($eo == 'even')
	 {
		 $eo = 'odd';
	 }
	 else
	 {
		 $eo = 'even';
	 }
  
	 echo ' 
			<tr>
			<td style="text-align: center;"><img src="{cdnurl}/images/rooms/' . GenerateRoomOccupancy($room['users'], $room['users_max']) . '.gif"></td>
			<td style="text-align: justify;word-break: break-word;">
			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><span class="badge">' . htmlspecialchars($room['name']) . '</span></font>
			</font>
			<br>
			<i style="font-size: 12px;word-break: break-word;">
			<font style="vertical-align: inherit;">
			<font style="vertical-align: inherit;">' . htmlspecialchars($room['description']) . '</font>
			</font>
			</i>
			</td>
			<td>
			<font style="vertical-align: inherit;">
			<font style="vertical-align: inherit;"><span class="badge">' . ($room['users']) . '/' . ($room['users_max']) . '</span></font>
			</font>
			</td>
			<td style="width: 150px;padding-right: 10px;">
			<a href="#' . $room['id'] . '" class="btn btn-block">
			<font style="vertical-align: inherit;">
			<font style="vertical-align: inherit;">Go To Room</font>
			</font>
			</a>
			</td>
			</tr>
	 ';
 }
		 }
  
 ?>
</tbody>
</table>
</div>
<div class="card" style="padding-bottom: 0px;">
            <h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{shortname} Campaigns</font></font></h1>
            <div class="body" style="padding-bottom: 0px;">
                    <div class="listening autoeven">
                        <a href="{discord}" target="_blank" class="colorchange">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-xs-6">
                                    <center>
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAAA+CAMAAACbfeAsAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAMAUExURQAAABcWEzgyLgBhOydFBjpJNTFoAQJKSk8oAGYqBkFqGEV2LHZCDVtbW05bYlRmTmJjXmV6XXV1dTl9kgBmzFeGO1GiAHSHbH2QdgCYmQKnsjONrDOZszCxsB2d/ziz6kWTs3GitkmcxU6u3k20zVWkwFSu2muE2G+H2XKJ2HGI2XGI2nKJ23GK2HGK2nSI2XSI23WL2nWL23aM23iO236T3H+U3WGvy07d6VrI/2PF5WbM/23W/37N+pYPAYZPFJlIEKBhI8oUAMxmANBqAP9GD+p5ALycRqL/AP6EGf+ZAOaXLv+ZM96cW8upTe+7eP/BGubKXY6PjJuvlKeporizrbq7vICV3YOX3Yaa34mc4I2f4ZCh4ZKj4pKk4pSl4ZSl4pam45ip45ip5Jyr5J2s5J+u5aCv5aGw5qaz5qSz56a056i15qq46K676bC86bC96oDNzZnMzJnM/5Xb/5n//7fC7LnE7L7I7aHk/6r//7fm5rT//97Ijf7ho8zMzNbW1sLL7sTN78XO78fQ8MjQ8MzU8c/X8dDX8dLZ8tPa89La9dPe9dTb89bc89bc9Nnf9ML//8///9nh8Nrg9dzh9d3i9d7j9tH7+9r//+rq6u7u7uDl9uPo9+Xp+Obq+Ojs+Ort+evu+ezu+ef//+zz/PT19fDy+vDy+/L0+/X2/Pf4/Pf7//n5+fj5/fr6/fr+////+v7++/z8/v/9//3//P7+/f3+/v7+/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEeJpAEAAAEAdFJOU////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////wBT9wclAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAGHRFWHRTb2Z0d2FyZQBwYWludC5uZXQgNC4xLjFjKpxLAAAJZElEQVRoQ83YjX9bVRkH8GO2LLdsTUM7mr1R3OpA0/n+0nWOctdLSrmdmrVkCOp8BdGJsrqptF1gTFCwiLGiXYO8aJ1zGpkUmvvfxd/znOfcl+TmtujCZ79sycm9J7nfneeec2+mms2mumVDOPAKNzeeR989lpxFHbSOH1fHO+QKiHjI997EeF5vb+/5hPxeh9tP936l9+mYrK2tXbnShfHjJAvDPAJ+qR0IHQXC7gBZKIDWRHnnz/e2jaDo1tZQ5e4BO56G5tzTQbfp6WkVnIZXTPTbLQG/+7NfSAu5dFYaySGhGCJp5dVVyZm2HTiIIzajQzYHPuk1XpGmziue94Y0ExIPjPBw7HrZUqWV6TnnQ/W6UoILdMhmwEve22dHHn3DC/L610aeWvc82d8xccAWXr1u1S1LOaVpx9lpWeU6CwVmsgnQ8378fYGF853LnveadOmQdmA7z7JsenamnZ13QAigqEJJBja81xpiiqbxh3XvKekUHw0Mzjb2SVN4lb1WyWbizjvAq9txC3Yi8Ixw4rMuveLTMoJxvL13WqWSEMHDTBFUOIlAkXTKY9ItNhFgmAcg8SqZfXfutUvuiiaC52AqiyqU/wf4d+kWmxAwygOwzMK9mYrjlCY10XHsOUeVhRg6F5OArwqkY6RfbHyg5oWFynG4xhQhEs+2beuqWQ0ZR0kCCqNznpeOcRGgjF5kDFWp1ELEe+JZ9fL7GcFvCKNz/ik94+IDNSoygu4KxixChE9PlLazMAH4sjASIj3jwsDouTc6iieMJQOjoyg8zBNx+UkABivgW2cuSQvr89d/JS3km9I1JgSM8AhIBVeqrzQ5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">
                                    </center>
                                </div>

                                <div class="col-lg-8 col-sm-8 col-xs-6">
                                    <span style="font-size: 15px;letter-spacing: 0.5px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{shortname} Discord</font></font></span>
                                    <div style="height: 5px;"></div>
                                    <span style="font-size: 12px;letter-spacing: 0.4px;text-align: justify;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You can find all the latest information and developments on the {longname} Discord server and can contact our employees directly if you have any questions or problems.</font></font></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="listening autoeven">
                        <a href="#" target="_blank" class="colorchange">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-xs-6">
                                    <center>
                                        <img src="data:image/png;base64,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">
                                    </center>
                                </div>

                                <div class="col-lg-8 col-sm-8 col-xs-6">
                                    <span style="font-size: 15px;letter-spacing: 0.5px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Instagram</font></font></span>
                                    <div style="height: 5px;"></div>
                                    <span style="font-size: 12px;letter-spacing: 0.4px;text-align: justify;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">We are also on Instagram under the name ZabboME. </font><font style="vertical-align: inherit;">Here you will find information about new rares, innovations in the hotel and competitions!</font></font></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="listening autoeven">
                        <a href="#" target="_blank" class="colorchange">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-xs-6">
                                    <center>
                                        <img src="data:image/png;base64,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">
                                    </center>
                                </div>

                                <div class="col-lg-8 col-sm-8 col-xs-6">
                                    <span style="font-size: 15px;letter-spacing: 0.5px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{shortname}FM Coming Soon!</font></font></span>
                                    <div style="height: 5px;"></div>
                                    <span style="font-size: 12px;letter-spacing: 0.4px;text-align: justify;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{shortname}FM radio station will keep you jamming out to the latest hits with competitions being hosted for you to win rewards in-game!</font></font></span>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
        </div>
<div class="card" style="display:none;padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Online Friends</font></font></h1>
<div class="row">
</div>
</div>
</div>
</div>
<?php
$to5 = mysql_query("SELECT * FROM cms_news ORDER BY ID DESC LIMIT 3") or die(mysql_error());
?>
<div class="col-md-5">
<div class="card">
<h1 class="title">
{shortname} News
</h1>
<div id="news" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#news" data-slide-to="0" class="active"></li><li data-target="#news" data-slide-to="1" class=""></li><li data-target="#news" data-slide-to="2" class=""></li></ol>
    <div class="carousel-inner">
    <div class="item active"><div class="news" style="background: url({url}/ase/ts/{newsIMG-1}) 50% 50%;background-size:cover;border-radius: 3px;"><div class="title"><a href="/news/{newsID-1}" class="btn btn-block right">Read More...</a>{newsTitle-1}</div></div>
	<div class="title" style="padding: 5px;background: #333;color: white;font-size: 11px;font-weight: bolder;font-family: sans-serif;">
    <i>Posted By: {newsAuthor-1}</i><i style="float: right;">Posted On: {newsDate-1}</i>
	</div>
	</div>
    <div class="item"><div class="news" style="background: url({url}/ase/ts/{newsIMG-2}) 50% 50%;background-size:cover;border-radius: 3px;"><div class="title"><a href="/news/{newsID-2}" class="btn btn-block right">Read More...</a>{newsTitle-2}</div></div>
	<div class="title" style="padding: 5px;background: #333;color: white;font-size: 11px;font-weight: bolder;font-family: sans-serif;">
    <i>Posted By: {newsAuthor-2}</i><i style="float: right;">Posted On: {newsDate-2}</i>
	</div>
	</div>
    <div class="item"><div class="news" style="background: url({url}/ase/ts/{newsIMG-3}) 50% 50%;background-size:cover;border-radius: 3px;"><div class="title"><a href="/news/{newsID-3}" class="btn btn-block right">Read More...</a>{newsTitle-3}</div></div>
	<div class="title" style="padding: 5px;background: #333;color: white;font-size: 11px;font-weight: bolder;font-family: sans-serif;">
    <i>Posted By: {newsAuthor-3}</i><i style="float: right;">Posted On: {newsDate-3}</i>
	</div>
	</div>
    </div>
               
<!-- Left and right controls -->
    <a class="left carousel-control" href="#news" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#news" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
 </div>
 </div>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{shortname} Discord</font></font></h1>
<div class="row">
<center>
<iframe src="https://discord.com/widget?id={discord_widget}&theme=dark" width="435" height="350" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
</center>
</div>
</a>
</div>
</div>		
</div>
</div>
<script type="text/javascript">
$('.autoplay').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});
</script>
</div>
</div>
</div>
</div>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>