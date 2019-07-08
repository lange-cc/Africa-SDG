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
	}


	public static function get($key)
	{
		if(isset($_SESSION[$key]))
		{
			if(!empty($_SESSION[$key])){
				return $_SESSION[$key];
			} else {
				return false;
			}
	  } else {
		  return false;
	  }


	 
	}


	public static function check($key)
	{
		if(isset($_SESSION[$key]))
		{
			if(!empty($_SESSION[$key])){
				return true;
			} else {
				return false;
			}
	  } else {
		  return false;
	  }


	 
	}

	public static function unset($key)
	{
		if(isset($_SESSION[$key]))
		{
      unset($_SESSION[$key]);
		}

	}
	
	public static function destroy()
	{
		session_destroy();
	}
}

?>
