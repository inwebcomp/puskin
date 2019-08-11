// const initCarousel = () => {
//     const carousel = document.querySelector('.carousel');
//
//     if (!carousel) return false;
//
//     let flkty = new Flickity(carousel, {
//         prevNextButtons: carousel.childElementCount > 1,
//         pageDots: carousel.childElementCount > 1,
//         lazyLoad: false,
//         wrapAround: true,
//         adaptiveHeight: false
//     });
// };
//
// initCarousel();

const initStickySidebar = () => {
    const elemSticky = document.querySelector('.sticky');

    if (document.body.clientWidth < 1170) return false;

    if (!elemSticky) return false;

    const sidebar = new StickySidebar('.sticky', {
        topSpacing: 20,
        bottomSpacing: 120,
        containerSelector: '.page-content',
        innerWrapperSelector: '.news-list'
    });
};

initStickySidebar();


const initCarousel = () => {
    const carousel = $('.carousel')

    if (!carousel)
        return

    carousel.owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        navText: '',
    })
};

initCarousel();