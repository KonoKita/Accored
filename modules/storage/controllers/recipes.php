<?php 
class RecipesController {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getAllRecipes(){
        $recipeModel = new RecipeModel($this->db);
        $recipes = $recipeModel->getAllRecipes();
        return $recipes;
    }
    
    function test(){
        // $data = $_POST;
        // $recipeModel = new RecipeModel($this->db);
        // $recipes = $recipeModel->getAllRecipes();
        // return $recipes;
        $out[] = json_decode(file_get_contents('php://input'));
        echo json_encode($out);
        // return $data;
    }

    function addNewRecipe(){
        $recipeModel = new RecipeModel($this->db);
        $result = $recipeModel->addNewRecipe();
        if(!$result){
            return false;
        }
        return true;
    }

    function getRecipeInfoById($recipeId){
        $recipeModel = new RecipeModel($this->db);
        $recipeInfo = $recipeModel->getRecipeInfoById($recipeId);
        return $recipeInfo;
    }
}


