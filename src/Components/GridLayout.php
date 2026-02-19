<?php

declare(strict_types=1);

/**
 * GridLayout Component
 * 
 * Responsive Grid-Component für flexible Spalten-Anordnung.
 * 
 * Usage:
 * ```php
 * <?php
 *   require __DIR__ . '/../Components/GridLayout_functional.php';
 *   echo GridLayout([
 *     'cols' => 3,
 *     'children' => '<div class="card">...</div><div class="card">...</div>'
 *   ]);
 * ?>
 * ```
 * 
 * @param array<string, mixed> $props {
 *   cols?: int     Spaltenanzahl auf Tablets/Desktop: 1-6 (default: 2, Mobil: 1)
 *   children?: string  HTML-Inhalt der Grid-Items
 *   gap?: string  Bootstrap Gap-Klasse (default: 'g-3')
 * }
 * @return string Gerendertes HTML mit Bootstrap Grid
 */
function GridLayout(array $props = []): string
{
    $cols = (int) ($props['cols'] ?? 2);
    $children = (string) ($props['children'] ?? '');
    $gap = (string) ($props['gap'] ?? 'g-3');

    // Validiere Spaltenanzahl 1-6
    if ($cols < 1 || $cols > 6) {
        $cols = 2;
    }

    // Bootstrap row-cols-* Klasse
    // Mobil: 1 Spalte (row-cols-1)
    // Tablets+: Konfigurierbare Spalten
    $rowClass = 'row row-cols-1 row-cols-md-' . $cols . ' ' . $gap;

    return sprintf(
        '<div class="%s">%s</div>',
        htmlspecialchars($rowClass, ENT_QUOTES, 'UTF-8'),
        $children
    );
}
