<title>{shortname} ~ Hiring Application</title>

<?php 
	$navigatorID = 1;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>		
<div class="row">
<div class="col-md-7">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hiring Applications</font></font></h1>
<form method="post">
<?php
	$sql = mysql_query("SELECT user FROM users_apps WHERE user = '".$_SESSION['user']['username']."'");

	if(isset($_POST['submit']))
	{
	if (empty($_POST['location']) || empty($_POST['age']) || empty($_POST['why']) || empty($_POST['dif']) || empty($_POST['additional']) || empty($_POST['willyou']) || empty($_POST['role']) || empty($_POST['skype']) || empty($_POST['howlong']) || empty($_POST['agree']) || empty($_POST['reply_sent']))
	{
	echo '<div class="alert alert-danger" style="text-align: justify;">Please fill in all fields.</div>'; 
	}
	else
	{
	if(mysql_num_rows($sql) < 2){
	mysql_query("INSERT INTO `users_apps` (user_id,user,`real`,location,age,why,dif,additional,willyou,role,skype,howlong,agree,timestamp,reply_sent) VALUES ('".$_SESSION['user']['id']."', '".$_SESSION['user']['username']."', '".filter($_POST["real"])."', '".filter($_POST["location"])."', '".filter($_POST["age"])."', '".filter($_POST["why"])."', '".filter($_POST["dif"])."', '".filter($_POST["additional"])."', '".filter($_POST["willyou"])."', '".filter($_POST["role"])."', '".filter($_POST["skype"])."', '".filter($_POST["howlong"])."', '".filter($_POST["agree"])."','".time($_POST["timestamp"])."', '".filter($_POST["reply_sent"])."')") or die(mysql_error());
	mysql_query("INSERT INTO users_apps SET timestamp = '" . time() . "' WHERE timestamp = '' LIMIT 1");
	mysql_query("INSERT INTO users_apps SET reply_sent = '1' WHERE reply_sent = '0' LIMIT 1");

	echo '<div class="alert alert-success" style="text-align: justify;"><b>Thank you!</b> Your application has been submitted and is awaiting to be reviewed by staff!</div>'; 
	
	}else{
	echo '<div class="alert alert-danger" style="text-align: justify;">You have already applied, please wait for a reply.</div>';
	} 
	}	
	}
?>
<?php
	$selectapps = mysql_query("SELECT reply FROM users_apps WHERE user = '".$_SESSION['user']['username']."'");
	echo "<div class='alert alert-success' style='text-align: justify;'>You have sent in a total of <strong> ";
	echo mysql_num_rows($selectapps);
	echo "</strong> Hiring Application.</div>";
?>
<?php
	$home1 = mysql_query("SELECT * FROM users_apps WHERE user = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	if(mysql_num_rows($home) != 0)
	{
		
	$home1 = mysql_query("SELECT * FROM users_apps WHERE user = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user1 = mysql_fetch_assoc($home1);

	if($user1['reply_sent'] == 2){ $OnlineStatus11 = "
	
<div class='alert alert-success' style='text-align: justify;'>Hey, Our management team have responded to your hiring application!</br><center><b>Our Reply Is Listed Below</b></center></div>	
	"; } else { $OnlineStatus11 = " $OnlineStatus11
	
"; }

?>
<?php
	$home11 = mysql_query("SELECT * FROM users_apps WHERE user = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	
	$user11 = mysql_fetch_assoc($home11);

	if($user11['reply_sent'] == 1){ $OnlineStatus111 = "
	
<div class='alert alert-danger' style='text-align: justify;'>You do not have any replies yet!</div>
	"; } else { $OnlineStatus111 = "
	
";
		
	$home = mysql_query("SELECT * FROM users_apps WHERE user = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);

	if($user['reply_sent'] == 2){ $OnlineStatus1 = '
	
<div class="alert alert-success" style="text-align: justify;">Hey '.$user11['user'].', Our management team have responded to your hiring application!</br></br>

<center><b>We\'ve replied to your "'.$user11['role'].'" application!</b><br><i> '.$user11['reply'].'</i></center></div>	
	'; } else { $OnlineStatus1 = '
	
'; }


?>
<?php echo $OnlineStatus111 ?>
<?php echo $OnlineStatus1 ?>

<div class="form-section">
<strong>Username:</strong><br />
<input class="form-control is-valid" disabled="disabled" type="text" value="{username}">
</div><br>
<div class="form-section">
<strong>Real Name:</strong><br />
<input class="form-control is-valid" type="text" name="real" required="">
</div><br>
<div class="form-section">
<strong>Country:</strong><br />
<select name="location" class="form-select" required="">
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
<option value="Togo">Togo</option>
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
</select>
</div><br>
<div class="form-section">
<strong>Age:</strong><br />
<select class="form-select"" name="age">
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
<option value="60">60</option>
</select>
</div><br>
<div class="form-section">
<strong>Why do you think you deserve this opportunity?</strong><br />
<textarea class="form-control is-valid" name="why" maxlength="3000" required=""></textarea>
</div><br>
<div class="form-section">
<strong>What can you bring to the team?</strong><br />
<textarea class="form-control is-valid" name="dif" maxlength="3000" required=""></textarea>
</div><br>
<div class="form-section">
<strong>What experience do you have?</strong><br />
<textarea class="form-control is-valid" name="additional" maxlength="3000" required=""></textarea>
</div><br>
<div class="form-section">
<strong>Will you still play if you're not hired?</strong><br />
<select class="form-select"name="willyou">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</div><br>
<div class="form-section">
<strong>What Position are you applying for?</strong><br />
<select class="form-select" name="role">
<option value="Values Team">Values Team</option>
<option value="WIRED eXperts">WIRED eXperts</option>
<option value="Builder Team">Builder Team</option>
<option value="Event Team">Event Team</option>
<option value="Event Manager">Event Manager</option>
<!--<option value="Trial Moderator">Trial Moderator</option>-->
<!--<option value="Community Leader">Community Leader</option>-->
</select>
</div><br>
<div class="form-section">
<strong>Discord (Example: frankretros):</strong><br />
<input class="form-control is-valid" type="text" name="skype" required="">
</div><br>
<div class="form-section">
<strong>How long are you online per day?</strong><br />
<div class="form-section">
<select class="form-select" name="howlong">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
</select>
</div></div><br />
<div class="form-section" style="display:none;">
<strong>Management Team Reply Status</strong><br />
<select class="form-select" name="reply_sent">
<option value="1">Enabled</option>
</select>
</div>
<div class="form-section">
<center><label>I agree to be <b>active</b>, and <b>loyal</b> to {longname}.</label> <input class="form-control is-valid" type="checkbox" value="1" name="agree" style="width: 35px;"></input></center><br />
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="submit" class="submit_field" value="Sumbit Application!"></font></font>  
</div>
</form>
</div>
</div>
</div>
<div class="col-md-5">
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">About Hiring Application</font></font></h1>
<p>
Here at {shortname} we are on the look out for some members to join our Staffing department, and we want these people to be the most committed. This is why we are on the look out for some fantastic people to join our departments!
</p>
<p>
<strong>Before applying, please meet the following guidelines below:</strong><br />
- You must be active for at least 12 hours per week.<br />
- You must be over 15 years of age.<br />
- You must not be staff on another hotel.<br>
- You must have an active discord account.<br />
</p>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include_once('/includes/footer.php'); ?>
</body>
</html>