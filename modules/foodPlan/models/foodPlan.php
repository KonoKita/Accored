<?php 
class FoodPlanModel {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getFullFoodPlan(){
        $foodPlan = [];
        $sqlForFoodPlan = 'SELECT * FROM `food_plan`';
        $foodPlanRow = $this->db->queryReturnAssoc($sqlForFoodPlan);
        if(empty($foodPlan)){
            return false;
        }
        foreach($foodPlanRow as $dayPlan){
            $arrMeals = explode(',' , $dayPlan[1]);
            $meals = [
                'breakfast' => $arrMeals[0],
                'lunch' => $arrMeals[1],
                'dinner' => $arrMeals[2],
            ];
            $foodPlan[$dayPlan[0]] = $meals;
        }

        return $foodPlan;
    }
  
    
}


