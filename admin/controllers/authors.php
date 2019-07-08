<?php
/**
* 
*/
class authors extends controller
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
  $this->view->js  = array('editor/jquery-te-1.4.0.min.js','js/authors.js');
    $this->view->css = array('editor/jquery-te-1.4.0.css');
	 $this->loadProfile();
  }

	public function autoload()
	{
     $this->view->data = $this->model->FindData();
     $this->view->controller = $this->loadcontroller;
     $this->checklink('authors');
     $this->view->render('authors/index',false,$semenu=6,$menu=7);
	}

 public function Addnew()
 {

$tz = 'UTC';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
// $dt->format('F j-Y');
$date =$dt->format('Y-m-d');

  if (isset($_POST['name'])&&isset($_POST['image-name'])&&isset($_POST['content'])) {
    $name        = $_POST['name'];
    $img_name    = $_POST['image-name'];
    $content     = $_POST['content'];
    $added_date  = $date;
    $this->model->addnew($name,$img_name,$content,$added_date);
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

public function Findauthor()
{
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $this->model->Findauthor($id);
}
}
public function update()
{

$tz = 'UTC';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
// $dt->format('F j-Y');
$date =$dt->format('Y-m-d');

  if (isset($_POST['name'])&&isset($_POST['image-name'])&&isset($_POST['content'])&&isset($_POST['id'])) {
    $name        = $_POST['name'];
    $img_name    = $_POST['image-name'];
    $content     = $_POST['content'];
    $id          = $_POST['id'];
    $added_date  = $date;
    $this->model->update($name,$img_name,$content,$added_date,$id);
  }
  else
  {
    //echo "id not set";
  }



}



}

?>