import './promokod.scss';
import {Validator} from './../../utils/_validator';
import Inputmask from "inputmask";
import $ from 'jquery';

let programId = $('.types__form').data('program-id');
let $totalPrice = $('.promokod__price');
let $tiketCounts = $('.promokod__result');
let ticketCount = parseInt($tiketCounts.text());
let tariffs = {};

let $options = $('.checkout-form-group__select option');
for (let option of $options) {
    tariffs[$(option).val()] = $(option).data('price');
}

promokod();
getDiscontByCount();
$(".bit_item").click();

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


var disconts = [];
var statusDiscount = null;
var textDiscount = null;
var arrayDiscount = null;



function getDiscontByCount() {

    let $applyButton = $('.bit_item');
    let user_prod_id = $("[data-program-id]").data("program-id");

    let data = {
        action: 'getDiscontByCount',
        user_prod_id: user_prod_id,
    };

    $applyButton.on('click', function (event) {
        event.preventDefault();


        $.ajax({
            type: 'POST',
            url: tikets_ajax.url,
            data: data,
            success: function (response) {
                console.log(response);
                let buff = JSON.parse(response);
                console.log(buff);
                disconts = buff;
                statusDiscount = disconts["status"];
                textDiscount = disconts["text"];
                arrayDiscount = disconts["disconts"];

            },
            error: function (x, y, z) {
                console.log(x);
                $('.partnership__response').text('ОШИБКА!');
            }
        });

    });

}



function changeTotalPrice() {
    let tariffId = $('.checkout-form-group__select').find(":selected").val();
    let currentPrice = tariffs[tariffId];
    let discountBuff = disconts;

    if (status === 1){
        switch (discount_type) {
            case 'percent' :
                if (currentPrice) {
                    let totalNot = ticketCount * parseFloat(currentPrice);
                    let totalDes = totalNot * (coupon_amount/100);
                    let total = totalNot - totalDes;
                    $totalPrice.html(total.toFixed(2) + ' ');
                }
                break;

            case 'fixed_cart' :
                if (currentPrice) {
                    let total = ticketCount * parseFloat(currentPrice) - coupon_amount;
                    $totalPrice.html(total.toFixed(2) + ' ');
                }
                break;

            case 'fixed_product' :
                if (currentPrice) {
                    let total = (ticketCount * parseFloat(currentPrice)) - (ticketCount * coupon_amount);
                    $totalPrice.html(total.toFixed(2) + ' ');

                }
                break;

            default:
                break;
        }
    }

    else {
        if (discountBuff.status === 1){

            if(arrayDiscount.length>0){
                for(let i=0; i<arrayDiscount.length; i++){
                    if ((ticketCount >= +arrayDiscount[i].quantity_from) && (ticketCount <= +arrayDiscount[i].quantity_to)){
                        let total = ticketCount * parseFloat(currentPrice) - +arrayDiscount[i].discount;
                        $totalPrice.html(total.toFixed(2) + ' ');
                        break;
                    }

                    else{
                        let total = ticketCount * parseFloat(currentPrice);
                        $totalPrice.html(total.toFixed(2) + ' ');
                    }
                }
            }

            else{
                let total = ticketCount * parseFloat(currentPrice);
                $totalPrice.html(total.toFixed(2) + ' ');
            }


        }

        else{
            let total = ticketCount * parseFloat(currentPrice);
            $totalPrice.html(total.toFixed(2) + ' ');
        }
    }





}






var promokod_result = [];
var status = null;
var text = null;
var discount_type = null;
var coupon_amount = null;




function promokod() {

    let $applyButton = $('.checkout-form-group__apply');
    let $promokod = $('[name="user-promokod"]');

    let user_prod_id = $("[data-program-id]").data("program-id");
    let user_prod_tariff_id = $("#user-tariff").find(":selected").val();

    let data = {
        action: 'checkCoupone',
        user_promocode: '',
        user_prod_tariff_id: user_prod_tariff_id,
        user_prod_id: user_prod_id,
    };

    $applyButton.on('click', function (event) {
        event.preventDefault();
        data.user_promocode = $("#user-promokod").val();
        let promokod = data.user_promocode;



        console.log(promokod);


        $.ajax({
            type: 'POST',
            url: tikets_ajax.url,
            data: data,
            success: function (response) {
                console.log(response);
                let resp = JSON.parse(response);
                console.log(resp);
                promokod_result = resp;
                status = promokod_result["status"];
                text = promokod_result["text"];
                discount_type = promokod_result["discount_type"];
                coupon_amount = promokod_result["coupon_amount"];
                if (status === 0) {
                    let $parent = $promokod.parent().parent();
                    $parent.addClass('checkout-form-group_error');
                    $parent.find('.checkout-form-group__message').html(text);
                    return;
                }

                else {
                    let $parent = $promokod.parent().parent();
                    $parent.addClass('checkout-form-group_green');
                    $parent.find('.checkout-form-group__message').html(text);
                    return;
                }

            },
            error: function (x, y, z) {
                console.log(x);
                if (promokod.length === 0) {
                    let $parent = $promokod.parent().parent();
                    $parent.addClass('checkout-form-group_error');
                    $parent.find('.checkout-form-group__message').html(Validator.ERROR_EMPTY_PROMOCODE_FIELD);
                    return;
                }
            }
        });

    });

    $promokod.on('focus', clearFocus);
}


let $chekoutButton2 = $('.types__button-chekout');

$chekoutButton2.on('click', tryToSendData2);

let $name2 = $("[name='name']");
let $komp = $("[name='komp']");
let $col = $("[name='col']");
let $phone2 = $("[name='phone']");
let $email2 = $("[name='email']");



let $phone = $('[name="user-phone"]');
let $name = $('[name="user-name"]');
let $email = $('[name="user-email"]');
let $comment = $('[name="user-comment"]');
let $spam = $('[name="message"]');

$phone.on('focus', clearFocus);
$name.on('focus', clearFocus);
$email.on('focus', clearFocus);



Inputmask({regex: String.raw`^\+375 (17|25|29|33|44) [0-9]{3} [0-9]{2} [0-9]{2}$`}).mask($phone[0]);

function tryToSendData2(event) {
    event.preventDefault();

    console.log("gg");

    let name = $name2.val();
    let komp = $komp.val();
    let col = $col.val();
    let phone = $phone2.val();
    let email = $email2.val();



    if (name.length === 0) {
        console.log('name', Validator.ERROR_EMPTY_FIELD);
        $(this).find("[name*='name']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='name']").removeClass('input_error');
    }

    if (name.length === 0) {
        console.log('komp', Validator.ERROR_EMPTY_FIELD);
        $(this).find("[name*='komp']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='komp']").removeClass('input_error');
    }


    if (name.length === 0) {
        console.log('col', Validator.ERROR_EMPTY_FIELD);
        $(this).find("[name*='col']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='col']").removeClass('input_error');
    }

    if (phone.length === 0) {
        console.log('phone', Validator.ERROR_EMPTY_FIELD);
        $(this).find("[name*='phone']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='phone']").removeClass('input_error');
    }



    if (email.length === 0) {
        console.log('email', Validator.ERROR_EMPTY_FIELD);
        $(this).find("[name*='email']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='email']").removeClass('input_error');
    }

    if (!Validator.email(email)) {
        console.log('email', Validator.ERROR_EMAIL_FIELD);
        $(this).find("[name*='email']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='email']").removeClass('input_error');
    }


    let data = {
        action: 'sendFormTo',
        name: name,
        komp: komp,
        col: col,
        phone: phone,
        email: email,
        programId: programId
    };

    $.ajax({
        type: 'POST',
        url: tikets_ajax.url,
        data: data,
        success: function (response) {
            console.log(response);
            let resp = JSON.parse(response);
            $('#form2')[0].reset();

        }
    });

}




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
    let userPromocode = $("#user-promokod").val();

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
        userPromocode: userPromocode,
        action: 'createOrder'
    });
}


function sendingMail(data) {
    console.log('send data:', data);

    $.ajax(tikets_ajax.url, {
        data: data,
        method: 'post',
        dataType: 'json',
        beforeSend: function () {
            $('.preloader').addClass('preloader_active');
        },
        success: function (response) {
            // console.log(response);
            autoSubmit(response);
            $('.preloader').removeClass('preloader_active');
        },
        error: function (x) {
            console.log(x);
            $('.preloader').removeClass('preloader_active');
            alert('Error connection.\n Please try again later.');
        }
    });
}

function autoSubmit(data) {
    let form = document.createElement("form");
    form.method = "POST";

    console.log(data);
    console.log("check test: " + data.wsb_test);

    if (+data.wsb_test === 1 ){
        form.action = "https://securesandbox.webpay.by/";
    } else if (+data.wsb_test === 0){
        form.action = "https://billing.webpay.by";
    }


    for(let key in data){
        let element = document.createElement("input");
        element.value=data[key];
        element.name=key;
        form.appendChild(element);
    }

    document.body.appendChild(form);

    form.submit();
}

function clearFocus() {
    let $parent = $(this).parent().parent();
    if ($parent.hasClass('checkout-form-group_error')) {
        $parent.removeClass('checkout-form-group_error');
    }
}
