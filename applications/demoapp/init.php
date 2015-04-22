<?php

	require_once dirname(__FILE__)."/config.php";
	require_once dirname(__FILE__)."/DemoApp.class.php";

	LibraryRegistry::registerLibray("demoapp",dirname(__FILE__)."/classes/");
	LibraryRegistry::requireLibrary("demoapp");

	$demo=new DemoApp($config);

	$demo->start();
?>
