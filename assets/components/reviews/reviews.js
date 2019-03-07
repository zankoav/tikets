import './reviews.scss';
import Swiper from 'swiper';

new Swiper('.reviews__swiper', {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 32,
    navigation: {
        nextEl: '.reviews__button-next',
        prevEl: '.reviews__button-prev',
    },
    pagination: {
        el: '.reviews__pagination',
        type: 'bullets',
        clickable: true
    },
    breakpoints: {
        767: {
            slidesPerView: 1,
            spaceBetween: 16
        }
    }
});