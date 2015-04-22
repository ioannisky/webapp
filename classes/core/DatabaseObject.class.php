<?php
/**
 * Abstract class used for fetching row of the database inside objects
 */


	abstract class DatabaseObject
	{

		protected static $_tablename="";
		protected static $_primarykey=array('id');
		protected $_values=array();
		protected $_new=true;
		protected $_saved=true;
        protected static $_autoincrement=true;
		protected static $_resource="";
		protected static $_db=null;

		function __construct()
		{
			$this->init();
		}

		function init()
		{
			$this->_values=array();
			$this->_new=true;
			$this->_saved=true;
		}

		function __set($name,$value)
		{
			$this->_values[$name]=$value;
			$this->_saved=false;
		}

		static function getDatabase()
		{
			if(static::$_db==null)
				static::$_db=ResourceRegistry::getResource("database/".static::$_resource);
			return static::$_db;
		}

		function setValues($vals)
		{
			$this->_values=$vals;
			$this->_saved=false;
		}
		
		function __get($name)
		{
			if(!array_key_exists($name,$this->_values))
				throw new Exception("Value not found ".$name);
			return $this->_values[$name];
		}

		function __isset($name)
		{
			return isset($this->_values[$name]);
		}
		
		function notNew()
		{
			$this->_new=false;
		}

		function saved()
		{
			$this->_saved=true;
		}

		function delete()
		{
			$db=self::getDatabase();
			$sql='DELETE FROM '.static::$_tablename.' WHERE id=?';
			$rs=$db->runQuery($sql,$this->id);
		}


		

		function save()
		{

			$db=self::getDatabase();

			if($this->_new===true)
			{
				$sql='INSERT INTO '.static::$_tablename;
				$cols="";
				$vals="";
				$params=array();
				foreach($this->_values as $key=>$value)
				{
					$cols.="`".$key."`, ";
					
					$vals.="?, ";
					$params[]=$value;
				}
				$cols=substr($cols,0,strlen($cols)-2);
				$vals=substr($vals,0,strlen($vals)-2);
				$sql.="(".$cols.")VALUES(".$vals.")";

				//var_dump($sql,$params);
				$rs=$db->runQuery($sql,$params);
				
				if(static::$_autoincrement===true)
				{
					$this->id=$db->lastInsertId();
				}
				
				$this->notNew();

			}else if(!$this->_saved)
			{
				$sql="UPDATE `".static::$_tablename."` SET ";
				$vals="";
				$params=array();
				foreach($this->_values as $key=>$value)
				{
					$vals.="`".$key."`=";

					$vals.="?, ";

					$params[]=$value;
				}
				$vals=substr($vals,0,strlen($vals)-2);
				$sql.=$vals." WHERE ";
				$where="";
				foreach(static::$_primarykey as $value)
				{
					$where.="`".$value."`=? AND ";
					$params[]=$this->_values[$value];
				}
				$where=substr($where,0,strlen($where)-5);
				$sql.=$where;

				//var_dump($sql,$params);
				$rs=$db->runQuery($sql,$params);
				
			}
		}

		function toJSON()
		{
			return $this->_values;
		}

		static function findWithJoin($tables=array(),$where="1=1",$values=array())
		{
			$db=self::getDatabase();

			$select="SELECT `".static::$_tablename."`.* FROM `".static::$_tablename."`, ";
			foreach($tables as $table)
			{
				$select.=$table.", ";
			}
			
			$select=substr($select,0,strlen($select)-2);

			if($where!="")
			{
				$select.=" WHERE ".$where;
			}

			$rs=$db->runQuery($select,$values);

			$rs->setClass(get_called_class());

			return $rs;

		}



		static function find($where="1=1",$values=array())
		{
			$db=self::getDatabase();
			
			$select="SELECT * FROM ".static::$_tablename;
			if($where!="")
			{
				$select.=" WHERE ".$where;
			}

			$rs=$db->runQuery($select,$values);

			$rs->setClass(get_called_class());

			return $rs;
		}

		static function count($where="1=1",$values=array())
		{
			return static::countWithJoin(array(),$where,$values);
		}

		static function countWithJoin($tables=array(),$where="1=1",$values=array())
		{
			$db=self::getDatabase();

			$select="SELECT count(*) FROM `".static::$_tablename."`, ";
			foreach($tables as $table)
			{
				$select.=$table.", ";
			}
			
			$select=substr($select,0,strlen($select)-2);

			if($where!="")
			{
				$select.=" WHERE ".$where;
			}

			$rs=$db->runQuery($select,$values);
			$row=$rs->fetchRow();
			//$rs->setClass(get_called_class());

			return $row['count(*)'];
		}

		static function load($where="1=1",$values=array())
		{
			$rs=static::find($where,$values);
			return $rs->next();
		}

	}

?>
