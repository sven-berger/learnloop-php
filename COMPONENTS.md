# PHP-Komponenten Leitfaden

Dieses Projekt nutzt **wiederverwendbare PHP-Komponenten** als Alternative zu React/JS-Komponenten.

## Prinzip: PHP-Include mit Props-Array

Komponenten sind PHP-Dateien, die als Funktionen oder Include-Blöcke mit Props aufgerufen werden.

```php
<?php
// Komponente aufrufen mit Props-Array
$content = GridLayout([
    'cols' => 3,
    'children' => '<div class="card">Item 1</div><div class="card">Item 2</div>'
]);
echo $content;
?>
```

## Komponenten-Muster

### 1) Function-basierte Komponente (empfohlen)

**Datei**: `src/Components/Card.php`

```php
<?php

declare(strict_types=1);

/**
 * Card Component
 *
 * Wiederverwendbare Karten-Komponente.
 *
 * Props:
 *   title: string - Kartentitel
 *   image: string - Bild-URL (optional)
 *   description: string - Kartentext
 *   link: string - Link-URL (optional)
 */
function Card(array $props = []): string
{
    $title = htmlspecialchars((string) ($props['title'] ?? 'Titel'), ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars((string) ($props['description'] ?? ''), ENT_QUOTES, 'UTF-8');
    $image = htmlspecialchars((string) ($props['image'] ?? ''), ENT_QUOTES, 'UTF-8');
    $link = htmlspecialchars((string) ($props['link'] ?? ''), ENT_QUOTES, 'UTF-8');

    return sprintf(
        '<article class="card">%s<div class="card-body"><h3 class="card-title">%s</h3>%s%s</div></article>',
        $image ? sprintf('<img src="%s" alt="%s" class="card-img-top">', $image, $title) : '',
        $title,
        $description ? sprintf('<p class="card-text text-muted">%s</p>', $description) : '',
        $link ? sprintf('<a href="%s" class="btn btn-primary">Mehr</a>', $link) : ''
    );
}
```

**Verwendung**:

```php
<?php
include __DIR__ . '/../Components/Card.php';

echo Card([
    'title' => 'React Basics',
    'image' => '/images/react.png',
    'description' => 'Lerne die Grundlagen...',
    'link' => '/docs/react'
]);
?>
```

### 2) GridLayout Komponente (Spalten-Grid)

**Prinzip**: Responsive Grid mit konfigurierbarer Spaltenanzahl.

```php
<?php
include __DIR__ . '/../Components/GridLayout.php';

$items = '<div class="card">Item 1</div><div class="card">Item 2</div><div class="card">Item 3</div>';

echo GridLayout([
    'cols' => 3,          // 3 Spalten auf Tablets/Desktop, 1 Spalte auf Mobil
    'children' => $items,
    'gap' => 'g-3'        // Bootstrap Gap-Klasse
]);
?>
```

Dies generiert:

```html
<div class="row row-cols-1 row-cols-md-3 g-3">
  <div class="card">Item 1</div>
  <div class="card">Item 2</div>
  <div class="card">Item 3</div>
</div>
```

## Vorhandene Komponenten im Projekt

### Sidebar/Skills.php

Zeigt Skills als Karten in einer vertikalen Liste an.

```php
<?php
// In layout.php
require __DIR__ . '/sidebar/Skills.php';
// Skills werden direkt gerendert basierend auf $skills-Variable
?>
```

## Best Practices

1. **Props-Validierung**: Nutze `htmlspecialchars()` für alle Benutzer-Eingaben
2. **Type Hints**: Verwende `array<string, mixed> $props` für Klarheit
3. **Defaults**: Setze sinnvolle Standardwerte mittels `??`
4. **Dokumentation**: JSDoc/PHPDoc oben in der Funktion
5. **Naming**: Komponentennamen groß (z. B. `Card`, `GridLayout`)

## Hinweis: Unterschied zu React

| Aspekt          | React                 | PHP                        |
| --------------- | --------------------- | -------------------------- |
| **Dynamik**     | Client-seitig, States | Server-seitig, Array-Props |
| **Reuse**       | Import/JSX            | include/Array-Props        |
| **Typisierung** | TypeScript (optional) | PHP Type Hints (optional)  |
| **Build**       | Compiler/Bundler      | Keine (direkt ausgeführt)  |

---

**TL;DR**: Komponenten in PHP sind einfach **Funktionen mit Props-Array**, die HTML zurückgeben. `include`, call, echo — fertig!
