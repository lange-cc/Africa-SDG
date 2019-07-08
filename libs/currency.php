<?php


//  if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
//     {
//       $ip=$_SERVER['HTTP_CLIENT_IP'];
//     }
//     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
//     {
//       $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
//     }
//     else
//     {
//       $ip=$_SERVER['REMOTE_ADDR'];
//     }


// $details  =   ip_details("$ip");
  
if (isset($details->country)) {
	if($details->country == 'RW')
	{
		  if(!isset($_COOKIE['currency'])) {
    define('CURR','RW');
   } 
   else if (empty($_COOKIE['currency'])) {
	define('CURR','RW');
   } 
   else
   {
    define('CURR',$_COOKIE['currency']);
    }
       
    }
else
{
   if(!isset($_COOKIE['currency'])) {
    define('CURR','usd');
   } 
   else if (empty($_COOKIE['currency'])) {
	define('CURR','usd');
   } 
   else
   {
    define('CURR',$_COOKIE['currency']);
    }

}

}
else
{
   if(!isset($_COOKIE['currency'])) {
    define('CURR','usd');
} 
else if (empty($_COOKIE['currency'])) {
	define('CURR','usd');
} 
else
{
    define('CURR',$_COOKIE['currency']);
}

}

