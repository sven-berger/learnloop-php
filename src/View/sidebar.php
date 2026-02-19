<?php

require_once __DIR__ . '/../Modell/SkillModel.php';
$model = new SkillModel();
$skills = $model->all();

require __DIR__ . '/sidebar/Navigation.php';
require __DIR__ . '/sidebar/Skills.php';
