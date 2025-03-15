<?php
/* 

=====================================================
== ZabboCMS based from RevCMS Credits to Kryptos   ==
== Maintained by Justin							   ==
== Discord: justinretros						   ==
== Devbest: Rebel								   ==
== RageZone: Youngster	                           ==
== RetroTools.YXZ: Justin						   ==
== Credits to Revue & Justin for ZabboCMS theme    ==
=====================================================	

	 =======================================
	 == © 2015 ~ 2022 zabbo.me (Build v4) ==
	 =======================================
	 ====== PLEASE LEAVE ALL CREDITS =======  
	 =======================================

*/

class MUS {
function sendMUS($command, $data = '') {
            $MUSdata = $command . chr(1) . $data;
            $socket = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
            socket_connect($socket, '157.90.22.194', '2195');
            socket_send($socket, $MUSdata, strlen($MUSdata), MSG_DONTROUTE);
            socket_close($socket);
        }
	}
?>
