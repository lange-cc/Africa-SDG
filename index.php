<?php
require 'libs/session.php';
require 'libs/email.php';
require 'libs/languages.php';
require 'libs/error.php';
require 'libs/controller_model.php';
require 'libs/controller.php';
require 'libs/model.php';
require 'libs/view.php';
require 'libs/database.php';

require 'config/path.php';
require 'config/database.php';

require 'libs/plugin/DeviceDetection/vendor/autoload.php';
require 'libs/route.php';

$app = new route;	
?>
