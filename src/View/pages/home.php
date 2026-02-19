<?php


/**
 * Home Page View
 * 
 * Verwendet: $title, $greeting
 */
?>

<div class="p-4 bg-white border rounded mb-4">
    <h2 class="h4 text-danger mb-3"><?= htmlspecialchars($title ?? 'Willkommen', ENT_QUOTES, 'UTF-8') ?></h2>
    <p class="lead"><?= htmlspecialchars($greeting ?? 'Dies ist deine Startseite.', ENT_QUOTES, 'UTF-8') ?></p>

    <hr>

    <h3 class="h5 mb-3">Über diese Seite</h3>
    <p>
        Dieses Projekt zeigt ein strukturiertes PHP-Setup mit 
        <strong>wiederverwendbaren Komponenten</strong>, individualisierbaren Views 
        und einem klaren MVC-Pattern.
    </p>

    <code class="bg-light p-2 d-block">
        Controller → View → Layout Template
    </code>
</div>
