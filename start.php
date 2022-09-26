<?php 
/*генерирует $html то что запрашивает роутер 
$currentRoute виден из index.php*/
//инициализирует ядро
include_once 'objects/core.php';

$accore = new Accore;

$html = $accore->stroke($currentRoute);


echo $html;
