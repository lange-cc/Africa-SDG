<?php
/**
*
*/
class session
{
	public static function init()
	{
		session_start();
	}
	public static function set($key,$value)
	{
       $_SESSION[$key] = $value;
       return true;
	}


	public static function getdata($key)
	{
		if(isset($_SESSION[$key]))
		{
		  if (!empty($_SESSION[$key])) 
		 {
		     return true;
		 }
		 else
		 {
		 	return false;
		 }
		
	    }
	    else
	    {
	    	return false;
	    }
	 
	}


	public static function get($key)
	{
		if(isset($_SESSION[$key]))
		{
		  if (!empty($_SESSION[$key])) 
		 {
				return $_SESSION[$key];
		 }
		 else
		 {
		 	return "";
		 }
		
	    }
	    else
	    {
	    	return "";
	    }
	 
	}

	public static function unset($key)
	{
		
		if(isset($_SESSION[$key]))
		{
		  if (!empty($_SESSION[$key])) 
		 {
            unset($_SESSION[$key]);
            return true;
		}
		 else
		 {
		 	return false;
		 }
		
	    }
	    else
	    {
	    	return false;
	    }

	}
	
	public static function destroy()
	{
		session_destroy();
		return true;
	}
}

?>
