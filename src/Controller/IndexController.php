<?php

declare(strict_types=1);

require_once __DIR__ . '/../Modell/SkillModel.php';

class IndexController
{
    public function index(): string
    {
        $model = new SkillModel();
        $skills = $model->all();

        ob_start();
        require __DIR__ . '/../View/layout.php';
        return (string) ob_get_clean();
    }
}
