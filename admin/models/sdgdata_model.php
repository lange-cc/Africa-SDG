<?php

/**
 *
 */
class sdgdata_model extends model
{

    function __construct()
    {
        parent::__construct();
    }


// ===================================================================================================

    public function savedata($country, $sdg, $color, $indicator, $valuedata, $year,$lang)
    {
        $id = $this->dataB::table('indicators')->insertGetId([
            'indic_name' => $indicator,
            'indic_value' => $valuedata,
            'country_code' => $country,
            'sdg' => $sdg,
            'color' => $color,
            'year' => $year,
            'lang' => $lang

        ]);

        if ($id != null) {

        }
    }

    public function saveTrendsIndicData($country, $indicator, $valuedata, $sdg, $year,$lang)
    {
        $id = $this->dataB::table('trends_indicators')->insertGetId([
            'indic_name' => $indicator,
            'indic_value' => $valuedata,
            'country_code' => $country,
            'sdg' => $sdg,
            'year' => $year,
            'lang' => $lang
        ]);

        if ($id != null) {

        }
    }


    public function delMaindata($lang,$year)
    {
        $this->dataB::table('indicators')->where([['lang', '=', $lang],['year', '=', $year]])->delete();
        $this->dataB::table('trends_indicators')->where([['lang', '=', $lang],['year', '=', $year]])->delete();
        $this->dataB::table('country')->where([['lang', '=', $lang],['year', '=', $year]])->delete();
        $this->dataB::table('sdgca')->where([['lang', '=', $lang],['year', '=', $year]])->delete();
        $this->dataB::table('trends')->where([['lang', '=', $lang],['year', '=', $year]])->delete();
        $this->dataB::table('indicator_value')->where([['lang', '=', $lang],['year', '=', $year]])->delete();
    }


    public function savecountrydata($country, $country_code, $sdgi_score, $sdgi_rank, $rel_aver_index_score, $country_sub_reg, $year,$lang)
    {
        $id = $this->dataB::table('country')->insertGetId(
            [
                'country_name' => $country,
                'country_code' => $country_code,
                'sdgi_score' => $sdgi_score,
                'sdgi_rank' => $sdgi_rank,
                'rel_aver_index_score' => $rel_aver_index_score,
                'country_sub_reg' => $country_sub_reg,
                'year' => $year,
                'lang' => $lang

            ]
        );
        if ($id != null) {


        }
    }


    public function savesdg($country_code, $year,$lang)
    {
        $data = $this->dataB::table('sdg_value')->select('id', 'sdg_id', 'sdg_name')->where([['lang', '=', $lang]])->get();
        foreach ($data as $key => $value) {
            $sdg_id = $data[$key]->sdg_id;
            $sdg_name = $data[$key]->sdg_name;
            $this->savesdgdata($country_code, $sdg_id, $sdg_name, $year,$lang);

        }
    }

    public function savesdgdata($country_code, $sdg_id, $sdg_name, $year,$lang)
    {
        $this->dataB::table('sdgca')->insertGetId(
            [
                'sdg_id' => $sdg_id,
                'sgdname' => $sdg_name,
                'country_code' => $country_code,
                'year' => $year,
                'lang' => $lang

            ]
        );

        $this->dataB::table('trends')->insertGetId(
            [
                'sdg_id' => $sdg_id,
                'sdg_name' => $sdg_name,
                'country_code' => $country_code,
                'year' => $year,
                'lang' => $lang

            ]
        );

    }

    public function saveindicatordata($abrev, $label, $year,$lang)
    {
        $id = $this->dataB::table('indicator_value')->insertGetId(
            [
                'abrev' => $abrev,
                'label' => $label,
                'year' => $year,
                'lang' => $lang
            ]
        );
        if ($id != null) {

        }
    }

    public function ProcessSdgData($country, $sdg, $valuedata, $year,$lang)
    {
        $update = $this->dataB::table('sdgca')->where([['lang', '=', $lang],['sdg_id', '=', $sdg], ['country_code', '=', $country], ['year', '=', $year]])->update(['value' => $valuedata]);
        if ($update) {

        }

    }


    public function ProcessTrendsData($country, $sdg, $valuedata, $year,$lang)
    {

        $update = $this->dataB::table('trends')->where([['lang', '=', $lang],['sdg_id', '=', $sdg], ['country_code', '=', $country], ['year', '=', $year]])->update(['value' => $valuedata]);
        if ($update) {

        }
    }

    public function addingSdgData()
    {

        $data = $this->dataB::table('sdgca')->select('id', 'sdg_id', 'country_code')->get();
        foreach ($data as $key => $value) {

            $id = $data[$key]->id;
            $sdg_id = $data[$key]->sdg_id;
            $c_code = $data[$key]->country_code;
            $this->loadIndicators($sdg_id, $c_code, $id);

        }
    }


    public function loadIndicators($sdg_id, $c_code, $id)
    {
        $total = 0;
        $no = $this->dataB::table('indicators')->select('id', 'indic_value')->where([['sdg', '=', $sdg_id], ['country_code', '=', $c_code]])->count();
        $data = $this->dataB::table('indicators')->select('id', 'indic_value')->where([['sdg', '=', $sdg_id], ['country_code', '=', $c_code]])->get();

        foreach ($data as $key => $value) {
            $value = $data[$key]->indic_value;
            $total = $total + $value;
        }

        $average = number_format((float)$total / $no, 2, '.', '');

        $update = $this->dataB::table('sdgca')->where('id', $id)->update(['value' => $average]);
        if ($update) {

        }
    }

// public function ProcessIndicData()
// {
//   $data  = $this->dataB::table('indicators')->select('id','indic_name','indic_value')->get();
//   foreach ($data as $key => $value) {

//       $id          = $data[$key]->id;
//       $indic_name  = $data[$key]->indic_name;
//       $indic_value = $data[$key]->indic_value;

//       $this->fetchIndicators($indic_name,$indic_value,$id);

//   }
// }


// public function fetchIndicators($indic_name,$indic_value,$id)
// {

//   $data  = $this->dataB::table('indicator_value')->select('id','green_thresh','yellow_orang_thresh','red_thresh')->where([['abrev','=',$indic_name]])->get();

//   if($data != null)
//   {
//     foreach ($data as $key => $value) 
//     {
//         $green   = $data[$key]->green_thresh;
//         $yellow  = $data[$key]->yellow_orang_thresh;
//         $red     = $data[$key]->red_thresh;

//         if($yellow >= $indic_value)
//         {
//           $color = 'yellow';

//         }
//         elseif($green >= $indic_value)
//         {
//           $color = 'green';
//         }
//         elseif($red >= $indic_value)
//         {
//           $color = 'red';
//         }
//         else
//         {
//           $color = 'none';
//         }

//     } 

//     if(isset($color))
//     {
//     $update = $this->dataB::table('indicators')->where('id', $id)->update(['color' => $color]);
//     
//     }
//   }

// }

    public function ProcessSdgcolordata($country, $sdg, $valuedata, $year,$lang)
    {

        $update = $this->dataB::table('sdgca')->where([['lang', '=', $lang],['sdg_id', '=', $sdg], ['country_code', '=', $country], ['year', '=', $year]])->update(['color' => $valuedata]);
        if ($update) {

        }

    }

    public function getLanguage()
    {
        $data = $this->dataB::table('mvc_language')->get();
        return $data;
    }

}

?>