// TABS

class CustomTabs {
    constructor(element) {
        console.log('Hello from tabs');
        this.element = document.querySelector(element);
        this.nav = this.element.querySelectorAll('.tabs__link');
        this.containers = this.element.querySelectorAll('.tabs__tab');
        this.navArr = [...this.nav];
        this.containersArr = [...this.containers];
        this.events();
    }

    events() {
        this.navArr.forEach(elem => {
            elem.addEventListener('click', this.openTab.bind(this));
        })
    }

    openTab(e) {
        e.preventDefault();
        const target = e.target;
        const hash = target.hash;
        this.closeTabs();
        this.element.querySelector(hash).classList.add('tabs__tab--current');
        target.classList.add('tabs__link--active');
    }

    closeTabs() {
        this.containersArr.map(elem => {
            elem.classList.remove('tabs__tab--current')
        });
        this.navArr.map(elem => {
            elem.classList.remove('tabs__link--active')
        });
    }

}