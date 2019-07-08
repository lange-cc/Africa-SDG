<?php

/**
 *
 */
class controller extends ControllermModel
{

    function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }


    public function loadModel($name)
    {
        $path = 'models/' . $name . '_model.php';

        if (file_exists($path)) {
            require 'models/' . $name . '_model.php';
            $modelname = $name . '_model';
            $this->model = new $modelname;
        }
    }


    public function loadid($id)
    {
        $this->idname = $id;
    }

    public function Translate($keyword)
    {
        $key = str_replace(' ', '_', $this->CutLanguageText(30, $keyword));
        return $this->SelectLanguage(LANG, $key, $keyword);
    }

    public function CutLanguageText($length, $data)
    {
        // strip tags to avoid breaking any html
        $string = strip_tags(htmlspecialchars_decode($data, ENT_NOQUOTES));
        if (strlen($string) > $length) {
            // truncate string
            $stringCut = substr($string, 0, $length);
            // make sure it ends in a word so assassinate doesn't become ass...
            $string = substr($stringCut, 0, strrpos($stringCut, ' '));
        }
        return $string;
    }

    public function loadcontroler($controller)
    {

        $this->view->controller = $controller;
        $this->view->run = new controller();

    }

    public function Listlanguage()
    {
        return $this->Showlanguage();
    }


    public function randomname($length = 8)
    {
        $characters = 'cxbvjhuy78erfuwir8ycnkljafGHVHFCFGsdkcnjedcjhPONJBVFSESOKOM230peihurfg4uihfgbvhcbvjkgwtfdwgudyhwehehfbcgevdzxchv';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function Images($index)
    {
        $path = 'models/home_model.php';
        if (file_exists($path)) {
            require 'models/home_model.php';
            $modelname = 'home_model';
            $this->home = new $modelname;
            return $this->home->Gallery($index);
        }
    }

    public function CommonFindiData($id)
    {
        $path = 'models/home_model.php';
        if (file_exists($path)) {
            require 'models/home_model.php';
            $modelname = 'home_model';
            $this->home = new $modelname;
            return $this->home->Finddata($id);
        }
    }

    public function code($length = 3)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function profile()
    {
        $loggedin = session::get('username');
        if (isset($_SESSION['username'])) {
            if (!empty($_SESSION['username'])) {

                $path = 'models/home_model.php';
                if (file_exists($path)) {
                    require 'models/home_model.php';
                    $modelname = 'home_model';
                    $home = new $modelname;
                    $this->view->profile = $home->getProfile($loggedin);
                }
            }
        }
    }


    public function Statistics($page)
    {
        $this->Statistic($page);
    }

    public function Currency()
    {
        return $this->CurrencyData();
    }

    public function SelectCurrency($curr, $price)
    {
        return $this->SelectCarrency($curr, $price);
    }

    public function content($id)
    {
        return $this->FindContent($id);
    }

}

?>
