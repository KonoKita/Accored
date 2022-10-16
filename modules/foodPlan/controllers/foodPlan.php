<?php 
class FoodPlanController {
    public $recipesController;
    private $db;

    function __construct($db, $recipesController){
        $this->db = $db;
        $this->recipesController = $recipesController;
    }

    //создаем новый
    function generateFoodPlan(){
        $recipes = $this->recipesController->getRecipesSortByMealType();
        $foodPlan = [];

        $config = [
            'days' => 7,
            'mealsCountPerDay' => 3,
            'budget' => 10000
        ];

        $firstDay = date('y-m-d');
        $firstDayInSec = strtotime($firstDay);

        $secInDay = 86400;

        $strDate = $firstDay;
        $intDateInSec = $firstDayInSec;
        $date = $firstDay;

        $recipesIdsSortByMealType = [];

        foreach($recipes as $mealType => $mealTypeRecipes){
            foreach($mealTypeRecipes as $recipeId => $recipe){
                $recipesIdsSortByMealType[$mealType][] = $recipeId;
            }
        }

        for ($i = 0; $i < $config['days']; $i++) { 
            $randomBreakfastId = $recipesIdsSortByMealType['breakfast'][rand(0, count($recipesIdsSortByMealType['breakfast'])-1)];
            $randomLunchId = $recipesIdsSortByMealType['lunch'][rand(0, count($recipesIdsSortByMealType['lunch'])-1)];
            $randomDinnerId =  $recipesIdsSortByMealType['dinner'][rand(0, count($recipesIdsSortByMealType['dinner'])-1)];

            // $recipes['breakfast'][$randomBreakfastId]['recipe'] = str_replace("\r", "", str_replace("\n", "\\n", $recipes['breakfast'][$randomBreakfastId]['recipe']));
            // $recipes['lunch'][$randomLunchId]['recipe'] = str_replace("\r", "", str_replace("\n", "\\n", $recipes['lunch'][$randomLunchId]['recipe']));
            // $recipes['dinner'][$randomDinnerId]['recipe'] = str_replace("\r", "", str_replace("\n", "\\n", $recipes['dinner'][$randomDinnerId]['recipe']));

            $foodPlan[$date] = [
                'breakfast' => $randomBreakfastId,
                'lunch' => $randomLunchId,
                'dinner' => $randomDinnerId,
            ];


            $intDateInSec += $secInDay;
            $date = date("y-m-d", $intDateInSec); 
        }
        $foodPlanModel = new FoodPlanModel($this->db);
        $foodPlanModel->saveFoodPlan($foodPlan);
        return $foodPlan;
    }


    //получаем ранее сформированный
    function getFoodPlan(){
        $foodPlanModel = new FoodPlanModel($this->db);
        $foodPlanInfo = $foodPlanModel->getFoodPlan();

        if($foodPlanInfo === false){
            return false;
        }

        $foodPlan = [];

        foreach ($foodPlanInfo as $date => $dayPlan) {
            // echo '<pre>',print_r($dayPlan,1),'<pre>';

            foreach ($dayPlan as $mealCategory => $recipeId) {
                $recipeInfo = $this->recipesController->getRecipeInfoById($recipeId);
                $dayPlan[$mealCategory] = $recipeInfo;
            }
            $foodPlan[$date] = $dayPlan;
        }

        return $foodPlan;
    }
  
}


