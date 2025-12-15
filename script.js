let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');


menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}


/*=============== SWIPER BANNETR ===============*/


var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,
});



/*=============== SWIPER CATEGORIES ===============*/




var swiperCategories = new Swiper('.categories__container', {
    spaceBetween: 24,
    centeredSlides: true,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,

    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1400: {
            slidesPerView: 5,
            spaceBetween: 24,
        },
    },
});
