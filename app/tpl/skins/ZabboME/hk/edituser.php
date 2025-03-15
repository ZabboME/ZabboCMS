					<?php
$getUseRank4Page = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user']['id'] . "'"));
$perms           = mysql_fetch_assoc(mysql_query("SELECT * FROM housekeeping_perms WHERE `perm` = 'ADMIN'"));
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
	<title>ZabboASE &bull; Edit User</title>
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
				<li>Dashboard</li> <li>Management</li> <li class="active">Edit User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit User</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Edit User
						</div>
					<div class="panel-body">
<form method='post' style="padding: 10px;">
<div class="col-xs-3">
	                            <input type="text" name="l_username" class="form-control" placeholder="Username" style="margin-bottom: 10px;">
								</div>
<input type="submit" class="btn btn-primary btn-sm" value="Edit User" name="lookup" style="
    position: absolute;
    margin-top: 2px;
    margin-left: -5px;
    height: 40px;
    font-variant-caps: all-small-caps;
    font-size: 15px;
    font-family: sans-serif;
    font-weight: bolder;
    border-radius: 3px;
    border-color: #1075c3;
">                    </form>
							<br>
							 <?php
						$two = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username = '" . mysql_real_escape_string($_POST['l_username']) . "'"));
						       function doCommand($header, $data = '')
{
    $musData = $header . chr(1) . $data;
    $sock = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));

    socket_connect($sock, '127.0.0.1', '3001');
 
  socket_send($sock, $musData, strlen($musData), MSG_DONTROUTE);
  socket_close($sock);
}
	                    if(isset($_POST['update'])) 
						{
	                        mysql_query("UPDATE users SET 
							username = '" . mysql_real_escape_string($_POST['username']) . "',
							clientui = '" . mysql_real_escape_string($_POST['clientui']) . "',
	                        rank = '" . mysql_real_escape_string($_POST['rank']) . "',
							hidden = '" . mysql_real_escape_string($_POST['hidden']) . "',
							uotw = '" . mysql_real_escape_string($_POST['uotw']) . "',
							ootw = '" . mysql_real_escape_string($_POST['ootw']) . "',
	                        motto = '" . mysql_real_escape_string($_POST['motto']) . "',
							account_locked = '" . mysql_real_escape_string($_POST['account_locked']) . "',
							security_enabled = '" . mysql_real_escape_string($_POST['security_enabled']) . "',
							pin = '" . mysql_real_escape_string($_POST['pin']) . "'	WHERE username = '" . mysql_real_escape_string($_POST['username_current']) . "'") or die(mysql_error());	                   
						   echo "<div class=\"alert alert-success\" style=\"margin-top: 45px;font-size: 15px;margin-left: 27px; width: fit-content;font-weight: bolder;color: #ffffff;background-color: #38b904;border-color: #4f861f;\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" style=\"float: right; margin-left: 5px;font-size: 35px;margin-top: -7px;border-radius: 140px;background: #00000000;\">×</button>User <b>" . strip_tags($_POST['username_current']) . "</b> successfully updated!</div>";
	                    }
						

						if(isset($_POST['client']))
						{
							$user = mysql_query("SELECT * FROM users WHERE username = '". mysql_real_escape_string($_POST['username_current']) ."'");
							while ($u = mysql_fetch_array($user)){
							mysql_query("UPDATE users SET 
							username = '" . mysql_real_escape_string($_POST['username']) . "',
							clientui = '" . mysql_real_escape_string($_POST['clientui']) . "',
	                        rank = '" . mysql_real_escape_string($_POST['rank']) . "',
							hidden = '" . mysql_real_escape_string($_POST['hidden']) . "',
							uotw = '" . mysql_real_escape_string($_POST['uotw']) . "',
							ootw = '" . mysql_real_escape_string($_POST['ootw']) . "',
							country = '" . mysql_real_escape_string($_POST['country']) . "',
	                        motto = '" . mysql_real_escape_string($_POST['motto']) . "',
							account_locked = '" . mysql_real_escape_string($_POST['account_locked']) . "',
							security_enabled = '" . mysql_real_escape_string($_POST['security_enabled']) . "',
							pin = '" . mysql_real_escape_string($_POST['pin']) . "'	WHERE username = '" . mysql_real_escape_string($_POST['username_current']) . "'") or die(mysql_error());
	                        echo "<div class=\"alert alert-success\" style=\"margin-top: 45px;font-size: 15px;margin-left: 27px; width: fit-content;font-weight: bolder;color: #ffffff;background-color: #38b904;border-color: #4f861f;\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" style=\"float: right; margin-left: 5px;font-size: 35px;margin-top: -7px;border-radius: 140px;background: #00000000;\">×</button>User <b>" . strip_tags($_POST['username_current']) . "</b> successfully updated!</div>";
							//doCommand("reload_user_rank", "".$u['id']."");
							//doCommand("reload_user_vip", "".$u['id']."");
							doCommand("reload_motto", "".$u['id']."");
							//doCommand("alert_user", "".$u['id'].":Your User has just been updated by a staff member.");
						}
					}
					
						if(isset($_POST['delete']))
						{
							$user = mysql_query("SELECT * FROM users WHERE username = '". mysql_real_escape_string($_POST['username_current']) ."'");
							while ($u = mysql_fetch_array($user)){
							$delete_user = mysql_query("DELETE FROM `users` WHERE `username` = '" . mysql_real_escape_string($_POST['username']) . "'") or die(mysql_error());
							$delete_items = mysql_query("DELETE FROM `items` WHERE `user_id` = '" . $u['id'] . "'") or die(mysql_error());
							$delete_rooms = mysql_query("DELETE FROM `rooms` WHERE `owner` = '" . $u['id'] . "'") or die(mysql_error());
	                        echo "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>User <b>" . strip_tags($_POST['username_current']) . "</b> successfully deleted!</div>";
							}
						}
						if(isset($_POST['delete_user_online']))
						{
							$user = mysql_query("SELECT * FROM users WHERE username = '". mysql_real_escape_string($_POST['username_current']) ."'");
							while ($u = mysql_fetch_array($user)){
							doCommand("disconnect", "".$u['id']."");
							$delete_user = mysql_query("DELETE FROM `users` WHERE `username` = '" . mysql_real_escape_string($_POST['username']) . "'") or die(mysql_error());
							$delete_items = mysql_query("DELETE FROM `items` WHERE `user_id` = '" . $u['id'] . "'") or die(mysql_error());
							$delete_rooms = mysql_query("DELETE FROM `rooms` WHERE `owner` = '" . $u['id'] . "'") or die(mysql_error());
	                        echo "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>User <b>" . strip_tags($_POST['username_current']) . "</b> successfully deleted!</div>";
							}
						}
						
	                    if(isset($_POST['lookup'])) {
	                        if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '". ($_POST['l_username']) ."'")) == 0) { 
	                            echo "<div class=\"alert alert-error\" style=\"padding: 15px;margin-bottom: 25px;border: 1px solid #7b0909a1;border-radius: 4px;background: #d85e5ef2;width: fit-content;margin-top: 50px;font-size: 15px;color: white;font-weight: bolder;margin-left: 27px;\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" style=\"float: right; margin-left: 5px;font-size: 35px;margin-top: -7px;border-radius: 140px;background: #00000000;\">×</button>User <b>" . strip_tags($_POST['l_username']) . "</b> not found!</div>"; 
	                        } else {
	                ?>
					<div class="col col-1">
						<div class="module">
	                        <div class="con">
	                            <form method='post' style="padding: 10px;">
	                                <input type="hidden" name="username_current" value="<?php echo htmlspecialchars($_POST['l_username']); ?>" />
	                                <table width="100%" style="margin-bottom: 10px;">
									<?php
									if ($two['username'] == "Justin")
										{
											echo '
                                        <tr>
                                            <td><b>Username</td>
                                            <td><input type="text" class="form-control input-sm" value="' . strip_tags($_POST['l_username']) . '" readonly/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Motto</td>
                                            <td><input type="text" class="form-control input-sm" value="' . strip_tags($two['motto']) . '" readonly/></td>
                                        </tr>';
										}
										else
										{
											echo '<tr>
                                            <td><b>Username</td>
                                            <td><input type="text" class="form-control input-sm" name="username" value="' . strip_tags($two['username']) . '" /></td>
                                        </tr>
										
										<tr>
										
										 <td><b>Client UI Style</b></td>
											<td><select name="clientui" class="form-control is-valid">
												<option value="' . strip_tags($two['clientui']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current Client UI: ' . strip_tags($two['clientui']) . ' </font></font></option>
												<option value="modern"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Modern</font></font></option>
												<option value="flash"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Flash</font></font></option>
												<option value="nitro"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nitro</font></font></option>
											</select></td>
										</tr>	                          								
							
										<tr>
										 <td><b>Rank</b></td>
											<td><select name="rank" class="form-control is-valid">
												<option value="' . strip_tags($two['rank']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current rank #' . strip_tags($two['rank']) . '</font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">User #1</font></font></option>
												<option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Supreme VIP #2</font></font></option>
												<option value="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Prada VIP #3</font></font></option>
												<option value="4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fendi VIP #4</font></font></option>
												<option value="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">WIRED eXpert #5</font></font></option>
												<option value="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Builder Team #6</font></font></option>
												<option value="7"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Value Team #7</font></font></option>
												<option value="8"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Support Team Leader #8</font></font></option>
												<option value="12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Event Team #12</font></font></option>
												<option value="13"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Event Manager #13</font></font></option>
												<option value="14"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trial Moderator #14</font></font></option>
												<option value="15"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Moderator #15</font></font></option>
												<option value="16"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Administrator #16</font></font></option>
												<option value="17"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Management #17</font></font></option>
												<option value="18"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Community Leader #18</font></font></option>
												<option value="19"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Owner #19</font></font></option>
											</select></td>
										</tr>
										
										<td><b>Hidden Rank</b></td>
											<td><select name="hidden" class="form-control is-valid">
												<option value="' . strip_tags($two['hidden']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current Hidden Status #' . strip_tags($two['hidden']) . ' </font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True #1</font></font></option>
												<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">False #0</font></font></option>
											</select></td>
										</tr>
										
										<tr>
										 <td><b>UOTW Rank</b></td>
											<td><select name="uotw" class="form-control is-valid">
												<option value="' . strip_tags($two['uotw']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current UOTW Status #' . strip_tags($two['uotw']) . ' </font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True #1</font></font></option>
												<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">False #0</font></font></option>
											</select></td>
										</tr>	

										 <td><b>OOTW Rank</b></td>
											<td><select name="ootw" class="form-control is-valid">
												<option value="' . strip_tags($two['ootw']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current OOTW Status #' . strip_tags($two['ootw']) . ' </font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True #1</font></font></option>
												<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">False #0</font></font></option>
											</select></td>
										</tr>
				
										<td><b>Country</b></td>
											<td><select name="country" class="form-control is-valid">
												<option value="' . strip_tags($two['country']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current Country Status: ' . strip_tags($two['country']) . ' </font></font></option>
												<option value="Unknown">Unknown</option>
						<option value="Abkhazia">Abkhazia</option>
						<option value="Afghanistan">Afghanistan</option>
						<option value="Aland">Aland</option>
						<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American-Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antarctica">Antarctica</option>
						<option value="Antigua-and-Barbuda">Antigua and Barbuda</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Aruba">Aruba</option>
						<option value="Australia">Australia</option>
						<option value="Austria">Austria</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Basque-Country">Basque Country</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bermuda">Bermuda</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bosnia-and-Herzegovina">Bosnia and Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="British-Antarctic-Territory">British-Antarctic-Territory</option>
						<option value="British-Virgin-Islands">British-Virgin-Islands</option>
						<option value="Brunei">Brunei</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina-Faso">Burkina-Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary-Islands">Canary-Islands</option>
						<option value="Cape-Verde">Cape Verde</option>
						<option value="Cayman-Islands">Cayman-Islands</option>
						<option value="Central-African-Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Chile">Chile</option>
						<option value="China">China</option>
						<option value="Christmas-Island">Christmas-Island</option>
						<option value="Cocos-Keeling-Islands">Cocos Keeling Islands</option>
						<option value="Colombia">Colombia</option>
						<option value="Commonwealth">Commonwealth Islands</option>
						<option value="Comoros">Comoros</option>
						<option value="Cook-Islands">Cook Islands</option>
						<option value="Costa-Rica">Costa-Rica</option>
						<option value="Cote-dIvoire">Cote-dIvoire</option>
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Curacao">Curacao</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech-Republic">Czech Republic</option>
						<option value="Democratic-Republic-of-the-Congo">Democratic Republic of the Congo</option>
						<option value="Denmark">Denmark</option>
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican-Republic">Dominican Republic</option>
						<option value="East-Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>
						<option value="El-Salvador">El Salvador</option>
						<option value="England">England</option>
						<option value="Equatorial-Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="European-Union">European Union</option>
						<option value="Falkland-Islands">Falkland Islands</option>
						<option value="Faroes">Faroes</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="French-Polynesia">French Polynesia</option>
						<option value="French-Southern-Territories">French Southern Territories</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="GoSquared">GoSquared</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>
						<option value="Grenada">Grenada</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guernsey">Guernsey</option>
						<option value="Guinea">Guinea</option>
						<option value="Guinea-Bissau">Guinea Bissau</option>
						<option value="Guyana">Guyana</option>
						<option value="Haiti">Haiti</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong-Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="Iceland">Iceland</option>
						<option value="India">India</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran">Iran</option>
						<option value="Iraq">Iraq</option>
						<option value="Ireland">Ireland</option>
						<option value="Isle-of-Man">Isle of Man</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jersey">Jersey</option>
						<option value="Jordan">Jordan</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>
						<option value="Kiribati">Kiribati</option>
						<option value="Kosovo">Kosovo</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="Laos">Laos</option>
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Liechtenstein">Liechtenstein</option>
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia">Macedonia</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malawi">Malawi</option>
						<option value="Malaysia">Malaysia</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Mars">Mars</option>
						<option value="Marshall-Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mayotte">Mayotte</option>
						<option value="Mexico">Mexico</option>
						<option value="Micronesia">Micronesia</option>
						<option value="Moldova">Moldova</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>
						<option value="Montenegro">Montenegro</option>
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="Nagorno-Karabakh">Nagorno Karabakh</option>
						<option value="Namibia">Namibia</option>
						<option value="NATO">NATO</option>
						<option value="Nauru">Nauru</option>
						<option value="Nepal">Nepal</option>
						<option value="Netherlands">Netherlands</option>
						<option value="Netherlands-Antilles">Netherlands Antilles</option>
						<option value="New-Caledonia">New Caledonia</option>
						<option value="New-Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norfolk-Island">Norfolk Island</option>
						<option value="Northern-Cyprus">Northern Cyprus</option>
						<option value="Northern-Mariana-Islands">Northern Mariana Islands</option>
						<option value="North-Korea">North Korea</option>
						<option value="Norway">Norway</option>
						<option value="Olympics">Olympics</option>
						<option value="Oman">Oman</option>
						<option value="Pakistan">Pakistan</option>
						<option value="Palau">Palau</option>
						<option value="Palestine">Palestine</option>
						<option value="Panama">Panama</option>
						<option value="Papua-New-Guinea">Papua New Guinea</option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Philippines">Philippines</option>
						<option value="Pitcairn-Islands">Pitcairn Islands</option>
						<option value="Poland">Poland</option>
						<option value="Portugal">Portugal</option>
						<option value="Puerto-Rico">Puerto Rico</option>
						<option value="Qatar">Qatar</option>
						<option value="Red-Cross">Red Cross</option>
						<option value="Republic-of-the-Congo">Republic of the Congo</option>
						<option value="Romania">Romania</option>
						<option value="Russia">Russia</option>
						<option value="Rwanda">Rwanda</option>
						<option value="Saint-Barthelemy">Saint Barthelemy</option>
						<option value="Saint-Helena">Saint Helena</option>
						<option value="Saint-Kitts-and-Nevis">Saint Kitts and Nevis</option>
						<option value="Saint-Lucia">Saint Lucia</option>
						<option value="Saint-Vincent-and-the-Grenadines"> Saint Vincent and the Grenadines</option>
						<option value="Samoa">Samoa</option>
						<option value="San-Marino">San Marino</option>
						<option value="Sao-Tome-and-Principe">Sao Tome and Principe</option>
						<option value="Saudi-Arabia">Saudi Arabia</option>
						<option value="Scotland">Scotland</option>
						<option value="Senegal">Senegal</option>
						<option value="Serbia">Serbia</option>
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra-Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon-Islands">Solomon Islands</option>
						<option value="Somalia">Somalia</option>
						<option value="Somaliland">Somaliland</option>
						<option value="South-Africa">South-Africa</option>
						<option value="South-Georgia-and-the-South-Sandwich-Islands">South Georgia and the South Sandwich Islands</option>
						<option value="South-Korea">South Korea</option>
						<option value="South-Ossetia">South Ossetia</option>
						<option value="South-Sudan">South Sudan</option>
						<option value="Spain">Spain</option>
						<option value="Sri-Lanka">Sri Lanka</option>
						<option value="Sudan">Sudan</option>
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syria">Syria</option>
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="Togo">Togo/option>
						<option value="Tokelau">Tokelau</option>
						<option value="Tonga">Tonga</option>
						<option value="Trinidad-and-Tobago">Trinidad and Tobago</option>
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks-and-Caicos-Islands">Turks and Caicos Islands</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="Uganda">Uganda</option>
						<option value="Ukraine">Ukraine</option>
						<option value="United-Arab-Emirates">United Arab Emirates</option>
						<option value="United-Kingdom">United Kingdom</option>
						<option value="United-Nations">United Nations</option>
						<option value="United-States">United States</option>
						<option value="Unknown">Unknown</option>
						<option value="Uruguay">Uruguay</option>
						<option value="US-Virgin-Islands">US Virgin Islands</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="Vanuatu">Vanuatu</option>
						<option value="Vatican-City">Vatican City</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Wales">Wales</option>
						<option value="Wallis-And-Futuna">Wallis And Futuna</option>
						<option value="Western-Sahara">Western Sahara</option>
						<option value="Yemen">Yemen</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
											</select></td>
										</tr>
										
                                        <tr>
                                            <td><b>Motto</td>
                                            <td><input type="text" class="form-control input-sm" name="motto" value="' . strip_tags($two['motto']) . '" /></td>
                                        </tr>
										<tr>
                                            <td><b>Look</td>
                                            <td><input type="text" class="form-control input-sm" name="look" value="' . strip_tags($two['look']) . '" /></td>
                                        </tr>
										
										<td><b>Account Locked</b></td>
											<td><select name="account_locked" class="form-control is-valid">
												<option value="' . strip_tags($two['account_locked']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current Locked Status #' . strip_tags($two['account_locked']) . ' </font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True #1</font></font></option>
												<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">False #0</font></font></option>
											</select></td>
										</tr>	
										
										<td><b>Pin Enabled</b></td>
											<td><select name="security_enabled" class="form-control is-valid">
												<option value="' . strip_tags($two['security_enabled']) . '" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Current Pin Status #' . strip_tags($two['security_enabled']) . ' </font></font></option>
												<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True #1</font></font></option>
												<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">False #0</font></font></option>
											</select></td>
										</tr>	
										
										<td><b>Staff Pin</td>
                                            <td><input type="text" class="form-control input-sm" name="pin" value="' . strip_tags($two['pin']) . '" /></td>
                                        </tr>';
										}
										?>
                                    </table>
									
									<?php
									if ($two['username'] != "Justin" && $two['online'] == 0)
									{
										echo'
                                    <input type="submit" class="btn btn-primary btn-sm" value="Save Changes" name="update" style="float: right;background: #217332;margin-top: 2px;margin-left: 5px;height: 40px;font-variant-caps: all-small-caps;font-size: 15px;font-family: sans-serif;font-weight: bolder;border-radius: 3px;border-color: #0cde39;">';
									}
									
									else if ($two['username'] != "Justin" && $two['online'] == 1)
									{
										echo'
									<input type="submit" class="btn btn-primary btn-sm" value="Client Save" name="client" style="background: #217332;margin-top: 2px;margin-left: 5px;height: 40px;font-variant-caps: all-small-caps;font-size: 15px;font-family: sans-serif;font-weight: bolder;border-radius: 3px;border-color: #0cde39;">';
									}
									if ($two['username'] != "Justin" && $two['online'] == 0 && $two['rank'] <= 1)
									{
										echo'
                                    <input type="submit" class="btn btn-primary btn-sm" value="Delete User" name="delete" style="background: #962222;margin-top: 2px;margin-left: 5px;height: 40px;font-variant-caps: all-small-caps;font-size: 15px;font-family: sans-serif;font-weight: bolder;border-radius: 3px;border-color: #ff0000;">';
									}
									else if ($two['username'] != "Justin" && $two['online'] == 1 && $two['rank'] <= 1)
									{
										echo'
									<input type="submit" class="btn btn-success" value="Delete User (Online)" name="delete_user_online"/>';
									}
									?>
                                </form>
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