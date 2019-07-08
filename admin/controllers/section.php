<?php
/**
* 
*/
class section extends controller
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

     	$this->view->js  = array('editor/jquery-te-1.4.0.min.js','js/section.js');
		$this->view->css = array('editor/jquery-te-1.4.0.css');
	 $this->loadProfile();
  }

	public function autoload()
	{
	 $this->view->id         = $this->idname;
   $this->view->controller = $this->loadcontroller;
	 $this->view->data       = $this->model->FindData($this->idname);
   $this->view->label      = $this->model->LabelData($this->idname);

   $this->checklink('section');
   $this->view->render('section/index',false,$semenu=1,$menu=3);
	}

	public function save()
	{

	 if (isset($_POST['title']) && isset($_POST['content']) && $_POST['id']) {	
        $title         = $_POST['title'];
        $content       = $_POST['content'];
        $id            = $_POST['id'];
        $section_index = $this->randomname();

$this->model->addContent($title,$content,$id,$section_index);
}	
else
{
	#json
}	
	}

	public function delete()
	{
		if (isset($_POST['data'])) {
			$val = $_POST['data'];
			$this->model->delete($val);
		}
	}
	public function DeleteArticle()
	{
		if (isset($_POST['id'])) {
			$val = $_POST['id'];
			$this->model->DeleteArticle($val);
		}
	}
	

	public function getImage()
	{
	 $this->model->getImages();
	}
public function DeleteImage()
{
  if (isset($_POST['data']) && isset($_POST['id'])) {
    $id        = $_POST['id'];
    $file_name = $_POST['data'];
    $this->model->DeleteImage($id,$file_name);
  }

}

public function addArticle()
{

$title    = (isset($_POST['title'])) ? $_POST['title'] : 'none' ;
$subTitle = (isset($_POST['sub-title'])) ? $_POST['sub-title'] : 'none' ;
$img      = (isset($_POST['image-name'])) ? $_POST['image-name'] : 'none' ;
$content  = (isset($_POST['content'])) ? $_POST['content'] : 'none' ;

$section_index = $_POST['section_index'];
$article_index = $this->randomname();

$this->model->addArticle($title,$subTitle,$img,$content,$section_index,$article_index);


}

public function sectionUpdate()
{
if (isset($_POST['id'])) {
  	$id = $_POST['id'];
  	$this->model->sectionUpdate($id);
  }
  else
  {
  	//echo "id not set";
  }  


}
public function sectionView()
{
if (isset($_POST['id'])) {
  	$id = $_POST['id'];
  	$this->model->sectionView($id);
  }
  else
  {
  	//echo "id not set";
  }  


}

public function FindArticle()
{
if (isset($_POST['id'])) {
  	$id = $_POST['id'];
  	$this->model->FindArticle($id);
  }
  else
  {
  	//echo "id not set";
  }  


}


public function Update()
{

if (isset($_POST['title'])&&isset($_POST['content'])&&isset($_POST['id'])) {
  	$title   = $_POST['title'];
  	$id   = $_POST['id'];
  	$content = $_POST['content'];
  	$this->model->Update($title, $content, $id);
  }
  else
  {
  	//echo "id not set";
  }  


}

public function UpdateArticle()
{

$title    = (isset($_POST['title'])) ? $_POST['title'] : 'none' ;
$subTitle = (isset($_POST['sub-title'])) ? $_POST['sub-title'] : 'none' ;
$img      = (isset($_POST['image-name'])) ? $_POST['image-name'] : 'none' ;
$content  = (isset($_POST['content'])) ? $_POST['content'] : 'none' ;
$id       = (isset($_POST['id'])) ? $_POST['id'] : 'none';
$this->model->ArticleUpdate($title,$subTitle,$id,$img,$content);

}

public function checkimg($path,$img)
{

if (file_exists('../public/all-images/thumbnail/'.$img)) {

if (!empty($img)) 
   {
  echo $path;
   }
else
   {      
  echo  ADMINURL.'images/no-preview.jpg';
   }
 }
 else
 {
    echo  ADMINURL.'images/no-preview.jpg';
 }
}


public function upload()
{
	$this->dataupload($DBsave=true,$randomName = false,'/../public/all-images/');
}

}

?>