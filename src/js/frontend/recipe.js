(function ($) {
    'use strict'
    class Recipe {
        constructor() {
            console.log('Hello from recipe');   
            this.recipeList = [...document.querySelectorAll('.ingredients__quantity')];
            this.btnNutritionPlus = document.getElementById('portion-add');
            this.btnNutritionMin = document.getElementById('portion-minus');
            this.recipeListVal = this.recipeList.map(element => eval(element.innerHTML));
            this.portionsInput = document.getElementById('jsPortions');
            
            console.log(this.recipeListVal);
            
            this.portions = parseInt(this.portionsInput.value);
            this.onePortionRecipeArr = this.recipeListVal.map(element => Math.round((element / this.portions)*2)/2 );                        
            this.events();
        }

        events() {
            this.btnNutritionPlus.addEventListener('click', () => { this.portionAdd() });
            this.btnNutritionMin.addEventListener('click', () => { this.portionMin()});
            this.portionsInput.addEventListener('keyup', event => {
                // console.log(this.validateNumber(event));
                if( this.validateNumber(event) ) {
                    this.updateRecipe(this.portionsInput.value, this.onePortionRecipeArr, this.recipeList);
                }
            });
        }
        
        portionAdd() {
            this.portions++;
            this.updateRecipe(this.portions, this.onePortionRecipeArr, this.recipeList);
        }
                      
        portionMin() {
            (this.portions > 1) ? this.portions-- : this.portions = 1;
            this.updateRecipe(this.portions, this.onePortionRecipeArr, this.recipeList);
        }
            
        updateRecipe(i, arr, updetedArr) {
            this.portionsInput.value = i;
            arr.map((element, j) => { updetedArr[j].innerHTML = (element > 0) ?  parseFloat(eval(element * i).toFixed(2)) : ''; });
        }

        validateNumber(evt) {
            const charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                this.updateRecipe(this.portions, this.onePortionRecipeArr, this.recipeList);
                console.log(`Używaj tylko liczb`);
                return false;
            }
            return true;
        }
        

        
    }

    const recipe = new Recipe();

})(jQuery)