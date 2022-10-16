<?php 
class MealCategoriesController {
    private $db;

    function __construct($db){
        $this->db = $db;
    }
   
    function getAllCategories(){
        $MealModel = new MealModel($this->db);
        $categories = $MealModel->getAllCategories();
        return $categories;
    }
}


