<?php
class Router{
    public $currentRoute = 'index.php';
    public $template = 'main.php';
    
    function getRouteByUrl(){
        $module = '';
        $object = '';
        $action = '';


        $arrSections = explode('/', $_SERVER['REQUEST_URI']);
        // echo '<pre>',print_r($_SERVER,1),'<pre>';
        
        $module = !empty($arrSections[1]) ? $arrSections[1] : 'storage';
        $object = !empty($arrSections[2]) ? $arrSections[2] : false;
        $action = !empty($arrSections[3]) ? $arrSections[3] : false;
        $routeInfo = [
            'module' => $module,
            'object'=> $object,
            'action'=> $action,
        ];
        echo '<pre>',print_r($routeInfo,1),'<pre>';
        return $routeInfo;
    }

    function test(){
        $out[] = json_decode(file_get_contents('php://input'));
        echo json_encode($out);
    }

}
    