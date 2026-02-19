<?php

declare(strict_types=1);


class GuestbookController   
{
    public function guestbook(): string
    {

        ob_start();
        require __DIR__ . '/../View/layout.php';
        return (string) ob_get_clean();
    }
}
