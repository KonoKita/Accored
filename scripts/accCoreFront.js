class accCoreFront { 
    constructor(){
    }
    showAllProducts(){
        fetch('controllers/test.php',{
            method: 'POST',
            headers: {
              'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(post),
            action: 'dothebest'
          })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            console.log(data);
        });
    }

    async addNewRecipe(recipe){
        const url = 'objects/actionCatcher/addNewRecipe';
        const fetchParamethrs = {method: 'POST',body: JSON.stringify(recipe)};
        let result = await fetch(url, fetchParamethrs);
        return result;
    }

    async generateFoodPlan(){
        const url = 'objects/actionCatcher/generateFoodPlan';
        let result = await fetch(url);
        return result;
    }

    viewNewRecipe(recipe){
        let newRecipe = 
        '<div class="recipe">'+
        ' <div class="recipe__name">' + recipe.name + '</div>'+
        ' <div class="recipe__content">' + recipe.content + '</div>'+
        ' <div class="recipe__category">' + recipe.mealTypeName + '</div>'+
        '</div>';
        recipesList.insertAdjacentHTML('beforeend', newRecipe);
    }
    
    viewNewRecipe(recipe){
        let newRecipe = 
        '<div class="recipe">'+
        ' <div class="recipe__name">' + recipe.name + '</div>'+
        ' <div class="recipe__content">' + recipe.content + '</div>'+
        ' <div class="recipe__category">' + recipe.mealTypeName + '</div>'+
        '</div>';
        recipesList.insertAdjacentHTML('beforeend', newRecipe);
    }
}