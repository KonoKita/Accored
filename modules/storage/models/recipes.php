<?php 
class RecipeModel {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getAllRecipes(){
        $recipes = [];
        $sqlForRecipes = 'SELECT * FROM `acc_recipes`';
        $recipes = $this->db->queryReturnAssoc($sqlForRecipes);
        return $recipes;
    }
}


