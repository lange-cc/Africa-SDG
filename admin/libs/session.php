<?php
/**
* 
*/
class session
{
	public static function init()
	{
		session_start();
		return true;
	}
	public function set($key,$value)
	{
       $_SESSION[$key] = $value;
       return true;
	}

	public function unset($key)
	{
      unset($_SESSION[$key]);
      return true;
	}

	public function get($key)
	{
		if (isset($_SESSION[$key])) {
			if (!empty($_SESSION[$key])) {
				return $_SESSION[$key];
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
	
	public function destroy()
	{
		session_destroy();
		return true;
	}
}

?>