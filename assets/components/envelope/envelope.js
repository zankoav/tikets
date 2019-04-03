import './envelope.scss';
import $ from 'jquery';
import {Validator} from "../../utils/_validator";

$('#envelope__form').submit(function (event) {
    event.preventDefault();
    let email = $(this).find("[name*='useremail']").val();

    if (!Validator.email(email)) {
        console.log('useremail', Validator.ERROR_EMAIL_FIELD);
        $('.question-speaker__response').text('Некорректный e-mail');
        $(this).find("[name*='useremail']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='useremail']").removeClass('input_error');
    }

    let data = {
        action: 'envelope',
        email: email
    };

    $.ajax({
        type: 'POST',
        url: tikets_ajax.url,
        data: data,
        beforeSend: function () {
            $('.preloader').addClass('preloader_active');
        },
        success: function (response) {
            let resp = JSON.parse(response);
            if (resp.status === 1) {
                $('.envelope__response').text(resp.text);
            }
            if (resp.status === 0) {
                $('.envelope__response').text(resp.text);
            }
            $('#envelope__form')[0].reset();
            $('.preloader').removeClass('preloader_active');
        }
        ,
        error: function (x, y, z) {
            $('.preloader').removeClass('preloader_active');
            $('.envelope__response').text('ОШИБКА!');
        }
    })
    ;
});
