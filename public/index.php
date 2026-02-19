<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Controller/IndexController.php';

$controller = new IndexController();
echo $controller->index();
