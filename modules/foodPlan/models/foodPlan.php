<?php 
class FoodPlanModel {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getFoodPlan(){
        $sqlForFoodPlan = 'SELECT `date` as date, `meal_plan` as meal_plan FROM `food_plan`';
        $foodPlanRow = $this->db->queryReturnAssoc($sqlForFoodPlan);


        if(empty($foodPlanRow)){
            return false;
        }

        foreach($foodPlanRow as $dayPlan){
            $foodPlan[$dayPlan[0]] = json_decode($dayPlan[1], true);
        }

        return $foodPlan;
    }

    function saveFoodPlan($foodPlan){

        foreach ($foodPlan as $date => $plan) {
            $planJSON = json_encode($plan, JSON_UNESCAPED_UNICODE);
            $sqlForSaveFoodPlan = 'INSERT INTO `food_plan`(`date`, `meal_plan`) VALUES ("'.$this->db->sqlDef($date).'",\''.$planJSON.'\')';
            $result = $this->db->query($sqlForSaveFoodPlan);
        }

        return $foodPlan;
    }
    
}


