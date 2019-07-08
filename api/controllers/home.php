<?php

class home extends controller
{
    function __construct()
    {
        parent::__construct();
        $postData = file_get_contents('php://input');
        $this->data = json_decode($postData);

    }

    public function autoload()
    {
        if(isset($_COOKIE['lang']))
        {
            $this->sdglang = $_COOKIE['lang'];
        }
        else
        {
            $this->sdglang = 'en';
        }
        session::init();
        if(session::getdata('year')){
            $this->year = session::get('year');
        }else{
            if($this->model->yearExist(date('Y'), $this->sdglang )){
                $this->year = date('Y');
            }else {
                $this->year = date('Y')-1;
            }
        }
    }

    public function profile()
    {
        $year  =    $this->year;
        $data = $this->data;
        if (!empty($data)) {
            if (isset($data->country)) {
                $country_code = $data->country;
                $this->model->getprofiledata($country_code, $year,$this->sdglang);
            }
        }

    }


    public function dashboard()
    {
        $year =    $this->year;
        $this->model->getDashboardData($year,$this->sdglang);
    }

    public function trendsdashboard()
    {
        $year =   $this->year;
        $this->model->getTrendsDashboardData( $this->year ,$this->sdglang);
    }


    public function report()
    {
        $data = $this->data;
        if (!empty($data)) {
            $lang = $data->lang;
            $section = $data->section;
            $this->model->getReport($lang, $section);
        }

    }

    public function information()
    {
        $data = $this->data;
        if (!empty($data)) {
            $id = $data->id;
            $lang = $data->lang;
            $this->model->getcommondata($id, $lang);
        }
    }

    public function lang()
    {
        $this->model->getLang();
    }

    public function savelangKey()
    {

        $data = $this->data;
        if (!empty($data)) {
            $key = $data->key;
            $text = $data->text;
            $abreviation = $data->abrevition;

            $this->model->saveLangkeyData($key, $text, $abreviation);

        }
    }

    public function langdata()
    {
        $this->model->getLangData();
    }

    public function contactUs()
    {
        $data = $this->data;
        if (!empty($data)) {
            $name = $data->name;
            $email = $data->email;
            $message = $data->message;
            $subject = 'Message from AFRICA SDG INDEX AND DASHBOARDS website.';

            $emailTo = MAIL;
            $body = "Name: $name \n\nEmail: $email  \n\nMessage: $message";
            $headers = 'From: ' . ' <' . $email . '>' . "\r\n" . 'Reply-To: ' . $email;

            $this->model->SendEmail($name, $email, $emailTo, $message);

            if (!mail($emailTo, $subject, $body, $headers)) {
                $proced = new \stdClass();
                $proced->status = 'fail';
                $proced->message = 'Try again, Message not sent';
                $myJSON = json_encode($proced);
                echo $myJSON;
            } else {
                $proced = new \stdClass();
                $proced->status = 'fail';
                $proced->message = 'Message sent,Thank you!!';
                $myJSON = json_encode($proced);
                echo $myJSON;
            }

        }
    }

    public function Pagestatistic()
    {
        $data = $this->data;
        if (!empty($data)) {
            $page = $data->page;
            $user_id = $data->user_id;

            $this->model->statistic($page, $user_id);
        }
    }

    public function date()
    {

        $date = new DateTime();
        $nowdate = $date->format('Y-m-d H:i:s');
        echo $nowdate;
    }

    public function content()
    {
        $data = $this->data;
        if (!empty($data)) {
            $id = $data->id;
            $lang = $data->lang;
            $this->model->getContent($id, $lang);
        }
    }

    public function indicators()
    {
        $year =  $this->year;
        $data = $this->data;
        if (!empty($data)) {
            $code = $data->code;
            $sdg = $data->sdg;
            $this->model->getSdgIndicData($code, $sdg, $year,$this->sdglang);
        }
    }

    public function Trendsindicators()
    {
        $year =  $this->year;
        $data = $this->data;
        if (!empty($data)) {
            $code = $data->code;
            $sdg = $data->sdg;
            $this->model->getTrendsIndicData2($code, $sdg, $year,$this->sdglang);
        }
    }

    public function downloadprofile()
    {
        $data = $this->data;
        if (!empty($data)) {
            $code = $data->code;
            $this->model->saveprofiledownloadData($code);
        }
    }

    public function sdgindex()
    {
        $year =   $this->year;
        echo $this->model->sdgindexdata($year,$this->sdglang);
    }

    public function TrendsAndSdgIndicators()
    {
        $data = $this->data;
        if (!empty($data)) {
            $code = $data->code;
            $sdg = $data->sdg;
            $this->model->TrendsAndSdgIndicatorsData($code, $sdg);
        }

    }

    public function CounrtyProfile()
    {
        $year =  $this->year;
        $this->model->getCounrtyProfile($year,$this->sdglang);
    }

    public function randomname($length = 8)
    {
        $characters = '747854675673284567847654537289437808362283654732476358924934874875653264783';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function downloadProfiledata()
    {
        $data = $this->data;
        $year =    $this->year;
        if (!empty($data)) {

            $Countrycode = $data->country;

            $zip = new ZipArchive;
            $filename = 'zip_profiles.zip';
            $path = '../zip/' . $filename;

            if (file_exists($path)) {
                unlink($path);
            }

            if ($zip->open($path, ZipArchive::CREATE) === TRUE) {

                foreach ($Countrycode as $key => $value) {
                    $file = '../public/Report/'.$year.'/'. $Countrycode[$key] . '.pdf';
                    // Add files to the zip file
                    $zip->addFile($file, $Countrycode[$key] . '.pdf');
                }
                // All files are added, so close the zip file.
                $zip->close();

                $proced = new \stdClass();
                $proced->filename = $filename;
                $myJSON = json_encode($proced);
                echo $myJSON;

            } else {

            }


        }
    }


    public function downloadAllProfile()
    {
        $year =    $this->year;
        $this->model->dowloadAllCountryProfile($year);
    }

    public function search()
    {
         $year =    $this->year;
         $data = $this->data;
        if (!empty($data)) {
            $text = $data->text;
            $this->model->SearchData($text,$year,$this->sdglang);
        }
    }
    public function getYears(){
        $this->model->getYear();
    }
    public function SelectYear(){
        $data = $this->data;
                if (!empty($data)) {
                    $year = $data->year;
                    if(session::set('year',$year)){
                        $proced = new \stdClass();
                        $proced->status   = "success";
                        $proced->message = "Year changed to ". session::get('year');
                        $myJSON = json_encode($proced);
                        echo $myJSON;
                    };
                }
    }

}


?>
