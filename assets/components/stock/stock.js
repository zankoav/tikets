import './stock.scss';
import Swiper from 'swiper';


import $ from 'jquery';

let stock = null;

function resizeStock() {
    if (screen.width < 768 && stock === null) {
        stock = new Swiper('.stock__container', {
            pagination: {
                el: '.stock__pagination',
                clickable: true
            },
        });

    } else if (screen.width >= 768 && stock !== null) {
        stock.destroy(true, true);
        stock = null;
    }
}

$(window).on('resize', resizeStock).trigger('resize');
