<?php
/**
* 
*/
class section_model extends model
{
	
	function __construct()
	{
	  parent::__construct();
	}
	public function logout()
	{
      header('location: ../../login/');
	}

 public function addContent($title,$content,$id,$section_index)
	{
		 $command = $this->db->prepare("INSERT INTO `mvc_section` (`id`, `title`, `discription`, `section_index`, `cont_index`) VALUES (NULL, :title, :content, :section_index, :cont_index )");
          if ($command->execute(array(
    	    ':title'           => $title,
    	    ':content'         => $content,
    	    ':section_index'   => $section_index,
    	    ':cont_index'           => $id
            ))) 
          {
          #json	
$proced = new \stdClass();
$proced->status   = "success";
$proced->message  = "Data was saved";

$proced->title         = $title;
$proced->content       = $content;
$proced->id            = $id;
$proced->section_index = $section_index;

$myJSON = json_encode($proced);
echo $myJSON;

          } 
         else
         {
   	        #json
         }
   }

public function FindData($index)
   {
 $command = $this->db->prepare("SELECT * FROM `mvc_section` WHERE cont_index  = :index ORDER BY `mvc_section`.`id` DESC");
 $command->execute(array(':index' => $index));
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id'] = $row['id'];
        $row_array['title'] = $row['title']; 
        $row_array['discription'] = $row['discription']; 
        $row_array['section_index'] = $row['section_index']; 
        $row_array['article'] = array(); 
        $section_index = $row['section_index'];

 $command2 = $this->db->prepare("SELECT * FROM `mvc_article` WHERE section_index = :index AND lang = :lang");
 $command2->execute(array(':index' => $section_index, ':lang' => LANG ));
if($command2->rowCount()  > 0)
{ 
     while ($row2 = $command2->fetch(PDO::FETCH_ASSOC)) 
     {
       $row_array['article'][] = array(
                'id'            => $row2['id'],
                'title'         => $row2['title'],
                'subtitle'      => $row2['subtitle'],
                'content'       => $row2['content'],
                'article_index' => $row2['article_index'],
                'logo'          => $row2['logo'],
                'section_index' => $row2['section_index']
            );

     }
   }


array_push($json_response, $row_array);

    }
return json_encode($json_response);


}
      


   }

   public function delete($val)
   {
 $proced = new \stdClass();
 $command = $this->db->prepare("DELETE FROM `mvc_section` WHERE section_index = :index");
 	if ($command->execute(array(':index' => $val ))) {
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

   public function DeleteArticle($id)
  {
    $proced = new \stdClass();
 $command = $this->db->prepare("DELETE FROM `mvc_article` WHERE id = :id");
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

  public function getImages()
  {
$json_response = array();
$command = $this->db->prepare("SELECT * FROM `mvc_images` ORDER BY `id` DESC LIMIT 200");  
$command->execute();
if($command->rowCount()  > 0)
{
while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
  {
   $row_array = array();
   $row_array['id']       = $row['id'];
   $row_array['img_name'] = $row['name']; 
   array_push($json_response, $row_array);
  }
echo json_encode($json_response);
 }
}

  public function DeleteImage($id,$file_name)
  {
    $proced = new \stdClass();
if (file_exists('../public/all-images/'.$file_name)) {
$path = '../public/all-images/'.$file_name;
$thumbnail_path = '../public/all-images/thumbnail/'.$file_name;
$medium_path = '../public/all-images/medium/'.$file_name;
$command = $this->db->prepare("DELETE FROM `mvc_images` WHERE `mvc_images`.`id` = $id");

if (unlink($path)) {


if (file_exists('../public/all-images/medium/'.$file_name)) {
  unlink($medium_path);
  unlink($thumbnail_path);
}

  if ($command->execute()) {
$proced->status  = "success";
$proced->message = "File was Deleted";
$myJSON = json_encode($proced);
echo $myJSON;
  }
  else
  {
$proced->status  = "fail";
$proced->message = "File not Deleted in database";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}
else
{
 $proced->status = "fail";
$proced->message = "File was not Deleted";
$myJSON = json_encode($proced);
echo $myJSON; 
}


}
else
{
$command = $this->db->prepare("DELETE FROM `mvc_images` WHERE `mvc_images`.`id` = $id");
if ($command->execute()) {
$proced->status   = "success";
$proced->message = 'Image was deleted in db';
$myJSON = json_encode($proced);
echo $myJSON;
  }
  else
  {
$proced->status  = "fail";
$proced->message = "image not Deleted in database";
$myJSON = json_encode($proced);
echo $myJSON;
  } 
}

  } 

  public function addArticle($title,$subTitle,$img,$content,$section_index,$article_index)
  {
    $proced = new \stdClass();
   $command = $this->db->prepare("INSERT INTO `mvc_article` (`id`, `title`, `subtitle`, `content`, `article_index`, `logo`, `section_index`,`lang`) VALUES (NULL, :title, :subtitle, :content, :article_index, :logo, :section_index,:lang)");
   if ($command->execute(array(
        ':title'         => $title,
        ':subtitle'      => $subTitle,
        ':content'       => $content,
        ':article_index' => $article_index,
        ':logo'          => $img,
        ':section_index' => $section_index,
        ':lang'          => 'en'

        )))
   {
$proced->status  = "success";
$proced->message = "Article was Saved";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Data was not Saved";
$myJSON = json_encode($proced);
echo $myJSON;
  }


  }

  public function FindArticle($id)
  {
   $command = $this->db->prepare("SELECT * FROM `mvc_article` WHERE id = :id ");
   $command->setFetchMode(PDO::FETCH_ASSOC);
   $command->execute(array(':id' => $id));
    $data = $command->fetchAll();

      if ($command->rowCount() > 0) 
    {
   $myJSON = json_encode($data);
    echo $myJSON;
    }
  }

public function sectionUpdate($id)
{
 $command = $this->db->prepare("SELECT * FROM `mvc_section` WHERE id = :id ");
 $command->execute(array(':id' => $id));
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['title'] = $row['title']; 
        $row_array['discription'] = $row['discription']; 
        array_push($json_response, $row_array);
      }
      
      echo json_encode($json_response);
    }

}
public function sectionView($id)
{
 $command = $this->db->prepare("SELECT * FROM `mvc_section` WHERE id = :id ");
 $command->execute(array(':id' => $id));
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['title'] = $row['title']; 
        $row_array['discription'] = $row['discription']; 
        array_push($json_response, $row_array);
      }
      
      echo json_encode($json_response);
    }

}
public function Update($title, $content, $id)
{
 $proced = new \stdClass();
   $command = $this->db->prepare("UPDATE `mvc_section` SET `title` = :title, `discription` = :content WHERE `mvc_section`.`id` = $id ");
   if ($command->execute(array(
        ':title'         => $title,
        ':content'       => $content
        )))
   {
$proced->status  = "success";
$proced->message = "Section was Updated";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Data was not Saved";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}

public function ArticleUpdate($title,$subTitle,$id,$img,$content)
{
  $proced = new \stdClass();
   $command = $this->db->prepare("UPDATE `mvc_article` SET `title` = :title, `subtitle` = :subtitle, `content` = :content, `logo` = :logo WHERE `mvc_article`.`id` = $id ");
   if ($command->execute(array(
        ':title'         => $title,
        ':subtitle'      => $subTitle,
        ':content'       => $content,
        ':logo'          => $img
        )))
   {
$proced->status  = "success";
$proced->message = "Article was Updated";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Data was not Saved";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}

public function LabelData($index)
{
  $data  = $this->dataB::table('mvc_labeling')->where([['section_index','=',$index]])->get();
  return $data;
}


}

?>