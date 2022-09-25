<?php

include_once 'objects/core.php'; //подключаем ядро
include_once 'controllers/recipes.php'; //подключаем контроллер рецептов
include_once 'models/recipes.php'; //подключаем модель рецептов

$accore = new Accore;
$accore->prepareApp();//подключаем бд js css

$js = $accore->getAddedJs();
$css = $accore->getAddedCss();

$db = new AccoreDB;

$recipesObj = new RecipesController($db);

$recipesList = $recipesObj->getAllRecipes();
// echo '<pre>',print_r($recipes,1),'<pre>';

//выводим на экран результат того что происходит выше

ob_start();
include_once 'view/main.php';
$html = ob_get_contents();
ob_end_clean();

// if(!empty($_POST)){
//     echo 'asdasd';
// }