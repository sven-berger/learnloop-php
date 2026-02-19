<?php

declare(strict_types=1);

/**
 * Beispiel: Wie man wiederverwendbare PHP-Komponenten nutzt
 */

// 1. Komponente laden
require_once __DIR__ . '/Components/GridLayout.php';

/**
 * Beispiel 1: Skills in einem 3-spaltigen Grid anordnen
 */
function renderSkillsGrid(array $skills = []): string
{
    if (empty($skills)) {
        return '<p class="text-muted">Keine Skills verfügbar.</p>';
    }

    $items = '';
    foreach ($skills as $skill) {
        $title = htmlspecialchars((string) ($skill['title'] ?? ''), ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars((string) ($skill['description'] ?? ''), ENT_QUOTES, 'UTF-8');
        $image = htmlspecialchars((string) ($skill['image'] ?? ''), ENT_QUOTES, 'UTF-8');
        $link = htmlspecialchars((string) ($skill['link'] ?? ''), ENT_QUOTES, 'UTF-8');

        $items .= sprintf(
            '<div class="col"><article class="card h-100">%s<div class="card-body"><h3 class="h5 card-title">%s</h3>%s%s</div></article></div>',
            $image ? sprintf('<img src="%s" alt="%s" class="card-img-top">', $image, $title) : '',
            $title,
            $description ? sprintf('<p class="card-text text-muted">%s</p>', $description) : '',
            $link ? sprintf('<a href="%s" class="btn btn-sm btn-primary">Mehr</a>', $link) : ''
        );
    }

    return GridLayout([
        'cols' => 3,
        'children' => $items,
        'gap' => 'g-4'
    ]);
}

/**
 * Beispiel 2: Produkte in 2-spaltiger Anordnung
 */
function renderProductGrid(array $products = []): string
{
    $items = '';
    foreach ($products as $product) {
        $name = htmlspecialchars((string) ($product['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars((string) ($product['price'] ?? ''), ENT_QUOTES, 'UTF-8');

        $items .= sprintf(
            '<div class="col"><div class="card"><div class="card-body"><h5 class="card-title">%s</h5><p class="card-text"><strong>%s€</strong></p></div></div></div>',
            $name,
            $price
        );
    }

    return GridLayout([
        'cols' => 2,
        'children' => $items
    ]);
}

/**
 * Beispiel 3: Features in 4-spaltiger Anordnung  
 */
function renderFeatureGrid(array $features = []): string
{
    $items = '';
    foreach ($features as $feature) {
        $icon = htmlspecialchars((string) ($feature['icon'] ?? '📄'), ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars((string) ($feature['name'] ?? ''), ENT_QUOTES, 'UTF-8');

        $items .= sprintf(
            '<div class="col"><div class="card text-center"><div class="card-body"><h2 class="display-5">%s</h2><h5 class="card-title">%s</h5></div></div></div>',
            $icon,
            $name
        );
    }

    return GridLayout([
        'cols' => 4,
        'children' => $items,
        'gap' => 'g-2'
    ]);
}

// ============================================
// Verwendungsbeispiele in View-Dateien:
// ============================================

// In einer View-Datei (z.B. src/View/dashboard.php):
/*

<?php
require_once __DIR__ . '/Components/GridLayout.php';

// Beispiel A: Skills anzeigen
echo '<section><h2>Meine Skills</h2>';
echo renderSkillsGrid($skills);
echo '</section>';

// Beispiel B: Custom Grid mit eigenem HTML
$customItems = '
    <div class="col"><div class="card">Item 1</div></div>
    <div class="col"><div class="card">Item 2</div></div>
    <div class="col"><div class="card">Item 3</div></div>
';

echo GridLayout(['cols' => 3, 'children' => $customItems]);
?>

*/
