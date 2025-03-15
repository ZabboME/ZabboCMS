<title>{shortname} ~ VIP Leaderboards</title>

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
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Richest In Credits</center><div class="ripping"><img src="/game/c_images/album1584/GOATVIP.gif" style="float: left;margin-top: -50px;margin-left: -40px;"></div></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

<?php
$get_richest = mysql_query("SELECT look,credits,username,rank FROM users WHERE rank = 9 ORDER BY credits DESC LIMIT 5");
if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Goat VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
echo' <div style="width: 90%;height: 65px;display:block;background: rgb(208, 186, 35);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/credits.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['credits']).' Credits </b>
</div>
</div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '0' WHERE `rank` = '9' ORDER BY users_currency.amount DESC LIMIT 5");
  	if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Goat VIP Members Yet!</b></center></div>';
										else
											
										{
            while($richest = mysql_fetch_array($get_richest))
            {
                   echo'<div style="width: 90%;height: 65px;display:block;background: rgba(165, 35, 208, 0.55);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '5' WHERE `rank` = '9' ORDER BY users_currency.amount DESC LIMIT 5");


if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Goat VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgba(50, 165, 133, 0.56);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">
</div>
</div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/diamonds.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['amount']).'  Diamonds </b>
</div>
</div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '101' WHERE `rank` = '9' ORDER BY users_currency.amount DESC LIMIT 5");

if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Goat VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgb(210 3 3 / 62%);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
                               <a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/points.gif" style="position: relative;top: 4px;"></div> <b style="position:  absolute;margin-top: 2px;margin-left: 25px;">'.number($richest['amount']).'  Points </b>
</div></div>
';
}
										}
?>
</font></font></div>
</div>
</div>
<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Richest In Credits</center><div class="ripping"><img src="/game/c_images/album1584/FVIP.gif" style="float: left;margin-top: -50px;margin-left: -40px;"></div></h1>

<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

<?php //$get_richest = mysql_query("SELECT id, username, look, credits FROM `users` WHERE `rank` = '13' ORDER BY `credits` DESC LIMIT 5");
$get_richest = mysql_query("SELECT look,credits,username,rank FROM users WHERE rank = 4 ORDER BY credits DESC LIMIT 5");
if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Fendi VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
echo' <div style="width: 90%;height: 65px;display:block;background: rgb(208, 186, 35);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/credits.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['credits']).' Credits </b>
</div>
</div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '0' WHERE `rank` = '4' ORDER BY users_currency.amount DESC LIMIT 5");
  	if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Fendi VIP Members Yet!</b></center></div>';
										else
											
										{
            while($richest = mysql_fetch_array($get_richest))
            {
                   echo'<div style="width: 90%;height: 65px;display:block;background: rgba(165, 35, 208, 0.55);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
                            <div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '5' WHERE `rank` = '4' ORDER BY users_currency.amount DESC LIMIT 5");


if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Fendi VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgba(50, 165, 133, 0.56);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">
</div>
</div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/diamonds.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['amount']).'  Diamonds </b>
</div>
</div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '101' WHERE `rank` = '4' ORDER BY users_currency.amount DESC LIMIT 5");

if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Fendi VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgb(210 3 3 / 62%);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
                               <a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/points.gif" style="position: relative;top: 4px;"></div> <b style="position:  absolute;margin-top: 2px;margin-left: 25px;">'.number($richest['amount']).'  Points </b>
</div></div>
';
}
										}
?>
</font></font></div>
</div>
</div>

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Richest In Credits</center><div class="ripping"><img src="/game/c_images/album1584/PVIP.gif" style="float: left;margin-top: -50px;margin-left: -36px;"></div></h1>
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

<?php $get_richest = mysql_query("SELECT id, username, look, credits FROM `users` WHERE `rank` < '13' ORDER BY `credits` DESC LIMIT 5");
$get_richest = mysql_query("SELECT look,credits,username,rank FROM users WHERE rank = 3 ORDER BY credits DESC LIMIT 5");
if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Prada VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
echo' <div style="width: 90%;height: 65px;display:block;background: rgb(208, 186, 35);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/credits.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['credits']).' Credits </b>
</div></div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '0' WHERE `rank` = '3' ORDER BY users_currency.amount DESC LIMIT 5");

if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Prada VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo'<div style="width: 90%;height: 65px;display:block;background: rgba(165, 35, 208, 0.55);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/duckets.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['amount']).' Duckets </b>
</div></div>
';
}
										}
?>
</font></font></div>
</div>
</div>

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top Richest In Diamonds</center></h1>
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '5' WHERE `rank` = '3' ORDER BY users_currency.amount DESC LIMIT 5");

if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Prada VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgba(50, 165, 133, 0.56);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/diamonds.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['amount']).'  Diamonds </b>
</div></div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '101' WHERE `rank` = '3' ORDER BY users_currency.amount DESC LIMIT 5");

if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Prada VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgb(210 3 3 / 62%);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">
</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
                               <a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/points.gif" style="position: relative;top: 4px;"></div> <b style="position:  absolute;margin-top: 2px;margin-left: 25px;">'.number($richest['amount']).'  Points </b>
</div></div>
';
}
										}
?>
</font></font></div>
</div>
</div>

<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
<div class="card users">
<h1 class="title" style="font-size: 12px;"><center>Top <b class="label label-primary1" style="font-size: 11.5px;">5</b> Richest In Credits</center><div class="ripping"><img src="/game/c_images/album1584/XVIP.gif" style="float: left;margin-top: -50px;margin-left: -36px;"></div></h1>
<div class="image"></div>
<div class="count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font></div>
<div class="desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

<?php $get_richest = mysql_query("SELECT id, username, look, credits FROM `users` WHERE `rank` < '13' ORDER BY `credits` DESC LIMIT 5");
$get_richest = mysql_query("SELECT look,credits,username,rank FROM users WHERE rank = 2 ORDER BY credits DESC LIMIT 5");
if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Supreme VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
echo' <div style="width: 90%;height: 65px;display:block;background: rgb(208, 186, 35);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/credits.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['credits']).' Credits </b>
</div></div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '0' WHERE `rank` = '2' ORDER BY users_currency.amount DESC LIMIT 5");

if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Supreme VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo'<div style="width: 90%;height: 65px;display:block;background: rgba(165, 35, 208, 0.55);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/duckets.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['amount']).' Duckets </b>
</div></div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '5' WHERE `rank` = '2' ORDER BY users_currency.amount DESC LIMIT 5");

if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Supreme VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgba(50, 165, 133, 0.56);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
								<a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/diamonds.gif" style="position: relative;top: 7px;"></div> <b style="position:  absolute;margin-top: 5px;margin-left: 25px;">'.number($richest['amount']).'  Diamonds </b>
</div></div>
';
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

  <?php $get_richest = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id AND users_currency.type = '101' WHERE `rank` = '2' ORDER BY users_currency.amount DESC LIMIT 5");

if (mysql_num_rows($get_richest) == 0)
										echo '<div class="alert alert-danger" style="width: 225px;margin-left: 5px;margin-top: 20px;"><center><b>No Supreme VIP Members Yet!</b></center></div>';
										else
											
										{
while($richest = mysql_fetch_array($get_richest))
{
                   echo' <div style="width: 90%;height: 65px;display:block;background: rgb(210 3 3 / 62%);border: 2px solid rgba(255, 255, 255, 0.25);margin: 0px auto;margin-top: 5px;border-radius: 2px;margin-bottom: 5px;">
<div class="ripping"><div style="margin-top: 5px;float:left;width: 50px;height: 55px;background:url({imager}'.$richest['look']. '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml) center -18px;background-repeat: no-repeat, repeat;">

</div></div>
<div style="float:left; width:140px; margin-left:10px;margin-top:10px;">
                               <a href="{url}/home/'.$richest['username'].'" style="left: -8px;color: whitesmoke;text-decoration-line: underline;">'.$richest['username'].'</b></a> <br> <div class="ripping" style="position: absolute;"><img src="{cdnurl}/images/icons/points.gif" style="position: relative;top: 4px;"></div> <b style="position:  absolute;margin-top: 2px;margin-left: 25px;">'.number($richest['amount']).'  Points </b>
</div></div>
';
}
										}
?>
</font></font></div>
</div>
</div>

<!-- Supreme VIP End -->



</div>
</div>

<?php include_once('/includes/footer.php'); ?>
</body>
</html>