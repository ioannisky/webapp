<?php
	/**
	 * Class Used for registering PHP libraries
	*/

	class LibraryRegistry
	{
		static private $libs=array();

		static function registerLibray($name,$path)
		{
			if(isset(self::$libs[$name]))
				throw new Exception("Name already registed");
			else
				self::$libs[$name]=$path;
		}

		static function requireLibrary($name)
		{
			if(!isset(self::$libs[$name]))
				throw new Exception("Unknown Library");
			else
				AutoLoader::addPathS($name,self::$libs[$name]);
		}

	}

?>
