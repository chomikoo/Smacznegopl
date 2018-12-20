(function () {
    'use strict'

    // TABS
    
    class Tabs {
        constructor(element){
            console.log('Hello from tabs');
            this.element = document.querySelector(element);
            this.nav = this.element.querySelectorAll('.tabs__link');
            this.containers = this.element.querySelectorAll('.tabs__tab');
            this.navArr = [...this.nav];
            this.containersArr = [...this.containers];
            this.events();
            console.log(this.element, this.navArr, this.containersArr);
        }

        events() {
            this.navArr.forEach( elem => {
                elem.addEventListener('click', this.openTab.bind(this));
            })
        }


        
        openTab(e) {
            const target = e.target;
            const hash = target.hash;
            console.log(hash);
            this.closeTabs();
            this.element.querySelector(hash).classList.add('tabs__tab--current');
            target.classList.add('tabs__link--active');
        }

        closeTabs() {
            this.containersArr.map( elem => { elem.classList.remove('tabs__tab--current')});
            this.navArr.map( elem => { elem.classList.remove('tabs__link--active')});    
        }

    }

    const tabs = new Tabs('#tabs');

})(); 