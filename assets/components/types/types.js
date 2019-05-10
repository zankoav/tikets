import './types.scss';
import $ from 'jquery';


$(document).ready(function(){
    $(".types__list-tab").removeClass("types__list-tab_active");
    $(".types__list-tab:nth-child(1)").addClass("types__list-tab_active");
    $(".types__content:nth-child(1)").addClass("types__content_active");
})

$('.types__list-tab').on('click', function (event) {
    event.preventDefault();

    if ($(window).width() < 740) {
        $('.types__list-tab').slideDown();
        $('.types__wrapper-list').addClass('types__wrapper-list_active');


        if (!$(this).hasClass('types__list-tab_active')) {

            $('.types__list-tab')
                .addClass('types__list-tab-js')
                .removeClass('types__list-tab_active');

            $(this)
                .removeClass('types__list-tab-js')
                .addClass('types__list-tab_active')
                .removeAttr('style');

            let index = $(this).data('content');
            $('.types__content').removeClass('types__content_active');
            $($('.types__content')[index]).addClass('types__content_active')

            $('.types__list-tab-js').slideUp(function () {
                $(this)
                    .removeClass('types__list-tab-js')
                    .removeAttr('style');
            });
            $('.types__wrapper-list').removeClass('types__wrapper-list_active');

        }

    } else {
        if (!$(this).hasClass('types__list-tab_active')) {
            $('.types__list-tab').removeClass('types__list-tab_active');
            $(this).addClass('types__list-tab_active')
            let index = $(this).data('content');
            $('.types__content').removeClass('types__content_active');
            $($('.types__content')[index]).addClass('types__content_active');
        }
    }
});

$('.types__button').on('click', function (event) {
    event.preventDefault();
    if ($(window).width() < 740) {

        if ($('.types__wrapper-list').hasClass('types__wrapper-list_active')) {
            $('.types__wrapper-list').removeClass('types__wrapper-list_active');
            $('.types__list-tab').addClass('types__list-tab-js');
            $('.types__list-tab_active').removeClass('types__list-tab-js');
            $('.types__list-tab-js').slideUp(function () {
                $(this)
                    .removeClass('types__list-tab-js')
                    .removeAttr('style');
            });
        } else {
            $('.types__wrapper-list').addClass('types__wrapper-list_active');
            $('.types__list-tab').slideDown();
        }
    }
});
