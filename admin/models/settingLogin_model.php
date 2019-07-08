<?php
/**
* 
*/
class settingLogin_model extends model
{
	
	function __construct()
	{
		parent::__construct();
  
        
	}

	public function match($name,$pass)
	{
    $login = $this->db->prepare("SELECT * FROM `mvc_setting_login` WHERE username =:name AND password = :pass");
    $login->execute(array(
    	':name' => $name,
    	':pass' => $pass
    	));
    if($login->rowCount() > 0) {
    	 session:: init();
    	 session::set('settingUsername',$name);
         session::set('settingPassword',$pass);
    	 header('location:../setting/');
    	
    }
    else
    {
    	 echo"<script type='text/javascript'>alert ('username or password is wrong ,try again !!'); window.location='../settingLogin/'</script>";
    }

		
	}


}	

?>