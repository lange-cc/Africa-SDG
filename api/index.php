<?php
require 'libs/session.php';
require 'config/vendor/autoload.php';
require 'config/database.php';
require 'libs/database.php';
require 'libs/model.php';

require 'libs/languages.php';
require 'libs/error.php';
require 'libs/controller_model.php';
require 'libs/controller.php';
require 'libs/view.php';
require 'libs/email.php';
require 'config/path.php';
require 'libs/currency.php';
require 'libs/UploadHandler.php';
require 'libs/route.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-type");
header("Content-type: application/json");
$app = new route;


?>
