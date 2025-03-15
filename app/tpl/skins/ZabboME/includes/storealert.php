<?php
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);
?>
<?php
		$result1 = mysql_query("SELECT * FROM users WHERE id = '" . filter($user['id']) . "' AND store_alert = ''" . filter($user['0']) . "'' ORDER BY id DESC LIMIT 1000");

		if (mysql_num_rows($result1) == 1)
		echo '';
		else
			echo '

				';
			{
		while ($row1 = mysql_fetch_array($result1)) {
		echo '
		
<script>
var countDownDate = new Date("Jan 31, 2024 15:37:25").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();
    
  var distance = countDownDate - now;
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<div class="alert alert-danger" style="text-align: justify;">
<div class="col-1 alert-icon-col">
<center><strong>Hey {username},</strong> Please check out our <b>{shortname}Store ** 25% OFF Discount DEALS! **</b> 
<a href="/store/vip" target="_blank">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VIP Memberships</font></font></a>
|
<a href="/store/levelup" target="_blank">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Level Up Packages</font></font></a>
|
<b>Remaining Time Left: </b><i id="demo"></i>
</center>

<button type="button" class="close" data-dismiss="store_alert" name="store_alert" value="1" style="float: right;font-family: Ubuntu;position: relative;margin-top: -22px;font-size: 20px;z-index: 1;color: white;font-weight: bolder;" data-toggle="tooltip" data-placement="top" data-original-title="Delete Notification Permanently!"><a href="{url}/dismiss3" style="text-decoration: none;">x</a></button>

</div></div>
<style>
.alert.alert-success {
    background: #27ae60;
    color: #FFF;
}
table {
    width: 100%;
    font-size: 14px;
    background-color: #b3b3b300;
}
</style>
			';
		}
	}
?>