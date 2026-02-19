<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Controller/GuestbookController.php';

$controller = new GuestbookController();
echo $controller->guestbook();
