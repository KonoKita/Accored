<?php 
class FoodPlanController {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getFullFoodPlan(){
        $foodPlanModel = new FoodPlanModel($this->db);
        $foodPlan = $foodPlanModel->getFullFoodPlan();
        return $foodPlan;
    }
    
  
}


