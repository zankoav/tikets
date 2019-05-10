import './realty.scss';
import $ from 'jquery';



$('.realty__content').on('click', function (event) {
    event.preventDefault();
    $(this).find(".realty__plus").toggleClass('realty__plus_active');
    $(this).find(".realty__plus").parent().parent().find('.realty__cover').slideToggle();
    $(this).find(".realty__plus").parent().parent().find('.realty__cover').toggleClass("realty__cover_active");
});

$('.orange-button ').on('click', function (event) {
    event.preventDefault();
    document.location.href=$(this).attr('href');
});

