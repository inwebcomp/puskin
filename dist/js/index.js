const initCarousel = () => {
    const carousel = document.querySelector('.carousel');
    if (carousel) {
        let flkty = new Flickity( carousel, {
            prevNextButtons: true,
            lazyLoad: true,
            //"imagesLoaded": true,
            wrapAround: true,
            adaptiveHeight: false
        });
    }
};

initCarousel();

const sidebar = new StickySidebar('.page-sitebar', {
    topSpacing: 20,
    bottomSpacing: 120,
    containerSelector: '.page-content',
    innerWrapperSelector: '.news-list'
});