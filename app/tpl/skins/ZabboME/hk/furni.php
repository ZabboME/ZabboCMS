					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'SMOD'"));
if ($perms['rank'] > $getUseRank4Page['rank']) {
header("Location: noaccess");
die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZabboASE &bull; Item Editor</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
		    <?php
// Include Header
include "includes/header.php";
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li>Dashboard</li> <li>General</li> <li class="active">Item Editor</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Item Editor</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Item Editor
						</div>
<div class="module">
<div class="con">
<div class="col-xs-3">

	                        <form method='post' style="padding: 10px;">
	                            <input type="text" name="item_searched_id" class="form-control" placeholder="Item ID" style="margin-bottom: 10px;">
	                            <input type="submit" class="btn btn-primary btn-sm" value="Edit item" name="lookup" />
	                        </form>
	                    </div>
	                </div>
					</div>
	                

 <?php
 
						$two = mysql_fetch_assoc(mysql_query("SELECT items.id,items_base.public_name,items_base.width,items_base.length,items_base.stack_height,items_base.allow_gift,items_base.multiheight,items_base.allow_lay,items_base.allow_stack,items_base.allow_sit,items_base.allow_walk,items_base.interaction_modes_count,items_base.interaction_type,vending_ids FROM items_base,items WHERE items_base.id = items.item_id AND items.id = '". mysql_escape_string($_POST['item_searched_id']) ."'"));
						/*			require_once('/includes/MUS.php');
						$Hamada = new MUS;*/
						
	                    if(isset($_POST['update'])) 
						{
	                        mysql_query("UPDATE items_base,items SET
							items_base.public_name = '" . mysql_escape_string($_POST['public_name']) . "',
							items_base.width = '" . mysql_escape_string($_POST['width']) . "',
							items_base.length = '" . mysql_escape_string($_POST['length']) . "',
							items_base.stack_height = '" . mysql_escape_string($_POST['stack_height']) . "',
							items_base.multiheight = '" . mysql_escape_string($_POST['multiheight']) . "',
							items_base.customparams = '" . mysql_escape_string($_POST['customparams']) . "',

							items_base.allow_stack = '" . mysql_escape_string($_POST['allow_stack']) . "',
							items_base.allow_sit = '" . mysql_escape_string($_POST['allow_sit']) . "',
							items_base.allow_walk = '" . mysql_escape_string($_POST['allow_walk']) . "',
							items_base.allow_lay = '" . mysql_escape_string($_POST['allow_lay']) . "',
							items_base.allow_gift = '" . mysql_escape_string($_POST['allow_gift']) . "',
							items_base.interaction_modes_count = '" . mysql_escape_string($_POST['interaction_modes_count']) . "',
							items_base.interaction_type = '" . mysql_escape_string($_POST['interaction_type']) . "',
							items_base.vending_ids = '" . mysql_escape_string($_POST['vending_ids']) . "'
							WHERE items.item_id = items_base.id AND items.id = '".  mysql_real_escape_string($_POST['item_current_id']) ."'") or die(mysql_error());
	                        echo '<div class="col-lg-12"><div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Item ' . mysql_real_escape_string($_POST['item_current_id']) . ' successfully updated!<a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div></div><meta http-equiv="refresh" content="2;url=furni"/>';
							/*$Hamada->sendMUS("reload_items");*/
	                    }
	                    if(isset($_POST['lookup'])) {
	                        if(mysql_num_rows(mysql_query("SELECT items.id,items_base.public_name,items_base.width,items_base.length,items_base.stack_height,items_base.multiheight,customparams,allow_lay,allow_gift,items_base.allow_stack,items_base.allow_sit,items_base.allow_walk,items_base.interaction_modes_count,items_base.interaction_type FROM items_base,items WHERE items_base.id = items.item_id AND items.id = '". ($_POST['item_searched_id']) ."'")) == 0) { 
	                            echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Item <b>" . strip_tags($_POST['item_searched_id']) . "</b> not found!</div>"; 
	                        } else {
	                ?>
					<div class="col col-1">
						<div class="module">
							<div class="module-head">
								<h3>Edit Furni</h3>
									</div>
	                        <div class="con">
	                            <form method='post' style="padding: 10px;">
	                                <input type="hidden" name="item_current_id" value="<?php echo htmlspecialchars($_POST['item_searched_id']); ?>" />
	                                <table width="100%" style="margin-bottom: 10px;">
									<div class="col-xs-3">
									<?php
									echo'
										<tr>
                                            <td><b>Item ID</td>
                                            <td><input type="text" class="form-control" name="item_searched_id" value="' . strip_tags($two['id']) . '" readonly/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Item Name</td>
                                            <td><input type="text" class="form-control" name="public_name" value="' . strip_tags($two['public_name']) . '" /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Width</td>
                                            <td><input type="text" class="form-control" name="width" value="' . strip_tags($two['width']) . '" /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Length</td>
                                            <td><input type="text" class="form-control" name="length" value="' . strip_tags($two['length']) . '" /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Stack Height</td>
                                            <td><input type="text" class="form-control" name="stack_height" value="' . strip_tags($two['stack_height']) . '" /></td>
                                        </tr>
										 <tr>
                                            <td><b>Multi Height  (Ex. 1.0;0.75;0.50;0.25;0.0;0.1)</td>
                                            <td><input type="text" placeholder="(Ex. 1.0;0.75;0.50;0.25;0.0;0.1)" class="form-control" name="multiheight" value="' . strip_tags($two['multiheight']) . '" /></td>
                                        </tr>
										
										<tr>
                                            <td><b>Custom Params</td>
                                            <td><input type="text" class="form-control" name="customparams" value="' . strip_tags($two['customparams']) . '" /></td>
                                        </tr>
									
										<tr>
                                            <td><b>Stackable</td>
                                            <td><select class="form-control input-sm" name="allow_stack">
											<option '.(($two['allow_stack'] == 0) ? 'selected="selected"' : '').' value="0">No</option>
											<option '.(($two['allow_stack'] == 1) ? 'selected="selected"' : '').' value="1">Yes</option>												
											</select></td>
                                        </tr>
										<tr>
                                            <td><b>Sitable</td>
                                            <td><select class="form-control input-sm" name="allow_sit">
											<option '.(($two['allow_sit'] == 0) ? 'selected="selected"' : '').' value="0">No</option>
											<option '.(($two['allow_sit'] == 1) ? 'selected="selected"' : '').' value="1">Yes</option>												
											</select></td>
                                        </tr>
                                        <tr>
                                            <td><b>Walkable</td>
                                            <td><select class="form-control input-sm" name="allow_walk">
											<option '.(($two['allow_walk'] == 0) ? 'selected="selected"' : '').' value="0">No</option>
											<option '.(($two['allow_walk'] == 1) ? 'selected="selected"' : '').' value="1">Yes</option>												
											</select></td>
                                        </tr>
										<tr>
                                            <td><b>Lay</td>
                                            <td><select class="form-control input-sm" name="allow_lay">
											<option '.(($two['allow_lay'] == 0) ? 'selected="selected"' : '').' value="0">No</option>
											<option '.(($two['allow_lay'] == 1) ? 'selected="selected"' : '').' value="1">Yes</option>												
											</select></td>
                                        </tr>
										
										  <tr>
                                            <td><b>Allow Gift</td>
                                            <td><select class="form-control input-sm" name="allow_gift">
											<option '.(($two['allow_gift'] == 0) ? 'selected="selected"' : '').' value="0">No</option>
											<option '.(($two['allow_gift'] == 1) ? 'selected="selected"' : '').' value="1">Yes</option>												
											</select></td>
                                        </tr>
										<tr>
										
                                            <td><b>Interaction Count</td>
                                            <td><input type="text" class="form-control" name="interaction_modes_count" value="' . strip_tags($two['interaction_modes_count']) . '" /></td>
                                        </tr>
										<tr>
                                            <td><b>Interaction Type</td>
                                            <td><select class="form-control input-sm" name="interaction_type">
											<option '.(($two['interaction_type'] == "default") ? 'selected="selected"' : '').' value="default">default</option>
											<option '.(($two['interaction_type'] == "dice") ? 'selected="selected"' : '').' value="dice">dice</option>
											<option '.(($two['interaction_type'] == "gate") ? 'selected="selected"' : '').' value="gate">gate</option>	
											<option '.(($two['interaction_type'] == "gift") ? 'selected="selected"' : '').' value="gift">gift</option>	
											<option '.(($two['interaction_type'] == "pet_drink") ? 'selected="selected"' : '').' value="pet_drink">pet_drink</option>	
											<option '.(($two['interaction_type'] == "roller") ? 'selected="selected"' : '').' value="roller">roller</option>	
											<option '.(($two['interaction_type'] == "trax_machine") ? 'selected="selected"' : '').' value="trax_machine">trax_machine</option>	
											<option '.(($two['interaction_type'] == "water_item") ? 'selected="selected"' : '').' value="water_item">water_item</option>	
											<option '.(($two['interaction_type'] == "monsterplant_seed") ? 'selected="selected"' : '').' value="monsterplant_seed">monsterplant_seed</option>	
											<option '.(($two['interaction_type'] == "multiheight") ? 'selected="selected"' : '').' value="multiheight">multiheight</option>	
											<option '.(($two['interaction_type'] == "tent") ? 'selected="selected"' : '').' value="tent">tent</option>	
											<option '.(($two['interaction_type'] == "pressureplate") ? 'selected="selected"' : '').' value="pressureplate">pressureplate</option>	
											<option '.(($two['interaction_type'] == "rentable_space") ? 'selected="selected"' : '').' value="rentable_space">rentable_space</option>	
											<option '.(($two['interaction_type'] == "love_lock") ? 'selected="selected"' : '').' value="love_lock">love_lock</option>	
											<option '.(($two['interaction_type'] == "stack_helper") ? 'selected="selected"' : '').' value="stack_helper">stack_helper</option>	
											<option '.(($two['interaction_type'] == "youtube") ? 'selected="selected"' : '').' value="youtube">youtube</option>	
											<option '.(($two['interaction_type'] == "guild_furni") ? 'selected="selected"' : '').' value="guild_furni">guild_furni</option>	
											<option '.(($two['interaction_type'] == "clothing") ? 'selected="selected"' : '').' value="clothing">clothing</option>	
											<option '.(($two['interaction_type'] == "hitech") ? 'selected="selected"' : '').' value="hitech">hitech</option>
											<option '.(($two['interaction_type'] == "trampoline") ? 'selected="selected"' : '').' value="trampoline">trampoline</option>
											<option '.(($two['interaction_type'] == "jogmachine") ? 'selected="selected"' : '').' value="jogmachine">jogmachine</option>
											<option '.(($two['interaction_type'] == "guild_chat") ? 'selected="selected"' : '').' value="guild_chat">guild_chat</option>
											<option '.(($two['interaction_type'] == "game_timer") ? 'selected="selected"' : '').' value="game_timer">game_timer</option>
											<option '.(($two['interaction_type'] == "battlebanzai_tile") ? 'selected="selected"' : '').' value="battlebanzai_tile">battlebanzai_tile</option>

											
											<option '.(($two['interaction_type'] == "battlebanzai_gate_blue") ? 'selected="selected"' : '').' value="battlebanzai_gate_blue">battlebanzai_gate_blue</option>
											<option '.(($two['interaction_type'] == "battlebanzai_gate_green") ? 'selected="selected"' : '').' value="battlebanzai_gate_green">battlebanzai_gate_green</option>
											<option '.(($two['interaction_type'] == "battlebanzai_gate_pink") ? 'selected="selected"' : '').' value="battlebanzai_gate_pink">battlebanzai_gate_pink</option>
											<option '.(($two['interaction_type'] == "battlebanzai_gate_yellow") ? 'selected="selected"' : '').' value="battlebanzai_gate_yellow">battlebanzai_gate_yellow</option>

											<option '.(($two['interaction_type'] == "postit") ? 'selected="selected"' : '').' value="postit">postit</option>
											<option '.(($two['interaction_type'] == "dimmer") ? 'selected="selected"' : '').' value="dimmer">dimmer</option>
											<option '.(($two['interaction_type'] == "trophy") ? 'selected="selected"' : '').' value="trophy">trophy</option>
											<option '.(($two['interaction_type'] == "bed") ? 'selected="selected"' : '').' value="bed">bed</option>
											<option '.(($two['interaction_type'] == "scoreboard") ? 'selected="selected"' : '').' value="scoreboard">scoreboard</option>											
											<option '.(($two['interaction_type'] == "christmasbazar") ? 'selected="selected"' : '').' value="christmasbazar">christmasbazar</option>
											<option '.(($two['interaction_type'] == "christmasfountain") ? 'selected="selected"' : '').' value="christmasfountain">christmasfountain</option>
											<option '.(($two['interaction_type'] == "vendingmachine") ? 'selected="selected"' : '').' value="vendingmachine">vendingmachine</option>
											<option '.(($two['interaction_type'] == "vendingmachine_no_sides") ? 'selected="selected"' : '').' value="vendingmachine_no_sides">vendingmachine_no_sides</option>
											<option '.(($two['interaction_type'] == "onewaygate") ? 'selected="selected"' : '').' value="onewaygate">onewaygate</option>
											<option '.(($two['interaction_type'] == "loveshuffler") ? 'selected="selected"' : '').' value="loveshuffler">loveshuffler</option>
											<option '.(($two['interaction_type'] == "teleport") ? 'selected="selected"' : '').' value="teleport">teleport</option>
											<option '.(($two['interaction_type'] == "crackable") ? 'selected="selected"' : '').' value="crackable">crackable</option>
											<option '.(($two['interaction_type'] == "purchasable_clothing") ? 'selected="selected"' : '').' value="purchasable_clothing">purchasable_clothing</option>
											<option '.(($two['interaction_type'] == "intelligence_bookcase") ? 'selected="selected"' : '').' value="intelligence_bookcase">intelligence_bookcase</option>

											</select></td>
                                        </tr>
										
					
										
										<tr>
                                        <td><b>Vending ID (Only works with vendingmachine)</td>
                                        <td><input type="text" placeholder="(Ex. 69)" class="form-control" name="vending_ids" value="' . strip_tags($two['vending_ids']) . '" /></td>
                                        </tr>';
										?>
                                    </table>
                                    <input type="submit" class="btn btn-primary btn-sm" value="Save" name="update"/>
                                </form></div>
                            </div>
						</div>
                    <?php } } ?>
                </div>
				</div>
							
				</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>