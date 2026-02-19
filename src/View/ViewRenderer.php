<?php

declare(strict_types=1);

/**
 * View Renderer Utility
 * 
 * Hilft beim Laden und Rendering von View-Dateien mit Daten.
 * 
 * Usage:
 * ```php
 * $content = render('pages/home', ['title' => 'Willkommen']);
 * ```
 */

/**
 * Rendert eine View-Datei mit bereitgestellten Daten
 * 
 * @param string $viewPath Pfad zur View (ohne Extension, relativ zu View-Ordner)
 * @param array<string, mixed> $data Daten, die in der View verfügbar sein sollen
 * @return string Gerendertes HTML
 * 
 * @throws RuntimeException Wenn View-Datei nicht existiert
 */
function render(string $viewPath, array $data = []): string
{
    $filePath = __DIR__ . '/pages/' . $viewPath . '.php';

    if (!file_exists($filePath)) {
        throw new RuntimeException(sprintf('View not found: %s', $filePath));
    }

    // Extrahiere Daten zu lokalen Variablen
    extract($data, EXTR_SKIP);

    // Starte Output Buffering
    ob_start();

    try {
        require $filePath;
    } catch (Throwable $e) {
        ob_end_clean();
        throw $e;
    }

    return (string) ob_get_clean();
}

/**
 * Wrapper: Rendert komplette Page mit Layout
 * 
 * @param string $viewPath View-Datei
 * @param array<string, mixed> $data Daten für View
 * @param string $title Page Title
 * @return string Komplettes HTML mit Layout
 */
function renderPage(string $viewPath, array $data = [], string $title = 'LearnLoop'): string
{
    // Rendere View-Content
    $content = render($viewPath, $data);

    // Übergebe an Layout
    ob_start();

    require __DIR__ . '/layout.php';

    return (string) ob_get_clean();
}
