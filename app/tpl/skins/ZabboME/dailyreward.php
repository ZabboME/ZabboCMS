<?php

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

$user = $_SESSION['user']['id'];


$username = $_SESSION['user']['username'];

 $info = mysql_query("SELECT id, online FROM users WHERE id = '".$user."'");
 
 $user1 = mysql_query("SELECT * FROM `users` WHERE id='".$_SESSION['user']['id']."'");
 while ($u = mysql_fetch_array($user1)){
  if ($u['id'] > 0 || $u['id'] != null){
   if(date("Y-m-d") == date("Y-m-d", $u['account_created'])){
	 
   }

   else
   {
if(mysql_num_rows($info) != 1){
    die("Please login.");
}
 
$uInfo = mysql_fetch_array($info);
 
$check = mysql_query("SELECT * FROM `cms_present_logs` WHERE username = '".$user."' ORDER BY id DESC LIMIT 1");

$last = mysql_fetch_array($check);



 
$last_present = time() - $last['timestamp'];
 
if ($last_present < 86400){
   

}  
	 else {
	
	if($uInfo['online'] == 1){
	echo "<div id='refreshreward'>";
 
	$query = mysql_query("SELECT * FROM `cms_presents_prizes` ORDER BY RAND() LIMIT 1");
	$prize = mysql_fetch_array($query);
	 
	$furni_name = $prize['name'];
	$item_id = $prize['furni_id'];
	$furni_id = $prize['id'];
	$img = $prize['image'];
	 
	mysql_query("UPDATE `cms_presents_prizes` SET amount = amount+1 WHERE id =".$furni_id) or die(mysql_error());
	 
	mysql_query("INSERT INTO `cms_present_logs` (username,prize,timestamp) VALUES ('".$user."', '".$furni_name."', '".time()."')") or die(mysql_error());
	 
	sendMUS("sendgift", ["user_id" => "".$u['id']."", "itemid" =>  "".$item_id."", "message" =>  "This present was sent by our automatic daily reward system. Coded by: Justin"]);

	sendMUS("alertuser", ["user_id" => "".$u['id']."", "message" => "Hey ".$username.", you've received your daily reward, please check your inventory for a present to open!"]);
	mysql_query("UPDATE users SET reward_check = '0' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());

	echo "</div>";
}

 }
 }
 }
 }
?>
<?php
$user = $_SESSION['user']['id'];


$username = $_SESSION['user']['username'];

$info = mysql_query("SELECT id, online FROM users WHERE id = '".$user."'");
 
 $user1 = mysql_query("SELECT * FROM `users` WHERE id='".$_SESSION['user']['id']."' AND newbie_check='0'");
 while ($u = mysql_fetch_array($user1)){
  if ($u['id'] > 0 || $u['id'] != null){
   if(date("Y-m-d") == date("Y-m-d", $u['account_created'])){
	    	echo "<div id='refreshreward'>";

	    sendMUS("alertuser", ["user_id" => "".$u['id']."", "message" => "Hey  ".$username.", you need to be a member for at least one day to receive daily rewards!"]);
		mysql_query("UPDATE users SET newbie_check = '1' WHERE id = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());

   	echo "<div>";

   }


 }  
 }

?>
