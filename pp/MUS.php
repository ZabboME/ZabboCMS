<?php
class MUS {
function sendMUS($command, $data = '') {
            $MUSdata = $command . chr(1) . $data;
            $socket = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
            socket_connect($socket, '127.0.0.1', '3001');
            socket_send($socket, $MUSdata, strlen($MUSdata), MSG_DONTROUTE);
            socket_close($socket);
        }
	}
?>
