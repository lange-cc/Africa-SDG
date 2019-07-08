<?php
/**
 *
 */
class sdgs extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js  = array('js/sdgs.js');
        $this->view->css = array('css/sdg_cards.css','css/sdgs.css');


    }

    public function autoload()
    {
        $this->view->title  =  $this->Translate('SDGs | Africa SDG Index and Dashboards');
        $this->view->render('sdgs/sdgs',false,$menu='sdgs');
//		$this->statistics('Dashboard');
    }




}

?>
