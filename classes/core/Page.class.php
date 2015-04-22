<?php

	class Page
	{
		function __construct($path,$template)
		{
			$this->path=$path;
			$this->template=$template;
			$this->title="";
		}

		function getTitle()
		{
			return htmlentities($this->title);
		}

		function getBase()
		{
			return $this->template->getBase();
		}


		function renderPage($data=array())
		{
			extract($data);
			include $this->path;
		}

	}

?>
