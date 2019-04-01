import './partners.scss';
import Swiper from 'swiper';

new Swiper('.partners__container', {
    loop: false,
    centerInsufficientSlides: true,
    navigation: {
        nextEl: '.partners__button-next',
        prevEl: '.partners__button-prev',
    },
    breakpoints: {
        767: {
            slidesPerView: 2,
            spaceBetween: 16
        },

        1023: {
            slidesPerView: 5,
            spaceBetween: 16
        },
        2560: {
            slidesPerView: 5,
            spaceBetween: 32
        }
    }
});