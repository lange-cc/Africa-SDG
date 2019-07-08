<?php
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','sdg');
define('DB_USER','root');
define('DB_PASS','');

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager as Capsule;
 

 class DbBoot
 {
 	
 function __construct()
 {
 		

 }

 public function conn()
 {

$data = new Capsule;
$capsule = new Capsule;
 
$capsule->addConnection([
 
   "driver"    => DB_TYPE,
 
   "host"      => DB_HOST,
 
   "database"  => DB_NAME,
 
   "username"  => DB_USER,
 
   "password"  => DB_PASS
 
]);
 
$capsule->setAsGlobal();
$capsule->bootEloquent();

return new DB;
}

}


?>