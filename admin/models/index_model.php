<?php
/**
* 
*/
class index_model extends model
{
	
	function __construct()
	{
	  parent::__construct();
	}
	
	public function FindData()
{

 $command = $this->db->prepare("SELECT * FROM `mvc_blog`  ORDER BY `mvc_blog`.`id` DESC");
 $command->execute();
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id']             = $row['id'];
        $row_array['Title']          = $row['Title']; 
        $row_array['content']        = $row['content']; 
        $row_array['logo']           = $row['logo']; 
        $row_array['author_id']      = $row['author_id'];
        $row_array['views']          = $row['views'];
        $row_array['added_date']     = $row['added_date']; 
        $row_array['updated_date']   = $row['updated_date']; 
        $row_array['comment'] = array(); 
        $row_array['author_data'] = array(); 
        $id = $row['id'];
        $author_id = $row['author_id'];

 $command2 = $this->db->prepare("SELECT * FROM `mvc_comment` WHERE post_id = :id");
 $command2->execute(array(':id' => $id));
if($command2->rowCount()  > 0)
{ 
     while ($row2 = $command2->fetch(PDO::FETCH_ASSOC)) 
     {
       $row_array['comment'][] = array(
                'id'            => $row2['id'],
                'post_id'       => $row2['post_id'],
                'name'          => $row2['name'],
                'content'       => $row2['content'],
                'added_date'    => $row2['added_date']
            );

     }
     $row_array['comment_number']   = $command2->rowCount();
   }
   else
   {
    $row_array['comment_number']   = 0;
   }


 $command3 = $this->db->prepare("SELECT * FROM `mvc_author` WHERE id = :id");
 $command3->execute(array(':id' => $author_id));
if($command3->rowCount()  > 0)
{ 
     while ($row2 = $command3->fetch(PDO::FETCH_ASSOC)) 
     {
       $row_array['author_data'][] = array(
                'id'         => $row2['id'],
                'name'       => $row2['name'],
                'description'=> $row2['description'],
                'logo'       => $row2['logo'],
                'added_date' => $row2['added_date']
            );

          $name       = $row2['name'];
          $author_img = $row2['logo'];
     }
     $row_array['author']        = $author_img;
     $row_array['author_name']   = $name;
   }
   else
   {
    $row_array['author']   = 'none';
   }




array_push($json_response, $row_array);
}

return json_encode($json_response);

}
}


public function FindtotalBlog()
{
$proced = new \stdClass();
$command = $this->db->prepare("SELECT * FROM `mvc_blog`  ORDER BY `mvc_blog`.`id` DESC");
$command->execute();
$json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
$proced->number  = $command->rowCount();
$myJSON = json_encode($proced);
return $myJSON;
}
else
{
$proced->number  = 0;
$myJSON = json_encode($proced);
return $myJSON;
}	
}
	


public function Findtotalaccount()
{
$proced = new \stdClass();
$command = $this->db->prepare("SELECT * FROM `mvc_site_accounts`");
$command->execute();
$json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
$proced->number  = $command->rowCount();
$myJSON = json_encode($proced);
return $myJSON;
}
else
{
$proced->number  = 0;
$myJSON = json_encode($proced);
return $myJSON;
}	
}

public function totalvisit()
{
$proced = new \stdClass();
$command = $this->db->prepare("SELECT sum(views) as total FROM mvc_status");
$command->execute();

while($row=$command->fetch(PDO::FETCH_ASSOC)){
    $number = $row['total'];
    if($number == ""){
      $number ="0";
    }
 $proced->number  = $number;
  }

$myJSON = json_encode($proced);
return $myJSON;	
}

public function uniquevisitors()
{
$proced = new \stdClass();
$command = $this->db->prepare("SELECT DISTINCT user_id FROM mvc_status");
$command->execute();
$proced->number  = $command->rowCount();

$myJSON = json_encode($proced);
return $myJSON;	
}

public function sitevisit()
{
$proced = new \stdClass();
  $query1=$this->db->prepare("SELECT SUM(views) as total FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 0 DAY)");
  $query2=$this->db->prepare("SELECT SUM(views) as total FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
  $query3=$this->db->prepare("SELECT SUM(views) as total FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 2 DAY)");
  $query4=$this->db->prepare("SELECT SUM(views) as total FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 3 DAY)");
  $query5=$this->db->prepare("SELECT SUM(views) as total FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 4 DAY)");
  $query6=$this->db->prepare("SELECT SUM(views) as total FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 5 DAY)");
  $query7=$this->db->prepare("SELECT SUM(views) as total FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 6 DAY)");
  $query8=$this->db->prepare("SELECT SUM(views) as total FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
  $query1->execute();
  $query2->execute();
  $query3->execute();
  $query4->execute();
  $query5->execute();
  $query6->execute();
  $query7->execute();
  $query8->execute();
  while($row=$query1->fetch(PDO::FETCH_ASSOC)){
    $today = $row['total'];
    if($today==""){
      $today="0";
    }
    $proced->today = $today;
  }
  while($row=$query2->fetch(PDO::FETCH_ASSOC)){
    $yesterday = $row['total'];
    if($yesterday==""){
      $yesterday="0";
    }
    $proced->yesterday = $yesterday;
  }
  while($row=$query3->fetch(PDO::FETCH_ASSOC)){
    $twodays =$row['total'];
    if($twodays==""){
      $twodays="0";
    }
    $proced->twodays = $twodays;
  }
  while($row=$query4->fetch(PDO::FETCH_ASSOC)){
    $threedays= $row['total'];
    if($threedays==""){
      $threedays="0";
    }
    $proced->threedays = $threedays;
  }
  while($row=$query5->fetch(PDO::FETCH_ASSOC)){
    $fourdays=$row['total'];
    if($fourdays==""){
      $fourdays="0";
    }
    $proced->fourdays = $fourdays;
  }
  while($row=$query6->fetch(PDO::FETCH_ASSOC)){
    $fivedays=$row['total'];
    if($fivedays==""){
      $fivedays="0";
    }

    $proced->fivedays = $fivedays;
  }
  while($row=$query7->fetch(PDO::FETCH_ASSOC)){
    $sixdays=$row['total'];
    if($sixdays==""){
      $sixdays="0";
    }
    $proced->sixdays = $sixdays;
  }
  while($row=$query8->fetch(PDO::FETCH_ASSOC)){
    $sevendays=$row['total'];
    if($sevendays==""){
      $sevendays="0";
    }
    $proced->sevendays = $sevendays;
  }

//=========
$myJSON = json_encode($proced);
return $myJSON;


}


public function uniquesitevisit()
{
$proced = new \stdClass();
  $query1=$this->db->prepare("SELECT DISTINCT user_id FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 0 DAY)");
  $query2=$this->db->prepare("SELECT DISTINCT user_id FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
  $query3=$this->db->prepare("SELECT DISTINCT user_id FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 2 DAY)");
  $query4=$this->db->prepare("SELECT DISTINCT user_id FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 3 DAY)");
  $query5=$this->db->prepare("SELECT DISTINCT user_id FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 4 DAY)");
  $query6=$this->db->prepare("SELECT DISTINCT user_id FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 5 DAY)");
  $query7=$this->db->prepare("SELECT DISTINCT user_id FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 6 DAY)");
  $query8=$this->db->prepare("SELECT DISTINCT user_id FROM mvc_status WHERE DATE(`time`) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
  $query1->execute();
  $query2->execute();
  $query3->execute();
  $query4->execute();
  $query5->execute();
  $query6->execute();
  $query7->execute();
  $query8->execute();
  
    $proced->today     = $query1->rowCount();
  
    $proced->yesterday = $query2->rowCount();
 
    $proced->twodays   = $query3->rowCount();;
 
    $proced->threedays = $query4->rowCount();;

    $proced->fourdays  = $query5->rowCount();;
  
    $proced->fivedays  = $query6->rowCount();;
 
    $proced->sixdays   = $query7->rowCount();;
 
    $proced->sevendays = $query8->rowCount();;
  
//=========
$myJSON = json_encode($proced);
return $myJSON;


}

public function Pages()
{
    $command = $this->db->prepare("SELECT DISTINCT page FROM `mvc_status`");
    $command->execute();
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['page']   = $row['page'];
        $page                = $row['page'];
        $unique              =  $this->dataB::table('mvc_status')->where([['page','=',$page]])->count();
        $row_array['unique'] = $unique;
        $views               =  $this->dataB::table('mvc_status')->where([['page','=',$page]])->sum('views');
        $row_array['views']  = $views;

array_push($json_response, $row_array);
}

return json_encode($json_response);

}
}


public function downloadData()
{
 $data =  $this->dataB::table('downloads')->sum('n_downloads');
 return $data;
}


}

?>