import './partnership.scss';
import $ from 'jquery';
import {Validator} from "../../utils/_validator";

$('#partnership__form').submit(function (event) {
    event.preventDefault();
    let email = $(this).find("[name*='useremail']").val();
    let name = $(this).find("[name*='username']").val();
    let message = $(this).find("[name*='usermessage']").val();
    let spam = $(this).find("[name*='message']").val();

    if (name.length === 0) {
        console.log('username', Validator.ERROR_EMPTY_FIELD);
        return;
    }

    if (message.length === 0) {
        console.log('usermessage', Validator.ERROR_EMPTY_FIELD);
        return;
    }

    if (!Validator.email(email)) {
        console.log('useremail', Validator.ERROR_EMAIL_FIELD);
        return;
    }

    let data = {
        name: name,
        email: email,
        message: message,
        spam: spam
    };

    $.ajax({
        type: 'POST',
        url: tikets_ajax.url,
        data: data,
        success: function (response) {
            console.log(response);
            let resp = JSON.parse(response);
            if(resp.status === 1) {
                $('.partnership__response').text(resp.text);
            }
            if(resp.status === 0) {
                $('.partnership__response').text(resp.text);
            }
        },
        error: function (x, y, z) {
            console.log(x);
            $('.partnership__response').text('ОШИБКА!');
        }
    });
});

