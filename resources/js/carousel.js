class Carousel {
    /**
     * @param  {HTMLElement} element
     * @param  {Object} options={}
     * @param {Number} options.slidesToScroll Number of elements to slide
     * @param {Number} options.slidesVisible Number of elements visible in a slide
     */
    constructor(element, options = {}) {
        this.element = element
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 1,
            infinity: false,
            navigationVisible: false,
            infiniteDuration: 3500,
            needResized: false,
            forceVisibleSlides: false
        }, options);
        let children = [].slice.call(element.children);
        this.currentItem = 0;
        this.isMobile = false;

        // DOM modification
        this.root = this.createDivWithClass('carousel');
        this.container = this.createDivWithClass('carousel_container');
        this.root.setAttribute('tabindex', '0');
        this.root.appendChild(this.container);
        this.items = children.map(child => {
            let item = this.createDivWithClass('carousel_item');
            item.appendChild(child);
            this.container.appendChild(item);
            return item;
        });
        this.element.appendChild(this.root);
        this.setStyle();
        this.createNavigation();

        this.onWindowResize();

        // Specific events
        window.addEventListener('resize', this.onWindowResize.bind(this));
        this.root.addEventListener('keyup', e => {
            if (e.key === 'ArrowRight' || e.key === 'Right') this.next();
            else if (e.key === 'ArrowLeft' || e.key === 'Left') this.prev();
        }); // Accessibility

        if (this.options.infinity) {
            this.infinityCarousel();
        }

    }

    infinityCarousel() {
        this.next();

        setTimeout(() => this.infinityCarousel(), this.options.infiniteDuration);
    }

    createNavigation() {
        if (this.items.length > this.slidesVisible && this.options.navigationVisible) {
            let nextButton = this.createDivWithClass('carousel_nextBtn');
            let prevButton = this.createDivWithClass('carousel_prevBtn');

            // Accessibility
            nextButton.setAttribute("aria-label", "Suivant");
            prevButton.setAttribute("aria-label", "Precedant");

            this.root.appendChild(nextButton);
            this.root.appendChild(prevButton);

            nextButton.addEventListener('click', this.next.bind(this));
            prevButton.addEventListener('click', this.prev.bind(this));
        }
    }

    removeNavigation() {
        if (this.items.length <= this.slidesVisible && this.options.navigationVisible) {
            let nextButton = document.querySelector('.carousel_nextBtn');
            let prevButton = document.querySelector('.carousel_prevBtn');
            if (nextButton != undefined && prevButton != undefined) {
                nextButton.removeEventListener('click', this.next.bind(this));
                this.root.removeChild(nextButton);
                prevButton.removeEventListener('click', this.prev.bind(this));
                this.root.removeChild(prevButton);
            }
        }
    }


    /**
     * Goto next item in the carousel
     */
    next() {
        this.gotoItem(this.currentItem + this.slidesToScroll);
    }

    /**
     * Goto previous item in the carousel
     */
    prev() {
        this.gotoItem(this.currentItem - this.slidesToScroll);
    }

    /**
     * Move the carousel to the specified element
     * @param  {} index
     */
    gotoItem(index) {
        if (index < 0) {
            index = this.items.length - this.slidesVisible;
        } else if (index >= this.items.length || (this.items[this.currentItem + this.slidesVisible] === undefined && index > this.currentItem)) {
            index = 0;
        }
        let translateX = index * -100 / this.items.length;

        this.container.style.transform = 'translate3d(' + translateX + '%, 0, 0)';
        this.currentItem = index;
    }

    /**
     * Apply the right dimensions to the items of the carousel
     */
    setStyle() {
        let ratio = this.items.length / this.slidesVisible;
        this.container.style.width = (ratio * 100) + "%";
        this.items.forEach(item => {
            item.style.width = ((100 / this.slidesVisible) / ratio) + "%";
        });
    }


    /**
     * @param  {string} className
     * @returns {HTMLElement}
     */
    createDivWithClass(className) {
        let div = document.createElement('div');
        div.setAttribute('class', className);
        return div;
    }

    get slidesToScroll() {
        return this.isMobile ? 1 : this.options.slidesToScroll;
    }

    get slidesVisible() {
        return (this.isMobile && this.options.forceVisibleSlides === false) ? 1 : this.options.slidesVisible;
    }

    /**
     * Resize the carousel
     */
    onWindowResize() {
        let mobile = window.innerWidth < 800;
        if (this.isMobile !== mobile) {
            this.isMobile = mobile;
            if (!this.options.needResized) {
                this.setStyle();
            }
            this.createNavigation();
        }
        if (this.isMobile === false) {
            this.removeNavigation();
        }
    }
}


document.addEventListener('DOMContentLoaded', function () {

    new Carousel(document.querySelector('#carousel-projects'), {
        slidesToScroll: 1,
        slidesVisible: 3,
        navigationVisible: true
    });

    new Carousel(document.querySelector('#carousel-mobile-techs'), {
        slidesToScroll: 1,
        slidesVisible: 4,
        infinity: true,
        navigationVisible: false,
        needResized: false,
        forceVisibleSlides: true
    });

    new Carousel(document.querySelector('#carousel-web-techs'), {
        slidesToScroll: 1,
        slidesVisible: 4,
        infinity: true,
        navigationVisible: false,
        infiniteDuration: 5500,
        needResized: false,
        forceVisibleSlides: true
    });
});