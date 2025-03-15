<?php
function sendMUSTest($key, $data = []) {
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

if(mysql_num_rows($info) != 1){
    die("Please login.");
}
 
$uInfo = mysql_fetch_array($info);
 

$check = mysql_query("SELECT * FROM `cms_present_logs` WHERE username = '".$user."' AND reward_check = '0' ORDER BY id DESC LIMIT 1");

$last = mysql_fetch_array($check);

$last_present = time() - $last['timestamp'];
 
if ($last_present < 86400){
   	    	echo "<div id='refreshreminder'>";

    	sendMUSTest("alertuser", ["user_id" => "".$u['id']."", "message" => "Hey ".$username.", this is a reminder your daily reward has been given to you already! Please wait until tomorrow to get another one when you're online! <3"]);
		mysql_query("UPDATE cms_present_logs SET reward_check = '1' WHERE username = '" . $_SESSION['user']['id'] . "'")or die(mysql_error());
	    	echo "<div>";

}  

}  
}  
?>