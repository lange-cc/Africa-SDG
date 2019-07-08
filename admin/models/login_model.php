<?php
/**
* 
*/
class login_model extends model
{
	
	function __construct()
	{
		parent::__construct();
     
	}

	public function match($email,$pass)
	{
    $login = $this->db->prepare("SELECT * FROM `login` WHERE email = :email AND password = :pass");
    $login->execute(array(
    	':email' => $email,
    	':pass' => $pass
    	));
    if($login->rowCount() > 0) {
    	 session:: init();
    	 session::set('username',$email);
       session::set('password',$pass);
    	
$proced = new \stdClass();
$proced->status  = "success";
$proced->user    = $email;
$proced->message = "Welcome, Redirecting...";
$myJSON = json_encode($proced);
echo $myJSON;
    	
    }
    else
    {
$proced = new \stdClass();
$proced->status  = "fail";
$proced->message = "Incorrect username or password";
$myJSON = json_encode($proced);
echo $myJSON;
    }	
}


public function Create($name,$email,$pass,$index)
{
     $proced = new \stdClass();
    $command = $this->db->prepare("INSERT INTO `login` (`id`, `name`, `username`, `password`, `email`, `index`, `logo`, `cover_logo`) VALUES (NULL, :name, :username, :password, :email, :index, :logo, :coverLogo)");
  if ($command->execute(array(
          ':name'      => $name,
          ':username'  => 'none',
          ':password'  => $pass,
          ':email'     => $email,
          ':index'     => $index,
          ':logo'      => 'none',
          ':coverLogo' => 'none'
         
            ))) 
  {

    
$to      = $email;
$subject = 'You have created account in lange admin panel';
$from    = 'info@lange.rw';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();

$message = 'This is your Email (<b>'.$email.'</b>) and password(<b>'.$pass.'</b>), please make it secure do not share to anyone.';
// Sending email

if(mail($to, $subject, $message, $headers))
{
$proced->status   = "success";
$proced->message = "Thank you for creating an account";
$myJSON = json_encode($proced);
echo $myJSON;
}
  }
  else
  {
$proced->status  = "fail";
$proced->message = "Failed to create the account or may be taken, try again.";
$myJSON = json_encode($proced);
echo $myJSON;
  }
}


public function GetPassword($email)
{
 $command = $this->db->prepare("SELECT * FROM `login` WHERE email = :email ");
 $command->execute(array(':email' => $email ));
if($command->rowCount()  > 0)
{ 
     while ($row = $command->fetch(PDO::FETCH_ASSOC)) 
     {
       
      $password  = $row['password']; 
     }
return $password;
}
else
{
  return 'none';
}

}


public function Verfy($email)
{
 $proced = new \stdClass();
 $command = $this->db->prepare("SELECT * FROM `login` WHERE email = :email ");
 $command->execute(array(':email' => $email ));

if ($command->rowCount() > 0) 
    {
    
$to      = $email;
$subject = 'lange admin panel account';
$from    = 'info@lange.rw';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();

$message = 'This is your Password ('.$this->GetPassword($email).') for your account('.$email.')';
// Sending email

if(mail($to, $subject, $message, $headers))
{
$proced->status  = "success";
$proced->message = "Check your Email, Your password  already sent";
$myJSON = json_encode($proced);
echo $myJSON;
}
else
{
$proced->status  = "fail";
$proced->message = "Error in contacting your email, Try again";
$myJSON = json_encode($proced);
echo $myJSON;
}


   }
   else
   {
$proced->status  = "fail";
$proced->message = "This account does not belong to our database";
$myJSON = json_encode($proced);
echo $myJSON;
   }

}

}	

?>