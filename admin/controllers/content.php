<?php
/**
* 
*/
class content extends controller
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

		$this->view->js = array('js/content.js');
 $this->loadProfile();

	}

	public function autoload()
	{
	  $this->view->data = $this->model->FindData();
	   $this->view->controller = $this->loadcontroller;
	   $this->checklink('content');
      $this->view->render('content/index',false,$semenu=1,$menu=3);
	}

	public function save()
	{
	if (isset($_POST['type']) && isset($_POST['content'])) {
		
$type = $_POST['type'];
$content = $_POST['content'];
$index = $this->randomname();

$this->model->addContent($type,$content,$index);
}	
else
{
	#json
}

	}


	public function delete()
	{
		if (isset($_POST['id'])) {
			$val = $_POST['id'];
			$this->model->delete($val);
		}
	}

	public function Findcontent()
	{
if (isset($_POST['id'])) 
        {
			$id = $_POST['id'];
			$this->model->Findcontent($id);
		}

	}

public function update()
 {
if (isset($_POST['type']) && isset($_POST['content']) && isset($_POST['id'])) {
		
$type    = $_POST['type'];
$content = $_POST['content'];
$id      = $_POST['id'];

$this->model->update($type,$content,$id);
}	
else
{
	#json
}

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


}