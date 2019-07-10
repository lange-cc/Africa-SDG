<?php
/**
 *
 */
class downloads extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js  = array('js/downloads.js');
        $this->view->css = array('css/downloads.css');


    }

    public function autoload()
    {
        $this->view->isYear  = true;
        $this->view->title  = $this->Translate('Downloads | Africa SDG Index and Dashboards');
        $this->view->render('downloads/downloads',false,$menu='report');
//		$this->statistics('Dashboard');
    }




}

?>
