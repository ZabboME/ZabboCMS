<?php

// Database config
$host = "127.0.0.1"; // Your database host, normally localhost
$user = "root"; // Database username
$password = "yourpass"; // Your database password
$database = "hotel"; // The name of the database on your server

mysql_connect($host, $user, $password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());

if(!isset($_GET["username"]) || empty($_GET["username"])) {
        echo "No username request";
        exit;
    }

	$fig =  mysql_query("SELECT look FROM users WHERE username = '".$_GET["username"]."' LIMIT 1");
	if (mysql_num_rows($fig) == 0) {
	echo 'This user does not exist!';
	exit;
	}

	$look = mysql_fetch_assoc($fig);
	$action = mysql_real_escape_string(strip_tags($_GET["action"]));
	$direction = mysql_real_escape_string(strip_tags($_GET["direction"]));
	$head_direction = mysql_real_escape_string(strip_tags($_GET["head_direction"]));
	$gesture = mysql_real_escape_string(strip_tags($_GET["gesture"]));
	$size = mysql_real_escape_string(strip_tags( $_GET["size"]));
	$headonly = mysql_real_escape_string(strip_tags( $_GET["headonly"]));
	$frame = mysql_real_escape_string(strip_tags( $_GET["frame"]));
	$effect = mysql_real_escape_string(strip_tags( $_GET["effect"]));
	$img_format = mysql_real_escape_string(strip_tags( $_GET["img_format"]));

	$ch = curl_init("https://www.habbo.com/habbo-imaging/avatarimage?figure=".$look['look']."&action=" . $action . "&direction=" . $direction . "&head_direction=" . $head_direction . "&gesture=" . $gesture . "&size=" . $size . "&headonly=" . $headonly . "&frame=" . $frame .  "&effect=" . $effect . "&img_format=" . $img_format . "");
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_SSL_VERIFYPEER => false
    ));

    $content = curl_exec($ch);
    $type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

    curl_close($ch);

    if(!isset($content) || empty($content) || strpos($content, 'Not Found') !== false) {
        echo "Not found!";
        exit;
    }

    header("Content-Type: {$type}");

    echo $content;
?>
