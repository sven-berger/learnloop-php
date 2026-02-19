<?php

declare(strict_types=1);

// Komponente laden
require_once __DIR__ . '/../../Components/GridLayout.php';

// Skills in Karten für das Grid rendern
$skillCards = '';

if (!empty($skills) && is_array($skills)) {
    foreach ($skills as $skill) {
        $title = htmlspecialchars((string) ($skill['title'] ?? 'Skill'), ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars((string) ($skill['description'] ?? ''), ENT_QUOTES, 'UTF-8');
        $image = htmlspecialchars((string) ($skill['image'] ?? ''), ENT_QUOTES, 'UTF-8');
        $link = htmlspecialchars((string) ($skill['link'] ?? ''), ENT_QUOTES, 'UTF-8');

        // Jede Skill als Column-Item im Grid
        $skillCards .= '<div class="col">';
        $skillCards .= '<article class="card h-100">';

        if ($image !== '') {
            $skillCards .= sprintf('<img src="%s" alt="%s" class="card-img-top">', $image, $title);
        }

        $skillCards .= '<div class="card-body d-flex flex-column">';
        $skillCards .= sprintf('<h3 class="h5 card-title">%s</h3>', $title);

        if ($description !== '') {
            $skillCards .= sprintf('<p class="card-text text-muted mb-3">%s</p>', $description);
        }

        if ($link !== '') {
            $skillCards .= sprintf('<a href="%s" class="btn btn-sm btn-primary mt-auto">Mehr erfahren</a>', $link);
        }

        $skillCards .= '</div></article></div>';
    }
}

?>
<div class="p-3 border rounded bg-light mb-4">
    <h2 class="h6 fw-bold mb-3">Meine Skills</h2>

    <?php if ($skillCards !== ''): ?>
        <!-- Beispiel: GridLayout-Komponente mit 2 Spalten -->
        <?php echo GridLayout([
            'cols' => 2,
            'children' => $skillCards,
            'gap' => 'g-3'
        ]); ?>
    <?php else: ?>
        <p class="text-muted mb-0">Keine Skills gefunden.</p>
    <?php endif; ?>
</div>