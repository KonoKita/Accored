<?php
class Accore{
    public $recipesController;
    public $js;
    public $css;
    private $db;

    function __construct(){
        $this->prepareApp();//подключаем бд js css
        $this->db = new AccoreDB;
        $this->recipesController = new RecipesController($this->db);
    }
    
    function addJs($path){
        $this->js .= '<script src="'.$path.'"></script>';
    }

    function addCss($path, $media = false){
        if($media !== false){
            $this->css .= '<link rel="stylesheet" href="CSS/media.css" media="'.$media.'">';
        }
        $this->css .= '<link rel="stylesheet" href="'.$path.'">';
    }

    public function prepareApp(){
        include_once 'objects/db.php';//подключаем бд
        include_once 'modules/storage/controllers/recipes.php'; //подключаем контроллер рецептов
        include_once 'modules/storage/models/recipes.php'; //подключаем модель рецептов
        
        $this->addJs('../../scripts/app.js');
        $this->addJs('../../scripts/accCoreFront.js');
        $this->addCss('../../css/style.css');
        
    }

    //если было действие выполняет его и выводит верстку
    public function stroke($route){
        //проверяет есть ли действие
        $action = $route['action'];

        if(!empty($action)){
            $this->doAction($route);
        }
        else{
            $view = $this->getView($route);
            return $view;
        }
    }

    public function getModuleView($templatePath, $data = false){
        ob_start();
        include_once $templatePath;
        $moduleView = ob_get_contents();
        ob_end_clean();
        return $moduleView;
    }

    public function getView($route){
        switch($route['module']){
            case 'storage':
                $recipesList = $this->recipesController->getAllRecipes();
                $data = [
                    'recipesList' => $recipesList
                ];
                $recipesListView = $this->getModuleView('modules/storage/views/recipesListView.php', $data);
                $data = [
                    'recipesListView' => $recipesListView
                ];
                $content = $this->getModuleView('modules/storage/views/recipesSection.php', $data);
                $css = $this->css;
                $js = $this->js;
                ob_start();
                include_once 'templates/main.php';
                $view = ob_get_contents();
                ob_end_clean();
                break;
            default:
        }
        return $view;
    }

    public function doAction($route){
        $object = $route['object'];
        $action = $route['action'];
        $this->$object->$action();
    }
}
    