<?php

require_once __DIR__ . '/../src/Controller/IndexController.php';

$controller = new IndexController();
echo $controller->index();
