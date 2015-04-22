<?php
	/**
	 * Class used for breaking friendly urls down to array for better handling
	 */


	class PathInfo
	{
		private $path=array();
		private $pathPointer=0;		

		function __construct($pi=null)
		{
			$pathI="/";
			if($pi!=null)
				$pathI=$pi;
			else
				if(isset($_SERVER["PATH_INFO"]))
					$pathI=$_SERVER["PATH_INFO"];
				else if(isset($_SERVER["ORIG_PATH_INFO"]))
					$pathI=$_SERVER["ORIG_PATH_INFO"];

			$path=self::normalize($pathI);
			$this->path=explode("/",$path);
		}

		function getPathInfo($ip=false)
		{
			$ret=null;
			$index=$this->pathPointer;
			if(is_integer($ip))
				$index=$ip;


			if(isset($this->path[$index]))
				$ret=$this->path[$index];

			if(is_bool($ip)&&($ip==true))
				$this->increasePointer();			

			return $ret;
		}

		function getPath($ip=false)
		{
			return $this->getPathInfo($ip);
		}

		function increasePointer()
		{
			$this->pathPointer++;
		}

		function moveNext()
		{
			$this->increasePointer();
		}
		
		function setPointer($int)
		{
			$this->pathPointer=$int;
		}

		static function normalize($string)
		{
			if($string[0]=="/")
				$string=substr($string,1);

			if($string[strlen($string)-1]=="/")
				$string=substr($string,0,strlen($string)-1);

			return $string;
		}

		function setPath($index,$value)
		{
			$this->path[$index]=$value;
		}

		function __toString()
		{
			return implode("/",$this->path);
		}



	}

?>
