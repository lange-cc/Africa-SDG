<?php

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 *
 */
class sdgdata extends controller
{
    function __construct()
    {
        parent::__construct();
        session:: init();
        $loged = session::get('username');
        if ($loged == false) {
            session::destroy();
            header('location: login');
            exit;
        }

        $this->view->css = array('plugins/excel-reader/css/jquery.jexcel.css');
        $this->view->js = array('plugins/excel-reader/js/jquery.jexcel.js', 'plugins/excel-reader/js/jquery.csv.min.js', 'plugins/excel-reader/js/excel-formula.min.js', 'js/sdgdata.js');
        $this->loadProfile();

    }

    public function autoload()
    {

        $this->view->controller = $this->loadcontroller;
        $this->checklink('sdgdata');
        session::unset('sdgyear');
        $this->view->lang = 'en';
        session::set('sdglang', 'en');
        $this->view->All_lang = $this->model->getLanguage();
        $this->view->year = date('Y');
        session::set('sdgyear', date('Y'));
        $this->view->render('sdgdata/index', false, $semenu = 2, $menu = 3);
    }

    public function upload()
    {
        if (session::get('sdgyear') != false && session::get('sdglang') != false) {
            $year = session::get('sdgyear');
            $lang = session::get('sdglang');
            $this->dataupload($DBsave = false, $randomName = false, '/public/excel/' .$lang.'/' . $year . '/');
        } else {
            $lang = session::get('sdglang');
            $this->dataupload($DBsave = false, $randomName = false, '/public/excel/' .$lang.'/'. date('Y') . '/');
        }

    }


    public function getValue($data, $key)
    {

        $value = array();

        $row1 = $data[$key];

        foreach ($row1 as $keydata => $var) {
            if ($keydata > 1) {
                $rowdata = $row1[$keydata];
                array_push($value, $rowdata);
            }

        }

        return json_encode($value);

    }


    public function getSdg($indicator)
    {
        $data = explode('_', $indicator);
        $value = $data[0];
        return $value;
    }

    public function getSdgTrends($indicator)
    {
        $data = explode('_', $indicator);
        $value = $data[1];
        return $value;
    }


    public function mainfileupload()
    {

        if (session::get('sdgyear') != false) {
            $year = session::get('sdgyear');
        } else {
            $year = date('Y');
        }
        $lang = session::get('sdglang');

        $inputFileName = 'public/excel/'.$lang.'/'. $year . '/Indicators-Ratings-values.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

        $data = json_decode(json_encode($sheetData));


        $indica = array();

        $row1 = $data[0];

        foreach ($row1 as $key1 => $value) {
            if ($key1 > 1) {
                $rowdata = $row1[$key1];
                array_push($indica, $rowdata);
            }

        }


        $all_data = array();

        foreach ($data as $key => $value) {

            if ($key > 0) {

                $country = $data[$key][1];

                $indicators = json_decode(json_encode($indica));
                $values = json_decode($this->getValue($data, $key));
                $final = array();

                foreach ($indicators as $ind_key => $dshjg) {


                    $validname = explode('_', $indicators[$ind_key]);
                    if (isset($validname[2])) {
                        $name = $validname[2];
                    } else {
                        $name = 'none';
                    }


                    if ($name != 'color') {
                        $row_array = array();
                        $row_array['country'] = $country;

                        $row_array['indicator'] = $indicators[$ind_key];

                        if ($values[$ind_key + 1] == '') {
                            $row_array['color'] = 'none';
                            $color = 'none';
                        } else {
                            $row_array['color'] = $values[$ind_key + 1];
                            $color = $values[$ind_key + 1];
                        }

                        if ($values[$ind_key] == '' && $values[$ind_key + 1] != '') {
                            $row_array['value'] = "-";
                            $valuedata = "-";
                        } else if ($values[$ind_key] == '') {
                            $row_array['value'] = '';
                            $valuedata = '';
                        } else if ($values[$ind_key] == 0) {
                            $row_array['value'] = 0;
                            $valuedata = 0;
                        } else {
                            $row_array['value'] = $values[$ind_key];
                            $valuedata = $values[$ind_key];
                        }

                        $row_array['sdg'] = $this->getSdg($indicators[$ind_key]);


                        $indicator = $indicators[$ind_key];
                        $sdg = $this->getSdg($indicators[$ind_key]);


                        $this->model->savedata($country, $sdg, $color, $indicator, $valuedata, $year, $lang);

                        array_push($final, $row_array);

                    }

                }

                array_push($all_data, $final);

            }
        }


//  header('Access-Control-Allow-Origin: *');
//  header("Access-Control-Allow-Headers: Content-type");
//  header("Content-type: application/json");
//  echo json_encode($all_data);

    }


    public function Score_ranking()
    {
        if (session::get('sdgyear') != false) {
            $year = session::get('sdgyear');
        } else {
            $year = date('Y');
        }
        $lang = session::get('sdglang');

        $inputFileName = 'public/excel/'.$lang.'/' . $year . '/Ranking.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

        $data = json_decode(json_encode($sheetData));


        $all_data = array();

        foreach ($data as $key => $value) {

            if ($key > 0) {

                $country = $data[$key][0];
                $country_code = $data[$key][1];
                $sdgi_score = number_format((float)$data[$key][2], 2, '.', '');
                $sdgi_rank = $data[$key][3];
                $rel_aver_index_score = number_format((float)$data[$key][4], 2, '.', '');
                $country_sub_reg = $data[$key][5];

                $row_array = array();
                $row_array['country'] = $country;
                $row_array['country-code'] = $country_code;
                $row_array['sdgi_score'] = $sdgi_score;
                $row_array['sdgi_rank'] = $sdgi_rank;
                $row_array['rel_aver_index_score'] = $rel_aver_index_score;
                $row_array['country_sub_reg'] = $country_sub_reg;

                $this->model->savecountrydata($country, $country_code, $sdgi_score, $sdgi_rank, $rel_aver_index_score, $country_sub_reg, $year, $lang);
                $this->model->savesdg($country_code, $year, $lang);
                array_push($all_data, $row_array);

            }
        }

//echo json_encode($all_data);


    }


    public function lebels()
    {
        if (session::get('sdgyear') != false) {
            $year = session::get('sdgyear');
        } else {
            $year = date('Y');
        }
        $lang = session::get('sdglang');

        $inputFileName = 'public/excel/'.$lang.'/' . $year . '/Indicators-Labels.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);
        $data = json_decode(json_encode($sheetData));

        $all_data = array();

        foreach ($data as $key => $value) {

            if ($key > 0) {

                $abrev = $data[$key][0];
                $label = $data[$key][1];

                $row_array = array();
                $row_array['abrev'] = $abrev;


                if (strpos($label, 'SO2') !== false) {
                    $text = str_replace('SO2', 'SO<sub>2</sub>', $label);
                    $row_array['label'] = $text;
                    $label = $text;
                } else if (strpos($label, 'CO2') !== false) {
                    $text = str_replace('CO2', 'CO<sub>2</sub>', $label);
                    $row_array['label'] = $text;
                    $label = $text;
                } else if (strpos($label, 'H2O') !== false) {
                    $text = str_replace('H2O', 'H<sub>2</sub>O', $label);
                    $row_array['label'] = $text;
                    $label = $text;
                } else if (strpos($label, 'm3') !== false) {
                    $text = str_replace('m3', 'm<sup>3</sup>', $label);
                    $row_array['label'] = $text;
                    $label = $text;
                } else {
                    $row_array['label'] = $label;
                    $label = $label;
                }


                $this->model->saveindicatordata($abrev, $label, $year, $lang);

                array_push($all_data, $row_array);

            }
        }

        // header('Access-Control-Allow-Origin: *');
        // header("Access-Control-Allow-Headers: Content-type");
        // header("Content-type: application/json");
        // echo json_encode($all_data);

    }


    public function ProcessSdgPerfmance()
    {
        if (session::get('sdgyear') != false) {
            $year = session::get('sdgyear');
        } else {
            $year = date('Y');
        }
        $lang = session::get('sdglang');

        $inputFileName = 'public/excel/'.$lang.'/' . $year . '/Average-perfomance.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

        $data = json_decode(json_encode($sheetData));


        $indica = array();

        $row1 = $data[0];

        foreach ($row1 as $key1 => $value) {
            if ($key1 > 1) {
                $rowdata = $row1[$key1];
                array_push($indica, $rowdata);
            }

        }


        $all_data = array();

        foreach ($data as $key => $value) {

            if ($key > 0) {

                $country = $data[$key][1];

                $indicators = json_decode(json_encode($indica));
                $values = json_decode($this->getValue($data, $key));
                $final = array();

                foreach ($indicators as $ind_key => $dshjg) {

                    $row_array = array();
                    $row_array['country'] = $country;
                    $row_array['name'] = $indicators[$ind_key];
                    if ($values[$ind_key] == null) {
                        $row_array['value'] = 0;
                        $valuedata = 0;
                    } else {
                        $row_array['value'] = number_format((float)$values[$ind_key], 2, '.', '');
                        $valuedata = number_format((float)$values[$ind_key], 2, '.', '');
                    }

                    $row_array['sdg'] = $this->getSdg($indicators[$ind_key]);


                    $indicator = $indicators[$ind_key];
                    $sdg = $this->getSdg($indicators[$ind_key]);

                    $this->model->ProcessSdgData($country, $sdg, $valuedata, $year, $lang);

                    array_push($final, $row_array);
                }

                array_push($all_data, $final);

            }
        }
    }


    public function ProcessSdgcolor()
    {
        if (session::get('sdgyear') != false) {
            $year = session::get('sdgyear');
        } else {
            $year = date('Y');
        }
        $lang = session::get('sdglang');

        $inputFileName = 'public/excel/'.$lang.'/' . $year . '/SDGs-Rating-colors.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

        $data = json_decode(json_encode($sheetData));


        $indica = array();

        $row1 = $data[0];

        foreach ($row1 as $key1 => $value) {
            if ($key1 > 1) {
                $rowdata = $row1[$key1];
                array_push($indica, $rowdata);
            }

        }


        $all_data = array();

        foreach ($data as $key => $value) {

            if ($key > 0) {

                $country = $data[$key][1];

                $indicators = json_decode(json_encode($indica));
                $values = json_decode($this->getValue($data, $key));
                $final = array();

                foreach ($indicators as $ind_key => $dshjg) {

                    $row_array = array();
                    $row_array['country'] = $country;

                    $row_array['color'] = $values[$ind_key];
                    $valuedata = $values[$ind_key];


                    $row_array['sdg'] = $this->getSdgTrends($indicators[$ind_key]);


                    $indicator = $indicators[$ind_key];
                    $sdg = $this->getSdgTrends($indicators[$ind_key]);


                    $this->model->ProcessSdgcolordata($country, $sdg, $valuedata, $year, $lang);

                    array_push($final, $row_array);
                }

                array_push($all_data, $final);

            }
        }


    }


    public function ProcessTrends()
    {
        if (session::get('sdgyear') != false) {
            $year = session::get('sdgyear');
        } else {
            $year = date('Y');
        }
        $lang = session::get('sdglang');
        $inputFileName = 'public/excel/'.$lang.'/' . $year . '/SDGs-Trends.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

        $data = json_decode(json_encode($sheetData));


        $indica = array();

        $row1 = $data[0];

        foreach ($row1 as $key1 => $value) {
            if ($key1 > 1) {
                $rowdata = $row1[$key1];
                array_push($indica, $rowdata);
            }

        }


        $all_data = array();

        foreach ($data as $key => $value) {

            if ($key > 0) {

                $country = $data[$key][1];

                $indicators = json_decode(json_encode($indica));
                $values = json_decode($this->getValue($data, $key));
                $final = array();

                foreach ($indicators as $ind_key => $dshjg) {

                    $row_array = array();
                    $row_array['country'] = $country;
                    $row_array['name'] = $indicators[$ind_key];
                    if ($values[$ind_key] == null) {
                        $row_array['value'] = '';
                        $valuedata = '';
                    } else {
                        $row_array['value'] = number_format((float)$values[$ind_key], 2, '.', '');
                        $valuedata = number_format((float)$values[$ind_key], 2, '.', '');
                    }

                    $row_array['sdg'] = $this->getSdgTrends($indicators[$ind_key]);


                    $indicator = $indicators[$ind_key];
                    $sdg = $this->getSdgTrends($indicators[$ind_key]);

                    $this->model->ProcessTrendsData($country, $sdg, $valuedata, $year, $lang);

                    array_push($final, $row_array);
                }

                array_push($all_data, $final);

            }
        }


    }

    public function getTrendSdg($indicator)
    {
        $data = explode('_', $indicator);
        $value = $data[2];
        return $value;
    }

    public function GetIndicName($indicator)
    {
        $data = explode('_', $indicator);

        $length = count($data) - 1;

        $name = '';

        for ($i = 2; $i <= $length; $i++) {
            $name .= $test1 = $data[$i] . '_';
        }


        return trim($name, '_');
    }

    public function TrendsIndic()
    {
        if (session::get('sdgyear') != false) {
            $year = session::get('sdgyear');
        } else {
            $year = date('Y');
        }
        $lang = session::get('sdglang');

        $inputFileName = 'public/excel/' .$lang.'/'. $year . '/Indicators-Trends.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

        $data = json_decode(json_encode($sheetData));


        $indica = array();

        $row1 = $data[0];

        foreach ($row1 as $key1 => $value) {
            if ($key1 > 1) {
                $rowdata = $row1[$key1];
                array_push($indica, $rowdata);
            }

        }


        $all_data = array();

        foreach ($data as $key => $value) {

            if ($key > 0) {

                $country = $data[$key][1];

                $indicators = json_decode(json_encode($indica));
                $values = json_decode($this->getValue($data, $key));
                $final = array();

                foreach ($indicators as $ind_key => $dshjg) {


                    $validname = explode('_', $indicators[$ind_key]);
                    if (isset($validname[2])) {
                        $name = $validname[2];
                    } else {
                        $name = 'none';
                    }


                    $row_array = array();
                    $row_array['country'] = $country;
                    $row_array['indicator'] = $this->GetIndicName($indicators[$ind_key]);


                    if ($values[$ind_key] == null) {
                        $row_array['value'] = '';
                        $valuedata = '';
                    } else {
                        $row_array['value'] = number_format((float)$values[$ind_key], 0, '.', '');
                        $valuedata = number_format((float)$values[$ind_key], 0, '.', '');
                    }

                    $row_array['sdg'] = $this->getTrendSdg($indicators[$ind_key]);


                    $indicator = $this->GetIndicName($indicators[$ind_key]);
                    $sdg = $this->getTrendSdg($indicators[$ind_key]);


                    $this->model->saveTrendsIndicData($country, $indicator, $valuedata, $sdg, $year, $lang);

                    array_push($final, $row_array);


                }

                array_push($all_data, $final);

            }
        }

//echo json_encode($all_data);

    }


    public function ProcessAlldata()
    {
        if (session::get('sdgyear') != false) {
            $year = session::get('sdgyear');
        } else {
            $year = date('Y');
        }
        $lang = session::get('sdglang');
        $this->model->delMaindata($lang,$year);

        $this->mainfileupload();
        $this->TrendsIndic();
        $this->Score_ranking();
        $this->lebels();
        $this->ProcessSdgPerfmance();
        $this->ProcessTrends();
        $this->ProcessSdgcolor();


        $proced = new \stdClass();
        $proced->status = "success";
        $proced->message = "<i>Processing done</i>";
        $myJSON = json_encode($proced);
        echo $myJSON;
    }


    public function getsdgfileData()
    {
        if (isset($_POST['file'])) {
            $file = $_POST['file'];
            $inputFileName = 'public/excel/' . $file;
            $spreadsheet = IOFactory::load($inputFileName);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

            $data = json_encode($sheetData);
            echo $data;
        } else {
            //do something
        }
    }


    public function year()
    {
        if (isset($this->idname)) {
            $this->view->All_lang = $this->model->getLanguage();
            $year = $this->idname;
            $this->view->year = $year;
            session::set('sdgyear', $year);
            $this->view->lang = session::get('sdglang');
            $this->checklink('sdgdata');
            $this->view->render('sdgdata/index', false, $semenu = 2, $menu = 3);
        } else {
            $this->view->All_lang = $this->model->getLanguage();
            $this->view->year = date('Y');
            $this->view->lang = session::get('sdglang');
            $this->checklink('sdgdata');
            $this->view->render('sdgdata/index', false, $semenu = 2, $menu = 3);
        }
    }


    public function lang()
    {
        if (isset($this->idname)) {
            $this->view->All_lang = $this->model->getLanguage();
            $lang = $this->idname;
            $this->view->lang = $lang;
            $this->view->year = session::get('sdgyear');
            session::set('sdglang', $lang);
            $this->checklink('sdgdata');
            $this->view->render('sdgdata/index', false, $semenu = 2, $menu = 3);
        } else {
            $this->view->All_lang = $this->model->getLanguage();
            $this->view->year = session::get('sdgyear');
            $this->view->lang = "en";
            $this->checklink('sdgdata');
            $this->view->render('sdgdata/index', false, $semenu = 2, $menu = 3);
        }
    }

}


