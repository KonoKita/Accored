<?php
class Accore{
    public $js;
    private $css;

    
    function addJs($path){
        $this->js .= '<script src="'.$path.'"></script>';
    }

    function addCss($path, $media = false){
        if($media !== false){
            $this->css .= '<link rel="stylesheet" href="CSS/media.css" media="'.$media.'">';
        }
        $this->css .= '<link rel="stylesheet" href="'.$path.'">';
    }

    public function getAddedCss(){
        return $this->css;
    }

    public function getAddedJs(){
        return $this->js;
    }

    public function prepareApp(){
        include_once 'objects/db.php';
        $this->addJs('scripts/app.js');
        $this->addCss('css/style.css');
        
    }
}
    