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

public function loadModel($name)
  {
	$path = 'models/'.$name.'_model.php';

	if (file_exists($path)) 
	{
		require 'models/'.$name.'_model.php';
        $modelname = $name.'_model';
        $this->model = new $modelname;
	}
  }

public function index($length = 10)
{
$characters = '0234hjcjhsdhjcdsksjds5805010167rtgrtgrt89560trgtrgret101895067rtgrtg895678fdnbvhfskjnvkdfn956010107895mfdnvjkhdfjvbhjdfbvdf601010189506189506010101789560ndfbvkjndfkjnvkdf1895068950xncbhjdgscahjsducsdcd678789560dfnbvjkbdfjknvkldf10101895dsjhfggcvashdbcjshdvhgcvhsdcs06910789578956dfnjvkbdfhjbvjhdf01ejrhfuhedfjvhkdfiruhfiuer01018950660ndfbvhjdkjvbjhdf101018jchdsgfhjbefiueiufhuierhgrt950678956010dfmnvjkdfnk101895rt0610101223550110101mfdnbhjvbdfj78950101456789456';
$charactersLength = strlen($characters);
$value = '';
for ($i = 0; $i < $length; $i++) 
{
 $value .= $characters[rand(0, $charactersLength - 1)];
}

return $value;
}


public function loadid($id)
{
 $this->idname = $id;
}

public function language($abrev,$key,$Keyword)
{
   return $this->SelectLanguage($abrev,$key,$Keyword);
}

public function loadcontroler($controller)
{

$this->view->controller = $controller;
$this->view->run = new controller();

}


public function acivationCode()
{
$characters = '0234580501016789560101895067895678956010107895601010189506189506010101789560189506895067878956010101895069107895789560101018950660101018950678956010101895061010122355011010178950101456789456';
$charactersLength = strlen($characters);
$value1 = '';
$value2 = '';
for ($i = 0; $i < 3; $i++) 
{
 $value1 .= $characters[rand(0, $charactersLength - 1)];
}

for ($i = 0; $i < 3; $i++) 
{
 $value2 .= $characters[rand(0, $charactersLength - 1)];
}
$code = $value1.'-'.$value2;

return $code;
}

public function userindex()
{
$characters = '0234580501016789560101895067895678956010107895601010189506189506010101789560189506895067878956010101895069107895789560101018950660101018950678956010101895061010122355011010178950101456789456';
$charactersLength = strlen($characters);
$value = '';
for ($i = 0; $i < 20; $i++) 
{
 $value .= $characters[rand(0, $charactersLength - 1)];
}
$code = $value;

return $code;
}

public function todayDate()
{

$date = date('d-m-y H:i:s');
return $date;
}

public function GetUser($token)
{
  return $this->GetUserData($token);
}

}
?>
