<?php

declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnLoop</title>
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <header class="border-bottom bg-white p-4">
        <div class="container">
            <h1 class="h6 mb-0">LearnLoop</h1>
        </div>
    </header>

    <main class="m-4">
        <div class="row g-4">
            <aside class="col-12 col-lg-3 ps-0">
                <?php require __DIR__ . '/sidebar.php'; ?>
            </aside>

            <!-- Content Area: wird von Views gefüllt -->
            <article class="col-12 col-lg-9">
                <?php echo $content ?? '<p class="text-muted">Keine Inhalte verfügbar.</p>'; ?>
            </article>
        </div>
    </main>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>