<?php
class Router{
    public $currentRoute = 'index.php';
    public $template = 'main.php';
    
    function getRouteByUrl(){
        $arrSections = explode('/', $_SERVER['REQUEST_URI']);
        $module = $arrSections[1];
        $object = $arrSections[2];
        $action = $arrSections[3];
        $routeInfo = [
            'module' => $module,
            'object'=> $object,
            'action'=> $action,
        ];
        return $routeInfo;
    }

    function test(){
        $out[] = json_decode(file_get_contents('php://input'));
        echo json_encode($out);
    }

}
    