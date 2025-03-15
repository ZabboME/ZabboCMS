<?php
/*
 ________  ________  ________  ________  ________     
|\_____  \|\   __  \|\   __  \|\   __  \|\   __  \    
 \|___/  /\ \  \|\  \ \  \|\ /\ \  \|\ /\ \  \|\  \   
	 /  / /\ \   __  \ \   __  \ \   __  \ \  \\\  \  
	/  /_/__\ \  \ \  \ \  \|\  \ \  \|\  \ \  \\\  \ 
   |\________\ \__\ \__\ \_______\ \_______\ \_______\
	\|_______|\|__|\|__|\|_______|\|_______|\|_______|
																																	  
			 ________  _____ ______   ________                    
			|\   ____\|\   _ \  _   \|\   ____\                   
			\ \  \___|\ \  \\\__\ \  \ \  \___|_                  
			 \ \  \    \ \  \\|__| \  \ \_____  \                 
			  \ \  \____\ \  \    \ \  \|____|\  \                
			   \ \_______\ \__\    \ \__\____\_\  \               
				\|_______|\|__|     \|__|\_________\              
										\|_________|  
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

namespace Revolution;
if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
class engine
{
	private $initiated;
	private $connected;
	
	private $connection;
	
	
	final public function Initiate()
	{
		global $_CONFIG;
		if(!$this->initiated)
		{
			$this->setMySQL('connect', mysql_connect);
			$this->setMySQL('pconnect', mysql_pconnect);
			$this->setMysql('select_db', mysql_select_db);
			$this->setMySQL('query', mysql_query);
			$this->setMySQL('num_rows', mysql_num_rows);
			$this->setMySQL('fetch_assoc', mysql_fetch_assoc);
			$this->setMySQL('fetch_array',mysql_fetch_array);
			$this->setMySQL('result', mysql_result);
			$this->setMySQL('free_result', mysql_free_result);
			$this->setMySQL('escape_string', mysql_real_escape_string);
			
			$this->initiated = true;
		
			$this->connect($_CONFIG['mysql']['connection_type']);
		}
	}
	
	final public function setMySQL($key, $value)
	{
		$this->mysql[$key] = $value;
	}
	
	
	/*-------------------------------Manage Connection-------------------------------------*/
	
	final public function connect($type)
	{
		global $core, $_CONFIG;
		if(!$this->connected)
		{
			$host = $_CONFIG['mysql']['hostname'];
			if (!empty($_CONFIG['mysql']['port'])) {
				$host .= ':' . $_CONFIG['mysql']['port'];
			}
			
			$this->connection = $this->mysql[$type](
				$host, 
				$_CONFIG['mysql']['username'], 
				$_CONFIG['mysql']['password']
			);
			
			if($this->connection)
			{
				$mydatabase = $this->mysql['select_db']($_CONFIG['mysql']['database'], $this->connection);
				
				if($mydatabase)
				{
					$this->connected = true;    
				}
				else
				{
					$core->systemError('MySQL Engine', 'MySQL could not connect to database');
				}
			}
			else
			{
				$core->systemError('MySQL Engine', 'MySQL could not connect to host');            
			}
		}
	}
	
	final public function disconnect()
	{
		global $core;
		if($this->connected)
		{
			if($this->mysql['close'])
			{
				$this->connected = false;
			}
			else
			{
				$core->systemError('MySQL Engine', 'MySQL could not disconnect.');
			}
		}
	}
	
	/*-------------------------------Secure MySQL variables-------------------------------------*/
	
	final public function secure($var)
	{
		return $this->mysql['escape_string'](stripslashes(htmlspecialchars($var)));
	}
	
	/*-------------------------------Manage MySQL queries-------------------------------------*/
	
	final public function query($sql)
	{
		return $this->mysql['query']($sql, $this->connection) or die(mysql_error());
	}
	
	final public function num_rows($sql)
	{
		return $this->mysql['num_rows']($this->mysql['query']($sql, $this->connection));
	}
	
	final public function result($sql)
	{
		return $this->mysql['result']($this->mysql['query']($sql, $this->connection), 0);
	}
	
	final public function free_result($sql)
	{
		return $this->mysql['free_result']($sql);
	}
	
	final public function fetch_array($sql)
	{
		$query = $this->mysql['query']($sql, $this->connection);
		
		$data = array();
		
		while($row = $this->mysql['fetch_array']($query))
		{
			$data[] = $row;
		}
		
		return $data;
	}
	
	final public function fetch_assoc($sql)
	{
		return $this->mysql['fetch_assoc']($this->mysql['query']($sql, $this->connection));
	}
}
?>