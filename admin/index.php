<?php
require 'libs/exelReader.php';
require 'config/vendor/autoload.php';
require 'config/database.php';
require 'libs/database.php';
require 'libs/model.php';

require 'libs/error.php';
require 'libs/controller_model.php';
require 'libs/controller.php';
require 'libs/view.php';
require 'libs/route.php';

require 'libs/session.php';
require 'config/path.php';
require 'libs/language.php';
require 'libs/developer.php';
require 'libs/UploadHandler.php';
new developer;
new route;

?>