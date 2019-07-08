<?php
/**
 * Created by Abe jahwin.
 * Date: 2018-10-07
 * Time: 15:51
 */

class index extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('js/country_profile.js','js/indicator.js','plugin/dataTables.js','js/index.js');
        $this->view->css = array('css/sdg_cards.css','css/sdg_arrows.css','css/dataTables.css','css/index.css');
    }

    public function autoload()
    {
        $this->view->isYear  = true;
        $this->view->title = $this->Translate('Africa Index');
        $this->view->render('index/index', false, $menu = 'index');
        //$this->statistics('index');
    }


}

?>
