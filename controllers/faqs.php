<?php
/**
 *
 */
class faqs extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js  = array('js/faqs.js');
        $this->view->css = array('css/faqs.css');


    }

    public function autoload()
    {
        $this->view->title  =  $this->Translate('FAQs | Africa SDG Index and Dashboards');
        $this->view->render('faqs/faqs',false,$menu='faqs');
//		$this->statistics('Dashboard');
    }




}

?>
