'use strict'

function accCore(){
   
    this.arrTransaction = [],


    function getTotalTransactionsInfo(){
        let totalTransactionCount = 0;
        let totalTransactionSum = 0;
        arrTransaction.forEach(transaction => {
            totalTransactionSum += transaction.getSum();
            totalTransactionCount++;
        });
        return [totalTransactionSum, totalTransactionCount];
    },
   
    function createNewTransaction(sum,date){
        let newTransaction = new Transaction(sum,date);
        accCore.addTransationToArr(newTransaction);
    },

    function addTransationToArr(transaction){
        accCore.arrTransaction.push(transaction);
    },

    function showAllProducts(){
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

}

function localStorage(){
    this.localStorage = window.localStorage;

    function saveEntity(key, value){
        localStorage.setItem(key, value);
    }
    function saveEntity(key, value){
        localStorage.setItem(key, value);
    }
    function clearLocalStorage(){
        localStorage.clear();
    }

}


//============VARIABLES===============//



//============LOGIC===============//
// let myAccounter = new accCore;

// let transitionData = myAccounter.getTotalTransactionsInfo();

const recipesList = document.querySelector('.recipes');
const addRecipeBtn = recipesList.querySelector('.recipes-add-form__btn');

const addRecipeNameInput = document.querySelector('.recipes-add-form__input.name');
const addRecipeContentInput = document.querySelector('.recipes-add-form__input.content');

addRecipeBtn.addEventListener('click', function(){
    let recipeName = addRecipeNameInput.value.trim();
    let recipeContent = addRecipeContentInput.value.trim();

    console.log(recipeName);
    console.log(recipeContent);
    const url = 'controllers/recipes.php/test';
    let recipe = {
        recipeName:recipeName,
        recipeContent:recipeContent
    };
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(recipe),
    }).then(response => response.json())
    .then((data) =>  console.log(data))
});
