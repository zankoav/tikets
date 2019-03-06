import './header.scss';
import $ from 'jquery';

const $categoryList = $('.header__categories-list');
const $menu = $('.header__menu');

function categoryButtonPressed(event) {
    event.preventDefault();

    $categoryList.slideToggle(function () {
        $categoryList.toggleClass('header__categories-list_active');
        $categoryList.removeAttr('style');
    });
    $(this).toggleClass('header__categories-button_active');

}

function burgerButtonPressed(event) {
    event.preventDefault();
    $menu.slideToggle(function () {
        $menu.toggleClass('header__menu_active');
        $menu.removeAttr('style');
    });
    $(this).toggleClass('header__burger_active');
}


function paddingResize() {
    let pt = $('.header').outerHeight();

    $('.main').css({
        'padding-top': pt
    });
}

$(window).on('resize', paddingResize).trigger('resize');

$('.header__categories-button').on('click', categoryButtonPressed);
$('.header__burger').on('click', burgerButtonPressed);