<?php
/**
* Set of functions that should be implemented by all database drivers
*/

	abstract class AbstractDatabase
	{


		abstract public function runQuery($sql,$array=array());
		abstract public function runInsert($sql,$array=array());
		abstract public function runUpdate($sql,$array=array());		

	}
?>
