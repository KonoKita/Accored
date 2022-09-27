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
}


