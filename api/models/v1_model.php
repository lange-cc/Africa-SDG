<?php

/**
 *
 */
class v1_model extends model
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function getCountries($year, $lang)
    {
         $data = $this->db::table('country')->select('id', 'country_name','country_code','country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['year', '=', $year], ['lang', '=', $lang]])->get();
         return $data;
    }

    public function yearExist($year,$lang){
       if($this->db::table('country')->where([['year', '=', $year], ['lang', '=', $lang]])->count() < 0){
               return true;
        };
    }
    public function getYear()
    {
        $data = $this->db::table('country')->select('year')->distinct()->get();
        echo $data;
    }
    public function getprofiledata($c_code, $year, $lang)
    {
        $allData = array();
        $allData['country_info'] = array();
        $data = $this->db::table('country')->select('id', 'country_name', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $c_code], ['year', '=', $year], ['lang', '=', $lang]])->get();

        foreach ($data as $index => $value) {
            $new_array = array();
            $new_array['name'] = $data[$index]->country_name;
            $new_array['region'] = $data[$index]->country_sub_reg;
            if ($data[$index]->sdgi_rank == 0 || $data[$index]->sdgi_rank == '' || $data[$index]->sdgi_rank == 'N/A') {
                $new_array['rank'] = 'NA';
            } else {
                $new_array['rank'] = $data[$index]->sdgi_rank;
            }
            $new_array['score'] = $this->getTruncatedValue($data[$index]->sdgi_score, 1);
            $new_array['avarage_index_score'] = $this->getTruncatedValue($data[$index]->rel_aver_index_score, 1);
            array_push($allData['country_info'], $new_array);
        }


        $allData['sdg'] = array();
        $sdg = $this->db::table('sdgca')->select('id', 'sgdname', 'color', 'value')->where([['country_code', '=', $c_code], ['year', '=', $year], ['lang', '=', $lang]])->get();

        foreach ($sdg as $key => $value) {
            $new_array = array();
            $new_array['sdgname'] = $sdg[$key]->sgdname;
            if ($sdg[$key]->color == 'yellow') {
                $new_array['color'] = '#efc500';
            } else {
                $new_array['color'] = $sdg[$key]->color;
            }
            $new_array['value'] = $this->getTruncatedValue($sdg[$key]->value, 1);
            array_push($allData['sdg'], $new_array);
        }


        $allData['trends'] = $this->db::table('trends')->select('id', 'sdg_name', 'sdg_id', 'value')->where([['country_code', '=', $c_code], ['year', '=', $year], ['lang', '=', $lang]])->get();


        echo json_encode($allData);
    }

    public function getDashboardData($year, $lang)
    {
        $allData = array();

        $country = $this->db::table('country')->select('id', 'country_name', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score', 'country_code')->where([['year', '=', $year], ['lang', '=', $lang]])->orderBy('country_name', 'asc')->get();
        foreach ($country as $keyy => $value) {
            $data = array();
            $c_code = $country[$keyy]->country_code;
            $name = $country[$keyy]->country_name;
            $reg = $country[$keyy]->country_sub_reg;

            $sdg = $this->db::table('sdgca')->select('id', 'sdg_id', 'sgdname', 'color', 'value')->where([['country_code', '=', $c_code], ['lang', '=', $lang]])->get();

            $data['country'] = $name;
            $data['code'] = $c_code;
            $data['reg'] = $reg;

            foreach ($sdg as $key => $value) {


                if ($sdg[$key]->color == 'yellow') {
                    $data['color_' . $sdg[$key]->sdg_id] = '#efc500';
                } else {
                    $data['color_' . $sdg[$key]->sdg_id] = $sdg[$key]->color;
                }

            }

            array_push($allData, $data);

        }
        echo json_encode($allData);

    }

    public function getTrendsDashboardData($year, $lang)
    {

        $allData = array();
        $country = $this->db::table('country')->select('id', 'country_name', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score', 'country_code')->where([['year', '=', $year], ['lang', '=', $lang]])->orderBy('country_name', 'asc')->get();
        foreach ($country as $key => $value) {
            $data = array();
            $c_code = $country[$key]->country_code;
            $name = $country[$key]->country_name;
            $reg = $country[$key]->country_sub_reg;

            $sdg = $this->db::table('trends')->select('id', 'sdg_name', 'sdg_id', 'value')->where([['country_code', '=', $c_code], ['lang', '=', $lang]])->get();

            $data['country'] = $name;
            $data['code'] = $c_code;
            $data['reg'] = $reg;

            foreach ($sdg as $keyy => $value) {
                $data['value_' . $sdg[$keyy]->sdg_id] = $sdg[$keyy]->value;
            }

            array_push($allData, $data);

        }
        echo json_encode($allData);
    }

    public function getReport($lang, $section)
    {
        $allData = array();

        $report = $this->db::table('sdg_report')->select('id', 'title', 'file', 'content')->where([['lang', '=', $lang], ['section', '=', $section]])->get();
        foreach ($report as $key => $value) {
            $data = array();
            $title = $report[$key]->title;
            $file = $report[$key]->file;
            $id = $report[$key]->id;


            $data['title'] = $title;
            $data['content'] = $report[$key]->content;

            if (file_exists('../public/all-images/' . $file)) {
                $source = '../public/all-images/' . $file;
                $filesize = filesize('../public/all-images/' . $file);
                $data['ext'] = pathinfo($file, PATHINFO_EXTENSION);
                $ext = pathinfo($file, PATHINFO_EXTENSION);

                if ($ext == 'pdf') {
                    $data['preview'] = $this->genPdfThumbnail($source, $save = false);
                }

            } else {
                $filesize = '0kb';
            }

            $data['file'] = 'public/all-images/' . $file;
            $data['size'] = $this->size_as_kb($filesize);
            $data['files'] = $this->db::table('sdg_report_files')->select('id', 'title', 'file_name')->where([['report_id', '=', $id]])->get();

            array_push($allData, $data);

        }
        echo json_encode($allData);
    }

    public function size_as_kb($yoursize)
    {
        if ($yoursize < 1024) {
            return "{$yoursize} bytes";
        } elseif ($yoursize < 1048576) {
            $size_kb = round($yoursize / 1024);
            return "{$size_kb} KB";
        } else {
            $size_mb = round($yoursize / 1048576, 1);
            return "{$size_mb} MB";
        }
    }

    public function getcommondata($id, $lang)
    {
        $section = $this->db::table('mvc_section')->select('id', 'section_index')->where([['id', '=', $id]])->get();
        $sectiondata = $this->db::table('mvc_section')->select('id', 'section_index')->where([['id', '=', $id]])->count();
        if ($sectiondata > 0) {
            $sectionindex = $section[0]->section_index;
            $article = $this->db::table('mvc_article')->select('id', 'title', 'subtitle', 'content')->where([['section_index', '=', $sectionindex], ['lang', '=', $lang]])->get();
            echo $article;
        } else {
            $data = array(['status' => 'none']);
            echo json_encode($data);
        }
    }

    public function getContent($id, $lang)
    {
        $data = array();
        $content = $this->db::table('mvc_main_site_content')->select('id', 'cont_index')->where([['id', '=', $id]])->get();
        foreach ($content as $key => $value) {
            $section = $this->db::table('mvc_section')->select('id', 'section_index')->where([['cont_index', '=', $content[$key]->cont_index]])->get();
            $sectionindex = $section[0]->section_index;
            $article = $this->db::table('mvc_article')->select('id', 'title', 'subtitle', 'content')->where([['section_index', '=', $sectionindex], ['lang', '=', $lang]])->get();

        }

    }

    public function getLang()
    {
        $proced = new \stdClass();
        $proced->lang = new \stdClass();

        $lang = $this->db::table('mvc_language')->select('id', 'abreviation')->get();
        foreach ($lang as $key => $value) {
            $language = $lang[$key]->abreviation;
            $proced->lang->$language = new \stdClass();

            $world = $this->db::table('mvc_lang_keywords')->select('id', 'lang_id', 'keyword', 'keytext')->where([['abreviation', '=', $language]])->get();
            foreach ($world as $index => $index_value) {
                $keyword = $world[$index]->keyword;
                $wordtext = $world[$index]->keytext;
                $proced->lang->$language->$wordtext = $keyword;
            }


        }


        $myJSON = json_encode($proced);
        echo $myJSON;

        //$data = json_decode($myJSON);
        //echo $data->lang->rw->k_hm;
    }

    public function saveLangkeyData($key, $text, $abreviation)
    {

        $lang = $this->db::table('mvc_language')->select('id')->where([['abreviation', '=', $abreviation]])->get();
        $langId = $lang[0]->id;

        if ($this->db::table('mvc_lang_keywords')->select('id')->where([['keytext', '=', $key], ['abreviation', '=', $abreviation]])->exists()) {
            $proced = new \stdClass();
            $proced->status = 'fail';
            $proced->message = 'Key exist';

            $myJSON = json_encode($proced);
            echo $myJSON;
        } else {
            $this->db::table('mvc_lang_keywords')->insertGetId(
                [
                    'lang_id' => $langId,
                    'keyword' => $text,
                    'keytext' => $key,
                    'abreviation' => $abreviation
                ]
            );
            $proced = new \stdClass();
            $proced->status = 'success';
            $proced->message = 'new key added';

            $myJSON = json_encode($proced);
            echo $myJSON;


        }


    }

    public function getLangData()
    {
        $lang = $this->db::table('mvc_language')->select('id', 'name', 'abreviation')->get();
        echo $lang;
    }

    public function SendEmail($name, $email, $emailTo, $message)
    {

        $this->db::table('mvc_message')->insertGetId(
            [
                'names' => $name,
                'mail_to' => $emailTo,
                'mail_from' => $email,
                'subject' => 'Message from AFRICA SDG INDEX AND DASHBOARDS website.',
                'content' => $message,
                'status' => 0,
                'type' => 'inbox',
                'reply_id' => '0',
                'date' => 'now()'
            ]
        );

    }

    public function randomnumber($length = 15)
    {
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
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function detectDevice()
    {
        $userAgent = $_SERVER["HTTP_USER_AGENT"];
        $devicesTypes = array(
            "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
            "tablet" => array("tablet", "android", "ipad", "tablet.*firefox"),
            "mobile" => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
            "bot" => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
        );
        foreach ($devicesTypes as $deviceType => $devices) {
            foreach ($devices as $device) {
                if (preg_match("/" . $device . "/i", $userAgent)) {
                    $deviceName = $deviceType;
                }
            }
        }
        return ucfirst($deviceName);
    }

    public function statistic($page, $user_id)
    {

        $date = new DateTime();
        $nowdate = $date->format('Y-m-d H:i:s');

        $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $this->getRealIpAddr());

        $country = $xml->geoplugin_countryName;
        $city = $xml->geoplugin_city;
        $device = $this->detectDevice();
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referrer = $_SERVER['HTTP_REFERER'];
        } else {
            $referrer = 'Direct';
        }

        if ($user_id != 'none') {
//setcookie("user_id", "", time() - (96400 * 30), "/");
            $cookie = $user_id;

            $exist = $this->db::table('mvc_status')->where([['page', '=', $page], ['user_id', '=', $cookie]])->count();

            if ($exist > 0) {

                $update = $this->db::table('mvc_status')->where([['page', '=', $page], ['user_id', '=', $cookie]])->increment('views', 1, ['time' => $nowdate]);

            } else {

                $this->db::table('mvc_status')->insertGetId(
                    [
                        'user_id' => $cookie,
                        'country' => $country,
                        'city' => $city,
                        'time' => $nowdate,
                        'device' => $device,
                        'page' => $page,
                        'ip' => $this->getRealIpAddr(),
                        'views' => 1,
                        'referrer' => $referrer

                    ]
                );


            }

            $proced = new \stdClass();
            $proced->pageStatus = 'Good';
            $proced->pagename = $page;
            $myJSON = json_encode($proced);
            echo $myJSON;

        } else {

            $cookie_name = "user_id";
            $cookie_value = 'User_' . $this->randomnumber(10);


            $this->db::table('mvc_status')->insertGetId(
                [
                    'user_id' => $cookie_value,
                    'country' => $country,
                    'city' => $city,
                    'time' => 'now()',
                    'device' => $device,
                    'page' => $page,
                    'ip' => $this->getRealIpAddr(),
                    'views' => 1,
                    'referrer' => $referrer

                ]
            );

            $proced = new \stdClass();
            $proced->name = $cookie_name;
            $proced->user = $cookie_value;
            $myJSON = json_encode($proced);
            echo $myJSON;

        }
    }

    public function getSdgIndicData($code, $sdg, $year, $lang)
    {
        $alldata = array();
        $alldata ['country_name'] = $this->db::table('country')->select('id', 'country_name', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->country_name;
        $alldata ['sdg_n'] = $sdg;
        $alldata ['sdgname'] = $this->db::table('sdg_value')->select('id', 'sdg_name')->where([['sdg_id', '=', $sdg], ['lang', '=', $lang]])->get()[0]->sdg_name;

        if ($this->db::table('sdgca')->select('id', 'color')->where([['sdg_id', '=', $sdg], ['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->color == "yellow") {
            $alldata ['sdgColor'] = '#efc500';
        } else {
            $alldata ['sdgColor'] = $this->db::table('sdgca')->select('id', 'color')->where([['sdg_id', '=', $sdg], ['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->color;
        }

        $alldata ['indicators'] = array();
        $indicators = $this->db::table('indicators')->select('id', 'indic_name', 'indic_value', 'color')->where([['country_code', '=', $code], ['sdg', '=', $sdg], ['year', '=', $year], ['lang', '=', $lang]])->get();

        foreach ($indicators as $key => $value) {

            $indic_index = $indicators[$key]->indic_name;
            $labelCount = $this->db::table('indicator_value')->select('id', 'label')->where([['abrev', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->count();
            $indic_data = $this->db::table('indicator_value')->select('id', 'label')->where([['abrev', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->get();
            $a = array();

            if ($labelCount > 0) {
                $a['name'] = $indic_data[0]->label;
            } else {
                $a['name'] = $indic_index;
            }

            if ($indicators[$key]->indic_value == '') {
                $a['value'] = '';
            } else if ($indicators[$key]->indic_value == '-') {
                $a['value'] = '0.0';
            } else {
                $a['value'] = $this->getTruncatedValue($indicators[$key]->indic_value, 1);
            }


            if ($indicators[$key]->color == 'none') {
                $a['color'] = 'grey';
            } else if ($indicators[$key]->color == 'yellow') {
                $a['color'] = '#efc500';
            } else {
                $a['color'] = $indicators[$key]->color;
            }

            array_push($alldata ['indicators'], $a);

        }

        echo json_encode($alldata);
    }

    public function getTrendsIndicData2($code, $sdg, $year, $lang)
    {
        $alldata = array();
        $alldata ['country_name'] = $this->db::table('country')->select('id', 'country_name', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->country_name;
        $alldata ['sdg_n'] = $sdg;

        $sdg_names = $this->db::table('sdg_value')->where([['sdg_id', '=', $sdg], ['lang', '=', $lang]])->get();
        $alldata ['sdgname'] = $sdg_names->first()->sdg_name;
        $alldata ['sdgTrendValue'] = $this->db::table('trends')->select('value')->where([['sdg_id', '=', $sdg], ['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->value;
        if ($this->db::table('sdgca')->select('id', 'color')->where([['sdg_id', '=', $sdg], ['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->color == "yellow") {
            $alldata ['sdgColor'] = '#efc500';
        } else {
            $alldata ['sdgColor'] = $this->db::table('sdgca')->select('id', 'color')->where([['sdg_id', '=', $sdg], ['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->color;
        }

        $alldata ['indicators'] = array();
        $indicators = $this->db::table('indicators')->select('id', 'indic_name', 'indic_value', 'color')->where([['country_code', '=', $code], ['sdg', '=', $sdg], ['year', '=', $year], ['lang', '=', $lang]])->get();

        foreach ($indicators as $key => $value) {

            $indic_index = $indicators[$key]->indic_name;
            $labelCount = $this->db::table('indicator_value')->select('id', 'label')->where([['abrev', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->count();
            $indic_data = $this->db::table('indicator_value')->select('id', 'label')->where([['abrev', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->get();
            $a = array();

            if ($labelCount > 0) {
                $a['name'] = $indic_data[0]->label;
            } else {
                $a['name'] = $indic_index;
            }

            if ($indicators[$key]->indic_value == '') {
                $a['Realvalue'] = '';
            } else if ($indicators[$key]->indic_value == '-') {
                $a['Realvalue'] = '0.0';
            } else {
                $a['Realvalue'] = $this->getTruncatedValue($indicators[$key]->indic_value, 1);
            }

            $Trendsindicators = $this->db::table('trends_indicators')->select('id', 'indic_name', 'indic_value')->where([['country_code', '=', $code], ['indic_name', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->get();
            $Trendcount = $this->db::table('trends_indicators')->select('id', 'indic_name', 'indic_value')->where([['country_code', '=', $code], ['country_code', '=', $code], ['sdg', '=', $sdg], ['indic_name', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->count();
            if ($Trendcount > 0) {
                if ($Trendsindicators[0]->indic_value == '') {
                    $a['value'] = '';
                } else {
                    $a['value'] = $Trendsindicators[0]->indic_value;
                }
            } else {
                $a['value'] = '';
            }

            if ($indicators[$key]->color == 'none') {
                $a['color'] = 'grey';
            } else if ($indicators[$key]->color == 'yellow') {
                $a['color'] = '#efc500';
            } else {
                $a['color'] = $indicators[$key]->color;
            }

            array_push($alldata ['indicators'], $a);

        }
        echo json_encode($alldata);
    }

    public function getTrendsIndicData($code, $sdg, $year, $lang)
    {
        $alldata = array();
        $alldata ['country_name'] = $this->db::table('country')->select('id', 'country_name', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->country_name;
        $alldata ['sdg_n'] = $sdg;
        $alldata ['sdgname'] = $this->db::table('sdg_value')->select('id', 'sdg_name')->where([['sdg_id', '=', $sdg]])->get()[0]->sdg_name;
        $alldata ['sdgTrendValue'] = $this->db::table('trends')->select('value')->where([['sdg_id', '=', $sdg], ['country_code', '=', $code], ['year', '=', $year], ['lang', '=', $lang]])->get()[0]->value;

        $alldata ['indicators'] = array();
        $indicators = $this->db::table('trends_indicators')->select('id', 'indic_name', 'indic_value')->where([['country_code', '=', $code], ['sdg', '=', $sdg], ['year', '=', $year], ['lang', '=', $lang]])->get();


        foreach ($indicators as $key => $value) {

            $indic_index = $indicators[$key]->indic_name;
            $labelCount = $this->db::table('indicator_value')->select('id', 'label')->where([['abrev', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->count();
            $indic_data = $this->db::table('indicator_value')->select('id', 'label')->where([['abrev', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->get();

            $a = array();
            if ($labelCount > 0) {
                $a['name'] = $indic_data[0]->label;
            } else {
                $a['name'] = $indic_index;
            }


            if ($indicators[$key]->indic_value == '') {
                $a['value'] = '';
            } else {
                $a['value'] = $this->getTruncatedValue($indicators[$key]->indic_value, 1);
            }

            $indicators_data_exist = $this->db::table('indicators')->select('id', 'indic_value')->where([['indic_name', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->count();
            if ($indicators_data_exist > 0) {
                $indicators_data = $this->db::table('indicators')->select('id', 'indic_value')->where([['indic_name', '=', $indic_index], ['year', '=', $year], ['lang', '=', $lang]])->get();
                $a['Realvalue'] = $this->getTruncatedValue($indicators_data[0]->indic_value, 1);
            } else {
                $a['Realvalue'] = 0;
            }

            array_push($alldata ['indicators'], $a);

        }

        echo json_encode($alldata);
    }

    public function saveprofiledownloadData($code)
    {
        $exist = $this->db::table('downloads')->where([['country', '=', $code]])->count();
        if ($exist <= 0) {
            $this->db::table('downloads')->insertGetId(
                [
                    'country' => $code,
                    'n_downloads' => 1,
                ]
            );
        } else {
            $this->db::table('downloads')->where([['country', '=', $code]])->increment('n_downloads', 1, ['country' => $code]);
        }

    }

    public function sdgindexdata($year, $lang)
    {
        $data = array();
        $section = array();
        $section['country'] = array();
        $section['countrywithNodata'] = $this->sdgindexWithNodata($year,$lang);


        $country = $this->db::table('country')->select('id', 'country_name', 'country_code', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['sdgi_rank', '<>', 0], ['year', '=', $year], ['lang', '=', $lang]])->orderBy('sdgi_rank', 'asc')->get();
        $nextyear = $this->db::table('country')->select('id', 'country_name', 'country_code', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['sdgi_rank', '<>', 0], ['year', '=', $year + 1], ['lang', '=', $lang]])->orderBy('sdgi_rank', 'asc')->count();
        if ($nextyear > 0) {
            $nextyear = true;
            $section['nextyeardata'] = true;
            $section['year'] = $year;
            $section['nextyear'] = $year + 1;
        } else {
            $nextyear = false;
            $section['nextyeardata'] = false;
            $section['year'] = $year;
            $section['nextyear'] = $year + 1;
        }
        foreach ($country as $key => $value) {
            $row_array = array();
            $row_array['country'] = $country[$key]->country_name;
            $row_array['code'] = $country[$key]->country_code;
            $row_array['region'] = $country[$key]->country_sub_reg;
            if ($country[$key]->sdgi_rank == 0) {
                $row_array['rank'] = 'NA';
            } else {
                $row_array['rank'] = $country[$key]->sdgi_rank;
            }

            $row_array['score'] = $this->getTruncatedValue($country[$key]->rel_aver_index_score, 1);
            $row_array['index_score'] = $this->getTruncatedValue($country[$key]->sdgi_score, 1);

            if ($nextyear) {
                $nextyeardata = $this->db::table('country')->select('id', 'country_name', 'country_code', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $country[$key]->country_code], ['year', '=', $year + 1], ['lang', '=', $lang]])->get();
                $nextyeardatacount = $this->db::table('country')->select('id', 'country_name', 'country_code', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $country[$key]->country_code], ['year', '=', $year + 1], ['lang', '=', $lang]])->count();
                if ($nextyeardatacount > 0) {
                    if ($nextyeardata [0]->sdgi_rank == 0) {
                        $row_array['nextYearRank'] = 'NA';
                    } else {
                        $row_array['nextYearRank'] = $nextyeardata[0]->sdgi_rank;
                    }
                    $row_array['nextYearScore'] = $this->getTruncatedValue($nextyeardata[0]->rel_aver_index_score, 1);
                    $row_array['nextYearIndex_score'] = $this->getTruncatedValue($nextyeardata[0]->sdgi_score, 1);
                } else {
                    $row_array['nextYearRank'] = 'NA';
                    $row_array['nextYearScore'] = 'NA';
                    $row_array['nextYearIndex_score'] = 'NA';
                }

            }


            $row_array['sdg'] = array();

            $sdg = $this->db::table('sdgca')->where([['country_code', '=', $country[$key]->country_code], ['year', '=', $year], ['lang', '=', $lang]])->get();

            foreach ($sdg as $index => $value) {
                $row_array2 = array();
                $row_array2['name'] = $sdg[$index]->sgdname;

                if ($sdg[$index]->color == 'yellow') {
                    $row_array2['color'] = '#efc500';
                } else {
                    $row_array2['color'] = $sdg[$index]->color;
                }

                $row_array2['value'] = $sdg[$index]->value;
                $row_array2['sdg_id'] = $sdg[$index]->sdg_id;
                $row_array2['code'] = $sdg[$index]->country_code;

                array_push($row_array['sdg'], $row_array2);
            }
            array_push($section['country'], $row_array);
        }

        array_push($data, $section);

        return json_encode($data);

    }

    public function sdgindexWithNodata($year, $lang)
    {
        $data = array();

        $country = $this->db::table('country')->select('id', 'country_name', 'country_code', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['sdgi_rank', '=', 0], ['year', '=', $year], ['lang', '=', $lang]])->orderBy('sdgi_rank', 'asc')->get();
        $nextyear = $this->db::table('country')->select('id', 'country_name', 'country_code', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['sdgi_rank', '<>', 0], ['year', '=', $year + 1], ['lang', '=', $lang]])->orderBy('sdgi_rank', 'asc')->count();
        if ($nextyear > 0) {
            $nextyear = true;
        } else {
            $nextyear = false;
        }
        foreach ($country as $key => $value) {
            $row_array = array();
            $row_array['country'] = $country[$key]->country_name;
            $row_array['code'] = $country[$key]->country_code;
            $row_array['region'] = $country[$key]->country_sub_reg;
            if ($country[$key]->sdgi_rank == 0) {
                $row_array['rank'] = 'NA';
            } else {
                $row_array['rank'] = $country[$key]->sdgi_rank;
            }

            if ($country[$key]->rel_aver_index_score == 0) {
                $row_array['score'] = 'NA';
            } else {
                $row_array['score'] = $country[$key]->rel_aver_index_score;
            }

            if ($this->getTruncatedValue($country[$key]->sdgi_score, 1) == 0) {
                $row_array['index_score'] = 'NA';
            } else {
                $row_array['index_score'] = $this->getTruncatedValue($country[$key]->sdgi_score, 1);
            }


            if ($nextyear) {
                $nextyeardata = $this->db::table('country')->select('id', 'country_name', 'country_code', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $country[$key]->country_code], ['year', '=', $year + 1], ['lang', '=', $lang]])->get();
                $nextyeardatacount = $this->db::table('country')->select('id', 'country_name', 'country_code', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $country[$key]->country_code], ['year', '=', $year + 1], ['lang', '=', $lang]])->count();
                if ($nextyeardatacount > 0) {
                    if ($nextyeardata [0]->sdgi_rank == 0) {
                        $row_array['nextYearRank'] = 'NA';
                    } else {
                        $row_array['nextYearRank'] = $nextyeardata[0]->sdgi_rank;
                    }

                    if ($nextyeardata[0]->rel_aver_index_score == 0) {
                        $row_array['nextYearScore'] = 'NA';
                    } else {
                        $row_array['nextYearScore'] = $nextyeardata[0]->rel_aver_index_score;
                    }

                    if ($this->getTruncatedValue($nextyeardata[0]->sdgi_score, 1) == 0) {
                        $row_array['nextYearIndex_score'] = 'NA';
                    } else {
                        $row_array['nextYearIndex_score'] = $this->getTruncatedValue($nextyeardata[0]->sdgi_score, 1);
                    }


                } else {
                    $row_array['nextYearRank'] = 'NA';
                    $row_array['nextYearScore'] = 'NA';
                    $row_array['nextYearIndex_score'] = 'NA';
                }

            }

            $row_array['sdg'] = array();

            $sdg = $this->db::table('sdgca')->where([['country_code', '=', $country[$key]->country_code], ['year', '=', $year], ['lang', '=', $lang]])->get();

            foreach ($sdg as $index => $value) {
                $row_array2 = array();
                $row_array2['name'] = $sdg[$index]->sgdname;

                if ($sdg[$index]->color == 'yellow') {
                    $row_array2['color'] = '#efc500';
                } else {
                    $row_array2['color'] = $sdg[$index]->color;
                }

                $row_array2['value'] = $sdg[$index]->value;
                $row_array2['sdg_id'] = $sdg[$index]->sdg_id;
                $row_array2['code'] = $sdg[$index]->country_code;

                array_push($row_array['sdg'], $row_array2);
            }
            array_push($data, $row_array);
        }

        return $data;

    }

    public function TrendsAndSdgIndicatorsData($code, $sdg)
    {
        $alldata = array();
        $alldata ['country'] = $this->db::table('country')->select('id', 'country_name', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score')->where([['country_code', '=', $code]])->get();
        $alldata ['sdg_n'] = $sdg;
        $alldata ['sdg'] = $this->db::table('sdg_value')->select('id', 'sdg_name')->where([['sdg_id', '=', 'sdg' . $sdg]])->get();
        $alldata ['sdgColor'] = $this->db::table('sdgca')->select('id', 'color')->where([['sdg_id', '=', 'sdg' . $sdg], ['country_code', '=', $code]])->get();
        $alldata ['indicators'] = array();
        $indicators = $this->db::table('indicators')->select('id', 'indic_name', 'indic_value', 'color')->where([['country_code', '=', $code], ['sdg', '=', 'sdg' . $sdg]])->get();

        foreach ($indicators as $key => $value) {

            $indic_index = $indicators[$key]->indic_name;
            $labelCount = $this->db::table('indicator_value')->select('id', 'label')->where([['abrev', '=', $indic_index]])->count();
            $indic_data = $this->db::table('indicator_value')->select('id', 'label')->where([['abrev', '=', $indic_index]])->get();
            $a = array();

            if ($labelCount > 0) {
                $a['name'] = $indic_data[0]->label;
            } else {
                $a['name'] = $indic_index;
            }


            $indicatorsdata = $this->db::table('trends_indicators')->select('id', 'indic_name', 'indic_value')->where([['indic_name', '=', $indic_index]])->get();
            $indicatorsExist = $this->db::table('trends_indicators')->where([['indic_name', '=', $indic_index]])->count();

            if ($indicatorsExist > 0) {
                $a['trend_value'] = $indicatorsdata[0]->indic_value;
            } else {
                $a['trend_value'] = '';
            }


            $a['value'] = number_format((float)$indicators[$key]->indic_value, 1, '.', '');

            if ($indicators[$key]->indic_value == 0) {
                $a['color'] = 'grey';
            } else if ($indicators[$key]->color = 'yellow') {
                $a['color'] = '#efc500';
            } else {
                $a['color'] = $indicators[$key]->color;
            }


            array_push($alldata ['indicators'], $a);

        }

        echo json_encode($alldata);
    }

    public function getCounrtyProfile($year, $lang)
    {
        $data = array();
        $country = $this->db::table('country')->select('id', 'country_name', 'country_sub_reg', 'sdgi_score', 'sdgi_rank', 'rel_aver_index_score', 'country_code')->where([['year', '=', $year], ['lang', '=', $lang]])->orderBy('country_name', 'asc')->get();
        foreach ($country as $key => $value) {
            $row_array = array();
            $row_array ['name'] = $country[$key]->country_name;
            $row_array ['code'] = $country[$key]->country_code;

            if (file_exists('../public/Report/' . $year . '/' . $country[$key]->country_code . ".pdf")) {
                $source = '../public/Report/' . $year . '/' . $country[$key]->country_code . ".pdf";
                if (file_exists('../public/Report/' . $year . '/' . $country[$key]->country_code . ".jpeg")) {
                    $row_array['preview'] = $country[$key]->country_code . ".jpeg";
                } else {
                    $this->genPdfThumbnail($source, $save = $source = '../public/Report/' . $year . '/' . $country[$key]->country_code . ".jpeg");
                    $row_array['preview'] = $country[$key]->country_code . ".jpeg";
                }

            } else {
                $row_array['preview'] = false;
            }
            array_push($data, $row_array);

        }
        echo json_encode($data);
    }

    public function dowloadAllCountryProfile($year)
    {

        $zip = new ZipArchive;

        $filename = 'zip_all_profiles.zip';
        $path = '../zip/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        if ($zip->open($path, ZipArchive::CREATE) === TRUE) {
            $Country = $this->db::table('country')->select('country_code')->get();

            foreach ($Country as $key => $value) {
                $file = '../public/Report/' . $year . '/' . $Country[$key]->country_code . '.pdf';
                // Add files to the zip file
                $zip->addFile($file, $Country[$key]->country_code . '.pdf');
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

    public function SearchData($text, $year, $lang)
    {
        $country = $this->db::table('country')
            ->where([['country_name', 'like', '%' . $text . '%'], ['year', '=', $year], ['lang', '=', $lang]])
            ->orWhere([['country_code', 'like', '%' . $text . '%'], ['year', '=', $year], ['lang', '=', $lang]])
            ->orWhere([['country_sub_reg', 'like', '%' . $text . '%'], ['year', '=', $year], ['lang', '=', $lang]])->get();
        echo $country;
    }

}

?>
