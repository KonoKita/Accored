'use strict'

class accCoreFront { 
    constructor(){
        console.log('asdasd');
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
        const url = 'controllers/recipesController/addNewRecipe';
        const fetchParamethrs = {method: 'POST',body: JSON.stringify(recipe)};
        let result = await fetch(url, fetchParamethrs);
        return result;
    }

    printRecipesTable(recipesList){
      
    }

    async updateView() {
        const url = 'storage/Accore/getView';
        let recipesList = await fetch(url);
        console.log(recipesList);
    }
    print() {
        console.log('asdas');
    }
}

// class localStorage{
//     localStorage = window.localStorage;

//     saveEntity(key, value){
//         localStorage.setItem(key, value);
//     }
//     saveEntity(key, value){
//         localStorage.setItem(key, value);
//     }
//     clearLocalStorage(){
//         localStorage.clear();
//     }

// }


//============VARIABLES===============//



//============LOGIC===============//
// let transitionData = myAccounter.getTotalTransactionsInfo();
accCoreFront.print();
const recipesList = document.querySelector('.recipes');
const addRecipeBtn = recipesList.querySelector('.recipes-add-form__btn');

const addRecipeNameInput = recipesList.querySelector('.recipes-add-form__input.name');
const addRecipeContentInput = recipesList.querySelector('.recipes-add-form__input.content');

addRecipeBtn.addEventListener('click', function(){
accCoreFront.addNewRecipe();
    const recipeName = addRecipeNameInput.value.trim();
    const recipeContent = addRecipeContentInput.value.trim();

    const recipe = {
        recipeName:recipeName,
        recipeContent:recipeContent
    };
    console.log(typeof accCoreFront.addNewRecipe);
    accCoreFront.addNewRecipe(recipe)
    .then(accCoreFront.updateView);
});
