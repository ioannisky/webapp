<?php

	/**
	 * DemoApp implementation
	 */

	class DemoApp
	{
		function __construct($config)
		{
			$this->loadDB($config['databases']);
			$this->config=$config;
			$this->pi=new PathInfo();
			$this->template=new Template("demoapp");
			$this->template->setBase($this->config['base']);
			
		}

		/**
		 * This one should belong to an abstract Application class but unfortunately
		 * I dont have one yet.
		 */ 
		function loadDB($config)
		{
			foreach($config as $c)
			{
				$type=$c['type'];
				$name=$c['name'];
				$db=new $type($c);
				ResourceRegistry::addResource("database/".$name,$db);
			}

		}

		function start()
		{
			$path=$this->pi->getPathInfo();

			if( ($path=="") || ($path=="index"))
			{
				$sl=ShoppingList::getLatestShoppingList();
				if($sl==null)
					throw new Exception("Shopping List not found");
				$page_params=array("shopping_list"=>$sl);
				$page=$this->template->getPage("basic_index.php");
				$page->renderPage($page_params);
			}

		}

	}

?>
