<?php 
class RecipesController {
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function getAllRecipes(){
        $recipeModel = new RecipeModel($this->db);
        $recipesInfo = $recipeModel->getAllRecipes();
        $recipes = [];

        foreach ($recipesInfo as $recipe) {

            $recipeId = $recipe[0];

            $recipe = [
                'name' => $recipe[1],
                'recipe' => $recipe[2],
                'categoryId' => $recipe[3],
            ];

            $recipes[$recipeId] = $recipe;
        }

        return $recipes;
    }

    function getRecipesSortByMealType(){
        $recipes = $this->getAllRecipes();

        $recipesSortByMealType = [];

        $MealModel = new MealModel($this->db);
        $categories = $MealModel->getAllCategories();

        foreach ($recipes as $recipeId => $recipe) {
            $recipesSortByMealType[$categories[$recipe['categoryId']]][$recipeId] = $recipe;
        }

        return $recipesSortByMealType;
    }



    function addNewRecipe($recipeInfo){
        $recipeModel = new RecipeModel($this->db);
        $result = $recipeModel->addNewRecipe($recipeInfo);
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


