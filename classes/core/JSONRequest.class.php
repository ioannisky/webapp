<?php
	/**
	 * Class that is used to parse JSON request
	 */

	class JSONRequest
	{
		
		function __construct($data=null)
		{
			if($data==null)
			{
				$data=file_get_contents("php://input");
			}

			$pdata=json_decode($data);
			
			foreach($pdata as $key=>$value)
			{
				$this->$key=$value;
			}
			
		}

	}

?>
