<?php
/**
* 
*/
class client extends controller
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
     

  $this->view->js  = array('editor/jquery-te-1.4.0.min.js','js/client.js');
    $this->view->css = array('editor/jquery-te-1.4.0.css');
	 $this->loadProfile();
  }

	public function autoload()
	{
    $this->view->data = $this->model->FindData();
     $this->view->controller = $this->loadcontroller;
     $this->checklink('client');
   $this->view->render('client/index',false,$semenu=4,$menu=7);
	}

 public function Addnew()
 {

  if (isset($_POST['names']) && isset($_POST['job-title']) && isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password']) && isset($_POST['image-name']) && isset($_POST['id']) && isset($_POST['re-password'])) {
    
  if ($_POST['password']==$_POST['re-password']) {
    $names       = $_POST['names'];
    $username    = $_POST['username'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $image       = $_POST['image-name'];
    $cover_image = 'none';
    $job_title   = $_POST['job-title'];
    $index       = $this->randomname(5);
  
    $this->model->addNew($names,$job_title,$username,$email,$password,$image,$cover_image,$index);
  }
  else
  {
$proced = new \stdClass();    
$proced->status  = "fail";
$proced->message = "Password are not the same, try again.";
$myJSON = json_encode($proced);
echo $myJSON;
  }
  }
  else
  {
$proced = new \stdClass();    
$proced->status  = "fail";
$proced->message = "Make sure all field are not empty";
$myJSON = json_encode($proced);
echo $myJSON;
  }

 }

 public function Delete()
 {
if (isset($_POST['id'])) {
     $id = $_POST['id'];
    $this->model->Delete($id);
}
 }

public function Find()
{
if (isset($_POST['id']))
{
  $id = $_POST['id'];
  $this->model->Find($id);
}
}
public function update()
{

 if (isset($_POST['names'])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['image-name'])&&isset($_POST['id']) && isset($_POST['re-password'])) 
{
 
 if ($_POST['password']==$_POST['re-password']) {
    $names       = $_POST['names'];
    $job_title   = $_POST['job-title'];
    $username    = $_POST['username'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $image       = $_POST['image-name'];
    $cover_image = 'none';
    $id          = $_POST['id'];
  
    $this->model->update($names,$job_title,$username,$email,$password,$image,$cover_image,$id);
  }
  else
  {
$proced = new \stdClass();    
$proced->status  = "fail";
$proced->message = "Password are not the same, try again.";
$myJSON = json_encode($proced);
echo $myJSON;
  }
  }
  else
  {
$proced = new \stdClass();    
$proced->status  = "fail";
$proced->message = "Make sure all field are not empty";
$myJSON = json_encode($proced);
echo $myJSON;
  }   



}
public function idStatus()
{
 if (isset($_POST['data'])) {
  $status = $_POST['data'];
  $this->model->idStatus($status); 
 }
}

public function FindAuthor()
{
  $this->view->author = $this->model->FindAuthor();
}


}

?>