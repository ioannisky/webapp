<?php
	
	class Template
	{

		function __construct($template_name)
		{
			$this->template_name=$template_name;
			$this->base_template="templates/".$template_name;
			$this->template_path=dirname(__FILE__)."/../../".$this->base_template;
		}

		function setBase($base)
		{
			$this->base=$base;
		}

		function getBase()
		{
			return $this->base;
		}

		function getPage($name)
		{
			$page_path=$this->template_path."/".$name;
			//var_dump($page_path);
			if(file_exists($page_path))
			{
				return new Page($page_path,$this);
			}else
			{
				throw new Exception("Invalid Page ".$name);
			}
		}

	}
?>
