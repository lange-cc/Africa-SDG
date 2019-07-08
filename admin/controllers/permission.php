<?php
/**
* 
*/
class permission extends controller
{
	
	
	function __construct()
	{
		parent::__construct();
        session:: init();
        $loged = session::get('username');
        if ($loged == false) {
        	session::destroy();
        	header('location: login');
        	exit;
        }
     

  $this->view->js  = array('editor/jquery-te-1.4.0.min.js','js/permission.js');
  $this->view->css = array('editor/jquery-te-1.4.0.css');
	$this->loadProfile();




  }

	public function autoload()
	{
   $this->view->data = $this->model->AllAccount();
   $this->view->controller = $this->loadcontroller;
   $this->checklink('permission');
   $this->view->render('permission/index',false,$semenu=3,$menu=7);
	}

  public function user()
  {
if (isset($this->idname))
{
   $email = $this->idname;
   $this->model->SavePermission($email);
   $this->view->data = $this->model->getAccount($email);
   $this->view->controller = $this->loadcontroller;
   $this->checklink('permission');
   $this->view->render('permission/user',false,$semenu=3,$menu=7);
 }
 else
 {
   $this->autoload();
 }
  }

  public function switch()
  {
    if (isset($_POST['data'])) 
    {
        $data   = $_POST['data'];
        $this->model->Switch($data);
      }
  }

 
}

?>