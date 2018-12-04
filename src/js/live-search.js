(function ($) {

    class Search {
        constructor() {
            console.log('hello from constructor');
            this.openBtn = $('#open-search');
            this.closeBtn = $('#close-search');
            this.searchOverlay = $('#search-overlay');
            this.searchInput = $('#search-term');
            this.resultsDiv = $('#search-results');
            this.events();
            this.isOpenOverlay = false;
            this.isSpinnerVisible = false;
            this.previousValue;
            this.typingTimer;
        }

        events() {
            this.openBtn.on('click', this.openOverlay.bind(this));
            this.closeBtn.on('click', this.closeOverlay.bind(this));
            $(document).on('keydown', this.keyPressDispatcher.bind(this));
            this.searchInput.on('keyup', this.typingLogic.bind(this));
        }

        typingLogic() {
            if(this.searchInput.val() != this.previousValue) { // prevent reloading
                clearTimeout(this.typingTimer);

                if( this.searchInput.val() ) {
                    if(!this.isSpinnerVisible) {
                        this.resultsDiv.html('<div class="spinner-loader"></div>')
                        this.isSpinnerVisible = true;
                    }
                    this.typingTimer = setTimeout(this.getResults.bind(this) ,1000);
                } else {
                    this.resultsDiv.html('');
                    this.isSpinnerVisible = false;
                }
            }
            this.previousValue = this.searchInput.val();
        }

        getResults() {
            $.getJSON(themeData.root_url + '/wp-json/smacznego/v1/search?term=' + this.searchInput.val(), (data) => {
                this.resultsDiv.html(`                                                                                      
                    ${data.recipes.length ? '<div class="search__type"> <h2 class="search__title">Przepisy:</h2>' : ''}
                    ${data.recipes.length ? '<ul class="search__list">' : ''}
                        ${data.recipes.map(item => `
                        <li class="search__element row">
                            <div class="col-3 thumbnail">
                                <img class="search__img" src="${(item.thumbnail) ? item.thumbnail : themeData.root_url+'/wp-content/themes/Smacznegopl/dist/img/placeholder.jpg'}" alt="${item.title}">
                            </div>
                            <a href="${item.permalink}" class="col-9">
                                <h3>${item.title}</h3>
                                <span>${item.acf.kcal}kcal</span>
                                <span>${item.acf.bialko}g</span>
                                <span>${item.acf.weglowodany}g</span>
                                <span>${item.acf.tluszcze}g</span>
                            </a>
                        </li>`).join('')}
                    ${data.recipes.length ? '</ul></div>' : ''}
                    
                    ${data.products.length ? '<div class="search__type"><h2 class="search__title">Produkty:</h2>' : ''}
                    ${data.products.length ? '<ul class="search__list">' : ''}
                        ${data.products.map(item => `
                            <li class="search__element row">
                            <div class="col-3 thumbnail">
                                <img class="search__img" src="${(item.thumbnail) ? item.thumbnail : themeData.root_url+'/wp-content/themes/Smacznegopl/dist/img/placeholder.jpg'}" alt="${item.title}">
                            </div>
                            <a href="${item.permalink}" class="col-9">
                                <h3>${item.title}</h3>
                                <span>${item.acf.kcal}kcal</span>
                                <span>${item.acf.bialko}g</span>
                                <span>${item.acf.weglowodany}g</span>
                                <span>${item.acf.tluszcze}g</span>
                            </a>
                        </li>`).join('')}
                    ${data.products.length ? '</ul></div>' : ''}            
                `);
                
                // console.log(data.recipes);
            })
            this.isSpinnerVisible = false;
        }

        keyPressDispatcher(e) {
            if(e.keyCode == 83 && !this.isOpenOverlay && $('input, textarea').is(':focus')) {
                this.openOverlay;
            }
            if(e.keyCode == 27 && this.isOpenOverlay) {
                this.closeOverlay;
            }
        }

        openOverlay() {
            this.searchOverlay.addClass("search--active");
            $('body').addClass('no-scroll');
            this.isOpenOverlay = true;
        }

        closeOverlay() {
            this.searchOverlay.removeClass("search--active");
            $('body').removeClass('no-scroll');
            this.resultsDiv.html('');
            this.isOpenOverlay = false;
        }
    }

    const search = new Search();

})(jQuery);