<?php
require_once('config.php');

$url = 'https://findretros.com/servers/ZabboME/vote?minimal=1&return=1';

if(isset($_GET['url']))
{
    if(!isset($_SESSION))
    {
        session_start();
    }
    $_SESSION['redirect_url'] = urldecode($_GET['url']);
    if($config_on == true)
    {
        header('Location: '.$url);
    }
    else
    {
        header('Location: /findretros/voted.php');
        exit();
    }
}else{
    header('Location: '.$url);
}