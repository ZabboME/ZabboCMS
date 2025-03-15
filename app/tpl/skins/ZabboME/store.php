<title>{shortname} ~ Store</title>

<?php 
	$navigatorID = 4;
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
<?php			
	$paypalTransactions = mysql_query("SELECT id FROM paypal WHERE username = '".$user['username']."'");	
    $storeTransactions = mysql_query("SELECT id FROM shop_payments WHERE username = '".$user['username']."'");
    $transactionCount = mysql_num_rows($paypalTransactions) + mysql_num_rows($storeTransactions);
?>
<?php
	require_once ('/includes/shopfunctions.php'); 
?>

<div class="alert alert-success" style="text-align: justify;">
<div class="col-1 alert-icon-col">
<center><strong>Hey!</strong> Welcome to the new store, please be sure to read the <b>Terms of Service</b>, which you can find
<a href="javascript:swal({title: 'Terms of Service', text: '<p>Purchasing ranks and items from PayPal is classed as a donation, meaning that under no circumstances can we refund you. The rewards you gain from purchasing, are given as a <b>thank you</b> for donating to us, and keeping us online.</p>
 <p>If your account is banned, you are under no circumstance entitled to a refund, nor are you allowed to file a dispute as you have already recieved your item(s) and you have broken the rules which you agreed to when signing up to the site you donated to.</p>
<p>By purchasing anything from PayPal and ticking the accept box, you are agreeing to abide by these Terms and Conditions. If you have threatened to file a claim/dispute, or create a dispute/claim in PayPal then your account will be permanently banned until the issue has been resolved.</p>
			', html: true, type: 'info', confirmButtonText: 'Go Back!'})">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">here</font></font></a></center>
</div></div>
<div class="alert alert-warning" role="alert">
<center>
     Hey <b><?php echo''.$user['username'].''?></b>! You have <strong>£<?php echo''.number_format($user['shopbalance']).''?></strong> in your account balance.</center>
</div>
     <!-- Page Content -->
<div class="row">
<div class="col-md-3">
<div class="list-group">
 <?php
if (!isset($_GET['tab']) || $_GET['tab'] == topup)
echo '<a class="list-group-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Store Credit</font><b class="pull-right"><b style="color: green;"><i>Instant</b></i></b></font></a>';
else
echo '<a href="/store/topup" class="list-group-item"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Store Credit</font><b class="pull-right"><b style="color: green;"><i>Instant</b></i></b></font></a>';
if ($_GET['tab'] == transactions)
echo '<a class="list-group-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">My Transactions</font></font><b class="pull-right"><b class="label label-primary1" style="font-size: 14.0px;position: absolute;top: 10px;right: 10px;background: #27ae60;">'.$transactionCount.'</b></b></a>';
else
echo '<a href="/store/transactions" class="list-group-item"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">My Transactions</font></font><b class="pull-right"><b class="label label-primary1" style="font-size: 14.0px;position: absolute;top: 10px;right: 10px;background: #27ae60;">'.$transactionCount.'</b></b></a>';
if ($_GET['tab'] == vip)
echo '<a class="list-group-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VIP Memberships</font><b class="pull-right"><b style="color: green;"><i>Instant</b></i></b></font></a>';
else
echo '<a href="/store/vip" class="list-group-item"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VIP Memberships</font><b class="pull-right"><b style="color: green;"><i>Instant</b></i></b></font></a>';
if ($_GET['tab'] == currency)
echo '<a class="list-group-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Currency Packages </font><b class="pull-right"><b style="color: green;"><i>Instant</b></i></b></font></a>';
else
echo '<a href="/store/currency" class="list-group-item"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Currency Packages </font><b class="pull-right"><b style="color: green;"><i>Instant</b></i></b></font></a>';
if ($_GET['tab'] == levelup)
echo '<a class="list-group-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Level Up Packages </font><b class="pull-right"><b style="color: red;"><i>Soon</b></i></b></font></a>';
else
echo '<a href="/store/levelup" class="list-group-item"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Level Up Packages </font><b class="pull-right"><b style="color: red;"><i>Soon</b></i></b></font></a>';

?>
 </div>
</div>
<div class="col-md-9">
                                                                        <?php
if (!isset($_GET['tab']) || $_GET['tab'] == topup) {
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('buy');
    const submitButton = document.getElementById('submitButton');
    const alertMessage = document.getElementById('alertMessage');

    selectElement.addEventListener('change', function() {
        alertMessage.style.display = 'none';

        if (this.value === "") {
            submitButton.disabled = true;
            alertMessage.style.display = 'block';
        } else {
            submitButton.disabled = false;
        }
    });
});
</script>
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Add Balance </font></font></h1>
<div class="body">
<form action="/pp/paypal.php" method="post" id="topUpForm">
<div style="display:none;">
<input id="username" type="text" class="form-control" value="<?php echo''.$user['username'].''?>" name="username" /><br></div>
<select class="form-select" id="buy" name="amount">
	<option value="">Click here to choose a top up amount!</option>
	<option value="1">£3</option>
	<option value="2">£5</option>
	<option value="3">£7</option>
	<option value="4">£11</option>
	<option value="5">£12</option>
	<option value="6">£15</option>
	<option value="7">£20</option>
	<option value="8">£25</option>
	<option value="9">£50</option>
	<option value="10">£75</option>
</select>
<button type="submit" class="btn btn-block" id="submitButton" disabled>Buy Now</button>
</form>
<div id="alertMessage" class="alert alert-danger" style="display:none;">
    <center>You must choose an amount to top up your account with first!</center>
</div>
</div>
</div>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Redeem a Voucher</font></font></h1>
<?php
if (isset($_POST['voucher'])) {
$vouchers = mysql_query("SELECT * FROM shop_vouchers WHERE voucher = '".filter($_POST['vouchercode'])."'");
$voucherexists = mysql_num_rows(mysql_query("SELECT null FROM shop_vouchers WHERE voucher = '".filter($_POST['vouchercode'])."'"));
while ($getvouchers = mysql_fetch_assoc($vouchers)) {
$vouchercode = $getvouchers['voucher'];
$voucherused = $getvouchers['used'];
$voucheramount = $getvouchers['amount'];
if ($voucherused == 1) {
echo '<div class="alert alert-danger" style="text-align: justify;">
<div class="col-1 alert-icon-col">
<center>This code has already been used, please try another one!</center>
</div></div>';
} else {
mysql_query("UPDATE users SET shopbalance = shopbalance + '".$voucheramount."' WHERE username = '".$user['username']."'");
mysql_query("UPDATE shop_vouchers SET used = '1' WHERE voucher = '" . $_POST['vouchercode'] . "'") or die(mysql_error());
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Voucher Code', '".date('l\, F jS\, Y ')."', '".$voucheramount."', '".$_SESSION['user']['id']."')");
echo '<div class="alert alert-success" style="text-align: justify;">
<div class="col-1 alert-icon-col">
<center>Your code has been accepted and <b>£'.$voucheramount.'</b> has been added to your balance!</center>
</div></div>';
}
}
if ($voucherexists == 0) {
echo '<div class="alert alert-danger" style="text-align: justify;">
<div class="col-1 alert-icon-col">
<center>This voucher does not exist, please try again!</center>
</div></div>';
}
echo'<meta http-equiv="refresh" content="2;url=/store"/>';
}
?>
<form method="post">
								<input type="text" id="input" name="vouchercode" size="32" maxlength="32" placeholder="Voucher Code">
								<input type="submit" class="submit" name="voucher" value="Redeem">
							</form>
</div>
</div>
                                                                        <?php
} else if ($_GET['tab'] == transactions) {
?>
<div class="card">
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Store Credit Topups</font></font></h1>
<div style='height:150px;overflow-y:scroll;margin-left:5px;margin-right:5px;margin-top:5px;'>

	<div class="body">

		<table class="table table-striped">

			<tbody>
				<?php
					$result = mysql_query("SELECT * FROM paypal WHERE username = '" . filter($user['username']) . "' ORDER BY id DESC LIMIT 1000");

					if (mysql_num_rows($result) == 0)
					echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>You do not have any transactions on {longname} yet!</b></center></div>';
					else
						echo '
								<thead>
									<tr>
										<th>Username</th>
										<th>Item</th>
										<th>Amount</th>
										<th>Payment Status</th>
									</tr>
								</thead>
							';
						{
					while ($row = mysql_fetch_array($result)) {
					echo '
									<tr>
										<td><span class="badge">' . $row['username'] . '</span></td>
										 <td><span class="badge">' . $row['amount'] . '</span></td>
										  <td><span class="badge">' . $row['cash'] . '</span></td>
										  <td>
										  <span class="label label-warning1">Successful</span>
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
<h1 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Store Purchases</font></font></h1>
<div style='height:350px;overflow-y:scroll;margin-left:5px;margin-right:5px;margin-top:5px;'>

	<div class="body">

		<table class="table table-striped">

			<tbody>
				<?php
					$result = mysql_query("SELECT * FROM shop_payments WHERE userid = '" . filter($user['id']) . "' ORDER BY id DESC LIMIT 1000");

					if (mysql_num_rows($result) == 0)
					echo '<div class="alert alert-danger" style="margin: 15px;"><center><b>You do not have any store transactions on {longname} yet!</b></center></div>';
					else
						echo '
								<thead>
									<tr>
										<th>Username</th>
										<th>Item</th>
										<th>Price</th>
										<th>Payment Status</th>
									</tr>
								</thead>
							';
						{
					while ($row = mysql_fetch_array($result)) {
					echo '
									<tr>
										<td><span class="badge">' . $row['username'] . '</span></td>
										 <td><span class="badge">' . $row['item'] . '</span></td>
										  <td><span class="badge">£' . $row['amount'] . '</span></td>
										  <td>
										  <span class="label label-warning1">Successful</span>
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
                                                                        <?php
} else if ($_GET['tab'] == vip) {
?>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title">VIP Memberships</h1>
<div class="row">
<center><div class="col-lg-4 col-md-6 col-12">
<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);margin-bottom: 0.75rem;">
<div class="card-body">
<div class="row align-items-center">
<div class="col-3">
<img src="{swfurl}/c_images/album1584/XVIP.gif?1651151304" alt="VIP">
</div>
<div class="col text-center">Supreme VIP (<span class="price">£5</span>)</div>
<div class="col-12" style="margin-top: 10px;">
<?php if($user['shopbalance'] >= 5) {
if($user['rank'] >= 2) {
$canbuyvip ='<button class="btn btn-success" disabled=""><i class="fas fa-money-bill" data-toggle="tooltip" data-placement="top" data-original-title="You already have Supreme VIP"></i></button>';
}
else
{
$canbuyvip ='<a href="javascript:SupremeVIPForm()" target=""><button type="submit" class="btn btn-success">Buy</button></a>';
}
echo''.$canbuyvip.'
<a href="javascript:SupremeVIPFormGift()" target=""><button class="btn btn-success"><i class="fas fa-gift" data-toggle="tooltip" data-placement="top" data-original-title="Gift a Friend"></i></button></a>
<a href="javascript:SupremeVIPPerks()" target=""><button class="btn btn-primary"><i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Perks"></i></button></a>';
}else{
echo'<button class="btn btn-success" disabled="">Buy</button>
<button class="btn btn-success" disabled=""><i class="fas fa-gift" data-toggle="tooltip" data-placement="top" data-original-title="Gift a Friend"></i></button>
<a href="javascript:SupremeVIPPerks()" target=""><button class="btn btn-primary"><i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Perks"></i></button></a>';
}
?>
</div>
</div>
</div>
</div>
</div></center>
<center><div class="col-lg-4 col-md-6 col-12">
<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);margin-bottom: 0.75rem;">
<div class="card-body">
<div class="row align-items-center">
<div class="col-3">
<img src="{swfurl}/c_images/album1584/PVIP.gif?1651151304" alt="VIP">
</div>
<div class="col text-center">Prada VIP (<span class="price">£10</span>)</div>
<div class="col-12" style="margin-top: 10px;">
<?php if($user['shopbalance'] >= 10) {
if($user['rank'] >= 3) {
$canbuyvip ='<button class="btn btn-success" disabled=""><i class="fas fa-money-bill" data-toggle="tooltip" data-placement="top" data-original-title="You already have Prada VIP"></i></button>';
}
else
{
$canbuyvip ='<a href="javascript:PradaVIPForm()" target=""><button type="submit" class="btn btn-success">Buy</button></a>';
}
echo''.$canbuyvip.'
<a href="javascript:PradaVIPFormGift()" target=""><button class="btn btn-success"><i class="fas fa-gift" data-toggle="tooltip" data-placement="top" data-original-title="Gift a Friend"></i></button></a>
<a href="javascript:PradaVIPPerks()" target=""><button class="btn btn-primary"><i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Perks"></i></button></a>';
}else{
echo'<button class="btn btn-success" disabled="">Buy</button>
<button class="btn btn-success" disabled=""><i class="fas fa-gift" data-toggle="tooltip" data-placement="top" data-original-title="Gift a Friend"></i></button>
<a href="javascript:PradaVIPPerks()" target=""><button class="btn btn-primary"><i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Perks"></i></button></a>';
}
?>
</div>
</div>
</div>
</div>
</div></center>
<center><div class="col-lg-4 col-md-6 col-12">
<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);margin-bottom: 0.75rem;">
<div class="card-body">
<div class="row align-items-center">
<div class="col-3">
<img src="{swfurl}/c_images/album1584/FVIP.gif?1651151304" alt="VIP">
</div>
<div class="col text-center">Fendi VIP (<span class="price">£15</span>)</div>
<div class="col-12" style="margin-top: 10px;">
<?php if($user['shopbalance'] >= 15) {
if($user['rank'] >= 4) {
$canbuyvip ='<button class="btn btn-success" disabled=""><i class="fas fa-money-bill" data-toggle="tooltip" data-placement="top" data-original-title="You already have Fendi VIP"></i></button>';
}
else
{
$canbuyvip ='<a href="javascript:FendiVIPForm()" target=""><button type="submit" class="btn btn-success">Buy</button></a>';
}
echo''.$canbuyvip.'
<a href="javascript:FendiVIPFormGift()" target=""><button class="btn btn-success"><i class="fas fa-gift" data-toggle="tooltip" data-placement="top" data-original-title="Gift a Friend"></i></button></a>
<a href="javascript:FendiVIPPerks()" target=""><button class="btn btn-primary"><i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Perks"></i></button></a>';
}else{
echo'<button class="btn btn-success" disabled="">Buy</button>
<button class="btn btn-success" disabled=""><i class="fas fa-gift" data-toggle="tooltip" data-placement="top" data-original-title="Gift a Friend"></i></button>
<a href="javascript:FendiVIPPerks()" target=""><button class="btn btn-primary"><i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Perks"></i></button></a>';
}
?>
</div>
</div>
</div>
</div>
</div></center>
<center><div class="col-lg-4 col-md-6 col-12">
<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);margin-bottom: 0.75rem;">
<div class="card-body">
<div class="row align-items-center">
<div class="col-3">
<img src="{swfurl}/c_images/album1584/GOATVIP.gif?1651151304" alt="VIP">
</div>
<div class="col text-center">Goat VIP (<span class="price">£30</span>)</div>
<div class="col-12" style="margin-top: 10px;">
<?php if($user['shopbalance'] >= 30) {
if($user['rank'] >= 9) {
$canbuyvip ='<button class="btn btn-success" disabled=""><i class="fas fa-money-bill" data-toggle="tooltip" data-placement="top" data-original-title="You already have Goat VIP"></i></button>';
}
else
{
$canbuyvip ='<a href="javascript:GoatVIPForm()" target=""><button type="submit" class="btn btn-success">Buy</button></a>';
}
echo''.$canbuyvip.'
<a href="javascript:GoatVIPFormGift()" target=""><button class="btn btn-success"><i class="fas fa-gift" data-toggle="tooltip" data-placement="top" data-original-title="Gift a Friend"></i></button></a>
<a href="javascript:GoatVIPPerks()" target=""><button class="btn btn-primary"><i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Perks"></i></button></a>';
}else{
echo'<button class="btn btn-success" disabled="">Buy</button>
<button class="btn btn-success" disabled=""><i class="fas fa-gift" data-toggle="tooltip" data-placement="top" data-original-title="Gift a Friend"></i></button>
<a href="javascript:GoatVIPPerks()" target=""><button class="btn btn-primary"><i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Perks"></i></button></a>';
}
?>
</div>
</div>
</div>
</div>
</div></center>
</div>
</div>
</div>
<?php
} else if ($_GET['tab'] == currency) {
?>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title">Currency Packages</h1>
<div class="row">
<center><div class="col-lg-3 col-md-6 col-12">
<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);margin-bottom: 0.75rem;">
<div class="card-body">
<div class="row align-items-center">
<div class="col-3">
<img src="{cdnurl}/images/icons/credits.gif">
</div>
<div class="col text-center">Credits</div>
<div class="col-12" style="margin-top: 10px;">
<a href="javascript:CreditsForm()" target=""><button type="submit" class="btn btn-success">Buy</button></a>
</div>
</div>
</div>
</div>
</div></center>
<center><div class="col-lg-3 col-md-6 col-12">
<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);margin-bottom: 0.75rem;">
<div class="card-body">
<div class="row align-items-center">
<div class="col-3">
<img src="{cdnurl}/images/icons/duckets.gif">
</div>
<div class="col text-center">Duckets</div>
<div class="col-12" style="margin-top: 10px;">
<a href="javascript:DucketsForm()" target=""><button type="submit" class="btn btn-success">Buy</button></a>
</div>
</div>
</div>
</div>
</div></center>
<center><div class="col-lg-3 col-md-6 col-12">
<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);margin-bottom: 0.75rem;">
<div class="card-body">
<div class="row align-items-center">
<div class="col-3">
<img src="{cdnurl}/images/icons/diamonds.gif">
</div>
<div class="col text-center">Diamonds</div>
<div class="col-12" style="margin-top: 10px;">
<a href="javascript:DiamondsForm()" target=""><button type="submit" class="btn btn-success">Buy</button></a>
</div>
</div>
</div>
</div>
</div></center>
<center><div class="col-lg-3 col-md-6 col-12">
<div class="card" style="box-shadow: 0 0 4px #000, 0 1px rgba(0, 0, 0, 0.15);margin-bottom: 0.75rem;">
<div class="card-body">
<div class="row align-items-center">
<div class="col-3">
<img src="{cdnurl}/images/icons/points.gif">
</div>
<div class="col text-center">Points</div>
<div class="col-12" style="margin-top: 10px;">
<a href="javascript:PointsForm()" target=""><button type="submit" class="btn btn-success">Buy</button></a>
</div>
</div>
</div>
</div>
</div></center>
</div>
</div>
</div>
<?php
} else if ($_GET['tab'] == levelup) {
?>
<div class="card" style="padding: 0;">
<div class="body" style="padding: 10px;">
<h1 class="title">Level Up Packages</h1>
<div class="alert alert-danger" style="margin: 15px;"><center><b>There has been no level up packages made yet!</b></center></div>
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
</div>
<?php include_once('/includes/footer.php'); ?>
</body>
</html>