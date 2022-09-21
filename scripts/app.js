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
addRecipeBtn.addEventListener('click', function(){
    console.log('add');
});
