<?php
if ($array == null)
{
$getMax = mysql_fetch_array(mysql_query("SELECT MAX(id) FROM cms_news LIMIT 1"));
header("Location: /news/". $getMax['MAX(id)'] ."");
exit();
}
?>