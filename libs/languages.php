<?php
// function ip_details($IPaddress) 
// {
//     $json       = file_get_contents("http://ipinfo.io/{$IPaddress}");
//     $details    = json_decode($json);
//     return $details;
// }

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
   if(!isset($_COOKIE['lang'])) {
    define('LANG','RW');
     } 
     else if (empty($_COOKIE['lang'])) {
	define('LANG','RW');
    } 
    else
    {
    define('LANG',$_COOKIE['lang']);
    }
       
    }
else
{
    if(!isset($_COOKIE['lang'])) {
    define('LANG','en');
     } 
     else if (empty($_COOKIE['lang'])) {
	define('LANG','en');
    } 
    else
    {
    define('LANG',$_COOKIE['lang']);
    }
}

}
else
{
    if(!isset($_COOKIE['lang'])) {
    define('LANG','en');
     } 
     else if (empty($_COOKIE['lang'])) {
	define('LANG','en');
    } 
    else
    {
    define('LANG',$_COOKIE['lang']);
    }
}

