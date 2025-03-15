<title>{shortname} ~ Design Settings</title>

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

<a href="/account/profilepage" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Profile Page Settings </font></font></a>

<a href="/account" class="list-group-item ">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Password & Email Settings </font></font></a>

<a href="/account/logins" class="list-group-item">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Login Attempts </font></font></a>
<a class="list-group-item active">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">Website & Design Options </font></font></a> </div>
</div>
<div class="col-md-9">
<div class="card pb0">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Design your experience!</font></font></h1>

<div class="body pb0">
	<form action="" method="post">
	<?php echo $successMessage; ?>

	<div class="listening ">
		<b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PIN System Settings</font></font></b>
	<i style="font-size: 12px;"><font style="vertical-align: inherit;">PIN SYSTEM DISABLED (0) | PIN SYSTEM ENABLED (1) <br /> This will remove {longname} extra layer of protection for your acccount to help prevent you from being hacked by other Habbo Retro's or people you've meet before!</a> | <i>Forgot your pin? E-Mail Address PIN Reset</b></i>: <a href="{url}/resetpin.php" target="_blank">{url}/resetpin.php</a></font></i>
		<select name="acc_pin" class="form-select">
			<option value="<?php echo $profilePIN['security_enabled']; ?>" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> You have the  number <?php echo $profilePIN['security_enabled']; ?> set!</font></font></option>
			<option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PIN SYSTEM ENABLED (1)</font></font></option>
			<option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PIN SYSTEM DISABLED (0)</font></font></option>
		</select>
	</div>

	<div class="listening even">
<b>Header Background</b><br>
<div class="row" style="padding: 10px;">
<div class="col-md-1 col-xs-2">
<div class="box header header_header_1" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_1')" style="background: url({cdnurl}/images/design/header/header_1.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_2" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_2')" style="background: url({cdnurl}/images/design/header/header_2.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_3" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_3')" style="background: url({cdnurl}/images/design/header/header_3.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_4" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_4')" style="background: url({cdnurl}/images/design/header/header_4.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_5" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_5')" style="background: url({cdnurl}/images/design/header/header_5.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_6" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_6')" style="background: url({cdnurl}/images/design/header/header_6.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_7" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_7')" style="background: url({cdnurl}/images/design/header/header_7.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_8" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_8')" style="background: url({cdnurl}/images/design/header/header_8.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_9" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_9')" style="background: url({cdnurl}/images/design/header/header_9.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_10" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_10')" style="background: url({cdnurl}/images/design/header/header_10.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_11" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_11')" style="background: url({cdnurl}/images/design/header/header_11.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_12" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_12')" style="background: url({cdnurl}/images/design/header/header_12.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_13" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_13')" style="background: url({cdnurl}/images/design/header/header_13.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_14" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_14')" style="background: url({cdnurl}/images/design/header/header_14.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_15" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_15')" style="background: url({cdnurl}/images/design/header/header_15.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_16" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_16')" style="background: url({cdnurl}/images/design/header/header_16.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_17" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_17')" style="background: url({cdnurl}/images/design/header/header_17.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_19" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_19')" style="background: url({cdnurl}/images/design/header/header_19.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_20" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_20')" style="background: url({cdnurl}/images/design/header/header_20.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_21" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_21')" style="background: url({cdnurl}/images/design/header/header_21.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_22" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_22')" style="background: url({cdnurl}/images/design/header/header_22.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_23" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_23')" style="background: url({cdnurl}/images/design/header/header_23.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_24" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_24')" style="background: url({cdnurl}/images/design/header/header_24.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_25" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_25')" style="background: url({cdnurl}/images/design/header/header_25.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_26" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_26')" style="background: url({cdnurl}/images/design/header/header_26.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_27" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_27')" style="background: url({cdnurl}/images/design/header/header_27.png);background-size: cover;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box header header_header_28" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeader('header_28')" style="background: url({cdnurl}/images/design/header/header_28.png);background-size: cover;"></div>
</div>
</div></div>
<div class="listening ">
<b>Site Colour</b><br>
<div class="row">
<div class="col-md-1 col-xs-2">
<input name="colour" class="jscolor {onFineChange:'UpdateNavi(this)'}" value="<?php echo $cms_color1['cms_color']; ?>" readonly="" autocomplete="off" style="background-image: none; background-color: rgb(188, 224, 238); color: rgb(0, 0, 0);border-radius: 5px;">
</div>
</div></div>

<div class="listening even">
<b>Background Image</b><br>
<div class="row" style="padding: 10px;">
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_1 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_1')" style="background: url({cdnurl}/images/design/bg/bg_1.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_2 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_2')" style="background: url({cdnurl}/images/design/bg/bg_2.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_3 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_3')" style="background: url({cdnurl}/images/design/bg/bg_3.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_4 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_4')" style="background: url({cdnurl}/images/design/bg/bg_4.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_5 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_5')" style="background: url({cdnurl}/images/design/bg/bg_5.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_6 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_6')" style="background: url({cdnurl}/images/design/bg/bg_6.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_7 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_7')" style="background: url({cdnurl}/images/design/bg/bg_7.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_8 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_8')" style="background: url({cdnurl}/images/design/bg/bg_8.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_9 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_9')" style="background: url({cdnurl}/images/design/bg/bg_9.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_10 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_10')" style="background: url({cdnurl}/images/design/bg/bg_10.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_11 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_11')" style="background: url({cdnurl}/images/design/bg/bg_11.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_12 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_12')" style="background: url({cdnurl}/images/design/bg/bg_12.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_13 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_13')" style="background: url({cdnurl}/images/design/bg/bg_13.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_14 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_14')" style="background: url({cdnurl}/images/design/bg/bg_14.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_15 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_15')" style="background: url({cdnurl}/images/design/bg/bg_15.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_16 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_16')" style="background: url({cdnurl}/images/design/bg/bg_16.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_17 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_17')" style="background: url({cdnurl}/images/design/bg/bg_17.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_18 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_18')" style="background: url({cdnurl}/images/design/bg/bg_18.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_19 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_19')" style="background: url({cdnurl}/images/design/bg/bg_19.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_20 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_20')" style="background: url({cdnurl}/images/design/bg/bg_20.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_21" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_21')" style="background: url({cdnurl}/images/design/bg/bg_21.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_22 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_22')" style="background: url({cdnurl}/images/design/bg/bg_22.png);"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box bg bg_bg_23 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateBG('bg_23')" style="background: url({cdnurl}/images/design/bg/bg_23.png);"></div>
</div>
</div>
</div>
<div class="listening ">
<b>Me Box BG & Home Profile Box BG</b><br>
<div class="row" style="padding: 10px;">
<div class="col-md-1 col-xs-2">
<div class="box mebox mebox_mebox_2" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateMeBox('mebox_2')" style="background: url({cdnurl}/images/design/mebox/mebox_2.png) 50% 50%;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box mebox mebox_mebox_3" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateMeBox('mebox_3')" style="background: url({cdnurl}/images/design/mebox/mebox_3.png) 50% 50%;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box mebox mebox_mebox_4 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateMeBox('mebox_4')" style="background: url({cdnurl}/images/design/mebox/mebox_4.png) 50% 50%;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box mebox mebox_mebox_5 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateMeBox('mebox_5')" style="background: url({cdnurl}/images/design/mebox/mebox_5.png) 50% 50%;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box mebox mebox_mebox_6 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateMeBox('mebox_6')" style="background: url({cdnurl}/images/design/mebox/mebox_6.png) 50% 50%;"></div>
</div>
</div>
</div>
<div class="listening even">
<b>Logo</b><br>
<div class="row" style="padding: 10px;">
<div class="col-md-3 col-xs-3">
<div class="box logo logo_logo_1 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateLogo('logo_1')" style="background: url({cdnurl}/images/design/logo/logo_1.png) 50% 50% no-repeat;"></div>
</div>
</div>
</div>
<div class="listening ">
<b>Header Image</b><br>
<div class="row" style="padding: 10px;">
<div class="col-md-1 col-xs-2">
<div class="box headerright headerright_headerright_1 selected" onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeaderRight('headerright_1')" style="background: url({cdnurl}/images/design/headerright/headerright_1.png) 50% 50%;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box headerright headerright_headerright_2 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeaderRight('headerright_2')" style="background: url({cdnurl}/images/design/headerright/headerright_2.png) 50% 50%;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box headerright headerright_headerright_5 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeaderRight('headerright_5')" style="background: url({cdnurl}/images/design/headerright/headerright_5.png) 50% 50%;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box headerright headerright_headerright_7 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeaderRight('headerright_7')" style="background: url({cdnurl}/images/design/headerright/headerright_7.png) 50% 50%;"></div>
</div>
<div class="col-md-1 col-xs-2">
<div class="box headerright headerright_headerright_6 " onclick="if (!window.__cfRLUnblockHandlers) return false; UpdateHeaderRight('headerright_6')" style="background: url({cdnurl}/images/design/headerright/headerright_6.png) 50% 50%;"></div>
</div>
</div>
</div>
<div class="listening border-bottom">
<input type="hidden" id="navi_input" name="cms_color" value="<?php echo $cms_color1['cms_color']; ?>">
<input type="hidden" id="bg_input" name="cms_bg" value="<?php echo $cms_bg1['cms_bg']; ?>">
<input type="hidden" id="mebox_input" name="cms_mebg" value="<?php echo $cms_mebg1['cms_mebg']; ?>">
<input type="hidden" id="header_input" name="cms_headerbg" value="<?php echo $cms_headerbg1['cms_headerbg']; ?>">
<input type="hidden" id="logo_input" name="logo" value="logo_1.png">
<input type="hidden" id="headerright_input" name="cms_rightheader" value="<?php echo $cms_rightheader1['cms_rightheader']; ?>">
<input class="form-control is-valid btn btn-block btn-joinin right" style="border-radius: 6px;" type="submit" name="account_cms" value="Save Settings">
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
