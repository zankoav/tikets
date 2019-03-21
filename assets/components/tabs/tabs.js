import './tabs.scss';
import $ from 'jquery';

$('.tabs__list-tab').on('click', function (event) {
    event.preventDefault();

    if ($(window).width() < 740) {
        $('.tabs__list-tab').slideDown();
        $('.tabs__wrapper-list').addClass('tabs__wrapper-list_active');


        if (!$(this).hasClass('tabs__list-tab_active')) {

            $('.tabs__list-tab')
                .addClass('tabs__list-tab-js')
                .removeClass('tabs__list-tab_active');

            $(this)
                .removeClass('tabs__list-tab-js')
                .addClass('tabs__list-tab_active')
                .removeAttr('style');

            let index = $(this).data('content');
            $('.tabs__content').removeClass('tabs__content_active');
            $($('.tabs__content')[index]).addClass('tabs__content_active')

            $('.tabs__list-tab-js').slideUp(function () {
                $(this)
                    .removeClass('tabs__list-tab-js')
                    .removeAttr('style');
            });
            $('.tabs__wrapper-list').removeClass('tabs__wrapper-list_active');

        }

    } else {
        if (!$(this).hasClass('tabs__list-tab_active')) {
            $('.tabs__list-tab').removeClass('tabs__list-tab_active');
            $(this).addClass('tabs__list-tab_active')
            let index = $(this).data('content');
            $('.tabs__content').removeClass('tabs__content_active');
            $($('.tabs__content')[index]).addClass('tabs__content_active');
        }
    }
});

$('.tabs__button').on('click', function (event) {
    event.preventDefault();
    if ($(window).width() < 740) {

        if ($('.tabs__wrapper-list').hasClass('tabs__wrapper-list_active')) {
            $('.tabs__wrapper-list').removeClass('tabs__wrapper-list_active');
            $('.tabs__list-tab').addClass('tabs__list-tab-js');
            $('.tabs__list-tab_active').removeClass('tabs__list-tab-js');
            $('.tabs__list-tab-js').slideUp(function () {
                $(this)
                    .removeClass('tabs__list-tab-js')
                    .removeAttr('style');
            });
        } else {
            $('.tabs__wrapper-list').addClass('tabs__wrapper-list_active');
            $('.tabs__list-tab').slideDown();
        }
    }
});
