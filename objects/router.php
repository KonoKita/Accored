<?php
class Router{
    public $currentRoute = 'index.php';
    public $template = 'main.php';
    
    function getRouteByUrl(){
        $arrSections = explode('/',$_SERVER['REDIRECT_URL']);
        $route = end($arrSections);
        $sectionCount = count($arrSections);
        $arrCurrentRouteInfo = [
            'route' => $route,
            'object'=> $arrSections[$sectionCount],
        ];
        return $arrCurrentRouteInfo;
    }

}
    