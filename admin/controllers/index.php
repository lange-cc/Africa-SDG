<?php
/**
* 
*/
class index extends controller
{
	
	
	function __construct()
	{
		parent::__construct();
        session:: init();
        $loged = session::get('username');

        if ($loged == false) {
        	session::destroy();
        	header('location: login');
        	exit;
        }

		$this->view->js = array('js/index.js');
		$this->loadProfile();
	}

	public function autoload()
	{
	  
	  $this->view->totaluniquevisit = $this->model->uniquevisitors();
	  $this->view->totalvisit = $this->model->totalvisit();	
	  $this->view->days = $this->model->sitevisit();
	  $this->view->uniquevisit = $this->model->uniquesitevisit();
	  $this->view->blog = $this->model->FindData();
	  $this->view->totalblog = $this->model->FindtotalBlog();
	  $this->view->totalaccount = $this->model->Findtotalaccount();
	  $this->view->controller = $this->loadcontroller;
	  $this->view->n_downloads = $this->model->downloadData();
      $this->checklink('index');
      $this->view->render('home/index',false,$semenu=1,$menu=1);	

     
	}

	public function save()
	{
		$name = $_POST['name'];
		if (empty($name)) {
			echo "field empty";
		}
		else
		{
		echo $name;
	    }
	}

	public function pages()
	{
	  $this->view->pages = $this->model->Pages();
	  $this->checklink('index');
      $this->view->render('home/pages-trafic',false,$semenu=1,$menu=1);
	}


}

?>