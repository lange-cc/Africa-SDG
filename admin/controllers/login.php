<?php
/**
* 
*/
class login extends controller
{
	
	function __construct()
	{
		parent::__construct();
		 session:: init();
         session::destroy();
		$this->view->js  = array('js/login.js');
	}

	public function autoload()
	{
	  $this->view->controller = $this->loadcontroller;
      $this->view->render('login/index',true,0,0);
	}

   public function run()
	{
if (isset($_POST['email']) && isset($_POST['password'])) {
if ( !empty($_POST['email']) && !empty($_POST['password'])) 
	{
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $this->model->match($email,$pass);
     }
     else
     {
$proced = new \stdClass();
$proced->status  = "fail";
$proced->message = "Make sure Email or Password not empty";
$myJSON = json_encode($proced);
echo $myJSON;
     }
   }
   else
   {
$proced = new \stdClass();
$proced->status  = "fail";
$proced->message = "Make sure Email or Password not empty";
$myJSON = json_encode($proced);
echo $myJSON;
   }


}

public function create()
	{
	  $this->view->controller = $this->loadcontroller;
      $this->view->render('login/create',true,0,0);
	}

public function createAccount()
{
    if (isset($_POST['names']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])) {
if ( !empty($_POST['names']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['re-password'])) 
	{
      $name  = $_POST['names'];
      $email = $_POST['email'];
      $pass  = $_POST['password'];
      $rpass = $_POST['re-password'];
      $index = $this->randomname(10);
   
if ($pass == $rpass)
 {
	$this->model->Create($name,$email,$pass,$index);
 }
 else
 {
 	$proced = new \stdClass();
$proced->status  = "fail";
$proced->message = "Password fields does not match";
$myJSON = json_encode($proced);
echo $myJSON;
 }

      
     }
     else
     {
$proced = new \stdClass();
$proced->status  = "fail";
$proced->message = "Make sure Email or Password not empty";
$myJSON = json_encode($proced);
echo $myJSON;
     }	
}
	
}


public function remember()
{
   $this->view->controller = $this->loadcontroller;
   $this->view->render('login/remember',true,0,0);	
}

public function RememberAccount()
{
if (isset($_POST['email'])) {
if ( !empty($_POST['email'])) 
	{
      $email = $_POST['email'];
      $this->model->Verfy($email);
     }
     else
     {
$proced = new \stdClass();
$proced->status  = "fail";
$proced->message = "Make sure Email not empty";
$myJSON = json_encode($proced);
echo $myJSON;
     }
   }
   else
   {
$proced = new \stdClass();
$proced->status  = "fail";
$proced->message = "Make sure Email not empty";
$myJSON = json_encode($proced);
echo $myJSON;
   }
}

public function activation()
{
   $this->view->controller = $this->loadcontroller;
   $this->view->render('login/Activation',true,0,0);
}


}

?>