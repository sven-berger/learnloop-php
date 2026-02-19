<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Controller/IndexController.php';

/**
 * Simple Router: Basierend auf ?page=xxx die richtige Controller-Method aufrufen
 * 
 * Usage:
 * - ?page=index  → controller->index()
 * - ?page=guestbook → controller->guestbook()
 */
$page = $_GET['page'] ?? 'index';
$page = preg_replace('/[^a-zA-Z0-9_]/', '', $page); // Sicherheit: nur alphanumerisch

$controller = new IndexController();

// Prüfe, ob Method existiert
if (method_exists($controller, $page)) {
    echo $controller->$page();
} else {
    // Fallback: Homepage anzeigen
    echo $controller->index();
}
