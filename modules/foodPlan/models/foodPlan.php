<?php 
class FoodPlanModel {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getFoodPlan(){
        $sqlForFoodPlan = 'SELECT * FROM `food_plan`';
        $foodPlanRow = $this->db->queryReturnAssoc($sqlForFoodPlan);
        if(empty($foodPlanRow)){
            return false;
        }

        foreach($foodPlanRow as $dayPlan){
            $arrMeals = explode(',' , $dayPlan[1]);
            $meals = [
                'breakfast' => $arrMeals[0],
                'lunch' => $arrMeals[1],
                'dinner' => $arrMeals[2],
            ];
            $foodPlan = [
                $dayPlan[0] => $meals
            ];
        }

        return $foodPlan;
    }
    function generateFoodPlan(){
        $foodPlan = true;
      
        return $foodPlan;
    }
    
    
}


