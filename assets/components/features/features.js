import './features.scss';
import $ from 'jquery';
import Swiper from 'swiper';

let swiper = null;

function featureResize() {
    if (screen.width < 760) {
        if (!swiper) {
            swiper = new Swiper('.features__swiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                navigation: {
                    nextEl: '.features__button-next',
                    prevEl: '.features__button-prev',
                },
                pagination: {
                    el: '.features__pagination',
                    type: 'bullets',
                    clickable: true
                }
            });
        }

    } else {
        if (swiper) {
            swiper.destroy(true, true);
            swiper = null;
        }
    }
}

$(window).on('resize', featureResize).trigger('resize');