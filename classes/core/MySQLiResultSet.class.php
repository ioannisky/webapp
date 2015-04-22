<?php
/**
 * Implement result set for MySQLi Driver
 */
	class MySQLiResultSet extends AbstractResultSet
	{

		function fetchRow()
		{
			return mysqli_fetch_assoc($this->rs);
		}

	}
?>
