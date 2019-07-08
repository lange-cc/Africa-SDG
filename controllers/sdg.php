<?php
/**
*
*/
class sdg extends controller
{

function __construct()
  {
	parent::__construct();
	$this->view->js  = array('js/country_profile.js','js/indicator.js','js/sdg_dashboard.js');
    $this->view->css = array('css/sdg_cards.css','css/sdg_arrows.css','css/dashboard.css');
    

  }

public function autoload()
	{
		$this->view->isYear  = true;
		$this->view->title  =  $this->Translate('Rating Dashboard | Africa SDG Index and Dashboards');
		$this->view->render('dashboard/sdg_color',false,$menu='dashboard');
//		$this->statistics('Dashboard');
	}




}

?>
