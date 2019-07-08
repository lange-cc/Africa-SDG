<?php
/**
* 
*/
class setting_model extends model
{
	
	function __construct()
	{
	  parent::__construct();
	}
	public function logout()
	{
    header('location: ../../login/');
	}

	public function addNew($names,$username,$email,$password,$image,$cover_image,$index )
	{
  $proced = new \stdClass();
	$command = $this->db->prepare("INSERT INTO `login` (`id`, `name`, `username`, `password`, `email`, `index`, `logo`, `cover_logo`) VALUES (NULL, :name, :username, :password, :email, :index, :logo, :coverLogo)");
  if ($command->execute(array(
    	    ':name'      => $names,
    	    ':username'  => $username,
          ':password'  => $password,
    	    ':email'     => $email,
          ':index'     => $index,
    	    ':logo'      => $image,
          ':coverLogo' => $cover_image
         
            ))) 
  {
$proced->status   = "success";
$proced->message = "Admin successfully added ";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to add the Admin";
$myJSON = json_encode($proced);
echo $myJSON;
  }
   }


public function FindData()
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

   public function Delete($id)
   {
 $proced = new \stdClass();
 $command = $this->db->prepare("DELETE FROM `login` WHERE `login`.`id` = :id");
  if ($command->execute(array(':id' => $id ))) {
$proced->status   = "success";
$proced->message = "Admin successfully deleted";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else{
$proced->status  = "fail";
$proced->message = "Failed to delete the Admin";
$myJSON = json_encode($proced);
echo $myJSON;
  }
   }

public function Find($id)
{

$command = $this->db->prepare("SELECT * FROM `login` WHERE id = $id ");
 $command->setFetchMode(PDO::FETCH_ASSOC);
 $command->execute();
 $data = $command->fetchAll();

  if ($command->rowCount() > 0) 
    {
   $myJSON = json_encode($data);
    echo $myJSON;
    }
}

public function update($names,$username,$email,$password,$image,$cover_image,$id)
{
 $proced = new \stdClass();
$command = $this->db->prepare("UPDATE `login` SET `name` = :names, `username` = :username, `password` = :password, `email` = :email, `logo` = :image, `cover_logo` = :cover_image WHERE `login`.`id` = $id");
  if ($command->execute(array(
          ':names'       => $names,
          ':username'    => $username,
          ':email'       => $email,
          ':password'    => $password,
          ':image'       => $image,
          ':cover_image' => $cover_image

            ))) 
  {
$proced->status   = "success";
$proced->message = "Profile successfully updated";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to update the Profile";
$myJSON = json_encode($proced);
echo $myJSON;
  }

}

public function idStatus($status)
{

if ($status == 'false') {
  $sms = 'Desactivated';
}
else
{
  $sms = 'Activated';
}

  $proced = new \stdClass();
  $command = $this->db->prepare("UPDATE `mvc_dev_option` SET `option_status` = :status WHERE `mvc_dev_option`.`id` = 1");
  if ($command->execute(array(
          ':status' => $status
            ))) 
  {
$proced->status  = "success";
$proced->message = $sms;
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to change settings, try again";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}
public function FindAuthor()
{

  $command = $this->db->prepare("SELECT * FROM `mvc_author`");
 $command->execute();
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id']           = $row['id'];
        $row_array['name']         = $row['name']; 
        $row_array['description']  = $row['description']; 
        $row_array['logo']         = $row['logo']; 
        $row_array['added_date']   = $row['added_date'];

        array_push($json_response, $row_array);
}
return json_encode($json_response);
}

}

public function LabelData()
{
  $command = $this->db->prepare("SELECT * FROM `mvc_main_site_content` ORDER BY `mvc_main_site_content`.`id` DESC");
  $command->execute();
  $json_response = array(); //Create an array

 if($command->rowCount()  > 0)
  { 
    while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id']    = $row['id'];
        $row_array['title'] = $row['type']; 
        $row_array['index'] = $row['cont_index'];
        $index              = $row['cont_index'];
  
$exist = $this->dataB::table('mvc_labeling')->where('section_index', $index)->exists();

 if (!$exist) {
  $this->dataB::table('mvc_labeling')->insertGetId([
      'section_index' => $index
     ]);
}


      array_push($json_response, $row_array);
     }

     return json_encode($json_response);
   }


}

public function GetFieldData($index)
 {
    $data  = $this->dataB::table('mvc_labeling')->where([['section_index','=',$index]])->get();
    echo $data;
 }

public function saveLabelData($index,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7)
 {
    $saving =  $this->dataB::table('mvc_labeling')->where([['section_index','=',$index]])->update(['label_1' => $field_1,'label_2' => $field_2,'label_3' => $field_3,'label_4' => $field_4,'label_5' => $field_5,'label_6' => $field_6,'label_7' => $field_7]);   
    
    if ($saving == 0) {
      $proced = new \stdClass();
      $proced->status  = "success";
      $proced->message = "All data exist";
      $myJSON          = json_encode($proced);
      echo $myJSON;
    }
    else
    {
  if ($saving) {
      $proced = new \stdClass();
      $proced->status  = "success";
      $proced->message = "All data saved";
      $myJSON          = json_encode($proced);
      echo $myJSON;
      }
      }   
  }

}
