(function($) {

    $(document).ready(function() {

        class AjaxFilter {
            constructor() {
                this.$filterForm = $('#recipe-filter');
                this.$resultDiv = $('#ajax_filter_results');
                               
                this.$loadMoreBtn = $('#btn_loadmore:not(.loading)');
                this.$btnText = this.$loadMoreBtn.find('.btn__text');
                this.$btnIco = this.$loadMoreBtn.find('.icon--loading');
                
                this.kcal_min = '',
                this.kcal_max = '',
                this.time_min = '',
                this.time_max = '',
                this.recipe_assets = [];
                this.events();
            }
            
            events() {
                this.$filterForm.on('submit', this.getResults.bind(this));
                this.$loadMoreBtn.on('click', this.getMorePosts.bind(this));
            }

            prepareData(page = 1) {

                this.category_filter = this.$filterForm.find('#category_filter').val();
                this.sort_terms = this.$filterForm.find('#sort_terms').val();
                this.kcal_min = this.$filterForm.find('#kcal_min').val();
                this.kcal_max = this.$filterForm.find('#kcal_max').val();
                this.time_min = this.$filterForm.find('#time_min').val();
                this.time_max = this.$filterForm.find('#time_max').val();
  
                if( this.$filterForm.find('#checkbox_vege').is(':checked') ){
                    this.recipe_assets.indexOf('vege') === -1 ? this.recipe_assets.push('vege') : false;
                }
                
                if( this.$filterForm.find('#checkbox_meat').is(':checked') ){
                    this.recipe_assets.indexOf('without-meat') === -1 ? this.recipe_assets.push('without-meat') : false;
                }
    
                if( this.$filterForm.find('#checkbox_sugar').is(':checked') ){
                    this.recipe_assets.indexOf('without-sugar') === -1 ? this.recipe_assets.push('without-sugar') : false;
                }            
    
                if( this.$filterForm.find('#checkbox_gluten').is(':checked') ){
                    this.recipe_assets.indexOf('without-gluten') === -1 ? this.recipe_assets.push('without-gluten') : false;
                }
    
                const data = {
                    action : "chomikoo_ajax_filter_function",
                    page: page,
                    category_filter: this.category_filter,
                    sort_terms: this.sort_terms,
                    kcal_min: this.kcal_min,
                    kcal_max: this.kcal_max,
                    time_min: this.time_min,
                    time_max: this.time_max,
                    recipe_assets: this.recipe_assets
                }

                return data;
            }

            getResults(e) {
                e.preventDefault();

                $('#btn_loadmore').attr('data-page', '1');

                const data = this.prepareData();
    
                $.ajax({
                    url: this.$filterForm.attr('action'),
                    data: data,
                    context: this,
                    type: this.$filterForm.attr('method'),
                })
                .done(function(response){
                    // console.log(response);
                    const resultTemplate = this.renderArticle(response);
                    $('#ajax_filter_results').html(resultTemplate);
                 }
                )
                .fail(function() {
                    console.log('Fail');
                })
            }

            getMorePosts(e) {
                e.preventDefault();
                
                let page = parseInt(e.target.dataset.page);
                let newPage = page+1;

                const data = this.prepareData(newPage);
                
                $('#btn_loadmore').attr('data-page', newPage);
                
                if(!this.isLoading) {
                    this.$btnText.html('Ładuje ...');
                    this.$loadMoreBtn.addClass('loading');
                    this.isLoading = true;
                } 
    
                $.ajax({
                    url: this.$filterForm.attr('action'),
                    data: data,
                    context: this,
                    type: this.$filterForm.attr('method'),
                })
                .done(function(response){
                    console.log(response);
                    this.$loadMoreBtn.attr('data-page', this.newPage);
                    const resultTemplate = this.renderArticle(response);
                    $('#ajax_filter_results').append(resultTemplate);

                    this.$btnText.html('Ładuj nastepne');
                    this.$loadMoreBtn.removeClass('loading');
                    this.isLoading = false;
                 }
                )
                .fail(function() {
                    console.log('Fail');
                })
         
            }

            renderArticle(response) {
                return JSON.parse(response).map( (element) => 
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
                        
                        <h2 class="recipe__title"><span class="bold">Przepis:</span> ${element.title}</h2>
                        
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


            }

        }
        
        const ajaxFilter = new AjaxFilter();
        
    });
    

})(jQuery)