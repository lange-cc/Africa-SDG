<?php
/**
* 
*/
class authors_model extends model
{
	
	function __construct()
	{
	  parent::__construct();
	}
	public function logout()
	{
      header('location: ../../login/');
	}

	public function addnew($name,$img_name,$content,$added_date)
	{
    $proced = new \stdClass();
		$command = $this->db->prepare("INSERT INTO `mvc_author` (`id`, `name`, `description`, `logo`, `added_date`) VALUES (NULL, :name, :content, :img, :added_date)");
  if ($command->execute(array(
    	    ':name'       => $name,
    	    ':img'        => $img_name,
    	    ':content'    => $content,
          ':added_date' => $added_date
            ))) 
  {
$proced->status   = "success";
$proced->message = "Author was added";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Author was not saved";
$myJSON = json_encode($proced);
echo $myJSON;
  }
   }


public function FindData()
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

   public function Delete($id)
   {
 $proced = new \stdClass();
 $command = $this->db->prepare("DELETE FROM `mvc_author` WHERE `mvc_author`.`id` = :id");
  if ($command->execute(array(':id' => $id ))) {
$proced->status   = "success";
$proced->message = "Data was Delete";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else{
$proced->status  = "fail";
$proced->message = "Data was not Delete";
$myJSON = json_encode($proced);
echo $myJSON;
  }
   }

public function Findauthor($id)
{

$command = $this->db->prepare("SELECT * FROM `mvc_author` WHERE id = $id ");
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

echo json_encode($json_response);

}

}

public function update($name,$img_name,$content,$added_date,$id)
{
 $proced = new \stdClass();
$command = $this->db->prepare("UPDATE `mvc_author` SET `name` = :name, `description` = :content, `logo` = :img, `added_date` = :added_date WHERE `mvc_author`.`id` =$id");
  if ($command->execute(array(
          ':name'       => $name,
          ':img'        => $img_name,
          ':content'    => $content,
          ':added_date' => $added_date
            ))) 
  {
$proced->status   = "success";
$proced->message = "Author was updated";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Author was not saved";
$myJSON = json_encode($proced);
echo $myJSON;
  }

}

 }