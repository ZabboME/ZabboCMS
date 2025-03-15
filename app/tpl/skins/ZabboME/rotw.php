<style>
.label-primary1 {
    background-color: #ffffff4f;
}
 </style>
<?php
	if(!isset($_SESSION['user']['username'])){
		header('Location: index');
		exit();
	}
	$rankLimit = "16"; 
	$limit_rooms = "3";
	$txt_succes = '<div class="alert alert-success" style="text-align: center;">You\'ve succesfully entered this weeks ROTW competition!</div>'; 
	$txt_h4x = '<div class="alert alert-danger" style="text-align: center;">Lick my balls for trying to exploit our system!</div>';
	$txt_already_entered = '<div class="alert alert-danger" style="text-align: center;">You already entered a ROTW for this week!</div>';
	$txt_not_your_room = '<div class="alert alert-danger" style="text-align: center;">This is not your ROTW room!</div>';
	$txt_delete_em_all = '<div class="alert alert-success" style="text-align: center;">Deleted all ROTW entries!</div>';
?>
<title>{shortname} ~ ROTW Entry</title>

<?php 
	$navigatorID = 1;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		
<div class="row">
<div class="col-md-7">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>Please Select Your Room Of The Week Submission!</center></font></font></h1>
<div style='height:280px;overflow-y:scroll;margin-left:15px;margin-right:6px;margin-top:5px;'>
<?php
$check = mysql_query("SELECT NULL FROM rotw_entries WHERE username = '".$_SESSION['user']['username']."'");
if(mysql_num_rows($check) < $limit_rooms){
	if(isset($_POST['id'])){
		if(is_numeric($_POST['id'])){
			$sql = mysql_query("SELECT name, description, state FROM rooms WHERE owner_id = '".$_SESSION['user']['id']."' AND id = '".$_POST['id']."' LIMIT 1");
			if(mysql_num_rows($sql)){
				$row = mysql_fetch_array($sql);
				mysql_query("INSERT INTO rotw_entries VALUES ('".$_POST['id']."', '".$_SESSION['user']['username']."', '".$row['name']."', '".$row['description']."', '".$row['state']."')");
				echo $txt_succes;
			}else{
				echo $txt_not_your_room;
			}
		}else{
			echo $txt_h4x;
		}
	}else{
		?>
		<form method="post">
			<table style="font-size:11px;" width="100%">
				<tr>
					<td width="10%"></td>
					<td width="40%"><b>Name</b></td>
					<td width="5%"></td>
					<td width="40"><i>Description</i></td>
					<td width="5%"></td>
				</tr>
						
				<?php
				$rooms = mysql_query("SELECT id, name, state, description FROM rooms WHERE owner_id = '".$_SESSION['user']['id']."'");
				while($room = mysql_fetch_array($rooms)){
					echo "
						<tr>
							<td><img src=\"{cdnurl}/images/rooms/room_icon_".$room['state'].".gif\" alt=\"".$room['state']."\" valign=\"middle\" /></td>
							<td><b><span class=\"badge\">".$room['name']."</span></b>
							<td> - </td> 
							<td><i>".$room['description']."</i></td>
							<td><input type=\"radio\" name=\"id\" value=\"".$room['id']."\" /></td>
						</tr>
					";
				}
				?>
			</table>
			

			<div class="article-body">
			
			</div>
		<?php
	}
}else{
	echo $txt_already_entered;
}
?>
</div>
		<br /> 
			<input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="submit" value="Submit Room!" />
		</form>
</div>
</div>

<?php
if($_SESSION['user']['rank'] >= $rankLimit){
?>		
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>Pick Room Of The Week Winners!</center></font></font></h1>
<div style="padding:5px">
<form method="post">
<?php
	if(isset($_POST['winners'])){
		$winners = explode(',', $_POST['winners']);
		$i = 1;
		foreach($winners as $win){
			if($i <= 3){
				$win = mysql_real_escape_string($win);
				$info = mysql_fetch_array(mysql_query("SELECT * FROM rotw_entries WHERE room_id = '".$win."'"));
				mysql_query("UPDATE rotw_winners SET username = '".$info['username']."', name='".$info['room_name']."', description='".$info['room_description']."' WHERE place = '".$i."'");
			}
			$i++;
		}
	}
?>
<table style="font-size:11px;" width="100%">
	<tr>
		<td width="10%"></td>
		<td width="15%"><u>User</u></td>
		<td width="30%"><b>Name</b></td>
		<td width="5%"></td>
		<td width="35"><i>Description</i></td>
		<td width="5%">ID</td>
	</tr>
	<?php
		$rooms = mysql_query("SELECT * FROM rotw_entries");
		while($room = mysql_fetch_array($rooms)){
			echo "
					<tr>
						<td><img src=\"{cdnurl}/images/rooms/room_icon_".$room['state'].".gif\" alt=\"".$room['state']."\" valign=\"middle\" /></td>
						<td><u>".$room['username']."</u></td>
						<td><b><span class=\"badge\">".$room['room_name']."</span></b></td>
						<td> - </td> 
						<td><i>".$room['room_description']."</i></td>
						<td>".$room['room_id']."</td>
					</tr>
				";
		}
	?>
</table>
Winners: <input class="form-control is-valid" style="border-radius: 6px;" type="text" value="1,2,3" name="winners" />
<input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="submit" value="Submit Winners!" />
</form>
</div>
</div>
</div>
<?php
}
?>
</div>

<div class="col-md-5">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>What's Room Of The Week?</center></font></font></h1>
<div style="padding:5px">
<p>
ROTW stands for <b>Room Of The Week</b>. Every week you can submit your room as entry for ROTW.<br />
- The top 3 rooms will be rewarded with rare furniture!<br />
- Don't forget to enter. It is fairly simple! <br />
- You can submit <?php echo $limit_rooms; ?> room<?php if($limit_rooms > 1){ echo "s"; } ?> every week. <br />
</p>
</div>
</div>
</div>
			

<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>Last Week ROTW Winners!</center></font></font></h1>
<div style="padding:5px">
<p>
<b>These are last week winners:</b><br /><br />
<?php
	$query = mysql_query('SELECT * FROM rotw_winners ORDER BY place ASC LIMIT 3');
	while($row = mysql_fetch_array($query)){
		echo '<img src="{cdnurl}/images/rooms/'.$row['place'].'.gif" valign="middle" />'.$row['username'].' : <b>'.$row['name'].'</b> - <i>'.$row['description'].'</i><br />';
	}
?>

</p>
</center>
</div>
</div>
</div>
<?php
if($_SESSION['user']['rank'] >= $rankLimit){
?>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><center>Truncate Last Week ROTW Entries!</center></font></font></h1>
<div style="padding:5px">
<p>
<?php
	if(isset($_POST['delete_em_all'])){
		mysql_query("TRUNCATE rotw_entries");
		echo $txt_delete_em_all;
	}
?>
<form method="post"><input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="delete_em_all" value="Delete Last Week ROTW Entries!" /></form>

</p>
</div>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>

<?php include_once('/includes/footer.php'); ?>
</body>
</html>
