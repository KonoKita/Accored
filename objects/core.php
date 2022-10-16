<?php
class Accore{
    public $recipesController;
    public $MealCategoriesController;
    public $foodPlanController;
    public $actionCatcher;
    public $js;
    public $css;
    private $db;

    function __construct(){
        $this->prepareApp();//подключаем бд js css
        $this->db = new AccoreDB;
        $this->recipesController = new RecipesController($this->db);
        $this->MealCategoriesController = new MealCategoriesController($this->db);
        $this->foodPlanController = new FoodPlanController($this->db, $this->recipesController);
        $this->actionCatcher = new actionCatcher($this->recipesController,$this->foodPlanController);
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

        include_once 'objects/actionCatcher.php';//подключаем бд

        include_once 'modules/storage/controllers/recipes.php'; //подключаем контроллер рецептов
        include_once 'modules/storage/models/recipes.php'; //подключаем модель рецептов

        include_once 'modules/storage/models/category.php'; //подключаем модель рецептов
        include_once 'modules/storage/controllers/mealCategory.php'; //подключаем модель рецептов

        include_once 'modules/foodPlan/controllers/foodPlan.php'; //подключаем модель рецептов
        include_once 'modules/foodPlan/models/foodPlan.php'; //подключаем модель рецептов

        $this->addJs('scripts/accCoreFront.js');
        $this->addJs('scripts/app.js');
        $this->addCss('css/style.css');
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
        $content = '';
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
        $recipes = $this->recipesController->getRecipesSortByMealType();

        $categories = $this->MealCategoriesController->getAllCategories();

        $data = [
            'recipes' => $recipes,
            'categories' => $categories,
        ];

        $recipesListView = $this->getTemplateView('modules/storage/views/recipes.php', $data);
        $recipeCreateForm = $this->getTemplateView('modules/storage/views/recipeCreateForm.php');

        $data = [
            'recipesListView' => $recipesListView,
            'recipeCreateForm' => $recipeCreateForm,
        ];

        $recipesSection = $this->getTemplateView('modules/storage/views/recipesSection.php', $data);
        
        $totalModulesView .= $recipesSection;

        //foodPlan
        $foodPlan = $this->getFoodPlan();

        $data = [
            'foodPlan' => $foodPlan,
        ];

        $monthFoodPlan = $this->getTemplateView('modules/foodPlan/views/monthFoodPlan.php',$data);

        $data = [
            'monthFoodPlan' => $monthFoodPlan,
        ];

        $foodPlanSection = $this->getTemplateView('modules/foodPlan/views/foodPlanSection.php',$data);

        $totalModulesView .= $foodPlanSection;

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
        $foodPlan = $this->foodPlanController->getFoodPlan();
        return $foodPlan;
    }
}
    