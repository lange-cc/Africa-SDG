<?php
/**
*
*/
class language extends controller
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

$this->view->js  = array('editor/jquery-te-1.4.0.min.js','js/language.js');
$this->view->css = array('editor/jquery-te-1.4.0.css');
$this->loadProfile();
  }

	public function autoload()
	{
   $this->view->data = $this->model->Showlanguage();
   $this->view->controller = $this->loadcontroller;
   $this->checklink('language');
   $this->view->render('language/index',false,$semenu=2,$menu=7);
	}

 public function Addnew()
 {
  if (isset($_POST['name'])&&isset($_POST['abrev'])&&isset($_POST['type'])) {

    $name  = $_POST['name'];
    $abrev = $_POST['abrev'];
    $type  = $_POST['type'];
    $this->model->addnew($name,$abrev,$type);
  }
  else
  {
    //echo "id not set";
  }
 }

 public function Delete()
 {
if (isset($_POST['id'])) {
     $id = $_POST['id'];
    $this->model->Delete($id);
}
 }

 public function DeleteKeyword()
 {
   if (isset($_POST['id'])) 
   {
     $id = $_POST['id'];
     $this->model->DeleteKeyword($id);
   }
 }

public function findlanguage()
{
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $this->model->findlanguage($id);
}
}
public function update()
{
   if (isset($_POST['name'])&&isset($_POST['abrev'])&&isset($_POST['type'])&&isset($_POST['id'])) {

    $name  = $_POST['name'];
    $abrev = $_POST['abrev'];
    $type  = $_POST['type'];
    $id    = $_POST['id'];

    $this->model->update($name,$abrev,$type,$id);
  }
  else
  {
    //echo "id not set";
  }

}


public function addkeywords()
{
   $this->view->abrev  = $this->model->GetlanguageAbrev($this->idname);
   $this->view->langId = $this->idname;

   $defaultlangId = $this->model->GetId();

   $this->view->onEditLang    = $this->model->GetLanguage($this->idname);
   $this->view->ondefaultLang = $this->model->GetLanguage($defaultlangId);

   $this->view->controller = $this->loadcontroller;
   $this->view->render('language/keywords',false,$semenu=2,$menu=7);
}

public function Addnewkeyword()
{
 if (isset($_POST['keyword'])&&isset($_POST['key'])&&isset($_POST['abrev'])&&isset($_POST['langId'])) {

    $keyword  = $_POST['keyword'];
    $key      = $_POST['key'];
    $abrev    = $_POST['abrev'];
    $langId   = $_POST['langId'];
    $this->model->Addnewkeyword($keyword,$key,$abrev,$langId);
  }
  else
  {
    //echo "id not set";
  }
}

public function updatekeyword()
{
if (isset($_POST['keyword'])&&isset($_POST['key'])&&isset($_POST['id'])) {


    $keyword  = trim(preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', strip_tags($_POST['keyword'], '<br>')),"<br>");
    $key      = $_POST['key'];
    $id       = $_POST['id'];
    
    $this->model->updatekeyword($keyword,$key,$id);
   }

}

public function copy()
{
  if (isset($_POST['defid'])&&isset($_POST['edtid'])&&isset($_POST['abrev'])) 
  {

    $DefaultlangId = $_POST['defid'];
    $EditlangId    = $_POST['edtid'];
    $abrev         = $_POST['abrev'];

    $this->model->copy($DefaultlangId,$EditlangId,$abrev);
  }
}

public function select()
{

if (isset($_POST['abrev'])) 
{
$lang = $_POST['abrev'];
setcookie('dash-lang', $lang, time() + (86400 * 30), "/"); 
$proced = new \stdClass();
$proced->status  = "success";
$proced->message = "Done";
$myJSON = json_encode($proced);
echo $myJSON;
}  
else
{
$proced = new \stdClass();
$proced->status  = "fail";
$proced->message = "Language not selected";
$myJSON = json_encode($proced);
echo $myJSON;
}

}

public function Copylang()
{
  if (isset($_POST['lang'])) {
      $lang = $_POST['lang'];
      $this->model->CopyData($lang);
  }
  else
  {
     $proced = new \stdClass();
      $proced->status   = "fail";
      $proced->message  = "Error in copying language";
      $myJSON = json_encode($proced);
      echo $myJSON;
  }
}


}

?>
