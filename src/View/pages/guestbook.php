<?php

declare(strict_types=1);

/**
 * Guestbook Page View
 * 
 * Verwendet: $guestbookEntries (array), $message
 */
?>

<div class="p-4 bg-white border rounded">
    <h2 class="h4 text-danger mb-4">Gästebuch</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info" role="alert">
            <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <!-- Guestbook Einträge -->
    <h3 class="h6 mb-3">Einträge</h3>

    <?php if (!empty($guestbookEntries) && is_array($guestbookEntries)): ?>
        <div class="space-y-3">
            <?php foreach ($guestbookEntries as $entry): ?>
                <div class="p-3 border rounded bg-light">
                    <strong><?= htmlspecialchars((string) ($entry['author'] ?? 'Anonym'), ENT_QUOTES, 'UTF-8') ?></strong>
                    <p class="text-muted small mb-2">
                        <?= htmlspecialchars((string) ($entry['date'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
                    </p>
                    <p class="mb-0">
                        <?= htmlspecialchars((string) ($entry['message'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted">Noch keine Einträge vorhanden.</p>
    <?php endif; ?>

    <!-- Add Entry Form -->
    <hr class="my-4">

    <h3 class="h6 mb-3">Eintrag hinzufügen</h3>

    <form method="post" action="/guestbook.php">
        <div class="mb-3">
            <label for="author" class="form-label">Name</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Nachricht</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Absenden</button>
    </form>
</div>
