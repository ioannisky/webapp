<?php
/**
 * Set of functions that need to be directly declared because they are used in tamplates
 */

	/**
	 * Escape text to html entities. Usefull for avoiding XSS from user input.
	 */
	function __($value)
	{
		return htmlentities($value,ENT_COMPAT | ENT_HTML401,"utf-8");
	}

?>
