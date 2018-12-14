(function($) {
    console.log('Hello from flter.ajax')
    $(document).ready(function() {

        const filterForm = $('#recipe-filter');

        const $resultDiv = $('#ajax_filter_results');

        filterForm.on('submit', function(e) {
            e.preventDefault();

            var kcal_min = '',
            kcal_max = '',
            time_min = '',
            time_max = '',
            recipe_assets = [];

            var category_filter = filterForm.find('#category_filter').val();
            console.log('category_filter ' + category_filter);

            var sort_terms = filterForm.find('#sort_terms').val();
            console.log('sort_terms ' + sort_terms);

            var kcal_min = filterForm.find('#kcal_min').val();
            console.log('#kcal_min ' + kcal_min);

            var kcal_max = filterForm.find('#kcal_max').val();
            console.log('#kcal_max ' + kcal_max);

            var time_min = filterForm.find('#time_min').val();
            console.log('#time_min ' + time_max);

            var time_max = filterForm.find('#time_max').val();
            console.log('#time_max ' + time_max);
            if(  filterForm.find('#checkbox_vege').is(':checked') ){
                recipe_assets.push('vege');
            }
            
            if(  filterForm.find('#checkbox_meat').is(':checked') ){
                recipe_assets.push('without-meat');
            }

            if(  filterForm.find('#checkbox_sugar').is(':checked') ){
                recipe_assets.push('without-sugar');
            }            

            if(  filterForm.find('#checkbox_gluten').is(':checked') ){
                recipe_assets.push('without-gluten');
            }

            // recipe_assets = JSON.stringify(Object.assign({}, recipe_assets));
        

            console.log('recipe_assets ', recipe_assets);

            const data = {
                action : "chomikoo_ajax_filter_function",
                category_filter,
                sort_terms,
                kcal_min,
                kcal_max,
                time_min,
                time_max,
                recipe_assets
            }
            console.log('data ' , data);            

            $.ajax({
                url: filterForm.attr('action'),
                data: data,
                type: filterForm.attr('method'),

            })
            .done(function(response){
                console.log('Ajax Done');
                // console.log(response);
                
                let resultTemplate = JSON.parse(response).map( (element) => 
                    `
                    <article class="recipe recipe-${element.id} col-12 col-sm-6 col-md-4">
                        <a href="${element.permalink}" class="recipe__thumbnail thumbnail">
                            <img ${element.thumbnail} />
                            <div class="recipe__info recipe__info--thumbnail">    
                                <span class="recipe__badge">${element.kcal}kcal</span><span class="spacer"></span>
                                <span class="recipe__badge"><span class="far fa-clock">$nbsp;</span>&nbsp;${element.time}</span></br>
                                <span class="recipe__badge">B:&nbsp;${element.proteins}g</span><span class="spacer"></span>
                                <span class="recipe__badge">W:&nbsp;${element.carbs}g</span><span class="spacer"></span>
                                <span class="recipe__badge">T:&nbsp;${element.fats}g</span><span class="spacer"></span>
                            </div>
                        </a>

                        <div class="recipe__content">

                            <span class="recipe__post-type">Przepis</span> 
                            
                            <h2 class="recipe__title"><span class="bold">Przepis:</span>${element.title}</h2>
                            
                            <div class="recipe__info recipe__info--nutrition">    
                                <span class="recipe__badge">${element.kcal}kcal</span><span class="spacer"></span>
                                <span class="recipe__badge">B:&nbsp;${element.proteins}g</span><span class="spacer"></span>
                                <span class="recipe__badge">W:&nbsp;${element.carbs}g</span><span class="spacer"></span>
                                <span class="recipe__badge">T:&nbsp;${element.fats}g</span><span class="spacer"></span>
                                <span class="recipe__badge"><span class="far fa-clock"></span>&nbsp;${element.time}</span>
                            </div>

                            <div class="recipe__info">
                                <span class="recipe__badge">${element.date}</span><span class="dot"></span>
                                <span class="recipe__badge">${element.author}</span>
                            </div>
                            
                            <div class="recipe__excerpt">
                                ${element.excerpt}
                            </div>
                            
                        </div>
                        <footer class="recipe__footer">
                            <a href="${element.permalink}" class="recipe__more">Czytaj dalej</a>
                            <span class="bar"></span>
                        </footer>

                    </article>
                    `
                ).join('');               

                $resultDiv.html(resultTemplate);
             }
            )
            .fail(function() {
                console.log('Fail');
            })

            })
    });
})(jQuery)