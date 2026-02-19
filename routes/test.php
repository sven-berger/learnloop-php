<?php

require_once __DIR__ . '/../src/Controller/TestController.php';

$controller = new TestController();
echo $controller->test();
