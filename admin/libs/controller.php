<?php
/**
* 
*/
class controller extends ControllermModel
{
	
	function __construct()
	{
		
		parent::__construct();
		$this->view = new View();

	}

public function checklink($link)
{
$username = session::get('username');
if ($username == false) 
    {
       $page  = 2;
    }
    else
    {
    $page = $this->Getlink($link,$username);
   }

if ($page == 0) {
   $this->view->render('errors/index',false,$semenu=0,$menu=0);
   exit;
}

}

public function checkpermission()
{
  $username = session::get('username');
if ($username == false) 
    {
       return 0;
    }
    else
    {
    $status = $this->checkuserpermission($username);
    return $status;
   }
}  


public function loadModel($name)
  {
	$path = 'models/'.$name.'_model.php';

	if (file_exists($path)) {
		require 'models/'.$name.'_model.php';
        $modelname = $name.'_model';
        $this->model = new $modelname;
	} 
}



public function loadid($id)
{
 $this->idname = $id;
}


public function loadcontroler($controller)
{
$this->loadcontroller = $controller;
$this->view->controller = $controller;
$this->view->run = new controller();
}


public function randomname($length=8)
{
$characters = 'cxbvjhuy78erfuwir8ycnkljafGHVHFCFGPONJBVFSESOKOM230peihurfg4uihfgbvddxdcfp';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;	
}

public function loadProfile()
{
    $username = session::get('username');
    $password = session::get('password');
    $this->view->profile = $this->profileData($username,$password);
    return $this->profileData($username,$password);
}

public function dataupload($DBsave=true,$randomName = true,$fileLocation, $index= 'none',$other_img_index='none',$colorId = 0)
{
$upload_handler = new Upload();
$upload_handler->colorId($colorId);
$upload_handler->otherimg($other_img_index);
$upload_handler->folder($index);
$upload_handler->fileloaction($fileLocation);
$upload_handler->init($DBsave,$randomName);
}


public function languages()
{
	return $this->Alllanguage();
}

public function todayDate()
{
$dt = new DateTime;
$date = $dt->format('d-m-y H:i:s');
return $date;
}


public function getPermisssion($user,$name,$key,$page,$type)
{
   $status = $this->getPermissionData($user,$key); 
   if ($status == 1) {
    	return true;
    } 
    else
    { 
        $this->SavePermissionData($user,$name,$key,$page,$type); 
    	return false;
    }
}

}
?>