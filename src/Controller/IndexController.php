<?php

declare(strict_types=1);

require_once __DIR__ . '/../View/ViewRenderer.php';
require_once __DIR__ . '/TestController.php';

class IndexController
{
    /**
     * Homepage rendert
     */
    public function index(): string
    {
        return renderPage('home', [
            'title' => 'Willkommen bei LearnLoop',
            'greeting' => 'Entdecke ein PHP-Projekt mit wiederverwendbaren Komponenten!'
        ]);
    }

    /**
     * Gästebuch-Seite rendert
     */
    public function guestbook(): string
    {
        // Mock-Daten (später aus Datenbank)
        $guestbookEntries = [
            [
                'author' => 'Besucher 1',
                'date' => '19.02.2026',
                'message' => 'Tolle Seite mit gut strukturiertem Code!'
            ],
            [
                'author' => 'Besucher 2',
                'date' => '18.02.2026',
                'message' => 'Das Komponenten-System ist sehr praktisch.'
            ],
        ];

        return renderPage('guestbook', [
            'guestbookEntries' => $guestbookEntries,
            'message' => 'Vielen Dank für deinen Eintrag!'
        ]);
    }

    public function test(): string
    {
        $controller = new TestController();
        return $controller->test();
    }
}
