<?php 
class FoodPlanController {
    public $recipesController;
    private $db;

    function __construct($db, $recipesController){
        $this->db = $db;
        $this->recipesController = $recipesController;
    }

    function generateFoodPlan(){
       
        $foodPlanInfo = [];

        $foodPlanModel = new FoodPlanModel($this->db);
        $foodPlan = $foodPlanModel->generateFoodPlan();

        foreach ($foodPlan as $date => &$dayPlan) {
            foreach ($dayPlan as $mealCategory => $mealId) {
                echo '<pre>',print_r($mealId.'call',1),'<pre>';
                $recipeInfo = $this->recipesController->getRecipeInfoById($mealId);
                $dayPlan[$mealCategory] = $recipeInfo;
            }
        }


        return $foodPlan;
    }

    function getFoodPlan(){
        $foodPlanModel = new FoodPlanModel($this->db);
        $foodPlanInfo = $foodPlanModel->getFoodPlan();
        $foodPlan = [];

        foreach ($foodPlanInfo as $date => $dayPlan) {

            foreach ($dayPlan as $mealCategory => $mealId) {
                $recipeInfo = $this->recipesController->getRecipeInfoById($mealId);
                $dayPlan[$mealCategory] = $recipeInfo;
            }
            $foodPlan[$date] = $dayPlan;
        }

        return $foodPlan;
    }
  
}


