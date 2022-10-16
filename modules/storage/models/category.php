<?php 
class MealModel {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getAllCategories(){
        $sqlForAllCategories = 'SELECT * FROM `recipes_categories`';
        $categoriesRes = $this->db->queryReturnAssoc($sqlForAllCategories);
        $categories = [];

        foreach ($categoriesRes as $category) {
            $categories[$category[0]] = $category[1];
        }

        return $categories;
    }
}


