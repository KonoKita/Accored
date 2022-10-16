'use strict'
//============VARIABLES===============//
let acc = new accCoreFront;
const recipesSection = document.querySelector('.recipes');
const recipesList = document.querySelector('.recipes-list')
const addRecipeBtn = recipesSection.querySelector('.recipes-add-form__btn');

const addRecipeNameInput = recipesSection.querySelector('.recipes-add-form__input.name');
const addRecipeContentInput = recipesSection.querySelector('.recipes-add-form__input.content');
const addRecipeCategorySelect = recipesSection.querySelector('.recipes-add-form__categories');


const foodPlanSeciton = document.querySelector('.food-plan');
const createFoodPlanBtn = foodPlanSeciton.querySelector('.create-food-plan-btn');

//============LOGIC===============//
addRecipeBtn.addEventListener('click', function(){
    const mame = addRecipeNameInput.value.trim();
    const content = addRecipeContentInput.value.trim();
    let categories = [];
    let mealTypeNames = [];

    document.querySelector('.recipes-add-form__categories').querySelectorAll('option').forEach(option=>{
        if(option.selected){
            categories.push(option.value);
            mealTypeNames.push(option.text);
        }
    });
    const category = categories.join(','); 
    const mealTypeName = mealTypeNames.join(','); 
    const recipe = {
        name:mame,
        content:content,
        category: category,
        mealTypeName: mealTypeName,
    };
    acc.addNewRecipe(recipe)
    .then(
        result => {
            if(result.status === 200){
                acc.viewNewRecipe(recipe);
            }
        }
    );
});
createFoodPlanBtn.addEventListener('click', function(){
    acc.generateFoodPlan()
    .then(foodPlan=>{
        acc.viewFoodPlan(foodPlan);
    });
});

