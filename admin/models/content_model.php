<?php
/**
* 
*/
class content_model extends model
{
	
	function __construct()
	{
	  parent::__construct();
	}
	public function addContent($type,$content,$index)
	{
		  $command = $this->db->prepare("INSERT INTO `mvc_main_site_content` (`id`, `type`, `content`, `cont_index`) VALUES (NULL, :type, :content, :index)");
          if ($command->execute(array(
    	    ':type'    => $type,
    	    ':content' => $content,
    	    ':index'   => $index
            ))) 
          {
          #json	
$proced = new \stdClass();
$proced->status   = "success";
$proced->message = "Data successfully saved";

$proced->type = $type;
$proced->content = $content;
$proced->index = $index;


$myJSON = json_encode($proced);
echo $myJSON;

          } 
         else
         {
   	        #json
         }
   }

   public function FindData()
   {
 $command = $this->db->prepare("SELECT * FROM `mvc_main_site_content` ORDER BY `mvc_main_site_content`.`id` DESC");

 	 $command->setFetchMode(PDO::FETCH_ASSOC);
 	 $command->execute();
     $data = $command->fetchAll();

      if ($command->rowCount() > 0) 
    {
 	 $myJSON = json_encode($data);
    return $myJSON;
    }


   }

   public function delete($val)
   {
 $proced = new \stdClass();
 $command = $this->db->prepare("DELETE FROM `mvc_main_site_content` WHERE cont_index = :index");
 	if ($command->execute(array(':index' => $val ))) {
$proced->status   = "success";
$proced->message = "Data successfully Deleted";
$myJSON = json_encode($proced);
echo $myJSON;

 	}
 	else{
$proced->status   = "fail";
$proced->message = "Failed to delete data";
$myJSON = json_encode($proced);
echo $myJSON;
 	}
   }

   public function Findcontent($id)
   {
   $command = $this->db->prepare("SELECT * FROM `mvc_main_site_content` WHERE id = $id");
   $command->setFetchMode(PDO::FETCH_ASSOC);
   $command->execute();
   $data = $command->fetchAll();

   if ($command->rowCount() > 0) 
    {
   $myJSON = json_encode($data);
    echo $myJSON;
    }
   }
   public function update($type,$content,$id)
   {
    $proced = new \stdClass();
      $command = $this->db->prepare("UPDATE `mvc_main_site_content` SET `type` = :type, `content` = :content WHERE `mvc_main_site_content`.`id` = $id");
          if ($command->execute(array(
          ':type'    => $type,
          ':content' => $content
            ))) 
          {
$proced->status   = "success";
$proced->message = "Data successfully Updated";
$myJSON = json_encode($proced);
echo $myJSON;

          } 
         else
         {
$proced->status   = "fail";
$proced->message = "Failed to Updated data";
$myJSON = json_encode($proced);
echo $myJSON;
         }
   }
	
	

public function copyData($lang)
{
$command2 = $this->db->prepare("SELECT * FROM `mvc_article` WHERE lang = 'en' ");
 $command2->execute();
if($command2->rowCount()  > 0)
{ 
  $num  = 0;
     while ($row2 = $command2->fetch(PDO::FETCH_ASSOC)) 
     {
 $num  = $num + 1;

       
                $id            = $row2['id'];
                $title         = $row2['title'];
                $subtitle      = $row2['subtitle'];
                $content       = $row2['content'];
                $article_index = $row2['article_index'];
                $logo          = $row2['logo'];
                $section_index = $row2['section_index'];
       
$command = $this->db->prepare("SELECT * FROM `mvc_article` WHERE lang = :lang AND article_index = :index");
$command->execute(array(
  ':lang'  => $lang,
  ':index' => $article_index
  ));
if($command->rowCount()  > 0)
{
if ($num == $command2->rowCount()) {
$proced = new \stdClass();
$proced->status  = "success";
$proced->message = "All data successfully Updated";
$myJSON = json_encode($proced);
echo $myJSON;
}
}
else
{          
  $this->addArticle($title,$subtitle,$logo,$content,$section_index,$article_index,$lang);
if ($num == $command2->rowCount()) {
$proced = new \stdClass();
$proced->status  = "success";
$proced->message = "All data successfully saved";
$myJSON = json_encode($proced);
echo $myJSON;
}

}


     }
   }
   else
   {
    echo "no data";
   }
}

  public function addArticle($title,$subTitle,$img,$content,$section_index,$article_index,$lang)
  {
   $command = $this->db->prepare("INSERT INTO `mvc_article` (`id`, `title`, `subtitle`, `content`, `article_index`, `logo`, `section_index`, `lang`) VALUES (NULL, :title, :subtitle, :content, :article_index, :logo, :section_index, :lang)");
   if ($command->execute(array(
        ':title'         => $title,
        ':subtitle'      => $subTitle,
        ':content'       => $content,
        ':article_index' => $article_index,
        ':logo'          => $img,
        ':section_index' => $section_index,
        ':lang'          => $lang

        )))
   {}
  else
  {
  }


  }



}
?>