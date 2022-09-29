<?php 
class ShedulesModel {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getFullFoodPlan(){
        $foodPlan = [];
        $sqlForFoodPlan = 'SELECT * FROM `shedule`';
        $foodPlanRow = $this->db->queryReturnAssoc($sqlForFoodPlan);
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


