<?php
/**
* 
*/
class ControllermModel extends model 
{
	
	function __construct()
	{
	 	 parent::__construct();
	}

public function randomnumber($length = 15) {
    $characters = '3456013454563456345345634566734568962345634563445634563453445634563453456345664563456345345634566734568973456895634566734568953456345667345689';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


public function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

public function detectDevice(){
  $userAgent = $_SERVER["HTTP_USER_AGENT"];
  $devicesTypes = array(
        "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
        "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
        "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
        "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
    );
  foreach($devicesTypes as $deviceType => $devices) {
        foreach($devices as $device) {
            if(preg_match("/" . $device . "/i", $userAgent)) {
                $deviceName = $deviceType;
            }
        }
    }
    return ucfirst($deviceName);
  }

public function GetUserData($token)
{
      $data  = $this->db::table('w_users')->select('id','name','profile_img','user_index')->where([['user_token','=',$token]])->get();
      return $data;
}

}

?>