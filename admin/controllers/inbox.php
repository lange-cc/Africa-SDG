<?php
/**
* 
*/
class inbox extends controller
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
  $this->view->js  = array('editor/jquery-te-1.4.0.min.js','js/inbox.js');
  $this->view->css = array('editor/jquery-te-1.4.0.css');
	$this->loadProfile();
  }

	public function autoload()
	{

    if (isset($this->idname)) {
       $this->view->readfromid = $this->model->readfromid($this->idname);
    }
    $this->view->inbox = $this->model->FindData('inbox');
    $this->FindAuthor();
    $this->view->controller = $this->loadcontroller;
    $this->checklink('inbox');
    $this->view->render('inbox/index',false,$semenu=1,$menu=6);
	}
public function CheckStatus($status)
{
  if ($status == 0) {
    return "new";
  }
  elseif ($status==1) {
    return "";
  }
  else
  {
    return "hide";
  }
}
public function vibility($status)
{
    if ($status == 0) {
    return "";
  }
  elseif ($status==1) {
    return "hide";
  }
  else
  {
    return "hide";
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
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $this->model->Find($id);
}
}

public function sendmessage()
 {
if (isset($_POST['email-from'])&&isset($_POST['email-to'])&&isset($_POST['subject'])&&isset($_POST['content'])&&isset($_POST['reply_id'])) {
    $mail_from = $_POST['email-from'];
    $mail_to   = $_POST['email-to'];
    $subject   = $_POST['subject'];
    $content   = $_POST['content'];
    $reply_id  = $_POST['reply_id'];
   
  if (empty($reply_id)) {
     $this->model->sendnewmail($mail_from,$mail_to,$subject,$content);
   }
   else
   {
     $this->model->sendmail($mail_from,$mail_to,$subject,$content,$reply_id);
   }
    
  }
  else
  {
$proced = new \stdClass();    
$proced->status  = "fail";
$proced->message = "Make sure all field was Selected";
$myJSON = json_encode($proced);
echo $myJSON;
  }

 }



public function update()
{

 if (isset($_POST['f_name'])&&isset($_POST['l_name'])&&isset($_POST['day'])&&isset($_POST['mouth'])&&isset($_POST['year'])&&isset($_POST['sex'])&&isset($_POST['location'])&&isset($_POST['image-name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['re-password'])&&isset($_POST['id'])) {

  if ($_POST['password']==$_POST['re-password']) {
    $f_name    = $_POST['f_name'];
    $l_name    = $_POST['l_name'];
    $day       = $_POST['day'];
    $mouth     = $_POST['mouth'];
    $year      = $_POST['year'];
    $sex       = $_POST['sex'];
    $location  = $_POST['location'];
    $image     = $_POST['image-name'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $id        = $_POST['id'];
    $this->model->update($f_name,$l_name,$day,$mouth,$year,$sex,$location,$image,$email,$password,$id);
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

public function FindAuthor()
{
  $this->view->author = $this->model->FindAuthor();
}
public function numberofunread()
{
  $this->model->numberofunread();
}
public function numberofinbox()
{
  $this->model->numberofinbox();
}
public function numberofsent()
{
 $this->model->numberofsent(); 
}

public function loadnewsms()
{
  $this->model->loadnewsms();
}


}

?>