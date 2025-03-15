<?php
if($_SESSION['user']['id']){
$getuserinfo = mysql_query("SELECT * FROM users WHERE id='".$_SESSION['user']['id']."'");
while($row = mysql_fetch_array($getuserinfo)){
$usernameban = $row['id'];
}
$getuserinfo= mysql_query("SELECT * FROM bans WHERE user_id='{$usernameban}' AND ban_expire > UNIX_TIMESTAMP() ORDER BY ban_expire DESC LIMIT 1");
$userlocked = mysql_query("SELECT * FROM users WHERE id = '{$_SESSION['user']['id']}' AND account_locked = '1' LIMIT 1")or die(mysql_error());
while($row = mysql_fetch_array($getuserinfo)){
$ban_expire = $row['ban_expire'];
 if($ban_expire <= time()){ 
 } 
 else{
header('Location: /banned');
exit;
 }
 }
while($row = mysql_fetch_array($userlocked)){
$locked = $row['account_locked'];
if($locked == 0) {
 } 
 else{
header('Location: /locked');
exit;
 }
 }
 }
?>
