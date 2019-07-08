<?php

/**
* 
*/
class countryprofile extends controller
{
	
	
function __construct()
	{
		parent::__construct();
        session:: init();
        $loged = session::get('username');
        if ($loged == false) {
        	session::destroy();
        	header('location:'.LINK.'login');
        	exit;
        }

		$this->view->js = array('plugins/pdf-preview/pdf.worker.js','plugins/pdf-preview/pdf.js','js/countryprofile.js');
    $this->loadProfile();

	}

	public function autoload()
	{
	  
	  $this->view->controller = $this->loadcontroller;
	  $this->checklink('countryprofile');
    session::unset('activeyear');
    $this->view->year =  date('Y');
    $this->view->data =  $this->model->getreportData(date('Y'));
    $this->view->render('countryprofile/index',false,$semenu=3,$menu=3);
	}

  public function upload()
  {
    if (session::get('activeyear') != false) {
        $year = session::get('activeyear');
        $this->dataupload($DBsave=false,$randomName = false,'/../public/Report/'.$year.'/');
    }
    else
    {
        $this->dataupload($DBsave=false,$randomName = false,'/../public/Report/'.date('Y').'/');
    }
  }

public function profile()
{
    if (isset($this->idname)) {
       $year = $this->idname;
       $this->view->data =  $this->model->getreportData($year);
       $this->view->year =  $year;
       session::set('activeyear',$year);
       $this->view->render('countryprofile/index',false,$semenu=3,$menu=3);
    }
    else
    {
       $this->view->year =  date('Y');
       $this->view->data =  $this->model->getreportData(date('Y'));
       $this->view->render('countryprofile/index',false,$semenu=3,$menu=3); 
    }
}
  

}


