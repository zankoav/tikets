import './main-slider.scss';
import Swiper from "swiper";


let swiper = new Swiper('.main-slider__swiper', {
    slidesPerView: 1,
    spaceBetween: 16,
    pagination: {
        el: '.main-slider__pagination',
        clickable: true,
        bulletActiveClass: 'main-slider__bullet_active',
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
    },
});