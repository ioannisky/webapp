<?php
/** 
 * Autoloader class
 * Used to dynamically load PHP classes
 */

	class AutoLoader
	{

		public static $autoLoader;
		var $paths=array();

		function __construct()
		{
			$this->paths=array();
			self::$autoLoader=$this;
		}

		function addPath($name,$path)
		{
			if($path[strlen($path)-1]!="/")
				$path.="/";

			$this->paths[$name]=$path;
		}

		function loadClass($name)
		{
			$cn=$name.".class.php";
			
			foreach($this->paths as $path)
			{
				
				$fp=$path.$cn;
				if(file_exists($fp))
				{
					include_once $fp;
					break;
				}
			}

		}

		static function &getAutoLoader()
		{
			return self::$autoLoader;
		}

		static function addPathS($name,$path)
		{
			self::$autoLoader->addPath($name,$path);
		}
	}



?>
