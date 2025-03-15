<?php require_once ('/includes/checktheban.php'); ?>
<?php require_once ('/includes/maintenance_access.php'); ?>

<!DOCTYPE html>
<html class="no-js?<?php echo time() ?>" lang="en">
	<head>
		<title>{shortname} ~ Contact Support!</title>
		<meta charset="UTF-8">
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'>
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Join millions in the planet&apos;s most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{longname}">
		<meta property="og:title" content="{shortname} ~ Contact Support!">
		<meta property="og:description" content="Contact {longname} Support Team!, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta property="og:url" content="{url}/account/newpin">
		<meta property="og:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta property="og:image:height" content="628">
		<meta property="og:image:width" content="1200">
		<meta name="twitter:card" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:title" content="{shortname} ~ Contact Support">
		<meta name="twitter:description" content="Contact {longname} Support Team!, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta name="twitter:image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="twitter:site" content="@{twitter}">
		<meta itemprop="name" content="{shortname} ~ Contact Support">
		<meta itemprop="description" content="Contact {longname} Support Team!, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more...">
		<meta itemprop="image" content="{cdnurl}/images/app_summary_image.png?<?php echo time() ?>">
		<meta name="description" content="Contact {longname} Support Team!, the world's largest virtual retro hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more..." />
		<meta name="keywords" content="{longname}, zabbo.me, Zabbo, zabbo.co, {shortname}, habbo.click, habbo.com, Habbo, Habbo HTML5, boon.pw, boon, habboon.com, habboon, freshhotel.com, freshhotel, fresh hotel, fresh-hotel, fresh-hotel.org, hablush, hablush.com, hablush.co, playrise, playrise.com, habdab, habdab.gq, traker.pro, traker, findretros, thehabbos, findretros.com, thehabbos.org, habbo ranking, habbolist, tophabbos, top habbo retro, habbo retros, html5 retros, habbo html5, habbo ranking list, top retros, top habbo, habbo topstats, habbo hotel, virtual, world, social network, free, community, avatar, chat, online, teen, roleplaying, join, social, groups, forums, safe, play, games, online, friends, teens, rares, rare furni, collecting, create, collect, connect, furni, furniture, pets, room design, sharing, expression, badges, hangout, music, celebrity, celebrity visits, celebrities, mmo, mmorpg, massively multiplayer" />
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/typeface-ubuntu-condensed@0.0.44/index.min.css?<?php echo time() ?>'>
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.32/dist/css/uikit.min.css?<?php echo time() ?>'>
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css?<?php echo time() ?>'>
		<link rel="dns-prefetch" href="//ajax.googleapis.com">
		<link rel="dns-prefetch" href="//google-analytics.com" />
		<link rel="icon" href="{cdnurl}/favicon.ico?<?php echo time() ?>" />
		<link rel='stylesheet' href='{cdnurl}/pin/css/contact.css?<?php echo time() ?>'>
	</head>
	<body>
<div class='uk-container uk-margin-large-top'>
		<div uk-grid>
		<div class='uk-width1-1@s uk-width-1-3@m'>
			<center class='uk-margin'>
			    <a href="{url}"><img class='shine' src='{cdnurl}/images/logo.png?<?php echo time() ?>' /></a>
			</center>

		 

			 <div class='habbo uk-card uk-card-default uk-card-body'>
				 <h3 class='uk-card-title chocolate__title__rainbow '><b>Hey {username}, Submit a report</b></h3>
					<?php
						if(!$_CONFIG['hotel']['reports_enabled'])
							echo '<p class="habbo_alert habbo-extra1" style="width: auto;background: #ff010185;">
						<span uk-icon="icon: warning">  </span> <i style="color:floralwhite;">The report tool is currently disabled.</i>
					</p></span>';
						else { ?>
					  <div class='uk-margin'>
						  <div class='uk-inline'>

							<?php if(isset($_POST["report_submit"])) {
							//<div class="rounded rounded-orange">Please do not submit about your payment(s) not being processed to you. A staff member will deliver them to you when you are online.<br/></div>
							
							if(empty($_POST["report_type"]) || $_POST['report_type'] < 1 || $_POST['report_type'] > 4)
								$error = "<div class='rounded rounded-red' style='font-weight:bold'>You must select a report type</div><hr>";
							else if($_POST["report_staff"] == "N\A" && ($_POST["report_type"] == 1 || $_POST["report_type"] == 4))
								$error = "<div class='rounded rounded-red' style='font-weight:bold'>You must select a staff member.</div><hr>";
							else if(empty($_POST["report_info"]))
								$error = "<div class='rounded rounded-red' style='font-weight:bold'>You must enter information about your report.</div><hr>";
							else if($_POST["report_warn"] != "1" && $_POST["report_warn"] != "0")
								$error = "<div class='rounded rounded-red' style='font-weight:bold'>You must accept that you are at risk of a ban if you abuse this form.</div><hr>";
							else if($_POST["report_warn"] != "1")
								$error = "<div class='rounded rounded-red' style='font-weight:bold'>You must accept that you are at risk of a ban if you abuse this form.</div><hr>";
							else if(mysql_num_rows(mysql_query("SELECT NULL FROM cms_user_reports WHERE submitted_ip = '". $_SERVER['REMOTE_ADDR'] . "' OR user_id = " . $_SESSION['user']['id'])) >= 5)
							{
								$error = "<div class='rounded rounded-red' style='font-weight:bold'>You have submitted the maximum amount of reports.</div><hr>";
							}
							else
							{
								if($_POST["report_type"] == 2 || $_POST["report_type"] == 3)
									$_POST["report_staff"] = "N/A";
								
								$user_id = $_SESSION['user']['id'];
								$report_type = mysql_real_escape_string($_POST['report_type']);
								$report_staff = mysql_real_escape_string($_POST['report_staff']);
								$report_info = mysql_real_escape_string($_POST['report_info']);
								$report_warn = mysql_real_escape_string($_POST['report_warn']);
								$report_anon = mysql_real_escape_string($_POST['report_anon']);
								$report_extra = mysql_real_escape_string($_POST['report_extra']);
								$reporter_username = $_SESSION['user']['username'];
								mysql_query("INSERT INTO `cms_user_reports` (`id`, `user_id`, `report_type`, `report_staff`, `report_info`, `report_extra`, `report_anon`, `submitted_on`, `submitted_ip`, `reporter_username`) VALUES ('', '$user_id', '$report_type', '$report_staff', '$report_info', '$report_extra', '$report_anon', '". time().$submitted_on ."', '". $_SERVER['REMOTE_ADDR'] ."', '$reporter_username')");
								$error = "<div class='rounded rounded-green' style='font-weight:bold'>Report submitted.</div><hr>";
								
								$_POST['report_info'] = "";
								$_POST['report_extra'] = "";		
							}
							echo $error;
						}
						?>
						
						<b class="title"><span style="float: left;">Previous reports:&nbsp;</span></b>
								<br>
						<?php 
							$uId = $_SESSION['user']['id'];
							$getReports = mysql_query("SELECT * FROM cms_user_reports WHERE user_id = $uId ORDER BY id DESC");
							if(mysql_num_rows($getReports) == 0)
								echo 'You have no submitted reports';
							else
							{
								while ($showReports = mysql_fetch_array($getReports)) {
									switch($showReports['report_type'])
									{
										case 1:
											echo '&raquo Report against staff member <b>' . filter($showReports['report_staff']) . '</b><br />';
											break;
											
										case 2:
											echo '&raquo You submitted a report regarding furniture<br />';
											break;
										
										case 3:
											echo '&raquo You submitted a comment/suggestion<br />';
											break;
											
										case 4:
											echo '&raquo You submitted a compliment to <b>' . filter($showReports['report_staff']) . '</b><br />';
									}
								}
							}
						?><br>
						<form action="#" method="POST" class="form">
						<div class="form-group">
									<label for="disabledTextInput"><b>{shortname} Username</b></label>
									<div class="col-sm-10">
										<input disabled="disabled" name="reporter_username" class="uk-select" value="{username}" required="">
											
										</input>
									</div>
								</div>
								<br />
								<div class="form-group">
									<label for="disabledTextInput"><b>Please choose one of the following</b></label>
									<div class="col-sm-10">
										<select name="report_type" class="uk-select" required="">
											<option value="1">Complaint against a member of staff</option>
											<option value="2">Request a furni to be added or fixed</option>
											<option value="3">Comment/Suggestion</option>
											<option value="4">Send a staff member a compliment/thank you</option>
										</select>
									</div>
								</div>
								<br />
								<div class="form-group">
									<label for="disabledTextInput"><b>Please choose a member of staff (If you are reporting/complimenting a staff member)</b></label>
									<div class="col-sm-10">
										<div class="col-sm-10">
										<select name="report_staff" class="uk-select" required="">
											<option value="N\A">N\A</option>
											<option disabled>-------------------------</option>
											<?php
												$query = mysql_query("SELECT username FROM users WHERE rank > 2 AND `hidden` = '0'");
												while ($data = mysql_fetch_array($query))
												{
													echo '<option value="' . $data["username"] .'">'. $data["username"] . '</option>';
												}
											?>
										</select>
									</div>
									</div>
								</div>
								<br />
								<div class="form-group">
									<label for="exampleInputEmail1"><b>Please explain what you are reporting/suggesting or what is wrong with the furni you are asking to be fixed</b></label>
									<div class="col-sm-10">
										<textarea class="uk-select" rows="5" name="report_info" maxlength="255" style="width:350px;height:100px;resize:none" required=""><?php if(isset($_POST['report_info'])) { echo $_POST['report_info']; } ?></textarea>
									</div>
								</div>
								<br />
								<div class="form-group">
									<label for="exampleInputEmail1"><b>Would you like to add anything?</b><br><i>Proof? Pictures of the furni, anything else you think is important?! Leave it here!</i></label>
									<div class="col-sm-10">
										<textarea class="uk-select" rows="3" name="report_extra" maxlength="255" class="ss-q-short" style="width:350px;height:100px;resize:none" required=""><?php if(isset($_POST['report_extra'])) { echo $_POST['report_extra']; } ?></textarea>
									</div>
								</div>
								<br />
								<div class="checkbox">
								<label><input name="report_anon" value="1" type="checkbox">Submit my report anonymously.</label><br />
									<label><input name="report_warn" value="1" type="checkbox" required="">I am aware that if my report is spam, my account could be banned.</label>
								</div>
								<br>
								<button type="submit" name="report_submit" class="uk-button uk-button-default chocolate__button__primary">Submit</button>
							</form>
							</div></div>
						<?php } ?>
		
		
					<p class='habbo habbo-extra' style='width: auto;'>
						<span uk-icon='icon: question'>  </span> Not the page you wanted? Click <a href="{url}/me"><b>here</b></a> to go back!
					</p>
			  </div>
		   </div>
<br><br>
					
					<br>
		  <div class='uk-width-1-2@m uk-visible@m'>
              <div class="uk-margin habbo habbo-opaque uk-card uk-card-default uk-card-body" style='padding-top: 35px; padding-bottom: 35px;margin-top: 115px'>
                <dl class="uk-description-list uk-description-list-divider" style="margin-left: 6px;">
				<dt><span uk-icon='icon: lifesaver'></span> <b>Heads up!</b></dt>
				<dd>We take reports here at {shortname} seriously. If you are caught abusing this system you will be dealt with accordingly. If your previous reports are removed it means we've viewed it and it's been handled!</dd>
				<dt><span uk-icon='icon: lifesaver'></span> <b>What this is not for?</b></dt>
				<dd>Please do not submit scam or ban appeals through this tool, they <b>must</b> be sent through the appropriate sections.</dd>
			  </dl>
		  </div>
		</div><br>
		<br>
		</div><br>
	  </div><br>
		<script src='https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js'></script>
		<script src='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.32/dist/js/uikit.min.js'></script>
		<script async src='https://cdn.jsdelivr.net/npm/uikit@3.0.0-beta.33/dist/js/uikit-icons.min.js'></script>
    </body>
</html>