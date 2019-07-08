<?php
/**
* 
*/
class model
{
	
	function __construct()
	{
	   $this->db      = new database();	
	   $this->control = new controller();
	   $this->email = new email();
	}




}

?>