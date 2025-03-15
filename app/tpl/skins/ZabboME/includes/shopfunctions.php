<?php // MUS Commands

/*
 ________  ________  ________  ________  ________     
|\_____  \|\   __  \|\   __  \|\   __  \|\   __  \    
 \|___/  /\ \  \|\  \ \  \|\ /\ \  \|\ /\ \  \|\  \   
	 /  / /\ \   __  \ \   __  \ \   __  \ \  \\\  \  
	/  /_/__\ \  \ \  \ \  \|\  \ \  \|\  \ \  \\\  \ 
   |\________\ \__\ \__\ \_______\ \_______\ \_______\
	\|_______|\|__|\|__|\|_______|\|_______|\|_______|
																																	  
			 ________  _____ ______   ________                    
			|\   ____\|\   _ \  _   \|\   ____\                   
			\ \  \___|\ \  \\\__\ \  \ \  \___|_                  
			 \ \  \    \ \  \\|__| \  \ \_____  \                 
			  \ \  \____\ \  \    \ \  \|____|\  \                
			   \ \_______\ \__\    \ \__\____\_\  \               
				\|_______|\|__|     \|__|\_________\              
										\|_________|  
=====================================================
== ZabboCMS based from RevCMS Credits to Kryptos   ==
== Maintained by Justin							               ==
== Discord: justinretros						               ==
== Devbest: Rebel								                   ==
== RageZone: Youngster	                           ==
== RetroTools.YXZ: Justin						               ==
== Credits to Revue & Justin for ZabboCMS theme    ==
=====================================================	

	 =======================================
	 == © 2015 ~ 2022 zabbo.me (Build v4) ==
	 =======================================
	 ====== PLEASE LEAVE ALL CREDITS =======  
	 =======================================

*/

function sendMUS($key, $data = []) {
    $socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ( @socket_connect($socket, "127.0.0.1", "3001")) {
            $message = json_encode([
                'key' => $key,
                'data' => $data
            ]);

            @socket_send($socket, $message, strlen($message), MSG_DONTROUTE);
            @socket_close($socket);
        }
}
?>
<?php 
	$home = mysql_query("SELECT * FROM users WHERE username = '" . Filter($_GET['user']) . "' LIMIT 1");
	if(mysql_num_rows($home) != 1)
	{
	$home = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['user']['username'] . "' LIMIT 1");
	}
	$user = mysql_fetch_assoc($home);
	$SupremeVIP = 5; $PradaVIP = 10; $FendiVIP = 15; $GoatVIP = 30;
	$Credits1 = 4; $Credits2 = 7; $Credits3 = 10;
	$Duckets1 = 4; $Duckets2 = 7; $Duckets3 = 10;
	$Diamonds1 = 4; $Diamonds2 = 7; $Diamonds3 = 10;
	$Points1 = 5; $Points2 = 8; $Points3 = 13; $Points4 = 23;
?>

<?php
// Supreme VIP
if (isset($_POST['buysupremevip'])) {
$buysupremevip = mysql_real_escape_string($_POST['buysupremevip']);
if ($user['online'] == 1 && $user['shopbalance'] < $SupremeVIP || $user['online'] == 0 && $user['shopbalance'] < $SupremeVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Supreme VIP</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= 5)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Supreme VIP</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased Supreme VIP!"]);
sendMUS("givecredits", ["user_id" => "".$user['id']."", "credits" =>  "35000"]);
sendMUS("givepixels", ["user_id" => "".$user['id']."", "pixels" =>  "45000"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "80", "type" =>  "5"]);
sendMUS("givebadge", ["user_id" => "".$user['id']."", "badge" =>  "XVIP"]);
sendMUS("setrank", ["user_id" => "".$user['id']."", "rank" =>  "2"]);
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Supreme VIP", "packageprice" =>  $SupremeVIP]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$SupremeVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Supreme VIP', '".date('l\, F jS\, Y ')."', '".$SupremeVIP."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $SupremeVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Supreme VIP</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET credits = credits + 35000 WHERE id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 45000 WHERE type = '0' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 80 WHERE type = '5' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$user['id']."', 'XVIP', '1')");
mysql_query("UPDATE users SET rank = '2' WHERE id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$SupremeVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Supreme VIP', '".date('l\, F jS\, Y ')."', '".$SupremeVIP."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Supreme VIP", "packageprice" =>  $SupremeVIP]);
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/vip"/>';
}
// Prada VIP
if (isset($_POST['buypradavip'])) {
$buypradavip = mysql_real_escape_string($_POST['buypradavip']);
if ($user['online'] == 1 && $user['shopbalance'] < $PradaVIP || $user['online'] == 0 && $user['shopbalance'] < $PradaVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Prada VIP</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $PradaVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Prada VIP</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';	
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased Prada VIP!"]);
sendMUS("givecredits", ["user_id" => "".$user['id']."", "credits" =>  "55000"]);
sendMUS("givepixels", ["user_id" => "".$user['id']."", "pixels" =>  "65000"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "120", "type" =>  "5"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "5", "type" =>  "101"]);
sendMUS("givebadge", ["user_id" => "".$user['id']."", "badge" =>  "PVIP"]);
sendMUS("setrank", ["user_id" => "".$user['id']."", "rank" =>  "3"]);
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Prada VIP", "packageprice" =>  $PradaVIP]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$PradaVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Prada VIP', '".date('l\, F jS\, Y ')."', '".$PradaVIP."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $PradaVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Prada VIP</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET credits = credits + 55000 WHERE id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 65000 WHERE type = '0' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 120 WHERE type = '5' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 5 WHERE type = '101' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$user['id']."', 'PVIP', '1')");
mysql_query("UPDATE users SET rank = '3' WHERE id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$PradaVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Prada VIP", "packageprice" =>  $PradaVIP]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Prada VIP', '".date('l\, F jS\, Y ')."', '".$PradaVIP."', '".$_SESSION['user']['id']."')");
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/vip"/>';
}
// Fendi VIP
if (isset($_POST['buyfendivip'])) {
$buyfendivip = mysql_real_escape_string($_POST['buyfendivip']);
if ($user['online'] == 1 && $user['shopbalance'] < $FendiVIP || $user['online'] == 0 && $user['shopbalance'] < $FendiVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Fendi VIP</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $FendiVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Fendi VIP</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased Fendi VIP!"]);
sendMUS("givecredits", ["user_id" => "".$user['id']."", "credits" =>  "85000"]);
sendMUS("givepixels", ["user_id" => "".$user['id']."", "pixels" =>  "95000"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "150", "type" =>  "5"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "10", "type" =>  "101"]);
sendMUS("givebadge", ["user_id" => "".$user['id']."", "badge" =>  "FVIP"]);
sendMUS("setrank", ["user_id" => "".$user['id']."", "rank" =>  "4"]);
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Fendi VIP", "packageprice" =>  $FendiVIP]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$FendiVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Fendi VIP', '".date('l\, F jS\, Y ')."', '".$FendiVIP."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $FendiVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Fendi VIP</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET credits = credits + 85000 WHERE id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 95000 WHERE type = '0' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 150 WHERE type = '5' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 10 WHERE type = '101' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$user['id']."', 'FVIP', '1')");
mysql_query("UPDATE users SET rank = '4' WHERE id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$FendiVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Fendi VIP", "packageprice" =>  $FendiVIP]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Fendi VIP', '".date('l\, F jS\, Y ')."', '".$FendiVIP."', '".$_SESSION['user']['id']."')");
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/vip"/>';
}
// Goat VIP
if (isset($_POST['buygoatvip'])) {
$buygoatvip = mysql_real_escape_string($_POST['buygoatvip']);
if ($user['online'] == 1 && $user['shopbalance'] < $GoatVIP || $user['online'] == 0 && $user['shopbalance'] < $GoatVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Goat VIP</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $GoatVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Goat VIP</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased Goat VIP!"]);
sendMUS("givecredits", ["user_id" => "".$user['id']."", "credits" =>  "135000"]);
sendMUS("givepixels", ["user_id" => "".$user['id']."", "pixels" =>  "155000"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "300", "type" =>  "5"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "25", "type" =>  "101"]);
sendMUS("givebadge", ["user_id" => "".$user['id']."", "badge" =>  "GOATVIP"]);
sendMUS("setrank", ["user_id" => "".$user['id']."", "rank" =>  "9"]);
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Goat VIP", "packageprice" =>  $GoatVIP]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$GoatVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Goat VIP', '".date('l\, F jS\, Y ')."', '".$GoatVIP."', '".$_SESSION['user']['id']."')");
$Thrones = 10;
for($i =0; $i < $Thrones; $i++){
   sendMUS("sendgift", ["user_id" => "".$user['id']."", "itemid" =>  "230", "message" =>  "This present includes your Throne sent by our automatic store system. Coded by: Justin"]);
}

}
else if ($user['online'] == 0 && $user['shopbalance'] >= $GoatVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>Fendi VIP</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET credits = credits + 135000 WHERE id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 155000 WHERE type = '0' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 300 WHERE type = '5' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 25 WHERE type = '101' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$user['id']."', 'GOATVIP', '1')");
mysql_query("UPDATE users SET rank = '9' WHERE id = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$GoatVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Goat VIP", "packageprice" =>  $GoatVIP]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Goat VIP', '".date('l\, F jS\, Y ')."', '".$GoatVIP."', '".$_SESSION['user']['id']."')");
$Thrones = 10;
for($i =0; $i < $Thrones; $i++){
   mysql_query("INSERT INTO `items`(user_id,room_id,item_id,extra_data,x,y,z,rot,wall_pos) VALUES ('".$user['id']."', 0,'230', 'This present includes your Throne sent by our automatic store system. Coded by: Justin', 0, 0, 0, 0, '')") or die(mysql_error());
}
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/vip"/>';
}
?>

<?php
// Supreme VIP Gift
if (isset($_POST['buysupremevipgift'])) {
$buysupremevipgift = mysql_real_escape_string($_POST['buysupremevipgift']);
$buysupremevipuser = mysql_query("SELECT * FROM users WHERE username = '".$buysupremevipgift."'");
while ($vipuser = mysql_fetch_assoc($buysupremevipuser)) {
$username           = $vipuser['username'];
$online           = $vipuser['online'];
$userid           = $vipuser['id'];
$rank           = $vipuser['rank'];
if ($rank >= 2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Supreme VIP</b> for <b>'.$username.'</b><br> has been un-successful because <b>'.$username.'</b> already has this rank!</p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($online == 1 && $user['shopbalance'] < $SupremeVIP || $online == 0 && $user['shopbalance'] < $SupremeVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Supreme VIP</b> for <b>'.$username.'</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($online == 1 && $user['shopbalance'] >= $SupremeVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Supreme VIP</b> for <b>'.$username.'</b><br> has been successful and has been added to their account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$userid."", "message" => "You have been successfully gifted Supreme VIP by ".$_SESSION['user']['username']."!"]);
sendMUS("givecredits", ["user_id" => "".$userid."", "credits" =>  "35000"]);
sendMUS("givepixels", ["user_id" => "".$userid."", "pixels" =>  "45000"]);
sendMUS("givepoints", ["user_id" => "".$userid."", "points" =>  "80", "type" =>  "5"]);
sendMUS("givebadge", ["user_id" => "".$userid."", "badge" =>  "XVIP"]);
sendMUS("setrank", ["user_id" => "".$userid."", "rank" =>  "2"]);
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Supreme VIP Gift for ".$username."", "packageprice" =>  $SupremeVIP]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$SupremeVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Supreme VIP Gift for ".$username."', '".date('l\, F jS\, Y ')."', '".$SupremeVIP."', '".$_SESSION['user']['id']."')");
}
else if ($online == 0 && $user['shopbalance'] >= $SupremeVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Supreme VIP</b> for <b>'.$username.'</b><br> has been successful and has been added to their account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET credits = credits + 35000 WHERE id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 45000 WHERE type = '0' AND user_id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 80 WHERE type = '5' AND user_id = '".$userid."' LIMIT 1");
mysql_query("INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$userid."', 'XVIP', '1')");
mysql_query("UPDATE users SET rank = '2' WHERE id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$SupremeVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Supreme VIP Gift for ".$username."', '".date('l\, F jS\, Y ')."', '".$SupremeVIP."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Supreme VIP Gift for ".$username."", "packageprice" =>  $SupremeVIP]);
}
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/vip"/>';
}
// Prada VIP Gift
if (isset($_POST['buypradavipgift'])) {
$buypradavipgift = mysql_real_escape_string($_POST['buypradavipgift']);
$buypradavipuser = mysql_query("SELECT * FROM users WHERE username = '".$buypradavipgift."'");
while ($vipuser = mysql_fetch_assoc($buypradavipuser)) {
$username           = $vipuser['username'];
$online           = $vipuser['online'];
$userid           = $vipuser['id'];
$rank           = $vipuser['rank'];
if ($rank >= 3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Prada VIP</b> for <b>'.$username.'</b><br> has been un-successful because <b>'.$username.'</b> already has this rank!</p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($online == 1 && $user['shopbalance'] < $PradaVIP || $online == 0 && $user['shopbalance'] < $PradaVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Prada VIP</b> for <b>'.$username.'</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($online == 1 && $user['shopbalance'] >= $PradaVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Prada VIP</b> for <b>'.$username.'</b><br> has been successful and has been added to their account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$userid."", "message" => "You have been successfully gifted Prada VIP by ".$_SESSION['user']['username']."!"]);
sendMUS("givecredits", ["user_id" => "".$userid."", "credits" =>  "55000"]);
sendMUS("givepixels", ["user_id" => "".$userid."", "pixels" =>  "65000"]);
sendMUS("givepoints", ["user_id" => "".$userid."", "points" =>  "120", "type" =>  "5"]);
sendMUS("givepoints", ["user_id" => "".$userid."", "points" =>  "5", "type" =>  "101"]);
sendMUS("givebadge", ["user_id" => "".$userid."", "badge" =>  "PVIP"]);
sendMUS("setrank", ["user_id" => "".$userid."", "rank" =>  "3"]);
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Prada VIP Gift for ".$username."", "packageprice" =>  $PradaVIP]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$PradaVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Prada VIP Gift for ".$username."', '".date('l\, F jS\, Y ')."', '".$PradaVIP."', '".$_SESSION['user']['id']."')");
}
else if ($online == 0 && $user['shopbalance'] >= $PradaVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Prada VIP</b> for <b>'.$username.'</b><br> has been successful and has been added to their account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET credits = credits + 55000 WHERE id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 65000 WHERE type = '0' AND user_id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 120 WHERE type = '5' AND user_id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 5 WHERE type = '101' AND user_id = '".$userid."' LIMIT 1");
mysql_query("INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$userid."', 'PVIP', '1')");
mysql_query("UPDATE users SET rank = '3' WHERE id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$PradaVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Prada VIP Gift for ".$username."', '".date('l\, F jS\, Y ')."', '".$PradaVIP."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Prada VIP Gift for ".$username."", "packageprice" =>  5]);
}
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/vip"/>';
}
// Fendi VIP Gift
if (isset($_POST['buyfendivipgift'])) {
$buyfendivipgift = mysql_real_escape_string($_POST['buyfendivipgift']);
$buyfendivipuser = mysql_query("SELECT * FROM users WHERE username = '".$buyfendivipgift."'");
while ($vipuser = mysql_fetch_assoc($buyfendivipuser)) {
$username           = $vipuser['username'];
$online           = $vipuser['online'];
$userid           = $vipuser['id'];
$rank           = $vipuser['rank'];
if ($rank >= 4)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Fendi VIP</b> for <b>'.$username.'</b><br> has been un-successful because <b>'.$username.'</b> already has this rank!</p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($online == 1 && $user['shopbalance'] < $FendiVIP || $online == 0 && $user['shopbalance'] < $FendiVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Fendi VIP</b> for <b>'.$username.'</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($online == 1 && $user['shopbalance'] >= $FendiVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Fendi VIP</b> for <b>'.$username.'</b><br> has been successful and has been added to their account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$userid."", "message" => "You have been successfully gifted Fendi VIP by ".$_SESSION['user']['username']."!"]);
sendMUS("givecredits", ["user_id" => "".$userid."", "credits" =>  "85000"]);
sendMUS("givepixels", ["user_id" => "".$userid."", "pixels" =>  "95000"]);
sendMUS("givepoints", ["user_id" => "".$userid."", "points" =>  "150", "type" =>  "5"]);
sendMUS("givepoints", ["user_id" => "".$userid."", "points" =>  "10", "type" =>  "101"]);
sendMUS("givebadge", ["user_id" => "".$userid."", "badge" =>  "FVIP"]);
sendMUS("setrank", ["user_id" => "".$userid."", "rank" =>  "4"]);
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Fendi VIP Gift for ".$username."", "packageprice" =>  $FendiVIP]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$FendiVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Fendi VIP Gift for ".$username."', '".date('l\, F jS\, Y ')."', '".$FendiVIP."', '".$_SESSION['user']['id']."')");
}
else if ($online == 0 && $user['shopbalance'] >= $FendiVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Fendi VIP</b> for <b>'.$username.'</b><br> has been successful and has been added to their account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET credits = credits + 85000 WHERE id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 95000 WHERE type = '0' AND user_id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 150 WHERE type = '5' AND user_id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 10 WHERE type = '101' AND user_id = '".$userid."' LIMIT 1");
mysql_query("INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$userid."', 'FVIP', '1')");
mysql_query("UPDATE users SET rank = '4' WHERE id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$FendiVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Fendi VIP Gift for ".$username."', '".date('l\, F jS\, Y ')."', '".$FendiVIP."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Fendi VIP Gift for ".$username."", "packageprice" =>  $FendiVIP]);
}
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/vip"/>';
}
// Goat VIP Gift
if (isset($_POST['buygoatvipgift'])) {
$buygoatvipgift = mysql_real_escape_string($_POST['buygoatvipgift']);
$buygoatvipuser = mysql_query("SELECT * FROM users WHERE username = '".$buygoatvipgift."'");
while ($vipuser = mysql_fetch_assoc($buygoatvipuser)) {
$username           = $vipuser['username'];
$online           = $vipuser['online'];
$userid           = $vipuser['id'];
$rank           = $vipuser['rank'];
if ($rank >= 9)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Goat VIP</b> for <b>'.$username.'</b><br> has been un-successful because <b>'.$username.'</b> already has this rank!</p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($online == 1 && $user['shopbalance'] < $GoatVIP || $online == 0 && $user['shopbalance'] < $GoatVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Goat VIP</b> for <b>'.$username.'</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($online == 1 && $user['shopbalance'] >= $GoatVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Goat VIP</b> for <b>'.$username.'</b><br> has been successful and has been added to their account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$userid."", "message" => "You have been successfully gifted Goat VIP by ".$_SESSION['user']['username']."!"]);
sendMUS("givecredits", ["user_id" => "".$userid."", "credits" =>  "135000"]);
sendMUS("givepixels", ["user_id" => "".$userid."", "pixels" =>  "155000"]);
sendMUS("givepoints", ["user_id" => "".$userid."", "points" =>  "300", "type" =>  "5"]);
sendMUS("givepoints", ["user_id" => "".$userid."", "points" =>  "25", "type" =>  "101"]);
sendMUS("givebadge", ["user_id" => "".$userid."", "badge" =>  "GOATVIP"]);
sendMUS("setrank", ["user_id" => "".$userid."", "rank" =>  "9"]);
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Goat VIP Gift for ".$username."", "packageprice" =>  $GoatVIP]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$GoatVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Goat VIP Gift for ".$username."', '".date('l\, F jS\, Y ')."', '".$GoatVIP."', '".$_SESSION['user']['id']."')");
$Thrones = 10;
for($i =0; $i < $Thrones; $i++){
   sendMUS("sendgift", ["user_id" => "".$userid."", "itemid" =>  "230", "message" =>  "This present includes your Throne sent by our automatic store system. Coded by: Justin"]);
}
}
else if ($online == 0 && $user['shopbalance'] >= $GoatVIP)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your gift purchase of <br><b>Goat VIP</b> for <b>'.$username.'</b><br> has been successful and has been added to their account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET credits = credits + 135000 WHERE id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 155000 WHERE type = '0' AND user_id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 300 WHERE type = '5' AND user_id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 25 WHERE type = '101' AND user_id = '".$userid."' LIMIT 1");
mysql_query("INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$userid."', 'GOATVIP', '1')");
mysql_query("UPDATE users SET rank = '9' WHERE id = '".$userid."' LIMIT 1");
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$GoatVIP." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', 'Goat VIP Gift for ".$username."', '".date('l\, F jS\, Y ')."', '".$GoatVIP."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "Goat VIP Gift for ".$username."", "packageprice" =>  $GoatVIP]);
$Thrones = 10;
for($i =0; $i < $Thrones; $i++){
   mysql_query("INSERT INTO `items`(user_id,room_id,item_id,extra_data,x,y,z,rot,wall_pos) VALUES ('".$userid."', 0,'230', 'This present includes your Throne sent by our automatic store system. Coded by: Justin', 0, 0, 0, 0, '')") or die(mysql_error());
}
}
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/vip"/>';
}
?>

<?php // Credits
if (isset($_POST['credit_pack_submit'])) {
switch($_POST['credit_pack']){
case '1':
if ($user['online'] == 1 && $user['shopbalance'] < $Credits1 || $user['online'] == 0 && $user['shopbalance'] < $Credits1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>45,000 Credits</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Credits1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>45,000 Credits</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 45,000 Credits!"]);
sendMUS("givecredits", ["user_id" => "".$user['id']."", "credits" =>  "45000"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Credits1." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "45,000 Credits", "packageprice" =>  $Credits1]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '45,000 Credits', '".date('l\, F jS\, Y ')."', '".$Credits1."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Credits1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>45,000 Credits</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Credits1.", credits = credits + 45000 WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '45,000 Credits', '".date('l\, F jS\, Y ')."', '".$Credits1."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "45,000 Credits", "packageprice" =>  $Credits1]);
}
break;

case '2':
if ($user['online'] == 1 && $user['shopbalance'] < $Credits2 || $user['online'] == 0 && $user['shopbalance'] < $Credits2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>95,000 Credits</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Credits2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>95,000 Credits</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 95,000 Credits!"]);
sendMUS("givecredits", ["user_id" => "".$user['id']."", "credits" =>  "95000"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Credits2." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "95,000 Credits", "packageprice" =>  $Credits2]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '95,000 Credits', '".date('l\, F jS\, Y ')."', '".$Credits2."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Credits2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>95,000 Credits</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Credits2.", credits = credits + 95000 WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '95,000 Credits', '".date('l\, F jS\, Y ')."', '".$Credits2."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "95,000 Credits", "packageprice" =>  $Credits2]);
}
break;

case '3':
if ($user['online'] == 1 && $user['shopbalance'] < $Credits3 || $user['online'] == 0 && $user['shopbalance'] < $Credits3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>135,000 Credits</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Credits3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>135,000 Credits</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 135,000 Credits!"]);
sendMUS("givecredits", ["user_id" => "".$user['id']."", "credits" =>  "135000"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Credits3." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "135,000 Credits", "packageprice" =>  $Credits3]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '135,000 Credits', '".date('l\, F jS\, Y ')."', '".$Credits3."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Credits3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>135,000 Credits</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Credits3.", credits = credits + 135000 WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '135,000 Credits', '".date('l\, F jS\, Y ')."', '".$Credits3."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "135,000 Credits", "packageprice" =>  $Credits3]);
}
break;
}
echo'<meta http-equiv="refresh" content="5;url={url}/store/currency"/>';
}
?>

<?php // Duckets
if (isset($_POST['ducket_pack_submit'])) {
switch($_POST['ducket_pack']){
case '1':
if ($user['online'] == 1 && $user['shopbalance'] < $Duckets1 || $user['online'] == 0 && $user['shopbalance'] < $Duckets1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>45,000 Duckets</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Duckets1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>45,000 Duckets</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 45,000 Duckets!"]);
sendMUS("givepixels", ["user_id" => "".$user['id']."", "pixels" =>  "45000"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Duckets1." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "45,000 Duckets", "packageprice" =>  $Duckets1]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '45,000 Duckets', '".date('l\, F jS\, Y ')."', '".$Duckets1."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Duckets1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>45,000 Duckets</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Duckets1." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 45000 WHERE type = '0' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '45,000 Duckets', '".date('l\, F jS\, Y ')."', '".$Duckets1."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "45,000 Duckets", "packageprice" =>  $Duckets1]);
}
break;

case '2':
if ($user['online'] == 1 && $user['shopbalance'] < 4 || $user['online'] == 0 && $user['shopbalance'] < 4)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>95,000 Duckets</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= 7)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>95,000 Duckets</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 95,000 Duckets!"]);
sendMUS("givepixels", ["user_id" => "".$user['id']."", "pixels" =>  "95000"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Duckets2." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "95,000 Duckets", "packageprice" =>  7]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '95,000 Duckets', '".date('l\, F jS\, Y ')."', '".$Duckets2."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= 7)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>95,000 Duckets</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Duckets2." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 95000 WHERE type = '0' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '95,000 Duckets', '".date('l\, F jS\, Y ')."', '".$Duckets2."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "95,000 Duckets", "packageprice" =>  7]);
}
break;

case '3':
if ($user['online'] == 1 && $user['shopbalance'] < 4 || $user['online'] == 0 && $user['shopbalance'] < 4)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>135,000 Duckets</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= 10)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>135,000 Duckets</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 135,000 Duckets!"]);
sendMUS("givepixels", ["user_id" => "".$user['id']."", "pixels" =>  "135000"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Duckets3." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "135,000 Duckets", "packageprice" =>  10]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '135,000 Duckets', '".date('l\, F jS\, Y ')."', '".$Duckets3."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= 10)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>135,000 Duckets</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Duckets3." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 135000 WHERE type = '0' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '135,000 Duckets', '".date('l\, F jS\, Y ')."', '".$Duckets3."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "135,000 Duckets", "packageprice" =>  10]);
}
break;

}
echo'<meta http-equiv="refresh" content="5;url={url}/store/currency"/>';
}
?>

<?php // Diamonds
if (isset($_POST['diamond_pack_submit'])) {
switch($_POST['diamond_pack']){
case '1':
if ($user['online'] == 1 && $user['shopbalance'] < $Diamonds1 || $user['online'] == 0 && $user['shopbalance'] < $Diamonds1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>200 Diamonds</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Diamonds1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>200 Diamonds</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 200 Diamonds!"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "200", "type" =>  "5"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Diamonds1." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "200 Diamonds", "packageprice" =>  $Diamonds1]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '200 Diamonds', '".date('l\, F jS\, Y ')."', '".$Diamonds1."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Diamonds1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>200 Diamonds</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Diamonds1." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 200 WHERE type = '5' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '200 Diamonds', '".date('l\, F jS\, Y ')."', '".$Diamonds1."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "200 Diamonds", "packageprice" =>  $Diamonds1]);
}
break;

case '2':
if ($user['online'] == 1 && $user['shopbalance'] < $Diamonds2 || $user['online'] == 0 && $user['shopbalance'] < $Diamonds2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>450 Diamonds</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Diamonds2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>450 Diamonds</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 450 Diamonds!"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "450", "type" =>  "5"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Diamonds2." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "450 Diamonds", "packageprice" =>  $Diamonds2]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '450 Diamonds', '".date('l\, F jS\, Y ')."', '".$Diamonds2."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Diamonds2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>450 Diamonds</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Diamonds2." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 450 WHERE type = '5' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '450 Diamonds', '".date('l\, F jS\, Y ')."', '".$Diamonds2."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "450 Diamonds", "packageprice" =>  $Diamonds2]);
}
break;

case '3':
if ($user['online'] == 1 && $user['shopbalance'] < $Diamonds3 || $user['online'] == 0 && $user['shopbalance'] < $Diamonds3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>900 Diamonds</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Diamonds3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>900 Diamonds</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 900 Diamonds!"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "900", "type" =>  "5"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Diamonds3." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "900 Diamonds", "packageprice" =>  $Diamonds3]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '900 Diamonds', '".date('l\, F jS\, Y ')."', '".$Diamonds3."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Diamonds3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>900 Diamonds</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Diamonds3." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 900 WHERE type = '5' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '900 Diamonds', '".date('l\, F jS\, Y ')."', '".$Diamonds3."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "900 Diamonds", "packageprice" =>  10]);
}
break;

}
echo'<meta http-equiv="refresh" content="5;url={url}/store/currency"/>';
}
?>

<?php // Points
if (isset($_POST['point_pack_submit'])) {
switch($_POST['point_pack']){
case '1':
if ($user['online'] == 1 && $user['shopbalance'] < $Points1 || $user['online'] == 0 && $user['shopbalance'] < $Points1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>5 Points</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Points1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>5 Points</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 5 Points!"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "5", "type" =>  "101"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Points1." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "5 Points", "packageprice" =>  $Points1]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '5 Points', '".date('l\, F jS\, Y ')."', '".$Points1."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Points1)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>5 Points</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Points1." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 5 WHERE type = '101' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '5 Points', '".date('l\, F jS\, Y ')."', '".$Points1."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "5 Points", "packageprice" =>  $Points1]);
}
break;

case '2':
if ($user['online'] == 1 && $user['shopbalance'] < $Points2 || $user['online'] == 0 && $user['shopbalance'] < $Points2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>10 Points</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Points2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>10 Points</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 10 Points!"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "10", "type" =>  "101"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Points2." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "10 Points", "packageprice" =>  $Points2]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '10 Points', '".date('l\, F jS\, Y ')."', '".$Points2."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Points2)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>10 Points</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Points2." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 10 WHERE type = '101' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '10 Points', '".date('l\, F jS\, Y ')."', '".$Points2."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "10 Points", "packageprice" =>  $Points2]);
}
break;

case '3':
if ($user['online'] == 1 && $user['shopbalance'] < $Points3 || $user['online'] == 0 && $user['shopbalance'] < $Points3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>15 Points</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Points3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>15 Points</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 15 Points!"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "15", "type" =>  "101"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Points3." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "15 Points", "packageprice" =>  $Points3]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '15 Points', '".date('l\, F jS\, Y ')."', '".$Points3."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Points3)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>15 Points</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Points3." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 15 WHERE type = '101' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '15 Points', '".date('l\, F jS\, Y ')."', '".$Points3."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "15 Points", "packageprice" =>  $Points3]);
}
break;

case '4':
if ($user['online'] == 1 && $user['shopbalance'] < $Points4 || $user['online'] == 0 && $user['shopbalance'] < $Points4)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Declined", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>35 Points</b><br> has been un-successful due to insufficient funds!</p> <p>Top-up at <b>{url}/store/topup</b></p>", html: true, type: "error", confirmButtonText: "Exit!"}); });
</script>';
}
else if ($user['online'] == 1 && $user['shopbalance'] >= $Points4)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>35 Points</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
sendMUS("alertuser", ["user_id" => "".$user['id']."", "message" => "You have successfully Purchased 35 Points!"]);
sendMUS("givepoints", ["user_id" => "".$user['id']."", "points" =>  "35", "type" =>  "101"]);
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Points4." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "35 Points", "packageprice" =>  $Points4]);
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '35 Points', '".date('l\, F jS\, Y ')."', '".$Points4."', '".$_SESSION['user']['id']."')");
}
else if ($user['online'] == 0 && $user['shopbalance'] >= $Points4)
{
echo'<script>
  $(window).load(function(){
    swal({title: "<br>Transaction Approved", text: "<p>Hey <b>'.$_SESSION['user']['username'].'</b>!</p> <p>This is just to let you know that your shop purchase of <br><b>35 Points</b><br> has been successful and has been added to your account!</p> <p>Thank you for your part in keeping the hotel alive.</p>", html: true, type: "success", confirmButtonText: "Exit!"}); });
</script>';
mysql_query("UPDATE users SET shopbalance = shopbalance - ".$Points4." WHERE id = '".$_SESSION['user']['id']."' LIMIT 1");
mysql_query("UPDATE users_currency SET amount = amount + 35 WHERE type = '101' AND user_id = '".$user['id']."' LIMIT 1");
mysql_query("INSERT INTO `shop_payments`(username,item,time,amount,userid) VALUES ('".$_SESSION['user']['username']."', '35 Points', '".date('l\, F jS\, Y ')."', '".$Points4."', '".$_SESSION['user']['id']."')");
sendMUS("store", ["user_id" => "".$user['id']."", "packagename" =>  "35 Points", "packageprice" =>  $Points4]);
}
break;

}
echo'<meta http-equiv="refresh" content="5;url={url}/store/currency"/>';
}
?>