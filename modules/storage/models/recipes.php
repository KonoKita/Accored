<?php 
class RecipeModel {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getAllRecipes(){
        $recipes = [];
        $sqlForRecipes = 'SELECT `id` as id, `name` as name, `recipe` as recipe, `category` as category FROM `acc_recipes`';
        $recipes = $this->db->queryReturnAssoc($sqlForRecipes);
        return $recipes;
    }
  
    function addNewRecipe($recipeInfo){
        $recipeInfo[] = json_decode(file_get_contents('php://input'),true);
        $recipeName = $recipeInfo['name'];
        $recipeContent = $recipeInfo['content'];
        $recipeCategory = $recipeInfo['category'];
        $sqlForAddNewRecipe = 'INSERT INTO `acc_recipes` 
        (`name`,`recipe`,`category`) 
        VALUES 
        ("'.$this->db->sqlDef($recipeName).'","'.$this->db->sqlDef($recipeContent).'","'.$this->db->sqlDef($recipeCategory).'")';
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


