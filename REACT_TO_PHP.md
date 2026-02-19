# React ↔ PHP Komponenten Übersetzung

## Dein React GridLayout → PHP Variante

### React (Original)

```tsx
import type { ReactNode } from "react";

interface GridLayoutProps {
  cols?: 1 | 2 | 3 | 4 | 5 | 6;
  children?: ReactNode;
}

const colsMap = {
  1: "lg:grid-cols-1",
  2: "lg:grid-cols-2",
  3: "lg:grid-cols-3",
  4: "lg:grid-cols-4",
  5: "lg:grid-cols-5",
  6: "lg:grid-cols-6",
};

export default function GridLayout({ cols = 2, children }: GridLayoutProps) {
  return <div className={`grid gap-2.5 ${colsMap[cols]}`}>{children}</div>;
}
```

### PHP (direkte Übersetzung)

```php
<?php

declare(strict_types=1);

/**
 * GridLayout Component
 *
 * @param array<string, mixed> $props {
 *   cols?: int Spaltenanzahl 1-6
 *   children?: string HTML-Inhalt
 * }
 */
function GridLayout(array $props = []): string
{
    $cols = (int) ($props['cols'] ?? 2);
    $children = (string) ($props['children'] ?? '');

    // Validiere cols 1-6
    if ($cols < 1 || $cols > 6) {
        $cols = 2;
    }

    $rowClass = 'row row-cols-1 row-cols-md-' . $cols . ' g-2';

    return sprintf(
        '<div class="%s">%s</div>',
        htmlspecialchars($rowClass, ENT_QUOTES, 'UTF-8'),
        $children
    );
}
```

---

## Vergleich: React vs. PHP

| Feature             | React                                   | PHP                                              |
| ------------------- | --------------------------------------- | ------------------------------------------------ |
| **Props übergeben** | `<GridLayout cols={3}>...</GridLayout>` | `GridLayout(['cols' => 3, 'children' => '...'])` |
| **Children**        | JSX als `children` Prop                 | HTML-String als `children`                       |
| **Type Safety**     | TypeScript Interface                    | PHPDoc `array<string, mixed>`                    |
| **Rendering**       | JSX → JavaScript → DOM                  | String → HTML ausgeben                           |
| **State**           | `useState()`                            | Server-seitig: Variable                          |
| **Effects**         | `useEffect()`                           | Server-seitig: keine (Pre-Rendering)             |

---

## Praktische Verwendung: Schritt für Schritt

### React

```tsx
// 1. Import
import GridLayout from "./GridLayout";

// 2. Verwenden
<GridLayout cols={3}>
  <Card title="Item 1" />
  <Card title="Item 2" />
  <Card title="Item 3" />
</GridLayout>;

// 3. Rendering → DOM im Browser
```

### PHP

```php
<?php
// 1. Lade Komponente
require __DIR__ . '/Components/GridLayout_functional.php';

// 2. Baue Items-String (oder schleife über Daten)
$items = '';
$items .= '<div class="col"><div class="card">Item 1</div></div>';
$items .= '<div class="col"><div class="card">Item 2</div></div>';
$items .= '<div class="col"><div class="card">Item 3</div></div>';

// 3. Rufe Komponente auf
echo GridLayout([
    'cols' => 3,
    'children' => $items
]);

// 4. Rendering → HTML Server-seitig → Browser
?>
```

---

## Best Practice: Card-Komponente in PHP

```php
<?php

declare(strict_types=1);

/**
 * Card Component — wiederverwendbar
 */
function Card(array $props = []): string
{
    $title = htmlspecialchars((string) ($props['title'] ?? ''), ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars((string) ($props['description'] ?? ''), ENT_QUOTES, 'UTF-8');
    $image = htmlspecialchars((string) ($props['image'] ?? ''), ENT_QUOTES, 'UTF-8');

    return sprintf(
        '<article class="card">%s<div class="card-body"><h3 class="card-title">%s</h3><p class="card-text">%s</p></div></article>',
        $image ? sprintf('<img src="%s" alt="%s" class="card-img-top">', $image, $title) : '',
        $title,
        $description
    );
}

// Verwendung:
function renderSkillCards(array $skills): string
{
    $items = '';
    foreach ($skills as $skill) {
        $items .= '<div class="col">' . Card($skill) . '</div>';
    }

    return GridLayout(['cols' => 3, 'children' => $items]);
}
?>
```

---

## Merksatz

> **PHP-Komponenten = Funktionen mit Props-Array, die HTML-String zurückgeben.**
>
> - `include` statt `import`
> - Array-Props statt JSX-Props
> - String-Output statt React-Tree
> - Kein Build-Step nötig!

---

## Weitere Lektüre

- Siehe [COMPONENTS.md](COMPONENTS.md) für das vollständige Komponenten-Leitfaden
- Siehe [src/Components/Examples.php](src/Components/Examples.php) für praktische Beispiele
