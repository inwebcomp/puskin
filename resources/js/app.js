require('./bootstrap');
require('./sliders');

window.toggleMenu = () => {
    document.getElementsByTagName('body')[0].classList.toggle('show-sidebar--menu')
}

window.toggleMenuItem = function(event) {
    event.preventDefault()
    event.target.classList.toggle('arrow--open')
}