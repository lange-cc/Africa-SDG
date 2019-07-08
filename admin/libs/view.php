<?php

/**
* 
*/
class view extends Mistake
{
	
	function __construct()
	{
		parent::__construct();

	}
	public function render($name,$noinclude=false,$semenu,$menu)
	{
	    if ($noinclude == true) 
	   {
       	 require 'views/'.$name.'.php';
       }
       else
       {
	    require 'views/commonpage/header.php';
        require 'views/'.$name.'.php';
        require 'views/commonpage/upload.php';
        require 'views/commonpage/footer.php';
       }
	}

public function CutText($length,$data){
      // strip tags to avoid breaking any html
$string = strip_tags(htmlspecialchars_decode($data, ENT_NOQUOTES));

if (strlen($string) > $length) {

    // truncate string
    $stringCut = substr($string, 0, $length);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
}
return $string;
   
}

public function date($date,$format)
{
  return date($format, strtotime($date));
}

public function get_timeago($ptime)
{
    $time_ago = strtotime($ptime);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}

}

?>