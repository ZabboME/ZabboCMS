<?php

namespace Revolution;
if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
interface iHTML
{

	public function get($file);
	
	public function getHK($file);

	public function setHTML();

}
?>