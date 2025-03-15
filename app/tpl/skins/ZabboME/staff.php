<title>{shortname} ~ Staff Team</title>

<?php 
	$navigatorID = 2;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		
<style>
.card {
    background: #f8f9fa;
    background-repeat: no-repeat;
    box-shadow: inset 0 0 0 1000px rgb(216 216 220 / 29%);
    border-radius: 4px;
    border: #00000026 solid 1px;
    margin-bottom: 20px;
    padding: 10px;
}
table {
    width: 100%;
    font-size: 14px;
    background-color: #b3b3b300;
}
.listening.even {
    background: #ffffff78;
}
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #fdfdfd7d;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff0;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
	border: 0px solid transparent;
    border-radius: 4px;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #7575758f;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color: #ffffff69;
    border-color: #337ab7;
    border-radius: 5px;
}
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
		background: url('{cdnurl}/assets/images/me_rooms_active.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/room_icon_3.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/v24_1.gif') no-repeat;
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
		background: url('{cdnurl}/assets/images/toolbar_bb_03.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/tonestroom_big.gif') no-repeat;
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
		background: url('{cdnurl}/assets/images/toolbar_bb_03.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/v22_5.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/mail2.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/v22_4.gif') no-repeat;
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
		background: url('{cdnurl}/assets/images/v24_2.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/toolbar_05.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/mod_1.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/groupboard_Sticky.gif') no-repeat;
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
        background: url('{cdnurl}/assets/images/events_icon.gif') no-repeat;
        background-position: 50% 50%;
        background-color: #73737366;
        margin-right: 20px;
        margin-top: -5px;
        margin-left: -5px;
    }	
</style>

<?php  
$GetRanks = mysql_query("SELECT id,rank_name,badge FROM permissions WHERE id > 13 ORDER BY id DESC");
while($Ranks = mysql_fetch_assoc($GetRanks))

        {      
                                        $GetUsers = mysql_query("SELECT id,username,motto,rank,last_online,online,look,country,hidden FROM users WHERE rank = {$Ranks['id']} AND hidden = '0' ORDER by id ");
                                        $amount = mysql_num_rows($GetUsers);
                                        while($Users = mysql_fetch_assoc($GetUsers))
                                        {
                                        echo "<div class=\"col-xs-12 col-lg-3 col-md-6 col-sm-6\" style=\"width: 380px;\"><div class=\"card\" style=\"height: 130px;\"><div style=\"padding:5px\">";
                                        
                                        $Bans = mysql_query("SELECT * FROM `bans` WHERE `user_staff_id` = '" . $Users['id'] . "'");
                                        $BanCount = mysql_num_rows($Bans);
                                                                                
                                        $Tickets = mysql_query("SELECT * FROM `support_tickets` WHERE `mod_id` = '" . $Users['id'] . "'");
                                        $TicketsCount = mysql_num_rows($Tickets);
                                        
                                        if($Users['online'] == 1){ $OnlineStatus = "Active right now!"; } else { $OnlineStatus = "". relativeTime($Users['last_online']). ""; }
                                        echo "<a href='{url}/home/{$Users['username']}'><div class='ripping'><div id='emblemas' style='width: 65px;height: 65px;margin-top: 20px;float: left;border-radius: 242px;background: url({imager}{$Users['look']}&direction=3&head_direction=3&gesture=sml&size=m&effect=23&img_format=gif);' data-toggle='tooltip' data-placement='top' title='' data-original-title='{$Users['username']}'></div></div></a>"
                                        ."&nbsp;&nbsp;<img src=\"{cdnurl}/images/icons/home.gif\"/>&nbsp;<a href='{url}/home/{$Users['username']}'><strong>{$Users['username']}</strong></a> <img src=\"{cdnurl}/images/flags_small/{$Users['country']}.png\" style=\"height: 20px;\" data-toggle='tooltip' data-placement='top' title='' data-original-title='". str_replace("-", " ", $Users['country']) ."'>
                                        <font color='grey' style='float:right;'>&nbsp;<span class=\"badge\">{$Ranks['rank_name']}</font>$CoOwnerRank</span><br>                                                                       
                            
                                        &nbsp;&nbsp;<img src=\"{cdnurl}/images/motto.gif\">&nbsp". substr_replace($Users['motto'],"",20) ."<br>
                                        &nbsp;&nbsp;<img src=\"{cdnurl}/images/login.gif\"/>&nbsp;$OnlineStatus      <br />
                                        &nbsp;&nbsp;<img src=\"{cdnurl}/images/icons/banned.gif\" style=\"margin-top: -3px;\">&nbsp;<strong>Bans: </strong>$BanCount
                                        <br />
                                        &nbsp;&nbsp;<img src=\"{cdnurl}/images/icons/cfh.gif\" style=\"margin-top: -3px;\">&nbsp;<strong>CFH's Responded: </strong>$TicketsCount     
                                            <img src=\"/game/c_images/album1584/{$Ranks['badge']}.gif\" style=\"position: relative;float: left;margin-top: -110px;margin-left: -100px;\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"{$Ranks['badge']}\">     
                                            $CoOwnerBadge																 
                                        ";
                                        echo"</div></div></div>";
                                        }
                                }
?>                   


</div>
</div>


<?php include_once('/includes/footer.php'); ?>
</body>
</html>