<?php
/**
* 
*/
class wellcome extends controller
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


$this->loadProfile();
  }

  	public function autoload()
	{
    $this->view->controller = $this->loadcontroller;

$page = $this->checkpermission();
if ($page == 0) {
   $this->view->render('login/activation',true,$semenu=0,$menu=0);
  exit;
  }
  
 $this->view->render('wellcome/index',false,$semenu=0,$menu=0);

	}

 }