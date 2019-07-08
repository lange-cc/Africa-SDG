<?php
/**
*
*/

class Route extends controller
{

function __construct()
{
parent::__construct();

if (!isset($_GET['url']))
{
  $url = 'login';
  $this->loadsite($url);

}
else
{
$url = $_GET['url'];
$this->loadsite($url);
}

} /** end of constant function */



public function loadsite($url)
{
$url = rtrim($url,'/');
$url = explode('/',$url);
$couturl = count($url)-1;

if ($couturl == 0) {

if (file_exists('controllers/'.$url[$couturl].'.php'))
{
require 'controllers/'.$url[$couturl].'.php';
$controller = new $url[$couturl];
$controller->loadcontroler($controller);
$controller->loadModel($url[$couturl]);
$controller->autoload();

}
else
{
//$this->error(0);
$url = 'errors';
$this->loadsite($url);

}
}
else if ($couturl == 1) {
  if (file_exists('controllers/'.$url[0].'.php'))
  {
  require 'controllers/'.$url[0].'.php';
  $controller = new $url[0];
  $controller->loadcontroler($controller);
  $controller->loadModel($url[0]);
 $method = method_exists($controller, $url[$couturl]);
  if ($method) {
    $function=(string)$url[$couturl];
    $controller->$function();
  }
  else
  {
    $controller->autoload();
  }
}
else
{
  #no controller available
$url = 'errors';
$this->loadsite($url);
  
}


}
else if ($couturl == 2)
  {
if (file_exists('controllers/'.$url[0].'.php'))
{
  require 'controllers/'.$url[0].'.php';
  $controller = new $url[0];
  $controller->loadcontroler($controller);
  $controller->loadModel($url[0]);
  $controller->loadid($url[2]);
  $method = method_exists($controller, $url[1]);
   if ($method) {
     if (isset($url[2])) {
      $function=(string)$url[1];
      $controller->$function();
     }
     else
     {
      $controller->autoload();
     }
    
   }
   else
   {
    $controller->autoload();
   }
}
else
{
  //echo "controller not exist";
$url = 'errors';
$this->loadsite($url);
}
 }

else
{

//echo "this controller not Exist";
$url = 'errors';
$this->loadsite($url);

}
} /** end of looding site function */


}
?>
