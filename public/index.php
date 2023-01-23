<?php
require_once('../vendor/autoload.php');
require_once('../app/functions/functions.php');

use app\controller\TestController;
(new app\core\RouterCore());

$controller = new TestController();
