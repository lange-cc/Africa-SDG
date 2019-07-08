<?php
/**
*
*/

/**
* 
*/
class email
{
  
  function __construct()
  {
    $this->db = new database();  
  }


public function checkout($email,$user_f_name,$user_l_name,$client_code)
 {
$names  = $user_f_name." ".$user_l_name;
$code   = $client_code;
$status = $this->FindMailAndSend(8,$email,$names,$code);
if ($status == 1) 
{
return 1;
} 
else 
{
  return 0;
}
}

public  function reg($lname,$email)
{
$names  = $lname;
$status = $this->FindMailAndSend(10,$email,$names,'');
if ($status == 1) 
{
return 1;
} 
else 
{
return 0;
}

}



public function FindMailAndSend($id,$email,$names,$code)
{
$command = $this->db->prepare("SELECT * FROM `mvc_mail` WHERE id = $id");
$command->execute();
if($command->rowCount()  > 0)
{
while ($row = $command->fetch(PDO::FETCH_ASSOC))
 {
      
    $subject = $row['subject'];
    $content = $row['content'];
}

$data = preg_replace('{{{username}}}', $names, $content);
$content = preg_replace('{{{client-code}}}', $code, $data);

    $to      = $email; // Send email to our user
    $subject = $subject; // Give the email a subject
    $message = $content;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Nilefy.com <info@nilefy.com>" . "\r\n"."X-MSMail-Priority: High". "\r\n";
  if( mail($to,$subject,$message,$headers)){
    return 1;
  } else {
    return 0;
  }

 }
 else
 {
   return 0;
 }
}

}
?>
