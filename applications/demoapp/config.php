<?php

	$config=array();

	$config['database']=array();

	$db=array();
	$db['name']="demoapp";
	$db['type']="MySQLiDatabase";
	$db['host']="localhost";
	$db['port']="3306";
	$db['username']="demoapp";
	$db['password']="demoapp";
	$db['database']="demoapp";

	$config['databases'][]=$db;

	$config['base']="localhost/demoapp/";
	if(isset($_SERVER['HTTPS']))
	{
		$config['base']="https://".$config['base'];
	}else
	{
		$config['base']="http://".$config['base'];
	}


	$config['pepper']="m4E'kM7uMnZEr`Zj";


?>
