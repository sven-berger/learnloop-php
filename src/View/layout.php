<?php

declare(strict_types=1);

$skillsJson = htmlspecialchars((string) json_encode($skills, JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8');
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
    <main class="container py-4">
        <h1 class="display-6 text-danger mb-4">Meine Skills</h1>
        <div id="app" data-skills="<?= $skillsJson ?>"></div>
    </main>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/react/react.development.js"></script>
    <script src="/vendor/react/react-dom.development.js"></script>
    <script src="/assets/js/app.js"></script>
</body>

</html>