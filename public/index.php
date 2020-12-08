<?php

define('CONFIG_ROOT', __DIR__);
define('ROOT', dirname(CONFIG_ROOT));

require_once ( ROOT . '../config/connection.php');
require_once ( ROOT . '../config/loader.php');

use config\Router;


(new Router)->run();
