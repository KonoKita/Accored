<?php 
class ShedulesController {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getFullFoodPlan(){
        $sheduleModel = new ShedulesModel($this->db);
        $foodPlan = $sheduleModel->getFullFoodPlan();

        return $foodPlan;
    }
    
  
}


