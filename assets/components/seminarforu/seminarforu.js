import './seminarforu.scss';
import $ from 'jquery';


let $list = $('.seminarforu__list-items');
let $buttonSign = $('.seminarforu__button-sign');
let linkString = $buttonSign.attr('href');

$buttonSign.on('click', function (event) {


    if (!$(this).hasClass('seminarforu__button-sign_active')) {
        event.preventDefault();
    }

});

$('.seminarforu__list-current').on('click', function (event) {
    event.preventDefault();
    $list.slideToggle();
});

$('.seminarforu__item').on('click', function (event) {
    event.preventDefault();
    $list.slideUp();

    let id = $(this).find('.seminarforu__item-link').data('id');

    if (!isNaN(id)) {

        let link = linkString + `?seminar=${id}`;
        $buttonSign.addClass('seminarforu__button-sign_active');
        $buttonSign.attr('href', link);

        let top = $buttonSign.offset().top - $('.header').height() - $buttonSign.height();

        $("html, body").animate({scrollTop: top}, 400);
    }
});