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
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/react.development.js"></script>
    <script src="/assets/js/react-dom.development.js"></script>

</head>

<body>
    <h1 class="text-2xl text-red-600 p-6">Meine Skills</h1>
    <div id="app" data-skills="<?= $skillsJson ?>"></div>
    <script src="/assets/js/tailwind.js"></script>

    <script type="text/babel" src="/assets/js/app.js"></script>
</body>

</html>