<?php
/**
*
*/
class language_model extends model
{

	function __construct()
	{
	  parent::__construct();
	}




public function addnew($name,$abrev,$type)
	{
$proced = new \stdClass();
$command = $this->db->prepare("INSERT INTO `mvc_language` (`id`, `name`, `abreviation`, `type`) VALUES (NULL, :name, :abrev, :type)");
  if ($command->execute(array(
    	    ':name'  => $name,
    	    ':abrev' => $abrev,
    	    ':type'  => $type
            )))
  {
$proced->status  = "success";
$proced->message = "Language successfully added";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to add the Language";
$myJSON = json_encode($proced);
echo $myJSON;
  }

}


public function Showlanguage()
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
        $row_array['abreviation '] = $row['abreviation'];
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

   public function Delete($id)
   {
 $proced = new \stdClass();
 $command = $this->db->prepare("DELETE FROM `mvc_language` WHERE `mvc_language`.`id` = :id");
  if ($command->execute(array(':id' => $id ))) {
$proced->status  = "success";
$proced->message = "Data successfully Delete";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else{
$proced->status  = "fail";
$proced->message = "Failed to delete Data";
$myJSON = json_encode($proced);
echo $myJSON;
  }
   }

public function DeleteKeyword($id)
{
   $proced = new \stdClass();
 $command = $this->db->prepare("DELETE FROM `mvc_lang_keywords` WHERE `mvc_lang_keywords`.`id` = :id");
  if ($command->execute(array(':id' => $id ))) {
$proced->status  = "success";
$proced->message = "Data successfully Delete";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else{
$proced->status  = "fail";
$proced->message = "Failed to delete Data";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}

public function findlanguage($id)
{

$command = $this->db->prepare("SELECT * FROM `mvc_language` WHERE id = $id ");
$command->execute();
$json_response = array(); //Create an array
if($command->rowCount()  > 0)
{
     while ($row = $command->fetch(PDO::FETCH_ASSOC))
     {
        $row_array = array();
        $row_array['id']    = $row['id'];
        $row_array['name']  = $row['name'];
        $row_array['abrev'] = $row['abreviation'];
        $row_array['type']  = $row['type'];


array_push($json_response, $row_array);
}

echo json_encode($json_response);
}
}



public function update($name,$abrev,$type,$id)
{
  if ($type == 'default') {

$command = $this->db->prepare("UPDATE `mvc_language` SET  `type` = 'other'");
  if($command->execute())
  {
    $this->LanguageUpdate($name,$abrev,$type,$id);
  }

  }
  else
  {
    $this->LanguageUpdate($name,$abrev,$type,$id);
  }

}



public function LanguageUpdate($name,$abrev,$type,$id)
{
  $proced = new \stdClass();
$command = $this->db->prepare("UPDATE `mvc_language` SET `name` = :name, `abreviation` = :abrev, `type` = :type WHERE `mvc_language`.`id` = $id");
  if ($command->execute(array(
          ':name'  => $name,
          ':abrev' => $abrev,
          ':type'  => $type
            )))
  {
$proced->status   = "success";
$proced->message = "Language successfully updated";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to update Language";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}

public function GetlanguageAbrev($id)
{
$command = $this->db->prepare("SELECT * FROM `mvc_language` WHERE id = $id ");
$command->execute();
$json_response = array(); //Create an array
if($command->rowCount()  > 0)
{
     while ($row = $command->fetch(PDO::FETCH_ASSOC))
     {
        $abrev = $row['abreviation'];
     }
return $abrev;
}
}

public function Addnewkeyword($keyword,$key,$abrev,$langId)
{
  $proced = new \stdClass();
  $status = $this->Checkifkeyexist($key,$keyword,$abrev);

if ($status == 1) {
$proced->status  = "fail";
$proced->message = "Failed to add the keyword, it is already in the system.";
$myJSON = json_encode($proced);
echo $myJSON;
  }
  else if($status == 0)
  {
$command = $this->db->prepare("INSERT INTO `mvc_lang_keywords` (`id`, `lang_id`, `keyword`, `keytext`, `abreviation`) VALUES (NULL, :langId, :keyword, :key, :abrev)");
  if ($command->execute(array(
          ':langId'  => $langId,
          ':keyword' => $keyword,
          ':key'     => $key,
          ':abrev'   => $abrev
            )))
  {
$proced->status  = "success";
$proced->message = "keyword successfully added";
$proced->key     = $key;
$proced->keyword = $keyword;
$proced->id = $this->getlangkeyid($key,$keyword);
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to add the keyword";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}
}



public function GetLanguage($id)
{
  $command = $this->db->prepare("SELECT * FROM `mvc_language` WHERE id = $id ");
$command->execute();
$json_response = array(); //Create an array
if($command->rowCount()  > 0)
{
     while ($row = $command->fetch(PDO::FETCH_ASSOC))
     {
        $row_array = array();
        $row_array['id']    = $row['id'];
        $row_array['name']  = $row['name'];
        $row_array['abrev'] = $row['abreviation'];
        $row_array['type']  = $row['type'];
        $id                 = $row['id'];

        $row_array['keywords'] = $this->GetKeywords($id);
       

array_push($json_response, $row_array);
}

return json_encode($json_response);
}
}



public function GetKeywords($id)
{
$command = $this->db->prepare("SELECT * FROM `mvc_lang_keywords` WHERE lang_id = $id ");
$command->execute();
$json_response = array(); //Create an array
if($command->rowCount()  > 0)
{
while ($row = $command->fetch(PDO::FETCH_ASSOC))
{
        $row_array = array();
        $row_array['id']       = $row['id'];
        $row_array['lang_id']  = $row['lang_id'];
        $row_array['keyword']  = $row['keyword'];
        $row_array['key']      = $row['keytext'];
        $row_array['abrev']    = $row['abreviation'];

array_push($json_response, $row_array);
}
return $json_response;
}
else
{
  return 'none';
}
}


public function GetId()
{
$command = $this->db->prepare("SELECT * FROM `mvc_language` WHERE type = 'default'");
$command->execute();
if($command->rowCount()  > 0)
{
while ($row = $command->fetch(PDO::FETCH_ASSOC))
{
        $id        = $row['id'];
}
return $id;
}
}

public function getlangkeyid($key,$keyword)
{
$command = $this->db->prepare("SELECT * FROM `mvc_lang_keywords` WHERE keytext = :key AND keyword =:keyword");
$command->execute(array(':key' => $key,':keyword'=>$keyword));
if($command->rowCount()  > 0)
{
while ($row = $command->fetch(PDO::FETCH_ASSOC))
{
        $id        = $row['id'];
}
return $id;
}
else
{
  return 0;
}
}


public function Checkifkeyexist($key,$keyword,$abrev)
{
  $command = $this->db->prepare("SELECT * FROM `mvc_lang_keywords` WHERE abreviation = :abrev AND keytext = :key");
$command->execute(array(':abrev' => $abrev,':key' => $key));
if($command->rowCount()  > 0)
{
  return 1;
}
else
{
  return 0;
}
}

public function updatekeyword($keyword,$key,$id)
{
    $proced = new \stdClass();
$command = $this->db->prepare("UPDATE `mvc_lang_keywords` SET `keyword` = :keyword, `keytext` = :key WHERE `mvc_lang_keywords`.`id` = $id");
  if ($command->execute(array(
          ':keyword'  => $keyword,
          ':key'      => $key
            )))
  {
$proced->status   = "success";
$proced->message = "Saved";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}


public function copy($DefaultlangId,$EditlangId,$abrev)
{
  
$command = $this->db->prepare("SELECT * FROM `mvc_lang_keywords` WHERE lang_id = $DefaultlangId");
$command->execute();
$json_response = array(); //Create an array
if($command->rowCount()  > 0)
{
while ($row = $command->fetch(PDO::FETCH_ASSOC))
{
$keyword = $row['keyword'];
$key     = $row['keytext'];
$this->Addnewkeyword($keyword,$key,$abrev,$EditlangId);   
}

}

}


// ========================================= copy content section ==============================


public function CopyData($lang)
{
  if ($this->copy1($lang) && $this->copy2($lang)) {
      $proced = new \stdClass();
      $proced->status   = "success";
      $proced->message  = "All language data copied";
      $myJSON = json_encode($proced);
      echo $myJSON;
  }
  else
  {
      $proced = new \stdClass();
      $proced->status   = "fail";
      $proced->message  = "All language data not copied";
      $myJSON = json_encode($proced);
      echo $myJSON;
  }
   
   
}


public function copy1($lang)
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
    return true;
 }
}
else
{          
  $this->addArticle($title,$subtitle,$logo,$content,$section_index,$article_index,$lang);
   if ($num == $command2->rowCount()) {
     return true;
   }

}


     }
   }
   else
   {
      return true;// No data available to copy
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

public function copy2($lang)
{
$command2 = $this->db->prepare("SELECT * FROM `sdg_report` WHERE lang = 'en' ");
 $command2->execute();
if($command2->rowCount()  > 0)
{ 
  $num  = 0;
     while ($row2 = $command2->fetch(PDO::FETCH_ASSOC)) 
     {
 $num  = $num + 1;

       
                $id       = $row2['id'];
                $title    = $row2['title'];
                $file     = $row2['file'];
                $content  = $row2['content'];
                $year     = $row2['year'];
                $index    = $row2['r_index'];
                
$command = $this->db->prepare("SELECT * FROM `sdg_report` WHERE lang = :lang AND r_index = :index");
$command->execute(array(
  ':lang'  => $lang,
  ':index' => $index
  ));
if($command->rowCount()  > 0)
{
  if ($num == $command2->rowCount()) {
     return true;
}
}
else
{  

  $this->AddnewData($title,$file,$content,$year,$index,$lang);

    if ($num == $command2->rowCount()) 
      {
          return true;
      }

}
     }
   }
   else
   {
    return true; // no data to copy
   }
}





















 }
