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
  
    function addNewRecipe(){
        $out[] = json_decode(file_get_contents('php://input'),true);
        $recipeName = $out[0]['recipeName'];
        $recipeContent = $out[0]['recipeContent'];
        $sqlForAddNewRecipe = 'INSERT INTO `acc_recipes` 
        (`name`,`recipe`) 
        VALUES 
        ("'.$this->db->sqlDef($recipeName).'","'.$this->db->sqlDef($recipeContent).'")';
        $this->db->query($sqlForAddNewRecipe);
        return true;
    }

    function getRecipeInfoById($recipeId){
        $sqlForRecipeInfoById =  'SELECT `name` as name, `recipe` FROM `acc_recipes` WHERE `id` = '.$this->db->sqlDef($recipeId);
        $recipeInfoRow = $this->db->queryReturnAssoc($sqlForRecipeInfoById);
        $recipeInfo = [
            'name' => $recipeInfoRow[0][0],
            'recipe' => $recipeInfoRow[0][1]
        ];
        return $recipeInfo;
    }
    
}


