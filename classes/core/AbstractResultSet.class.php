<?php
	/**
	 * The abstract result set is what is used to return data from the database driver.
	 */

	abstract class AbstractResultSet
	{

		protected $rs;
		private $class_name=null;

		function __construct($rs,$class=null)
		{
			$this->rs=$rs;
			$this->class_name=$class;
		}

		function getArray()
		{
			$ret=array();
			while($obj=$this->next())
			{
				$ret[]=$obj;
			}

			return $ret;
		}


		function next()
		{
			$row=$this->fetchRow();
			if($row==null)
				return null;
			if($this->class_name==null)
				return $row;

			$c=$this->class_name;
			$obj=new $c();
			$obj->setValues($row);
			$obj->notNew();
			$obj->saved();
			return $obj;
		}

		function setClass($class)
		{
			$this->class_name=$class;
		}


		abstract function fetchRow();


	}

?>
