<?php

	require_once dirname(__FILE__)."/classes/core/AutoLoader.class.php";
	require_once dirname(__FILE__)."/classes/core/LibraryRegistry.class.php";

	function __autoload($class_name)
	{
		AutoLoader::getAutoLoader()->loadClass($class_name);
	}

	$al=new AutoLoader();

	require_once dirname(__FILE__)."/config.php";



?>
