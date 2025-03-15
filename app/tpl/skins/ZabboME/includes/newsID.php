<?php
$id = mysql_real_escape_string($_GET['id']);
$news =  mysql_query("SELECT * FROM `cms_news` WHERE id = '{$id}'");
	if (mysql_num_rows($news) == 0) {
	echo 'This article does not exist!';
	exit;
	}
?>