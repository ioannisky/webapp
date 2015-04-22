<?php
	/**
	 * Class used for sending JSON data back to the client
	 */ 

	class JSONResponse
	{

		function __construct($func)
		{
			$this->func=$func;
			$this->data=null;
			$this->message="";
			$this->error=false;
		}

		function setMessage($message,$error=false)
		{
			$this->message=$message;
			$this->error=$error;
		}


		function toJSON($return=false)
		{
			global $start_time;
			$data=json_encode($this);
			if($return==false)
			{
				header("Content-Type: application/json; charset=UTF-8");
				print $data;
				$end_time=microtime(true);
				header("X-Response: ".($end_time-$start_time));
				exit(0);
			}else
				return $data;

		}


	}

?>
