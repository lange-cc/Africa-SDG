<?php
/**
* 
*/
class inbox_model extends model
{
  
  function __construct()
  {
    parent::__construct();
  }
  public function logout()
  {
      header('location: ../../login/');
  }
public function sendnewmail($mail_from,$mail_to,$subject,$content)
  {
    $proced = new \stdClass();
      $command = $this->db->prepare("INSERT INTO `mvc_message` (`id`, `names`, `mail_to`, `mail_from`, `subject`, `content`, `status`, `type`, `reply_id`, `date`) VALUES (NULL,:names, :mail_to, :mail_from, :subject, :content, :status, :type, :reply_id, now())");
  if ($command->execute(array(
    ':names'     => OWNER_NAME,
    ':mail_to'   => $mail_to,
    ':mail_from' => $mail_from,
    ':subject'   => $subject,
    ':content'   => $content,
    ':status'    => 1,
    ':type'      => 'sent',
    ':reply_id'  => '0'
            ))) 
  {

$to      = $mail_to;
$subject = $subject;
$from    = $mail_from;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();

$message = $content;
// Sending email

if(mail($to, $subject, $message, $headers))
{
$proced->status  = "success";
$proced->message = "Email sent";
$myJSON = json_encode($proced);
echo $myJSON;
}
else
{
$proced->status  = "fail";
$proced->message = "Failed to send the mail, Try again.";
$myJSON = json_encode($proced);
echo $myJSON;
}

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to send the mail, Try again.";
$myJSON = json_encode($proced);
echo $myJSON;
  }
   }
  

public function sendmail($mail_from,$mail_to,$subject,$content,$reply_id)
 {
    $proced = new \stdClass();
      $command = $this->db->prepare("INSERT INTO `mvc_message` (`id`, `names`, `mail_to`, `mail_from`, `subject`, `content`, `status`, `type`, `reply_id`, `date`) VALUES (NULL,:names, :mail_to, :mail_from, :subject, :content, :status, :type, :reply_id, now())");
  if ($command->execute(array(
    ':names'     => OWNER_NAME,
    ':mail_to'   => $mail_to,
    ':mail_from' => $mail_from,
    ':subject'   => $subject,
    ':content'   => $content,
    ':status'    => 1,
    ':type'      => 'sent',
    ':reply_id'  => $reply_id
            ))) 
  {


$to      = $mail_to;
$subject = $subject;
$from    = $mail_from;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();

$message = $content;
// Sending email

if(mail($to, $subject, $message, $headers))
{
$proced->status  = "success";
$proced->message = "Email sent";
$myJSON = json_encode($proced);
echo $myJSON;
}
else
{
$proced->status  = "fail";
$proced->message = "Failed to send the mail, Try again.";
$myJSON = json_encode($proced);
echo $myJSON;
}

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to send the mail, Try again.";
$myJSON = json_encode($proced);
echo $myJSON;
  }
   }

public function FindData($type)
{
 $command = $this->db->prepare("SELECT * FROM `mvc_message` WHERE type = :type");
 $command->setFetchMode(PDO::FETCH_ASSOC);
 $command->execute(array(':type' => $type ));
 $data = $command->fetchAll();

  if ($command->rowCount() > 0) 
    {
   $myJSON = json_encode($data);
    return $myJSON;
    }
}

public function readfromid($id)
{
$command1 = $this->db->prepare("UPDATE `mvc_message` SET `status` = '1' WHERE `mvc_message`.`id` = $id");
$command1->execute();
$command = $this->db->prepare("SELECT * FROM `mvc_message` WHERE id = :id");
$command->execute(array(':id' => $id));
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id']        = $row['id'];
        $row_array['names']     = $row['names']; 
        $row_array['mail_to']   = $row['mail_to']; 
        $row_array['mail_from'] = $row['mail_from']; 
        $row_array['subject']   = $row['subject'];
        $row_array['content']   = $row['content'];
        $row_array['status']    = $row['status'];
        $row_array['type']      = $row['type'];
        $row_array['reply_id']  = $row['reply_id'];
        $row_array['date']      = date('M j Y g:i A', strtotime($row['date']));
        array_push($json_response, $row_array);
}
return json_encode($json_response);
}
}

   public function Delete($id)
   {
 $proced = new \stdClass();
 $command = $this->db->prepare("DELETE FROM `mvc_message` WHERE `mvc_message`.`id` = :id");
  if ($command->execute(array(':id' => $id ))) {
$proced->status   = "success";
$proced->message = "Message successfully Deleted";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else{
$proced->status  = "fail";
$proced->message = "Failed to delete the account";
$myJSON = json_encode($proced);
echo $myJSON;
  }
   }

public function Find($id)
{

$command1 = $this->db->prepare("UPDATE `mvc_message` SET `status` = '1' WHERE `mvc_message`.`id` = $id");
$command1->execute();

$command = $this->db->prepare("SELECT * FROM `mvc_message` WHERE id = $id");
 $command->execute();
    $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id']        = $row['id'];
        $row_array['names']     = $row['names']; 
        $row_array['mail_to']   = $row['mail_to']; 
        $row_array['mail_from'] = $row['mail_from']; 
        $row_array['subject']   = $row['subject'];
        $row_array['content']   = $row['content'];
        $row_array['status']    = $row['status'];
        $row_array['type']      = $row['type'];
        $row_array['reply_id']  = $row['reply_id'];
        $row_array['date']      = date('M j Y g:i A', strtotime($row['date']));
        array_push($json_response, $row_array);
}
echo json_encode($json_response);
}
}

public function update($f_name,$l_name,$day,$mouth,$year,$sex,$location,$image,$email,$password,$id)
{
 $proced = new \stdClass();
$command = $this->db->prepare("UPDATE `mvc_site_accounts` SET `f_name` = :f_name, `l_name` = :l_name, `dd` = :dd, `mm` = :mm, `yyy` = :yyy,`sex` = :sex, `location` = :location, `email` = :email, `password` = :password, `logo` = :logo WHERE `mvc_site_accounts`.`id` = $id");
  if ($command->execute(array(
          ':f_name'   => $f_name,
          ':l_name'   => $l_name,
          ':dd'       => $day,
          ':mm'       => $mouth,
          ':yyy'      => $year,
          ':sex'      => $sex,
          ':location' => $location,
          ':email'    => $email,
          ':password' => $password,
          ':logo'     => $image

            ))) 
  {
$proced->status   = "success";
$proced->message = "Account successfully updated";
$myJSON = json_encode($proced);
echo $myJSON;

  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to update the account";
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

 
public function numberofunread()
{
  $proced = new \stdClass();
 $command = $this->db->prepare("SELECT * FROM `mvc_message` WHERE status=:status AND type=:type");
  if ($command->execute(array(
    ':status' => 0,
    ':type'   => 'inbox'
     
    ))) {
if($command->rowCount()  > 0)
{ 
  $number =  $command->rowCount();
$proced->number  = $number;
$myJSON = json_encode($proced);
echo $myJSON;
}
else
{
$number = 0;
$proced->number  = $number;
$myJSON = json_encode($proced);
echo $myJSON;
}

  }
  
}

public function numberofinbox()
{
  $proced = new \stdClass();
 $command = $this->db->prepare("SELECT * FROM `mvc_message` WHERE type=:type");
  if ($command->execute(array(
    ':type'   => 'inbox'
     
    ))) {
if($command->rowCount()  > 0)
{ 
  $number =  $command->rowCount();
$proced->number  = $number;
$myJSON = json_encode($proced);
echo $myJSON;
}
else
{
$number = 0;
$proced->number  = $number;
$myJSON = json_encode($proced);
echo $myJSON;
}

  }
}
public function numberofsent()
{
  $proced = new \stdClass();
 $command = $this->db->prepare("SELECT * FROM `mvc_message` WHERE type=:type");
  if ($command->execute(array(
    ':type'   => 'sent'
     
    ))) {
if($command->rowCount()  > 0)
{ 
  $number =  $command->rowCount();
$proced->number  = $number;
$myJSON = json_encode($proced);
echo $myJSON;
}
else
{
$number = 0;
$proced->number  = $number;
$myJSON = json_encode($proced);
echo $myJSON;
}

  }
}




public function loadnewsms()
{
 $command = $this->db->prepare("SELECT * FROM `mvc_message` WHERE status=:status AND type=:type");
 $command->setFetchMode(PDO::FETCH_ASSOC);
 $command->execute(array(
    ':status' => 0,
    ':type'   => 'inbox'
    ));
 $json_response = array(); //Create an array
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
        $row_array = array();
        $row_array['id']        = $row['id'];
        $row_array['names']     = $row['names']; 
        $row_array['mail_to']   = $row['mail_to']; 
        $row_array['mail_from'] = $row['mail_from']; 
        $row_array['subject']   = $row['subject'];
        $row_array['content']   = $row['content'];
        $row_array['status']    = $row['status'];
        $row_array['type']      = $row['type'];
        $row_array['reply_id']  = $row['reply_id'];
        $row_array['date']      = $this->get_timeago($row['date']);
        array_push($json_response, $row_array);
}
echo json_encode($json_response);
}
else
{
$proced = new \stdClass(); 
$proced->status  = 'nothing';
$myJSON = json_encode($proced);
echo $myJSON;
}
}

 }