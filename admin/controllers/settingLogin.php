<?php
/**
* 
*/
class settingLogin extends controller
{
	
	function __construct()
	{
	parent::__construct();
        session:: init();
        $loged = session::get('username');
        if ($loged == false) {
        	session::destroy();
        	header('location: ../login');
        	exit;
        }
        else
        {
          session::unset('settingUsername');
        }
  $this->view->js  = array('editor/jquery-te-1.4.0.min.js','js/inbox.js');
    $this->view->css = array('editor/jquery-te-1.4.0.css');
	 $this->loadProfile();
		
	}

	public function autoload()
	{
	
    $this->view->controller = $this->loadcontroller;
    $this->checklink('settingLogin');
    $this->view->render('settingLogin/index',false,$semenu=1,$menu=7);
	}

  public function login()
	{
	if (isset($_POST['username']) && isset($_POST['password'])) {
   $name = $_POST['username'];
   $pass = $_POST['password'];
   $this->model->match($name,$pass);
   }
   else
   {
      header('location: ../login');
   }


}
	
}

?>