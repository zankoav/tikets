import './tariffs.scss';
import {Validator} from './../../utils/_validator';
import Inputmask from "inputmask";
import $ from 'jquery';

$('[data-tariff-name]').find('.button-with-balls').on('click', function (event) {
    event.preventDefault();

    let $parent = $(this).parent();
    let tariffName = $parent.data('tariff-name');

    showContactForm(tariffName);

});

$('.tarifs-contact-form__glass').on('click', closeContactForm);
$('.tarifs-contact-form__close-form').on('click', closeContactForm);

let $phone = $('[name="user-phone"]');
let $name = $('[name="user-name"]');
let $email = $('[name="user-email"]');
let $spam = $('[name="message"]');
let $tarif = $('[name="tariff-name"]');

$phone.on('focus', clearFocus);
$name.on('focus', clearFocus);
$email.on('focus', clearFocus);

function showContactForm(name) {
    $('.tarifs-contact-form__contact-form').addClass('tarifs-contact-form__contact-form_active');
    $('body').addClass('body_overflow_hidden');
    $tarif.val(name);
}

function closeContactForm(event) {
    event.preventDefault();
    $('body').removeClass('body_overflow_hidden');


    $('.tarifs-contact-form__contact-form').fadeOut(function () {
        $(this)
            .removeClass('tarifs-contact-form__contact-form_active')
            .removeAttr('style');
    });
}


function clearFocus() {
    let $parent = $(this).parent();
    if ($parent.hasClass('tarifs-contact-form__form-group_error')) {
        $parent.removeClass('tarifs-contact-form__form-group_error');
    }
}

Inputmask({regex: String.raw`^\+375 (17|25|29|33|44) [0-9]{3} [0-9]{2} [0-9]{2}$`}).mask($phone[0]);

$('.tarifs-contact-form__form-send').on('click', function (event) {
    event.preventDefault();

    let phone = $phone.val();
    let name = $name.val();
    let email = $email.val();
    let spam = $spam.val();
    let tarif = $tarif.val();

    if (name.length === 0) {
        let $parent = $name.parent();
        $parent.addClass('tarifs-contact-form__form-group_error');
        $parent.find('.tarifs-contact-form__form-message').html(Validator.ERROR_REQUIRE_FIELD);
        return;
    }

    if (phone.length === 0) {
        let $parent = $phone.parent();
        $parent.addClass('tarifs-contact-form__form-group_error');
        $parent.find('.tarifs-contact-form__form-message').html(Validator.ERROR_REQUIRE_FIELD);

        return;
    }

    if (!Validator.phone(phone)) {
        let $parent = $phone.parent();
        $parent.addClass('tarifs-contact-form__form-group_error');
        $parent.find('.tarifs-contact-form__form-message').html(Validator.ERROR_PHONE_FORMAT_FIELD);

        return;
    }

    if (email.length === 0) {
        let $parent = $email.parent();
        $parent.addClass('tarifs-contact-form__form-group_error');
        $parent.find('.tarifs-contact-form__form-message').html(Validator.ERROR_REQUIRE_FIELD);

        return;
    }


    if (!Validator.email(email)) {
        let $parent = $email.parent();
        $parent.addClass('tarifs-contact-form__form-group_error');
        $parent.find('.tarifs-contact-form__form-message').html(Validator.ERROR_EMAIL_FIELD);

        return;
    }


    sendingMail({
        name: name,
        email: email,
        message: spam,
        phone: phone,
        tarif: tarif,
        action: 'leaveRequest'
    });


});

function sendingMail(data) {
    console.log('send data', data);

    $.ajax(tikets_ajax.url, {
        data: data,
        method: 'post',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            alert('Success');
            if (response.status === 1) {
                console.log('Successful');
            } else {
                console.log('Error connection.\n Please try again later.');
                // alert('Error connection.\n Please try again later.');
            }
        },
        error: function (x) {
            console.log(x);
            alert('Error connection.\n Please try again later.');
        }
    });
}
