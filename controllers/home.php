<?php

/**
 *
 */
class Home extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('plugin/panzoom.js', 'js/country_profile.js', 'js/indicator.js', 'js/home.js');
        $this->view->css = array('css/sdg_cards.css', 'css/sdg_arrows.css', 'css/home.css');
    }

    public function autoload()
    {
        $this->view->isYear  = true;
        $this->view->title = $this->Translate('Home | Africa SDG Index and Dashboards');
        $this->view->render('home/index', false, $menu = 'home');
        //$this->statistics('Home');
    }

    public function changeLang()
    {
        $postData = file_get_contents('php://input');
        $data = json_decode($postData);
          if (!empty($data)) {
              $lang = $data->lang;
              setcookie('lang', $lang, time() + (86400 * 30), "/"); // 86400 = 1 day
              $proced = new \stdClass();
              $proced->status  = "success";
              $myJSON = json_encode($proced);
              echo $myJSON;
          }
    }


}

?>
