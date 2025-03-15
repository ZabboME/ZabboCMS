<?php
function VPNCheck(){
	global $engine, $core;
	
	$url = $_GET['url'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$ipRecord = mysql_query("SELECT allowed FROM `vpn_ip_addresses` WHERE ip = '" . $ip . "'");

	if(mysql_num_rows($ipRecord) == 1){
		$status = mysql_fetch_assoc($ipRecord)['allowed'];
		
		if($status == 'true'){
			
		}else{
			if ($url != 'vpn') {
				header('Location: /vpn');
			}
		}
	}else{
		$key = '865579-3231bu-4j61dv-43u8p5';
		$postfield = "tag=" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		$jsonIn = file_get_contents('https://proxycheck.io/v2/'.$ip.'?key='.$key.'&vpn=1');
		$result = json_decode($jsonIn, true);

		if ($result[$ip]['proxy'] == 'yes') 
		{
			mysql_query("INSERT INTO `vpn_ip_addresses` (`ip`, `allowed`) VALUES ('$ip', 'false')");

			if ($url != 'vpn') {
				header('Location: /vpn');
			}
		} else {
			mysql_query("INSERT INTO `vpn_ip_addresses` (`ip`, `allowed`) VALUES ('$ip', 'true')");
		}
	}
}
?>