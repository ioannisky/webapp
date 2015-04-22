<?php
	/**
	 * Class used for registering resources (e.g DatabaseDrivers)
	 */

	class ResourceRegistry
	{
		static $rs;


		static function getResource($name)
		{
			//var_dump(static::$rs,$name);

			if(isset(static::$rs[$name]))
				return static::$rs[$name];

			return null;
		}


		static function addResource($name,$resource)
		{
			static::$rs[$name]=$resource;
		}

	}
?>
