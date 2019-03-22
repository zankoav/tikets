import './realty.scss';
import $ from 'jquery';

$('.realty__plus').on('click', function (event) {
    event.preventDefault();
    $(this).toggleClass('realty__plus_active');
    $(this).parent().parent().find('.realty__text').slideToggle();
    $(this).parent().parent().find('.realty__text').toggleClass("realty__text_active");
});

