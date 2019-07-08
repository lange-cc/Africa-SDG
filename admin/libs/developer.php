<?php
/**
* 
*/
class developer extends model
{
	
function __construct()
{
parent::__construct();
$command = $this->db->prepare("SELECT * FROM `mvc_dev_option` WHERE id= 1");
$command->execute();
if($command->rowCount()  > 0)
{ 
while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
{    
  $status = $row['option_status'];
  define('IDSTATUS',$status);   
}
}
}



}

?>