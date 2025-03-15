<?php
if(isset($_POST['account']))
{
$acc_country = mysql_real_escape_string($_POST['acc_country']);
$acc_youtube = mysql_real_escape_string($_POST['acc_youtube']);
$cms_currency_private = mysql_real_escape_string($_POST['cms_currency_private']);


function strip_tags_content($text, $tags = '', $invert = FALSE) {

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
  $tags = array_unique($tags[1]);

  if(is_array($tags) AND count($tags) > 0) {
    if($invert == FALSE) {
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
    }
    else {
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
    }
  }
  elseif($invert == FALSE) {
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
  }
  return $text;
}
mysql_query("UPDATE users SET country = '".strip_tags_content($acc_country)."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
mysql_query("UPDATE users SET youtube_embed = '".strip_tags_content($acc_youtube)."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
mysql_query("UPDATE users SET cms_currency_private = '".strip_tags_content($cms_currency_private)."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());

}
?>

<?php
if(isset($_POST['account']))
	{
	$acc_country = mysql_real_escape_string(filter($_POST['acc_country']));
	mysql_query("UPDATE users SET country = '".$acc_country."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	}
?>
<?php
if(isset($_POST['account']))
	{
	$acc_youtube = mysql_real_escape_string(filter($_POST['acc_youtube']));
	mysql_query("UPDATE users SET youtube_embed = '".$acc_youtube."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	}
?>
<?php
if(isset($_POST['account']))
	{
	$cms_currency_private = mysql_real_escape_string(filter($_POST['cms_currency_private']));
	mysql_query("UPDATE users SET cms_currency_private = '".$cms_currency_private."' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	$successMessage = '<div class="alert alert-success" style="text-align: justify;"><b></b><center><b>Your changes have successfully saved!</b></center></div>';
	}
?>

<?php

$profileData = mysql_query("SELECT id,country FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileCountry = mysql_fetch_array($profileData);

}
?>
<?php

$profileData = mysql_query("SELECT id,youtube_embed FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileYoutube = mysql_fetch_array($profileData);

}
?>
<?php

$profileData = mysql_query("SELECT id,cms_currency_private FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
if(mysql_num_rows($profileData) > 0){
$profileCurrency = mysql_fetch_array($profileData);

}
?>
<title>{shortname} ~ Profile Page Settings</title>

<?php
	$navigatorID = 1;
	require_once ('/includes/header.php');
	require_once ('/includes/navigator.php');
?>

<div class="row">
<div class="col-md-12">
</div>
</div>
<div class="row">
<div class="col-md-3">
<div class="list-group">

<a href="/account/info" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Information </font></font></a>

<a href="/account/client" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Client Settings </font></font></a>

<a class="list-group-item active">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Profile Page Settings </font></font></a>

<a href="/account" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Password & Email Settings </font></font></a>

<a href="/account/logins" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Login Attempts </font></font></a>
<a href="/account/design" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Website & Design Options </font></font></a> </div>
</div>
<div class="col-md-9">
<div class="card pb0">
            <h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Change Profile Page Settings</font></font></h1>

            <div class="body pb0">
                <form action="" method="post">

					<?php echo $successMessage; ?>

                    <div class="listening">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Country <div style="width: 48px;height: 48px;margin-top: -34px;margin-left: 63px;background:  url({cdnurl}/images/flags_small/<?php echo $profileCountry['country']; ?>.png);" align="left"></div></font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">Your country will be shown as a flag on your <a href="/home/{username}" target="_blank">Profile Page</a>.</font></i>
						<select name="acc_country" class="form-select">
						<option selected="selected" value="<?php echo $profileCountry['country']; ?>" name="acc_flag">Current Country: <?php echo $profileCountry['country']; ?></option>
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
						</select></p>
                    </div>

                    <div class="listening even">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Your Profile Currency Display</font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">Currency Display Shown (0) | Currency Display Private (1) on Your Profile <a href="/home/{username}" target="_blank">Profile Page</a></font></i>
						<select name="cms_currency_private" class="form-select">
						<option selected="selected" value="0" name="acc_cms_currency_private">Current Currency Display: <?php echo $profileCurrency['cms_currency_private']; ?></option>
						<option value="1">View Currency Private</option>
						<option value="0">View Currency Shown</option>
						</select></p>
						 </div>

                    <div class="listening ">
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Youtube Video</font></font></b>
						<i style="font-size: 12px;"><font style="vertical-align: inherit;">Your YouTube video will be shown on your <a href="/home/{username}" target="_blank">Profile Page</a>.</font></i>
                        <br />
						<i style="font-size: 12px;"><font style="vertical-align: inherit;"><b>http://www.youtube.com/watch?v= [Code]</b></a></font></i>
						<input type="text" class="form-control is-valid" size="125" maxlength="125" name="acc_youtube" value="<?php echo filter($profileYoutube['youtube_embed']); ?>" id="youtubevideo">
                    </div>

                    <div class="listening border-bottom">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="account" value="Save Settings"></font></font>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</div>


<?php include_once('/includes/footer.php'); ?>
</body>
</html>
