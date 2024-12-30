import { tns } from "tiny-slider"

var testimonials = document.querySelector('.js-testimonials-slider');

if (typeof (testimonials) != 'undefined' && testimonials != null) {
    let testimonials = document.querySelector('.js-testimonials-slider');

    let slider = new tns({
        container: testimonials,
        items: 1,
        gutter: 0,
        responsive: {
            768: {
                items: 2,
            },
            1024: {
                items: 3,
            },
        },
        autoplay: false,
        loop: false,
        mouseDrag: true,
        controls: true,
        controlsContainer: ".tns-controls-testimonials",
        nav: true,
        autoHeight: true,
        lazyload: true
    });
}


var gallery = document.querySelector('.js-gallery-slider');

if (typeof (gallery) != 'undefined' && gallery != null) {
    let gallery = document.querySelector('.js-gallery-slider');

    let slider = new tns({
        container: gallery,
        items: 2,
        gutter: 0,
        responsive: {
            480: {
                items: 3,
            },
            768: {
                items: 4,
            },
            850: {
                items: 5,
            },
            1024: {
                items: 6,
            },
        },
        autoplay: false,
        loop: true,
        mouseDrag: true,
        controls: true,
        controlsContainer: ".tns-controls-gallery",
        nav: true,
        autoHeight: false,
        lazyload: true
    });
}

var bucketsMob = document.querySelector('.js-bucketsMob-slider');

if (typeof (bucketsMob) != 'undefined' && bucketsMob != null) {
    let bucketsMob = document.querySelector('.js-bucketsMob-slider');

    let slider = new tns({
        container: bucketsMob,
        items: 1,
        gutter: 0,
        responsive: {
            480: {
                items: 2
            },
            600: {
                items: 3
            },
            1024: {
                disable: true
            },
        },
        autoplay: false,
        loop: false,
        mouseDrag: true,
        controls: true,
        controlsContainer: ".tns-controls-bucketsMob",
        nav: true,
        autoHeight: true,
        lazyload: true
    });
}


var bucketsSidebar = document.querySelector('.js-bucketsSidebar-slider');

if (typeof (bucketsSidebar) != 'undefined' && bucketsSidebar != null) {
    let bucketsSidebar = document.querySelector('.js-bucketsSidebar-slider');

    let slider = new tns({
        container: bucketsSidebar,
        items: 1,
        gutter: 20,
        responsive: {
            1: {
                items: 1
            },
            480: {
                items: 2
            },
            1024: {
                disable: true
            },
        },
        autoplay: false,
        loop: false,
        mouseDrag: true,
        controls: true,
        controlsContainer: ".tns-controls-bucketsSidebar",
        nav: true,
        autoHeight: true,
        lazyload: true
    });
}


var bucketsDesktop = document.querySelector('.js-bucketsDesktop-slider');

if (typeof (bucketsDesktop) != 'undefined' && bucketsDesktop != null) {
    let bucketsDesktop = document.querySelector('.js-bucketsDesktop-slider');

    let slider = new tns({
        container: bucketsDesktop,
        items: 1,
        gutter: 0,
        autoplay: false,
        loop: false,
        mouseDrag: true,
        controls: true,
        controlsContainer: ".tns-controls-bucketsDesktop",
        nav: true,
        autoHeight: true,
        lazyload: true
    });
}


var controls = document.querySelectorAll('.tns-controls');

controls.forEach(function(e) {
    e.removeAttribute("tabindex");

    var buttons = e.querySelectorAll("button");

    buttons.forEach(function(b) {
        b.setAttribute("tabindex","0");
    });
});


// --------------------------------------------------------------------------------------------------
// REVIEWS
// --------------------------------------------------------------------------------------------------
function reviewsMore() {
    var readMoreBtns = document.querySelectorAll('.readMore');

    readMoreBtns.forEach(function(elem) {
        elem.addEventListener('click', function () {
            if(this.innerHTML == 'Read less') {
                this.previousElementSibling.previousElementSibling.style.display = ""; // Dots
                this.previousElementSibling.style.display = "none"; // Extra content
                this.innerHTML = 'Read more'; // Button
            } else {
                this.previousElementSibling.previousElementSibling.style.display = "none"; // Dots
                this.previousElementSibling.style.display = "inline"; // Extra content
                this.innerHTML = 'Read less'; // Button
            }
        });
    });
}
reviewsMore();