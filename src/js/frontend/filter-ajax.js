(function($) {

    $(document).ready(function() {

        class AjaxFilter {
            constructor() {
                // console.log('hello from AjaxFilter constructor');
                this.$filterForm = $('#recipe-filter');
                this.$resultDiv = $('#ajax_filter_results');
                this.events();


                this.$loadMoreBtn = $('#btn_loadmore:not(.loading)');
                this.$btnText = this.$loadMoreBtn.find('.btn__text');
                this.$btnIco = this.$loadMoreBtn.find('.icon--loading');
    
                this.events();
                this.page = this.$loadMoreBtn.data('page');
                this.newPage = this.page+1;
                this.ajaxUrl = this.$loadMoreBtn.data('url');
    
                this.kcal_min = '',
                this.kcal_max = '',
                this.time_min = '',
                this.time_max = '',
                this.recipe_assets = [];
            }

            events() {
                this.$filterForm.on('submit', this.getResults.bind(this));
            }



            getResults(e) {
            
                e.preventDefault();
    
                this.category_filter = this.$filterForm.find('#category_filter').val();
                console.log('category_filter ' + this.category_filter);
    
                this.sort_terms = this.$filterForm.find('#sort_terms').val();
                console.log('sort_terms ' + this.sort_terms);
    
                this.kcal_min = this.$filterForm.find('#kcal_min').val();
                console.log('#kcal_min ' + this.kcal_min);
    
                this.kcal_max = this.$filterForm.find('#kcal_max').val();
                console.log('#kcal_max ' + this.kcal_max);
    
                this.time_min = this.$filterForm.find('#time_min').val();
                console.log('#time_min ' + this.time_max);
    
                this.time_max = this.$filterForm.find('#time_max').val();
                console.log('#time_max ' + this.time_max);

                if(  this.$filterForm.find('#checkbox_vege').is(':checked') ){
                    this.recipe_assets.push('vege');
                }
                
                if(  this.$filterForm.find('#checkbox_meat').is(':checked') ){
                    this.recipe_assets.push('without-meat');
                }
    
                if(  this.$filterForm.find('#checkbox_sugar').is(':checked') ){
                    this.recipe_assets.push('without-sugar');
                }            
    
                if(  this.$filterForm.find('#checkbox_gluten').is(':checked') ){
                    this.recipe_assets.push('without-gluten');
                }
    
                const data = {
                    action : "chomikoo_ajax_filter_function",
                    page: this.page,
                    category_filter: this.category_filter,
                    sort_terms: this.sort_terms,
                    kcal_min: this.kcal_min,
                    kcal_max: this.kcal_max,
                    time_min: this.time_min,
                    time_max: this.time_max,
                    recipe_assets: this.recipe_assets
                }
                console.log('data ' , data);
                console.log(this.$resultDiv);        
    
                $.ajax({
                    url: this.$filterForm.attr('action'),
                    data: data,
                    type: this.$filterForm.attr('method'),
                })
                .done(function(response){
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

                    $('#ajax_filter_results').html(resultTemplate);
                 }
                )
                .fail(function() {
                    console.log('Fail');
                })
            }

        }
        
        const ajaxFilter = new AjaxFilter();
        
    });
    
    
    class LoadMore {
        constructor(){
            console.log('hello from LoadMore constructor');
            this.$loadMoreBtn = $('#btn_loadmore:not(.loading)');
            this.$btnText = this.$loadMoreBtn.find('.btn__text');
            this.$btnIco = this.$loadMoreBtn.find('.icon--loading');

            this.events();
            this.page = this.$loadMoreBtn.data('page');
            this.newPage = this.page+1;
            this.ajaxUrl = this.$loadMoreBtn.data('url');
            this.isLoading = false;
        }

        events() {
            this.$loadMoreBtn.on('click', this.getPosts.bind(this));
            console.log(this);
        }
    
        getPosts(e) {
            e.preventDefault();
            if(!this.isLoading) {
                this.$btnText.html('Ładuje ...');
                this.$loadMoreBtn.addClass('loading');
                this.isLoading = true;
            } else {
                this.$btnText.html('Ładuj nastepne');
                this.$loadMoreBtn.removeClass('loading');
                this.isLoading = false;
            }
            console.log('Clicked Load');
            console.log(this.ajaxUrl);




        }
    
    }

    const loadMore = new LoadMore();

})(jQuery)