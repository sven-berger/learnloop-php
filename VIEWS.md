# Views & Templates: Anleitung

## Überblick: MVC-Pattern

```
├─ Controller  → lädt Daten, ruft View auf
├─ View        → rendert individuellen Seiten-Inhalt
└─ Layout      → Master-Template mit Header/Sidebar/Footer
```

## Struktur

```
src/
├─ Controller/
│  └─ IndexController.php    # Logik für Seiten
├─ View/
│  ├─ layout.php             # Master-Template
│  ├─ sidebar.php            # Shared Sidebar
│  ├─ ViewRenderer.php       # Helper für View-Rendering
│  └─ pages/
│     ├─ home.php            # Homepage
│     ├─ guestbook.php       # Gästebuch
│     └─ ... weitere Seiten
```

## Wie es funktioniert

### 1. Controller definiert Daten & View

```php
<?php
// src/Controller/IndexController.php

class IndexController
{
    public function index(): string
    {
        // Daten sammeln
        $data = [
            'title' => 'Willkommen',
            'posts' => [...],
            'user' => [...]
        ];

        // View laden & rendern mit Daten + Layout
        return renderPage('home', $data);
    }
}
```

### 2. View-Datei nutzt übergebene Daten

```php
<?php
// src/View/pages/home.php
// $title, $posts, $user sind hier verfügbar!

echo '<h1>' . htmlspecialchars($title) . '</h1>';

foreach ($posts as $post) {
    echo '<p>' . htmlspecialchars($post['content']) . '</p>';
}
?>
```

### 3. Layout (Master-Template) umhüllt die View

```php
<?php
// src/View/layout.php

// $content wird vom ViewRenderer gefüllt!
?>
<!DOCTYPE html>
<html>
    <body>
        <header>...</header>
        <main>
            <aside><!-- Sidebar --></aside>
            <article>
                <?php echo $content; ?>
            </article>
        </main>
    </body>
</html>
```

---

## Neue Seite hinzufügen: Schritt-für-Schritt

### Schritt 1: View-Datei erstellen

Erstelle `src/View/pages/blog.php`:

```php
<?php
declare(strict_types=1);

// Diese Variablen kommen vom Controller:
// $posts, $category, etc.
?>

<div class="p-4 bg-white border rounded">
    <h2 class="h4">Blog: <?= htmlspecialchars($category ?? 'Alle', ENT_QUOTES, 'UTF-8') ?></h2>

    <?php foreach ($posts as $post): ?>
        <article class="mb-4">
            <h3><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p><?= htmlspecialchars($post['excerpt'], ENT_QUOTES, 'UTF-8') ?></p>
        </article>
    <?php endforeach; ?>
</div>
```

### Schritt 2: Controller-Method hinzufügen

Füge `src/Controller/IndexController.php` eine Method hinzu:

```php
public function blog(): string
{
    $posts = [
        ['title' => 'Post 1', 'excerpt' => 'Excerpt...'],
        ['title' => 'Post 2', 'excerpt' => 'Excerpt...'],
    ];

    return renderPage('blog', [
        'posts' => $posts,
        'category' => 'PHP'
    ]);
}
```

### Schritt 3: Route aufrufen

Im Router:

```php
$action = $_GET['page'] ?? 'index';
$controller = new IndexController();

if (method_exists($controller, $action)) {
    echo $controller->$action();
}
```

---

## ViewRenderer API

### `render(string $viewPath, array $data): string`

Rendert nur die View (ohne Layout).

```php
$content = render('pages/home', ['title' => 'Willkommen']);
// Returns: <div>...</div>
```

### `renderPage(string $viewPath, array $data, string $title): string`

Rendert View **mit** Master-Layout.

```php
$html = renderPage('pages/home', ['title' => 'Willkommen']);
// Returns: <!DOCTYPE html>...<body>...</body></html>
```

---

## Best Practices

### 1. Daten escapen

Immer `htmlspecialchars()` für Benutzerdaten verwenden:

```php
<?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
```

### 2. Komponenten in Views nutzen

View-Datei kann Komponenten laden:

```php
<?php
require_once __DIR__ . '/../Components/GridLayout_functional.php';

echo GridLayout([
    'cols' => 3,
    'children' => $cardContent
]);
?>
```

### 3. Saubere Daten-Struktur im Controller

```php
$data = [
    'title' => '...',
    'items' => [...],
    'user' => [...]
];
return renderPage('view', $data);
```

### 4. Conditionals in Views

```php
<?php if (!empty($items)): ?>
    <!-- Anzeigen wenn $items vorhanden -->
<?php else: ?>
    <p>Keine Items gefunden</p>
<?php endif; ?>
```

---

## Zusammenfassung

| Schritt | Datei                                | Aufgabe                                   |
| ------- | ------------------------------------ | ----------------------------------------- |
| 1       | `src/Controller/IndexController.php` | Daten laden, `renderPage()` aufrufen      |
| 2       | `src/View/pages/xxx.php`             | HTML mit Variablen aus Controller         |
| 3       | `src/View/layout.php`                | Master-Template (Sidebar, Header, Footer) |
| 4       | `src/View/ViewRenderer.php`          | Magie: View + Layout zusammenfügen        |

---

## Noch Fragen?

Siehe auch:

- [COMPONENTS.md](../COMPONENTS.md) — Wiederverwendbare Komponenten
- [REACT_TO_PHP.md](../REACT_TO_PHP.md) — React-zu-PHP Übersetzung
