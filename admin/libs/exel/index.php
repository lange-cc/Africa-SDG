<?php


use PhpOffice\PhpSpreadsheet\IOFactory;

require __DIR__ . '/Header.php';

$inputFileName = __DIR__ .'/final_file.xlsx';
//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = IOFactory::load($inputFileName);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

$data = json_decode(json_encode($sheetData));


function getValue($data,$key)
{

 $value = array();

 $row1 = $data[$key];

  foreach ($row1 as $keydata => $var) {
  	if ($keydata>1) {
  	   $rowdata = $row1[$keydata];
       array_push($value, $rowdata);
  	}
       
    }

  return json_encode($value);  
   
}


function getSdg($indicator)
{
  $data = explode('_', $indicator);
  $value = $data[0];
  return   $value;
}


  $indica = array();

  $row1 = $data[0];

  foreach ($row1 as $key1 => $value) {
  	if ($key1>1) {
  	   $rowdata = $row1[$key1];
       array_push($indica, $rowdata);
  	}
       
 }





$all_data = array();

foreach ($data as $key => $value) {
	
	if ($key > 0) {

		$country = $data[$key][1];
	   
        $indicators = json_decode(json_encode($indica));
        $values     = json_decode(getValue($data,$key));
        $final      = array();

        foreach ($indicators as $ind_key => $dshjg) {

        	$row_array = array();
        	$row_array['country']   = $country;
        	$row_array['indicator'] = $indicators[$ind_key];
        	if ($values[$ind_key] == null) 
        	{
        		$row_array['value'] = 0;
        	}
        	else
        	{
        	    $row_array['value'] = $values[$ind_key];	
        	}
        	
        	$row_array['sdg']       = getSdg($indicators[$ind_key]);
        	 
        	array_push($final, $row_array);  
        }

         array_push($all_data, $final);

	}
}



 echo json_encode($all_data);
