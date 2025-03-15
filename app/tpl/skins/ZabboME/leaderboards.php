<title>{shortname} ~ Leaderboards</title>

<?php 
	$navigatorID = 2;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		
<style>
.label-primary1 {
    background-color: #ffffff4f;
}
 </style>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Richest In Credits</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
  <?php $get_richest = mysql_query("SELECT id, username, look, credits FROM `users` WHERE rank = '1' || rank = '5' || rank = '7' || rank = '8' ORDER BY `credits` DESC LIMIT 5");
  	if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Richest Credits, Yet!</b></center></div>';
										else
											
										{
            while($richest = mysql_fetch_array($get_richest))
            {
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgb(208, 186, 35);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$richest['username']. '">

                            </div></div>
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/credits.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['credits']).' Credits </b>
                            </div>
						
                    </div>';
            }
										}

?>
</font></font></div>
</div>
</div>

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Richest In Duckets</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '0' WHERE rank = '1' || rank = '5' || rank = '7' || rank = '8' ORDER BY users_currency.amount DESC LIMIT 5");
  	if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Richest Duckets, Yet!</b></center></div>';
										else
											
										{
            while($richest = mysql_fetch_array($get_richest))
            {
                   echo'<div style="width: 90%;height: 65px;display:block;background: rgba(165, 35, 208, 0.55);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$richest['username']. '">

                            </div></div>
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/duckets.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['amount']).' Duckets </b>
                            </div>
                    </div>';
            }
			}

?>
</font></font></div>
</div>
</div>

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Richest In Diamonds</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
 <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '5' WHERE rank = '1' || rank = '5' || rank = '7' || rank = '8' ORDER BY users_currency.amount DESC LIMIT 5");
 	if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Richest Diamonds, Yet!</b></center></div>';
										else
											
										{
            while($richest = mysql_fetch_array($get_richest))
            {
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgba(50, 165, 133, 0.56);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$richest['username']. '">

                            </div></div>
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/diamonds.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['amount']).'  Diamonds </b>
                            </div>
                    </div>';
            }
										}

?>		
</font></font></div>
</div>
</div>		

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Richest In Points</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
    <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '101' WHERE rank = '1' || rank = '5' || rank = '7' ORDER BY users_currency.amount DESC LIMIT 5");
	if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Richest Points, Yet!</b></center></div>';
										else
											
										{
            while($richest = mysql_fetch_array($get_richest))
            {
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgb(210 3 3 / 62%);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$richest['username']. '">

                            </div></div>
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
                               <a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/points.gif" style="position: relative;top: 4px;"></div> <b style="position:  absolute;margin-top: 2px;margin-left: 25px;">'.number($richest['amount']).'  Points </b>
                            </div>
                    </div>';
            }
										}

?>		
</font></font></div>
</div>
</div>			

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> In GOTW Points</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
    <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '103' WHERE rank < '16' ORDER BY users_currency.amount DESC LIMIT 5");
	if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No GOTW Points, Yet!</b></center></div>';
										else
											
										{
            while($richest = mysql_fetch_array($get_richest))
            {
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgb(210 3 3 / 62%);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$richest['username']. '">

                            </div></div>
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
                               <a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/games.gif" style="position: relative;top: 4px;"></div> <b style="position:  absolute;margin-top: 2px;margin-left: 25px;">'.number($richest['amount']).'  GOTW Points </b>
                            </div>
                    </div>';
            }
										}

?>		
</font></font></div>
</div>
</div>		

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Highest Achievements</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
	<?php
$usersstats1_a = mysql_query("SELECT user_id,achievement_score FROM users_settings ORDER BY achievement_score DESC LIMIT 5");
if (mysql_num_rows($usersstats1_a) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Most Score, Yet!</b></center></div>';
										else
											
										{
while($usersstats2 = mysql_fetch_assoc($usersstats1_a)){
$row1 = mysql_fetch_assoc($row1 = mysql_query("SELECT username,look FROM users WHERE id = '".$usersstats2['user_id']."' LIMIT 1"));
?>

  <?php
            {
                   echo'<div style="width: 90%;height: 65px;display:block;background: rgba(172, 175, 25, 0.86);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$row1['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$row1['username']. '">

                            </div></div>
							'.$OnlineStatus['online'].'
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$row1['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$row1['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/ach.gif" style="position: relative;top: 5px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($usersstats2['achievement_score']).'  Score </b>
                            </div>
                    </div>';
            }
}

?>

<?php } ?>		
</font></font></div>
</div>
</div>	

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Longest Login Streaks</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
	<?php
$usersstats1_a = mysql_query("SELECT user_id,streak_days FROM users_settings ORDER BY streak_days DESC LIMIT 5");
if (mysql_num_rows($usersstats1_a) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Most Longest Login Streaks, Yet!</b></center></div>';
										else
											
										{
while($usersstats2 = mysql_fetch_assoc($usersstats1_a)){
$row1 = mysql_fetch_assoc($row1 = mysql_query("SELECT username,look FROM users WHERE id = '".$usersstats2['user_id']."' LIMIT 1"));
?>

  <?php
            {
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgba(234, 96, 202, 0.62);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$row1['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$row1['username']. '">

                            </div></div>
							'.$OnlineStatus['online'].'
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$row1['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$row1['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/login_streaks.gif" style="position: relative;top: 5px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($usersstats2['streak_days']).'  Days Streak </b>
                            </div>
                    </div>';
            }
}

?>

<?php } ?>		
</font></font></div>
</div>
</div>		

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Highest Online Time</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">			
   	<?php
$usersstats1_a = mysql_query("SELECT user_id,online_time FROM users_settings ORDER BY online_time DESC LIMIT 5");
if (mysql_num_rows($usersstats1_a) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Most Online Time, Yet!</b></center></div>';
										else
											
										{
while($usersstats2 = mysql_fetch_assoc($usersstats1_a)){
$row1 = mysql_fetch_assoc($row1 = mysql_query("SELECT username,look FROM users WHERE id = '".$usersstats2['user_id']."' LIMIT 1"));
?>

  <?php
            {
                   echo'<div style="width: 90%;height: 65px;display:block;background: rgba(50, 133, 142, 0.6);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$row1['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$row1['username']. '">

                            </div></div>
							'.$OnlineStatus['online'].'
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$row1['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$row1['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/time.gif" style="position: relative;top: 5px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.OnlineTime($usersstats2['online_time']).' </b>
                            </div>
                    </div>';
            }
}

?>
<?php } ?>
</font></font></div>
</div>
</div>

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Most Respect Received</center></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
  	<?php
$usersstats1_a = mysql_query("SELECT user_id,respects_received FROM users_settings ORDER BY respects_received DESC LIMIT 5");
if (mysql_num_rows($usersstats1_a) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Most Respected Received, Yet!</b></center></div>';
										else
											
										{
while($usersstats2 = mysql_fetch_assoc($usersstats1_a)){
$row1 = mysql_fetch_assoc($row1 = mysql_query("SELECT username,look FROM users WHERE id = '".$usersstats2['user_id']."' LIMIT 1"));
?>

  <?php
            {
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgba(179, 0, 0, 0.44);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$row1['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;" data-toggle="tooltip" data-placement="top" data-original-title="'.$row1['username']. '">

                            </div></div>
							'.$OnlineStatus['online'].'
                            <div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$row1['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;top: -2px;">'.$row1['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/respect.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 20px;">'.number($usersstats2['respects_received']).' Respects</b>
                            </div>
                    </div>';
            }

}
?>
<?php } ?>
</font></font></div>
</div>
</div>
</div>
</div>

<?php include_once('/includes/footer.php'); ?>
</body>
</html>