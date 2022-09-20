<?php
include_once 'controllers/core.php'; //подключаем ядро
$accore = new Accore;
$accore->prepareApp();//подключаем бд js css

$js = $accore->getAddedJs();
$css = $accore->getAddedCss();

$testDb = new AccoreDB;
$conneciton = $testDb->getConnectionToDB();


$recipesList = [
    'buckwheat' => 'cook some buckwheat',
    'eggs' => 'cook some eggs',
    'milk' => 'cook some buckwheat',
    ];
//выводим на экран результат того что происходит выше

ob_start();
include_once 'view/main.php';
$html = ob_get_contents();
ob_end_clean();

echo $html;
