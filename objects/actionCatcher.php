<?php
//класс для приема ajax на действие
class ActionCatcher{
    public $recipesController;
    public $foodPlanController;
    public $result;


    function __construct($recipesController, $foodPlanController){
        $this->recipesController = $recipesController;
        $this->foodPlanController = $foodPlanController;
    }
    
    function addNewRecipe(){
        $recipeInfoOut[] = json_decode(file_get_contents('php://input'),true);
        $name = $recipeInfoOut[0]['recipeName'];
        $content = $recipeInfoOut[0]['recipeContent'];
        $category = $recipeInfoOut[0]['recipeCategory'];
        $recipeInfo = [
            'name' => $recipeInfoOut[0]['name'],
            'content' => $recipeInfoOut[0]['content'],
            'category' => $recipeInfoOut[0]['category'],
        ];
        $res = $this->recipesController->addNewRecipe($recipeInfo);
        if($res = true){
            $this->result['status'] = 'ok';
        }
        print_r($this->result);
    }

    function generateFoodPlan(){
        $foodPlan = $this->foodPlanController->generateFoodPlan();
    }

   
    
}
    