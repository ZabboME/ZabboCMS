<?php			

$ValuesTotal = mysql_query("SELECT * FROM cms_values");	
while($ValuesTotalData = mysql_fetch_array($ValuesTotal))

/* Shows Total Amount Of Values Posted Overall */

?>	

<title>{shortname} ~ Values [<?php echo mysql_num_rows($ValuesTotal); ?>]</title>

<?php 
	$navigatorID = 3;
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
		<!--<div class="col-md-3">
<div class="list-group">

<a class="list-group-item active">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Official Values</font></font><b class="pull-right"><b class="label label-primary1" style="font-size: 14.0px;position: absolute;top: 10px;right: 10px;background: #27ae60;"><?php echo mysql_num_rows($ValuesTotal); ?></b></b></a>

<a href="#" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Values Team</font></font><b class="pull-right"><b class="label label-primary1" style="font-size: 14.0px;position: absolute;top: 10px;right: 10px;background: #27ae60;"><?php echo mysql_num_rows($userList); ?></b></b></a>
<a href="#" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Report Value</font><b class="pull-right"><b style="color: red;"><i>Soon...</b></i></b></font></a>
<a href="#" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Report Missing Value</font><b class="pull-right"><b style="color: red;"><i>Soon...</b></i></b></font></a>

<a href="#" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Find LTD Number Holder</font></font></a>

</div>
</div>-->
<style>
.label-primary1 {
    background-color: #ffffff4f;
}
#credits {
    float: left;
    height: 15px;
    line-height: 15px;
    width: calc(100% - 35px);
    background: url({cdnurl}/images/icons/credits.gif) 2px 50% no-repeat;
    padding-left: 20px;
    font-weight: bold;
    margin-top: -3px;
    margin-left: -3px;
}
#duckets {
    float: left;
    height: 16px;
    line-height: 15px;
    width: calc(100% - 35px);
    background: url({cdnurl}/images/icons/duckets.gif) 2px 50% no-repeat;
    padding-left: 20px;
    font-weight: bold;
	margin-top: -2.8px;
    margin-left: -3px;
}
#diamonds {
    float: left;
    height: 16px;
    line-height: 15px;
    width: calc(100% - 35px);
    background: url({cdnurl}/images/icons/diamonds.gif) 2px 50% no-repeat;
    padding-left: 20px;
    font-weight: bold;
	margin-top: -3px;
    margin-left: -3px;
}
#points {
    float: left;
    height: 16px;
    line-height: 15px;
    width: calc(100% - 35px);
    background: url({cdnurl}/images/icons/points.gif) 2px 50% no-repeat;
    padding-left: 20px;
    font-weight: bold;
	margin-top: -3px;
    margin-left: -3px;
}
#ltdtitle {
    position: relative;
    font-size: 10.5px;
    padding: 3px;
    background: #1414149e;
    border-radius: 4px;
    width: 100%;
    max-width: 100%;
}
.card {
    background: #f8f9fa;
    background-repeat: no-repeat;
    box-shadow: inset 0 0 0 1000px rgb(216 216 220 / 29%);
    border-radius: 4px;
    border: #00000026 solid 0px;
    margin-bottom: 20px;
    padding: 10px;
}
 </style>
<div class="col-md-9">
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Our Values Team Has Listed A Total Of <b class="label label-primary1" style="font-size: 11.5px;"><?php echo mysql_num_rows($ValuesTotal); ?></b> On {shortname} So Far!</font></font></h1>
<div style='height: 785px;overflow-y:scroll;margin-left:5px;margin-right:5px;margin-top:5px;'>
	<div class="body">

		<table>

			<tbody style="display: flex;flex-wrap: wrap;flex-direction: row;padding: 20px;padding-top: 10px;">

<!-- Limited Rare Values Item Code Start -->
<div class="alert alert-danger" style="margin: 20px;margin-top: 1px;background: radial-gradient(#304ac7, #b2c9fc);"><center><b>Limited Rares No Change In Values</b></center></div>
				<?php
					$result = mysql_query("SELECT * FROM cms_values WHERE item_category = 'Limited Rare' AND item_up = '0' AND item_drop = '0' ORDER BY id DESC");

					if (mysql_num_rows($result) == 0)
					echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>There has not been any Increased Limited Rare values posted on {shortname} yet!</b></center></div>';
					else
						
						{
					while ($row = mysql_fetch_array($result)) {
					echo '
		<tr style="position: relative;height: 225px;max-height: 225px;padding-right: 5px;">
				<td>
				<div>									
					<span class="badge" style="background-color: #0854ffc7!important;width: 185px;max-width: 185px;border: 2px solid rgb(0 0 0 / 20%);border-radius: 5px;height: 165px;border-bottom-left-radius: 1px;border-bottom-right-radius: 1px;background: url({cdnurl}/images/itembg.png);">
					<span class="label label-warning1" style="position: relative;top: 3px;border-radius: 5px;background: radial-gradient(#c7ba25, #d10606ba);">' . $row['item_category'] . '</span>

					<br><br>
					
					<div id="ltdtitle">' . $row['item_name'] . '</div>
					<span class="label label-warning1" style="position: relative;top: 6px;background: #2d8ec7;">No Changes</span>

					<br><br>
					
					
					 <br><br><br> <br><br>


					 
					 <custom style="float: right;margin-right: -28px;margin-top: 4px;"><img class="shine" src="{cdnurl}/images/inventory-info-amount-bg.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_total'] . ' ' . $row['item_name'] . '\'s In Total" style="position: relative;margin-top: -60px;margin-left: 3px;float: left;width: 25px;">
						 <kk style="position: relative;float: left;margin-top: -45px;width: 32px;color: #121212;z-index: 99;font-size: 11px;font-family: sans-serif;">
						  ' . $row['item_total'] . '
						 </kk>
					 </custom>
																<br><br>
					<custom style="position: relative;top: -44px;">																
						 <span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
							  
							<div id="credits">' . number($row['item_credits']) . '</div>
							 
							 </span>
							 <span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
							  
								 <div id="duckets">' . number($row['item_duckets']) . '</div>
				
							 
							 </span>
							<br>
							
							<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
							 
								 <div id="diamonds">' . number($row['item_diamonds']) . '</div>
							 
							 </span>
							
							
							<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
							
								 <div id="points">' . number($row['item_points']) . '</div>
							 
							 </span>
							 
						<div style="position: relative;background-color: #50505047;height: 55px;width: 185px;border-radius: 5px;border-top-left-radius: 1px;border-top-right-radius: 1px;margin-left: -9px;margin-top: 9px;padding: 5px;border: 2px solid rgb(0 0 0 / 15%);">
						 <a href="/home/' . $row['added_by'] . '"><span class="badge" style="float: left;height: 45px;width: 45px;"><img class="shine" src="{imager}' . $row['user_look'] . '&headonly=1" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['added_by'] . '" style="position: relative;height: 105px;width: 64px;margin-left: -17px;margin-top: -20px;"></span></a>
						 <br>
						<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -40px;margin-left: 48px;border-radius: 5px;vertical-align: inherit;">Last Editor: ' . relativeTimeValues($row['added_date']) . '</span>
										<br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -20px;margin-left: 48px;border-radius: 5px;">Last Edited: ' . $row['added_by'] . '</span>
										</div>
					</custom>
					</div>
										
					<div class="badge" style="position: relative;top: -95px;left: 74px;width: fit-content;height: fit-content;max-width: 40px;max-height: 37px;"><img class="shine" src="' . $row['item_icon'] . '" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_name'] . '" style="float: left;margin-left: -1px;">
					 </div>				
				</td>																						
			</tr>
						';
					}
				}
				?>
				</tbody>
		</table>
				<!-- Limited Rare Values Code End -->


			<!-- Limited Rare Values Increased Item Code Start -->
		<table>

			<tbody style="display: flex;flex-wrap: wrap;flex-direction: row;padding: 20px;padding-top: 10px;">
			
			<div class="alert alert-danger" style="margin: 20px;margin-top: 1px;background: radial-gradient(#1b681d, #b5ddbe);"><center><b>Limited Rares Increased In Values</b></center></div>

				<?php
					$result = mysql_query("SELECT * FROM cms_values WHERE item_category = 'Limited Rare' AND item_up = '1' ORDER BY id DESC");

					if (mysql_num_rows($result) == 0)
					echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>There has not been any Increased Limited Rare values posted on {shortname} yet!</b></center></div>';
					else
						
						{
					while ($row = mysql_fetch_array($result)) {
					echo '
							<tr style="position: relative;height: 225px;padding-right: 5px;">
										<td>
										
										<span class="badge" style="background-color: #079526b8!important;width: 185px;max-width: 185px;border: 2px solid rgb(0 0 0 / 20%);border-radius: 5px;height: 165px;border-bottom-left-radius: 1px;border-bottom-right-radius: 1px;background: url({cdnurl}/images/itembg.png);">
										<span class="label label-warning1" style="position: relative;top: 3px;border-radius: 5px;background: radial-gradient(#c7ba25, #d10606ba);">' . $row['item_category'] . '</span>

										<br><br>
										
										<div id="ltdtitle">' . $row['item_name'] . '</div>
										<span class="label label-warning1" style="position: relative;top: 6px;">Price Increased</span>

										<br><br>
										
										<div class="badge" style="min-height: 36px;"><img class="shine" src="' . $row['item_icon'] . '" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_name'] . '" style="position: relative;float: left;margin-top: 5px;margin-left: 0px;width: fit-content;"><br>
										 </div>
										 <br><br><br>


										 
										 <custom style="float: right;margin-right: -28px;margin-top: 4px;"><img class="shine" src="{cdnurl}/images/inventory-info-amount-bg.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_total'] . ' ' . $row['item_name'] . '\'s In Total" style="position: relative;margin-top: -60px;margin-left: 3px;float: left;width: 25px;;">
										 <kk style="position: relative;float: left;margin-top: -45px;width: 32px;color: #121212;z-index: 99;font-size: 11px;font-family: sans-serif;">
										  ' . $row['item_total'] . '
										 </kk></custom>
																					<br><br>
										<custom style="position: relative;top: -44px;">																
										 <span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											  
											<div id="credits">' . number($row['item_credits']) . '</div>
											 
											 </span>
											 <span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											  
												 <div id="duckets">' . number($row['item_duckets']) . '</div>
								
											 
											 </span>
											<br>
											
											<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											 
												 <div id="diamonds">' . number($row['item_diamonds']) . '</div>
											 
											 </span>
											
											
											<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											
												 <div id="points">' . number($row['item_points']) . '</div>
											 
											 </span>
											 
										<div style="position: relative;background-color: #50505047;height: 55px;width: 185px;border-radius: 5px;border-top-left-radius: 1px;border-top-right-radius: 1px;margin-left: -9px;margin-top: 9px;padding: 5px;border: 2px solid rgb(0 0 0 / 15%);">
										 <a href="/home/' . $row['added_by'] . '"><span class="badge" style="float: left;height: 45px;width: 45px;"><img class="shine" src="{imager}' . $row['user_look'] . '&headonly=1" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['added_by'] . '" style="position: relative;height: 105px;width: 64px;margin-left: -17px;margin-top: -20px;"></span></a>
										 <br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -40px;margin-left: 48px;border-radius: 5px;vertical-align: inherit;">Last Editor: ' . relativeTimeValues($row['added_date']) . '</span>
										<br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -20px;margin-left: 48px;border-radius: 5px;">Last Edited: ' . $row['added_by'] . '</span>
										</div>
										</custom>
										</td>																				
							
									</tr>
						';
					}
				}
				?>
				</tbody>
		</table>
				<!-- Limited Rare Increased Values Code End -->
				
				<!-- Limited Rare Decreased Values Code Start  -->
			<table>

			<tbody style="display: flex;flex-wrap: wrap;flex-direction: row;padding: 20px;padding-top: 10px;">
				<div class="alert alert-danger" style="margin: 20px;margin-top: 1px;background: radial-gradient(#a51818, #edb2b2);"><center><b>Limited Rares Decreased In Values</b></center></div>

				<?php
					$result = mysql_query("SELECT * FROM cms_values WHERE item_category = 'Limited Rare' AND item_drop = '1' ORDER BY id DESC");

					if (mysql_num_rows($result) == 0)
					echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>There has not been any Decreased Limited Rare values posted on {shortname} yet!</b></center></div>';
					else
						
						{
					while ($row = mysql_fetch_array($result)) {
					echo '
							<tr style="position: relative;height: 225px;padding-right: 5px;">
										<td>
										
										<span class="badge" style="background-color: #cd0a0ac7!important;width: 185px;max-width: 185px;border: 2px solid rgb(0 0 0 / 20%);border-radius: 5px;height: 165px;border-bottom-left-radius: 1px;border-bottom-right-radius: 1px;background: url({cdnurl}/images/itembg.png);">
										<span class="label label-warning1" style="position: relative;top: 3px;border-radius: 5px;background: radial-gradient(#c7ba25, #d10606ba);">' . $row['item_category'] . '</span>

										<br><br>
										
										<div id="ltdtitle">' . $row['item_name'] . '</div>
										<span class="label label-warning1" style="position: relative;top: 6px;background: #c50909;">Price Decreased</span>

										<br><br>
										
										<div class="badge" style="min-height: 36px;"><img class="shine" src="' . $row['item_icon'] . '" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_name'] . '" style="position: relative;float: left;margin-top: 5px;margin-left: 0px;width: fit-content;"><br>
										 </div>
										 <br><br><br>
										 
										 <custom style="float: right;margin-right: -28px;margin-top: 4px;"><img class="shine" src="{cdnurl}/images/inventory-info-amount-bg.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_total'] . ' ' . $row['item_name'] . '\'s In Total" style="position: relative;margin-top: -60px;margin-left: 3px;float: left;width: 25px;;">
											 <kk style="position: relative;float: left;margin-top: -45px;width: 32px;color: #121212;z-index: 99;font-size: 11px;font-family: sans-serif;">
											  ' . $row['item_total'] . '
											 </kk>
										 </custom>
										 
										<br><br>
										<custom style="position: relative;top: -44px;">																
										<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											  
											<div id="credits">' . number($row['item_credits']) . '</div>
											 
										</span>
										
										<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											  
												 <div id="duckets">' . number($row['item_duckets']) . '</div>
								
										</span>
											
										<br>
											
										<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
										 
											 <div id="diamonds">' . number($row['item_diamonds']) . '</div>
										 
										</span>
											
											
										<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
										
											 <div id="points">' . number($row['item_points']) . '</div>
										 
										</span>
											 
										<div style="position: relative;background-color: #50505047;height: 55px;width: 185px;border-radius: 5px;border-top-left-radius: 1px;border-top-right-radius: 1px;margin-left: -9px;margin-top: 9px;padding: 5px;border: 2px solid rgb(0 0 0 / 15%);">
										 <a href="/home/' . $row['added_by'] . '"><span class="badge" style="float: left;height: 45px;width: 45px;"><img class="shine" src="{imager}' . $row['user_look'] . '&headonly=1" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['added_by'] . '" style="position: relative;height: 105px;width: 64px;margin-left: -17px;margin-top: -20px;"></span></a>
										 <br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -40px;margin-left: 48px;border-radius: 5px;vertical-align: inherit;">Last Editor: ' . relativeTimeValues($row['added_date']) . '</span>
										<br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -20px;margin-left: 48px;border-radius: 5px;">Last Edited: ' . $row['added_by'] . '</span>
										</div>
										</custom>
										</td>																				
							
									</tr>
						';
					}
				}
				?>
				</tbody>
		</table>
				<!-- Limited Rare Decreased Values Code End -->
			
		
	</div>
	
</div>
</div>
</div>


<div class="col-md-9" style="float: right;width: 292px;">
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Recently Added</font></font></h1>
<div style="height: 350px;overflow-y:scroll;margin-left: -4px;margin-top:5px;width: 245px;">

<div class="body">
<table class="table">

			<tbody>
<?php
					$result = mysql_query("SELECT * FROM cms_values WHERE added_date AND item_edited = '0' ORDER by added_date DESC LIMIT 5");

					if (mysql_num_rows($result) == 0)
					echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>There has not been any values posted on {shortname} yet!</b></center></div>';
					else
						
						{
					while ($row = mysql_fetch_array($result)) {
					echo '
							<tr style="position: relative;height: 225px;max-height: 225px;padding-right: 5px;">
				<td>
				<div>									
					<span class="badge" style="background-color: #0854ffc7!important;width: 185px;max-width: 185px;border: 2px solid rgb(0 0 0 / 20%);border-radius: 5px;height: 165px;border-bottom-left-radius: 1px;border-bottom-right-radius: 1px;background: url({cdnurl}/images/itembg.png);">
					<span class="label label-warning1" style="position: relative;top: 3px;border-radius: 5px;background: radial-gradient(#c7ba25, #d10606ba);">' . $row['item_category'] . '</span>

					<br><br>
					
					<div id="ltdtitle">' . $row['item_name'] . '</div>
					<span class="label label-warning1" style="position: relative;top: 6px;background: #2d8ec7;">No Changes</span>

					<br><br>
					
					
					 <br><br><br> <br><br>


					 
					 <custom style="float: right;margin-right: -28px;margin-top: 4px;"><img class="shine" src="{cdnurl}/images/inventory-info-amount-bg.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_total'] . ' ' . $row['item_name'] . '\'s In Total" style="position: relative;margin-top: -60px;margin-left: 3px;float: left;width: 25px;">
						 <kk style="position: relative;float: left;margin-top: -45px;width: 32px;color: #121212;z-index: 99;font-size: 11px;font-family: sans-serif;">
						  ' . $row['item_total'] . '
						 </kk>
					 </custom>
																<br><br>
					<custom style="position: relative;top: -44px;">																
						 <span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
							  
							<div id="credits">' . number($row['item_credits']) . '</div>
							 
							 </span>
							 <span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
							  
								 <div id="duckets">' . number($row['item_duckets']) . '</div>
				
							 
							 </span>
							<br>
							
							<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
							 
								 <div id="diamonds">' . number($row['item_diamonds']) . '</div>
							 
							 </span>
							
							
							<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
							
								 <div id="points">' . number($row['item_points']) . '</div>
							 
							 </span>
							 
						<div style="position: relative;background-color: #50505047;height: 55px;width: 185px;border-radius: 5px;border-top-left-radius: 1px;border-top-right-radius: 1px;margin-left: -9px;margin-top: 9px;padding: 5px;border: 2px solid rgb(0 0 0 / 15%);">
						 <a href="/home/' . $row['added_by'] . '"><span class="badge" style="float: left;height: 45px;width: 45px;"><img class="shine" src="{imager}' . $row['user_look'] . '&headonly=1" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['added_by'] . '" style="position: relative;height: 105px;width: 64px;margin-left: -17px;margin-top: -20px;"></span></a>
						 <br>
						<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -40px;margin-left: 48px;border-radius: 5px;vertical-align: inherit;">Last Editor: ' . relativeTimeValues($row['added_date']) . '</span>
										<br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -20px;margin-left: 48px;border-radius: 5px;">Last Edited: ' . $row['added_by'] . '</span>
										</div>
					</custom>
					</div>
										
					<div class="badge" style="position: relative;top: -95px;left: 74px;width: fit-content;height: fit-content;max-width: 40px;max-height: 37px;"><img class="shine" src="' . $row['item_icon'] . '" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_name'] . '" style="float: left;margin-left: -1px;">
					 </div>				
				</td>																						
			</tr>
						';
					}
				}
				?>
				</tbody>
		</table>
</div>
</div>
</div>

<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Recently Changed</font></font></h1>
<div style="height: 350px;overflow-y:scroll;margin-left: -4px;margin-top:5px;width: 245px;">

<div class="body">
<table class="table">

			<tbody>

				<?php
					$result = mysql_query("SELECT * FROM cms_values WHERE item_edited = '1' ORDER BY added_date DESC");
					
			
					while ($row = mysql_fetch_array($result)) {
					echo '
							<tr style="position: relative;height: 225px;padding-right: 5px;">
										<td>
										
										<span class="badge" style="background-color: #079526b8!important;width: 185px;max-width: 185px;border: 2px solid rgb(0 0 0 / 20%);border-radius: 5px;height: 165px;border-bottom-left-radius: 1px;border-bottom-right-radius: 1px;background: url({cdnurl}/images/itembg.png);">
										<span class="label label-warning1" style="position: relative;top: 3px;border-radius: 5px;background: radial-gradient(#c7ba25, #d10606ba);">' . $row['item_category'] . '</span>

										<br><br>
										
										<div id="ltdtitle">' . $row['item_name'] . '</div>
										<span class="label label-warning1" style="position: relative;top: 6px;">Price Increased</span>

										<br><br>
										
										<div class="badge" style="min-height: 36px;"><img class="shine" src="' . $row['item_icon'] . '" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_name'] . '" style="position: relative;float: left;margin-top: 5px;margin-left: 0px;width: fit-content;"><br>
										 </div>
										 <br><br><br>


										 
										 <custom style="float: right;margin-right: -28px;margin-top: 4px;"><img class="shine" src="{cdnurl}/images/inventory-info-amount-bg.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_total'] . ' ' . $row['item_name'] . '\'s In Total" style="position: relative;margin-top: -60px;margin-left: 3px;float: left;width: 25px;;">
										 <kk style="position: relative;float: left;margin-top: -45px;width: 32px;color: #121212;z-index: 99;font-size: 11px;font-family: sans-serif;">
										  ' . $row['item_total'] . '
										 </kk></custom>
																					<br><br>
										<custom style="position: relative;top: -44px;">																
										 <span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											  
											<div id="credits">' . number($row['item_credits']) . '</div>
											 
											 </span>
											 <span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											  
												 <div id="duckets">' . number($row['item_duckets']) . '</div>
								
											 
											 </span>
											<br>
											
											<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											 
												 <div id="diamonds">' . number($row['item_diamonds']) . '</div>
											 
											 </span>
											
											
											<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											
												 <div id="points">' . number($row['item_points']) . '</div>
											 
											 </span>
											 
										<div style="position: relative;background-color: #50505047;height: 55px;width: 185px;border-radius: 5px;border-top-left-radius: 1px;border-top-right-radius: 1px;margin-left: -9px;margin-top: 9px;padding: 5px;border: 2px solid rgb(0 0 0 / 15%);">
										 <a href="/home/' . $row['added_by'] . '"><span class="badge" style="float: left;height: 45px;width: 45px;"><img class="shine" src="{imager}' . $row['user_look'] . '&headonly=1" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['added_by'] . '" style="position: relative;height: 105px;width: 64px;margin-left: -17px;margin-top: -20px;"></span></a>
										 <br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -40px;margin-left: 48px;border-radius: 5px;vertical-align: inherit;">Last Editor: ' . relativeTimeValues($row['added_date']) . '</span>
										<br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -20px;margin-left: 48px;border-radius: 5px;">Last Edited: ' . $row['added_by'] . '</span>
										</div>
										</custom>
										</td>																				
							
									</tr>
						';
					
				}
				
				$result1 = mysql_query("SELECT * FROM cms_values WHERE item_edited = '1' AND item_drop = '1' ORDER BY added_date DESC");
					
					while ($row = mysql_fetch_array($result1)) {
					echo '
							<tr style="position: relative;height: 225px;padding-right: 5px;">
										<td>
										
										<span class="badge" style="background-color: #cd0a0ac7!important;width: 185px;max-width: 185px;border: 2px solid rgb(0 0 0 / 20%);border-radius: 5px;height: 165px;border-bottom-left-radius: 1px;border-bottom-right-radius: 1px;background: url({cdnurl}/images/itembg.png);">
										<span class="label label-warning1" style="position: relative;top: 3px;border-radius: 5px;background: radial-gradient(#c7ba25, #d10606ba);">' . $row['item_category'] . '</span>

										<br><br>
										
										<div id="ltdtitle">' . $row['item_name'] . '</div>
										<span class="label label-warning1" style="position: relative;top: 6px;background: #c50909;">Price Decreased</span>

										<br><br>
										
										<div class="badge" style="min-height: 36px;"><img class="shine" src="' . $row['item_icon'] . '" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_name'] . '" style="position: relative;float: left;margin-top: 5px;margin-left: 0px;width: fit-content;"><br>
										 </div>
										 <br><br><br>
										 
										 <custom style="float: right;margin-right: -28px;margin-top: 4px;"><img class="shine" src="{cdnurl}/images/inventory-info-amount-bg.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['item_total'] . ' ' . $row['item_name'] . '\'s In Total" style="position: relative;margin-top: -60px;margin-left: 3px;float: left;width: 25px;;">
											 <kk style="position: relative;float: left;margin-top: -45px;width: 32px;color: #121212;z-index: 99;font-size: 11px;font-family: sans-serif;">
											  ' . $row['item_total'] . '
											 </kk>
										 </custom>
										 
										<br><br>
										<custom style="position: relative;top: -44px;">																
										<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											  
											<div id="credits">' . number($row['item_credits']) . '</div>
											 
										</span>
										
										<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
											  
												 <div id="duckets">' . number($row['item_duckets']) . '</div>
								
										</span>
											
										<br>
											
										<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
										 
											 <div id="diamonds">' . number($row['item_diamonds']) . '</div>
										 
										</span>
											
											
										<span class="badge" style="padding: 5px 5px;margin-top: 5px;height: 20px;width: fit-content;border-radius: 5px;font-size: 11px;">
										
											 <div id="points">' . number($row['item_points']) . '</div>
										 
										</span>
											 
										<div style="position: relative;background-color: #50505047;height: 55px;width: 185px;border-radius: 5px;border-top-left-radius: 1px;border-top-right-radius: 1px;margin-left: -9px;margin-top: 9px;padding: 5px;border: 2px solid rgb(0 0 0 / 15%);">
										 <a href="/home/' . $row['added_by'] . '"><span class="badge" style="float: left;height: 45px;width: 45px;"><img class="shine" src="{imager}' . $row['user_look'] . '&headonly=1" data-toggle="tooltip" data-placement="top" title="" data-original-title="' . $row['added_by'] . '" style="position: relative;height: 105px;width: 64px;margin-left: -17px;margin-top: -20px;"></span></a>
										 <br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -40px;margin-left: 48px;border-radius: 5px;vertical-align: inherit;">Last Editor: ' . relativeTimeValues($row['added_date']) . '</span>
										<br>
										<span class="badge" style="float: left;font-size: 9px;padding: 4px 3px;margin-top: -20px;margin-left: 48px;border-radius: 5px;">Last Edited: ' . $row['added_by'] . '</span>
										</div>
										</custom>
										</td>																				
							
									</tr>
						';
					
				}
				?>
				</tbody>
		</table>
</div>
</div>
</div>
</div>
</div>


</div>

</div></div></div></div></div></div></div></div>

<?php include_once('/includes/footer.php'); ?>

</body>
</html>