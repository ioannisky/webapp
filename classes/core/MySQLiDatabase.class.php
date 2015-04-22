<?php
/**
* MySQLi database driver. Missing the ability to use separate table for auto increment.
*/

	class MySQLiDatabase extends AbstractDatabase
	{

		private $rs;

		public function __construct($config)
		{
			$this->config=$config;

			$host=$config['host'];
			$port=$config['port'];
			$username=$config['username'];
			$password=$config['password'];
			$database=$config['database'];

			if($port=="")
				$port='3306';

			/*
			if($port!="")
				$host=$host.":".$port;
			*/

/*
			$this->rs=mysql_connect($host,$username,$password);
			mysql_set_charset("utf8",$this->rs);			
			mysql_select_db($database,$this->rs);
*/

			$this->rs=mysqli_connect($host,$username,$password,'',$port);
			mysqli_set_charset($this->rs,"utf8");			
			mysqli_select_db($this->rs,$database);


		}

		public function lastInsertId()
		{
			return mysqli_insert_id($this->rs);

		}

		public function runQuery($sql,$array=array())
		{
			$statement=$this->formQuery($sql,$array);
			//$rs=mysql_query($statement,$this->rs);
			$rs=mysqli_query($this->rs,$statement);
			if($rs==null)
			{
				var_dump($statement);
				print mysql_error();
				die();
			}

			return new MySQLiResultSet($rs);
		}


		public function runInsert($sql,$array=array())
		{
			$statement=$this->formQuery($sql,$array);
			//$rs=mysql_query($statment,$this->rs);
			$rs=mysqli_query($this->rs,$statement);
			if($rs==null)
			{
				var_dump($statement);
				print mysql_error();
				die();
			}


			return $rs;
		}

		
		public function runUpdate($sql,$array=array())
		{
			$statment=$this->formQuery($sql,$array);
			$rs=mysqli_query($this->rs,$statment);

			return $rs;
		}

		public function formQuery($where,$array=array())
		{
			//global $logger;
			if(substr_count($where,"?")!=count($array))
			{
				//Logger::log(Logger::ERROR,"Number of ? in ".$where." are not equal to ".print_r($values,TRUE));
				//Error::fatalError();
			}

			$sqll=explode("?",$where);

			$sql="";

			for($i=0;$i<count($array);$i++)
			{
				$sql.=$sqll[$i].$this->escapeValue($array[$i]);
			}

			$sql.=$sqll[$i];			

			return $sql;
		}


		function escapeValue($var)
		{
			if($var===null)
			{
				return "NULL";
			}else if(is_array($var))
			{
				$ret="(";
				foreach($var as $val)
				{
					$ret.=$this->escapeValue($val).",";
				}
				$ret=substr($ret,0,strlen($ret)-1).")";

				return $ret;
			}else
			{
				//return "'".mysql_real_escape_string($var,$this->rs)."'";
				return "'".mysqli_real_escape_string($this->rs,$var)."'";
			}
		}

	}
?>
