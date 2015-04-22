<?php
	/**
	 * Entry point of the web-app
	 */

	// Get Start time of the script
	$start_time=microtime(true);

	require_once dirname(__FILE__)."/setup.php";
	require_once dirname(__FILE__)."/classes/core/functions.php";
	
	$type="app";	
	
	require_once dirname(__FILE__)."/applications/".$active_app."/init.php";

	// Get end time of the script
	$end_time=microtime(true);

	// Print the time it took to execute
	print "<!-- ".($end_time-$start_time)." -->";

?>
