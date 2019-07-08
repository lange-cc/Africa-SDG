<?php
/**
 * Created by Abe jahwin.
 * User: APPLE
 * Date: 2018-10-18
 * Time: 14:39
 */
?>
<?php
if (!isset($_COOKIE['lang'])) {
    define('LANG', 'en');
} else if (empty($_COOKIE['lang'])) {
    define('LANG', 'en');
} else {
    define('LANG', $_COOKIE['lang']);
}

?>
<?php
define('DB_TYPEE', 'mysql');
define('DB_HOSTT', 'localhost');
define('DB_NAMEE', 'africasd_database');
define('DB_USERR', 'africasd_user');
define('DB_PASSS', 'Xxx2017xxx');
?>


<?php
class HModel
{
    function __construct()
    {
        try {
            $this->db = new pdo(DB_TYPEE . ':host=' . DB_HOSTT . ';dbname=' . DB_NAMEE, DB_USERR, DB_PASSS,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            //die(json_encode(array('outcome' => true)));
        } catch (PDOException $ex) {
            die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
        }
    }

    public function SelectLanguage($abrev, $key, $mainKeyword)
    {
        $command = $this->db->prepare("SELECT * FROM `mvc_lang_keywords` WHERE keytext = :key AND abreviation = :abrev");
        $command->execute(array(':key' => $key, ':abrev' => $abrev));
        if ($command->rowCount() > 0) {
            while ($row = $command->fetch(PDO::FETCH_ASSOC)) {
                $keyword = $row['keyword'];
            }
            return $keyword;
        } else {
            $langId = $this->GetLangId('en');
            $this->Addnewkeyword($mainKeyword, $key, 'en', $langId);
            return $mainKeyword;
        }
    }

    public function GetLangId($abrev)
    {
        $command = $this->db->prepare("SELECT * FROM `mvc_language` WHERE abreviation = :abrev");
        $command->execute(array(':abrev' => $abrev));
        if ($command->rowCount() > 0) {
            while ($row = $command->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
            }
            return $id;
        }
    }

    public function Addnewkeyword($keyword, $key, $abrev, $langId)
    {
        $proced = new \stdClass();
        $status = $this->Checkifkeyexist($key, $keyword, $abrev);

        if ($status == 1) {

        } else if ($status == 0) {
            $command = $this->db->prepare("INSERT INTO `mvc_lang_keywords` (`id`, `lang_id`, `keyword`, `keytext`, `abreviation`) VALUES (NULL, :langId, :keyword, :key, :abrev)");
            if ($command->execute(array(
                ':langId' => $langId,
                ':keyword' => $keyword,
                ':key' => $key,
                ':abrev' => $abrev
            ))) {
            } else {
            }
        }
    }

    public function Checkifkeyexist($key, $keyword, $abrev)
    {
        $command = $this->db->prepare("SELECT * FROM `mvc_lang_keywords` WHERE abreviation = :abrev AND keytext = :key AND keyword =:keyword");
        $command->execute(array(':abrev' => $abrev, ':key' => $key, ':keyword' => $keyword));
        if ($command->rowCount() > 0) {
            return 1;
        } else {
            return 0;
        }
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

}

?>

