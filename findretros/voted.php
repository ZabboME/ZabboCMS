<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['redirect_url']))
{
    $_SESSION['voted'] = true;
    $hours = 1;
    $_SESSION['vote_expire'] = time()+($hours*60*60);
    $redir = $_SESSION['redirect_url'];
    unset($_SESSION['redirect_url']);
    header("Location: " . $redir . "");
    exit();
}
else
{
    header("Location: /index");
}