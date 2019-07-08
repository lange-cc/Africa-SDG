<?php
/**
* 
*/
class permission_model extends model
{
	
	function __construct()
	{
	  parent::__construct();
	}
	public function logout()
	{
    header('location: ../../login/');
	}


public function AllAccount()
{

 $command = $this->db->prepare("SELECT * FROM `login`  ORDER BY `login`.`id` DESC");
 $command->setFetchMode(PDO::FETCH_ASSOC);
 $command->execute();
 $data = $command->fetchAll();

  if ($command->rowCount() > 0) 
    {
   $myJSON = json_encode($data);
    return $myJSON;
    }
}

public function getAccount($email)
{
   $data = array();
   $data['account']    = $this->Find($email); 
   $data['navbarpermission']  = $this->Getpermission($email,'navbar'); 
   $data['submenupermission'] = $this->Getpermission($email,'submenu'); 
   $data['buttonpermission']  = $this->Getpermission($email,'button'); 
   return json_encode($data);
}

public function Find($email)
{
$command = $this->db->prepare("SELECT * FROM `login` WHERE email = :email");
$command->execute(array(':email' => $email));
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id']           = $row['id'];
        $row_array['name']         = $row['name']; 
        $row_array['email']        = $row['email']; 

        array_push($json_response, $row_array);
}
return $json_response;
}

}

public function Getpermission($email,$page)
{
$command = $this->db->prepare("SELECT * FROM `mvc_user_permission`  WHERE user = :email AND type = :page");
$command->execute(array(
  ':email' => $email,
  ':page'  => $page
  ));
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id']           = $row['id'];
        $row_array['name']         = $row['per_name']; 
        $row_array['status']       = $row['status']; 
        array_push($json_response, $row_array);
}
return $json_response;
}

}


public function SavePermission($email)
{

$command = $this->db->prepare("SELECT * FROM `mvc_permission`");
$command->execute();
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
       
        $name          = $row['per_name'];
        $key           = $row['per_key'];
        $page          = $row['page'];
        $type          = $row['type'];
  

   $this->SavePermissionData($email,$name,$key,$page,$type);
 }}
}


public function SavePermissionData($user,$name,$key,$page,$type)
{

$status = $this->TestPermissionData($user,$key);

if ($status == 0) {

$command = $this->db->prepare("INSERT INTO `mvc_user_permission` (`id`, `user`, `per_name`, `per_key`, `page`, `type`, `status`) VALUES (NULL, :user,:name, :key, :page, :type, :status)");
  if ($command->execute(array(
    
          ':user'    => $user,
          ':name'    => $name,
          ':key'     => $key,
          ':page'    => $page,
          ':type'    => $type,
          ':status'  => 0

            ))) 
  {

  }
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

public function SaveSwitch($status,$sms,$id)
{
  $proced = new \stdClass();
$command = $this->db->prepare("UPDATE `mvc_user_permission` SET `status` = :status WHERE `mvc_user_permission`.`id` = $id");
  if ($command->execute(array(
          ':status' => $status
          ))) 
  {
$proced->status   = "success";
$proced->message = $sms;
$myJSON = json_encode($proced);
echo $myJSON;
}
  else
  {
$proced->status  = "fail";
$proced->message = $sms;
$myJSON = json_encode($proced);
echo $myJSON;
  }
}

public function Switch($id)
{
$status = $this->GetPermissionStatus($id);
if ($status == 1) 
{
   $statu = 0;
   $sms = 'Desactivated'; 
   $this->SaveSwitch($statu,$sms,$id);
}
else
{
   $statu = 1;
   $sms = 'Activated'; 
   $this->SaveSwitch($statu,$sms,$id);
}

}

public function GetPermissionStatus($id)
{
$command = $this->db->prepare("SELECT * FROM `mvc_user_permission` WHERE id = $id");
$command->execute();
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $status  = $row['status'];
     }

     return $status;
}
}


}