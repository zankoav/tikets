import './promokod.scss';
import {Validator} from './../../utils/_validator';
import Inputmask from "inputmask";
import $ from 'jquery';

let programId = $('.checkout__form').data('program-id');
let $totalPrice = $('.promokod__price');
let $tiketCounts = $('.promokod__result');
let ticketCount = parseInt($tiketCounts.text());
let tariffs = {};

let $options = $('.checkout-form-group__select option');
for (let option of $options) {
    tariffs[$(option).val()] = $(option).data('price');
}

$('.promokod__add').on('click', function (event) {
    event.preventDefault();
    ticketCount++;
    $tiketCounts.html(ticketCount);
    changeTotalPrice();
});

$('.promokod__minus').on('click', function (event) {
    event.preventDefault();

    if (ticketCount > 1) {
        ticketCount--;
        $tiketCounts.html(ticketCount);
        changeTotalPrice();
    }
});

$('.checkout-form-group__select').on('change', function () {
    changeTotalPrice();
});

function changeTotalPrice() {
    let tariffId = $('.checkout-form-group__select').find(":selected").val();
    let currentPrice = tariffs[tariffId];
    if (currentPrice) {
        let total = ticketCount * parseFloat(currentPrice);
        $totalPrice.html(total.toFixed(2) + ' ');
    }
}

let $phone = $('[name="user-phone"]');
let $name = $('[name="user-name"]');
let $email = $('[name="user-email"]');
let $comment = $('[name="user-comment"]');
let $spam = $('[name="message"]');

$phone.on('focus', clearFocus);
$name.on('focus', clearFocus);
$email.on('focus', clearFocus);

Inputmask({regex: String.raw`^\+375 (17|25|29|33|44) [0-9]{3} [0-9]{2} [0-9]{2}$`}).mask($phone[0]);

let $chekoutButton = $('.promokod__button-chekout');

$chekoutButton.on('click', tryToSendData);

function tryToSendData(event) {
    event.preventDefault();

    let phone = $phone.val();
    let name = $name.val();
    let email = $email.val();
    let comment = $comment.val();
    let tariffId = $('.checkout-form-group__select').find(":selected").val();
    let spam = $spam.val();

    if (phone.length === 0) {
        let $parent = $phone.parent().parent();
        $parent.addClass('checkout-form-group_error');
        $parent.find('.checkout-form-group__message').html(Validator.ERROR_REQUIRE_FIELD);

        let top = $parent.offset().top - $('.header').height() - 40;
        $("html, body").animate({scrollTop: top}, 400);

        return;
    }

    if (!Validator.phone(phone)) {
        let $parent = $phone.parent().parent();
        $parent.addClass('checkout-form-group_error');
        $parent.find('.checkout-form-group__message').html(Validator.ERROR_PHONE_FORMAT_FIELD);
        let top = $parent.offset().top - $('.header').height() - 40;
        $("html, body").animate({scrollTop: top}, 400);

        return;
    }

    if (name.length === 0) {
        let $parent = $name.parent().parent();
        $parent.addClass('checkout-form-group_error');
        $parent.find('.checkout-form-group__message').html(Validator.ERROR_REQUIRE_FIELD);

        let top = $parent.offset().top - $('.header').height() - 40;
        $("html, body").animate({scrollTop: top}, 400);

        return;
    }

    if (email.length === 0) {
        let $parent = $email.parent().parent();
        $parent.addClass('checkout-form-group_error');
        $parent.find('.checkout-form-group__message').html(Validator.ERROR_REQUIRE_FIELD);

        let top = $parent.offset().top - $('.header').height() - 40;
        $("html, body").animate({scrollTop: top}, 400);

        return;
    }


    if (!Validator.email(email)) {
        let $parent = $email.parent().parent();
        $parent.addClass('checkout-form-group_error');
        $parent.find('.checkout-form-group__message').html(Validator.ERROR_EMAIL_FIELD);

        let top = $parent.offset().top - $('.header').height() - 40;
        $("html, body").animate({scrollTop: top}, 400);

        return;
    }


    sendingMail({
        programId: programId,
        ticketCount: ticketCount,
        tariffId: tariffId,
        name: name,
        email: email,
        message: spam,
        phone: phone,
        comment: comment,
        action: 'createOrder'
    });
}


function sendingMail(data) {
    console.log('send data', data);

    $.ajax(tikets_ajax.url, {
        data: data,
        method: 'post',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            autoSubmit(response);
        },
        error: function (x) {
            console.log(x);
            alert('Error connection.\n Please try again later.');
        }
    });
}

function autoSubmit(data) {
    let form = document.createElement("form");
    form.method = "POST";
    form.action = "https://securesandbox.webpay.by/";

    for(let key in data){
        let element = document.createElement("input");
        element.value=data[key];
        element.name=key;
        form.appendChild(element);
    }

    // document.body.appendChild(form);

    form.submit();
}

function clearFocus() {
    let $parent = $(this).parent().parent();
    if ($parent.hasClass('checkout-form-group_error')) {
        $parent.removeClass('checkout-form-group_error');
    }
}

function promokod() {

    let $applyButton = $('.checkout-form-group__apply');
    let $promokod = $('[name="user-promokod"]');

    $applyButton.on('click', function (event) {
        event.preventDefault();

        let promokod = $promokod.val();

        if (promokod.length === 0) {
            let $parent = $promokod.parent().parent();
            $parent.addClass('checkout-form-group_error');
            $parent.find('.checkout-form-group__message').html(Validator.ERROR_EMPTY_PROMOCODE_FIELD);
            return;
        }

        console.log(promokod);
//    Send promokode ajax

    });

    $promokod.on('focus', clearFocus);
}