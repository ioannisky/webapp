<?php
	/**
	 * Basic Utilities Class used for general purpose functions
	 */


	class Utilities
	{

		function getCharArray($uppercase=true,$lowecase=true,$number=true,$symobls=false,$exclude=false)
		{
			$uppercase_set=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			$lowercase_set=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
			$number_set=array('0','1','2','3','4','5','6','7','8','9');
			$symbol_set=array('\'','"','!','£','$','%','^','&','*','(',')','@','{','}','[',']',':',';','#','~','<','>',',','.','/','?','\\');

			$exclude_set=array('0','O','1','l','I');

			$set=array();
			if($uppercase)
				$set=array_merge($set,$uppercase_set);
			if($lowecase)
				$set=array_merge($set,$lowercase_set);
			if($number)
				$set=array_merge($set,$number_set);
			if($symobls)
				$set=array_merge($set,$symbol_set);

			$final_set=array();
			foreach($set as $val)
			{
				if(($exclude==true)&&(in_array($val,$exclude_set)))
					continue;

				$final_set[]=$val;
			}

			return $final_set;
		}


		function generateRandomNumber($length=16,$char_set=null,$num=1)
		{
			$return=array();

			//var_dump($char_set);

			if($char_set==null)
				$char_set=self::getCharArray();

			$max=count($char_set)-1;
		
			for($i=0;$i<$num;$i++)
			{
				$rn="";
			
				for($h=0;$h<$length;$h++)
				{
					$rn.=$char_set[rand(0,$max)];
				}

				$return[]=$rn;
			}

		
			if($num==1)
				return $return[0];
			else
				return $return;
		}



	}

?>
