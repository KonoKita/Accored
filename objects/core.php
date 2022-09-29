<?php
class Accore{
    public $recipesController;
    public $shedulesController;
    public $js;
    public $css;
    private $db;

    function __construct(){
        $this->prepareApp();//подключаем бд js css
        $this->db = new AccoreDB;
        $this->recipesController = new RecipesController($this->db);
        $this->shedulesController = new shedulesController($this->db);
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
        include_once 'modules/shedules/controllers/shedules.php'; //подключаем модель рецептов
        include_once 'modules/shedules/models/shedules.php'; //подключаем модель рецептов
        
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

    

    public function getView($route){
        $content = $this->getModulesView();
        $data = [
            'css' => $this->css,
            'js' => $this->js,
            'content' => $content,
        ];
        $view = $this->getTemplateView('templates/main.php', $data);
        return $view;
    }

    public function doAction($route){
        $object = $route['object'];
        $action = $route['action'];
        $this->$object->$action();
    }

    public function getModulesView(){
        $totalModulesView = '';
        //recipes
        $recipesList = $this->recipesController->getAllRecipes();

        $data['recipesList'] = $recipesList;

        $recipesListView = $this->getTemplateView('modules/storage/views/recipesListView.php', $data);
        $recipeCreateForm = $this->getTemplateView('modules/storage/views/recipeCreateForm.php');

        $data = [
            'recipesListView' => $recipesListView,
            'recipeCreateForm' => $recipeCreateForm,
        ];

        $recipesSection = $this->getTemplateView('modules/storage/views/recipesSection.php', $data);
        
        $totalModulesView .= $recipesSection;

        //shedules
        $foodPlan = $this->getFoodPlan();

        $data = [
            'foodPlan' => $foodPlan,
        ];

        $monthShedule = $this->getTemplateView('modules/shedules/views/monthShedule.php',$data);

        $data = [
            'monthShedule' => $monthShedule,
        ];

        $shedulesSection = $this->getTemplateView('modules/shedules/views/shedulesSection.php',$data);

        $totalModulesView .= $shedulesSection;

       return $totalModulesView;
    }

    public function getTemplateView($templatePath, $data = false){
        ob_start();
        include_once $templatePath;
        $moduleView = ob_get_contents();
        ob_end_clean();
        return $moduleView;
    }

    public function getFoodPlan(){
        $foodPlan = $this->shedulesController->getFullFoodPlan();

        foreach($foodPlan as &$dayPlan){
            $dayPlan['breakfast'] = $this->recipesController->getRecipeInfoById($dayPlan['breakfast']);
            $dayPlan['lunch'] = $this->recipesController->getRecipeInfoById($dayPlan['lunch']);
            $dayPlan['dinner'] = $this->recipesController->getRecipeInfoById($dayPlan['dinner']);
        }
        return $foodPlan;
    }
}
    