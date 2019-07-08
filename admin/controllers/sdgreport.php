<?php

/**
* 
*/
class sdgreport extends controller
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
        $this->view->js  = array('js/sdgreport.js','editor/jquery-te-1.4.0.min.js','js/section.js');
		$this->view->css = array('editor/jquery-te-1.4.0.css');
        $this->loadProfile();

	}

	public function autoload()
	{
	  
	  $this->view->controller = $this->loadcontroller;
	  $this->checklink('sdgreport');
      $this->view->data =  $this->model->getreportData();
      $this->view->render('sdgreport/index',false,$semenu=4,$menu=3);
	}

  public function upload()
  {
     $this->dataupload($DBsave=false,$randomName = false,'/../public/Report/');
  }

  public function Addnew()
  {
     $title   = $_POST['title'];
     $file    = $_POST['file'];
     $content = $_POST['content'];
     $year    = $_POST['year'];
     $section = $_POST['rep-section'];
     $index   = $this->randomname(8);
     

     $this->model->AddnewData($title,$file,$content,$year,$index,$section,LANG);

  }

public function getreport()
{
    $id    = $_POST['id'];
    $this->model->getUniqueReportData($id); 
}
  public function update()
  {
     $title    = $_POST['title'];
     $file     = $_POST['file'];
     $id       = $_POST['id'];
     $content  = $_POST['content'];
     $section  = $_POST['rep-section'];
     $year     = $_POST['year'];
     $this->model->updateData($title,$file,$id,$content,$section,$year);
  }

public function Delete()
{
    $id    = $_POST['id'];
    $this->model->deleteReport($id); 
}
public function copy()
{
  if (isset($_POST['data'])) 
   {
	$lang = $_POST['data'];
	$this->model->copyData($lang);
   }
  else
   {
	echo "error";
   }
}

public function AddFiles()
{
  $this->dataupload($DBsave=false,$randomName = false,'/../public/File/');
}
  
public function SaveFile()
{
   if (isset($_POST['title']) && isset($_POST['file']) && isset($_POST['report-id'])) {
       $title = $_POST['title'];
       $file  = $_POST['file'];
       $id    = $_POST['report-id'];
     $this->model->AddFileToReport($title,$file,$id);
   }
   else
   {
    // do something
   }
}

public function Getfiles()
{
  $id = $_POST['id'];
  echo $this->model->GetfilesData($id);
}

public function FileDelete()
{
  $id = $_POST['id'];
  $this->model->DeleteFileData($id);
}


}


