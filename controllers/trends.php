<?php
/**
 *
 */
class trends extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js  = array('js/country_profile.js','js/indicator.js','js/trends_dashboard.js');
        $this->view->css = array('css/sdg_cards.css','css/sdg_arrows.css','css/dashboard.css');


    }

    public function autoload()
    {
        $this->view->isYear  = true;
        $this->view->title  = $this->Translate('Trends Dashboard | Africa SDG Index and Dashboards');
        $this->view->render('dashboard/sdg_trends',false,$menu='dashboard');
//		$this->statistics('Dashboard');
    }




}

?>
