<?php
/**
* 
*/
class ControllermModel
{
	
	function __construct()
	{
	   $this->db = new database();	
	}

public function Alllanguage()
{
 $command = $this->db->prepare("SELECT * FROM `mvc_language`");
 $command->execute();
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{
     while ($row = $command->fetch(PDO::FETCH_ASSOC))
     {
        $row_array = array();
        $row_array['id']           = $row['id'];
        $row_array['name']         = $row['name'];
        $row_array['abrev']        = $row['abreviation'];
        $row_array['type']         = $row['type'];

        $abrev = $row['abreviation'];

$command1 = $this->db->prepare("SELECT * FROM `mvc_lang_keywords` WHERE abreviation = :abrev");
$command1->execute(array(':abrev' => $abrev ));

if($command1->rowCount()  > 0)
{
   $row_array['keywordNumber'] = $command1->rowCount();
}
else
{
  $row_array['keywordNumber'] = 0;
}      

array_push($json_response, $row_array);
}

return json_encode($json_response);

}
}


public function profileData($username,$password)
{
    
 $command = $this->db->prepare("SELECT * FROM `login`  WHERE email= :user AND password= :pass");
 $command->setFetchMode(PDO::FETCH_ASSOC);
 $command->execute( array(
  ':user' => $username, 
  ':pass' => $password
  ));
 $data = $command->fetchAll();

  if ($command->rowCount() > 0) 
    {
   $myJSON = json_encode($data);
    return $myJSON;
    }
}

public function getPermissionData($user,$key)
{
$command = $this->db->prepare("SELECT * FROM `mvc_user_permission` WHERE user = :user AND per_key = :key");
$command->execute( array(
  ':user' => $user, 
  ':key'  => $key
  ));
 
  if ($command->rowCount() > 0) 
    {

  while ($row = $command->fetch(PDO::FETCH_ASSOC))
     {
        $status = $row['status'];
     }
if ($status == 1) 
     {
        return 1;
     }
     else
     {
       return 0;
     }
   
  }
  else
  {
    return 0;
  }
}

public function TestPermissionData($user,$key)
{
$command = $this->db->prepare("SELECT * FROM `mvc_user_permission` WHERE user = :user AND per_key = :key");
$command->execute( array(
  ':user' => $user, 
  ':key'  => $key
  ));
 
  if ($command->rowCount() > 0) 
    {

   return 1;
   
  }
  else
  {
    return 0;
  }
}


public function SavePermissionData($user,$name,$key,$page,$type)
{

$status = $this->TestPermissionData($user,$key);

if ($status == 0) {

      $command = $this->db->prepare("INSERT INTO `mvc_user_permission` (`id`, `user`, `per_name`, `per_key`, `page`, `type`, `status`) VALUES (NULL, :user, :name, :key, :page, :type, :status)");
  if ($command->execute(array(
    
          ':user'    => $user,
          ':name'    => $name,
          ':key'     => $key,
          ':page'    => $page,
          ':type'    => $type,
          ':status'  => 0

            ))) 
  {

$this->SavePermission($name,$key,$page,$type);

  }
  }
 }

public function TestPermission($key)
{
$command = $this->db->prepare("SELECT * FROM `mvc_permission` WHERE per_key = :key");
$command->execute( array(
  ':key'  => $key
  ));
 
  if ($command->rowCount() > 0) 
    {

   return 1;
   
  }
  else
  {
    return 0;
  }
}

public function SavePermission($name,$key,$page,$type)
{
  $status = $this->TestPermission($key);

if ($status == 0) {

      $command = $this->db->prepare("INSERT INTO `mvc_permission` (`id`, `per_name`, `per_key`, `page`, `type`) VALUES (NULL, :name, :key, :page, :type)");
  if ($command->execute(array(
          ':name'    => $name,
          ':key'     => $key,
          ':page'    => $page,
          ':type'    => $type
            ))) 
  {}
}
}


public function Getlink($page,$username)
{
$command = $this->db->prepare("SELECT * FROM `mvc_user_permission` WHERE  user = :user AND page = :page AND type != :type ");
$command->execute(array(
  ':page'   => $page, 
  ':user'   => $username,
  ':type'   => 'button',

  ));
 
  if ($command->rowCount() > 0) 
    {
      while ($row = $command->fetch(PDO::FETCH_ASSOC))
       {
         $status = $row['status'];
       }

if ($status == 1) 
     {
       return 1;
     }
     else
     {
       return 0;
     }
   
  }
  else
  {
     return 2;
  }
}

public function checkuserpermission($username)
{
   $command = $this->db->prepare("SELECT * FROM `mvc_user_permission` WHERE  user = :user AND status = :status");
$command->execute( array(
  ':status' => 1, 
  ':user'   => $username
  ));
 
  if ($command->rowCount() > 0) 
    {
      return 1;
    }
else
{
  return 0;
}
}

}
?>