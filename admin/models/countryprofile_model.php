<?php
/**
* 
*/
class countryprofile_model extends model
     {
	     function __construct()
	        {
	           parent::__construct();
	        }
public function getreportData($year)
    {
     $allData = array();
     $country = $this->dataB::table('country')->select('id','country_name','country_sub_reg','sdgi_score','sdgi_rank','rel_aver_index_score','country_code')->get();
foreach ($country as $key => $value) {
  $data   = array();
  $c_code = $country[$key]->country_code;
  $name   = $country[$key]->country_name;

  
  $data['title']         = $name.' country profile ';
  $data['code']          = $c_code;
   
   if (file_exists('../public/Report/'.$year.'/'.$c_code.'.pdf')) 
     {
     $filesize       = filesize ('../public/Report/'.$year.'/'.$c_code.'.pdf');
     $data['status'] = 'exist';  
     }
     else
     {
       $filesize = '0kb';
       $data['status'] = 'not-exist';  
     }
  
    $data['file']          = 'public/Report/'.$year.'/'.$c_code.'.pdf';
    $data['size']          = $this->size_as_kb($filesize);

  array_push($allData,$data);
        }
 
 return json_encode($allData);

     }

public function size_as_kb($yoursize) {
   if($yoursize < 1024) {
    return "{$yoursize} bytes";
    } elseif($yoursize < 1048576) {
    $size_kb = round($yoursize/1024);
    return "{$size_kb} KB";
  } else {
    $size_mb = round($yoursize/1048576, 1);
    return "{$size_mb} MB";
  }
  }



   }
?>