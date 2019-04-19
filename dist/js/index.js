const initCarousel = () => {
    const carousel = document.querySelector('.carousel');

    if(!carousel) return false;
    
    let flkty = new Flickity( carousel, {
        prevNextButtons: true,
        lazyLoad: true,
        //"imagesLoaded": true,
        wrapAround: true,
        adaptiveHeight: false
    });
};

initCarousel();

const initStickySidebar = () => {
    const elemSticky = document.querySelector('.sticky');

    if(!elemSticky) return false;

    const sidebar = new StickySidebar('.sticky', {
        topSpacing: 20,
        bottomSpacing: 120,
        containerSelector: '.page-content',
        innerWrapperSelector: '.news-list'
    }); 
};

initStickySidebar();
