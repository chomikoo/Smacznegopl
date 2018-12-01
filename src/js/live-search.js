(function ($) {

    class Search {
        constructor() {
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
                    this.typingTimer = setTimeout(this.getResults.bind(this) ,2000);
                } else {
                    this.resultsDiv.html('html');
                    this.isSpinnerVisible = false;
                }
            }
            this.previousValue = this.searchInput.val();
        }

        getResults() {
            // console.log(this.resultsDiv);
            this.resultsDiv.html('Results');
            this.isSpinnerVisible = false;
        }

        keyPressDispatcher(e) {
            console.log(e.keyCode);
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
            this.isOpenOverlay = false;
        }
    }

    const search = new Search();

})(jQuery);