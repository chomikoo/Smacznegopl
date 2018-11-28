(function ($) {
    'use strict'
    
    console.log('Hello from recipe');
 
    const recipeList = [...document.querySelectorAll('.ingredients__quantity')];
    const btnNutritionPlus = document.getElementById('portion-add');
    const btnNutritionMin = document.getElementById('portion-minus');
    
    const recipeListVal = recipeList.map(element => eval(element.innerHTML));
    const portionsInput = document.getElementById('jsPortions');
    console.log(recipeListVal);

    let portions = parseInt(portionsInput.value);

    const onePortionRecipeArr = recipeListVal.map(element => Math.round((element / portions)*2)/2 );

    btnNutritionPlus.addEventListener('click', () => {
        portionAdd();
    });

    btnNutritionMin.addEventListener('click', () => {
        portionMin();
    });


    const portionAdd = () => {
        portions++;
        updateRecipe(portions, onePortionRecipeArr, recipeList);
    }
    
    
    const portionMin = () => {
        (portions > 1) ? portions-- : portions = 1;
        updateRecipe(portions, onePortionRecipeArr, recipeList);
    }
    
    
    const updateRecipe = (i, arr, updetedArr) => {
        portionsInput.value = i;
        arr.map((element, j) => { updetedArr[j].innerHTML = (element > 0) ?  parseFloat(eval(element * i).toFixed(2)) : ''; });
    }


    // Validate numeric input
    // function validateNumber(event) {
    //     // this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
    // }

    function validateNumber(evt) {
        const charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            updateRecipe(portions, onePortionRecipeArr, recipeList);
            console.log(`Używaj tylko liczb`);
            return false;
        }
        return true;
    }

    portionsInput.addEventListener('keyup', event => {
        console.log(validateNumber(event));
        if( validateNumber(event) ) {
            updateRecipe(portionsInput.value, onePortionRecipeArr, recipeList);
        }
    });


})(jQuery)