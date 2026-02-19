<?php

declare(strict_types=1);

require_once __DIR__ . '/../View/ViewRenderer.php';

class TestController
{
    public function test(): string
    {
        $name = '';
        $randomNumber = null;
        $selectMulti = null;
        $finalNumber = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = (string) filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
            $randomNumber = filter_input(INPUT_POST, 'randomNumber', FILTER_VALIDATE_INT);
            $selectMulti = filter_input(INPUT_POST, 'selectMulti', FILTER_VALIDATE_INT);

            if ($randomNumber !== null && $randomNumber !== false
                && $selectMulti !== null && $selectMulti !== false) {
                $finalNumber = $randomNumber * $selectMulti;
            }
        }

        return renderPage('test', [
            'name' => $name,
            'randomNumber' => $randomNumber,
            'selectMulti' => $selectMulti,
            'finalNumber' => $finalNumber,
        ]);
    }
}
