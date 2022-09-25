<?php
//=========index.php=========//
/*
-Старт происходит отсюда 
-Воронка всех запросов, через роутер определяет маршрут приложения
-Инициирует стартовый скрипт start.php
*/
include_once 'objects/router.php';

$router = new Router;
$currentRoute = $router->getRouteByUrl();

include_once 'start.php';