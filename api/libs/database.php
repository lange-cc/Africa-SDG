<?php
/**
*
*/

 
class Database extends DbBoot
{

	function __construct()
	{
    parent::__construct();
		return $this->conn();
	}

}



?>
